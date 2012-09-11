<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perguruan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Perguruan_Model');
		$this->load->model('Perguruan_Program_Studi_Model');
		$this->load->model('Perguruan_Fakultas_Model');
		$this->load->model('Perguruan_Jurusan_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'perguruan.add':
					redirect('admin/perguruan/add', 'refresh');
                case 'perguruan.edit':
					if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $perguruan_id = $id;
							break;
                        }
						redirect('admin/perguruan/edit/'.$perguruan_id, 'refresh');
                    }
                case 'perguruan.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Spesialis_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' Perguruan Tinggi telah di hapus.'));
                        }
                    }
                    redirect('admin/perguruan', 'refresh');
			}
		}
        
        $where = array();
		$this->data['filter_published'] = '';
		if ($this->input->post('filter_published')) {
			$where['state'] = $this->input->post('filter_published');
			$this->data['filter_published'] = $this->input->post('filter_published');
		}
		$this->data['filter_kategori'] = '';
		if ($this->input->post('filter_kategori')) {
			$where['kategori'] = $this->input->post('filter_kategori');
			$this->data['filter_kategori'] = $this->input->post('filter_kategori');
		}
		$like = array();
		$this->data['filter_search'] = '';
		if ($this->input->post('filter_search')) {
			$like['judul'] = $this->input->post('filter_search');
			$like['deskripsi'] = $this->input->post('filter_search');
			$this->data['filter_search'] = $this->input->post('filter_search');
		}
        
		$this->data['extraCSS'] = $this->css_view();
		$this->data['extraJS'] = $this->js_view();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Informasi';
		$this->data['title'] = 'Daftar Perguruan Tinggi';
		$this->data['module_title'] = VToolBar_Helper::title('Perguruan Tinggi Manager: Perguruan Tinggi');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/perguruan/view';
        
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
		
		if ($this->input->post('filter_order')) {
            $this->data['filter_order'] = $this->input->post('filter_order');
        }
		else {
			$this->data['filter_order'] = 'nama';
		}
		if ($this->input->post('filter_order_dir')) {
            $this->data['filter_order_dir'] = $this->input->post('filter_order_dir');
        }
		else {
			$this->data['filter_order_dir'] = 'asc';
		}

		$record = $this->Perguruan_Model->getAll($this->data['limit'], $this->data['limitstart'], $this->data['filter_order'], $this->data['filter_order_dir'], $where, $like);
		$this->load->library('pagination');
        
        $config['full_tag_open'] = "<del class=\"mc-pagination-container\">\n<div class=\"mc-pagination\">\n";
		$config['full_tag_close'] = "</div>\n</del>\n";
		
		$config['first_link'] = "Start";
		$config['first_tag_open'] = "<div class=\"page-button\">\n<div class=\"start\">\n";
		$config['first_tag_close'] = "</div>\n</div>\n";
		
		$config['prev_link'] = "Prev";
		$config['prev_tag_open'] = "<div class=\"page-button\">\n<div class=\"prev\">";
		$config['prev_tag_close'] = "</div>\n</div>\n";
		
		$config['full_page_open'] = "<div class=\"pages\">\n<div class=\"page\">\n";
		$config['full_page_close'] = "</div>\n</div>\n";
		
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		
		$config['num_tag_open'] = '';
		$config['num_tag_close'] = '';
		
		$config['next_link'] = "Next";
		$config['next_tag_open'] = "<div class=\"page-button\">\n<div class=\"next\">";
		$config['next_tag_close'] = "</div>\n</div>\n";
		
		$config['last_link'] = 'End';
		$config['last_tag_open'] = "<div class=\"page-button\">\n<div class=\"end\">\n";
		$config['last_tag_close'] = "</div>\n</div>\n";
		
		$config['inactive_tag_open'] = '<span>';
		$config['inactive_tag_close'] = '</span>';
        
        $config['full_page_counter_open']      = '<div class="mc-page-count">';
        $config['full_page_counter_close']     = '</div>';
        
        $config['full_limit_box_open']      = '<div class="mc-limit">';
        $config['full_limit_box_close']     = '</div>';
        $config['title_limit_box_open']     = '<span>';
        $config['title_limit_box_close']    = '</span>';
        $config['title_limit_box_before']   = FALSE;
        
        $config['base_url'] = site_url('admin/perguruan/index');
        $config['total_rows'] = $record['total_rows'];
        $config['per_page'] = $this->data['limit'];
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		$this->data['perguruan_kategori'] = $this->Perguruan_Model->getKategori(FALSE, FALSE);
		$this->data['perguruan_status'] = $this->Perguruan_Model->getStatus(FALSE, FALSE);
		$this->data['perguruan_akreditasi'] = $this->Perguruan_Model->getAkreditasi(FALSE, FALSE);
		$this->data['perguruan_wilayah'] = $this->Perguruan_Model->getWilayah(FALSE, FALSE);
		$this->data['perguruan_state'] = $this->Perguruan_Model->getState();
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        
        $this->form_validation->set_error_delimiters('<div class="error" style="color: #CC0000; margin-left: 150px;">', '</div>');
		$this->form_validation->set_rules('jform[id]', 'ID', '');
        $this->form_validation->set_rules('jform[spesialis]', 'Spesialis', 'required');
        $this->form_validation->set_rules('jform[state]', 'Status', '');
        $this->form_validation->set_rules('jform[gelar]', 'Gelar', '');
        $this->form_validation->set_rules('jform[deskripsi]', 'Deskripsi', '');
        
        if ($this->input->post('task')) {
            if ($this->form_validation->run() == TRUE) {
                switch ($this->input->post('task')) {
                    case 'perguruan.apply':
                        $perguruan = $this->_getDataObject();
                        if (isset($perguruan->id) && $perguruan->id > 0) {
                            $id = $perguruan->id;
                            $this->Perguruan_Model->update($perguruan);
                        }
                        else {
                            $id = $this->Perguruan_Model->create($perguruan);
                        }
                        $data['data'] = $perguruan;
						$this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Perguruan Tinggi telah di simpan.'));
                        redirect('admin/perguruan/edit/'.$id.'/close', 'refresh');
                    case 'perguruan.save':
                        $perguruan = $this->_getDataObject();
						if (isset($perguruan->id) && $perguruan->id > 0) {
                            $id = $perguruan->id;
                            $this->Perguruan_Model->update($perguruan);
                        }
                        else {
                            $id = $this->Perguruan_Model->create($perguruan);
                        }
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Perguruan Tinggi telah di simpan.'));
                        redirect('admin/perguruan/index', 'refresh');
                    case 'perguruan.save2new':
                        $perguruan = $this->_getDataObject();
						if (isset($perguruan->id) && $perguruan->id > 0) {
                            $id = $perguruan->id;
                            $this->Perguruan_Model->update($perguruan);
                        }
                        else {
                            $id = $this->Perguruan_Model->create($perguruan);
                        }
                        $data['data'] = $this->_getEmptyDataObject();
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Perguruan Tinggi telah di simpan.'));
                        redirect('admin/perguruan/add', 'refresh');
                }
				$display = FALSE;
            }
			else {
                $display = TRUE;
            }
		} else {
            $display = TRUE;
        }
        if ($display == TRUE) {
			$this->data['extraCSS'] = $this->css_edit();
			$this->data['extraJS'] = $this->js_edit();
            $this->data['admin_status'] = FALSE;
            $this->data['menu_active'] = 'Informasi';
            $this->data['title'] = "Perguruan Tinggi";
            $this->data['module_title'] = VToolBar_Helper::title('Perguruan Tinggi Manager: Perguruan Tinggi');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/perguruan/edit';
            
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $perguruan = $this->Perguruan_Model->getById($id);
				$this->data['is_new'] = FALSE;
            }
            else {
                $perguruan = $this->_getEmptyDataObject();
				$this->data['is_new'] = TRUE;
            }
			
            $this->data['data'] = $perguruan;
			$this->data['perguruan_kategori'] = $this->Perguruan_Model->getKategori(FALSE, TRUE);
			$this->data['perguruan_status'] = $this->Perguruan_Model->getStatus(FALSE, TRUE);
			$this->data['perguruan_akreditasi'] = $this->Perguruan_Model->getAkreditasi(FALSE, TRUE);
			$this->data['perguruan_wilayah'] = $this->Perguruan_Model->getWilayah(FALSE, TRUE);
			$this->data['perguruan_state'] = $this->Perguruan_Model->getState();
            $this->data['perguruan_program_studi'] = $this->Perguruan_Model->getProgramStudi(FALSE, TRUE);
			
			$aProgramStudies = array();
			$pss = $this->Perguruan_Program_Studi_Model->getAllByPerguruanId($perguruan->id);
			$program_studies = $pss['data'];
			foreach ($program_studies as $ps) {
				$aProgramStudies[$ps->id] = $ps;
				$aProgramStudies[$ps->id]->fakultass = array();
				$flts = $this->Perguruan_Fakultas_Model->getAllByProgramStudiId($ps->id);
				$fakultass = $flts['data'];
				foreach ($fakultass as $flt) {
					$aProgramStudies[$ps->id]->fakultass[$flt->id] = $flt;
					$aProgramStudies[$ps->id]->fakultass[$flt->id]->jurusans = array();
					$jrss = $this->Perguruan_Jurusan_Model->getAllByFakultasId($flt->id);
					$jurusans = $jrss['data'];
					foreach ($jurusans as $jrs) {
						$aProgramStudies[$ps->id]->fakultass[$flt->id]->jurusans = $jrs;
					}
				}
			}
			$this->data['member_program_studies'] = $aProgramStudies[;
			
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Informasi';
        $this->data['title'] = "Daftar Perguruan Tinggi";
        $this->data['module_title'] = VToolBar_Helper::title('Perguruan Tinggi Manager: Edit Perguruan Tinggi');
		if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/perguruan/edit';
		$this->data['is_new'] = FALSE;
		
		$perguruan = $this->Perguruan_Model->getById($id);
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$perguruan->modified = date("Y-m-d H:i:s");
		$perguruan->version++;
		$this->data['data'] = $perguruan;
		$this->data['perguruan_kategori'] = $this->Perguruan_Model->getKategori(FALSE, TRUE);
        $this->data['perguruan_status'] = $this->Perguruan_Model->getStatus(FALSE, TRUE);
        $this->data['perguruan_akreditasi'] = $this->Perguruan_Model->getAkreditasi(FALSE, TRUE);
        $this->data['perguruan_wilayah'] = $this->Perguruan_Model->getWilayah(FALSE, TRUE);
        $this->data['perguruan_state'] = $this->Perguruan_Model->getState();
		
		$aProgramStudies = array();
		$pss = $this->Perguruan_Program_Studi_Model->getAllByPerguruanId($perguruan->id);
		$program_studies = $pss['data'];
		foreach ($program_studies as $ps) {
			$aProgramStudies[$ps->id] = $ps;
			$aProgramStudies[$ps->id]->fakultass = array();
			$flts = $this->Perguruan_Fakultas_Model->getAllByProgramStudiId($ps->id);
			$fakultass = $flts['data'];
			foreach ($fakultass as $flt) {
				$aProgramStudies[$ps->id]->fakultass[$flt->id] = $flt;
				$aProgramStudies[$ps->id]->fakultass[$flt->id]->jurusans = array();
				$jrss = $this->Perguruan_Jurusan_Model->getAllByFakultasId($flt->id);
				$jurusans = $jrss['data'];
				foreach ($jurusans as $jrs) {
					$aProgramStudies[$ps->id]->fakultass[$flt->id]->jurusans = $jrs;
				}
			}
		}
		$this->data['member_program_studies'] = $aProgramStudies[;
		
        $this->load->view('admin/template', $this->data);
    }
	
	private function _getEmptyDataObject()
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
		$perguruan = new StdClass();
        $perguruan->id					= 0;
        $perguruan->nama				= '';
		$perguruan->akronim				= '';
		$perguruan->kategori			= '';
		$perguruan->status				= '';
		$perguruan->akreditasi			= '';
		$perguruan->wilayah				= '';
		$perguruan->alamat				= '';
		$perguruan->telepon1			= '';
		$perguruan->telepon2			= '';
		$perguruan->fax					= '';
		$perguruan->rektor				= '';
		$perguruan->email				= '';
		$perguruan->website				= '';
		$perguruan->deskripsi			= '';
		$perguruan->state				= 1;
		$perguruan->created				= $current_date;
		$perguruan->created_by			= 0;
		$perguruan->created_by_alias	= '';
		$perguruan->modified			= '0000-00-00 00:00:00';
		$perguruan->modified_by			= 0;
		$perguruan->attribs				= '';
		$perguruan->version				= 0;
		$perguruan->hits				= 0;
		$perguruan->program_studies		= array();
        return $perguruan;
    }
	
	private function _getDataObject()
    {
		$perguruan = new StdClass();
        $perguruan->id                  = isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $perguruan->nama				= $this->input->_clean_input_data($_POST['jform']['nama']);
		$perguruan->akronim				= $this->input->_clean_input_data($_POST['jform']['akronim']);
		$perguruan->kategori			= $this->input->_clean_input_data($_POST['jform']['kategori']);
		$perguruan->status				= $this->input->_clean_input_data($_POST['jform']['status']);
		$perguruan->akreditasi			= $this->input->_clean_input_data($_POST['jform']['akreditasi']);
		$perguruan->wilayah				= $this->input->_clean_input_data($_POST['jform']['wilayah']);
		$perguruan->alamat				= $this->input->_clean_input_data($_POST['jform']['alamat']);
		$perguruan->telepon1			= $this->input->_clean_input_data($_POST['jform']['telepon1']);
		$perguruan->telepon2			= $this->input->_clean_input_data($_POST['jform']['telepon2']);
		$perguruan->fax					= $this->input->_clean_input_data($_POST['jform']['fax']);
		$perguruan->rektor				= $this->input->_clean_input_data($_POST['jform']['rektor']);
		$perguruan->email				= $this->input->_clean_input_data($_POST['jform']['email']);
		$perguruan->website				= $this->input->_clean_input_data($_POST['jform']['website']);
		$perguruan->deskripsi			= $this->input->_clean_input_data($_POST['jform']['deskripsi']);
		$perguruan->state				= $this->input->_clean_input_data($_POST['jform']['state']);
		$perguruan->created_by			= $this->input->_clean_input_data($_POST['jform']['created_by']);
		$perguruan->created_by_alias	= $this->input->_clean_input_data($_POST['jform']['created_by_alias']);
		//$perguruan->modified			= $this->input->_clean_input_data($_POST['jform']['modified']);
		$perguruan->modified_by         = isset($_POST['jform']['modified_by']) && ($_POST['jform']['modified_by'] > 0) ? $this->input->_clean_input_data($_POST['jform']['modified_by']) : 0;
		$perguruan->attribs         	= ''; //isset$this->input->_clean_input_data($_POST['jform']['attribs']);
		$perguruan->version				= isset($_POST['jform']['version']) && ($_POST['jform']['version'] > 0) ? $this->input->_clean_input_data($_POST['jform']['version']) : 0;
		$perguruan_program_studies		= $this->Perguruan_Program_Studi_Model->getAllByPerguruanId($perguruan->id);
		$perguruan->program_studies		= $perguruan_program_studies['data'];
		
		$aProgramStudies = array();
        foreach ($perguruan->program_studies as $ps) {
            if ($ps->perguruan_id != $perguruan->id) {
                $ps->perguruan_id = $perguruan->id;
            }
			$falkultases = $this->Perguruan_Fakultas_Model->getAllByProgramStudiId($ps->id);
			$ps->fakultases = $falkultases['data'];
			foreach ($ps->fakultases as $fakultas) {
				if ($fakultas->program_studi_id != $ps->id) {
					$fakultas->program_studi_id = $ps->id;
				}
				$jurusans = $this->Perguruan_Jurusan_Model->getAllByFakultasId($fakultas->id);
				$fakultas->jurusans = $jurusans['data'];
				foreach ($fakultas->jurusans as $jurusan) {
					if ($jurusan->fakultas_id != $fakultas->id) {
						$jurusan->fakultas_id = $fakultas->id;
					}
				}
			}
            $aProgramStudies[$ps->id] = $ps;
            $aProgramStudies[$ps->id]->status_edit = MODE_DELETE;
        }
		
		if (isset($_POST['jform']['program_studi_id'])) {
			for ($i = 0; $i < count($_POST['jform']['program_studi_id']); $i++) {
				$program_studi_id = $_POST['jform']['program_studi_id'][$i];
				if (!array_key_exists(intval($program_studi_id), $aProgramStudies)) {
					$programStudi = new StdClass();
                    $programStudi->id = $program_studi_id;
                    $programStudi->perguruan_id = $perguruan->id;
                    $programStudi->ordering = $i + 1;
                    $programStudi->program_studi = $this->input->_clean_input_data($_POST['jform']['program_studi'][$i]);
                    $programStudi->status_edit = MODE_ADD;
                    $aProgramStudies[$program_studi_id] = $programStudi;
				}
				else {
					$aProgramStudies[$program_studi_id]->ordering = $i + 1;
                    $aProgramStudies[$program_studi_id]->program_studi = $this->input->_clean_input_data($_POST['jform']['program_studi'][$i]);
                    $aProgramStudies[$program_studi_id]->status_edit = MODE_EDIT;
				}
				for ($j = 0; $j < count($_POST['jform']['fakultas_id'][$i]); $j++) {
					$fakultas_id = $_POST['jform']['fakultas_id'][$i][$j];
					if (!array_key_exists(intval($fakultas_id), $aProgramStudies[$program_studi_id]->fakultases)) {
						$fakultas = new StdClass();
						$fakultas->id = $fakultas_id;
						$fakultas->program_studi_id = $program_studi_id;
						$fakultas->fakultas = $this->input->_clean_input_data($_POST['fakultas'][$i][$j]);
						$fakultas->status_edit = MODE_ADD;
						$aProgramStudies[$program_studi_id]->fakultases[$fakultas_id] = $fakultas;
					}
					else {
						$aProgramStudies[$program_studi_id]->fakultases[$fakultas_id]->fakultas = $this->input->_clean_input_data($_POST['fakultas'][$i][$j]);
						$aProgramStudies[$program_studi_id]->fakultases[$fakultas_id]->status_edit = MODE_EDIT;
					}
					for ($k = 0; $k < count($_POST['jform']['jurusan_id'][$i][$j]); $k++) {
						$jurusan_id = $_POST['jurusan_id'][$i][$j][$k];
						if (!array_key_exists($jurusan_id, $aProgramStudies[$program_studi_id]->fakultases[$fakultas_id]->jurusans)) {
							$jurusan = new StdClass();
							$jurusan->id = $jurusan_id;
							$jurusan->fakultas_id = $fakultas_id;
							$jurusan->jurusan =  $this->input->_clean_input_data($_POST['jurusan'][$i][$j][$k]);
							$jurusan->kosentrasi =  $this->input->_clean_input_data($_POST['kosentrasi'][$i][$j][$k]);
							$jurusan->status_edit = STATUS_ADD;
							$aProgramStudies[$program_studi_id]->fakultases[$fakultas_id]->jurusans[$jurusan_id] = $jurusan;
						}
						else {
							$aProgramStudies[$program_studi_id]->fakultases[$fakultas_id]->jurusans[$jurusan_id]->jurusan = $this->input->_clean_input_data($_POST['jurusan'][$i][$j][$k]);
							$aProgramStudies[$program_studi_id]->fakultases[$fakultas_id]->jurusans[$jurusan_id]->kosentrasi = $this->input->_clean_input_data($_POST['kosentrasi'][$i][$j][$k]);
							$aProgramStudies[$program_studi_id]->fakultases[$fakultas_id]->jurusans[$jurusan_id]->status_edit = MODE_EDIT;
						}
					}
				}
			}
		}
		
		$perguruan->program_studies = $aProgramStudies;
		
        return $perguruan;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('perguruan.add');
        VToolBar_Helper::editList('perguruan.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'perguruan.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_perguruan_manager'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('perguruan.apply');
        VToolBar_Helper::save('perguruan.save');
        VToolBar_Helper::save2new('perguruan.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('perguruan.cancel');
		} else {
			VToolBar_Helper::cancel('perguruan.cancel', 'Close');
		}
		VToolBar_Helper::divider();
		VToolBar_Helper::help(site_url('admin/help/get_help?topic=help_perguruan_manager_edit'));
	}
	
	private function css_view()
	{
		$css = '';
		$css .= '<link href="'.base_url('css/admin/modal.css').'" media="all" rel="stylesheet" type="text/css" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url('css/admin/extras.css').'" type="text/css" />'."\n";
		return $css;
	}
	
	private function css_edit()
	{
		$css = '';
		$css .= '<link rel="stylesheet" href="'.base_url('css/admin/modal.css').'" type="text/css"  title="Green"  media="all" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url('css/admin/calendar-jos.css').'" type="text/css"  title="Green"  media="all" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url('css/admin/extras.css').'" type="text/css" />'."\n";
		return $css;
	}
	
	private function js_view()
	{
		$js = '';
		$js .= '<script src="'.base_Url('js/admin/multiselect.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/admin/modal.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/admin/MC.js').'" type="text/javascript"></script>'."\n";
		return $js;
	}
	
	private function js_edit()
	{
		$js = '';
		$js .= '<script src="'.base_Url('js/admin/validate.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/admin/modal.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/admin/calendar.js').'" type="text/javascript"></script>'."\n";
		$js .= '<script src="'.base_Url('js/admin/calendar-setup.js').'" type="text/javascript"></script>'."\n";
		/* $js .= '<script src="'.base_Url('js/MC.Switcher.js').'" type="text/javascript"></script>'."\n"; */
		$js .= '<script src="'.base_Url('js/admin/MC.js').'" type="text/javascript"></script>'."\n";
		return $js;
	}
    
}

/* End of file perguruan.php */
/* Location: ./application/controllers/perguruan.php */