<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_gallery extends CI_Model {
		function __constuct() {
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}


  function list_gallery()
    {
        $ambil = $this->db->query('SELECT g.judul as judul, g.deskripsi as deskripsi, p.nama_pelatihan as nama, g.tanggal as tanggal from gallery g, pelatihan p where g.id_pelatihan = p.id_pelatihan order by g.tanggal desc');
          if ($ambil->num_rows() > 0) {
          foreach ($ambil->result() as $data) 
          {
            $hasil[] = $data;
           }
            return $hasil;
          }
  }

	}

?>
