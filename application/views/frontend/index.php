<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');
$this->load->view('template_frontend/slider');
?>


	<!-- content 
			================================================== -->
		<div id="content">
			<!-- welcome-box -->
			<div class="welcome-box" style="background:#FFEB3B">
				<div class="container">
					<h1><span>JST</span> Jogja Science Training </h1>
					<p>"Lembaga pelatihan yang membina siswa untuk mempersiapkan diri menghadapi olimpiade sains dari tingkat Kabupaten, Propinsi, dan Nasional."</p>
				</div>
			</div>

			<!-- services-box -->
			<div class="services-box">
				<div class="container">
					<div class="row">

						<div class="col-md-4">
							<div class="services-post">
								<a class="services-icon1" href="#"><i class="fa fa-user"></i></a>
								<div class="services-post-content">
									<h4>Pelatihan</h4>
									<p style="color:grey">JST melatih dan membina siswa dan guru yang akan menghadapi olimpiade</p>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="services-post">
								<a class="services-icon2" href="#"><i class="fa fa-desktop"></i></a>
								<div class="services-post-content">
									<h4>Try Out</h4>
									<p style="color:grey">JST membantu dalam pelaksanaan persiapan awal menghadapi SK dan membantu proses seleksi siswa</p>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="services-post">
								<a class="services-icon3" href="<?php echo site_url('home/download') ?>"><i class="fa fa-book"></i></a>
								<div class="services-post-content">
									<h4>Materi </h4>
									<p style="color:grey">JST menyediakan materi olimpiade yang bisa di unduh gratis</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<?php
			$this->load->view('frontend/list_pelatihan',$data);
			?>
			<!-- recent-works-box -->
			
			<br>
			<div class="title-section">
					<h1>Berita Terbaru</h1>
					<p>Menampilkan berita terbaru seputar pendidikan </p>
				</div>
			<hr border="10px">
			<!-- Blog -->
			 
			<div class="blog-box with-one-col">
				<div class="container">
					<div class="row">

						<div class="col-md-9 blog-side">
							<?php 
							$gambar = base_url('assets/images/');
							if ($data== NULL) {
								echo "Tidak ada Berita";
							}
							foreach ($data as $row) {
							
							?>
							<div class="item news-item">
								
									<div class="list-group-item" style="background:#dddddd"> 
  										<div class="inner-item">
									<img alt="tidak ada gambar" src="<?php echo $gambar.'/'.$row->gambar; ?>" width="200px" height="150px">
									<div class="hover-item">
										<ul>
											<li><a class="autor" href="#"><i class="fa fa-user"></i><?php echo $row->nama_lengkap; ?></a></li>
											<li><a class="date" href="#"><i class="fa fa-clock-o"></i> <?php echo $row->tanggal_berita; ?></a></li>
											<li><a class="comment-numb" href="#"><i class="fa fa-comments"></i> 16 Comments</a></li>
										</ul>
									</div>
								</div>
							          <a href="<?php echo base_url();?>home/detail_berita/<?php echo $row->id_berita; ?>"><h4 class="list-group-item-heading"><span class="fa fa-book" aria-hidden="true"></span><?php echo ' '.$row->judul_berita; ?></h4></a>
							         
							          <b class="list-group-item-text">Penulis </b><?php echo $row->nama_lengkap; ?><br>
							          <b class="list-group-item-text">Kategori </b><?php echo $row->kategori; ?><br>
							          <?php
								$pecah = $row->isi_berita;
								$strip = strip_tags($pecah);
								$isi_berita = substr($strip,0,250);
								?>
								 <?php echo $isi_berita." . . ."; ?>
							          <br>

							        <a class="read-more" href="<?php echo base_url();?>home/detail_berita/<?php echo $row->id_berita; ?>">Selengkapnya <i class="fa fa-arrow-right"></i></a>
							        
							      </div>
										</div>
							<?php
								}
							?>


        
        				<ul class="pagination-list">
								 <?php echo $halaman ?> <!--Memanggil variable pagination-->	
							</ul>
						</div>

						<div class="col-md-3 sidebar">
							<div class="sidebar-widgets">
								<div class="search-widget widget">
									<form>
										<input type="search" placeholder="Search here..."/>
										<button type="submit">
											<i class="fa fa-search"></i>
										</button>
									</form>
								</div>

								<div class="tabs-widget widget">
									<ul class="tab-links">
										<li><a class="tab-link1 active" href="#"> Berita Terbaru</a></li>
										<li><a class="tab-link2" href="#"> Materi Terbaru</a></li>
										<li><a class="tab-link3" href="#"> Kategori Berita</a></li>
									</ul>
									<div class="tab-box">
										<div class="tab-content active">
										<ul class="post-recent">
												<?php
												$gambar = base_url('assets/images/');
												if ($data_get_recent == NULL) {
													echo "Belum ada berita terbaru";
												}
												else
												{
												foreach ($data_get_recent as $berita) {
													?>
												<li>
													<img alt="" src="<?php echo $gambar.'/'.$berita->gambar; ?>">
													<h6><a href="<?php echo base_url();?>home/detail_berita/<?php echo $berita->id_berita; ?>"><?php echo $berita->judul_berita; ?></a></h6>
												</li>
											<?php		
												}
											}
											?>
											</ul>
										</div>
										<div class="tab-content">
											<ul class="post-recent">
												<?php
												foreach ($data_get_recent_materi as $materi) {
													?>
												<li>
													<img alt="" src="<?php echo base_url('assets/images/favicon/android-icon-36x36.png') ?>">
													<h6><a href="<?php echo base_url();?>home/download"><?php echo $materi->nama_materi." ".$materi->type; ?></a></h6>
												</li>
											<?php		
												}
											?>
											</ul>
										</div>
										<div class="tab-content">
											<ul class="post-recent">
												<?php
												foreach ($data_get_kategori as $kategori) {
													?>
												<li>
													<img alt="" src="<?php echo base_url('assets/images/favicon/android-icon-36x36.png') ?>">
													<h6><a href=""><?php echo $kategori->nama_katBer; ?></a></h6>
												</li>
											<?php		
												}
											?>
											</ul>
										</div>
										
									</div>
								</div>

	

							
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
  