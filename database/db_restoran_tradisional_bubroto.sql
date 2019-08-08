-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2019 at 06:49 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restoran_tradisional_bubroto`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_bau`
--

CREATE TABLE `bahan_bau` (
  `kode_bahan_baku` varchar(5) NOT NULL,
  `nama_bahan_baku` varchar(6) DEFAULT NULL,
  `stok` int(3) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `belanja`
--

CREATE TABLE `belanja` (
  `id_belanja` varchar(5) NOT NULL,
  `nip` varchar(8) DEFAULT NULL,
  `total_harga` int(10) DEFAULT NULL,
  `tgl_belanjaan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_belanja`
--

CREATE TABLE `detail_belanja` (
  `id_belanja` varchar(5) DEFAULT NULL,
  `kode_bahan_baku` varchar(5) DEFAULT NULL,
  `qty` varchar(8) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `tgl_kadaluarsa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `kode_menu` varchar(5) DEFAULT NULL,
  `no_pesanan` varchar(4) DEFAULT NULL,
  `Qty` int(3) DEFAULT NULL,
  `status_detail_pesanan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id_kuisioner` varchar(5) NOT NULL,
  `nip` varchar(5) DEFAULT NULL,
  `topik_kuisioner` varchar(10) DEFAULT NULL,
  `aktif` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `no_meja` varchar(2) NOT NULL,
  `kapasitas` varchar(3) DEFAULT NULL,
  `status_meja` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `kode_menu` varchar(5) NOT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(8) NOT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(5) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(5) NOT NULL,
  `no_pesanan` varchar(6) DEFAULT NULL,
  `nip` varchar(15) DEFAULT NULL,
  `tanggal_pemmbayaran` date DEFAULT NULL,
  `subtotal` int(10) DEFAULT NULL,
  `status_pembayaran` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` varchar(5) NOT NULL,
  `id_kuisioner` varchar(5) DEFAULT NULL,
  `pertanyaan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `no_pesanan` varchar(5) NOT NULL,
  `nip` varchar(8) DEFAULT NULL,
  `id_pelanggan` varchar(20) DEFAULT NULL,
  `no_meja` varchar(2) DEFAULT NULL,
  `status_pesanan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pilih_pertanyaan`
--

CREATE TABLE `pilih_pertanyaan` (
  `id_pilih_pertanyaan` varchar(5) NOT NULL,
  `id_pertanyaan` varchar(5) DEFAULT NULL,
  `pilihan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `kode_menu` varchar(5) DEFAULT NULL,
  `kode_bahan_baku` varchar(5) DEFAULT NULL,
  `jumlah_bahan` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respon`
--

CREATE TABLE `respon` (
  `id_respon` varchar(5) NOT NULL,
  `id_prtanyaan` varchar(5) DEFAULT NULL,
  `id_pembayaran` varchar(5) DEFAULT NULL,
  `jawaban` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_bau`
--
ALTER TABLE `bahan_bau`
  ADD PRIMARY KEY (`kode_bahan_baku`);

--
-- Indexes for table `belanja`
--
ALTER TABLE `belanja`
  ADD PRIMARY KEY (`id_belanja`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD KEY `kode_bahan_baku` (`kode_bahan_baku`),
  ADD KEY `id_belanja` (`id_belanja`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD KEY `no_pesanan` (`no_pesanan`),
  ADD KEY `kode_menu` (`kode_menu`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`kode_menu`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `no_pesanan` (`no_pesanan`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `id_kuisioner` (`id_kuisioner`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`no_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `no_meja` (`no_meja`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `pilih_pertanyaan`
--
ALTER TABLE `pilih_pertanyaan`
  ADD PRIMARY KEY (`id_pilih_pertanyaan`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD KEY `kode_menu` (`kode_menu`),
  ADD KEY `kode_bahan_baku` (`kode_bahan_baku`);

--
-- Indexes for table `respon`
--
ALTER TABLE `respon`
  ADD PRIMARY KEY (`id_respon`),
  ADD KEY `id_prtanyaan` (`id_prtanyaan`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belanja`
--
ALTER TABLE `belanja`
  ADD CONSTRAINT `belanja_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD CONSTRAINT `detail_belanja_ibfk_1` FOREIGN KEY (`kode_bahan_baku`) REFERENCES `bahan_bau` (`kode_bahan_baku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_belanja_ibfk_2` FOREIGN KEY (`id_belanja`) REFERENCES `belanja` (`id_belanja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`no_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`kode_menu`) REFERENCES `menu` (`kode_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD CONSTRAINT `kuisioner_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`no_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`id_kuisioner`) REFERENCES `kuisioner` (`id_kuisioner`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`no_meja`) REFERENCES `meja` (`no_meja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pilih_pertanyaan`
--
ALTER TABLE `pilih_pertanyaan`
  ADD CONSTRAINT `pilih_pertanyaan_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`kode_menu`) REFERENCES `menu` (`kode_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`kode_bahan_baku`) REFERENCES `bahan_bau` (`kode_bahan_baku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `respon`
--
ALTER TABLE `respon`
  ADD CONSTRAINT `respon_ibfk_1` FOREIGN KEY (`id_prtanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respon_ibfk_2` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
