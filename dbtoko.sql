-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 09:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtoko`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'triems', 'triems', 'Trie Meutia Saddyah');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 15000),
(2, 'Batam', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'triems01@gmail.com', 'trimes01@gmail.com', 'Trie Meutia Saddyah', '+6281271794881', ''),
(2, 'Ai@gmail.com', 'Ai@gmail.com', 'Nur Ainunnisa', '981277678127', ''),
(3, 'roka123@gmail.com', '123', 'Roka', '+6281271794881', ''),
(4, 'pj123@gmail.com', '123', 'Puja Maharani', '081298772811', 'Cluster Parkit, Jl. Parkit Raya No.22, KDA, Belian, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29464'),
(5, 'Jelly@gmail.com', 'Jelly', 'Jelly', '08277876723', 'Perumahan Orchid Park Blok C2 No.271, BATAM KOTA'),
(6, 'HangeZoe@gmail.com', '123', 'Hange Zoe', '081298772811', 'Perumahan Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(49, 43, 'Hange Zoe', 'Bank Mandiri', 150000, '2023-05-21', '202305211752059512e12e9cc880a1de27b12bfba427cd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`) VALUES
(1, 1, 1, '2023-04-11', 1500000, '', 0, '', 'pending'),
(18, 3, 2, '2023-05-11', 105000, '', 0, '', 'pending'),
(19, 3, 0, '2023-05-11', 85000, '', 0, '', 'pending'),
(20, 3, 1, '2023-05-11', 100000, '', 0, '', 'pending'),
(21, 3, 1, '2023-05-11', 100000, '', 0, '', 'pending'),
(22, 3, 0, '2023-05-11', 85000, '', 0, '', 'pending'),
(23, 3, 1, '2023-05-11', 100000, '', 0, '', 'pending'),
(24, 3, 0, '2023-05-11', 85000, '', 0, '', 'pending'),
(25, 3, 1, '2023-05-11', 100000, '', 0, '', 'pending'),
(26, 3, 1, '2023-05-11', 100000, '', 0, '', 'pending'),
(27, 3, 1, '2023-05-11', 100000, '', 0, '', 'pending'),
(28, 3, 2, '2023-05-11', 105000, '', 0, '', 'pending'),
(29, 3, 1, '2023-05-11', 550000, '', 0, '', 'pending'),
(30, 3, 1, '2023-05-15', 188000, '', 0, '', 'pending'),
(31, 3, 1, '2023-05-15', 860000, '', 0, '', 'pending'),
(32, 2, 1, '2023-05-15', 1110000, '', 0, '', 'pending'),
(33, 3, 2, '2023-05-15', 1420000, 'Batam', 20000, '', 'pending'),
(34, 3, 1, '2023-05-15', 110000, 'Jakarta', 15000, '', 'pending'),
(35, 3, 2, '2023-05-15', 65000, 'Batam', 20000, 'Perum. Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'pending'),
(36, 3, 1, '2023-05-15', 138000, 'Jakarta', 15000, 'Perum. Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'pending'),
(37, 3, 1, '2023-05-15', 138000, 'Jakarta', 15000, 'Perum. Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'pending'),
(38, 1, 2, '2023-05-15', 305000, 'Batam', 20000, 'Perum. Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'pending'),
(39, 5, 0, '2023-05-20', 45000, '', 0, '', 'pending'),
(40, 3, 2, '2023-05-20', 920000, 'Batam', 20000, 'perum.orchid park', 'pending'),
(41, 1, 0, '2023-05-20', 1170000, '', 0, 'Perum. orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'pending'),
(42, 4, 1, '2023-05-20', 380000, 'Jakarta', 15000, 'Cluster Parkit, Jl. Parkit Raya No.22, KDA, Belian, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29464', 'pending'),
(43, 6, 2, '2023-05-21', 150000, 'Batam', 20000, 'Perum. Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'PAID'),
(44, 6, 1, '2023-05-21', 310000, 'Jakarta', 15000, 'Perum. Orchid Park Blok C2 No.271', 'pending'),
(45, 6, 2, '2023-05-21', 245000, 'Batam', 20000, 'Perumahan Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(3, 1, 1, 10, '', 0, 0, 0, 0),
(4, 2, 2, 33, '', 0, 0, 0, 0),
(5, 0, 5, 1, '', 0, 0, 0, 0),
(6, 0, 6, 1, '', 0, 0, 0, 0),
(7, 26, 5, 1, '', 0, 0, 0, 0),
(8, 26, 6, 1, '', 0, 0, 0, 0),
(9, 27, 5, 1, '', 0, 0, 0, 0),
(10, 27, 6, 1, '', 0, 0, 0, 0),
(11, 28, 5, 1, '', 0, 0, 0, 0),
(12, 28, 6, 1, '', 0, 0, 0, 0),
(13, 29, 6, 1, '', 0, 0, 0, 0),
(14, 29, 15, 2, '', 0, 0, 0, 0),
(15, 30, 5, 1, '', 0, 0, 0, 0),
(16, 30, 8, 1, '', 0, 0, 0, 0),
(17, 31, 4, 1, 'Cat Tree', 1000, 800000, 1000, 800000),
(18, 31, 7, 1, 'Hoodie Kucing Cantik', 100, 45000, 100, 45000),
(19, 32, 4, 1, 'Cat Tree', 800000, 1000, 1000, 800000),
(20, 32, 7, 1, 'Hoodie Kucing Cantik', 45000, 100, 100, 45000),
(21, 32, 10, 1, 'Cat Beds', 250000, 1000, 1000, 250000),
(22, 33, 4, 1, 'Cat Tree', 900000, 1000, 1000, 900000),
(23, 33, 15, 2, 'Royal Canin', 250000, 2000, 4000, 500000),
(24, 0, 8, 1, 'Litter Box Cat', 123000, 1000, 1000, 123000),
(25, 0, 11, 1, 'Cat House', 150000, 1500, 1500, 150000),
(26, 0, 10, 1, 'Cat Beds', 250000, 1000, 1000, 250000),
(27, 0, 6, 1, 'Cat Toy', 35000, 100, 100, 35000),
(28, 0, 8, 1, 'Litter Box Cat', 123000, 1000, 1000, 123000),
(29, 34, 5, 1, 'Baju Kucing Cantik', 50000, 1000, 1000, 50000),
(30, 34, 7, 1, 'Hoodie Kucing Cantik', 45000, 100, 100, 45000),
(31, 35, 7, 1, 'Hoodie Kucing Cantik', 45000, 100, 100, 45000),
(32, 36, 8, 1, 'Litter Box Cat', 123000, 1000, 1000, 123000),
(33, 37, 8, 1, 'Litter Box Cat', 123000, 1000, 1000, 123000),
(34, 38, 6, 1, 'Cat Toy', 35000, 100, 100, 35000),
(35, 38, 10, 1, 'Cat Beds', 250000, 1000, 1000, 250000),
(36, 39, 7, 1, 'Hoodie Kucing Cantik', 45000, 100, 100, 45000),
(37, 40, 4, 1, 'Cat Tree', 900000, 1000, 1000, 900000),
(38, 41, 8, 2, 'Litter Box Cat', 123000, 1000, 2000, 246000),
(39, 41, 14, 1, 'Whiskas Kitten', 24000, 1500, 1500, 24000),
(40, 41, 4, 1, 'Cat Tree', 900000, 1000, 1000, 900000),
(41, 42, 6, 2, 'Cat Toy', 35000, 100, 200, 70000),
(42, 42, 10, 1, 'Cat Beds', 250000, 1000, 1000, 250000),
(43, 42, 7, 1, 'Hoodie Kucing Cantik', 45000, 100, 100, 45000),
(44, 43, 6, 1, 'Cat Toy', 35000, 100, 100, 35000),
(45, 43, 7, 1, 'Hoodie Kucing Cantik', 45000, 100, 100, 45000),
(46, 43, 5, 1, 'Baju Kucing Cantik', 50000, 1000, 1000, 50000),
(47, 44, 7, 1, 'Hoodie Kucing Cantik', 45000, 100, 100, 45000),
(48, 44, 10, 1, 'Cat Beds', 250000, 1000, 1000, 250000),
(49, 45, 7, 5, 'Hoodie Kucing Cantik', 45000, 100, 500, 225000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(4, 'Cat Tree', 900000, 1000, 'cat-tree.png', 'Cat Tree', 25),
(5, 'Baju Kucing Cantik', 50000, 1000, 'baju-kucing.png', '                        Baju Kucing Cantik Warna Biru                ', 25),
(6, 'Cat Toy', 35000, 100, 'cat-toy.png', 'Mainan Kucing Bola. Kucing suka\r\n ', 25),
(7, 'Hoodie Kucing Cantik', 45000, 100, 'baju-kucing1.png', 'Hoodie Kucing Cantik Berwarna', 20),
(8, 'Litter Box Cat', 123000, 1000, 'litterbox.png', '            Cat Litter Box         ', 25),
(10, 'Cat Beds', 250000, 1000, 'beds.png', '            Cat Beds Comfortable        ', 25),
(11, 'Cat House', 150000, 1500, 'cat-house.png', '            Cat House Wood        ', 25),
(12, 'Proplan Adult', 450000, 3000, 'proplan.png', '            Proplan Adult Chicken Flavour        ', 25),
(14, 'Whiskas Kitten', 24000, 1500, 'cat-food.png', 'Whiskas Ocean Fish Flavour for Kitten 2-12 Months', 25),
(15, 'Royal Canin', 250000, 2000, 'royal canin.webp', 'Makanan Kucing', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
