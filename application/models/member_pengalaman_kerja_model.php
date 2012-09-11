<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
	sipk_pengalaman_kerja  CREATE TABLE `sipk_pengalaman_kerja` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`member_id` int(11) DEFAULT NULL,
		`ordering` int(11) DEFAULT NULL,
		`nama` varchar(50) DEFAULT NULL,
		`tahun_dari` int(4) DEFAULT NULL,
		`tahun_sampai` int(4) DEFAULT NULL,
		`lokasi` varchar(50) DEFAULT NULL,
		`jabatan` varchar(50) DEFAULT NULL,
		`deskripsi` text,
		PRIMARY KEY (`id`),
		KEY `member_id` (`member_id`),
		KEY `ordering` (`ordering`)
	) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8
*/

class Member_Pengalaman_Kerja_Model extends CI_Model
{

	protected $table_def = "pengalaman_kerja";
    
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
	
	public function getAllByMemberId($member_id, $order = 'ordering', $direction = 'asc')
	{
		$data = array();
		$this->db->where('member_id', $member_id);
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
		$data['numrows'] = $this->db->count_all_results($this->table_def);
		return $data;
	}

    public function create($pengalaman_kerja)
    {
        $data = array(
            'member_id'		=> $pengalaman_kerja->member_id,
            'ordering'		=> $pengalaman_kerja->ordering,
            'perusahaan'	=> $pengalaman_kerja->jenis,
            'tahun_dari'	=> $pengalaman_kerja->tahun_dari,
			'tahun_sampai'	=> $pengalaman_kerja->tahun_sampai,
			'lokasi'		=> $pengalaman_kerja->lokasi,
			'jabatan'		=> $pengalaman_kerja->jabatan,
			'deskripsi'		=> $pengalaman_kerja->deskripsi
        );
        $this->db->insert($this->table_def, $data);
        return $this->db->insert_id();
    }
    
    public function update($pengalaman_kerja)
    {
        $data = array(
            'member_id'		=> $pengalaman_kerja->member_id,
            'ordering'		=> $pengalaman_kerja->ordering,
            'perusahaan'	=> $pengalaman_kerja->jenis,
            'tahun_dari'	=> $pengalaman_kerja->tahun_dari,
			'tahun_sampai'	=> $pengalaman_kerja->tahun_sampai,
			'lokasi'		=> $pengalaman_kerja->lokasi,
			'jabatan'		=> $pengalaman_kerja->jabatan,
			'deskripsi'		=> $pengalaman_kerja->deskripsi
        );
        $this->db->where('id', $pengalaman_kerja->id);
        $this->db->update($this->table_def, $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
    }
    
}

?>