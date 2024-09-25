-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 06:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stok1`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id_inventory` int(150) NOT NULL,
  `nama_barang` int(150) NOT NULL,
  `jenis_barang` varchar(150) NOT NULL,
  `kuantitas_stok` varchar(150) NOT NULL,
  `lokasi_gudang` int(150) NOT NULL,
  `serial_number` varchar(150) NOT NULL,
  `harga` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id_inventory`, `nama_barang`, `jenis_barang`, `kuantitas_stok`, `lokasi_gudang`, `serial_number`, `harga`) VALUES
(19, 6, 'minuman', '1400', 7, '6327347', '3.000'),
(20, 7, 'elektronik', '500', 6, '216247', 'Rp. 2.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `storageunit`
--

CREATE TABLE `storageunit` (
  `id_storageunit` int(150) NOT NULL,
  `nama_gudang` varchar(150) NOT NULL,
  `lokasi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storageunit`
--

INSERT INTO `storageunit` (`id_storageunit`, `nama_gudang`, `lokasi`) VALUES
(6, 'gudang garam', 'surabaya'),
(7, 'gudang jaya', 'batu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Nomor_id` int(30) NOT NULL,
  `Nama` varchar(150) NOT NULL,
  `Kontak` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Nomor_id`, `Nama`, `Kontak`, `Email`, `username`, `password`, `level`) VALUES
(1, 'zafira', '085334733379', 'zafirapf@gmail.com', 'zafira', '56789', 'admin'),
(2, 'cece', '081366711367', 'cecezax@gmail.com', 'cecezax', '12345', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `kontak` varchar(150) NOT NULL,
  `nama_barang` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama`, `kontak`, `nama_barang`) VALUES
(6, 'arjuna', '6781291', 'teh pucuk'),
(7, 'semsem', '0249284', 'Keyboard');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_inventory`),
  ADD KEY `nama_barang` (`nama_barang`),
  ADD KEY `lokasi_gudang` (`lokasi_gudang`);

--
-- Indexes for table `storageunit`
--
ALTER TABLE `storageunit`
  ADD PRIMARY KEY (`id_storageunit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Nomor_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id_inventory` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `storageunit`
--
ALTER TABLE `storageunit`
  MODIFY `id_storageunit` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Nomor_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`nama_barang`) REFERENCES `vendor` (`id_vendor`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`lokasi_gudang`) REFERENCES `storageunit` (`id_storageunit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
