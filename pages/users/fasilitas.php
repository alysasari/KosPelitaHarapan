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
            <h1 class="text-2xl font-bold mb-6">Facilities Available</h1>

            <div class="flex space-x-4 mb-6">
                <button id="btnFacilities" class="bg-blue-600 text-white px-4 py-2 rounded-full">Facilities</button>
                <button id="btnTime" class="bg-white text-gray-700 px-4 py-2 rounded-full border">Time</button>
                <button id="btnConfirm" class="bg-white text-gray-700 px-4 py-2 rounded-full border">Confirm</button>
                <button id="btnPayment" class="bg-white text-gray-700 px-4 py-2 rounded-full border">Payment</button>
            </div>

            <!-- halaman fasilitas -->
            <div id="stepFacilities" class="space-y-3">
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

            <!-- halaman time -->
            <div id="stepTime" class="hidden">
                <div class="border p-4 rounded bg-gray-100">
                    <h2 class="text-lg font-semibold mb-2"> Select a time</h2>
                    <div class="grid grid-cols-7 gap-2 text-center text-sm mb-4">
                        <div class="bg-purple-700 text-white py-2 rounded">Sun<br>16</div>
                        <div class="bg-white border py-2 rounded">Mon<br>17</div>
                        <div class="bg-white border py-2 rounded">Tue<br>18</div>
                        <div class="bg-white border py-2 rounded">Wed<br>19</div>
                        <div class="bg-white border py-2 rounded">Thu<br>20</div>
                        <div class="bg-white border py-2 rounded">Fri<br>21</div>
                        <div class="bg-white border py-2 rounded">Sat<br>22</div>
                    </div>
                    <div>
                        <div class="flex items-center h-[72px] bg-white flex pl-6 font-bold">4:45 pm</div>
                        <br>
                        <div class="flex items-center h-[72px] bg-white flex pl-6 font-bold">5:00 pm</div>
                        <br>
                        <div class="flex items-center h-[72px] bg-white flex pl-6 font-bold">5:15 pm</div>
                        <br>
                        <div class="flex items-center h-[72px] bg-white flex pl-6 font-bold">4:30 pm</div>
                    </div>
                </div>
            </div>

            <!-- Confirm Section -->
            <div id="stepConfirm" class="hidden">
                <div class="border p-4 bg-gray-100 rounded">
                    <h2 class="text-lg font-semibold mb-2">Confirmation</h2>
                    <p class="text-gray-700 mb-4">Silakan cek kembali data booking kamar:</p>

                    <ul class="text-sm space-y-2">
                        <li><strong>Nama Kamar:</strong> <?= htmlspecialchars($room['name']) ?></li>
                        <li><strong>Harga:</strong> Rp <?= number_format($room['price'], 0, ',', '.') ?></li>
                        <li><strong>Jumlah Penghuni:</strong> <?= $room['tenant_room'] ?> orang</li>
                        <li><strong>Lokasi:</strong> Babarsari, Yogyakarta</li>
                        <li><strong>Waktu Booking:</strong>4:45pm</li>
                    </ul>
                </div>
            </div>


            <!-- Payment Section -->
            <div id="stepPayment" class="hidden">
                <div class="border p-4 bg-gray-100 rounded">
                    <h2 class="text-lg font-semibold mb-2">Payment</h2>
                    <p class="mb-4 text-gray-700">Pilih metode pembayaran:</p>

                    <div class="space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="payment" checked>
                            <span>Transfer Bank</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="payment">
                            <span>Gopay / OVO / Dana</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="payment">
                            <span>Kartu Kredit</span>
                        </label>
                    </div>
                </div>
            </div>

            <br>
            <br>
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


    </div>

    <!-- Javascript -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Tombol
        const btnFacilities = document.getElementById("btnFacilities");
        const btnTime = document.getElementById("btnTime");
        const btnConfirm = document.getElementById("btnConfirm");
        const btnPayment = document.getElementById("btnPayment");

        // Section Konten
        const sectionFacilities = document.getElementById("stepFacilities");
        const sectionTime = document.getElementById("stepTime");
        const sectionConfirm = document.getElementById("stepConfirm");
        const sectionPayment = document.getElementById("stepPayment");

        const allSections = [sectionFacilities, sectionTime, sectionConfirm, sectionPayment];
        const allButtons = [btnFacilities, btnTime, btnConfirm, btnPayment];

        // Fungsi untuk switch tab
        function showSection(activeButton, activeSection) {
            allSections.forEach(section => section.classList.add("hidden"));
            allButtons.forEach(btn => {
                btn.classList.remove("bg-blue-600", "text-white");
                btn.classList.add("bg-white", "text-gray-700", "border");
            });

            activeSection.classList.remove("hidden");
            activeButton.classList.add("bg-blue-600", "text-white");
            activeButton.classList.remove("bg-white", "text-gray-700", "border");
        }

        // Event listeners
        btnFacilities.addEventListener("click", () => showSection(btnFacilities, sectionFacilities));
        btnTime.addEventListener("click", () => showSection(btnTime, sectionTime));
        btnConfirm.addEventListener("click", () => showSection(btnConfirm, sectionConfirm));
        btnPayment.addEventListener("click", () => showSection(btnPayment, sectionPayment));
    });
</script>


</body>

</html>