<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');

?>
  <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/jQuery/jquery-2.2.0.min.js') ?>"></script>
<script>
    $(function() {
    $( "#tabs" ).tabs('show');
    });
</script>


<div id="content">

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Login Member</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
					</ul>
				</div>
			</div>
			<div class="row" id="tabs">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<ul class="nav nav-pills nav-stacked">
					  <li role="presentation" class="active"><a href="#tabs-1"><i class="fa fa-sign-in"></i> Home</a></li>
					  <li role="presentation"><a href="#tabs-2"><i class="fa fa-user"></i> Profile</a></li>
					  <li role="presentation"><a href="#tabs-3"><i class="fa fa-desktop"></i> Try Out</a></li>
					  <li role="presentation"><a href="#tabs-4"><i class="fa fa-book"></i> Materi</a></li>
					  <li role="presentation"><a href="#tabs-5"><i class="fa fa-power-off"></i> Logout</a></li>
					</ul>	
				</div>
				<div class="col-md-8" id="tabs-1">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Selamat Datang di halaman Member</h3>
					  </div>
					  <div class="panel-body">
					    Panel content
					  </div>
					</div>
				</div>
				<div class="col-md-8" id="tabs-2">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Profil Saya</h3>
					  </div>
					  <div class="panel-body">
					    <table class="table" cellpadding="100" cellspacing="100">
					    	<tr>
					    		<th>Nama</th>
					    		<th>:</th>
					    		<th></th>
					    		<td><?php echo $this->session->userdata('nama_lengkap'); ?></td>
					    	</tr>
					    	<tr>
					    		<th>Username</th>
					    		<th>:</th>
					    		<th></th>
					    		<td><?php echo $this->session->userdata('username'); ?></td>
					    	</tr>
					    	<tr>
					    		<th>Email</th>
					    		<th>:</th>
					    		<th></th>
					    		<td><?php echo $this->session->userdata('email'); ?></td>
					    	</tr>
					    	<tr>
					    		<th>Alamat</th>
					    		<th>:</th>
					    		<th></th>
					    		<td><?php echo $this->session->userdata('alamat'); ?></td>
					    	</tr>
					    	<tr>
					    		<th>Asal Sekolah</th>
					    		<th>:</th>
					    		<th></th>
					    		<td><?php echo $this->session->userdata('asal_sekolah'); ?></td>
					    	</tr>
					    	
					    </table>
					  </div>
					</div>
				</div>
				<div class="col-md-8" id="tabs-3">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Try Out</h3>
					  </div>
					  <div class="panel-body">
					    Panel content
					  </div>
					</div>
				</div>
				<div class="col-md-8" id="tabs-4">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Download Materi</h3>
					  </div>
					  <div class="panel-body">
					    Panel content
					  </div>
					</div>
				</div>
				<div class="col-md-8" id="tabs-5">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Terimakasih Sudah Berkunjung</h3>
					  </div>
					  <div class="panel-body">
					    <a href="<?php echo site_url('member/home/logout'); ?>"> Klik di sini</a>
					  </div>
					</div>
				</div>
			
			</div>
			<div class="row">
				
			</div>
			
			
			<!-- partners box -->
			

		</div>

<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
$this->load->view('template_frontend/js');
?>
