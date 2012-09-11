<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penyakit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penyakit_Model');
	}

	public function index()
	{
		$this->data['css'] = $this->css();
		$this->data['header'] = 'header';
		$this->data['navigation'] = 'navigation';
		$this->data['body'] = 'penyakit/view';
		$this->data['footer'] = 'footer';
		
		if ($this->input->post('limit')) {
            $limit = $this->input->post('limit');
            $this->data['limitstart'] = 0;
        }
        else {
            if ($this->uri->segment(4) == FALSE) {
                $limit = 20;
            }
            else {
                $limit = $this->uri->segment(4);
            }
            if ($this->uri->segment(3) == FALSE) {
                if ($this->input->post('limitstart')) {
                    $this->data['limitstart'] = $this->input->post('limitstart');
                }
                else {
                    $this->data['limitstart'] = 0;
                }
            }
            else {
                $this->data['limitstart'] = $this->uri->segment(3);
            }
        }
		$record = $this->Penyakit_Model->getAll($limit, $this->data['limitstart']);
		$this->load->library('pagination');
        $config['base_url'] = site_url('penyakit/index');
        $config['total_rows'] = $record['numrows'];
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);

		$this->data['data'] = $record['data'];
		
		/* $this->data['kategori'] = $this->perguruan_model->getKategori(TRUE, FALSE);
		$this->data['status'] = $this->perguruan_model->getStatus(TRUE, FALSE);
		$this->data['akreditasi'] = $this->perguruan_model->getAkreditasi(TRUE, FALSE);
		$this->data['wilayah'] = $this->perguruan_model->getWilayah(TRUE, FALSE);
		$this->data['sort'] = $this->perguruan_model->getSort(); */
		
		$this->load->view('template', $this->data);
	}
	
	public function detail($id)
	{
		$this->data['css'] = $this->css();
		$this->data['header'] = 'header';
		$this->data['navigation'] = 'navigation';
		$this->data['body'] = 'penyakit/detail';
		$this->data['footer'] = 'footer';
		
		$this->data['data'] = $this->Penyakit_Model->getById($id);
		
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

/* End of file penyakit.php */
/* Location: ./application/controllers/penyakit.php */