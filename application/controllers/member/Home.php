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

    public function history($offset=0,$id = 5)
    {
        $data['menu'] = $this->m_admin->detail_profil();
        $this->load->view('template_frontend/header',$data);
        //$data['materi'] = $this->m_admin->materi();   
        $jml = $this->db->query("select distinct kt.nama as nama, t.waktu as waktu, t.nilai as nilai
from tryout t, kategori_to kt, soal s, detail d
where t.id_to = d.id_to
and d.kode_soal = s.kode_soal
and s.id_katTO = kt.id_katTO
and id_user = '$id'
order by waktu desc");
    
           $config['base_url'] = base_url().'member/home/history';
           $config['total_rows'] = $jml->num_rows();
           $config['per_page'] = 2; /*Jumlah data yang dipanggil perhalaman*/ 
           $config['uri_segment'] = 4; /*data selanjutnya di parse diurisegmen 3*/
           /*Class bootstrap pagination yang digunakan*/
           $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
           $config['full_tag_close'] ="</ul>";
           $config['num_tag_open'] = '<li>';
           $config['num_tag_close'] = '</li>';
           $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
           $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
           $config['next_tag_open'] = "<li>";
           $config['next_tagl_close'] = "</li>";
           $config['prev_tag_open'] = "<li>";
           $config['prev_tagl_close'] = "</li>";
           $config['first_tag_open'] = "<li>";
           $config['first_tagl_close'] = "</li>";
           $config['last_tag_open'] = "<li>";
           $config['last_tagl_close'] = "</li>";
          
           $this->pagination->initialize($config);
           
           $data['halaman'] = $this->pagination->create_links();
           /*membuat variable halaman untuk dipanggil di view nantinya*/
           $data['offset'] = $offset;

           $data['histori'] = $this->m_admin->lihat_histori($config['per_page'], $offset, $id);
           $data['title'] = "Download Materi";
           $this->load->view('frontend/histori',$data);
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