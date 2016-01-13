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
        Profil
        <small>Form Tambah Profil</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Berita</a></li>
        <li class="active">Tambahkan berita</li>
    </ol>
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Profil</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url('admin/profil/proses_tambah_profil'); ?>" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Profil</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama_profil" class="form-control" id="judul" placeholder="Judul Berita" required/>
                      </div>
                    </div>
                  
                    <input style="margin-left:185px" type="submit" name="submit" class="btn btn-info">
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                   
                    
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->

<?php 
$this->load->view('template_admin/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template_admin/foot');
?>