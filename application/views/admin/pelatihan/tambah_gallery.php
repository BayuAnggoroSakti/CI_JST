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
                  <h3 class="box-title">Tambahkan Gallery untuk <?php echo $data->row('nama_pelatihan') ?> </h3>
                 
                  
                </div><!-- /.box-header -->
                <!-- form start -->
               <form action="<?php echo site_url('admin/pelatihan/act_simpan_gallery') ?>" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <table class="table">
                      <tr>
                        <th>Upload</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                      </tr>
                     <input type="hidden" name="id_pelatihan" value="<?php echo $data->row('id_pelatihan'); ?>">
                      <tbody id="itemlist">
                       <tr>
                        <td><input type="file" name="gambar[0]" class="form-control" placeholder="Masukkan Judul Gambar"></td>
                        <td>
                          <input type="text" name="judul[0]" class="form-control" placeholder="Masukkan Judul Gambar">
                        </td>
                        <td>
                          <textarea class="form-control" name="deskripsi[0]" placeholder="Deskripsi Gambar"></textarea> 
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
                row.appendChild(deskripsi);
                row.appendChild(aksi);
 
//                membuat element input
                var jenis_input = document.createElement('input');
                jenis_input.setAttribute('name', 'gambar[' + i + ']');
                jenis_input.setAttribute('class', 'form-control');
                 jenis_input.setAttribute('type', 'file');
 
                var jumlah_input = document.createElement('input');
                jumlah_input.setAttribute('name', 'judul[' + i + ']');
                jumlah_input.setAttribute('class', 'form-control');
                jumlah_input.setAttribute('placeholder', 'Masukkan Judul Gambar');

                var deskripsi_input = document.createElement('textarea');
                deskripsi_input.setAttribute('name', 'deskripsi[' + i + ']');
                deskripsi_input.setAttribute('class', 'form-control');
                deskripsi_input.setAttribute('placeholder', 'Deskripsi Gambar');
          
 
 
                var hapus = document.createElement('span');
 
//                meng append element input
                jenis.appendChild(jenis_input);
                jumlah.appendChild(jumlah_input);

               deskripsi.appendChild(deskripsi_input);
  
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
   
<script>
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
$this->load->view('template_admin/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template_admin/foot');
?>