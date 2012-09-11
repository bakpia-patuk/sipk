<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member_Food_Frequency_Model extends CI_Model
{

	protected $table_def = "food_frequency";
    
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
	
	public function getAllByKetegori($member_id, $kategori, $order = 'ordering', $direction = 'asc')
	{
		$data = array();
		$this->db->where('member_id', $member_id);
        $this->db->where('kategori', $kategori);
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
		$data['numrows'] = $this->db->count_all_results($this->table_def);
		return $data;
	}
	
    public function create($food)
    {
        $data = array(
            'member_id'		=> $food->member_id,
            'ordering'		=> $food->ordering,
            'kategori'      => $food->kategori,
            'bahan_makanan'	=> $food->bahan_makanan,
            'frekwensi'		=> $food->frekwensi,
			'keterangan'	=> $food->keterangan
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($bahasa)
    {
        $data = array(
            'member_id'		=> $food->member_id,
            'ordering'		=> $food->ordering,
            'kategori'      => $food->kategori,
            'bahan_makanan'	=> $food->bahan_makanan,
            'frekwensi'		=> $food->frekwensi,
			'keterangan'	=> $food->keterangan
        );
        $this->db->where('id', $telepon->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
    
}

?>