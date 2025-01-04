<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit User</h1>
    <p class="mb-4">Silakan perbarui data user sesuai kebutuhan.</p>

    <!-- Card for Editing User -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('user/edit/' . $user['id']); ?>">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        placeholder="Masukkan email user"
                        value="<?= $user['email']; ?>"
                        required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Kosongkan jika tidak ingin mengubah password">
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control" disabled>
                        <option value="">Pilih Role</option>
                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                        <option value="pemimpin" <?= $user['role'] === 'pemimpin' ? 'selected' : ''; ?>>Pemimpin</option>
                        <option value="kompetitor" <?= $user['role'] === 'kompetitor' ? 'selected' : ''; ?>>Kompetitor</option>
                    </select>
                    <!-- Input tersembunyi untuk mengirimkan nilai role -->
                    <input type="hidden" name="role" value="<?= $user['role']; ?>" />
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input
                        type="text"
                        name="nama"
                        id="nama"
                        class="form-control"
                        placeholder="Masukkan nama"
                        value="<?= $user['nama']; ?>"
                        required>
                </div>

                <?php if ($user['role'] !== 'kompetitor'): ?>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input
                            type="text"
                            name="nip"
                            id="nip"
                            class="form-control"
                            placeholder="Masukkan NIP"
                            value="<?= isset($user['nip']) ? $user['nip'] : ''; ?>">
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input
                        type="text"
                        name="telp"
                        id="telp"
                        class="form-control"
                        placeholder="Masukkan nomor telepon"
                        value="<?= $user['telp']; ?>"
                        required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea
                        name="alamat"
                        id="alamat"
                        class="form-control"
                        placeholder="Masukkan alamat"
                        rows="3"
                        required><?= $user['alamat']; ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="<?= base_url('user'); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>