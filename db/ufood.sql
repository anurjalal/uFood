-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 11:03 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ufood`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `almt_customer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp_customer` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_customer` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kota_customer` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp_customer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `almt_customer`, `telp_customer`, `fax_customer`, `kota_customer`, `cp_customer`, `status`) VALUES
(1, 'RUMAH TANGGA UNDIP', 'UNDIP', '', '', 'Semarang', '', '1'),
(2, 'LPPM', 'UNDIP', '', '', 'Semarang', '', '1'),
(3, 'FAKULTAS KEDOKTERAN', 'UNDIP', '', '', 'Semarang', '', '1'),
(4, 'FSM', 'UNDIP', '', '', 'Semarang', '', '1'),
(5, 'FAKULTAS PSIKOLOGI', 'UNDIP', '', '', 'Semarang', '', '1'),
(6, 'FAKULTAS HUKUM', 'UNDIP', '', '', 'Semarang', '', '1'),
(7, 'LP2MP', 'UNDIP', '', '', 'Semarang', '', '1'),
(8, 'BAPSI', 'UNDIP', '', '', 'Semarang', '', '1'),
(9, 'HASNA', '', '', '', 'Semarang', '', '1'),
(10, 'SPI ', 'UNDIP', '', '', 'Semarang', '', '1'),
(11, 'FPP', 'UNDIP', '', '', 'Semarang', '', '1'),
(12, 'ULP', 'UNDIP', '', '', 'Semarang', '', '1'),
(13, 'SA-MWA', 'UNDIP', '', '', 'Semarang', '', '1'),
(14, 'FEB TEMBALANG', 'UNDIP', '', '', 'Semarang', '', '1'),
(15, 'MM FEB ', 'UNDIP', '', '', 'Semarang', '', '1'),
(16, 'FKM', 'UNDIP', '', '', 'Semarang', '', '1'),
(17, 'WR 3', 'UNDIP', '', '', 'Semarang', 'Yolanda', '1'),
(18, 'FPIK', 'UNDIP', '', '', 'Semarang', '', '1'),
(19, 'KESMA DIAN BAK', 'UNDIP', '', '', 'Semarang', '', '1'),
(20, 'SEKERTARIS REKTOR', 'UNDIP', '', '', 'Semarang', '', '1'),
(22, 'BPSU', 'UNDIP', '', '', 'Semarang', '', '1'),
(23, 'UNDIP MAJU', 'UNDIP', '', '', 'Semarang', '', '1'),
(24, 'UMUM', '', '', '', 'Semarang', '', '1'),
(25, 'FAKULTAS TEKNIK', 'UNDIP', '', '', 'Semarang', '', '1'),
(26, 'RU', NULL, NULL, NULL, NULL, NULL, '1'),
(27, 'UFOOD', NULL, NULL, NULL, NULL, NULL, '1'),
(28, 'UNDIP', 'Jl. prof soedarto tembalang', '', '', 'Semarang', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `groupbiaya`
--

CREATE TABLE `groupbiaya` (
  `KD_BEBAN` varchar(20) NOT NULL,
  `NM_BEBAN` varchar(255) NOT NULL,
  `KATEGORI` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupbiaya`
--

INSERT INTO `groupbiaya` (`KD_BEBAN`, `NM_BEBAN`, `KATEGORI`) VALUES
('1', 'Kas', 'Aktiva Lancar'),
('100', 'Hutang Dagang', 'Hutang Lancar'),
('101', 'Hutang Pajak', 'Hutang Lancar'),
('102', 'Hutang Gaji dan Upah', 'Hutang Lancar'),
('103', 'Hutang Biaya', 'Hutang Lancar'),
('104', 'Pendapatan yang diterima di muka', 'Hutang Lancar'),
('105', 'Hutang BBN', 'Hutang Lancar'),
('120', 'Hutang Jangka Panjang - Bank', 'Hutang Jangka Panjang'),
('130', 'Pendapatan Penjualan', 'Modal'),
('140', 'HPP', 'HPP'),
('2', 'Bank', 'Aktiva Lancar'),
('200', 'Biaya Administrasi dan Umum', 'Biaya Administrasi dan Umum'),
('21', 'Tanah', 'Aktiva Tak Berwujud'),
('22', 'Gedung', 'Aktiva Tak Berwujud'),
('23', 'Akumulasi Depresiasi Gedung', 'Aktiva Tak Berwujud'),
('24', 'Mebel', 'Aktiva Tak Berwujud'),
('25', 'Akumulasi Depresiasi Mebel', 'Aktiva Tak Berwujud'),
('250', 'Biaya Promosi', 'Biaya Pemasaran'),
('26', 'Elektronik', 'Aktiva Tak Berwujud'),
('27', 'Akumulasi Depresiasi  Elektronik', 'Aktiva Tak Berwujud'),
('28', 'Aktiva Tetap Lain', 'Aktiva Tak Berwujud'),
('29', 'Akumulasi Depresiasi  Aktiva Tetap Lain', 'Aktiva Tak Berwujud'),
('3', 'Investasi', 'Aktiva Lancar'),
('300', 'Pendapatan Bunga', 'Penghasilan di luar usaha'),
('301', 'Pendapatan Denda', 'Penghasilan di luar usaha'),
('350', 'Biaya Bunga', 'Biaya di luar usaha'),
('351', 'Aktiva Tetap', 'Biaya di luar usaha'),
('4', 'Piutang', 'Aktiva Lancar'),
('400', 'Rugi-Laba', 'Rugi-Laba'),
('5', 'Cadangan kerugian piutang', 'Aktiva Lancar'),
('6', 'Persediaan', 'Aktiva Lancar');

-- --------------------------------------------------------

--
-- Table structure for table `hrgbeli`
--

CREATE TABLE `hrgbeli` (
  `kd_hrgbeli` int(11) NOT NULL,
  `kd_produk` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipe_produk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_awal` datetime NOT NULL,
  `tgl_akhir` datetime NOT NULL,
  `nama_produk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hargabeli` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hrgbeli`
--

INSERT INTO `hrgbeli` (`kd_hrgbeli`, `kd_produk`, `id_supplier`, `nama_supplier`, `tipe_produk`, `tgl_awal`, `tgl_akhir`, `nama_produk`, `hargabeli`) VALUES
(1, 1, 1, 'AYU ATIYOSO', 'Snack', '2018-08-04 00:00:00', '2018-12-31 00:00:00', '', '10000.00');

-- --------------------------------------------------------

--
-- Table structure for table `hrgjual`
--

CREATE TABLE `hrgjual` (
  `kd_hrgjual` int(11) NOT NULL,
  `kd_produk` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipe_produk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_awal` datetime NOT NULL,
  `tgl_akhir` datetime NOT NULL,
  `nama_produk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hargajual` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `no_hutang` int(11) NOT NULL,
  `no_po` int(11) NOT NULL,
  `tgl_po` datetime NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `tgl_jatuh_tempo` datetime NOT NULL,
  `jml_hutang` decimal(20,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl_lunas` datetime NOT NULL,
  `debit` decimal(20,2) NOT NULL,
  `kredit` decimal(20,2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `tgl_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`no_hutang`, `no_po`, `tgl_po`, `id_supplier`, `nama_supplier`, `tgl_jatuh_tempo`, `jml_hutang`, `status`, `tgl_lunas`, `debit`, `kredit`, `username`, `tgl_transaksi`) VALUES
(2, 1, '2018-08-06 00:00:00', 1, 'AYU ATIYOSO', '2018-09-05 00:00:00', '100000.00', 'LUNAS', '0000-00-00 00:00:00', '0.00', '100000.00', 'ariawan', '2018-08-06 16:01:46'),
(3, 1, '2018-08-06 00:00:00', 1, 'AYU ATIYOSO', '0000-00-00 00:00:00', '0.00', 'LUNAS', '0000-00-00 00:00:00', '100000.00', '0.00', 'ariawan', '2018-08-06 16:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `no_kas` int(11) NOT NULL,
  `no_po` int(11) NOT NULL,
  `no_penjualan` int(11) NOT NULL,
  `no_hutang` int(11) NOT NULL,
  `no_piutang` int(11) NOT NULL,
  `kd_beban` varchar(10) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_keluar` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `debit` decimal(20,2) NOT NULL,
  `kredit` decimal(20,2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `tgl_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`no_kas`, `no_po`, `no_penjualan`, `no_hutang`, `no_piutang`, `kd_beban`, `tgl_masuk`, `tgl_keluar`, `keterangan`, `debit`, `kredit`, `username`, `tgl_transaksi`) VALUES
(1, 1, 1, 0, 0, '1', '2018-08-06 15:54:04', '0000-00-00 00:00:00', 'Penjualan Snack sejumlah 100 dari kustomer RUMAH TANGGA UNDIP dengan supplier AYU ATIYOSO', '165000.00', '0.00', 'ariawan', '2018-08-06 15:54:04'),
(2, 0, 0, 3, 0, '1', '0000-00-00 00:00:00', '2018-08-06 00:00:00', 'Pembayaran Hutang ke AYU ATIYOSO dengan No. Pembelian 1', '0.00', '100000.00', 'ariawan', '2018-08-06 16:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `no_po` int(11) NOT NULL,
  `no_penjualan` int(11) NOT NULL,
  `no_invoice` varchar(100) NOT NULL,
  `tgl_invoice` datetime NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `tgl_po` datetime NOT NULL,
  `tgl_jatuh_tempo` datetime NOT NULL,
  `hargabeli` decimal(20,2) NOT NULL,
  `hargabelitotal` decimal(20,2) NOT NULL,
  `statusdibayar` varchar(10) DEFAULT NULL,
  `tgl_dibayar` datetime DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `tgl_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_po`, `no_penjualan`, `no_invoice`, `tgl_invoice`, `id_supplier`, `nama_supplier`, `tgl_po`, `tgl_jatuh_tempo`, `hargabeli`, `hargabelitotal`, `statusdibayar`, `tgl_dibayar`, `username`, `tgl_transaksi`) VALUES
(1, 1, '100', '2018-08-06 00:00:00', 1, 'AYU ATIYOSO', '2018-08-06 00:00:00', '2018-09-05 00:00:00', '1000.00', '100000.00', 'LUNAS', '2018-08-06 00:00:00', 'ariawan', '2018-08-06 15:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_penjualan` int(11) NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `tgl_penjualan` datetime NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargabeli` decimal(20,2) NOT NULL,
  `hargakardus` decimal(10,2) NOT NULL,
  `marginpersen` float NOT NULL,
  `hargajual` decimal(20,2) NOT NULL,
  `hargajualtotal` decimal(20,2) NOT NULL,
  `pajak` float NOT NULL,
  `hrgjualdgnpajak` decimal(20,2) NOT NULL,
  `hargabelitotal` decimal(20,2) NOT NULL,
  `margintotal` decimal(20,2) NOT NULL,
  `statusdibayar` varchar(10) DEFAULT NULL,
  `tgl_dibayar` datetime DEFAULT NULL,
  `tgl_jatuh_tempo` datetime NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `no_po` int(11) NOT NULL,
  `sistem_bayar` varchar(10) NOT NULL,
  `metode_bayar` varchar(10) NOT NULL,
  `tgl_invoice` datetime NOT NULL,
  `username` varchar(20) NOT NULL,
  `tgl_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_penjualan`, `no_invoice`, `tgl_penjualan`, `id_customer`, `nama_customer`, `tgl_kirim`, `tipe`, `jumlah`, `hargabeli`, `hargakardus`, `marginpersen`, `hargajual`, `hargajualtotal`, `pajak`, `hrgjualdgnpajak`, `hargabelitotal`, `margintotal`, `statusdibayar`, `tgl_dibayar`, `tgl_jatuh_tempo`, `keterangan`, `no_po`, `sistem_bayar`, `metode_bayar`, `tgl_invoice`, `username`, `tgl_transaksi`) VALUES
(1, '100', '2018-08-06 00:00:00', 1, 'RUMAH TANGGA UNDIP', '2018-08-10 00:00:00', 'Snack', 100, '1000.00', '100.00', 36.36, '1500.00', '150000.00', 10, '165000.00', '1100.00', '40000.00', NULL, '2018-08-06 15:54:04', '2018-09-05 00:00:00', 'RESOLES 50\r\nMENDOAN 50', 1, 'CASH', '1', '2018-08-06 00:00:00', 'ariawan', '2018-08-06 15:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `no_piutang` int(11) NOT NULL,
  `no_penjualan` int(10) NOT NULL,
  `tgl_penjualan` datetime NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `tgl_jatuh_tempo` datetime NOT NULL,
  `jml_piutang` decimal(20,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl_lunas` datetime NOT NULL,
  `debit` decimal(20,2) NOT NULL,
  `kredit` decimal(20,2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`no_piutang`, `no_penjualan`, `tgl_penjualan`, `id_customer`, `nama_customer`, `tgl_jatuh_tempo`, `jml_piutang`, `status`, `tgl_lunas`, `debit`, `kredit`, `username`, `keterangan`, `tgl_transaksi`) VALUES
(1, 1, '2018-08-06 00:00:00', 1, 'RUMAH TANGGA UNDIP', '0000-00-00 00:00:00', '165000.00', 'LUNAS', '0000-00-00 00:00:00', '165000.00', '0.00', 'ariawan', '', '2018-08-06 15:54:04'),
(2, 1, '2018-08-06 00:00:00', 1, 'RUMAH TANGGA UNDIP', '0000-00-00 00:00:00', '165000.00', 'LUNAS', '0000-00-00 00:00:00', '0.00', '165000.00', 'ariawan', '', '2018-08-06 15:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `subgroupbiaya`
--

CREATE TABLE `subgroupbiaya` (
  `KD_GABUNGAN` varchar(20) NOT NULL,
  `KD_BEBAN` varchar(20) NOT NULL,
  `KD_SUBBEBAN` varchar(20) NOT NULL,
  `NM_SUBBEBAN` varchar(255) NOT NULL,
  `KATEGORI` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subgroupbiaya`
--

INSERT INTO `subgroupbiaya` (`KD_GABUNGAN`, `KD_BEBAN`, `KD_SUBBEBAN`, `NM_SUBBEBAN`, `KATEGORI`) VALUES
('200.1', '200', '1', 'Biaya Gaji', 'Biaya Administrasi dan Umum'),
('200.2', '200', '2', 'Biaya Transport', 'Biaya Administrasi dan Umum'),
('200.3', '200', '3', 'Biaya Stationary', 'Biaya Administrasi dan Umum'),
('200.4', '200', '4', 'Biaya Pulsa', 'Biaya Administrasi dan Umum'),
('200.5', '200', '5', 'Biaya Meterai', 'Biaya Administrasi dan Umum'),
('200.6', '200', '6', 'Biaya Listrik', 'Biaya Administrasi dan Umum'),
('200.7', '200', '7', 'Biaya Telepon', 'Biaya Administrasi dan Umum'),
('200.8', '200', '8', 'Biaya Umum - GA', 'Biaya Administrasi dan Umum'),
('250.1', '250', '1', 'Biaya Iklan', 'Biaya Pemasaran'),
('250.2', '250', '2', 'Biaya Jaket', 'Biaya Pemasaran'),
('250.3', '250', '3', 'Biaya Material Promosi', 'Biaya Pemasaran'),
('250.4', '250', '4', 'Biaya Spanduk', 'Biaya Pemasaran'),
('250.5', '250', '5', 'Biaya Pameran', 'Biaya Pemasaran');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `almt_supplier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp_supplier` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_supplier` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kota_supplier` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp_supplier` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipe_supplier` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `almt_supplier`, `telp_supplier`, `fax_supplier`, `kota_supplier`, `cp_supplier`, `tipe_supplier`, `status`) VALUES
(1, 'AYU ATIYOSO', 'Perum Permata Hijau Tembalang ', '081280992448', '', 'Semarang', '', '', '1'),
(3, 'RM PADANG ERA BARU', '', '085327435460', '', 'Semarang', 'Ibu Hendric', '', '1'),
(4, 'NDOROBEI', '', '085728753251', '', '', 'Bapak Joko', '', '0'),
(5, 'GUDEG BU DUL', 'Jl. Jati Raya Blok. C No. 6. Banyumanik', '081575885838', '024 7471007', 'Semarang', 'Yasin', '', '1'),
(6, 'SELERA SNACK', 'Jl. Ngesrep Timur III No. 33A. Banyumanik', '024 7475358', '', 'Semarang', '', '', '0'),
(7, 'BERKAH CATERING', '', '08174160135', '024 8314423', 'Semarang', 'Mba Ika', '', '0'),
(8, 'BU AGUNG SNACK', '', '085640564271', '', 'Semarang', 'Bu Agung', '', '1'),
(9, 'LISA CATERING', '', '081315619122', '', 'Semarang', 'Bu Rien', '', '1'),
(10, 'ARTO JOYO', '', '085600708652', '', 'Semarang', '', '', '1'),
(11, 'EVAN\'S', 'Jl. Kaligarang Raya 26 ', '0248452137', '', 'Semarang', '0817293031', '', '1'),
(12, 'KUSUMA', 'Ungaran', '08113101094', '', 'Semarang', 'Mas Toro', '', '1'),
(13, 'Chaniago', 'Jl. Jati Raya F.12 Srondol Wetan, Banyumanik', '024 76918880', '', 'Semarang', '087834600598', '', '1'),
(14, 'NITA CATERING', '', '08562717788', '', 'Semarang', 'Bu Giarto', '', '0'),
(15, 'ORTIZ', '', '0816659223', '', 'Semarang', 'Pak Arip', '', '1'),
(16, 'SWISS', '', '082137185274', '', 'Semarang', 'Bu Ninnuk', '', '1'),
(17, 'SAN-QUA', '', '082194910230', '', 'Semarang', 'Pak Bambang', '', '1'),
(18, 'Fancy', '', '024 76917102', '', 'Semarang', 'Bu Olvia', '', '1'),
(19, 'YUMMY', '', '082220422633', '', 'Semarang', 'Bapak Udin', '', '1'),
(20, 'SUPER PENYET', '', '', '', 'Semarang', '', '', '1'),
(21, 'GAMA', '', '', '', 'Semarang', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `KD_USER` int(10) NOT NULL,
  `NM_USER` varchar(20) DEFAULT NULL,
  `LOGIN_NAME` varchar(15) DEFAULT NULL,
  `PWD` varchar(32) DEFAULT NULL,
  `IDGROUP` varchar(20) DEFAULT NULL,
  `USER_STATUS` int(10) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`KD_USER`, `NM_USER`, `LOGIN_NAME`, `PWD`, `IDGROUP`, `USER_STATUS`) VALUES
(1, 'Ariawan Suwanto', 'ariawan', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 1),
(2, 'Yosua Alvin', 'yosua', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 1),
(3, 'Rena', 'rena', 'ëÞççÚÈØÄõû', 'Administrasi', 1),
(4, 'Ali', 'ali', 'Úåâ', 'Supervisor', 1),
(5, 'UNDIPMAJU', 'UFOOD', 'ccfdbba643873ae3872dd6429c04ec53', 'Administrator', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `groupbiaya`
--
ALTER TABLE `groupbiaya`
  ADD PRIMARY KEY (`KD_BEBAN`);

--
-- Indexes for table `hrgbeli`
--
ALTER TABLE `hrgbeli`
  ADD PRIMARY KEY (`kd_hrgbeli`);

--
-- Indexes for table `hrgjual`
--
ALTER TABLE `hrgjual`
  ADD PRIMARY KEY (`kd_hrgjual`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`no_hutang`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`no_kas`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_po`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_penjualan`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`no_piutang`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD UNIQUE KEY `nama_supplier` (`nama_supplier`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`KD_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `hrgbeli`
--
ALTER TABLE `hrgbeli`
  MODIFY `kd_hrgbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hrgjual`
--
ALTER TABLE `hrgjual`
  MODIFY `kd_hrgjual` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `no_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `no_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `no_po` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `no_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `no_piutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
