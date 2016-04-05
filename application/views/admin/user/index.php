<?php 
$this->load->view('template_admin/head');
?>
<?php
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>
 <link href="<?php echo base_url('assets/tags/jquery.tagsinput.css') ?>" rel="stylesheet" type="text/css" />


 <section class="content-header">
    <h1>
        List User
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User</a></li>
        <li class="active">List User</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
   <div class="box">
                <div class="box-header">
                   <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-block btn-info btn-lg" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah</button> 
                        </div>
                           <div class="col-md-2">
                             <button class="btn btn-block btn-default btn-lg" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                        </div>
                    
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsiv">
                   <table class="table table-bordered table-striped table-hover" width="100%" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Asal Sekolah</th>
                             <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

</section><!-- /.content -->
 <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/jQuery/jquery-2.2.0.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/assets/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/assets/datatables/dataTables.bootstrap.js') ?>"></script>
 <script src="<?php echo base_url('assets/tags/jquery.tagsinput.js')?>"></script>

 
<script type="text/javascript">
 
        function onAddTag(tag) {
            alert("Tambahkan Fasilitas: " + tag);
        }
        function onRemoveTag(tag) {
            alert("Removed a tag: " + tag);
        }

        function onChangeTag(input,tag) {
            alert("Changed a tag: " + tag);
        }

        $(function() {

            $('#tags_1').tagsInput({width:'auto'});
        });


var save_method; //for save method string
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "sScrollX":       "100%",
        "sScrollXInner":  "100%",
        //"sScrollY":       "250px",
        "bScrollCollapse": true,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/user/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
 
    //set input/textarea/select event when change value, remove class error and remove text help block
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
 
});
 
 
 
function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add User'); // Set Title to Bootstrap modal title
}
 
function edit_user(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin/user/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_user"]').val(data.id_user);
            $('[name="username"]').val(data.username);
            $('[name="level"]').val(data.level);
            $('[name="nama_lengkap"]').val(data.nama_lengkap);
            $('[name="email"]').val(data.email);
            $('[name="alamat"]').val(data.alamat);
            $('[name="asal_sekolah"]').val(data.asal_sekolah);
            $('[name="status"]').val(data.status);
       
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}
 
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('admin/user/ajax_add')?>";
    } else {
        url = "<?php echo site_url('admin/user/ajax_update')?>";
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
                alert('Selamat, data berhasil ditambahkan/diubah');
                reload_table();
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
 
function delete_user(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin/user/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
    }
}
 
</script>
 
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form User</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_user"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input name="username" placeholder="Username Anda" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Level</label>
                            <div class="col-md-3">
                               <select name="level" class="form-control">
                                   <option value="">Pilih</option>
                                   <option value="admin">Admin</option>
                                   <option value="member">Member</option>
                               </select>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                              <div class="col-md-9">
                                <input name="nama_lengkap" placeholder="Masukkan Nama Lengkap Anda" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                              <div class="col-md-9">
                                <input name="email" placeholder="Email Anda" class="form-control" type="email">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat Lengkap</label>
                            <div class="col-md-9">
                               <textarea name="alamat" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Asal Sekolah</label>
                            <div class="col-md-9">
                                <input name="asal_sekolah" placeholder="Asal Sekolah Anda" class="form-control tags"  type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">
                                <select name="status" class="form-control" >
                                    <option value="">Pilih</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak</option>
                                    <option value="2">Pending</option>
                                </select>
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
<!-- End Bootstrap modal -->


<?php 
$this->load->view('template_admin/js_tables');
?>

<?php
$this->load->view('template_admin/foot');
?>