<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Spesialis_Model extends CI_Model
{

	protected $table_def = "spesialis";
    
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
	
	public function getAll($limit = 10, $offset = 0, $order = 'spesialis', $direction = 'asc', $where = array(), $like = array())
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
        
		if ($limit == 0)
			$data['data'] = $this->db->get($this->table_def)->result();
		else
			$data['data'] = $this->db->get($this->table_def, $limit, $offset)->result();
        $this->db->flush_cache();
		return $data;
	}

/*
id
spesialis
gelar
deskripsi
*/

    public function create($spesialis)
    {
        $timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $id = $this->site_sentry->getUserId();
        $data = array(
            'spesialis'         => $spesialis->spesialis,
			'gelar'             => $spesialis->gelar,
			'deskripsi'         => $spesialis->deskripsi,
            'state'				=> $spesialis->state,
			'created'			=> $current_date,
			'created_by'		=> $spesialis->created_by,
			'created_by_alias'	=> $spesialis->created_by_alias,
			'modified'			=> '0000-00-00 00:00:00',
			'modified_by'		=> '',
			'attribs'			=> '',
			'version'			=> 0
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($spesialis)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $id = $this->site_sentry->getUserId();
        $data = array(
            'spesialis'         => $spesialis->spesialis,
			'gelar'             => $spesialis->gelar,
			'deskripsi'         => $spesialis->deskripsi,
            'state'				=> $spesialis->state,
			'created_by'		=> $spesialis->created_by,
			'created_by_alias'	=> $spesialis->created_by_alias,
			'modified'			=> current_date,
			'modified_by'		=> $spesialis->modified_by,
			'attribs'			=> $spesialis->attribs,
			'version'			=> $spesialis->version
        );
        $this->db->where('id', $spesialis->id);
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
		$aSort["Spesialis"] = "Spesialis";
		$aSort["Gelar"] = "Gelar";
		return $aSort;
	}
    
}

?>