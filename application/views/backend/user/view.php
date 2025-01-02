<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
        <a href="<?= base_url('user/create'); ?>" class="btn btn-primary">Tambah User</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <table class="table table-bordered" cellpadding="10" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php $no = 1; foreach ($users as $user): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?php 
                                // Menampilkan nama admin atau pemimpin berdasarkan data yang ada
                                if (!empty($user['admin_nama'])) {
                                    echo $user['admin_nama']; 
                                } elseif (!empty($user['pemimpin_nama'])) {
                                    echo $user['pemimpin_nama'];
                                } else {
                                    echo 'Nama tidak tersedia';
                                }
                                ?>
                            </td>
                            <td>
                                <?php 
                                // Menampilkan NIP admin atau pemimpin
                                if (!empty($user['admin_nip'])) {
                                    echo $user['admin_nip']; 
                                } elseif (!empty($user['pemimpin_nip'])) {
                                    echo $user['pemimpin_nip'];
                                } else {
                                    echo 'NIP tidak tersedia';
                                }
                                ?>
                            </td>
                            <td><?= $user['email']; ?></td>
                            <td>
                                <?php 
                                // Menampilkan role pengguna berdasarkan data yang ada
                                if (!empty($user['admin_nama'])) {
                                    echo 'Admin';
                                } elseif (!empty($user['pemimpin_nama'])) {
                                    echo 'Pemimpin';
                                } else {
                                    echo 'User';
                                }
                                ?>
                            </td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="<?= base_url('user/edit/' . $user['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <!-- Tombol Hapus -->
                                <a href="<?= base_url('user/delete/' . $user['id']); ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data user.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
