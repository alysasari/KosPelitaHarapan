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
        <?php include "./Components/owner/sidebar.php"; ?>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto p-10 ml-[16rem]">
            <!-- Topbar -->
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Product Information</h1>
                <!-- Main Content -->
                <div class="flex-1 p-10" data-aos="fade-right">
                    <?php
                    $rooms = [
                        [
                            'type' => 'Reguler',
                            'info' => 4,
                            'available' => 4,
                            'tenant' => 4,
                            'img' => '/KosPelitaHarapan/assets/kamaar1.png'
                        ],
                        [
                            'type' => 'Exclusive',
                            'info' => 4,
                            'available' => 4,
                            'tenant' => 4,
                            'img' => '/KosPelitaHarapan/assets/kamaar2.png'
                        ],
                        [
                            'type' => 'VVIP',
                            'info' => 4,
                            'available' => 4,
                            'tenant' => 4,
                            'img' => '/KosPelitaHarapan/assets/kamaar3.png'
                        ]
                    ];

                    foreach ($rooms as $room) {
                        // Anda bisa ubah link detail jika sudah tersedia
                        $url = "#"; // Placeholder untuk View Details

                        echo '
    <div class="bg-white rounded-xl shadow p-5 mb-5 flex items-center">
        <img src="' . htmlspecialchars($room['img']) . '" class="w-48 h-32 object-cover rounded-lg mr-6" alt="Room Image">
        <div class="flex-1">
            <h3 class="text-lg font-semibold mb-2">' . htmlspecialchars($room['type']) . '</h3>
            <p class="text-gray-600">Info: ' . htmlspecialchars($room['info']) . '</p>
            <p class="text-gray-600">Available: ' . htmlspecialchars($room['available']) . '</p>
            <p class="text-gray-600">Tenant: ' . htmlspecialchars($room['tenant']) . '</p>
        </div>
               <a href="' . $url . '" class="bg-[#5A6ACF] text-white px-4 py-2 rounded-lg hover:bg-indigo-700 inline-block">
            Detail Tenant
        </a>
    </div>';
                    }
                    ?>  
                </div>
            </div>
        </div>
    </div>

    <!-- User profile dropdown button -->
    <button id="userDropdown" class="fixed bottom-6 left-6 z-50 flex items-center bg-white text-gray-700 p-2 rounded-lg shadow-md">
        <div class="flex items-center">
            <img class="w-8 h-8 rounded-full" src="/api/placeholder/32/32" alt="Aca">
            <div class="ml-3">
                <p class="text-sm font-medium">Aca</p>
                <p class="text-xs text-gray-500">Admin</p>
            </div>
        </div>
        <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
        </svg>
    </button>
</body>

</html>