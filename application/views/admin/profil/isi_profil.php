
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
    if (form.id_profil.value =="pilih")
      { alert("Anda belum memilih Nama Profil!"); 
        return (false); } 
    return (true); } 
    </script>
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
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
               
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/profil/proses_isi_profil'); ?>" onsubmit="return validasi_input(this)">
                  <div class="box-body">
                   <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Nama Profil</label>
                      <div class="col-sm-10">
                         <select name="id_profil" class="form-control">
                              <option value="pilih">Pilih Salah Satu</option>
                                  <?php $Kat = $this->m_admin->kategori_profil(); foreach ($Kat as $i) { ?>
                              <option name="id_profil" required value="<?php echo $i['id_profil']; ?>"><?php echo $i['nama_profil']; ?></option>
                                  <?php } ?>
                         </select>
                      </div>
                    </div>
                    <?php
                      if ($data == 'error') {
                      ?>
                      <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Pesan Error</label>
                      <div class="col-sm-10">
                          <div class="alert alert-danger" role="alert">Nama Profil tersebut sudah digunakan</div>
                      </div>
                    </div>
                     
                    <?php
                      }
                      elseif ($data == 'error_id') {
                      ?>
                       <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Pesan Error</label>
                      <div class="col-sm-10">
                          <div class="alert alert-danger" role="alert">Silahkan Masukkan Nama Profil</div>
                      </div>
                    </div>
                      <?php
                      }
                    ?>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
                      <div class="col-sm-10">
                        
                            <textarea id="editor1" name="deskripsi" rows="10" cols="80" required>
                               
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor1' );
                            </script>

                      </div>
                    </div>
                     <?php
                      if ($data == 'error_deskripsi') {
                      ?>
                      <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Pesan Error</label>
                      <div class="col-sm-10">
                          <div class="alert alert-danger" role="alert">Deskripsi Masih Kosong</div>
                      </div>
                    </div>
                     
                    <?php
                      }
               
                      ?>
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" onsubmit="return validasi_input(this)">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

              <!-- Form Element sizes -->
                        

              <!-- Input addon -->
             

            </div><!--/.col (left) -->
           
            </div>
</section>
<?php 
$this->load->view('template_admin/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template_admin/foot');
?>