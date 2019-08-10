-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 10, 2019 at 01:07 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.7

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
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bahan_baku` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(3) DEFAULT NULL,
  `satuan` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan_baku`, `nama_bahan_baku`, `stok`, `satuan`) VALUES
('bbk0001', 'Beras', NULL, 'kilogram'),
('bbk0002', 'Bawang Merah', NULL, 'kilogram'),
('bbk0003', 'Bawang Putih', NULL, 'kilogram'),
('bbk0004', 'Merica', NULL, 'kilogram'),
('bbk0005', 'Cabai', NULL, 'kilogram'),
('bbk0006', 'Kecap', NULL, 'botol'),
('bbk0007', 'Kelapa', 23, 'buah'),
('bbk0008', 'Susu Kental', NULL, 'kaleng'),
('bbk0009', 'jeruk', NULL, 'kintal'),
('bbk0010', 'Gula Merah', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `belanja`
--

CREATE TABLE `belanja` (
  `id_belanja` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_belanja` date NOT NULL,
  `total_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `belanja`
--

INSERT INTO `belanja` (`id_belanja`, `nip`, `tgl_belanja`, `total_harga`) VALUES
('blj0001', 'pgw0003', '2018-09-10', 345000),
('blj0002', 'pgw0003', '2018-09-11', 100000),
('blj0003', 'master', '2018-08-09', 0),
('blj0004', 'master', '2019-08-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_belanja`
--

CREATE TABLE `detail_belanja` (
  `id_belanja` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bahan_baku` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `satuan` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_kadaluarsa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_belanja`
--

INSERT INTO `detail_belanja` (`id_belanja`, `id_bahan_baku`, `harga`, `qty`, `satuan`, `tgl_kadaluarsa`) VALUES
('blj0001', 'bbk0001', 100000, 20, 'kilogram', '2019-09-10'),
('blj0001', 'bbk0002', 50000, 10, 'kilogram', '2018-12-10'),
('blj0001', 'bbk0003', 40000, 10, 'kilogram', '2018-12-10'),
('blj0001', 'bbk0004', 20000, 1, 'kilogram', '2019-10-10'),
('blj0001', 'bbk0005', 100000, 5, 'kilogram', '2018-11-10'),
('blj0001', 'bbk0006', 35000, 1, 'botol', '2020-09-10'),
('blj0002', 'bbk0007', 40000, 10, 'buah', '2019-01-11'),
('blj0002', 'bbk0008', 60000, 5, 'kaleng', '2020-09-11'),
('blj0003', 'bbk0004', 400000, 12, 'kilogram', '2019-08-31'),
('blj0003', 'bbk0010', 150000, 3, 'kilogram', '2019-09-27'),
('blj0004', 'bbk0006', 100000, 12, 'botol', '2019-08-27'),
('blj0004', 'bbk0007', 120000, 20, 'buah', '2019-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `no_pesanan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_menu` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(3) NOT NULL,
  `status_detail_pesanan` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`no_pesanan`, `id_menu`, `qty`, `status_detail_pesanan`) VALUES
('psn0001', 'mnu0001', 1, NULL),
('psn0001', 'mnu0002', 2, NULL),
('psn0001', 'mnu0003', 4, NULL),
('psn0002', 'mnu0001', 2, NULL),
('psn0002', 'mnu0004', 3, NULL),
('psn0002', 'mnu0005', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_kritik_saran` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pembayaran` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kritik` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saran` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id_kuisioner` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topik_kuisioner` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `no_meja` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_meja` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`no_meja`, `kapasitas`, `status_meja`) VALUES
('A1', '1', 'terisi'),
('A2', '1', 'kosong'),
('A3', '1', 'kosong'),
('A4', '1', 'kosong'),
('A5', '1', 'kosong'),
('B1', '2', 'kosong'),
('B2', '2', 'terisi'),
('B3', '2', 'terisi'),
('B4', '2', 'kosong'),
('B5', '2', 'kosong'),
('C1', '3', 'kosong'),
('C2', '3', 'kosong'),
('C3', '3', 'kosong'),
('C4', '3', 'kosong'),
('C5', '3', 'kosong'),
('D1', '4', 'kosong'),
('D2', '4', 'kosong'),
('D3', '4', 'kosong'),
('D4', '4', 'kosong'),
('D5', '4', 'kosong'),
('E1', '5', 'kosong'),
('E2', '5', 'kosong'),
('E3', '5', 'kosong'),
('E4', '5', 'kosong'),
('E5', '5', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_menu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(10) DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `kategori`, `nama_menu`, `harga`, `status`) VALUES
('mnu0001', 'makanan berat', 'Nasi Goreng', 20000, ''),
('mnu0002', 'minuman', 'Es Kelapa Muda', 6000, ''),
('mnu0003', 'makanan ringan', 'gethuk', 25000, NULL),
('mnu0004', 'minuman', 'Es Cendol', 5000, NULL),
('mnu0005', 'minuman', 'es jeruk', 4000, NULL),
('mnu0006', 'minuman', 'Kopi Luwak', 20000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pegawai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `password`, `nama_pegawai`, `jabatan`, `jenis_kelamin`) VALUES
('master', '4f26aeafdb2367620a393c973eddbe8f8b846ebd', 'Master Limbad', 'master', 'L'),
('pgw0001', '5fb98f4a51299638f2a971169ac9e90e4c4526bb', 'Yusrizal Falahan', 'pemilik', 'L'),
('pgw0002', '707fb7d2aac6a040c4e13ca3caff4a2ba9c0308d', 'Alif Hermawan', 'koki', 'L'),
('pgw0003', 'af1c86e9ac34c1e0e1b106e4003ce480e1a2ca05', 'Alwi Yahya Muljabar', 'pantry', 'L'),
('pgw0004', 'f4fe1d827308e4e52d4d49e62f33d7d08ffb4a75', 'Teguh Siswanto', 'pelayan', 'L'),
('pgw0005', '8691e4fc53b99da544ce86e22acba62d13352eff', 'Paulo AL Kasir', 'kasir', 'L'),
('pgw0006', 'fbd1e78ab8b26134e62c10c077fcb2f54e428996', 'Kosumantri', 'cs', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pesanan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pembayaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` int(10) NOT NULL,
  `status_pembayaran` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kuisioner` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertanyaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `no_pesanan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_meja` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pelanggan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pesanan` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`no_pesanan`, `nip`, `no_meja`, `nama_pelanggan`, `status_pesanan`) VALUES
('psn0001', 'master', 'A1', 'alwi ganteng 1', NULL),
('psn0002', 'master', 'B2', 'wahid', NULL),
('psn0003', 'master', 'B3', 'okta', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_pertanyaan`
--

CREATE TABLE `pilihan_pertanyaan` (
  `id_pilihan_pertanyaan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pertanyaan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_menu` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bahan_baku` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_bahan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_menu`, `id_bahan_baku`, `jumlah_bahan`) VALUES
('mnu0001', 'bbk0001', 1),
('mnu0001', 'bbk0002', 5),
('mnu0001', 'bbk0003', 3),
('mnu0001', 'bbk0004', 1),
('mnu0001', 'bbk0005', 2),
('mnu0001', 'bbk0006', 1),
('mnu0001', 'bbk0009', 1),
('mnu0002', 'bbk0007', 1),
('mnu0002', 'bbk0008', 1),
('mnu0003', 'bbk0001', 1),
('mnu0003', 'bbk0007', 1),
('mnu0003', 'bbk0008', 1),
('mnu0003', 'bbk0010', 2);

-- --------------------------------------------------------

--
-- Table structure for table `respon`
--

CREATE TABLE `respon` (
  `id_respon` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pembayaran` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pertanyaan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indexes for table `belanja`
--
ALTER TABLE `belanja`
  ADD PRIMARY KEY (`id_belanja`),
  ADD KEY `fk_belanja_nip` (`nip`);

--
-- Indexes for table `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD PRIMARY KEY (`id_belanja`,`id_bahan_baku`),
  ADD KEY `fk_detailbelanja_idbahanbaku` (`id_bahan_baku`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`no_pesanan`,`id_menu`),
  ADD KEY `fk_detailpesanan_idmenu` (`id_menu`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_kritik_saran`),
  ADD KEY `fk_kritiksaran_idpembayaran` (`id_pembayaran`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`),
  ADD KEY `fk_kuisioner_nip` (`nip`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_pembayaran_nopesanan` (`no_pesanan`),
  ADD KEY `fk_pembayaran_nip` (`nip`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `fk_pertanyaan_idkuisioner` (`id_kuisioner`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`no_pesanan`),
  ADD KEY `fk_pesanan_nip` (`nip`),
  ADD KEY `fk_pesanan_nomeja` (`no_meja`);

--
-- Indexes for table `pilihan_pertanyaan`
--
ALTER TABLE `pilihan_pertanyaan`
  ADD PRIMARY KEY (`id_pilihan_pertanyaan`),
  ADD KEY `fk_pilihanpertanyaan_idpertanyaan` (`id_pertanyaan`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_menu`,`id_bahan_baku`),
  ADD KEY `fk_resep_idbahanbaku` (`id_bahan_baku`);

--
-- Indexes for table `respon`
--
ALTER TABLE `respon`
  ADD PRIMARY KEY (`id_respon`),
  ADD KEY `fk_respon_idpembayaran` (`id_pembayaran`),
  ADD KEY `fk_respon_idpertanyaan` (`id_pertanyaan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belanja`
--
ALTER TABLE `belanja`
  ADD CONSTRAINT `fk_belanja_nip` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Constraints for table `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD CONSTRAINT `fk_detailbelanja_belanja` FOREIGN KEY (`id_belanja`) REFERENCES `belanja` (`id_belanja`),
  ADD CONSTRAINT `fk_detailbelanja_idbahanbaku` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`);

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `fk_detailpesanan_idmenu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `fk_detailpesanan_nopesanan` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`no_pesanan`);

--
-- Constraints for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD CONSTRAINT `fk_kritiksaran_idpembayaran` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`);

--
-- Constraints for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD CONSTRAINT `fk_kuisioner_nip` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_nip` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`),
  ADD CONSTRAINT `fk_pembayaran_nopesanan` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`no_pesanan`);

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `fk_pertanyaan_idkuisioner` FOREIGN KEY (`id_kuisioner`) REFERENCES `kuisioner` (`id_kuisioner`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pesanan_nip` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`),
  ADD CONSTRAINT `fk_pesanan_nomeja` FOREIGN KEY (`no_meja`) REFERENCES `meja` (`no_meja`);

--
-- Constraints for table `pilihan_pertanyaan`
--
ALTER TABLE `pilihan_pertanyaan`
  ADD CONSTRAINT `fk_pilihanpertanyaan_idpertanyaan` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`);

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `fk_resep_idbahanbaku` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`),
  ADD CONSTRAINT `fk_resep_idmenu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Constraints for table `respon`
--
ALTER TABLE `respon`
  ADD CONSTRAINT `fk_respon_idpembayaran` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`),
  ADD CONSTRAINT `fk_respon_idpertanyaan` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
