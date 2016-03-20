<?php 
$this->load->view('template_admin/head');
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>
<section class="content-header">
    <h1>
        Detail Gallery Jogja Science Traini
      
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Gallery</a></li>
        <li class="active">Detail Gallery</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
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
    <!-- Default box -->
    <div class="box">
       <div class="col-md-12">
                       <?php
            if($this->session->flashdata('item')) {
            $message = $this->session->flashdata('item'); ?>
            <div class="row">
             <div class="<?php echo $message['class'] ?>"><?php echo $message['message'] ?></div>
             </div>
         <?php    
          }?>
         </div>
        <div class="box-header with-border">
            <div class="row">
                    <div class="col-md-2">
                      <a href="<?php echo site_url('admin/gallery/tambah_foto/').'/'.$gallery->row('id_gallery') ?>"><button class="btn btn-block btn-info btn-lg">Tambah Photo</button></a>
                    </div>
            </div>
            <div class="row">
             <div class="col-md-2">
             </div>
            <div class="col-md-8">
            <center>
              <table class="table">
                <tr>
                  <th>Judul Gallery</th>
                  <th>:</th>
                  <td><?php echo $gallery->row('judul') ?></td>
                </tr>
                 <tr>
                  <th>Nama Pelatihan</th>
                  <th>:</th>
                  <td><?php echo $gallery->row('nama_pelatihan') ?></td>
                </tr>
                 <tr>
                  <th>Tanggal</th>
                  <th>:</th>
                  <td><?php echo DateToIndo($gallery->row('tanggal')) ?></td>
                </tr>
                 <tr>
                  <th>Deskripsi</th>
                  <th>:</th>
                  <td><?php echo $gallery->row('deskripsi') ?></td>
                </tr>
                 <tr>
                  <th>Aksi</th>
                  <th>:</th>
                  <td> <a href="javascript:void()" onclick="edit_gallery(<?php echo $gallery->row('id_gallery') ?>)"><button class="btn btn-warning">Edit Gallery</button></a></td>
                </tr>
              </table>
              </center>
              </div>
            </div>
                
        </div>
        <div class="box-body">
               <table class="table">
            <?php
            $base = base_url('assets/images/pelatihan');
            if ($foto == "") {
              echo "<center>Maaf, Tidak ada foto yang ditampilkan<center>";
            }
            else
            {
             foreach ($foto as $gambar) { ?>

                     <div class="img">
                       <div style="background:#38d7ff;margin-top:-20px">
                       <h3 align="center" style="padding:15px;color:white"> <?php echo $gambar->nama_foto ?></h3>
                       </div>
                      <a target="_blank" href="img_fjords.jpg">
                        <img src="<?php echo $base.'/'.$gambar->alamat_foto?>" alt="Trolltunga Norway" width="300" height="200">
                      </a>
                      <div class="desc">
                          <a href="javascript:void()" onclick="edit_foto(<?php echo $gambar->id_foto ?>)"><button class="btn btn-info">Edit</button></a>
                          <a href="javascript:void()" onclick="hapus_foto(<?php echo $gambar->id_foto ?>)"><button class="btn btn-danger">hapus</button></a>
                      </div>
                    </div>  

            <?php
            }
          }

            ?>
            
         </table>
        
        </div><!-- /.box-body -->
    </div><!-- /.box -->

  

</section><!-- /.content -->
<script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/jQuery/jquery-2.2.0.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/assets/datatables/dataTables.bootstrap.js') ?>"></script>

<script type="text/javascript">
var save_method; //for save method string
var table;


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

function hapus_foto(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin/gallery/ajax_hapus_foto')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                window.location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                   $('#modal_form').modal('hide');
                window.location.reload();
            }
        });
 
    }
}
function reload_table()
{
    //table.ajax.reload(null,false); //reload datatable ajax
    $( "#table" ).load( "your-current-page.html #table" );
}
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('admin/gallery/ajax_add_foto')?>";
    } else {
        url = "<?php echo site_url('admin/gallery/ajax_update_foto')?>";
    }
 
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
                alert('Berhasil menambah foto baru');
                window.location.reload();
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
             $('#modal_form').modal('hide');
                reload_table();

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
           
 
        }
    });
}
 function save_gallery()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
 
        url = "<?php echo site_url('admin/gallery/ajax_update_gallery')?>";
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form1').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_gallery').modal('hide');
                alert('Berhasil memperbarui data Gallery');
                window.location.reload();
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
             $('#modal_form').modal('hide');
                reload_table();

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
           
 
        }
    });
}
  function edit_foto(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin/gallery/ajax_edit_foto/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id_foto"]').val(data.id_foto);
            $('[name="id_gallery"]').val(data.id_gallery);
            $('[name="nama_foto"]').val(data.nama_foto);
            $('[name="alamat_foto"]').val(data.alamat_foto);
           
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Nama Foto'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function edit_gallery(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin/gallery/ajax_edit_gallery/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id_gallery"]').val(data.id_gallery);
            $('[name="id_pelatihan"]').val(data.id_pelatihan);
            $('[name="judul"]').val(data.judul);
            $('[name="deskripsi"]').val(data.deskripsi);
            $('[name="tanggal"]').val(data.tanggal);
           
            $('#modal_form_gallery').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Gallery Pelatihan'); // Set title to Bootstrap modal title
 
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
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_foto"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Foto</label>
                            <div class="col-md-9">
                                <input name="nama_foto" placeholder="Nama Foto" class="form-control" type="text">
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
<div class="modal fade" id="modal_form_gallery" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form1" class="form-horizontal">
                    <input type="hidden" value="" name="id_gallery"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Judul Gallery</label>
                            <div class="col-md-9">
                                <input name="judul" placeholder="Nama Foto" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                  
                         <div class="form-group">
                            <label class="control-label col-md-3">Deskripsi</label>
                            <div class="col-md-9">
                               <textarea class="form-control" name="deskripsi"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_gallery()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php 
$this->load->view('template_admin/js');
$this->load->view('template_admin/foot');
?>