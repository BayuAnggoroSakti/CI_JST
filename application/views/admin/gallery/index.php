<?php 
$this->load->view('template_admin/head');
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>
<section class="content-header">
    <h1>
        Gallery Jogja Science Training
      
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Gallery</a></li>
        <li class="active">List Gallery</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <div class="row">
                    <div class="col-md-2">
                      <a href=""><button class="btn btn-block btn-info btn-lg">Tambah Photo</button></a>
                    </div>
                   
                  </div>
                
        </div>
        <div class="box-body">
         <table class="table">
            <?php
            $base = base_url('assets/images/pelatihan');
             foreach ($data_get as $gambar) { ?>
                     <div class="img">
                      <a target="_blank" href="img_fjords.jpg">
                        <img src="<?php echo $base.'/'.$gambar->judul?>" alt="Trolltunga Norway" width="300" height="200">
                      </a>
                      <div class="desc">
                          <button class="btn btn-success" data-toggle="modal" data-target="#myModal">View</button>
                          <button class="btn btn-danger">Hapus</button>
                      </div>
                    </div>  

            <?php
            }

            ?>
            
         </table>
         <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Detail Photos</h4>
                          </div>
     
      <div class="modal-body">
        <center>
              <div class="img">
                      <a target="_blank" href="img_fjords.jpg">
                        <img src="<?php echo $base.'/'.$gambar->judul?>" alt="Trolltunga Norway" >
                      </a>
                    
                    </div>  
        </center>
       <table class="table">
           <tr>
             <th>Judul</th>
             <td><?php echo $gambar->judul; ?></td>
           </tr>
            <tr>
             <th>Nama Pelatihan</th>
             <td><?php echo $gambar->judul; ?></td>
           </tr>
            <tr>
            <th>Deskripsi</th>
             <td><?php echo $gambar->deskripsi; ?></td>
           </tr>
          
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 
        </div><!-- /.box-body -->
    </div><!-- /.box -->

  

</section><!-- /.content -->

<?php 
$this->load->view('template_admin/js');
$this->load->view('template_admin/foot');
?>