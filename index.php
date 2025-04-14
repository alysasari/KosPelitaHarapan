<?php
session_start();
include "./pages/db.php";

// Ambil URI setelah domain
$request = trim(str_replace("/KosPelitaHarapan", "", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)), "/");

// Definisikan route statis
$routes = [
    "" => "pages/home.php", 
    "home" => "pages/home.php",
    "koneksi" => "pages/db.php", 
    "info" => "pages/info.php",
    "login" => "pages/login.php",
    "room" => "pages/users/room.php",
    "help" => "pages/users/help.php"
];

// Cek apakah request cocok dengan route statis
if (array_key_exists($request, $routes)) {
    include $routes[$request];
    exit;
}

// Tangani route dinamis: roomDetail/{type}
if (preg_match("#^roomDetail/([^/]+)$#", $request, $matches)) {
    $_GET['type'] = $matches[1];
    include "pages/users/roomDetail.php";
    exit;
}

// 404 jika tidak ditemukan
http_response_code(404);
echo "404 Not Found";
