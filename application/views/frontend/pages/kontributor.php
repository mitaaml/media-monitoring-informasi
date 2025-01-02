<section class="single-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Kontributor</h2>
				<ol class="breadcrumb header-bradcrumb justify-content-center">
					<li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Kontributor</li>
				</ol>
			</div>
		</div>
	</div>
</section>

 <!--Start Contact Us
	=========================================== -->
 <section class="contact-us" id="contact">
 	<div class="container">
 		<div class="row justify-content-center">
		</div>
 		<div class="row">

 			<!-- Contact Form -->
 			<div class="contact-form col-md-12 ">
			 <form action="<?= base_url('kontak/create'); ?>" method="post" enctype="multipart/form-data">

				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama media" required>
				</div>

				<div class="form-group">
					<label for="judul">Judul</label>
					<input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul media" required>
				</div>

				<div class="form-group">
					<label for="url">URL</label>
					<input type="text" class="form-control" name="url" id="url" placeholder="Masukkan URL media" required>
				</div>

				<div class="form-group">
					<label for="jenis">Jenis</label>
					<select class="form-control" name="jenis" id="jenis" required>
						<option value="">Pilih Jenis</option>
						<option value="Lowongan">Lowongan</option>
						<option value="Pelatihan">Pelatihan</option>
						<option value="Bisnis">Bisnis</option>
						<option value="UMKM">UMKM</option>
						<option value="Pabrik">Pabrik</option>
						<option value="Buruh">Buruh</option>
						<option value="PHK">PHK</option>
						<option value="Mediasi">Mediasi</option>
					</select>
				</div>

				<div class="form-group">
					<label for="gambar">Upload Gambar</label>
					<input type="file" class="form-control-file" name="gambar" id="gambar" accept="image/*" required>
				</div>

				<div class="form-group">
					<label for="deskripsi">Deskripsi</label>
					<textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" placeholder="Masukkan deskripsi media"></textarea>
				</div>

				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
 			</div>
 			<!-- ./End Contact Form -->

 		</div> <!-- end row -->
 	</div> <!-- end container -->
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
