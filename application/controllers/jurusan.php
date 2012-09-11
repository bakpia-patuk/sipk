<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jurusan_Model');
	}

	public function index()
	{
		$this->data['header'] = 'header';
		
		//$this->data['top_row_1'] = 'top_row_1';
		//$this->data['top_row_2'] = 'top_row_2';
		//$this->data['top_row_3'] = 'top_row_3';
		
		$this->data['center_area'] = 'center_area';
			//$this->data['above_column_wrap'] = 'above_column_wrap';
			$this->data['column_wrap'] = 'column_wrap';
				$this->data['column_wrap_content'] = 'jurusan/view';
				//$this->data['left_column'] = 'left_column';
				$this->data['right_column'] = 'right_column';
			//$this->data['below_column_wrap'] = 'below_column_wrap';
		
		$this->data['bottom_row_1'] = 'bottom_row_1';
			$this->data['bottom_row_1_content'] = 'bottom_row_1_content';
		//$this->data['bottom_row_2'] = 'bottom_row_2';
		//$this->data['bottom_row_3'] = 'bottom_row_3';
		
		$this->data['footer_area'] = 'footer_area';
		
		$this->data['filter_jenjang'] = '';
		$this->data['filter_status'] = '';
		$this->data['filter_wilayah'] = '';
		
		$record = $this->Jurusan_Model->getAll();
		$this->data['data'] = $record['data'];
		/*
		$this->data['sekolah_jenjang'] = $this->Sekolah_Model->getJenjang(TRUE, FALSE);
		$this->data['sekolah_status'] = $this->Sekolah_Model->getStatus(TRUE, FALSE);
		$this->data['sekolah_wilayah'] = $this->Sekolah_Model->getWilayah(TRUE, FALSE);
		$this->data['sort'] = $this->Sekolah_Model->getSort();
        */
		$this->load->view('template', $this->data);
	}
	
	public function detail($id)
	{
		$this->data['header'] = 'header';
		
		//$this->data['top_row_1'] = 'top_row_1';
		//$this->data['top_row_2'] = 'top_row_2';
		//$this->data['top_row_3'] = 'top_row_3';
		
		$this->data['center_area'] = 'center_area';
			//$this->data['above_column_wrap'] = 'above_column_wrap';
			$this->data['column_wrap'] = 'column_wrap';
				$this->data['column_wrap_content'] = 'sekolah/detail';
				//$this->data['left_column'] = 'left_column';
				$this->data['right_column'] = 'right_column';
			//$this->data['below_column_wrap'] = 'below_column_wrap';
		
		$this->data['bottom_row_1'] = 'bottom_row_1';
			$this->data['bottom_row_1_content'] = 'bottom_row_1_content';
		//$this->data['bottom_row_2'] = 'bottom_row_2';
		//$this->data['bottom_row_3'] = 'bottom_row_3';
		
		$this->data['footer_area'] = 'footer_area';

		$this->data['data'] = $this->Sekolah_Model->getById($id);
		
		$this->load->view('template', $this->data);
	}
	
}

/* End of file jurusan.php */
/* Location: ./application/controllers/jurusan.php */