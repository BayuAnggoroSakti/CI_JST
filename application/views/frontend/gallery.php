<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');

?>

 
 <div id="content">
			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Gallery Pelatihan</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Gallery</a></li>
					</ul>
				</div>
			</div>

			<div class="about-box">
				<div class="container">
				<?php 
					foreach ($data_get as $gambar) { ?>
					<div class="img">
                      <a target="_blank" href="img_fjords.jpg">
                     
                        <img src="<?php echo base_url('assets/images/pelatihan')."/".$gambar->judul ?>" alt="Trolltunga Norway" width="300" height="200">
                      </a>
                      <div class="desc">
                        <p><?php echo $gambar->deskripsi ?> </p>
                      </div>
                    </div>  
				<?php
					}
				?>
					  
                    
				</div>
			</div>

			<!-- staff-box -->
			

			<!-- partners box -->
			

		</div>
<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
$this->load->view('template_frontend/js');
?>
  