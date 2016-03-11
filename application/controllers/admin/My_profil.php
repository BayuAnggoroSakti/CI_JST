<?php

class My_profil extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('level')=="admin") 
         {
            
         }
         else
         {
            redirect('jst_admin');
         }
		$this->load->helper('text');
	}

	public function index() {
		$data['username'] = $this->session->userdata('username');
		$data['title'] = "My Profile || Jogja Science Training";
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$id = $this->session->userdata('uid');
		$data['user'] = $this->m_admin->my_profile($id);
		$this->load->view('admin/my_profil/index', $data);
	}

	public function edit_password() {
        $this->load->library('form_validation');
		$data['username'] = $this->session->userdata('username');
		$data['title'] = "Edit Password || Jogja Science Training";
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$data['id_user'] = $this->session->userdata('uid');
        $data['return'] ='';
         if ($this->input->post('submit')) {
            $this->form_validation->set_rules('password_lama', 'Password', 'trim|required|min_length[5]|max_length[35]');
            $this->form_validation->set_rules('password_baru', 'Password', 'trim|required|min_length[5]|max_length[35]|matches[passconf]');
            $this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required|min_length[5]|max_length[35]');
            $this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
            if ($this->form_validation->run() == FALSE) {
                 $this->load->view('admin/my_profil/edit_password', $data);
            }
            else{
                $password_lama = $this->input->post('password_lama');
                $password_baru = $this->input->post('password_baru');
                $passconf = $this->input->post('passconf');
                $id = $this->session->userdata('uid');
                $pass = md5($password_baru);
                $cek = $this->m_admin->check_pass('user', $password_lama, $id);
                if ($cek == TRUE) {
                    $data = array(
                            'password' => $pass,
                    );
                   $this->db->where('id_user', $id);
                   if ($this->db->update('user', $data)) {
                       echo '<script type="text/javascript">'; 
                                echo 'alert("Selamat anda telah berhasil mengganti password anda, silahkan logout untuk mengecek password anda sudah terganti");'; 
                                echo 'window.location.href = "index";';
                                echo '</script>';
                   }
                   else
                   {
                    echo "error query";
                   }
                }
                else
                {
                    $data['return'] = '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info"></i> Peringatan!</h4>
                                Password lama anda salah
                             </div>';
                    $this->load->view('admin/my_profil/edit_password', $data);
                }
            }
       }
       else
       {
         $this->load->view('admin/my_profil/edit_password', $data);
       }
	}

    public function update_password() {
        $this->load->library('form_validation');
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit Password || Jogja Science Training";
        $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['level'] = $this->session->userdata('level');
        $data['return'] ='';
       if ($this->input->post('submit')) {
            $this->form_validation->set_rules('password_lama', 'Password', 'trim|required|min_length[5]|max_length[35]');
            $this->form_validation->set_rules('password_baru', 'Password', 'trim|required|min_length[5]|max_length[35]|matches[passconf]');
            $this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required|min_length[5]|max_length[35]');
            $this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
            if ($this->form_validation->run() == FALSE) {
                 $this->load->view('admin/my_profil/edit_password', $data);
            }
            else{
                $password_lama = $this->input->post('password_lama');
                $password_baru = $this->input->post('username');
                $passconf = $this->input->post('passconf');
                $id = $this->session->userdata('uid');
                $pass = md5($password_lama);
                $cek = $this->m_admin->check_pass('user', $pass, $id);
                if ($cek == TRUE) {
                    $data = array(
                            'password' => md5($password_baru),
                    );
                   $this->db->where('id_user', $id);
                   if ($this->db->update('user', $data)) {
                       echo '<script type="text/javascript">'; 
                                echo 'alert("Selamat anda telah berhasil mendaftar sebagai member JST, Mohon menunggu untuk di konfirmasi oleh admin kami, info lebih lanjut silahkan hubungi kami");'; 
                                echo 'window.location.href = "index";';
                                echo '</script>';
                   }
                   else
                   {
                    echo "error query";
                   }
                }
                else
                {
                    $data['return'] = '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info"></i> Peringatan!</h4>
                                Password lama anda salah
                             </div>';
                    $this->load->view('admin/my_profil/edit_password', $data);
                }
            }
       }
       else
       {
         $this->load->view('admin/my_profil/edit_password', $data);
       }
    }

	 public function ajax_edit_profil($id)
    {
        $data = $this->m_admin->get_user_by_id($id);
        echo json_encode($data);
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
        $this->m_admin->update_profil(array('id_user' => $this->input->post('id_user')), $data);
        echo json_encode(array("status" => TRUE));
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

	

}
?>