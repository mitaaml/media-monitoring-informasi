<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Media</h1>
  <p class="mb-4">Silahkan untuk menambah media</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Media</h6>
    </div>
    <div class="card-body">
      <form action="<?= base_url('media/create'); ?>" method="post" enctype="multipart/form-data">

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
          <label for="status">Status</label>
          <select class="form-control" name="status" id="status" required>
            <option value="">Pilih Status</option>
            <option value="disetujui">Disetujui</option>
            <option value="belum disetujui">Belum Disetujui</option>
            <option value="tolak">Tolak</option>
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
        <button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url('media'); ?>'">OK</button>
      </div>
    </div>
  </div>
</div>