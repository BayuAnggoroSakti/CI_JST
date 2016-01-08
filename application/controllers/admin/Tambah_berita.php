<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_berita extends CI_Controller {

	public function __construct() {
		parent::__construct();
			$this->load->model('m_admin');
		$this->load->library('pagination');
		$this->load->helper('form','url');
		$this->load->library('session');
		$this->load->helper('text');
	
			$this->load->model('m_admin');
		if ($this->session->userdata('username')=="") {
			redirect('jst_admin');
		}
		$this->load->helper('text');
	}
	public function index()
	{
		$data['Kat'] = $this->m_admin->Kategori();
		$data['username'] = $this->session->userdata('username');
		$this->load->view('admin/tambah_berita',$data);
	}
	public function status_terbit($value)
	{
		if ($value == 'y') {
			return "Terbit";
		}
		else
		{
			return "Tidak Terbit";
		}
	}

	/* public function prosesedit_berita() {
	 	$data['username'] = $this->session->userdata('username');
        $this->load->model('m_admin');
        $this->m_admin->prosesedit_berita();
        redirect('admin/tambah_berita/ListBerita');
    }
*/
    public function prosesedit_berita(){
    	$data['username'] = $this->session->userdata('username');
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
					$tgl = date('Y-m-d H:i:s');
					$data = array(
							'judul_berita' => $this->input->post('judul_berita'),
				            'gambar' => $this->upload->file_name,
				            'isi_berita' => $this->input->post('isi_berita'),
				            'tanggal_berita' => $tgl,
				            'id_kateBer' => $this->input->post('id_kateBer'),
				            'status_terbit' => $this->input->post('status_terbit'),
					);
				$id = $this->input->post('id_berita');
		        $this->db->where('id_berita', $id);
		        $this->db->update('berita', $data);
				redirect(base_url().'admin/tambah_berita/ListBerita');

				}    
		}
		else
		{
			echo "error";
		}
	}

     function hapus_berita($id)
    {
    	$data['username'] = $this->session->userdata('username');
    	$this->load->model('m_admin');
    	
    	$berita = $this->m_admin->hapus_berita($id);
    
    	redirect('admin/tambah_berita/ListBerita');

    }
	 public function editBerita($id) {
	 	$data['username'] = $this->session->userdata('username');
        $this->load->model('m_admin');
        $berita = $this->m_admin->edit($id);
        $this->load->vars('b', $berita);
     
        $this->load->view('admin/edit_berita',$data);
    }
	
	public function ListBerita()
	{
		$data['data_get'] = $this->m_admin->list_berita();
		$data['username'] = $this->session->userdata('username');
		//$this->status_terbit($value);
		$this->load->view('admin/list_berita',$data);

	}

	public function ListBerita2()
	{
		$data['data_get'] = $this->m_admin->list_berita();
		$data['username'] = $this->session->userdata('username');
		//$this->status_terbit($value);
		$this->load->view('admin/list_berita2',$data);

	}

	public function act_simpan(){
	
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
					$judul = $this->input->post('judul_berita');
					$isi = $this->input->post('isi_berita');
					$tgl = date('Y-m-d H:i:s');
					$file = $this->upload->file_name;
					$user = 1;
					$status_terbit = $this->input->post('status_terbit');
					$id_k = $this->input->post('id_kateBer');

					$data = array(
							'judul_berita' => $judul,
							'isi_berita' => $isi,
							'tanggal_berita' => $tgl,
							'gambar' => $this->upload->file_name,
							'id_user' => $user,
							'status_terbit' => $status_terbit,
							'id_kateBer' => $id_k,
					);
					$this->m_admin->get_insert($data); 
					redirect(base_url().'jst_admin');
				}    
		}
		else
		{
			echo "error";
		}
	}
}
