<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_tryout extends CI_Model {

	var $table = 'tryout t';
    var $column = array('nama','t.waktu','nilai'); //set column field database for order and search
    var $order = array('waktu' => 'desc'); // default order

    private function _get_datatables_query()
    {
    	$this->db->distinct();
        $this->db->select('kt.nama as nama, t.waktu as waktu, t.nilai as nilai');
        $this->db->from($this->table);
        $this->db->where('id_user != 0');
        $this->db->join('detail d', 'd.id_to = t.id_to');
        $this->db->join('soal s', 'd.kode_soal = s.kode_soal');
        $this->db->join('kategori_to kt', 's.id_katTO = kt.id_katTO');
        $i = 0;
     
        foreach ($this->column as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

      function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

	public function list_soal($id_katTO, $limit) 
		{
			 $ambil = $this->db->query("SELECT * from soal where id_katTO = '$id_katTO' order by rand() limit $limit ");
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
