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
      width: 50px;
      /* Ukuran logo diperkecil */
      height: auto;
      /* Pertahankan proporsi logo */
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
          <ul class="navbar-nav ml-auto">
            <!-- Menu Home -->
            <li class="nav-item <?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url('home') ?>">Home</a>
            </li>
            <!-- Menu Berita -->
            <li class="nav-item <?= ($this->uri->segment(1) == 'berita') ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url('berita') ?>">Berita</a>
            </li>
            <!-- Menu Kontak -->
            <li class="nav-item <?= ($this->uri->segment(1) == 'kontak') ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url('kontak') ?>">Kontak</a>
            </li>
            <!-- Menu Kontributor -->
            <li class="nav-item <?= ($this->uri->segment(1) == 'kontributor') ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url('kontributor') ?>">Kontributor</a>
            </li>
          </ul>

          <!-- Nav Item - Login/Profile -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <?php if ($this->session->userdata('logged_in')): ?>
                <!-- Jika User Sudah Login -->
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $this->session->userdata('user_name'); ?>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="<?= base_url('profile/profile'); ?>">Profile</a></li>
                    <li><button class="dropdown-item" type="button" data-toggle="modal" data-target="#logoutModal">
                        Logout
                      </button>
                    </li>
                  </ul>
                </div>
              <?php else: ?>
                <!-- Jika User Belum Login -->
                <button class="btn btn-primary" onclick="window.location.href='<?= base_url('auth/login'); ?>'">
                  Login
                </button>
              <?php endif; ?>
            </li>
          </ul>
        </div>
      </nav>
      <!-- /main nav -->
    </div>
  </header>
  <!-- End Fixed Navigation -->
  <!-- Modal Logout -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <!-- Popper.js (Bootstrap's JS relies on this) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Header Modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Body Modal -->
        <div class="modal-body">
          Apakah Anda yakin ingin logout?
        </div>
        <!-- Footer Modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>