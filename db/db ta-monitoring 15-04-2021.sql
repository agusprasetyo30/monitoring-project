-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 01:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_transaksi`
--

CREATE TABLE `riwayat_transaksi` (
  `id_riwayat` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_penagihan` int(20) NOT NULL,
  `no_ref` varchar(25) NOT NULL,
  `activity` enum('tambah','ubah','hapus') NOT NULL,
  `notes` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_transaksi`
--

INSERT INTO `riwayat_transaksi` (`id_riwayat`, `id_login`, `id_penagihan`, `no_ref`, `activity`, `notes`, `created_at`) VALUES
(68, 29, 45, '123456', 'tambah', 'Menambahkan pembayaran sebesar 12000', '2021-04-15 13:42:53'),
(69, 29, 45, '123456', 'hapus', 'Menghapus pembayaran sebesar ', '2021-04-15 13:44:56'),
(70, 29, 46, '123456', 'tambah', 'Menambahkan pembayaran sebesar 90909', '2021-04-15 13:45:15'),
(71, 29, 46, '123456', 'ubah', 'Mengubah pembayaran sebesar 800000', '2021-04-15 13:45:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
