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
    if (form.id_kateBer.value =="")
      { alert("Anda belum memilih Kategori!"); 
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
        Berita
        <small>Form Edit Berita</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Berita</a></li>
        <li class="active">Edit berita</li>
    </ol>
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Berita</h3>
                </div><!-- /.box-header -->
                <?php
                  $id = $b->row('id_berita');
                ?>
                <!-- form start -->
                <form action="<?php echo base_url('admin/berita/prosesedit_berita').'/'.$id; ?>" enctype="multipart/form-data" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="box-body">

                  <input type="hidden" name="id_berita" value="<?php echo $b->row('id_berita');?>">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Judul Berita</label>
                      <div class="col-sm-10">
                        <input type="text" name="judul_berita" value="<?php echo $b->row('judul_berita');?>" class="form-control" id="judul" placeholder="Judul Berita" required/>
                      </div>
                    </div>
                   <!--  <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Gambar</label>
                      <div class="col-sm-10">
                      <?php $gambar = $b->row('gambar');
                      ?>
                      
                        <img src="<?php echo base_url('assets/images/').'/'.$gambar;?>" width="100px" height="100px">
                        <br>
                        <input type="button" value="Ubah Gambar" onclick="showDiv()"/>
                        <div id="welcomeDiv"  style="display:none;" class="answer_list" >
                           <input type="file" name="gambar" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                      </div>
                    </div> -->
                     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Foto</label>
                      <div class="col-sm-10">
                        <img id="thumb_image" height="200px" width="200px" src="<?=base_url()?>assets/images/<?=$b->row('gambar')?>"/><br /><br />
                        <span id="thumb_delete" class="glyphicon glyphicon-trash" style="cursor: pointer;">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label"></label>
                      <div class="col-sm-5">
                      <input rel="tooltip" title="Browse File" class="btn btn-primary" type="button" value="Browse ..." onclick="$(this).parent().find('input[type=file]').click();">
                       <input type="file" style="visibility:hidden; width: 1px; height: 1px;" id="alkes_img" name="gambar" onchange="validate_file(this)">
                   
                   </div>
                    </div>
                  
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Isi Berita</label>
                      <div class="col-sm-10">
                         <form>
                            <textarea id="editor1" name="isi_berita" rows="10" cols="80" required>
                               <?php echo $b->row('isi_berita');?>
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
                              <option value="">Pilih Salah Satu</option>
                                  <?php  $Kat = $this->m_admin->Kategori(); foreach ($Kat as $i) { ?>
                              <option name="id_kateBer" required value="<?php echo $i['id_katBer']; ?>" <?php if($i['id_katBer'] == $b->row('id_kateBer')) { echo "selected";} else { echo "";} ?> ><?php echo $i['nama_katBer']; ?></option>
                                  <?php } ?>
                         </select>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Status Terbit</label>
                      <div class="col-sm-10">
                       <select class="form-control" name="status_terbit">
                          <option value="y">Terbit</option>
                          <option value="n">Tidak Terbit</option>
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