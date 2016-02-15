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
						<li><a href="#"><?php echo $b->row('nama') ?></a></li>
					</ul>		
				</div>
			</div>

			<!-- blog-box Banner -->
			<div class="single-project-page">
				<div class="container">
					<div class="row">
					<?php
						$base = base_url('assets/images/pelatihan');
					 ?>
						<div class="col-md-9">
							<div class="single-project-content">
								<img alt="" src="<?php echo $base."/".$b->row('url') ?>">
								<h2><?php echo $b->row('nama') ?></h2>
								<p><?php echo $b->row('keterangan') ?></p>
							</div>
						</div>
	
					<div class="col-md-3 sidebar">
							<div class="sidebar-widgets">
								<div class="tags-widget widget">
									<h5>Tags</h5>
									<ul class="tag-widget-list">
										<li><a href="#">web design</a></li>
										<li><a href="#">coding</a></li>
										<li><a href="#">wordpress</a></li>
										<li><a href="#">woo commerce</a></li>
										<li><a href="#">php</a></li>
										<li><a href="#">photography</a></li>
									</ul>
								</div>

								<div class="text-widget widget">
									<h5>Text Widget</h5>
									<p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat</p>
								</div>

							</div>
						</div>
					</div>

		
											
				</div>
			</div>

		</div>
<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
$this->load->view('template_frontend/js');
?>