<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kursus extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kursus_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'kursus.add':
					redirect('admin/kursus/add', 'refresh');
                case 'kursus.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $kursus_id = $id;
							break;
                        }
						redirect('admin/kursus/edit/'.$kursus_id, 'refresh');
                    }
                case 'kursus.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Kursus_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' Bimbel/Kursus/Test telah di hapus.'));
                        }
                    }
                    redirect('admin/kursus', 'refresh');
			}
		}
		
		$where = array();
		if ($this->input->post('filter_published')) {
			$where['state'] = $this->input->post('filter_published');
		}
		if ($this->input->post('filter_kategori')) {
			$where['kategori'] = $this->input->post('filter_kategori');
		}
		if ($this->input->post('filter_wilayah')) {
			$where['wilayah'] = $this->input->post('filter_wilayah');
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
		$this->data['title'] = 'Daftar Bimbel/Kursus/Test';
		$this->data['module_title'] = VToolBar_Helper::title('Bimbel/Kursus/Test Manager: Bimbel/Kursus/Test');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/kursus/view';

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
		
		$record = $this->Kursus_Model->getAll($this->data['limit'], $this->data['limitstart'], $this->data['filter_order'], $this->data['filter_order_dir'], $where, $like);
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
        
        $config['base_url'] = site_url('admin/kursus/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		$this->data['kursus_kategori'] = $this->Kursus_Model->getKategori(FALSE, FALSE);
		$this->data['kursus_wilayah'] = $this->Kursus_Model->getWilayah(FALSE, FALSE);
		$this->data['kursus_state'] = $this->Kursus_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        
        //$this->form_validation->set_rules('spesialis', 'Spesialis', 'required');
		//$this->form_validation->set_rules('gelar', 'Gelar', 'required');
        
        if ($this->input->post('task')) {
            if ($this->form_validation->run() == FALSE) {
                switch ($this->input->post('task')) {
                    case 'kursus.apply':
                        $kursus = $this->_getDataArray();
                        if (isset($kursus->id) && $kursus->id > 0) {
                            $id =$kursus->id;
                            $this->Kursus_Model->update($kursus);
                        }
                        else {
                            $id = $this->Kursus_Model->create($kursus);
                        }
                        $data['data'] = $kursus;
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Bimbel/Kursus/Test telah di simpan.'));
                        redirect('admin/kursus/edit/'.$id.'/close', 'refresh');
                    case 'kursus.save':
                        $kursus = $this->_getDataArray();
                        $id = $this->Kursus_Model->create($kursus);
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Bimbel/Kursus/Test telah di simpan.'));
                        redirect('admin/kursus/index', 'refresh');
                    case 'kursus.save2new':
                        $kursus = $this->_getDataArray();
                        $id = $this->Kursus_Model->create($kursus);
                        $data['data'] = $this->_getEmptyDataArray();
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Bimbel/Kursus/Test telah di simpan.'));
                        redirect('admin/kursus/add', 'refresh');
                }
            }
        } else {
			$this->data['extraCSS'] = $this->css_edit();
			$this->data['extraJS'] = $this->js_edit();
            $this->data['admin_status'] = FALSE;
            $this->data['menu_active'] = 'Informasi';
            $this->data['title'] = "Bimbel/Kursus/Test";
            $this->data['module_title'] = VToolBar_Helper::title('Bimbel/Kursus/Test Manager: Tambah Bimbel/Kursus/Test');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/kursus/edit';
			
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $kursus = $this->Kursus_Model->getById($id);
				$this->data['is_new'] = FALSE;
            }
            else {
                $kursus = $this->_getEmptyDataArray();
				$this->data['is_new'] = TRUE;
            }
			
            $this->data['data'] = $kursus;
            $this->data['kursus_kategori'] = $this->Kursus_Model->getKategori(FALSE, TRUE);
            $this->data['kursus_wilayah'] = $this->Kursus_Model->getWilayah(FALSE, TRUE);
            $this->data['kursus_state'] = $this->Kursus_Model->getState();
			
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Informasi';
        $this->data['title'] = "Daftar Bimbel/Kursus/Test";
        $this->data['module_title'] = VToolBar_Helper::title('Bimbel/Kursus/Test Manager: Edit Bimbel/Kursus/Test');
		if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/kursus/edit';
		$this->data['is_new'] = FALSE;
		
		$kursus = $this->Kursus_Model->getById($id);
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$kursus->modified = date("Y-m-d H:i:s");
		$kursus->version++;
		$this->data['data'] = $kursus;
		$this->data['tips_kategori'] = $this->Kursus_Model->getKategori(FALSE, TRUE);
		$this->data['tips_state'] = $this->Kursus_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	private function _getEmptyDataArray()
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $kursus = new StdClass();
        $kursus->id                 = 0;
        $kursus->nama               = '';
		$kursus->kategori           = '';
		$kursus->wilayah            = '';
        $kursus->alamat             = '';
        $kursus->telepon1           = '';
        $kursus->telepon2           = '';
        $kursus->fax                = '';
        $kursus->email              = '';
        $kursus->website            = '';
        $kursus->deskripsi          = '';
		$kursus->state           	= 1;
		$kursus->created            = $current_date;
		$kursus->created_by         = 0;
		$kursus->created_by_alias   = '';
		$kursus->modified			= '0000-00-00 00:00:00';
		$kursus->modified_by        = 0;
		$kursus->attribs         	= '';
		$kursus->version            = 0;
		$kursus->hits				= 0;
        return $kursus;
    }
	
	private function _getDataArray()
    {
        $kursus = new StdClass();
		$kursus->id					= isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $kursus->nama               = $this->input->_clean_input_data($_POST['jform']['nama']);
		$kursus->kategori           = $this->input->_clean_input_data($_POST['jform']['kategori']);
		$kursus->wilayah            = $this->input->_clean_input_data($_POST['jform']['wilayah']);
        $kursus->alamat             = $this->input->_clean_input_data($_POST['jform']['alamat']);
        $kursus->telepon1           = $this->input->_clean_input_data($_POST['jform']['telepon1']);
        $kursus->telepon2           = $this->input->_clean_input_data($_POST['jform']['telepon2']);
        $kursus->fax                = $this->input->_clean_input_data($_POST['jform']['fax']);
        $kursus->email              = $this->input->_clean_input_data($_POST['jform']['email']);
        $kursus->website            = $this->input->_clean_input_data($_POST['jform']['website']);
        $kursus->deskripsi          = $this->input->_clean_input_data($_POST['jform']['deskripsi']);
		$kursus->state              = $this->input->_clean_input_data($_POST['jform']['state']);
		$kursus->created_by         = $this->input->_clean_input_data($_POST['jform']['created_by']);
		$kursus->created_by_alias   = $this->input->_clean_input_data($_POST['jform']['created_by_alias']);
		$kursus->modified_by     	= isset($_POST['jform']['modified_by']) && ($_POST['jform']['modified_by'] > 0) ? $this->input->_clean_input_data($_POST['jform']['modified_by']) : 0;
		$kursus->attribs         	= ''; //isset$this->input->_clean_input_data($_POST['jform']['attribs']);
		$kursus->version         	= isset($_POST['jform']['version']) && ($_POST['jform']['version'] > 0) ? $this->input->_clean_input_data($_POST['jform']['version']) : 0;
        return $kursus;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('kursus.add');
        VToolBar_Helper::editList('kursus.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'kursus.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_kursus_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('kursus.apply');
        VToolBar_Helper::save('kursus.save');
        VToolBar_Helper::save2new('kursus.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('kursus.cancel');
		} else {
			VToolBar_Helper::cancel('kursus.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_kursus_manager_edit'));
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

/* End of file kursus.php */
/* Location: ./application/controllers/kursus.php */