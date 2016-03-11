<?php 
$this->load->view('template_admin/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>

    <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/dist/js/jquery-1.11.0.js')?>"></script>
  <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/ckeditor/ckeditor.js') ?>"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Password
        <small>Form Edit Password</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">My Profil</a></li>
        <li class="active">Edit Password</li>
    </ol>
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Password</h3>

        <span><?php echo $return?></span>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url('admin/user/buat_password'.'/'.$id_user); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="box-body">
              
                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password_baru" class="form-control" id="judul" placeholder="Masukkan password anda" required/>
                        <?php echo form_error('password_baru'); ?>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Ulangi Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="passconf" class="form-control" id="judul" placeholder="Ulangi Password" required/>
                         <?php echo form_error('passconf'); ?>
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