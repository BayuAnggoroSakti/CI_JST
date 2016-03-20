<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_gallery extends CI_Model {
		function __constuct() {
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
   
 
	}


  function list_gallery()
    {
        $ambil = $this->db->query('SELECT f.id_gallery as id_gallery, f.alamat_foto as foto, g.judul as judul_gallery, g.deskripsi as deskripsi, p.nama_pelatihan as nama, g.tanggal as tanggal from gallery g, pelatihan p, foto f where g.id_pelatihan = p.id_pelatihan and f.id_gallery = g.id_gallery group by f.id_gallery order by g.tanggal desc');
          if ($ambil->num_rows() > 0) {
          foreach ($ambil->result() as $data) 
          {
            $hasil[] = $data;
           }
            return $hasil;
          }
  }
 function hapus_foto($id)
    {
      
      $this->db->where('id_gallery', $id);
      $this->db->delete('foto');
    }
     function hapus_gallery($id)
    {
      
      $this->db->where('id_gallery', $id);
      $this->db->delete('gallery');
    }
  function list_foto($id)
  {
     $ambil = $this->db->query("SELECT * from foto where id_gallery = '$id'");
          if ($ambil->num_rows() > 0) {
          foreach ($ambil->result() as $data) 
          {
            $hasil[] = $data;
           }
            return $hasil;
          }
  }

  function pelatihan() {
    $Kat = $this->db->from('pelatihan')
            ->get();
    return $Kat->result_array();
  }

   public function get_foto_by_id($id)
    {
        $this->db->from('foto');
        $this->db->where('id_foto',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function get_gallery_by_id($id)
    {
       /* $this->db->from('gallery');
        $this->db->where('id_gallery',$id);*/
        $query =$this->db->query("SELECT g.id_gallery as id_gallery, g.judul as judul, p.nama_pelatihan as nama_pelatihan, p.id_pelatihan as id_pelatihan, g.deskripsi as deskripsi, g.tanggal as tanggal from gallery g, pelatihan p where g.id_pelatihan = p.id_pelatihan and id_gallery = '$id'");
       // $query = $this->db->get();
 
        return $query->row();
    }

    public function update_foto($where, $data)
    {
        $this->db->update('foto', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_gallery($where, $data)
    {
        $this->db->update('gallery', $data, $where);
        return $this->db->affected_rows();
    }


    public function delete_foto_by_id($id)
    {
        $this->db->where('id_foto', $id);
        $this->db->delete('foto');
    }

   function detail_gallery($id) {
        //$this->db->where('id_gallery', $id);
        $query = $this->db->query("SELECT g.id_gallery as id_gallery, g.judul as judul, p.nama_pelatihan as nama_pelatihan, g.deskripsi as deskripsi, g.tanggal as tanggal from gallery g, pelatihan p where g.id_pelatihan = p.id_pelatihan and id_gallery = '$id'");
        return $query;
    }


	}

?>
