<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');

?>
<script>
  function validasi_input(form){ 
    if (form.kategori_to.value =="")
      { alert("Anda belum memilih kategori Tryout!"); 
        return (false); } 
    return (true); }
  </script>
		<div id="content">

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Tryout</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Tryout</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
			<div class="col-md-1">
					
				</div>
				<div class="col-md-5">
		<?php 
			if ($this->session->userdata('level') == "member") { ?>
			<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Try Out</h3>
					  </div>
					  <div class="panel-body">
					   <div class="row">
					   	<div class="col-md-8">
					   		<div class="form-group">
						   		<table class="table">
						   		<form onsubmit="return validasi_input(this)" action="<?php echo site_url('try_out/persiapan') ?>" method="POST">
						   			<tr>
						   				<th>Pilihan Tryout</th>
						   				<td>
						   					<select name="kategori_to" class="form-control">
									   			<option value="">--Silahkan pilih--</option>
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
		<?php
			}
			else
			{ ?>

			<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-sign-in"></i> <strong>Form untuk Tryout</strong>
			</div>
			<div class="alert alert-info alert-dismissable">
			       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			        <h4><i class="icon fa fa-info"></i> Informasi!</h4>
			           	Tryout untuk Member dan non Member berbeda, silahkan melakukan registrasi untuk mendapatkan fitur penuh dari Tryout kami          
			 </div>
			<div class="panel-body">
				<form role="form" action="<?php echo site_url('try_out/persiapan') ?>"  onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
					 <div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label">Nama Lengkap</label>
                      <div class="col-sm-8">
                        <input type="text" name="nama_lengkap" class="form-control" id="judul" placeholder="Masukkan nama lengkap anda" required/>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label">Kategori </label>
                      <div class="col-sm-8">
                       <select name="kategori_to" class="form-control">
									   		<option value="">--Silahkan pilih--</option>
									   			<?php 
									   				foreach ($katTO as $data) { ?>
									   				<option value="<?php echo $data->id_katTO ?>"><?php echo $data->nama ?></option>
									   			<?php		
									   				}
									   			?>
									   		</select>
                      </div>
                    </div>
					<input style="margin-left:185px" type="submit" name="submit2" value="Mulai" class="btn btn-info">
					<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
					
				</form>
			</div>
				<div class="alert alert-success alert-dismissable">
			       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			        <h4><i class="icon fa fa-info"></i> Catatan!</h4>
			           	Untuk Non Member, soal akan dibatasi menjadi setengah dari soal yang diberikan kepada Member Jogja Science Training, Mohon untuk maklum        
			 </div>
		</div>
		<?php		
			}
		?>
		
				</div>
				<div class="col-md-5">
					<div class="panel panel-default">
					  <div class="panel-heading">Aturan Mengikuti Tryout</div>
					  <div class="panel-body">
					    <ul>
							<li>1. Jagalah kerahasiaan akun Anda. Jangan memberitahukan password kepada orang lain.</li>
							<li>2. Gantilah password secara berkala untuk mengurangi resiko pembajakan akun oleh orang lain.</li>
							<li>3. Hindari memakai password yang mudah ditebak, seperti tanggal lahir, nama anda, kata-kata umum, dsb.</li>
							<li>4. jogjasciencetraining.com tidak pernah meminta username dan password Anda melalui email. Jika ada email seperti itu, jangan di-klik link di dalamnya, karena kemungkinan besar adalah upaya phising.</li>
							<li>5. Sebelum login, pastikan dahulu bahwa URL di browser diawali <strong>http://jogjasciencetraining.com</strong>, bukan yang lainnya.</li>				
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
