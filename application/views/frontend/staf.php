<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');
?>

<div id="content">
<!-- Button trigger modal -->

 <?php 
      function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
		$BulanIndo = array("Januari", "Februari", "Maret",
						   "April", "Mei", "Juni",
						   "Juli", "Agustus", "September",
						   "Oktober", "November", "Desember");
	
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
		
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
}

      	?>
<!-- Modal -->

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Staf Pengajar dan Alumni</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
					</ul>
				</div>
			</div>
<!-- Button trigger modal -->

			<div class="staff-box vers2">
				<div class="container">
					<h3>Staf Pengajar dan Alumni</h3>
					<div class="row">
					<?php 
					$gambar = base_url('assets/staf/');
						foreach ($data_get as $data) { ?>
					
						<div class="col-md-3">
							<div class="staff-post">
								<div class="staff-post-content">
									<h5><?php echo $data->nama_lengkap; ?></h5>
									<span><?php echo $data->bidang; ?></span>
								</div>
								<div class="staff-post-gal">
									<ul class="staf-social">
										<li><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
 												 Informasi Selengkapnya
											</button>
										</li>
										
									</ul>

									<img alt="" width="170px" height="220px" src="<?php echo $gambar."/".$data->foto; ?>">
								</div>
							</div>
						</div>
					<?php
						}
					?>
						

					</div>
				</div>
			</div>

			<!-- staff-box -->
			
			
			<!-- partners box -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Staf Pengajar / Alumni</h4>
					      </div>
     
      <div class="modal-body">
        <table cellpadding="10" cellspacing="1">
        	<tr>
        		<th>Nama Lengkap</th>
        		<th> : </th>
        		<td><?php echo $data->nama_lengkap; ?></td>
        	</tr>
        	<tr>
        		<th>Alamat</th>
        		<th> : </th>
        		<td><?php echo $data->alamat; ?></td>
        	</tr>
        	<tr>
        		<th>Tanggal Lahir</th>
        		<th> : </th>
        		<td><?php echo DateToIndo($data->tanggal_lahir); ?></td>
        	</tr>
        	<tr>
        		<th>Deskripsi</th>
        		<th> : </th>
        		<td><?php 
        				$strip= strip_tags($data->deskripsi);
        				echo $strip; 
        			?>
        		</td>
        	</tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

		</div>
			
<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
$this->load->view('template_frontend/js');
?>
