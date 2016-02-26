
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
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">

						<li><a class="<?php if ( $this->uri->uri_string() == 'home/index' ) { echo "active";} else { echo "";} ?>" href="<?php echo site_url('home/index'); ?>">Home</a>
								
							</li>
							<li class="drop "><a href="#">Profil</a>
								<ul class="drop-down">
								<?php foreach ($menu as $data) { 
									$nama = $data->nama_profil;
									$profil = str_replace(" ", "_", $nama)
									?>
									<li><a href="<?php echo site_url('home/detail_profil/').'/'.$profil; ?>"><?php echo $data->nama_profil ?></a></li>
								<?php
								}
								 ?>
									
									<li><a <?php if ( $this->uri->uri_string() == 'home/staf' ) { echo "class='active'";} else { echo "";} ?> href="<?php echo site_url('home/staf'); ?>">Staf Pengajar</a></li>
								</ul>
							</li>
							<li><a <?php if ( $this->uri->uri_string() == 'home/program_kerja' ) { echo "class='active'";} else { echo "";} ?> href="<?php echo site_url('home/program_kerja') ?>">Program Kerja</a>
							</li>
							<li><a <?php if ( $this->uri->uri_string() == 'home/gallery' ) { echo "class='active'";} else { echo "";} ?> href="<?php echo site_url('home/gallery') ?>">Gallery Kegiatan</a>
							</li>
							<li><a  <?php if ( $this->uri->uri_string() == 'home/download' ) { echo "class='active'";} else { echo "";} ?> href="<?php echo site_url('home/download'); ?>">Download</a></li>
							<li ><a <?php if ( $this->uri->uri_string() == 'home/hubungi_kami' ) { echo "class='active'";} else { echo "";} ?> href="<?php echo site_url('home/hubungi_kami'); ?>">Hubungi Kami</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- End Header -->