<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Perguruan_Model extends CI_Model
{

	protected $table_def = "perguruan";
    
    public function __construct()
    {
        parent::__construct();
    }
	
	public function getById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table_def);
        if ($query->num_rows() > 0) {
			return $query->row();
        }
		else
		{
			return FALSE;
		}
    }
	
	public function getAll($limit = 10, $offset = 0, $order = 'nama', $direction = 'asc', $where = array(), $like = array())
	{
		$data = array();
		$this->db->start_cache();
		if (count($where) > 0) {
			$this->db->where($where);
		}
		if (count($like) > 0) {
			$this->db->like($like);
		}
		$this->db->stop_cache();
		
		$this->db->order_by($order, $direction);
		$data['total_rows'] = $this->db->count_all_results($this->table_def);
		
		$data['data'] = $this->db->get($this->table_def, $limit, $offset)->result();
		
		$this->db->flush_cache();
		return $data;
	}

/*
id
nama
akronim
kategori
status
akreditasi
wilayah
alamat
telepon1
telepon2
fax
rektor
email
website
deskripsi
state
created
created_by
created_by_alias
modified
modified_by
publish_up
publish_down
attribs
version
hits
*/

    public function create($perguruan)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama' 				=> $perguruan->nama,
            'akronim' 			=> $perguruan->akronim,
            'kategori'      	=> $perguruan->kategori,
            'status'  			=> $perguruan->status,
			'akreditasi'  		=> $perguruan->akreditasi,
			'wilayah'  			=> $perguruan->wilayah,
			'alamat'  			=> $perguruan->alamat,
			'telepon1'  		=> $perguruan->telepon1,
			'telepon2'  		=> $perguruan->telepon2,
			'fax'  				=> $perguruan->fax,
			'rektor'  			=> $perguruan->rektor,
			'email'  			=> $perguruan->email,
			'website'  			=> $perguruan->website,
			'deskripsi'  		=> $perguruan->deskripsi,
			'state'  			=> $perguruan->state,
			'created'  			=> $current_date,
			'created_by'  		=> $perguruan->created_by,
			'created_by_alias'  => $perguruan->created_by_alias,
            'modified'			=> '0000-00-00 00:00:00',
			'modified_by'		=> '',
			'attribs'			=> '',
			'version'			=> 0
        );
        $this->db->insert($this->table_def, $data);
        $id = $this->db->insert_id();
        
        foreach ($perguruan->program_studies as $program_studi) {
			$data = array(
				'perguruan_id'	=> $id,
				'ordering'		=> $program_studi->ordering,
				'program_studi'	=> $program_studi->program_studi
			);
			switch ($program_studi->status_edit) {
			case MODE_ADD:
				$this->db->insert('program_studi', $data);
                $program_studi_id = $this->db->insert_id();
				break;
			case MODE_EDIT:
				$this->db->where('id', $program_studi->id);
				$this->db->update('program_studi', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $program_studi->id);
				$this->db->delete('program_studi');
				break;
			}
			foreach ($program_studi->fakultases as $fakultas) {
				$data = array(
					'perguruan_studi_id'    => $program_studi_id,
					'ordering'              => $fakultas->ordering,
					'fakultas'              => $fakultas->fakultas
				);
				switch ($fakultas->status_edit) {
				case MODE_ADD:
					$this->db->insert('fakultas', $data);
                    $fakultas_id = $this->db->insert_id();
					break;
				case MODE_EDIT:
					$this->db->where('id', $fakultas->id);
					$this->db->update('fakultas', $data);
					break;
				case MODE_DELETE:
                    $this->db->where('id', $fakultas->id);
                    $this->db->delete('fakultas');
					break;
				}
				foreach ($fakultas->jurusans as $jurusan) {
                    $data = array(
                        'fakultas_id'   => $fakultas_id,
                        'ordering'      => $jurusan->ordering,
                        'jurusan'       => $jurusan->jurusan,
                        'kosentrasi'    => $jurusan->kosentrasi,
                        'deskripsi'     => $jurusan->deskripsi
                    );
					switch ($jurusan->status_edi) {
					case MODE_ADD:
						$this->db->insert('jurusan', $data);
                        break;
					case MODE_EDIT:
						$this->db->where('id', $jurusan->id);
                        $this->db->update('jurusan', $data);
                        break;
					case MODE_DELETE:
						$this->db->where('id', $jurusan->id);
                        $this->db->delete('jurusan');
						break;
					}
				}
			}
		}
        return $id;
    }
    
    public function update($perguruan)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama' 				=> $perguruan->nama,
            'akronim' 			=> $perguruan->akronim,
            'kategori'      	=> $perguruan->kategori,
            'status'  			=> $perguruan->status,
			'akreditasi'  		=> $perguruan->akreditasi,
			'wilayah'  			=> $perguruan->wilayah,
			'alamat'  			=> $perguruan->alamat,
			'telepon1'  		=> $perguruan->telepon1,
			'telepon2'  		=> $perguruan->telepon2,
			'fax'  				=> $perguruan->fax,
			'rektor'  			=> $perguruan->rektor,
			'email'  			=> $perguruan->email,
			'website'  			=> $perguruan->website,
			'deskripsi'  		=> $perguruan->deskripsi,
			'state'  			=> $perguruan->state,
			'created'  			=> $perguruan->created,
			'created_by'  		=> $perguruan->created_by,
			'created_by_alias'  => $perguruan->created_by_alias,
			'modified'  		=> $current_date,
			'modified_by'  		=> $perguruan->modified_by,
			'publish_up'  		=> $perguruan->publish_up,
			'publish_down'  	=> $perguruan->publish_down,
			'attribs'  			=> $perguruan->attribs,
			'version'  			=> $perguruan->version
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_def, $data);
		
		foreach ($perguruan->program_studies as $program_studi) {
			$data = array(
				'perguruan_id'	=> $program_studi->perguruan_id,
				'ordering'		=> $program_studi->ordering,
				'program_studi'	=> $program_studi->program_studi
			);
			switch ($program_studi->status_edit) {
			case MODE_ADD:
				$this->db->insert('program_studi', $data);
                $program_studi_id = $this->db->insert_id();
				break;
			case MODE_EDIT:
				$this->db->where('id', $program_studi->id);
				$this->db->update('program_studi', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $program_studi->id);
				$this->db->delete('program_studi');
				break;
			}
			foreach ($program_studi->fakultases as $fakultas) {
				$data = array(
					'perguruan_studi_id'    => $program_studi_id,
					'ordering'              => $fakultas->ordering,
					'fakultas'              => $fakultas->fakultas
				);
				switch ($fakultas->status_edit) {
				case MODE_ADD:
					$this->db->insert('fakultas', $data);
                    $fakultas_id = $this->db->insert_id();
					break;
				case MODE_EDIT:
					$this->db->where('id', $fakultas->id);
					$this->db->update('fakultas', $data);
					break;
				case MODE_DELETE:
					$this->db->where('id', $fakultas->id);
                    $this->db->delete('fakultas');
					break;
				}
				foreach ($fakultas->jurusans as $jurusan) {
                    $data = array(
                        'fakultas_id'   => $fakultas_id,
                        'ordering'      => $jurusan->ordering,
                        'jurusan'       => $jurusan->jurusan,
                        'kosentrasi'    => $jurusan->kosentrasi,
                        'deskripsi'     => $jurusan->deskripsi
                    );
					switch ($jurusan->status_edi) {
					case MODE_ADD:
						$this->db->insert('jurusan', $data);
                        break;
					case MODE_EDIT:
						$this->db->where('id', $jurusan->id);
                        $this->db->update('jurusan', $data);
                        break;
					case MODE_DELETE:
						$this->db->where('id', $jurusan->id);
                        $this->db->delete('jurusan');
						break;
					}
				}
			}
		}
    }
    
    public function delete($id)
    {
		$this->db->trans_start();
		
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
        
        $this->db->where('perguruan_id', $id);
        $query = $this->db->get('program_studi');
        if ($query->num_rows() > 0) {
			$row = $query->row();
            $program_studi_id = $row->id;
            
            $this->db->where('perguruan_id', $id);
            $this->db->delete('program_studi'); 
            
            $this->db->where('program_studi_id', $program_studi_id);
            $query = $this->db->get('fakultas');
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $fakultas_id = $row->id;
                
                $this->db->where('program_studi_id', $id);
                $this->db->delete('fakultas'); 
                
                $this->db->where('fakultas_id', $fakultas_id);
                $this->db->delete('jurusan'); 
            }
        }
		
		$this->db->trans_complete();
		if ($this->db->trans_status() === TRUE) {
			return TRUE;
		}
		else {
			return FALSE;
		}
    }
	
	public function getKategori($semua, $none)
	{
		$aKategori = array();
		if ($semua) {
			$aKategori["Semua"] = "Semua";
		}
		if ($none) {
			$aKategori["none"] = "&nbsp;";
		}
		$aKategori["Universitas"] = "Universitas";
		$aKategori["Institut"] = "Institut";
		$aKategori["Sekolah Tinggi"] = "Sekolah Tinggi";
		$aKategori["Akademi"] = "Akademi";
		$aKategori["Politeknik"] = "Politeknik";
		return $aKategori;
	}
	
	public function getStatus($semua, $none) {
		$aStatus = array();
		if ($semua) {
			$aStatus["Semua"] = "Semua";
		}
		if ($none) {
			$aStatus["none"] = "&nbsp;";
		}
		$aStatus["Negeri"] = "Negeri";
		$aStatus["Swasta"] = "Swasta";
		return $aStatus;
	}
	
	public function getAkreditasi($semua, $none) {
		$aAkreditasi = array();
		if ($semua) {
			$aAkreditasi["Semua"] = "Semua";
		}
		if ($none) {
			$aAkreditasi["none"] = "&nbsp;";
		}
		$aAkreditasi["Terdaftar"] = "Terdaftar";
		$aAkreditasi["Diakui"] = "Diakui";
		$aAkreditasi["Disamakan"] = "Disamakan";
		$aAkreditasi["Terakreditasi"] = "Terakreditasi";
		return $aAkreditasi;
	}
	
	public function getWilayah($semua, $none) {
		$aWilayah = array();
		if ($semua) {
			$aWilayah["Semua"] = "Semua";
		}
		if ($none) {
			$aWilayah["none"] = "&nbsp;";
		}
		$aWilayah["Bandung"] = "Bandung";
		$aWilayah["Subang"] = "Subang";
		return $aWilayah;
	}
	
	public function getState() {
		$aState = array();
		$aState["1"]	= "Published";
		$aState["0"]	= "Unpublished";
		$aState["2"]	= "Archived";
		$aState["-2"]	= "Trashed";
		return $aState;
	}
    
    public function getProgramStudi($semua, $none) {
		// 1. Program diploma (D-I, D-II, D-III, dan D-IV)
		// 2. Program sarjana (S1)
		// 3. Program magister (S2)
		// 4. Program doktor (S3)
		$aProgramStudi = array();
		if ($semua) {
			$aProgramStudi["Semua"] = "Semua";
		}
		if ($none) {
			$aProgramStudi["none"] = "&nbsp;";
		}
		$aProgramStudi["Program diploma (D-I)"] = "Program diploma (D-I)";
		$aProgramStudi["Program diploma (D-II)"] = "Program diploma (D-II)";
		$aProgramStudi["Program diploma (D-III)"] = "Program diploma (D-III)";
		$aProgramStudi["Program diploma (D-IV)"] = "Program diploma (D-IV)";
		$aProgramStudi["Program sarjana (S1)"] = "Program sarjana (S1)";
		$aProgramStudi["Program magister (S2)"] = "Program magister (S2)";
		$aProgramStudi["Program doktor (S3)"] = "Program doktor (S3)";
		return $aProgramStudi;
	}
	
	public function getSort() {
		$aSort = array();
		$aSort["Nama"] = "Nama";
		$aSort["Akronim"] = "Akronim";
		$aSort["Kategori"] = "Kategori";
		$aSort["Status"] = "Status";
		$aSort["Status Akreditasi"] = "Status Akreditasi";
		$aSort["Wilayah"] = "Wilayah";
		$aSort["Alamat"] = "Alamat";
		$aSort["Pimpinan"] = "Pimpinan";
		return $aSort;
	}
    
}

?>