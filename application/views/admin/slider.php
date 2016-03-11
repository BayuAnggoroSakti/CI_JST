<?php 
$this->load->view('template_admin/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Slider
      
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Slider</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="col-md-11">
                       <?php
            if($this->session->flashdata('item')) {
            $message = $this->session->flashdata('item'); ?>
            <div class="row">
             <div class="<?php echo $message['class'] ?>"><?php echo $message['message'] ?></div>
             </div>
         <?php    
          }?>
         </div>
        <div class="box-header with-border">
            <!-- <h3 class="box-title" align="center">Gambar Slider</h3> -->
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
         
               <div class="col-md-2">
                 <a href="<?php echo base_url();?>admin/dashboard/tambah_slide"><button class="btn btn-block btn-info btn-lg">Tambah Slide</button></a>
              </div>
              <br>
       
  
        <div class="box-body">

            <table class="table table-striped">
      <thead>
        <tr>
          <th width="80px">No</th>
          <th>Gambar</th>
          <th><span id="IL_AD8" class="IL_AD">Deskripsi</span></th>
          <th width="80px">Action</th>
        </tr>
      </thead>
      <tbody>
    
     <?php
  
   
  	$gambar = base_url('assets/images/');
 $i=1; foreach ($data_get as $row) {
  	
  ?>
        <tr>
          <td><?php echo $i++;?></td>
          <td align="center"><img src="<?php echo $gambar.'/'.$row->gambar; ?>" width="100px" height="100px"> </td>
          <td><?php echo $row->deskripsi; ?></td>
          <td>
          <a href="<?php echo base_url();?>admin/dashboard/hapus_slider/<?php echo $row->id_slider; ?>" onclick="return confirm('Menghapus Slider ini ?')">
              <button type="button" class="btn btn-danger">Delete</button>
          </a>
          </td>
      <?php

      }
       $i++;
  
      ?> 
        </tr>
      </tbody>
   </table>
        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template_admin/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template_admin/foot');
?>