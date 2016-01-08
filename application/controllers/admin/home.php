<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->library('pagination');
		//$this->load->model('model_pagination');
		$this->load->helper('form','url');
		$this->load->library('session');
		$this->load->helper('text');
	}
	public function page($offset=0) {
		if($this->session->userdata('login')) {
			//mengambil nama dari session
			$session = $this->session->userdata('login');
			// Data Blog
			$jml = $this->db->from('tb_post')->get();
			$config['base_url'] = base_url().'admin/home/page';
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = 10; /*Jumlah data yang dipanggil perhalaman*/  
			$config['uri_segment'] = 4; /*data selanjutnya di parse diurisegmen 3*/
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = true;
			$config['last_link'] = true;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			
			$data['halaman'] = $this->pagination->create_links();
			/*membuat variable halaman untuk dipanggil di view nantinya*/
			$data['offset'] = $offset;
			$data['page_title'] = 'Admin Panel';
			$data['data'] = $this->model_pagination->view($config['per_page'], $offset);
			$data['s_blog'] = $this->m_admin->htg_blog();
			$data['s_kategori'] = $this->m_admin->htg_kategori();
			$data['s_galery'] = $this->m_admin->htg_galery();
			$this->load->view('admin/layout/a_header',$data);
			$this->load->view('admin/home',$data);
			$this->load->view('admin/layout/a_footer',$data);
		} else {
			redirect('admin/login','refresh');   
		}
	}
	public function edit() {
		$this->load->library('session');
		$this->load->helper('url');
		if($this->session->userdata('username')) {
			//mengambil nama dari session
			$session = $this->session->userdata('username');
			// Data Blog

			$id_post        = $this->uri->segment(4);
			$data['data']   = $this->m_admin->blog_id($id_post);
	
			$this->load->view('admin/edit_berita',$data);
			
		} else {
			redirect('admin/login','refresh'); 
		}  
	}
	public function act_edit() {
	   if($this->input->post('uploud')){
				 $config['upload_path']    = "./asset/images/";
				 $config['allowed_types']  = 'gif|jpg|png|jpeg';
				 $config['max_size']       = '2000';
				 $config['max_width']      = '2000';
				 $config['max_height']     = '2000';
				 $config['file_name']      = 'gambar-'.trim(str_replace(" ","",date('dmYHis')));
				 $this->load->library('upload', $config);
					
				if (!$this->upload->do_upload('img')) {
					 echo "Error";
				} else{
					$id_post = $this->input->post('id_post'); 
					$judul = $this->input->post('judul');
					$isi = $this->input->post('isi');
					$tgl = date('Y-m-d H:i:s');
					$file = $this->upload->file_name;
					$user = 'Programmer Jones';
					$status_terbit = $this->input->post('status_terbit');
					$id_k = $this->input->post('id_k');

					$data = array(
							'judul' => $judul,
							'isi' => $isi,
							'tanggal' => $tgl,
							'img' => $this->upload->file_name,
							'user' => $user,
							'status_terbit' => $status_terbit,
							'id_k' => $id_k,
					);
					$this->db->where('id_post',$id_post);
					$this->db->update('tb_post', $data);
					redirect(base_url().'admin/home/');
				}    
		}
	}
	public function add_blog() {
		$this->load->library('session');
		$this->load->helper('url');
		if($this->session->userdata('login')) {
			//mengambil nama dari session
			$session = $this->session->userdata('login');
			// Data Blog
			$data['page_title'] = 'Add Blog | Admin Panel';
			$this->load->view('admin/layout/a_header',$data);
			$this->load->view('admin/add_blog',$data);
			$this->load->view('admin/layout/a_footer',$data);
		} else {
			redirect('admin/login','refresh'); 
		}   
	}
	public function act_del($id_post) {
		 $this->db->where('id_post',$id_post);
		 $query = $this->db->get('tb_post');
		 $row = $query->row();
		 unlink("./asset/images/$row->img");
		 $this->db->delete('tb_post', array('id_post' => $id_post));
		 redirect(base_url().'admin/home/');
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
					
				if (!$this->upload->do_upload('img')) {
					 echo "Error";
				} else{
					$judul = $this->input->post('judul_berita');
					$isi = $this->input->post('isi_berita');
					$tgl = date('Y-m-d H:i:s');
					$file = $this->upload->file_name;
					$user = 1;
					$status_terbit = $this->input->post('status_terbit');
					$id_k = $this->input->post('id_katBer');

					$data = array(
							'judul_berita' => $judul,
							'isi_berita' => $isi,
							'tanggal' => $tgl,
							'gambar' => $this->upload->file_name,
							'id_user' => $user,
							'status_terbit' => $status_terbit,
							'id_katBer' => $id_k,
					);
					$this->m_admin->get_insert($data); 
					redirect(base_url().'admin/index');
				}    
		}
		
	}
	public function add_category() {
		$this->load->library('session');
		$this->load->helper('url');
		if($this->session->userdata('login')) {
			//mengambil nama dari session
			$session = $this->session->userdata('login');
			$data['Kat'] = $this->datamodel->Kategori();
			$data['page_title'] = 'Add Blog | Admin Panel';
			$this->load->view('admin/layout/a_header',$data);
			$this->load->view('admin/add_cat',$data);
			$this->load->view('admin/layout/a_footer',$data);
		} else {
			redirect('admin/login','refresh'); 
		}   
	}	
	public function act_delcat($id_k) {
		 $this->db->where('id_k',$id_k);
		 $this->db->delete('tb_kategori', array('id_k' => $id_k));
		 redirect(base_url().'admin/home/add_category');
	}
	public function act_cat() {
		$data = array(
			'id_k' => '',
			'kategori' => $this->input->post('kategori')
			);
		 $this->m_admin->gal_insertcat($data); 
		 redirect(base_url().'admin/home/add_category');
	}
	public function logout(){
		$this->load->library('session');
		$this->load->helper('url');
		$this->session->unset_userdata('login');
		redirect('admin/login','refresh');
	}
}

/* End of file adminpanel.php */
/* Location: ./application/controllers/adminpanel.php */