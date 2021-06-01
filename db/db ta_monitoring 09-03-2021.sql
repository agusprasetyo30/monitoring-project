-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 02:40 AM
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
(1, 'admin', '$2y$10$CJ6vuUwGP2ANfYaSL1RQEOBDoY4wANytoIH95wOHqQ8rL25CcdhMK', 'superadmin', 'active', '0000-00-00 00:00:00', '2021-02-28 14:54:32'),
(2, 'elynur', '$2y$10$CJ6vuUwGP2ANfYaSL1RQEOBDoY4wANytoIH95wOHqQ8rL25CcdhMK', 'admin', 'active', '2021-03-04 20:34:19', '2021-03-04 13:36:18'),
(3, 'aprptr', '$2y$10$CJ6vuUwGP2ANfYaSL1RQEOBDoY4wANytoIH95wOHqQ8rL25CcdhMK', 'employee', 'active', '2021-03-04 20:34:19', '2021-03-04 13:36:18'),
(4, 'april2', '$2y$10$74QMjPRw8Je8KMapC4uWH.Kbl1X6FL9c3wIR46N9xGbdOtrPbybCa', 'employee', 'active', '0000-00-00 00:00:00', '2021-03-04 15:05:42'),
(5, 'daniel', '$2y$10$TBj4aEWTlE1Y7DcD3EfD/ekvj5IExgNnsIMVV.KJQQXqSj4FDBC2G', 'employee', 'active', '0000-00-00 00:00:00', '2021-03-04 16:22:58'),
(6, 'saputra', '$2y$10$/qMh.hSBn1IppXszcXfQBuhrWM0hArZjTvqXZEQ3bvTCNW244LaaO', 'employee', 'active', '0000-00-00 00:00:00', '2021-03-05 03:27:18'),
(7, 'sitia', '$2y$10$XL/i8ZJ8kkE9UMP9VYbV0OP2pqSUrZ.Za1nCOLnMOhkM7aGqp7ihy', 'employee', 'active', '0000-00-00 00:00:00', '2021-03-05 04:06:42'),
(8, 'test link', '$2y$10$iO.VV1DADUYYlEN1ha9O8uVREMrcMRF30Qi6gYS325tTZf3Y2GhIG', 'employee', 'active', '0000-00-00 00:00:00', '2021-03-05 04:09:06'),
(9, 'test flashdata', '$2y$10$lg9zVXHxZTCv53RUGgoV8.zOXoSDLrT5iNlVXHV5hBm5fHph6GPj.', 'employee', 'active', '0000-00-00 00:00:00', '2021-03-05 04:12:42'),
(10, 'sync date', '$2y$10$gv5C4Sn.UmFmbo/q4RlNuepj8VmItFitkVsbkILdJxKfQmsWW31Oq', 'employee', 'active', '0000-00-00 00:00:00', '2021-03-05 04:14:40'),
(11, 'ptg lpg', '$2y$10$KY1QDdCiPCpwL4Fpb1WRzOB1xHUWNzkM4M4LP2IckkZFyVfL56OwW', 'employee', 'active', '0000-00-00 00:00:00', '2021-03-05 04:15:37'),
(12, 'maxlength', '$2y$10$PPsfSXEdcEz9AZx.OqYN7.GV1k9XWIthwysxFv5t043dzXGkllaJm', 'employee', 'active', '0000-00-00 00:00:00', '2021-03-05 04:35:12'),
(13, 'sitiromlah', '$2y$10$NlDEQjXXNS2XJ4wom8i72uE5TgGuGhj4za86WHePFkldgC.CNwSM2', 'employee', 'active', '0000-00-00 00:00:00', '2021-03-07 05:02:27');

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
  `jabatan` enum('petugas_lapangan','pegawai_kantor','manajer') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `wilayah_penugasan` enum('kota','kabupaten') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_officer`
--

INSERT INTO `user_officer` (`id_officer`, `id_login`, `name`, `address`, `email`, `telp`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `foto`, `jabatan`, `wilayah_penugasan`) VALUES
(1, 2, 'Ely Nur Rahayu', NULL, 'elynurmsi@gmail.com', '08816254050', 'P', '2010-03-05', 'Tuban', 'default.jpg', 'manajer', 'kota'),
(2, 3, 'Aprilia Putri Ariantini', NULL, 'aprptr@gmail.com', '088166254020', 'P', '2021-03-03', 'Probolinggo', 'default.jpg', 'petugas_lapangan', 'kota'),
(12, 13, 'Siti Romlah', 'Ds.Sukun, Kec.Malang, Kab.Malang', 'sitiromlah123@gmail.com', '089887766777', 'P', '2002-02-12', 'Malang', '', 'pegawai_kantor', '');

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
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_officer`
--
ALTER TABLE `user_officer`
  MODIFY `id_officer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
