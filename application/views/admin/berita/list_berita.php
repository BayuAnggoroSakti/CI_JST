<?php 
$this->load->view('template_admin/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        List Berita
      
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Berita</a></li>
        <li class="active">List Berita</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Posting Berita</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-striped">
      <thead>
        <tr>
          <th width="80px">No</th>
          <th>Judul Berita</th>
          <th><span id="IL_AD8" class="IL_AD">Nama Penulis</span></th>
          <th>Gambar</th>
          <th>Kategori</th>
           <th>Status Terbit</th>
          <th width="80px">Action</th>
        </tr>
      </thead>
      <tbody>
     <?php
  if ($data_get == NULL) {
  ?>
  <div class="alert alert-info" role="alert">Data masih kosong, tolong di isi!</div>
  <?php
  } else {
    $gambar = base_url('assets/images/');
 $i=1; foreach ($data_get as $row) {
    
  ?>
        <tr>
          <td><?php echo $i++;?></td>
           <td><?php echo $row->judul_berita; ?></td>
          <td><?php echo $row->nama_lengkap; ?></td>
          <td align="center"><img src="<?php echo $gambar.'/'.$row->gambar; ?>" width="100px" height="100px"> </td>
          <td><?php echo $row->kategori; ?></td>
          <td><?php echo $row->status_terbit; ?></td>

          <td>
          <a href="<?php echo base_url();?>admin/berita/editBerita/<?php echo $row->id_berita; ?>" >
              <button type="button" class="btn btn-primary">Edit</button>
          </a>
          <a href="<?php echo base_url();?>admin/berita/hapus_berita/<?php echo $row->id_berita; ?>" onclick="return confirm('Menghapus Berita ini ?')">
              <button type="button" class="btn btn-danger">Delete</button>
          </a>
          </td>
      <?php

      }
       $i++;
  }
      ?> 
        </tr>
      </tbody>
   </table>
        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template_admin/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template_admin/foot');
?>