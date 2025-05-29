<?php
session_start();
include "./koneksi/db.php";

// Ambil path dari URL setelah "/KosPelitaHarapanKOS"
$request = trim(str_replace("/KosPelitaHarapan", "", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)), "/");

// Route statis (tanpa parameter)
$routes = [
    "" => "pages/home.php",
    "home" => "pages/home.php",
    "koneksi" => "pages/db.php",
    "info" => "pages/info.php",
    "login" => "pages/login.php",
    "room" => "pages/users/room.php",
    "help" => "pages/users/help.php",
    "history" => "pages/users/history.php",
    "register" => "pages/register.php",
    "logout" => "koneksi/logout.php",
    "admin/dashboard" => "pages/admin/dashboard.php",
    "admin/customers" => "pages/admin/Customers.php",
    "admin/product" => "pages/admin/Product.php",
    "admin/help" => "pages/admin/Help.php",
    "owners/product" => "pages/owners/ownerProduct.php",
    "owners/customers" => "pages/owners/ownerCustomer.php",
    "edit" => "pages/admin/edit.php"
];

// Jika cocok dengan route statis
if (array_key_exists($request, $routes)) {
    include $routes[$request];
    exit;
}

// Route dinamis: roomDetail/{id}
if (preg_match("#^roomDetail/(\d+)$#", $request, $matches)) {
    $_GET['url'] = "roomDetail/" . $matches[1];
    include "pages/users/roomDetail.php";
    exit;
}

// Route tambahan jika kamu punya misalnya roomDetail/fasilitas
if ($request === "roomDetail/fasilitas") {
    include "pages/users/fasilitas.php";
    exit;
}

// Jika tidak ditemukan
http_response_code(404);
echo "Halaman tidak ditemukan.";
