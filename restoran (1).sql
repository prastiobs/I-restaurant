-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2018 at 07:17 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `jenisAkun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `firstName`, `lastName`, `email`, `gender`, `jenisAkun`) VALUES
('dzakimadhani', '123456', 'Dzaki', 'Madhani', 'dzakimadhani@gmail.com', 'Laki-laki', 'pelanggan'),
('kasir', 'kasir', '', '', '', '', 'kasir'),
('koki', 'koki', '', '', '', '', 'koki'),
('magrif', '123456', 'Magrifitya', 'Putra', 'magrifitya@gmail.com', 'Laki-laki', 'pelanggan'),
('prastio', '123456', 'Prastio', 'Bagusindra', 'prastio@gmail.com', 'Laki-laki', 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `idOrder` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `idProduk` int(11) NOT NULL,
  `jumlah` varchar(25) NOT NULL,
  `jenisOrder` varchar(20) NOT NULL,
  `biayaOrder` int(11) NOT NULL,
  `statusOrder` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `namaProduk` varchar(30) NOT NULL,
  `jenisProduk` varchar(25) NOT NULL,
  `stokProduk` int(11) NOT NULL,
  `hargaProduk` int(11) NOT NULL,
  `gambarProduk` varchar(50) NOT NULL,
  `tipeFile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `namaProduk`, `jenisProduk`, `stokProduk`, `hargaProduk`, `gambarProduk`, `tipeFile`) VALUES
(6, 'Bakso', 'Makanan', 15, 20000, 'bakso.jpg', 'image/jpeg'),
(7, 'Jus Jeruk', 'Minuman', 46, 5000, 'jus-jeruk.png', 'image/png'),
(8, 'Jus Jambu', 'Minuman', 48, 5000, 'jus-jambu.jpg', 'image/jpeg'),
(9, 'Es Teh', 'Minuman', 48, 4000, 'es-teh.png', 'image/png'),
(10, 'Sate Ayam', 'Makanan', 64, 22000, 'sate-ayam.jpg', 'image/jpeg'),
(11, 'Gado-Gado', 'Makanan', 14, 15000, 'gado-gado.jpg', 'image/jpeg'),
(12, 'Mie Goreng', 'Makanan', 84, 14000, 'mie-goreng.jpg', 'image/jpeg'),
(13, 'Nasi Goreng', 'Makanan', 64, 17000, 'nasi-goreng.jpg', 'image/jpeg'),
(14, 'Soto Ayam', 'Makanan', 74, 15000, 'soto-ayam.jpg', 'image/jpeg'),
(15, 'Opor Ayam', 'Makanan', 15, 15000, 'opor-ayam.jpg', 'image/jpeg'),
(16, 'Rendang', 'Makanan', 49, 25000, 'rendang.jpg', 'image/jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`idOrder`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
