<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Berita Disnaker</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f6f9;
      margin-top: 30px;
    }
    .search-bar {
      margin-top: 20px;
    }
    .category-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .category-list a {
      text-decoration: none;
      color: #333;
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }
    .category-list a:hover {
      color: #007bff;
    }
    .category-list i {
      margin-right: 10px;
    }
    .news-list {
      margin-top: 20px;
    }
    .news-item {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      padding: 10px;
      border: 1px solid #ddd;
      background-color: #fff;
      border-radius: 5px;
    }
    .news-item img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      margin-right: 15px;
      border-radius: 5px;
    }
    .news-item h6 {
      font-size: 16px;
      margin-bottom: 5px;
    }
    .news-item p {
      font-size: 12px;
      color: #666;
    }
    .single-page-header {
      margin-bottom: 30px;
    }
    .category-card {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<!-- Header Section -->
<section class="single-page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Berita Disnaker</h2>
      </div>
    </div>
  </div>
</section>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <!-- Sidebar Kategori -->
    <div class="col-md-3">
      <div class="category-section">
        <div class="card category-card">
          <div class="card-body">
            <div class="category-title">Kategori</div>
            <div class="category-list">
              <a href="#"><i class="fas fa-folder"></i> Lowongan Kerja</a>
              <a href="#"><i class="fas fa-folder"></i> Pelatihan</a>
              <a href="#"><i class="fas fa-folder"></i> Bisnis</a>
              <a href="#"><i class="fas fa-folder"></i> UMKM</a>
              <a href="#"><i class="fas fa-folder"></i> Pabrik</a>
              <a href="#"><i class="fas fa-folder"></i> Buruh</a>
              <a href="#"><i class="fas fa-folder"></i> PHK</a>
              <a href="#"><i class="fas fa-folder"></i> Mediasi</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Konten Berita -->
    <div class="col-md-9">
      <!-- Pencarian -->
      <div class="search-bar d-flex">
        <input type="text" class="form-control" placeholder="Cari Informasi">
        <button class="btn btn-warning ml-2">Go!</button>
      </div>

      <!-- Daftar Berita -->
      <div class="news-list">
        <div class="news-item">
          <img src="https://via.placeholder.com/80" alt="Thumbnail Berita">
          <div>
            <h6><a href="https://www.suaramerdeka.com/semarang-raya/0414142242/loker-untuk-lulusan-atau-ahli-bidang-kuliner-dan-perhotelan-penempatan-semarang-cek-cara-melamarnya">Lowongan Kerja di Kota Semarang</a></h6>
            <p>Minggu, 29/10/2024</p>
          </div>
        </div>
        <div class="news-item">
          <img src="https://via.placeholder.com/80" alt="Thumbnail Berita">
          <div>
            <h6><a href="#">Jadwal Pelatihan Terbaru</a></h6>
            <p>Sabtu, 28/10/2024</p>
          </div>
        </div>
        <div class="news-item">
          <img src="https://via.placeholder.com/80" alt="Thumbnail Berita">
          <div>
            <h6><a href="#">Peluang Bisnis di UMKM</a></h6>
            <p>Jumat, 27/10/2024</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
