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
      <div class="col-lg-8">
        <canvas id="newsChart" width="400" height="300"></canvas>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('newsChart').getContext('2d');
  const newsChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Lowongan Kerja', 'Pelatihan', 'Bisnis', 'UMKM', 'Pabrik', 'Buruh', 'PHK', 'Mediasi'],
      datasets: [{
        label: 'Jumlah Pencarian',
        data: [120, 80, 70, 60, 50, 45, 40, 30], // Contoh data jumlah pencarian
        backgroundColor: [
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(231, 233, 237, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(75, 192, 192, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(231, 233, 237, 1)',
          'rgba(255, 99, 132, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(201, 203, 207, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Jenis Berita yang Paling Banyak Dicari'
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<!-- Bagian Tentang -->
<section class="about-2 section" id="tentang">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="title text-center">
					<h2>Sistem Media Monitoring</h2>
					<p>Solusi real-time untuk memantau informasi terkait ketenagakerjaan di Kota Semarang.</p>
					<div class="border"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-4 mb-md-0">
				<img loading="lazy" src="<?= base_url('assets/images/about/mediamonitoring.jpg') ?>"class="img-fluid" alt="Media Monitoring">
			</div>
			<div class="col-md-6">
				<ul class="checklist">
					<li>Memantau berita ketenagakerjaan terkini.</li>
					<li>Analisis data untuk pengambilan keputusan strategis.</li>
					<li>Akses informasi dari berbagai media secara real-time.</li>
				</ul>
				<a href="tentang.html" class="btn btn-main mt-20">Pelajari Lebih Lanjut</a>
			</div>
		</div>
	</div>
</section>

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
			<article class="col-lg-4 col-md-6">
				<div class="post-item">
					<div class="media-wrapper">
						<img loading="lazy" src="<?= base_url('assets/images/about/mediamonitoring.jpg') ?>" alt="Informasi 1" class="img-fluid">
					</div>
					<div class="content">
						<h3><a href="detail-berita.html">Lowongan Kerja Baru</a></h3>
						<p>Daftar lowongan kerja terbaru di berbagai sektor untuk warga Semarang.</p>
						<a class="btn btn-main" href="detail-berita.html">Baca Selengkapnya</a>
					</div>
				</div>
			</article>
			<article class="col-lg-4 col-md-6">
				<div class="post-item">
					<div class="media-wrapper">
						<img loading="lazy" src="<?= base_url('assets/images/about/mediamonitoring.jpg') ?>" alt="Informasi 2" class="img-fluid">
					</div>
					<div class="content">
						<h3><a href="detail-berita.html">Pelatihan Kerja</a></h3>
						<p>Informasi jadwal pelatihan kerja bagi pencari kerja di Kota Semarang.</p>
						<a class="btn btn-main" href="detail-berita.html">Baca Selengkapnya</a>
					</div>
				</div>
			</article>
			<article class="col-lg-4 col-md-6">
				<div class="post-item">
					<div class="media-wrapper">
						<img loading="lazy" src="<?= base_url('assets/images/about/mediamonitoring.jpg') ?>"  alt="Informasi 3" class="img-fluid">
					</div>
					<div class="content">
						<h3><a href="detail-berita.html">Statistik Ketenagakerjaan</a></h3>
						<p>Data dan analisis terbaru tentang ketenagakerjaan di wilayah Semarang.</p>
						<a class="btn btn-main" href="detail-berita.html">Baca Selengkapnya</a>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>
