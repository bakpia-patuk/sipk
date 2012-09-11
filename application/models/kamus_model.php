<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kamus_Model extends CI_Model
{

	protected $table_def = "kamus";
    
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
	
	public function getAll($kategori, $limit = 10, $offset = 0, $order = 'istilah', $direction = 'asc')
	{
		$data = array();
		$this->db->where('kategori', $kategori);
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, 'asc');
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
		$data['numrows'] = $this->db->count_all_results($this->table_def);
		return $data;
	}

/*
id
kategori
istilah
definisi
*/

    public function create(
		$kategori,
		$istilah,
		$definisi
    )
    {
        $data = array(
            'kategori'	=> $kategori,
            'istilah'	=> $istilah,
            'definisi'	=> $definisi
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update(
        $id,
        $kategori,
		$istilah,
		$definisi
    )
    {
        $data = array(
            'kategori'	=> $kategori,
            'istilah'	=> $istilah,
            'definisi'	=> $definisi
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
    
}

?>