<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_Us extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('contact_us_model');
	}

	public function index()
	{
        $this->data['center_area'] = 'company_profile/contact_us';
        $this->data['right_column'] = 'right_column';
		
		$this->data['footer_area'] = 'footer';
        $this->data['bottom_menu'] = 'bottom_menu';
		
		$this->load->view('template', $this->data);
	}

}

/* End of file contact_us.php */
/* Location: ./application/controllers/contact_us.php */