<?php
// Ambil data rooms untuk ditampilkan
$result = $conn->query("SELECT * FROM rooms");
// Pastikan mengubah result menjadi array untuk looping
$rooms = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rooms[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard - Kos Pelita Harapan</title>
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
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Product Information</h1>

                <!-- Main Content -->
                <div class="flex-1" data-aos="fade-right">
                    <?php if (!empty($rooms)): ?>
                        <?php foreach ($rooms as $room): ?>
                            <div
                                class="bg-white rounded-xl shadow-lg p-6 mb-6 flex items-center hover:shadow-xl transition-shadow duration-300">
                                <?php if (!empty($room['gambar']) && file_exists("../uploads/" . $room['gambar'])): ?>
                                    <img src="../uploads/<?php echo htmlspecialchars($room['gambar']); ?>" alt="Room Image"
                                        class="w-48 h-32 object-cover rounded-xl mr-6"
                                        onerror="this.src='https://via.placeholder.com/200x130/e5e7eb/9ca3af?text=No+Image'">
                                <?php else: ?>
                                    <div class="w-48 h-32 bg-gray-200 rounded-xl mr-6 flex items-center justify-center">
                                        <div class="text-center text-gray-500">
                                            <i class="fas fa-image text-2xl mb-2"></i>
                                            <p class="text-sm">No Image</p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="flex-1">
                                    <h3 class="text-xl font-semibold mb-3 text-gray-800">
                                        <?php echo htmlspecialchars($room['name'] ?? 'Unnamed Room'); ?>
                                    </h3>
                                    <div class="space-y-2">
                                        <p class="text-gray-600">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            <strong>Info:</strong>
                                            <?php echo htmlspecialchars($room['fasilitas'] ?? 'No facilities info'); ?>
                                        </p>
                                        <p class="text-gray-600">
                                            <i class="fas fa-file-alt mr-2"></i>
                                            <strong>Description:</strong>
                                            <?php echo htmlspecialchars($room['deskripsi'] ?? 'No description'); ?>
                                        </p>
                                        <p class="text-gray-600">
                                            <i class="fas fa-door-open mr-2"></i>
                                            <strong>Available Rooms:</strong>
                                            <span
                                                class="text-green-600 font-medium"><?php echo htmlspecialchars($room['available_room'] ?? '0'); ?></span>
                                        </p>
                                        <p class="text-gray-600">
                                            <i class="fas fa-users mr-2"></i>
                                            <strong>Occupied Rooms:</strong>
                                            <span
                                                class="text-blue-600 font-medium"><?php echo htmlspecialchars($room['tenant_room'] ?? '0'); ?></span>
                                        </p>
                                        <?php if (isset($room['harga'])): ?>
                                            <p class="text-gray-600">
                                                <i class="fas fa-money-bill-wave mr-2"></i>
                                                <strong>Price:</strong>
                                                <span class="text-green-700 font-bold">Rp
                                                    <?php echo number_format($room['harga'], 0, ',', '.'); ?></span>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                            <div class="text-gray-400 mb-4">
                                <i class="fas fa-bed text-6xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-600 mb-2">No Rooms Available</h3>
                            <p class="text-gray-500 mb-4">There are currently no rooms in the database.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add dropdown functionality if needed
        document.getElementById('userDropdown').addEventListener('click', function () {
            // Add your dropdown logic here
            console.log('User dropdown clicked');
        });
    </script>
</body>

</html>