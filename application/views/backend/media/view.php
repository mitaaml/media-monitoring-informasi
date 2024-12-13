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
            <th>ID</th>
            <th>Nama</th>
            <th>Url</th>
            <th>Jenis</th>
            <th>Status</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($medias)): ?>
            <?php foreach ($medias as $media): ?>
                <tr>
                    <td><?= $media['id']; ?></td>
                    <td><?= $media['nama']; ?></td>
                    <td><a href="<?= $media['url']; ?>" target="_blank">Kunjungi</a></td>
                    <td><?= $media['jenis']; ?></td>
                    <td><?= $media['status']; ?></td>
                    <td><?= $media['deskripsi']; ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('media/edit/' . $media['id']); ?>" class="btn btn-warning btn-sm mx-1">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="<?= base_url('media/delete/' . $media['id']); ?>" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">Tidak ada data media.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
            </div>
        </div>
    </div>
</div>
<!-- End of Page Content -->