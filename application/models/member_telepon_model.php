<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member_Telepon_Model extends CI_Model
{

	protected $table_def = "telepon";
    
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

    public function create($telepon)
    {
        $data = array(
            'member_id'			=> $telepon->member_id,
            'ordering'			=> $telepon->ordering,
            'jenis'				=> $telepon->jenis,
            'telepon'			=> $telepon->telepon
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($telepon)
    {
        $data = array(
            'member_id'			=> $telepon->member_id,
            'ordering'			=> $telepon->ordering,
            'jenis'				=> $telepon->jenis,
            'telepon'			=> $telepon->telepon
        );
        $this->db->where('id', $telepon->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
	
	public function getJenisTelepon($semua, $none)	{
		$aTelepon = array();
		if ($semua) {
			$aTelepon["Semua"] = "Semua";
		}
		if ($none) {
			$aTelepon["none"] = "";
		}
		$aTelepon["Telepon Kantor"]		= "Telepon Kantor";
		$aTelepon["Telepon Rumah"]		= "Telepon Rumah";
		$aTelepon["Telepon Seluler"]	= "Telepon Seluler";
		$aTelepon["Fax"]				= "Fax";
		return $aTelepon;
	}
    
}

?>