<?php

class Dashboard extends CI_Controller {

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
		$data['data_get'] = $this->m_user->view();
		$data['username'] = $this->session->userdata('username');
		$data['title'] = "Dashboard || Jogja Science Training";
		$data['member'] = $this->m_admin->total('user','level','member');
		$data['tryout'] = $this->m_admin->total2('tryout');
		$data['materi'] = $this->m_admin->total2('materi');
		$data['soal'] = $this->m_admin->total2('soal');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$this->load->view('admin/index', $data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('jst_admin');
	}

	public function slider_proses_edit()
	{
		$id = $this->input->post('id_slider');
		$deskripsi = $this->input->post('deskripsi');

		$config['upload_path']    = "./assets/images";
		$config['allowed_types']  = 'png|jpeg|jpg';
		$config['max_size']       = '10000';
		$config['file_name']      = $deskripsi.'-'.trim(str_replace(" ","",date('dmYHis')));
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
					$data = array(
							'deskripsi' => $deskripsi,
					);
			        $this->db->where('id_slider', $id);
			        $this->db->update('slider', $data);
			        $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> mengubah data slider','class' => 'alert alert-success'));
					redirect(base_url().'admin/dashboard/slider/');
		}
		else
		{
					$slider = $this->m_admin->edit_slider($id);
					$base_url = "./assets/images";
					unlink($base_url.'/'.$slider->gambar);

					$data = array(
							'deskripsi' => $deskripsi,
							'gambar' => $this->upload->file_name,
					);
			        $this->db->where('id_slider', $id);
			        $this->db->update('slider', $data);
			        $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> mengubah data slider','class' => 'alert alert-success'));
					redirect(base_url().'admin/dashboard/slider/');
		}
	}

	public function slider() {
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$data['title'] = "Slider Website";
		$data['data_get'] = $this->m_admin->list_slider();
		$this->load->view('admin/slider', $data);
	}

	public function edit_slider($id) {
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$data['title'] = "Edit Slider Website";
		$data['data_get'] = $this->m_admin->edit_slider($id);
		$this->load->view('admin/edit_slider', $data);
	}

	public function hapus_slider($id) {
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$b = $this->m_admin->list_slider1($id);
		$base_url = './assets/images/';
		unlink($base_url.'/'.$b->row('gambar'));
        $this->m_admin->hapus_slider($id);
     	$this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menghapus slider','class' => 'alert alert-success'));
        redirect(base_url().'admin/dashboard/slider');
	}

	public function tambah_slide() {
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$data['title'] = "Tambah Slider";
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
					$base_ulang = base_url('admin/dashboard/tambah_slide');
					$base_kembali = base_url('admin/dashboard/slider');
					echo "<script language=\"Javascript\">\n";
					//Ada kesalahan dalam upload gambar, Ingin diulangi kembali atau tidak?'
					echo "confirmed = window.confirm('Ada kesalahan dalam upload gambar, Ingin diulangi kembali atau tidak?');";
					echo "if (confirmed)";
					echo "{";
					echo "window.location = '".$base_ulang."';";
					echo "}";
					echo "else ";
					echo "{";
					echo "window.location = '".$base_kembali."';";
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
					$this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menambahkan data','class' => 'alert alert-success'));
					redirect(base_url().'admin/dashboard/slider');
				}    
		}
		else
		{
			echo "error";
		}
	}


}
?>