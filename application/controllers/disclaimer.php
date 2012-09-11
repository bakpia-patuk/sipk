<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Disclaimer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('disclaimer_model');
	}

	public function index()
	{
        $this->data['center_area'] = 'support/disclaimer';
        $this->data['right_column'] = 'right_column';
		
		$this->data['footer_area'] = 'footer';
        $this->data['bottom_menu'] = 'bottom_menu';
		
		$this->load->view('template', $this->data);
	}
	
}

/* End of file disclaimer.php */
/* Location: ./application/controllers/disclaimer.php */