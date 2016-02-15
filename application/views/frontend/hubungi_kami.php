<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');

?>
<div id="content">

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Contact Us</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Contact</a></li>
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

						<div class="col-md-3">
							<div class="contact-information">
								<h3>Contact info</h3>
								<ul class="contact-information-list">
									<li><span><i class="fa fa-home"></i>lorem ipsum street</span></li>
									<li><span><i class="fa fa-phone"></i>9930 1234 5679</span></li>
									<li><a href="#"><i class="fa fa-envelope"></i>info@orbit7.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3">
							<div class="contact-information">
								<h3>Working hours</h3>
								<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit duis set odio sit amet nibh vulputate cursus </p>
								<p class="work-time"><span>Mon - Fri</span> : 10 AM to 5 PM</p>
								<p class="work-time"><span>Sat - Sun</span> : 10 AM to 2 PM</p>
							</div>
						</div>

						<div class="col-md-6">
							<h3>Send us a message</h3>
							<form id="contact-form" class="contact-work-form2">

								<div class="text-input">
									<div class="float-input">
										<input name="name" id="name2" type="text" placeholder="name">
										<span><i class="fa fa-user"></i></span>
									</div>

									<div class="float-input2">
										<input name="mail" id="mail2" type="text" placeholder="email">
										<span><i class="fa fa-envelope"></i></span>
									</div>
								</div>

								<div class="textarea-input">
									<textarea name="comment" id="comment2" placeholder="message"></textarea>
									<span><i class="fa fa-comment"></i></span>
								</div>

								<div class="msg2 message"></div>
								<input type="submit" name="mailing-submit" class="submit_contact main-form" value="Send Message">

							</form>
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
  