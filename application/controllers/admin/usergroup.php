<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usergroup extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usergroup_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'usergroup.add':
					redirect('admin/usergroup/add', 'refresh');
				case 'usergroup.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $usergroup_id = $id;
							break;
                        }
						redirect('admin/usergroup/edit/'.$usergroup_id, 'refresh');
                    }
                case 'usergroup.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Usergroup_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' sekolah telah di hapus.'));
                        }
                    }
                    redirect('admin/usergroup', 'refresh');
			}
		}
		
		$where = array();
		$this->data['filter_published'] = '';
		if ($this->input->post('filter_published')) {
			$where['state'] = $this->input->post('filter_published');
			$this->data['filter_published'] = $this->input->post('filter_published');
		}
		$this->data['filter_jenjang'] = '';
		if ($this->input->post('filter_jenjang')) {
			$where['jenjang'] = $this->input->post('filter_jenjang');
			$this->data['filter_jenjang'] = $this->input->post('filter_jenjang');
		}
		$this->data['filter_wilayah'] = '';
		if ($this->input->post('filter_wilayah')) {
			$where['wilayah'] = $this->input->post('filter_wilayah');
			$this->data['filter_wilayah'] = $this->input->post('filter_wilayah');
		}
		$this->data['filter_status'] = '';
		if ($this->input->post('filter_status')) {
			$where['status'] = $this->input->post('filter_status');
			$this->data['filter_status'] = $this->input->post('filter_status');
		}
		$like = array();
		$this->data['filter_search'] = '';
		if ($this->input->post('filter_search')) {
			$like['judul'] = $this->input->post('filter_search');
			$like['deskripsi'] = $this->input->post('filter_search');
			$this->data['filter_search'] = $this->input->post('filter_search');
		}
		
		$this->data['extraCSS'] = $this->css_view();
		$this->data['extraJS'] = $this->js_view();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Users';
		$this->data['title'] = 'User Group';
		$this->data['module_title'] = VToolBar_Helper::title('User Manager: User Group');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/usergroup/view';
		
		if ($this->input->post('limit')) {
            $limit = $this->input->post('limit');
            $this->data['limitstart'] = 0;
        }
        else {
            if ($this->uri->segment(4) == FALSE) {
                $limit = 20;
            }
            else {
                $limit = $this->uri->segment(4);
            }
            if ($this->uri->segment(3) == FALSE) {
                if ($this->input->post('limitstart')) {
                    $this->data['limitstart'] = $this->input->post('limitstart');
                }
                else {
                    $this->data['limitstart'] = 0;
                }
            }
            else {
                $this->data['limitstart'] = $this->uri->segment(3);
            }
        }
		
		$record = $this->Usergroup_Model->getAll($limit, $this->data['limitstart']);
		$this->load->library('pagination');
        $config['base_url'] = site_url('admin/usergroup/index');
        $config['total_rows'] = $record['numrows'];
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        if ($this->input->post('task')) {
            switch ($this->input->post('task')) {
                case 'usergroup.apply':
                    $usergroup = $this->_getDataArray();
					if (isset($usergroup->id) && $usergroup->id > 0) {
						$id = $usergroup->id;
						$this->Usergroup_Model->update($usergroup);
					}
					else {
						$id = $this->Usergroup_Model->create($usergroup);
					}
					$data['data'] = $usergroup;
					$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'User Group telah di simpan.'));
					redirect('admin/usergroup/edit/'.$id.'/close', 'refresh');
                case 'usergroup.save':
                    $usergroup = $this->_getDataArray();
                    $id = $this->Usergroup_Model->create($usergroup);
                    $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'User Group telah di simpan.'));
                    redirect('admin/usergroup/index', 'refresh');
                case 'usergroup.save2new':
                    $usergroup = $this->_getDataArray();
                    $id = $this->Usergroup_Model->create($usergroup);
                    $data['data'] = $this->_getEmptyDataArray();
                    $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'User Group telah di simpan.'));
                    redirect('admin/usergroup/add', 'refresh');
            }
        } else {
			$this->data['extraCSS'] = $this->css_edit();
			$this->data['extraJS'] = $this->js_edit();
			$this->data['admin_status'] = FALSE;
            $this->data['menu_active'] = 'Users';
            $this->data['title'] = "User Group";
            $this->data['module_title'] = VToolBar_Helper::title('User Manager: User Group');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/usergroup/edit';
			
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $usergroup = $this->Usergroup_Model->getById($id);
				$this->data['is_new'] = FALSE;
            }
            else {
                $usergroup = $this->_getEmptyDataArray();
				$this->data['is_new'] = TRUE;
            }
			
			$this->data['data'] = $usergroup;
			
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Informasi';
        $this->data['title'] = "Daftar Sekolah";
        $this->data['module_title'] = VToolBar_Helper::title('Sekolah Manager: Edit Sekolah');
		if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/sekolah/edit';
		$this->data['is_new'] = FALSE;
		
		$sekolah = $this->Sekolah_Model->getById($id);
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$sekolah->modified = date("Y-m-d H:i:s");
		$sekolah->version++;
		$this->data['data'] = $sekolah;
		$this->data['sekolah_jenjang'] = $this->Sekolah_Model->getJenjang(FALSE, TRUE);
		$this->data['sekolah_status'] = $this->Sekolah_Model->getStatus(FALSE, TRUE);
		$this->data['sekolah_wilayah'] = $this->Sekolah_Model->getWilayah(FALSE, TRUE);
		$this->data['sekolah_state'] = $this->Sekolah_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	private function _getEmptyDataArray()
    {
		$usergroup = new StdClass();
		$usergroup->id		= 0;
        $usergroup->group   = '';
        $usergroup->lock    = 0;
        return $usergroup;
    }
	
	private function _getDataArray()
    {
		$usergroup = new StdClass();
        $usergroup->id      = isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $usergroup->group   = $this->input->_clean_input_data($_POST['jform']['group']);
        $usergroup->lock    = $this->input->_clean_input_data($_POST['jform']['lock']);
        return $usergroup;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('usergroup.add');
        VToolBar_Helper::editList('usergroup.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'usergroup.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_usergroup_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('usergroup.apply');
        VToolBar_Helper::save('usergroup.save');
        VToolBar_Helper::save2new('usergroup.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('usergroup.cancel');
		} else {
			VToolBar_Helper::cancel('usergroup.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_usergroup_manager_edit'));
	}
	
	private function css_view()
	{
		$css = '';
		$css .= '<link href="'.base_url().'css/admin/modal.css" media="all" rel="stylesheet" type="text/css" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url().'css/admin/extras.css" type="text/css" />'."\n";
		return $css;
	}
	
	private function css_edit()
	{
		$css = '';
		$css .= '<link rel="stylesheet" href="'.base_url().'css/admin/modal.css" type="text/css"  title="Green"  media="all" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url().'css/admin/calendar-jos.css" type="text/css"  title="Green"  media="all" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url().'css/admin/extras.css" type="text/css" />'."\n";
		return $css;
	}
	
	private function js_view()
	{
		$js = '';
		$js .= '<script src="'.base_Url('js/admin/multiselect.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/admin/modal.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/admin/MC.js').'" type="text/javascript"></script>'."\n";
		return $js;
	}
	
	private function js_edit()
	{
		$js = '';
		$js .= '<script src="'.base_Url('js/admin/validate.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/admin/modal.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/admin/calendar.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/admin/calendar-setup.js').'" type="text/javascript"></script>'."\n";
		/* $js .= '<script src="'.base_Url('js/MC.Switcher.js').'" type="text/javascript"></script>'."\n"; */
		$js .= '<script src="'.base_Url('js/admin/MC.js').'" type="text/javascript"></script>'."\n";
		return $js;
	}
    
}

/* End of file usergroup.php */
/* Location: ./application/controllers/usergroup.php */