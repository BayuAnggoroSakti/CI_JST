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
        $this->load->model('m_tryout','tryout');
	}

    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "List Tryout || Jogja Science Training";
        $data['level'] = $this->session->userdata('level');
        $this->load->view('admin/try_out/index', $data);
    }


	public function kategori_to()
	{
		$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "Kategori Try Out || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
		$this->load->view('admin/try_out/kategori_to', $data);
	}

    public function ajax_list_tryout()
    {
        $list = $this->tryout->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $tryout) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $tryout->nama_lengkap;
            $row[] = $tryout->nama;
            $row[] = $tryout->waktu;
            $row[] = $tryout->nilai;
            //add html for action
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->tryout->count_all(),
                        "recordsFiltered" => $this->tryout->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function ajax_add_katTO()
    {
        $this->_validate();
        $data = array(
                'nama' => $this->input->post('nama'),
                'jum_soal' => $this->input->post('jum_soal'),
                'waktu' => $this->input->post('waktu'),
                'status' => 'tidak'
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
         if($this->input->post('jum_soal') % 2 != 0)
        {
            $data['inputerror'][] = 'jum_soal';
            $data['error_string'][] = 'Jumlah soal harus genap';
            $data['status'] = FALSE;
        }
         if($this->input->post('waktu') % 2 != 0)
        {
            $data['inputerror'][] = 'waktu';
            $data['error_string'][] = 'waktu soal harus genap';
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
        $data = array(
                'status' => 'tidak',
            );
        $this->kategori_to->delete_by_id(array('id_katTO' => $id), $data);
        echo json_encode(array("status" => TRUE));
    }

	public function ajax_list_katTO()
    {
        $list = $this->kategori_to->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $kategori_to) {
            if ($kategori_to->status=='aktif') {
               $status = '<small class="label pull-right bg-green">Active</small>';
            }
            elseif ($kategori_to->status=='tidak') {
                $status = '<small class="label pull-right bg-red">Not Active</small>';
            }
            else
            {
                $status = '<small class="label pull-right bg-yellow">Pending</small><br>';
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $kategori_to->nama;
            $row[] = $kategori_to->waktu;
            $row[] = $kategori_to->jum_soal;
            $row[] = $status;
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
                'status' => $this->input->post('status'),
            );
        $this->kategori_to->update(array('id_katTO' => $this->input->post('id_katTO')), $data);
        echo json_encode(array("status" => TRUE));
    }
}