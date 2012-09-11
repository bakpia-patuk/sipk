<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privacy_Policy extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('privacy_policy_model');
	}

	public function index()
	{
        $this->data['center_area'] = 'company_profile/privacy_policy';
        $this->data['right_column'] = 'right_column';
		
		$this->data['footer_area'] = 'footer';
        $this->data['bottom_menu'] = 'bottom_menu';
		
		$this->load->view('template', $this->data);
	}

}

/* End of file privacy_policy.php */
/* Location: ./application/controllers/privacy_policy.php */