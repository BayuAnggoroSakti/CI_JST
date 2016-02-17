<?php

class Soal extends CI_Controller {

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
		$this->load->view('admin/soal/index', $data);
	}

	public function ajax_add_soal()
    {
        $this->_validate();
        $data = array(
                'nama' => $this->input->post('nama'),
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
 
        if($this->input->post('soal_des') == '')
        {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Nama is required';
            $data['status'] = FALSE;
        }
 
     
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_delete_soal($id)
    {
        $this->soal->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function tambah_soal()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "Tambah Soal Try Out || Jogja Science Training";
        $data['level'] = $this->session->userdata('level');
        $data['kategori'] = $this->soal->list_katTO();
        $this->load->view('admin/soal/tambah_soal', $data);
    }
    public function prosessimpan_soal()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['level'] = $this->session->userdata('level');
        $id_katTO = $this->input->post('id_katTO');
        $soal_des = $this->input->post('soal_des');
        $bobot = $this->input->post('bobot');
        $opsi_a = $this->input->post('opsi_a');
        $opsi_b = $this->input->post('opsi_b');
        $opsi_c = $this->input->post('opsi_c');
        $opsi_d = $this->input->post('opsi_d');
        $opsi_e = $this->input->post('opsi_e');
        $kunci = $this->input->post('kunci');
        $uraian = $this->input->post('uraian');
        $pembahasan = $this->input->post('pembahasan');
        $status = $this->input->post('status');
        $data = array(
                            'id_katTO' => $id_katTO,
                            'soal_des' => $soal_des,
                            'bobot' => $bobot,
                            'opsi_a' => $opsi_a,
                            'opsi_b' => $opsi_b,
                            'opsi_c' => $opsi_c,
                            'opsi_d' => $opsi_d,
                            'opsi_e' => $opsi_e,
                            'uraian' => $uraian,
                            'kunci' => $kunci,
                            'pembahasan' => $pembahasan,
                            'status' => $status,
                    );
                    $this->db->insert('soal', $data);
                    redirect(base_url().'admin/soal/');
    }
	public function ajax_list_soal()
    {
        $list = $this->soal->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $soal) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $soal->soal_des;
            $row[] = $soal->bobot;
            $row[] = $soal->kunci;
            $row[] = $soal->status;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="'.site_url('admin/soal/edit_soal/' .$soal->kode_soal).'" title="Edit" onclick="edit_soal('."'".$soal->kode_soal."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_soal('."'".$soal->kode_soal."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->soal->count_all(),
                        "recordsFiltered" => $this->soal->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function prosesedit_soal()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['level'] = $this->session->userdata('level');
        $id_katTO = $this->input->post('id_katTO');
        $soal_des = $this->input->post('soal_des');
        $bobot = $this->input->post('bobot');
        $opsi_a = $this->input->post('opsi_a');
        $opsi_b = $this->input->post('opsi_b');
        $opsi_c = $this->input->post('opsi_c');
        $opsi_d = $this->input->post('opsi_d');
        $opsi_e = $this->input->post('opsi_e');
        $kunci = $this->input->post('kunci');
        $uraian = $this->input->post('uraian');
        $pembahasan = $this->input->post('pembahasan');
        $status = $this->input->post('status');
        $data = array(
                            'id_katTO' => $id_katTO,
                            'soal_des' => $soal_des,
                            'bobot' => $bobot,
                            'opsi_a' => $opsi_a,
                            'opsi_b' => $opsi_b,
                            'opsi_c' => $opsi_c,
                            'opsi_d' => $opsi_d,
                            'opsi_e' => $opsi_e,
                            'uraian' => $uraian,
                            'kunci' => $kunci,
                            'pembahasan' => $pembahasan,
                            'status' => $status,
                    );
                    $id = $this->input->post('kode_soal');
                    $this->db->where('kode_soal', $id);
                    $this->db->update('soal', $data);
                    redirect(base_url().'admin/soal/');
       
    }
    public function edit_soal($id)
    {
        $data['username'] = $this->session->userdata('username');
        $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['level'] = $this->session->userdata('level');
        $soal = $this->soal->edit_soal($id);
        $data['kategori'] = $this->soal->list_katTO();
        $data['title'] = "Edit Soal || Jogja Science Training";

        $this->load->vars('b', $soal);
        //echo $b->row('nama_materi');
        $this->load->view('admin/soal/edit_soal',$data);
    }

    public function ajax_edit_soal($id)
    {
        $data = $this->soal->get_by_id($id);
        echo json_encode($data);
    }

	public function ajax_update_soal()
    {
        $this->_validate();
        $data = array(
                'id_katTO' => $this->input->post('id_katTO'),
                'soal_des' => $this->input->post('soal_des'),
                'bobot' => $this->input->post('bobot'),
                'opsi_a' => $this->input->post('opsi_a'),
                'opsi_b' => $this->input->post('opsi_b'),
                'opsi_c' => $this->input->post('opsi_c'),
                'opsi_d' => $this->input->post('opsi_d'),
                'opsi_e' => $this->input->post('opsi_e'),
                'uraian' => $this->input->post('uraian'),
                'kunci' => $this->input->post('kunci'),
                'pembahasan' => $this->input->post('pembahasan'),
                'status' => $this->input->post('status')
            );
        $this->soal->update(array('kode_soal' => $this->input->post('kode_soal')), $data);
        echo json_encode(array("status" => TRUE));
    }
}