<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member_Pendidikan_Model extends CI_Model
{

	protected $table_def = "pendidikan";
    
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
	
	public function getAllByJenis($member_id, $jenis, $order = 'ordering', $direction = 'asc')
	{
		$data = array();
		$this->db->where('member_id', $member_id);
		$this->db->where('jenis', $jenis);
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
		$data['numrows'] = $this->db->count_all_results($this->table_def);
		return $data;
	}
	
    public function create($pendidikan)
    {
        $data = array(
            'member_id'		=> $pendidikan->member_id,
            'ordering'		=> $pendidikan->ordering,
            'jenis'			=> $pendidikan->jenis,
            'nama'			=> $pendidikan->nama,
			'tahun_dari'	=> $pendidikan->tahun_dari,
			'tahun_sampai'	=> $pendidikan->tahun_sampai,
			'lokasi'		=> $pendidikan->lokasi,
			'jenjang'		=> $pendidikan->jenjang,
			'deskripsi'		=> $pendidikan->deskripsi
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($pendidikan)
    {
        $data = array(
            'member_id'		=> $pendidikan->member_id,
            'ordering'		=> $pendidikan->ordering,
            'jenis'			=> $pendidikan->jenis,
            'nama'			=> $pendidikan->nama,
			'tahun_dari'	=> $pendidikan->tahun_dari,
			'tahun_sampai'	=> $pendidikan->tahun_sampai,
			'lokasi'		=> $pendidikan->lokasi,
			'jenjang'		=> $pendidikan->jenjang,
			'deskripsi'		=> $pendidikan->deskripsi
        );
        $this->db->where('id', $pendidikan->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
    
}

?>