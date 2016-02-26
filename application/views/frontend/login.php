<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');

?>
		<div id="content">

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Login Member</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Login</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
			<div class="col-md-1">
					
				</div>
				<div class="col-md-4">
				
						<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-sign-in"></i> <strong>Login Member</strong>
			</div>

			<div class="panel-body">
					<?php 
						if ($this->session->flashdata('pesan1')) { ?>
							<div class="alert alert-warning alert-dismissable">
			                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                    <h4><i class="icon fa fa-info"></i> Peringatan!</h4>
			                    <?php echo $this->session->flashdata('pesan1'); ?>
			                 </div>
					
					<?php	
						}
						elseif ($this->session->flashdata('pesan2')) { ?>
							<div class="alert alert-warning alert-dismissable">
			                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                    <h4><i class="icon fa fa-info"></i> Peringatan!</h4>
			                    <?php echo $this->session->flashdata('pesan2'); ?>
			                 </div>
					<?php
						}
					?>			
				<form role="form" action="<?php echo site_url('jst_member/proses_login') ?>" method="post">
					<div class="form-group input-group">
						<span class="input-group-addon">
							<i class="fa fa-user fa-fw"></i>
						</span>
						<input id="username" name="username" type="text" class="form-control" placeholder="Username">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">
							<i class="fa fa-key fa-fw"></i>
						</span>
						<input id="password" name="password" type="password" class="form-control" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-success">
						<i class="fa fa-check-square-o"></i> Login
					</button>
					| <a href="">Register</a>
					
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
