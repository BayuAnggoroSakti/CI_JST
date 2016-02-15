<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');

?>
<link href="<?php echo base_url('assets/admin/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
 
 <div id="content">
			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>About Us</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
					</ul>
				</div>
			</div>

			<div class="about-box">
				<div class="container">
					<div class="row">
						<div class="col-md-1">
							
						</div>

						<div class="col-md-10">
							<div class="skills-progress">
								<div class="panel panel-default">
								  <!-- Default panel contents -->
								  <div class="panel-heading"><h2>Informasi</h2></div>
								  <div class="panel-body">
								    <p>File materi yang dapat di download oleh non member dan member berbeda, silahkan mendaftar menjadi member kami untuk mendapatkan file unduhan yang lengkap</p>
								  </div>

								  <!-- Table -->
								  <table class="table table-hover">
								    <tr>
										<th>No</th>
										<th>Nama File</th>
										<th>Tanggal</th>
										<th>Type</th>
										<th>Jenis</th>
										<th>Aksi</th>
									</tr>
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
										<?php 

										$no = $offset+1;
											foreach ($materi as $row) { ?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $row->nama_materi; ?></td>
												<td><?php echo DateToIndo($row->tanggal);?></td>
												<td><?php echo $row->type; ?></td>
												<td><?php echo $row->jenis; ?></td>
												<td>
												<?php 
													$base = base_url('assets/materi/free')
												?>
												<form method="POST" action="<?php echo site_url('home/file') ?>">
												<input type="hidden" name="file" value="<?php echo $row->file; ?>">
												<input type="hidden" name="jenis" value="<?php echo $row->jenis; ?>">

													<button <?php 
													if ($this->session->userdata('level') == '' && $row->jenis == "member") 
													{
														echo 'disabled';
													}
													else
													{
														echo '';
													}
												?> class="btn btn-warning"><span class="glyphicon glyphicon-save" role="button"></span> Download</button>
												</form>
												</td>
											</tr>
										<?php	
										$no++;	
											}
										?>
									
								  </table>

								</div>
							</div>
							<?php echo $halaman;?>
						</div>


						<div class="col-md-1">

						</div>
					</div>
				</div>
			</div>

			<!-- staff-box -->
			

			<!-- partners box -->
			

		</div>
<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
$this->load->view('template_frontend/js');
?>
  