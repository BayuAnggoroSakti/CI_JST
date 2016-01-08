<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_user extends CI_Model {

		public function cek_user($data) 
		{
			$query = $this->db->get_where('user', $data);
			return $query;
		}

		 function view() 
		 {
		  $ambil = $this->db->get('user');
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
