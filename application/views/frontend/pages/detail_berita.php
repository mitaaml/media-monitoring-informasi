<section class="single-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Contact Us</h2>
				<ol class="breadcrumb header-bradcrumb justify-content-center">
					<li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
				</ol>
			</div>
		</div>
	</div>
</section>

 <!--Start Contact Us
	=========================================== -->
 <section class="contact-us" id="contact">
 <div class="container my-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- Detail Artikel -->
                <div class="post-item">
                    <div class="media-wrapper">
                        <!-- Gambar Artikel -->
                        <img loading="lazy" src="<?= base_url('uploads/' . ($berita['gambar'] ?: 'default.jpg')); ?>" alt="<?= $berita['judul']; ?>" class="img-fluid">
                    </div>
                    <div class="content">
                        <h1><?= $berita['judul']; ?></h1>
                        <p><strong>Tanggal:</strong> <?= date('D, d/m/Y', strtotime($berita['tanggal'])); ?></p>
                        <p><strong>Views:</strong> <?= $berita['view']; ?></p>
                        <p><?= $berita['deskripsi']; ?></p>
                    </div>
                </div>
                <a href="<?= base_url('berita'); ?>" class="btn btn-primary">Kembali ke Berita</a>
            </div>
        </div>
    </div>
 </section> <!-- end section -->

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

 <script>
    $(document).ready(function () {
        <?php if ($this->session->flashdata('success')): ?>
            $('#successModal').modal('show');
        <?php endif; ?>
    });
</script>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Sukses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Data berhasil disimpan!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url('kontak'); ?>'">OK</button>
      </div>
    </div>
  </div>
</div>