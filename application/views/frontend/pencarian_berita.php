<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');
?>


	<!-- content 
			================================================== -->
		<div id="content">
			<!-- welcome-box -->
		
			<!-- recent-works-box -->
			
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
								echo '<div class="alert alert-danger alert-dismissable">
				                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				                    <h4><i class="icon fa fa-info"></i> Maaf berita yang anda cari tidak ditemukan!</h4>
				                    
				                 </div><br><a href="'.site_url('home').'"><button class="btn btn-success">Kembali</button>';
							}
							else{


							echo '<div class="alert alert-success alert-dismissable">
				                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				                    <h4><i class="icon fa fa-info"></i> Berhasil menemukan berita yang terkait</h4>
				                    
				                 </div>';
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
							}
							?>


        
        			
						</div>

						<div class="col-md-3 sidebar">
							<div class="sidebar-widgets">
							

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
  