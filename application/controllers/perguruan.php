<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perguruan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Perguruan_Model');
	}

	public function index()
	{
        $this->data['center_area'] = 'perguruan/view';
        $this->data['right_column'] = 'right_column_info';
        
        $this->data['bottom_row_1'] = 'bottom_row_1_content';
		
		$this->data['footer_area'] = 'footer';
        $this->data['bottom_menu'] = 'bottom_menu';
		
        $this->data['filter_kategori'] = '';
        $this->data['filter_status'] = '';
		$this->data['filter_akreditasi'] = '';
		$this->data['filter_wilayah'] = '';
        
        if ($this->input->post('limit')) {
            $this->data['limit'] = $this->input->post('limit');
        }
		else {
			$this->data['limit'] = 10;
		}
		if ($this->input->post('limitstart')) {
            $this->data['limitstart'] = $this->input->post('limitstart');
        }
		else {
			$this->data['limitstart'] = 0;
		}
		
		$record = $this->Perguruan_Model->getAll($this->data['limit'], $this->data['limitstart']);
        $this->load->library('pagination');
        
        $config['full_tag_open'] = "<div class=\"pagination\">\n<span>&laquo;</span>\n";
		$config['full_tag_close'] = "<span>&raquo;</span></div>\n";
		
		$config['first_link'] = "Start";
		$config['first_tag_open'] = "";
		$config['first_tag_close'] = "";
		
		$config['prev_link'] = "Prev";
		$config['prev_tag_open'] = "";
		$config['prev_tag_close'] = "";
		
		$config['full_page_open'] = "";
		$config['full_page_close'] = "";
		
		$config['cur_tag_open'] = '<span><strong>';
		$config['cur_tag_close'] = '</strong></span>';
		
		$config['num_tag_open'] = '';
		$config['num_tag_close'] = '';
		
		$config['next_link'] = "Next";
		$config['next_tag_open'] = "";
		$config['next_tag_close'] = "";
		
		$config['last_link'] = 'End';
		$config['last_tag_open'] = "";
		$config['last_tag_close'] = "";
		
		$config['inactive_tag_open'] = '<span>';
		$config['inactive_tag_close'] = '</span>';
        
        $config['full_page_counter_open']      = '<p class="counter">';
        $config['full_page_counter_close']     = '</p>';
        
        $config['full_limit_box_open']      = '<div class="display-limit">';
        $config['full_limit_box_close']     = '</div>';
        $config['title_limit_box_open']     = '';
        $config['title_limit_box_close']    = '';
        $config['title_limit_box_before']   = TRUE;
        
        $config['base_url'] = site_url('perguruan/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
		$this->data['data'] = $record['data'];
		
		$this->data['perguruan_kategori'] = $this->Perguruan_Model->getKategori(TRUE, FALSE);
		$this->data['perguruan_status'] = $this->Perguruan_Model->getStatus(TRUE, FALSE);
		$this->data['perguruan_akreditasi'] = $this->Perguruan_Model->getAkreditasi(TRUE, FALSE);
		$this->data['perguruan_wilayah'] = $this->Perguruan_Model->getWilayah(TRUE, FALSE);
		$this->data['perguruan_sort'] = $this->Perguruan_Model->getSort();
		
		$this->load->view('template', $this->data);
	}
	
	public function detail($id)
	{
        $this->data['center_area'] = 'perguruan/detail';
        $this->data['right_column'] = 'right_column_info';
        
        $this->data['bottom_row_1'] = 'bottom_row_1_content';
		
		$this->data['footer_area'] = 'footer';
        $this->data['bottom_menu'] = 'bottom_menu';
        
		$this->data['data'] = $this->Perguruan_Model->getById($id);
		
		$this->load->view('template', $this->data);
    }

}

/* End of file perguruan.php */
/* Location: ./application/controllers/perguruan.php */