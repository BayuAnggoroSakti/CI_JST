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
        Berita
        <small>Form Tambah Berita</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Berita</a></li>
        <li class="active">Tambahkan berita</li>
    </ol>
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambahkan Berita</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url('admin/tambah_berita/act_simpan'); ?>" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Judul Berita</label>
                      <div class="col-sm-10">
                        <input type="text" name="judul_berita" class="form-control" id="judul" placeholder="Judul Berita" required/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Tambahkan Gambar</label>
                      <div class="col-sm-10">
                        <input type="file" name="gambar" required class="form-control" id="inputPassword3" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Isi Berita</label>
                      <div class="col-sm-10">
                         <form>
                            <textarea id="editor1" name="isi_berita" rows="10" cols="80" required>
                               
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </form>
                      </div>
                    </div>
                       <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-10">
                         <select name="id_kateBer" class="form-control">
                              <option value="pilih">Pilih Salah Satu</option>
                                  <?php  $Kat = $this->m_admin->Kategori(); foreach ($Kat as $i) { ?>
                              <option name="id_kateBer" required value="<?php echo $i['id_katBer']; ?>"><?php echo $i['nama_katBer']; ?></option>
                                  <?php } ?>
                         </select>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Status Terbit</label>
                      <div class="col-sm-10">
                       <select class="form-control" name="status_terbit">
                          <option>Y</option>
                          <option>N</option>
                        </select>
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