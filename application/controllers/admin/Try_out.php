<?php

class Try_out extends CI_Controller {

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
		$this->load->model('m_kategori_to','kategori_to');
	}

	public function kategori_to()
	{
		$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "Kategori Try Out || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
		$this->load->view('admin/try_out/kategori_to', $data);
	}

	public function ajax_add_katTO()
    {
        $this->_validate();
        $data = array(
                'nama' => $this->input->post('nama'),
                'jum_soal' => $this->input->post('jum_soal'),
                'waktu' => $this->input->post('waktu'),
            );
        $insert = $this->kategori_to->save($data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama') == '')
        {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Nama is required';
            $data['status'] = FALSE;
        }
         if($this->input->post('jum_soal') == '')
        {
            $data['inputerror'][] = 'jum_soal';
            $data['error_string'][] = 'Jumlah Soal is required';
            $data['status'] = FALSE;
        }
         if($this->input->post('waktu') == '')
        {
            $data['inputerror'][] = 'waktu';
            $data['error_string'][] = 'Waktu is required';
            $data['status'] = FALSE;
        }
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_delete_katTO($id)
    {
        $this->kategori_to->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

	public function ajax_list_katTO()
    {
        $list = $this->kategori_to->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $kategori_to) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $kategori_to->nama;
            $row[] = $kategori_to->waktu;
            $row[] = $kategori_to->jum_soal;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_katTO('."'".$kategori_to->id_katTO."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_katTO('."'".$kategori_to->id_katTO."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->kategori_to->count_all(),
                        "recordsFiltered" => $this->kategori_to->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit_katTO($id)
    {
        $data = $this->kategori_to->get_by_id($id);
        echo json_encode($data);
    }

	public function ajax_update_katTO()
    {
        $this->_validate();
        $data = array(
                'nama' => $this->input->post('nama'),
                'jum_soal' => $this->input->post('jum_soal'),
                'waktu' => $this->input->post('waktu'),
            );
        $this->kategori_to->update(array('id_katTO' => $this->input->post('id_katTO')), $data);
        echo json_encode(array("status" => TRUE));
    }
}