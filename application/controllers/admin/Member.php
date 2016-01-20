<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('jst_admin');
		}
		$this->load->helper('text');
	}
	public function index()
	{
		$data['data_get'] = $this->m_user->view();
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$this->load->view('admin/member',$data);
	}
}
