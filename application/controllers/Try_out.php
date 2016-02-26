<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Try_out extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_tryout');
		 if ($this->session->userdata('level')=="member") 
         {
            
         }
         else
         {
            redirect('home/login');
         }
		
	}

	public function index()
	{
		if ($this->input->post('submit')) {	
			$data['title'] = "Tryout";
			$id_katTO = $this->input->post('kategori_to');
			$data['soal'] = $this->m_tryout->list_soal($id_katTO);
			$data['kategori_to'] = $this->m_tryout->kategori_to($id_katTO);
			$tgl = date('Y-m-d H:i:s');
			$tryout = array(
							'id_user' => $this->session->userdata('id_user'),
							'waktu' => $tgl,
							'nilai' => 0,
					);
			$this->m_tryout->insert_tryout($tryout);
			$data['id_to'] = $this->m_tryout->id_tryout($this->session->userdata('id_user'),$tgl); 
			$this->load->view('frontend/try_out',$data);
		}
		else
		{
			redirect(site_url('member/home'));
		}
		
	}

	public function submit_jawaban()
	{
		$jum = $this->input->post('no');

		if ($this->input->post('submit')) {
			for ($i=1; $i<$jum ; $i++) { 
			if ($this->input->post("opsi".$i) == NULL) {
				$opsi = "Tidak Jawab";
			}
			else
			{
				$opsi = $this->input->post("opsi".$i);
			}
				$status = $this->m_tryout->cek_jawaban($this->input->post("kode_soal".$i),$this->input->post("opsi".$i));
				if ($opsi == "Tidak Jawab") {
					$status = 'TJ';
					$nilai=0;
				}
				elseif ($status == true) {
					$status = 'B';
					$nilai=4;
				}
				else
				{
					$status = 'S';
					$nilai = -1;
				}
				$detail = array(
							'kode_soal' => $this->input->post("kode_soal".$i),
							'id_to' => $this->input->post('id_to'),
							'jawaban' => $opsi,
							'status' => $status
					);
				$this->m_tryout->insert_jawaban($detail);
				$total[] = $nilai; 
				$jaw[] = $status;
				
			}
			$hasil = array_sum($total);  

			$nilai = array(
							'nilai' => $hasil,
					);
			$this->db->where('id_to', $this->input->post('id_to'));
			$this->db->update('tryout', $nilai);
			$id_katTO = $this->input->post('kategori_to');
			$data['kategori_to'] = $this->m_tryout->kategori_to($this->input->post('kategori_to'));
			$data['menu'] = $this->m_admin->detail_profil();
			$this->load->view('template_frontend/header',$data);
	        $data['title'] = "Hasil Tryout";
	        $data['hasil'] = $hasil;
			
			$tj[] = 0;
			$b[] = 0;
			$s[] = 0;
			foreach ($jaw as $jawaban) {
				if ($jawaban == 'B') {
					$b[] = 1;
				}
				elseif ($jawaban == 'S') {	
					$s[] = 1;
				}
				elseif ($jawaban == 'TS')
				{
					$tj[] = 1;
				}
				else
				{

				}
				
			}
			$benar = array_sum($b);
			$salah = array_sum($s);
			$tjawab = array_sum($tj);
			$data['benar'] = $benar;
			$data['salah'] = $salah;
			$data['tjawab'] = $tjawab;
			$this->load->view('frontend/selesai_to',$data);
			 	
		}
		else
		{
			redirect(site_url('try_out/index'));
		}
	}
}