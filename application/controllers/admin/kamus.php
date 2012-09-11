<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sekolah_model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'spesialis.add':
					redirect('admin/spesialis/add', 'refresh');
                case 'spesialis.edit':
					redirect('admin/spesialis/edit', 'refresh');
                case 'spesialis.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Spesialis_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' spesialis telah di hapus.'));
                        }
                    }
                    redirect('admin/spesialis', 'refresh');
			}
		}
		$this->data['extraCSS'] = $this->css_view();
		$this->data['extraJS'] = $this->js_view();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Informasi';
		$this->data['title'] = 'Daftar Spesialis';
		$this->data['module_title'] = VToolBar_Helper::title('Spesialis Manager: Daftar Spesialis');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/spesialis/view';

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
		
		$record = $this->Spesialis_Model->getAll($limit, $this->data['limitstart']);
		$this->load->library('pagination');
        $config['base_url'] = site_url('admin/spesialis/index');
        $config['total_rows'] = $record['numrows'];
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required');
		$this->form_validation->set_rules('gelar', 'Gelar', 'required');
        
        if ($this->input->post('task')) {
            if ($this->form_validation->run() == FALSE) {
                switch ($this->input->post('task')) {
                    case 'spesialis.apply':
                        $spesialis = $this->_getDataArray();
                        if (isset($_REQUEST['id'])) {
                            $id = $_REQUEST['id'];
                            $this->Spesialis_Model->update(
                                $id,
                                $spesialis['spesialis'],
                                $spesialis['gelar'],
                                $spesialis['deskripsi'],
                                $spesialis['state'],
                                $spesialis['created_by_alias'],
                                $spesialis['modified'],
                                $spesialis['modified_by'],
                                $spesialis['attribs'],
                                $spesialis['version']

                            );
                        }
                        else {
                            $id = $this->Spesialis_Model->create(
                                $spesialis['spesialis'],
                                $spesialis['gelar'],
                                $spesialis['deskripsi'],
                                $spesialis['state'],
                                $spesialis['created_by_alias'],
                                $spesialis['modified'],
                                $spesialis['modified_by'],
                                $spesialis['attribs'],
                                $spesialis['version']
                            );
                        }
                        $data['data'] = $spesialis;
                        $this->session->set_flashdata('message', 'Category created');
                        redirect('spesialis/add?id='.$id, 'refresh');
                    case 'spesialis.save':
                        $spesialis = $this->_getDataArray();
                        $id = $this->Spesialis_Model->create(
                            $spesialis['spesialis'],
                            $spesialis['gelar'],
                            $spesialis['deskripsi'],
                            $spesialis['state'],
                            $spesialis['created_by_alias'],
                            $spesialis['modified'],
                            $spesialis['modified_by'],
                            $spesialis['attribs'],
                            $spesialis['version']
                        );
                        $this->session->set_flashdata('message', 'Category created');
                        redirect('spesialis/index', 'refresh');
                    case 'spesialis.save2new':
                        $spesialis = $this->_getDataArray();
                        $id = $this->Spesialis_Model->create(
                            $spesialis['spesialis'],
                            $spesialis['gelar'],
                            $spesialis['deskripsi'],
                            $spesialis['state'],
                            $spesialis['created_by_alias'],
                            $spesialis['modified'],
                            $spesialis['modified_by'],
                            $spesialis['attribs'],
                            $spesialis['version']
                        );
                        $spesialis = $this->_getEmptyDataArray();
                        $data['data'] = $spesialis;
                        $this->session->set_flashdata('message', 'Golongan telah disimpan.');
                        redirect('spesialis/add', 'refresh');
                    //case 'spesialis.cancel':
                        //redirect('spesialis', 'refresh');
                }
            }
        } else {
			$this->data['extraCSS'] = $this->css_edit();
			$this->data['extraJS'] = $this->js_edit();
            $this->data['admin_status'] = FALSE;
            $this->data['menu_active'] = 'Informasi';
            $this->data['title'] = "Spesialis";
            $this->data['module_title'] = VToolBar_Helper::title('Jurusan Manager: Tambah Jurusan');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/spesialis/edit';
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $spesialis = $this->Spesialis_Model->getById($id);
                $spesialis = array(
                    'id'            		=> $spesialis['id'],
                    'spesialis'				=> $spesialis['spesialis'],
                    'gelar'					=> $spesialis['gelar'],
					'deskripsi'				=> $spesialis['deskripsi'],
					'state'					=> $spesialis['state'],
					'created'				=> $spesialis['created'],
					'created_by'			=> $spesialis['created_by'],
					'created_by_alias'		=> $spesialis['created_by_alias'],
					'modified'				=> $spesialis['modified'],
					'modified_by'			=> $spesialis['modified_by'],
					'publish_up'			=> $spesialis['publish_up'],
					'publish_down'			=> $spesialis['publish_down'],
					'attribs'				=> $spesialis['attribs'],
					'version'				=> 0,
					'hits'					=> 0
                );
            }
            else {
                $spesialis = $this->_getEmptyDataArray();
            }
            $this->data['state'] = $this->Spesialis_Model->getState();
            $this->data['data'] = $spesialis;
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Informasi';
        $this->data['title'] = "Spesialis";
        $this->data['module_title'] = VToolBar_Helper::title('Spesialis Manager: Edit Spesialis');
        $this->addToolbarForm();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/spesialis/edit';
        $spesialis = $this->Spesialis_Model->getById($id);
        $this->data['data'] = array(
            'id'            		=> $spesialis->id,
            'spesialis'				=> $spesialis->spesialis,
            'gelar'					=> $spesialis->gelar,
            'deskripsi'				=> $spesialis->deskripsi,
            'state'					=> $spesialis->state,
            'created'				=> $spesialis->created,
            'created_by'			=> $spesialis->created_by,
            'created_by_alias'		=> $spesialis->created_by_alias,
            'modified'				=> $spesialis->modified,
            'modified_by'			=> $spesialis->modified_by,
            'attribs'				=> $spesialis->attribs,
            'version'				=> 0,
            'hits'					=> 0
        );
        $this->data['state'] = $this->Spesialis_Model->getState();
        $this->load->view('admin/template', $this->data);
    }
    
    public function delete() {
        if ($this->input->post('cid')) {
            $cid = $this->input->post('cid');
            foreach ($cid as $id) {
                $this->Model_Golongan->deleteGolongan($id);
            }
            $item = count($cid);
            if ($item > 0) {
                $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' golongan perkiraan telah di hapus.'));
            }
        }
        $limit = $this->input->post('limit');
        $limitstart = $this->input->post('limitstart');
        redirect('golongan/index/'.$limitstart.'/'.$limit, 'refresh');
    }
	
	private function _getEmptyDataArray()
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$date = date("Y-m-d H:i:s");
        $data = array(
            'id'				=> 0,
            'spesialis'			=> '',
			'gelar'				=> '',
			'deskripsi'			=> '',
			'state'				=> 1,
			'created'			=> $date,
			'created_by'		=> 0,
			'created_by_alias'	=> '',
			'modified'			=> NULL,
			'modified_by'		=> 0,
			'publish_up'		=> NULL,
			'publish_down'		=> NULL,
			'attribs'			=> '',
			'version'			=> 0,
			'hits'				=> 0
        );
        return $data;
    }
	
	private function _getDataArray()
    {
        $data = array(
            'spesialis'			=> $this->input->_clean_input_data($_POST['vform']['spesialis']),
			'gelar'				=> $this->input->_clean_input_data($_POST['vform']['gelar']),
			'deskripsi'			=> $this->input->_clean_input_data($_POST['vform']['deskripsi']),
			'state'				=> $this->input->_clean_input_data($_POST['vform']['state']),
			'created_by'		=> $this->input->_clean_input_data($_POST['vform']['created_by']),
			'created_by_alias'	=> $this->input->_clean_input_data($_POST['vform']['created_by_alias']),
			'modified'			=> $this->input->_clean_input_data($_POST['vform']['modified']),
			'modified_by'		=> $this->input->_clean_input_data($_POST['vform']['modified_by']),
			'attribs'			=> $this->input->_clean_input_data($_POST['vform']['attribs']),
			'version'			=> $this->input->_clean_input_data($_POST['vform']['version']),
        );
        return $data;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('kamus.add');
        VToolBar_Helper::editList('kamus.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'kamus.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('kamus.apply');
        VToolBar_Helper::save('kamus.save');
        VToolBar_Helper::save2new('kamus.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('kamus.cancel');
		} else {
			VToolBar_Helper::cancel('kamus.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help'));
	}
	
	private function css_view()
	{
		$css = '';
		$css .= '<link href="'.base_url().'css/modal.css" media="all" rel="stylesheet" type="text/css" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url().'css/extras.css" type="text/css" />'."\n";
		return $css;
	}
    

	
	private function css_edit()
	{
		$css = '';
		$css .= '<link rel="stylesheet" href="'.base_url().'css/modal.css" type="text/css"  title="Green"  media="all" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url().'css/calendar-jos.css" type="text/css"  title="Green"  media="all" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url().'css/extras.css" type="text/css" />'."\n";
		return $css;
	}
	
	private function js_view()
	{
		$js = '';
		$js .= '<script src="'.base_Url('js/multiselect.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/modal.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/MC.js').'" type="text/javascript"></script>'."\n";
		return $js;
	}
	
	private function js_edit()
	{
		$js = '';
		$js .= '<script src="'.base_Url('js/validate.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/modal.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/calendar.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/calendar-setup.js').'" type="text/javascript"></script>'."\n";
		/* $js .= '<script src="'.base_Url('js/MC.Switcher.js').'" type="text/javascript"></script>'."\n"; */
		$js .= '<script src="'.base_Url('js/MC.js').'" type="text/javascript"></script>'."\n";
		return $js;
	}
    
}

/* End of file kamus.php */
/* Location: ./application/controllers/kamus.php */