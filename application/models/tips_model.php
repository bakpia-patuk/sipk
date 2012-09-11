<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tips_Model extends CI_Model
{

	protected $table_def = "tips";
    
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
	
	public function getAll($limit = 10, $offset = 0, $order = 'judul', $direction = 'asc', $where = array(), $like = array())
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
judul
kategori
deskripsi
sumber
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
*/

    public function create($tips)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'judul'				=> $tips->judul,
            'kategori'			=> $tips->kategori,
            'deskripsi'			=> $tips->deskripsi,
            'sumber'			=> $tips->sumber,
			'state'				=> $tips->state,
			'created'			=> $current_date,
			'created_by'		=> $tips->created_by,
			'created_by_alias'	=> $tips->created_by_alias,
			'modified'			=> '0000-00-00 00:00:00',
			'modified_by'		=> '',
			'attribs'			=> '',
			'version'			=> 0
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($tips)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'judul'				=> $tips->judul,
            'kategori'			=> $tips->kategori,
            'deskripsi'			=> $tips->deskripsi,
            'sumber'			=> $tips->sumber,
			'state'				=> $tips->state,
			'created_by'		=> $tips->created_by,
			'created_by_alias'	=> $tips->created_by_alias,
			'modified'			=> $current_date,
			'modified_by'		=> $tips->modified_by,
			'attribs'			=> $tips->attribs,
			'version'			=> $tips->version
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
    
    public function getKategori($semua, $none) {
		$aTips = array();
		if ($semua) {
			$aTips["Semua"] = "Semua";
		}
		if ($none) {
			$aTips["none"] = "&nbsp;";
		}
		$aTips["Pendidikan"] = "Pendidikan";
		$aTips["Kesehatan"] = "Kesehatan";
		return $aTips;
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
		$aSort["Judul"] = "Judul";
		return $aSort;
	}
    
}

?>