<?php 
$this->load->view('template_admin/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>
<script type="text/javascript"> 
  function validasi_input(form){ 
    if (form.id_pelatihan.value =="pilih")
      { alert("Anda belum memilih pelatihan!"); 
        return (false); } 
    return (true);
  }
</script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Gallery Pelatihan
        <small>Form Tambah Gallery</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staf</a></li>
        <li class="active">Tambah Gallery Pelatihan</li>
    </ol>
<div class="box box-info">
                <div class="box-header with-border">
                  <div class="row">
                <div class="col-md-12">
                    <div class="callout callout-info">
                    <h4>Gallery Pelatihan Jogja Science Training</h4>
                    <p>- Pastikan anda mengisi seluruh informasi gallery dengan benar</p>
                    <p>- Klik menu tambah jika ingin menambah foto di gallery tersebut</p>
                    <p>- Klik menu upload jika sudah selesai mengisi informasi gallery beserta menambahkan foto - foto didalamnya</p>
                  </div>
                  </div>
                </div>
                  <h2 class="box-title" align="center">Tambahkan Gallery</h2>
                 
                  
                </div><!-- /.box-header -->
                <!-- form start -->
               <form class="form-horizontal" action="<?php echo site_url('admin/gallery/act_simpan_gallery') ?>" method="post" onsubmit="return validasi_input(this)" enctype="multipart/form-data">
                  <div class="box-body">
                        <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Pelatihan</label>
                      <div class="col-sm-4">
                         <select name="id_pelatihan" class="form-control">
                              <option value="pilih">Pilih Pelatihan</option>
                                  <?php  $Kat = $this->m_admin->Pelatihan(); foreach ($Kat as $i) { ?>
                              <option name="id_pelatihan" required value="<?php echo $i['id_pelatihan']; ?>"><?php echo $i['nama_pelatihan']; ?></option>
                                  <?php } ?>
                         </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Judul</label>
                      <div class="col-sm-6">
                         <input type="text" name="judul" required class="form-control" placeholder="Masukkan Judul Gallery">
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword3" required class="col-sm-2 control-label">Deskripsi</label>
                      <div class="col-sm-6">    
                     <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Gallery"></textarea> 
                      </div>
                    </div>
                    
                   
                    <table class="table">
                      <tr>
                        <th>Upload</th>
                        <th>Judul</th>
                      </tr>
        
                      <tbody id="itemlist">
                       <tr>
                        <td><input type="file" name="gambar[0]" required class="form-control" placeholder="Masukkan Judul Gambar"></td>
                        <td>
                          <input type="text" name="nama_foto[0]" required class="form-control" placeholder="Masukkan Nama Foto">
                        </td>
                      </tr>
                     </tbody>
                        <td>
                          <button onclick="additem(); return false" class="btn btn-sm btn-success" title="Edit"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
                          <button class="btn btn-sm btn-info" title="Edit"><i class="glyphicon glyphicon-plus"></i> Upload</button>
                         </td>
                      
                    </table>
                    </form>
                
               <script>
            var i = 1;
            function additem() {
//                menentukan target append
                var itemlist = document.getElementById('itemlist');
                
//                membuat element
                var row = document.createElement('tr');
                var jenis = document.createElement('td');
                var jumlah = document.createElement('td');
                var deskripsi = document.createElement('td');
                var aksi = document.createElement('td');
 
//                meng append element
                itemlist.appendChild(row);
                row.appendChild(jenis);
                row.appendChild(jumlah);
                row.appendChild(aksi);
 
//                membuat element input
                var jenis_input = document.createElement('input');
                jenis_input.setAttribute('name', 'gambar[' + i + ']');
                jenis_input.setAttribute('class', 'form-control');
                 jenis_input.setAttribute('type', 'file');
 
                var jumlah_input = document.createElement('input');
                jumlah_input.setAttribute('name', 'nama_foto[' + i + ']');
                jumlah_input.setAttribute('class', 'form-control');
                jumlah_input.setAttribute('placeholder', 'Masukkan Judul Gambar');
          
 
                var hapus = document.createElement('span');
 
//                meng append element input
                jenis.appendChild(jenis_input);
                jumlah.appendChild(jumlah_input);

  
                aksi.appendChild(hapus);
 
                hapus.innerHTML = '<button class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button>';
//                membuat aksi delete element
                hapus.onclick = function () {
                    row.parentNode.removeChild(row);
                };
 
                i++;
            }
        </script>    
                    
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                  
                  </div><!-- /.box-footer -->
                
              </div><!-- /.box -->
   

<?php 
$this->load->view('template_admin/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template_admin/foot');
?>