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
						<li><a href="#"><?php echo $b->row('nama_programKerja') ?></a></li>
					</ul>		
				</div>
			</div>
			<?php 
				if ($b->num_rows()==0) {
					redirect('home/program_kerja');
				}
				else
				{


			?>
			<!-- blog-box Banner -->
			<div class="single-project-page">
				<div class="container">
					<div class="row">
					<h2 align="center"><?php echo $b->row('nama_programKerja')?></h2>
					<br>
					<?php
						$base = base_url('assets/images/pelatihan');
					 ?>
						<div class="col-md-7">
							<div class="single-project-content">
								<img alt="" src="<?php echo base_url('assets/images/gambarWarna.png') ?>" width="450" height="500">
							</div>
						</div>
	
					<div class="col-md-5 sidebar">
							<div class="sidebar-widgets">
			
								<div class="accordion-widget widget">
									
									<div class="accordion-box">

										<div class="accord-elem active">
											<div class="accord-title">
												<h5><i class="fa fa-question"></i>Lokasi</h5>
												<a class="accord-link" href="#"></a>
											</div>
											<div class="accord-content">
												<b><?php echo $b->row('lokasi') ?></b>
											</div>
										</div>

										<div class="accord-elem">
											<div class="accord-title">
												<h5><i class="fa fa-question"></i>Biaya</h5>
												<a class="accord-link" href="#"></a>
											</div>
											<div class="accord-content">
												<b><?php echo $b->row('biaya') ?></b>
											</div>
										</div>

										<div class="accord-elem">
											<div class="accord-title">
												<h5><i class="fa fa-question"></i>Durasi</h5>
												<a class="accord-link" href="#"></a>
											</div>
											<div class="accord-content">
											<?php 
												$durasi = $b->row('durasi');
												$pisah = explode(',', $durasi);
											?>
												<b><?php echo $pisah[0] ?> hari, per hari <?php echo $pisah[1] ?> jam</b>
											</div>
										</div>
										<div class="accord-elem">
											<div class="accord-title">
												<h5><i class="fa fa-question"></i>Fasilitas</h5>
												<a class="accord-link" href="#"></a>
											</div>
											<div class="accord-content">
												<b><?php echo strtoupper($b->row('fasilitas')) ?></b>
											</div>
										</div>
										<div class="accord-elem">
											<div class="accord-title">
												<h5><i class="fa fa-question"></i>Keterangan</h5>
												<a class="accord-link" href="#"></a>
											</div>
											<div class="accord-content">
												<b><?php echo $b->row('keterangan') ?></b>
											</div>
										</div>
									</div>
								</div>
								

							</div>
						</div>
					</div>

		
								<?php 
									}
								?>			
				</div>
			</div>

		</div>
<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
$this->load->view('template_frontend/js');
?>