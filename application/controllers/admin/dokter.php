<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dokter_Model');
        $this->load->model('Dokter_Praktek_Model');
		$this->load->model('Spesialis_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'dokter.add':
					redirect('admin/dokter/add', 'refresh');
                case 'dokter.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $dokter_id = $id;
							break;
                        }
						redirect('admin/dokter/edit/'.$dokter_id, 'refresh');
                    }
                case 'dokter.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Dokter_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' Dokter telah di hapus'));
                        }
                    }
                    redirect('admin/dokter', 'refresh');
			}
		}
		
		$where = array();
		if ($this->input->post('filter_published')) {
			$where['dokter.state'] = $this->input->post('filter_published');
		}
		if ($this->input->post('filter_wilayah')) {
			$where['wilayah'] = $this->input->post('filter_wilayah');
		}
		$like = array();
		$this->data['filter_search'] = '';
		if ($this->input->post('filter_search')) {
			$like['nama'] = $this->input->post('filter_search');
			$like['wilayah'] = $this->input->post('filter_search');
			$this->data['filter_search'] = $this->input->post('filter_search');
		}
		
		$this->data['extraCSS'] = $this->css_view();
		$this->data['extraJS'] = $this->js_view();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Informasi';
        $this->data['tab_active'] = 'Dokter';
		$this->data['title'] = 'Dokter';
		$this->data['module_title'] = VToolBar_Helper::title('Dokter Manager: Dokter');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/dokter/view';

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
		
        $record = $this->Dokter_Model->getAll($this->data['limit'], $this->data['limitstart'], $this->data['filter_order'], $this->data['filter_order_dir'], $where, $like);
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
        
        $config['base_url'] = site_url('admin/dokter/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		$this->data['dokter_wilayah'] = $this->Dokter_Model->getWilayah(FALSE, FALSE);
		$this->data['dokter_state'] = $this->Dokter_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        $this->form_validation->set_error_delimiters('<div class="error" style="color: #CC0000; margin-left: 150px;">', '</div>');
		$this->form_validation->set_rules('jform[id]', 'ID', '');
        $this->form_validation->set_rules('jform[nama]', 'Nama', 'required');
		$this->form_validation->set_rules('jform[state]', 'Status', '');
		$this->form_validation->set_rules('jform[wilayah]', 'Wilayah', '');
		$this->form_validation->set_rules('jform[alamat]', 'Alamat', '');
		$this->form_validation->set_rules('jform[telepon]', 'Telepon', '');
		$this->form_validation->set_rules('jform[praktek_id]', 'Telepon', '');
		$this->form_validation->set_rules('jform[alamat_praktek]', 'Alamat', '');
		$this->form_validation->set_rules('jform[telepon_praktek]', 'Telepon', '');
		$this->form_validation->set_rules('jform[no_izin_praktek]', 'No. Izin Praktek', '');
		$this->form_validation->set_rules('jform[masa_berlaku_izin]', 'Masa Berlaku Izin Praktek', '');
		$this->form_validation->set_rules('jform[spesialis_id]', 'Spesialis', '');
		$this->form_validation->set_rules('jform[email]', 'E-Mail', '');
		$this->form_validation->set_rules('jform[website]', 'Web Site', '');
		$this->form_validation->set_rules('jform[catatan]', 'Catatan', '');
        
        if ($this->input->post('task')) {
            if ($this->form_validation->run() == TRUE) {
                switch ($this->input->post('task')) {
                    case 'dokter.apply':
                        $dokter = $this->_getDataArray();
                        if (isset($dokter->id) && $dokter->id > 0) {
                            $id = $dokter->id;
                            $this->Dokter_Model->update($dokter);
                        }
                        else {
                            $id = $this->Dokter_Model->create($dokter);
                        }
                        $data['data'] = $dokter;
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Dokter telah di simpan.'));
                        redirect('admin/dokter/edit/'.$id.'/close', 'refresh');
                    case 'dokter.save':
                        $dokter = $this->_getDataArray();
						if (isset($dokter->id) && $dokter->id > 0) {
                            $id = $dokter->id;
                            $this->Dokter_Model->update($dokter);
                        }
                        else {
                            $id = $this->Dokter_Model->create($sekolah);
                        }
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Dokter telah di simpan.'));
                        redirect('admin/dokter', 'refresh');
                    case 'dokter.save2new':
                        $dokter = $this->_getDataArray();
						if (isset($dokter->id) && $dokter->id > 0) {
                            $id = $dokter->id;
                            $this->Dokter_Model->update($dokter);
                        }
                        else {
                            $id = $this->Dokter_Model->create($dokter);
                        }
                        $data['data'] = $this->_getEmptyDataArray();
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Dokter telah di simpan.'));
                        redirect('admin/dokter/add', 'refresh');
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
            $this->data['title'] = "Dokter";
            $this->data['module_title'] = VToolBar_Helper::title('Dokter Manager: Tambah Dokter');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/dokter/edit';
			
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $dokter = $this->Dokter_Model->getById($id);
                $this->data['is_new'] = FALSE;
            }
            else {
                $dokter = $this->_getEmptyDataArray();
                $this->data['is_new'] = TRUE;
            }
            
            $this->data['data'] = $dokter;
			$this->data['dokter_wilayah'] = $this->Dokter_Model->getWilayah(FALSE, TRUE);
			$spesialis = $this->Spesialis_Model->getAll(0, 0, 'spesialis', 'asc', array(), array());
			$this->data['dokter_spesialis'] = $spesialis['data'];
            $this->data['dokter_state'] = $this->Dokter_Model->getState();
            $praktek = $this->Dokter_Praktek_Model->getAllByDokterId($dokter->id);
            $this->data['dokter_praktek'] = $praktek['data'];
            
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Informasi';
        $this->data['title'] = "Daftar Dokter";
        $this->data['module_title'] = VToolBar_Helper::title('Dokter Manager: Edit Dokter');
		if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/dokter/edit';
		$this->data['is_new'] = FALSE;
		
		$dokter = $this->Dokter_Model->getById($id);
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$dokter->modified = date("Y-m-d H:i:s");
		$dokter->version++;
		$this->data['data'] = $dokter;
		$this->data['dokter_wilayah'] = $this->Dokter_Model->getWilayah(FALSE, TRUE);
		$spesialis = $this->Spesialis_Model->getAll(0);
		$this->data['dokter_spesialis'] = $spesialis['data'];
		$this->data['dokter_state'] = $this->Dokter_Model->getState();
		$praktek = $this->Dokter_Praktek_Model->getAllByDokterId($dokter->id);
		$this->data['dokter_praktek'] = $praktek['data'];
		
        $this->load->view('admin/template', $this->data);
    }
	
	private function _getEmptyDataArray()
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $dokter = new StdClass();
        $dokter->id                 = 0;
        $dokter->nama               = '';
		$dokter->wilayah			= '';
        $dokter->alamat				= '';
        $dokter->telepon			= '';
        $dokter->masa_berlaku_izin	= '';
        $dokter->spesialis_id		= 0;
        $dokter->email              = '';
        $dokter->website			= '';
        $dokter->catatan			= '';
        $dokter->state				= 1;
        $dokter->created			= $current_date;
        $dokter->created_by     	= 0;
        $dokter->created_by_alias	= '';
        $dokter->modified			= $current_date;
        $dokter->modified_by		= 0;
        $dokter->attribs			= '';
        $dokter->version			= 0;
        $dokter->hits				= 0;
        $dokter->metakey			= '';
        $dokter->own_prefix         = 0;
        $dokter->metakey_prefix     = '';
        return $dokter;
    }
	
	private function _getDataArray()
    {
        $dokter = new StdClass();
		$dokter->id               	= isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $dokter->nama               = $this->input->_clean_input_data($_POST['jform']['nama']);
		$dokter->wilayah			= $this->input->_clean_input_data($_POST['jform']['wilayah']);
		$dokter->alamat				= $this->input->_clean_input_data($_POST['jform']['alamat']);
		$dokter->telepon			= $this->input->_clean_input_data($_POST['jform']['telepon']);
        $dokter->masa_berlaku_izin	= $this->input->_clean_input_data($_POST['jform']['masa_berlaku_izin']);
        $dokter->spesialis_id		= $this->input->_clean_input_data($_POST['jform']['spesialis_id']);
        $dokter->email              = $this->input->_clean_input_data($_POST['jform']['email']);
        $dokter->website			= $this->input->_clean_input_data($_POST['jform']['website']);
        $dokter->catatan			= $this->input->_clean_input_data($_POST['jform']['catatan']);
		$dokter->state				= $this->input->_clean_input_data($_POST['jform']['state']);
		$dokter->created_by         = $this->input->_clean_input_data($_POST['jform']['created_by']);
		$dokter->created_by_alias   = $this->input->_clean_input_data($_POST['jform']['created_by_alias']);
		//$dokter->modified			= $this->input->_clean_input_data($_POST['jform']['modified']);
		$dokter->modified_by        = isset($_POST['jform']['modified_by']) && ($_POST['jform']['modified_by'] > 0) ? $this->input->_clean_input_data($_POST['jform']['modified_by']) : 0;
		$dokter->attribs         	= ''; //isset$this->input->_clean_input_data($_POST['jform']['attribs']);
		$dokter->version            = isset($_POST['jform']['version']) && ($_POST['jform']['version'] > 0) ? $this->input->_clean_input_data($_POST['jform']['version']) : 0;
        $dokter->metakey			= $this->input->_clean_input_data($_POST['jform']['metakey']);
        $dokter->own_prefix         = $this->input->_clean_input_data($_POST['jform']['own_prefix']);
        $dokter->metakey_prefix     = $this->input->_clean_input_data($_POST['jform']['metakey_prefix']);
        $dokter_prakteks			= $this->Dokter_Praktek_Model->getAllByDokterId($dokter->id);
        $dokter->prakteks			= $dokter_prakteks['data'];
        
		$aPrakteks = array();
        foreach ($dokter->prakteks as $praktek) {
            if ($praktek->dokter_id != $dokter->id) {
                $praktek->dokter_id = $dokter->id;
            }
            $aPrakteks[$praktek->id] = $praktek;
            $aPrakteks[$praktek->id]->status_edit = MODE_DELETE;
        }
        if (isset($_POST['jform']['praktek_id'])) {
            for ($i = 0; $i < count($_POST['jform']['praktek_id']); $i++) {
                $praktek_id = $_POST['jform']['praktek_id'][$i];
                if (!array_key_exists(intval($praktek_id), $aPrakteks)) {
                    $praktek = new StdClass();
                    $praktek->id = $praktek_id;
                    $praktek->dokter_id = $dokter->id;
                    $praktek->ordering = $i + 1;
                    $praktek->alamat = $this->input->_clean_input_data($_POST['jform']['alamat_praktek'][$i]);
                    $praktek->telepon = $this->input->_clean_input_data($_POST['jform']['telepon_praktek'][$i]);
                    $praktek->no_izin = $this->input->_clean_input_data($_POST['jform']['no_izin_praktek'][$i]);
                    $praktek->status_edit = MODE_ADD;
                    $aPrakteks[$praktek_id] = $praktek;
                }
                else {
                    $aPrakteks[$praktek_id]->ordering = $i + 1;
                    $aPrakteks[$praktek_id]->alamat = $this->input->_clean_input_data($_POST['jform']['alamat_praktek'][$i]);
                    $aPrakteks[$praktek_id]->telepon = $this->input->_clean_input_data($_POST['jform']['telepon_praktek'][$i]);
                    $aPrakteks[$praktek_id]->no_izin = $this->input->_clean_input_data($_POST['jform']['no_izin_praktek'][$i]);
                    $aPrakteks[$praktek_id]->status_edit = MODE_EDIT;
                }
            }
        }
        $dokter->prakteks = $aPrakteks;
        
        return $dokter;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('dokter.add');
        VToolBar_Helper::editList('dokter.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'dokter.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_dokter_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('dokter.apply');
        VToolBar_Helper::save('dokter.save');
        VToolBar_Helper::save2new('dokter.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('dokter.cancel');
		} else {
			VToolBar_Helper::cancel('dokter.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_dokter_manager_edit'));
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

/* End of file dokter.php */
/* Location: ./application/controllers/dokter.php */