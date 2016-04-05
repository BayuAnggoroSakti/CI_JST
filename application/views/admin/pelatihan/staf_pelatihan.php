<?php 
$this->load->view('template_admin/head');
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>

    <link rel="stylesheet" href="<?php //echo base_url('assets/multiple/bootstrap.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/multiple/multiple-select.css') ?>" />
    <script>
     function Checkfiles()
    {
        var fup = document.getElementById('ms');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if (ext != "")
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
            alert("Maaf anda sudah memasukkan semua staf pengajar pada pelatihan ini !");
            fup.focus();
            return false;
        }
    }

       function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
    document.getElementById('welcomeDiv2').style.display = "block";
} 
     function hideDiv() {
   document.getElementById('welcomeDiv').style.display = "none";
    document.getElementById('welcomeDiv2').style.display = "none";
}
    </script>
<section class="content-header">
    <h1>
        Staf Pelatihan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pelatihan</a></li>
        <li class="active">Staf Pelatihan</li>
    </ol>
<div class="box box-info">
                <div class="box-header with-border">
                <div class="col-md-12">
                       <?php
            if($this->session->flashdata('item')) {
            $message = $this->session->flashdata('item'); ?>
            <div class="row">
             <div class="<?php echo $message['class'] ?>"><?php echo $message['message'] ?></div>
             </div>
         <?php    
          }?>
         </div>

                  <h3 class="box-title" align="center"><?php 
                  foreach ($judul as $data) { 
                    echo $data->nama_pelatihan;
                  }
                  ?></h3>

                </div><!-- /.box-header -->
                <!-- form start -->
                   <div class="box-body">
                   <table class="table table-bordered table-hover" width="100%" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Staf</th>
                            <th>Bidang</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i=1;
                          foreach ($staf as $data) { ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data->nama ?></td>
                            <td><?php echo $data->bidang ?></td>
                            <td><a href="<?php echo site_url('admin/pelatihan/hapus_staf_pelatihan')."/".$data->id.'/'.$this->uri->segment(4) ?>"><button class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button></a></td>
                          </tr>
                         <?php
                          }
                        ?>
                    </tbody>
                </table>
                <a href="<?php echo site_url('admin/pelatihan') ?>"><button class="btn btn-info"><b>Kembali</b></button></a>
                  <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo site_url('admin/pelatihan/simpan_staf_pelatihan')?>" onsubmit="return Checkfiles();">
                  <input type="hidden" name="id_pelatihan" value="<?php echo $this->uri->segment(4) ?>"></input>
                       <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label"></label>
                      <div class="col-sm-6">
                         <input type="button" class="btn btn-success" value="Tambah Staf" onclick="showDiv()"/>
                      </div>
                     
                    </div>
                    <div class="form-group" id="welcomeDiv" style="display:none;">
                      <label for="inputPassword3" class="col-sm-2 control-label"></label>
                      <div class="col-sm-6">
                         <select id="ms" name="staf[]" multiple="multiple">
                         <?php 
                            foreach ($staf3 as $data_seluruh) {
                          ?>
                              <option value="<?php echo $data_seluruh->id_staf ?>"><?php echo $data_seluruh->nama_lengkap ?></option>
                          <?php
                            }

                          ?>
                      </select>
                      </div>
                     
                    </div>
                    <div class="form-group" id="welcomeDiv2" style="display:none;">
                      <label for="inputPassword3" class="col-sm-2 control-label"></label>
                      <div class="col-sm-4">
                        <input type="button" class="btn btn-danger" value="Batal" onclick="hideDiv()"/>
                         <input type="submit" class="btn btn-info"/>
                      </div>
                     
                    </div>
                </form>
                </div><!-- /.box-body -->
              
              </div><!-- /.box -->


<script src="<?php echo base_url('assets/multiple/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/dist/js/app.min.js') ?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/multiple/multiple-select.js') ?>"></script>
<script>
    $(function() {
        $('#ms').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
</script>
</div><!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer>
</div><!-- ./wrapper -->
<?php 
//$this->load->view('template_admin/js');
$this->load->view('template_admin/foot');
?>>
