<?php 
$this->load->view('template_admin/head');
?>
<?php
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>
 <link href="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/multi-select.css') ?>" rel="stylesheet" type="text/css" />


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
                  <h3 class="box-title">Tambahkan pelatihan -> Staf pengajar pada pelatihan <?php echo $data->row('nama_pelatihan') ?> </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url('admin/pelatihan/act_simpan2'); ?>" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="box-body">
                    <input type="hidden" name="id_pelatihan" value="<?php echo $data->row('id_pelatihan'); ?>">
                       <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Staf Pengajar</label>
                      <div class="col-sm-5">
                      <select id='pre-selected-options' name="staf_nama[]" multiple='multiple'>
                       <?php 
                        foreach ($staf as $data) {?>
                        <option value="<?php echo $data->id_staf ?>"><?php echo $data->nama_lengkap ?></option>
                      <?php
                        }
                       ?>
                      </select> 
                   

                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-md-5"></div>
                      <div class="col-md-2">
                         <input class="btn btn-info" type="submit" name="submit" value="Submit"></input>
                      </div>
                    </div>
                     

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                   

                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/jquery.multi-select.js') ?>"></script>
 
<script type="text/javascript">
$('#pre-selected-options').multiSelect();

    function validasi_input(form)
    { 
     if (form.pre-selected-options.value =="")
      { 
        alert("Anda belum memilih Program Kerja!"); 
        return (false); 
      } 
        return (true);  
    } 

    
 

      
</script>
 
<!-- End Bootstrap modal -->

<?php 
$this->load->view('template_admin/js');
?>

<?php
$this->load->view('template_admin/foot');
?>