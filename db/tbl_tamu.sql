-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 01:12 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbkutamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu`
--

CREATE TABLE IF NOT EXISTS `tbl_tamu` (
  `id_tamu` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `status` varchar(25) NOT NULL,
  `id_kegiatan` varchar(3) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`id_tamu`, `nama`, `alamat`, `no_hp`, `status`, `id_kegiatan`, `tanggal`) VALUES
('TM01', 'Iwan', 'Air Batu', '0852', 'Tamu', 'K01', '2022-01-04'),
('TM02', 'Afika Aliyah', 'Batu Bara', '0812', 'Tamu', 'K01', '2022-01-04'),
('TM03', 'User', 'kisaran', '082', 'Tamu', 'K01', '2022-01-04'),
('TM04', 'Coba', 'Tanjung Balai', '0812345', 'Tamu', 'K02', '2022-01-04'),
('TM06', 'Zulham', 'Kisaran Kota', '0813809090', 'Pemateri', 'K02', '2022-01-04'),
('TM90', 'ZUKIM', 'Jl.Madong Lubis', '9090', 'Tamu', 'K01', '2022-01-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
 ADD PRIMARY KEY (`id_tamu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
