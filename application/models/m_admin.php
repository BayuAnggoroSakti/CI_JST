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
        $this->db->delete('berita');
    }

	function edit($id) {
        $this->db->where('id_berita', $id);
        $query = $this->db->get('berita');
        return $query;
    }
    function detail_berita($id) {
        $this->db->where('id_berita', $id);
        $query = $this->db->get('berita');
        return $query;
    }

	function get_insert($data) {
			$this->db->insert('berita', $data);
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

	}

?>
