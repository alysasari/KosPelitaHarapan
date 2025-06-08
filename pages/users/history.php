<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kos Pelita Harapan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">
        <?php include "./Components/sidebar.php"; ?>

        <!-- Footer User -->
        <div class="absolute bottom-6 left-6 text-sm text-gray-700">
            <p class="font-semibold">Amanda</p>
            <p class="text-gray-500">Perempuan</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-10 ml-[16rem]" data-aos="fade-right">
        <h1 class="text-2xl font-bold mb-6">Booking History</h1>

        <?php
        include './koneksi/db.php';

        // Ambil data dari tabel bookings
        $sql = "SELECT * FROM bookings ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($booking = $result->fetch_assoc()) {
                echo '
<div class="w-full">
  <div class="bg-white w-full rounded-xl shadow p-5 mb-5 flex flex-col md:flex-row items-center">
    <img src="uploads/' . htmlspecialchars($booking['gambar']) . '" class="w-full md:w-48 h-32 object-cover rounded-lg md:mr-6 mb-4 md:mb-0" alt="Booking Image">

    <div class="flex-1">
      <h3 class="text-lg font-semibold mb-2">Pemesanan oleh: ' . htmlspecialchars($booking['user_name']) . '</h3>
      <p class="text-gray-600">Kamar: ' . htmlspecialchars($booking['room_name']) . '</p>
      <p class="text-gray-600">Jumlah Penyewa: ' . htmlspecialchars($booking['tenant_room']) . ' orang</p>
      <p class="text-gray-600">Tanggal: ' . date("d F Y", strtotime($booking['booking_date'])) . '</p>
      <p class="text-gray-600">Waktu: ' . date("H:i", strtotime($booking['booking_time'])) . '</p>
      <p class="text-gray-600">Metode Pembayaran: ' . htmlspecialchars($booking['payment_method']) . '</p>
      <p class="text-sm text-gray-400 mt-2">Dipesan pada: ' . htmlspecialchars($booking['created_at']) . '</p>
    </div>
  </div>
</div>';
            }
        } else {
            echo "<p>Tidak ada data pemesanan.</p>";
        }

        $conn->close();
        ?>

    </div>

    <script>
        AOS.init();
    </script>
</body>

</html>