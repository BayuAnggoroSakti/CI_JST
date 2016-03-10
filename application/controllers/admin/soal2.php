<?php

class Soal2 extends CI_Controller {

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
		$this->load->model('m_soal','soal');
	}

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "Soal Try Out || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
        $data['kategori'] = $this->soal->list_katTO();
          //pagination settings
        $config['base_url'] = site_url('admin/soal2/index');
        $config['total_rows'] = $this->db->count_all('soal');
        $config['per_page'] = "6";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

       $data['page'] = ($this->uri->segment(4)) ? (($this->uri->segment(4)-1)*$config['per_page']) : 0;
        
        // get books list
        $data['soal'] = $this->soal->get_soal($config["per_page"], $data['page'], NULL);
        
        $data['pagination'] = $this->pagination->create_links();
        
        // load view
		$this->load->view('admin/soal/coba', $data);
	}


}