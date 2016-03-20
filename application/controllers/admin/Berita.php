<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct() {
		parent::__construct();
			$this->load->model('m_admin');
			$this->load->library('pagination');
			$this->load->helper('form','url');
			$this->load->library('session');
			$this->load->helper('text');
			$this->load->model('m_trash');
		 if ($this->session->userdata('level')=="admin") 
		 {
		 	
		 }
		 else
		 {
		 	redirect('jst_admin');
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
	public function ajax_tabel()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
//            panggil dulu library datatablesnya
            
            $this->load->library('datatables_ssp');
            
//            atur nama tablenya disini
            $table = 'berita';
 
            // Table's primary key
            $primaryKey = 'id_berita';
 
            // Array of database columns which should be read and sent back to DataTables.
            // The `db` parameter represents the column name in the database, while the `dt`
            // parameter represents the DataTables column identifier. In this case simple
            // indexes
 
            $columns = array(
                array('db' => 'id_berita', 'dt' => 'DT_RowId'),
                array('db' => 'judul_berita', 'dt' => 'judul_berita'),
                array('db' => 'isi_berita', 'dt' => 'isi_berita'),
                array('db' => 'id_berita', 'dt' => 'id_berita'),
                array('db' => 'tanggal_berita', 'dt' => 'tanggal_berita','formatter' => function( $d ){
                	  return $this->DateToIndo($d);
                }),
                array('db' => 'gambar', 'dt' => 'gambar', 'formatter' => function( $d ){
                	  return '<img width="150px" height="100px" src="'.base_url('assets/images/')."/".$d.'">';
                }),
                array('db' => 'status_terbit', 'dt' => 'status_terbit', 'formatter' => function( $d ){
                	if ($d == "y") {
                		return '<small class="label pull-right bg-green">Terbit</small>';
                	}
                	else
                	{
                		return '<small class="label pull-left bg-red">Tidak Terbit</small><br><a href="' . site_url('admin/berita/trash') . '">view trash</a>';
                	}
                	}),
                array(
                    'db' => 'id_berita',
                    'dt' => 'aksi',
                    'formatter' => function( $d ) {
                        return '<a href="' . site_url('admin/berita/editBerita/' . $d) . '">Edit</a> | <a  href="' . site_url('admin/berita/hapus_berita/' . $d) . '">Delete</a>';
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
 

	public function tambah_berita()
	{
		$data['Kat'] = $this->m_admin->Kategori();
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['title'] = "Tambah Berita || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
		$this->load->view('admin/berita/tambah_berita',$data);
	}
	public function trash()
	{
		$data['Kat'] = $this->m_admin->Kategori();
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['title'] = "Tambah Berita || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
		$this->load->view('admin/berita/trash',$data);
	}

	 public function ajax_delete_trash($id)
    {
    	$gambar = $this->m_trash->gambar($id);
    	$path = './assets/images';
    	unlink($path."/".$gambar->row('gambar'));
        $this->m_trash->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
	public function ajax_list_trash()
    {
        $list = $this->m_trash->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $berita) {

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $berita->judul_berita;
            $row[] = $berita->tanggal_berita;
            $row[] = '<img width="150px" height="100px" src="'.base_url('assets/images/')."/".$berita->gambar.'">';
            //add html for action
            $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_berita('."'".$berita->id_berita."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_trash->count_all(),
                        "recordsFiltered" => $this->m_trash->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
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
   public function prosesedit_berita($id){
    	$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
    	if($this->input->post('uploud')){

				 $config['upload_path']    = "./assets/images/";
				 
				 $config['allowed_types']  = 'gif|jpg|png|jpeg';
				 $config['max_size']       = '5000';
				 $config['max_width']      = '5000';
				 $config['max_height']     = '5000';
				 $config['file_name']      = $this->input->post('judul_berita');
				 $this->load->library('upload', $config);
					
				if (!$this->upload->do_upload('gambar')) {
					$data = array(
							'judul_berita' => $this->input->post('judul_berita'),
				            'isi_berita' => $this->input->post('isi_berita'),
				            'id_kateBer' => $this->input->post('id_kateBer'),
				            'status_terbit' => $this->input->post('status_terbit'),
					);
				$id = $this->input->post('id_berita');
		        $this->db->where('id_berita', $id);
		        $this->db->update('berita', $data);
		        $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> mengubah data berita','class' => 'alert alert-success'));
				redirect(base_url().'admin/berita');
				}
				 else{
					$berita = $this->m_admin->edit($id);
	    			$base_url = './assets/images/';
					unlink($base_url.'/'.$berita->row('gambar'));
				
					$data = array(
							'judul_berita' => $this->input->post('judul_berita'),
				            'isi_berita' => $this->input->post('isi_berita'),
				            'gambar' => $this->upload->file_name,
				            'id_kateBer' => $this->input->post('id_kateBer'),
				            'status_terbit' => $this->input->post('status_terbit'),
					);
				$id = $this->input->post('id_berita');
		        $this->db->where('id_berita', $id);
		        $this->db->update('berita', $data);
		        $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> mengubah data berita','class' => 'alert alert-success'));
				redirect(base_url().'admin/berita');

				}    
		}
		else
		{
			echo "error";
		}
	}

     function hapus_berita($id)
    {
    	/*$data['username'] = $this->session->userdata('username');
    	$berita = $this->m_admin->hapus_berita($id);*/
    	$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$data = array(
					'status_terbit' => 'n'
				);

		$this->db->where('id_berita', $id);
		$this->db->update('berita', $data);

		$this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> memindahkan berita ke trash/sampah','class' => 'alert alert-success'));
    	redirect('admin/berita/ListBerita2');

    }
    function hapus_katBer($id)
    {
    	$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
    	$kat_berita = $this->m_admin->hapus_ber_kat($id);
	 	 foreach ($kat_berita as $gambar) {
	 	 	$base="./assets/images/";
	 	 	unlink($base.$gambar->gambar);
	 	 }
    	$berita = $this->m_admin->hapus_katBer($id);
    	$this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menghapus kategori berita','class' => 'alert alert-success'));
    	redirect('admin/berita/tambah_kategori_berita');

    }
    
	 public function editBerita($id) {
	 	$data['username'] = $this->session->userdata('username');
	 	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$data['title'] = "Edit Berita || Jogja Science Training";
        $this->load->model('m_admin');
        $berita = $this->m_admin->edit($id);
        $this->load->vars('b', $berita);
     
        $this->load->view('admin/berita/edit_berita',$data);
    }

    public function edit_katBer($id) {
	 	$data['username'] = $this->session->userdata('username');
	 	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$data['title'] = "Edit Kategori Berita || Jogja Science Training";
        $kat_berita = $this->m_admin->edit_katBer($id);
        $data['data_get'] = $this->m_admin->list_katberita();
        $this->load->vars('b', $kat_berita);
     
        $this->load->view('admin/berita/edit_katBer',$data);
    }

    public function hapus_kateBer($id) {
	 	 $kat_berita = $this->m_admin->hapus_ber_kat($id);
	 	 echo $kat_berita->row('gambar');
    }

    public function proses_edit_katBer(){
    	$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
			$data = array(
							'nama_katBer' => $this->input->post('nama_katBer')
					);
				$id = $this->input->post('id_katBer');
		        $this->db->where('id_katBer', $id);
		        $this->db->update('kategori_berita', $data);
		        $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> mengubah kategori berita','class' => 'alert alert-success'));
				redirect(base_url().'admin/berita/tambah_kategori_berita');

		}

	public function tambah_kategori_berita()
	{
		$data['data_get'] = $this->m_admin->list_katberita();
		$data['username'] = $this->session->userdata('username');
		$data['title'] = "Tambah Kategori Berita || Jogja Science Training";
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		//$this->status_terbit($value);
		$this->load->view('admin/berita/tambah_kategori_berita',$data);
	}
	public function p_tambah_kategori_berita()
	{
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
        $this->m_admin->tambah_kategori_berita();
        $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menambahkan kategori berita baru','class' => 'alert alert-success'));
        redirect('admin/berita/tambah_kategori_berita');
	}
	public function index()
	{
		$data['data_get'] = $this->m_admin->list_berita();
		$data['username'] = $this->session->userdata('username');
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		$data['title'] = "List Berita || Jogja Science Training";
		//$this->status_terbit($value);
		$this->load->view('admin/berita/list_berita2',$data);

	}

	public function ListBerita2()
	{
		$data['data_get'] = $this->m_admin->list_berita();
		$data['username'] = $this->session->userdata('username');
		$data['title'] = "List Berita || Jogja Science Training";
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
		//$this->status_terbit($value);
		$this->load->view('admin/berita/list_berita2',$data);

	}

	public function act_simpan(){
	
	   if($this->input->post('uploud')){
				 $config['upload_path']    = "./assets/images/";
				 $config['allowed_types']  = 'gif|jpg|png|jpeg';
				 $config['max_size']       = '5000';
				 $config['max_width']      = '5000';
				 $config['max_height']     = '5000';
				 $config['file_name']      = 'gambar-'.trim(str_replace(" ","",date('dmYHis')));
				 $this->load->library('upload', $config);
					
				if (!$this->upload->do_upload('gambar')) {
					echo "<script language=\"Javascript\">\n";
					//Ada kesalahan dalam upload gambar, Ingin diulangi kembali atau tidak?'
					echo "confirmed = window.confirm('Ada kesalahan dalam upload gambar, Ingin diulangi kembali atau tidak?');";
					echo "if (confirmed)";
					echo "{";
					echo "window.location = 'http://localhost/jst/admin/berita/tambah_berita';";
					echo "}";
					echo "else ";
					echo "{";
					echo "window.location = 'http://localhost/jst/admin/berita';";
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
					$this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menambahkan berita','class' => 'alert alert-success'));
					redirect(base_url().'admin/berita');
				}    
		}
		else
		{
			echo "error";
		}
	}
}
