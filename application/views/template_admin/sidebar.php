<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/admin/AdminLTE-2.0.5/dist/img/bayu.jpg') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo $nama_lengkap;?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?php echo site_url('admin/dashboard') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
                </a>
            </li>
              <li>
                <a href="<?php echo site_url('admin/my_profil') ?>">
                    <i class="fa fa-user"></i> <span>My Profile</span> 
                </a>
            </li>  
            <li>
                <a href="<?php echo site_url('admin/dashboard/slider') ?>">
                    <i class="fa fa-share"></i> <span>Slider</span>
                </a>
            </li>    
             <li>
                <a href="<?php echo site_url('admin/profil') ?>">
                    <i class="fa fa-calendar"></i> <span>Profil JST</span>
                </a>
            </li>   
            <li>
                <a href="<?php echo site_url('admin/user') ?>">
                    <i class="fa fa-users"></i> <span>User</span> 
                </a>
            </li>  
             <li>
                <a href="<?php echo site_url('admin/gallery') ?>">
                    <i class="fa fa-image"></i> <span>Gallery</span> 
                </a>
            </li>         
             
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Berita</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/berita') ?>"><i class="fa fa-circle-o"></i> List Berita</a></li>
                    <li><a href="<?php echo site_url('admin/berita/tambah_berita') ?>"><i class="fa fa-circle-o"></i> Tambah Berita</a></li>
                    <li><a href="<?php echo site_url('admin/berita/tambah_kategori_berita') ?>"><i class="fa fa-circle-o"></i> Tambah Kategori Berita</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Materi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/materi') ?>"><i class="fa fa-circle-o"></i> List Materi</a></li>
                    <li><a href="<?php echo site_url('admin/materi/tambah_materi') ?>"><i class="fa fa-circle-o"></i> Tambah Materi</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-meh-o"></i> <span>Staf Pengajar</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/staf') ?>"><i class="fa fa-circle-o"></i> List Pengajar</a></li>
                    <li><a href="<?php echo site_url('admin/staf/tambah_staf') ?>"><i class="fa fa-circle-o"></i> Tambah Pengajar</a></li>
                </ul>
            </li>
              <li class="treeview">
                <a href="#">
                    <i class="fa fa-globe"></i> <span>Pelatihan</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/pelatihan') ?>"><i class="fa fa-circle-o"></i> List Pelatihan</a></li>
                    <li><a href="<?php echo site_url('admin/pelatihan/progam_kerja') ?>"><i class="fa fa-circle-o"></i>Program Kerja</a></li>
                </ul>
            </li>
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Try Out</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> List Try Out</a></li>
                    <li><a href="<?php echo site_url('admin/try_out/kategori_to') ?>"><i class="fa fa-circle-o"></i> Kategori Try Out</a></li>
                </ul>
            </li>
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Soal</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/soal/index') ?>"><i class="fa fa-circle-o"></i> List Soal</a></li>
                    <li><a href="<?php echo site_url('admin/soal/tambah_soal') ?>"><i class="fa fa-circle-o"></i> Tambah Soal</a></li>
                 
                </ul>
            </li>
         
           
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">