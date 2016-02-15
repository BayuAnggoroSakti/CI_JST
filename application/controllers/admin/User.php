<?php

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('jst_admin');
		}
		$this->load->helper('text');
	    $this->load->model('m_user','user');
    }
 
    public function index()
    {
        //$this->load->model('m_pelatihan');
    	$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "Pelatihan || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
        //$data['data_get'] = $this->user->status();
		$this->load->view('admin/user/index', $data);
    }

 
    public function ajax_list()
    {
        $list = $this->user->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $user->username;
            $row[] = $user->level;
            $row[] = $user->nama_lengkap;
            $row[] = $user->email;
            $row[] = $user->alamat;
            $row[] = $user->asal_sekolah;
            $row[] = $user->status;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_user('."'".$user->id_user."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_user('."'".$user->id_user."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->user->count_all(),
                        "recordsFiltered" => $this->user->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->user->get_by_id($id);
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
                 'username' => $this->input->post('username'),
                'level' => $this->input->post('level'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status' => $this->input->post('status'),
            );
        $insert = $this->user->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'username' => $this->input->post('username'),
                'level' => $this->input->post('level'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'status' => $this->input->post('status'),
            );
        $this->user->update(array('id_user' => $this->input->post('id_user')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->user->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('username') == '')
        {
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'Nama Pelatihan is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('level') == '')
        {
            $data['inputerror'][] = 'level';
            $data['error_string'][] = 'Biaya is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('nama_lengkap') == '')
        {
            $data['inputerror'][] = 'nama_lengkap';
            $data['error_string'][] = 'Lokasi is required';
            $data['status'] = FALSE;
        }

         if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Fasilitas is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('alamat') == '')
        {
            $data['inputerror'][] = 'alamat';
            $data['error_string'][] = 'Keterangan is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('asal_sekolah') == '')
        {
            $data['inputerror'][] = 'asal_sekolah';
            $data['error_string'][] = 'Please select program kerja';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('status') == '')
        {
            $data['inputerror'][] = 'status';
            $data['error_string'][] = 'Waktu Mulai is required';
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