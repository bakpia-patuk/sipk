<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jurusan_Model extends CI_Model
{

	protected $table_def = "jurusan_pt";
    
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
	
	public function getAll($limit = 10, $offset = 0, $order = 'jurusan', $direction = 'asc', $where = array(), $like = array())
	{
		$data = array();
		
		$this->db->start_cache();
		if (count($where) > 0) {
			$this->db->where($where);
		}
		if (count($like) > 0) {
			$this->db->or_like($like);
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
jurusan
deskripsi
Kemampuan_penunjang
bidang_minat
lapangan_kerja
ptn_Sasaran
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

    public function create($jurusan)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'jurusan'				=> $jurusan->jurusan,
            'deskripsi'				=> $jurusan->deskripsi,
            'kemampuan_penunjang'	=> $jurusan->kemampuan_penunjang,
            'bidang_minat'			=> $jurusan->bidang_minat,
			'lapangan_kerja'		=> $jurusan->lapangan_kerja,
			'ptn_Sasaran'			=> $jurusan->ptn_Sasaran,
			'state'					=> $jurusan->state,
			'created'				=> $current_date,
			'created_by'			=> $jurusan->created_by,
			'created_by_alias'		=> $jurusan->created_by_alias,
			'modified'				=> '0000-00-00 00:00:00',
			'modified_by'			=> '',
			'attribs'				=> '',
			'version'				=> 0,
			'hits'					=> 0
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($jurusan)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'jurusan'				=> $jurusan->jurusan,
            'deskripsi'				=> $jurusan->deskripsi,
            'kemampuan_penunjang'	=> $jurusan->kemampuan_penunjang,
            'bidang_minat'			=> $jurusan->bidang_minat,
			'lapangan_kerja'		=> $jurusan->lapangan_kerja,
			'ptn_Sasaran'			=> $jurusan->ptn_Sasaran,
			'state'					=> $jurusan->state,
			'created_by_alias'		=> $jurusan->created_by_alias,
			'modified'				=> $current_date,
			'modified_by'			=> $jurusan->modified_by,
			'attribs'				=> $jurusan->attribs,
			'version'				=> $jurusan->version
        );
        $this->db->where('id', $jurusan->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
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
		$aSort["Jurusan"] = "Jurusan";
		return $aSort;
	}
    
}

?>