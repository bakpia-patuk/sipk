<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spesialis extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Spesialis_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'spesialis.add':
					redirect('admin/spesialis/add', 'refresh');
                case 'spesialis.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $spesialis_id = $id;
							break;
                        }
						redirect('admin/spesialis/edit/'.$spesialis_id, 'refresh');
                    }
                case 'spesialis.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Spesialis_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message', 'message' => $item.' spesialis telah di hapus.'));
                        }
                    }
                    redirect('admin/spesialis', 'refresh');
			}
		}
		
		$where = array();
		/*
		$this->data['filter_published'] = '';
		if ($this->input->post('filter_published')) {
			$where['state'] = $this->input->post('filter_published');
			$this->data['filter_published'] = $this->input->post('filter_published');
		}
		*/
		$like = array();
		$this->data['filter_search'] = '';
		if ($this->input->post('filter_search')) {
			$like['spesialis'] = $this->input->post('filter_search');
			$like['gelar'] = $this->input->post('filter_search');
			$like['deskripsi'] = $this->input->post('filter_search');
			$this->data['filter_search'] = $this->input->post('filter_search');
		}
		
		$this->data['extraCSS'] = $this->css_view();
		$this->data['extraJS'] = $this->js_view();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Informasi';
        $this->data['tab_active'] = 'Spesialis';
		$this->data['title'] = 'Daftar Spesialis';
		$this->data['module_title'] = VToolBar_Helper::title('Spesialis Manager: Daftar Spesialis');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/spesialis/view';

		if ($this->input->post('limit')) {
            $this->data['limit'] = $this->input->post('limit');
        }
		else {
			$this->data['limit'] = 10;
		}
		if ($this->input->post('limitstart')) {
            $this->data['limitstart'] = $this->input->post('limitstart');
        }
		else {
			$this->data['limitstart'] = 0;
		}
		
		if ($this->input->post('filter_order')) {
            $this->data['filter_order'] = $this->input->post('filter_order');
        }
		else {
			$this->data['filter_order'] = 'spesialis';
		}
		if ($this->input->post('filter_order_Dir')) {
            $this->data['filter_order_dir'] = $this->input->post('filter_order_Dir');
        }
		else {
			$this->data['filter_order_dir'] = 'asc';
		}
		$this->data['filter_order_dir'] = $this->data['filter_order_dir'] == 'asc' ? 'desc' : 'asc';
		
        $record = $this->Spesialis_Model->getAll($this->data['limit'], $this->data['limitstart'], $this->data['filter_order'], $this->data['filter_order_dir'], $where, $like);
		$this->load->library('pagination');
        
        $config['full_tag_open'] = "<del class=\"mc-pagination-container\">\n<div class=\"mc-pagination\">\n";
		$config['full_tag_close'] = "</div>\n</del>\n";
		
		$config['first_link'] = "Start";
		$config['first_tag_open'] = "<div class=\"page-button\">\n<div class=\"start\">\n";
		$config['first_tag_close'] = "</div>\n</div>\n";
		
		$config['prev_link'] = "Prev";
		$config['prev_tag_open'] = "<div class=\"page-button\">\n<div class=\"prev\">";
		$config['prev_tag_close'] = "</div>\n</div>\n";
		
		$config['full_page_open'] = "<div class=\"pages\">\n<div class=\"page\">\n";
		$config['full_page_close'] = "</div>\n</div>\n";
		
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		
		$config['num_tag_open'] = '';
		$config['num_tag_close'] = '';
		
		$config['next_link'] = "Next";
		$config['next_tag_open'] = "<div class=\"page-button\">\n<div class=\"next\">";
		$config['next_tag_close'] = "</div>\n</div>\n";
		
		$config['last_link'] = 'End';
		$config['last_tag_open'] = "<div class=\"page-button\">\n<div class=\"end\">\n";
		$config['last_tag_close'] = "</div>\n</div>\n";
		
		$config['inactive_tag_open'] = '<span>';
		$config['inactive_tag_close'] = '</span>';
        
        $config['full_page_counter_open']      = '<div class="mc-page-count">';
        $config['full_page_counter_close']     = '</div>';
        
        $config['full_limit_box_open']      = '<div class="mc-limit">';
        $config['full_limit_box_close']     = '</div>';
        $config['title_limit_box_open']     = '<span>';
        $config['title_limit_box_close']    = '</span>';
        $config['title_limit_box_before']   = FALSE;
        
        $config['base_url'] = site_url('admin/spesialis/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		$this->data['spesialis_state'] = $this->Spesialis_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        
        $this->form_validation->set_error_delimiters('<div class="error" style="color: #CC0000; margin-left: 150px;">', '</div>');
		$this->form_validation->set_rules('jform[id]', 'ID', '');
        $this->form_validation->set_rules('jform[spesialis]', 'Spesialis', 'required');
        $this->form_validation->set_rules('jform[state]', 'Status', '');
        $this->form_validation->set_rules('jform[gelar]', 'Gelar', '');
        $this->form_validation->set_rules('jform[deskripsi]', 'Deskripsi', '');
        
        if ($this->input->post('task')) {
            if ($this->form_validation->run() == TRUE) {
                switch ($this->input->post('task')) {
                    case 'spesialis.apply':
                        $spesialis = $this->_getDataArray();
                        if (isset($spesialis->id) && $spesialis->id > 0) {
                            $id =$spesialis->id;
                            $this->Spesialis_Model->update($spesialis);
                        }
                        else {
                            $id = $this->Spesialis_Model->create($spesialis);
                        }
                        $data['data'] = $spesialis;
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Spesialis telah di simpan.'));
                        redirect('admin/spesialis/edit/'.$id.'/close', 'refresh');
                    case 'spesialis.save':
                        $spesialis = $this->_getDataArray();
						if (isset($spesialis->id) && $spesialis->id > 0) {
                            $id = $spesialis->id;
                            $this->Spesialis_Model->update($spesialis);
                        }
                        else {
                            $id = $this->Spesialis_Model->create($spesialis);
                        }
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Spesialis telah di simpan.'));
                        redirect('admin/spesialis/index', 'refresh');
                    case 'spesialis.save2new':
                        $spesialis = $this->_getDataArray();
						if (isset($spesialis->id) && $spesialis->id > 0) {
                            $id = $spesialis->id;
                            $this->Spesialis_Model->update($spesialis);
                        }
                        else {
                            $id = $this->Spesialis_Model->create($spesialis);
                        }
                        $data['data'] = $this->_getEmptyDataArray();
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Spesialis telah di simpan.'));
                        redirect('admin/spesialis/add', 'refresh');
                }
				$display = FALSE;
            }
			else {
                $display = TRUE;
            }
		} else {
            $display = TRUE;
        }
        if ($display == TRUE) {
			$this->data['extraCSS'] = $this->css_edit();
			$this->data['extraJS'] = $this->js_edit();
            $this->data['admin_status'] = FALSE;
            $this->data['menu_active'] = 'Informasi';
            $this->data['title'] = "Spesialis";
            $this->data['module_title'] = VToolBar_Helper::title('Spesialis Manager: Tambah Spesialis');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/spesialis/edit';
			
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $spesialis = $this->Spesialis_Model->getById($id);
                $this->data['is_new'] = FALSE;
            }
            else {
                $spesialis = $this->_getEmptyDataArray();
                $this->data['is_new'] = TRUE;
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
        $this->data['title'] = "Daftar Spesialis";
        $this->data['module_title'] = VToolBar_Helper::title('Spesialis Manager: Edit Spesialis');
		if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/spesialis/edit';
		$this->data['is_new'] = FALSE;
		
		$spesialis = $this->Spesialis_Model->getById($id);
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$spesialis->modified = date("Y-m-d H:i:s");
		$spesialis->version++;
		$this->data['data'] = $spesialis;
		$this->data['spesialis_state'] = $this->Spesialis_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	private function _getEmptyDataArray()
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $spesialis = new StdClass();
        $spesialis->id = 0;
        $spesialis->spesialis			= '';
		$spesialis->gelar				= '';
		$spesialis->deskripsi			= '';
		$spesialis->state				= 1;
		$spesialis->created             = $current_date;
		$spesialis->created_by          = 0;
		$spesialis->created_by_alias    = '';
		$spesialis->modified			= '0000-00-00 00:00:00';
		$spesialis->modified_by         = 0;
		$spesialis->attribs         	= '';
		$spesialis->version             = 0;
		$spesialis->hits				= 0;
        return $spesialis;
    }
	
	private function _getDataArray()
    {
        $spesialis = new StdClass();
		$spesialis->id               	= isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $spesialis->spesialis			= $this->input->_clean_input_data($_POST['jform']['spesialis']);
		$spesialis->gelar				= $this->input->_clean_input_data($_POST['jform']['gelar']);
		$spesialis->deskripsi			= $this->input->_clean_input_data($_POST['jform']['deskripsi']);
		$spesialis->state				= $this->input->_clean_input_data($_POST['jform']['state']);
		$spesialis->created_by			= $this->input->_clean_input_data($_POST['jform']['created_by']);
		$spesialis->created_by_alias	= $this->input->_clean_input_data($_POST['jform']['created_by_alias']);
		//$spesialis->modified			= isset($_POST['jform']['modified']) ? $this->input->_clean_input_data($_POST['jform']['modified']) : '0000-00-00 00:00:00';
		$spesialis->modified_by      	= isset($_POST['jform']['modified_by']) && ($_POST['jform']['modified_by'] > 0) ? $this->input->_clean_input_data($_POST['jform']['modified_by']) : 0;
		$spesialis->attribs         	= ''; //isset$this->input->_clean_input_data($_POST['jform']['attribs']);
		$spesialis->version          	= isset($_POST['jform']['version']) && ($_POST['jform']['version'] > 0) ? $this->input->_clean_input_data($_POST['jform']['version']) : 0;
        return $spesialis;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('spesialis.add');
        VToolBar_Helper::editList('spesialis.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'spesialis.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_spesialis_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('spesialis.apply');
        VToolBar_Helper::save('spesialis.save');
        VToolBar_Helper::save2new('spesialis.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('spesialis.cancel');
		} else {
			VToolBar_Helper::cancel('spesialis.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_spesialis_manager_edit'));
	}
	
	private function css_view()
	{
		$css = '';
		$css .= '<link href="'.base_url().'css/admin/modal.css" media="all" rel="stylesheet" type="text/css" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url().'css/admin/extras.css.php" type="text/css" />'."\n";
		return $css;
	}
	
	private function css_edit()
	{
		$css = '';
		$css .= '<link rel="stylesheet" href="'.base_url().'css/admin/modal.css" type="text/css"  title="Green"  media="all" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url().'css/admin/calendar-jos.css" type="text/css"  title="Green"  media="all" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url().'css/admin/extras.css.php" type="text/css" />'."\n";
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
		/* $js .= '<script src="'.base_Url('js/admin/MC.Switcher.js').'" type="text/javascript"></script>'."\n"; */
		$js .= '<script src="'.base_Url('js/admin/MC.js').'" type="text/javascript"></script>'."\n";
		return $js;
	}
    
}

/* End of file spesialis.php */
/* Location: ./application/controllers/spesialis.php */