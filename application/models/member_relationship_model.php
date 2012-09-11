<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member_Relationship_Model extends CI_Model
{

	protected $table_def = "relationship";
    
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
	
	public function getAllByMemberId($member_id, $order = 'ordering', $direction = 'asc')
	{
		$data = array();
		$this->db->where('member_id', $member_id);
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
		$data['numrows'] = $this->db->count_all_results($this->table_def);
		return $data;
	}
    
    public function getAllPasangan($member_id, $order = 'ordering', $direction = 'asc')
	{
		$data = array();
        
        $this->db->start_cache();
		$this->db->where('member_id', $member_id);
        $this->db->where('jenis', 'Pasangan');
        $this->db->stop_cache();
        
		$data['total_rows'] = $this->db->count_all_results($this->table_def);
        
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
        
        $this->db->flush_cache();
        
		return $data;
	}
    
    public function getAllOrangTua($member_id, $order = 'ordering', $direction = 'asc')
	{
		$data = array();
        
        $this->db->start_cache();
		$this->db->where('member_id', $member_id);
        $this->db->where('jenis', 'Orang Tua');
        $this->db->stop_cache();
        
		$data['total_rows'] = $this->db->count_all_results($this->table_def);
        
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
        
        $this->db->flush_cache();
        
		return $data;
	}
    
    public function getAllSaudara($member_id, $order = 'ordering', $direction = 'asc')
	{
		$data = array();
        
        $this->db->start_cache();
		$this->db->where('member_id', $member_id);
        $this->db->where('jenis', 'Saudara');
        $this->db->stop_cache();
        
		$data['total_rows'] = $this->db->count_all_results($this->table_def);
        
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
        
        $this->db->flush_cache();
        
		return $data;
	}
    
    public function getAllAnak($member_id, $order = 'ordering', $direction = 'asc')
	{
		$data = array();
        
        $this->db->start_cache();
		$this->db->where('member_id', $member_id);
        $this->db->where('jenis', 'Anak');
        $this->db->stop_cache();
        
		$data['total_rows'] = $this->db->count_all_results($this->table_def);
        
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
        
        $this->db->flush_cache();
        
		return $data;
	}
    
    public function create($relationship)
    {
        $data = array(
            'member_id'		=> $relationship->member_id,
            'ordering'		=> $relationship->ordering,
            'jenis'			=> $relationship->jenis,
            'option_nama'	=> $relationship->option_nama,
			'nama'			=> $relationship->nama,
			'relation_id'	=> $relationship->relation_id,
			'parent_id'		=> $relationship->parent_id,
			'status'		=> $relationship->status,
			'keterangan'	=> $relationship->keterangan
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($relationship)
    {
        $data = array(
            'member_id'		=> $relationship->member_id,
            'ordering'		=> $relationship->ordering,
            'jenis'			=> $relationship->jenis,
            'option_nama'	=> $relationship->option_nama,
			'nama'			=> $relationship->nama,
			'relation_id'	=> $relationship->relation_id,
			'parent_id'		=> $relationship->parent_id,
			'status'		=> $relationship->status,
			'keterangan'	=> $relationship->keterangan
        );
        $this->db->where('id', $relationship->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
    
}

?>