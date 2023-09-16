-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Sep 2023 pada 04.18
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
(11, 'bagus', '097341837', 'bagus@gmail.com', '11111111', 'karyawan'),
(12, 'suparmin', '097373636', 'supra@gmail.com', '88888888', 'karyawan'),
(13, 'epi', '0873636172', 'epi@gmail.com', '99999999', 'karyawan'),
(14, 'abi', '123', 'abi@gmail.com', 'abi', 'ga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` int(50) NOT NULL,
  `nama_mobil` varchar(50) NOT NULL,
  `no_polisi` varchar(50) NOT NULL,
  `jumlah_kursi` int(20) NOT NULL,
  `tahun_beli` int(20) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id`, `nama_mobil`, `no_polisi`, `jumlah_kursi`, `tahun_beli`, `gambar`) VALUES
(2, 'suzuko', 'b 4386 hdf', 6, 2018, '812-Gambar WhatsApp 2023-09-11 pukul 08.55.29.jpg'),
(3, 'kijang', 'b 4863 jds', 4, 2010, '675-495521.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(20) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `kota_tujuan` varchar(50) NOT NULL,
  `no_polisi` varchar(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `nama_mobil`, `nama_pemesan`, `kota_tujuan`, `no_polisi`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
(9, 'r3', '', '', '4', '2023-09-12', '2023-09-13', 0),
(10, 'r3', '', '', '4', '2023-09-12', '2023-09-14', 0),
(11, 'suzuko', '', 'nldksac', 'b 4386 hdf', '2023-09-15', '2023-09-15', 0),
(12, 'kijang', '', 'njsdc', 'b 4386 hdf', '2023-09-29', '2023-09-30', 0),
(13, 'suzuko', '', 'hjgk', 'b 4386 hdf', '2023-09-15', '2023-09-19', 0),
(14, 'kijang', '', 'jluh', 'b 4386 hdf', '2023-10-04', '2023-10-05', 0),
(15, 'kijang', '', 'bogor', 'b 4386 hdf', '2023-09-22', '2023-09-25', 0),
(16, 'kijang', '', 'bogor', 'b 4386 hdf', '2023-09-15', '2023-09-15', 0),
(17, 'suzuko', 'epi', 'bogor', 'b 4386 hdf', '2023-09-15', '2023-10-01', 0);

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
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
