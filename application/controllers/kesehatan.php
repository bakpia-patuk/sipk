<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kesehatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kesehatan_Model');
	}

	public function index()
	{
        $this->data['center_area'] = 'kesehatan/view';
        $this->data['right_column'] = 'right_column_info';
        
        $this->data['bottom_row_1'] = 'bottom_row_1_content';
		
		$this->data['footer_area'] = 'footer';
        $this->data['bottom_menu'] = 'bottom_menu';
		
        /*
		$this->data['filter_jenjang'] = '';
		$this->data['filter_status'] = '';
		$this->data['filter_wilayah'] = '';
        */
        
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
        
        $record = $this->Kesehatan_Model->getAll($this->data['limit'], $this->data['limitstart']);
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
        
        $config['base_url'] = site_url('kesehatan/index');
        $config['total_rows'] = $record['total_rows'];
        $this->data['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		$this->data['data'] = $record['data'];
        
        /*
		$this->data['kategori'] = $this->Kesehatan_Model->getKategori(TRUE, FALSE);
		$this->data['status'] = $this->Kesehatan_Model->getStatus(TRUE, FALSE);
		$this->data['akreditasi'] = $this->Kesehatan_Model->getAkreditasi(TRUE, FALSE);
		$this->data['wilayah'] = $this->Kesehatan_Model->getWilayah(TRUE, FALSE);
		$this->data['sort'] = $this->Kesehatan_Model->getSort();
        */
		
		$this->load->view('template', $this->data);
	}
	
	public function detail($id)
	{
		$this->data['css'] = $this->css();
		$this->data['header'] = 'header';
		$this->data['navigation'] = 'navigation';
		$this->data['body'] = 'kesehatan/detail';
		$this->data['footer'] = 'footer';
		
		$this->data['data'] = $this->Kesehatan_Model->getById($id);
		
		$this->load->view('template', $this->data);
	}

	private function css()
	{
		$css = '';
		$css .= '<link href="'.base_url().'css/style.css" media="all" rel="stylesheet" type="text/css" />';
		$css .= '<!--[if IE]> <link href="/css/style-ie-brengsek.css" media="all" rel="stylesheet" type="text/css" /><![endif]-->';
		$css .= '<link rel="stylesheet" href="'.base_url().'css/smoothness/jquery-ui-1.8.custom.css" type="text/css" media="screen" />';
		$css .= '<link rel="stylesheet" href="'.base_url().'css/post.css" type="text/css" media="screen" />';
		return $css;
	}
	
}

/* End of file kesehatan.php */
/* Location: ./application/controllers/kesehatan.php */