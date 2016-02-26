<?php if (! defined('BASEPATH')) EXIT ('No direct script access allowed');

class M_captcha extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function make_captcha(){
		$this->load->helper('captcha');
		$vals = array(
		'img_path'=>'./assets/images/captcha/',
		'img_url'=> base_url().'/assets/images/captcha/',
		'img_width' => 200,
		'img_height' => 60,
		'font_path' => '../system/fonts/textb.ttf',
		'expiration => 3600',
		);
		
		$cap = create_captcha($vals);
		if($cap){
			$data = array(
				'captcha_id'=>'',
				'captcha_time'=>$cap['time'],
				'ip_address'=> $this->input->ip_address(),
				'word' => $cap['word'],
				);
			$query = $this->db->insert_string('captcha', $data);
			$this->db->query($query);
			
		}else{
			return "Captcha not work";
		}
		return $cap['image'];
	}
	
	function check_captcha(){
		//Delete old data(2 hours)
		$expiration = time()-3600;
		$sql = "DELETE FROM captcha WHERE captcha_time < ?";
		$binds = array($expiration);
		$query = $this->db->query($sql, $binds);
		

		//Checking input
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word =? AND ip_address =? AND captcha_time > ?";
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query =$this->db->query($sql, $binds);
		$row = $query->row();

		if ($row->count>0){
			return true;
		}
		return false;
	}
}

/*End of file captcha_m.php*/
/*Location : ./application/models/captcha_m.php*/