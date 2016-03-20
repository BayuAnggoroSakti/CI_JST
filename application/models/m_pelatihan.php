<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_pelatihan extends CI_Model {
 	var $table = 'pelatihan';
    var $column = array('id_programKerja','nama_pelatihan','lokasi','waktu_mulai','waktu_selesai','keterangan'); //set column field database for order and search
    var $order = array('id_pelatihan' => 'desc'); // default order
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function list_gallery_guru()
    {
        $ambil = $this->db->query('SELECT f.alamat_foto as url, pk.nama_programKerja as nama_program, p.nama_pelatihan as nama_pelatihan from program_kerja pk, pelatihan p, gallery g, foto f where pk.id_programKerja = p.id_programKerja and p.id_pelatihan = g.id_pelatihan and g.id_gallery = f.id_gallery and pk.nama_programKerja like "%guru%" group by p.nama_pelatihan limit 4');
          if ($ambil->num_rows() > 0) {
          foreach ($ambil->result() as $data) 
          {
            $hasil[] = $data;
           }
            return $hasil;
          }
    }
      function pelatihan()
    {
        $ambil = $this->db->query('SELECT p.nama_pelatihan as nama_pelatihan, p.lokasi as lokasi, sp.nama_lengkap, p.keterangan as keterangan,p.id_pelatihan as id, p.nama_pelatihan as nama,p.waktu_mulai as waktu_mulai, p.waktu_selesai as waktu_selesai, f.alamat_foto as url, pk.nama_programKerja as nama_program from gallery g, pelatihan p, program_kerja pk, foto f, pelatihan_staf ps, staf_pengajar sp where g.id_pelatihan = p.id_pelatihan and pk.id_programKerja = p.id_programKerja and g.id_gallery = f.id_gallery and p.id_pelatihan = ps.id_pelatihan and ps.id_staf = sp.id_staf group by p.id_pelatihan');
          if ($ambil->num_rows() > 0) {
          foreach ($ambil->result() as $data) 
          {
            $hasil[] = $data;
           }
            return $hasil;
          }
    }
     function detailPelatihanByID($id)
    {
        $ambil = $this->db->query("SELECT p.lokasi as lokasi, sp.nama_lengkap, p.keterangan as keterangan,p.id_pelatihan as id, p.nama_pelatihan as nama,p.waktu_mulai as waktu_mulai, p.waktu_selesai as waktu_selesai, f.alamat_foto as url, pk.nama_programKerja as nama_program from gallery g, pelatihan p, program_kerja pk, foto f, pelatihan_staf ps, staf_pengajar sp where g.id_pelatihan = p.id_pelatihan and pk.id_programKerja = p.id_programKerja and g.id_gallery = f.id_gallery and p.id_pelatihan = ps.id_pelatihan and ps.id_staf = sp.id_staf and p.id_pelatihan = '$id'");
           return $ambil;
    }
     function detailPelatihanByStaf($id)
    {
        $ambil = $this->db->query("SELECT p.lokasi as lokasi, sp.bidang as bidang, sp.nama_lengkap, p.keterangan as keterangan,p.id_pelatihan as id, p.nama_pelatihan as nama,p.waktu_mulai as waktu_mulai, p.waktu_selesai as waktu_selesai, f.alamat_foto as url, pk.nama_programKerja as nama_program from gallery g, pelatihan p, program_kerja pk, foto f, pelatihan_staf ps, staf_pengajar sp where g.id_pelatihan = p.id_pelatihan and pk.id_programKerja = p.id_programKerja and g.id_gallery = f.id_gallery and p.id_pelatihan = ps.id_pelatihan and ps.id_staf = sp.id_staf and p.id_pelatihan = '$id' group by sp.nama_lengkap");
           return $ambil;
    }

      function program_kerja()
    {
        $ambil = $this->db->query('SELECT * from program_kerja order by nama_programKerja');
          if ($ambil->num_rows() > 0) {
          foreach ($ambil->result() as $data) 
          {
            $hasil[] = $data;
           }
            return $hasil;
          }
    }

    function list_gallery_siswa()
    {
        $ambil = $this->db->query('SELECT f.alamat_foto as url, pk.nama_programKerja as nama_program, p.nama_pelatihan as nama_pelatihan from program_kerja pk, pelatihan p, gallery g, foto f where pk.id_programKerja = p.id_programKerja and p.id_pelatihan = g.id_pelatihan and g.id_gallery = f.id_gallery and pk.nama_programKerja like "%siswa%" group by p.nama_pelatihan limit 4');
          if ($ambil->num_rows() > 0) {
          foreach ($ambil->result() as $data) 
          {
            $hasil[] = $data;
           }
            return $hasil;
          }
    }
     function pelatihan_guru()
    {
        $ambil = $this->db->query('SELECT distinct p.id_pelatihan as id, p.nama_pelatihan as nama,f.alamat_foto as url, pk.nama_programKerja as nama_program from gallery g, pelatihan p, program_kerja pk, foto f where g.id_pelatihan = p.id_pelatihan and pk.id_programKerja = p.id_programKerja and g.id_gallery = f.id_gallery and pk.nama_programKerja like "%guru%" group by p.nama_pelatihan');
          if ($ambil->num_rows() > 0) {
          foreach ($ambil->result() as $data) 
          {
            $hasil[] = $data;
           }
            return $hasil;
          }
    }
    function pelatihan_siswa()
    {
        $ambil = $this->db->query('SELECT distinct p.id_pelatihan as id, p.nama_pelatihan as nama,f.alamat_foto as url, pk.nama_programKerja as nama_program from gallery g, pelatihan p, program_kerja pk, foto f where g.id_pelatihan = p.id_pelatihan and pk.id_programKerja = p.id_programKerja and g.id_gallery = f.id_gallery and pk.nama_programKerja like "%siswa%" group by p.nama_pelatihan');
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
        $this->db->where('id_pelatihan',$id);
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
 
    public function delete_by_id($id)
    {
        $this->db->where('id_pelatihan', $id);
        $this->db->delete($this->table);
    }
}