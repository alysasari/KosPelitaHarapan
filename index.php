<?php
session_start();
include "./koneksi/db.php";

// Ambil URI setelah "/kosPelitaHarapan"
$request = trim(str_replace("/kosPelitaHarapan", "", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)), "/");

// Route statis
$routes = [
    "" => "pages/home.php",
    "home" => "pages/home.php",
    "koneksi" => "pages/db.php",
    "info" => "pages/info.php",
    "login" => "pages/login.php",
    "room" => "pages/users/room.php",
    "roomDetail" => "pages/users/roomDetail.php",
    "roomDetail/[:id]" => "pages/users/roomDetail.php",
    "help" => "pages/users/help.php",
    "history" => "pages/users/history.php",
    "admin/dashboard" => "pages/admin/dashboard.php",
    "admin/customers" => "pages/admin/Customers.php",
    "admin/product" => "pages/admin/Product.php",
    "admin/help" => "pages/admin/Help.php",
    "owners/product" => "pages/owners/ownerProduct.php",
    "owners/customers" => "pages/owners/ownerCustomer.php",
    "register" => "pages/register.php",
    "logout" => "koneksi/logout.php",
    "edit" => "pages/admin/edit.php"
];

// Cek apakah request cocok route statis
if (array_key_exists($request, $routes)) {
    include $routes[$request];
    exit;
}

// Route dinamis: roomDetail/{type}
if (preg_match("#^roomDetail/([^/]+)$#", $request, $matches)) {
    $_GET['type'] = $matches[1];
    include "pages/users/roomDetail.php";
    exit;
}

// Jika tidak cocok, tampilkan 404
http_response_code(404);
echo "Tidak ditemukan Yaww";
