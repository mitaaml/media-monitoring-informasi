<div class="hero-slider">
	<div class="slider-item th-fullpage hero-area" style="background-image: url(<?= base_url('assets/') ?>images/slider/disnaker.jpeg);">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Disnaker Kota Semarang</h1>
					<h3 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1" style="color: #ffffff;">Media Monitoring Informasi</h3>
					<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Dapatkan kemudahan dalam mendapatkan informasi <br>
						seputar Disnaker Kota Semarang melalui website,<br>
						media sosial dan kanal youtube official kami.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="slider-item th-fullpage hero-area" style="background-image: url(<?= base_url('assets/') ?>images/slider/disnaker.jpeg);">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Dinas Tenaga Kerja <br> Kota
						Semarang</h1>
					<p data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".5">Create just what you need
						for your Perfect Website. Choose from a wide range
						<br> of Elements & simply put them on our Canvas.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Info Grafis -->
<section class="service-2 section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <!-- section title -->
        <div class="title text-center">
          <h2>Info Grafis</h2>
          <p>Visualisasi data jenis berita yang paling banyak dicari terkait ketenagakerjaan di Kota Semarang.</p>
          <div class="border"></div>
        </div>
        <!-- /section title -->
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-12">
	  	<div id="newsChart"></div>
      </div>
    </div>
  </div>
</section>

<!-- Bagian Tentang -->
<section class="about-2 section" id="tentang">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="title text-center">
					<h2 class="mb-3">Sistem Media Monitoring</h2>
					<p class="text-muted">Solusi real-time untuk memantau informasi terkait ketenagakerjaan di Kota Semarang.</p>
					<div class="border mb-4"></div>
				</div>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-md-6 mb-4 mb-md-0">
				<div class="image-wrapper shadow rounded">
					<img loading="lazy" src="<?= base_url('assets/images/about/mediamonitoring.jpg') ?>" class="img-fluid rounded" alt="Media Monitoring">
				</div>
			</div>
			<div class="col-md-6">
				<ul class="checklist">
					<li><i class="fas fa-check-circle text-primary me-2"></i> Memantau berita ketenagakerjaan terkini.</li>
					<li><i class="fas fa-check-circle text-primary me-2"></i> Analisis data untuk pengambilan keputusan strategis.</li>
					<li><i class="fas fa-check-circle text-primary me-2"></i> Akses informasi dari berbagai media secara real-time.</li>
					<li><i class="fas fa-check-circle text-primary me-2"></i> Memberikan notifikasi berita penting kepada pengguna.</li>
					<li><i class="fas fa-check-circle text-primary me-2"></i> Menyajikan laporan statistik tren informasi ketenagakerjaan.</li>
					<li><i class="fas fa-check-circle text-primary me-2"></i> Mengelompokkan berita berdasarkan kategori atau sumber media.</li>
					<li><i class="fas fa-check-circle text-primary me-2"></i> Mendukung integrasi dengan platform media sosial untuk distribusi informasi.</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<style>
.about-2 .title h2 {
	font-size: 2rem;
	color: #333;
	font-weight: bold;
}
.about-2 .title p {
	font-size: 1rem;
	color: #666;
}
.about-2 .border {
	width: 50px;
	height: 3px;
	background-color: #007bff;
	margin: 0 auto;
}
.about-2 .image-wrapper {
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	border-radius: 10px;
	overflow: hidden;
}
.about-2 .checklist {
	list-style: none;
	padding-left: 0;
}
.about-2 .checklist li {
	font-size: 1rem;
	margin-bottom: 10px;
	color: #444;
	display: flex;
	align-items: center;
}
.about-2 .checklist li i {
	font-size: 1.2rem;
}
</style>


<!-- Bagian Informasi Terkini -->
<section class="blog" id="berita">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-8">
				<div class="title text-center">
					<h2>Informasi <span class="color">Terkini</span></h2>
					<div class="border"></div>
					<p>Pantau berita dan pembaruan terbaru terkait ketenagakerjaan di Kota Semarang.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php if (!empty($artikel)): ?>
				<?php foreach ($artikel as $item): ?>
					<article class="col-lg-4 col-md-6 d-flex align-items-stretch">
						<div class="post-item shadow-sm rounded p-3">
							<div class="media-wrapper mb-2">
								<!-- Gambar artikel -->
								<img loading="lazy" src="<?= base_url('uploads/' . ($item['gambar'] ?: 'default.jpg')); ?>" alt="<?= $item['judul']; ?>" class="img-fluid rounded" style="width: 100%; height: 180px; object-fit: cover;">
							</div>
							<div class="content">
								<!-- Judul artikel -->
								<h3 class="mb-2" style="font-size: 1rem; font-weight: bold;"><?= $item['judul']; ?></h3>
								<!-- Deskripsi artikel -->
								<p class="text-muted mb-1" style="font-size: 0.8rem;">View: <?= $item['view']; ?></p>
								<p style="font-size: 0.8rem;"><?= substr($item['deskripsi'], 0, 80); ?>...</p>
								<a class="btn btn-main mt-2" href="<?= base_url('home/update_view/' . $item['id']); ?>" target="_blank" style="font-size: 0.8rem;">Baca Selengkapnya</a>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-12">
					<p class="text-center">Belum ada informasi terbaru.</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<style>
	.blog .post-item {
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		height: auto; /* Tinggi total kotak lebih rendah */
		background-color: #fff;
		border: 1px solid #ddd;
		margin-bottom: 20px;
	}
	.blog .media-wrapper img {
		max-height: 180px; /* Tinggi gambar lebih rendah */
		object-fit: cover;
		border-radius: 10px;
	}
	.blog .btn-main {
		background-color: #007bff;
		color: #fff;
		border-radius: 20px;
		padding: 6px 14px;
		text-decoration: none;
		font-size: 0.8rem;
	}
	.blog .btn-main:hover {
		background-color: #0056b3;
		color: #fff;
	}
</style>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Data kategori dan jumlah media dari controller
    var categoryData = <?php echo json_encode($kategori); ?>;
    
    // Debugging data kategori dan jumlah media
    console.log("Category Data: ", categoryData);

    var categoryLabels = categoryData.map(function(item) {
        return item.nama_kategori; // Nama kategori sebagai label
    });
    
    var categoryCounts = categoryData.map(function(item) {
        return item.jumlah_media; // Jumlah media per kategori
    });

    // Debugging label dan count
    console.log("Category Labels: ", categoryLabels);
    console.log("Category Counts: ", categoryCounts);

    // Membuat grafik menggunakan ApexCharts
    var options = {
        chart: {
            type: 'bar', // Jenis grafik: bar
            height: 350,
        },
        series: [{
            name: 'Jumlah Media per Kategori',
            data: categoryCounts, // Jumlah media per kategori
        }],
        xaxis: {
            categories: categoryLabels, // Nama kategori sebagai label
        },
        title: {
            text: 'Jumlah Media per Kategori',
            align: 'center'
        },
        colors: [
            '#4BC0C0', '#36A2EB', '#FFCE56', '#E7E9ED', '#FF6384', '#9966FF', '#C9CBCF', '#FF9F40'
        ],
        dataLabels: {
            enabled: false, // Menonaktifkan data labels
        },
        grid: {
            show: true, // Menampilkan grid pada chart
        },
    };

    var chart = new ApexCharts(document.querySelector("#newsChart"), options);
    chart.render(); // Render grafik
</script>