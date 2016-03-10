<?php 
$this->load->view('template_admin/head');
?>
<?php
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>
 <link href="<?php echo base_url('assets/tags/jquery.tagsinput.css') ?>" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/dist/js/jquery-1.11.0.js')?>"></script>
  <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/ckeditor/ckeditor.js') ?>"></script>

 <section class="content-header">
    <h1>
        List Soal Try Out
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Soal</a></li>
        <li class="active">List Soal</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
   <div class="box">
                <div class="box-header">
                   <div class="row">
                        <div class="col-md-2">
                            <a href="<?php echo site_url('admin/soal/tambah_soal') ?>"><button class="btn btn-block btn-info btn-lg"><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
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
                            <th>Kategori</th>
                            <th>Pertanyaan</th>
                            <th>Kunci</th>
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
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/soal/ajax_list_soal')?>",
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
 
function edit_soal(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin/soal/ajax_edit_soal/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            
            $('[name="kode_soal"]').val(data.kode_soal);
            $('[name="id_katTO"]').val(data.id_katTO);
            $('[name="soal_des"]').val(data.soal_des);
            $('[name="gambar"]').val(data.gambar);
            $('[name="bobot"]').val(data.bobot);
            $('[name="opsi_a"]').val(data.opsi_a);
            $('[name="opsi_b"]').val(data.opsi_b);
            $('[name="opsi_c"]').val(data.opsi_c);
            $('[name="opsi_d"]').val(data.opsi_d);
            $('[name="opsi_e"]').val(data.opsi_e);
            $('[name="uraian"]').val(data.uraian);
            $('[name="kunci"]').val(data.kunci);
            $('[name="pembahasan"]').val(data.pembahasan);
               var instance = CKEDITOR.instances['editor1'];    
               var instance2 = CKEDITOR.instances['editor2']; 
               var instance3 = CKEDITOR.instances['editor3'];        
                if (instance) {         
                    instance.destroy();
                    instance = null;
                    instance2.destroy();
                    instance2 = null;
                    instance3.destroy();
                    instance3 = null;
                }
                else
                {
                     CKEDITOR.replace('editor1');
                     CKEDITOR.replace('editor2');
                     CKEDITOR.replace('editor3');
                }
               
          
   

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Soal'); // Set title to Bootstrap modal title
 
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
        url = "<?php echo site_url('admin/soal/ajax_update_soal')?>";
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
 
function delete_soal(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin/soal/ajax_delete_soal')?>/"+id,
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
                    <input type="text" value="" name="kode_soal"/>
                    <div class="form-body">
                         <div class="form-group">
                            <label class="control-label col-md-3">Kategori</label>
                            <div class="col-md-9">
                                <select name="id_katTO" class="form-control">
                                    <?php 
                                        foreach ($kategori as $key) {?>
                                        <option value="<?php echo $key->id_katTO; ?>"><?php echo $key->nama; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
            
                    <div class="form-group">
                      <label for="inputPassword3" class="control-label col-md-3">Deskripsi Soal</label>
                      <div class="col-md-9">
                         <form>
                            <textarea name="soal_des" id="editor1"  required>
                               
                            </textarea>
                            <script>
                               CKEDITOR.replace('editor1');
                                
                            </script>
                        </form>
                      </div>
                    </div>
                    
                        <div class="form-group">
                            <label class="control-label col-md-3">Bobot</label>
                            <div class="col-md-9">
                                <input name="bobot" placeholder="Nama Kategori TO" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Opsi A</label>
                            <div class="col-md-9">
                                <input name="opsi_a" placeholder="Pilihan A" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Opsi A</label>
                            <div class="col-md-9">
                                <input name="opsi_a" placeholder="Pilihan A" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Opsi B</label>
                            <div class="col-md-9">
                                <input name="opsi_b" placeholder="Pilihan B" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Opsi C</label>
                            <div class="col-md-9">
                                <input name="opsi_c" placeholder="Pilihan C" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Opsi D</label>
                            <div class="col-md-9">
                                <input name="opsi_d" placeholder="Pilihan D" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Opsi E</label>
                            <div class="col-md-9">
                                <input name="opsi_e" placeholder="Pilihan E" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                     <div class="form-group">
                      <label for="inputPassword3" class="control-label col-md-3">Uraian</label>
                      <div class="col-md-9">
                         <form>
                            <textarea name="uraian" id="editor2"  required>
                               
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                
                            </script>
                        </form>
                      </div>
                    </div>
                      <div class="form-group">
                            <label class="control-label col-md-3">Kunci</label>
                            <div class="col-md-9">
                                <input name="kunci" placeholder="Masukkan kunci jawaban" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                      <label for="inputPassword3" class="control-label col-md-3">Pembahasan</label>
                      <div class="col-md-9">
                         <form>
                            <textarea name="uraian" id="editor3"  required>
                               
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                
                            </script>
                        </form>
                      </div>
                      </div>
                       <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">
                                <select name="status" class="form-control" >
                                    <option value="active">Aktif</option>
                                    <option value="not_active">Tidak</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
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
<script type="text/javascript">
     var staf = "<?php base_url('assets/images/no_pict.png') ?>";
    function validate_file(obj){
        var file_name = $(obj).val().replace('C:\\fakepath\\', '');
        var file_name_attr = file_name.split('.');
        file_name_attr[2] = obj.files[0].size/1024;
        
        if(file_name_attr[2] > 5000){
            $(obj).wrap('<form>').closest('form').get(0).reset();
            $(obj).unwrap();
            $(obj).parent().parent().find('.text_file').val('');
            readURL(obj, 'set');
            alert('File must jpg and maximum file size under 5 mb!');
        }
        else{
            $(obj).parent().parent().find('.text_file').val(file_name);
            $('#thumb_delete').fadeIn();
            readURL(obj);
        }
    }
    
    function readURL(input, type) {
        if (type != 'set'){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $('#thumb_image').attr('src', e.target.result);
                }
        
                reader.readAsDataURL(input.files[0]);
            }
        }
        else{
            //$('#thumb_image').attr('src','jst/assets/images/no_pict.png');
            $('#thumb_image').attr('src',staf);
        }
    }
    
    $(function(){
        $('#thumb_delete').fadeOut();
        
        $('#thumb_delete').click(function(){
            //$('#thumb_image').attr('src','jst/assets/images/no_pict.png');
            $('#thumb_image').attr('src',staf);
            var obj = $('#alkes_img');
            
            obj.wrap('<form>').closest('form').get(0).reset();
            obj.unwrap();
            obj.parent().parent().find('.text_file').val('');
            $(this).fadeOut();
        });
        
        $('#alkes_price').change(function(){
            var value = $(this).autoNumeric('get');
            $(this).parent().find('input[type="hidden"]').val(value);
        });
    });
</script>
<?php 
$this->load->view('template_admin/js_tables');
?>

<?php
$this->load->view('template_admin/foot');
?>