<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurusan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jurusan_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'jurusan.add':
					redirect('admin/jurusan/add', 'refresh');
                case 'jurusan.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $jurusan_id = $id;
							break;
                        }
						redirect('admin/jurusan/edit/'.$jurusan_id, 'refresh');
                    }
                case 'jurusan.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Jurusan_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' Jurusan Perguruan Tinggi telah di hapus.'));
                        }
                    }
                    redirect('admin/jurusan', 'refresh');
			}
		}
		
		$where = array();
		$this->data['filter_published'] = '';
		if ($this->input->post('filter_published')) {
			$where['state'] = $this->input->post('filter_published');
			$this->data['filter_published'] = $this->input->post('filter_published');
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
		$this->data['menu_active'] = 'Informasi';
		$this->data['title'] = 'Daftar Jurusan Perguruan Tinggi';
		$this->data['module_title'] = VToolBar_Helper::title('Jurusan Perguruan Tinggi Manager: Jurusan Perguruan Tinggi');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/jurusan/view';

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
			$this->data['filter_order'] = 'jurusan';
		}
		if ($this->input->post('filter_order_dir')) {
            $this->data['filter_order_dir'] = $this->input->post('filter_order_dir');
        }
		else {
			$this->data['filter_order_dir'] = 'asc';
		}
		
        $record = $this->Jurusan_Model->getAll($this->data['limit'], $this->data['limitstart'], $this->data['filter_order'], $this->data['filter_order_dir'], $where, $like);
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
        
        $config['base_url'] = site_url('admin/jurusan/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		$this->data['jurusan_state'] = $this->Jurusan_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
		
		$this->form_validation->set_error_delimiters('<div class="error" style="color: #CC0000; margin-left: 150px;">', '</div>');
		$this->form_validation->set_rules('jform[id]', 'ID', '');
        $this->form_validation->set_rules('jform[jurusan]', 'Jurusan', 'required');
        $this->form_validation->set_rules('jform[state]', 'Status', '');
        $this->form_validation->set_rules('jform[deskripsi]', 'Deskripsi', '');
		$this->form_validation->set_rules('jform[kemampuan_penunjang]', 'Kemampuan Penunjang', '');
		$this->form_validation->set_rules('jform[bidang_minat]', 'Bidang Minat', '');
		$this->form_validation->set_rules('jform[lapangan_kerja]', 'Lapangan Kerja', '');
		$this->form_validation->set_rules('jform[ptn_Sasaran]', 'PT Sasaran', '');
		
        if ($this->input->post('task')) {
			if ($this->form_validation->run() == TRUE) {
				switch ($this->input->post('task')) {
					case 'jurusan.apply':
						$jurusan = $this->_getDataArray();
						if (isset($jurusan->id) && $jurusan->id > 0) {
							$id =$jurusan->id;
							$this->Jurusan_Model->update($jurusan);
						}
						else {
							$id = $this->Jurusan_Model->create($jurusan);
						}
						$data['data'] = $jurusan;
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Jurusan telah di simpan.'));
						redirect('admin/jurusan/edit/'.$id.'/close', 'refresh');
					case 'jurusan.save':
						$jurusan = $this->_getDataArray();
						if (isset($jurusan->id) && $jurusan->id > 0) {
							$id = $jurusan->id;
							$this->Jurusan_Model->update($jurusan);
						}
						else {
							$id = $this->Jurusan_Model->create($jurusan);
						}
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Jurusan telah di simpan.'));
						redirect('admin/jurusan/index', 'refresh');
					case 'jurusan.save2new':
						$jurusan = $this->_getDataArray();
						if (isset($jurusan->id) && $jurusan->id > 0) {
							$id = $jurusan->id;
							$this->Jurusan_Model->update($jurusan);
						}
						else {
							$id = $this->Jurusan_Model->create($jurusan);
						}
						$data['data'] = $this->_getEmptyDataArray();
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Jurusan telah di simpan.'));
						redirect('admin/jurusan/add', 'refresh');
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
            $this->data['title'] = "Daftar Jurusan Perguruan Tinggi";
            $this->data['module_title'] = VToolBar_Helper::title('Jurusan Manager: Daftar Jurusan');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/jurusan/edit';
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $jurusan = $this->Jurusan_Model->getById($id);
				$this->data['is_new'] = FALSE;
            }
            else {
                $jurusan = $this->_getEmptyDataArray();
				$this->data['is_new'] = TRUE;
            }
			
            $this->data['data'] = $jurusan;
			$this->data['jurusan_state'] = $this->Jurusan_Model->getState();
			
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Informasi';
        $this->data['title'] = "Daftar Jurusan";
        $this->data['module_title'] = VToolBar_Helper::title('Jurusan Manager: Edit Jurusan');
		if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/jurusan/edit';
		$this->data['is_new'] = FALSE;
		
		$jurusan = $this->Jurusan_Model->getById($id);
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$jurusan->modified = date("Y-m-d H:i:s");
		$jurusan->version++;
		$this->data['data'] = $jurusan;
		$this->data['jurusan_state'] = $this->Jurusan_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	private function _getEmptyDataArray()
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
		$jurusan = new StdClass();
        $jurusan->id					= 0;
        $jurusan->jurusan				= '';
		$jurusan->deskripsi				= '';
		$jurusan->kemampuan_penunjang	= '';
		$jurusan->bidang_minat			= '';
		$jurusan->lapangan_kerja		= '';
		$jurusan->ptn_Sasaran			= '';
		$jurusan->state					= 1;
		$jurusan->created				= $current_date;
		$jurusan->created_by			= 0;
		$jurusan->created_by_alias		= '';
		$jurusan->modified				= NULL;
		$jurusan->modified_by			= 0;
		$jurusan->attribs				= '';
		$jurusan->version				= 0;
		$jurusan->hits					= 0;
        return $jurusan;
    }
	
	private function _getDataArray()
    {
		$jurusan = new StdClass();
		$jurusan->id					= isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $jurusan->jurusan				= $this->input->_clean_input_data($_POST['jform']['jurusan']);
		$jurusan->deskripsi				= $this->input->_clean_input_data($_POST['jform']['deskripsi']);
		$jurusan->kemampuan_penunjang	= $this->input->_clean_input_data($_POST['jform']['kemampuan_penunjang']);
		$jurusan->bidang_minat			= $this->input->_clean_input_data($_POST['jform']['bidang_minat']);
		$jurusan->lapangan_kerja		= $this->input->_clean_input_data($_POST['jform']['lapangan_kerja']);
		$jurusan->ptn_Sasaran			= $this->input->_clean_input_data($_POST['jform']['ptn_Sasaran']);
		$jurusan->state					= $this->input->_clean_input_data($_POST['jform']['state']);
		$jurusan->created_by			= $this->input->_clean_input_data($_POST['jform']['created_by']);
		$jurusan->created_by_alias		= $this->input->_clean_input_data($_POST['jform']['created_by_alias']);
		//$jurusan->modified				= $this->input->_clean_input_data($_POST['jform']['modified']);
		$jurusan->modified_by			= isset($_POST['jform']['modified_by']) && ($_POST['jform']['modified_by'] > 0) ? $this->input->_clean_input_data($_POST['jform']['modified_by']) : 0;
		$jurusan->attribs				= ''; //isset$this->input->_clean_input_data($_POST['jform']['attribs']);
		$jurusan->version				= isset($_POST['jform']['version']) && ($_POST['jform']['version'] > 0) ? $this->input->_clean_input_data($_POST['jform']['version']) : 0;
        return $jurusan;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('jurusan.add');
        VToolBar_Helper::editList('jurusan.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'jurusan.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_jurusan_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('jurusan.apply');
        VToolBar_Helper::save('jurusan.save');
        VToolBar_Helper::save2new('jurusan.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('jurusan.cancel');
		} else {
			VToolBar_Helper::cancel('jurusan.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_jurusan_manager_edit'));
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

/* End of file jurusan.php */
/* Location: ./application/controllers/jurusan.php */