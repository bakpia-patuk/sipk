<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sekolah_Model extends CI_Model
{

	protected $table_def = "sekolah";
    
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

    public function create($sekolah)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama'				=> $sekolah->nama,
            'jenjang'			=> $sekolah->jenjang,
            'status'			=> $sekolah->status,
            'wilayah'			=> $sekolah->wilayah,
			'alamat'			=> $sekolah->alamat,
			'telepon1'			=> $sekolah->telepon1,
			'telepon2'			=> $sekolah->telepon2,
			'fax'				=> $sekolah->fax,
			'daya_tampung'		=> $sekolah->daya_tampung,
			'nilai_tertinggi'	=> $sekolah->nilai_tertinggi,
			'grade'				=> $sekolah->grade,
			'cluster'			=> $sekolah->cluster,
			'biaya'				=> $sekolah->biaya,
			'email'				=> $sekolah->email,
			'website'			=> $sekolah->website,
			'deskripsi'			=> $sekolah->deskripsi,
			'state'				=> $sekolah->state,
			'created'			=> $current_date,
			'created_by'		=> $sekolah->created_by,
			'created_by_alias'	=> $sekolah->created_by_alias,
			'modified'			=> '0000-00-00 00:00:00',
			'modified_by'		=> '',
			'attribs'			=> '',
			'version'			=> 0
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($sekolah)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            'nama'				=> $sekolah->nama,
            'jenjang'			=> $sekolah->jenjang,
            'status'			=> $sekolah->status,
            'wilayah'			=> $sekolah->wilayah,
			'alamat'			=> $sekolah->alamat,
			'telepon1'			=> $sekolah->telepon1,
			'telepon2'			=> $sekolah->telepon2,
			'fax'				=> $sekolah->fax,
			'daya_tampung'		=> $sekolah->daya_tampung,
			'nilai_tertinggi'	=> $sekolah->nilai_tertinggi,
			'grade'				=> $sekolah->grade,
			'cluster'			=> $sekolah->cluster,
			'biaya'				=> $sekolah->biaya,
			'email'				=> $sekolah->email,
			'website'			=> $sekolah->website,
			'deskripsi'			=> $sekolah->deskripsi,
			'state'				=> $sekolah->state,
			'created_by'		=> $sekolah->created_by,
			'created_by_alias'	=> $sekolah->created_by_alias,
			'modified'			=> $current_date,
			'modified_by'		=> $sekolah->modified_by,
			'attribs'			=> $sekolah->attribs,
			'version'			=> $sekolah->version
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
	
	public function getJenjang($semua, $none)
	{
		$aJenjang = array();
		if ($semua) {
			$aJenjang["Semua"] = "Semua";
		}
		if ($none) {
			$aJenjang[""] = "";
		}
		$aJenjang["TK/Play Group"] = "TK/Play Group";
		$aJenjang["SDLB"] = "SDLB";
		$aJenjang["SD/MI"] = "SD/MI";
		$aJenjang["SMP/MTs"] = "SMP/MTs";
		$aJenjang["SMU/MA"] = "SMU/MA";
		$aJenjang["SMK/MAK"] = "SMK/MAK";
		return $aJenjang;
	}
	
	public function getStatus($semua, $none) {
		$aStatus = array();
		if ($semua) {
			$aStatus["Semua"] = "Semua";
		}
		if ($none) {
			$aStatus[""] = "";
		}
		$aStatus["Negeri"] = "Negeri";
		$aStatus["Swasta"] = "Swasta";
		return $aStatus;
	}
	
	public function getWilayah($semua, $none) {
		$aWilayah = array();
		if ($semua) {
			$aWilayah["Semua"] = "Semua";
		}
		if ($none) {
			$aWilayah[""] = "";
		}
		$aWilayah["Bandung"] = "Bandung";
		$aWilayah["Subang"] = "Subang";
		return $aWilayah;
	}
	
	public function getState() {
		$aState = array();
		$aState["1"]	= "Published";
		$aState["0"]	= "Unpublished";
		$aState["2"]	= "Archived";
		$aState["-2"]	= "Trashed";
		return $aState;
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