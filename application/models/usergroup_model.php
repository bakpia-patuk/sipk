<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usergroup_Model extends CI_Model
{

	protected $table_def = "usergroups";
    
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
	
	public function getAll($limit = 10, $offset = 0, $order = 'group', $direction = 'asc', $where = array(), $like = array())
	{
		$data = array();
		if (count($where) > 0) {
			$this->db->where($where);
		}
		if (count($like) > 0) {
			$this->db->like($like);
		}
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
		$data['numrows'] = $this->db->count_all_results($this->table_def);
		return $data;
	}

    public function create($usergroup)
    {
        $data = array(
            'group'	=> $usergroup->group,
            'lock'	=> $usergroup->lock
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($usergroup)
    {
        $data = array(
            'group'	=> $usergroup->group,
            'lock'	=> $usergroup->lock
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
	
	public function getSort() {
		$aSort = array();
		$aSort["Group"] = "Group";
		return $aSort;
	}
    
}

?>