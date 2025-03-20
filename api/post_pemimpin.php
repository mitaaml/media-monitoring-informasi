<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Ambil raw data JSON dari body request
$data = json_decode(file_get_contents("php://input"), true);

// Validasi input
if (!isset($data['email']) || !isset($data['password'])) {
    echo json_encode(["status" => false, "error" => "Email dan password harus diisi"]);
    exit();
}

// Ambil data dari JSON
$email = $conn->real_escape_string($data['email']);
$password = password_hash($data['password'], PASSWORD_DEFAULT);

// Simpan user baru
$sql_insert_user = "INSERT INTO `user` (`email`, `password`) VALUES ('$email', '$password')";
if ($conn->query($sql_insert_user)) {
    $id_user = $conn->insert_id;

    // Cek apakah data pemimpin lengkap
    if (!empty($data['nama']) && !empty($data['nip']) && !empty($data['telp']) && !empty($data['alamat'])) {
        $nama = $conn->real_escape_string($data['nama']);
        $nip = $conn->real_escape_string($data['nip']);
        $telp = $conn->real_escape_string($data['telp']);
        $alamat = $conn->real_escape_string($data['alamat']);

        $sql_insert_pemimpin = "INSERT INTO `pemimpin` (`id_user`, `nama`, `nip`, `telp`, `alamat`) VALUES ('$id_user', '$nama', '$nip', '$telp', '$alamat')";
        if ($conn->query($sql_insert_pemimpin)) {
            echo json_encode([
                "status" => true,
                "message" => "Pemimpin berhasil didaftarkan",
                "id_user" => $id_user
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "error" => "Gagal menambahkan pemimpin: " . $conn->error
            ]);
        }
    } else {
        echo json_encode([
            "status" => true,
            "message" => "User berhasil didaftarkan tanpa peran pemimpin",
            "id_user" => $id_user
        ]);
    }
} else {
    echo json_encode([
        "status" => false,
        "error" => "Gagal menambahkan user: " . $conn->error
    ]);
}

$conn->close();
