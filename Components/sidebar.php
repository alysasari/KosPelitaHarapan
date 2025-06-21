<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$namaUser = 'Guest';

if (isset($_SESSION['user'])) {
  include_once __DIR__ . '/../koneksi/db.php';

  $email = $_SESSION['user'];

  $tables = ['admin', 'users', 'owners'];

  foreach ($tables as $table) {
    $stmt = $conn->prepare("SELECT name FROM `$table` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $row = $result->fetch_assoc();
      $namaUser = $row['name'];
      break;
    }

    $stmt->close();
  }
}
?>

<!-- Sidebar -->
<div class="w-64 bg-white p-6 shadow-md fixed h-full">
  <h2 class="text-2xl font-bold mb-10">Kos Pelita Harapan</h2>
  <ul class="space-y-4">
    <li>
      <a href='room' class="block py-2 px-4 rounded-lg text-black hover:bg-[#322A7D] hover:text-white">
        Products
      </a>
    </li>
    <li>
      <a href='help' class="block py-2 px-4 rounded-lg text-black hover:bg-[#322A7D] hover:text-white">
        Help
      </a>
    </li>
    <li>
      <a href='history' class="block py-2 px-4 rounded-lg text-black hover:bg-[#322A7D] hover:text-white">
        History
      </a>
    </li>
  </ul>
  <!-- Footer Bawah Sidebar -->
  <div class="absolute bottom-0 left-0 w-full px-6 pb-6 border-t border-gray-200 bg-white">
    <br>
    <?php if (isset($_SESSION['user'])): ?>
      <div class="mb-3 text-sm text-gray-700 flex items-center gap-2">
        <span class="text-purple-700">👤</span>
        <?= htmlspecialchars($namaUser) ?>
      </div>
      <button type="button"
        class="w-full text-center focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 transition"
        onclick="window.location.href='logout'">
        Logout
      </button>
    <?php else: ?>
      <button type="button"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="window.location.href='/KosPelitaHarapan/login'">Login</button>
    <?php endif; ?>
  </div>

</div>