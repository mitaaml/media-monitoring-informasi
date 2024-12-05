    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Admin</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
    <table class="table table-bordered" cellpadding="10" cellspacing="0">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($admins)): ?>
            <?php foreach ($admins as $admin): ?>
                <tr>
                    <td><?= $admin['id']; ?></td>
                    <td><?= $admin['nama']; ?></td>
                    <td><?= $admin['nip']; ?></td>
                    <td><?= $admin['email']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Tidak ada data admin.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
        </div>
    </div>