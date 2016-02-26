<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');

class M_register extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function check_query($table_name, $username){
		$this->db->where('username',$username);
		$query = $this->db->get($table_name);
		if($query->num_rows() > 0 ){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function insert($table_name,$data){
		$query = $this->db->insert($table_name,$data);
		return $query;
	}
}

/*End of file register_m.php*/
/*Location : ./application/models/register_m.php*/