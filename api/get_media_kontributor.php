<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Ambil raw data JSON dari body request
$data = json_decode(file_get_contents("php://input"), true);

// Ambil id_user dari request
$id_user = isset($data['id_user']) ? $data['id_user'] : '';

// Periksa apakah id_user diberikan dan valid
if (empty($id_user) || !is_numeric($id_user)) {
    http_response_code(400);
    echo json_encode([
        "status" => false,
        "message" => "Parameter 'id_user' diperlukan dan harus berupa angka."
    ]);
    exit();
}

// Siapkan query untuk mengambil data berdasarkan id_user
$sql = "SELECT * FROM media WHERE id_user = ? ORDER BY id DESC";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    http_response_code(500);
    echo json_encode([
        "status" => false,
        "message" => "Kesalahan dalam menyiapkan query."
    ]);
    exit();
}

$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();

$media = [];
while ($row = $result->fetch_assoc()) {
    $media[] = $row;
}

if (!empty($media)) {
    echo json_encode([
        "status" => true,
        "message" => "Data ditemukan",
        "data" => $media
    ]);
} else {
    http_response_code(404);
    echo json_encode([
        "status" => false,
        "message" => "Data tidak ditemukan",
        "data" => []
    ]);
}

// Tutup koneksi database
$stmt->close();
$conn->close();
