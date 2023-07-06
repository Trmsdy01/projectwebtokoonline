-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 12:27 PM
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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Food'),
(2, 'Clothes'),
(3, 'Toy'),
(4, 'Beds'),
(5, 'Meds'),
(6, 'Applience');

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
(2, 'Ai@gmail.com', 'Ai@gmail.com', 'Nur Ainunnisa', '981277678127', ''),
(3, 'roka123@gmail.com', '123', 'Roka', '+6281271794881', ''),
(5, 'Jelly@gmail.com', 'Jelly', 'Jelly', '08277876723', 'Perumahan Orchid Park Blok C2 No.271, BATAM KOTA'),
(6, 'HangeZoe@gmail.com', '123', 'Hange Zoe', '081298772811', 'Perumahan Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444'),
(7, 'James123@gmail.com', '123', 'James', '098872712', '');

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
(49, 43, 'Hange Zoe', 'Bank Mandiri', 150000, '2023-05-21', '202305211752059512e12e9cc880a1de27b12bfba427cd.jpg'),
(50, 44, 'Hange Zoe', 'Bank BRI', 310000, '2023-05-28', '20230528114616hange depress.jpeg'),
(51, 40, 'Roka', 'Bank Mandiri', 920000, '2023-05-29', '2023052917565820210114_190442.jpg'),
(52, 18, 'Roka', 'Bank Mandiri', 105000, '2023-05-29', '2023052917582320210114_190442.jpg'),
(53, 45, 'Hange Zoe', 'Bank Mandiri', 245000, '2023-06-22', '20230622144850hange.jpg'),
(54, 49, 'Roka', 'Bank Mandiri', 1015000, '2023-06-25', '20230625172722thumb-1920-818108.jpg'),
(55, 51, 'James', 'Bank Mandiri', 518000, '2023-06-27', '20230627114843_mi galería Yuri de SNK_.jpeg'),
(56, 33, 'Roka', 'Bank Mandiri', 1420000, '2023-06-28', '20230628142431_mi galería Yuri de SNK_.jpeg'),
(57, 19, 'Roka', 'Bank BRI', 85000, '2023-06-28', '20230628201051hange.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(255) NOT NULL,
  `total_berat` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `distrik` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `kodepos` varchar(255) NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `estimasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `total_berat`, `provinsi`, `distrik`, `tipe`, `kodepos`, `ekspedisi`, `paket`, `ongkir`, `estimasi`) VALUES
(1, 1, '2023-04-11', 1500000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(18, 3, '2023-05-11', 105000, '', 'cancel', '', 0, '', '', '', '', '0', '', 0, ''),
(19, 3, '2023-05-11', 85000, '', 'PAID', '', 0, '', '', '', '', '0', '', 0, ''),
(20, 3, '2023-05-11', 100000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(21, 3, '2023-05-11', 100000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(22, 3, '2023-05-11', 85000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(23, 3, '2023-05-11', 100000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(24, 3, '2023-05-11', 85000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(25, 3, '2023-05-11', 100000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(26, 3, '2023-05-11', 100000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(27, 3, '2023-05-11', 100000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(28, 3, '2023-05-11', 105000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(29, 3, '2023-05-11', 550000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(30, 3, '2023-05-15', 188000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(31, 3, '2023-05-15', 860000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(32, 2, '2023-05-15', 1110000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(33, 3, '2023-05-15', 1420000, '', 'PAID', '', 0, '', '', '', '', '0', '', 0, ''),
(34, 3, '2023-05-15', 110000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(35, 3, '2023-05-15', 65000, 'Perum. Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(36, 3, '2023-05-15', 138000, 'Perum. Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(37, 3, '2023-05-15', 138000, 'Perum. Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(38, 1, '2023-05-15', 305000, 'Perum. Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(39, 5, '2023-05-20', 45000, '', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(40, 3, '2023-05-20', 920000, 'perum.orchid park', 'Product are being delivered', 'Rk009', 0, '', '', '', '', '0', '', 0, ''),
(41, 1, '2023-05-20', 1170000, 'Perum. orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(42, 4, '2023-05-20', 380000, 'Cluster Parkit, Jl. Parkit Raya No.22, KDA, Belian, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29464', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(43, 6, '2023-05-21', 150000, 'Perum. Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'barang dikirim', 'AVB123', 0, '', '', '', '', '0', '', 0, ''),
(44, 6, '2023-05-21', 310000, 'Perum. Orchid Park Blok C2 No.271', 'Product are being delivered', 'ASS123654', 0, '', '', '', '', '0', '', 0, ''),
(45, 6, '2023-05-21', 245000, 'Perumahan Orchid Park Blok C2 No.271, Kepulauan Riau, Batam, Batam Kota, Taman Baloi, 29444', 'Product are being delivered', '1234567', 0, '', '', '', '', '0', '', 0, ''),
(46, 6, '2023-05-28', 1565000, 'Plaza Pondok Indah 2,\r\nJl. Metro Duta Niaga Blok B5, Pondok Indah, South Jakarta\r\n12310 – Indonesia', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(47, 3, '2023-05-29', 200000, 'orchid Park', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(48, 6, '2023-06-22', 1395000, 'JAkarta Barat', 'pending', '', 0, '', '', '', '', '0', '', 0, ''),
(49, 3, '2023-06-25', 1015000, 'Jakarta Barat', 'Product are being delivered', 'ASS123654', 0, '', '', '', '', '0', '', 0, ''),
(51, 7, '2023-06-27', 518000, 'Perum. Orchid park Blok C2 No.271', 'Product are being delivered', 'Rk009', 1430, 'Kepulauan Riau', 'Batam', 'Kota', '29413', 'tiki', 'ECO', 16000, '4');

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
(49, 45, 7, 5, 'Hoodie Kucing Cantik', 45000, 100, 500, 225000),
(50, 46, 15, 2, 'Royal Canin', 250000, 2000, 4000, 500000),
(51, 46, 5, 1, 'Baju Kucing Cantik', 50000, 1000, 1000, 50000),
(52, 46, 10, 4, 'Cat Beds', 250000, 1000, 4000, 1000000),
(53, 47, 7, 4, 'Hoodie Kucing Cantik', 45000, 100, 400, 180000),
(54, 48, 19, 1, 'GRAIN FREE CAT FOOD ', 130000, 15000, 15000, 130000),
(55, 48, 10, 5, 'Cat Beds', 250000, 1500, 7500, 1250000),
(56, 49, 5, 1, 'Baju Kucing Cantik', 50000, 1000, 1000, 50000),
(57, 49, 7, 6, 'Hoodie Kucing Cantik', 45000, 100, 600, 270000),
(58, 49, 24, 2, 'Digestive Care', 340000, 400, 800, 680000),
(59, 50, 8, 1, 'Litter Box Cat', 123000, 1000, 1000, 123000),
(60, 50, 6, 4, 'Cat Toy', 35000, 100, 400, 140000),
(61, 50, 21, 1, 'VetriScience Multivitamin for Cats', 112000, 30, 30, 112000),
(62, 51, 5, 1, 'Baju Kucing Cantik', 50000, 1000, 1000, 50000),
(63, 51, 21, 1, 'VetriScience Multivitamin for Cats', 112000, 30, 30, 112000),
(64, 51, 24, 1, 'Digestive Care', 340000, 400, 400, 340000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(10) NOT NULL,
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

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(4, 1, 'Cat Tree', 900000, 1000, 'cat-tree.png', 'Cat Tree', 25),
(5, 2, 'Baju Kucing Cantik', 50000, 1000, 'baju-kucing.png', '                                    Baju Kucing Cantik Warna Biru                        ', 22),
(6, 3, 'Cat Toy', 35000, 100, 'cat-toy.png', '            Mainan Kucing Bola. Kucing suka\r\n         ', 21),
(7, 2, 'Hoodie Kucing Cantik', 45000, 100, 'baju-kucing1.png', '            Hoodie Kucing Cantik Berwarna        ', 10),
(8, 6, 'Litter Box Cat', 123000, 1000, 'litterbox.png', '                        Cat Litter Box                 ', 24),
(10, 4, 'Cat Beds', 250000, 1500, 'beds.png', '                                    Cat Beds Comfortable                        ', 16),
(12, 1, 'Proplan Adult', 550000, 3000, 'proplan.png', '                                                Proplan Adult Chicken Flavour                                ', 25),
(14, 1, 'Whiskas Kitten', 24000, 1500, 'cat-food.png', '            Whiskas Ocean Fish Flavour for Kitten 2-12 Months        ', 25),
(15, 1, 'Royal Canin', 250000, 2000, 'royal canin.webp', '            Makanan Kucing        ', 23),
(19, 1, 'GRAIN FREE CAT FOOD ', 130000, 15000, '0610e2e2-6707-4040-b350-19cd5f80e7fc.jpg', '                                     Kitchen flavor 1.5kg kemasan freshpack\r\nBlue :Beauty\r\nPink ; Adult\r\ngold : kitten                                        ', 64),
(20, 3, 'Cat Toys Speed', 65000, 1000, '61R6XXycJqL.jpg', '            Cat Toys 2 Speed Modes, 3-in-1 Automatic Interative Cat Toys for Indoor Cats with Feather and Bell Ball, Electronic Cat Puzzle Toys, Exerciser Entertainment Hunting for Kitty Pet with Battery        ', 56),
(21, 5, 'VetriScience Multivitamin for Cats', 112000, 30, 'VetriScience-cat-multivitamin-3e4e08e078944cf3ad128e45b58f925f.jpg', '            These daily multivitamins for cats come in a convenient chewable form that makes them feel like a treat for your kitty rather than something to be avoided. The soft bite-size supplements for cats contain amino acids, fish oil omegas, taurine, and other nutrients for immune support, eye health, and overall health.        ', 18),
(22, 5, 'Ear Cleaner fo Cats', 35000, 65, 'raid_all_ear_cleaner__65_ml__obat_pembersih_teling_kucing_anjing_1539488951_374f5cb70.jpg', '            Raid All Ear Cleaner - 65 ml - Obat Pembersih Telinga kucing  ampuh      ', 50),
(24, 1, 'Digestive Care', 340000, 400, 'digestive-int-fcn-packshot.jpg', '                        Balanced and complete feed for adult cats - Recommended to help support healthy digestion.       \r\n\r\nA sensitive digestion?\r\nDoes your cat have a sensitive digestion? A sensitive stomach and digestive tract may result in a large quantity of poor quality faeces which may also indicate poor digestion. Additionally, swallowing too quickly without sufficient chewing can lead to regurgitation.         ', 57);

-- --------------------------------------------------------

--
-- Table structure for table `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(25, 24, 'download.jpg'),
(26, 24, 'fcn-digestive-croc.jpg'),
(32, 24, '20230622063123rc-fcn-digestive-cv-eretailkit-5.jpg'),
(33, 24, '20230622063129rc-fcn-digestive-cv-eretailkit-2.jpg'),
(34, 21, '20230622063249images.jpg'),
(36, 24, '20230622090119digestive-back-illustr-fcn16.jpg'),
(38, 22, '20230622094552ear.jpg'),
(39, 15, '20230622110207sol-hero-image-kitten-dry-b1-cv4 (1).jpg'),
(40, 15, '20230622110225sol-hero-image-kitten-dry-b1-cv2.jpg'),
(41, 15, '20230622110244sol-hero-image-kitten-dry-b1-cv3.jpg'),
(42, 14, '2023062211063961gKI7ai0IL.jpg'),
(43, 14, '2023062211064661WtrruWBDL._AC_UF1000,1000_QL80_.jpg'),
(44, 14, '202306221106525-75.jpg'),
(45, 14, '20230622110658images (1).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

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
-- Indexes for table `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
