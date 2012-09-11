<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Perguruan_Fakultas_Model extends CI_Model
{

	protected $table_def = "fakultas";
    
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
	
	public function getAllByProgramStudiId($program_studi_id, $order = 'ordering', $direction = 'asc')
	{
		$data = array();
		$this->db->where('program_studi_id', $program_studi_id);
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
		$data['numrows'] = $this->db->count_all_results($this->table_def);
		return $data;
	}
	
    public function create($fakultas)
    {
        $data = array(
            'program_studi_id'	=> $fakultas->program_studi_id,
            'ordering'			=> $fakultas->ordering,
            'fakultas'			=> $fakultas->fakultas
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($fakultas)
    {
        $data = array(
            'program_studi_id'	=> $fakultas->program_studi_id,
            'ordering'			=> $fakultas->ordering,
            'fakultas'			=> $fakultas->fakultas
        );
        $this->db->where('id', $fakultas->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
    
}

?>