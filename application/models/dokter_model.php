<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dokter_Model extends CI_Model
{

	protected $table_name = "dokter";
	protected $table_child_name = "praktek";
    
	public function __construct()
    {
        parent::__construct();
    }
	
	public function getById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table_name);
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
		$this->db->select('dokter.id AS dokter_id, dokter.nama, dokter.alamat, dokter.telepon, dokter.masa_berlaku_izin, spesialis.id AS dokter_spesialis_id, spesialis.spesialis, dokter.wilayah, dokter.email, dokter.website, dokter.state, dokter.hits');
		$this->db->from($this->table_name);
		$this->db->join('spesialis', 'spesialis.id = dokter.spesialis_id', 'left');
		if (count($where) > 0) {
			$this->db->where($where);
		}
		if (count($like) > 0) {
			$this->db->or_like($like);
		}
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, $direction);
		$query = $this->db->get();
		$data['data'] = $query->result();
        
        $this->db->select('dokter.id AS dokter_id, dokter.nama, dokter.alamat, dokter.telepon, dokter.masa_berlaku_izin, spesialis.id AS dokter_spesialis_id, spesialis.spesialis, dokter.wilayah, dokter.email, dokter.website, dokter.state, dokter.hits');
		$this->db->from($this->table_name);
		$this->db->join('spesialis', 'spesialis.id = dokter.spesialis_id', 'left');
		if (count($where) > 0) {
			$this->db->where($where);
		}
		if (count($like) > 0) {
			$this->db->like($like);
		}
		$data['total_rows'] = $this->db->count_all_results();
		return $data;
	}

    public function create($dokter)
    {
		$this->db->trans_start();
		
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama'				=> $dokter->nama,
			'alamat'			=> $dokter->alamat,
			'telepon'			=> $dokter->telepon,
			'masa_berlaku_izin'	=> $dokter->masa_berlaku_izin,
			'spesialis_id'		=> $dokter->spesialis_id,
			'wilayah'			=> $dokter->wilayah,
			'email'				=> $dokter->email,
			'website'			=> $dokter->website,
			'catatan'			=> $dokter->catatan,
			'state'				=> $dokter->state,
			'created'			=> $current_date,
			'created_by'		=> $dokter->created_by,
			'created_by_alias'	=> $dokter->created_by_alias,
			'modified'			=> '0000-00-00 00:00:00',
			'modified_by'		=> '',
			'attribs'			=> '',
			'version'			=> 0,
            'metakey'			=> $dokter->metakey,
            'own_prefix'		=> $dokter->own_prefix,
            'metakey_prefix'	=> $dokter->metakey_prefix
        );
        $this->db->insert($this->table_name, $data);
		$id = $this->db->insert_id();
		
		foreach ($dokter->prakteks as $praktek) {
			$data = array(
				'dokter_id'			=> $id,
				'ordering'			=> $praktek->ordering,
				'alamat'			=> $praktek->alamat,
				'telepon'			=> $praktek->telepon,
				'no_izin'			=> $praktek->no_izin
			);
			$this->db->insert($this->table_child_name, $data);
		}
        
		$this->db->trans_complete();
		if ($this->db->trans_status() === TRUE) {
			return $id;
		}
		else {
			return 0;
		}
    }
    
    public function update($dokter)
    {
        $this->db->trans_start();
        
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama'				=> $dokter->nama,
			'alamat'			=> $dokter->alamat,
			'telepon'			=> $dokter->telepon,
			'masa_berlaku_izin'	=> $dokter->masa_berlaku_izin,
			'spesialis_id'		=> $dokter->spesialis_id,
			'wilayah'			=> $dokter->wilayah,
			'email'				=> $dokter->email,
			'website'			=> $dokter->website,
			'catatan'			=> $dokter->catatan,
			'state'				=> $dokter->state,
			'created_by'		=> $dokter->created_by,
			'created_by_alias'	=> $dokter->created_by_alias,
			'modified'			=> $current_date,
			'modified_by'		=> $dokter->modified_by,
			'attribs'			=> $dokter->attribs,
			'version'			=> $dokter->version,
            'metakey'			=> $dokter->metakey,
            'own_prefix'		=> $dokter->own_prefix,
            'metakey_prefix'	=> $dokter->metakey_prefix
        );
        $this->db->where('id', $dokter->id);
        $this->db->update($this->table_name, $data);
        
        foreach ($dokter->prakteks as $praktek) {
            $data = array(
				'dokter_id'			=> $praktek->dokter_id,
				'ordering'			=> $praktek->ordering,
				'alamat'			=> $praktek->alamat,
				'telepon'			=> $praktek->telepon,
				'no_izin'			=> $praktek->no_izin
			);
            switch ($praktek->status_edit) {
                case MODE_ADD:
                    $this->db->insert($this->table_child_name, $data);
                    break;
                case MODE_EDIT:
                    $this->db->where('id', $praktek->id);
                    $this->db->update($this->table_child_name, $data);
                    break;
                case MODE_DELETE:
                    $this->db->where('id', $praktek->id);
                    $this->db->delete($this->table_child_name); 
                    break;
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
    
    public function delete($id)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->delete($this->table_name); 
        
        $this->db->where('dokter_id', $id);
        $this->db->delete($this->table_child_name); 
        
        $this->db->trans_complete();
		if ($this->db->trans_status() === TRUE) {
			return TRUE;
		}
		else {
			return FALSE;
		}
        
    }
	
	public function getWilayah($semua, $none) {
		$aWilayah = array();
		if ($semua) {
			$aWilayah["Semua"] = "Semua";
		}
		if ($none) {
			$aWilayah["none"] = "&nbsp;";
		}
		$aWilayah["Bandung"]    = "Bandung";
		$aWilayah["Subang"]     = "Subang";
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
		$aSort["Nama"]      = "Nama";
		$aSort["Wilayah"]   = "Wilayah";
		$aSort["Alamat"]    = "Alamat";
		return $aSort;
	}
    
}

?>