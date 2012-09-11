<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obat_Herbal extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Obat_Herbal_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'obat_herbal.add':
					redirect('admin/obat_herbal/add', 'refresh');
                case 'obat_herbal.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $obat_herbal_id = $id;
							break;
                        }
						redirect('admin/obat_herbal/edit/'.$obat_herbal_id, 'refresh');
                    }
                case 'obat_herbal.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Obat_Herbal_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' Obat Herbal telah di hapus.'));
                        }
                    }
                    redirect('admin/obat_herbal', 'refresh');
			}
		}
		
		$where = array();
		if ($this->input->post('filter_published')) {
			$where['state'] = $this->input->post('filter_published');
		}
		$like = array();
		if ($this->input->post('filter_search')) {
			$like['nama'] = $this->input->post('filter_search');
			$like['wilayah'] = $this->input->post('filter_search');
		}
		
		$this->data['extraCSS'] = $this->css_view();
		$this->data['extraJS'] = $this->js_view();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Informasi';
        $this->data['tab_active'] = 'Obat Herbal';
		$this->data['title'] = 'Daftar Obat Herbal';
		$this->data['module_title'] = VToolBar_Helper::title('Obat Herbal Manager: Daftar Obat Herbal');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/obat_herbal/view';

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
			$this->data['filter_order'] = 'nama';
		}
		if ($this->input->post('filter_order_dir')) {
            $this->data['filter_order_dir'] = $this->input->post('filter_order_dir');
        }
		else {
			$this->data['filter_order_dir'] = 'asc';
		}
		
        $record = $this->Obat_Herbal_Model->getAll($this->data['limit'], $this->data['limitstart'], $this->data['filter_order'], $this->data['filter_order_dir'], $where, $like);
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
        
        $config['base_url'] = site_url('admin/obat_herbal/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
        $this->data['obat_herbal_state'] = $this->Obat_Herbal_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        
        //$this->form_validation->set_rules('nama', 'Nama', 'required');
		//$this->form_validation->set_rules('gelar', 'Gelar', 'required');
        
        if ($this->input->post('task')) {
            if ($this->form_validation->run() == FALSE) {
                switch ($this->input->post('task')) {
                    case 'obat_herbal.apply':
                        $obat_herbal = $this->_getDataArray();
                        if (isset($obat_herbal->id) && $obat_herbal->id > 0) {
                            $id = $obat_herbal->id;
                            $this->Obat_Herbal_Model->update($obat_herbal);
                        }
                        else {
                            $id = $this->Obat_Herbal_Model->create($obat_herbal);
                        }
                        $data['data'] = $obat_herbal;
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Obat Herbal telah di simpan.'));
                        redirect('admin/obat_herbal/edit/'.$id.'/close', 'refresh');
                    case 'obat_herbal.save':
                        $obat_herbal = $this->_getDataArray();
						if (isset($obat_herbal->id) && $obat_herbal->id > 0) {
                            $id = $obat_herbal->id;
                            $this->Obat_Herbal_Model->update($obat_herbal);
                        }
                        else {
                            $id = $this->Obat_Herbal_Model->create($obat_herbal);
                        }
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Obat Herbal telah di simpan.'));
                        redirect('admin/obat_herbal/index', 'refresh');
                    case 'obat_herbal.save2new':
                        $obat_herbal = $this->_getDataArray();
						if (isset($obat_herbal->id) && $obat_herbal->id > 0) {
                            $id = $obat_herbal->id;
                            $this->Obat_Herbal_Model->update($obat_herbal);
                        }
                        else {
                            $id = $this->Obat_Herbal_Model->create($obat_herbal);
                        }
                        $data['data'] = $this->_getEmptyDataArray();
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Obat Herbal telah di simpan.'));
                        redirect('admin/obat_herbal/add', 'refresh');
                }
            }
        } else {
			$this->data['extraCSS'] = $this->css_edit();
			$this->data['extraJS'] = $this->js_edit();
            $this->data['admin_status'] = FALSE;
            $this->data['menu_active'] = 'Informasi';
            $this->data['title'] = "Daftar Obat Herbal";
            $this->data['module_title'] = VToolBar_Helper::title('Obat Herbal Manager: Tambah Obat Herbal');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/obat_herbal/edit';
			
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $obat_herbal = $this->Obat_Herbal_Model->getById($id);
                $this->data['is_new'] = FALSE;
            }
            else {
                $obat_herbal = $this->_getEmptyDataArray();
                $this->data['is_new'] = TRUE;
            }
            
            $this->data['data'] = $obat_herbal;
            $this->data['obat_herbal_state'] = $this->Obat_Herbal_Model->getState();
            
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Informasi';
        $this->data['title'] = "Daftar Obat Herbal";
        $this->data['module_title'] = VToolBar_Helper::title('Obat Herbal Manager: Edit Obat Herbal');
		if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/obat_herbal/edit';
		$this->data['is_new'] = FALSE;
		
		$obat_herbal = $this->Obat_Herbal_Model->getById($id);
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$obat_herbal->modified = date("Y-m-d H:i:s");
		$obat_herbal->version++;
		$this->data['data'] = $obat_herbal;
		$this->data['obat_herbal_state'] = $this->Obat_Herbal_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	private function _getEmptyDataArray()
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $obat_herbal = new StdClass();
        $obat_herbal->id				= 0;
        $obat_herbal->nama				= '';
		$obat_herbal->image             = '';
		$obat_herbal->thumbnail         = '';
        $obat_herbal->kandungan         = '';
        $obat_herbal->khasiat           = '';
        $obat_herbal->catatan           = '';
		$obat_herbal->state             = 1;
		$obat_herbal->created			= $current_date;
		$obat_herbal->created_by		= 0;
		$obat_herbal->created_by_alias	= '';
		$obat_herbal->modified			= NULL;
		$obat_herbal->modified_by		= 0;
		$obat_herbal->attribs			= '';
		$obat_herbal->version			= 0;
		$obat_herbal->hits				= 0;
        return $obat_herbal;
    }
	
	private function _getDataArray()
    {
        $obat_herbal = new StdClass();
		$obat_herbal->id				= isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $obat_herbal->nama              = $this->input->_clean_input_data($_POST['jform']['nama']);
		$obat_herbal->image             = $this->input->_clean_input_data($_POST['jform']['image']);
		$obat_herbal->thumbnail         = $this->input->_clean_input_data($_POST['jform']['thumbnail']);
        $obat_herbal->kandungan         = $this->input->_clean_input_data($_POST['jform']['kandungan']);
        $obat_herbal->khasiat           = $this->input->_clean_input_data($_POST['jform']['khasiat']);
        $obat_herbal->catatan           = $this->input->_clean_input_data($_POST['jform']['catatan']);
		$obat_herbal->state             = $this->input->_clean_input_data($_POST['jform']['state']);
		$obat_herbal->created_by		= $this->input->_clean_input_data($_POST['jform']['created_by']);
		$obat_herbal->created_by_alias	= $this->input->_clean_input_data($_POST['jform']['created_by_alias']);
		//$obat_herbal->modified			= $this->input->_clean_input_data($_POST['jform']['modified']);
		$obat_herbal->modified_by		= isset($_POST['jform']['modified_by']) && ($_POST['jform']['modified_by'] > 0) ? $this->input->_clean_input_data($_POST['jform']['modified_by']) : 0;
		$obat_herbal->attribs			= ''; //isset$this->input->_clean_input_data($_POST['jform']['attribs']);
		$obat_herbal->version			= isset($_POST['jform']['version']) && ($_POST['jform']['version'] > 0) ? $this->input->_clean_input_data($_POST['jform']['version']) : 0;
        return $obat_herbal;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('obat_herbal.add');
        VToolBar_Helper::editList('obat_herbal.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'obat_herbal.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_obat_herbal_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('obat_herbal.apply');
        VToolBar_Helper::save('obat_herbal.save');
        VToolBar_Helper::save2new('obat_herbal.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('obat_herbal.cancel');
		} else {
			VToolBar_Helper::cancel('obat_herbal.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_obat_herbal_manager_edit'));
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
		/* $js .= '<script src="'.base_Url('js/admin/MC.Switcher.js').'" type="text/javascript"></script>'."\n"; */
		$js .= '<script src="'.base_Url('js/admin/MC.js').'" type="text/javascript"></script>'."\n";
		return $js;
	}
    
}

/* End of file obat_herbal.php */
/* Location: ./application/controllers/obat_herbal.php */