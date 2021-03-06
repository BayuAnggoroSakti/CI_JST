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
        Profil Jogja Science Training
      
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profil</a></li>
        <li class="active">List Profil</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
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
        <div class="box-header with-border">
            <div class="row">
                    <div class="col-md-2">
                      <a href="<?php echo site_url('admin/profil/tambah_profil') ?>"><button class="btn btn-block btn-info btn-lg">Tambah Profil</button></a>
                    </div>
                   
                  </div>
                
        </div>
        <div class="box-body">
            <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th width="80px">No</th>
          <th>Kategori Profil</th>
          <th><span id="IL_AD8" class="IL_AD">Deskripsi</span></th>
          <th>Action</th>
        
        </tr>
      </thead>
      <tbody>
    	<?php if ($new == NULL)
    		{
    			echo "Data Kosong";
    		}

    	 else
    	 {
    	 			$i=1;
    	 	foreach ($new as $row) {
          $strip = strip_tags($row->deskripsi);
          $pecah = substr($strip, 0, 150);
    	 
    	 		?>
    	 		<tr> 
    	 		<td> <?php echo $i++;?></td>
    	 		<td> <?php echo $row->nama_profil;?></td>
    	 		<td> <?php echo $pecah.'. . .';?></td>
    	 		<td> 
    	 		<div class="btn-group">
                      <button type="button" class="btn btn-info">Action</button>
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo site_url('admin/profil/edit_profil/').'/'.$row->id_profil; ?>">Edit</a></li>
                        <li><a href="<?php echo site_url('admin/profil/hapus_profil/').'/'.$row->id_profil; ?>"onclick="return confirm('Yakin Menghapus Profil ini ?')" >Hapus</a></li>
       
                      </ul>
                    </div></td>
    	 		</tr>
    	 <?php

    	 }
    	     	 $i++;
    	 }
    	 	?>

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