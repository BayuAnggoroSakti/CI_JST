<?php 
$this->load->view('template_admin/head');
?>

<!--tambahkan custom css disini-->
<?php
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>
  <link rel="stylesheet" href="<?php echo base_url('assets/assets/bootstrap/css/bootstrap.min.css') ?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/assets/datatables/dataTables.bootstrap.css') ?>"/>
  <script>
  function reload_table()
{
    mytable.ajax.reload(null,false); //reload datatable ajax
}
   function hapus(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin/materi/hapus_materi')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('berhasil menghapus data');
                var base = "<?php echo base_url(); ?>";
                window.location = base+"/admin/materi";
            }
        });
 
    }
}

  </script>
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        List Materi
      
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Materi</a></li>
        <li class="active">List Materi</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
   <div class="box">
                <div class="box-header">
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
                      <a href="<?php echo site_url('admin/materi/tambah_materi') ?>"><button class="btn btn-block btn-info btn-lg">Tambah Materi</button></a>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                   <table class="table table-bordered table-striped table-hover" id="mytable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Materi</th>
                            <th>Jenis</th>
                            <th>Type</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

</section><!-- /.content -->
  <script src="<?php echo base_url('assets/assets/js/jquery-1.11.2.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/assets/datatables/jquery.dataTables.js') ?>"></script>
  <script src="<?php echo base_url('assets/assets/datatables/dataTables.bootstrap.js') ?>"></script>
     <script type="text/javascript">

            $(document).ready(function () {
 
                $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };
 
                var t = $('#mytable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "sScrollX":       "100%",
                     "sScrollXInner":  "100%",
                    "ajax": "<?php echo site_url('admin/materi/ajax_tabel'); ?>",
                    "columns": [
                        {
                            "data": null,
                            "class": "text-center",
                            "orderable": false
                        },
                        {"data": "nama_materi"},
                        {"data": "jenis"},
                        {"data": "type"},
                        {"data": "tanggal"},
                        
                        {
                            "class": "text-center",
                            "data": "aksi"
                        }
                    ],
                    "order": [[1, 'asc']],
                    "rowCallback": function (row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });


        </script>

<?php 
$this->load->view('template_admin/js_tables');
?>

<!--tambahkan custom js disini-->
<?php
$this->load->view('template_admin/foot');
?>