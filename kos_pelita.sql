-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2025 pada 08.58
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kos_pelita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(23, 'Admin', 'admin123@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `owners`
--

INSERT INTO `owners` (`id`, `name`, `email`, `password`) VALUES
(15, 'baruak kapelo', 'baruakkapelo@gmail.com', 'baruakkapelo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `available_room` int(11) DEFAULT NULL,
  `tenant_room` int(11) DEFAULT NULL,
  `fasilitas` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `price`, `available_room`, `tenant_room`, `fasilitas`, `deskripsi`, `gambar`) VALUES
(29, 'Reguler', 100000, 4, 4, 'Kasur single, kipas angin, lemari kecil', 'Kamar sederhana dengan fasilitas dasar. Cocok untuk mahasiswa atau pekerja dengan budget terbatas.', 'regular.png'),
(30, 'Standar', 100000, 4, 3, 'Kasur single/queen, meja belajar, lemari', 'Kamar dengan fasilitas yang sedikit lebih lengkap dari kamar ekonomi.', 'wmremove-transformed.png'),
(31, 'Eksklusif', 100000, 3, 2, 'AC, TV, kamar mandi dalam, Wi-Fi, meja belajar, lemari besar', 'Kamar dengan fasilitas lengkap dan lebih modern. Cocok untuk penghuni yang ingin kenyamanan ekstra.', 'exclusive.png'),
(32, 'Kamar VIP', 100000, 6, 4, 'AC, kulkas, smart TV, meja kerja, kamar mandi dalam dengan pemanas air, balkon pribadi', 'Kamar premium dengan fasilitas mewah, ideal untuk profesional atau ekspatriat.', 'exclusive.png'),
(33, 'Kamar Sharing', 100000, 3, 2, 'Kasur 2 atau lebih, meja bersama, lemari bersama', 'Kamar yang dihuni oleh dua atau lebih orang, cocok untuk yang ingin menghemat biaya.', 'regular.png'),
(34, 'oyo', 100000, 2, 3, 'wifi, ac, lemari', 'fullset', 'wmremove-transformed (1).png'),
(35, 'dsdsd', 123454, 33, 5, 'rererere', 'ererererere', 'Workshop (2).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Reyhan Maulana', 'reyhannadira123@gmail.com', 'reyhannadira123@gmail.com'),
(3, 'romi hardianto', 'romihardianto123@gmail.com', 'romihardianto123'),
(6, 'Abdi widodo', 'cebol123@gmail.com', 'cebol123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
