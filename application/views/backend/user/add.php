<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah User</h1>
    <p class="mb-4">Silakan menambah user sesuai kebutuhan.</p>

    <!-- Card for Adding User -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('user/create'); ?>">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="form-control" 
                        placeholder="Masukkan email user" 
                        required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control" 
                        placeholder="Masukkan password user" 
                        required>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="">Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="pemimpin">Pemimpin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input 
                        type="text" 
                        name="nama" 
                        id="nama" 
                        class="form-control" 
                        placeholder="Masukkan nama" 
                        required>
                </div>

                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input 
                        type="text" 
                        name="nip" 
                        id="nip" 
                        class="form-control" 
                        placeholder="Masukkan NIP" 
                        required>
                </div>

                <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input 
                        type="text" 
                        name="telp" 
                        id="telp" 
                        class="form-control" 
                        placeholder="Masukkan nomor telepon" 
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
                        required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
