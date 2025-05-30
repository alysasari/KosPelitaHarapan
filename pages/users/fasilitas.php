<?php
include __DIR__ . '/../../koneksi/db.php';

// Ambil ID dari URL segment
$segments = explode('/', $_GET['url'] ?? '');

// Pastikan segment ke-3 adalah ID numerik
if (count($segments) < 3 || !is_numeric($segments[2])) {
    echo "<p class='text-red-500'>ID tidak ditemukan di URL.</p>";
    exit;
}

$id = (int)$segments[2]; // Ambil ID dari segment ke-3

// Ambil data kamar berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM rooms WHERE id = '$id'");

// Cek jika query gagal atau tidak ada hasil
if (!$query || mysqli_num_rows($query) == 0) {
    echo "<p class='text-red-500'>Data kamar tidak ditemukan.</p>";
    exit;
}

$room = mysqli_fetch_assoc($query);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Facilities Available</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans p-6">

    <div class="max-w-6xl mx-auto bg-white rounded-lg p-6 shadow-lg flex gap-6">

        <!-- Left: Facilities and Progress -->
        <div class="w-2/3">
            <p class="text-sm text-gray-600 mb-1">Step 1 of 4</p>
            <h1 class="text-2xl font-bold mb-6">Facilities Available</h1>

            <div class="flex space-x-4 mb-6">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-full">Facilities</button>
                <button class="bg-white text-gray-700 px-4 py-2 rounded-full border">Time</button>
                <button class="bg-white text-gray-700 px-4 py-2 rounded-full border">Confirm</button>
                <button class="bg-white text-gray-700 px-4 py-2 rounded-full border">Payment</button>
            </div>

            <div class="space-y-3">
                <?php
                $fasilitas = explode(",", $room['fasilitas']);
                foreach ($fasilitas as $f) {
                    echo '
                <div class="flex justify-between items-center p-4 bg-gray-100 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <div class="text-yellow-500">✔️</div>
                        <p class="font-semibold">' . trim($f) . '</p>
                    </div>
                    <p class="text-gray-600">Free</p>
                </div>';
                }
                ?>
            </div>

            <a href="../../roomDetail/<?= $room['id'] ?>" class="border px-4 py-2 rounded bg-white hover:bg-gray-100">Kembali</a>



        </div>

        <!-- Right: Booking Summary -->
        <div class="w-1/3">
            <div class="bg-white border p-4 rounded-lg shadow-sm">
                <img src="../../uploads/<?= htmlspecialchars($room['gambar']) ?>" alt="Room Image" class="rounded mb-4 w-full h-40 object-cover">
                <h2 class="font-semibold text-lg"><?= htmlspecialchars($room['name']) ?></h2>
                <p class="text-sm text-gray-500 mb-2">Pelita Harapan</p>

                <div class="text-sm text-gray-600 border-t border-b py-3">
                    <div class="flex justify-between">
                        <span><?= htmlspecialchars($room['name']) ?> Type</span>
                        <span>Rp <?= number_format($room['price'], 0, ',', '.') ?></span>
                    </div>
                    <div class="flex justify-between mt-2">
                        <span><?= $room['tenant_room'] ?> orang</span>
                        <span></span>
                    </div>
                </div>

                <div class="flex justify-between font-bold py-3">
                    <span>Total</span>
                    <span>Rp <?= number_format($room['price'], 0, ',', '.') ?></span>
                </div>

                <button class="w-full bg-purple-800 hover:bg-purple-900 text-white py-2 rounded-lg mt-2">Continue</button>
            </div>
        </div>

    </div>
</body>

</html>