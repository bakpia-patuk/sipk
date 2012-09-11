<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kursus_Model extends CI_Model
{

	protected $table_def = "kursus";
    
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

    public function create($kursus)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama'				=> $kursus->nama,
            'kategori'			=> $kursus->kategori,
			'wilayah'			=> $kursus->wilayah,
			'alamat'			=> $kursus->alamat,
			'telepon1'			=> $kursus->telepon1,
			'telepon2'			=> $kursus->telepon2,
			'fax'				=> $kursus->fax,
			'email'				=> $kursus->email,
			'website'			=> $kursus->website,
			'deskripsi'			=> $kursus->deskripsi,
			'state'				=> $kursus->state,
			'created'			=> $current_date,
			'created_by'		=> $kursus->created_by,
			'created_by_alias'	=> $kursus->created_by_alias,
			'modified'			=> '0000-00-00 00:00:00',
			'modified_by'		=> '',
			'attribs'			=> '',
			'version'			=> 0
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($kursus)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama'				=> $kursus->nama,
            'kategori'			=> $kursus->kategori,
			'wilayah'			=> $kursus->wilayah,
			'alamat'			=> $kursus->alamat,
			'telepon1'			=> $kursus->telepon1,
			'telepon2'			=> $kursus->telepon2,
			'fax'				=> $kursus->fax,
			'email'				=> $kursus->email,
			'website'			=> $kursus->website,
			'deskripsi'			=> $kursus->deskripsi,
			'state'				=> $kursus->state,
			'created_by'		=> $kursus->created_by,
			'created_by_alias'	=> $kursus->created_by_alias,
			'modified'			=> $current_date,
			'modified_by'		=> $kursus->modified_by,
			'attribs'			=> $kursus->attribs,
			'version'			=> $kursus->version
        );
        $this->db->where('id', $kursus->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
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
		$aKategori["Bimbingan Belajar"] = "Bimbingan Belajar";
		$aKategori["Kursus"] = "Kursus";
		$aKategori["Test Toefl"] = "Test Toefl";
		$aKategori["Psikotest"] = "Psikotest";
		return $aKategori;
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
	
	public function getSort() {
		$aSort = array();
		$aSort["Nama"] = "Nama";
		$aSort["Kategori"] = "Kategori";
		$aSort["Wilayah"] = "Wilayah";
		$aSort["Alamat"] = "Alamat";
		return $aSort;
	}
    
}

?>