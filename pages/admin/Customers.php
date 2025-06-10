<?php
include "./koneksi/db.php"; // Pastikan $conn didefinisikan di sini

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil semua data dari tabel bookings
$query = mysqli_query($conn, "SELECT * FROM bookings");

// Cek query
if (!$query) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Kos Pelita Harapan</title>

    <!-- Flowbite & Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
        <?php include "./Components/admin/sidebar.php"; ?>

        <div class="flex-1 p-12 overflow-auto ml-[16rem]">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Customers</h2>

            <div class="bg-white rounded w-full p-10">
                <!-- FILTER + SEARCH -->
                <div class="flex flex-wrap gap-4 items-center mb-6">
                    <!-- Dropdown Sort -->
                    <div>
                        <button id="sortDropdownButton" data-dropdown-toggle="sortDropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
                            Name
                            <svg class="w-2.5 h-2.5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="sortDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="sortDropdownButton">
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Sign out</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Date Filters -->
                    <input type="date" class="border border-gray-300 text-sm rounded-lg p-2" placeholder="Check In Date">
                    <input type="date" class="border border-gray-300 text-sm rounded-lg p-2" placeholder="Payment Date">

                    <!-- Search Form -->
                    <form class="relative">
                        <input type="search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search..." />
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                    </form>

                    <!-- Filter Button -->
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center" type="button">
                        Filter
                        <svg class="w-2.5 h-2.5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                </div>

                <!-- TABEL DATA -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="px-6 py-3">User Name</th>
                                <th class="px-6 py-3">Room ID</th>
                                <th class="px-6 py-3">Booking ID</th>
                                <th class="px-6 py-3">Room name</th>   
                                <th class="px-6 py-3">Booking Date</th>                               

                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4"><?= htmlspecialchars($row['user_name']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($row['room_id']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($row['id']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($row['room_name']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($row['booking_date']) ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>