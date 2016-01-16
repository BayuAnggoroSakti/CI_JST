<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class kodepos extends CI_Controller
{
 
    public function index()
    {
        $this->load->view('admin/kodepost_list');
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
                array('db' => 'tanggal_berita', 'dt' => 'tanggal_berita'),
                array('db' => 'gambar', 'dt' => 'gambar'),
                array('db' => 'status_terbit', 'dt' => 'status_terbit'),
                array(
                    'db' => 'id_berita',
                    'dt' => 'aksi',
                    'formatter' => function( $d ) {
                        return '<a href="' . site_url('kodepos/update/' . $d) . '">Edit</a> | <a href="' . site_url('kodepos/delete/' . $d) . '">Delete</a>';
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
 
}
 