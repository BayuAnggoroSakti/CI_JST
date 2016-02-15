<?php

class Gallery extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('jst_admin');
		}
		$this->load->helper('text');
	    $this->load->model('m_gallery','gallery');
    }
 
    public function index()
    {
        //$this->load->model('m_pelatihan');
    	$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "Gallery Photo || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
        $data['data_get'] = $this->gallery->list_gallery();
		$this->load->view('admin/gallery/index', $data);
    }

    
	
}
?>