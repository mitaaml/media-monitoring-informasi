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
$password = $conn->real_escape_string($data['password']);

// Query untuk mencari user berdasarkan email
$sql_user = "SELECT * FROM `user` WHERE `email` = '$email' LIMIT 1";
$result = $conn->query($sql_user);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verifikasi password
    if (password_verify($password, $user['password'])) {
        $user_details = [];
        $level = 'user';

        // Cek apakah user termasuk dalam salah satu level
        $roles = [
            'admin' => 'SELECT * FROM `admin` WHERE `id_user` = ' . $user['id'] . ' LIMIT 1',
            'pemimpin' => 'SELECT * FROM `pemimpin` WHERE `id_user` = ' . $user['id'] . ' LIMIT 1',
            'kompetitor' => 'SELECT * FROM `kompetitor` WHERE `id_user` = ' . $user['id'] . ' LIMIT 1'
        ];

        foreach ($roles as $role => $query) {
            $role_result = $conn->query($query);
            if ($role_result->num_rows > 0) {
                $user_details = $role_result->fetch_assoc();
                $level = $role;
                break;
            }
        }

        echo json_encode([
            "status" => true,
            "message" => "Login berhasil",
            "id_user" => $user['id'],
            "email" => $user['email'],
            "level" => $level,
            "user_details" => $user_details
        ]);
    } else {
        echo json_encode(["status" => false, "error" => "Email atau password salah"]);
    }
} else {
    echo json_encode(["status" => false, "error" => "Pengguna tidak ditemukan"]);
}

$conn->close();
