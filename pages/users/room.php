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
  <div class="flex-1 p-10" data-aos="fade-right">
    <h1 class="text-2xl font-bold mb-6">Room Type</h1>

    <?php
    $rooms = [
      [
        'type' => 'Reguler',
        'desc' => 'Kamar kos dengan fasilitas berupa kasur, meja belajar, lemari, kamar mandi luar, dan dapur umum.',
        'price' => 'Rp 650k',
        'img' => '/KosPelitaHarapan/assets/kamaar1.png'
      ],
      [
        'type' => 'Exclusive',
        'desc' => 'Kamar kos dengan fasilitas ac, kasur, kamar mandi dalam, meja, lemari, dapur umum, kulkas, dan mesin cuci.',
        'price' => 'Rp 800k',
        'img' => '/KosPelitaHarapan/assets/kamaar2.png'
      ],
      [
        'type' => 'Exclusive',
        'desc' => 'Kamar kos dengan fasilitas ac, kasur, kamar mandi dalam, meja, lemari, dapur umum, kulkas, dan mesin cuci.',
        'price' => 'Rp 1000k',
        'img' => '/KosPelitaHarapan/assets/kamaar3.png'
      ]
    ];

    foreach ($rooms as $room) {
      $type = urlencode($room['type']);
      $price = urlencode($room['price']);
      $url = "roomDetail/$type";

      echo '
        <div class="bg-white rounded-xl shadow p-5 mb-5 flex items-center">
          <img src="' . $room['img'] . '" class="w-48 h-32 object-cover rounded-lg mr-6" alt="Room Image">
          <div class="flex-1">
            <h3 class="text-lg font-semibold mb-2">' . $room['type'] . '</h3>
            <p class="text-gray-600">' . $room['desc'] . '</p>';

      if ($room['price']) {
        echo '<p class="mt-2 font-bold">' . $room['price'] . '</p>';
      }

      echo '
          </div>
          <a href="' . $url . '" class="bg-[#322A7D] text-white px-4 py-2 rounded-lg hover:bg-indigo-700 inline-block">
            Booking
          </a>
        </div>';
    }
    ?>
  </div>

  <script>
    AOS.init();
  </script>
</body>

</html>
