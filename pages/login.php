<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../koneksi/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Tabel dan role-nya
    $roles = [
        'admin' => 'admin',
        'users' => 'users',
        'owners' => 'owners'
    ];

    foreach ($roles as $table => $roleName) {
        $stmt = $conn->prepare("SELECT * FROM $table WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if ($password === $user['password']) {
                $_SESSION['user'] = $user['email'];
                $_SESSION['role'] = $roleName;

                $redirect = match ($roleName) {
                    'admin' => 'admin/dashboard',
                    'users' => 'home',
                    'owners' => 'owners/product',
                };

                echo "<script>alert('Login $roleName berhasil!'); window.location.href = '$redirect';</script>";
                exit;
            } else {
                echo "<script>alert('Password salah!'); window.location.href = 'login';</script>";
                exit;
            }
        }
        $stmt->close();
    }

    echo "<script>alert('Email tidak ditemukan!'); window.location.href='login';</script>";
}
?>

<!-- HTML FORM LOGIN -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <section class="overflow-y-hidden">
        <div class="relative">
            <img src="/KosPelitaHarapan/assets/avatar2.png" alt="Decoration"
                class="absolute object-cover" style="width: 27rem;">
            <div class="container mx-auto min-h-screen grid grid-cols-2 gap-x-16 justify-center items-center px-28">

                <!-- Form Login -->
                <div class="backdrop-blur-sm bg-white/30 border border-gray-200 rounded-lg p-8 shadow-xl w-96" data-aos="fade-right">
                    <form data-aos="zoom-in-right" action="login" method="POST" class="flex flex-col justify-center items-center space-y-4">
                        <h1 class="font-bold text-black text-2xl pb-2">Login</h1>

                        <div class="w-full">
                            <label class="block font-semibold mb-1">Email</label>
                            <input type="email" name="email" class="w-full h-12 border-none rounded-lg px-4 text-sm text-red-500 placeholder-gray-500" placeholder="Email" required>
                        </div>

                        <div class="w-full">
                            <label class="block font-semibold mb-1">Password</label>
                            <input type="password" name="password" class="w-full h-12 border-none rounded-lg px-4 text-sm text-red-500 placeholder-gray-500" placeholder="Password" required>
                        </div>

                        <button type="submit" class="w-full h-12 bg-[#322A7D] text-white text-sm font-medium rounded-lg hover:bg-[#222222] transition">
                            Sign In
                        </button>

                        <div class="w-full text-right">
                            <a href="#" class="text-sm text-[#AE4700] hover:underline">Forgot Password?</a>
                        </div>

                        <!-- Login sosial media (dummy link) -->
                        <div class="w-full">
                            <div class="inline-flex rounded-md shadow-sm w-full justify-between">
                                <a href="#" class="flex-1 flex items-center justify-center py-2 border border-gray-200 rounded-l-lg bg-white hover:bg-gray-100">
                                    <img src="/KosPelitaHarapan/assets/Google.png" alt="Google" class="w-6 h-6">
                                </a>
                                <a href="#" class="flex-1 flex items-center justify-center py-2 border-t border-b border-gray-200 bg-white hover:bg-gray-100">
                                    <img src="/KosPelitaHarapan/assets/facebook.png" alt="Facebook" class="w-6 h-6">
                                </a>
                                <a href="#" class="flex-1 flex items-center justify-center py-2 border border-gray-200 rounded-r-lg bg-white hover:bg-gray-100">
                                    <img src="/KosPelitaHarapan/assets/Instagram.png" alt="Instagram" class="w-6 h-6">
                                </a>
                            </div>
                        </div>

                        <p class="text-center text-sm pt-2">
                            Don't have an account?
                            <a href="register" class="text-[#AE4700] hover:underline">Create your account</a>
                        </p>
                    </form>
                </div>

                <!-- Dekorasi Kanan -->
                <div data-aos="fade-up">
                    <img src="/KosPelitaHarapan/assets/Avatar.png">
                </div>
            </div>
        </div>
    </section>

    <script>
        AOS.init();
    </script>
</body>

</html>