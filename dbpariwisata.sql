-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Nov 2019 pada 11.04
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpariwisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpesanan`
--

CREATE TABLE `detailpesanan` (
  `id` int(11) NOT NULL,
  `invoice` varchar(12) NOT NULL,
  `namaWisata` varchar(80) NOT NULL,
  `jumlahTiket` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jeniswisata`
--

CREATE TABLE `jeniswisata` (
  `id_jeniswisata` int(11) NOT NULL,
  `jenisWisata` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jeniswisata`
--

INSERT INTO `jeniswisata` (`id_jeniswisata`, `jenisWisata`, `created`, `updated`) VALUES
(1, 'Rekreasi', '2019-10-11 03:10:10', NULL),
(2, 'Budaya', '2019-10-11 03:10:10', NULL),
(3, 'Konvensi', '2019-10-11 03:10:10', NULL),
(4, 'Kesehatan', '2019-10-11 03:10:10', NULL),
(5, 'Bahari', '2019-10-11 03:10:10', NULL),
(6, 'Alam', '2019-10-11 03:10:37', NULL),
(7, 'Wisata Kota', '2019-10-11 03:10:37', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasiwisata`
--

CREATE TABLE `lokasiwisata` (
  `id` int(11) NOT NULL,
  `jalan` varchar(50) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kab_kota` varchar(20) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasiwisata`
--

INSERT INTO `lokasiwisata` (`id`, `jalan`, `desa`, `kecamatan`, `kab_kota`, `provinsi`, `created`, `updated`) VALUES
(1, 'Jl. Anggrek 1', 'Karangdawa', 'Margasari', 'Kab. Tegal', 'Jawa Tengah', '2019-11-06 11:33:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata`
--

CREATE TABLE `pariwisata` (
  `id` int(11) NOT NULL,
  `namaPariwisata` varchar(80) NOT NULL,
  `lokasi` varchar(120) NOT NULL,
  `harga` int(11) NOT NULL,
  `jenisWisata` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `tumbnail` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata`
--

INSERT INTO `pariwisata` (`id`, `namaPariwisata`, `lokasi`, `harga`, `jenisWisata`, `deskripsi`, `tumbnail`, `created`, `updated`) VALUES
(14, 'dsdsd', 'nfpewfopej', 12000, 5, 'jdoqjdowj', '15-min.png', '2019-11-05 00:37:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `invoice` varchar(12) NOT NULL,
  `pemesan` varchar(70) NOT NULL,
  `tglPesanan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` varchar(5) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `email`, `level`, `created`, `updated`) VALUES
(1, 'Reza Zulfan Azmi', 'azerliquid', '12345', 'kojin@gmail.com', 'Admin', '2019-11-02 10:22:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jeniswisata`
--
ALTER TABLE `jeniswisata`
  ADD PRIMARY KEY (`id_jeniswisata`);

--
-- Indexes for table `lokasiwisata`
--
ALTER TABLE `lokasiwisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pariwisata`
--
ALTER TABLE `pariwisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jeniswisata`
--
ALTER TABLE `jeniswisata`
  MODIFY `id_jeniswisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lokasiwisata`
--
ALTER TABLE `lokasiwisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pariwisata`
--
ALTER TABLE `pariwisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
