<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obat_Model extends CI_Model
{

	protected $table_def = "obat";
    
    function __construct()
    {
        parent::__construct();
    }
	
	function getById($id)
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
			$this->db->or_like($like);
		}
		$this->db->stop_cache();
		
		$this->db->order_by($order, $direction);
		$data['total_rows'] = $this->db->count_all_results($this->table_def);
		
		$data['data'] = $this->db->get($this->table_def, $limit, $offset)->result();
		$this->db->flush_cache();
		return $data;
	}
	
    public function create($obat)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama'				=> $obat->nama,
            'deskripsi' 		=> $obat->deskripsi,
            'image'      		=> $obat->image,
            'thumbnail'  		=> $obat->thumbnail,
			'komposisi' 		=> $obat->komposisi,
			'dosis'  			=> $obat->dosis,
			'indikasi'  		=> $obat->indikasi,
			'paket'  			=> $obat->paket,
			'no_registrasi'  	=> $obat->no_registrasi,
			'produksi'  		=> $obat->produksi,
			'catatan'  			=> $obat->catatan,
			'state'  			=> $obat->state,
			'created'  			=> $current_date,
			'created_by'  		=> $obat->created_by,
			'created_by_alias'  => $obat->created_by_alias,
			'modified'			=> '0000-00-00 00:00:00',
			'modified_by'		=> '',
			'attribs'			=> '',
			'version'			=> 0
        );
		
		$config['upload_path'] = './uploads/obat/';
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
			$data['image'] = "uploads/obat/".$image['file_name'];
		}
		
		//$this->_createThumbnail($image['file_name']);
		//$this->image_lib->clear(); 
		
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($obat)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama'				=> $obat->nama,
            'deskripsi' 		=> $obat->deskripsi,
            'image'      		=> $obat->image,
            'thumbnail'  		=> $obat->thumbnail,
			'komposisi' 		=> $obat->komposisi,
			'dosis'  			=> $obat->dosis,
			'indikasi'  		=> $obat->indikasi,
			'paket'  			=> $obat->paket,
			'no_registrasi'  	=> $obat->no_registrasi,
			'produksi'  		=> $obat->produksi,
			'catatan'  			=> $obat->catatan,
			'state'  			=> $obat->state,
			'created_by'  		=> $obat->created_by,
			'created_by_alias'  => $obat->created_by_alias,
			'modified'  		=> $current_date,
			'modified_by' 		=> $obat->modified_by,
			'attribs' 			=> $obat->attribs,
			'version'  			=> $obat->version
        );
		
		$config['upload_path'] = './uploads/obat/';
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
			$data['image'] = "uploads/obat/".$image['file_name'];
		}
		
        $this->db->where('id', $obat->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
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
     
}

?>