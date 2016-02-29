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
var a = document.getElementById("opsi_a").value;
var b = document.getElementById("opsi_b").value;
var c = document.getElementById("opsi_c").value;
var d = document.getElementById("opsi_d").value;
var e = document.getElementById("opsi_e").value;
    if (form.kunci.value =="")
      { alert("Anda belum memilih Kunci!"); 
        return (false); } 
         if (form.id_katTO.value =="")
      { alert("Anda belum memilih kategori!"); 
        return (false); } 
         if (form.status.value =="")
      { alert("Anda belum memilih status!"); 
        return (false); } 
         if (a == b || a == c || a==d || a==e)
      { alert("Opsi jawaban tidak boleh sama, silahkan periksa kembali!"); 
        return (false); }
         if (b == c || b == d || b==e)
      { alert("Opsi jawaban tidak boleh sama, silahkan periksa kembali!"); 
        return (false); }
         if (c == d || c == e)
      { alert("Opsi jawaban tidak boleh sama, silahkan periksa kembali!"); 
        return (false); }
         if (d == e)
      { alert("Opsi jawaban tidak boleh sama, silahkan periksa kembali!"); 
        return (false); }
    return (true); }


    function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
} 
    </script>
     <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/dist/js/jquery-1.11.0.js')?>"></script>
  <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/ckeditor/ckeditor.js') ?>"></script>
 
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Soal
        <small>Form Tambah Soal</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Soal</a></li>
        <li class="active">Tambah Soal</li>
    </ol>
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Soal</h3>
                </div><!-- /.box-header -->
               
                <!-- form start -->
                <form action="<?php echo base_url('admin/soal/prosessimpan_soal');?>" enctype="multipart/form-data" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="box-body">

          
                   <div class="form-group">
                          <label class="col-sm-2 control-label">Kategori</label>
                            <div class="col-sm-4">
                                <select name="id_katTO" class="form-control">
                                <option value="">Pilih Kategori</option>
                                    <?php 
                                        foreach ($kategori as $key) {?>
                                        <option value="<?php echo $key->id_katTO; ?>"><?php echo $key->nama; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Pertanyaan</label>
                      <div class="col-sm-10">
                         <form>
                            <textarea id="editor1" name="soal_des" rows="10" cols="80" required></textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </form>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword3"  class="col-sm-2 control-label">Opsi A</label>
                      <div class="col-sm-10">
                          <input type="text" name="opsi_a" id="opsi_a" value="" class="form-control" required>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Opsi B</label>
                      <div class="col-sm-10">
                          <input type="text" name="opsi_b" id="opsi_b" value="" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3"  class="col-sm-2 control-label">Opsi C</label>
                      <div class="col-sm-10">
                          <input type="text" name="opsi_c" id="opsi_c" value="" class="form-control" required>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Opsi D</label>
                      <div class="col-sm-10">
                          <input type="text" name="opsi_d" id="opsi_d" value="" class="form-control" required>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Opsi E</label>
                      <div class="col-sm-10">
                          <input type="text" name="opsi_e" id="opsi_e" value="" class="form-control" required>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Kunci</label>
                      <div class="col-sm-3">
                         <select name="kunci" class="form-control">
                           <option value="">Silahkan pilih jawaban</option>
                           <option value="opsi_a">A</option>
                           <option value="opsi_b">B</option>
                           <option value="opsi_c">C</option>
                           <option value="opsi_d">D</option>
                           <option value="opsi_e">E</option>
                         </select>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Uraian</label>
                      <div class="col-sm-10">
                            <textarea id="editor2" name="uraian" rows="5" class="form-control" required></textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor2' );
                            </script>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Pembahasan</label>
                      <div class="col-sm-10">
                            <textarea id="editor3" name="pembahasan" rows="10" cols="80" required></textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor3' );
                            </script>
                      </div>
                    </div>    
                     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-4">
                       <select class="form-control" name="status">
                          <option value="">Pilih status soal</option>
                          <option value="active">Aktif</option>
                          <option value="not_active">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <input style="margin-left:185px" type="submit" name="uploud" class="btn btn-info">
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                   
                    
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