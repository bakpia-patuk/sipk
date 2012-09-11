<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sekolah_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'sekolah.add':
					redirect('admin/sekolah/add', 'refresh');
				case 'sekolah.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $sekolah_id = $id;
							break;
                        }
						redirect('admin/sekolah/edit/'.$sekolah_id, 'refresh');
                    }
                case 'sekolah.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Sekolah_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' sekolah telah di hapus.'));
                        }
                    }
                    redirect('admin/sekolah', 'refresh');
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
			$like['nama'] = $this->input->post('filter_search');
			$like['alamat'] = $this->input->post('filter_search');
			$this->data['filter_search'] = $this->input->post('filter_search');
		}
		
		$this->data['extraCSS'] = $this->css_view();
		$this->data['extraJS'] = $this->js_view();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Informasi';
		$this->data['title'] = 'Daftar Sekolah';
		$this->data['module_title'] = VToolBar_Helper::title('Sekolah Manager: Daftar Sekolah');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/sekolah/view';
		
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
		
		$record = $this->Sekolah_Model->getAll($this->data['limit'], $this->data['limitstart'], $this->data['filter_order'], $this->data['filter_order_dir'], $where, $like);
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
		
        $config['base_url'] = site_url('admin/sekolah/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		$this->data['sekolah_jenjang'] = $this->Sekolah_Model->getJenjang(FALSE, FALSE);
		$this->data['sekolah_status'] = $this->Sekolah_Model->getStatus(FALSE, FALSE);
		$this->data['sekolah_wilayah'] = $this->Sekolah_Model->getWilayah(FALSE, FALSE);
		$this->data['sekolah_state'] = $this->Sekolah_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        $this->form_validation->set_error_delimiters('<div class="error" style="color: #CC0000; margin-left: 150px;">', '</div>');
        $this->form_validation->set_rules('jform[nama]', 'Nama', 'required');
        $this->form_validation->set_rules('jform[state]', 'Status', '');
        $this->form_validation->set_rules('jform[jenjang]', 'Jenjang Sekolah', '');
        $this->form_validation->set_rules('jform[status]', 'Status Sekolah', '');
        $this->form_validation->set_rules('jform[wilayah]', 'Wilayah', '');
        $this->form_validation->set_rules('jform[alamat]', 'Alamat', '');
        $this->form_validation->set_rules('jform[telepon1]', 'Telepon 1', '');
        $this->form_validation->set_rules('jform[telepon2]', 'Telepon 2', '');
        $this->form_validation->set_rules('jform[fax]', 'Fax', '');
        $this->form_validation->set_rules('jform[daya_tampung]', 'Daya Tampung', '');
        $this->form_validation->set_rules('jform[nilai_tertinggi]', 'Nilai Tertinggi', '');
        $this->form_validation->set_rules('jform[grade]', 'Passing Grade', '');
        $this->form_validation->set_rules('jform[cluster]', 'Cluster', '');
        $this->form_validation->set_rules('jform[biaya]', 'Perkiraan Biaya Masuk', '');
        $this->form_validation->set_rules('jform[email]', 'E-Mail', '');
        $this->form_validation->set_rules('jform[website]', 'Web Site', '');
        $this->form_validation->set_rules('jform[deskripsi]', 'Deskripsi', '');
        
        if ($this->input->post('task')) {
            if ($this->form_validation->run() == TRUE) {
                switch ($this->input->post('task')) {
                    case 'sekolah.apply':
                        $sekolah = $this->_getDataArray();
                        if (isset($sekolah->id) && $sekolah->id > 0) {
                            $id = $sekolah->id;
                            $this->Sekolah_Model->update($sekolah);
                        }
                        else {
                            $id = $this->Sekolah_Model->create($sekolah);
                        }
                        $data['data'] = $sekolah;
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Sekolah telah di simpan.'));
                        redirect('admin/sekolah/edit/'.$id.'/close', 'refresh');
                    case 'sekolah.save':
                        $sekolah = $this->_getDataArray();
                        if (isset($sekolah->id) && $sekolah->id > 0) {
                            $id = $sekolah->id;
                            $this->Sekolah_Model->update($sekolah);
                        }
                        else {
                            $id = $this->Sekolah_Model->create($sekolah);
                        }
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Sekolah telah di simpan.'));
                        redirect('admin/sekolah/index', 'refresh');
                    case 'sekolah.save2new':
                        $sekolah = $this->_getDataArray();
                        if (isset($sekolah->id) && $sekolah->id > 0) {
                            $id = $sekolah->id;
                            $this->Sekolah_Model->update($sekolah);
                        }
                        else {
                            $id = $this->Sekolah_Model->create($sekolah);
                        }
                        $data['data'] = $this->_getEmptyDataArray();
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Sekolah telah di simpan.'));
                        redirect('admin/sekolah/add', 'refresh');
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
            $this->data['title'] = "Daftar Sekolah";
            $this->data['module_title'] = VToolBar_Helper::title('Sekolah Manager: Daftar Sekolah');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/sekolah/edit';
			
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $sekolah = $this->Sekolah_Model->getById($id);
				$this->data['is_new'] = FALSE;
            }
            else {
                $sekolah = $this->_getEmptyDataArray();
				$this->data['is_new'] = TRUE;
            }
			
			$this->data['data'] = $sekolah;
			$this->data['sekolah_jenjang'] = $this->Sekolah_Model->getJenjang(FALSE, TRUE);
			$this->data['sekolah_status'] = $this->Sekolah_Model->getStatus(FALSE, TRUE);
			$this->data['sekolah_wilayah'] = $this->Sekolah_Model->getWilayah(FALSE, TRUE);
			$this->data['sekolah_state'] = $this->Sekolah_Model->getState();
			
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
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
		$sekolah = new StdClass();
		$sekolah->id				= 0;
        $sekolah->nama				= '';
		$sekolah->jenjang			= '';
		$sekolah->status			= '';
		$sekolah->wilayah			= '';
		$sekolah->alamat			= '';
		$sekolah->telepon1			= '';
		$sekolah->telepon2			= '';
		$sekolah->fax				= '';
		$sekolah->daya_tampung		= 0;
		$sekolah->nilai_tertinggi	= 0;
		$sekolah->grade				= 0;
		$sekolah->cluster			= 0;
		$sekolah->biaya				= 0;
		$sekolah->email				= '';
		$sekolah->website			= '';
		$sekolah->deskripsi			= '';
		$sekolah->state				= 1;
		$sekolah->created			= $current_date;
		$sekolah->created_by		= 0;
		$sekolah->created_by_alias	= '';
		$sekolah->modified			= NULL;
		$sekolah->modified_by		= 0;
		$sekolah->attribs			= '';
		$sekolah->version			= 0;
		$sekolah->hits				= 0;
        return $sekolah;
    }
	
	private function _getDataArray()
    {
		$sekolah = new StdClass();
        $sekolah->id               	= isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $sekolah->nama				= $this->input->_clean_input_data($_POST['jform']['nama']);
		$sekolah->jenjang			= $this->input->_clean_input_data($_POST['jform']['jenjang']);
		$sekolah->status			= $this->input->_clean_input_data($_POST['jform']['status']);
		$sekolah->wilayah			= $this->input->_clean_input_data($_POST['jform']['wilayah']);
		$sekolah->alamat			= $this->input->_clean_input_data($_POST['jform']['alamat']);
		$sekolah->telepon1			= $this->input->_clean_input_data($_POST['jform']['telepon1']);
		$sekolah->telepon2			= $this->input->_clean_input_data($_POST['jform']['telepon2']);
		$sekolah->fax				= $this->input->_clean_input_data($_POST['jform']['fax']);
		$sekolah->daya_tampung		= $this->input->_clean_input_data($_POST['jform']['daya_tampung']);
		$sekolah->nilai_tertinggi	= $this->input->_clean_input_data($_POST['jform']['nilai_tertinggi']);
		$sekolah->grade				= $this->input->_clean_input_data($_POST['jform']['grade']);
		$sekolah->cluster			= $this->input->_clean_input_data($_POST['jform']['cluster']);
		$sekolah->biaya				= $this->input->_clean_input_data($_POST['jform']['biaya']);
		$sekolah->email				= $this->input->_clean_input_data($_POST['jform']['email']);
		$sekolah->website			= $this->input->_clean_input_data($_POST['jform']['website']);
		$sekolah->deskripsi			= $this->input->_clean_input_data($_POST['jform']['deskripsi']);
		$sekolah->state				= $this->input->_clean_input_data($_POST['jform']['state']);
		$sekolah->created_by		= $this->input->_clean_input_data($_POST['jform']['created_by']);
		$sekolah->created_by_alias	= $this->input->_clean_input_data($_POST['jform']['created_by_alias']);
		$sekolah->modified_by		= isset($_POST['jform']['modified_by']) && ($_POST['jform']['modified_by'] > 0) ? $this->input->_clean_input_data($_POST['jform']['modified_by']) : 0;
		$sekolah->attribs         	= ''; //isset$this->input->_clean_input_data($_POST['jform']['attribs']);
		$sekolah->version			= isset($_POST['jform']['version']) && ($_POST['jform']['version'] > 0) ? $this->input->_clean_input_data($_POST['jform']['version']) : 0;
        return $sekolah;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('sekolah.add');
        VToolBar_Helper::editList('sekolah.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'sekolah.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_sekolah_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('sekolah.apply');
        VToolBar_Helper::save('sekolah.save');
        VToolBar_Helper::save2new('sekolah.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('sekolah.cancel');
		} else {
			VToolBar_Helper::cancel('sekolah.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_sekolah_manager_edit'));
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

/* End of file sekolah.php */
/* Location: ./application/controllers/sekolah.php */