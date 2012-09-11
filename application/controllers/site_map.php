<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_Map extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['center_area'] = 'company_profile/site_map';
        $this->data['right_column'] = 'right_column';
		
		$this->data['footer_area'] = 'footer';
        $this->data['bottom_menu'] = 'bottom_menu';
		
		$this->load->view('template', $this->data);
	}

}

/* End of file site_map.php */
/* Location: ./application/controllers/site_map.php */