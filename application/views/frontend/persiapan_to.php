<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header_tryout');
?>

<div id="content">
      <!-- Page Banner -->
      <div class="page-banner">
        <div class="container">
          <h2>Tryout</h2>
          <ul class="page-tree">
            <li><a href="#">Home</a></li>
            <li><a href="#">Tryout</a></li>
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
                    <tr><td width="30%">Nama Peserta</td><td width="70%"><?php echo $this->session->userdata('nama_lengkap') ?></td></tr>
                    <tr><td>Kategori</td><td><?php echo $kategori_to->row('nama') ?></td></tr>
                    <tr><td>Waktu</td><td><?php echo $kategori_to->row('waktu')." Menit" ?></td></tr>
                    <tr><td>Jumlah Soal</td><td><?php echo $kategori_to->row('jum_soal') ?></td></tr>
                  </table>
              </div>
            </div>
          </div>
           <div class="col-md-6">
              <div class="skills-progress">
                  <div class="alert alert-warning col-md-12">
                    <table class="table table-bordered" style="margin-bottom: 0px">
                      <tr><td width="30%">Benar</td><td width="70%">4 (Empat)</td></tr>
                      <tr><td>Salah</td><td>-1 (Minus Satu)</td></tr>
                      <tr><td>Tidak Jawab</td><td>0 (Nol)</td></tr>
                    </table>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
         <div class="col-md-12">    
          <label align="center"></label>
          <form action="<?php echo site_url('try_out/index') ?>" method="post">
           
            <div class="form-group" align="center">
                      
                      <div class="col-sm-12">
                          <input type="submit" name="submit" Value="Mulai Tryout" class="btn btn-lg btn-info">
                      </div>
                    </div>
            <input type="hidden" name="kategori_to" value="<?php echo $id_katTO; ?>"> 
            <input type="hidden" name="jum_soal" value="<?php echo $kategori_to->row('jum_soal') ?>"></input>      
          </form>
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
