<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_Model extends CI_Model
{

	protected $table_def = "users";
    
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
	
	public function getAll($limit = 10, $offset = 0, $order = 'first_name', $direction = 'asc')
	{
		$data = array();
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
		$data['numrows'] = $this->db->count_all_results($this->table_def);
		return $data;
	}

/*
id
member_id
first_name
last_name
title
email
phone
username
password
access_level
supervisor
last_login
password_reset
*/

    public function create(
        $member_id,
		$first_name,
		$last_name,
		$title,
		$email,
		$phone,
		$username,
		$password,
		$access_level,
		$supervisor,
		$last_login,
		$password_reset
    )
    {
        $data = array(
            'member_id'			=> $member_id,
            'first_name'		=> $first_name,
            'last_name'			=> $last_name,
            'title'				=> $title,
			'email'				=> $email,
			'phone'				=> $phone,
			'username'			=> $username,
			'password'			=> $password,
			'access_level'		=> $access_level,
			'supervisor'		=> $supervisor,
			'last_login'		=> $last_login,
			'password_reset'	=> $password_reset
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update(
        $id,
        $member_id,
		$first_name,
		$last_name,
		$title,
		$email,
		$phone,
		$username,
		$password,
		$access_level,
		$supervisor,
		$last_login,
		$password_reset
    )
    {
        $data = array(
            'member_id'			=> $member_id,
            'first_name'		=> $first_name,
            'last_name'			=> $last_name,
            'title'				=> $title,
			'email'				=> $email,
			'phone'				=> $phone,
			'username'			=> $username,
			'password'			=> $password,
			'access_level'		=> $access_level,
			'supervisor'		=> $supervisor,
			'last_login'		=> $last_login,
			'password_reset'	=> $password_reset
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
		$aSort["Nama"] = "Nama";
		$aSort["Jenjang"] = "Jenjang";
		$aSort["Status"] = "Status";
		$aSort["Wilayah"] = "Wilayah";
		$aSort["Alamat"] = "Alamat";
		return $aSort;
	}
    
}

?>