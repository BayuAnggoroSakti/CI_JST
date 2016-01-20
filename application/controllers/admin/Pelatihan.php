<?php

class Pelatihan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('jst_admin');
		}
		$this->load->helper('text');
	    $this->load->model('m_pelatihan','pelatihan');
    }
 
    public function index()
    {
        //$this->load->model('m_pelatihan');
    	$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['level'] = $this->session->userdata('level');
        $data['data_get'] = $this->m_admin->program_kerja();
		$this->load->view('admin/pelatihan/index', $data);
    }

 
    public function ajax_list()
    {
        $list = $this->pelatihan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pelatihan) {
            $no++;
            $row = array();
            $row[] = $pelatihan->nama_pelatihan;
            $row[] = $pelatihan->biaya;
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
 
    public function ajax_edit($id)
    {
        $data = $this->pelatihan->get_by_id($id);
        $data->waktu_selesai = ($data->waktu_selesai == '0000-00-00') ? '' : $data->waktu_selesai; 
        $data->waktu_mulai = ($data->waktu_mulai == '0000-00-00') ? '' : $data->waktu_mulai; // if 0000-00-00 set tu empty for datepicker compatibility
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
        echo json_encode(array("status" => TRUE));
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
 
    public function ajax_delete($id)
    {
        $this->pelatihan->delete_by_id($id);
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
   
	
}
?>