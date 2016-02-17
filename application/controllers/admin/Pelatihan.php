<?php

class Pelatihan extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->helper('text');
        $this->load->model('m_pelatihan','pelatihan');
        $this->load->model('m_program_kerja','progam_kerja');
		 if ($this->session->userdata('level')=="admin") 
         {
            
         }
         else
         {
            redirect('jst_admin');
         }
		
    }
 
    public function index()
    {
        if ($this->session->userdata('level')=="admin") 
        {
            //$this->load->model('m_pelatihan');
            $data['username'] = $this->session->userdata('username');
            $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
            $data['title'] = "Pelatihan || Jogja Science Training";
            $data['level'] = $this->session->userdata('level');
            $data['data_get'] = $this->m_admin->program_kerja();
            $this->load->view('admin/pelatihan/index', $data);
            
            //echo $this->session->userdata('level');
            //redirect('jst_admin');
        }
        else
        {
           $this->load->view('admin/login');
        }
        
    }

     public function act_simpan()
     {
       
        $id_programKerja = $this->input->post('id_programKerja');
        $nama_pelatihan = $this->input->post('nama_pelatihan');
        $biaya = $this->input->post('biaya');
        $lokasi = $this->input->post('lokasi');
        $waktu_mulai = $this->input->post('waktu_mulai');
        $waktu_selesai = $this->input->post('waktu_selesai');
        $fasilitas = $this->input->post('fasilitas');
        $keterangan = $this->input->post('keterangan');
        $data = array(
                            'id_programKerja' => $id_programKerja,
                            'nama_pelatihan' => $nama_pelatihan,
                            'biaya' => $biaya,
                            'lokasi' => $lokasi,
                            'waktu_mulai' => $waktu_mulai,
                            'waktu_selesai' => $waktu_selesai,
                            'fasilitas' => $fasilitas,
                            'keterangan' => $keterangan,
                         );
        $this->db->insert('pelatihan', $data);
        $data['username'] = $this->session->userdata('username');
        $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "Tambah Gallery Pelatihan || Jogja Science Training";
        $data['data'] = $this->db->query("SELECT id_pelatihan, nama_pelatihan from pelatihan where nama_pelatihan = '$nama_pelatihan' and biaya = '$biaya' and lokasi = '$lokasi' and fasilitas = '$fasilitas' and keterangan = '$keterangan' and waktu_mulai = '$waktu_mulai' and waktu_selesai = '$waktu_selesai'");
        $this->load->view('admin/pelatihan/tambah_gallery',$data);
                    //redirect(base_url().'admin/pelatihan/tambah_gallery/'.$id->row('id_pelatihan'),$nama->row('nama_pelatihan'));
     }

    public function tambah_gallery($id)
    {
        $data['username'] = $this->session->userdata('username');
        $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "Tambah Gallery Pelatihan || Jogja Science Training";
        $data['level'] = $this->session->userdata('level');
        $data['id'] = $id;
        $this->load->view('admin/pelatihan/tambah_gallery',$data);
    }
    public function tambah_pelatihan()
    {
           //$this->load->model('m_pelatihan');
        $data['username'] = $this->session->userdata('username');
        $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "Pelatihan || Jogja Science Training";
        $data['level'] = $this->session->userdata('level');
        $data['data_get'] = $this->m_admin->program_kerja();
        $this->load->view('admin/pelatihan/tambah_pelatihan', $data);
    }
     public function progam_kerja()
    {
           //$this->load->model('m_pelatihan');
        $data['username'] = $this->session->userdata('username');
        $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "Program Kerja || Jogja Science Training";
        $data['level'] = $this->session->userdata('level');
        $data['data_get'] = $this->m_admin->program_kerja();
        $this->load->view('admin/pelatihan/program_kerja', $data);
    }
    public function ajax_list()
    {
        $list = $this->pelatihan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pelatihan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pelatihan->nama_pelatihan;
            $row[] = "Rp ".$pelatihan->biaya;
            $row[] = $pelatihan->lokasi;
            $row[] = $pelatihan->fasilitas;
            $row[] = $pelatihan->keterangan;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_pelatihan('."'".$pelatihan->id_pelatihan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_pelatihan('."'".$pelatihan->id_pelatihan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->pelatihan->count_all(),
                        "recordsFiltered" => $this->pelatihan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
     public function ajax_list_program_kerja()
    {
        $list = $this->progam_kerja->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $progam_kerja) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $progam_kerja->nama_programKerja;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_progam('."'".$progam_kerja->id_programKerja."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_program('."'".$progam_kerja->id_programKerja."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->progam_kerja->count_all(),
                        "recordsFiltered" => $this->progam_kerja->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
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
       redirect(site_url('admin/pelatihan/index'));
}
private function set_upload_options() {
    // upload an image options
    $config = array ();
    $config ['upload_path'] = './assets/images/pelatihan';
    $config ['allowed_types'] = 'gif|jpg|png';
    $config ['encrypt_name'] = FALSE;

    return $config;
}


    public function ajax_edit($id)
    {
        $data = $this->pelatihan->get_by_id($id);
        $data->waktu_selesai = ($data->waktu_selesai == '0000-00-00') ? '' : $data->waktu_selesai; 
        $data->waktu_mulai = ($data->waktu_mulai == '0000-00-00') ? '' : $data->waktu_mulai; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
    public function ajax_edit_program($id)
    {
        $data = $this->progam_kerja->get_by_id($id);
        echo json_encode($data);
    }

     public function program_kerja()
    {
        $data = $this->m_admin->program_kerja();
        //$data->waktu_mulai = ($data->dob == '0000-00-00') ? '' : $data->waktu_mulai; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                'nama_pelatihan' => $this->input->post('nama_pelatihan'),
                'biaya' => $this->input->post('biaya'),
                'id_programKerja' => $this->input->post('id_programKerja'),
                'lokasi' => $this->input->post('lokasi'),
                'waktu_mulai' => $this->input->post('waktu_mulai'),
                'waktu_selesai' => $this->input->post('waktu_selesai'),
                'fasilitas' => $this->input->post('fasilitas'),
                'keterangan' => $this->input->post('keterangan'),
            );
        $insert = $this->pelatihan->save($data);
        echo json_encode(array("status" => TRUE),$data);
       // $this->load->view('admin/pelatihan/tambah_pelatihan');
    }
    public function ajax_add_program()
    {
        $this->_validate_program();
        $data = array(
                'nama_programKerja' => $this->input->post('nama_programKerja'),
            );
        $insert = $this->progam_kerja->save($data);
        echo json_encode(array("status" => TRUE),$data);
       // $this->load->view('admin/pelatihan/tambah_pelatihan');
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'nama_pelatihan' => $this->input->post('nama_pelatihan'),
                'biaya' => $this->input->post('biaya'),
                'id_programKerja' => $this->input->post('id_programKerja'),
                'lokasi' => $this->input->post('lokasi'),
                'waktu_mulai' => $this->input->post('waktu_mulai'),
                'waktu_selesai' => $this->input->post('waktu_selesai'),
                'fasilitas' => $this->input->post('fasilitas'),
                'keterangan' => $this->input->post('keterangan'),
            );
        $this->pelatihan->update(array('id_pelatihan' => $this->input->post('id_pelatihan')), $data);
        echo json_encode(array("status" => TRUE));
    }
     public function ajax_update_program()
    {
        $this->_validate_program();
        $data = array(
                'nama_programKerja' => $this->input->post('nama_programKerja'),
            );
        $this->progam_kerja->update(array('id_programKerja' => $this->input->post('id_programKerja')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->pelatihan->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
     public function ajax_delete_program($id)
    {
        $this->progam_kerja->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama_pelatihan') == '')
        {
            $data['inputerror'][] = 'nama_pelatihan';
            $data['error_string'][] = 'Nama Pelatihan is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('biaya') == '')
        {
            $data['inputerror'][] = 'biaya';
            $data['error_string'][] = 'Biaya is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('lokasi') == '')
        {
            $data['inputerror'][] = 'lokasi';
            $data['error_string'][] = 'Lokasi is required';
            $data['status'] = FALSE;
        }

         if($this->input->post('fasilitas') == '')
        {
            $data['inputerror'][] = 'fasilitas';
            $data['error_string'][] = 'Fasilitas is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('keterangan') == '')
        {
            $data['inputerror'][] = 'keterangan';
            $data['error_string'][] = 'Keterangan is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('id_programKerja') == '')
        {
            $data['inputerror'][] = 'id_programKerja';
            $data['error_string'][] = 'Please select program kerja';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('waktu_mulai') == '')
        {
            $data['inputerror'][] = 'waktu_mulai';
            $data['error_string'][] = 'Waktu Mulai is required';
            $data['status'] = FALSE;
        }

         if($this->input->post('waktu_selesai') == '')
        {
            $data['inputerror'][] = 'waktu_selesai';
            $data['error_string'][] = 'waktu selesai is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('waktu_mulai') >= $this->input->post('waktu_selesai') )
        {
            $data['inputerror'][] = 'waktu_selesai';
            $data['error_string'][] = 'Waktu Selesai Harus Lebih Besar Dari Waktu Mulai ';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
     private function _validate_program()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama_programKerja') == '')
        {
            $data['inputerror'][] = 'nama_programKerja';
            $data['error_string'][] = 'Nama Program Kerja is required';
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