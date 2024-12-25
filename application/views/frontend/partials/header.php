<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basic Page Needs -->
  <meta charset="utf-8">
  <title>Dinas Tenaga Kerja Kota Semarang</title>

  <!-- Mobile Specific Metas -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="One page parallax responsive HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Bingo HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/') ?>images/favicon.ico" />

  <!-- CSS -->
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/bootstrap/bootstrap.min.css">
  <!-- Lightbox.min css -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/lightbox2/css/lightbox.min.css">
  <!-- animation css -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/slick/slick.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">

  <style>
    .logo img {
      width: 50px; /* Ukuran logo diperkecil */
      height: auto; /* Pertahankan proporsi logo */
    }
  </style>

</head>

<body id="body">

  <!-- Start Preloader -->
  <div id="preloader">
    <div class='preloader'>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <!-- End Preloader -->

  <!-- Fixed Navigation -->
  <header class="navigation fixed-top">
    <div class="container">
        <!-- main nav -->
        <nav class="navbar navbar-expand-lg navbar-light px-0">
            <!-- logo -->
            <a class="navbar-brand logo" href="index.html">
                <img loading="lazy" class="logo-default" src="<?= base_url('assets/') ?>images/favicon.ico" alt="logo" />
                <img loading="lazy" class="logo-white" src="<?= base_url('assets/') ?>images/favicon.ico" alt="logo" />
            </a>
            <!-- /logo -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item <?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('home') ?>">Home</a>
                    </li>
                    <li class="nav-item <?= ($this->uri->segment(1) == 'berita') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('berita') ?>">Berita</a>
                    </li>
                    <li class="nav-item <?= ($this->uri->segment(1) == 'kontak') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('kontak') ?>">Kontak</a>
                    </li>
                </ul>
                <!-- Button Login -->
                <a href="<?= base_url('auth/login') ?>" class="btn btn-primary ml-lg-3">Login</a>
            </div>
        </nav>
        <!-- /main nav -->
    </div>
</header>
  <!-- End Fixed Navigation -->

</body>

</html>
