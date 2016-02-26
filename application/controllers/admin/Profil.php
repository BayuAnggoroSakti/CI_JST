<?php

class Profil extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('text');
		 if ($this->session->userdata('level')=="admin") 
         {
            
         }
         else
         {
            redirect('jst_admin');
         }
	}
	public function index() {
		 	$data['new'] = $this->m_admin->detail_profil();
			$data['username'] = $this->session->userdata('username');
			$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$data['title'] = "Profil || Jogja Science Training";
			$data['level'] = $this->session->userdata('level');
			$this->load->view('admin/profil/index', $data);	
	}

	public function tambah_profil() {
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['title'] = "Tambah Profil || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
		$this->load->view('admin/profil/tambah_profil', $data);
	}

	public function proses_tambah_profil() {
		
		$this->m_admin->tambah_profil();
		redirect('admin/profil/index');
	}

  	public function proses_edit_profil(){
    		$data['username'] = $this->session->userdata('username');
    		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$data['level'] = $this->session->userdata('level');
			$data = array(
							'nama_profil' => $this->input->post('nama'),
							'deskripsi' => $this->input->post('deskripsi')
					);
				$id = $this->input->post('id_profil');
		        $this->db->where('id_profil', $id);
		        $this->db->update('profil_perusahaan', $data);
				redirect(base_url().'admin/profil/index');
		}
	public function edit_profil($id)
	{
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$data['title'] = "Edit Profil || Jogja Science Training";
        $profil = $this->m_admin->edit_profil($id);
        $this->load->vars('b', $profil);
     
        $this->load->view('admin/profil/edit_profil',$data);
	}
	public function hapus_profil($id)
	{
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
        $profil = $this->m_admin->hapus_profil($id);
     
        redirect(base_url().'admin/profil/index');
	}
	public function isi_profil() {
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['title'] = "Isian Profil || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
		$data['data'] = "";
		//$data['kat_prof'] = $this->m_admin->kategori_profil();
		$this->load->view('admin/profil/isi_profil', $data);
	}

	public function proses_isi_profil() {
		$id_profil = $this->input->post('id_profil');
		if ($this->m_admin->cek_id_profil($id_profil) == NULL) {
			
			if ($this->input->post('deskripsi') == NULL) {
				$data['username'] = $this->session->userdata('username');
				$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
				$data['level'] = $this->session->userdata('level');
				$data['data'] = "error_deskripsi";	
				$this->load->view('admin/profil/isi_profil', $data);
			}
			else
			{
				$this->m_admin->tambah_isi_profil();
				redirect(base_url().'admin/profil/index');
			}
		}
		else
		{
			$id = $this->input->post('id_profil');
			if ($id == NULL) {
				$data['username'] = $this->session->userdata('username');
				$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$data['level'] = $this->session->userdata('level');
				$data['data'] = "error_ID";	
				$this->load->view('admin/profil/isi_profil', $data);
			}
			else
			{
					$data['username'] = $this->session->userdata('username');
					$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
					$data['level'] = $this->session->userdata('level');
					$data['data'] = "error";	
					$this->load->view('admin/profil/isi_profil', $data);
			}
		
		}
		
	}

	


}
?>