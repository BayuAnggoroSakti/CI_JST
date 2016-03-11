<?php

class User extends CI_Controller {

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
	    $this->load->model('m_user','user');
    }
 
    public function index()
    {
        //$this->load->model('m_pelatihan');
    	$data['username'] = $this->session->userdata('username');
    	$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['title'] = "User || Jogja Science Training";
		$data['level'] = $this->session->userdata('level');
        //$data['data_get'] = $this->user->status();
		$this->load->view('admin/user/index', $data);
    }

 
    public function ajax_list()
    {
        $list = $this->user->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $url=site_url('admin/user/');
        foreach ($list as $user) {
            if ($user->status==1) {
                if ($user->password=="") {
                   $status = '<small class="label pull-right bg-green">Active</small><a href="'.$url.'/buat_password/'."".$user->id_user."".'">Buat password</a>';
                }
                else
                {
                  $status = '<small class="label pull-right bg-green">Active</small>';
                }       
            }
            elseif ($user->status==0) {
                 if ($user->password=="") {
                   $status = '<small class="label pull-right bg-red">Not Active</small><a href="'.$url.'/buat_password/'."".$user->id_user."".'">Buat password</a>';
                }
                else
                {
                  $status = '<small class="label pull-right bg-red">Not Active</small>';
                }      
            }
            else
            {
                  if ($user->password=="") {
                   $status = '<small class="label pull-right bg-yellow">Pending</small><a href="'.$url.'/buat_password/'."".$user->id_user."".'">Buat password</a>';
                }
                else
                {
                  $status = '<small class="label pull-right bg-yellow">Pending</small><br>';
                }      
               
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $user->username;
            $row[] = $user->level;
            $row[] = $user->nama_lengkap;
            $row[] = $user->email;
            $row[] = $user->alamat;
            $row[] = $user->asal_sekolah;
            $row[] = $status;
 
            //add html for action
            $row[] = ' <div class="btn-group">
                      <button type="button" class="btn btn-default">Action</button>
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="javascript:void()" title="Edit" onclick="edit_user('."'".$user->id_user."'".')"> Edit</a></li>
                        <li><a href="javascript:void()" title="Hapus" onclick="delete_user('."'".$user->id_user."'".')"> Delete</a></li>
                      </ul>
                    </div>
                  ';
         
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

    public function buat_password($id)
    {
        if ($id == "") {
            redirect('admin/user');
        }

        $this->load->library('form_validation');
        $data['username'] = $this->session->userdata('username');
        $data['title'] = "Edit Password || Jogja Science Training";
        $data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
        $data['level'] = $this->session->userdata('level');
        $data['id_user'] = $id;
        $data['return'] ='';
         if ($this->input->post('submit')) {
            $this->form_validation->set_rules('password_baru', 'Password', 'trim|required|min_length[5]|max_length[35]|matches[passconf]');
            $this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required|min_length[5]|max_length[35]');
            $this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
            if ($this->form_validation->run() == FALSE) {
                 $this->load->view('admin/user/buat_password', $data);
            }
            else{
                $password_baru = $this->input->post('password_baru');
                $passconf = $this->input->post('passconf');
                $pass = md5($password_baru);
                   $data = array(
                            'password' => $pass,
                    );
                   $this->db->where('id_user', $id);
                   if ($this->db->update('user', $data)) {
                       echo '<script type="text/javascript">'; 
                                echo 'alert("Selamat anda telah berhasil menambahkan password");'; 
                                echo 'window.location.href = "../index";';
                                echo '</script>';
                   }
                   else
                   {
                    echo "error query";
                   }
            }
       }
       else
       {
         $this->load->view('admin/user/buat_password', $data);
       }
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
        $data = array(
                'status' => 0,
            );
        $this->user->delete_by_id(array('id_user' => $id), $data);
        echo json_encode(array("status" => TRUE));
    }
 
/*    public function ajax_delete($id)
    {
        $this->user->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 */
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('username') == '')
        {
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'Username is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('level') == '')
        {
            $data['inputerror'][] = 'level';
            $data['error_string'][] = 'Level is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('nama_lengkap') == '')
        {
            $data['inputerror'][] = 'nama_lengkap';
            $data['error_string'][] = 'Nama Lengkap is required';
            $data['status'] = FALSE;
        }

         if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('alamat') == '')
        {
            $data['inputerror'][] = 'alamat';
            $data['error_string'][] = 'Alamat is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('asal_sekolah') == '')
        {
            $data['inputerror'][] = 'asal_sekolah';
            $data['error_string'][] = 'Asal Sekolah is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('status') == '')
        {
            $data['inputerror'][] = 'status';
            $data['error_string'][] = 'Status is required';
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