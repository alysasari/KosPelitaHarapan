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
            <!-- Step Progress -->
            <p class="text-sm text-gray-600 mb-1">Step 1 of 4</p>
            <h1 class="text-2xl font-bold mb-6">Facilities Available</h1>

            <!-- Step Tabs -->
            <div class="flex space-x-4 mb-6">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-full">Facilities</button>
                <button class="bg-white text-gray-700 px-4 py-2 rounded-full border">Time</button>
                <button class="bg-white text-gray-700 px-4 py-2 rounded-full border">Confirm</button>
                <button class="bg-white text-gray-700 px-4 py-2 rounded-full border">Payment</button>
            </div>

            <!-- Facilities List -->
            <div class="space-y-3">
                <?php
                $facilities = ["Parking Area", "Wifi", "Air Conditioner", "Fridge", "Balcony", "Bathroom"];
                foreach ($facilities as $facility) {
                    echo '
                    <div class="flex justify-between items-center p-4 bg-gray-100 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="text-yellow-500">✔️</div>
                            <p class="font-semibold">' . $facility . '</p>
                        </div>
                        <p class="text-gray-600">Free</p>
                    </div>';
                }
                ?>
            </div>

            <!-- Back Button -->
            <div class="mt-6">
                <a href="#" class="border px-4 py-2 rounded bg-white hover:bg-gray-100">Kembali</a>
            </div>
        </div>

        <!-- Right: Booking Summary -->
        <div class="w-1/3">
            <div class="bg-white border p-4 rounded-lg shadow-sm">
                <img src="https://via.placeholder.com/300x150" alt="Room Image" class="rounded mb-4">
                <h2 class="font-semibold text-lg">Exclusive Room</h2>
                <p class="text-sm text-gray-500 mb-2">Pelita Harapan</p>

                <div class="text-sm text-gray-600 border-t border-b py-3">
                    <div class="flex justify-between">
                        <span>Exclusive Type</span>
                        <span>Rp 900.000</span>
                    </div>
                    <div class="flex justify-between mt-2">
                        <span>1h</span>
                        <span></span>
                    </div>
                </div>

                <div class="flex justify-between font-bold py-3">
                    <span>Total</span>
                    <span>Rp 900.000</span>
                </div>

                <button class="w-full bg-purple-800 hover:bg-purple-900 text-white py-2 rounded-lg mt-2">Continue</button>
            </div>
        </div>

    </div>
</body>
</html>
