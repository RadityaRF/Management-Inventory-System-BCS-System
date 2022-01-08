-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 10:28 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id`, `username`, `password`, `role`) VALUES
(1, 'administrator', 'qwerty', 'admin'),
(2, 'user2', 'user2', 'user'),
(3, 'user1', 'user1', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `penerima` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `qty`) VALUES
(1, 1, '2021-08-06 11:28:50', 'Pembeli', 30),
(2, 1, '2021-08-09 06:16:44', 'Pembeli', 100),
(5, 4, '2021-08-11 07:33:14', 'Pembeli', 200),
(6, 5, '2021-08-11 11:54:21', 'Pembeli', 22),
(8, 2, '2021-08-15 05:06:41', 'Pembeli', 100),
(9, 2, '2021-08-15 05:06:56', 'Pembeli', 50),
(10, 4, '2021-08-15 05:23:32', 'Pembeli', 100),
(11, 2, '2021-08-29 11:33:51', 'pembeli', 150),
(12, 3, '2021-08-29 13:23:56', 'pembeli', 200),
(14, 13, '2021-09-02 06:06:48', 'Pembeli', 10),
(15, 14, '2021-09-09 03:01:01', 'Pembeli', 100),
(16, 3, '2021-09-28 11:24:06', 'pembeli', 500);

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `keterangan`, `qty`) VALUES
(19, 6, '2021-08-15 04:52:19', 'Anna', 1),
(21, 2, '2021-08-15 05:05:53', 'amel', 50),
(22, 4, '2021-08-15 05:22:43', 'Anna', 50),
(23, 3, '2021-08-29 13:44:15', 'Maria', 10),
(24, 3, '2021-08-29 13:46:22', 'Anna', 100),
(25, 8, '2021-08-30 12:02:08', 'Maria', 1),
(27, 11, '2021-09-01 08:13:15', 'Maria', 4),
(28, 13, '2021-09-02 06:07:07', 'Maria', 100),
(29, 14, '2021-09-09 03:00:35', 'Maria', 1000),
(30, 13, '2021-09-28 12:01:33', 'Anna', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(25) NOT NULL,
  `deskripsi` varchar(25) NOT NULL,
  `stock` int(11) NOT NULL,
  `lokasi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idbarang`, `namabarang`, `deskripsi`, `stock`, `lokasi`) VALUES
(3, 'Pensil 2B', 'ATK', 0, 'Rak AB'),
(4, 'Pulpen', 'ATK', 100, 'Rak AD'),
(5, 'Penghapus', 'ATK', 30, 'Rak AE'),
(6, 'Penggaris', 'ATK', 101, 'Rak A'),
(8, 'Spidol', 'ATK', 101, 'Rak AF'),
(13, 'Tipex', 'ATK', 101, 'Rak AT'),
(14, 'Pensil Warna', 'ATK', 1000, 'Rak AP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
