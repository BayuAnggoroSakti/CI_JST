<?php

class Staf extends CI_Controller {

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
		$this->load->model('m_staf');
	}
	public function index() {
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['title'] = "List Staf Pengajar || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
		$this->load->view('admin/staf/index', $data);
	}

	public function ajax_tabel()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
//            panggil dulu library datatablesnya
            
            $this->load->library('datatables_ssp');
            
//            atur nama tablenya disini
            $table = 'staf_pengajar';
 
            // Table's primary key
            $primaryKey = 'id_staf';
 
            // Array of database columns which should be read and sent back to DataTables.
            // The `db` parameter represents the column name in the database, while the `dt`
            // parameter represents the DataTables column identifier. In this case simple
            // indexes
 
            $columns = array(
                array('db' => 'id_staf', 'dt' => 'DT_RowId'),
                array('db' => 'nama_lengkap', 'dt' => 'nama_lengkap'),
                array('db' => 'alamat', 'dt' => 'alamat'),
                array('db' => 'tanggal_lahir', 'dt' => 'tanggal_lahir'),
                array('db' => 'bidang', 'dt' => 'bidang'),
                array('db' => 'deskripsi', 'dt' => 'deskripsi'),
                array(
                    'db' => 'id_staf',
                    'dt' => 'aksi',
                    'formatter' => function( $d ) {
                        return '<a href="' . site_url('admin/staf/edit_staf/' . $d) . '">Edit</a> | <a href="javascript:void()" onclick="hapus('."'".$d."'".')">Delete</a>';
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

	public function tambah_staf() {
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$data['title'] = "Tambah Staf Pengajar || Jogja Science Training";
		$data['error'] = 'tidak';
		$this->load->view('admin/staf/tambah_staf', $data);
	}

	public function edit_staf($id) {
		$this->load->model('m_staf');
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$data['title'] = "Edit Staf Pengajar || Jogja Science Training";
		$data['error'] = 'tidak';
		$staf = $this->m_staf->edit_staf($id);
		$this->load->vars('b', $staf);

		$this->load->view('admin/staf/edit_staf', $data);

	}

	public function hapus_staf($id)
	{
		$hapus_file = $this->m_staf->edit_staf($id);
		$base_url = './assets/staf';
        
        unlink($base_url.'/'.$hapus_file->row('foto'));
    	echo $hapus_file->row('file');
        
        $this->m_staf->hapus_staf($id);
        $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menghapus staf','class' => 'alert alert-success'));
        redirect(base_url().'admin/staf');
	}
	public function proses_edit_staf(){
				 $config['upload_path']    = "./assets/staf/";
				 $config['allowed_types']  = 'gif|jpg|png|jpeg';
				 $config['max_size']       = '5000';
				 $config['max_width']      = '5000';
				 $config['max_height']     = '5000';
				 $config['file_name']      = 'gambar-'.trim(str_replace(" ","",date('dmYHis')));
				 $this->load->library('upload', $config);
					
				if (!$this->upload->do_upload('foto')) {
					$nama_lengkap = $this->input->post('nama_lengkap');
					$alamat = $this->input->post('alamat');
					$tanggal_lahir = $this->input->post('tanggal_lahir');
					$bidang = $this->input->post('bidang');
					$deskripsi = $this->input->post('deskripsi');

					$data = array(
							'nama_lengkap' => $nama_lengkap,
							'alamat' => $alamat,
							'tanggal_lahir' => $tanggal_lahir,
							'bidang' => $bidang,
							'deskripsi' => $deskripsi,
					);
					$id = $this->input->post('id_staf');
			        $this->db->where('id_staf', $id);
			        $this->db->update('staf_pengajar', $data);
			        $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> mengubah data staf','class' => 'alert alert-success'));
					redirect(base_url().'admin/staf/');
				} else{
					$id = $this->input->post('id_staf');
					$staf = $this->m_staf->edit_staf($id);
					$base_url = './assets/staf/';
					unlink($base_url.'/'.$staf->row('foto'));

					$nama_lengkap = $this->input->post('nama_lengkap');
					$alamat = $this->input->post('alamat');
					$file = $this->upload->file_name;
					$tanggal_lahir = $this->input->post('tanggal_lahir');
					$bidang = $this->input->post('bidang');
					$deskripsi = $this->input->post('deskripsi');

					$data = array(
							'nama_lengkap' => $nama_lengkap,
							'alamat' => $alamat,
							'tanggal_lahir' => $tanggal_lahir,
							'foto' => $this->upload->file_name,
							'bidang' => $bidang,
							'deskripsi' => $deskripsi,
					);
					
			        $this->db->where('id_staf', $id);
			        $this->db->update('staf_pengajar', $data);
			        $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> mengubah data staf','class' => 'alert alert-success'));
					redirect(base_url().'admin/staf/');
				} 
		
	}

	public function proses_tambah()
	{
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->form_validation->set_rules('nama_lengkap','nama_lengkap','trim|required|xss_clean');
		$this->form_validation->set_rules('alamat','alamat','trim|required|xss_clean');
		$this->form_validation->set_rules('tanggal_lahir','tanggal_lahir','trim|required|xss_clean');
		$this->form_validation->set_rules('bidang','bidang','trim|required|xss_clean');
		$this->form_validation->set_rules('deskripsi','deskripsi','trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			$data['username'] = $this->session->userdata('username');
			$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$data['level'] = $this->session->userdata('level');
			$data['error'] = 'error';
			$this->load->view('admin/staf/tambah_staf',$data);
		}
		else
		{	
				 $config['upload_path']    = "./assets/staf/";
				 $config['allowed_types']  = 'gif|jpg|png|jpeg';
				 $config['max_size']       = '5000';
				 $config['max_width']      = '5000';
				 $config['max_height']     = '5000';
				 $config['file_name']      = 'gambar-'.trim(str_replace(" ","",date('dmYHis')));
				 $this->load->library('upload', $config);
					
				if (!$this->upload->do_upload('foto')) {
					echo "<script language=\"Javascript\">\n";
					echo "confirmed = window.confirm('Ada kesalahan dalam upload gambar, Ingin diulangi kembali atau tidak?');";
					echo "if (confirmed)";
					echo "{";
					echo "window.location = 'http://localhost/jst/admin/staf/tambah_staf';";
					echo "}";
					echo "else ";
					echo "{";
					echo "window.location = 'http://localhost/jst/admin/staf';";
					echo "}";
					echo "</script>";
				} else{
					$nama_lengkap = $this->input->post('nama_lengkap');
					$alamat = $this->input->post('alamat');
					$file = $this->upload->file_name;
					$tanggal_lahir = $this->input->post('tanggal_lahir');
					$bidang = $this->input->post('bidang');
					$deskripsi = $this->input->post('deskripsi');

					$data = array(
							'nama_lengkap' => $nama_lengkap,
							'alamat' => $alamat,
							'tanggal_lahir' => $tanggal_lahir,
							'foto' => $this->upload->file_name,
							'bidang' => $bidang,
							'deskripsi' => $deskripsi,
					);
					$this->load->model('m_staf');
					$this->m_staf->tambah_staf($data); 
					$this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menambah data staf pengajar','class' => 'alert alert-success'));
					redirect(base_url().'admin/staf');
				} 
		}
	}
}
?>