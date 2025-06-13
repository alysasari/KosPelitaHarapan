<?php
include '../../koneksi/db.php';

$sender = $_POST['sender'] ?? '';
$message = $_POST['message'] ?? '';

if (!$sender || !$message) {
    echo json_encode(['status' => 'error', 'message' => 'Data kosong']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO messages (sender, message, created_at) VALUES (?, ?, NOW())");
$stmt->bind_param("ss", $sender, $message);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
}

$stmt->close();
$conn->close();

