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
    <h1 class="text-2xl font-bold mb-6">Room Type</h1>

    <?php
    include './koneksi/db.php';

    // Ambil data dari tabel rooms
    $sql = "SELECT * FROM rooms";
    $result = $conn->query($sql);

    // Cek apakah ada data
    if ($result->num_rows > 0) {
      while ($room = $result->fetch_assoc()) {
        $price = htmlspecialchars($room['price']);
        $roomId = urlencode($room['id']);

        echo '
<div class="w-full">
  <div class="bg-white w-full rounded-xl shadow p-5 mb-5 flex flex-col md:flex-row items-center">
    <img src="uploads/' . htmlspecialchars($room['gambar']) . '" class="w-full md:w-48 h-32 object-cover rounded-lg md:mr-6 mb-4 md:mb-0" alt="Room Image">

    <div class="flex-1">
      <h3 class="text-lg font-semibold mb-2">' . htmlspecialchars($room['name']) . '</h3>
      <p class="text-gray-600">' . htmlspecialchars($room['deskripsi']) . '</p>';
        if (!empty($price)) {
          echo '<p class="mt-2 font-bold">Rp ' . number_format($price, 0, ',', '.') . '</p>';
        }
        echo '
    </div>
    <a href="pages/users/roomDetail.php?id=' . $roomId . '" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 md:mt-0 md:ml-4">Booking</a>
  </div>
</div>';
      }
    } else {
      echo "<p>Tidak ada kamar tersedia.</p>";
    }

    $conn->close();
    ?>


  </div>

  <script>
    AOS.init();
  </script>
</body>

</html>