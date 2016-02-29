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

							
<div id="disqus_thread"></div>
<script>
/**
* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');

s.src = '//jogjasciencetrainingcom.disqus.com/embed.js';

s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
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
  