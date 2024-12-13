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
    <form action="<?= base_url('media/create'); ?>" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama media" required>
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
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status" required>
                        <option value="">Pilih Status</option>
                        <option value="disetujui">Disetujui</option>
                        <option value="belum disetujui">Belum Disetujui</option>
                        <option value="tolak">Tolak</option>
                    </select>
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
