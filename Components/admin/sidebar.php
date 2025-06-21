<?php
$namaUser = 'Guest';

if (isset($_SESSION['user'])) {
    include __DIR__ . '/../../koneksi/db.php';
    $email = $_SESSION['user'];

    // Daftar tabel yang mungkin menyimpan data user
    $tables = ['admin', 'users', 'owners'];

    foreach ($tables as $table) {
        $stmt = $conn->prepare("SELECT name FROM `$table` WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $namaUser = $row['name'];
            break; // Berhenti jika data ditemukan
        }

        $stmt->close();
    }
}
?>


<!-- Sidebar -->
<div class="w-64 h-screen bg-white shadow fixed">
    <div class="p-6">
        <div class="flex items-center justify-between">
            <span class="text-lg font-semibold text-gray-800">Kos Pelita Harapan</span>
        </div>
    </div>
    <nav class="mt-5">
        <div class="px-3">
            <!-- Dashboard -->
            <a href="dashboard" data-page="dashboard"
                class="menu-item flex items-center py-3 px-4 text-gray-700 rounded-lg">

                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 9.75L12 3l9 6.75M4.5 10.5v9a1.5 1.5 0 001.5 1.5h3a1.5 1.5 0 001.5-1.5v-3.75a1.5 1.5 0 011.5-1.5h0a1.5 1.5 0 011.5 1.5V19.5a1.5 1.5 0 001.5 1.5h3a1.5 1.5 0 001.5-1.5v-9" />
                </svg>
                <span class="ml-3 font-medium">Dashboard</span>
            </a>

            <!-- Product -->
            <a href="product" data-page="product"
                class="menu-item flex items-center py-3 px-4 text-gray-500 hover:bg-gray-100 rounded-lg mt-1">

                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v8l-8 4m-8-12v8l8 4m0-8v8" />
                </svg>
                <span class="ml-3">Product</span>
            </a>

            <!-- Customers -->
            <a href="customers" data-page="customers"
                class="menu-item flex items-center py-3 px-4 text-gray-500 hover:bg-gray-100 rounded-lg mt-1">

                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0zm6 13v-2a6 6 0 00-5-5.91M3 18v-2a6 6 0 015-5.91" />
                </svg>
                <span class="ml-3">Customers</span>
            </a>

            <!-- Help -->
            <a href="help" data-page="help"
                class="menu-item flex items-center py-3 px-4 text-gray-500 hover:bg-gray-100 rounded-lg mt-1">

                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 18h.01M12 14a4 4 0 10-4-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                </svg>
                <span class="ml-3">Help</span>
            </a>

            <!-- Footer -->
            <div class="absolute bottom-0 w-full p-4 border-t border-gray-200">
                <?php if (isset($_SESSION['user'])): ?>
                    <div class="text-sm text-gray-700">
                        👤 <?= htmlspecialchars($namaUser) ?>
                    </div>
                    <br>
                    <button type="button"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                        onclick="window.location.href='/KosPelitaHarapan/login'">Logout</button>
                <?php else: ?>
                    <a href="/KosPelitaHarapan/login" class="text-sm text-blue-600 hover:underline">
                        Login
                    </a>
                <?php endif; ?>
            </div>
        </div>

    </nav>
</div>

<script>
    const currentPage = window.location.pathname.split('/').pop();
    document.querySelectorAll('.menu-item').forEach(item => {
        if (item.getAttribute('data-page') === currentPage) {
            item.classList.remove('text-gray-500');
            item.classList.add('text-gray-700', 'bg-blue-100');
        }
    });
</script>