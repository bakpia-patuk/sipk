<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artikel extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'artikel.add':
					redirect('admin/artikel/add', 'refresh');
                case 'artikel.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $artikel_id = $id;
							break;
                        }
						redirect('admin/artikel/edit/'.$artikel_id, 'refresh');
                    }
                case 'artikel.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Artikel_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' artikel telah di hapus.'));
                        }
                    }
                    redirect('admin/artikel', 'refresh');
			}
		}
		
		$where = array();
		if ($this->input->post('filter_published')) {
			$where['state'] = $this->input->post('filter_published');
		}
		$like = array();
		if ($this->input->post('filter_search')) {
			$like['title'] = $this->input->post('filter_search');
		}
		
		$this->data['extraCSS'] = $this->css_view();
		$this->data['extraJS'] = $this->js_view();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Artikel';
		$this->data['title'] = 'Daftar Artikel';
		$this->data['module_title'] = VToolBar_Helper::title('Artikel Manager: Artikel');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/artikel/view';

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
			$this->data['filter_order'] = 'title';
		}
		if ($this->input->post('filter_order_dir')) {
            $this->data['filter_order_dir'] = $this->input->post('filter_order_dir');
        }
		else {
			$this->data['filter_order_dir'] = 'asc';
		}
		
        $record = $this->Artikel_Model->getAll($this->data['limit'], $this->data['limitstart'], $this->data['filter_order'], $this->data['filter_order_dir'], $where, $like);
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
        
        $config['base_url'] = site_url('admin/artikel/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		$this->data['artikel_state'] = $this->Artikel_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('jform[id]', 'Id', '');
        $this->form_validation->set_rules('jform[title]', 'Title', 'required');
        $this->form_validation->set_rules('jform[kategori_id]', 'Kategori Id', '');
        $this->form_validation->set_rules('jform[penulis]', 'Penulis', '');
        $this->form_validation->set_rules('jform[image]', 'Image', '');
        $this->form_validation->set_rules('jform[thumbnail]', 'Thumbnail', '');
        $this->form_validation->set_rules('jform[fulltext]', 'Fulltext', '');
        $this->form_validation->set_rules('jform[sumber]', 'Sumber', '');
        $this->form_validation->set_rules('jform[state]', 'State', '');
        $this->form_validation->set_rules('jform[created_by]', 'Created By', '');
        $this->form_validation->set_rules('jform[created_by_alias]', 'Created By Alias', '');
        $this->form_validation->set_rules('jform[modified_by]', 'Modified By', '');
        $this->form_validation->set_rules('jform[version]', 'Version', '');
        
        if ($this->input->post('task')) {
            if ($this->form_validation->run() == TRUE) {
                switch ($this->input->post('task')) {
                    case 'artikel.apply':
                        $artikel = $this->_getDataArray();
                        if (isset($artikel->id) && $artikel->id > 0) {
                            $id = $artikel->id;
                            $this->Artikel_Model->update($artikel);
                        }
                        else {
                            $id = $this->Artikel_Model->create($artikel);
                        }
                        $data['data'] = $artikel;
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Artikel telah di simpan.'));
                        redirect('admin/artikel/edit/'.$id.'/close', 'refresh');
                    case 'artikel.save':
                        $artikel = $this->_getDataArray();
						if (isset($artikel->id) && $artikel->id > 0) {
                            $id = $artikel->id;
                            $this->Artikel_Model->update($artikel);
                        }
                        else {
                            $id = $this->Artikel_Model->create($artikel);
                        }
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Artikel telah di simpan.'));
                        redirect('admin/artikel/index', 'refresh');
                    case 'artikel.save2new':
                        $artikel = $this->_getDataArray();
						if (isset($artikel->id) && $artikel->id > 0) {
                            $id = $artikel->id;
                            $this->Artikel_Model->update($artikel);
                        }
                        else {
                            $id = $this->Artikel_Model->create($artikel);
                        }
                        $data['data'] = $this->_getEmptyDataArray();
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Artikel telah di simpan.'));
                        redirect('admin/artikel/add', 'refresh');
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
            $this->data['menu_active'] = 'Artikel';
            $this->data['title'] = "Daftar Artikel";
            $this->data['module_title'] = VToolBar_Helper::title('Artikel Manager: Tambah Artikel');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/artikel/edit';
			
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $artikel = $this->Artikel_Model->getById($id);
				$this->data['is_new'] = FALSE;
            }
            else {
                $artikel = $this->_getEmptyDataArray();
				$this->data['is_new'] = TRUE;
            }
			
            $this->data['data'] = $artikel;
			$kategori = $this->Kategori_Model->getAll();
			$this->data['artikel_kategori'] = $kategori['data'];
            $this->data['artikel_state'] = $this->Artikel_Model->getState();
            
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Informasi';
        $this->data['title'] = "Daftar Artikel";
        $this->data['module_title'] = VToolBar_Helper::title('Artikel Manager: Edit Artikel');
		if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/artikel/edit';
		$this->data['is_new'] = FALSE;
		
		$artikel = $this->Artikel_Model->getById($id);
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$artikel->modified = date("Y-m-d H:i:s");
		$artikel->version++;
		$this->data['data'] = $artikel;
		$kategori = $this->Kategori_Model->getAll();
		$this->data['artikel_kategori'] = $kategori['data'];
		$this->data['artikel_state'] = $this->Artikel_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	private function _getEmptyDataArray()
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$date = date("Y-m-d H:i:s");
        $artikel = new StdClass();
        $artikel->id				= 0;
        $artikel->title             = '';
		$artikel->kategori_id		= 0;
		//$artikel->kategori			= '';
		$artikel->penulis			= '';
        $artikel->image             = '';
        $artikel->thumbnail			= '';
        $artikel->fulltext			= '';
        $artikel->sumber			= '';
		$artikel->state				= 1;
		$artikel->created			= $date;
		$artikel->created_by		= 0;
		$artikel->created_by_alias	= '';
		$artikel->modified			= NULL;
		$artikel->modified_by		= 0;
		$artikel->publish_up		= NULL;
		$artikel->publish_down		= NULL;
		$artikel->attribs			= '';
		$artikel->version			= 0;
		$artikel->hits				= 0;
        return $artikel;
    }
	
	private function _getDataArray()
    {
        $artikel = new StdClass();
		$artikel->id				= isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $artikel->title             = $this->input->_clean_input_data($_POST['jform']['title']);
		$artikel->kategori_id		= $this->input->_clean_input_data($_POST['jform']['kategori_id']);
		//$artikel->kategori			= $this->input->_clean_input_data($_POST['jform']['kategori']);
		$artikel->penulis			= $this->input->_clean_input_data($_POST['jform']['penulis']);
        $artikel->image             = $this->input->_clean_input_data($_POST['jform']['image']);
        $artikel->thumbnail			= $this->input->_clean_input_data($_POST['jform']['thumbnail']);
        $artikel->fulltext			= $this->input->_clean_input_data($_POST['jform']['fulltext']);
        $artikel->sumber			= $this->input->_clean_input_data($_POST['jform']['sumber']);
		$artikel->state				= $this->input->_clean_input_data($_POST['jform']['state']);
        $artikel->created_by		= $this->input->_clean_input_data($_POST['jform']['created_by']);
		$artikel->created_by_alias	= $this->input->_clean_input_data($_POST['jform']['created_by_alias']);
		//$artikel->modified			= $this->input->_clean_input_data($_POST['jform']['modified']);
		$artikel->modified_by		= isset($_POST['jform']['modified_by']) && ($_POST['jform']['modified_by'] > 0) ? $this->input->_clean_input_data($_POST['jform']['modified_by']) : 0;
        $artikel->publish_up		= NULL;
		$artikel->publish_down		= NULL;
		$artikel->attribs         	= ''; //isset$this->input->_clean_input_data($_POST['jform']['attribs']);
		$artikel->version			= isset($_POST['jform']['version']) && ($_POST['jform']['version'] > 0) ? $this->input->_clean_input_data($_POST['jform']['version']) : 0;
        return $artikel;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('artikel.add');
        VToolBar_Helper::editList('artikel.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'artikel.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_artikel_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('artikel.apply');
        VToolBar_Helper::save('artikel.save');
        VToolBar_Helper::save2new('artikel.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('artikel.cancel');
		} else {
			VToolBar_Helper::cancel('artikel.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_artikel_manager_edit'));
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

/* End of file artikel.php */
/* Location: ./application/controllers/artikel.php */