<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obat extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Obat_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'obat.add':
					redirect('admin/obat/add', 'refresh');
                case 'obat.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $obat_id = $id;
							break;
                        }
						redirect('admin/obat/edit/'.$obat_id, 'refresh');
                    }
                case 'obat.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Obat_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' Obat telah di hapus.'));
                        }
                    }
                    redirect('admin/obat', 'refresh');
			}
		}
		
		$where = array();
		if ($this->input->post('filter_published')) {
			$where['state'] = $this->input->post('filter_published');
		}
		$like = array();
		$this->data['filter_search'] = '';
		if ($this->input->post('filter_search')) {
			$like['nama'] = $this->input->post('filter_search');
			$like['deskripsi'] = $this->input->post('filter_search');
			$this->data['filter_search'] = $this->input->post('filter_search');
		}
		
		$this->data['extraCSS'] = $this->css_view();
		$this->data['extraJS'] = $this->js_view();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Informasi';
        $this->data['tab_active'] = 'Obat';
		$this->data['title'] = 'Daftar Obat';
		$this->data['module_title'] = VToolBar_Helper::title('Obat Manager: Obat');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/obat/view';
		
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
		
        $record = $this->Obat_Model->getAll($this->data['limit'], $this->data['limitstart'], $this->data['filter_order'], $this->data['filter_order_dir'], $where, $like);
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
        
        $config['base_url'] = site_url('admin/obat/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		$this->data['obat_state'] = $this->Obat_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        
        $this->form_validation->set_error_delimiters('<div class="error" style="color: #CC0000; margin-left: 150px;">', '</div>');
		$this->form_validation->set_rules('jform[id]', 'ID', '');
        $this->form_validation->set_rules('jform[nama]', 'Nama', 'required');
        $this->form_validation->set_rules('jform[state]', 'Status', '');
        $this->form_validation->set_rules('jform[deskripsi]', 'Deskripsi Obat', '');
		$this->form_validation->set_rules('jform[komposisi]', 'Komposisi', '');
		$this->form_validation->set_rules('jform[dosis]', 'Dosis', '');
		$this->form_validation->set_rules('jform[indikasi]', 'Indikasi', '');
		$this->form_validation->set_rules('jform[paket]', 'Paket', '');
		$this->form_validation->set_rules('jform[no_registrasi]', 'No. Registrasi', '');
		$this->form_validation->set_rules('jform[produksi]', 'Di Produksi oleh', '');
		$this->form_validation->set_rules('jform[catatan]', 'Catatan', '');
        
        if ($this->input->post('task')) {
            if ($this->form_validation->run() == TRUE) {
                switch ($this->input->post('task')) {
                    case 'obat.apply':
                        $obat = $this->_getDataArray();
                        if (isset($obat->id) && $obat->id > 0) {
                            $id = $obat->id;
                            $this->Obat_Model->update($obat);
                        }
                        else {
                            $id = $this->Obat_Model->create($obat);
                        }
                        $data['data'] = $obat;
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Obat telah di simpan.'));
                        redirect('admin/obat/edit/'.$id.'/close', 'refresh');
                    case 'obat.save':
                        $obat = $this->_getDataArray();
						if (isset($obat->id) && $obat->id > 0) {
                            $id = $obat->id;
                            $this->Obat_Model->update($obat);
                        }
                        else {
                            $id = $this->Obat_Model->create($obat);
                        }
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Obat telah di simpan.'));
                        redirect('admin/obat/index', 'refresh');
                    case 'obat.save2new':
                        $obat = $this->_getDataArray();
						if (isset($obat->id) && $obat->id > 0) {
                            $id = $obat->id;
                            $this->Obat_Model->update($obat);
                        }
                        else {
                            $id = $this->Obat_Model->create($obat);
                        }
                        $data['data'] = $this->_getEmptyDataArray();
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Obat telah di simpan.'));
                        redirect('admin/obat/add', 'refresh');
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
            $this->data['title'] = "Daftar Obat";
            $this->data['module_title'] = VToolBar_Helper::title('Obat Manager: Tambah Obat');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/obat/edit';
			
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $obat = $this->Obat_Model->getById($id);
                $this->data['is_new'] = FALSE;
            }
            else {
                $obat = $this->_getEmptyDataArray();
                $this->data['is_new'] = TRUE;
            }
            
            $this->data['data'] = $obat;
            $this->data['obat_state'] = $this->Obat_Model->getState();
            
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Informasi';
        $this->data['title'] = "Daftar Obat";
        $this->data['module_title'] = VToolBar_Helper::title('Obat Manager: Edit Obat');
		if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/obat/edit';
		$this->data['is_new'] = FALSE;
		
		$obat = $this->Obat_Model->getById($id);
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$obat->modified = date("Y-m-d H:i:s");
		$obat->version++;
		$this->data['data'] = $obat;
		$this->data['obat_state'] = $this->Obat_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	private function _getEmptyDataArray()
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $obat = new StdClass();
        $obat->id				= 0;
        $obat->nama             = '';
		$obat->deskripsi		= '';
		$obat->image            = '';
        $obat->thumbnail  		= '';
        $obat->komposisi 		= '';
        $obat->dosis  			= '';
        $obat->indikasi  		= '';
        $obat->paket  			= '';
        $obat->no_registrasi  	= '';
        $obat->produksi  		= '';
        $obat->catatan  		= '';
		$obat->state			= 1;
		$obat->created			= $current_date;
		$obat->created_by		= 0;
		$obat->created_by_alias	= '';
		$obat->modified			= NULL;
		$obat->modified_by		= 0;
		$obat->attribs			= '';
		$obat->version			= 0;
		$obat->hits				= 0;
        return $obat;
    }
	
	private function _getDataArray()
    {
        $obat = new StdClass();
		$obat->id				= isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $obat->nama             = $this->input->_clean_input_data($_POST['jform']['nama']);
		$obat->deskripsi		= $this->input->_clean_input_data($_POST['jform']['deskripsi']);
		$obat->image			= $this->input->_clean_input_data($_POST['jform']['image']);
        $obat->thumbnail  		= $this->input->_clean_input_data($_POST['jform']['thumbnail']);
        $obat->komposisi 		= $this->input->_clean_input_data($_POST['jform']['komposisi']);
        $obat->dosis  			= $this->input->_clean_input_data($_POST['jform']['dosis']);
        $obat->indikasi  		= $this->input->_clean_input_data($_POST['jform']['indikasi']);
        $obat->paket  			= $this->input->_clean_input_data($_POST['jform']['paket']);
        $obat->no_registrasi  	= $this->input->_clean_input_data($_POST['jform']['no_registrasi']);
        $obat->produksi  		= $this->input->_clean_input_data($_POST['jform']['produksi']);
        $obat->catatan  		= $this->input->_clean_input_data($_POST['jform']['catatan']);
        $obat->state			= $this->input->_clean_input_data($_POST['jform']['state']);
        $obat->created_by		= $this->input->_clean_input_data($_POST['jform']['created_by']);
        $obat->created_by_alias	= $this->input->_clean_input_data($_POST['jform']['created_by_alias']);
        //$obat->modified         = $this->input->_clean_input_data($_POST['jform']['modified']);
        $obat->modified_by      = isset($_POST['jform']['modified_by']) && ($_POST['jform']['modified_by'] > 0) ? $this->input->_clean_input_data($_POST['jform']['modified_by']) : 0;
		$obat->attribs         	= ''; //isset$this->input->_clean_input_data($_POST['jform']['attribs']);
		$obat->version          = isset($_POST['jform']['version']) && ($_POST['jform']['version'] > 0) ? $this->input->_clean_input_data($_POST['jform']['version']) : 0;
        return $obat;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('obat.add');
        VToolBar_Helper::editList('obat.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'obat.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_obat_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('obat.apply');
        VToolBar_Helper::save('obat.save');
        VToolBar_Helper::save2new('obat.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('obat.cancel');
		} else {
			VToolBar_Helper::cancel('obat.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_obat_manager_edit'));
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

/* End of file obat.php */
/* Location: ./application/controllers/obat.php */