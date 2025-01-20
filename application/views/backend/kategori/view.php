<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kategori</h1>
        <a href="<?= base_url('kategori/add'); ?>" class="btn btn-primary">Tambah Kategori</a>
    </div>

    <!-- Data Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1; // Inisialisasi di luar loop
                    foreach ($kategoris as $kategori): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $kategori['nama_kategori']; ?></td>
                            <td>
                                <a href="<?= base_url('kategori/edit/' . $kategori['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('kategori/delete/' . $kategori['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            </div>
        </div>
    </div>

</div>
<!-- End of Page Content -->