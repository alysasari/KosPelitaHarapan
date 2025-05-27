<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Kos Pelita Harapan</title>
    <!-- Flowbite and Tailwind CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
    </style>
</head>

<body>
    <div class="flex h-screen bg-gray-50">
        <div class="flex min-h-screen">
            <?php include "./Components/sidebar.php"; ?>

            <!-- Footer User -->
            <div class="absolute bottom-6 left-6 text-sm text-gray-700">
                <p class="font-semibold">Amanda</p>
                <p class="text-gray-500">Perempuan</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto ml-[16rem]">
            <!-- Topbar -->
            <h1 class="text-2xl font-bold px-8 py-6 text-gray-800">Booking History</h1>
            <div class="flex flex-cols-4 justify-center gap-x-12">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">All</button>
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">In Progress</button>
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cancel</button>
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Success </button>
            </div>

            <!-- Main Content -->
            <div class="flex-1 p-10" data-aos="fade-right">
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
            View Details
          </a>
        </div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>