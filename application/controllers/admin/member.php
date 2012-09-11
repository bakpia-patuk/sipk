<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member_Model');
		$this->load->model('Member_Telepon_Model');
        $this->load->model('Member_Relationship_Model');
        $this->load->model('Member_Olah_Raga_Model');
        $this->load->model('Member_Riwayat_Penyakit_Model');
        $this->load->model('Member_Food_Frequency_Model');
        $this->load->model('Member_Pendidikan_Model');
        $this->load->model('Member_Bahasa_Model');
        $this->load->model('Member_Organisasi_Model');
        $this->load->model('Member_Pengalaman_Kerja_Model');
	}
	
    public function index()
    {
		if ($this->input->post('task')) {
			switch ($this->input->post('task')) {
                case 'member.add':
					redirect('admin/member/add', 'refresh');
                case 'member.edit':
					 if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        $id = $cid[0];
                        redirect('admin/member/edit/'.$id, 'refresh');
                    }
                case 'member.delete':
                    if ($this->input->post('cid')) {
                        $cid = $this->input->post('cid');
                        foreach ($cid as $id) {
                            $this->Member_Model->delete($id);
                        }
                        $item = count($cid);
                        if ($item > 0) {
                            $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' member telah di hapus.'));
                        }
                    }
                    redirect('admin/member', 'refresh');
			}
		}
		$this->data['extraCSS'] = $this->css_view();
		$this->data['extraJS'] = $this->js_view();
		$this->data['admin_status'] = TRUE;
		$this->data['menu_active'] = 'Users';
        $this->data['tab_active'] = 'Member';
		$this->data['title'] = 'Daftar Member';
		$this->data['module_title'] = VToolBar_Helper::title('Member Manager: Member');
        $this->addToolbar();
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/member/view';

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
		
		$record = $this->Member_Model->getAll($limit, $this->data['limitstart']);
		$this->load->library('pagination');
        $config['base_url'] = site_url('admin/member/index');
        $config['total_rows'] = $record['numrows'];
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
		
		$this->data['data'] = $record['data'];
		
        $this->load->view('admin/template', $this->data);
    }
	
	public function add()
    {
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('jform[no_anggota]', 'No. Anggota', 'required');
        $this->form_validation->set_rules('jform[nama]', 'Nama', 'required');
        $this->form_validation->set_rules('jform[alamat]', 'Alamat', '');
        $this->form_validation->set_rules('jform[tempat_lahir]', 'Tempat Lahir', '');
        
        if ($this->input->post('task')) {
            if ($this->form_validation->run() == TRUE) {
                switch ($this->input->post('task')) {
                    case 'member.apply':
                        $member = $this->_getDataObject();
                        if (isset($_REQUEST['id'])) {
                            $id = $_REQUEST['id'];
                            $this->Member_Model->update($member);
                        }
                        else {
                            $id = $this->Member_Model->create($member);
                        }
                        $data['data'] = $member;
                        $this->session->set_flashdata('message', 'Member created');
                        redirect('admin/member/add?id='.$id, 'refresh');
                    case 'member.save':
                        $member = $this->_getDataObject();
                        if (isset($member->id) && $member->id > 0) {
                            $id = $member->id;
                            $this->Member_Model->update($member);
                        }
                        else {
                            $id = $this->Member_Model->create($member);
                        }
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Member telah di simpan.'));
                        redirect('admin/member/index', 'refresh');
                    case 'member.save2new':
                        $member = $this->_getDataObject();
                        if (isset($member->id) && $member->id > 0) {
                            $id = $member->id;
                            $this->Member_Model->update($member);
                        }
                        else {
                            $id = $this->Member_Model->create($member);
                        }
                        $data['data'] = $this->_getEmptyDataObject();
                        $this->session->set_flashdata('message', array('type' => 'message' , 'message' => 'Member telah di simpan.'));
                        redirect('admin/member/add', 'refresh');
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
            $this->data['menu_active'] = 'Users';
            $this->data['title'] = "Daftar Member";
            $this->data['module_title'] = VToolBar_Helper::title('Member Manager: Tambah Member');
			$this->addToolbarForm();
            $this->data['help'] = VToolbar::getInstance('help');
            $this->data['toolbar'] = VToolbar::getInstance('toolbar');
            $this->data['menu'] = 'admin/menu';
            $this->data['content'] = 'admin/member/edit';
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $member = $this->Member_Model->getById($id);
                $this->data['is_new'] = FALSE;
            }
            else {
                $member = $this->_getEmptyDataObject();
                $this->data['is_new'] = TRUE;
            }
            
            $this->data['data'] = $member;
            
			$this->data['member_jenis_telepon'] = $this->Member_Telepon_Model->getJenisTelepon(FALSE, TRUE);
			$telepons = $this->Member_Telepon_Model->getAllByMemberId($member->id);
            $this->data['member_telepons'] = $telepons['data'];
            
            $this->data['member_agama'] = $this->Member_Model->getAgama(FALSE, TRUE);
			$this->data['member_golongan_darah'] = $this->Member_Model->getGolonganDarah(FALSE, TRUE);
            $this->data['member_jenis_kelamin'] = $this->Member_Model->getJenisKelamin(FALSE, FALSE);
            $this->data['member_status_menikah'] = $this->Member_Model->getStatusMenikah(FALSE, TRUE);
            
            $pasangans = $this->Member_Relationship_Model->getAllPasangan($member->id);
            $this->data['member_pasangans'] = $pasangans['data'];
            
            $this->data['member_status_orang_tua'] = $this->Member_Model->getStatusOrangTua(FALSE, TRUE);
            $orangTuas = $this->Member_Relationship_Model->getAllOrangTua($member->id);
            $this->data['member_orangtuas'] = $orangTuas['data'];
            
            $this->data['member_status_saudara'] = $this->Member_Model->getStatusSaudara(FALSE, TRUE);
            $saudaras = $this->Member_Relationship_Model->getAllSaudara($member->id);
            $this->data['member_saudaras'] = $saudaras['data'];
            
            $this->data['member_status_anak'] = $this->Member_Model->getStatusAnak(FALSE, TRUE);
            $anaks = $this->Member_Relationship_Model->getAllAnak($member->id);
            $this->data['member_anaks'] = $anaks['data'];
            
            $this->data['member_kelahiran'] = $this->Member_Model->getKelahiran();
            $this->data['member_persalinan'] = $this->Member_Model->getPersalinan();
            $this->data['member_ya_tidak'] = $this->Member_Model->getYaTidak();
            
            $olahragas = $this->Member_Olah_Raga_Model->getAllByMemberId($member->id);
            $this->data['member_olahragas'] = $olahragas['data'];
            
            $this->data['member_tahun'] = $this->Member_Model->getTahun();
            
            $this->data['member_jenis_perawatan'] = $this->Member_Model->getJenisPerawatan(FALSE, TRUE);
            $riwayatPenyakits = $this->Member_Riwayat_Penyakit_Model->getAllByMemberId($member->id);
            $this->data['member_riwayatpenyakits'] = $riwayatPenyakits['data'];
            
            $this->data['member_frekwensi_konsumsi'] = $this->Member_Model->getFrekwensiKonsumsi(FALSE, TRUE);
            
            $makananPokoks = $this->Member_Food_Frequency_Model->getAllByKetegori($member->id, 'Makanan Pokok');
            $this->data['member_makananpokoks'] = $makananPokoks['data'];
            
            $laukhewanis = $this->Member_Food_Frequency_Model->getAllByKetegori($member->id, 'Lauk Hewani');
            $this->data['member_laukhewanis'] = $laukhewanis['data'];
            
            $lauknabatis = $this->Member_Food_Frequency_Model->getAllByKetegori($member->id, 'Lauk Nabati');
            $this->data['member_lauknabatis'] = $lauknabatis['data'];
            
            $sayurans = $this->Member_Food_Frequency_Model->getAllByKetegori($member->id, 'Sayuran');
            $this->data['member_sayurans'] = $sayurans['data'];
            
            $buahs = $this->Member_Food_Frequency_Model->getAllByKetegori($member->id, 'Buah-buahan');
            $this->data['member_buahs'] = $buahs['data'];
            
            $fflainlains = $this->Member_Food_Frequency_Model->getAllByKetegori($member->id, 'Lain-lain');
            $this->data['member_fflainlains'] = $fflainlains['data'];
            
            $this->data['member_jenjang_pendidikan_program_studi'] = $this->Member_Model->getJenjangPendidikanProgramStudi(FALSE, TRUE);
			
			$formals = $this->Member_Pendidikan_Model->getAllByJenis($member->id, 'Pendidikan Formal');
            $this->data['member_pendidikan_formal'] = $formals['data'];
			
			$nonFormals = $this->Member_Pendidikan_Model->getAllByJenis($member->id, 'Pendidikan Non Formal');
            $this->data['member_pendidikan_non_formal'] = $nonFormals['data'];
			
			$pelatihans = $this->Member_Pendidikan_Model->getAllByJenis($member->id, 'Pelatihan');
            $this->data['member_pendidikan_pelatihan'] = $pelatihans['data'];
			
            $this->data['member_tingkat_penguasaan_bahasa'] = $this->Member_Model->getTingkatPenguasaanBahasa(FALSE, TRUE);
			$bahasas = $this->Member_Bahasa_Model->getAllByMemberId($member->id);
            $this->data['member_bahasas'] = $bahasas['data'];
			
            $this->data['member_jenis_organisasi'] = $this->Member_Model->getJenisOrganisasi(FALSE, TRUE);
			$organisasis = $this->Member_Organisasi_Model->getAllByMemberId($member->id);
            $this->data['member_organisasis'] = $organisasis['data'];
			
			$pengalamanKerjas = $this->Member_Pengalaman_Kerja_Model->getAllByMemberId($member->id);
            $this->data['member_pengalaman_kerjas'] = $pengalamanKerjas['data'];

            $this->data['member_state'] = $this->Member_Model->getState();
            
            $this->load->view('admin/template', $this->data);
        }
    }
	
	public function edit($id = 0) {
        $this->data['extraCSS'] = $this->css_edit();
        $this->data['extraJS'] = $this->js_edit();
        $this->data['admin_status'] = FALSE;
        $this->data['menu_active'] = 'Users';
        $this->data['title'] = "Daftar User";
        $this->data['module_title'] = VToolBar_Helper::title('User Manager: Edit User');
        if ($this->uri->segment(5) === FALSE) {
			$this->addToolbarForm();
		}
		else {
			$this->addToolbarForm($id);
		}
        $this->data['help'] = VToolbar::getInstance('help');
        $this->data['toolbar'] = VToolbar::getInstance('toolbar');
        $this->data['menu'] = 'admin/menu';
        $this->data['content'] = 'admin/member/edit';
        $this->data['is_new'] = FALSE;
        
        $this->data['data'] = $this->Member_Model->getById($id);
        
        $this->data['member_jenis_telepon'] = $this->Member_Telepon_Model->getJenisTelepon(FALSE, TRUE);
        $telepons = $this->Member_Telepon_Model->getAllByMemberId($this->data['data']->id);
        $this->data['member_telepons'] = $telepons['data'];
        
        $this->data['member_agama'] = $this->Member_Model->getAgama(FALSE, TRUE);
        $this->data['member_golongan_darah'] = $this->Member_Model->getGolonganDarah(FALSE, TRUE);
        $this->data['member_jenis_kelamin'] = $this->Member_Model->getJenisKelamin(FALSE, FALSE);
        $this->data['member_status_menikah'] = $this->Member_Model->getStatusMenikah(FALSE, TRUE);
        
        $pasangans = $this->Member_Relationship_Model->getAllPasangan($this->data['data']->id);
        $this->data['member_pasangans'] = $pasangans['data'];
        
        $this->data['member_status_orang_tua'] = $this->Member_Model->getStatusOrangTua(FALSE, TRUE);
        $orangTuas = $this->Member_Relationship_Model->getAllOrangTua($this->data['data']->id);
        $this->data['member_orangtuas'] = $orangTuas['data'];
        
        $this->data['member_status_saudara'] = $this->Member_Model->getStatusSaudara(FALSE, TRUE);
        $saudaras = $this->Member_Relationship_Model->getAllSaudara($this->data['data']->id);
        $this->data['member_saudaras'] = $saudaras['data'];
        
        $this->data['member_status_anak'] = $this->Member_Model->getStatusAnak(FALSE, TRUE);
        $anaks = $this->Member_Relationship_Model->getAllAnak($this->data['data']->id);
        $this->data['member_anaks'] = $anaks['data'];
        
        $this->data['member_kelahiran'] = $this->Member_Model->getKelahiran();
        $this->data['member_persalinan'] = $this->Member_Model->getPersalinan();
        $this->data['member_ya_tidak'] = $this->Member_Model->getYaTidak();
        
        $olahragas = $this->Member_Olah_Raga_Model->getAllByMemberId($this->data['data']->id);
        $this->data['member_olahragas'] = $olahragas['data'];
        
        $this->data['member_tahun'] = $this->Member_Model->getTahun();
        
        $this->data['member_jenis_perawatan'] = $this->Member_Model->getJenisPerawatan(FALSE, TRUE);
        $riwayatPenyakits = $this->Member_Riwayat_Penyakit_Model->getAllByMemberId($this->data['data']->id);
        $this->data['member_riwayatpenyakits'] = $riwayatPenyakits['data'];
        
        $this->data['member_frekwensi_konsumsi'] = $this->Member_Model->getFrekwensiKonsumsi(FALSE, TRUE);
        
        $makananPokoks = $this->Member_Food_Frequency_Model->getAllByKetegori($this->data['data']->id, 'Makanan Pokok');
        $this->data['member_makananpokoks'] = $makananPokoks['data'];
        
        $laukhewanis = $this->Member_Food_Frequency_Model->getAllByKetegori($this->data['data']->id, 'Lauk Hewani');
        $this->data['member_laukhewanis'] = $laukhewanis['data'];

        $lauknabatis = $this->Member_Food_Frequency_Model->getAllByKetegori($this->data['data']->id, 'Lauk Nabati');
        $this->data['member_lauknabatis'] = $lauknabatis['data'];

        $sayurans = $this->Member_Food_Frequency_Model->getAllByKetegori($this->data['data']->id, 'Sayuran');
        $this->data['member_sayurans'] = $sayurans['data'];

        $buahs = $this->Member_Food_Frequency_Model->getAllByKetegori($this->data['data']->id, 'Buah-buahan');
        $this->data['member_buahs'] = $buahs['data'];

        $fflainlains = $this->Member_Food_Frequency_Model->getAllByKetegori($this->data['data']->id, 'Lain-lain');
        $this->data['member_fflainlains'] = $fflainlains['data'];
        
        $this->data['member_jenjang_pendidikan_program_studi'] = $this->Member_Model->getJenjangPendidikanProgramStudi(FALSE, TRUE);
		
		$formals = $this->Member_Pendidikan_Model->getAllByJenis($this->data['data']->id, 'Pendidikan Formal');
        $this->data['member_pendidikan_formal'] = $formals['data'];

        $nonFormals = $this->Member_Pendidikan_Model->getAllByJenis($this->data['data']->id, 'Pendidikan Non Formal');
        $this->data['member_pendidikan_non_formal'] = $nonFormals['data'];

        $pelatihans = $this->Member_Pendidikan_Model->getAllByJenis($this->data['data']->id, 'Pelatihan');
        $this->data['member_pendidikan_pelatihan'] = $pelatihans['data'];
		
        $this->data['member_tingkat_penguasaan_bahasa'] = $this->Member_Model->getTingkatPenguasaanBahasa(FALSE, TRUE);
		$bahasas = $this->Member_Bahasa_Model->getAllByMemberId($this->data['data']->id);
		$this->data['member_bahasas'] = $bahasas['data'];
		
		$this->data['member_jenis_organisasi'] = $this->Member_Model->getJenisOrganisasi(FALSE, TRUE);
		$organisasis = $this->Member_Organisasi_Model->getAllByMemberId($this->data['data']->id);
		$this->data['member_organisasis'] = $organisasis['data'];
		
		$pengalamanKerjas = $this->Member_Pengalaman_Kerja_Model->getAllByMemberId($this->data['data']->id);
		$this->data['member_pengalaman_kerjas'] = $pengalamanKerjas['data'];

        $this->data['state'] = $this->Member_Model->getState();
        
        $this->load->view('admin/template', $this->data);
    }
    
    public function delete() {
        if ($this->input->post('cid')) {
            $cid = $this->input->post('cid');
            foreach ($cid as $id) {
                $this->Member_Model->delete($id);
            }
            $item = count($cid);
            if ($item > 0) {
                $this->session->set_flashdata('message', array('type' => 'message' , 'message' => $item.' golongan perkiraan telah di hapus.'));
            }
        }
        $limit = $this->input->post('limit');
        $limitstart = $this->input->post('limitstart');
        redirect('member/index/'.$limitstart.'/'.$limit, 'refresh');
    }
	
	private function _getEmptyDataObject()
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $member = new StdClass();
        $member->id                     = 0;
        $member->no_anggota             = '';
        $member->nama                   = '';
        $member->alamat                 = '';
        $member->tempat_lahir           = '';
        $member->tanggal_lahir          = 0;
        $member->agama                  = '';
        $member->suku                   = '';
        $member->kewarganegaraan        = 'Indonesia';
        $member->tinggi_badan           = 0.0;
        $member->berat_badan            = 0.0;
        $member->golongan_darah         = '';
        $member->jenis_kelamin          = '';
        $member->status_menikah         = 'Belum Menikah';
        $member->nama_suami             = '';
        $member->kelahiran              = '';
        $member->berat_badan_lahir      = 0.0;
        $member->panjang_badan_lahir    = 0.0;
        $member->persalinan             = '';
        $member->imunisasi              = true;
        $member->imunisasi_lengkap      = true;
        $member->cacat                  = false;
        $member->kacamata               = false;
        $member->merokok                = false;
        $member->olah_raga              = false;
        $member->tidur_siang            = false;
        $member->lama_tidur             = 0.0;
        $member->lama_duduk             = 0.0;
        $member->lama_berkendaraan      = 0.0;
        $member->sarapan                = true;
        $member->makan_siang            = true;
        $member->makan_malam            = true;
        $member->alergi                 = '';
		$member->keahlian				= '';
		$member->hobby_olah_raga        = '';
		$member->hobby_kesenian         = '';
		$member->hobby_lain_lain        = '';
		$member->prestasi_olah_raga     = '';
		$member->prestasi_kesenian      = '';
		$member->prestasi_lain_lain     = '';
		$member->email                  = '';
		$member->website                = '';
        $member->keterangan             = '';
        
        $member->state                  = 1;
		$member->created                = $current_date;
		$member->created_by             = 0;
		$member->created_by_alias       = '';
		$member->modified               = NULL;
		$member->modified_by            = 0;
		$member->attribs                = '';
		$member->version                = 0;
		$member->hits                   = 0;
        
		$member->telepons               = array();
        $member->pasangans              = array();
        $member->orangtuas              = array();
        $member->saudaras               = array();
        $member->anaks                  = array();
        $member->olahragas              = array();
		$member->riwayatpenyakits		= array();
        $member->makananpokoks          = array();
        $member->laukhewanis            = array();
        $member->lauknabatis            = array();
        $member->sayurans               = array();
        $member->buahs                  = array();
        $member->fflainlain             = array();
		$member->pendidikan_formals		= array();
		$member->pendidikan_non_formals	= array();
		$member->pelatihans				= array();
		$member->bahasas				= array();
		$member->organisasis			= array();
		$member->pengalaman_kerjas		= array();
        
        return $member;
    }
	
	private function _getDataObject()
    {
        $member = new StdClass();
		$member->id                     = isset($_POST['jform']['id']) && ($_POST['jform']['id'] > 0) ? $this->input->_clean_input_data($_POST['jform']['id']) : 0;
        $member->no_anggota             = $this->input->_clean_input_data($_POST['jform']['no_anggota']);
        $member->nama                   = $this->input->_clean_input_data($_POST['jform']['nama']);
        $member->alamat                 = $this->input->_clean_input_data($_POST['jform']['alamat']);
        $member->tempat_lahir           = $this->input->_clean_input_data($_POST['jform']['tempat_lahir']);
        $member->tanggal_lahir          = $this->input->_clean_input_data($_POST['jform']['tanggal_lahir']);
        $member->agama                  = $this->input->_clean_input_data($_POST['jform']['agama']);
        $member->suku                   = $this->input->_clean_input_data($_POST['jform']['suku']);
        $member->kewarganegaraan        = $this->input->_clean_input_data($_POST['jform']['kewarganegaraan']);
        $member->tinggi_badan           = $this->input->_clean_input_data($_POST['jform']['tinggi_badan']);
        $member->berat_badan            = $this->input->_clean_input_data($_POST['jform']['berat_badan']);
        $member->golongan_darah         = $this->input->_clean_input_data($_POST['jform']['golongan_darah']);
        $member->jenis_kelamin          = $this->input->_clean_input_data($_POST['jform']['jenis_kelamin']);
        $status_menikah = $this->input->_clean_input_data($_POST['jform']['status_menikah']);
        $status_menikah = ($status_menikah == 'none' ? '' : $status_menikah);
        $member->status_menikah         = $status_menikah;
        $member->nama_suami             = $this->input->_clean_input_data($_POST['jform']['nama_suami']);
        $member->kelahiran              = $this->input->_clean_input_data($_POST['jform']['kelahiran']);
        $member->berat_badan_lahir      = $this->input->_clean_input_data($_POST['jform']['berat_badan_lahir']);
        $member->panjang_badan_lahir    = $this->input->_clean_input_data($_POST['jform']['panjang_badan_lahir']);
        $member->persalinan             = $this->input->_clean_input_data($_POST['jform']['persalinan']);
        $member->imunisasi              = $this->input->_clean_input_data($_POST['jform']['imunisasi']);
        $member->imunisasi_lengkap      = $this->input->_clean_input_data($_POST['jform']['imunisasi_lengkap']);
        $member->cacat                  = $this->input->_clean_input_data($_POST['jform']['cacat']);
        $member->kacamata               = $this->input->_clean_input_data($_POST['jform']['kacamata']);
        $member->merokok                = $this->input->_clean_input_data($_POST['jform']['merokok']);
        $member->olah_raga              = $this->input->_clean_input_data($_POST['jform']['olah_raga']);
        $member->tidur_siang            = $this->input->_clean_input_data($_POST['jform']['tidur_siang']);
        $member->lama_tidur             = $this->input->_clean_input_data($_POST['jform']['lama_tidur']);
        $member->lama_duduk             = $this->input->_clean_input_data($_POST['jform']['lama_duduk']);
        $member->lama_berkendaraan      = $this->input->_clean_input_data($_POST['jform']['lama_duduk']);
        $member->sarapan                = $this->input->_clean_input_data($_POST['jform']['sarapan']);
        $member->makan_siang            = $this->input->_clean_input_data($_POST['jform']['makan_siang']);
        $member->makan_malam            = $this->input->_clean_input_data($_POST['jform']['makan_malam']);
        $member->alergi                 = $this->input->_clean_input_data($_POST['jform']['alergi']);
		$member->keahlian				= $this->input->_clean_input_data($_POST['jform']['keahlian']);
		$member->hobby_olah_raga        = $this->input->_clean_input_data($_POST['jform']['hobby_olah_raga']);
		$member->hobby_kesenian         = $this->input->_clean_input_data($_POST['jform']['hobby_kesenian']);
		$member->hobby_lain_lain        = $this->input->_clean_input_data($_POST['jform']['hobby_lain_lain']);
		$member->prestasi_olah_raga     = $this->input->_clean_input_data($_POST['jform']['prestasi_olah_raga']);
		$member->prestasi_kesenian      = $this->input->_clean_input_data($_POST['jform']['prestasi_kesenian']);
		$member->prestasi_lain_lain     = $this->input->_clean_input_data($_POST['jform']['prestasi_lain_lain']);
		$member->email                  = $this->input->_clean_input_data($_POST['jform']['email']);
		$member->website                = $this->input->_clean_input_data($_POST['jform']['website']);
        $member->keterangan             = $this->input->_clean_input_data($_POST['jform']['keterangan']);
        /*
        $member->state				= $this->input->_clean_input_data($_POST['jform']['state']);
		$member->created_by         = $this->input->_clean_input_data($_POST['jform']['created_by']);
		$member->created_by_alias	= $this->input->_clean_input_data($_POST['jform']['created_by_alias']);
		$member->modified			= $this->input->_clean_input_data($_POST['jform']['modified']);
		$member->modified_by		= $this->input->_clean_input_data($_POST['jform']['modified_by']);
		$member->attribs			= $this->input->_clean_input_data($_POST['jform']['attribs']);
		$member->version			= $this->input->_clean_input_data($_POST['jform']['version']);
        */
        
		$telepons					= $this->Member_Telepon_Model->getAllByMemberId($member->id);
		$member->telepons			= $telepons['data'];
		$aTelepons = array();
        foreach ($member->telepons as $tlp) {
            if ($tlp->member_id != $member->id) {
                $tlp->member_id = $member->id;
            }
            $aTelepons[$tlp->id] = $tlp;
            $aTelepons[$tlp->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['telepon_id'])) {
			for ($i = 0; $i < count($_POST['jform']['telepon_id']); $i++) {
				$telepon_id = $_POST['jform']['telepon_id'][$i];
				if (!array_key_exists(intval($telepon_id), $aTelepons)) {
					$telepon = new StdClass();
                    $telepon->id = $telepon_id;
                    $telepon->member_id = $member->id;
                    $telepon->ordering = $i + 1;
                    $telepon->jenis = $this->input->_clean_input_data($_POST['jform']['jenis_telepon'][$i]);
					$telepon->telepon = $this->input->_clean_input_data($_POST['jform']['telepon'][$i]);
                    $telepon->status_edit = MODE_ADD;
                    $aTelepons[$telepon_id] = $telepon;
				}
				else {
					$aTelepons[$telepon_id]->ordering = $i + 1;
                    $aTelepons[$telepon_id]->jenis = $this->input->_clean_input_data($_POST['jform']['jenis_telepon'][$i]);
					$aTelepons[$telepon_id]->telepon = $this->input->_clean_input_data($_POST['jform']['telepon'][$i]);
                    $aTelepons[$telepon_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->telepons = $aTelepons;
        
        $pasangans					= $this->Member_Relationship_Model->getAllPasangan($member->id);
		$member->pasangans			= $pasangans['data'];
        $aPasangans = array();
        foreach ($member->pasangans as $psg) {
            if ($psg->member_id != $member->id) {
                $psg->member_id = $member->id;
            }
            $aPasangans[$psg->id] = $psg;
            $aPasangans[$psg->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['pasangan_id'])) {
			for ($i = 0; $i < count($_POST['jform']['pasangan_id']); $i++) {
				$pasangan_id = $_POST['jform']['pasangan_id'][$i];
				if (!array_key_exists(intval($pasangan_id), $aPasangans)) {
					$pasangan = new StdClass();
                    $pasangan->id = $pasangan_id;
                    $pasangan->member_id = $member->id;
                    $pasangan->ordering = $i + 1;
                    $pasangan->jenis = 'Pasangan';
                    $pasangan->option_nama = isset($_POST['jform']['option_pasangan'][$i]) ? TRUE : FALSE;
					$pasangan->nama = $this->input->_clean_input_data($_POST['jform']['nama_pasangan'][$i]);
                    $pasangan->relation_id = $this->input->_clean_input_data($_POST['jform']['relation_pasangan_id'][$i]);
                    $pasangan->status = 'Istri';
                    $pasangan->status_edit = MODE_ADD;
                    $aPasangans[$pasangan_id] = $pasangan;
				}
				else {
					$aPasangans[$pasangan_id]->ordering = $i + 1;
                    $aPasangans[$pasangan_id]->option_nama = $this->input->_clean_input_data($_POST['jform']['option_pasangan'][$i]);
					$aPasangans[$pasangan_id]->nama = $this->input->_clean_input_data($_POST['jform']['nama_pasangan'][$i]);
                    $aPasangans[$pasangan_id]->relation_id = $this->input->_clean_input_data($_POST['jform']['relation_pasangan_id'][$i]);
                    $aPasangans[$pasangan_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->pasangans = $aPasangans;
        
        $orangtuas					= $this->Member_Relationship_Model->getAllOrangTua($member->id);
		$member->orangtuas			= $orangtuas['data'];
        $aOrangTuas = array();
        foreach ($member->orangtuas as $ot) {
            if ($ot->member_id != $member->id) {
                $ot->member_id = $member->id;
            }
            $aOrangTuas[$ot->id] = $ot;
            $aOrangTuas[$ot->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['orang_tua_id'])) {
			for ($i = 0; $i < count($_POST['jform']['orang_tua_id']); $i++) {
				$orang_tua_id = $_POST['jform']['orang_tua_id'][$i];
				if (!array_key_exists(intval($orang_tua_id), $aOrangTuas)) {
					$orangtua = new StdClass();
                    $orangtua->id = $orang_tua_id;
                    $orangtua->member_id = $member->id;
                    $orangtua->ordering = $i + 1;
                    $orangtua->jenis = 'Orang Tua';
                    $orangtua->option_nama = isset($_POST['jform']['option_orang_tua'][$i]) ? TRUE : FALSE;
					$orangtua->nama = $this->input->_clean_input_data($_POST['jform']['nama_orang_tua'][$i]);
                    $orangtua->relation_id = $this->input->_clean_input_data($_POST['jform']['relation_orang_tua_id'][$i]);
                    $orangtua->status = $this->input->_clean_input_data($_POST['jform']['status_orang_tua'][$i]);
                    $orangtua->status_edit = MODE_ADD;
                    $aOrangTuas[$orang_tua_id] = $orangtua;
				}
				else {
					$aOrangTuas[$orang_tua_id]->ordering = $i + 1;
                    $aOrangTuas[$orang_tua_id]->option_nama = $this->input->_clean_input_data($_POST['jform']['option_orang_tua'][$i]);
					$aOrangTuas[$orang_tua_id]->nama = $this->input->_clean_input_data($_POST['jform']['nama_orang_tua'][$i]);
                    $aOrangTuas[$orang_tua_id]->relation_id = $this->input->_clean_input_data($_POST['jform']['relation_orang_tua_id'][$i]);
                    $aOrangTuas[$orang_tua_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->orangtuas = $aOrangTuas;
        
        $saudaras					= $this->Member_Relationship_Model->getAllSaudara($member->id);
		$member->saudaras			= $saudaras['data'];
        $aSaudaras = array();
        foreach ($member->saudaras as $sdr) {
            if ($sdr->member_id != $member->id) {
                $sdr->member_id = $member->id;
            }
            $aSaudaras[$sdr->id] = $sdr;
            $aSaudaras[$sdr->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['saudara_id'])) {
			for ($i = 0; $i < count($_POST['jform']['saudara_id']); $i++) {
				$saudara_id = $_POST['jform']['saudara_id'][$i];
				if (!array_key_exists(intval($saudara_id), $aSaudaras)) {
					$saudara = new StdClass();
                    $saudara->id = $saudara_id;
                    $saudara->member_id = $member->id;
                    $saudara->ordering = $i + 1;
                    $saudara->jenis = 'Saudara';
                    $saudara->option_nama = isset($_POST['jform']['option_saudara'][$i]) ? TRUE : FALSE;
					$saudara->nama = $this->input->_clean_input_data($_POST['jform']['nama_saudara'][$i]);
                    $saudara->relation_id = $this->input->_clean_input_data($_POST['jform']['relation_saudara_id'][$i]);
                    $saudara->status = $this->input->_clean_input_data($_POST['jform']['status_saudara'][$i]);
                    $saudara->status_edit = MODE_ADD;
                    $aSaudaras[$saudara_id] = $saudara;
				}
				else {
					$aSaudaras[$saudara_id]->ordering = $i + 1;
                    $aSaudaras[$saudara_id]->option_nama = $this->input->_clean_input_data($_POST['jform']['option_saudara'][$i]);
					$aSaudaras[$saudara_id]->nama = $this->input->_clean_input_data($_POST['jform']['nama_saudara'][$i]);
                    $aSaudaras[$saudara_id]->relation_id = $this->input->_clean_input_data($_POST['jform']['relation_saudara_id'][$i]);
                    $aSaudaras[$saudara_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->saudaras = $aSaudaras;
        
        $anaks					= $this->Member_Relationship_Model->getAllAnak($member->id);
		$member->anaks			= $anaks['data'];
        $aAnaks = array();
        foreach ($member->anaks as $ank) {
            if ($ank->member_id != $member->id) {
                $ank->member_id = $member->id;
            }
            $aAnaks[$ank->id] = $ank;
            $aAnaks[$ank->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['anak_id'])) {
			for ($i = 0; $i < count($_POST['jform']['anak_id']); $i++) {
				$anak_id = $_POST['jform']['anak_id'][$i];
				if (!array_key_exists(intval($anak_id), $aAnaks)) {
					$anak = new StdClass();
                    $anak->id = $anak_id;
                    $anak->member_id = $member->id;
                    $anak->ordering = $i + 1;
                    $anak->jenis = 'Anak';
                    $anak->option_nama = isset($_POST['jform']['option_anak'][$i]) ? TRUE : FALSE;
					$anak->nama = $this->input->_clean_input_data($_POST['jform']['nama_anak'][$i]);
                    $anak->relation_id = $this->input->_clean_input_data($_POST['jform']['relation_anak_id'][$i]);
                    $anak->status = $this->input->_clean_input_data($_POST['jform']['status_anak'][$i]);
                    $anak->status_edit = MODE_ADD;
                    $aAnaks[$anak_id] = $anak;
				}
				else {
					$aAnaks[$anak_id]->ordering = $i + 1;
                    $aAnaks[$anak_id]->option_nama = $this->input->_clean_input_data($_POST['jform']['option_anak'][$i]);
					$aAnaks[$anak_id]->nama = $this->input->_clean_input_data($_POST['jform']['nama_anak'][$i]);
                    $aAnaks[$anak_id]->relation_id = $this->input->_clean_input_data($_POST['jform']['relation_anak_id'][$i]);
                    $aAnaks[$anak_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->anaks = $aAnaks;
        
        $olahRagas					= $this->Member_Olah_Raga_Model->getAllByMemberId($member->id);
		$member->olahragas			= $olahRagas['data'];
        $aOlahRagas = array();
        foreach ($member->olahragas as $or) {
            if ($or->member_id != $member->id) {
                $or->member_id = $member->id;
            }
            $aOlahRagas[$or->id] = $or;
            $aOlahRagas[$or->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['jor_id'])) {
			for ($i = 0; $i < count($_POST['jform']['jor_id']); $i++) {
				$jor_id = $_POST['jform']['jor_id'][$i];
				if (!array_key_exists(intval($jor_id), $aOlahRagas)) {
					$or = new StdClass();
                    $or->id = $jor_id;
                    $or->member_id = $member->id;
                    $or->ordering = $i + 1;
                    $or->nama_olah_raga = $this->input->_clean_input_data($_POST['jform']['jor_nama'][$i]);
                    $or->frekwensi = $this->input->_clean_input_data($_POST['jform']['jor_frekwensi'][$i]);
                    $or->status_edit = MODE_ADD;
                    $aOlahRagas[$jor_id] = $or;
				}
				else {
                    $aOlahRagas[$jor_id]->ordering = $i + 1;
					$aOlahRagas[$jor_id]->nama_olah_raga = $this->input->_clean_input_data($_POST['jform']['nama_olah_raga'][$i]);
                    $aOlahRagas[$jor_id]->frekwensi = $this->input->_clean_input_data($_POST['jform']['frekwensi'][$i]);
                    $aOlahRagas[$jor_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->olahragas = $aOlahRagas;
        
        $riwayatPenyakits			= $this->Member_Riwayat_Penyakit_Model->getAllByMemberId($member->id);
		$member->riwayatpenyakits	= $riwayatPenyakits['data'];
        $aRiwayatPenyakits = array();
        foreach ($member->riwayatpenyakits as $rp) {
            if ($rp->member_id != $member->id) {
                $rp->member_id = $member->id;
            }
            $aRiwayatPenyakits[$rp->id] = $rp;
            $aRiwayatPenyakits[$rp->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['rp_id'])) {
			for ($i = 0; $i < count($_POST['jform']['rp_id']); $i++) {
				$rp_id = $_POST['jform']['rp_id'][$i];
				if (!array_key_exists(intval($rp_id), $aRiwayatPenyakits)) {
					$rp = new StdClass();
                    $rp->id = $rp_id;
                    $rp->member_id = $member->id;
                    $rp->ordering = $i + 1;
                    $rp->penyakit = $this->input->_clean_input_data($_POST['jform']['rp_penyakit'][$i]);
                    $rp->tahun = $this->input->_clean_input_data($_POST['jform']['rp_tahun'][$i]);
                    $rp->perawatan = $this->input->_clean_input_data($_POST['jform']['rp_perawatan'][$i]);
                    $rp->keterangan = $this->input->_clean_input_data($_POST['jform']['rp_keterangan'][$i]);
                    $rp->status_edit = MODE_ADD;
                    $aRiwayatPenyakits[$rp_id] = $rp;
				}
				else {
                    $aRiwayatPenyakits[$rp_id]->ordering = $i + 1;
					$aRiwayatPenyakits[$rp_id]->penyakit = $this->input->_clean_input_data($_POST['jform']['rp_penyakit'][$i]);
                    $aRiwayatPenyakits[$rp_id]->tahun = $this->input->_clean_input_data($_POST['jform']['rp_tahun'][$i]);
                    $aRiwayatPenyakits[$rp_id]->perawatan = $this->input->_clean_input_data($_POST['jform']['rp_perawatan'][$i]);
                    $aRiwayatPenyakits[$rp_id]->keterangan = $this->input->_clean_input_data($_POST['jform']['rp_keterangan'][$i]);
                    $aRiwayatPenyakits[$rp_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->riwayatpenyakits = $aRiwayatPenyakits;
        
        $makananPokoks          = $this->Member_Food_Frequency_Model->getAllByKetegori($member->id, 'Makanan Pokok');
		$member->makananpokoks	= $makananPokoks['data'];
        $aMakananPokoks = array();
        foreach ($member->makananpokoks as $makananpokok) {
            if ($makananpokok->member_id != $member->id) {
                $makananpokok->member_id = $member->id;
            }
            $aMakananPokoks[$makananpokok->id] = $makananpokok;
            $aMakananPokoks[$makananpokok->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['makanan_pokok_id'])) {
			for ($i = 0; $i < count($_POST['jform']['makanan_pokok_id']); $i++) {
				$makanan_pokok_id = $_POST['jform']['makanan_pokok_id'][$i];
				if (!array_key_exists(intval($makanan_pokok_id), $aMakananPokoks)) {
					$makananpokok = new StdClass();
                    $makananpokok->id = $makanan_pokok_id;
                    $makananpokok->member_id = $member->id;
                    $makananpokok->ordering = $i + 1;
                    $makananpokok->kategori = $this->input->_clean_input_data($_POST['jform']['makanan_pokok_ketegori'][$i]);
                    $makananpokok->bahan_makanan = $this->input->_clean_input_data($_POST['jform']['makanan_pokok_nama'][$i]);
                    $makananpokok->frekwensi = $this->input->_clean_input_data($_POST['jform']['makanan_pokok_frekwensi'][$i]);
                    $makananpokok->keterangan = $this->input->_clean_input_data($_POST['jform']['makanan_pokok_keterangan'][$i]);
                    $makananpokok->status_edit = MODE_ADD;
                    $aMakananPokoks[$makanan_pokok_id] = $makananpokok;
				}
				else {
                    $aMakananPokoks[$makanan_pokok_id]->ordering = $i + 1;
                    $aMakananPokoks[$makanan_pokok_id]->bahan_makanan = $this->input->_clean_input_data($_POST['jform']['makanan_pokok_nama'][$i]);
                    $aMakananPokoks[$makanan_pokok_id]->frekwensi = $this->input->_clean_input_data($_POST['jform']['makanan_pokok_frekwensi'][$i]);
                    $aMakananPokoks[$makanan_pokok_id]->keterangan = $this->input->_clean_input_data($_POST['jform']['makanan_pokok_keterangan'][$i]);
                    $aMakananPokoks[$makanan_pokok_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->makananpokoks = $aMakananPokoks;
        
        $laukhewanis            = $this->Member_Food_Frequency_Model->getAllByKetegori($member->id, 'Lauk Hewani');
		$member->laukhewanis	= $laukhewanis['data'];
        $aLaukHewanis = array();
        foreach ($member->laukhewanis as $laukhewani) {
            if ($laukhewani->member_id != $member->id) {
                $laukhewani->member_id = $member->id;
            }
            $aLaukHewanis[$laukhewani->id] = $laukhewani;
            $aLaukHewanis[$laukhewani->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['lauk_hewani_id'])) {
			for ($i = 0; $i < count($_POST['jform']['lauk_hewani_id']); $i++) {
				$lauk_hewani_id = $_POST['jform']['lauk_hewani_id'][$i];
				if (!array_key_exists(intval($lauk_hewani_id), $aLaukHewanis)) {
					$laukhewani = new StdClass();
                    $laukhewani->id = $lauk_hewani_id;
                    $laukhewani->member_id = $member->id;
                    $laukhewani->ordering = $i + 1;
                    $laukhewani->kategori = $this->input->_clean_input_data($_POST['jform']['lauk_hewani_ketegori'][$i]);
                    $laukhewani->bahan_makanan = $this->input->_clean_input_data($_POST['jform']['lauk_hewani_nama'][$i]);
                    $laukhewani->frekwensi = $this->input->_clean_input_data($_POST['jform']['lauk_hewani_frekwensi'][$i]);
                    $laukhewani->keterangan = $this->input->_clean_input_data($_POST['jform']['lauk_hewani_keterangan'][$i]);
                    $laukhewani->status_edit = MODE_ADD;
                    $aLaukHewanis[$lauk_hewani_id] = $laukhewani;
				}
				else {
                    $aLaukHewanis[$lauk_hewani_id]->ordering = $i + 1;
                    $aLaukHewanis[$lauk_hewani_id]->bahan_makanan = $this->input->_clean_input_data($_POST['jform']['lauk_hewani_nama'][$i]);
                    $aLaukHewanis[$lauk_hewani_id]->frekwensi = $this->input->_clean_input_data($_POST['jform']['lauk_hewani_frekwensi'][$i]);
                    $aLaukHewanis[$lauk_hewani_id]->keterangan = $this->input->_clean_input_data($_POST['jform']['lauk_hewani_keterangan'][$i]);
                    $aLaukHewanis[$lauk_hewani_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->laukhewanis = $aLaukHewanis;
        
        $lauknabatis            = $this->Member_Food_Frequency_Model->getAllByKetegori($member->id, 'Lauk Nabati');
		$member->lauknabatis	= $lauknabatis['data'];
        $aLaukNabatis = array();
        foreach ($member->lauknabatis as $lauknabati) {
            if ($lauknabati->member_id != $member->id) {
                $lauknabati->member_id = $member->id;
            }
            $aLaukNabatis[$lauknabati->id] = $lauknabati;
            $aLaukNabatis[$lauknabati->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['lauk_nabati_id'])) {
			for ($i = 0; $i < count($_POST['jform']['lauk_nabati_id']); $i++) {
				$lauk_nabati_id = $_POST['jform']['lauk_nabati_id'][$i];
				if (!array_key_exists(intval($lauk_nabati_id), $aLaukNabatis)) {
					$lauknabati = new StdClass();
                    $lauknabati->id = $lauk_nabati_id;
                    $lauknabati->member_id = $member->id;
                    $lauknabati->ordering = $i + 1;
                    $lauknabati->kategori = $this->input->_clean_input_data($_POST['jform']['lauk_nabati_ketegori'][$i]);
                    $lauknabati->bahan_makanan = $this->input->_clean_input_data($_POST['jform']['lauk_nabati_nama'][$i]);
                    $lauknabati->frekwensi = $this->input->_clean_input_data($_POST['jform']['lauk_nabati_frekwensi'][$i]);
                    $lauknabati->keterangan = $this->input->_clean_input_data($_POST['jform']['lauk_nabati_keterangan'][$i]);
                    $lauknabati->status_edit = MODE_ADD;
                    $aLaukNabatis[$lauk_nabati_id] = $lauknabati;
				}
				else {
                    $aLaukNabatis[$lauk_nabati_id]->ordering = $i + 1;
                    $aLaukNabatis[$lauk_nabati_id]->bahan_makanan = $this->input->_clean_input_data($_POST['jform']['lauk_nabati_nama'][$i]);
                    $aLaukNabatis[$lauk_nabati_id]->frekwensi = $this->input->_clean_input_data($_POST['jform']['lauk_nabati_frekwensi'][$i]);
                    $aLaukNabatis[$lauk_nabati_id]->keterangan = $this->input->_clean_input_data($_POST['jform']['lauk_nabati_keterangan'][$i]);
                    $aLaukNabatis[$lauk_nabati_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->lauknabatis = $aLaukNabatis;
        
        $sayurans        = $this->Member_Food_Frequency_Model->getAllByKetegori($member->id, 'Sayuran');
		$member->sayurans	= $sayurans['data'];
        $aSayurans = array();
        foreach ($member->sayurans as $lauknabati) {
            if ($lauknabati->member_id != $member->id) {
                $lauknabati->member_id = $member->id;
            }
            $aSayurans[$lauknabati->id] = $lauknabati;
            $aSayurans[$lauknabati->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['sayuran_id'])) {
			for ($i = 0; $i < count($_POST['jform']['sayuran_id']); $i++) {
				$sayuran_id = $_POST['jform']['sayuran_id'][$i];
				if (!array_key_exists(intval($sayuran_id), $aSayurans)) {
					$sayuran = new StdClass();
                    $sayuran->id = $sayuran_id;
                    $sayuran->member_id = $member->id;
                    $sayuran->ordering = $i + 1;
                    $sayuran->kategori = $this->input->_clean_input_data($_POST['jform']['sayuran_ketegori'][$i]);
                    $sayuran->bahan_makanan = $this->input->_clean_input_data($_POST['jform']['sayuran_nama'][$i]);
                    $sayuran->frekwensi = $this->input->_clean_input_data($_POST['jform']['sayuran_frekwensi'][$i]);
                    $sayuran->keterangan = $this->input->_clean_input_data($_POST['jform']['sayuran_keterangan'][$i]);
                    $sayuran->status_edit = MODE_ADD;
                    $aSayurans[$sayuran_id] = $sayuran;
				}
				else {
                    $aSayurans[$sayuran_id]->ordering = $i + 1;
                    $aSayurans[$sayuran_id]->bahan_makanan = $this->input->_clean_input_data($_POST['jform']['sayuran_nama'][$i]);
                    $aSayurans[$sayuran_id]->frekwensi = $this->input->_clean_input_data($_POST['jform']['sayuran_frekwensi'][$i]);
                    $aSayurans[$sayuran_id]->keterangan = $this->input->_clean_input_data($_POST['jform']['sayuran_keterangan'][$i]);
                    $aSayurans[$sayuran_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->sayurans = $aSayurans;
        
        $buahs          = $this->Member_Food_Frequency_Model->getAllByKetegori($member->id, 'Buah-buahan');
		$member->buahs	= $buahs['data'];
        $aBuahs = array();
        foreach ($member->buahs as $lauknabati) {
            if ($lauknabati->member_id != $member->id) {
                $lauknabati->member_id = $member->id;
            }
            $aBuahs[$lauknabati->id] = $lauknabati;
            $aBuahs[$lauknabati->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['buah_id'])) {
			for ($i = 0; $i < count($_POST['jform']['buah_id']); $i++) {
				$buah_id = $_POST['jform']['buah_id'][$i];
				if (!array_key_exists(intval($buah_id), $aBuahs)) {
					$buah = new StdClass();
                    $buah->id = $buah_id;
                    $buah->member_id = $member->id;
                    $buah->ordering = $i + 1;
                    $buah->kategori = $this->input->_clean_input_data($_POST['jform']['buah_ketegori'][$i]);
                    $buah->bahan_makanan = $this->input->_clean_input_data($_POST['jform']['buah_nama'][$i]);
                    $buah->frekwensi = $this->input->_clean_input_data($_POST['jform']['buah_frekwensi'][$i]);
                    $buah->keterangan = $this->input->_clean_input_data($_POST['jform']['buah_keterangan'][$i]);
                    $buah->status_edit = MODE_ADD;
                    $aBuahs[$buah_id] = $buah;
				}
				else {
                    $aBuahs[$buah_id]->ordering = $i + 1;
                    $aBuahs[$buah_id]->bahan_makanan = $this->input->_clean_input_data($_POST['jform']['buah_nama'][$i]);
                    $aBuahs[$buah_id]->frekwensi = $this->input->_clean_input_data($_POST['jform']['buah_frekwensi'][$i]);
                    $aBuahs[$buah_id]->keterangan = $this->input->_clean_input_data($_POST['jform']['buah_keterangan'][$i]);
                    $aBuahs[$buah_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->sayurans = $aBuahs;

        $fflainlains			= $this->Member_Food_Frequency_Model->getAllByKetegori($member->id, 'Lain-lain');
		$member->fflainlains	= $fflainlains['data'];
        $aFFLainLains = array();
        foreach ($member->fflainlains as $fflainlain) {
            if ($fflainlain->member_id != $member->id) {
                $fflainlain->member_id = $member->id;
            }
            $aFFLainLains[$fflainlain->id] = $fflainlain;
            $aFFLainLains[$fflainlain->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['ff_lain_lain_id'])) {
			for ($i = 0; $i < count($_POST['jform']['ff_lain_lain_id']); $i++) {
				$fflainlain_id = $_POST['jform']['ff_lain_lain_id'][$i];
				if (!array_key_exists(intval($fflainlain_id), $aFFLainLains)) {
					$fflainlain = new StdClass();
                    $fflainlain->id = $fflainlain_id;
                    $fflainlain->member_id = $member->id;
                    $fflainlain->ordering = $i + 1;
                    $fflainlain->kategori = $this->input->_clean_input_data($_POST['jform']['ff_lain_lain_ketegori'][$i]);
                    $fflainlain->bahan_makanan = $this->input->_clean_input_data($_POST['jform']['ff_lain_lain_nama'][$i]);
                    $fflainlain->frekwensi = $this->input->_clean_input_data($_POST['jform']['ff_lain_lain_frekwensi'][$i]);
                    $fflainlain->keterangan = $this->input->_clean_input_data($_POST['jform']['ff_lain_lain_keterangan'][$i]);
                    $fflainlain->status_edit = MODE_ADD;
                    $aFFLainLains[$fflainlain_id] = $fflainlain;
				}
				else {
                    $aFFLainLains[$fflainlain_id]->ordering = $i + 1;
                    $aFFLainLains[$fflainlain_id]->bahan_makanan = $this->input->_clean_input_data($_POST['jform']['ff_lain_lain_nama'][$i]);
                    $aFFLainLains[$fflainlain_id]->frekwensi = $this->input->_clean_input_data($_POST['jform']['ff_lain_lain_frekwensi'][$i]);
                    $aFFLainLains[$fflainlain_id]->keterangan = $this->input->_clean_input_data($_POST['jform']['ff_lain_lain_keterangan'][$i]);
                    $aFFLainLains[$fflainlain_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->fflainlains = $aFFLainLains;
		
		$pFormal					= $this->Member_Pendidikan_Model->getAllByJenis($member->id, 'Pendidikan Formal');
		$member->pendidikan_formals	= $pFormal['data'];
        $aPendidikanFormals = array();
        foreach ($member->pendidikan_formals as $pFormal) {
            if ($pFormal->member_id != $member->id) {
                $pFormal->member_id = $member->id;
            }
            $aPendidikanFormals[$pFormal->id] = $pFormal;
            $aPendidikanFormals[$pFormal->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['pf_pendidikan_id'])) {
			for ($i = 0; $i < count($_POST['jform']['pf_pendidikan_id']); $i++) {
				$pf_pendidikan_id = $_POST['jform']['pf_pendidikan_id'][$i];
				if (!array_key_exists(intval($pf_pendidikan_id), $aPendidikanFormals)) {
					$pformal = new StdClass();
                    $pformal->id = $pf_pendidikan_id;
                    $pformal->member_id = $member->id;
                    $pformal->ordering = $i + 1;
                    $pformal->jenis = 'Pendidikan Formal';
                    $pformal->nama = $this->input->_clean_input_data($_POST['jform']['pf_nama'][$i]);
                    $pformal->tahun_dari = $this->input->_clean_input_data($_POST['jform']['pf_tahun_dari'][$i]);
                    $pformal->tahun_sampai = $this->input->_clean_input_data($_POST['jform']['pf_tahun_sampai'][$i]);
					$pformal->lokasi = $this->input->_clean_input_data($_POST['jform']['pf_lokasi'][$i]);
					$pformal->jenjang = $this->input->_clean_input_data($_POST['jform']['pf_jenjang'][$i]);
					$pformal->deskripsi = $this->input->_clean_input_data($_POST['jform']['pf_deskripsi'][$i]);
                    $pformal->status_edit = MODE_ADD;
                    $aPendidikanFormals[$pf_pendidikan_id] = $pformal;
				}
				else {
                    $aPendidikanFormals[$pf_pendidikan_id]->ordering = $i + 1;
					$aPendidikanFormals[$pf_pendidikan_id]->nama = $this->input->_clean_input_data($_POST['jform']['pf_nama'][$i]);
					$aPendidikanFormals[$pf_pendidikan_id]->tahun_dari = $this->input->_clean_input_data($_POST['jform']['pf_tahun_dari'][$i]);
					$aPendidikanFormals[$pf_pendidikan_id]->tahun_sampai = $this->input->_clean_input_data($_POST['jform']['pf_tahun_sampai'][$i]);
                    $aPendidikanFormals[$pf_pendidikan_id]->lokasi = $this->input->_clean_input_data($_POST['jform']['pf_lokasi'][$i]);
                    $aPendidikanFormals[$pf_pendidikan_id]->jenjang = $this->input->_clean_input_data($_POST['jform']['pf_jenjang'][$i]);
                    $aPendidikanFormals[$pf_pendidikan_id]->deskripsi = $this->input->_clean_input_data($_POST['jform']['pf_deskripsi'][$i]);
                    $aPendidikanFormals[$pf_pendidikan_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->pendidikan_formals = $aPendidikanFormals;
		
		$pNonFormal						= $this->Member_Pendidikan_Model->getAllByJenis($member->id, 'Pendidikan Non Formal');
		$member->pendidikan_non_formals	= $pNonFormal['data'];
        $aPendidikanNonFormals = array();
        foreach ($member->pendidikan_non_formals as $pNonFormal) {
            if ($pNonFormal->member_id != $member->id) {
                $pNonFormal->member_id = $member->id;
            }
            $aPendidikanNonFormals[$pNonFormal->id] = $pNonFormal;
            $aPendidikanNonFormals[$pNonFormal->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['pnf_pendidikan_id'])) {
			for ($i = 0; $i < count($_POST['jform']['pnf_pendidikan_id']); $i++) {
				$pnf_pendidikan_id = $_POST['jform']['pnf_pendidikan_id'][$i];
				if (!array_key_exists(intval($pnf_pendidikan_id), $aPendidikanNonFormals)) {
					$pNonFormal = new StdClass();
                    $pNonFormal->id = $pnf_pendidikan_id;
                    $pNonFormal->member_id = $member->id;
                    $pNonFormal->ordering = $i + 1;
                    $pNonFormal->jenis = 'Pendidikan Non Formal';
                    $pNonFormal->nama = $this->input->_clean_input_data($_POST['jform']['pnf_nama'][$i]);
                    $pNonFormal->tahun_dari = $this->input->_clean_input_data($_POST['jform']['pnf_tahun_dari'][$i]);
                    $pNonFormal->tahun_sampai = $this->input->_clean_input_data($_POST['jform']['pnf_tahun_sampai'][$i]);
					$pNonFormal->lokasi = $this->input->_clean_input_data($_POST['jform']['pnf_lokasi'][$i]);
					$pNonFormal->deskripsi = $this->input->_clean_input_data($_POST['jform']['pnf_deskripsi'][$i]);
                    $pNonFormal->status_edit = MODE_ADD;
                    $aPendidikanNonFormals[$pnf_pendidikan_id] = $pNonFormal;
				}
				else {
                    $aPendidikanNonFormals[$pnf_pendidikan_id]->ordering = $i + 1;
					$aPendidikanNonFormals[$pnpendidikan_pelatihansf_pendidikan_id]->nama = $this->input->_clean_input_data($_POST['jform']['pnf_nama'][$i]);
					$aPendidikanNonFormals[$pnf_pendidikan_id]->tahun_dari = $this->input->_clean_input_data($_POST['jform']['pnf_tahun_dari'][$i]);
					$aPendidikanNonFormals[$pnf_pendidikan_id]->tahun_sampai = $this->input->_clean_input_data($_POST['jform']['pnf_tahun_sampai'][$i]);
                    $aPendidikanNonFormals[$pnf_pendidikan_id]->lokasi = $this->input->_clean_input_data($_POST['jform']['pnf_lokasi'][$i]);
                    $aPendidikanNonFormals[$pnf_pendidikan_id]->deskripsi = $this->input->_clean_input_data($_POST['jform']['pnf_deskripsi'][$i]);
                    $aPendidikanNonFormals[$pnf_pendidikan_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->pendidikan_non_formals = $aPendidikanNonFormals;
		
		$pelatihan						= $this->Member_Pendidikan_Model->getAllByJenis($member->id, 'Pelatihan');
		$member->pendidikan_pelatihans	= $pelatihan['data'];
        $aPelatihans = array();
        foreach ($member->pendidikan_pelatihans as $pPelatihan) {
            if ($pPelatihan->member_id != $member->id) {
                $pPelatihan->member_id = $member->id;
            }
            $aPelatihans[$pPelatihan->id] = $pPelatihan;
            $aPelatihans[$pPelatihan->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['p_pendidikan_id'])) {
			for ($i = 0; $i < count($_POST['jform']['p_pendidikan_id']); $i++) {
				$p_pendidikan_id = $_POST['jform']['p_pendidikan_id'][$i];
				if (!array_key_exists(intval($p_pendidikan_id), $aPelatihans)) {
					$pPelatihan = new StdClass();
                    $pPelatihan->id = $p_pendidikan_id;
                    $pPelatihan->member_id = $member->id;
                    $pPelatihan->ordering = $i + 1;
                    $pPelatihan->jenis = 'Pelatihan';
                    $pPelatihan->nama = $this->input->_clean_input_data($_POST['jform']['p_nama'][$i]);
                    $pPelatihan->tahun_dari = $this->input->_clean_input_data($_POST['jform']['p_tahun'][$i]);
                    $pPelatihan->tahun_sampai = 0;
					$pPelatihan->lokasi = $this->input->_clean_input_data($_POST['jform']['p_lokasi'][$i]);
					$pPelatihan->deskripsi = $this->input->_clean_input_data($_POST['jform']['p_deskripsi'][$i]);
                    $pPelatihan->status_edit = MODE_ADD;
                    $aPelatihans[$p_pendidikan_id] = $pPelatihan;
				}
				else {
                    $aPelatihans[$p_pendidikan_id]->ordering = $i + 1;
					$aPelatihans[$p_pendidikan_id]->nama = $this->input->_clean_input_data($_POST['jform']['p_nama'][$i]);
					$aPelatihans[$p_pendidikan_id]->tahun_dari = $this->input->_clean_input_data($_POST['jform']['p_tahun'][$i]);
                    $aPelatihans[$p_pendidikan_id]->lokasi = $this->input->_clean_input_data($_POST['jform']['p_lokasi'][$i]);
                    $aPelatihans[$p_pendidikan_id]->deskripsi = $this->input->_clean_input_data($_POST['jform']['p_deskripsi'][$i]);
                    $aPelatihans[$p_pendidikan_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->pendidikan_pelatihans = $aPelatihans;
        
		$bahasas			= $this->Member_Bahasa_Model->getAllByMemberId($member->id);
		$member->bahasas	= $bahasas['data'];
        $aBahasas = array();
        foreach ($member->bahasas as $bahasa) {
            if ($bahasa->member_id != $member->id) {
                $bahasa->member_id = $member->id;
            }
            $aBahasas[$bahasa->id] = $bahasa;
            $aBahasas[$bahasa->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['bahasa_id'])) {
			for ($i = 0; $i < count($_POST['jform']['bahasa_id']); $i++) {
				$bahasa_id = $_POST['jform']['bahasa_id'][$i];
				if (!array_key_exists(intval($bahasa_id), $aBahasas)) {
					$bahasa = new StdClass();
                    $bahasa->id = $bahasa_id;
                    $bahasa->member_id = $member->id;
                    $bahasa->ordering = $i + 1;
                    $bahasa->nama_bahasa = $this->input->_clean_input_data($_POST['jform']['nama_bahasa'][$i]);
					$bahasa->membaca = $this->input->_clean_input_data($_POST['jform']['membaca'][$i]);
					$bahasa->menulis = $this->input->_clean_input_data($_POST['jform']['menulis'][$i]);
					$bahasa->berbicara = $this->input->_clean_input_data($_POST['jform']['berbicara'][$i]);
                    $bahasa->status_edit = MODE_ADD;
                    $aBahasas[$bahasa_id] = $bahasa;
				}
				else {
                    $aBahasas[$bahasa_id]->ordering = $i + 1;
					$aBahasas[$bahasa_id]->nama_bahasa = $this->input->_clean_input_data($_POST['jform']['nama_bahasa'][$i]);
					$aBahasas[$bahasa_id]->membaca = $this->input->_clean_input_data($_POST['jform']['membaca'][$i]);
					$aBahasas[$bahasa_id]->menulis = $this->input->_clean_input_data($_POST['jform']['menulis'][$i]);
					$aBahasas[$bahasa_id]->berbicara = $this->input->_clean_input_data($_POST['jform']['berbicara'][$i]);
                    $aBahasas[$bahasa_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->bahasas = $aBahasas;
		
		$organisasis			= $this->Member_Organisasi_Model->getAllByMemberId($member->id);
		$member->organisasis	= $organisasis['data'];
        $aOrganisasis = array();
        foreach ($member->organisasis as $organisasi) {
            if ($organisasi->member_id != $member->id) {
                $organisasi->member_id = $member->id;
            }
            $aOrganisasis[$organisasi->id] = $organisasi;
            $aOrganisasis[$organisasi->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['organisasi_id'])) {
			for ($i = 0; $i < count($_POST['jform']['organisasi_id']); $i++) {
				$organisasi_id = $_POST['jform']['organisasi_id'][$i];
				if (!array_key_exists(intval($organisasi_id), $aOrganisasis)) {
					$scOrganisasi = new stdClass();
                    $scOrganisasi->id = $organisasi_id;
                    $scOrganisasi->member_id = $member->id;
                    $scOrganisasi->ordering = $i + 1;
                    $scOrganisasi->nama = $this->input->_clean_input_data($_POST['jform']['nama_organisasi'][$i]);
					$scOrganisasi->tahun_dari = $this->input->_clean_input_data($_POST['jform']['organisasi_tahun_dari'][$i]);
                    $scOrganisasi->tahun_sampai = $this->input->_clean_input_data($_POST['jform']['organisasi_tahun_dari'][$i]);
					$scOrganisasi->jenis = $this->input->_clean_input_data($_POST['jform']['jenis_organisasi'][$i]);
                    $scOrganisasi->jabatan = $this->input->_clean_input_data($_POST['jform']['organisasi_jabatan'][$i]);
                    $scOrganisasi->status_edit = MODE_ADD;
                    $aOrganisasis[$organisasi_id] = $scOrganisasi;
				}
				else {
                    $aOrganisasis[$organisasi_id]->ordering = $i + 1;
					$aOrganisasis[$organisasi_id]->nama = $this->input->_clean_input_data($_POST['jform']['nama_organisasi'][$i]);
					$aOrganisasis[$organisasi_id]->tahun_dari = $this->input->_clean_input_data($_POST['jform']['organisasi_tahun_dari'][$i]);
                    $aOrganisasis[$organisasi_id]->tahun_sampai = $this->input->_clean_input_data($_POST['jform']['organisasi_tahun_dari'][$i]);
					$aOrganisasis[$organisasi_id]->jenis = $this->input->_clean_input_data($_POST['jform']['jenis_organisasi'][$i]);
                    $aOrganisasis[$organisasi_id]->jabatan = $this->input->_clean_input_data($_POST['jform']['organisasi_jabatan'][$i]);
                    $aOrganisasis[$organisasi_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->organisasis = $aOrganisasis;
		
		$pengalamanKerjas			= $this->Member_Pengalaman_Kerja_Model->getAllByMemberId($member->id);
		$member->pengalaman_kerjas	= $pengalamanKerjas['data'];
        $aPengalamanKerjas = array();
        foreach ($member->pengalaman_kerjas as $pk) {
            if ($pk->member_id != $member->id) {
                $pk->member_id = $member->id;
            }
            $aPengalamanKerjas[$pk->id] = $pk;
            $aPengalamanKerjas[$pk->id]->status_edit = MODE_DELETE;
        }
		if (isset($_POST['jform']['pk_id'])) {
			for ($i = 0; $i < count($_POST['jform']['pk_id']); $i++) {
				$pk_id = $_POST['jform']['pk_id'][$i];
				if (!array_key_exists(intval($pk_id), $aPengalamanKerjas)) {
					$scPK = new stdClass();
                    $scPK->id = $pk_id;
                    $scPK->member_id = $member->id;
                    $scPK->ordering = $i + 1;
                    $scPK->nama = $this->input->_clean_input_data($_POST['jform']['pk_nama'][$i]);
					$scPK->tahun_dari = $this->input->_clean_input_data($_POST['jform']['pk_tahun_dari'][$i]);
                    $scPK->tahun_sampai = $this->input->_clean_input_data($_POST['jform']['pk_tahun_sampai'][$i]);
					$scPK->lokasi = $this->input->_clean_input_data($_POST['jform']['pk_lokasi'][$i]);
					$scPK->jabatan = $this->input->_clean_input_data($_POST['jform']['pk_jabatan'][$i]);
					$scPK->prestasi = $this->input->_clean_input_data($_POST['jform']['pk_prestasi'][$i]);
                    $scPK->status_edit = MODE_ADD;
                    $aPengalamanKerjas[$pk_id] = $scPK;
				}
				else {
                    $aPengalamanKerjas[$pk_id]->ordering = $i + 1;
					$aPengalamanKerjas[$pk_id]->nama = $this->input->_clean_input_data($_POST['jform']['pk_nama'][$i]);
					$aPengalamanKerjas[$pk_id]->tahun_dari = $this->input->_clean_input_data($_POST['jform']['pk_tahun_dari'][$i]);
                    $aPengalamanKerjas[$pk_id]->tahun_sampai = $this->input->_clean_input_data($_POST['jform']['pk_tahun_sampai'][$i]);
					$aPengalamanKerjas[$pk_id]->lokasi = $this->input->_clean_input_data($_POST['jform']['pk_lokasi'][$i]);
					$aPengalamanKerjas[$pk_id]->jabatan = $this->input->_clean_input_data($_POST['jform']['pk_jabatan'][$i]);
					$aPengalamanKerjas[$pk_id]->prestasi = $this->input->_clean_input_data($_POST['jform']['pk_prestasi'][$i]);
                    $aPengalamanKerjas[$pk_id]->status_edit = MODE_EDIT;
				}
			}
		}
        $member->pengalaman_kerjas = $aPengalamanKerjas;
        
        return $member;
    }
    
    protected function addToolbar()
	{
        VToolBar_Helper::addNew('member.add');
        VToolBar_Helper::editList('member.edit');
		VToolBar_Helper::divider();
		VToolBar_Helper::deleteList('', 'member.delete');
        VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help'));
	}
    
    protected function addToolbarForm($id = 0)
	{
        VToolBar_Helper::apply('member.apply');
        VToolBar_Helper::save('member.save');
        VToolBar_Helper::save2new('member.save2new');
        if (empty($id)) {
			VToolBar_Helper::cancel('member.cancel');
		} else {
			VToolBar_Helper::cancel('member.cancel', 'Close');
		}
		VToolBar_Helper::divider();
        VToolBar_Helper::help(site_url('admin/help'));
	}
	
	private function css_view()
	{
		$css = '';
		$css .= '<link href="'.base_url().'css/admin/modal.css" media="all" rel="stylesheet" type="text/css" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url().'css/admin/extras.css.php" type="text/css" />'."\n";
		return $css;
	}
	
	private function css_edit()
	{
		$css = '';
		$css .= '<link rel="stylesheet" href="'.base_url().'css/admin/modal.css" type="text/css"  title="Green"  media="all" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url().'css/admin/calendar-jos.css" type="text/css"  title="Green"  media="all" />'."\n";
		$css .= '<link rel="stylesheet" href="'.base_url().'css/admin/extras.css.php" type="text/css" />'."\n";
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
    
    public function get_member($id = 0)
    {
        echo "<option value=\"2\">Test</option>";
    }
    
}

/* End of file member.php */
/* Location: ./application/controllers/member.php */