-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 06:13 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `no_hp` char(13) DEFAULT NULL,
  `tanggal_gabung` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `username`, `nama`, `alamat`, `email`, `no_hp`, `tanggal_gabung`) VALUES
(6, 'Ardha', 'Ardha', 'Jakarta', 'ardha@urtimate.com', '0217423111', '2022-01-18'),
(7, 'rafano', 'RAFANO', 'Bekasi', 'ardha@urtimate.com', '0217423111', '2014-05-18'),
(8, 'Nara', 'Nara', 'Bekasi', 'ardharafano@gmail.com', '0217423111', '2022-01-27');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_anggota`
-- (See below for the actual view)
--
CREATE TABLE `view_anggota` (
`id_anggota` int(11)
,`username` varchar(50)
,`nama` varchar(50)
,`alamat` varchar(50)
,`email` varchar(30)
,`no_hp` char(13)
,`tanggal_gabung` varchar(72)
,`selisih_hari` int(7)
,`selisih_bulan` bigint(21)
,`selisih_tahun` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `view_anggota`
--
DROP TABLE IF EXISTS `view_anggota`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_anggota`  AS  select `anggota`.`id_anggota` AS `id_anggota`,`anggota`.`username` AS `username`,`anggota`.`nama` AS `nama`,`anggota`.`alamat` AS `alamat`,`anggota`.`email` AS `email`,`anggota`.`no_hp` AS `no_hp`,date_format(`anggota`.`tanggal_gabung`,'%d %M %Y') AS `tanggal_gabung`,to_days(curdate()) - to_days(`anggota`.`tanggal_gabung`) AS `selisih_hari`,timestampdiff(MONTH,`anggota`.`tanggal_gabung`,current_timestamp()) AS `selisih_bulan`,timestampdiff(YEAR,`anggota`.`tanggal_gabung`,current_timestamp()) AS `selisih_tahun` from `anggota` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
