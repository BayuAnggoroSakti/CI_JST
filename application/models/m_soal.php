<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_soal extends CI_Model {
 	var $table = 'soal';
    var $column = array('kode_soal','id_katTO','soal_des','gambar','bobot','opsi_a','opsi_b','opsi_c','opsi_d','opsi_e','uraian','kunci','pembahasan','status'); //set column field database for order and search
    var $order = array('kode_soal' => 'desc'); // default order
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 function list_katTO()
   {
      $ambil = $this->db->query('SELECT * FROM kategori_to where status = "aktif"');
          if ($ambil->num_rows() > 0) {
          foreach ($ambil->result() as $data) 
          {
            $hasil[] = $data;
           }
            return $hasil;
          }
   }
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
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

   function edit_soal($id)
   {
        $query = $this->db->query("SELECT * from soal where kode_soal = '$id'");
        return $query;
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
 
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('kode_soal',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
 
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
}