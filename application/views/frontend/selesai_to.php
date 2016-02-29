<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header');
?>

   <script type="text/javascript" src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/countdown/lib/jquery-2.0.3.js') ?>"></script>
<div id="content">
      <!-- Page Banner -->
      <div class="page-banner">
        <div class="container">
          <h2>Hasil Tryout</h2>
          <ul class="page-tree">
            <li><a href="#">Home</a></li>
            <li><a href="#">Hasil Tryout</a></li>
          </ul>
        </div>
      </div>

      <div class="about-box">
        <div class="container">
          <div class="row">

            <div class="col-md-6">
              <div class="skills-progress">
                 <div class="alert alert-warning col-md-12">
                  <table class="table table-bordered" style="margin-bottom: 0px">
                    <tr><td width="30%">Nama Peserta</td><td width="70%"><?php echo $nama_lengkap; ?></td></tr>
                    <tr><td>Kategori</td><td><?php echo $kategori_to->row('nama') ?></td></tr>
                    <tr><td>Jumlah Soal</td><td><?php echo $jum_soal; ?></td></tr>
                  </table>
              </div>
            </div>
          </div>
           <div class="col-md-6">
              <div class="skills-progress">
                  <div class="alert alert-warning col-md-12">
                    <table class="table table-bordered" style="margin-bottom: 0px">
                      <tr><td width="30%">Jawaban Benar</td><td width="70%"><?php echo $benar." "; ?>(soal)</td></tr>
                      <tr><td>Jawaban Salah</td><td><?php echo $salah." "; ?>(soal)</td></tr>
                      <tr><td>Tidak Jawab</td><td><?php echo $tjawab." "; ?>(soal)</td></tr>
                    </table>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-info" align="center">
              <h2 align="center">Total nilai Tryout anda adalah <?php echo $hasil; ?>
              </h2>
              <a href="<?php echo site_url('member/home') ?>" class="submit btn btn-success btn-lg">Kembali</a>
            </div>
          </div>
        </div>
      </div>
      </div>

      <!-- staff-box -->
      

      <!-- partners box -->
      

    </div>
   

<?php   
$this->load->view('template_frontend/footer');
$this->load->view('template_frontend/foot');
?>
