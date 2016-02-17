<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		

		$this->load->model('m_pelatihan');
		$data['gallery'] = $this->m_pelatihan->list_gallery();
		 //$this->load->view('frontend/list_pelatihan',$data);
	}

	public function index($offset=0)
	{
		$data['menu'] = $this->m_admin->detail_profil();
		$this->load->view('template_frontend/header',$data);
		$data['gallery'] = $this->m_pelatihan->list_gallery();
		$data['title'] = "Home | Jogja Science Training";
		$data['active'] = "active";
		$data['data_get_komentar'] = $this->m_admin->populer_komentar();
		$data['data_get_recent'] = $this->m_admin->recent_berita();
		$data['data_ambil'] = $this->m_admin->list_slider();
		$jml = $this->db->get('berita');
	
		   $config['base_url'] = base_url().'home/index';
		   $config['total_rows'] = $jml->num_rows();
		   $config['per_page'] = 4; /*Jumlah data yang dipanggil perhalaman*/ 
		   $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
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
		  

		   $data['data'] = $this->m_admin->lihat_berita($config['per_page'], $offset);
		  
			$this->load->view('frontend/index',$data);
	}

	public function login()
	{

		if ($this->session->userdata('level')!="" && $this->session->userdata('level')=="member" ) {
			redirect('member/home');
		}
		elseif ($this->session->userdata('level')!="member") {
			$data['title'] = "Login Member";
			$this->load->view('frontend/login',$data);
		}

	}
	function try_out()
	{

		$this->load->view('frontend/try_out');
	}
	function file()
	{

		 $this->load->helper('download'); //jika sudah diaktifkan di autoload, maka tidak perlu di tulis kembali
 		 
		 $name = $this->input->post('file');
		 $jenis = $this->input->post('jenis');
		 $data = file_get_contents("assets/materi/$jenis/$name"); // letak file pada aplikasi kita
		 if ($jenis=='member' && $this->session->userdata('level') == '') {
		 	echo 'hayo gagal ya';
		 }
		 else
		 {
		 	force_download($name,$data);
		 }
		 
	}
	function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
		$BulanIndo = array("Januari", "Februari", "Maret",
						   "April", "Mei", "Juni",
						   "Juli", "Agustus", "September",
						   "Oktober", "November", "Desember");
	
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
		
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
	}

	public function detail_staf($id)
	{
		$data = $this->m_admin->detail_staf($id);
		$tanggal_lahir = $this->DateToIndo($data->tanggal_lahir);
		$deskripsi = strip_tags($data->deskripsi);
	    $data_olah = array('nama_lengkap' => $data->nama_lengkap ,
	    					'bidang' => $data->bidang,
	    					'tanggal_lahir' => $tanggal_lahir,
	    					'alamat' => $data->alamat,
	    					'deskripsi' => $deskripsi
	    					);
        echo json_encode($data_olah);
	}

	public function download($offset=0)
	{
		$data['menu'] = $this->m_admin->detail_profil();
		$this->load->view('template_frontend/header',$data);
		//$data['materi'] = $this->m_admin->materi();	
		$jml = $this->db->get('materi');
	
		   $config['base_url'] = base_url().'home/download';
		   $config['total_rows'] = $jml->num_rows();
		   $config['per_page'] = 5; /*Jumlah data yang dipanggil perhalaman*/ 
		   $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
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

		   $data['materi'] = $this->m_admin->lihat_materi($config['per_page'], $offset);
		   $data['title'] = "Download Materi";
		$this->load->view('frontend/download',$data);
	}
	public function program_kerja()
	{
		$data['menu'] = $this->m_admin->detail_profil();
		$this->load->view('template_frontend/header',$data);
        $data['title'] = "Program Kerja";
        $data['guru'] =$this->m_pelatihan->pelatihan_guru();
        $data['siswa'] =$this->m_pelatihan->pelatihan_siswa();
        $data['title'] = "Program Kerja JST";
		$this->load->view('frontend/program_kerja', $data);
	}
	public function hubungi_kami()
	{
		$data['menu'] = $this->m_admin->detail_profil();
		$this->load->view('template_frontend/header',$data);
        $data['title'] = "Hubungi Kami";
		$this->load->view('frontend/hubungi_kami', $data);
	}
	public function staf()
	{
		$data['menu'] = $this->m_admin->detail_profil();
		$this->load->view('template_frontend/header',$data);
		$data['data_get'] = $this->m_admin->staf();	
		$data['title'] = "Staf Pengajar / Alumni";
		$this->load->view('frontend/staf',$data);
	}

	public function gallery()
	{
		$data['menu'] = $this->m_admin->detail_profil();
		$this->load->view('template_frontend/header',$data);
		$this->load->model('m_gallery');
		$data['data_get'] = $this->m_gallery->list_gallery();	
		$data['title'] = "Gallery JST";
		$this->load->view('frontend/gallery',$data);
	}
	public function detail_berita($id)
	{   
        if ($id == NULL) {
        	redirect('/home/index/'); 
        }
        else
        {	
        	$data['menu'] = $this->m_admin->detail_profil();
			$this->load->view('template_frontend/header',$data);
        	$data['data_get_recent'] = $this->m_admin->recent_berita();
	        $berita = $this->m_admin->detail_berita($id);
	        $data['data_get'] = $this->m_admin->list_komentar($id);
	        $data['data_get2'] = $this->m_admin->count_komentar($id);
	        $data['data_get_komentar'] = $this->m_admin->populer_komentar();
	        $this->load->vars('b', $berita);  
	        $this->load->view('frontend/detail_berita',$data);
        }
	}

	public function detail_profil($nama)
	{   
		$profil = str_replace("_", " ", $nama);
        if ($nama == NULL) {
        	redirect('/home/index/'); 
        }
        else
        {
        	$data['menu'] = $this->m_admin->detail_profil();
			$this->load->view('template_frontend/header',$data);
			$data['data_ambil'] = $this->m_admin->list_slider();
        	$profil = $this->m_admin->detail_profilByName($profil);
        	$this->load->vars('b', $profil);   
        	$profil = str_replace("_", " ", $nama);
	      	$data['title'] = $profil;
	        $this->load->view('frontend/profil',$data);
        }
	}

	public function detail_program($id)
	{   
        if ($id == NULL) {
        	redirect('/home/index/'); 
        }
        else
        {
        	$data['menu'] = $this->m_admin->detail_profil();
			$this->load->view('template_frontend/header',$data);
			$data['data_ambil'] = $this->m_admin->list_slider();
        	$program = $this->m_admin->detail_programByID($id);
        	$this->load->vars('b', $program);   
        	$program = str_replace("_", " ", $program->row('nama_pelatihan'));
	       	$data['title'] = $program;
	        $this->load->view('frontend/detail_program',$data);
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
