<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');

?>

<div id="content">

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Hubungi Kami</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Kontak</a></li>
					</ul>		
				</div>
			</div>

			<!-- Map box -->
			<div class="map">
				
			</div>

			<!-- contact box -->
			<div class="contact-box">
				<div class="container">
					<div class="row">
					<div class="col-md-6">
							<div class="contact-information">
								<h3>Jogja Science Training</h3>
								<img style=" display: block;width: 100%; height: 200px;" src="<?php echo base_url('assets/images/gambarTeksWarnaBGTerang.png') ?>">
								<span>Jogja science Training (JST) merupakan lembaga pendidikan yang bergerak dalam pembinaan olimpiade sains dan berpusat di Yogyakarta . Pembinaan meliputi 9 bidang olimpiade sains, yakni Matematika, Fisika, Kimia, Biologi, geografi, Kebumian, Astronoli, Komouter, dan Ekonomi</span>

							</div>
						</div>
						<div class="col-md-3">
							<div class="contact-information">
								<h3>Contact info</h3>
								<ul class="contact-information-list">
									<li><span><i class="fa fa-home"></i>Karangkajen MG III//911 Yogyakarta</span></li>
									<li><span><i class="fa fa-phone"></i>Anif (081328399110)</span></li>
									<li><span><i class="fa fa-phone"></i>Rifqi (08562886649)</span></li>
									<li><a href="#"><i class="fa fa-envelope"></i>jogjasciencetraining@gmail.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3">
							<div class="contact-information">
								<h3>Kami Lebih Profesional</h3>
								<p>JST memiliki pengajar yang merupakan dosen dari universitas ternama dengan pengalaman yang banyak dalam mengajar olimpiade sains

Selain itu juga memadukan pengetahuan serta pengalaman dosen bersama dengan mahasiswa alumni OSN dalam pengajarannya</p>
							</div>
						</div>



					</div>
				</div>
			</div>

		</div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/gmap3.min.js') ?>"></script>
<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
$this->load->view('template_frontend/js');
?>
  