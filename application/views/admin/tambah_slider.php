<?php 
$this->load->view('template_admin/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>
<script type="text/javascript"> 
  function validasi_input(form){ 
    if (form.id_kateBer.value =="pilih")
      { alert("Anda belum memilih Kategori!"); 
        return (false); } 
    return (true); } 
    </script>
  <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/ckeditor/ckeditor.js') ?>"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Slider
        <small>Tambah Slider</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Slider</a></li>
        <li class="active">Tambahkan Slider</li>
    </ol>
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambahkan Slider</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url('admin/c_admin/slider_simpan'); ?>" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Silahkan upload gambar</label>
                      <div class="col-sm-10">
                        <input type="file" name="gambar" class="form-control" id="judul" placeholder="Masukkan File Gambar" required/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
                      <div class="col-sm-10">
                        <input type="text" name="deskripsi" required class="form-control" id="inputPassword3" placeholder="Deskripsi slider">
                      </div>
                    </div>
                           
                    <input style="margin-left:185px" type="submit" name="uploud" class="btn btn-info">
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