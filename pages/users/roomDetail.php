<?php
$type = isset($_GET['type']) ? htmlspecialchars($_GET['type']) : 'Unknown Room';
$price = isset($_GET['price']) ? htmlspecialchars($_GET['price']) : '-';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">

    <div class="max-w-6xl mx-auto p-10" data-aos="fade-up">
        <!-- Gallery -->
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="col-span-2 row-span-2 relative">
                <img src="/KosPelitaHarapan/assets/kamaar2.png" class="rounded-lg w-full h-full object-cover" />
                <button class="absolute top-2 left-2 bg-white p-1 rounded-full shadow">▶</button>
            </div>
            <img src="/KosPelitaHarapan/assets/kamaar3.png" class="rounded-lg w-full h-full object-cover" />
            <img src="/KosPelitaHarapan/assets/kamaar1.png" class="rounded-lg w-full h-full object-cover" />
            <img src="/KosPelitaHarapan/assets/kamaar2.png" class="rounded-lg w-full h-full object-cover" />
            <img src="/KosPelitaHarapan/assets/kamaar3.png" class="rounded-lg w-full h-full object-cover" />

        </div>

        <!-- Room Info -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h1 class="text-2xl font-semibold"><?= $type ?></h1>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-sm text-gray-500">(198)</span>
                        <span class="text-sm text-red-500">• Closed</span>
                        <span class="text-sm text-gray-500">opens soon at 9:00am</span>
                        <span class="text-sm text-gray-500">• MG Road, Bangalore</span>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="javascript:history.back()" class="px-4 py-2 bg-gray-200 rounded-md">Back</a>
                    <button class="px-4 py-2 bg-[#322A7D] text-white rounded-md">Book now</button>
                </div>
            </div>

            <!-- Details -->
            <div class="flex items-center gap-4 text-sm text-gray-600 flex-wrap">
                <div class="flex items-center gap-2">
                    📍 <span>Babarsari, Yogyakarta</span>
                </div>
                <div class="flex items-center gap-2">
                    💳 <span>Mode of payment: Cash, Debit Card, Credit Card, UPI</span>
                </div>
                <div class="flex items-center gap-2">
                    💰 <span>Harga: <?= $price ?></span>
                </div>
                <div class="flex items-center gap-2">
                    👥 <span>15 people recently enquired</span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-gray-400 mt-10 text-sm">© 2025 Pelita Harapan</p>
    </div>

</body>
<script>
    AOS.init();
</script>

</html>