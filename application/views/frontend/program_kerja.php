<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');
?>

	<div id="content">

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Program Kerja</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Program Kerja</a></li>

					</ul>				
				</div>
			</div>

			<div class="portfolio-box with-4-col">
				<div class="container">
					<div class="portfolio-container">
					<?php 
						foreach ($program_kerja as $data) { 		

									?>
						<div class="work-post guru">
							<div class="work-post-gal">
								<img alt="" width="10px" height="200px" src="<?php echo base_url('assets/images/gambarWarna.png') ?>">
					
							</div>
							<div class="work-post-content">
								<a href="<?php echo site_url('home/detail_program'.'/'.$data->id_programKerja) ?>"><h5 align="center"><b><?php echo $data->nama_programKerja ?></b></h5> </a>
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

		</div>
<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
$this->load->view('template_frontend/js');
?>
  