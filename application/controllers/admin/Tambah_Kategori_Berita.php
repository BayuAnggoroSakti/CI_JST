<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_Kategori_Berita extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('jst_admin');
		}
		$this->load->helper('text');
	}
	public function index()
	{
		$data['data_get'] = $this->m_admin->list_katberita();
		$data['username'] = $this->session->userdata('username');
		//$this->status_terbit($value);
		$this->load->view('admin/tambah_kategori_berita',$data);
	}
	public function tambah_kategori_berita()
	{
		$data['username'] = $this->session->userdata('username');
        $this->m_admin->tambah_kategori_berita();
        redirect('admin/tambah_kategori_berita');
	}

}
