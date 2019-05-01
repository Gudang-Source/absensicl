-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2019 at 07:24 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kehadiran`
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
  `waktu_pulang` time DEFAULT NULL,
  `id_sidikjari` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`idabsensi`, `nim`, `tgl_absensi`, `waktu_datang`, `waktu_pulang`, `id_sidikjari`) VALUES
(2, '10114437', '2018-12-09', '09:00:00', '18:00:00', '3'),
(4, '10114415', '2018-12-12', '10:00:00', '18:59:45', '2'),
(5, '10114425', '2019-01-15', '08:23:03', '17:00:00', '1');

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
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `nim` char(8) NOT NULL,
  `nama_anggota` varchar(40) DEFAULT NULL,
  `bidang_riset` varchar(50) DEFAULT NULL,
  `id_sidikjari` varchar(3) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`nim`, `nama_anggota`, `bidang_riset`, `id_sidikjari`, `tgl_daftar`, `status`) VALUES
('10114344', 'Agung', 'IoT', '4', '2019-01-05 14:53:50', 'true'),
('10114415', 'Muhammad Arief Saldy', 'IoT', '2', '2019-01-05 14:53:45', 'true'),
('10114425', 'Adi Saripuloh', 'Multimedia', '1', '2019-01-19 15:22:20', 'true'),
('10114437', 'Muhammad Rezki', 'Multimedia', '3', '2019-01-05 14:53:56', 'true');

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
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `idabsensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tb_user` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
