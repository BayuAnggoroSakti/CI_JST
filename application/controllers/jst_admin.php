<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jst_admin extends CI_Controller {

	public function index() {	
		if ($this->session->userdata('level')=="admin") {
			redirect('admin/dashboard');
		}
		else
		{
			$this->load->view('admin/login');
		}
	}

	public function cek_login() {
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login');
		}
		else
		{	
			$data = array('username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE))
			);
		
		$hasil = $this->m_user->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['uid'] = $sess->id_user;
				$sess_data['username'] = $sess->username;
				$sess_data['nama_lengkap'] = $sess->nama_lengkap;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='admin') {
				redirect('admin/dashboard');
			}
			elseif ($this->session->userdata('level')=='member') {
				redirect('member/c_member');
			}		
		}
		else {
			echo '<script type="text/javascript">'; 
			echo 'alert("Gagal login, Silahkan cek kembali username dan password anda");'; 
			echo 'window.location.href = "cek_login";';
			echo '</script>';
		}
			
		}
		
	}

}

?>
