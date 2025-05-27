<?php
include "./koneksi/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $available_room = $_POST['available_room'];
    $tenant_room = $_POST['tenant_room'];
    $fasilitas = $_POST['fasilitas'];
    $deskripsi = $_POST['deskripsi'];

    // Cek apakah ada gambar baru
    if ($_FILES['gambar']['error'] == 0) {
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $gambar = basename($_FILES['gambar']['name']);
        move_uploaded_file($tmp_name, "uploads/" . $gambar);
    } else {
        // Jika tidak upload gambar baru, ambil gambar lama
        $stmt = $conn->prepare("SELECT gambar FROM rooms WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($gambar);
        $stmt->fetch();
        $stmt->close();
    }

    // Update data
    $stmt = $conn->prepare("UPDATE rooms SET name=?, price=?, available_room=?, tenant_room=?, fasilitas=?, deskripsi=?, gambar=? WHERE id=?");
    $stmt->bind_param("siiisssi", $name, $price, $available_room, $tenant_room, $fasilitas, $deskripsi, $gambar, $id);

    if ($stmt->execute()) {
        header("Location: product");
        exit;
    } else {
        echo "Gagal update data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
