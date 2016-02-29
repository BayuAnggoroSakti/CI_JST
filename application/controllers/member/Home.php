<?php

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_soal');
		$this->load->model('m_tryout');
		$data['menu'] = $this->m_admin->detail_profil();
		$this->load->view('template_frontend/header',$data);
		 if ($this->session->userdata('level')=="member") 
         {
            
         }
         else
         {
            redirect('home/login');
         }
		$this->load->helper('text');
	}
	public function index() {
		$data['title'] = "Halaman Member";
		$data['katTO'] = $this->m_soal->list_katTO();
		$data['history_to'] = $this->m_tryout->history_to($this->session->userdata('id_user'));
		$this->load->view('frontend/member',$data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('nama_lengkap');
		redirect('home/login');
	}

}
?>