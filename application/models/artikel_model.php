<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Artikel_Model extends CI_Model
{

	protected $table_def = "artikel";
    
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
	
	public function getAll($limit = 10, $offset = 0, $order = 'title', $direction = 'asc', $where = array(), $like = array())
	{
		$data = array();
		$this->db->start_cache();
		if (count($where) > 0) {
			$this->db->where($where);
		}
		if (count($like) > 0) {
			$this->db->like($like);
		}
		$this->db->stop_cache();
		
		$this->db->order_by($order, $direction);
		$data['total_rows'] = $this->db->count_all_results($this->table_def);
		
		$data['data'] = $this->db->get($this->table_def, $limit, $offset)->result();
		$this->db->flush_cache();
		return $data;
	}
    
    public function getLatestNews()
	{
		$this->db->order_by('created', 'desc');
		$data = $this->db->get($this->table_def, 5, 0)->result();
		return $data;
	}
    
    public function getMostRead()
	{
		$this->db->order_by('hits', 'desc');
		$data = $this->db->get($this->table_def, 5, 0)->result();
		return $data;
	}

    public function create($artikel)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'title'				=> $artikel->title,
            'kategori_id'		=> $artikel->kategori_id,
            'penulis'			=> $artikel->penulis,
            'image'				=> $artikel->image,
			'thumbnail'			=> $artikel->thumbnail,
			'fulltext'			=> $artikel->fulltext,
			'sumber'			=> $artikel->sumber,
			'state'				=> $artikel->state,
			'created'			=> $current_date,
			'created_by'		=> $artikel->created_by,
			'created_by_alias'	=> $artikel->created_by_alias,
			'modified'			=> $current_date,
			'modified_by'		=> '',
			'attribs'			=> '',
			'version'			=> 0
        );
		
		$config['upload_path'] = './uploads/artikel/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1200';
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$config['max_width'] = '0';
		$config['max_height'] = '0';
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('image_upload')) {
			$this->upload->display_errors();
			exit();
		}
		$image = $this->upload->data();
		if ($image['file_name']) {
			$data['image'] = "uploads/artikel/".$image['file_name'];
		}
		
		//$this->_createThumbnail($image['file_name']);
		//$this->image_lib->clear();
		
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($artikel)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'title'				=> $artikel->title,
            'kategori_id'		=> $artikel->kategori_id,
            'penulis'			=> $artikel->penulis,
            'image'				=> $artikel->image,
			'thumbnail'			=> $artikel->thumbnail,
			'fulltext'			=> $artikel->fulltext,
			'sumber'			=> $artikel->sumber,
			'state'				=> $artikel->state,
			'created_by'		=> $artikel->created_by,
			'created_by_alias'	=> $artikel->created_by_alias,
			'modified'			=> $current_date,
			'modified_by'		=> $artikel->modified_by,
			'publish_up'		=> $artikel->publish_up,
			'publish_down'		=> $artikel->publish_down,
			'attribs'			=> $artikel->attribs,
			'version'			=> $artikel->version
        );
		
		unlink(realpath($data['image']));
		
		$config['upload_path'] = './uploads/artikel/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '200';
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$config['max_width'] = '0';
		$config['max_height'] = '0';
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('image_upload')) {
			echo $this->upload->display_errors();
			exit();
		}
		$image = $this->upload->data();
		if ($image['file_name']){
			$data['image'] = "uploads/artikel/".$image['file_name'];
		}
		
        $this->db->where('id', $artikel->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $query = $this->db->get_where($this->table_def, array('id' => $id));
        if ($query->num_rows() > 0) {
			$row = $query->row();
			$image = $row->image;
			unlink(realpath($image));
			$this->db->delete($this->table_def, array('id' => $id));
			return TRUE;
		}
		return FALSE;
    }
    
    public function getState() {
		$aState = array();
		$aState["1"] = "Published";
		$aState["0"] = "Unpublished";
		$aState["2"] = "Archived";
		$aState["-2"] = "Trashed";
		return $aState;
	}
	
	public function getSort() {
		$aSort = array();
		$aSort["Title"] = "Title";
		return $aSort;
	}
    
}

?>