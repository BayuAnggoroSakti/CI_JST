<?php

class Gallery extends CI_Controller {

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
	    $this->load->model('m_gallery','gallery');
    }
 
    public function index()
    {
    	$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "Gallery Photo || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
        $data['data_get'] = $this->gallery->list_gallery();
		$this->load->view('admin/gallery/index', $data);
    }

    public function tambah_foto($id)
    {
        $data['username'] = $this->session->userdata('username');
        $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Tambah Gallery Pelatihan || Jogja Science Training";
        $data['data'] = $this->db->query("SELECT * from gallery where id_gallery = '$id' ");
       
        $this->load->view('admin/gallery/tambah_foto',$data);
    }

     public function hapus_gallery($id)
     {
        $list = $this->gallery->list_foto($id);
        $base = './assets/images/pelatihan';
        foreach ($list as $data) {
           $this->gallery->hapus_foto($id);
           $this->gallery->hapus_gallery($id);
           unlink($base.'/'.$data->alamat_foto);
        }
        $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menghapus Gallery beserta foto - foto di dalamnya','class' => 'alert alert-info'));
        redirect('admin/gallery');
     }

     public function ajax_update_foto()
    {
        $this->_validate_foto();
        $data = array(
                'nama_foto' => $this->input->post('nama_foto'),
            );
        $this->gallery->update_foto(array('id_foto' => $this->input->post('id_foto')), $data);
        echo json_encode(array("status" => TRUE));
    }

     public function ajax_update_gallery()
    {
        $this->_validate_gallery();
        $data = array(
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi')
            );
        $this->gallery->update_gallery(array('id_gallery' => $this->input->post('id_gallery')), $data);
        echo json_encode(array("status" => TRUE));
    }
     public function detail_gallery($id)
    {
    	$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "Detail Gallery || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
		$data['gallery'] = $this->gallery->detail_gallery($id);
        $data['foto'] = $this->gallery->list_foto($id);
		$this->load->view('admin/gallery/detail_gallery', $data);
    }

    public function hapus_foto($id)
    {
        $filename = $this->gallery->get_foto_by_id($id);
        $base = './assets/images/pelatihan';
        unlink($base."/".$filename->alamat_foto);
    }
    public function ajax_hapus_foto($id)
    {
        $this->hapus_foto($id);
        $this->gallery->delete_foto_by_id($id);
        $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menghapus foto','class' => 'alert alert-success'));
        echo json_encode(array("status" => TRUE));
        
        
    }
    function act_simpan_gallery() {
    $files = $_FILES;
    $this->load->library('upload');
    $cpt = count ( $_FILES ['gambar'] ['name'] );
    $nama_foto = $this->input->post('nama_foto');

    //input ke gallery
    $judul = $this->input->post('judul');
    $deskripsi = $this->input->post('deskripsi');
    $id_pelatihan = $this->input->post('id_pelatihan');
    $tgl = date('Y-m-d');
    $data_gallery = array(
                            'id_pelatihan' => $id_pelatihan,
                            'judul' => $judul,
                            'deskripsi' => $deskripsi,
                            'tanggal' => $tgl
                    );
    $this->db->insert('gallery', $data_gallery);
    $query = $this->db->query("SELECT id_gallery from gallery where judul = '$judul' and deskripsi = '$deskripsi' and tanggal = '$tgl' and id_pelatihan = '$id_pelatihan'");  
      
    for($i = 0; $i < $cpt; $i++) {

        $_FILES ['gambar'] ['name'] = $files ['gambar'] ['name'] [$i];
        $_FILES ['gambar'] ['type'] = $files ['gambar'] ['type'] [$i];
        $_FILES ['gambar'] ['tmp_name'] = $files ['gambar'] ['tmp_name'] [$i];
        $_FILES ['gambar'] ['error'] = $files ['gambar'] ['error'] [$i];
        $_FILES ['gambar'] ['size'] = $files ['gambar'] ['size'] [$i];
        $config ['upload_path'] = './assets/images/pelatihan';
        $config ['allowed_types'] = 'gif|jpg|png';
        $config ['encrypt_name'] = FALSE;
        $config['file_name']     = $judul[$i];
        $this->upload->initialize ( $config );
        $this->upload->do_upload ('gambar');
        $nma= $this->upload->file_name;
        $data_foto = array(
                            'id_gallery' => $query->row('id_gallery'),
                            'alamat_foto' => $nma,
                            'nama_foto' => $nama_foto[$i],
                    );
        $this->db->insert('foto', $data_foto);
    }
    $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menambahkan gallery baru','class' => 'alert alert-info'));
       redirect(site_url('admin/gallery/index'));
}
     function act_simpan_foto() {
    $files = $_FILES;
    $this->load->library('upload');
    $cpt = count ( $_FILES ['gambar'] ['name'] );
    $nama_foto = $this->input->post('nama_foto');

    $id_gallery = $this->input->post('id_gallery');
    for($i = 0; $i < $cpt; $i++) {

        $_FILES ['gambar'] ['name'] = $files ['gambar'] ['name'] [$i];
        $_FILES ['gambar'] ['type'] = $files ['gambar'] ['type'] [$i];
        $_FILES ['gambar'] ['tmp_name'] = $files ['gambar'] ['tmp_name'] [$i];
        $_FILES ['gambar'] ['error'] = $files ['gambar'] ['error'] [$i];
        $_FILES ['gambar'] ['size'] = $files ['gambar'] ['size'] [$i];
        $config ['upload_path'] = './assets/images/pelatihan';
        $config ['allowed_types'] = 'gif|jpg|png';
        $config ['encrypt_name'] = FALSE;
        $config['file_name']     = $judul[$i];
        $this->upload->initialize ( $config );
        $this->upload->do_upload ('gambar');
        $nma= $this->upload->file_name;
        $data_foto = array(
                            'id_gallery' => $id_gallery,
                            'alamat_foto' => $nma,
                            'nama_foto' => $nama_foto[$i],
                    );
        $this->db->insert('foto', $data_foto);
    }
    $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menambahkan foto baru','class' => 'alert alert-success'));
       redirect(site_url('admin/gallery/detail_gallery')."/".$id_gallery);
}

    public function ajax_edit_foto($id)
    {
        $data = $this->gallery->get_foto_by_id($id);
        echo json_encode($data);
    }

    public function ajax_edit_gallery($id)
    {
        $data = $this->gallery->get_gallery_by_id($id);
        echo json_encode($data);
    }

      public function tambah_gallery()
    {
    	$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "Tambah Gallery || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
		$this->load->view('admin/gallery/tambah_gallery', $data);
    }

     private function _validate_foto()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama_foto') == '')
        {
            $data['inputerror'][] = 'nama_foto';
            $data['error_string'][] = 'Nama Foto is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate_gallery()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('judul') == '')
        {
            $data['inputerror'][] = 'judul';
            $data['error_string'][] = 'Judul is required';
            $data['status'] = FALSE;
        }

          if($this->input->post('deskripsi') == '')
        {
            $data['inputerror'][] = 'deskripsi';
            $data['error_string'][] = 'deskripsi is required';
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