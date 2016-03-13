<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');
?>

<div id="content">
<!-- Button trigger modal -->

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
<!-- Modal -->

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Staf Pengajar dan Alumni</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
					</ul>
				</div>
			</div>
<!-- Button trigger modal -->

			<div class="staff-box vers2">
				<div class="container">
					<h3>Staf Pengajar dan Alumni</h3>
					<div class="row">
					<?php 
					$gambar = base_url('assets/staf/');
						foreach ($data_get as $data) { 
					?>
					
						<div class="col-md-3">
							<div class="staff-post">
								<div class="staff-post-content">
									<h5><?php echo $data->nama_lengkap; ?></h5>
									<span><?php echo $data->bidang; ?></span>
								</div>
								<div class="staff-post-gal">
									<ul class="staf-social">
										<li>
										 <!-- <a href="javascript:void()" onclick="detail_profil(<?php echo $data->id_staf ?>)"> -->
											<button onclick="detail_profil(<?php echo $data->id_staf ?>)" type="button" class="btn btn-primary btn-lg">
 												 Informasi Selengkapnya
											</button>
										</a>
										</li>
										
									</ul>

									<img alt="" width="170px" style=" display: block;width: 100%; height: 100%;" height="220px" src="<?php echo $gambar."/".$data->foto; ?>">
								</div>
							</div>
						</div>
					<?php
						}
					?>

						

					</div>
				</div>
			</div>

		</div>

<script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/jQuery/jquery-2.2.0.min.js') ?>"></script> 
<script type="text/javascript">
var save_method;

function detail_profil(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('home/detail_staf')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
           
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Staf Pengajar / Alumni');
            $('.modal-title2').text(data.bidang);
            $('.nama_lengkap').text(data.nama_lengkap);
            $('.alamat').text(data.alamat);
            $('.tanggal_lahir').text(data.tanggal_lahir);
            $('.deskripsi').text(data.deskripsi);
            $('.bidang').text(data.bidang);
             // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
</script>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title" align="center">Person Form</h2>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <table cellpadding="10" cellspacing="1">
		        	<tr>
		        		<th>Nama Lengkap</th>
		        		<th> : </th>
		        		<td class="nama_lengkap"></td>
		        	</tr>
		        	<tr>
		        		<th>Bidang</th>
		        		<th> : </th>
		        		<td class="bidang"></td>
		        	</tr>
		        	<tr>
		        		<th>Tanggal Lahir</th>
		        		<th> : </th>
		        		<td class="tanggal_lahir"></td>
		        	</tr>
		        	<tr>
		        		<th>Alamat</th>
		        		<th> : </th>
		        		<td class="alamat"></td>
		        	</tr>
		        	<tr>
		        		<th>Deskripsi</th>
		        		<th> : </th>
		        		<td class="deskripsi"></td>
		        	</tr>
		        </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
			
<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
$this->load->view('template_frontend/js');
?>
