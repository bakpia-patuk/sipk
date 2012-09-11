<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'kategori.add':
					redirect('admin/kategori/add', 'refresh');
				case 'kategori.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $kategori_id = $id;
							break;
                        }
						redirect('admin/kategori/edit/'.$kategori_id, 'refresh');
                    }
                case 'kategori.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Kategori_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' Kategori telah di hapus.'));
                        }
                    }
                    redirect('admin/kategori', 'refresh');
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
			$like['judul'] = $this->input->post('filter_search');
			$like['deskripsi'] = $this->input->post('filter_search');
			$this->data['filter_search'] = $this->input->post('filter_search');
		}
		
		$this->data['extraCSS'] = $this->css_view();
		$this->data['extraJS'] = $this->js_view();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Artikel';
		$this->data['title'] = 'Kategori';
		$this->data['module_title'] = VToolBar_Helper::title('User Kategori: Kategori');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/kategori/view';
		
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
			$this->data['filter_order'] = 'kategori';
		}
		if ($this->input->post('filter_order_dir')) {
            $this->data['filter_order_dir'] = $this->input->post('filter_order_dir');
        }
		else {
			$this->data['filter_order_dir'] = 'asc';
		}
		
        $record = $this->Kategori_Model->getAll($this->data['limit'], $this->data['limitstart'], $this->data['filter_order'], $this->data['filter_order_dir'], $where, $like);
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
        
        $config['base_url'] = site_url('admin/kategori/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        if ($this->input->post('task')) {
            switch ($this->input->post('task')) {
                case 'kategori.apply':
                    $kategori = $this->_getDataArray();
					if (isset($kategori->id) && ($kategori->id > 0)) {
						$id = $kategori->id;
						$this->Kategori_Model->update($kategori);
					}
					else {
						$id = $this->Kategori_Model->create($kategori);
					}
					$data['data'] = $kategori;
					$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Kategori telah di simpan.'));
					redirect('admin/kategori/edit/'.$id.'/close', 'refresh');
                case 'kategori.save':
                    $kategori = $this->_getDataArray();
					if (isset($kategori->id) && ($kategori->id > 0)) {
						$id = $kategori->id;
						$this->Kategori_Model->update($kategori);
					}
					else {
						$id = $this->Kategori_Model->create($kategori);
					}
                    $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Kategori telah di simpan.'));
                    redirect('admin/kategori/index', 'refresh');
                case 'kategori.save2new':
                    $kategori = $this->_getDataArray();
					if (isset($kategori->id) && ($kategori->id > 0)) {
						$id = $kategori->id;
						$this->Kategori_Model->update($kategori);
					}
					else {
						$id = $this->Kategori_Model->create($kategori);
					}
                    $data['data'] = $this->_getEmptyDataArray();
                    $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Kategori telah di simpan.'));
                    redirect('admin/kategori/add', 'refresh');
            }
        } else {
			$this->data['extraCSS'] = $this->css_edit();
			$this->data['extraJS'] = $this->js_edit();
			$this->data['admin_status'] = FALSE;
            $this->data['menu_active'] = 'Artikel';
            $this->data['title'] = "Kategori";
            $this->data['module_title'] = VToolBar_Helper::title('Kategori Manager: Kategori');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/kategori/edit';
			
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $kategori = $this->Kategori_Model->getById($id);
				$this->data['is_new'] = FALSE;
            }
            else {
                $kategori = $this->_getEmptyDataArray();
				$this->data['is_new'] = TRUE;
            }
			
			$this->data['data'] = $kategori;
			
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Artikel';
        $this->data['title'] = "Daftar Kategori";
        $this->data['module_title'] = VToolBar_Helper::title('Kategori Manager: Edit Kategori');
		if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/kategori/edit';
		$this->data['is_new'] = FALSE;
		
		$kategori = $this->Kategori_Model->getById($id);
		$this->data['data'] = $kategori;
		
        $this->load->view('admin/template', $this->data);
    }
	
	private function _getEmptyDataArray()
    {
		$kategori = new StdClass();
		$kategori->id		= 0;
        $kategori->kategori	= '';
        return $kategori;
    }
	
	private function _getDataArray()
    {
		$kategori = new StdClass();
        $kategori->id		= isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $kategori->kategori	= $this->input->_clean_input_data($_POST['jform']['kategori']);
        return $kategori;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('kategori.add');
        VToolBar_Helper::editList('kategori.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'kategori.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_kategori_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('kategori.apply');
        VToolBar_Helper::save('kategori.save');
        VToolBar_Helper::save2new('kategori.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('kategori.cancel');
		} else {
			VToolBar_Helper::cancel('kategori.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_kategori_manager_edit'));
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

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */