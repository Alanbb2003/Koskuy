-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 07:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koskuy`
--
CREATE DATABASE IF NOT EXISTS `koskuy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `koskuy`;

-- --------------------------------------------------------

--
-- Table structure for table `d_fasilitas`
--

CREATE TABLE `d_fasilitas` (
  `fasilitas_id` int(11) NOT NULL,
  `kos_id` int(11) NOT NULL,
  `spring_bed` tinyint(1) NOT NULL,
  `Ac` tinyint(1) NOT NULL,
  `kamar_mandi_dalam` tinyint(1) NOT NULL,
  `tv` tinyint(1) NOT NULL,
  `pemanas_air` tinyint(1) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `kulkas` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `d_kos`
--

CREATE TABLE `d_kos` (
  `detail_id` int(5) NOT NULL,
  `kos_id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `d_pembayaran`
--

CREATE TABLE `d_pembayaran` (
  `id_pembayaran` int(5) NOT NULL,
  `total_tagihan` int(20) NOT NULL,
  `denda` int(20) NOT NULL,
  `total_pembayaran` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_bersama`
--

CREATE TABLE `fasilitas_bersama` (
  `fasilitasbersama_id` int(11) NOT NULL,
  `kos_id` int(11) NOT NULL,
  `kamarmandi` tinyint(1) NOT NULL,
  `tv` tinyint(1) NOT NULL,
  `pemanasair` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `h_pembayaran`
--

CREATE TABLE `h_pembayaran` (
  `htrans_id` int(5) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_tagih` date NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `tanggal_mulai_sewa` date NOT NULL,
  `tanggal_akhir_sewa` date NOT NULL,
  `status` int(1) NOT NULL COMMENT '1 = tepat waktu\r\n0 = terlambat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `kamar_id` int(11) NOT NULL,
  `kos_id` int(11) NOT NULL,
  `nama_kamar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kos`
--

CREATE TABLE `kos` (
  `kos_id` int(11) NOT NULL,
  `kos_alamat` varchar(255) NOT NULL,
  `kos_tipe` varchar(255) NOT NULL,
  `fasilitas_id` varchar(255) NOT NULL,
  `kos_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_telp` int(12) NOT NULL,
  `user_role` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `d_fasilitas`
--
ALTER TABLE `d_fasilitas`
  ADD PRIMARY KEY (`fasilitas_id`);

--
-- Indexes for table `d_kos`
--
ALTER TABLE `d_kos`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `fasilitas_bersama`
--
ALTER TABLE `fasilitas_bersama`
  ADD PRIMARY KEY (`fasilitasbersama_id`);

--
-- Indexes for table `h_pembayaran`
--
ALTER TABLE `h_pembayaran`
  ADD PRIMARY KEY (`htrans_id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kamar_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d_fasilitas`
--
ALTER TABLE `d_fasilitas`
  MODIFY `fasilitas_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `d_kos`
--
ALTER TABLE `d_kos`
  MODIFY `detail_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas_bersama`
--
ALTER TABLE `fasilitas_bersama`
  MODIFY `fasilitasbersama_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `h_pembayaran`
--
ALTER TABLE `h_pembayaran`
  MODIFY `htrans_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `kamar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
