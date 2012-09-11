<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
    }
	
	public function index()
	{
		$this->load->model('users_model');

		if ($this->db->conn_id == "")
		{
			show_error("Sipk could not connect to your database with the information provided in application/config/database.php");
		}

		if (!$this->db->table_exists('settings'))
		{
			//redirect('/install/not_installed', 'refresh');
			//exit;
		}

		if ($this->site_sentry->is_logged_in()) 
		{
			//$data['page_title'] = $this->lang->line('menu_root_system');
			$data['extraHeadContent'] = "<script type=\"text/javascript\" src=\"" . base_url()."js/newinvoice.js\"></script>\n";

			// for the new invoice generation dropdown
			//$data['clientList'] = $this->clients_model->getAllClients();

			// is there a new version available?
			//$this->load->model('utilities_model');
			//$status = $this->utilities_model->_version_check();
			/*
			if ($status == 'new')
			{
				$this->load->helper('url');
				$data['message'] = $this->lang->line('utilities_new_version_available') . anchor('http://bambooinvoice.org', 'http://bambooinvoice.org');
			}
			else
			{
				$data['message'] = '';
			}
			*/
            
            $this->data['extraCSS'] = $this->css();
			$this->data['extraJS'] = $this->js();
            $this->data['admin_status'] = TRUE;
            $this->data['menu_active'] = 'Dashboard';
            $this->data['title'] = "Dashboard";
            $this->data['module_title'] = VToolBar_Helper::title('Site Dashboard');
            $this->data['help'] = NULL;
            $this->data['toolbar'] = NULL;
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/dashboard/dashboard';
			$this->load->view('admin/template', $this->data);
		}
		else
		{
			if ($this->settings_model->get_setting('demo_flag') == 'y')
			{
				// for the demo, load the page that describes BambooInvoice, but if 
				// this isn't the demo, then move the user to the login page
				$data['page_title'] = $this->lang->line('menu_catchphrase_nobreak');
				$this->load->view('index/index_logged_out', $data);
			}
			else
			{
				redirect('admin/login');
			}
		}
	}
    
    public function config()
    {
        $this->data['extraCSS'] = $this->css();
        $this->data['extraJS'] = $this->js_config();
        $this->data['admin_status'] = TRUE;
        $this->data['menu_active'] = 'Configure';
        $this->data['title'] = "Configure";
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/admin/config';
        $this->load->view('admin/template', $this->data);
    }
    
    private function css()
	{
		$css = '';
		$css .= '<link href="'.base_url().'css/admin/rokquicklinks.css" type="text/css" />'."\n";
        $css .= '<link href="'.base_url().'css/admin/rokuserstats.css" type="text/css" />'."\n";
        $css .= '<link href="'.base_url().'css/admin/rokuserchart.css" type="text/css" />'."\n";
        $css .= '<link href="'.base_url().'css/admin/rokadminaudit.css" type="text/css" />'."\n";
		return $css;
	}
	
	private function js()
	{
		$js = '';
		$js .= '<script src="'.base_Url('js/admin/MC.js').'" type="text/javascript"></script>'."\n";
        $js .= '<script src="'.base_Url('js/admin/MC-Audit.js').'" type="text/javascript"></script>'."\n";
		return $js;
	}
    
    private function js_config()
	{
		$js = '';
		$js .= '<script src="'.base_Url('js/switcher.js').'" type="text/javascript"></script>'."\n";
		return $js;
	}
	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */