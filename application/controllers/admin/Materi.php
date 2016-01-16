<?php

class Materi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('jst_admin');
		}
		$this->load->helper('text');
	}
	public function index() {
		$data['new'] = $this->m_admin->detail_profil();
		$data['username'] = $this->session->userdata('username');
		$this->load->view('admin/materi/list_materi', $data);
	}

	public function tambah_materi() {
		$data['username'] = $this->session->userdata('username');
		$this->load->view('admin/materi/tambah_materi', $data);
	}

	public function act_edit($id){
    	$data['username'] = $this->session->userdata('username');
    	$nama_materi = $this->input->post('nama_materi');
		$jenis = $this->input->post('jenis');
    	if($this->input->post('uploud')){
				if ($jenis == 'free') {
			 		$config['upload_path']    = "./assets/materi/free";
			 	}
			 	else
			 	{
			 		$config['upload_path']    = "./assets/materi/member";
			 	}
				 $config['allowed_types']  = 'pdf|rar|doc|zip';
				 $config['max_size']       = '10000';
				 $config['file_name']      = $nama_materi.'-'.trim(str_replace(" ","",date('dmYHis')));
				 $this->load->library('upload', $config);
					
				if (!$this->upload->do_upload('materi')) {
					$tgl = date('Y-m-d H:i:s');
					$file = $this->upload->file_name;
					$type = substr($file, -3);
					$data = array(
							'nama_materi' => $nama_materi,
							'jenis' => $jenis,
							'tanggal' => $tgl,
							'type' => $type,
					);
					$id = $this->input->post('id_materi');
			        $this->db->where('id_materi', $id);
			        $this->db->update('materi', $data);
					redirect(base_url().'admin/materi/');
				}
				 else{
				 	$materi = $this->m_admin->edit_materi($id);
	    			
	    			if ($jenis == 'free') {
			 		$base_url = "./assets/materi/free";
				 	}
				 	else
				 	{
				 		$base_url = "./assets/materi/member";
				 	}
					unlink($base_url.'/'.$materi->row('file'));
					$tgl = date('Y-m-d H:i:s');
					$file = $this->upload->file_name;
					$type = substr($file, -3);
					$data = array(
							'nama_materi' => $nama_materi,
							'jenis' => $jenis,
							'file' => $this->upload->file_name,
							'tanggal' => $tgl,
							'type' => $type,
					);
					$id = $this->input->post('id_materi');
			        $this->db->where('id_materi', $id);
			        $this->db->update('materi', $data);
					redirect(base_url().'admin/materi/');

				}    
		}
		else
		{
			echo "error";
		}
	}

	public function act_simpan()
	{
		$nama_materi = $this->input->post('nama_materi');
		$jenis = $this->input->post('jenis');
		 if($this->input->post('uploud')){
			 	if ($jenis == 'free') {
			 		$config['upload_path']    = "./assets/materi/free";
			 	}
			 	else
			 	{
			 		$config['upload_path']    = "./assets/materi/member";
			 	}
				 $config['allowed_types']  = 'pdf|rar|doc|zip';
				 $config['max_size']       = '10000';
				 $config['file_name']      = $nama_materi.'-'.trim(str_replace(" ","",date('dmYHis')));
				 $this->load->library('upload', $config);
					
				if (!$this->upload->do_upload('materi')) {
					echo "<script language=\"Javascript\">\n";
					//Ada kesalahan dalam upload gambar, Ingin diulangi kembali atau tidak?'
					echo "confirmed = window.confirm('Ada kesalahan dalam upload file, Ingin diulangi kembali atau tidak?');";
					echo "if (confirmed)";
					echo "{";
					echo "window.location = 'http://localhost/jst/admin/materi/tambah_materi';";
					echo "}";
					echo "else ";
					echo "{";
					echo "window.location = 'http://localhost/jst/admin/materi';";
					echo "}";
					echo "</script>";
				} else{
					$tgl = date('Y-m-d H:i:s');
					$file = $this->upload->file_name;
					$type = substr($file, -3);
					$data = array(
							'nama_materi' => $nama_materi,
							'jenis' => $jenis,
							'file' => $this->upload->file_name,
							'tanggal' => $tgl,
							'type' => $type,
					);
					$this->m_admin->get_insert_materi($data); 
					redirect(base_url().'admin/materi');
				}    
		}
		else
		{
			echo "error";
		}
	}
	public function ajax_tabel()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
//            panggil dulu library datatablesnya
            
            $this->load->library('datatables_ssp');
            
//            atur nama tablenya disini
            $table = 'materi';
 
            // Table's primary key
            $primaryKey = 'id_materi';
 
            // Array of database columns which should be read and sent back to DataTables.
            // The `db` parameter represents the column name in the database, while the `dt`
            // parameter represents the DataTables column identifier. In this case simple
            // indexes
 
            $columns = array(
                array('db' => 'id_materi', 'dt' => 'DT_RowId'),
                array('db' => 'nama_materi', 'dt' => 'nama_materi'),
                array('db' => 'jenis', 'dt' => 'jenis'),
                array('db' => 'type', 'dt' => 'type'),
                array('db' => 'tanggal', 'dt' => 'tanggal'),
                array(
                    'db' => 'id_materi',
                    'dt' => 'aksi',
                    'formatter' => function( $d ) {
                        return '<a href="' . site_url('admin/materi/edit_materi/' . $d) . '">Edit</a> | <a href="' . site_url('admin/materi/hapus_materi/' . $d) . '">Delete</a>';
                    }
                ),
            );
 
            // SQL server connection information
            $sql_details = array(
                'user' => 'root',
                'pass' => '',
                'db' => 'jst',
                'host' => 'localhost'
            );
 
            echo json_encode(
                    Datatables_ssp::simple($_GET, $sql_details, $table, $primaryKey, $columns)
            );
        }
    }
	public function proses_tambah_profil() {
		
		$this->m_admin->tambah_kategori_profil();
		redirect('admin/profil/index');
	}

  	public function proses_edit_profil(){
    		$data['username'] = $this->session->userdata('username');
			$data = array(
							'deskripsi' => $this->input->post('deskripsi')
					);
				$id = $this->input->post('id_dp');
		        $this->db->where('id_dp', $id);
		        $this->db->update('detail_profil_perusahaan', $data);
				redirect(base_url().'admin/profil/index');
		}
	public function edit_materi($id)
	{
		$data['username'] = $this->session->userdata('username');
        $materi = $this->m_admin->edit_materi($id);

        $this->load->vars('b', $materi);
        //echo $b->row('nama_materi');
        $this->load->view('admin/materi/edit_materi',$data);
	}
	public function hapus_profil($id)
	{
		$data['username'] = $this->session->userdata('username');
        $profil = $this->m_admin->hapus_profil($id);
     
        redirect(base_url().'admin/profil/index');
	}

	public function hapus_materi($id)
	{
		$hapus_file = $this->m_admin->edit_materi($id);
		if ($hapus_file->row('jenis') == 'free') {
			$base_url = './assets/materi/free/';
		}
		else
		{
			$base_url = './assets/materi/member/';
		}
        
        unlink($base_url.'/'.$hapus_file->row('file'));
    	echo $hapus_file->row('file');
        
        $materi = $this->m_admin->hapus_materi($id);
        redirect(base_url().'admin/materi');
	}
	
	

	


}
?>