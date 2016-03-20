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
                <div class="col-md-12">
                    <div class="callout callout-success">
                    <h4>Gallery Pelatihan Jogja Science Training</h4>
                    <p>- Silahkan tambah gallery jika ingin menambah sebuah gallery baru di pelatihan tertentu</p>
                    <p>- Klik menu view jika ingin melihat detail gallery beserta foto - foto yang ada di gallery tersebut</p>
                    <p>- Perhatian !, menghapus gallery menyebabkan foto - foto yang ada di gallery tersebut akan terhapus</p>
                  </div>
                  </div>
                </div>
                  <div class="row">
                    <div class="col-md-2">
                      <a href="<?php echo site_url('admin/gallery/tambah_gallery') ?>"><button class="btn btn-block btn-info btn-lg">Tambah Gallery</button></a>
                    </div>
                   
                  </div>
        </div>
        <div class="box-body">
         <table class="table">
            <?php
            if ($data_get == "") {
              echo "<center> Maaf, Tidak ada Gallery yang dapat ditampilkan </center>";
            }
            else
            {
            $base = base_url('assets/images/pelatihan');
             foreach ($data_get as $gambar) { ?>

                     <div class="img">
                       <div style="background:#38d7ff;margin-top:-20px">
                       <h3 align="center" style="padding:15px;color:white"> <?php echo $gambar->judul_gallery ?></h3>
                       </div>
                        <img src="<?php echo $base.'/'.$gambar->foto?>" alt="Trolltunga Norway" width="300" height="200">
                      <div class="desc">
                          <a href="<?php echo site_url('admin/gallery/detail_gallery')."/".$gambar->id_gallery ?>"><button class="btn btn-success">View</button></a>
                         
                          <a href="<?php echo site_url('admin/gallery/hapus_gallery'."/".$gambar->id_gallery) ?>"onclick="return confirm('Yakin Menghapus Gallery ini ?')" > <button class="btn btn-danger">Hapus</button></a>
                      </div>
                    </div>  

            <?php
            }
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