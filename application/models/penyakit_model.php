<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penyakit_Model extends CI_Model
{

	protected $table_def = "penyakit";
    
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
	
	public function getAll($limit = 10, $offset = 0, $order = 'nama', $direction = 'asc', $where = array(), $like = array())
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

    public function create($penyakit)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama'				=> $penyakit->nama,
            'image'				=> $penyakit->image,
			'thumbnail'			=> $penyakit->thumbnail,
			'deskripsi'			=> $penyakit->deskripsi,
			'gejala'			=> $penyakit->gejala,
			'pencegahan'		=> $penyakit->pencegahan,
			'pengobatan'		=> $penyakit->pengobatan,
			'obat'				=> $penyakit->obat,
			'catatan'			=> $penyakit->catatan,
			'state'				=> $penyakit->state,
			'created'			=> $current_date,
			'created_by'		=> $penyakit->created_by,
			'created_by_alias'	=> $penyakit->created_by_alias,
			'modified'			=> '0000-00-00 00:00:00',
			'modified_by'		=> '',
			'attribs'			=> '',
			'version'			=> 0
        );
		
		$config['upload_path'] = './uploads/penyakit/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '200';
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
			$data['image'] = "uploads/penyakit/".$image['file_name'];
		}
		
		//$this->_createThumbnail($image['file_name']);
		//$this->image_lib->clear();
		
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($penyakit)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama'				=> $penyakit->nama,
            'image'				=> $penyakit->image,
			'thumbnail'			=> $penyakit->thumbnail,
			'deskripsi'			=> $penyakit->deskripsi,
			'gejala'			=> $penyakit->gejala,
			'pencegahan'		=> $penyakit->pencegahan,
			'pengobatan'		=> $penyakit->pengobatan,
			'obat'				=> $penyakit->obat,
			'catatan'			=> $penyakit->catatan,
			'state'				=> $penyakit->state,
			'created_by'		=> $penyakit->created_by,
			'created_by_alias'	=> $penyakit->created_by_alias,
			'modified'			=> $current_date,
			'modified_by'		=> $penyakit->modified_by,
			'attribs'			=> $penyakit->attribs,
			'version'			=> $penyakit->version
        );
		
		unlink(realpath($data['image']));
		
		$config['upload_path'] = './uploads/penyakit/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '200';
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
		if ($image['file_name']){
			$data['image'] = "uploads/penyakit/".$image['file_name'];
		}
		
        $this->db->where('id', $penyakit->id);
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
		$aSort["Nama"] = "Nama";
		return $aSort;
	}
	
	private function _createThumbnail($fileName) {
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'uploads/penyakit/'.$fileName;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 75;
		$config['height'] = 75;

		$this->load->library('image_lib', $config);
		if(!$this->image_lib->resize())
			echo $this->image_lib->display_errors();
	}
    
}

?>