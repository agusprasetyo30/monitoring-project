-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 11:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `no_ref` varchar(15) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `pencabutan` enum('iya','tidak') NOT NULL,
  `id_jenis_pelanggan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_domisili` int(11) NOT NULL,
  `id_subdomisili` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id_pelanggan`, `no_ref`, `nama`, `alamat`, `pencabutan`, `id_jenis_pelanggan`, `created_at`, `id_domisili`, `id_subdomisili`) VALUES
(1, '09767488', 'Aprilia Putri A', 'Jl.nfbhd', 'iya', 1, '2021-03-23 07:07:19', 2, 3),
(2, '1', 'r', 'h', 'iya', 0, '2021-03-23 07:45:46', 0, 0),
(3, '2334', 'ely', 'hhh', 'iya', 0, '2021-03-23 07:46:46', 0, 0),
(4, '7657656834', 'ahgdh', 'dsjfhjf', 'iya', 0, '2021-03-23 07:59:01', 0, 0),
(12, '123456', 'Aprilia Putri', 'Jl Anggrek', 'iya', 2, '2021-04-06 02:17:00', 10, 6),
(14, '7890', 'Ahmadi', 'Jl Suka', 'tidak', 1, '2021-04-06 02:25:45', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `master_domisili`
--

CREATE TABLE `master_domisili` (
  `id_domisili` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `wilayah` enum('kota','kabupaten') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_domisili`
--

INSERT INTO `master_domisili` (`id_domisili`, `kota`, `wilayah`) VALUES
(10, 'Probolinggo', 'kota'),
(13, 'Probolinggo', 'kabupaten');

-- --------------------------------------------------------

--
-- Table structure for table `master_jenis_pelanggan`
--

CREATE TABLE `master_jenis_pelanggan` (
  `id_jenis_pelanggan` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_jenis_pelanggan`
--

INSERT INTO `master_jenis_pelanggan` (`id_jenis_pelanggan`, `nama_jenis`, `created_at`) VALUES
(2, 'lunas', '2021-03-18 08:27:09'),
(4, 'segel', '2021-03-18 08:27:52'),
(5, 'cabut', '2021-03-18 08:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `master_subdomisili`
--

CREATE TABLE `master_subdomisili` (
  `id_subdomisili` int(11) NOT NULL,
  `id_domisili` int(11) NOT NULL,
  `kode_wilayah` varchar(5) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_subdomisili`
--

INSERT INTO `master_subdomisili` (`id_subdomisili`, `id_domisili`, `kode_wilayah`, `kelurahan`, `kecamatan`) VALUES
(6, 10, '611', 'Jati', 'Mayangan'),
(9, 10, '612', 'Mangunharjo', 'Mayangan'),
(10, 10, '613', 'Sukabumi', 'Mayangan');

-- --------------------------------------------------------

--
-- Table structure for table `penagihan`
--

CREATE TABLE `penagihan` (
  `id_penagihan` int(11) NOT NULL,
  `no_ref` varchar(10) NOT NULL,
  `id_login` int(11) NOT NULL,
  `jenis_pembayaran` enum('debit','tunai') NOT NULL,
  `pembayaran` decimal(25,0) NOT NULL,
  `bukti_pembayaran` varchar(12) NOT NULL,
  `tanggal_penagihan` date NOT NULL,
  `catatan` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penagihan`
--

INSERT INTO `penagihan` (`id_penagihan`, `no_ref`, `id_login`, `jenis_pembayaran`, `pembayaran`, `bukti_pembayaran`, `tanggal_penagihan`, `catatan`) VALUES
(3, '', 28, 'debit', '70000', '', '2021-04-12', 'df'),
(4, '', 28, 'tunai', '86765', '', '2021-04-12', 'k'),
(5, '', 28, 'tunai', '4345656', '', '2021-04-12', ''),
(8, '', 28, 'tunai', '90000', '', '2021-04-12', ''),
(9, '', 28, 'tunai', '80000', '', '2021-04-12', 'j'),
(10, '', 28, 'tunai', '90000', '', '2021-04-12', 'o'),
(11, '', 28, 'tunai', '90000', '', '2021-04-12', ''),
(12, '123456', 28, 'tunai', '90000', '', '2021-04-12', '');

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `id_piutang` int(10) NOT NULL,
  `no_ref` varchar(25) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `nominal` int(25) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `alasan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`id_piutang`, `no_ref`, `tahun`, `bulan`, `nominal`, `keterangan`, `alasan`) VALUES
(2, '44', 2020, '2021-03-01', 90000, 'g', 't'),
(3, '12345', 2020, '2021-03-01', 50000, 'gapunya uang', 'malas bayar'),
(5, '0234567', 2020, 'January', 100000, '', ''),
(6, '0234568', 2020, 'June', 20000, 'gatau', 'hh'),
(11, '256788', 2019, 'januari', 60000, '', ''),
(12, '123456', 2019, 'januari', 60000, '', ''),
(13, '7890', 2019, 'januari', 60000, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_transaksi`
--

CREATE TABLE `riwayat_transaksi` (
  `id_riwayat` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `no_ref` varchar(25) NOT NULL,
  `activity` enum('tambah','ubah','hapus') NOT NULL,
  `notes` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_transaksi`
--

INSERT INTO `riwayat_transaksi` (`id_riwayat`, `id_login`, `no_ref`, `activity`, `notes`, `created_at`) VALUES
(1, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 12:04:40'),
(2, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 14:55:13'),
(3, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 14:55:29'),
(4, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 14:55:51'),
(5, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 14:56:25'),
(6, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 14:58:24'),
(7, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 14:59:38'),
(8, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 15:08:10'),
(9, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 15:09:15'),
(10, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 15:14:26'),
(11, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 15:14:43'),
(12, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 15:19:49'),
(13, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 15:21:20'),
(14, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 15:24:16'),
(15, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 15:47:51'),
(16, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 15:48:47'),
(17, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 15:49:24'),
(18, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 15:52:00'),
(19, 28, '', '', 'Mengubah pembayaran sebesar ', '2021-04-12 15:55:04'),
(20, 28, '', 'tambah', 'Menambahkan pembayaran sebesar 90000', '2021-04-12 15:59:51'),
(21, 28, '', 'tambah', 'Menambahkan pembayaran sebesar 80000', '2021-04-12 16:02:46'),
(22, 28, '', 'tambah', 'Menambahkan pembayaran sebesar 90000', '2021-04-12 16:04:05'),
(23, 28, '', 'tambah', 'Menambahkan pembayaran sebesar 90000', '2021-04-12 16:04:47'),
(24, 28, '123456', 'tambah', 'Menambahkan pembayaran sebesar 90000', '2021-04-12 16:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `level` enum('superadmin','admin','employee') NOT NULL,
  `status_account` enum('active','inactive') NOT NULL,
  `last_logged` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id_login`, `username`, `password`, `level`, `status_account`, `last_logged`, `created_at`) VALUES
(1, 'admin', '$2y$10$CJ6vuUwGP2ANfYaSL1RQEOBDoY4wANytoIH95wOHqQ8rL25CcdhMK', 'superadmin', 'active', '0000-00-00 00:00:00', '2021-02-28 14:54:32'),
(25, 'ely', '$2y$10$1iCdnbNNf8hQ5Y3JxqiTAeJyTDRXjLSUVLTonJQdmV018USB7LSTC', 'admin', 'active', '0000-00-00 00:00:00', '2021-03-11 10:00:34'),
(28, 'april', '$2y$10$3Txg8ocb5hgehBGTnREmNuuyfrOAG/cQquccoCFseVxW.STxJ5JEq', 'employee', 'active', '0000-00-00 00:00:00', '2021-04-01 08:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_officer`
--

CREATE TABLE `user_officer` (
  `id_officer` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `jabatan` enum('petugas_lapangan','pegawai_kantor','manajer') NOT NULL,
  `wilayah_penugasan` enum('kota','kabupaten') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_officer`
--

INSERT INTO `user_officer` (`id_officer`, `id_login`, `name`, `address`, `email`, `telp`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `foto`, `jabatan`, `wilayah_penugasan`) VALUES
(14, 25, 'Ely Nur Rahyu', 'Owner of MSI Tuban - Malang', 'elynurmsi@gmail.com', '081', 'P', '2021-03-11', 'Malang', '', 'manajer', 'kota'),
(15, 26, 'Aprilia Putri Ariantini', 'Jalan Istana Bunga Dewandaru No. 04', 'apriliaaputri14@gmail.com', '08819481152', 'P', '2021-03-10', 'Probolinggo', 'KUJICAM_2020-02-27-21-20-03.jpg', 'pegawai_kantor', 'kota'),
(17, 28, 'Aprilia Putri', 'a', 'apriliaaputri14@gmail.com', '37646787', 'P', '2021-04-28', 'Bali', '', 'petugas_lapangan', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `master_domisili`
--
ALTER TABLE `master_domisili`
  ADD PRIMARY KEY (`id_domisili`);

--
-- Indexes for table `master_jenis_pelanggan`
--
ALTER TABLE `master_jenis_pelanggan`
  ADD PRIMARY KEY (`id_jenis_pelanggan`);

--
-- Indexes for table `master_subdomisili`
--
ALTER TABLE `master_subdomisili`
  ADD PRIMARY KEY (`id_subdomisili`);

--
-- Indexes for table `penagihan`
--
ALTER TABLE `penagihan`
  ADD PRIMARY KEY (`id_penagihan`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id_piutang`);

--
-- Indexes for table `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `user_officer`
--
ALTER TABLE `user_officer`
  ADD PRIMARY KEY (`id_officer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `master_domisili`
--
ALTER TABLE `master_domisili`
  MODIFY `id_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `master_jenis_pelanggan`
--
ALTER TABLE `master_jenis_pelanggan`
  MODIFY `id_jenis_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master_subdomisili`
--
ALTER TABLE `master_subdomisili`
  MODIFY `id_subdomisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penagihan`
--
ALTER TABLE `penagihan`
  MODIFY `id_penagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id_piutang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_officer`
--
ALTER TABLE `user_officer`
  MODIFY `id_officer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
