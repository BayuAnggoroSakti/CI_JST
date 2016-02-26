<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');

?>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>


<div id="content">

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Halaman Member</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Member</a></li>
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
					    Disini para member dapat melakukan aktifitas tambahan sebagai member Jogja Science Training yaitu dapat :
					    <ul>
					    	<li><b>- Try Out Online </b></li>
					    	<li><a href="<?php echo site_url('home/download') ?>"></a><b>- Download Materi premium </b></li>
					    	<li><b>- Dan lain sebagainya</b></li>
					    </ul>
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
					   <div class="row">
					   	<div class="col-md-8">
					   		<div class="form-group">
						   		<table class="table">
						   		<form target="_blank" action="<?php echo site_url('try_out') ?>" method="POST">
						   			<tr>
						   				<th>Pilihan Tryout</th>
						   				<td>
						   					<select name="kategori_to" class="form-control">
								   			<option selected>--Silahkan pilih--</option>
								   			<?php 
								   				foreach ($katTO as $data) { ?>
								   				<option value="<?php echo $data->id_katTO ?>"><?php echo $data->nama ?></option>
								   			<?php		
								   				}
								   			?>
								   		</select>
						   				</td>
						   			</tr>
						   			<tr>
						   				<td>
						   				
						   					<input type="submit"  class="btn btn-info" value="MULAI" name="submit"/>
						   				</form>
						   				</td>
						   				<td>
						   					
						   				</td>
						   			</tr>
						   		</table>
					   		</div>
					   	</div>
					   </div>
					  </div>
					</div>
					<div class="panel panel-default">
						 <div class="panel-heading">
						    <h3 class="panel-title">History</h3>
						  </div>
						  <div class="panel-body">
						  	<table class="table">
						  		<tr>
						  			<th>No</th>
						  			<th>Kategori</th>
						  			<th>Nilai</th>
						  			<th>Waktu</th>
						  		</tr>
						  	
						  			<?php 
						  			$no = 1;
						  			foreach ($history_to as $data) { ?>
						  		<tr>
						  			<td><?php echo $no ?></td>
						  			<td><?php echo $data->nama ?></td>
						  			<td><?php echo $data->nilai ?></td>
						  			<td><?php echo $data->waktu ?></td>
						  		</tr>
						  			<?php
						  			$no++;
						  			} 

						  			?>
						  		
						  	</table>
						</div>
					</div>
				</div>
					<div class="col-md-8" id="tabs-4">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Download Materi</h3>
					  </div>
					  <div class="panel-body">
					    File materi yang dapat di download oleh non member dan member berbeda, silahkan mendaftar menjadi member kami untuk mendapatkan file unduhan yang lengkap
					    <p>File materi dapat di unduh di menu <a href="<?php site_url('home/download') ?>"> <b>Download </b> </a></p>
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
			<br>
			
			
			<!-- partners box -->
			

		</div>

<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');

?>
