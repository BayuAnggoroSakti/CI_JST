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
        List Kategori Try Out
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Try Out</a></li>
        <li class="active">Kategori Try Out</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
   <div class="box">
                <div class="box-header">
                <div class="callout callout-info">
                    <h4>Kategori Tryout</h4>
                    <p>- Setelah menambahkan kategori, otomatis akan belum aktif</p>
                    <p>- Jika sudah yakin menambah soal pada setiap kategori, silahkan edit, kemudian aktifkan</p>
                    <p>- Pastikan mengaktifkan kategori jika sudah dirasa sudah siap</p>
                  </div>
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
                   <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-block btn-info btn-lg" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah</button> 
                        </div>
                           <div class="col-md-2">
                             <button class="btn btn-block btn-default btn-lg" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                        </div>
                    
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                   <table class="table table-bordered table-hover" width="100%" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori Try Out</th>
                            <th>Waktu (Menit)</th>
                            <th>Jumlah Soal</th>
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
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/try_out/ajax_list_katTO')?>",
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
    $('.modal-title').text('Add Kategori Try Out'); // Set Title to Bootstrap modal title
}
 
function edit_katTO(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin/try_out/ajax_edit_katTO/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id_katTO"]').val(data.id_katTO);
            $('[name="nama"]').val(data.nama);
            $('[name="waktu"]').val(data.waktu);
            $('[name="jum_soal"]').val(data.jum_soal);
            $('[name="status"]').val(data.status);
           
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Kategori'); // Set title to Bootstrap modal title
 
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
        url = "<?php echo site_url('admin/try_out/ajax_add_katTO')?>";
    } else {
        url = "<?php echo site_url('admin/try_out/ajax_update_katTO')?>";
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
                alert('Berhasil menambah atau mengubah data bidang');
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
 
function delete_katTO(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin/try_out/ajax_delete_katTO')?>/"+id,
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
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_katTO"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input name="nama" placeholder="Nama Kategori TO" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Waktu</label>
                            <div class="col-md-2">
                                <input name="waktu" placeholder="Dalam menit" class="form-control" type="number">
                                <span class="help-block"></span>
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Jumlah Soal</label>
                            <div class="col-md-2">
                                <input name="jum_soal" placeholder="jumlah soal" class="form-control" type="number">
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-4">
                                <select name="status" class="form-control">
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak">Tidak Aktif</option>
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