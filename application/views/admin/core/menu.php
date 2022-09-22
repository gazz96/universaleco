<?php
$ur1 = $this->uri->segment(2);
$ur2 = $this->uri->segment(3);
$ur3 = $this->uri->segment(4);
?>

<!-- Site wrapper -->
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>admin/main" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Logo" height="40" /></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Logo" height="40" /></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-gear"></i>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="<?php echo base_url(); ?>admin/account">
                      <i class="fa fa-users"></i> Akun
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url(); ?>admin/logout">
                      <i class="fa fa-arrow-left"></i> Keluar
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <i class="fa fa-user-circle-o"></i>
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata['username']; ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li <?php echo $ur1 == "dashboard" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/dashboard">
            <i class="fa fa-file-text"></i> <span>Dashboard</span>
          </a>
        </li>
        <li <?php echo $ur1 == "homepage" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/homepage">
            <i class="fa fa-image"></i> <span>Homepage</span>
          </a>
        </li>
        <li <?php echo $ur1 == "service" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/service">
            <i class="fa fa-cube"></i> <span>Layanan</span>
          </a>
        </li>
        <li <?php echo $ur1 == "product" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/product">
            <i class="fa fa-product-hunt"></i> <span>Produk</span>
          </a>
        </li>
        <li <?php echo $ur1 == "achievement" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/achievement">
            <i class="fa fa-square"></i> <span>Pencapaian</span>
          </a>
        </li>
        <li <?php echo $ur1 == "client" ? 'class="active"' : '';
            ?>>
          <a href="<?php echo base_url(); ?>admin/client">
            <i class="fa fa-users"></i> <span>Klien</span>
          </a>
        </li>
        <li <?php echo $ur1 == "support" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/support">
            <i class="fa fa-truck"></i> <span>Transportasi</span>
          </a>
        </li>
        <li <?php echo $ur1 == "certificate" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/certificate">
            <i class="fa fa-certificate"></i> <span>Sertifikat</span>
          </a>
        </li>
        <li <?php echo $ur1 == "content" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/content">
            <i class="fa fa-book"></i> <span>Konten</span>
          </a>
        </li>
        <li class="treeview <?php echo $ur1 == "limbah-category" || $ur1 == "limbah" ? 'active' : ''; ?>">
          <a href="#">
            <i class="fa fa-recycle"></i>
            <span>Kode Limbah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php echo $ur1 == "limbah-category" ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>admin/limbah-category"><i class="fa fa-circle-o"></i> Kategori Kode Limbah</a></li>
            <li <?php echo $ur1 == "limbah" ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>admin/limbah"><i class="fa fa-circle-o"></i> Kode Limbah</a></li>
          </ul>
        </li>
        <li class="treeview <?php echo $ur1 == "category" || $ur1 == "waste" ? 'active' : ''; ?>">
          <a href="#">
            <i class="fa fa-trash"></i>
            <span>Panduan Limbah B3</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php echo $ur1 == "category" ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>admin/category"><i class="fa fa-circle-o"></i> Kategori</a></li>
            <li <?php echo $ur1 == "waste" ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>admin/waste"><i class="fa fa-circle-o"></i> File Panduan</a></li>
          </ul>
        </li>
        <li <?php echo $ur1 == "faq" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/faq">
            <i class="fa fa-question"></i> <span>FAQ</span>
          </a>
        </li>
        <li <?php echo $ur1 == "blog" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/blog">
            <i class="fa fa-television"></i> <span>Blog</span>
          </a>
        </li>
        <li <?php echo $ur1 == "news" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/news">
            <i class="fa fa-newspaper-o"></i> <span>News</span>
          </a>
        </li>
        <li <?php echo $ur1 == "infografis" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/infografis">
            <i class="fa fa-area-chart"></i> <span>Infografis</span>
          </a>
        </li>
        <li <?php echo $ur1 == "social" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/social">
            <i class="fa fa-file"></i> <span>Sosial Media</span>
          </a>
        </li>
        <li <?php echo $ur1 == "misc" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/misc">
            <i class="fa fa-gear"></i> <span>Lain-lain</span>
          </a>
        </li>
        <li <?php echo $ur1 == "user" ? 'class="active"' : ''; ?>>
          <a href="<?php echo base_url(); ?>admin/user">
            <i class="fa fa-user"></i> <span>Pengguna</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php echo $maintitle; ?>
      <!--<ol class="breadcrumb">
            <?php //echo $breadcrumbs; 
            ?>
         </ol>-->
    </section>
    <!-- Main content -->
    <section class="content">