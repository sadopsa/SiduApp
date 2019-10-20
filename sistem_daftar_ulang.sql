-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2019 at 09:51 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_daftar_ulang`
--

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE IF NOT EXISTS `krs` (
  `nomor` int(4) NOT NULL,
  `npm` varchar(15) NOT NULL,
  `kodekuliah` varchar(10) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `tahun` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`nomor`, `npm`, `kodekuliah`, `semester`, `tahun`) VALUES
(204, '30101101', 'TI001', 'Genap', 2018),
(205, '30101101', 'TI003', 'Genap', 2018),
(206, '30101101', 'TI004', 'Genap', 2018),
(207, '30101101', 'TI006', 'Genap', 2018),
(208, '30101101', 'TI008', 'Genap', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `id_matkul` int(3) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `sks` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_matkul`, `kode_matkul`, `nama_matkul`, `sks`) VALUES
(1, 'TI001', 'Pengantar Algoritma 1 Pengenalan', 2),
(3, 'TI003', 'Pengantar Bahasa C++', 3),
(4, 'TI004', 'Pengantar Ilmu Komputer', 2),
(5, 'TI005', 'Algoritma 2', 2),
(6, 'TI006', 'Pengantar Visual Basic', 2),
(7, 'TI007', 'Kalkulus', 2),
(8, 'TI008', 'Pengantar Data Base', 2),
(9, 'TI009', 'Pemograman Berorientasi Objek', 3),
(10, 'TI010', 'Pengantar Bahasa Java', 3),
(11, 'TI011', 'Struktur Database', 2),
(12, 'TI012', 'Bahasa C++ Lanjutan', 2),
(13, 'TI013', 'Visual Basic Lanjutan', 2),
(14, 'TI014', 'Pengantar Internet', 2),
(15, 'TI015', 'Jaringan Komputer', 4);

-- --------------------------------------------------------

--
-- Table structure for table `npm`
--

CREATE TABLE IF NOT EXISTS `npm` (
  `npm` varchar(10) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `npm`
--

INSERT INTO `npm` (`npm`, `nim`, `nama`) VALUES
('30101101', '3311801040', 'Vira Virara'),
('30101102', '3311801048', 'Muhamad Ilham'),
('30101103', '3311801000', 'Putra Halim');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Vira', 'vira', 'vira', 'mahasiswa'),
(2, 'Sofi Handayani', 'sofi', 'sofi', 'admin'),
(3, 'Muhamad Ilham', 'ilham', 'ilham', 'mahasiswa'),
(4, 'Putra Halim', 'putra', 'halim', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matkul`),
  ADD UNIQUE KEY `kode` (`kode_matkul`);

--
-- Indexes for table `npm`
--
ALTER TABLE `npm`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `nomor` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=209;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matkul` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
