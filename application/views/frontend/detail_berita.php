<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');

?>
<div id="content">

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Berita</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Berita</a></li>
						<li class="active"><a href="#"><?php echo $b->row('judul_berita');?></a></li>
					</ul>		
				</div>
			</div>

			<!-- blog-box Banner -->
			<div class="blog-box with-sidebar">
				<div class="container">
					<div class="row">
						<?php 
							$gambar = base_url('assets/images/');
						?>
						<div class="col-md-9 single-post">
							<div class="single-post-content">
								<img alt="" src="<?php echo $gambar.'/'.$b->row('gambar'); ?>">
								<h2><?php echo $b->row('judul_berita');?></h2>
								<p><?php echo $b->row('isi_berita') ?></p>
							</div>

							<div class="comment-section">
							<?php
								foreach ($data_get2 as $row) {
									?>
									<h3><?php echo $row->jum." "; ?> Komentar</h3>
							<?php

								}
							?>
								

								<ul class="comment-tree">
								<?php
								if ($data_get == NULL) {
									
								}
								else
								{
									foreach ($data_get as $row) {
								
								
								?>	
								<li>
										<div class="comment-box">
											<img alt="" src="<?php echo base_url('assets/images/comment_guest.png') ?>">
											<div class="comment-content">
												<h6><?php echo $row->nama; ?> <span><?php echo $row->tanggal; ?></span></h6>
												<p><?php echo $row->isi_komentar; ?></p>
												<a class="reply-comment" href="#">reply</a>
											</div>
										</div>
										
									</li>
								<?php	
									}
								}
								?>
								
								</ul>
							</div>

							<div class="leave-comment">
								<h3>Leave a comment</h3>
								<form class="comment-form" action="<?php echo base_url('home/tambah_komentar'); ?>" method="post">
									<div class="row">

										<div class="col-md-4">
											<input type="text" name="nama" placeholder="name"/>	
											<input type="text" name="email" placeholder="e-mail"/>
											<input type="hidden" name="id_berita" value="<?php echo $b->row('id_berita'); ?>">	
										</div>

										<div class="col-md-8">
											<textarea placeholder="message" name="isi_komentar"></textarea>
											<input type="submit"  value="Add a Comment"/>
										</div>

									</div>
								</form>
							</div>
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
										<li><a class="tab-link1 active" href="#"> Popular</a></li>
										<li><a class="tab-link2" href="#"> Recent</a></li>
										<li><a class="tab-link3" href="#"> Comments</a></li>
									</ul>
									<div class="tab-box">
										<div class="tab-content active">
											<ul class="post-popular">
												<?php
												$gambar = base_url('assets/images/');
												foreach ($data_get_komentar as $komentar) {
													?>
												<li>
													<img alt="" src="<?php echo $gambar.'/'.$komentar->gambar; ?>">
													<h6><a href="<?php echo base_url();?>home/detail_berita/<?php echo $komentar->id_berita; ?>"><?php echo $komentar->judul_berita; ?></a></h6>
												</li>
											<?php		
												}
											?>
											</ul>
										</div>
										<div class="tab-content">
											<ul class="post-recent">
												<?php
												$gambar = base_url('assets/images/');
												foreach ($data_get_recent as $berita) {
													?>
												<li>
													<img alt="" src="<?php echo $gambar.'/'.$berita->gambar; ?>">
													<h6><a href="<?php echo base_url();?>home/detail_berita/<?php echo $berita->id_berita; ?>"><?php echo $berita->judul_berita; ?></a></h6>
												</li>
											<?php		
												}
											?>
											</ul>
										</div>
										<div class="tab-content">
											<ul class="post-comments">
												<li>
													<img alt="" src="images/post-img2.png">
													<h6><a href="#">Lorem Ipsum. Proin gravida nibh vel velit auctor </a></h6>
												</li>
												<li>
													<img alt="" src="images/post-img3.png">
													<h6><a href="#">Sollicitudin, lorem quis bibendum auctor, nisi elit</a></h6>
												</li>
												<li>
													<img alt="" src="images/post-img2.png">
													<h6><a href="#">Aliquet. Aenean sollicitudin, lorem quis bibendum auctor</a></h6>
												</li>
											</ul>
										</div>
									</div>
								</div>

								<div class="accordion-widget widget">
									<h5>Accordion</h5>
									<div class="accordion-box">

										<div class="accord-elem active">
											<div class="accord-title">
												<h5><i class="fa fa-question"></i>Marketplace Basics</h5>
												<a class="accord-link" href="#"></a>
											</div>
											<div class="accord-content">
												<p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec</p>
											</div>
										</div>

										<div class="accord-elem">
											<div class="accord-title">
												<h5><i class="fa fa-question"></i>Author Resources</h5>
												<a class="accord-link" href="#"></a>
											</div>
											<div class="accord-content">
												<p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec</p>
											</div>
										</div>

										<div class="accord-elem">
											<div class="accord-title">
												<h5><i class="fa fa-question"></i>Theme Requirements</h5>
												<a class="accord-link" href="#"></a>
											</div>
											<div class="accord-content">
												<p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec</p>
											</div>
										</div>
									</div>
								</div>

								<div class="tags-widget widget">
									<h5>Tags</h5>
									<ul class="tag-widget-list">
										<li><a href="#">web design</a></li>
										<li><a href="#">coding</a></li>
										<li><a href="#">wordpress</a></li>
										<li><a href="#">woo commerce</a></li>
										<li><a href="#">php</a></li>
										<li><a href="#">photography</a></li>
									</ul>
								</div>

								<div class="text-widget widget">
									<h5>Text Widget</h5>
									<p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat</p>
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
  