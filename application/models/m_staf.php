<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_staf extends CI_Model {
		function __constuct() {
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}

	 function list_staf() 
	{
		  $ambil = $this->db->query('SELECT * from staf_pengajar');
		  if ($ambil->num_rows() > 0) {
		  foreach ($ambil->result() as $data) 
		  {
		   	$hasil[] = $data;
		   }
		  	return $hasil;
		  }
	}
	
	function proses_edit_staf($id) {
        $this->db->where('id_staf', $id);
        $query = $this->db->get('staf_pengajar');
        return $query;
    }
	
    function edit_staf($id) {
        $ambil = $this->db->query("SELECT * from staf_pengajar where id_staf = '$id'");
        return $ambil;
    }
    

	function tambah_staf($data) {
		$this->db->insert('staf_pengajar', $data);
	}

	function hapus_staf($id) {
		$this->db->where('id_staf', $id);
        $this->db->delete('staf_pengajar');
	}

	}
?>
