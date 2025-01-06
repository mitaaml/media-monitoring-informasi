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

<section class="contact-us" id="contact">
	<div class="container">
		<div class="row justify-content-center">
		</div>
		<div class="row">
			<div class="contact-form col-md-12 ">
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

					<a href="<?= base_url('media'); ?>" class="btn btn-secondary">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
	$(document).ready(function() {
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
				<button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url('kontributor'); ?>'">OK</button>
			</div>
		</div>
	</div>
</div>