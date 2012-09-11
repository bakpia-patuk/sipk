<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Help extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
    public function index()
    {
		$this->data['extraCSS'] = $this->css();
		$this->data['extraJS'] = $this->js();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Help';
		$this->data['title'] = "SIPK Help";
		$this->data['module_title'] = VToolBar_Helper::title('SIPK Help');
		$this->data['menu'] = 'admin/menu';
		$this->data['content'] = 'admin/help/help_manager';
		$this->data['topic'] = 'help_start_here';
        $this->load->view('admin/template', $this->data);
    }
	
	public function get_help()
	{
		$this->data['extraCSS'] = $this->help_css();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Help';
		$this->data['title'] = "SIPK Help";
		$this->data['module_title'] = VToolBar_Helper::title('SIPK Help');
		$this->data['menu'] = 'admin/menu';
		$this->data['content'] = 'admin/help/help_manager';
		$this->data['topic'] = 'admin/help/'.$_GET['topic'];;
		$this->load->view('admin/help', $this->data);
	}
	
	private function css()
	{
		$css = '';
		$css .= '<link rel="stylesheet" href="'.base_url().'css/help/extras.css.php" type="text/css" />'."\n";
		return $css;
	}
	
	private function help_css()
	{
		$css = '';
		$css .= '<link rel="stylesheet" href="'.base_url().'css/help/reset.css" type="text/css" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url().'css/help/help.css" type="text/css" />'."\n";
		return $css;
	}
	
	private function js()
	{
		$js = '';
		$js .= '<script src="'.base_Url('js/MC.js').'" type="text/javascript"></script>'."\n";
		return $js;
	}
    
}

/* End of file help.php */
/* Location: ./application/controllers/help.php */