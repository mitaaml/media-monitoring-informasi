<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Laporan Media</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Laporan</h6>
            <a href="<?= base_url('cetak/laporan'); ?>" class="btn btn-primary" target="_blank">
                Download Laporan Media
            </a>
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
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
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
                                        <?php
                                        // Menampilkan status media dengan badge
                                        if ($media['status'] === 'disetujui') {
                                            echo '<span class="badge badge-success">Disetujui</span>';
                                        } elseif ($media['status'] === 'belum disetujui') {
                                            echo '<span class="badge badge-warning">Belum Disetujui</span>';
                                        } else {
                                            echo '<span class="badge badge-danger">Tolak</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        // Set Locale untuk bahasa Indonesia
                                        setlocale(LC_TIME, 'id_ID', 'id_ID.UTF-8');

                                        // Format tanggal menjadi "2 Oktober 2022, 09.40 WIB"
                                        echo strftime("%e %B %Y, %H.%M WIB", strtotime($media['tanggal']));
                                        ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($media['gambar'])): ?>
                                            <img src="<?= base_url('uploads/' . $media['gambar']); ?>" alt="Gambar" width="100">
                                        <?php else: ?>
                                            Tidak ada gambar
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $media['deskripsi']; ?></td>
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