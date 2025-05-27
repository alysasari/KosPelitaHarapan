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
    <?php include "./Components/admin/sidebar.php"; ?>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto ml-[16rem]">
            <!-- Topbar -->
            <div class="flex justify-between w-full items-center px-8 py-6 bg-white border-b">
                <h1 class="text-2xl font-bold text-gray-800">Hello Aca, Welcome Back!</h1>
                <!-- Search Bar -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="p-8">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Total Participation -->
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Participation</p>
                                <h3 class="text-2xl font-bold text-gray-800">Rp 20.000.000</h3>
                                <p class="text-xs text-green-500 mt-1"><i class="fas fa-arrow-up mr-1"></i> 8% this month</p>
                            </div>
                            <div class="h-12 w-12 bg-green-50 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Progress -->
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Progress</p>
                                <h3 class="text-2xl font-bold text-gray-800">1,893</h3>
                                <p class="text-xs text-red-500 mt-1"><i class="fas fa-arrow-down mr-1"></i> 1% this month</p>
                            </div>
                            <div class="h-12 w-12 bg-green-50 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.008 8.742c1-.71 2.54-.25 3.43.852a2.344 2.344 0 0 1 0 2.876c-1.75 2.22-5.938-.876-5.938 3.84V17m15-7a2.41 2.41 0 0 0-.668-1.937c-1.04-1.16-2.86-1.61-4.083-.798-1.368.915-1.967 3.04-.54 4.5 1.43 1.46 3.095-.639 5.291 1.365V17M12 2v2m0 14v-2m6-8h-2M6 10H4m11.32-5.68-1.42 1.42M7.1 15.9l-1.42 1.42m.39-11.57 1.41 1.41m6.44 6.44 1.41 1.41"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Active Users -->
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Active Users</p>
                                <h3 class="text-2xl font-bold text-gray-800">10</h3>
                                <div class="flex -space-x-2 mt-2">
                                    <img class="w-6 h-6 rounded-full border-2 border-white" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="">
                                    <img class="w-6 h-6 rounded-full border-2 border-white" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="">
                                    <img class="w-6 h-6 rounded-full border-2 border-white" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="">
                                    <img class="w-6 h-6 rounded-full border-2 border-white" src="https://flowbite.com/docs/images/people/profile-picture-4.jpg" alt="">
                                </div>
                            </div>
                            <div class="h-12 w-12 bg-gray-50 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.5 3h9.563M9.5 9h9.563M9.5 15h9.563M1.5 13a2 2 0 1 1 3.321 1.5L1.5 17h5m-5-15 2-1v6m-2 0h4"/>
                                </svg>
                            </div>
                        </div>
                    </div>
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
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
    </button>
</body>
</html>