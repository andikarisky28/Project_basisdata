-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 11:30 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpresensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `username_adm` varchar(64) NOT NULL,
  `password_adm` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_adm`, `password_adm`) VALUES
(1, 'adminBOT', 'dd79dc0c7e0b4fe6b833c7d8b6138136'),
(2, 'adminUX', '67c266f07a63949c72ed4e5f935bfd34'),
(3, 'adminCP', 'f463f13ef1afbe5cab8c8690017385d6'),
(4, 'adminCS', '59be55305fe24e6c461f4d5a6b0dbc98'),
(5, 'adminDM', '2b56ed98a2535d8088b9b6c9712060f7'),
(6, 'adminGR', '593c1c067a75ddb888953be33f328737'),
(7, 'adminIWDC', '9a97bb1614885f8e978ee2a6f4d38eb5'),
(8, 'adminMAD', 'd52d0b759d6c928ecadd2774583bcd8f'),
(9, 'adminHIM', '9975fcc9b18753973caf1322768877be');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_user` int(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komunitas`
--

CREATE TABLE `komunitas` (
  `id_kom` int(20) NOT NULL,
  `kom_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komunitas`
--

INSERT INTO `komunitas` (`id_kom`, `kom_name`) VALUES
(1, 'AgriBot'),
(2, 'AgriUX'),
(3, 'Competitive Programming'),
(4, 'Cyber Security'),
(5, 'Data Mining'),
(6, 'Game Reality'),
(7, 'IWDC'),
(8, 'mobile Apps Development');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_kom` int(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `pertemuan` int(20) NOT NULL,
  `date` date NOT NULL,
  `saran` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username_adm` (`username_adm`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `nim` (`nim`),
  ADD KEY `fullname` (`fullname`);

--
-- Indexes for table `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`id_kom`),
  ADD UNIQUE KEY `kom_name` (`kom_name`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kom` (`id_kom`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `nim` (`nim`),
  ADD KEY `fullname` (`fullname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`id_kom`) REFERENCES `komunitas` (`id_kom`),
  ADD CONSTRAINT `presensi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `anggota` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
