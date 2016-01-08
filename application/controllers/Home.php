<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->model('m_admin');
		$data['data_get'] = $this->m_admin->list_berita();
		$data['data_get_komentar'] = $this->m_admin->populer_komentar();
		$data['data_ambil'] = $this->m_admin->list_slider();
		$this->load->view('frontend/index',$data);
	}

	public function detail_berita($id)
	{   
        if ($id == NULL) {
        	redirect('/home/index/'); 
        }
        else
        {
	        $berita = $this->m_admin->detail_berita($id);
	        $data['data_get'] = $this->m_admin->list_komentar($id);
	        $data['data_get2'] = $this->m_admin->count_komentar($id);
	        $data['data_get_komentar'] = $this->m_admin->populer_komentar();
	        $this->load->vars('b', $berita);  
	        $this->load->view('frontend/detail_berita',$data);
        }
	}

	public function tambah_komentar()
	{
		
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$isi_komentar = $this->input->post('isi_komentar');
		$id_berita = $this->input->post('id_berita');
		$tanggal = date('Y-m-d H:i:s');
		$data = array(
							'nama' => $nama,
							'email' => $email,
							'isi_komentar' => $isi_komentar,
							'tanggal' => $tanggal,
							'id_berita' => $id_berita,
					);
		$this->m_admin->tambah_komentar($data);
		//redirect('/home/detail_berita/').echo $id_berita;
		redirect(base_url().'home/detail_berita/'.$id_berita);
	}
}
