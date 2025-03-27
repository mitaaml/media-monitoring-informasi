<?php
require_once 'connection.php';
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debug: Log request data
    error_log("POST Request received");
    error_log("FILES: " . print_r($_FILES, true));
    error_log("POST: " . print_r($_POST, true));

    // Periksa apakah ada file yang diunggah
    if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] !== UPLOAD_ERR_OK) {
        $error_code = isset($_FILES['gambar']) ? $_FILES['gambar']['error'] : 'File tidak ada';
        error_log("File upload error: " . $error_code);
        echo json_encode([
            "status" => false,
            "message" => "File tidak ditemukan atau gagal diunggah. Error code: " . $error_code
        ]);
        exit();
    }

    // Validasi ukuran file (contoh: maksimal 5MB)
    if ($_FILES['gambar']['size'] > 5 * 1024 * 1024) {
        echo json_encode([
            "status" => false,
            "message" => "Ukuran file melebihi batas yang diizinkan (5MB)"
        ]);
        exit();
    }

    // Ambil data dari form-data
    $id_kategori = isset($_POST['id_kategori']) ? intval($_POST['id_kategori']) : null;
    $nama = isset($_POST['nama']) ? $conn->real_escape_string($_POST['nama']) : null;
    $judul = isset($_POST['judul']) ? $conn->real_escape_string($_POST['judul']) : null;
    $url = isset($_POST['url']) ? $conn->real_escape_string($_POST['url']) : null;
    $status = 'belum disetujui';
    $tanggal = isset($_POST['tanggal']) ? date("Y-m-d H:i:s", strtotime($_POST['tanggal'])) : date("Y-m-d H:i:s");
    $deskripsi = isset($_POST['deskripsi']) ? $conn->real_escape_string($_POST['deskripsi']) : null;

    // Pastikan direktori upload ada dan izin menulis
    $upload_dir = "disnaker-monitoring/uploads/";

    // Cek direktori absolut untuk debugging
    $absolute_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $upload_dir;
    error_log("Absolute path: " . $absolute_path);

    // Buat direktori rekursif jika belum ada
    if (!is_dir($absolute_path)) {
        if (!mkdir($absolute_path, 0777, true)) {
            error_log("Failed to create directory: " . $absolute_path);
            echo json_encode([
                "status" => false,
                "message" => "Gagal membuat direktori upload: " . error_get_last()['message']
            ]);
            exit();
        }
    }

    // Pastikan direktori dapat ditulis
    if (!is_writable($absolute_path)) {
        chmod($absolute_path, 0777);
        if (!is_writable($absolute_path)) {
            error_log("Directory not writable: " . $absolute_path);
            echo json_encode([
                "status" => false,
                "message" => "Direktori upload tidak dapat diakses untuk menulis"
            ]);
            exit();
        }
    }

    // Ambil ekstensi file dan buat nama baru
    $file_ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
    $file_name = time() . "." . $file_ext;
    $file_path = $absolute_path . $file_name;

    error_log("Trying to upload to: " . $file_path);

    // Coba pindahkan file yang diupload
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $file_path)) {
        error_log("File successfully uploaded to: " . $file_path);

        // Simpan data ke database menggunakan prepared statement
        $sql = "INSERT INTO media (id_kategori, nama, judul, url, status, tanggal, gambar, deskripsi, view) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            error_log("Database error: " . $conn->error);
            echo json_encode([
                "status" => false,
                "message" => "Gagal mempersiapkan statement: " . $conn->error
            ]);
            exit();
        }

        // Bind parameter ke statement
        $stmt->bind_param(
            "isssssss",
            $id_kategori,
            $nama,
            $judul,
            $url,
            $status,
            $tanggal,
            $file_name,
            $deskripsi
        );

        if ($stmt->execute()) {
            echo json_encode([
                "status" => true,
                "message" => "Data media berhasil dikirim",
                "data" => [
                    "id_kategori" => $id_kategori,
                    "nama" => $nama,
                    "judul" => $judul,
                    "url" => $url,
                    "status" => $status,
                    "tanggal" => $tanggal,
                    "gambar" => $file_name,
                    "deskripsi" => $deskripsi
                ]
            ]);
        } else {
            error_log("SQL error: " . $stmt->error);
            echo json_encode([
                "status" => false,
                "message" => "Gagal menyimpan data: " . $stmt->error
            ]);
        }

        $stmt->close();
    } else {
        $error = error_get_last();
        error_log("Failed to move uploaded file: " . ($error ? $error['message'] : 'Unknown error'));
        echo json_encode([
            "status" => false,
            "message" => "Gagal menyimpan file ke server: " . ($error ? $error['message'] : 'Unknown error')
        ]);
    }
} else {
    echo json_encode([
        "status" => false,
        "message" => "Metode request tidak valid"
    ]);
}

$conn->close();
