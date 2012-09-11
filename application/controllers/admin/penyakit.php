<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penyakit extends My_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penyakit_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'penyakit.add':
					redirect('admin/penyakit/add', 'refresh');
                case 'penyakit.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $penyakit_id = $id;
							break;
                        }
						redirect('admin/penyakit/edit/'.$penyakit_id, 'refresh');
                    }
                case 'penyakit.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Penyakit_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' Penyakit telah di hapus.'));
                        }
                    }
                    redirect('admin/penyakit', 'refresh');
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
		$this->data['title'] = 'Daftar Penyakit';
		$this->data['module_title'] = VToolBar_Helper::title('Penyakit Manager: Penyakit');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/penyakit/view';

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
		
        $record = $this->Penyakit_Model->getAll($this->data['limit'], $this->data['limitstart'], $this->data['filter_order'], $this->data['filter_order_dir'], $where, $like);
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
        
        $config['base_url'] = site_url('admin/penyakit/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		$this->data['penyakit_state'] = $this->Penyakit_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        
        if ($this->input->post('task')) {
            if ($this->form_validation->run() == FALSE) {
                switch ($this->input->post('task')) {
                    case 'penyakit.apply':
                        $penyakit = $this->_getDataObject();
                        if (isset($penyakit->id) && $penyakit->id > 0) {
                            $id =$penyakit->id;
                            $this->Penyakit_Model->update($penyakit);
                        }
                        else {
                            $id = $this->Penyakit_Model->create($penyakit);
                        }
                        $data['data'] = $penyakit;
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Penyakit telah di simpan.'));
                        redirect('admin/penyakit/edit/'.$id.'/close', 'refresh');
                    case 'penyakit.save':
                        $penyakit = $this->_getDataObject();
						if (isset($penyakit->id) && $penyakit->id > 0) {
                            $id =$penyakit->id;
                            $this->Penyakit_Model->update($penyakit);
                        }
                        else {
                            $id = $this->Penyakit_Model->create($penyakit);
                        }
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Penyakit telah di simpan.'));
                        redirect('admin/penyakit/index', 'refresh');
                    case 'penyakit.save2new':
                        $penyakit = $this->_getDataObject();
						if (isset($penyakit->id) && $penyakit->id > 0) {
                            $id =$penyakit->id;
                            $this->Penyakit_Model->update($penyakit);
                        }
                        else {
                            $id = $this->Penyakit_Model->create($penyakit);
                        }
                        $data['data'] = $this->_getEmptyDataObject();
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Penyakit telah di simpan.'));
                        redirect('penyakit/add', 'refresh');
                }
            }
        } else {
			$this->data['extraCSS'] = $this->css_edit();
			$this->data['extraJS'] = $this->js_edit();
            $this->data['admin_status'] = FALSE;
            $this->data['menu_active'] = 'Informasi';
            $this->data['title'] = "Daftar Penyakit";
            $this->data['module_title'] = VToolBar_Helper::title('Penyakit Manager: Tambah Penyakit');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/penyakit/edit';
			
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $penyakit = $this->Penyakit_Model->getById($id);
                $this->data['is_new'] = FALSE;
            }
            else {
                $penyakit = $this->_getEmptyDataObject();
                $this->data['is_new'] = TRUE;
            }
            
            $this->data['data'] = $penyakit;
            $this->data['penyakit_state'] = $this->Penyakit_Model->getState();
            
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Informasi';
        $this->data['title'] = "Daftar Penyakit";
        $this->data['module_title'] = VToolBar_Helper::title('Penyakit Manager: Edit Penyakit');
		if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/penyakit/edit';
		$this->data['is_new'] = FALSE;
		
		$penyakit = $this->Penyakit_Model->getById($id);
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$penyakit->modified = date("Y-m-d H:i:s");
		$penyakit->version++;
		$this->data['data'] = $penyakit;
		$this->data['penyakit_state'] = $this->Penyakit_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	private function _getEmptyDataObject()
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $penyakit = new StdClass();
        $penyakit->id				= 0;
        $penyakit->nama             = '';
		$penyakit->image			= '';
		$penyakit->thumbnail		= '';
		$penyakit->deskripsi		= '';
		$penyakit->gejala			= '';
		$penyakit->pencegahan		= '';
		$penyakit->pengobatan		= '';
		$penyakit->obat				= '';
		$penyakit->catatan			= '';
		$penyakit->state			= 1;
		$penyakit->created			= $current_date;
		$penyakit->created_by		= 0;
		$penyakit->created_by_alias = '';
		$penyakit->modified 		= NULL;
		$penyakit->modified_by		= 0;
		$penyakit->attribs			= '';
		$penyakit->version			= 0;
		$penyakit->hits 			= 0;
        return $penyakit;
    }
	
	private function _getDataObject()
    {
        $penyakit = new StdClass();
		$penyakit->id               = isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $penyakit->nama             = $this->input->_clean_input_data($_POST['jform']['nama']);
		$penyakit->image			= $this->input->_clean_input_data($_POST['jform']['image']);
		$penyakit->thumbnail		= $this->input->_clean_input_data($_POST['jform']['thumbnail']);
		$penyakit->deskripsi		= $this->input->_clean_input_data($_POST['jform']['deskripsi']);
		$penyakit->gejala			= $this->input->_clean_input_data($_POST['jform']['gejala']);
		$penyakit->pencegahan		= $this->input->_clean_input_data($_POST['jform']['pencegahan']);
		$penyakit->pengobatan		= $this->input->_clean_input_data($_POST['jform']['pengobatan']);
		$penyakit->obat				= $this->input->_clean_input_data($_POST['jform']['obat']);
		$penyakit->catatan			= $this->input->_clean_input_data($_POST['jform']['catatan']);
		$penyakit->state			= $this->input->_clean_input_data($_POST['jform']['state']);
		$penyakit->created_by		= $this->input->_clean_input_data($_POST['jform']['created_by']);
		$penyakit->created_by_alias = $this->input->_clean_input_data($_POST['jform']['created_by_alias']);
		//$penyakit->modified 		= $this->input->_clean_input_data($_POST['jform']['modified']);
		$penyakit->modified_by      = isset($_POST['jform']['modified_by']) && ($_POST['jform']['modified_by'] > 0) ? $this->input->_clean_input_data($_POST['jform']['modified_by']) : 0;
		$penyakit->attribs         	= ''; //isset$this->input->_clean_input_data($_POST['jform']['attribs']);
		$penyakit->version          = isset($_POST['jform']['version']) && ($_POST['jform']['version'] > 0) ? $this->input->_clean_input_data($_POST['jform']['version']) : 0;
        return $penyakit;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('penyakit.add');
        VToolBar_Helper::editList('penyakit.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'penyakit.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_penyakit_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('penyakit.apply');
        VToolBar_Helper::save('penyakit.save');
        VToolBar_Helper::save2new('penyakit.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('penyakit.cancel');
		} else {
			VToolBar_Helper::cancel('penyakit.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_penyakit_manager_edit'));
	}
	
	private function css_view()
	{
		$css = '';
		$css .= '<link rel="stylesheet" href="'.base_url('css/admin/modal.css').'" media="all" type="text/css" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url('css/admin/extras.css.php').'" type="text/css" />'."\n";
		return $css;
	}
	
	private function css_edit()
	{
		$css = '';
		$css .= '<link rel="stylesheet" href="'.base_url('css/admin/modal.css').'" type="text/css"  title="Green"  media="all" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url('css/admin/calendar-jos.css').'" type="text/css"  title="Green"  media="all" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url('css/admin/extras.css.php').'" type="text/css" />'."\n";
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

/* End of file penyakit.php */
/* Location: ./application/controllers/penyakit.php */