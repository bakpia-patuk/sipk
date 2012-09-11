<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kesehatan extends CI_Controller {

	protected $module_name = "Institusi Kesehatan";
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kesehatan_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'kesehatan.add':
					redirect('admin/kesehatan/add', 'refresh');
                case 'kesehatan.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $kesehatan_id = $id;
							break;
                        }
						redirect('admin/kesehatan/edit/'.$kesehatan_id, 'refresh');
                    }
                case 'kesehatan.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Kesehatan_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' '.$this->module_name.' telah di hapus.'));
                        }
                    }
                    redirect('admin/kesehatan', 'refresh');
			}
		}
		
		$where = array();
		if ($this->input->post('filter_published')) {
			$where['state'] = $this->input->post('filter_published');
		}
		if ($this->input->post('filter_kategori')) {
			$where['kategori'] = $this->input->post('filter_kategori');
		}
		if ($this->input->post('filter_status')) {
			$where['status'] = $this->input->post('filter_status');
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
		$this->data['title'] = 'Institusi Kesehatan';
		$this->data['module_title'] = VToolBar_Helper::title($this->module_name.' Manager: '.$this->module_name);
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/kesehatan/view';
		
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
		
        $record = $this->Kesehatan_Model->getAll($this->data['limit'], $this->data['limitstart'], $this->data['filter_order'], $this->data['filter_order_dir'], $where, $like);
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
        
        $config['base_url'] = site_url('admin/kesehatan/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		$this->data['kesehatan_kategori'] = $this->Kesehatan_Model->getKategori(FALSE, FALSE);
		$this->data['kesehatan_status'] = $this->Kesehatan_Model->getStatus(FALSE, FALSE);
		$this->data['kesehatan_wilayah'] = $this->Kesehatan_Model->getWilayah(FALSE, FALSE);
		$this->data['kesehatan_state'] = $this->Kesehatan_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        
        if ($this->input->post('task')) {
            if ($this->form_validation->run() == FALSE) {
                switch ($this->input->post('task')) {
                    case 'kesehatan.apply':
                        $kesehatan = $this->_getDataArray();
                        if (isset($kesehatan->id) && $kesehatan->id > 0) {
                            $id = $kesehatan->id;
                            $this->Kesehatan_Model->update($kesehatan);
                        }
                        else {
                            $id = $this->Kesehatan_Model->create($kesehatan);
                        }
                        $data['data'] = $kesehatan;
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => $this->module_name.' telah di simpan.'));
                        redirect('admin/kesehatan/edit/'.$id.'/close', 'refresh');
                    case 'kesehatan.save':
                        $kesehatan = $this->_getDataArray();
                        $id = $this->Kesehatan_Model->create($kesehatan);
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $this->module_name.' telah di simpan.'));
                        redirect('admin/kesehatan/index', 'refresh');
                    case 'kesehatan.save2new':
                        $kesehatan = $this->_getDataArray();
                        $id = $this->Kesehatan_Model->create($kesehatan);
                        $data['data'] = $this->_getEmptyDataArray();
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => $this->module_name.' telah di simpan.'));
                        redirect('admin/kesehatan/add', 'refresh');
                }
            }
        } else {
			$this->data['extraCSS'] = $this->css_edit();
			$this->data['extraJS'] = $this->js_edit();
            $this->data['admin_status'] = FALSE;
            $this->data['menu_active'] = 'Informasi';
            $this->data['title'] = "Daftar Institusi Kesehatan";
            $this->data['module_title'] = VToolBar_Helper::title('Institusi Kesehatan Manager: Institusi Kesehatan');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/kesehatan/edit';
			
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $kesehatan = $this->Kesehatan_Model->getById($id);
                $this->data['is_new'] = FALSE;
            }
            else {
                $kesehatan = $this->_getEmptyDataArray();
                $this->data['is_new'] = TRUE;
            }
            
            $this->data['data'] = $kesehatan;
            $this->data['kesehatan_kategori'] = $this->Kesehatan_Model->getKategori(FALSE, TRUE);
			$this->data['kesehatan_status'] = $this->Kesehatan_Model->getStatus(FALSE, TRUE);
			$this->data['kesehatan_wilayah'] = $this->Kesehatan_Model->getWilayah(FALSE, TRUE);
			$this->data['kesehatan_yesno'] = $this->Kesehatan_Model->getYesNo(FALSE, TRUE);
			$this->data['kesehatan_state'] = $this->Kesehatan_Model->getState();
            
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Informasi';
        $this->data['title'] = "Daftar ".$this->module_name;
        $this->data['module_title'] = VToolBar_Helper::title($this->module_name.' Manager: Edit '.$this->module_name);
		if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/kesehatan/edit';
		$this->data['is_new'] = FALSE;
		
		$kesehatan = $this->Kesehatan_Model->getById($id);
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$kesehatan->modified = date("Y-m-d H:i:s");
		$kesehatan->version++;
		$this->data['data'] = $kesehatan;
		$this->data['kesehatan_kategori'] = $this->Kesehatan_Model->getKategori(FALSE, TRUE);
		$this->data['kesehatan_state'] = $this->Kesehatan_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	private function _getEmptyDataArray()
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $kesehatan = new StdClass();
        $kesehatan->id                  = 0;
        $kesehatan->nama            	= '';
		$kesehatan->kategori			= '';
		$kesehatan->status              = '';
        $kesehatan->wilayah             = '';
        $kesehatan->alamat              = '';
        $kesehatan->telepon1			= '';
        $kesehatan->telepon2			= '';
        $kesehatan->fax                 = '';
        $kesehatan->askes				= '';
        $kesehatan->jamsostek			= '';
        $kesehatan->email				= '';
        $kesehatan->website             = '';
        $kesehatan->catatan             = '';
		$kesehatan->state				= 1;
		$kesehatan->created             = $current_date;
		$kesehatan->created_by          = 0;
		$kesehatan->created_by_alias	= '';
		$kesehatan->modified			= NULL;
		$kesehatan->modified_by         = 0;
		$kesehatan->attribs             = '';
		$kesehatan->version             = 0;
		$kesehatan->hits				= 0;
        return $kesehatan;
    }
	
	private function _getDataArray()
    {
        $kesehatan = new StdClass();
		$kesehatan->id               	= isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $kesehatan->nama                = $this->input->_clean_input_data($_POST['vform']['nama']);
        $kesehatan->kategori			= $this->input->_clean_input_data($_POST['vform']['kategori']);
        $kesehatan->status              = $this->input->_clean_input_data($_POST['vform']['status']);
        $kesehatan->wilayah             = $this->input->_clean_input_data($_POST['vform']['wilayah']);
        $kesehatan->alamat              = $this->input->_clean_input_data($_POST['vform']['alamat']);
        $kesehatan->telepon1			= $this->input->_clean_input_data($_POST['vform']['telepon1']);
        $kesehatan->telepon2			= $this->input->_clean_input_data($_POST['vform']['telepon2']);
        $kesehatan->fax                 = $this->input->_clean_input_data($_POST['vform']['fax']);
        $kesehatan->askes				= $this->input->_clean_input_data($_POST['vform']['askes']);
        $kesehatan->jamsostek			= $this->input->_clean_input_data($_POST['vform']['jamsostek']);
        $kesehatan->email				= $this->input->_clean_input_data($_POST['vform']['email']);
        $kesehatan->website             = $this->input->_clean_input_data($_POST['vform']['website']);
        $kesehatan->catatan             = $this->input->_clean_input_data($_POST['vform']['catatan']);
        $kesehatan->state				= $this->input->_clean_input_data($_POST['vform']['state']);
        $kesehatan->created_by          = $this->input->_clean_input_data($_POST['vform']['created_by']);
        $kesehatan->created_by_alias    = $this->input->_clean_input_data($_POST['vform']['created_by_alias']);
        //$kesehatan->modified			= $this->input->_clean_input_data($_POST['vform']['modified']);
        $kesehatan->modified_by      	= isset($_POST['jform']['modified_by']) && ($_POST['jform']['modified_by'] > 0) ? $this->input->_clean_input_data($_POST['jform']['modified_by']) : 0;
		$kesehatan->attribs         	= ''; //isset$this->input->_clean_input_data($_POST['jform']['attribs']);
		$kesehatan->version          	= isset($_POST['jform']['version']) && ($_POST['jform']['version'] > 0) ? $this->input->_clean_input_data($_POST['jform']['version']) : 0;
        return $kesehatan;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('kesehatan.add');
        VToolBar_Helper::editList('kesehatan.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'kesehatan.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_kesehatan_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('kesehatan.apply');
        VToolBar_Helper::save('kesehatan.save');
        VToolBar_Helper::save2new('kesehatan.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('kesehatan.cancel');
		} else {
			VToolBar_Helper::cancel('kesehatan.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_kesehatan_manager_edit'));
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

/* End of file kesehatan.php */
/* Location: ./application/controllers/kesehatan.php */