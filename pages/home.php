<?php
include "./pages/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Pelita Harapan</title>

    <!-- Tailwind & DaisyUI -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {},
            },
            plugins: [daisyui],
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,100..900;1,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "./Components/navbar.php"; ?>

    <!-- ================ Header ============================= -->
    <div class="relative">
        <!-- Dekorasi Warna Biru -->
        <img src="/KosPelitaHarapan/assets/Decore.png" alt="Decoration"
            class="absolute top-0 right-0 size-[40rem] object-cover -z-10">

        <div class="grid grid-cols-2 justify-center items-center p-28 relative" data-aos="fade-up">
            <!-- Bagian Teks -->
            <div>
                <p class="text-xl font-bold text-[#DF6951] uppercase">Best Destinations Around The World</p>
                <h1 class="font-[Volkhov] text-5xl font-bold text-[#181E4B] leading-tight">
                    Living Comfort <br> With Us
                </h1>
                <p class="text-gray-500 mt-4">Make your day being comfort and happy with stay in our room.</p>
                <br>
                <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Find Out More</button>
            </div>

            <!-- Bagian Gambar Traveler -->
            <div class="flex justify-center relative" data-aos="fade-up">
                <img src="/KosPelitaHarapan/assets/Image.png" alt="Traveler" class="max-w-full relative z-10">
            </div>
        </div>
    </div>

    <!-- ========== CATEGORY CONTENT ======================= -->
    <div class="text-center mb-8" data-aos="fade-up">
        <h2 class="text-md font-bold text-black uppercase">CATEGORY</h2>
        <h class="font-[Volkhov] text-3xl font-bold text-[#181E4B] leading-tight">We Offer Best Services</h>
    </div>
    <div class="grid grid-cols-4 p-10 gap-6 mb-[5rem]" data-aos="fade-up">
        <div class="flex flex-col gap-8 justify-center items-center max-w-sm p-6  border border-gray-200 rounded-3xl shadow-2xl ackdrop-blur-md text-center h-[20rem] ">

            <img src="/KosPelitaHarapan/assets/plane.png" alt="" class="size-30">
            <p class="mb-3 font-normal text-black font-bold  text-center">Harga yang murah dan terjangkau</p>

        </div>
        <div class="flex flex-col gap-8 justify-center items-center max-w-sm p-6  border border-gray-200 rounded-3xl shadow-2xl ackdrop-blur-md text-center h-[20rem]">

            <img src="/KosPelitaHarapan/assets/mic.png" alt="" class="size-15">
            <p class="mb-3 font-normal text-black font-bold  text-center">Letak yang strategis dan mudah diakses ke seluruh fasilitas</p>

        </div>
        <div class="flex flex-col gap-8 justify-center items-center max-w-sm p-6  border border-gray-200 rounded-3xl shadow-2xl ackdrop-blur-md text-center h-[20rem]">

            <img src="/KosPelitaHarapan/assets/setting.png" alt="" class="size-15">
            <p class="mb-3 font-normal text-black font-bold  text-center">Kamar kos yang sudah di lengkapi dengan fasilitas lengkap</p>

        </div>
        <div class="flex flex-col gap-8 justify-center items-center max-w-sm p-6  border border-gray-200 rounded-3xl shadow-2xl ackdrop-blur-md text-center h-[20rem]">

            <img src="/KosPelitaHarapan/assets/parabola.png" alt="" class="size-15">
            <p class="mb-3 font-normal text-black font-bold  text-center">Wifi yang dapat di akses 24 jam dan gratis</p>

        </div>

    </div>

    <!-- =============== Jenis Kamar ====================== -->
    <div class="text-center" data-aos="fade-up">
        <h2 class="text-md font-bold text-black uppercase">TOP SELLING</h2>
        <h class="font-[Volkhov] text-3xl font-bold text-[#181E4B] leading-tight">Jenis Kamar</h>
    </div>
    <div class="flex justify-center">
        <div class="grid grid-cols-3 gap-16  justify-center items-center p-10" data-aos="fade-up">
            <div class="w-[19rem] bg-white border border-gray-200 rounded-2xl shadow-2xl h-[26rem]">
                <img class="rounded-t-2xl w-full h-[19rem]" src="/kosPelitaHarapan/assets/kamar1.jpg" alt="Kamar Reguler" />
                <div class="p-5">
                    <h5 class="text-lg font-semibold text-gray-900 text-center">Reguler</h5>
                    <div class="flex items-center text-gray-500 mt-1 justify-center">
                        <svg class="w-4 h-4 text-gray-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a6 6 0 0 1 6 6c0 4.418-6 10-6 10S4 12.418 4 8a6 6 0 0 1 6-6zm0 2a4 4 0 0 0-4 4c0 2.828 4 7.172 4 7.172S14 10.828 14 8a4 4 0 0 0-4-4zm0 2a2 2 0 1 1 0 4 2 2 0 0 1 0-4z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-sm">Kasur, Meja, Lemari, dan lain</p>
                    </div>
                </div>
            </div>
            <div class="w-[19rem] bg-white border border-gray-200 rounded-2xl shadow-2xl h-[26rem]">
                <img class="rounded-t-2xl w-full h-[19rem]" src="/kosPelitaHarapan/assets/kamar2.jpg" alt="Kamar Reguler" />
                <div class="p-5">
                    <h5 class="text-lg font-semibold text-gray-900 text-center">Middle</h5>
                    <div class="flex items-center text-gray-500 mt-1 justify-center">
                        <svg class="w-4 h-4 text-gray-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a6 6 0 0 1 6 6c0 4.418-6 10-6 10S4 12.418 4 8a6 6 0 0 1 6-6zm0 2a4 4 0 0 0-4 4c0 2.828 4 7.172 4 7.172S14 10.828 14 8a4 4 0 0 0-4-4zm0 2a2 2 0 1 1 0 4 2 2 0 0 1 0-4z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-sm">Kasur, Meja, Lemari, dan lain</p>
                    </div>
                </div>
            </div>
            <div class="w-[19rem] bg-white border border-gray-200 rounded-2xl shadow-2xl h-[26rem]">
                <img class="rounded-t-2xl w-full h-[19rem]" src="/kosPelitaHarapan/assets/kamar3.jpg" alt="Kamar Reguler" />
                <div class="p-5">
                    <h5 class="text-lg font-semibold text-gray-900 text-center">Ekslusif</h5>
                    <div class="flex items-center text-gray-500 mt-1 justify-center">
                        <svg class="w-4 h-4 text-gray-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a6 6 0 0 1 6 6c0 4.418-6 10-6 10S4 12.418 4 8a6 6 0 0 1 6-6zm0 2a4 4 0 0 0-4 4c0 2.828 4 7.172 4 7.172S14 10.828 14 8a4 4 0 0 0-4-4zm0 2a2 2 0 1 1 0 4 2 2 0 0 1 0-4z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-sm">Kasur, Meja, Lemari, dan lain</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center"  data-aos="fade-up">
        <button onclick="window.location.href='room'" type="button" class="px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Temukan kamarmu sekarang</button>
    </div>



    <!-- ================= KEUNGGULAN ===================== -->
    <div class="grid grid-cols-2  justify-center items-center p-20 gap-x-20 mb-[2rem]" data-aos="fade-up">
        <div>
            <p class="text-gray-500 font-semibold">Easy and Fast</p>
            <h1 class="text-4xl font-extrabold text-gray-900 font-[Volkhov]">Booking Kamar Sesuai<br>Pilihanmu</h1>

            <div class="flex flex-col gap-5 mt-10">
                <!-- Pilih kamarmu -->
                <div class="flex items-start gap-4">
                    <div class="bg-yellow-400 rounded-lg p-3">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M10 2H14V6H10V2ZM16 4H20V8H16V4ZM4 8H8V4H4V8ZM14 16H10V20H14V16ZM8 14H4V20H8V14ZM20 14H16V20H20V14Z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Pilih kamarmu</h3>
                        <p class="text-gray-500">Tentukan jenis kamar yang sesuai preferensimu</p>
                    </div>
                </div>

                <!-- Bayar Nanti -->
                <div class="flex items-start gap-4">
                    <div class="bg-red-400 rounded-lg p-3">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2Zm-1 14h2v2h-2v-2Zm0-8h2v6h-2V8Z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Bayar Nanti</h3>
                        <p class="text-gray-500">Kamar dapat dipesan tanpa perlu DP terlebih dahulu</p>
                    </div>
                </div>

                <!-- Tentukan tanggal check-in -->
                <div class="flex items-start gap-4">
                    <div class="bg-blue-600 rounded-lg p-3">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 10H17V12H7V10ZM3 4H5V2H7V4H17V2H19V4H21V20H3V4ZM5 8V18H19V8H5Z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Tentukan tanggal check in mu</h3>
                        <p class="text-gray-500">Tentukan tanggal kedatanganmu dan rasakan kenyamanan fasilitasnya</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-xs bg-white border border-gray-200 rounded-3xl shadow-lg p-8">
            <!-- Gambar kamar -->
            <img src="/KosPelitaHarapan/assets/kamar2.jpg" alt="Eksklusif Room" class="rounded-2xl w-full h-40 object-cover">

            <!-- Nama kamar -->
            <h3 class="mt-3 text-lg font-bold text-gray-900">Eksklusif Room</h3>

            <!-- Icon dan fitur -->
            <div class="flex items-center gap-2 mt-2">
                <span class="p-2 bg-gray-100 rounded-full">
                    <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2Zm-1 14h2v2h-2v-2Zm0-8h2v6h-2V8Z"></path>
                    </svg>
                </span>
                <span class="p-2 bg-gray-100 rounded-full">
                    <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 10H17V12H7V10ZM3 4H5V2H7V4H17V2H19V4H21V20H3V4ZM5 8V18H19V8H5Z"></path>
                    </svg>
                </span>
                <span class="p-2 bg-gray-100 rounded-full">
                    <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2Zm-1 14h2v2h-2v-2Zm0-8h2v6h-2V8Z"></path>
                    </svg>
                </span>
            </div>

            <!-- Informasi jumlah pemilih -->
            <div class="flex items-center mt-3 text-gray-500 text-sm">
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2Zm-1 14h2v2h-2v-2Zm0-8h2v6h-2V8Z"></path>
                </svg>
                <span class="ml-2">10 people choose this</span>
            </div>

            <!-- Tombol favorit -->
            <div class="absolute bottom-4 right-4">
                <svg class="w-6 h-6 text-gray-400 hover:text-red-500 cursor-pointer" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12.572C21 10.714 21 8 18.5 6.5c-1.5-1-3.5 0-4.5 1-1-1-3-2-4.5-1-2.5 1.5-2.5 4.214-1 6.072L12 21l7.5-8.428z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!--=================== Testimoni =================================-->
    <div class="grid grid-cols-2  justify-center p-20 gap-x-15 mb-[10rem]" data-aos="fade-up">
        <div>
            <p class="text-gray-500 font-semibold">Easy and Fast</p>
            <h1 class="text-4xl font-extrabold text-gray-900 font-[Volkhov]">Booking Kamar Sesuai<br>Pilihanmu</h1>
        </div>
        <div id="testimonial-container">
            <div class="testimonial max-w-sm w-80 bg-white border border-gray-200 rounded-3xl shadow-lg p-8 text-[#5E6282] active">
                <p>“Kamar dan fasilitas yang tersedia nyaman dan bersih serta letak kos yang strategis memudahkan akses ke berbagai fasilitas umum."</p>
                <br>
                <p class="font-bold">Gracia</p>
                <p>Mahasiswa UPNVY</p>
            </div>
            <div class="testimonial max-w-sm w-80 bg-white border border-gray-200 rounded-3xl shadow-lg p-8 text-[#5E6282]">
                <p>“Kos ini sangat aman dan nyaman, serta memiliki lingkungan yang kondusif untuk belajar."</p>
                <br>
                <p class="font-bold">Dika</p>
                <p>Mahasiswa UGM</p>
            </div>
            <div class="testimonial max-w-sm w-80 bg-white border border-gray-200 rounded-3xl shadow-lg p-8 text-[#5E6282]">
                <p>“Kos ini sangat aman dari kemalingan, serta memiliki keamanan yang ketat"</p>
                <br>
                <p class="font-bold">Dodi</p>
                <p>Mahasiswa UNAND</p>
            </div>
        </div>
    </div>

    <!-- ======================= Subscription Bar =============================== -->
    <div class="relative bg-orange-100 rounded-3xl p-10 w-full max-w-7xl mx-auto mb-[12rem]">
        <div class="p-12">
            <!-- Judul -->
            <h2 class="text-[#5E6282] text-3xl md:text-4xl font-semibold text-center">
                Subscribe to get information, latest news and other interesting offers about Jadoo
            </h2>
            <br>
            <!-- Form Input Email -->
            <div class="flex flex-col md:flex-row justify-center items-center gap-4 mt-6 ">
                <div class="relative w-full max-w-md">
                    <input type="email" placeholder="Your email"
                        class="w-full p-3 pl-10 rounded-lg border border-gray-300 text-gray-700 focus:ring-orange-400 focus:border-orange-400 bg-white">
                    <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12c0 3.866-3.134 7-7 7S2 15.866 2 12s3.134-7 7-7 7 3.134 7 7zm4-3v6m-3-3h6">
                            </path>
                        </svg>
                    </div>
                </div>
                <button
                    class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-6 py-3 rounded-lg transition-all shadow-md">
                    Subscribe
                </button>
            </div>
            <div class="absolute top-[-51px] right-0 p-4">
                <img src="/KosPelitaHarapan/assets/pesawat.png" alt="">
            </div>
        </div>
    </div>
    <?php include "./Components/footer.php"; ?>

</body>

<script>
    let currentIndex = 0;
    const testimonials = document.querySelectorAll(".testimonial");

    function switchTestimonial() {
        testimonials[currentIndex].classList.remove("active");
        testimonials[currentIndex].classList.add("slide-out");

        currentIndex = (currentIndex + 1) % testimonials.length;
        testimonials[currentIndex].classList.remove("hidden", "slide-out");
        testimonials[currentIndex].classList.add("active", "slide-in");

        setTimeout(() => {
            testimonials.forEach(t => t.classList.remove("slide-in", "slide-out"));
        }, 500); // Sesuaikan dengan durasi animasi
    }

    setInterval(switchTestimonial, 3000); // Ganti setiap 3 detik
</script>

<style>
    .hidden {
        display: none;
    }

    #testimonial-container {
        position: relative;
        width: fit-content;
    }
</style>

<style>
    .testimonial {
        position: absolute;
        opacity: 0;
        transform: translateX(100%);
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .active {
        opacity: 1;
        transform: translateX(0);
    }

    .slide-out {
        opacity: 0;
        transform: translateX(-100%);
    }

    .slide-in {
        opacity: 1;
        transform: translateX(0);
    }

    #testimonial-container {
        position: relative;

    }
</style>

<script>
    AOS.init();
</script>

</html>