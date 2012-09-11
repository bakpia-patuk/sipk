<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
    }
	
	public function index()
    {
        if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'profile.apply':
					redirect('admin/admin', 'refresh');
                case 'profile.save':
                    redirect('admin/admin', 'refresh');
                case 'profile.cancel':
                    redirect('admin/admin', 'refresh');
			}
		}
        $this->data['extraCSS'] = $this->css();
        $this->data['extraJS'] = $this->js();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = '';
        $this->data['title'] = "My Profile";
        $this->data['module_title'] = VToolBar_Helper::title('My Profile');
        $this->addToolbarForm();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/admin/profile';
        $this->load->view('admin/template', $this->data);
    }
    
    protected function addToolbarForm()
	{
        VToolBar_Helper::apply('profile.apply', 'Save');
        VToolBar_Helper::save('profile.save');
        VToolBar_Helper::cancel('profile.cancel', 'Close');
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_dokter_manager_edit'));
	}
	
    private function css()
	{
		$css = '';
		$css .= '<link href="'.base_url().'css/admin/extras.css.php" type="text/css" />'."\n";
		return $css;
	}
	
	private function js()
	{
		$js = '';
		$js .= '<script src="'.base_Url('js/admin/validate.js').'" type="text/javascript"></script>'."\n";
        $js .= '<script src="'.base_Url('js/admin/MC.js').'" type="text/javascript"></script>'."\n";
		return $js;
	}
	
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */