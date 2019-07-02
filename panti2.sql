-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2018 at 01:20 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panti2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `email`) VALUES
(1, 'babe', '420fc26fa13e665e32ca17ea781c645a', 'babe', 'babe@gmail.com'),
(2, 'olip', 'olip', 'olip', 'olip@gmail.com'),
(4, 'popi', 'popi', 'popi', 'popi@gmail.com'),
(5, 'noxi1', 'noxi1', 'noxi', 'noxi@gmail.com'),
(6, 'admin', 'admin', 'admin', 'admin2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(4) NOT NULL,
  `id_kategori` int(4) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(10) DEFAULT NULL,
  `berat` float DEFAULT NULL,
  `stok` int(2) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `harga`, `berat`, `stok`, `deskripsi`, `gambar`) VALUES
(17, 3, 'Bunga Acrilik Kecil ', 25000, 1, 2, 'Bunga Acrilik kecil warna merah putih', '@20000 (7)-compressed.jpg'),
(18, 1, 'Boneka wisuda biru', 40000, 1, 100, 'Boneka wisuda cewek warna biru', 'WIS CEW BIRU 40000 (2)-compressed.jpg'),
(19, 1, 'Boneka wisuda merah', 40000, 1, 7, 'boneka wisuda cewek kerudung merah', 'WIS CEW MERAH 40000-compressed.jpg'),
(20, 1, 'Boneka wisuda ungu pink', 40000, 1, 100, 'boneka wisuda cewek kerudung ungu pink ', 'WIS CEW UNGU PINK 40000-compressed.jpg'),
(21, 3, 'Bunga Acrilik Anggrek', 25000, 1, 12, 'Bunga acrilik angrek 2 tangkai warna putih dan kuning', 'ACRILIK ANGGREK 25000-compressed.jpg'),
(22, 7, 'Boneka adat kaca Riau', 100000, 1, 10, 'Boneka adat kaca Riau kaca, (p x l x t) 12,5 x 6,6 x 14 cm ', 'RIAU 100000-compressed.jpg'),
(23, 7, 'Boneka adata kaca Sulawesi Utara', 100000, 1, 10, 'Boneka adat kaca Sulawesi Utara , ukuran (p x l x t ) 17,5 x 15x 26 ', 'SUL UT 100000-compressed.jpg'),
(24, 7, 'Boneka adata mika Jawa Timur', 30000, 1, 12, 'Boneka adat mika Jawa Timur', 'jatim 25000-compressed.jpg'),
(25, 5, 'Batik Waran Alam ', 225000, 1, 0, 'Batik Warna alam dengan motif bunga', 'WARNA ALAM 250 (2)-compressed.jpg'),
(26, 5, 'Batik Khas Bantul', 155000, 1, 11, 'Batik khas Bantul', 'KHAS BANTUL 155000-compressed.jpg'),
(27, 5, 'Batik cap', 135000, 1, 20, 'batik cap', '135000 (16)-compressed.jpg'),
(28, 5, 'Batik cap merah', 95000, 1, 17, 'batik cap', '45000-compressed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `det_order`
--

CREATE TABLE `det_order` (
  `id_order` int(4) NOT NULL,
  `id_barang` int(4) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_order`
--

INSERT INTO `det_order` (`id_order`, `id_barang`, `jumlah`, `harga`) VALUES
(34, 18, 3, 40000),
(35, 24, 3, 30000),
(36, 24, 3, 30000),
(37, 26, 4, 155000),
(38, 19, 90, 40000),
(39, 19, 3, 40000),
(39, 25, 15, 225000),
(40, 28, 3, 95000),
(41, 24, 3, 30000),
(41, 26, 5, 155000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(4) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Boneka Wisuda'),
(2, 'Sandal'),
(3, 'Bunga Acrilik'),
(4, 'Kipas Tangan'),
(5, 'Batik'),
(6, 'Slipper'),
(7, 'Boneka Adat');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(4) NOT NULL,
  `id_order` int(4) NOT NULL,
  `total_kirim` int(11) NOT NULL,
  `no_rekening` varchar(40) NOT NULL,
  `atas_nama` varchar(40) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_order`, `total_kirim`, `no_rekening`, `atas_nama`, `tanggal_transfer`, `gambar`) VALUES
(1, 39, 3765000, '091919920001', 'hui', '2018-07-05', '1.jpg'),
(2, 34, 60000, '091919920001', 'munna', '2018-07-05', 'fitri.jpg'),
(3, 41, 945000, '091919920001', 'hui', '2018-07-05', 'my ice.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(4) NOT NULL,
  `kota` char(100) NOT NULL,
  `biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `kota`, `biaya`) VALUES
(3, 'kebumen', 15000),
(4, 'Purworejo', 14000),
(5, 'Jakarta Barat', 28000),
(6, 'Sleman', 10000),
(7, 'Semarang', 25000),
(8, 'SoloBalapan', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(4) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text,
  `email` varchar(30) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama`, `alamat`, `email`, `no_hp`) VALUES
(1, 'muna', 'muna@cost', 'munawwww', 'slemann yk', 'munnacimmuu@gmail.com', '091828829182'),
(3, 'cost', '4e1566f0798fb3d', 'cost', 'condongcatur ', 'cost@123.com', '0822776895'),
(4, 'mona', 'mona', 'mona', 'condongcatur', 'mona@mh.com', '0989872667'),
(5, 'meena', 'meena', 'meena', 'sleman', 'meena@email.com', '09882736723'),
(8, 'olip', 'olip1', 'olip', 'kebumen', 'olip@gmail.com', '0892736452'),
(9, 'nisa', 'nisa', 'nisa', 'jogja', 'nisa@gmail.bom', '09878987667'),
(10, 'munna', 'munna1', 'munna', 'jl ringin raya 14', 'munna01@gmail.com', '0822299918'),
(31, 'almo', 'almo', 'almo', 'city', 'almo@gmail.com', '9899000089'),
(32, 'oppa', 'ba666bf2f8ea0819fc8cb6bff6c1fb', 'oppa', 'kaliurang', 'oppa@gmail.com', '019182882822'),
(33, 'hui', 'huo', 'hui', 'jateng', 'hui@gmail.com', '089765432123'),
(34, 'poki', '', 'poki', '222', 'poki@gmail.com', 'wwwww');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(4) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `id_konfirmasi` int(4) NOT NULL,
  `status_pengiriman` enum('Dikirim','Diterima') NOT NULL,
  `no_resi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(4) NOT NULL,
  `tgl_order` date NOT NULL,
  `id_ongkir` int(4) DEFAULT NULL,
  `id_pelanggan` int(4) NOT NULL,
  `alamat_penerima` varchar(100) NOT NULL,
  `nama_penerima` varchar(25) NOT NULL,
  `telepon_penerima` varchar(14) NOT NULL,
  `status_order` enum('Pesan','Dikonfirmasi','Proses Pengiriman') NOT NULL,
  `berat` int(11) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `tgl_order`, `id_ongkir`, `id_pelanggan`, `alamat_penerima`, `nama_penerima`, `telepon_penerima`, `status_order`, `berat`, `total`) VALUES
(34, '2018-07-05', 3, 10, 'kebumen 01', 'almo', '33333333333', 'Dikonfirmasi', 3, 165000),
(35, '2018-07-06', 3, 10, 'kebumen 01', 'munaaaa', '02020202002', 'Pesan', 3, 135000),
(36, '2018-07-06', 3, 10, 'sleman', 'almo', '089192882892', 'Pesan', 3, 135000),
(37, '2018-07-06', 3, 10, 'semarang pati', 'munaaaa', '33333333333', 'Pesan', 4, 680000),
(38, '2018-07-06', 3, 10, 'kebumen 01', 'hui', '02020202002', 'Pesan', 90, 4950000),
(39, '2018-07-06', 3, 10, 'sleman', 'almo', '99393939399', 'Dikonfirmasi', 18, 3765000),
(40, '2018-07-06', 6, 10, 'kebumen 01', 'sss', '99393939399', 'Pesan', 3, 315000),
(41, '2018-07-06', 6, 10, 'sleman', 'almo', '33333333333', 'Dikonfirmasi', 8, 945000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk_kategori` (`id_kategori`);

--
-- Indexes for table `det_order`
--
ALTER TABLE `det_order`
  ADD UNIQUE KEY `FOREIGN KEY` (`id_order`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD UNIQUE KEY `id_order` (`id_order`);

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
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD UNIQUE KEY `id_konfirmasi` (`id_konfirmasi`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_pelanggan2` (`id_pelanggan`),
  ADD KEY `fk_ongkir` (`id_ongkir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `det_order`
--
ALTER TABLE `det_order`
  ADD CONSTRAINT `FK_detailbrg` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `det_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tb_order` (`id_order`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `konfirmasi_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tb_order` (`id_order`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `FK_pengiriman` FOREIGN KEY (`id_konfirmasi`) REFERENCES `konfirmasi` (`id_konfirmasi`);

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `fk_ongkir` FOREIGN KEY (`id_ongkir`) REFERENCES `ongkir` (`id_ongkir`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pelanggan2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
