<?php
defined('BASEPATH') or exit('No direct script access allowed');

$ur1 = $this->uri->segment(1);
$ur2 = $this->uri->segment(2);
$ur3 = $this->uri->segment(3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <?php
   if (empty($ur1) || $ur1 == "main") {
      $title = "Universal Eco - Perusahaan Pengolahan B3";
   } else if ($ur1 == "tentang") {
      $title = "Tentang - Universal Eco";
   } else if ($ur1 == "tentang") {
      $title = "Tentang - Universal Eco";
   } else if ($ur1 == "panduan-limbah-b3") {
      $title = "Panduan Limbah B3 - Universal Eco";
   } else if ($ur1 == "faq") {
      $title = "FAQ - Universal Eco";
   } else if ($ur1 == "kontak") {
      $title = "Kontak - Universal Eco";
   } else if ($ur1 == "info-penawaran") {
      $title = "Info Penawaran - Universal Eco";
   } else if ($ur1 == "blog") {
      $title = "Blog - Universal Eco";
   } else if ($ur1 == "news") {
      $title = "News - Universal Eco";
   } else if ($ur1 == "infografis") {
      $title = "Infografis - Universal Eco";
   } else if ($ur1 == "content") {
      $title = null;
      if (isset($product[0]->ue_product_name)) :
         $title = $product[0]->ue_product_name;
      endif;
      $title .= " - Universal Eco";
   }
   ?>
   <title><?php echo $title; ?></title>
   <meta name="description" content="Beli scrap / limbah bekas harga terbaik di wilayah Jabodetabek & Serang. Menerima limbah elektronik bekas & rumah tangga. Bisa kami jemput / angkut / antar sendiri">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="canonical" href="<?php echo base_url(); ?>">
   <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-57x57.png">
   <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-60x60.png">
   <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-72x72.png">
   <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-76x76.png">
   <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-114x114.png">
   <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-120x120.png">
   <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-144x144.png">
   <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-152x152.png">
   <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/images/favicon/apple-icon-180x180.png">
   <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url(); ?>assets/images/favicon/android-icon-192x192.png">
   <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/images/favicon/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/images/favicon/favicon-96x96.png">
   <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/favicon/favicon-16x16.png">
   <link rel="manifest" href="<?php echo base_url(); ?>assets/images/favicon/manifest.json">
   <meta name="msapplication-TileColor" content="#ffffff">
   <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>assets/images/favicon/ms-icon-144x144.png">
   <meta name="theme-color" content="#ffffff">
   <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/select2-4.0.3/css/select2.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/datepicker-1.6.4/css/bootstrap-datepicker.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/timepicker/bootstrap-timepicker.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/font-awesome/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/Ionicons/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css">

   <!-- Skins -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/_all-skins.min.css">

   <!-- Magnific Popup core CSS file -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/magnific-popup/magnific-popup.css">

   <!-- Manual style -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css?t=<?php echo date('YmdHis'); ?>">

   <?php
   if (empty($ur1) || $ur1 == "main" || $ur1 == "products") :
   ?>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/owlcarousel/assets/owl.carousel.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/owlcarousel/assets/owl.theme.default.min.css">
   <?php
   endif;
   ?>

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
</head>

<body class="hold-transition skin-white fixed sidebar-mini" id="top">
   <?php
   $ur1 = $this->uri->segment(1);
   $ur2 = $this->uri->segment(2);
   $ur3 = $this->uri->segment(3);
   ?>

   <!-- Site wrapper -->
   <div class="wrapper">
      <header class="main-header">
         <div class="head-content">
            <!-- Logo -->
            <a href="<?php echo base_url(); ?>" class="logo">
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
                     <!--<li class="notifications-menu dropdown grey-font">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bantuan&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                     </a>
                     <div class="dropdown-menu drop-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php //echo base_url(); 
                                                         ?>syarat-ketentuan">Syarat &amp; Ketentuan</a>
                        <a class="dropdown-item" href="<?php //echo base_url(); 
                                                         ?>pertanyaan-umum">Pertanyaan Umum</a>
                     </div>
                  </li>-->
                     <li class="notifications-menu dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Layanan&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu drop-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="https://jualscrap.universaleco.id">Jual E-Waste</a>
                           <?php
                           if (isset($product_list) && $product_list != null && count($product_list) > 0) :
                              foreach ($product_list as $product_lists) :
                                 if ($product_lists->ue_product_name != "E-Waste") :
                                    $urlname = preg_replace("/[^A-Za-z0-9\-]/", "-", str_replace(" ", "-", strtolower($product_lists->ue_product_name)));
                           ?>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>content/<?php echo $urlname; ?>/<?php echo $product_lists->ue_product_id; ?>"><?php echo $product_lists->ue_product_name; ?></a>
                           <?php
                                 endif;
                              endforeach;
                           endif;
                           ?>
                        </div>
                     </li>
                     <li class="notifications-menu">
                        <a href="<?php echo base_url(); ?>tentang">Tentang</a>
                     </li>
                     <li class="notifications-menu">
                        <a href="<?php echo base_url(); ?>panduan-limbah-b3">Panduan Limbah B3</a>
                     </li>
                     <li class="notifications-menu">
                        <a href="<?php echo base_url(); ?>faq">FAQ</a>
                     </li>
                     <li class="notifications-menu">
                        <a href="<?php echo base_url(); ?>blog">Blog</a>
                     </li>
                     <li class="notifications-menu">
                        <a href="https://jualscrap.universaleco.id">Jual E-Waste</a>
                     </li>
                     <li class="notifications-menu">
                        <a href="<?php echo base_url(); ?>kontak" class="first-link"><button class="btn first">Kontak</button></a>
                     </li>
                     <li class="notifications-menu">
                        <a href="<?php echo base_url(); ?>info-penawaran" class="first-link"><button class="btn" type="button" id="btn-login">Info Penawaran</button></a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      </header>

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar mobile-sidebar">
         <!-- sidebar: style can be found in sidebar.less -->
         <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">&nbsp;</div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
               <li class="mobile-submenu dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Layanan&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                  </a>
                  <div class="dropdown-menu drop-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="https://jualscrap.universaleco.id">Jual E-Waste</a>
                     <?php
                     if (isset($product_list) && $product_list != null && count($product_list) > 0) :
                        foreach ($product_list as $product_lists) :
                           if ($product_lists->ue_product_name != "E-Waste") :
                              $urlname = preg_replace("/[^A-Za-z0-9\-]/", "-", str_replace(" ", "-", strtolower($product_lists->ue_product_name)));
                     ?>
                              <a class="dropdown-item" href="<?php echo base_url(); ?>content/<?php echo $urlname; ?>/<?php echo $product_lists->ue_product_id; ?>"><?php echo $product_lists->ue_product_name; ?></a>
                     <?php
                           endif;
                        endforeach;
                     endif;
                     ?>
                  </div>
               </li>
               <li class="mobile-submenu" <?php echo $ur1 == "tentang" ? 'class="active"' : ''; ?>>
                  <a href="<?php echo base_url(); ?>tentang"><span>Tentang</span></a>
               </li>
               <li <?php echo $ur1 == "panduan-limbah-b3" ? 'class="active"' : ''; ?>>
                  <a href="<?php echo base_url(); ?>panduan-limbah-b3"><span>Panduan Limbah B3</span></a>
               </li>
               <li class="mobile-submenu" <?php echo $ur1 == "faq" ? 'class="active"' : ''; ?>>
                  <a href="<?php echo base_url(); ?>faq"><span>FAQ</span></a>
               </li>
               <li class="mobile-submenu" <?php echo $ur1 == "blog" ? 'class="active"' : ''; ?>>
                  <a href="<?php echo base_url(); ?>blog"><span>Blog</span></a>
               </li>
               <li class="mobile-submenu">
                  <a href="https://jualscrap.universaleco.id"><span>Jual E-Waste</span></a>
               </li>
               <li class="mobile-submenu" <?php echo $ur1 == "kontak" ? 'class="active"' : ''; ?>>
                  <a href="<?php echo base_url(); ?>blog"><span>Kontak</span></a>
               </li>
               <li class="mobile-submenu" <?php echo $ur1 == "info-penawaran" ? 'class="active"' : ''; ?>>
                  <a href="<?php echo base_url(); ?>blog"><span>Info Penawaran</span></a>
               </li>
            </ul>
            <div class="whatsapp-icon">
               <a href="https://wa.me/<?php echo isset($misc_data["Whatsapp"]) ? $misc_data["Whatsapp"] : ''; ?>" target="_blank"><i class="fa fa-whatsapp"></i></a>
            </div>
         </section>
         <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper <?php echo $ur1 == "panduan-limbah-b3" || $ur1 == "content" ? 'pt-normal' : ''; ?>">