<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jst_member extends CI_Controller {

	public function index()
	{
		
		if ($this->session->userdata('level')!="" && $this->session->userdata('level')=="member" ) {
			redirect('member/home');
		}
		elseif ($this->session->userdata('level')!="member") {
			$this->load->view('frontend/login');
		}
	}

	public function proses_login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$this->load->library('form_validation');
		$this->load->helper('security');

		$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
		$this->form_validation->set_rules('password','Password','required|trim|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan1','Username / Password Masih Kosong');
			redirect(site_url('home/login'));
		}
		else
		{
			$this->load->model('m_member');
			$cekdata = $this->m_member->ceklogin($username,$password);

			if ($cekdata) 
			{
				foreach ($cekdata as $datalogin) {
					$id_user = $datalogin['id_user'];
					$username = $datalogin['username'];
					$password = $datalogin['password'];
					$level = $datalogin['level'];
					$nama_lengkap = $datalogin['nama_lengkap'];
					$alamat = $datalogin['alamat'];
					$email = $datalogin['email'];
					$asal_sekolah = $datalogin['asal_sekolah'];
				}
				$dlogin = array(
					'id_user' => $id_user,
					'username' => $username,
					'password' => $password,
					'alamat' => $alamat,
					'email' => $email,
					'asal_sekolah' => $asal_sekolah,
					'level' => $level,
					'nama_lengkap' => $nama_lengkap
					);
				$this->session->set_userdata($dlogin);
				if ($this->session->userdata('level')=='admin') 
				{
					redirect(site_url('home/login'));
				}
				elseif ($this->session->userdata('level')=='member')
				{
					redirect(site_url('member/home'));
				}
				
			}
			else
			{
				$this->session->set_flashdata('pesan2','Username atau Password anda salah!');
				redirect(site_url('home/login'));
			}
		}
	}
}