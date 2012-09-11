<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('abstract_html_contents');
	}

	public function index()
	{
        if (isset($_GET['kategori']))
            $this->data['kategori'] = $_GET['kategori'];
        else
            $this->data['kategori'] = 'Semua';
        
        $this->data['center_area'] = 'artikel/view';
        $this->data['right_column'] = 'right_column_artikel';
        
        $this->data['bottom_row_1'] = 'bottom_row_1_content';
		
		$this->data['footer_area'] = 'footer';
        $this->data['bottom_menu'] = 'bottom_menu';
		
		$this->data['limit'] = 20;
        $this->data['limitstart'] = 0;
		
		$record = $this->Artikel_Model->getAll($this->data['limit'], $this->data['limitstart']);
		$this->load->library('pagination');
        $config['base_url'] = site_url('artikel/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
        $this->data['data'] = $record['data'];
		
		$this->load->view('template', $this->data);
	}
	
	public function detail($id)
	{
		$this->data['css'] = $this->css();
		$this->data['header'] = 'header';
		$this->data['navigation'] = 'navigation';
		$this->data['body'] = 'artikel/detail';
		$this->data['footer'] = 'footer';
		
		$this->data['kategori'] = isset($_GET['kategori']) ? $_GET['kategori'] : 'semua';
		//$id = $_GET['id'];
		
		$this->data['data'] = $this->Artikel_Model->getById($id);
		
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

/* End of file artikel.php */
/* Location: ./application/controllers/artikel.php */