<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');
?>


	<div id="content">

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>About Us</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
					</ul>
				</div>
			</div>
<?php 
	if ($b->row('deskripsi') == "") {
		redirect('home');
	}
?>
			<div class="about-box">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
						<div class="single-post-content">
								
								<h1 align="center"><?php echo $b->row('nama_profil');?></h1>
								<p><?php echo $b->row('deskripsi') ?></p>
							</div>
							
						</div>

						

						
					</div>
				</div>
			</div>

			<!-- staff-box -->
			
			
			<!-- partners box -->
			

		</div>
		<br>
<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
$this->load->view('template_frontend/js');
?>
