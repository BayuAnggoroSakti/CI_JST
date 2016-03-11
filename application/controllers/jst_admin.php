<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jst_admin extends CI_Controller {

	public function index() {
		if ($this->session->userdata('level')=="admin") {
			redirect('admin/dashboard');
		}

		$this->load->library('form_validation');
		$this->load->helper('security');
		$data['captcha_return'] ='';
		$this->load->model('m_captcha');
		$data['cap_img'] = $this->m_captcha->make_captcha();
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
			$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
			$this->form_validation->set_rules('captcha', 'Captcha', 'required');
			$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/login',$data);
			}
			else
			{	
				if($this->m_captcha->check_captcha()==TRUE) {
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
						$back = site_url('jst_admin');
						echo '<script type="text/javascript">'; 
						echo 'alert("Gagal login, Silahkan cek kembali username dan password anda");'; 
						echo 'window.location.href = "'.$back.'";';
						echo '</script>';
					}
						}
				else
				{
					$data['captcha_return'] = '<div class="alert alert-danger alert-dismissable">
				                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				                    <h4><i class="icon fa fa-info"></i> Peringatan!</h4>
				                    Captcha tidak sesuai, Silahkan coba lagi !
				                 </div>';
					$data['body'] = $this->load->view('admin/login', $data);
				}
				
			}
		}
		else
		{
			$this->load->view('admin/login', $data);
		}	
		
	}

}

?>
