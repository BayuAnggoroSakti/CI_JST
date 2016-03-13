<?php 
$this->load->view('template_admin/head');
?>
<?php
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>
 <link href="<?php echo base_url('assets/tags/jquery.tagsinput.css') ?>" rel="stylesheet" type="text/css" />


 <section class="content-header">
    <h1>
        Pelatihan
        <small>Form Tambah Pelatihan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pelatihan</a></li>
        <li class="active">Tambah Pelatihan</li>
    </ol>
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambahkan Pelatihan</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url('admin/pelatihan/act_simpan'); ?>" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Pelatihan</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama_pelatihan" class="form-control" id="judul" placeholder="Masukkan Nama Pelatihan" required/>
                      </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label">Program Kerja</label>
                            <div class="col-sm-10">
                                <select name="id_programKerja" class="form-control">
                                <option value="">--Pilih Program Kerja--</option>
                                    <?php 
                                        foreach ($data_get as $key) {?>
                                        <option value="<?php echo $key->id_programKerja; ?>"><?php echo $key->nama_programKerja; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Lokasi</label>
                      <div class="col-sm-10">
                       <textarea name="lokasi" class="form-control" rows="4" required></textarea>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Waktu Mulai</label>
                      <div class="col-sm-5">
                        <input type="date" name="waktu_mulai" class="form-control" id="waktu_mulai" placeholder="Masukkan Waktu Mulai" required/>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Waktu Selesai</label>
                      <div class="col-sm-5">
                        <input type="date" name="waktu_selesai" class="form-control" colspan="1" id="waktu_selesai" placeholder="Masukkan Waktu Selesai" required/>
                      </div>
                    </div> 
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
                      <div class="col-sm-10">
                        <textarea name="keterangan" class="form-control" rows="4" required></textarea>
                      </div>
                    </div> 
                       

                    <input style="margin-left:185px" type="submit" name="uploud" class="btn btn-info">
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                   
                    
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
 <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/jQuery/jquery-2.2.0.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/assets/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/assets/datatables/dataTables.bootstrap.js') ?>"></script>
 <script src="<?php echo base_url('assets/tags/jquery.tagsinput.js')?>"></script>

 
<script type="text/javascript">
        function validasi_input(form){ 
          if (form.waktu_mulai.value > form.waktu_selesai.value)
            { alert("Waktu selesai harus lebih besar dari waktu mulai!"); 
              return (false); } 
         else if (form.id_programKerja.value =="")
      { alert("Anda belum memilih Program Kerja!"); 
        return (false); } 
    return (true);  
        } 

    
 
</script>
 
<!-- End Bootstrap modal -->

<?php 
$this->load->view('template_admin/js_tables');
?>

<?php
$this->load->view('template_admin/foot');
?>