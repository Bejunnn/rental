-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2023 pada 10.54
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat_email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sebagai` enum('karyawan','ga','admin_hr','hr') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `nama_lengkap`, `no_telp`, `alamat_email`, `password`, `sebagai`) VALUES
(1, 'Arjun Heriyanto', '123', 'arjun@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 'karyawan'),
(2, 'angga', '234', 'angga@gmail.com', 'angga', 'ga'),
(3, 'adhi pramana', '456', 'adhi@gmail.com', 'adhi', 'admin_hr'),
(4, 'welen', '567', 'welen@gmail.com', 'welen', 'hr'),
(5, 'Adit', '123', 'adit@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin_hr'),
(6, 'sdaw', '', 'wa@gmail.com', '$2y$10$L9O.zsHwdIkAxaHQ5Ta4Per2hI6XWn5Sg74Vk1DJT5A', 'karyawan'),
(7, 'botol', '086287678632', 'botol@gmail.com', '$2y$10$eRTSyhRURc6vHXdEfnzituybe44gQP7nYeH5BflXH/W', 'karyawan'),
(8, 'suparmin', '0892538565', 'sup@gmail.com', '$2y$10$kidITz.wZNnsvKtP.bXV1OxTA1EjDf1HcScXF9tShw4', 'karyawan'),
(9, 'sdaw', 'dawd', 'dawd@gmail.com', '$2y$10$kMxpDxjia6f/teN3T/dIXuwAmo39yk78cD9kfTT8IKa', 'karyawan'),
(10, 'noval', '23455432', 'ihsan@gmail.com', '$2y$10$CCXBZ/yfHEosKbG1PUuVneXJz.MZmYoMLMxmyHBmLIU', 'karyawan'),
(11, 'bagus', '097341837', 'bagus@gmail.com', '11111111', 'karyawan'),
(12, 'suparmin', '097373636', 'supra@gmail.com', '88888888', 'karyawan'),
(13, 'epi', '0873636172', 'epi@gmail.com', '99999999', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
