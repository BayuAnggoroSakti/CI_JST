<?php 
$this->load->view('template_admin/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        My Profile
      
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">My Profil</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">

        <div class="box-header with-border">
            <!-- <h3 class="box-title" align="center">Gambar Slider</h3> -->
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
             <div class="col-md-2">
              <a class="btn btn-lg btn-warning" href="javascript:void()" onclick="edit_profil(<?php echo $user->row('id_user')?>)" title="Edit Profil"><i class="glyphicon glyphicon-pencil"></i> Edit Profil</a>
            </div>
              <div class="col-md-3" >
              <a href="<?php echo site_url('admin/my_profil/edit_password') ?>"><button class="btn btn-block btn-info btn-lg"><i class="glyphicon glyphicon-lock"></i> Edit Password</button></a>
              </div>
        </div>
           
        <div class="box-body">

           <table class="table" id="table">
             <tr>
               <th>Nama Lengkap</th>
               <th>:</th>
               <td><?php echo strtoupper($user->row('nama_lengkap')) ?></td>
             </tr>
             <tr>
               <th>Username</th>
               <th>:</th>
                 <td><?php echo $user->row('username') ?></td>
             </tr>
             <tr>
               <th>Email</th>
               <th>:</th>
              <td><?php echo $user->row('email') ?></td>
             </tr>
             <tr>
               <th>Alamat</th>
               <th>:</th>
                 <td><?php echo strtoupper($user->row('alamat')) ?></td>
             </tr>
             <tr>
               <th>Asal Sekolah</th>
               <th>:</th>
                 <td><?php echo strtoupper($user->row('asal_sekolah')) ?></td>
             </tr>
           </table>
        </div><!-- /.box-body -->
        <div class="box-footer">
          
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->
 <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/jQuery/jquery-2.2.0.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/assets/datatables/dataTables.bootstrap.js') ?>"></script>

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

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
 
        url = "<?php echo site_url('admin/my_profil/ajax_update_profil')?>";
 
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
                $('#modal_form').modal('toggle');
                alert('Berhasil melakukan update');
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
        url : "<?php echo site_url('admin/my_profil/ajax_edit_profil/')?>/" + id,
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
                    <input type="hidden" value="" name="id_user"/>
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
                                <input name="username" placeholder="Username" class="form-control" disabled type="text">
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
<?php 
$this->load->view('template_admin/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template_admin/foot');
?>