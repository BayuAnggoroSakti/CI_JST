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
                <p><?php echo $username;?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('dashboard1') ?>"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li><a href="<?php echo site_url('dashboard2') ?>"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url('admin/c_admin/slider') ?>">
                    <i class="fa fa-share"></i> <span>Slider</span>
                </a>
            </li>    
             <li>
                <a href="<?php echo site_url('admin/profil') ?>">
                    <i class="fa fa-calendar"></i> <span>Profil JST</span>
                </a>
            </li>   
            <li>
                <a href="<?php echo site_url('admin/member') ?>">
                    <i class="fa fa-th"></i> <span>Member</span> <small class="label pull-right bg-green">Semua</small>
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
                    <li><a href="<?php echo site_url('admin/berita/ListBerita2') ?>"><i class="fa fa-circle-o"></i> List Berita2</a></li>
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
                    <li><a href="#"><i class="fa fa-circle-o"></i> List Materi</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Tambah Materi</a></li>
                </ul>
            </li>
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Try Out</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> List Try Out</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Tambah Try Out</a></li>
                   <li><a href="#"><i class="fa fa-circle-o"></i> Tambah Kategori</a></li>
                </ul>
            </li>
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Soal</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> List Soal</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Tambah Soal</a></li>
                 
                </ul>
            </li>
         
           
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">