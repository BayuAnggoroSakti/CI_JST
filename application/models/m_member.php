<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_member extends CI_Model {

		public function ceklogin($username,$password) 
		{
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$this->db->where('level', 'member');
			$this->db->where('status', '1');
			$query= $this->db->get('user');

			if ($query->num_rows() > 0) {
				return $query->result_array();
			}
		}
	}

?>
