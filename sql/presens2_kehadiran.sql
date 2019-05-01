-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2019 at 11:53 AM
-- Server version: 5.7.26-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presens2_kehadiran`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `idabsensi` int(5) NOT NULL,
  `nim` char(8) NOT NULL,
  `tgl_absensi` date NOT NULL,
  `waktu_datang` time NOT NULL,
  `waktu_pulang` time NOT NULL DEFAULT '00:00:00',
  `waktu_riset` time NOT NULL,
  `lama_riset` time DEFAULT '00:00:00',
  `id_sidikjari` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`idabsensi`, `nim`, `tgl_absensi`, `waktu_datang`, `waktu_pulang`, `waktu_riset`, `lama_riset`, `id_sidikjari`) VALUES
(1, '10116189', '2019-03-26', '08:58:40', '00:00:00', '08:00:00', '00:00:00', '17'),
(2, '10118424', '2019-03-26', '11:36:01', '00:00:00', '08:00:00', '00:00:00', '21'),
(3, '10117226', '2019-04-16', '11:42:06', '00:00:00', '08:00:00', '00:00:00', '11'),
(4, '10117226', '2019-04-18', '08:28:25', '00:00:00', '08:00:00', '00:00:00', '11'),
(6, '10118277', '2019-04-20', '10:43:48', '00:00:00', '08:00:00', '00:00:00', '13'),
(8, '10117128', '2019-04-20', '11:05:25', '00:00:00', '08:00:00', '00:00:00', '30'),
(9, '10117226', '2019-04-25', '14:35:00', '14:40:50', '08:00:00', '00:05:50', '11'),
(10, '10517041', '2019-04-25', '14:36:32', '00:00:00', '08:00:00', '00:00:00', '27'),
(11, '10117152', '2019-04-25', '14:39:28', '00:00:00', '08:00:00', '00:00:00', '24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`username`, `password`) VALUES
('admin', 'absensiCL');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nim` char(8) NOT NULL,
  `nama_anggota` varchar(40) DEFAULT NULL,
  `bidang_riset` varchar(50) DEFAULT NULL,
  `id_sidikjari` varchar(3) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('true','false') NOT NULL DEFAULT 'false',
  `status_absensi` enum('Hadir','Tidak hadir') NOT NULL DEFAULT 'Tidak hadir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nim`, `nama_anggota`, `bidang_riset`, `id_sidikjari`, `tgl_daftar`, `status`, `status_absensi`) VALUES
('10115219', 'Tioreza', 'Website', '10', '2019-02-09 05:43:18', 'true', 'Tidak hadir'),
('10115388', 'Fazal Ahmad', 'Website', '14', '2019-02-28 03:48:12', 'true', 'Tidak hadir'),
('10115516', 'Tribuana Andhika Perkasa', 'Game', '15', '2019-02-28 03:49:29', 'true', 'Tidak hadir'),
('10115518', 'Daniyal Ahmad Rizaldhi', 'Backend', '4', '2019-02-09 05:34:40', 'true', 'Tidak hadir'),
('10115529', 'Ivan Rivaldi', 'Game', '5', '2019-02-09 05:37:34', 'true', 'Tidak hadir'),
('10116189', 'Andri R Herdiansah', 'UI/UX Designer', '17', '2019-02-28 03:53:28', 'true', 'Hadir'),
('10116236', 'Anisa Dewi', 'Ios', '9', '2019-02-09 05:42:05', 'true', 'Tidak hadir'),
('10116347', 'Lukmannudin', 'Android', '16', '2019-02-28 03:51:29', 'true', 'Tidak hadir'),
('10116352', 'Diki Supriadi', 'Web', '12', '2019-02-28 03:46:32', 'true', 'Tidak hadir'),
('10116426', 'Suyatna', 'Game', '18', '2019-02-28 03:57:40', 'true', 'Tidak hadir'),
('10117065', 'Teguh Siswanto', 'Android', '8', '2019-02-09 05:41:19', 'true', 'Tidak hadir'),
('10117085', 'Muhammad Yunus', 'Backend', '6', '2019-02-09 05:38:34', 'true', 'Tidak hadir'),
('10117128', 'Fikri Adriansa', 'Ios', '30', '2019-04-20 04:03:48', 'true', 'Hadir'),
('10117152', 'M Izzudin Wijaya', 'Backend', '24', '2019-04-25 07:38:35', 'true', 'Hadir'),
('10117226', 'Adam Ibrahim Aji', 'Data Science', '11', '2019-02-09 05:44:28', 'true', 'Tidak hadir'),
('10118024', 'Benno Alif Anggara', 'Website', '19', '2019-02-28 04:02:03', 'true', 'Tidak hadir'),
('10118277', 'Mirza MY Humayung', 'Data Science', '13', '2019-02-28 03:30:17', 'true', 'Hadir'),
('10118355', 'Siti Alawiah', 'Backend', '23', '2019-02-28 04:10:06', 'true', 'Tidak hadir'),
('10118363', 'Vania Yulianti Mozef', 'Website', '22', '2019-02-28 04:08:13', 'true', 'Tidak hadir'),
('10118371', 'Bintang Farhandika Editya', 'Android', '7', '2019-02-09 05:40:21', 'true', 'Tidak hadir'),
('10118395', 'Azis', 'Android', '20', '2019-02-28 04:03:29', 'true', 'Tidak hadir'),
('10118424', 'Husni Rofiq M', 'UI/UX Designer', '21', '2019-02-28 04:07:03', 'true', 'Hadir'),
('10517016', 'Dion Arya ', 'Backend', '3', '2019-02-09 05:33:16', 'true', 'Tidak hadir'),
('10517041', 'Faizal Alwan', 'UI/UX Designer', '27', '2019-04-25 07:36:24', 'true', 'Hadir'),
('10517095', 'Muhammad Naufal', 'Front End', '25', '2019-02-28 04:13:54', 'true', 'Tidak hadir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_piket`
--

CREATE TABLE `tb_piket` (
  `nim` char(8) NOT NULL,
  `nama_anggota` varchar(30) DEFAULT NULL,
  `status` enum('"Piket"','"Belum Piket"') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_riset`
--

CREATE TABLE `tb_riset` (
  `id_riset` int(5) NOT NULL,
  `waktu_riset` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riset`
--

INSERT INTO `tb_riset` (`id_riset`, `waktu_riset`) VALUES
(1, '08:00:00'),
(2, '08:00:00'),
(3, '08:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`idabsensi`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_riset`
--
ALTER TABLE `tb_riset`
  ADD PRIMARY KEY (`id_riset`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `idabsensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_riset`
--
ALTER TABLE `tb_riset`
  MODIFY `id_riset` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tb_anggota` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`presens2`@`localhost` EVENT `reset_status_absensi` ON SCHEDULE EVERY 1 DAY STARTS '2019-02-24 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE tb_anggota SET status_absensi='Tidak hadir'$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
