<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kesehatan_Model extends CI_Model
{

	protected $table_def = "rumah_sakit";
    
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

    public function create($kesehatan)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama'				=> $kesehatan->nama,
            'kategori'			=> $kesehatan->kategori,
			'status'			=> $kesehatan->status,
			'wilayah'			=> $kesehatan->wilayah,
			'alamat'			=> $kesehatan->alamat,
			'telepon1'			=> $kesehatan->telepon1,
			'telepon2'			=> $kesehatan->telepon2,
			'fax'				=> $kesehatan->fax,
			'askes'				=> $kesehatan->askes,
			'jamsostek'			=> $kesehatan->jamsostek,
			'email'				=> $kesehatan->email,
			'website'			=> $kesehatan->website,
			'catatan'			=> $kesehatan->catatan,
			'state'				=> $kesehatan->state,
			'created'			=> $current_date,
			'created_by'		=> $kesehatan->created_by,
			'created_by_alias'	=> $kesehatan->created_by_alias,
			'modified'			=> '0000-00-00 00:00:00',
			'modified_by'		=> '',
			'attribs'			=> '',
			'version'			=> 0
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($kesehatan)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama'				=> $kesehatan->nama,
            'kategori'			=> $kesehatan->kategori,
			'status'			=> $kesehatan->status,
			'wilayah'			=> $kesehatan->wilayah,
			'alamat'			=> $kesehatan->alamat,
			'telepon1'			=> $kesehatan->telepon1,
			'telepon2'			=> $kesehatan->telepon2,
			'fax'				=> $kesehatan->fax,
			'askes'				=> $kesehatan->askes,
			'jamsostek'			=> $kesehatan->jamsostek,
			'email'				=> $kesehatan->email,
			'website'			=> $kesehatan->website,
			'catatan'			=> $kesehatan->catatan,
			'state'				=> $kesehatan->state,
			'created'			=> $kesehatan->created,
			'created_by'		=> $kesehatan->created_by,
			'created_by_alias'	=> $kesehatan->created_by_alias,
			'modified'			=> $current_date,
			'modified_by'		=> $kesehatan->modified_by,
			'publish_up'		=> $kesehatan->publish_up,
			'publish_down'		=> $kesehatan->publish_down,
			'attribs'			=> $kesehatan->attribs,
			'version'			=> $kesehatan->version
        );
        $this->db->where('id', $kesehatan->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
    
    public function getKategori($semua, $none) {
		$aKategori = array();
		if ($semua) {
			$aKategori["Semua"] = "Semua";
		}
		if ($none) {
			$aKategori["none"] = "&nbsp;";
		}
		$aKategori["Rumah Sakit"] = "Rumah Sakit";
		$aKategori["Poliklinik"] = "Poliklinik";
		$aKategori["Puskesmas"] = "Puskesmas";
		$aKategori["Apotek"] = "Apotek";
		$aKategori["Laboratorium"] = "Laboratorium";
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
    
    public function getYesNo($semua, $none) {
		$aYesNo = array();
		if ($semua) {
			$aYesNo["Semua"] = "Semua";
		}
		if ($none) {
			$aYesNo["none"] = "&nbsp;";
		}
		$aYesNo["Ya"] = "Ya";
		$aYesNo["Tidak"] = "Tidak";
		return $aYesNo;
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
		$aState["1"] = "Published";
		$aState["0"] = "Unpublished";
		$aState["2"] = "Archived";
		$aState["-2"] = "Trashed";
		return $aState;
	}
	
	public function getSort() {
		$aSort = array();
		$aSort["Nama"] = "Nama";
		return $aSort;
	}
    
}

?>