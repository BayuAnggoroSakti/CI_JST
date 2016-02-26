<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_tryout extends CI_Model {

		public function list_soal($id_katTO) 
		{
			 $ambil = $this->db->query("SELECT * from soal where id_katTO = '$id_katTO' ");
		  if ($ambil->num_rows() > 0) {
		  foreach ($ambil->result() as $data) 
		  {
		   	$hasil[] = $data;
		   }
		  	return $hasil;
		  }
		}

		public function history_to($id) 
		{
			 $ambil = $this->db->query("select distinct kt.nama as nama, t.waktu as waktu, t.nilai as nilai
from tryout t, kategori_to kt, soal s, detail d
where t.id_to = d.id_to
and d.kode_soal = s.kode_soal
and s.id_katTO = kt.id_katTO
and id_user = '$id'
order by waktu desc");
		  if ($ambil->num_rows() > 0) {
		  foreach ($ambil->result() as $data) 
		  {
		   	$hasil[] = $data;
		   }
		  	return $hasil;
		  }
		}

		public function kategori_to($id)
		{
			$this->db->from('kategori_to');
	        $this->db->where('id_katTO',$id);
	        $query = $this->db->get();
	        return $query;
		}

		public function id_tryout($id_user,$waktu)
		{
			$this->db->from('tryout');
	        $this->db->where('id_user',$id_user);
	        $this->db->where('waktu',$waktu);
	        $query = $this->db->get();
	        return $query;
		}

		public function cek_jawaban($kode_soal,$jawaban)
		{
			$this->db->from('soal');
	        $this->db->where('kode_soal',$kode_soal);
	        $this->db->where('kunci',$jawaban);
	        $query = $this->db->get();
	        if ($query->num_rows()) {
	        	return true;
	        }
	        else
	        {
	        	return false;
	        }
		}

		public function insert_tryout($data)
	    {
	    	$insert = $this->db->insert('tryout',$data);
	    	return $insert;
	    }

	    public function insert_jawaban($data)
	    {
	    	$insert = $this->db->insert('detail',$data);
	    	return $insert;
	    }
	}

?>
