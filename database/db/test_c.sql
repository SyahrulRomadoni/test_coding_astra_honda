-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2023 pada 10.49
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_c`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `id_pesanan` varchar(255) DEFAULT NULL,
  `nomer_antrian` varchar(255) DEFAULT NULL,
  `total_pembayaran` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id`, `id_pesanan`, `nomer_antrian`, `total_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
(7, '12', '1', '24000', '0', '2023-01-20 08:30:52', '2023-01-20 09:26:05'),
(8, '13', '2', '42500', '1', '2023-01-20 08:41:04', '2023-01-20 08:41:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_workshop` varchar(255) DEFAULT NULL,
  `id_motorcycle` varchar(255) DEFAULT NULL,
  `booking_number` varchar(255) DEFAULT NULL,
  `book_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `id_users`, `id_workshop`, `id_motorcycle`, `booking_number`, `book_date`, `created_at`, `updated_at`) VALUES
(1, 9, '1', '1', '101000103066', '2022-03-12', '2023-01-19 10:09:34', '2023-01-19 10:09:34'),
(2, 10, '2', '2', '10100062661', '2022-06-09', '2023-01-19 10:11:25', '2023-01-19 10:11:25'),
(3, 11, '5', '3', '100190109431', '2022-06-10', '2023-01-19 10:13:23', '2023-01-19 10:13:23'),
(4, 12, '4', '4', '101000109430', '2022-03-12', '2023-01-19 10:13:23', '2023-01-19 10:13:23'),
(5, 13, '3', '5', '117236109426', '2022-06-08', '2023-01-19 10:16:33', '2023-01-19 10:16:33'),
(6, 14, '2', '6', '117550109401', '2022-05-10', '2023-01-19 10:17:49', '2023-01-19 10:17:49'),
(7, 13, '3', '7', '117550109404', '0000-00-00', '2023-01-19 10:18:34', '2023-01-19 10:18:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktifitas`
--

CREATE TABLE `log_aktifitas` (
  `id` int(11) NOT NULL,
  `id_users` varchar(255) DEFAULT NULL,
  `id_pesanan` varchar(255) DEFAULT NULL,
  `id_antrian` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_aktifitas`
--

INSERT INTO `log_aktifitas` (`id`, `id_users`, `id_pesanan`, `id_antrian`, `created_at`, `updated_at`) VALUES
(1, '9', '12', '7', '2023-01-20 09:26:05', '2023-01-20 09:26:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `status_member` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `id_users`, `status_member`, `status`, `created_at`, `updated_at`) VALUES
(4, 9, 'Premium', '1', '2023-01-20 07:48:05', '2023-01-20 07:48:05'),
(5, 10, 'Member', '1', '2023-01-20 08:19:06', '2023-01-20 08:19:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_02_22_050101_create_users_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `motorcycle`
--

CREATE TABLE `motorcycle` (
  `id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ut_code` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `motorcycle`
--

INSERT INTO `motorcycle` (`id`, `id_users`, `name`, `ut_code`, `created_at`, `updated_at`) VALUES
(1, 9, 'NEW CB150R STREETFIRE', 'H5C02R20S1 M/T', '2023-01-19 10:10:11', '2023-01-19 10:10:11'),
(2, 10, 'BEAT SPORTY CBS MMC', 'HH1B02N41S1 A/T', '2023-01-19 10:11:02', '2023-01-19 10:11:02'),
(3, 11, 'BEAT POP ESP CW COMIC', 'Y1G02N02L1A A/T', '2023-01-19 10:13:03', '2023-01-19 10:13:03'),
(4, 12, 'BLADE S', 'NF11C1CD M/T', '2023-01-19 10:13:03', '2023-01-19 10:13:03'),
(5, 13, 'NEW BEAT CAST WHEEL', 'NC11B3C2A/T', '2023-01-19 10:15:58', '2023-01-19 10:15:58'),
(6, 14, 'BEAT STREET', 'D1I02N27M1 A/T', '2023-01-19 10:17:27', '2023-01-19 10:17:27'),
(7, 13, 'REVO FIT JKT', 'R2B02K01S1K M/T', '2023-01-19 10:18:53', '2023-01-19 10:18:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_users` varchar(255) DEFAULT NULL,
  `pesanan` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `diskon` varchar(255) DEFAULT NULL,
  `nomer_meja` varchar(255) DEFAULT NULL,
  `status_pembayaran` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_users`, `pesanan`, `total`, `diskon`, `nomer_meja`, `status_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
(12, '9', 'Nasi Goreng + telur, Es Teh manis, Krupuk', '30000', '10', '15', '1', '1', '2023-01-20 08:30:52', '2023-01-20 08:30:52'),
(13, '10', 'Nasi Padang, Teh Manis, Kerupuk, Ayam Pepes', '50000', '10', '15', '1', '1', '2023-01-20 08:41:04', '2023-01-20 08:41:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `no_phone` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `id_users`, `full_name`, `no_phone`, `date_of_birth`, `place_of_birth`, `address`, `profile_picture`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', '08000000001', '1998-01-01', 'test', 'test', NULL, '2023-01-18 12:16:33', '2023-01-18 12:16:33'),
(7, 8, 'Staff', '08000000002', '1998-02-02', 'test', 'test', NULL, '2023-01-18 12:16:33', '2023-01-18 12:16:33'),
(8, 9, 'anwar', '08000000003', '1998-03-03', 'test', 'test', NULL, '2023-01-19 10:02:12', '2023-01-19 10:02:12'),
(9, 10, 'haru', '08000000004', '1998-04-04', 'test', 'test', NULL, '2023-01-19 10:02:12', '2023-01-19 10:02:12'),
(10, 11, 'bayu', '08000000005', '1998-05-05', 'test', 'test', NULL, '2023-01-19 10:02:12', '2023-01-19 10:02:12'),
(11, 12, 'santoso', '08000000006', '1998-06-06', 'test', 'test', NULL, '2023-01-19 10:02:12', '2023-01-19 10:02:12'),
(12, 13, 'ilyas', '08000000007', '1998-07-07', 'test', 'test', NULL, '2023-01-19 10:02:12', '2023-01-19 10:02:12'),
(13, 14, 'kibo', '08000000008', '1998-08-08', 'test', 'test', NULL, '2023-01-19 10:02:12', '2023-01-19 10:02:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-01-18 12:16:33', '2023-01-18 12:16:33'),
(2, 'Staff', '2023-01-18 12:16:33', '2023-01-18 12:16:33'),
(3, 'Customer', '2023-01-18 12:16:33', '2023-01-18 12:16:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_role`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin@gmail.com', '$2y$10$D5Qj5eX2Jje3SvdPmldGhelZ4mZUWyy9ZJ2Ivp.GPECqyqsiUdSnq', '2023-01-18 12:16:33', '2023-01-18 12:16:33'),
(8, 2, 'staff@gmail.com', '$2y$10$D5Qj5eX2Jje3SvdPmldGhelZ4mZUWyy9ZJ2Ivp.GPECqyqsiUdSnq', '2023-01-18 12:16:33', '2023-01-18 12:16:33'),
(9, 3, 'anwar@mail.com', '$2y$10$D5Qj5eX2Jje3SvdPmldGhelZ4mZUWyy9ZJ2Ivp.GPECqyqsiUdSnq', '2023-01-19 10:02:12', '2023-01-19 10:02:12'),
(10, 3, 'heru@gmail.com', '$10$D5Qj5eX2Jje3SvdPmldGhelZ4mZUWyy9ZJ2Ivp.GPECqyqsiUdSnq', '2023-01-19 10:02:12', '2023-01-19 10:02:12'),
(11, 3, 'bayu@yahoo.com', '$10$D5Qj5eX2Jje3SvdPmldGhelZ4mZUWyy9ZJ2Ivp.GPECqyqsiUdSnq', '2023-01-19 10:02:12', '2023-01-19 10:02:12'),
(12, 3, 'santoso@microsoft.com', '$10$D5Qj5eX2Jje3SvdPmldGhelZ4mZUWyy9ZJ2Ivp.GPECqyqsiUdSnq', '2023-01-19 10:02:12', '2023-01-19 10:02:12'),
(13, 3, 'ilyas@gmail.com', '$10$D5Qj5eX2Jje3SvdPmldGhelZ4mZUWyy9ZJ2Ivp.GPECqyqsiUdSnq', '2023-01-19 10:02:12', '2023-01-19 10:02:12'),
(14, 3, 'kibo@gmail.com', '$10$D5Qj5eX2Jje3SvdPmldGhelZ4mZUWyy9ZJ2Ivp.GPECqyqsiUdSnq', '2023-01-19 10:02:12', '2023-01-19 10:02:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `workshop`
--

CREATE TABLE `workshop` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `distance` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `workshop`
--

INSERT INTO `workshop` (`id`, `code`, `name`, `address`, `phone_number`, `distance`, `created_at`, `updated_at`) VALUES
(1, '01000', 'Wahana Honda Gunung Sahari', 'Jalan Gunung Sahari', '085800000000', '5.2', '2023-01-19 09:46:17', '2023-01-19 09:46:17'),
(2, '11497', 'AHASS KAWI Indah Jaya Motor 3', 'Jakarta Pusat', '085300000000', '10.3', '2023-01-19 09:46:17', '2023-01-19 09:46:17'),
(3, '00190', 'Dunia Motor Kebayoran Lama', 'Kebayoran Lama, Jakarta Selatan', '085600000000', '2.5', '2023-01-19 09:46:17', '2023-01-19 09:46:17'),
(4, '07577', 'AHASS TUNGGAL JAYA', 'Jakarta Timur', '085200000000', '11.5', '2023-01-19 09:46:17', '2023-01-19 09:46:17'),
(5, '17236', 'AHASS MEGATAMA MOTOR', '', '', '0', '2023-01-19 09:46:17', '2023-01-19 09:46:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_aktifitas`
--
ALTER TABLE `log_aktifitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `motorcycle`
--
ALTER TABLE `motorcycle`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `log_aktifitas`
--
ALTER TABLE `log_aktifitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `motorcycle`
--
ALTER TABLE `motorcycle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `workshop`
--
ALTER TABLE `workshop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
