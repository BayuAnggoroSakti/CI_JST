<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');
?>

<div id="content">
<?php 
function rupiah($nilai, $pecahan = 0) {
    return number_format($nilai, $pecahan, ',', '.');
}
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
	if ($gallery->row('judul') == "") {
		redirect('home/gallery');
	}
?>
			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Gallery Pelatihan</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Gallery</a></li>
						<li><a href="#"><?php echo $gallery->row('judul') ?></a></li>
					</ul>		
				</div>
			</div>

			<!-- blog-box Banner -->
			<div class="single-project-page">
				<div class="container">
					<div class="row">
					<h2 align="center"><?php echo $gallery->row('judul') ?></h2>
					<br>
					<?php
						$base = base_url('assets/images/pelatihan');
					 ?>
						<div class="col-md-12">
							<div class="portfolio-box with-4-col">
				<div class="container">
					<div class="portfolio-container">
					<?php 
						foreach ($foto as $data) { 
									?>
						<div class="work-post guru">
							<div class="work-post-gal">
								<img alt="" width="200px" height="200px" src="<?php echo base_url('assets/images/pelatihan')."/".$data->alamat_foto ?>">
								<div class="hover-box">
									<a class="zoom" href="<?php echo base_url('assets/images/pelatihan')."/".$data->alamat_foto ?>"></a>
								</div>
							</div>
							<div class="work-post-content">
								<h5><?php echo $data->nama_foto ?></h5>
							</div>
						</div>

					<?php
						}
					?>
								
				</div>
			</div>

		

			<!-- staff-box -->
			

			<!-- partners box -->
			

		</div>
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