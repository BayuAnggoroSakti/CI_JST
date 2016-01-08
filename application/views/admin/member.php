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
        Daftar Siswa
        <small>Tabel Penilaian Siswa</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-striped">
      <thead>
        <tr>
          <th width="80px">ID</th>
          <th>First Name</th>
          <th><span id="IL_AD8" class="IL_AD">Last Name</span></th>
          <th>Age</th>
          <th>Address</th>
          <th width="80px">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
  if ($data_get == NULL) {
  ?>
  <div class="alert alert-info" role="alert">Data masih kosong, tolong di isi!</div>
  <?php
  } else {
  foreach ($data_get as $row) {
  ?>
        <tr>
          <td><?php echo $row->username; ?></td>
          <td><?php echo $row->password; ?></td>
          <td><?php echo $row->nama_lengkap; ?></td>
          <td><?php echo $row->alamat; ?></td>
          <td><?php echo $row->email; ?></td>
          <td>
          </td>
      <?php
      }
  }
      ?>
        </tr>
      </tbody>
   </table>
        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template_admin/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template_admin/foot');
?>