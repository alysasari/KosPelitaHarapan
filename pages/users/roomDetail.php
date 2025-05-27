<?php
include __DIR__ . '/../../koneksi/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID kamar tidak valid.";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM rooms WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Kamar tidak ditemukan.";
    exit;
}

$room = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Kamar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class="bg-gray-100 py-10 px-4">
    <div data-aos="fade-down">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
            <!-- Gambar utama -->
            <img src="../../uploads/<?= htmlspecialchars($room['gambar']) ?>" alt="Gambar Kamar" class="w-full h-72 object-cover rounded-lg mb-4">

            <!-- Header: Nama, Rating, Lokasi -->
            <div class="flex justify-between">
                <div>
                    <div class="mb-4">
                        <h1 class="text-2xl font-bold mb-2"><?= htmlspecialchars($room['name']) ?></h1>
                        <div class="flex items-center text-sm text-gray-600 space-x-3">
                            <span>⭐ 5.0 (196)</span>
                            <span class="text-red-500">• Closed</span>
                            <span>opens soon at 9:00am</span>
                            <span>• MG Road, Bangalore</span>
                        </div>
                    </div>

                </div>

                <!-- Tombol -->
                <div>
                    <div class="flex gap-3">
                        <button onclick="window.history.back()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">Back</button>

                        <button class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Book now</button>


                    </div>
                    <span class="text-sm text-gray-500">15 people recently enquired</span>
                </div>
            </div>

            <br>
            <hr>
            <br>

            <!-- Info lokasi, pembayaran, dll -->
            <div class="flex flex-col sm:flex-row sm:justify-between text-sm text-gray-700 mb-6">
                <div class="flex items-center space-x-2 mb-2 sm:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-3.31 2.69-6 6-6s6 2.69 6 6-2.69 6-6 6-6-2.69-6-6z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12a10 10 0 1020 0 10 10 0 00-20 0z" />
                    </svg>
                    <span>Babarsari, Yogyakarta</span>
                </div>
                <div>
                    <span class="font-medium">Mode of payment:</span> Cash, Debit Card, Credit Card, UPI
                </div>
            </div>


        </div>
    </div>
    <script>
        AOS.init();
    </script>
</body>

</html>