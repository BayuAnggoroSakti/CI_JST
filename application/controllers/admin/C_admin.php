<?php

class C_admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('jst_admin');
		}
		$this->load->helper('text');
	}
	public function index() {
		$data['data_get'] = $this->m_user->view();
		$data['username'] = $this->session->userdata('username');
		$this->load->view('admin/index', $data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('jst_admin');
	}

	public function slider() {
		$data['username'] = $this->session->userdata('username');
		$data['data_get'] = $this->m_admin->list_slider();
		$this->load->view('admin/slider', $data);
	}

	public function tambah_slide() {
		$data['username'] = $this->session->userdata('username');
		$this->load->view('admin/tambah_slider',$data);
	}

	public function slider_simpan() {

		if($this->input->post('uploud')){
				 $config['upload_path']    = "./assets/images/";
				 $config['allowed_types']  = 'gif|jpg|png|jpeg';
				 $config['max_size']       = '2000';
				 $config['max_width']      = '2000';
				 $config['max_height']     = '2000';
				 $config['file_name']      = 'gambar-'.trim(str_replace(" ","",date('dmYHis')));
				 $this->load->library('upload', $config);
					
				if (!$this->upload->do_upload('gambar')) {
					echo "<script language=\"Javascript\">\n";
					//Ada kesalahan dalam upload gambar, Ingin diulangi kembali atau tidak?'
					echo "confirmed = window.confirm('Ada kesalahan dalam upload gambar, Ingin diulangi kembali atau tidak?');";
					echo "if (confirmed)";
					echo "{";
					echo "window.location = 'http://localhost/jst/admin/tambah_berita';";
					echo "}";
					echo "else ";
					echo "{";
					echo "window.location = 'http://localhost/jst/admin/tambah_berita/ListBerita';";
					echo "}";
					echo "</script>";
				} else{
					$deskripsi = $this->input->post('deskripsi');
					$file = $this->upload->file_name;
					$data = array(
							'deskripsi' => $deskripsi,			
							'gambar' => $this->upload->file_name,
					);
					$this->m_admin->get_insert_slider($data); 
					redirect(base_url().'admin/c_admin/slider');
				}    
		}
		else
		{
			echo "error";
		}
	}


}
?>