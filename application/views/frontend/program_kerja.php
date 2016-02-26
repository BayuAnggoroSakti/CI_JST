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

			<div class="portfolio-box with-3-col">
				<div class="container">
					<ul class="filter">
						<li><a href="#" class="active" data-filter="*"><i class="fa fa-th"></i>Show All</a></li>
						<li><a href="#" data-filter=".siswa">Siswa</a></li>
						<li><a href="#" data-filter=".guru">Guru</a></li>
					</ul>

					<div class="portfolio-container">
					<?php 
						foreach ($guru as $data) { 
							$nama = $data->nama;
				

									?>
						<div class="work-post guru">
							<div class="work-post-gal">
								<img alt="" width="200px" height="200px" src="<?php echo base_url('assets/images/pelatihan')."/".$data->url ?>">
								<div class="hover-box">
									<a class="zoom" href="<?php echo base_url('assets/images/pelatihan')."/".$data->url ?>"></a>
									<!-- <a class="page" href="<?php echo site_url('home/detail_program')."/".$data->id ?>"></a> -->
								</div>
							</div>
							<div class="work-post-content">
								<a href="<?php echo site_url('home/detail_program')."/".$data->id ?>"><h5><?php echo $data->nama ?></h5> </a>
								<span><?php echo $data->nama_program ?></span>
							</div>
						</div>

					<?php
						}
					?>
					<?php 
						foreach ($siswa as $data) { 
							$nama = $data->nama;

									?>
						<div class="work-post siswa">
							<div class="work-post-gal">
								<img alt="" width="200px" height="200px" src="<?php echo base_url('assets/images/pelatihan')."/".$data->url ?>">
								<div class="hover-box">
									<a class="zoom" href="<?php echo base_url('assets/images/pelatihan')."/".$data->url ?>"></a>
									
								</div>
							</div>
							<div class="work-post-content">
								<a href="<?php echo site_url('home/detail_program')."/".$data->id ?>"><h5><?php echo $data->nama ?></h5> </a>
								<span><?php echo $data->nama_program ?></span>
							</div>
						</div>

					<?php
						}
					?>

						
						
					</div>		
				</div>
			</div>

		</div>
<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
$this->load->view('template_frontend/js');
?>
  