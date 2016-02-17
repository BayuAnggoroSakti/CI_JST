<?php 
$this->load->view('template_admin/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template_admin/topbar');
$this->load->view('template_admin/sidebar');
?>

 <script src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/plugins/jQuery/jquery-2.2.0.min.js') ?>"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Foto Pelatihan
        <small>Form Tambah Foto</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Foto</a></li>
        <li class="active">Tambah Foto Pelatihan</li>
    </ol>
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambahkan Foto untuk Gallery <b><?php echo $data->row('judul') ?> </b> </h3>
                 
                  
                </div><!-- /.box-header -->
                <!-- form start -->
               <form action="<?php echo site_url('admin/gallery/act_simpan_foto') ?>" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <table class="table">
                      <tr>
                        <th>Upload</th>
                        <th>Judul</th>
                      </tr>
                      <input type="hidden" name="id_gallery" value="<?php echo $data->row('id_gallery') ?>">
                      <tbody id="itemlist">
                       <tr>
                        <td><input type="file" name="gambar[0]" class="form-control" placeholder="Masukkan Judul Gambar"></td>
                        <td>
                          <input type="text" name="nama_foto[0]" class="form-control" placeholder="Masukkan Nama Foto">
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