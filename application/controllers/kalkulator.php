<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kalkulator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index($kategori)
	{
		$this->data['css'] = $this->css();
		$this->data['header'] = 'header';
		$this->data['navigation'] = 'navigation';
		$this->data['body'] = 'under_construction';
		$this->data['footer'] = 'footer';
		
		//$record = $this->artikel_model->getAll();
		//$this->data['data'] = $record['data'];
		
		$this->load->view('template', $this->data);
	}
	
	public function BMR()
	{
		$this->data['css'] = $this->css();
		$this->data['header'] = 'header';
		$this->data['navigation'] = 'navigation';
		$this->data['body'] = 'under_construction';
		$this->data['footer'] = 'footer';
		
		//$record = $this->artikel_model->getAll();
		//$this->data['data'] = $record['data'];
		
		$this->load->view('template', $this->data);
	}
	
	public function IMT()
	{
		$this->data['css'] = $this->css();
		$this->data['header'] = 'header';
		$this->data['navigation'] = 'navigation';
		$this->data['body'] = 'under_construction';
		$this->data['footer'] = 'footer';
		
		//$record = $this->artikel_model->getAll();
		//$this->data['data'] = $record['data'];
		
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

/* End of file kalkulator.php */
/* Location: ./application/controllers/kalkulator.php */