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
    if (form.jenis.value =="pilih")
      { alert("Anda belum memilih Kategori!"); 
        return (false); } 
    return (true); } 
    </script>
  <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/dist/js/jquery-1.11.0.js')?>"></script>
  <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/ckeditor/ckeditor.js') ?>"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Staf Pengajar
        <small>Form Edit Staf</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staf</a></li>
        <li class="active">Edit Staf Pengajar</li>
    </ol>
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Staf Pengajar</h3>
                  <?php 
                    if ($error == "error") { ?>
                     <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> Periksa Kembali Form Isian Anda!</h4>
                    </div>
                  <?php
                    }
                    else
                    {
                      echo "";
                    }
                  ?>
                  <?php $id = $b->row('id_staf'); ?>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url('admin/staf/proses_edit_staf') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
                      <div class="col-sm-10">
                        <input type="hidden" value="<?php echo $b->row('id_staf'); ?>" name="id_staf" >
                        <input type="text" value="<?php echo $b->row('nama_lengkap'); ?>" name="nama_lengkap" class="form-control" id="judul" placeholder="Masukkan Nama Lengkap" required/>
                        <?php echo form_error('nama_lengkap'); ?>
                      </div>
                    </div>
          
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-10">
                        <textarea  class="form-control" name="alamat" rows="3" placeholder="Alamat Anda">
                          <?php echo $b->row('nama_lengkap'); ?>
                        </textarea>
                        <?php echo form_error('alamat'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Lahir</label>
                      <div class="col-sm-10">
                      	<input type="date" value="<?php echo $b->row('tanggal_lahir'); ?>" name="tanggal_lahir" class="form-control">
                        <?php echo form_error('tanggal_lahir'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Foto</label>
                      <div class="col-sm-10">
                        <img id="thumb_image" height="200px" width="200px" src="<?=base_url()?>assets/staf/<?=$b->row('foto')?>" /><br /><br />
                        <span id="thumb_delete" class="glyphicon glyphicon-trash" style="cursor: pointer;">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label"></label>
                      <div class="col-sm-5">
                      <input rel="tooltip" title="Browse File" class="btn btn-primary" type="button" value="Browse ..." onclick="$(this).parent().find('input[type=file]').click();">
                       <input type="file" style="visibility:hidden; width: 1px; height: 1px;" id="alkes_img" name="foto" onchange="validate_file(this)">
                    <?php echo form_error('foto'); ?>
                   </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword3"  class="col-sm-2 control-label">Bidang</label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo $b->row('bidang'); ?>" name="bidang" class="form-control">
                        <?php echo form_error('bidang'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
                      <div class="col-sm-10">
                        <textarea id="editor1" name="deskripsi" rows="10" cols="80" required>
                        <?php echo $b->row('nama_lengkap'); ?>
                        </textarea>
                        <?php echo form_error('deskripsi'); ?>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor1' );
                            </script>
                      </div>
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                   <input style="margin-left:185px" type="submit" name="uploud" class="btn btn-info">
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
   
<script>
  var staf = "<?php base_url('assets/images/no_pict.png') ?>";
    function validate_file(obj){
        var file_name = $(obj).val().replace('C:\\fakepath\\', '');
        var file_name_attr = file_name.split('.');
        file_name_attr[2] = obj.files[0].size/1024;
        
        if(file_name_attr[2] > 5000){
            $(obj).wrap('<form>').closest('form').get(0).reset();
            $(obj).unwrap();
            $(obj).parent().parent().find('.text_file').val('');
            readURL(obj, 'set');
            alert('File must jpg and maximum file size under 5 mb!');
        }
        else{
            $(obj).parent().parent().find('.text_file').val(file_name);
            $('#thumb_delete').fadeIn();
            readURL(obj);
        }
    }
    
    function readURL(input, type) {
        if (type != 'set'){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $('#thumb_image').attr('src', e.target.result);
                }
        
                reader.readAsDataURL(input.files[0]);
            }
        }
        else{
            //$('#thumb_image').attr('src','jst/assets/images/no_pict.png');
            $('#thumb_image').attr('src',staf);
        }
    }
    
    $(function(){
        $('#thumb_delete').fadeOut();
        
        $('#thumb_delete').click(function(){
            //$('#thumb_image').attr('src','jst/assets/images/no_pict.png');
            $('#thumb_image').attr('src',staf);
            var obj = $('#alkes_img');
            
            obj.wrap('<form>').closest('form').get(0).reset();
            obj.unwrap();
            obj.parent().parent().find('.text_file').val('');
            $(this).fadeOut();
        });
        
        $('#alkes_price').change(function(){
            var value = $(this).autoNumeric('get');
            $(this).parent().find('input[type="hidden"]').val(value);
        });
    });
</script>
<?php 
$this->load->view('template_admin/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template_admin/foot');
?>