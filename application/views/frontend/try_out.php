<?php
$this->load->view('template_frontend/head');
$this->load->view('template_frontend/header_tryout');
?>
   <script type="text/javascript" src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/countdown/lib/jquery-2.0.3.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/countdown/jquery.countdownTimer.js') ?>"></script>
    <link href="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/countdown/css/jquery.countdownTimer.css') ?>" rel="stylesheet" type="text/css" />
   <script type="text/javascript">
 
</script>
<?php 
if ($this->session->userdata('level') == 'member') {
  $waktu = $kategori_to->row('waktu');
  $jum_soal = $kategori_to->row('jum_soal');
  $nama_lengkap = $this->session->userdata('nama_lengkap');
}
else
{
   $waktu = $kategori_to->row('waktu') / 2;
   $jum_soal = $kategori_to->row('jum_soal') / 2;
  $nama_lengkap = $nama;
}

  
?>
                            <script>
                            var num = "<?php echo $waktu; ?>";
                            var menit = num.toString();
                                   $(function(){
                                    $('#ms_timer').countdowntimer({
                                        minutes :menit,
                                        seconds : 0,
                                        size : "lg"
                                    });
                                });
                                   window.onload = function() {
// Onload event of Javascript
// Initializing timer variable60;
var total = num * 60;
var x = total;
var y = document.getElementById("timer");


// Display count down for 20s
setInterval(function() {
if (x <= total && x >= 1) {
x--;
y.innerHTML = '' + x + '';
if (x == 1) {
x = total;
}
}
}, 1000);
// Form Submitting after 20s
var auto_refresh = setInterval(function() {
submitform();
}, total*1000);
// Form submit function
function submitform() {
alert('Waktu sudah habis, silahkan melihat hasil Tryout anda');
document.getElementById("form").submit();
}

// To validate form fields before submission
};
                            </script>

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
                    <tr><td width="30%">Nama Peserta</td><td width="70%"><?php echo $nama_lengkap ?></td></tr>
                    <tr><td>Kategori</td><td><?php echo $kategori_to->row('nama') ?></td></tr>
                     <tr><td>Waktu</td><td><?php echo $waktu." Menit" ?></td></tr>
                    <tr><td>Jumlah Soal</td><td><?php echo $jum_soal." Soal" ?></td></tr>
                   
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
          <div class="alert alert-danger">
          <label align="center"></label>
            <span align="center" id="ms_timer"><span>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-info">
            <form role="form" method="post" name="form" id="form" action="<?php echo site_url('try_out/submit_jawaban') ?>">
            <?php 
            $no = 1;
            foreach ($soal as $data) {?>
               <div class="step well">
                <table class="table table-form" style="font-size: 16px">
                 <input name="kode_soal<?php echo $no?>" type="hidden" value="<?php echo $data->kode_soal; ?>">
                  <tbody>
                    <tr>
                        <td style="v-align: top"><?php echo $no; ?></td>
                        <td colspan="2"><?php echo $data->soal_des; ?></td>
                    </tr>
                    <tr>
                        <td width="3%">A</td>
                        <td width="3%">
                         <input type="radio" id="opsi_A_8" name="opsi<?php echo $no?>" value="<?php echo $data->opsi_a ?>">
                        </td>
                        <td>
                          <label for="opsi_A_8"><?php echo $data->opsi_a ?></label>
                        </td>
                    </tr>
                    <tr>
                      <td width="3%">B</td>
                      <td width="3%">
                        <input type="radio" id="opsi_B_8" name="opsi<?php echo $no?>" value="<?php echo $data->opsi_b ?>">
                      </td>
                      <td>
                        <label for="opsi_B_8"><?php echo $data->opsi_b ?></label>
                      </td>
                    </tr>
                    <tr>
                      <td width="3%">C</td>
                      <td width="3%">
                        <input type="radio" id="opsi_C_8" name="opsi<?php echo $no?>" value="<?php echo $data->opsi_c ?>">
                      </td>
                      <td>
                        <label for="opsi_C_8"><?php echo $data->opsi_c ?></label>
                      </td>
                    </tr>
                    <tr>
                      <td width="3%">D</td>
                      <td width="3%">
                        <input type="radio" id="opsi_D_8" name="opsi<?php echo $no?>" value="<?php echo $data->opsi_d ?>">
                      </td>
                      <td>
                        <label for="opsi_D_8"><?php echo $data->opsi_d ?></label>
                      </td>
                    </tr>
                    <tr>
                      <td width="3%">E</td>
                      <td width="3%">
                        <input type="radio" id="opsi_E_8" name="opsi<?php echo $no?>" value="<?php echo $data->opsi_e ?>">
                      </td>
                      <td>
                        <label for="opsi_E_8"><?php echo $data->opsi_e ?></label>
                      </td>
                    </tr>
                    
                </tbody>
              </table>
            </div>
            <?php
            $no++;
            }

             ?>
             <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

            <input name="nama_lengkap" type="hidden" value="<?php echo $nama_lengkap; ?>">
            <input name="jum_soal" type="hidden" value="<?php echo $jum_soal; ?>">

             <input name="no" type="hidden" value="<?php echo $no; ?>">
             <input name="id_to" type="hidden" value="<?php echo $id_to->row('id_to'); ?>">
             <input name="kategori_to" type="hidden" value="<?php echo $kategori_to->row('id_katTO') ?>"></input>
             
            <input type="submit" name="btnSubmit" class="btn btn-success" value="Submit"/>

            </form>
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
