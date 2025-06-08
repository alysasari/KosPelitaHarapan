<?php
include './koneksi/db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Jalankan query hapus
    $sql = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: da// arahkan kembali ke halaman utama
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
