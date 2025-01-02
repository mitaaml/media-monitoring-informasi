<style>
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
<div class="container my-5">
    <div class="row">
        <!-- Sidebar Kategori -->
        <div class="col-md-3">
            <div class="category-section">
                <div class="card category-card">
                    <div class="card-body">
                        <div class="category-title">Kategori</div>
                        <div class="category-list">
                            <?php foreach ($kategori as $kat): ?>
                                <a href="<?= site_url('berita/index/'.$kat['id']); ?>">
                                    <i class="fas fa-folder"></i> <?= $kat['nama_kategori']; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Konten Berita -->
        <div class="col-md-9">
            <!-- Pencarian -->
              <form method="post" action="<?= site_url('berita/index'); ?>">
                  <div class="search-bar d-flex">
                    <input type="text" name="search_term" class="form-control" placeholder="Cari Informasi">
                    <button class="btn btn-warning ml-2">Go!</button>
                  </div>
              </form>

            <!-- Daftar Berita -->
            <div class="news-list">
                <?php if (!empty($berita)): ?>
                    <?php foreach ($berita as $item): ?>
                        <div class="news-item">
                            <!-- Cek apakah gambar ada, jika ada gunakan gambar yang disimpan di folder uploads -->
                            <img src="<?= base_url('uploads/'.($item['gambar'] ?: 'default.jpg')); ?>" alt="Thumbnail Berita">
                            <div>
                                <h6><a href="<?= $item['url']; ?>"><?= $item['judul']; ?></a></h6>
                                <p><?= date('D, d/m/Y', strtotime($item['tanggal'])); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No news found for this category.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
