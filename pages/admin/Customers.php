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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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

        <div class="flex-1 p-12 overflow-auto ml-[16rem]">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Customers</h2>

            <div class="bg-white rounded w-full p-10">
                <div class="flex">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Name <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>
                    <div class="ml-12 gap-8 flex">
                        <input type="date" class="border border-gray-300 text-sm rounded-lg p-2" placeholder="Check In Date">
                        <input type="date" class="border border-gray-300 text-sm rounded-lg p-2" placeholder="Payment">

                        <form class="max-w-md mx-auto">
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