<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tips extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tips_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'tips.add':
					redirect('admin/tips/add', 'refresh');
                case 'tips.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $tips_id = $id;
							break;
                        }
						redirect('admin/tips/edit/'.$tips_id, 'refresh');
                    }
                case 'tips.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Tips_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' tips telah di hapus.'));
                        }
                    }
                    redirect('admin/tips', 'refresh');
			}
		}
		
		$where = array();
		$this->data['filter_published'] = '';
		if ($this->input->post('filter_published')) {
			$where['state'] = $this->input->post('filter_published');
			$this->data['filter_published'] = $this->input->post('filter_published');
		}
		$this->data['filter_kategori'] = '';
		if ($this->input->post('filter_kategori')) {
			$where['kategori'] = $this->input->post('filter_kategori');
			$this->data['filter_kategori'] = $this->input->post('filter_kategori');
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
		$this->data['title'] = 'Tips';
		$this->data['module_title'] = VToolBar_Helper::title('Tips Manager: Tips');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/tips/view';

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
			$this->data['filter_order'] = 'judul';
		}
		if ($this->input->post('filter_order_dir')) {
            $this->data['filter_order_dir'] = $this->input->post('filter_order_dir');
        }
		else {
			$this->data['filter_order_dir'] = 'asc';
		}
		
        $record = $this->Tips_Model->getAll($this->data['limit'], $this->data['limitstart'], $this->data['filter_order'], $this->data['filter_order_dir'], $where, $like);
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
        
        $config['base_url'] = site_url('admin/tips/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		$this->data['tips_kategori'] = $this->Tips_Model->getKategori(FALSE, FALSE);
		$this->data['tips_state'] = $this->Tips_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        
        //$this->form_validation->set_rules('judul', 'Judul', 'required');
		//$this->form_validation->set_rules('gelar', 'Gelar', 'required');
        
        if ($this->input->post('task')) {
            if ($this->form_validation->run() == FALSE) {
                switch ($this->input->post('task')) {
                    case 'tips.apply':
                        $tips = $this->_getDataArray();
                        if (isset($tips->id) && $tips->id > 0) {
                            $id = $tips->id;
                            $this->Tips_Model->update($tips);
                        }
                        else {
                            $id = $this->Tips_Model->create($tips);
                        }
                        $data['data'] = $tips;
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Tips telah di simpan.'));
                        redirect('admin/tips/edit/'.$id.'/close', 'refresh');
                    case 'tips.save':
                        $tips = $this->_getDataArray();
                        $id = $this->Tips_Model->create($tips);
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Tips telah di simpan.'));
                        redirect('admin/tips', 'refresh');
                    case 'tips.save2new':
                        $tips = $this->_getDataArray();
                        $id = $this->Tips_Model->create($tips);
                        $data['data'] = $this->_getEmptyDataArray();
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Tips telah di simpan.'));
                        redirect('admin/tips/add', 'refresh');
                }
            }
        } else {
			$this->data['extraCSS'] = $this->css_edit();
			$this->data['extraJS'] = $this->js_edit();
            $this->data['admin_status'] = FALSE;
            $this->data['menu_active'] = 'Informasi';
            $this->data['title'] = "Daftar Tips";
            $this->data['module_title'] = VToolBar_Helper::title('Tips Manager: Tambah Tips');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/tips/edit';
			
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $tips = $this->Tips_Model->getById($id);
                $this->data['is_new'] = FALSE;
            }
            else {
                $tips = $this->_getEmptyDataArray();
                $this->data['is_new'] = TRUE;
            }
            
            $this->data['data'] = $tips;
            $this->data['tips_kategori'] = $this->Tips_Model->getKategori(FALSE, TRUE);
            $this->data['tips_state'] = $this->Tips_Model->getState();
            
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Informasi';
        $this->data['title'] = "Daftar Tips";
        $this->data['module_title'] = VToolBar_Helper::title('Tips Manager: Edit Tips');
		if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/tips/edit';
		$this->data['is_new'] = FALSE;
		
		$tips = $this->Tips_Model->getById($id);
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$tips->modified = date("Y-m-d H:i:s");
		$tips->version++;
		$this->data['data'] = $tips;
		$this->data['tips_kategori'] = $this->Tips_Model->getKategori(FALSE, TRUE);
		$this->data['tips_state'] = $this->Tips_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	private function _getEmptyDataArray()
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $tips = new StdClass();
        $tips->id				= 0;
        $tips->judul    		= '';
		$tips->kategori			= '';
		$tips->deskripsi		= '';
        $tips->sumber           = '';
		$tips->state			= 1;
		$tips->created			= $current_date;
		$tips->created_by		= 0;
		$tips->created_by_alias = '';
		$tips->modified         = NULL;
		$tips->modified_by		= 0;
		$tips->attribs			= '';
		$tips->version			= 0;
		$tips->hits             = 0;
        return $tips;
    }
	
	private function _getDataArray()
    {
        $tips = new StdClass();
		$tips->id               = isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $tips->judul            = $this->input->_clean_input_data($_POST['jform']['judul']);
		$tips->kategori			= $this->input->_clean_input_data($_POST['jform']['kategori']);
		$tips->deskripsi		= $this->input->_clean_input_data($_POST['jform']['deskripsi']);
        $tips->sumber			= $this->input->_clean_input_data($_POST['jform']['sumber']);
        $tips->state			= $this->input->_clean_input_data($_POST['jform']['state']);
        $tips->created_by		= $this->input->_clean_input_data($_POST['jform']['created_by']);
        $tips->created_by_alias = $this->input->_clean_input_data($_POST['jform']['created_by_alias']);
        //$tips->modified		= $this->input->_clean_input_data($_POST['jform']['modified']);
		$tips->modified_by      = isset($_POST['jform']['modified_by']) && ($_POST['jform']['modified_by'] > 0) ? $this->input->_clean_input_data($_POST['jform']['modified_by']) : 0;
		$tips->attribs         	= ''; //isset$this->input->_clean_input_data($_POST['jform']['attribs']);
		$tips->version          = isset($_POST['jform']['version']) && ($_POST['jform']['version'] > 0) ? $this->input->_clean_input_data($_POST['jform']['version']) : 0;
        return $tips;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('tips.add');
        VToolBar_Helper::editList('tips.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'tips.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_tips_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('tips.apply');
        VToolBar_Helper::save('tips.save');
        VToolBar_Helper::save2new('tips.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('tips.cancel');
		} else {
			VToolBar_Helper::cancel('tips.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_tips_manager_edit'));
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

/* End of file tips.php */
/* Location: ./application/controllers/tips.php */