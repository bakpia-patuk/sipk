<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
string serialize ( mixed value) 
mixed unserialize ( string input) 
string urlencode ( string text) 
string urldecode ( string encoded)

<?php
    $array["a"] = "Foo";
    $array["b"] = "Bar";
    $array["c"] = "Baz";
    $array["d"] = "Wom";

    $str = serialize($array);
    $strenc = urlencode($str);
    print $str . "\n";
    print $strenc . "\n";
?> 

output:
a:4:{s:1:"a";s:3:"Foo";s:1:"b";s:3:"Bar";s:1:"c";s:3:"Baz";s:1:"d";s:3:"Wom";}
a%3A4%3A%7Bs%3A1%3A%22a%22%3Bs%3A3%3A%22Foo%22%3Bs%3A1%3A%22b%22%3Bs%3A0%3A%22 %22%3Bs%3A1%3A%22c%22%3Bs%3A3%3A%22Baz%22%3Bs%3A1%3A%22d%22%3Bs%3A3%3A%22Wom%22%3B%7D 

<?php
    $arr = unserialize(urldecode($strenc));
    var_dump($arr);
?>

*/

class Member_Model extends CI_Model
{

	protected $table_def = "member";
    
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
	
	public function getAll($limit = 10, $offset = 0, $order = 'nama', $direction = 'asc')
	{
		$data = array();
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, $direction);
		$query = $this->db->get($this->table_def);
		$data['data'] = $query->result();
		$data['numrows'] = $this->db->count_all_results($this->table_def);
		return $data;
	}

    public function create($member)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        
        if ($member->tanggal_lahir) {
			$aDateTime = explode(' ', $member->tanggal_lahir);
            $date = $aDateTime[0];
            $time = $aDateTime[1];
            $aDate = explode('-', $date);
			$tanggal_lahir = "{$aDate[2]}-{$aDate[1]}-{$aDate[0]} $time";
		}
		else {
			$tanggal_lahir = '';
		}
        
        $data = array(
            /*'user_id'             => $member->user_id,*/
            'no_anggota'            => $member->no_anggota,
            /*'group_id'			=> $member->group_id,*/
            'nama'                  => $member->nama,
            'alamat'                => $member->alamat,
            'tempat_lahir'          => $member->tempat_lahir,
            'tanggal_lahir'         => $tanggal_lahir,
            'agama'                 => $member->agama,
            'suku'                  => $member->suku,
            'kewarganegaraan'       => $member->kewarganegaraan,
            'tinggi_badan'          => $member->tinggi_badan,
            'berat_badan'           => $member->berat_badan,
            'golongan_darah'        => $member->golongan_darah,
            'jenis_kelamin'         => $member->jenis_kelamin,
            'status_menikah'        => $member->status_menikah,
            'nama_suami'            => $member->nama_suami,
            'kelahiran'             => $member->kelahiran,
            'berat_badan_lahir'     => $member->berat_badan_lahir,
            'panjang_badan_lahir'   => $member->panjang_badan_lahir,
            'persalinan'            => $member->persalinan,
            'imunisasi'             => $member->imunisasi,
            'imunisasi_lengkap'     => $member->imunisasi_lengkap,
            'cacat'                 => $member->cacat,
            'kacamata'              => $member->kacamata,
            'merokok'               => $member->merokok,
            'olah_raga'             => $member->olah_raga,
            'tidur_siang'           => $member->tidur_siang,
            'lama_tidur'            => $member->lama_tidur,
            'lama_duduk'            => $member->lama_duduk,
            'lama_berkendaraan'     => $member->lama_berkendaraan,
            'sarapan'               => $member->sarapan,
            'makan_siang'           => $member->makan_siang,
            'makan_malam'           => $member->makan_malam,
            'alergi'                => $member->alergi,
			'keahlian'       		=> $member->keahlian,
			'hobby_olah_raga'       => $member->hobby_olah_raga,
			'hobby_kesenian'        => $member->hobby_kesenian,
			'hobby_lain_lain'       => $member->hobby_lain_lain,
			'prestasi_olah_raga'    => $member->prestasi_olah_raga,
			'prestasi_kesenian'     => $member->prestasi_kesenian,
			'prestasi_lain_lain'    => $member->prestasi_lain_lain,
            'email'                 => $member->email,
            'website'               => $member->website,
			'keterangan'            => $member->keterangan,
			/*'state'				=> $member->state,
			'created'               => $current_date,
			'created_by'            => $member->created_by,
			'created_by_alias'      => $member->created_by_alias,
			'modified'              => $member->modified,
			'modified_by'           => $member->modified_by,
			'attribs'               => $member->attribs,
			'version'               => $member->version*/
        );
        
        $this->db->trans_start();
        
        $this->db->insert($this->table_def, $data);
		$id = $this->db->insert_id();
        $member->id = $id;
        
		$this->_save_child($member);
        
        $this->db->trans_complete();
		if ($this->db->trans_status() === TRUE) {
			return $id;
		}
		else {
			return 0;
		}
    }
    
    public function update($member)
    {
		$timezone = "Asia/Pontianak";
		if (function_exists('date_default_timezone_set'))
			date_default_timezone_set($timezone);
		$current_date = date("Y-m-d H:i:s");
        $data = array(
            /*'user_id'             => $member->user_id,*/
            'no_anggota'            => $member->no_anggota,
            /*'group_id'			=> $member->group_id,*/
            'nama'                  => $member->nama,
            'alamat'                => $member->alamat,
            'tempat_lahir'          => $member->tempat_lahir,
            'tanggal_lahir'         => $member->tanggal_lahir,
            'agama'                 => $member->agama,
            'suku'                  => $member->suku,
            'kewarganegaraan'       => $member->kewarganegaraan,
            'tinggi_badan'          => $member->tinggi_badan,
            'berat_badan'           => $member->berat_badan,
            'golongan_darah'        => $member->golongan_darah,
            'jenis_kelamin'         => $member->jenis_kelamin,
            'status_menikah'        => $member->status_menikah,
            'nama_suami'            => $member->nama_suami,
            'kelahiran'             => $member->kelahiran,
            'berat_badan_lahir'     => $member->berat_badan_lahir,
            'panjang_badan_lahir'   => $member->panjang_badan_lahir,
            'persalinan'            => $member->persalinan,
            'imunisasi'             => $member->imunisasi,
            'imunisasi_lengkap'     => $member->imunisasi_lengkap,
            'cacat'                 => $member->cacat,
            'kacamata'              => $member->kacamata,
            'merokok'               => $member->merokok,
            'olah_raga'             => $member->olah_raga,
            'tidur_siang'           => $member->tidur_siang,
            'lama_tidur'            => $member->lama_tidur,
            'lama_duduk'            => $member->lama_duduk,
            'lama_berkendaraan'     => $member->lama_berkendaraan,
            'sarapan'               => $member->sarapan,
            'makan_siang'           => $member->makan_siang,
            'makan_malam'           => $member->makan_malam,
            'alergi'                => $member->alergi,
			'keahlian'       		=> $member->keahlian,
			'hobby_olah_raga'       => $member->hobby_olah_raga,
			'hobby_kesenian'        => $member->hobby_kesenian,
			'hobby_lain_lain'       => $member->hobby_lain_lain,
			'prestasi_olah_raga'    => $member->prestasi_olah_raga,
			'prestasi_kesenian'     => $member->prestasi_kesenian,
			'prestasi_lain_lain'    => $member->prestasi_lain_lain,
            'email'                 => $member->email,
            'website'               => $member->website,
			'keterangan'            => $member->keterangan,
			/*'state'				=> $member->state,
			'created'               => $member->created,
			'created_by'            => $member->created_by,
			'created_by_alias'      => $member->created_by_alias,
			'modified'              => $current_date,
			'modified_by'           => $member->modified_by,
			'publish_up'            => $member->publish_up,
			'publish_down'          => $member->publish_down,
			'attribs'               => $member->attribs,
			'version'               => $member->version*/
        );
        
        $this->db->trans_start();
        
        $this->db->where('id', $member->id);
        $this->db->update($this->table_def, $data);
		
		$this->_save_child($member);
        
        $this->db->trans_complete();
		if ($this->db->trans_status() === TRUE) {
			return TRUE;
		}
		else {
			return FALSE;
		}
    }
	
	private function _save_child($member) {
		foreach ($member->telepons as $telepon) {
			$data = array(
				'member_id'	=> $member->id,
				'ordering'	=> $telepon->ordering,
				'jenis'		=> $telepon->jenis,
				'telepon'	=> $telepon->telepon
			);
			switch ($telepon->status_edit) {
			case MODE_ADD:
				$this->db->insert('telepon', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $telepon->id);
				$this->db->update('telepon', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $telepon->id);
				$this->db->delete('telepon');
				break;
			}
		}
        foreach ($member->pasangans as $pasangan) {
			$data = array(
				'member_id'     => $member->id,
				'ordering'      => $pasangan->ordering,
				'jenis'         => $pasangan->jenis,
				'option_nama'   => $pasangan->option_nama,
                'nama'          => $pasangan->nama,
                'relation_id'	=> $pasangan->relation_id,
                'status'        => $pasangan->status
			);
			switch ($pasangan->status_edit) {
			case MODE_ADD:
				$this->db->insert('relationship', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $pasangan->id);
				$this->db->update('relationship', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $pasangan->id);
				$this->db->delete('relationship');
				break;
			}
		}
        foreach ($member->orangtuas as $orangtua) {
			$data = array(
				'member_id'     => $member->id,
				'ordering'      => $orangtua->ordering,
				'jenis'         => $orangtua->jenis,
				'option_nama'   => $orangtua->option_nama,
                'nama'          => $orangtua->nama,
                'relation_id'	=> $orangtua->relation_id,
                'status'        => $orangtua->status
			);
			switch ($orangtua->status_edit) {
			case MODE_ADD:
				$this->db->insert('relationship', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $orangtua->id);
				$this->db->update('relationship', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $orangtua->id);
				$this->db->delete('relationship');
				break;
			}
		}
        foreach ($member->anaks as $anak) {
			$data = array(
				'member_id'     => $member->id,
				'ordering'      => $anak->ordering,
				'jenis'         => $anak->jenis,
				'option_nama'   => $anak->option_nama,
                'nama'          => $anak->nama,
                'relation_id'	=> $anak->relation_id,
                'status'        => $anak->status
			);
			switch ($anak->status_edit) {
			case MODE_ADD:
				$this->db->insert('relationship', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $anak->id);
				$this->db->update('relationship', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $anak->id);
				$this->db->delete('relationship');
				break;
			}
		}
        foreach ($member->olahragas as $or) {
			$data = array(
				'member_id'         => $member->id,
				'ordering'          => $or->ordering,
				'nama_olah_raga'    => $or->nama_olah_raga,
				'frekwensi'         => $or->frekwensi,
			);
			switch ($or->status_edit) {
			case MODE_ADD:
				$this->db->insert('olah_raga', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $or->id);
				$this->db->update('olah_raga', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $or->id);
				$this->db->delete('olah_raga');
				break;
			}
		}
        foreach ($member->riwayatpenyakits as $rp) {
			$data = array(
				'member_id'     => $member->id,
				'ordering'      => $rp->ordering,
				'penyakit'      => $rp->penyakit,
				'tahun'         => $rp->tahun,
                'perawatan'     => $rp->perawatan,
                'keterangan'    => $rp->keterangan
			);
			switch ($rp->status_edit) {
			case MODE_ADD:
				$this->db->insert('riwayat_penyakit', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $rp->id);
				$this->db->update('riwayat_penyakit', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $rp->id);
				$this->db->delete('riwayat_penyakit');
				break;
			}
		}
        foreach ($member->makananpokoks as $makananpokok) {
			$data = array(
				'member_id'     => $member->id,
				'ordering'      => $makananpokok->ordering,
				'kategori'      => $makananpokok->kategori,
				'bahan_makanan' => $makananpokok->bahan_makanan,
                'frekwensi'     => $makananpokok->frekwensi,
                'keterangan'    => $makananpokok->keterangan
			);
			switch ($makananpokok->status_edit) {
			case MODE_ADD:
				$this->db->insert('food_frequency', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $makananpokok->id);
				$this->db->update('food_frequency', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $makananpokok->id);
				$this->db->delete('food_frequency');
				break;
			}
		}
        foreach ($member->laukhewanis as $laukhewani) {
			$data = array(
				'member_id'     => $member->id,
				'ordering'      => $laukhewani->ordering,
				'kategori'      => $laukhewani->kategori,
				'bahan_makanan' => $laukhewani->bahan_makanan,
                'frekwensi'     => $laukhewani->frekwensi,
                'keterangan'    => $laukhewani->keterangan
			);
			switch ($laukhewani->status_edit) {
			case MODE_ADD:
				$this->db->insert('food_frequency', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $laukhewani->id);
				$this->db->update('food_frequency', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $laukhewani->id);
				$this->db->delete('food_frequency');
				break;
			}
		}
        foreach ($member->lauknabatis as $lauknabati) {
			$data = array(
				'member_id'     => $member->id,
				'ordering'      => $lauknabati->ordering,
				'kategori'      => $lauknabati->kategori,
				'bahan_makanan' => $lauknabati->bahan_makanan,
                'frekwensi'     => $lauknabati->frekwensi,
                'keterangan'    => $lauknabati->keterangan
			);
			switch ($lauknabati->status_edit) {
			case MODE_ADD:
				$this->db->insert('food_frequency', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $lauknabati->id);
				$this->db->update('food_frequency', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $lauknabati->id);
				$this->db->delete('food_frequency');
				break;
			}
		}
        foreach ($member->sayurans as $sayuran) {
			$data = array(
				'member_id'     => $member->id,
				'ordering'      => $sayuran->ordering,
				'kategori'      => $sayuran->kategori,
				'bahan_makanan' => $sayuran->bahan_makanan,
                'frekwensi'     => $sayuran->frekwensi,
                'keterangan'    => $sayuran->keterangan
			);
			switch ($sayuran->status_edit) {
			case MODE_ADD:
				$this->db->insert('food_frequency', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $sayuran->id);
				$this->db->update('food_frequency', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $sayuran->id);
				$this->db->delete('food_frequency');
				break;
			}
		}
        foreach ($member->buahs as $buah) {
			$data = array(
				'member_id'     => $member->id,
				'ordering'      => $buah->ordering,
				'kategori'      => $buah->kategori,
				'bahan_makanan' => $buah->bahan_makanan,
                'frekwensi'     => $buah->frekwensi,
                'keterangan'    => $buah->keterangan
			);
			switch ($buah->status_edit) {
			case MODE_ADD:
				$this->db->insert('food_frequency', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $buah->id);
				$this->db->update('food_frequency', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $buah->id);
				$this->db->delete('food_frequency');
				break;
			}
		}
        foreach ($member->fflainlains as $fflainlain) {
			$data = array(
				'member_id'     => $member->id,
				'ordering'      => $fflainlain->ordering,
				'kategori'      => $fflainlain->kategori,
				'bahan_makanan' => $fflainlain->bahan_makanan,
                'frekwensi'     => $fflainlain->frekwensi,
                'keterangan'    => $fflainlain->keterangan
			);
			switch ($fflainlain->status_edit) {
			case MODE_ADD:
				$this->db->insert('food_frequency', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $fflainlain->id);
				$this->db->update('food_frequency', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $fflainlain->id);
				$this->db->delete('food_frequency');
				break;
			}
		}
		foreach ($member->pendidikan_formals as $pFormal) {
			$data = array(
				'member_id'     => $member->id,
				'ordering'      => $pFormal->ordering,
				'jenis'      	=> $pFormal->jenis,
				'nama'			=> $pFormal->nama,
                'tahun_dari'    => $pFormal->tahun_dari,
                'tahun_sampai'	=> $pFormal->tahun_sampai,
				'lokasi'		=> $pFormal->lokasi,
				'jenjang'		=> $pFormal->jenjang,
				'deskripsi'		=> $pFormal->deskripsi
			);
			switch ($pFormal->status_edit) {
			case MODE_ADD:
				$this->db->insert('pendidikan', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $pFormal->id);
				$this->db->update('pendidikan', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $pFormal->id);
				$this->db->delete('pendidikan');
				break;
			}
		}
		foreach ($member->pendidikan_non_formals as $pNonFormal) {
			$data = array(
				'member_id'     => $member->id,
				'ordering'      => $pNonFormal->ordering,
				'jenis'      	=> $pNonFormal->jenis,
				'nama'			=> $pNonFormal->nama,
                'tahun_dari'    => $pNonFormal->tahun_dari,
                'tahun_sampai'	=> $pNonFormal->tahun_sampai,
				'lokasi'		=> $pNonFormal->lokasi,
				'jenjang'		=> '',
				'deskripsi'		=> $pNonFormal->deskripsi
			);
			switch ($pNonFormal->status_edit) {
			case MODE_ADD:
				$this->db->insert('pendidikan', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $pNonFormal->id);
				$this->db->update('pendidikan', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $pNonFormal->id);
				$this->db->delete('pendidikan');
				break;
			}
		}
		foreach ($member->pendidikan_pelatihans as $pPelatihan) {
			$data = array(
				'member_id'     => $member->id,
				'ordering'      => $pPelatihan->ordering,
				'jenis'      	=> $pPelatihan->jenis,
				'nama'			=> $pPelatihan->nama,
                'tahun_dari'    => $pPelatihan->tahun_dari,
                'tahun_sampai'	=> $pPelatihan->tahun_sampai,
				'lokasi'		=> $pPelatihan->lokasi,
				'jenjang'		=> '',
				'deskripsi'		=> $pPelatihan->deskripsi
			);
			switch ($pPelatihan->status_edit) {
			case MODE_ADD:
				$this->db->insert('pendidikan', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $pPelatihan->id);
				$this->db->update('pendidikan', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $pPelatihan->id);
				$this->db->delete('pendidikan');
				break;
			}
		}
		foreach ($member->bahasas as $bahasa) {
			$data = array(
				'member_id'     => $member->id,
                'ordering'      => $bahasa->ordering,
				'nama'			=> $bahasa->nama,
				'membaca'     	=> $bahasa->membaca,
				'menulis'     	=> $bahasa->menulis,
				'berbicara'     => $bahasa->berbicara,
			);
			switch ($bahasa->status_edit) {
			case MODE_ADD:
				$this->db->insert('bahasa', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $bahasa->id);
				$this->db->update('bahasa', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $bahasa->id);
				$this->db->delete('bahasa');
				break;
			}
		}
		foreach ($member->organisasis as $organisasi) {
			$data = array(
				'member_id'     => $member->id,
                'ordering'      => $organisasi->ordering,
				'nama'      	=> $organisasi->nama,
				'tahun_dari'    => $organisasi->tahun_dari,
				'tahun_sampai'	=> $organisasi->tahun_sampai,
				'jenis'     	=> $organisasi->jenis,
                'jabatan'       => $organisasi->jabatan
			);
			switch ($organisasi->status_edit) {
			case MODE_ADD:
				$this->db->insert('organisasi', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $organisasi->id);
				$this->db->update('organisasi', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $organisasi->id);
				$this->db->delete('organisasi');
				break;
			}
		}
		foreach ($member->pengalaman_kerjas as $pk) {
			$data = array(
				'member_id'     => $member->id,
                'ordering'      => $pk->ordering,
				'nama'      	=> $pk->nama,
				'tahun_dari'    => $pk->tahun_dari,
				'tahun_sampai'	=> $pk->tahun_sampai,
				'lokasi'     	=> $pk->lokasi,
				'jabatan'     	=> $pk->jabatan,
				'prestasi'     	=> $pk->prestasi
			);
			switch ($pk->status_edit) {
			case MODE_ADD:
				$this->db->insert('pengalaman_kerja', $data);
				break;
			case MODE_EDIT:
				$this->db->where('id', $pk->id);
				$this->db->update('pengalaman_kerja', $data);
				break;
			case MODE_DELETE:
				$this->db->where('id', $pk->id);
				$this->db->delete('pengalaman_kerja');
				break;
			}
		}
	}
    
    public function delete($id)
    {
		$this->db->trans_start();
		
        $this->db->where('id', $id);
        $this->db->delete($this->table_def); 
		
		$this->db->where('member_id', $id);
		$this->db->delete('telepon');
        
        $this->db->where('member_id', $id);
		$this->db->delete('relationship');
		
        $this->db->where('member_id', $id);
		$this->db->delete('olah_raga');
        
        $this->db->where('member_id', $id);
		$this->db->delete('riwayat_penyakit');
        
        $this->db->where('member_id', $id);
		$this->db->delete('food_frequency');
		
		$this->db->where('member_id', $id);
		$this->db->delete('pendidikan');
		
		$this->db->where('member_id', $id);
		$this->db->delete('bahasa');
        
		$this->db->where('member_id', $id);
		$this->db->delete('organisasi');
		
		$this->db->where('member_id', $id);
		$this->db->delete('pengalaman_kerja');
        
		$this->db->trans_complete();
		if ($this->db->trans_status() === TRUE) {
			return TRUE;
		}
		else {
			return FALSE;
		}
    }
	
	public function getAgama($semua, $none) {
		$aAgama = array();
		if ($semua) {
			$aAgama["Semua"] = "Semua";
		}
		if ($none) {
			$aAgama["none"] = "&nbsp;";
		}
		$aAgama["Islam"]				= "Islam";
		$aAgama["Kristen Protestan"]	= "Kristen Protestan";
		$aAgama["Hindu"]				= "Hindu";
		$aAgama["Buddha"]				= "Buddha";
		$aAgama["Kristen Katolik"]		= "Kristen Katolik";
		$aAgama["Khonghucu"]			= "Khonghucu";
		return $aAgama;
	}
	
	public function getGolonganDarah($semua, $none) {
		$aGolonganDarah = array();
		if ($semua) {
			$aGolonganDarah["Semua"] = "Semua";
		}
		if ($none) {
			$aGolonganDarah["none"] = "&nbsp;";
		}
		$aGolonganDarah["O"]	= "O";
		$aGolonganDarah["A"]	= "A";
		$aGolonganDarah["B"]	= "B";
		$aGolonganDarah["AB"]	= "AB";
		return $aGolonganDarah;
	}
    
    public function getJenisKelamin($semua, $none) {
		$aJenisKelamin = array();
		if ($semua) {
			$aJenisKelamin["Semua"] = "Semua";
		}
		if ($none) {
			$aJenisKelamin["none"] = "&nbsp;";
		}
		$aJenisKelamin["Laki-laki"]	= "Laki-laki";
		$aJenisKelamin["Perempuan"]	= "Perempuan";
		return $aJenisKelamin;
	}
    
    public function getStatusMenikah($semua, $none) {
		$aStatusMenikah = array();
		if ($semua) {
			$aStatusMenikah["Semua"] = "Semua";
		}
		if ($none) {
			$aStatusMenikah["none"] = "&nbsp;";
		}
		$aStatusMenikah["Menikah"]          = "Menikah";
		$aStatusMenikah["Belum Menikah"]    = "Belum Menikah";
        $aStatusMenikah["Bercerai"]         = "Bercerai";
		return $aStatusMenikah;
	}
    
    public function getStatusOrangTua($semua, $none) {
		$aStatus = array();
		if ($semua) {
			$aStatus["Semua"] = "Semua";
		}
		if ($none) {
			$aStatus["none"] = "";
		}
		$aStatus["Ayah Kandung"] = "Ayah Kandung";
		$aStatus["Ayah Tiri"] = "Ayah Tiri";
		$aStatus["Ayah Angkat"] = "Ayah Angkat";
		$aStatus["Ibu Kandung"] = "Ibu Kandung";
		$aStatus["Ibu Tiri"] = "Ibu Tiri";
		$aStatus["Ibu Angkat"] = "Ibu Angkat";
		return $aStatus;
	}
    
    public function getStatusSaudara($semua, $none) {
		$aStatus = array();
		if ($semua) {
			$aStatus["Semua"] = "Semua";
		}
		if ($none) {
			$aStatus["none"] = "";
		}
		$aStatus["Kakak Kandung"] = "Kakak Kandung";
		$aStatus["Kakak Tiri"] = "Kakak Tiri";
		$aStatus["Kakak Angkat"] = "Kakak Angkat";
		$aStatus["Adik Kandung"] = "Adik Kandung";
		$aStatus["Adik Tiri"] = "Adik Tiri";
		$aStatus["Adik Angkat"] = "Adik Angkat";
		return $aStatus;
	}
	
	public function getStatusAnak($semua, $none) {
		$aStatus = array();
		if ($semua) {
			$aStatus["Semua"] = "Semua";
		}
		if ($none) {
			$aStatus["none"] = "";
		}
		$aStatus["Anak Kandung"] = "Anak Kandung";
		$aStatus["Anak Tiri"] = "Anak Tiri";
		$aStatus["Anak Angkat"] = "Anak Angkat";
		return $aStatus;
	}
    
    public function getTahun() {
		$aTahun = array();
		for ($i = 2017; $i >= 1910; $i--) {
			$aTahun[$i] = $i;
		}
		return $aTahun;
	}
    
    public function getJenjangPendidikanProgramStudi($semua, $none)	{
		$aJenjang = array();
		if ($semua) {
			$aJenjang["Semua"] = "Semua";
		}
		if ($none) {
			$aJenjang["none"] = "";
		}
		$aJenjang["TK/Play Group"] = "TK/Play Group";
		$aJenjang["SDLB"] = "SDLB";
		$aJenjang["SD/MI"] = "SD/MI";
		$aJenjang["SMP/MTs"] = "SMP/MTs";
		$aJenjang["SMU/MA"] = "SMU/MA";
		$aJenjang["SMK/MAK"] = "SMK/MAK";
		$aJenjang["Program diploma (D-I)"] = "Program diploma (D-I)";
		$aJenjang["Program diploma (D-II)"] = "Program diploma (D-II)";
		$aJenjang["Program diploma (D-III)"] = "Program diploma (D-III)";
		$aJenjang["Program diploma (D-IV)"] = "Program diploma (D-IV)";
		$aJenjang["Program sarjana (S1)"] = "Program sarjana (S1)";
		$aJenjang["Program magister (S2)"] = "Program magister (S2)";
		$aJenjang["Program doktor (S3)"] = "Program doktor (S3)";
		return $aJenjang;
	}
    
    public function getTingkatPenguasaanBahasa($semua, $none)	{
		$aPenguasaan = array();
		if ($semua) {
			$aPenguasaan["Semua"] = "Semua";
		}
		if ($none) {
			$aPenguasaan["none"] = "";
		}
		$aPenguasaan["Aktif"] = "Aktif";
		$aPenguasaan["Pasif"] = "Pasif";
		return $aPenguasaan;
	}
    
    public function getJenisOrganisasi($semua, $none)	{
		$aJenisOrganisasi = array();
		if ($semua) {
			$aJenisOrganisasi["Semua"] = "Semua";
		}
		if ($none) {
			$aJenisOrganisasi["none"] = "";
		}
		$aJenisOrganisasi["Sekolah/Kampus"] = "Sekolah/Kampus";
		$aJenisOrganisasi["Ormas"] = "Ormas";
        $aJenisOrganisasi["Politik"] = "Politik";
		return $aJenisOrganisasi;
	}
    
    public function getKelahiran() {
		$aKelahiran = array();
		$aKelahiran["Normal"] = "Normal";
		$aKelahiran["Sectio Caesar"] = "Sectio Caesar";
		return $aKelahiran;
	}
    
    public function getPersalinan() {
		$aPersalinan = array();
		$aPersalinan["Dokter"] = "Dokter";
		$aPersalinan["Bidan"] = "Bidan";
		return $aPersalinan;
	}
    
    public function getYaTidak() {
		$aYaTidak = array();
		$aYaTidak["Ya"] = "Ya";
		$aYaTidak["Tidak"] = "Tidak";
		return $aYaTidak;
	}
    
    public function getJenisPerawatan() {
		$aPerawatan = array();
		$aPerawatan["Berobat Jalan"] = "Berobat Jalan";
		$aPerawatan["Dirawat"] = "Dirawat";
		return $aPerawatan;
	}
    
    public function getFrekwensiKonsumsi() {
		$aFrekwensi = array();
		$aFrekwensi[">1x/hr"] = ">1x/hr";
		$aFrekwensi["1x/hr"] = "1x/hr";
        $aFrekwensi["1-3x/mg"] = "1-3x/mg";
        $aFrekwensi["4-6x/mg"] = "4-6x/mg";
        $aFrekwensi["1x/bln"] = "1x/bln";
        $aFrekwensi["1x/thn"] = "1x/thn";
		return $aFrekwensi;
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