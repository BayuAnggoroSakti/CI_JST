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

	    public function detail_profil($id)
	    {
	    	$this->db->from('user');
	        $this->db->where('id_user',$id);
	        $query = $this->db->get();
	 
	        return $query->row();
	    }
	}

?>
