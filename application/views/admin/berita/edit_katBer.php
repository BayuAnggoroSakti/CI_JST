<?php 
$this->load->view('template_admin/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>
  <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/ckeditor/ckeditor.js') ?>"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Kategori Berita
        <small>Form Tambah Kategori Berita</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Berita</a></li>
        <li class="active">Tambahkan kategori berita</li>
    </ol>
  <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
               
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/berita/proses_edit_katBer'); ?>">
                 <input type="hidden" name="id_katBer" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kategori berita" value="<?php echo $b->row('id_katBer');?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Kategori Berita</label>
                      <input type="text" required name="nama_katBer" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kategori berita" value="<?php echo $b->row('nama_katBer');?>">
                    </div>
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Edit</button>
                  </div>
                </form>
              </div><!-- /.box -->

              <!-- Form Element sizes -->
             

              

              <!-- Input addon -->
             

            </div><!--/.col (left) -->
             <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">List Kategori Berita</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                   <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Action</th>
                    </tr>
                  <?php 
                    $i=1;
                    if ($data_get == NULL) {
                     echo "<div class='alert alert-info' role='alert'>Data masih kosong, tolong di isi!</div>";
                    }
                    else
                    {
                    foreach ($data_get as $row) {
                     ?>

                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $row->nama_katBer; ?></td>
                      <td>
                     <a href="<?php echo base_url();?>admin/berita/edit_katBer/<?php echo $row->id_katBer; ?>">
                              <button type="button" class="btn btn-warning">Edit</button>
                          </a>
                         
                      </td>
                    </tr>
                  <?php
                    }
                  }
                  ?>
                   
                  
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- general form elements disabled -->
            
            </div><!--/.col (right) -->
            </div>
</section>
<?php 
$this->load->view('template_admin/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template_admin/foot');
?>