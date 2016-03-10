<?php

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_soal');
		$this->load->model('m_member');
		$this->load->model('m_tryout');
		
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
		$data['menu'] = $this->m_admin->detail_profil();
		$this->load->view('template_frontend/header',$data);
		$data['title'] = "Halaman Member";
		$data['katTO'] = $this->m_soal->list_katTO();
		$data['profil'] = $this->m_member->detail_profil($this->session->userdata('id_user'));
		$data['history_to'] = $this->m_tryout->history_to($this->session->userdata('id_user'));
		$this->load->view('frontend/member',$data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('nama_lengkap');
		redirect('home/login');
	}

	 private function _validate_profil()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama_lengkap') == '')
        {
            $data['inputerror'][] = 'nama_lengkap';
            $data['error_string'][] = 'nama lengkap Kerja is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('alamat') == '')
        {
            $data['inputerror'][] = 'alamat';
            $data['error_string'][] = 'alamat is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'email is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('asal_sekolah') == '')
        {
            $data['inputerror'][] = 'asal_sekolah';
            $data['error_string'][] = 'asal sekolah is required';
            $data['status'] = FALSE;
        }
 
     
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

	private function _validate_password()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        $password = $this->input->post('password_lama');
        //$pass = md5($password);
        $cek = $this->m_admin->check_pass('user', $password, $this->input->post('id_user'));
 
        if($this->input->post('password_lama') == '')
        {
            $data['inputerror'][] = 'password_lama';
            $data['error_string'][] = 'Password Lama tidak boleh kosong';
            $data['status'] = FALSE;
        }
        if($cek == FALSE)
        {
            $data['inputerror'][] = 'password_lama';
            $data['error_string'][] = 'Password Lama tidak sesuai';
            $data['status'] = FALSE;
        }
        if($this->input->post('password_baru') == '')
        {
            $data['inputerror'][] = 'password_baru';
            $data['error_string'][] = 'password baru tidak boleh kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('konfirmasi_password') == '')
        {
            $data['inputerror'][] = 'konfirmasi_password';
            $data['error_string'][] = 'konfirmasi password tidak boleh kosong';
            $data['status'] = FALSE;
        }
        if($this->input->post('password_baru') != $this->input->post('konfirmasi_password'))
        {
            $data['inputerror'][] = 'konfirmasi_password';
            $data['error_string'][] = 'konfirmasi password tidak sesuai';
            $data['status'] = FALSE;
        }

 
     
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


	public function ajax_update_profil()
    {
        $this->_validate_profil();
        $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
            );
        $this->m_member->update_profil(array('id_user' => $this->input->post('id_user')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update_password()
    {
        $this->_validate_password();
        $data = array(
                'password' => md5($this->input->post('password_baru')),
            );
        $this->m_member->update_profil(array('id_user' => $this->input->post('id_user')), $data);
        echo json_encode(array("status" => TRUE));
    }

	public function ajax_edit_profil($id)
	{
		$data = $this->m_member->get_user_by_id($id);
        echo json_encode($data);
	}

}
?>