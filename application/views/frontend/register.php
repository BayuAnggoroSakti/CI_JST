<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');

?>


		<div id="content">

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Register Member</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Register</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
			<div class="col-md-1">
					
				</div>
				<div class="col-md-4">
				
						<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-sign-in"></i> <strong>Register Member</strong>
			</div>
				<span><?php echo $captcha_return?></span>
			<div class="panel-body">
		
				<form role="form" action="<?php echo site_url('home/register') ?>" method="post">
					<?php echo form_error('nama_lengkap'); ?>
					<div class="form-group input-group">
						<span class="input-group-addon">
							<i class="fa fa-user fa-fw"></i>
						</span>
						<input id="username" value="<?php echo set_value('nama_lengkap') ?>" name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap">
						
					</div>
					<?php echo form_error('email'); ?>
					<div class="form-group input-group">
						<span class="input-group-addon">
							<i class="fa fa-envelope fa-fw"></i>
						</span>
						<input id="username" name="email" value="<?php echo set_value('email') ?>" type="text" class="form-control" placeholder="Email anda">
					</div>
					<?php echo form_error('username'); ?>
					<div class="form-group input-group">
						<span class="input-group-addon">
							<i class="fa fa-users fa-fw"></i>
						</span>
						<input id="username" name="username" value="<?php echo set_value('username') ?>" type="text" type="text" class="form-control" placeholder="Username">
					</div>
					<?php echo form_error('password'); ?>
					<div class="form-group input-group">
						<span class="input-group-addon">
							<i class="fa fa-key fa-fw"></i>
						</span>
						<input id="password" name="password" type="password" class="form-control" placeholder="Password">
					</div>
						<?php echo form_error('passconf'); ?>
					<div class="form-group input-group">
						<span class="input-group-addon">
							<i class="fa fa-key fa-fw"></i>
						</span>
						<input id="password" name="passconf" type="password" class="form-control" placeholder="Konfirmasi Password">

					</div>
						<?php echo form_error('alamat'); ?>
					<div class="form-group input-group">
						<span class="input-group-addon">
							<i class="fa fa-home fa-fw"></i>
						</span>
						<textarea name="alamat" class="form-control" rows="3" value="<?php echo set_value('alamat') ?>" placeholder="Alamat lengkap"><?php echo set_value('alamat') ?></textarea>
					</div>
						<?php echo form_error('asal_sekolah'); ?>
					<div class="form-group input-group">
						<span class="input-group-addon">
							<i class="fa fa-school fa-fw"></i>
						</span>
						<input name="asal_sekolah" value="<?php echo set_value('asal_sekolah') ?>" class="form-control" placeholder="Asal Sekolah">
					</div>
					<div class="textfield">
					<h3>Ketik Captcha di bawah ini :</h3>
						<span class="input-group-addon">
							 <?php echo $cap_img; ?>
						</span>
					  
						<input type="text" name="captcha" class="form-control" value=""/>
					</div>
						<?php echo form_error('captcha'); ?>
					<br>
					<input type="submit"  class="btn btn-success" value="Register" name="submit"/>
					
				</form>
			</div>
		</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
					  <div class="panel-heading">Tips Keamanan</div>
					  <div class="panel-body">
					    <ul>
							<li>Jagalah kerahasiaan akun Anda. Jangan memberitahukan password kepada orang lain.</li>
							<li>Gantilah password secara berkala untuk mengurangi resiko pembajakan akun oleh orang lain.</li>
							<li>Hindari memakai password yang mudah ditebak, seperti tanggal lahir, nama anda, kata-kata umum, dsb.</li>
							<li>Projects.co.id tidak pernah meminta username dan password Anda melalui email. Jika ada email seperti itu, jangan di-klik link di dalamnya, karena kemungkinan besar adalah upaya phising.</li>
							<li>Sebelum login, pastikan dahulu bahwa URL di browser diawali <strong>https://www.projects.co.id</strong>, bukan yang lainnya.</li>				
						</ul>
					  </div>
					</div>
				</div>
			</div>
		
			
			
			<!-- partners box -->
			

		</div>
<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
$this->load->view('template_frontend/js');
?>
