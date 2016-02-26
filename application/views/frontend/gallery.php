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
			<div class="portfolio-box with-4-col">
				<div class="container">
					<div class="portfolio-container">
					<?php 
						foreach ($data_get as $data) { 
							$nama = $data->nama;
				

									?>
						<div class="work-post guru">
							<div class="work-post-gal">
								<img alt="" width="200px" height="200px" src="<?php echo base_url('assets/images/pelatihan')."/".$data->foto ?>">
					
							</div>
							<div class="work-post-content">
								<a href="<?php echo site_url('home/detail_gallery').'/'.$data->id_gallery ?>"><h5><?php echo $data->judul_gallery ?></h5> </a>
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
  