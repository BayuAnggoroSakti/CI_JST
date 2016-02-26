<div class="recent-works">
				<div class="container">
					<h3>Pelatihan Jogja Science Training</h3>
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

						<!-- Wrapper for slides -->
						<div class="carousel-inner">

							<div class="item active">
								<div class="row">
									<?php 
									foreach ($gallery_g as $data) { ?>
										<div class="col-md-3">
											<div class="work-post">
												<div class="work-post-gal">
													<img alt="" src="<?php echo base_url('assets/images/pelatihan').'/'.$data->url ?>" width="250px" height="200px">
													<div class="hover-box">
														<a class="zoom" href="<?php echo base_url('assets/images/pelatihan').'/'.$data->url ?>"></a>
														
													</div>
												</div>
												<div class="work-post-content">
													<h5><?php echo $data->nama_pelatihan ?></h5>
													<span><?php echo $data->nama_program ?></span>
												</div>
											</div>
										</div>
									<?php
										} ?>
									

								</div>
							</div>

							<div class="item">
								<div class="row">

									<?php 
									foreach ($gallery_s as $data) { ?>
										<div class="col-md-3">
											<div class="work-post">
												<div class="work-post-gal">
													<img alt="" src="<?php echo base_url('assets/images/pelatihan').'/'.$data->url ?>" width="250px" height="200px">
													<div class="hover-box">
														<a class="zoom" href="<?php echo base_url('assets/images/pelatihan').'/'.$data->url ?>"></a>
														
													</div>
												</div>
												<div class="work-post-content">
													<h5><?php echo $data->nama_pelatihan ?></h5>
													<span><?php echo $data->nama_program ?></span>
												</div>
											</div>
										</div>
									<?php
										} ?>
									

								</div>

							</div>
							

						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"></a>
						<a class="right carousel-control" href="#carousel-example-generic" data-slide="next"></a>
					</div>
				</div>
			</div>