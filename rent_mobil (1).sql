-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Nov 2023 pada 09.57
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
(2, 'angga', '234', 'angga@gmail.com', 'angga', 'ga'),
(3, 'adhi pramana', '456', 'adhi@gmail.com', 'adhi', 'admin_hr'),
(4, 'welen', '567', 'welen@gmail.com', 'welen', 'hr'),
(13, 'epi', '0873636172', 'epi@gmail.com', '99999999', 'karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(50) NOT NULL,
  `nama_mobil` varchar(50) NOT NULL,
  `no_polisi` varchar(50) NOT NULL,
  `jumlah_kursi` varchar(50) NOT NULL,
  `tahun_beli` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 0 COMMENT '0 Active = 1 inActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nama_mobil`, `no_polisi`, `jumlah_kursi`, `tahun_beli`, `gambar`, `status`) VALUES
(14, 'wuling confero', 'DK 1806 CP', '6', '2017', '818-Wuling_Confero_S_(front),_Denpasar.jpg', 1),
(15, 'CR-V Hybird', 'B 2021 BW', '6', '2021', '781-CR-V_Hybrid_Comfort_Compare_3.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(20) NOT NULL,
  `id_mobil` int(50) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `kota_tujuan` varchar(50) NOT NULL,
  `pengeluaran` varchar(50) NOT NULL,
  `no_polisi` varchar(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_perjalanan` int(50) NOT NULL,
  `status_pengeluaran` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_opt`
--

CREATE TABLE `permintaan_opt` (
  `id_permintaan_opt` int(15) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `kota_tujuan` varchar(50) NOT NULL,
  `kendaraan` varchar(50) NOT NULL,
  `pengeluaran` varchar(50) NOT NULL,
  `status_pengeluaran` int(4) NOT NULL,
  `status_perjalanan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indeks untuk tabel `permintaan_opt`
--
ALTER TABLE `permintaan_opt`
  ADD PRIMARY KEY (`id_permintaan_opt`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `permintaan_opt`
--
ALTER TABLE `permintaan_opt`
  MODIFY `id_permintaan_opt` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
