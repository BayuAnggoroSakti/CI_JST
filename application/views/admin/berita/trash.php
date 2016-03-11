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
      Trash Berita
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Berita</a></li>
        <li class="active">Trash</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
   <div class="box">
                <div class="box-header">
                   <div class="row">
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
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Gambar</th>
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
            "url": "<?php echo site_url('admin/berita/ajax_list_trash')?>",
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
    $('.modal-title').text('Add Pelatihan'); // Set Title to Bootstrap modal title
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
 
function delete_berita(id)
{
    if(confirm('Berita ini akan di hapus dari database, anda yakin ?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin/berita/ajax_delete_trash')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                 alert('Selamat, anda berhasil menghapus berita ini');
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

<!-- End Bootstrap modal -->

<?php 
$this->load->view('template_admin/js_tables');
?>

<?php
$this->load->view('template_admin/foot');
?>