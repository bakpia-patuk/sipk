<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dokter_Praktek_Model extends CI_Model
{

	protected $table_def = "praktek";
    
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
	
	public function getAllByDokterId($dokter_id, $order = 'ordering', $direction = 'asc')
	{
		$data = array();
		$this->db->where('dokter_id', $dokter_id);
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
		$data['numrows'] = $this->db->count_all_results($this->table_def);
		return $data;
	}

    public function create($praktek)
    {
        $data = array(
            'dokter_id'	=> $praktek->dokter_id,
            'ordering'	=> $praktek->ordering,
            'alamat'	=> $praktek->alamat,
			'telepon'	=> $praktek->telepon,
			'no_izin'	=> $praktek->no_izin
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($praktek)
    {
        $data = array(
            'dokter_id'	=> $praktek->dokter_id,
            'ordering'	=> $praktek->ordering,
            'alamat'	=> $praktek->alamat,
			'telepon'	=> $praktek->telepon,
			'no_izin'	=> $praktek->no_izin
        );
        $this->db->where('id', $praktek->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
    
}

?>