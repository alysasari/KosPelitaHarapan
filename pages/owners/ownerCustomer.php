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
        <!-- Dashboard Content -->
        <div class="p-8 ml-[16rem]">
            <h2 class="text-2xl font-bold text-gray-800">Hello Hesti, Welcome Back!</h2>
            <br>
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.008 8.742c1-.71 2.54-.25 3.43.852a2.344 2.344 0 0 1 0 2.876c-1.75 2.22-5.938-.876-5.938 3.84V17m15-7a2.41 2.41 0 0 0-.668-1.937c-1.04-1.16-2.86-1.61-4.083-.798-1.368.915-1.967 3.04-.54 4.5 1.43 1.46 3.095-.639 5.291 1.365V17M12 2v2m0 14v-2m6-8h-2M6 10H4m11.32-5.68-1.42 1.42M7.1 15.9l-1.42 1.42m.39-11.57 1.41 1.41m6.44 6.44 1.41 1.41" />
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.5 3h9.563M9.5 9h9.563M9.5 15h9.563M1.5 13a2 2 0 1 1 3.321 1.5L1.5 17h5m-5-15 2-1v6m-2 0h4" />
                            </svg>
                        </div>
                    </div>
                </div>


            </div>
            <div class="bg-white rounded w-full p-10">
                <div class="ml-12 gap-8 flex">
                    <div>
                        <p class="text-xl font-bold ">All Customers</p>
                        <p class="text-[#16C098]">Active Members</p>
                    </div>
                    <form class="max-w-md mx-auto flex justify-end">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
                        </div>
                    </form>


                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Filter<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                </div>
                <!-- Flowbite Table -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-12">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 bg-[#F2F2F2]">
                            <tr>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Check in Date</th>
                                <th scope="col" class="px-6 py-3">Payment</th>
                                <th scope="col" class="px-6 py-3">No Room</th>
                                <th scope="col" class="px-6 py-3">Univesity/Company</th>
                                <th scope="col" class="px-6 py-3">Age</th>
                                <th scope="col" class="px-6 py-3">Id Penyewa</th>
                                <th scope="col" class="px-6 py-3">Save</th>
                                <th scope="col" class="px-6 py-3">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b bg-white">
                                <td class="px-6 py-4">John Doe</td>
                                <td class="px-6 py-4">23-01-2024</td>
                                <td class="px-6 py-4">Pending</td>
                                <td class="px-6 py-4">10</td>
                                <td class="px-6 py-4 text-green-600 font-medium">UPN Veteran Yogyakarta</td>
                                <td class="px-6 py-4 text-green-600 font-medium">18</td>
                                <td class="px-6 py-4 text-green-600 font-medium">Id Penyewa</td>
                                <td class="px-6 py-4 text-green-600 font-medium">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
                                </td>
                                <td class="px-6 py-4 text-green-600 font-medium">
                                    <button onclick="handleDelete()" class="text-red-600">
                                        <i class='bx bx-trash-alt' style='color:#f30000; font-size: 20px;'></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="bg-white border-b bg-white">
                                <td class="px-6 py-4">John Doe</td>
                                <td class="px-6 py-4">23-01-2024</td>
                                <td class="px-6 py-4">Pending</td>
                                <td class="px-6 py-4">10</td>
                                <td class="px-6 py-4 text-green-600 font-medium">UPN Veteran Yogyakarta</td>
                                <td class="px-6 py-4 text-green-600 font-medium">18</td>
                                <td class="px-6 py-4 text-green-600 font-medium">Id Penyewa</td>
                                <td class="px-6 py-4 text-green-600 font-medium">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
                                </td>
                                <td class="px-6 py-4 text-green-600 font-medium">
                                    <button onclick="handleDelete()" class="text-red-600">
                                        <i class='bx bx-trash-alt' style='color:#f30000; font-size: 20px;'></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="bg-white border-b bg-white">
                                <td class="px-6 py-4">John Doe</td>
                                <td class="px-6 py-4">23-01-2024</td>
                                <td class="px-6 py-4">Pending</td>
                                <td class="px-6 py-4">10</td>
                                <td class="px-6 py-4 text-green-600 font-medium">UPN Veteran Yogyakarta</td>
                                <td class="px-6 py-4 text-green-600 font-medium">18</td>
                                <td class="px-6 py-4 text-green-600 font-medium">Id Penyewa</td>
                                <td class="px-6 py-4 text-green-600 font-medium">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
                                </td>
                                <td class="px-6 py-4 text-green-600 font-medium">
                                    <button onclick="handleDelete()" class="text-red-600">
                                        <i class='bx bx-trash-alt' style='color:#f30000; font-size: 20px;'></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="flex">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</button>

                    <nav aria-label="Page navigation example">
                        <ul class="flex items-center -space-x-px h-8 text-sm">
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>

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