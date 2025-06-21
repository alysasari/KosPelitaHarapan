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
        <div class="flex items-center">
            <span class="text-lg font-semibold text-gray-800">Kos Pelita Harapan</span>
        </div>
    </div>
    <nav class="mt-5">
        <div class="px-3">
            
            <a href="product" data-page="product" class="menu-item flex items-center py-3 px-4 text-gray-500 hover:bg-gray-100 rounded-lg mt-1">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                </svg>
                <span class="ml-3">Product</span>
            </a>
            <a href="customers" data-page="customers" class="menu-item flex items-center py-3 px-4 text-gray-500 hover:bg-gray-100 rounded-lg mt-1">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                </svg>
                <span class="ml-3">Customers</span>
            </a>
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