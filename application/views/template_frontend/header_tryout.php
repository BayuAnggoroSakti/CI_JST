
<header class="clearfix">
			<!-- Static navbar -->
			<div class="navbar navbar-default navbar-fixed-top" style="">
				<div class="top-line">
					<div class="container" >
						<p>
							<span><i class="fa fa-phone"></i>0856 - 2886 - 649</span>
							<span><i class="fa fa-envelope-o"></i>jogjasciencetraining@gmail.com</span>
						</p>
						<?php
							if ($this->session->userdata('level') == 'member') {?>
								<ul align="right">
									<li><a href="<?php echo site_url('home/login') ?>"> <i class="fa fa-sign-in"></i> Selamat Datang,  <?php echo $this->session->userdata('nama_lengkap'); ?></a></li>
								</ul>
						<?php
							}
							else
							{ ?>

								<ul class="social-icons">
									<li><a href="<?php echo site_url('home/login') ?>"> <i class="fa fa-sign-in"></i> Login Member </a></li>
									<li>|</li>
									<li><a href="<?php echo site_url('home/register') ?>"> <i class="fa fa-edit"></i> Register </a></li>
								
								</ul>
						<?php		
							}
						 ?>
						
					</div>
				</div>
				<div class="container" >
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php site_url('home/index') ?>"><img alt="" src="<?php echo base_url('assets/images/gambarTeksWarnaBGTerang.png') ?>" width="160" height="50"></a>
					</div>
				
				</div>
			</div>
		</header>
		<!-- End Header -->