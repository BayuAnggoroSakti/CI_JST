<div class="recent-works">
				<div class="container">
					<h3>Pelatihan</h3>
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

						<!-- Wrapper for slides -->
						<div class="carousel-inner">

							<div class="item active">
								<div class="row">
								<div id="owl-demo">
								<?php $base= base_url('assets/images/pelatihan');
									foreach ($gallery as $data) { ?>
								<!-- 	<div class="col-md-3">
										<div class="work-post">
											<div class="work-post-gal">
												<a class="zoom" href="<?php echo $base.'/'.$data->url ?>"><img alt="" src="<?php echo $base.'/'.$data->url ?>"></a>
												<div class="hover-box">
													<a class="zoom video" href="http://www.youtube.com/watch?v=XSGBVzeBUbk"></a>
													<a class="page" href="single-project.html"></a>
												</div>
											</div>
											<div class="work-post-content">
												<h5><?php echo $data->nama ?></h5>
											</div>
										</div>
									</div> -->

          
									  <div class="item"><img src="<?php echo $base.'/'.$data->url ?>" alt="Owl Image"></div>
									 
									
								<?php
									}
								?>
									</div>

								
								</div>

							</div>

						</div>

						<!-- Controls -->
					</div>
				</div>
			</div>