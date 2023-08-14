-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 10:35 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `full_name`, `password`, `level`) VALUES
(1, 'admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'admin2', 'SubAdmin', 'c84258e9c39059a89ab77d846ddab909', 'admin'),
(7, 'Surya', 'Surya Kencana', 'cc03e747a6afbbcbf8be7668acfebee5', 'karyawan'),
(8, 'Silvia', 'Silvia Rossegold', 'e77bb954488789ddafb45eb980d5c49f', 'karyawan'),
(9, 'Ronaldo', 'CR7', '68eacb97d86f0c4621fa2b0e17cabd8c', 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(5) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
(1, 'Jack Restaurant'),
(2, 'Mike Resto'),
(3, 'Don Resto & Bar'),
(4, 'Suzi Tokyo');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(5) NOT NULL,
  `kode_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot` int(5) NOT NULL,
  `tipe` enum('cost','benefit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot`, `tipe`) VALUES
(1, 'C1', 'Kualitas Makanan', 5, 'benefit'),
(2, 'C2', 'Harga Rata-Rata Makanan', 7, 'cost'),
(3, 'C3', 'Pelayanan', 4, 'benefit'),
(4, 'C4', 'Suasana', 3, 'benefit'),
(5, 'C5', 'Jarak', 8, 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `opt_alternatif`
--

CREATE TABLE `opt_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(5) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `id_subkriteria` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel ini digunakan agar kriteria nya bisa dinamis';

--
-- Dumping data for table `opt_alternatif`
--

INSERT INTO `opt_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `id_subkriteria`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 5),
(3, 1, 3, 9),
(4, 1, 4, 11),
(5, 1, 5, 14),
(6, 2, 1, 2),
(7, 2, 2, 6),
(8, 2, 3, 8),
(9, 2, 4, 11),
(10, 2, 5, 13),
(11, 3, 1, 3),
(12, 3, 2, 4),
(13, 3, 3, 8),
(14, 3, 4, 10),
(15, 3, 5, 12),
(16, 4, 1, 3),
(17, 4, 2, 5),
(18, 4, 3, 8),
(19, 4, 4, 11),
(20, 4, 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(5) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `bobot` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `bobot`) VALUES
(1, 1, 'Buruk', 1),
(2, 1, 'Cukup', 3),
(3, 1, 'Baik', 5),
(4, 2, '<= 20.000', 1),
(5, 2, '20.000 - 50.000', 3),
(6, 2, '>= 50.000', 5),
(7, 3, 'Buruk', 1),
(8, 3, 'Standar', 3),
(9, 3, 'Baik Sekali', 5),
(10, 4, 'Tidak Nyaman', 1),
(11, 4, 'Nyaman', 5),
(12, 5, 'Sangat Dekat', 1),
(13, 5, 'Cukup Dekat', 3),
(14, 5, 'Jauh', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `opt_alternatif`
--
ALTER TABLE `opt_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_subkriteria` (`id_subkriteria`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `opt_alternatif`
--
ALTER TABLE `opt_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `opt_alternatif`
--
ALTER TABLE `opt_alternatif`
  ADD CONSTRAINT `opt_alternatif_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `opt_alternatif_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `opt_alternatif_ibfk_3` FOREIGN KEY (`id_subkriteria`) REFERENCES `subkriteria` (`id_subkriteria`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
