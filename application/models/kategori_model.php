<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_Model extends CI_Model
{

	protected $table_def = "kategori";
    
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
	
	public function getAll($limit = 10, $offset = 0, $order = 'kategori', $direction = 'asc', $where = array(), $like = array())
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

    public function create($kategori)
    {
        $data = array(
            'kategori'	=> $kategori->kategori
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($kategori)
    {
        $data = array(
            'kategori'	=> $kategori->kategori
        );
        $this->db->where('id', $kategori->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
	
	public function getSort() {
		$aSort = array();
		$aSort["Kategori"] = "Kategori";
		return $aSort;
	}
    
}

?>