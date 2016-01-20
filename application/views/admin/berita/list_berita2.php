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
    
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        List Berita
      
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Berita</a></li>
        <li class="active">List Berita</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
   <div class="box">
                <div class="box-header">
                   <div class="row">
                    <div class="col-md-2">
                      <a href="<?php echo site_url('admin/berita/tambah_berita') ?>"><button class="btn btn-block btn-info btn-lg">Tambah Berita</button></a>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                   <table class="table table-bordered table-striped table-hover" id="mytable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Judul Berita</th>
                            <th>Tanggal Berita</th>
                            <th>Status Terbit</th>
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
                    "ajax": "<?php echo site_url('admin/berita/ajax_tabel'); ?>",
                    "columns": [
                        {
                            "data": null,
                            "class": "text-center",
                            "orderable": false
                        },
                        {"data": "id_berita"},
                        {"data": "judul_berita"},
                        {"data": "tanggal_berita"},
                        {"data": "status_terbit"},
                        
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