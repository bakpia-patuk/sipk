<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Perguruan_Program_Studi_Model extends CI_Model
{

	protected $table_def = "program_studi";
    
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
	
	public function getAllByPerguruanId($perguruan_id, $order = 'ordering', $direction = 'asc')
	{
		$data = array();
		$this->db->where('perguruan_id', $perguruan_id);
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
		$data['numrows'] = $this->db->count_all_results($this->table_def);
		return $data;
	}
	
    public function create($program_studi)
    {
        $data = array(
            'perguruan_id'	=> $program_studi->perguruan_id,
            'ordering'		=> $program_studi->ordering,
            'program_studi'	=> $program_studi->program_studi
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($program_studi)
    {
        $data = array(
            'perguruan_id'	=> $program_studi->perguruan_id,
            'ordering'		=> $program_studi->ordering,
            'program_studi'	=> $program_studi->program_studi
        );
        $this->db->where('id', $program_studi->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
    
}

?>