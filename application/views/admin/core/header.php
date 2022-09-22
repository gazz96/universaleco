<?php
defined('BASEPATH') or exit('No direct script access allowed');

$ur1 = $this->uri->segment(2);
$ur2 = $this->uri->segment(3);
$ur3 = $this->uri->segment(4);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <?php
  $title = "Universal Eco | ";
  if ($ur1 == "dashboard") {
    $title .= 'Dashboard';
  } else if ($ur1 == "homepage") {
    $title .= 'Beranda';
  } else if ($ur1 == "service") {
    $title .= 'Layanan';
  } else if ($ur1 == "product") {
    $title .= 'Produk';
  } else if ($ur1 == "achievement") {
    $title .= 'Pencapaian';
  } else if ($ur1 == "client") {
    $title .= 'Klien';
  } else if ($ur1 == "support") {
    $title .= 'Transportasi';
  } else if ($ur1 == "certificate") {
    $title .= 'Sertifikat';
  } else if ($ur1 == "content") {
    $title .= 'Konten';
  } else if ($ur1 == "social") {
    $title .= 'Sosial Media';
  } else if ($ur1 == "misc") {
    $title .= 'Lain-lain';
  } else if ($ur1 == "category") {
    $title .= 'Kategori Panduan Limbah';
  } else if ($ur1 == "waste") {
    $title .= 'File Panduan Limbah';
  } else if ($ur1 == "limbah-category") {
    $title .= 'Kategori Kode Limbah';
  } else if ($ur1 == "limbah") {
    $title .= 'Kode Limbah';
  } else if ($ur1 == "faq") {
    $title .= 'FAQ';
  } else if ($ur1 == "blog") {
    $title .= 'Blog';
  } else if ($ur1 == "news") {
    $title .= 'News';
  } else if ($ur1 == "infografis") {
    $title .= 'Infografis';
  } else if ($ur1 == "user") {
    $title .= 'Pengguna';
  } else if ($ur1 == "account") {
    $title .= 'Akun';
  } else {
    $title .= 'Login';
  }
  ?>
  <title><?php echo $title; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/libs/tinymce/js/tinymce/tinymce.min.js"></script>

  <?php
  if ($ur1 != "login" && $ur1 != "sukses") {
  ?>
    <!-- Skins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/_all-skins.min.css">
  <?php
  }
  ?>

  <!-- Magnific Popup core CSS file -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/magnific-popup/magnific-popup.css">

  <!-- Manual style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin-style.css?t=<?php echo date('YmdHis'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
</head>

<?php
if (empty($ur1) || $ur1 == "login" || $ur1 == "sukses") {
?>

  <body class="hold-transition login-page" id="top">
  <?php
} else if ($ur3 == "add" || $ur3 == "detail") {
  ?>

    <body class="hold-transition skin-white sidebar-mini" id="top">
    <?php
  } else {
    ?>

      <body class="hold-transition skin-white fixed sidebar-mini" id="top">
      <?php
    }
      ?>