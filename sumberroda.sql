-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 11:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sumberroda`
--

-- --------------------------------------------------------

--
-- Table structure for table `tableitem`
--

CREATE TABLE `tableitem` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `satuan` enum('BAN','PCS','','') NOT NULL,
  `stock` int(4) NOT NULL,
  `harga_list` int(8) NOT NULL,
  `cashback` int(6) NOT NULL,
  `harga_khusus` int(7) NOT NULL,
  `diskon` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tableitem`
--

INSERT INTO `tableitem` (`id`, `nama`, `satuan`, `stock`, `harga_list`, `cashback`, `harga_khusus`, `diskon`) VALUES
(1, '195/50 R16 EC300+', 'BAN', 96, 1103700, 25000, 0, 38.5),
(2, '205/55 R16 EC300+', 'BAN', 0, 1260200, 25000, 0, 38.5),
(3, '205/55 R17 EC300+', 'BAN', 0, 1323100, 25000, 0, 38.5),
(4, '185/55 R15 EC300+', 'BAN', 0, 1018100, 25000, 0, 38.5),
(5, '185/55 R16 EC300+', 'BAN', 0, 1039500, 25000, 0, 38.5),
(6, '195/55 R16 EC300+', 'BAN', 0, 1125200, 25000, 0, 38.5),
(7, '195/60 R16 EC300+', 'BAN', 0, 1113900, 25000, 0, 38.5),
(8, '215/60 R17 EC300+', 'BAN', 0, 1233500, 25000, 0, 38.5),
(9, '185/60 R15 EC300+', 'BAN', 0, 1024900, 25000, 0, 38.5),
(10, '185/65 R15 EC300+', 'BAN', 0, 938900, 25000, 0, 38.5),
(11, '205/65 R16 EC300+', 'BAN', 0, 1140500, 25000, 0, 38.5),
(12, '175/65 R14 EC300', 'BAN', 0, 785100, 25000, 0, 38.5),
(13, '215/65 R16 EC300+', 'BAN', 0, 1175100, 25000, 0, 38.5),
(14, '195/65 R15 EC300+', 'BAN', 0, 968200, 25000, 0, 38.5),
(15, '205/65 R15 EC300+', 'BAN', 0, 1092700, 25000, 0, 38.5),
(16, '185/70 R14 EC300+', 'BAN', 0, 859300, 25000, 0, 38.5),
(17, '165/80 R13 SP TOURING', 'BAN', 0, 646100, 30000, 0, 38.5),
(18, '185/80 R14 SP TOURING', 'BAN', 0, 751400, 30000, 0, 38.5),
(19, '175/70 R12 SP TOURING', 'BAN', 0, 604800, 30000, 0, 38.5),
(20, '175/70 R13 SP TOURING', 'BAN', 0, 642300, 30000, 0, 38.5),
(21, '185/70 R13 SP TOURING', 'BAN', 0, 704400, 30000, 0, 38.5),
(22, '185/70 R14 SP TOURING', 'BAN', 0, 756300, 30000, 0, 38.5),
(23, '195/70 R14 SP TOURING', 'BAN', 0, 788200, 30000, 0, 38.5),
(24, '165/65 R13 SP TOURING', 'BAN', 0, 666000, 30000, 0, 38.5),
(25, '165/65 R14 SP TOURING', 'BAN', 0, 651400, 30000, 0, 38.5),
(26, '175/65 R14 SP TOURING', 'BAN', 0, 719900, 30000, 0, 38.5),
(27, '175/65 R15 SP TOURING', 'BAN', 0, 712100, 30000, 0, 38.5),
(28, '185/65 R14 SP TOURING', 'BAN', 0, 733200, 30000, 0, 38.5),
(29, '185/65 R15 SP TOURING', 'BAN', 0, 842400, 20000, 0, 38.5),
(30, '195/65 R14 SP TOURING', 'BAN', 0, 763200, 30000, 0, 38.5),
(31, '195/65 R15 SP TOURING', 'BAN', 0, 871300, 20000, 0, 38.5),
(32, '205/65 R15 SP TOURING', 'BAN', 0, 996600, 30000, 0, 38.5),
(33, '215/65 R15 SP TOURING', 'BAN', 0, 1004400, 30000, 0, 38.5),
(34, '175/60 R15 SP TOURING', 'BAN', 0, 805600, 30000, 0, 38.5),
(35, '185/60 R14 SP TOURING', 'BAN', 0, 790500, 30000, 0, 38.5),
(36, '185/60 R15 SP TOURING', 'BAN', 0, 919000, 30000, 0, 38.5),
(37, '185/60 R16 SP TOURING', 'BAN', 0, 826500, 30000, 0, 38.5),
(38, '195/60 R15 SP TOURING', 'BAN', 0, 815300, 30000, 0, 38.5),
(39, '205/60 R15 SP TOURING', 'BAN', 0, 872100, 30000, 0, 38.5),
(40, '205/60 R16 SP TOURING', 'BAN', 0, 965800, 30000, 0, 38.5),
(41, '185/70 R14 LM705', 'BAN', 0, 1016700, 30000, 0, 40),
(42, '195/70 R14 LM705', 'BAN', 0, 1061900, 30000, 0, 40),
(43, '205/70 R14 LM705', 'BAN', 0, 1081600, 30000, 0, 40),
(44, '205/70 R15 LM705', 'BAN', 0, 1118000, 30000, 0, 40),
(45, '215/70 R15 LM705', 'BAN', 0, 1183900, 30000, 0, 40),
(46, '185/65 R15 LM705', 'BAN', 0, 1121300, 30000, 0, 40),
(47, '195/65 R15 LM705', 'BAN', 0, 1144400, 30000, 0, 40),
(48, '205/65 R15 LM705', 'BAN', 0, 1313700, 30000, 0, 40),
(49, '205/65 R16 LM705', 'BAN', 0, 1389100, 30000, 0, 40),
(50, '215/65 R16 LM705', 'BAN', 0, 1395800, 30000, 0, 40),
(51, '185/60 R15 LM705', 'BAN', 0, 1251800, 30000, 0, 40),
(52, '195/60 R15 LM705', 'BAN', 0, 1279000, 80000, 0, 40),
(53, '195/60 R16 LM705', 'BAN', 0, 1448200, 30000, 0, 40),
(54, '205/60 R16 LM705', 'BAN', 0, 1505700, 30000, 0, 40),
(55, '215/60 R16 LM705', 'BAN', 0, 1462500, 30000, 0, 40),
(56, '215/60 R17 LM705', 'BAN', 0, 1522400, 30000, 0, 40),
(57, '225/60 R18 LM705', 'BAN', 0, 1614100, 30000, 0, 40),
(58, '185/55 R15 LM705', 'BAN', 0, 1092100, 50000, 0, 40),
(59, '185/55 R16 LM705', 'BAN', 0, 1146700, 30000, 0, 40),
(60, '195/55 R15 LM705', 'BAN', 0, 1311500, 30000, 0, 40),
(61, '195/55 R16 LM705', 'BAN', 0, 1376400, 30000, 0, 40),
(62, '205/55 R16 LM705', 'BAN', 0, 1413500, 30000, 0, 40),
(63, '215/55 R17 LM705', 'BAN', 0, 1477200, 30000, 0, 40),
(64, '225/55 R17 LM705', 'BAN', 0, 1599600, 30000, 0, 40),
(65, '235/55 R18 LM705', 'BAN', 0, 1683600, 30000, 0, 40),
(66, '195/50 R16 LM705', 'BAN', 0, 1222500, 30000, 0, 40),
(67, '215/50 R17 LM705', 'BAN', 0, 1521100, 30000, 0, 40),
(68, '225/50 R17 LM705', 'BAN', 0, 1596200, 30000, 0, 40),
(69, '235/50 R18 LM705', 'BAN', 0, 1666600, 30000, 0, 40),
(70, '195/45 R16 LM705', 'BAN', 0, 1054100, 30000, 0, 40),
(71, '205/45 R17 LM705', 'BAN', 0, 1226600, 30000, 0, 40),
(72, '215/45 R17 LM705', 'BAN', 0, 1346300, 30000, 0, 40),
(73, '205/55 R16 DIREZZA', 'BAN', 0, 1382300, 0, 685000, 0),
(74, '195/50 R16 DIREZZA', 'BAN', 0, 1199200, 0, 640000, 0),
(75, '215/50 R17 DIREZZA', 'BAN', 0, 1454200, 0, 775000, 0),
(76, '205/45 R17 DIREZZA', 'BAN', 0, 1204400, 0, 630000, 0),
(77, '215/45 R17 DIREZZA', 'BAN', 0, 1200000, 0, 630000, 0),
(78, '225/45 R18 DIREZZA', 'BAN', 0, 1550400, 0, 820000, 0),
(79, '225/40 R18 DIREZZA', 'BAN', 0, 1396800, 0, 735000, 0),
(80, '235/40 R18 DIREZZA', 'BAN', 0, 1581400, 0, 840000, 0),
(81, '215/35 R18 DIREZZA', 'BAN', 0, 1586300, 0, 0, 38.5),
(82, '185/70 R14 SP10', 'BAN', 0, 905300, 0, 432000, 0),
(83, '185/65 R15 SP10', 'BAN', 0, 956600, 0, 530000, 0),
(84, '155S R12 SP10', 'BAN', 0, 548300, 0, 310000, 0),
(85, '215/55 R17 SPORTMAXX050', 'BAN', 0, 1784200, 0, 0, 38.5),
(86, '225/60 R18 SPORTMAXX050', 'BAN', 0, 1785400, 0, 0, 38.5),
(87, '235/60 R18 SPORTMAXX050', 'BAN', 0, 1837900, 0, 0, 38.5),
(88, '175/65 R15 SP31', 'BAN', 0, 1083500, 0, 0, 38.5),
(89, '195/65 R15 SP31', 'BAN', 0, 1340600, 0, 0, 38.5),
(90, '175/60 R15 SP31', 'BAN', 0, 938300, 0, 0, 38.5),
(91, '165 R13 LT5', 'BAN', 0, 758500, 0, 412000, 0),
(92, '175 R13 LT5', 'BAN', 0, 914800, 0, 496000, 0),
(93, '185 R14 LT5', 'BAN', 0, 1059200, 0, 610000, 0),
(94, '195 R14 LT5', 'BAN', 0, 1180400, 0, 0, 38.5),
(95, '195 R15 LT5', 'BAN', 0, 1215900, 0, 0, 38.5),
(96, '185/65 R15 SP300', 'BAN', 0, 962500, 60000, 0, 38.5),
(97, '205/65 R15 D80V4', 'BAN', 0, 1121800, 0, 600000, 0),
(98, '215/65 R16 ST20', 'BAN', 0, 1286300, 20000, 0, 38.5),
(99, '235/60 R16 ST20', 'BAN', 0, 1602400, 0, 0, 38.5),
(100, '225/65 R17 ST30', 'BAN', 0, 1325700, 0, 0, 38.5),
(101, '225/60 R18 ST30', 'BAN', 0, 1803000, 0, 0, 38.5),
(102, '225/55 R19 ST30', 'BAN', 0, 2917500, 0, 0, 38.5),
(103, '195/80 R15 TG29', 'BAN', 0, 1077200, 0, 0, 38.5),
(104, '205/70 R15 TG20', 'BAN', 0, 1123500, 0, 0, 38.5),
(105, '235/70 R15 TG30', 'BAN', 0, 1257900, 0, 0, 38.5),
(106, '235/75 R15 TG20', 'BAN', 0, 1211000, 0, 0, 38.5),
(107, '30X9.50 R15 AT1', 'BAN', 0, 1830500, 0, 1050000, 0),
(108, '31X10.5 R15 AT1', 'BAN', 0, 2013400, 0, 1155000, 0),
(109, '27X8.5 R14 MT2', 'BAN', 0, 1311300, 100000, 0, 38.5),
(110, '30X9.5 R15 MT2', 'BAN', 0, 1820000, 60000, 0, 38.5),
(111, '31X10.5 R15 MT2', 'BAN', 0, 1876300, 60000, 0, 38.5),
(112, '265/75 R16 MT2', 'BAN', 0, 2249700, 0, 1235000, 0),
(113, '235/75 R15 MT2', 'BAN', 0, 1606900, 100000, 0, 38.5),
(114, '265/65 R17 MT2', 'BAN', 0, 2045500, 50000, 0, 38.5),
(115, '700-16 DR2', 'BAN', 0, 1716900, 0, 965000, 0),
(116, '750-16 DR2', 'BAN', 0, 2323600, 0, 1255000, 0),
(117, '825-16 DR2', 'BAN', 0, 2208000, 0, 0, 38.5),
(118, '750-16 TKM', 'BAN', 0, 2235700, 0, 1255000, 0),
(119, '265/70 R16 AT20', 'BAN', 0, 1888200, 50000, 0, 38.5),
(120, '225/70 R16 AT20', 'BAN', 0, 1552100, 0, 0, 38.5),
(121, '255/70 R16 AT20', 'BAN', 0, 1851200, 0, 0, 38.5),
(122, '265/65 R17 AT20', 'BAN', 0, 1982700, 60000, 0, 38.5),
(123, '265/65 R17 AT25', 'BAN', 0, 2133500, 50000, 0, 38.5),
(124, '265/60 R18 AT25', 'BAN', 0, 2448700, 50000, 0, 38.5),
(125, '640-13 SWALLOW', 'BAN', 0, 583200, 0, 583200, 0),
(126, '750-15 SWALLOW', 'BAN', 0, 1107000, 0, 1107000, 0),
(127, '550-13 GT', 'BAN', 0, 432175, 0, 432175, 0),
(128, '500-12 GT', 'BAN', 0, 320997, 0, 320997, 0),
(129, '700-14 GT', 'BAN', 0, 603454, 0, 603455, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbhistory`
--

CREATE TABLE `tbhistory` (
  `no_faktur` varchar(50) NOT NULL,
  `no_jual` int(5) DEFAULT NULL,
  `customer` varchar(50) DEFAULT NULL,
  `no_kendaraan` varchar(11) DEFAULT NULL,
  `pembayaran` enum('transfer','edc','bca','cash') NOT NULL,
  `grandtotal` int(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbhistory`
--

INSERT INTO `tbhistory` (`no_faktur`, `no_jual`, `customer`, `no_kendaraan`, `pembayaran`, `grandtotal`, `tanggal`, `created_at`, `updated_at`) VALUES
('SR/02/22/0001', 2, 'Ivan Cristiansen', 'KB 4670 OO', 'bca', 1600625, '2022-02-09', '2022-02-09 11:31:11', '2022-02-09 11:31:11'),
('SR/12/21/0001', 1, 'Ivan', 'KB 1920 WB', 'transfer', 2035000, '2021-12-07', '2021-12-07 14:06:35', '2021-12-07 14:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbhistoryitem`
--

CREATE TABLE `tbhistoryitem` (
  `no_jual` int(5) DEFAULT NULL,
  `kode_barang` int(5) NOT NULL,
  `item` varchar(50) DEFAULT NULL,
  `satuan` varchar(6) NOT NULL,
  `harga` int(8) DEFAULT NULL,
  `jumlah_item` int(3) DEFAULT NULL,
  `total` int(9) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbhistoryitem`
--

INSERT INTO `tbhistoryitem` (`no_jual`, `kode_barang`, `item`, `satuan`, `harga`, `jumlah_item`, `total`, `tanggal`) VALUES
(1, 0, 'pelat', 'BAN', 35000, 1, 35000, '2021-12-07'),
(1, 1, '195/50 R16 EC300+', 'BAN', 1000000, 2, 2000000, '2021-12-07'),
(2, 1, '195/50 R16 EC300+', 'BAN', 800000, 2, 1600000, '2022-02-09'),
(2, 0, 'pelat', 'BAN', 25000, 1, 25000, '2022-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenjualan`
--

CREATE TABLE `tbpenjualan` (
  `id` int(2) NOT NULL,
  `no_jual` int(5) NOT NULL,
  `kode_barang` int(5) DEFAULT NULL,
  `item` varchar(50) NOT NULL,
  `satuan` varchar(6) NOT NULL,
  `harga` int(8) NOT NULL,
  `jumlah_item` int(3) NOT NULL,
  `total` int(9) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tableitem`
--
ALTER TABLE `tableitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbhistory`
--
ALTER TABLE `tbhistory`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `tbpenjualan`
--
ALTER TABLE `tbpenjualan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tableitem`
--
ALTER TABLE `tableitem`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `tbpenjualan`
--
ALTER TABLE `tbpenjualan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
