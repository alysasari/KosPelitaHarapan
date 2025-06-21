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
            <a href="dashboard" data-page="dashboard"
                class="menu-item flex items-center py-3 px-4 text-gray-700 rounded-lg">
                <!-- icon -->
                <svg class="w-5 h-5 text-blue-600" ...></svg>
                <span class="ml-3 font-medium">Dashboard</span>
            </a>
            <a href="product" data-page="product"
                class="menu-item flex items-center py-3 px-4 text-gray-500 hover:bg-gray-100 rounded-lg mt-1">
                <svg class="w-5 h-5" ...></svg>
                <span class="ml-3">Product</span>
            </a>
            <a href="customers" data-page="customers"
                class="menu-item flex items-center py-3 px-4 text-gray-500 hover:bg-gray-100 rounded-lg mt-1">
                <svg class="w-5 h-5" ...></svg>
                <span class="ml-3">Customers</span>
            </a>
            <a href="help" data-page="help"
                class="menu-item flex items-center py-3 px-4 text-gray-500 hover:bg-gray-100 rounded-lg mt-1">
                <svg class="w-5 h-5" ...></svg>
                <span class="ml-3">Help</span>
            </a>
            <div class="absolute bottom-0 w-full p-4 border-t border-gray-200">
                <?php if (isset($_SESSION['user'])): ?>
                    <div class="text-sm text-gray-700">
                        👤 <?= htmlspecialchars($namaUser) ?>
                    </div>
                    <br>
                    <button type="button"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
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