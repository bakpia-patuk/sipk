<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['center_area'] = 'center_area';
        $this->data['right_column'] = 'right_column';
        
        $this->data['bottom_row_1'] = 'bottom_row_1_content';
		
		$this->data['footer_area'] = 'footer';
        $this->data['bottom_menu'] = 'bottom_menu';
        
		$this->load->view('template', $this->data);
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */