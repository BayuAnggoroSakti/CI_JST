<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');

?>
 
<!--   <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<!--   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" /> -->
 <script>


  function validasi_input(form){ 
    if (form.kategori_to.value =="")
      { alert("Anda belum memilih kategori Tryout!"); 
        return (false); } 
    return (true); }
  </script>


<div id="content">

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Halaman Member</h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Member</a></li>
					</ul>
				</div>
			</div>
			<div class="row" id="tabs">
			<div class="col-md-1"></div>
			<div class="col-md-2">
			  <ul class="nav nav-pills nav-stacked">
			    <li role="presentation" class="active"><a href="#tabs-1"><i class="fa fa-sign-in"></i> Home</a></li>
					  <li role="presentation"><a href="#tabs-2"><i class="fa fa-user"></i> Profile</a></li>
					  <li role="presentation"><a href="#tabs-3"><i class="fa fa-desktop"></i> Try Out</a></li>
					  <li role="presentation"><a href="#tabs-4"><i class="fa fa-book"></i> Materi</a></li>
					  <li role="presentation"><a href="#tabs-5"><i class="fa fa-power-off"></i> Logout</a></li>
			  </ul>
  			</div>
  				<div class="col-md-8" id="tabs-1">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Selamat Datang di halaman Member</h3>
					  </div>
					  <div class="panel-body">
					    Disini para member dapat melakukan aktifitas tambahan sebagai member Jogja Science Training yaitu dapat :
					    <ul>
					    	<li><b>- Try Out Online </b></li>
					    	<li><a href="<?php echo site_url('home/download') ?>"></a><b>- Download Materi premium </b></li>
					    	<li><b>- Dan lain sebagainya</b></li>
					    </ul>
					  </div>
					</div>
				</div>
 
  				<div class="col-md-8" id="tabs-2">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Profil Saya</h3>
					  </div>
					  <div class="panel-body">
					    <table class="table" cellpadding="100" cellspacing="100" id="table">
					    	<tr>
					    		<th>Nama</th>
					    		<th>:</th>
					    		<th></th>
					    		<td><?php echo $profil->nama_lengkap ?></td>
					    	</tr>
					    	<tr>
					    		<th>Username</th>
					    		<th>:</th>
					    		<th></th>
					    		<td><?php echo $profil->username ?></td>
					    	</tr>
					    	<tr>
					    		<th>Email</th>
					    		<th>:</th>
					    		<th></th>
					    		<td><?php echo $profil->email ?></td>
					    	</tr>
					    	<tr>
					    		<th>Alamat</th>
					    		<th>:</th>
					    		<th></th>
					    		<td><?php echo $profil->alamat ?></td>
					    	</tr>
					    	<tr>
					    		<th>Asal Sekolah</th>
					    		<th>:</th>
					    		<th></th>
					    		<td><?php echo $profil->asal_sekolah ?></td>
					    	</tr>
					    	
					    </table>
					      <a class="btn btn-info" href="javascript:void()" onclick="edit_profil(<?php echo $this->session->userdata('id_user');?>)" title="Edit Profil">Edit Profil</a>
					    <a class="btn btn-success" href="javascript:void()" onclick="edit_password(<?php echo $this->session->userdata('id_user');?>)" title="Ganti Password">Ganti Password</a>
					  </div>
					</div>
				</div>
  				<div class="col-md-8" id="tabs-3">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Try Out</h3>
					  </div>
					  <div class="panel-body">
					   <div class="row">
					   	<div class="col-md-8">
                        <?php 
                            if ($katTO == null) {
                                echo '  <div class="alert alert-danger alert-dismissable">
                               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info"></i> Belum Tersedia!</h4>
                                   Maaf, JST saat ini sedang mengembangkan fitur tryout agar lebih baik       
                         </div>';
                            }
                            else
                            {
                                
                        ?>
					   		<div class="form-group">
						   		<table class="table">
						   		<form onsubmit="return validasi_input(this)" action="<?php echo site_url('try_out/persiapan') ?>" method="POST">
						   			<tr>
						   				<th>Pilihan Tryout</th>
						   				<td>
						   					<select name="kategori_to" class="form-control">
								   			<option value="">--Silahkan pilih--</option>
								   			<?php 
								   				foreach ($katTO as $data) { ?>
								   				<option value="<?php echo $data->id_katTO ?>"><?php echo $data->nama ?></option>
								   			<?php		
								   				}
								   			?>
								   		</select>
						   				</td>
						   			</tr>
						   			<tr>
						   				<td>
						   				
						   					<input type="submit"  class="btn btn-info" value="MULAI" name="submit"/>
						   				</form>
						   				</td>
						   				<td>
						   					
						   				</td>
						   			</tr>
						   		</table>
					   		</div>
                            <?php 
                                }
                            ?>
					   	</div>
					   </div>
					  </div>
					</div>
					<div class="panel panel-default">
						 <div class="panel-heading">
						    <h3 class="panel-title">History</h3>
						  </div>
						  <div class="panel-body">
						  <?php if ($history_to == NULL) { 
						  	echo "Belum pernah mengikuti Tryout";
						  } 
						  else
						  	{ ?>
						  	<table class="table">
						  		<tr>
						  			<th>No</th>
						  			<th>Kategori</th>
						  			<th>Nilai</th>
						  			<th>Waktu</th>
						  		</tr>
						  	
						  			<?php 
						  			$no = 1;
						  			foreach ($history_to as $data) {  
                                        for ($i=0; $i < 5 ; $i++) { 
                                           
                                        ?>
                                        
						  		<tr>
						  			<td><?php echo $no ?></td>
						  			<td><?php echo $data->nama ?></td>
						  			<td><?php echo $data->nilai ?></td>
						  			<td><?php echo $data->waktu ?></td>
						  		</tr>
						  			<?php
						  			$no++;
						  			} 
                                }

						  			?>
						  		
						  	</table>
						  	<?php 
						  
                        }
						  	?>
                            <?php 
                                if ($no >= 5) { ?>
                                   <a href="<?php echo site_url('member/home/history').'/'.'1'.'/'.$this->session->userdata('id_user') ?>"><h3>Lihat selengkapnya. .</h3></a>
                            <?php
                                }
                            ?>
                           
						</div>
					</div>
				</div>
					<div class="col-md-8" id="tabs-4">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Download Materi</h3>
					  </div>
					  <div class="panel-body">
					    File materi yang dapat di download oleh non member dan member berbeda, silahkan mendaftar menjadi member kami untuk mendapatkan file unduhan yang lengkap
					    <p>File materi dapat di unduh di menu <a href="<?php site_url('home/download') ?>"> <b>Download </b> </a></p>
					  </div>
					</div>
				</div>
				<div class="col-md-8" id="tabs-5">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Terimakasih Sudah Berkunjung</h3>
					  </div>
					  <div class="panel-body">
					    <a href="<?php echo site_url('member/home/logout'); ?>"> Klik di sini</a>
					  </div>
					</div>
				</div>
</div>
			<div class="row">
				
			</div>
			<br>
			
			
			<!-- partners box -->
			

		</div>
		
<script type="text/javascript">
   $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
 var table;
var save_method;
  $(function() {
    $( "#tabs" ).tabs();
  });

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
 
        url = "<?php echo site_url('member/home/ajax_update_profil')?>";
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                alert("SELAMAT, anda berhasil mengganti profil anda");
                window.location.reload();
                /*var base = "<?php echo base_url(); ?>";
                window.location = base+"/admin/pelatihan/tambah_pelatihan/"+id;*/
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
 
        }
    });
}
function save2()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
 
        url = "<?php echo site_url('member/home/ajax_update_password')?>";
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form2').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form2').modal('hide');
                alert("SELAMAT, anda berhasil mengganti Password Anda");
                window.location.reload();
                /*var base = "<?php echo base_url(); ?>";
                window.location = base+"/admin/pelatihan/tambah_pelatihan/"+id;*/
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
 
        }
    });
}
function edit_profil(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('member/home/ajax_edit_profil/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id_user"]').val(data.id_user);
            $('[name="nama_lengkap"]').val(data.nama_lengkap);
            $('[name="username"]').val(data.username);
            $('[name="alamat"]').val(data.alamat);
            $('[name="asal_sekolah"]').val(data.asal_sekolah);
            $('[name="email"]').val(data.email);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function edit_password()
{
  $('#modal_form2').modal('show'); 
  $('.modal-title').text('Ganti Password');
}
</script>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Edit Profil</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" name="id_user"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input name="nama_lengkap" placeholder="Nama lengkap" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input name="username" disabled placeholder="Username" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <textarea name="alamat" placeholder="Address" rows="3" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                
                         <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" id="tags_1" placeholder="contoh : Modul, Penginapan, dll" class="form-control tags"  type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Asal Sekolah</label>
                            <div class="col-md-9">
                               <input name="asal_sekolah" id="tags_1" placeholder="Asal Sekolah" class="form-control tags"  type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal_form2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Ganti Password</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form2" class="form-horizontal">
                    <input type="hidden" name="id_user" value="<?php echo $profil->id_user ?>" />
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Password Lama</label>
                            <div class="col-md-9">
                                <input name="password_lama" placeholder="Password Lama" class="form-control" type="password">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password Baru</label>
                            <div class="col-md-9">
                                <input name="password_baru" placeholder="Password Baru Anda" class="form-control" type="password">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label col-md-3">Konfirmasi Password</label>
                            <div class="col-md-9">
                                 <input name="konfirmasi_password" placeholder="Konfirmasi Password Anda" class="form-control" type="password">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save2()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php		
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
$this->load->view('template_frontend/js');
?>
