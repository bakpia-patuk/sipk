<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sysinfo extends MY_Controller {
    
    public function __construct()
	{
		parent::__construct();
        $this->load->model('Sysinfo_Model');
	}
    
    public function index()
    {
        $this->data['extraCSS'] = $this->css();
		$this->data['extraJS'] = $this->js();
        $this->data['admin_status'] = TRUE;
        $this->data['menu_active'] = '';
        $this->data['title'] = "Administrator | System Information";
        $this->data['module_title'] = VToolBar_Helper::title('System Information');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/sysinfo/view';
        
        $this->data['info'] = $this->Sysinfo_Model->getInfo();
        $this->data['php_settings'] = $this->Sysinfo_Model->getPhpSettings();
        //$this->data['config'] = $this->Sysinfo_Model->getConfig();
        //$this->data['directory'] = $this->Sysinfo_Model->getDirectory();
        $this->data['php_info'] = $this->Sysinfo_Model->getPhpInfo();
        
        $this->load->view('admin/template', $this->data);
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::help('Golongan Perkiraan Manager');
	}
    
	private function css()
	{
		$css = '';
		$css .= '<link rel="stylesheet" href="'.base_url().'css/extras.css" type="text/css" />'."\n";
		return $css;
	}
    
	private function js()
	{
		$js = '';
		$js .= '<script src="'.base_Url('js/switcher.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/MC.js').'" type="text/javascript"></script>'."\n";
		return $js;
	}
    
}

?>
