<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Media</h1>
    <p class="mb-4">Silakan menambah media sesuai kebutuhan.</p>

    <!-- Card for Adding Media -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Media</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('kategori/create'); ?>">
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input 
                        type="text" 
                        name="nama_kategori" 
                        id="nama_kategori" 
                        class="form-control" 
                        placeholder="Masukkan nama kategori" 
                        required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>