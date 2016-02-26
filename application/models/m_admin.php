<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_admin extends CI_Model {
		function __constuct() {
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}

	 function list_berita() 
	{
		  $ambil = $this->db->query('SELECT id_berita,judul_berita, isi_berita, tanggal_berita, status_terbit, kb.nama_katber as kategori, gambar, u.nama_lengkap as nama_lengkap FROM user u, berita b, kategori_berita kb where b.id_kateBer = kb.id_katBer and b.id_user = u.id_user order by tanggal_berita desc ');
		  if ($ambil->num_rows() > 0) {
		  foreach ($ambil->result() as $data) 
		  {
		   	$hasil[] = $data;
		   }
		  	return $hasil;
		  }
	}
	public function my_profile($id)
	{
		$this->db->from('user');
        $this->db->where('id_user',$id);
        $query = $this->db->get();
        return $query;
	}
	 public function detail_staf($id)
    {
        $this->db->from('staf_pengajar');
        $this->db->where('id_staf',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

     public function update_profil($where, $data)
    {
        $this->db->update('user', $data, $where);
        return $this->db->affected_rows();
    }

     public function get_user_by_id($id)
    {
        $this->db->from('user');
        $this->db->where('id_user',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

	 function recent_berita() 
	{
		  $ambil = $this->db->query('SELECT id_berita,judul_berita, isi_berita, tanggal_berita, status_terbit, kb.nama_katber as kategori, gambar, u.nama_lengkap as nama_lengkap FROM user u, berita b, kategori_berita kb where b.id_kateBer = kb.id_katBer and b.id_user = u.id_user order by tanggal_berita desc limit 4');
		  if ($ambil->num_rows() > 0) {
		  foreach ($ambil->result() as $data) 
		  {
		   	$hasil[] = $data;
		   }
		  	return $hasil;
		  }
	}
  function program_kerja()
    {
        $ambil = $this->db->query('SELECT * from program_kerja');
          if ($ambil->num_rows() > 0) {
          foreach ($ambil->result() as $data) 
          {
            $hasil[] = $data;
           }
            return $hasil;
          }
    }
	function cek_id_profil($id_profil)
	{
		 $ambil = $this->db->query("SELECT * from detail_profil_perusahaan dpp, profil_perusahaan pp where dpp.id_profil = pp.id_profil and dpp.id_profil = '$id_profil'");
		  if ($ambil->num_rows() > 0) {
		  foreach ($ambil->result() as $data) 
		  {
		   	$hasil[] = $data;
		   }
		  	return $hasil;
		  }
		
	}
	function check_pass($table_name, $password_lama, $id){
		$this->db->where('password',md5($password_lama));
		$this->db->where('id_user',$id);
		$query = $this->db->get($table_name);
		if($query->num_rows() > 0 ){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	 function detail_profilByName($nama) 
	{
		 $query = $this->db->query("SELECT * from profil_perusahaan where nama_profil = '$nama'");
        return $query;
	}
	 function detail_programByID($id) 
	{
		 $query = $this->db->query("SELECT distinct p.fasilitas as fasilitas, p.waktu_mulai as waktu_mulai, p.waktu_selesai as waktu_selesai,p.nama_pelatihan as nama, p.biaya as biaya, p.lokasi as lokasi, p.fasilitas as fasilitas, p.keterangan as keterangan, f.alamat_foto as url, pk.nama_programKerja as nama_program from gallery g, pelatihan p, program_kerja pk, foto f where g.id_pelatihan = p.id_pelatihan and pk.id_programKerja = p.id_programKerja and g.id_gallery = f.id_gallery and p.id_pelatihan = '$id' group by p.nama_pelatihan");
        return $query;
	}

	 function detail_galleryByID($id) 
	{
		 $query = $this->db->query("SELECT distinct p.waktu_mulai as waktu_mulai, p.waktu_selesai as waktu_selesai,p.nama_pelatihan as nama, p.biaya as biaya, p.lokasi as lokasi, p.fasilitas as fasilitas, p.keterangan as keterangan, f.alamat_foto as url, pk.nama_programKerja as nama_program from gallery g, pelatihan p, program_kerja pk, foto f where g.id_pelatihan = p.id_pelatihan and pk.id_programKerja = p.id_programKerja and g.id_gallery = f.id_gallery and p.id_pelatihan = '$id' group by p.nama_pelatihan");
        return $query;
	}

	 function detail_profil() 
	{
		  $ambil = $this->db->query("SELECT * from profil_perusahaan");
		  if ($ambil->num_rows() > 0) {
		  foreach ($ambil->result() as $data) 
		  {
		   	$hasil[] = $data;
		   }
		  	return $hasil;
		  }
	}

 	function materi() 
	{
		  $ambil = $this->db->query("SELECT * from materi");
		  if ($ambil->num_rows() > 0) {
		  foreach ($ambil->result() as $data) 
		  {
		   	$hasil[] = $data;
		   }
		  	return $hasil;
		  }
	}

   function tambah_profil()
    {
    	$insert_kat = array(
    		'nama_profil' => $this->input->post('nama_profil'), 
    		'deskripsi' => $this->input->post('deskripsi')
    		);
    	$insert = $this->db->insert('profil_perusahaan',$insert_kat);
    	return $insert;
    }

  function tambah_isi_profil()
    {
    	$tgl = date('Y-m-d H:i:s');
    	$insert_kat = array(
    		'id_profil' => $this->input->post('id_profil'), 
    		'deskripsi' => $this->input->post('deskripsi'),
    		'tanggal' => $tgl
    		);
    	$insert = $this->db->insert('detail_profil_perusahaan',$insert_kat);
    	return $insert;
    }

	function kategori_profil() 
	{
		$Kat = $this->db->from('profil_perusahaan')
						->get();
		return $Kat->result_array();
	}

	 function list_slider() 
	{
		  $ambil = $this->db->query('SELECT * from slider');
		  if ($ambil->num_rows() > 0) {
		  foreach ($ambil->result() as $data) 
		  {
		   	$hasil[] = $data;
		   }
		  	return $hasil;
		  }
	}

	 function list_komentar($id_berita) 
	{
		  $ambil = $this->db->query("SELECT * from komentar where id_berita = '$id_berita' order by tanggal desc ");
		  if ($ambil->num_rows() > 0) {
		  foreach ($ambil->result() as $data) 
		  {
		   	$hasil[] = $data;
		   }
		  	return $hasil;
		  }
	}
	function populer_komentar()
	{
		$ambil = $this->db->query("SELECT gambar,judul_berita, b.id_berita as id_berita, count(id_komentar) as jum from komentar k, berita b where k.id_berita = b.id_berita group by k.id_berita order by jum desc limit 4 ");
		if ($ambil->num_rows() > 0) {
			foreach ($ambil->result() as $data) {
					$hasil[] = $data;
				}	
				return $hasil;
		}
	}
	function count_komentar($id_berita)
	{
		$ambil = $this->db->query("SELECT count(id_komentar) as jum from komentar where id_berita=$id_berita");
		 if ($ambil->num_rows() > 0) {
		  foreach ($ambil->result() as $data) 
		  {
		   	$hasil[] = $data;
		   }
		  	return $hasil;
		  }
	}
	 function list_katberita() 
	{
		  $ambil = $this->db->query('SELECT id_katBer, nama_katBer FROM kategori_berita');
		  if ($ambil->num_rows() > 0) {
		  foreach ($ambil->result() as $data) 
		  {
		   	$hasil[] = $data;
		   }
		  	return $hasil;
		  }
		
	}

	//Pagination Berita
	function lihat_berita($num,$offset){
		if ($offset == 0) {
			$offset = NULL;
		}
		else
		{
			$offset = ','.$offset;
		}
	//return $query = $this->db->query('SELECT id_beritaA,judul_berita, isi_berita, tanggal_berita, status_terbit, kb.nama_katber as kategori, gambar, u.nama_lengkap as nama_lengkap FROM user u, berita b, kategori_berita kb where b.id_kateBer = kb.id_katBer and b.id_user = u.id_user order by tanggal_berita desc LIMIT $',$num,$offset)->result();
	 $query = $this->db->query("SELECT id_berita,judul_berita, isi_berita, tanggal_berita, status_terbit, kb.nama_katber as kategori, gambar, u.nama_lengkap as nama_lengkap FROM user u, berita b, kategori_berita kb where b.id_kateBer = kb.id_katBer and b.id_user = u.id_user and status_terbit like '%y%' order by tanggal_berita desc LIMIT $num $offset");
 	 //$query = $this->db->get('berita b, user u, kategori_berita kb where',$num, $offset);
 	 return $query->result();
	}
 
 	function lihat_materi($num,$offset){
 		$query = $this->db->get('materi',$num,$offset);
	 return $query->result();
	}
 
	function jumlah_berita(){
		return $this->db->get('berita')->num_rows();
	}

	function staf() 
	{
		  $ambil = $this->db->query('SELECT * FROM staf_pengajar');
		  if ($ambil->num_rows() > 0) {
		  foreach ($ambil->result() as $data) 
		  {
		   	$hasil[] = $data;
		   }
		  	return $hasil;
		  }
		
	}

	 function prosesedit_berita() {
        $update_berita = array(
            'judul_berita' => $this->input->post('judul_berita'),
            'gambar' => $this->input->post('gambar'),
            'isi_berita' => $this->input->post('isi_berita'),
            'id_kateBer' => $this->input->post('id_kateBer'),
            'status_terbit' => $this->input->post('status_terbit'),
        );
        $id = $this->input->post('id_berita');
        $this->db->where('id_berita', $id);
        $this->db->update('berita', $update_berita);
    }

    function tambah_kategori_berita()
    {
    	$insert_kat = array(
    		'nama_katBer' => $this->input->post('nama_katBer'), 
    		);
    	$insert = $this->db->insert('kategori_berita',$insert_kat);
    	return $insert;
    }

    function hapus_berita($id)
    {
    	
    	$this->db->where('id_berita', $id);
        $this->db->update('berita');
    }

     function hapus_slider($id)
    {
    	
    	$this->db->where('id_slider', $id);
        $this->db->delete('slider');
    }
    
      function hapus_profil($id)
    {
    	
    	$this->db->where('id_profil', $id);
        $this->db->delete('profil_perusahaan');
    }

         function hapus_materi($id)
    {
    	
    	$this->db->where('id_materi', $id);
        $this->db->delete('materi');
    }
    function hapus_katBer($id)
    {
    	
    	$this->db->where('id_katBer', $id);
        $this->db->delete('kategori_berita');
    }
    
	function edit_katBer($id) {
        $this->db->where('id_katBer', $id);
        $query = $this->db->get('kategori_berita');
        return $query;
    }
	function edit($id) {
        $this->db->where('id_berita', $id);
        $query = $this->db->get('berita');
        return $query;
    }
    function proses_edit_materi($id) {
        $this->db->where('id_materi', $id);
        $query = $this->db->get('materi');
        return $query;
    }
    function edit_profil($id) {
      /*  $this->db->where('id_profil', $id);
        $query = $this->db->get('detail_profil_perusahaan');
        */
        $ambil = $this->db->query("SELECT * from profil_perusahaan where id_profil = '$id'");
        return $ambil;
    }
     function list_slider1($id) {
      /*  $this->db->where('id_profil', $id);
        $query = $this->db->get('detail_profil_perusahaan');
        */
        $ambil = $this->db->query("SELECT * from slider where id_slider = '$id'");
        return $ambil;
    }

    function edit_materi($id) {
      /*  $this->db->where('id_profil', $id);
        $query = $this->db->get('detail_profil_perusahaan');
        */
        $ambil = $this->db->query("SELECT * from materi where id_materi = '$id'");
        return $ambil;
    }
    
    function detail_berita($id) {
        $this->db->where('id_berita', $id);
        $query = $this->db->get('berita');
        return $query;
    }

	function get_insert($data) {
			$this->db->insert('berita', $data);
	}

	function get_insert_materi($data) {
			$this->db->insert('materi', $data);
	}
	

	function tambah_komentar($data) {
			$this->db->insert('komentar', $data);
	}
	function get_insert_slider($data) {
			$this->db->insert('slider', $data);
	}

	function get_edit($id_post) {
	                    $data = array(
	                            'judul_berita' => $judul,
	                            'isi_berita' => $isi,
	                            'tanggal_berita' => $tgl,
	                            'gambar' => $this->upload->file_name,
	                            'id_user' => $user,
	                            'status_terbit' => $status_terbit,
	                            'id_katBer' => $id_k,
	                    );
			$this->db->where('id_berita',$id_post);
			$this->db->update('berita', $data);
		}

	function Kategori() {
		$Kat = $this->db->from('kategori_berita')
						->get();
		return $Kat->result_array();
	}

	function Pelatihan() {
		$Kat = $this->db->from('pelatihan')
						->get();
		return $Kat->result_array();
	}

	}

?>
