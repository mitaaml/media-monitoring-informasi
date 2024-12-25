<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profil</title>
    <!-- Tambahkan CSS dan JS yang diperlukan -->
</head>

<body>
    <div class="container">
        <h1>Profil Pengguna</h1>
        
        <!-- Menampilkan pesan jika ada -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <!-- Tampilkan data profil -->
        <form action="<?= base_url('profile/update'); ?>" method="POST">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= isset($user['admin_nama']) ? $user['admin_nama'] : (isset($user['pemimpin_nama']) ? $user['pemimpin_nama'] : ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= isset($user['admin_telp']) ? $user['admin_telp'] : (isset($user['pemimpin_telp']) ? $user['pemimpin_telp'] : ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea class="form-control" id="address" name="address"><?= isset($user['admin_alamat']) ? $user['admin_alamat'] : (isset($user['pemimpin_alamat']) ? $user['pemimpin_alamat'] : ''); ?></textarea>
            </div>

            <!-- Form untuk Mengubah Password -->
            <h5>Ubah Password</h5>
            <div class="form-group">
                <label for="current_password">Password Lama</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">Password Baru</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui Profil</button>
        </form>
    </div>
</body>

</html>
