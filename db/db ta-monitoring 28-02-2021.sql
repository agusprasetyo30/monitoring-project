-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 04:07 PM
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
-- Table structure for table `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `no_ref` varchar(15) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `id_jenis_pelanggan` int(11) NOT NULL,
  `status_pelanggan` enum('aktif','inaktif') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis_rekening` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'PASURUAN', 'kota'),
(2, 'PROBOLINGGO', 'kota'),
(3, 'PASURUAN', 'kabupaten'),
(4, 'PROBOLINGGO', 'kabupaten');

-- --------------------------------------------------------

--
-- Table structure for table `master_jenis_pelanggan`
--

CREATE TABLE `master_jenis_pelanggan` (
  `id_jenis_pelanggan` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'admin', '$2y$10$CJ6vuUwGP2ANfYaSL1RQEOBDoY4wANytoIH95wOHqQ8rL25CcdhMK', 'superadmin', 'active', '0000-00-00 00:00:00', '2021-02-28 14:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_officer`
--

CREATE TABLE `user_officer` (
  `id_officer` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `jabatan` enum('petugas','pegawai','manajer') NOT NULL,
  `wilayah_penugasan` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_domisili`
--
ALTER TABLE `master_domisili`
  MODIFY `id_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_jenis_pelanggan`
--
ALTER TABLE `master_jenis_pelanggan`
  MODIFY `id_jenis_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_officer`
--
ALTER TABLE `user_officer`
  MODIFY `id_officer` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
