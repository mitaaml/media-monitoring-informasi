<!-- Bagian Header -->
<section class="single-page-header bg-primary text-white py-5">
	<div class="container text-center">
		<h2 class="mb-3">Kontributor</h2>
		<ol class="breadcrumb header-bradcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="index.html" class="text-white"></a></li>
			<li class="breadcrumb-item active" aria-current="page"></li>
		</ol>
	</div>
</section>

<!-- Bagian Form Kontributor -->
<section class="contact-us section py-5" id="contact">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-lg-8 text-center">
				<h3 class="mb-4">Tambah Kontributor Baru</h3>
				<p class="text-muted">Isi formulir di bawah ini untuk menambahkan data kontributor ke sistem media monitoring.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="contact-form">
					<form action="<?= base_url('kontributor/create'); ?>" method="post" enctype="multipart/form-data">
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
							<label for="id_kategori">Kategori</label>
							<select class="form-control" name="id_kategori" id="id_kategori" required>
								<option value="">Pilih Kategori</option>
								<?php foreach ($kategori as $kat): ?>
									<option value="<?= $kat->id ?>"><?= $kat->nama_kategori ?></option>
								<?php endforeach; ?>
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

						<div class="d-flex justify-content-between">
							<a href="<?= base_url('media'); ?>" class="btn btn-secondary">Kembali</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Modal Sukses -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-success text-white">
				<h5 class="modal-title" id="successModalLabel">Sukses</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Data berhasil disimpan!
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url('kontributor'); ?>'">OK</button>
			</div>
		</div>
	</div>
</div>

<!-- Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
	$(document).ready(function() {
		<?php if ($this->session->flashdata('success')): ?>
			$('#successModal').modal('show');
		<?php endif; ?>
	});
</script>

<style>
	.single-page-header {
		background: #007bff;
		padding: 50px 0;
		color: white;
	}
	.modal-header.bg-success {
		background-color: #28a745 !important;
		color: white;
	}
	.contact-form label {
		font-weight: bold;
	}
	.btn-primary {
		background-color: #007bff;
		border: none;
	}
	.btn-primary:hover {
		background-color: #0056b3;
	}
	.btn-secondary {
		background-color: #6c757d;
		border: none;
	}
</style>
