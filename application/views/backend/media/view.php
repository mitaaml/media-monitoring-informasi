<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Media</h1>
        <a href="<?= base_url('media/add'); ?>" class="btn btn-primary">Tambah Media</a>
    </div>

    <!-- Data Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Media</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Url</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($medias)): ?>
                            <?php
                            $no = 1;
                            foreach ($medias as $media): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $media['nama']; ?></td>
                                    <td><?= $media['judul']; ?></td>
                                    <td><a href="<?= $media['url']; ?>" target="_blank">Kunjungi</a></td>
                                    <td><?= $media['nama_kategori']; ?></td>
                                    <td>
                                        <form action="<?= base_url('media/update_status/' . $media['id']); ?>" method="post">
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="disetujui" <?= $media['status'] === 'disetujui' ? 'selected' : ''; ?>>Disetujui</option>
                                                <option value="belum disetujui" <?= $media['status'] === 'belum disetujui' ? 'selected' : ''; ?>>Belum Disetujui</option>
                                                <option value="tolak" <?= $media['status'] === 'tolak' ? 'selected' : ''; ?>>Tolak</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <?php if (!empty($media['gambar'])): ?>
                                            <img src="<?= base_url('uploads/' . $media['gambar']); ?>" alt="Gambar" width="100">
                                        <?php else: ?>
                                            Tidak ada gambar
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $media['deskripsi']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('media/edit/' . $media['id']); ?>" class="btn btn-warning btn-sm mx-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('media/delete_media/' . $media['id']); ?>" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data media.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>