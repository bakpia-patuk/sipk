<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model');
    }
	
	public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'user.add':
					redirect('admin/user/add', 'refresh');
				case 'user.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $user_id = $id;
							break;
                        }
						redirect('admin/user/edit/'.$user_id, 'refresh');
                    }
                case 'user.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->User_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' User telah di hapus.'));
                        }
                    }
                    redirect('admin/user', 'refresh');
			}
		}
		
		$where = array();
		$this->data['filter_published'] = '';
		if ($this->input->post('filter_published')) {
			$where['state'] = $this->input->post('filter_published');
			$this->data['filter_published'] = $this->input->post('filter_published');
		}
        /*
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
        */
		$like = array();
		$this->data['filter_search'] = '';
        /*
		if ($this->input->post('filter_search')) {
			$like['judul'] = $this->input->post('filter_search');
			$like['deskripsi'] = $this->input->post('filter_search');
			$this->data['filter_search'] = $this->input->post('filter_search');
		}
        */
		$this->data['extraCSS'] = $this->css_view();
		$this->data['extraJS'] = $this->js_view();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Users';
		$this->data['title'] = 'Daftar User';
		$this->data['module_title'] = VToolBar_Helper::title('User Manager: Daftar User');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/user/view';
		
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
		
		$record = $this->Users_Model->getAll($limit, $this->data['limitstart']);
		$this->load->library('pagination');
        $config['base_url'] = site_url('admin/user/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		
        $this->load->view('admin/template', $this->data);
    }
    
    public function add()
    {
        if ($this->input->post('task')) {
            switch ($this->input->post('task')) {
                case 'user.apply':
                    $user = $this->_getDataArray();
					if (isset($user->id) && $user->id > 0) {
						$id = $user->id;
						$this->Users_Model->update($user);
					}
					else {
						$id = $this->Users_Model->create($user);
					}
					$data['data'] = $user;
					$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'User telah di simpan.'));
					redirect('admin/user/edit/'.$id.'/close', 'refresh');
                case 'user.save':
                    $user = $this->_getDataArray();
                    $id = $this->Users_Model->create($user);
                    $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'User telah di simpan.'));
                    redirect('admin/user/index', 'refresh');
                case 'user.save2new':
                    $user = $this->_getDataArray();
                    $id = $this->Users_Model->create($user);
                    $data['data'] = $this->_getEmptyDataArray();
                    $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'User telah di simpan.'));
                    redirect('admin/user/add', 'refresh');
            }
        } else {
			$this->data['extraCSS'] = $this->css_edit();
			$this->data['extraJS'] = $this->js_edit();
			$this->data['admin_status'] = FALSE;
            $this->data['menu_active'] = 'Users';
            $this->data['title'] = "Daftar User";
            $this->data['module_title'] = VToolBar_Helper::title('User Manager: Daftar User');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/user/edit';
			
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $user = $this->Users_Model->getById($id);
				$this->data['is_new'] = FALSE;
            }
            else {
                $user = $this->_getEmptyDataArray();
				$this->data['is_new'] = TRUE;
            }
			
			$this->data['data'] = $user;

            $this->load->view('admin/template', $this->data);
        }
    }
    
    public function select_user()
    {
        $this->load->view('admin/user/select_user');
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('user.add');
        VToolBar_Helper::editList('user.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'user.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_user_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('user.apply');
        VToolBar_Helper::save('user.save');
        VToolBar_Helper::save2new('user.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('user.cancel');
		} else {
			VToolBar_Helper::cancel('user.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_user_manager_edit'));
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

/* End of file user.php */
/* Location: ./application/controllers/user.php */
