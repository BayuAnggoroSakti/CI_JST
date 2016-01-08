<!-- slider 
			================================================== -->
		<div id="slider">
			<!--
			#################################
				- THEMEPUNCH BANNER -
			#################################
			-->

			<div class="fullwidthbanner-container">
				<div class="fullwidthbanner">
					<ul>
						<!-- THE FIRST SLIDE -->
						
							<!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
							<?php
							$gambar = base_url('assets/images/');
							foreach ($data_ambil as $row) {
  							?>
  							<li data-transition="3dcurtain-vertical" data-slotamount="10" data-masterspeed="300">
							<img alt="<?php echo $row->deskripsi; ?>" src="<?php echo $gambar.'/'.$row->gambar; ?>" >
							</li>
							<?php
								}
							?>

					
					</ul>
				</div>
			</div>
		</div>
		<!-- End slider -->