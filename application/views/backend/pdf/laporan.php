<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
    <style>
        /* Styling untuk kop surat */
        .kop-surat {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .kop-surat .logo {
            width: 80px; /* Ukuran logo */
            height: auto;
        }

        .kop-surat .header-info {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .kop-surat .header-info p {
            margin: 0;
        }

        /* Styling untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }

        /* Styling untuk judul */
        h1 {
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Kop Surat -->
    <div class="kop-surat">
    <img src="<?= base_url('assets/images/logodisnaker.png'); ?>" alt="Logo" class="logo">
    <!-- Ganti path dengan path logo Anda -->
        <div class="header-info">
            <p>PEMERINTAH KOTA SEMARANG</p>
            <h1>DINAS TENAGA KERJA</h1>
            <p>Jalan Ki Mangunsarkoro Nomor 21, Karangkidul, Semarang Tengah 50136</p>
            <p>Telepon: (024) 8440335, 8440339 | Email: disnaker.semarangkota.go.id</p>
            
        </div>
    </div>

    <!-- Judul Laporan -->
    <h1><?= $title; ?></h1>

    <!-- Tabel Laporan -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>URL</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($media)): ?>
                <?php foreach ($media as $index => $item): ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= $item['nama']; ?></td>
                        <td><?= $item['url']; ?></td>
                        <td><?= $item['status']; ?></td>
                        <td><?= $item['tanggal']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Data tidak tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
