-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 05:47 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rise_furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(20) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `jk_customer` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat_customer` varchar(200) NOT NULL,
  `email_customer` varchar(100) NOT NULL,
  `telp_customer` varchar(20) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `jk_customer`, `alamat_customer`, `email_customer`, `telp_customer`, `deleted`) VALUES
('CUS-1', 'Jofrel', 'Laki-Laki', 'Manado', 'asd@gmail.com', '085230626418', 1),
('CUS-2', 'Daniel', 'Laki-Laki', 'Manado', 'daniel@gmail.com', '081340557844', 0),
('CUS-3', '', 'Perempuan', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deleted`) VALUES
('K-2', 'bed', 0),
('K-3', 'kitchen', 0),
('K-4', 'dinning', 0),
('K-5', 'living', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(50) NOT NULL,
  `judul_produk` varchar(200) NOT NULL,
  `id_supplier` varchar(20) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `judul_produk`, `id_supplier`, `id_kategori`, `stok`, `harga`, `deskripsi`, `gambar`, `deleted`) VALUES
('BU-1', 'bed 2', 'PG-3', 'K-2', 20, 4500000, 'bed yang cukup bagus', 'bed 2.jpg', 0),
('BU-10', 'kitchen 3', 'PG-2', 'K-3', 2, 4420000, 'memasak dengan nyaman', 'kitchen 3.jpg', 0),
('BU-11', 'kitchen 4', 'PG-1', 'K-3', 4, 5000000, 'dapur bersih,aman,dan nyaman', 'kitchen 4.jpg', 0),
('BU-12', 'Living 1', 'PG-1', 'K-5', 4, 4500000, 'living room 1', 'Living 1.jpg', 0),
('BU-13', 'Living 2', 'PG-2', 'K-5', 3, 3500000, 'living room 2', 'Living 2.jpg', 0),
('BU-14', 'Living 3', 'PG-3', 'K-5', 6, 6500000, 'living room 3', 'Living 3.jpg', 0),
('BU-2', 'bed 3', 'PG-2', 'K-2', 5, 3500000, 'bed yang enak buat tidur', 'bed 3.jpg', 0),
('BU-3', 'bed 4', 'PG-1', 'K-2', 10, 3000000, 'tempat tidur', 'bed 4.jpg', 0),
('BU-4', 'bed 1', 'PG-1', 'K-2', 5, 3500000, 'tempat tidur enak', 'bed 1.jpg', 0),
('BU-5', 'Dinning 1', 'PG-2', 'K-4', 2, 3500000, 'dinning bagus', 'dinning 1.jpg', 0),
('BU-6', 'Dinning 2', 'PG-1', 'K-4', 4, 2500000, 'tempat makan', 'dinning 2.jpg', 0),
('BU-7', 'Dinning 3', 'PG-1', 'K-4', 2, 3000000, 'dinning nyaman', 'dinning 3.jpg', 0),
('BU-8', 'kitchen 1', 'PG-3', 'K-3', 3, 5000000, 'dapur', 'kitchen 1.jpg', 0),
('BU-9', 'kitchen 2', 'PG-3', 'K-3', 2, 250000, 'dapur bersih', 'kitchen 2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat_supplier` varchar(200) NOT NULL,
  `email_supplier` varchar(50) NOT NULL,
  `telp_supplier` varchar(20) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `email_supplier`, `telp_supplier`, `deleted`) VALUES
('PG-1', 'julian', 'Manado', 'julian@gmail.com', '0877756766', 0),
('PG-2', 'novaldy', 'gorontalo', 'novaldy@yahoo.com', '08954458665', 0),
('PG-3', 'RIRI', 'JAKARTA', 'RIRI@gmail.com', '08134066985', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(50) NOT NULL,
  `id_customer` varchar(20) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `id_produk`, `tgl_transaksi`, `jumlah`, `total`) VALUES
('TR-1', 'CUS-2', 'BU-7', '2021-06-08 20:49:35', 1, 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipe_user` enum('Customer','Admin') NOT NULL,
  `id_customer` varchar(20) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `tipe_user`, `id_customer`, `deleted`) VALUES
('', '', 'Customer', 'CUS-3', 1),
('admin', 'admin', 'Admin', NULL, 0),
('Daniel', '121212', 'Customer', 'CUS-2', 0),
('julian', '1212', 'Customer', 'CUS-2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `FK_buku_pengarang` (`id_supplier`),
  ADD KEY `FK_buku_kategori` (`id_kategori`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `FK_transaksi_customer` (`id_customer`),
  ADD KEY `FK_transaksi_produk` (`id_produk`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `FK_user_customer` (`id_customer`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FK_buku_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `FK_buku_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
