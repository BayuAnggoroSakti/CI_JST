<?php

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$data['menu'] = $this->m_admin->detail_profil();
		$this->load->view('template_frontend/header',$data);
		if ($this->session->userdata('level')=="" ) {
			redirect('home/login');
		}
		elseif ($this->session->userdata('level')!="member") {
			redirect('home/login');
		}
		$this->load->helper('text');
	}
	public function index() {
		$data['title'] = "Halaman Member";
		$this->load->view('frontend/member',$data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		//session_destroy();
		redirect('home/login');
	}

}
?>