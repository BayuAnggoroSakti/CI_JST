<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coming_soon extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('coming_soon');
	}
	public function cek_login() {
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('coming_soon');
		}
		else
		{	
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if ($username == "masuk" && $password == "masuk") {
				redirect('home/index');
			}
			else
			{
				//redirect('coming_soon/index');
						echo '<script type="text/javascript">'; 
						echo 'alert("Gagal login, Silahkan cek kembali username dan password anda");'; 
						echo 'window.location.href = "cek_login";';
						echo '</script>';
			}	
		}
		
	}

	
}
