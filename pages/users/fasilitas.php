<?php
include __DIR__ . '/../../koneksi/db.php';

// Proses booking ketika form di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_booking'])) {
    $room_id = (int)$_POST['room_id'];
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $room_name = mysqli_real_escape_string($conn, $_POST['room_name']);
    $price = (int)$_POST['price'];
    $tenant_room = (int)$_POST['tenant_room'];
    $selected_date = mysqli_real_escape_string($conn, $_POST['selected_date']);
    $selected_time = mysqli_real_escape_string($conn, $_POST['selected_time']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);

    // Insert ke tabel bookings
    $insert_query = "INSERT INTO bookings (room_id, user_name, room_name, price, tenant_room, booking_date, booking_time, payment_method, created_at) 
                     VALUES ('$room_id', '$user_name', '$room_name', '$price', '$tenant_room', '$selected_date', '$selected_time', '$payment_method', NOW())";

    if (mysqli_query($conn, $insert_query)) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Booking Berhasil!',
                    text: 'Data booking Anda telah berhasil disimpan.',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#7c3aed'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../../roomDetail/" . $room_id . "';
                    }
                });
            });
        </script>";
        exit;
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Booking Gagal!',
                    text: 'Terjadi kesalahan: " . mysqli_error($conn) . "',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ef4444'
                });
            });
        </script>";
    }
}

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 font-sans p-6">

    <form method="POST" id="bookingForm">
        <input type="hidden" name="room_id" value="<?= $room['id'] ?>">
        <input type="hidden" name="room_name" value="<?= htmlspecialchars($room['name']) ?>">
        <input type="hidden" name="price" value="<?= $room['price'] ?>">
        <input type="hidden" name="tenant_room" value="<?= $room['tenant_room'] ?>">
        <input type="hidden" name="selected_date" id="selectedDate" value="">
        <input type="hidden" name="selected_time" id="selectedTime" value="">
        <input type="hidden" name="payment_method" id="selectedPayment" value="Transfer Bank">
        <input type="hidden" name="submit_booking" value="1">

        <div class="max-w-6xl mx-auto bg-white rounded-lg p-6 shadow-lg flex gap-6">

            <!-- Left: Facilities and Progress -->
            <div class="w-2/3">
                <h1 class="text-2xl font-bold mb-6">Facilities Available</h1>

                <div class="flex space-x-4 mb-6">
                    <button type="button" id="btnFacilities" class="bg-purple-800 text-white px-4 py-2 rounded-full border">Facilities</button>
                    <button type="button" id="btnTime" class="bg-white text-gray-700 px-4 py-2 rounded-full border">Time</button>
                    <button type="button" id="btnConfirm" class="bg-white text-gray-700 px-4 py-2 rounded-full border">Confirm</button>
                    <button type="button" id="btnPayment" class="bg-white text-gray-700 px-4 py-2 rounded-full border">Payment</button>
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
                    </div>';
                    }
                    ?>
                </div>

                <!-- halaman time -->
                <div id="stepTime" class="hidden">
                    <div class="border p-4 rounded bg-gray-100">
                        <h2 class="text-lg font-semibold mb-2">Select a time</h2>
                        <div id="dateGrid" class="grid grid-cols-7 gap-7 text-center text-sm mb-4"></div>
                        <div class="space-y-3" id="timeButtons">
                            <button type="button" class="time-btn w-full text-left h-[72px] bg-white pl-6 font-bold rounded hover:bg-purple-100 cursor-pointer transition" data-time="4:45 pm">4:45 pm</button>
                            <button type="button" class="time-btn w-full text-left h-[72px] bg-white pl-6 font-bold rounded hover:bg-purple-100 cursor-pointer transition" data-time="5:00 pm">5:00 pm</button>
                            <button type="button" class="time-btn w-full text-left h-[72px] bg-white pl-6 font-bold rounded hover:bg-purple-100 cursor-pointer transition" data-time="5:15 pm">5:15 pm</button>
                            <button type="button" class="time-btn w-full text-left h-[72px] bg-white pl-6 font-bold rounded hover:bg-purple-100 cursor-pointer transition" data-time="4:30 pm">4:30 pm</button>
                        </div>
                    </div>
                </div>

                <!-- Confirm Section -->
                <div id="stepConfirm" class="hidden">
                    <div class="border p-4 bg-gray-100 rounded">
                        <h2 class="text-lg font-semibold mb-4">Confirmation</h2>
                        <p class="text-gray-700 mb-4">Silakan isi data diri dan cek kembali data booking kamar:</p>

                        <!-- Form Input Nama User -->
                        <div class="mb-4">
                            <label for="user_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                            <input type="text" id="user_name" name="user_name" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="Masukkan nama lengkap Anda">
                        </div>

                        <ul class="text-sm space-y-2">
                            <li><strong>Nama Kamar:</strong> <?= htmlspecialchars($room['name']) ?></li>
                            <li><strong>Harga:</strong> Rp <?= number_format($room['price'], 0, ',', '.') ?></li>
                            <li><strong>Jumlah Penghuni:</strong> <?= $room['tenant_room'] ?> orang</li>
                            <li><strong>Lokasi:</strong> Babarsari, Yogyakarta</li>
                            <li id="selectedDateDisplay"><strong>Tanggal:</strong> <span class="text-gray-500">Belum dipilih</span></li>
                            <li id="selectedTimeDisplay"><strong>Waktu:</strong> <span class="text-gray-500">Belum dipilih</span></li>
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
                                <input type="radio" name="payment" value="BSI" checked class="payment-radio">
                                <span>BSI</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="payment" value="BRI" class="payment-radio">
                                <span>BRI</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="payment" value="Mandiri" class="payment-radio">
                                <span>Mandiri</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="payment" value="Gopay" class="payment-radio">
                                <span>Gopay</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="payment" value="OVO" class="payment-radio">
                                <span>OVO</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="payment" value="Dana" class="payment-radio">
                                <span>Dana</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="payment" value="Kartu Kredit" class="payment-radio">
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

                    <button type="submit" id="continueBtn" class="w-full bg-purple-800 hover:bg-purple-900 text-white py-2 rounded-lg mt-2" disabled>Continue</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Javascript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
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

            // Variabel untuk menyimpan pilihan
            let selectedDate = "";
            let selectedTime = "";
            let selectedPayment = "BSI";

            // Fungsi untuk switch tab
            function showSection(activeButton, activeSection) {
                allSections.forEach(section => section.classList.add("hidden"));
                allButtons.forEach(btn => {
                    btn.classList.remove("bg-purple-800", "text-white");
                    btn.classList.add("bg-white", "text-gray-700", "border");
                });

                activeSection.classList.remove("hidden");
                activeButton.classList.add("bg-purple-800", "text-white");
                activeButton.classList.remove("bg-white", "text-gray-700", "border");
            }

            // Event listeners untuk tab
            btnFacilities.addEventListener("click", () => showSection(btnFacilities, sectionFacilities));
            btnTime.addEventListener("click", () => showSection(btnTime, sectionTime));
            btnConfirm.addEventListener("click", () => {
                updateConfirmationDisplay();
                showSection(btnConfirm, sectionConfirm);
            });
            btnPayment.addEventListener("click", () => showSection(btnPayment, sectionPayment));

            // Generate 7 hari mulai hari ini untuk waktu pemesanan
            const dateGrid = document.getElementById("dateGrid");
            const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
            const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            const today = new Date();

            for (let i = 0; i < 7; i++) {
                const day = new Date(today);
                day.setDate(today.getDate() + i);

                const dayName = days[day.getDay()];
                const dateNum = day.getDate();
                const monthName = months[day.getMonth()];
                const year = day.getFullYear();

                const isToday = i === 0;

                const div = document.createElement("div");
                div.className = `py-2 rounded cursor-pointer date-btn ${isToday ? "bg-purple-700 text-white" : "bg-white border hover:bg-purple-100"}`;
                div.innerHTML = `${dayName}<br>${dateNum}`;
                div.dataset.date = `${year}-${String(day.getMonth() + 1).padStart(2, '0')}-${String(dateNum).padStart(2, '0')}`;
                div.dataset.display = `${dateNum} ${monthName} ${year}`;
                dateGrid.appendChild(div);
            }

            // Set tanggal hari ini sebagai default
            if (dateGrid.children.length > 0) {
                const firstDate = dateGrid.children[0];
                selectedDate = firstDate.dataset.date;
                document.getElementById('selectedDate').value = selectedDate;
            }

            // Event listener untuk pemilihan tanggal
            document.querySelectorAll('.date-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all date buttons
                    document.querySelectorAll('.date-btn').forEach(b => {
                        b.classList.remove('bg-purple-700', 'text-white');
                        b.classList.add('bg-white', 'border');
                    });

                    // Add active class to clicked button
                    this.classList.add('bg-purple-700', 'text-white');
                    this.classList.remove('bg-white', 'border');

                    selectedDate = this.dataset.date;
                    document.getElementById('selectedDate').value = selectedDate;

                    checkFormCompletion();
                });
            });

            // Event listener untuk pemilihan waktu
            document.querySelectorAll('.time-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all time buttons
                    document.querySelectorAll('.time-btn').forEach(b => {
                        b.classList.remove('bg-purple-700', 'text-white');
                        b.classList.add('bg-white');
                    });

                    // Add active class to clicked button
                    this.classList.add('bg-purple-700', 'text-white');
                    this.classList.remove('bg-white');

                    selectedTime = this.dataset.time;
                    document.getElementById('selectedTime').value = selectedTime;

                    checkFormCompletion();
                });
            });

            // Event listener untuk pemilihan metode pembayaran
            document.querySelectorAll('.payment-radio').forEach(radio => {
                radio.addEventListener('change', function() {
                    selectedPayment = this.value;
                    document.getElementById('selectedPayment').value = selectedPayment;
                    checkFormCompletion();
                });
            });

            // Fungsi untuk update tampilan konfirmasi
            function updateConfirmationDisplay() {
                const selectedDateElement = document.querySelector('.date-btn.bg-purple-700');
                const dateDisplay = selectedDateElement ? selectedDateElement.dataset.display : 'Belum dipilih';

                document.getElementById('selectedDateDisplay').innerHTML = `<strong>Tanggal:</strong> ${dateDisplay}`;
                document.getElementById('selectedTimeDisplay').innerHTML = `<strong>Waktu:</strong> ${selectedTime || 'Belum dipilih'}`;
            }

            // Fungsi untuk cek kelengkapan form
            function checkFormCompletion() {
                const continueBtn = document.getElementById('continueBtn');
                const userName = document.getElementById('user_name').value.trim();

                if (selectedDate && selectedTime && userName) {
                    continueBtn.disabled = false;
                    continueBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    continueBtn.disabled = true;
                    continueBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }

            // Event listener untuk form submission dengan SweetAlert
            document.getElementById('bookingForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const userName = document.getElementById('user_name').value.trim();

                if (!selectedDate || !selectedTime || !userName) {
                    Swal.fire({
                        title: 'Data Tidak Lengkap!',
                        text: 'Silakan lengkapi semua data yang diperlukan.',
                        icon: 'warning',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#f59e0b'
                    });
                    return;
                }

                // Tampilkan konfirmasi booking
                Swal.fire({
                    title: 'Konfirmasi Booking',
                    html: `
                        <div class="text-left">
                            <p><strong>Nama:</strong> ${userName}</p>
                            <p><strong>Kamar:</strong> <?= htmlspecialchars($room['name']) ?></p>
                            <p><strong>Tanggal:</strong> ${document.querySelector('.date-btn.bg-purple-700')?.dataset.display || selectedDate}</p>
                            <p><strong>Waktu:</strong> ${selectedTime}</p>
                            <p><strong>Harga:</strong> Rp <?= number_format($room['price'], 0, ',', '.') ?></p>
                            <p><strong>Pembayaran:</strong> ${selectedPayment}</p>
                        </div>
                    `,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Booking Sekarang',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#7c3aed',
                    cancelButtonColor: '#6b7280'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit form secara programatis
                        const form = document.getElementById('bookingForm');
                        const formData = new FormData(form);
                        
                        // Buat request POST
                        fetch(window.location.href, {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.text())
                        .then(data => {
                            // Jika response mengandung script SweetAlert success
                            if (data.includes('Booking Berhasil!')) {
                                Swal.fire({
                                    title: 'Booking Berhasil!',
                                    text: 'Data booking Anda telah berhasil disimpan.',
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                    confirmButtonColor: '#7c3aed'
                                }).then(() => {
                                    window.location.href = '../../roomDetail/<?= $room['id'] ?>';
                                });
                            } else if (data.includes('Booking Gagal!')) {
                                Swal.fire({
                                    title: 'Booking Gagal!',
                                    text: 'Terjadi kesalahan saat menyimpan data.',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                    confirmButtonColor: '#ef4444'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan jaringan.',
                                icon: 'error',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#ef4444'
                            });
                        });
                    }
                });
            });

            // Event listener untuk input nama user
            document.getElementById('user_name').addEventListener('input', function() {
                checkFormCompletion();
            });

            // Set initial state
            checkFormCompletion();

            // (Opsional) Tampilkan nama bulan sekarang di header time
            const monthName = today.toLocaleString('default', {
                month: 'long'
            });
            const h2 = document.querySelector("#stepTime h2");
            if (h2) {
                h2.textContent = `Select a time (${monthName})`;
            }
        });
    </script>

</body>

</html>