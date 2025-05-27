<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include(__DIR__ . "/../koneksi/db.php");

$namaUser = '';
if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];
    $stmt = $conn->prepare('SELECT name FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $namaUser = $row['name'];
    }
}
?>

<nav class="flex w-full backdrop-blur-md text-black p-3 z-40 shadow-lg font-[Inter] fixed justify-around">
    <ul class="flex justify-start gap-4 list-none m-0 p-0 items-center">
        <li class="inline-block px-4 py-2">
            <!-- <img src="/KosPelitaHarapan/assets/logo.png" class="size-20"> -->
        </li>
        <li class="inline-block px-4 py-2"> <a href="about.php">Booking</a> </li>
        <li class="inline-block px-4 py-2"> <a href="contact.php">Contact</a> </li>
    </ul>

    <div class="flex items-center gap-4">
        <?php if (!empty($namaUser)): ?>
            <span class="text-sm px-4 py-2 font-semibold">👋 Halo, <?= htmlspecialchars($namaUser, ENT_QUOTES, 'UTF-8') ?></span>
            <a href="logout"
               class="text-red-600 border border-red-600 hover:bg-red-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
               Logout
            </a>
        <?php else: ?>
            <a href="login"
               class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
               Sign Up
            </a>
        <?php endif; ?>
    </div>

    <!-- Hapus baris ini karena duplikat -->
    <!-- <a ... href="login">Sign Up</a> -->

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
</nav>
