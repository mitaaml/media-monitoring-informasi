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