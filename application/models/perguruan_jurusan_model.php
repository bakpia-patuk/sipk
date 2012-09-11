<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Perguruan_Jurusan_Model extends CI_Model
{

	protected $table_def = "jurusan";
    
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
	
	public function getAllByFakultasId($fakultas_id, $order = 'ordering', $direction = 'asc')
	{
		$data = array();
		$this->db->where('fakultas_id', $fakultas_id);
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
		$data['numrows'] = $this->db->count_all_results($this->table_def);
		return $data;
	}

    public function create($jurusan)
    {
        $data = array(
            'fakultas_id'	=> $jurusan->fakultas_id,
            'ordering'		=> $jurusan->ordering,
            'jurusan'		=> $jurusan->jurusan,
			'kosentrasi'	=> $jurusan->kosentrasi,
			'deskripsi'		=> $jurusan->deskripsi
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($jurusan)
    {
        $data = array(
            'fakultas_id'	=> $jurusan->fakultas_id,
            'ordering'		=> $jurusan->ordering,
            'jurusan'		=> $jurusan->jurusan,
			'kosentrasi'	=> $jurusan->kosentrasi,
			'deskripsi'		=> $jurusan->deskripsi
        );
        $this->db->where('id', $jurusan->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
    
}

?>