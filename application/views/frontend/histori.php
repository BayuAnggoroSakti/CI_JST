
								  <!-- Table -->
								  <table class="table table-hover">
								    <tr>
										<th>No</th>
										<th>Nama File</th>
										<th>Tanggal</th>
										<th>Nilai</th>
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
											foreach ($histori as $row) { ?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $row->nama; ?></td>
												<td><?php echo DateToIndo($row->waktu);?></td>
												<td><?php echo $row->nilai; ?></td>
												
											</tr>
										<?php	
										$no++;	
											}
										?>
									
								  </table>

								</div>
							</div>
							<?php echo $halaman;?>
					
  