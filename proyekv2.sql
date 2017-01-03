-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2017 at 11:28 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyekv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_admin`
--

CREATE TABLE `absen_admin` (
  `id_absen` int(11) NOT NULL,
  `nip_karyawan` varchar(18) NOT NULL,
  `jam_datang` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen_admin`
--

INSERT INTO `absen_admin` (`id_absen`, `nip_karyawan`, `jam_datang`, `tanggal`) VALUES
(5, '196006131989021001', '11:01:49', '2016-11-23'),
(4, '196006131989021001', '11:01:27', '2016-12-04'),
(6, '197305102008011010', '11:02:51', '2016-12-04'),
(7, '1441180033', '20:32:26', '2016-12-04'),
(8, '1441180033', '06:33:16', '2016-12-04'),
(9, '1441180033', '13:22:50', '2016-12-19'),
(10, '1441180170', '13:23:05', '2016-12-19'),
(11, '1441180033', '13:13:25', '2016-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `absen_karyawan`
--

CREATE TABLE `absen_karyawan` (
  `nip_karyawan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_datang` time NOT NULL,
  `id_absen` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen_karyawan`
--

INSERT INTO `absen_karyawan` (`nip_karyawan`, `tanggal`, `jam_datang`, `id_absen`) VALUES
('195905271990031002', '2016-11-29', '20:29:24', 20),
('195902131986031001', '2016-11-29', '20:29:12', 19),
('196302031989101001', '2016-11-23', '06:35:43', 18),
('196109071988112001', '2016-11-23', '06:35:28', 17),
('195905271990031002', '2016-12-04', '06:35:05', 16),
('195902131986031001', '2016-12-04', '06:34:51', 15),
('195902131986031001', '2016-11-30', '06:33:52', 21),
('195912261986021001', '2016-12-04', '06:34:11', 22),
('196109071988112001', '2016-12-07', '06:34:33', 23),
('195905271990031002', '2016-12-07', '13:21:35', 24),
('195912261986021001', '2016-12-07', '13:21:52', 25),
('195902131986031001', '2016-12-19', '13:13:47', 26),
('195905271990031002', '2016-12-19', '13:13:59', 27),
('195912261986021001', '2016-12-19', '13:14:12', 28);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Teknik Mesin'),
(2, 'Teknik Kimia'),
(3, 'Administrasi Niaga'),
(4, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nama_karyawan` varchar(30) NOT NULL,
  `nip_karyawan` varchar(18) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `status` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nama_karyawan`, `nip_karyawan`, `alamat`, `id_jurusan`, `telp`, `status`, `password`) VALUES
('Moh. Nasir Hariyanto,IR.,MT', '195902131986031001', 'Jl. Karang Besuki no.252 Malang', 1, '087647362741', 'Dosen', 'n4s1rhariyanto'),
('Bagus Wahyudi,IR.,MT', '195905271990031002', 'Jl. Dewandaru dalam 23 Malang', 1, '08123316741', 'Dosen', 'b4gu5wahyudi'),
('Gumono,ST.,MMT', '195912261986021001', 'Jl. Simpang AKordion 72 Malang', 1, '0817530638', 'Dosen', 'gum0n0'),
('Abdul Chalim,IR.,MT', '196006131989021001', 'Jl. Danau Paniai Blok H4 no.E24 Malang', 2, '(0341)717376', 'Admin', '4bdulchalim'),
('Asih Widajati,DRA.,MM', '196109071988112001', 'Jl.Ranakah P-23 Malang', 3, '(0341)560116', 'Dosen', '4s1hwidajati'),
('Achmad Zaini,DR.,SE.,MM.', '196302031989101001', 'Jl.Tirto Mulyo V/2 Landungsari Malang', 3, '08123380118', 'Dosen', '4chm4dzaini'),
('Sri Rulianah,IR,MP', '196302111988032001', 'Jl. Danau Paniai C1 E3 Sawojajar Malang', 2, '(0341)711275', 'Dosen', 'sr1rulianah'),
('Abdullah Helmy,DRS,IR.MPD', '196412181990031002', 'Jl.Bareng Raya IIA/391B Malang', 3, '08123280116', 'Dosen', '4bdull4hhelmy'),
('Heny Dewajani,ST.,MT', '197001051997022001', 'Perum Puri Cempaka Putih Blok CC8 Malang', 2, '(0341)751353', 'Dosen', 'h3nyd3w4j4n1'),
('Achmad Suyono,SPD', '197101262005011001', 'Jl.Teluk Bayur 179A Malang', 3, '0818534238', 'Dosen', '4chm4dsuyono'),
('Zakijah Irfin,ST.,MT', '197102271998022001', 'Jl. Pluto 8 Malang', 2, '(0341)582107', 'Dosen', 'z4k1j4hirfin'),
('Indra Dharma Wijaya,ST.,MMT', '197305102008011010', 'Jl. Mayjend Panjaitan 7 RT.04/RW.01 Malang', 4, '08563026274', 'Admin', '1ndr4dharma'),
('Lisa Agustryana,ST.,MT', '197508122003122001', 'Jl. Bunga Puring 17 Malang', 1, '(0341)498321', 'Dosen', 'l1s4agus'),
('Ely Setyo Astuti,ST.,MT', '197605152009122001', 'Perum Taman Landungsari Indah D28 Malang', 4, '08125971983', 'Dosen', '3lysetyo'),
('Ellyn Eka Wahyu,S.SOS', '197605172005012001', 'Jl. Sri Rejeki 6 Malang', 3, '08155524023', 'Dosen', '3llyneka'),
('Atiqah Nurul Asri,SPD.,MPD', '197606252005012001', 'Jl. Ade Irma Suryani IIIA/332 Malang', 4, '08123386094', 'Dosen', '4t1q4hnurul'),
('Asrori,ST.,MT', '197705172001121002', 'Jl. Batujajar IV/16 Malang', 1, '(0341)364618', 'Dosen', '4sr0r1'),
('Faisal Rahutomo,ST.,M.KOM', '197711162005011008', 'Jl. Joyo grand E/46 Malang', 4, '(0341)552345', 'Dosen', 'f41sal'),
('Ahmadi Yuli Ananta,ST', '198107052005011002', 'Perum Griya Permata Alam HH1 Malang', 4, '08125214346', 'Dosen', '4hm4d1'),
('Dhitta Hananda', '1441180033', 'Jl.Senggani 43B', 1, '009183021', 'Admin', 'admin123'),
('Christanti', '1441180170', 'Sukun Malang', 1, '098756', 'Admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_admin`
--
ALTER TABLE `absen_admin`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `absen_karyawan`
--
ALTER TABLE `absen_karyawan`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_admin`
--
ALTER TABLE `absen_admin`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `absen_karyawan`
--
ALTER TABLE `absen_karyawan`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
