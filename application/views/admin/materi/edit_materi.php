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
      function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
    document.getElementById('welcomeDiv2').style.display = "block";
} 
     function hideDiv() {
   document.getElementById('welcomeDiv').style.display = "none";
    document.getElementById('welcomeDiv2').style.display = "none";
}
      function Checkfiles()
    {
        var fup = document.getElementById('filename');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if(ext == "pdf" || ext == "doc" || ext == "docx" || ext == "ppt" || ext == "xls" || ext == "xlsx" || ext == "pptx" || ext == "")
        {
            return true;
        } 
/*        else if(ext=="")
        {
            alert("No file selected");
            fup.focus();
            return false;
        }*/else
        {
            alert("Maaf file yang diperbolehkan adalah .pdf .docx .doc .ppt .pptx .xls .xlsx !");
            fup.focus();
            return false;
        }
    }


    </script>
    <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/dist/js/jquery-1.11.0.js')?>"></script>
  <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/ckeditor/ckeditor.js') ?>"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Materi
        <small>Form Edit Materi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Materi</a></li>
        <li class="active">Edit materi</li>
    </ol>
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Materi</h3>
                </div><!-- /.box-header -->
                <?php $id = $b->row('id_materi'); ?>
                <!-- form start -->
                <form action="<?php echo base_url('admin/materi/act_edit'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return Checkfiles();">
                  <div class="box-body">
                    <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id ?>"></input>
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Materi</label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo $b->row('nama_materi') ?>" name="nama_materi" class="form-control" id="judul" placeholder="Masukkan Nama Materi" required/>
                         <input type="hidden" value="<?php echo $b->row('id_materi') ?>" name="id_materi" class="form-control" id="judul" placeholder="Masukkan Nama Materi" required/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Jenis</label>
                      <div class="col-sm-10">
                       <select class="form-control" name="jenis">
                          <option <?php if ($b->row('jenis') == 'free') {
                            echo "selected";
                          } else {
                            echo "";
                            } ?> value="free">Free</option>
                          <option <?php if ($b->row('jenis') == 'member') {
                            echo "selected";
                          } else {
                            echo "";
                            } ?> value="member">Member</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Ganti Materi ?</label>
                      <div class="col-sm-6">
                      	 <input type="button" value="Ganti Materi" onclick="showDiv()"/>
                      </div>
                     
                    </div>
                    <div class="form-group" id="welcomeDiv" style="display:none;">
                      <label for="inputPassword3" class="col-sm-2 control-label"></label>
                      <div class="col-sm-6">
                        <input type="file" name="materi" id="filename" class="form-control">
                      </div>
                     
                    </div>
                    <div class="form-group" id="welcomeDiv2" style="display:none;">
                      <label for="inputPassword3" class="col-sm-2 control-label"></label>
                      <div class="col-sm-6">
                        <input type="button" value="Batal" onclick="hideDiv()"/>
                      </div>
                     
                    </div>
                      
                     <div class="form-group" id="welcomeDiv" style="display:none;">
                      <label for="inputPassword3" class="col-sm-2 control-label">Tambahkan Materi (.pdf .docx .doc .ppt .pptx .xls .xlsx)</label>
                      <div class="col-sm-10">
                        
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