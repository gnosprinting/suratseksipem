-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2019 at 01:46 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suratseksipem`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_ttd`
--

DROP TABLE IF EXISTS `data_ttd`;
CREATE TABLE IF NOT EXISTS `data_ttd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ttd`
--

INSERT INTO `data_ttd` (`id`, `nama`, `nip`, `jabatan`) VALUES
(1, 'FEFFY RAMADHIATY, SSTP', 'NIP. 19830703 200112 2 001', 'Lurah');

-- --------------------------------------------------------

--
-- Table structure for table `surat_belum_memiliki_rumah`
--

DROP TABLE IF EXISTS `surat_belum_memiliki_rumah`;
CREATE TABLE IF NOT EXISTS `surat_belum_memiliki_rumah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tgl_lhr` varchar(80) NOT NULL,
  `tempat_lhr` varchar(70) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `status` varchar(40) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `rt_rw` varchar(50) NOT NULL,
  `keperluan` text NOT NULL,
  `tgl_surat` date DEFAULT NULL,
  `s_pengantar` varchar(255) DEFAULT NULL,
  `s_ktp` varchar(255) DEFAULT NULL,
  `s_kk` varchar(255) DEFAULT NULL,
  `ktp_saksi1` varchar(255) DEFAULT NULL,
  `ktp_saksi2` varchar(255) DEFAULT NULL,
  `s_pernyataan` varchar(255) DEFAULT NULL,
  `status_surat` varchar(255) DEFAULT NULL,
  `ket_surat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_belum_memiliki_rumah_ibfk_1` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_belum_memiliki_rumah`
--

INSERT INTO `surat_belum_memiliki_rumah` (`id`, `no_surat`, `nama`, `nik`, `tgl_lhr`, `tempat_lhr`, `jk`, `status`, `negara`, `agama`, `pekerjaan`, `alamat`, `rt_rw`, `keperluan`, `tgl_surat`, `s_pengantar`, `s_ktp`, `s_kk`, `ktp_saksi1`, `ktp_saksi2`, `s_pernyataan`, `status_surat`, `ket_surat`) VALUES
(2, '', 'Farida', '123452', '1974-09-24', 'Kandangan', 'Perempuan', 'Menikah', 'Indonesia', 'Islam', 'PEGAWAI NEGERI SIPIL (PNS)', 'Jl.Cahaya', '006/007', 'Persyaratan Pengambilan KPR', '2019-07-24', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'selesai', ''),
(4, '', 'Farida', '123452', '1974-09-24', 'Kandangan', 'Perempuan', 'Menikah', 'Indonesia', 'Islam', 'PEGAWAI NEGERI SIPIL (PNS)', 'Jl.Cahaya', '006/007', 'Persyaratan Pengambilan KPR', '2018-08-20', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'selesai', ''),
(5, '', 'Farida', '123452', '1974-09-24', 'Kandangan', 'Perempuan', 'Menikah', 'Indonesia', 'Islam', 'PEGAWAI NEGERI SIPIL (PNS)', 'Jl.Cahaya', '006/007', 'Persyaratan Pengambilan KPR', '2019-07-10', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'selesai', ''),
(6, '', 'Farida', '123452', '1974-09-24', 'Kandangan', 'Perempuan', 'Menikah', 'Indonesia', 'Islam', 'PEGAWAI NEGERI SIPIL (PNS)', 'Jl.Cahaya', '006/007', 'Persyaratan Pengambilan KPR', '2019-07-10', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'selesai', ''),
(7, '', 'Farida', '123452', '1974-09-24', 'Kandangan', 'Perempuan', 'Menikah', 'Indonesia', 'Islam', 'PEGAWAI NEGERI SIPIL (PNS)', 'Jl.Cahaya', '006/007', 'Persyaratan Pengambilan KPR', '2019-07-30', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'selesai', ''),
(8, '', 'Farida', '123452', '1974-09-24', 'Kandangan', 'Perempuan', 'Menikah', 'Indonesia', 'Islam', 'PEGAWAI NEGERI SIPIL (PNS)', 'Jl.Cahaya', '006/007', 'Persyaratan Pengambilan KPR', '2018-07-01', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'selesai', ''),
(9, '', 'Farida', '123452', '1974-09-24', 'Kandangan', 'Perempuan', 'Menikah', 'Indonesia', 'Islam', 'PEGAWAI NEGERI SIPIL (PNS)', 'Jl.Cahaya', '006/007', 'Persyaratan Pengambilan KPR', '2018-07-10', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'selesai', ''),
(10, '', 'Farida', '123452', '1974-09-24', 'Kandangan', 'Perempuan', 'Menikah', 'Indonesia', 'Islam', 'PEGAWAI NEGERI SIPIL (PNS)', 'Jl.Cahaya', '006/007', 'Persyaratan Pengambilan KPR', '2018-01-20', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'selesai', ''),
(11, '', 'Farida', '123452', '1974-09-24', 'Kandangan', 'Perempuan', 'Menikah', 'Indonesia', 'Islam', 'PEGAWAI NEGERI SIPIL (PNS)', 'Jl.Cahaya', '006/007', 'Persyaratan Pengambilan KPR', '2019-01-24', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'selesai', ''),
(12, '', 'Farida', '123452', '1974-09-24', 'Kandangan', 'Perempuan', 'Menikah', 'Indonesia', 'Islam', 'PEGAWAI NEGERI SIPIL (PNS)', 'Jl.Cahaya', '006/007', 'Persyaratan Pengambilan KPR', '2019-02-24', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'selesai', ''),
(13, '', 'Farida', '123452', '1974-09-24', 'Kandangan', 'Perempuan', 'Menikah', 'Indonesia', 'Islam', 'PEGAWAI NEGERI SIPIL (PNS)', 'Jl.Cahaya', '006/007', 'Persyaratan Pengambilan KPR', '2019-03-24', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'selesai', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_domisili`
--

DROP TABLE IF EXISTS `surat_domisili`;
CREATE TABLE IF NOT EXISTS `surat_domisili` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tgl_lhr` varchar(80) NOT NULL,
  `tempat_lhr` varchar(70) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `status` varchar(40) DEFAULT NULL,
  `agama` varchar(30) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `s_pengantar` varchar(255) DEFAULT NULL,
  `s_ktp` varchar(255) DEFAULT NULL,
  `s_kk` varchar(255) DEFAULT NULL,
  `status_surat` varchar(255) DEFAULT NULL,
  `tgl_surat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ket_surat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_domisili_ibfk_1` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_domisili_usaha`
--

DROP TABLE IF EXISTS `surat_domisili_usaha`;
CREATE TABLE IF NOT EXISTS `surat_domisili_usaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tempat_lhr` varchar(80) NOT NULL,
  `tgl_lhr` varchar(80) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `status` varchar(40) NOT NULL,
  `agama` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `rt_rw` varchar(50) NOT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `bidang_usaha` varchar(255) NOT NULL,
  `alamat_usaha` text NOT NULL,
  `nmr_surat` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tgl_surat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `s_pengantar` varchar(255) DEFAULT NULL,
  `s_ktp` varchar(255) DEFAULT NULL,
  `s_kk` varchar(255) DEFAULT NULL,
  `s_pernyataan` varchar(255) DEFAULT NULL,
  `ktp_saksi1` varchar(255) DEFAULT NULL,
  `ktp_saksi2` varchar(255) DEFAULT NULL,
  `s_pbb` varchar(255) DEFAULT NULL,
  `status_surat` varchar(255) NOT NULL,
  `ket_surat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_domisili_usaha_ibfk_1` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_duda_janda`
--

DROP TABLE IF EXISTS `surat_duda_janda`;
CREATE TABLE IF NOT EXISTS `surat_duda_janda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tgl_lhr` varchar(80) NOT NULL,
  `tempat_lhr` varchar(70) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `status` varchar(40) NOT NULL,
  `negara` varchar(255) NOT NULL,
  `det_status` varchar(20) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `rt_rw` varchar(20) NOT NULL,
  `mantan` varchar(255) NOT NULL,
  `s_pengantar` varchar(255) NOT NULL,
  `s_ktp` varchar(255) NOT NULL,
  `s_kk` varchar(255) NOT NULL,
  `s_kematian` varchar(255) NOT NULL,
  `s_cerai` varchar(255) NOT NULL,
  `s_pbb` varchar(255) NOT NULL,
  `status_surat` varchar(255) NOT NULL,
  `tgl_surat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ket_surat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_duda_janda_ibfk_1` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_ektp`
--

DROP TABLE IF EXISTS `surat_ektp`;
CREATE TABLE IF NOT EXISTS `surat_ektp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `keterangan` varchar(80) NOT NULL,
  `nomor_kk` bigint(40) NOT NULL,
  `s_pengantar` varchar(255) DEFAULT NULL,
  `s_kk` varchar(255) DEFAULT NULL,
  `s_foto` varchar(255) DEFAULT NULL,
  `status_surat` varchar(255) NOT NULL,
  `tgl_surat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ket_surat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_ektp_ibfk_1` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_ijin_keramaian`
--

DROP TABLE IF EXISTS `surat_ijin_keramaian`;
CREATE TABLE IF NOT EXISTS `surat_ijin_keramaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tempat_lhr` varchar(255) NOT NULL,
  `tgl_lhr` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `rt_rw` varchar(255) NOT NULL,
  `acara` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `jam` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `hiburan` varchar(255) NOT NULL,
  `tgl_surat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_surat` varchar(255) DEFAULT NULL,
  `ket_surat` varchar(255) DEFAULT NULL,
  `s_pengantar` varchar(255) DEFAULT NULL,
  `s_ktp` varchar(255) DEFAULT NULL,
  `s_kk` varchar(255) DEFAULT NULL,
  `s_pernyataan` varchar(255) DEFAULT NULL,
  `ktp_saksi1` varchar(255) DEFAULT NULL,
  `ktp_saksi2` varchar(255) DEFAULT NULL,
  `s_pbb` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_ijin_keramaian_ibfk_1` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_kehilangan`
--

DROP TABLE IF EXISTS `surat_kehilangan`;
CREATE TABLE IF NOT EXISTS `surat_kehilangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `tempat_lhr` varchar(50) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `agama` varchar(40) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  `tkp` text NOT NULL,
  `jk` varchar(35) NOT NULL,
  `s_pengantar` varchar(255) DEFAULT NULL,
  `s_ktp` varchar(255) DEFAULT NULL,
  `s_kk` varchar(255) DEFAULT NULL,
  `status_surat` varchar(255) NOT NULL,
  `tgl_surat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ket_surat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_kehilangan_ibfk_1` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_kelahiran`
--

DROP TABLE IF EXISTS `surat_kelahiran`;
CREATE TABLE IF NOT EXISTS `surat_kelahiran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` text NOT NULL,
  `jk` varchar(40) NOT NULL,
  `nama_anak` varchar(75) NOT NULL,
  `nama_ibu` varchar(75) NOT NULL,
  `alamat` text NOT NULL,
  `nama_ayah` varchar(75) NOT NULL,
  `s_kk` varchar(255) DEFAULT NULL,
  `s_ktp_suami` varchar(255) DEFAULT NULL,
  `s_ktp_isteri` varchar(255) DEFAULT NULL,
  `kartu_lahir` varchar(255) DEFAULT NULL,
  `akta_kakak` varchar(255) DEFAULT NULL,
  `akta_ibu` varchar(255) DEFAULT NULL,
  `akta_ayah` varchar(255) DEFAULT NULL,
  `status_surat` varchar(255) NOT NULL,
  `tgl_surat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ket_surat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_kelahiran_ibfk_1` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_kelahiran`
--

INSERT INTO `surat_kelahiran` (`id`, `no_surat`, `nik`, `hari`, `tanggal`, `lokasi`, `jk`, `nama_anak`, `nama_ibu`, `alamat`, `nama_ayah`, `s_kk`, `s_ktp_suami`, `s_ktp_isteri`, `kartu_lahir`, `akta_kakak`, `akta_ibu`, `akta_ayah`, `status_surat`, `tgl_surat`, `ket_surat`) VALUES
(3, '472.11/1', '123471', 'Selasa', '2019-08-06', 'Banjarbaru', 'Perempuan', 'Aisy', '', 'Jl. Jerami', 'Wira Dana', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'contoh-surat-pernyataan.jpg', '', '', '', 'diproses', '2019-08-06 13:14:30', NULL),
(4, '472.11/1', '123471', 'Selasa', '2019-08-06', 'Banjarbaru', 'Perempuan', 'Aisy', '', 'Jl. Jerami', 'Wira Dana', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'contoh-surat-pernyataan.jpg', '', '', '', 'diproses', '2019-08-06 13:14:30', NULL),
(5, '472.11/1', '123471', 'Selasa', '2019-08-06', 'Banjarbaru', 'Perempuan', 'Aisy', '', 'Jl. Jerami', 'Wira Dana', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'contoh-surat-pernyataan.jpg', '', '', '', 'diproses', '2018-08-06 13:14:30', NULL),
(6, '472.11/1', '123471', 'Selasa', '2019-08-06', 'Banjarbaru', 'Perempuan', 'Aisy', '', 'Jl. Jerami', 'Wira Dana', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'contoh-surat-pernyataan.jpg', '', '', '', 'diproses', '2017-08-06 13:14:30', NULL),
(7, '472.11/1', '123471', 'Selasa', '2019-08-06', 'Banjarbaru', 'Perempuan', 'Aisy', '', 'Jl. Jerami', 'Wira Dana', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'contoh-surat-pernyataan.jpg', '', '', '', 'diproses', '2017-08-06 13:14:30', NULL),
(8, '472.11/1', '123471', 'Selasa', '2019-08-06', 'Banjarbaru', 'Perempuan', 'Aisy', '', 'Jl. Jerami', 'Wira Dana', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'contoh-surat-pernyataan.jpg', '', '', '', 'diproses', '2017-08-06 13:14:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat_kematian`
--

DROP TABLE IF EXISTS `surat_kematian`;
CREATE TABLE IF NOT EXISTS `surat_kematian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `nik_mati` varchar(255) NOT NULL,
  `jk` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `umur` int(3) NOT NULL,
  `anak_ke` int(3) DEFAULT NULL,
  `hari_meninggal` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lokasi` varchar(80) NOT NULL,
  `penyebab` varchar(80) NOT NULL,
  `s_kk` varchar(255) DEFAULT NULL,
  `s_pengantar` varchar(255) DEFAULT NULL,
  `s_ktp_pelapor` varchar(255) DEFAULT NULL,
  `s_ktp_mati` varchar(255) DEFAULT NULL,
  `s_rs` varchar(255) DEFAULT NULL,
  `s_pbb` varchar(255) DEFAULT NULL,
  `ktp_saksi1` varchar(255) DEFAULT NULL,
  `ktp_saksi2` varchar(255) DEFAULT NULL,
  `status_surat` varchar(255) NOT NULL,
  `tgl_surat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ket_surat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_kematian_ibfk_1` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_kematian`
--

INSERT INTO `surat_kematian` (`id`, `no_surat`, `nik`, `nama`, `nik_mati`, `jk`, `alamat`, `umur`, `anak_ke`, `hari_meninggal`, `tanggal`, `jam`, `lokasi`, `penyebab`, `s_kk`, `s_pengantar`, `s_ktp_pelapor`, `s_ktp_mati`, `s_rs`, `s_pbb`, `ktp_saksi1`, `ktp_saksi2`, `status_surat`, `tgl_surat`, `ket_surat`) VALUES
(15, '472.12/1', '123471', 'ranti', '123472', 'Perempuan', 'Jl. Jerami', 37, 0, 'Selasa', '2019-08-06', '11:00:00', 'Banjarbaru', 'Sakit Hati', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'diproses', '2018-08-06 12:50:40', NULL),
(16, '472.12/2', '3674042908820005', 'Zusan', '3674045404820006', 'Perempuan', 'Jl. Mantul', 37, 0, 'Selasa', '2019-08-06', '11:00:00', 'Banjarbaru', 'Sakit Hati', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'diproses', '2019-08-06 12:53:17', NULL),
(17, '472.12/1', '123471', 'ranti', '123472', 'Perempuan', 'Jl. Jerami', 37, 0, 'Selasa', '2019-08-06', '11:00:00', 'Banjarbaru', 'Sakit Hati', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'diproses', '2018-08-06 12:50:40', NULL),
(18, '472.12/2', '3674042908820005', 'Zusan', '3674045404820006', 'Perempuan', 'Jl. Mantul', 37, 0, 'Selasa', '2019-08-06', '11:00:00', 'Banjarbaru', 'Sakit Hati', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'contoh-surat-pernyataan.jpg', 'contoh-surat-pernyataan.jpg', 'contoh e-KTP.jpg', 'contoh e-KTP.jpg', 'diproses', '2018-01-06 12:53:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat_pindah`
--

DROP TABLE IF EXISTS `surat_pindah`;
CREATE TABLE IF NOT EXISTS `surat_pindah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_kepala_keluarga` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `rt_rw` varchar(255) NOT NULL,
  `dusun` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kd_pos` int(255) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status_no_kk` varchar(255) NOT NULL,
  `no_kk_pindah` varchar(16) NOT NULL,
  `nik_kepala_keluarga_pindah` varchar(255) NOT NULL,
  `nama_kepala_keluarga_pindah` varchar(255) NOT NULL,
  `tgl_kedatangan` date NOT NULL,
  `alamat_pindah` text NOT NULL,
  `rt_rw_pindah` varchar(255) NOT NULL,
  `dusun_pindah` varchar(255) NOT NULL,
  `kelurahan_pindah` varchar(255) NOT NULL,
  `kecamatan_pindah` varchar(255) NOT NULL,
  `kota_pindah` varchar(255) NOT NULL,
  `provinsi_pindah` varchar(255) NOT NULL,
  `s_pengantar` varchar(255) NOT NULL,
  `s_kk` varchar(255) NOT NULL,
  `s_ktp` varchar(255) NOT NULL,
  `status_surat` varchar(255) NOT NULL,
  `tgl_surat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pindah`
--

INSERT INTO `surat_pindah` (`id`, `no_surat`, `no_kk`, `nama_kepala_keluarga`, `alamat`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `kd_pos`, `telepon`, `nik`, `nama`, `status_no_kk`, `no_kk_pindah`, `nik_kepala_keluarga_pindah`, `nama_kepala_keluarga_pindah`, `tgl_kedatangan`, `alamat_pindah`, `rt_rw_pindah`, `dusun_pindah`, `kelurahan_pindah`, `kecamatan_pindah`, `kota_pindah`, `provinsi_pindah`, `s_pengantar`, `s_kk`, `s_ktp`, `status_surat`, `tgl_surat`) VALUES
(1, '470/1', '12346', 'Suwarti Utami', 'Jl. Mantul', '006/007', '-', 'loktabat selatan', 'banjarbaru selatan', 'banjarbaru', 'kalimantan selatan', 70714, '081212121212', '123462', 'Yaya', 'Numpang KK', '6372061234561001', '6372061234560001', 'abdul', '2019-08-05', 'gg.kasturi', '003/003', '-', 'guntung paikat', 'banjarbaru selatan', 'banjarbaru', 'kalimantan selatan', 'contoh-surat-pernyataan.jpg', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh e-KTP.jpg', 'selesai', '2019-08-06 12:37:31'),
(2, '470/2', '12348', 'Bambang', 'Jl. Mantul', '006/007', '-', 'loktabat selatan', 'banjarbaru selatan', 'banjarbaru', 'kalimantan selatan', 70714, '081212121212', '123481', 'Bambang', 'Numpang KK', '637206123481001', '637206123480001', 'Bems', '2019-08-05', 'gg.kuncung', '003/003', '-', 'guntung paikat', 'banjarbaru selatan', 'banjarbaru', 'kalimantan selatan', 'contoh-surat-pernyataan.jpg', 'kartu-keluarga-kartu-keluarga.jpg', 'contoh e-KTP.jpg', 'selesai', '2019-08-06 12:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `surat_tidakmampu`
--

DROP TABLE IF EXISTS `surat_tidakmampu`;
CREATE TABLE IF NOT EXISTS `surat_tidakmampu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tempat_lhr` varchar(255) NOT NULL,
  `tgl_lhr` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `rt_rw` varchar(255) NOT NULL,
  `nmr_surat` varchar(255) NOT NULL,
  `tgl_surat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jenis` varchar(2) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `s_pengantar` varchar(255) NOT NULL,
  `s_ktp` varchar(255) NOT NULL,
  `s_kk` varchar(255) NOT NULL,
  `s_pernyataan` varchar(255) NOT NULL,
  `ktp_saksi1` varchar(255) NOT NULL,
  `ktp_saksi2` varchar(255) NOT NULL,
  `s_pbb` varchar(255) NOT NULL,
  `status_surat` varchar(255) NOT NULL,
  `ket_surat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_tidakmampu_ibfk_1` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_kecamatan`
--

DROP TABLE IF EXISTS `t_kecamatan`;
CREATE TABLE IF NOT EXISTS `t_kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kecamatan`
--

INSERT INTO `t_kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
(1, 'banjarbaru selatan');

-- --------------------------------------------------------

--
-- Table structure for table `t_kelurahan`
--

DROP TABLE IF EXISTS `t_kelurahan`;
CREATE TABLE IF NOT EXISTS `t_kelurahan` (
  `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT,
  `kelurahan` varchar(100) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  PRIMARY KEY (`id_kelurahan`),
  KEY `id_kecamatan` (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kelurahan`
--

INSERT INTO `t_kelurahan` (`id_kelurahan`, `kelurahan`, `id_kecamatan`) VALUES
(1, 'loktabat selatan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_kk`
--

DROP TABLE IF EXISTS `t_kk`;
CREATE TABLE IF NOT EXISTS `t_kk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nokk` varchar(16) NOT NULL,
  `id_kepala_keluarga` varchar(16) NOT NULL,
  `tgl_kk` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kk`
--

INSERT INTO `t_kk` (`id`, `nokk`, `id_kepala_keluarga`, `tgl_kk`) VALUES
(1, '12345', '123451', '2019-07-29 20:49:39'),
(2, '12346', '123461', '2019-08-03 20:17:59'),
(3, '12347', '123471', '2019-08-02 19:44:38'),
(4, '12348', '123481', '2019-08-02 19:55:21'),
(5, '1122334455', '11223344551', '2019-08-06 09:21:27'),
(6, '3674040410130003', '3674042908820005', '2019-08-06 09:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `t_penduduk`
--

DROP TABLE IF EXISTS `t_penduduk`;
CREATE TABLE IF NOT EXISTS `t_penduduk` (
  `id_penduduk` int(11) NOT NULL AUTO_INCREMENT,
  `no_kk` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tempat_lhr` varchar(255) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jk` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt_rw` varchar(50) NOT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `status_keluarga` varchar(255) DEFAULT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `thn_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_penduduk`),
  UNIQUE KEY `nik` (`nik`),
  UNIQUE KEY `no_kk` (`no_kk`,`status_keluarga`) USING BTREE,
  KEY `id_kelurahan` (`id_kelurahan`),
  KEY `id_kecamatan` (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_penduduk`
--

INSERT INTO `t_penduduk` (`id_penduduk`, `no_kk`, `nama`, `nik`, `tempat_lhr`, `tgl_lhr`, `jk`, `status`, `alamat`, `rt_rw`, `agama`, `pendidikan`, `pekerjaan`, `status_keluarga`, `id_kelurahan`, `id_kecamatan`, `thn_masuk`) VALUES
(30, '12345', 'Farida', '123452', 'Kandangan', '1974-09-24', 'Perempuan', 'Menikah', 'Jl.Cahaya', '006/007', 'Islam', 'SLTA', 'PEGAWAI NEGERI SIPIL (PNS)', 'Isteri', 1, 1, '2019-08-06 11:14:37'),
(33, '12346', 'Suwarti Utami', '123461', 'Jawa Tengah', '1962-12-12', 'Perempuan', 'Janda', 'Jl.Cahaya', '006/007', 'Islam', 'SLTA', 'IRT', 'Famili', 1, 1, '2019-08-06 11:14:37'),
(34, '12347', 'Wira Dana', '123471', 'Martapura', '1982-03-17', 'Laki-laki', 'Menikah', 'Jl. Jerami', '006/007', 'Islam', 'SLTA', 'BELUM/TIDAK BEKERJA', 'Suami', 1, 1, '2019-08-06 13:13:54'),
(38, '1122334455', 'Aditiya Ramadhuni', '11223344551', 'Banjarbaru', '1995-04-08', 'Laki-laki', 'Belum menikah', 'Jl. Mantul', '006/007', 'Islam', 'S1-Manajemen SDM', 'PEGAWAI NEGERI SIPIL (PNS)', '-', 1, 1, '2018-08-06 11:14:37'),
(40, '3674040410130003', 'Agus', '3674042908820005', 'Jakarta', '1982-08-29', 'Laki-laki', 'Menikah', 'Jl. Mantul', '006/007', 'Islam', 'S1-Manajemen SDM', 'PEGAWAI NEGERI SIPIL (PNS)', 'Suami', 1, 1, '2017-08-06 11:14:37');

--
-- Triggers `t_penduduk`
--
DROP TRIGGER IF EXISTS `pengguna_ins_id`;
DELIMITER $$
CREATE TRIGGER `pengguna_ins_id` AFTER INSERT ON `t_penduduk` FOR EACH ROW INSERT INTO t_pengguna SET
 id_penduduk = New.id_penduduk, nama=new.nama, username=new.nik, password='12345', level='rakyat'
 ON DUPLICATE KEY UPDATE id_penduduk = New.id_penduduk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_penduduk_mati`
--

DROP TABLE IF EXISTS `t_penduduk_mati`;
CREATE TABLE IF NOT EXISTS `t_penduduk_mati` (
  `id_mati` int(11) NOT NULL AUTO_INCREMENT,
  `no_kk` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tempat_lhr` varchar(255) NOT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `jk` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt_rw` varchar(50) NOT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `status_keluarga` varchar(255) DEFAULT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  PRIMARY KEY (`id_mati`),
  KEY `id_kelurahan` (`id_kelurahan`),
  KEY `id_kecamatan` (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_penduduk_mati`
--

INSERT INTO `t_penduduk_mati` (`id_mati`, `no_kk`, `nama`, `nik`, `tempat_lhr`, `tgl_lhr`, `jk`, `status`, `alamat`, `rt_rw`, `agama`, `pendidikan`, `pekerjaan`, `status_keluarga`, `id_kelurahan`, `id_kecamatan`) VALUES
(1, '12345', 'Muhammad Ginanjar', '123451', 'Martapura', '1996-01-17', 'Laki-laki', 'Belum menikah', 'Jl.Cahaya', '006/007', 'Islam', 'SLTA', 'BELUM/TIDAK BEKERJA', 'Anak Kedua', 1, 1),
(2, '12347', 'ranti', '123471', 'Martapura', '1982-02-12', 'Perempuan', 'Menikah', 'Jl.Cahaya', '006/007', 'Islam', 'SLTA', 'PEGAWAI NEGERI SIPIL (PNS)', 'Isteri', 1, 1),
(3, '3674040410130003', 'Zusan', '3674042908820005', 'Manado', '1982-04-24', 'Perempuan', 'Menikah', 'Jl. Mantul', '006/007', 'Islam', 'SLTA', 'PEGAWAI NEGERI SIPIL (PNS)', 'Isteri', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_penduduk_pindah`
--

DROP TABLE IF EXISTS `t_penduduk_pindah`;
CREATE TABLE IF NOT EXISTS `t_penduduk_pindah` (
  `id_pindah` int(11) NOT NULL AUTO_INCREMENT,
  `no_kk` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tempat_lhr` varchar(255) NOT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `jk` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt_rw` varchar(50) NOT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `status_keluarga` varchar(255) DEFAULT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  PRIMARY KEY (`id_pindah`),
  KEY `id_kelurahan` (`id_kelurahan`),
  KEY `id_kecamatan` (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_penduduk_pindah`
--

INSERT INTO `t_penduduk_pindah` (`id_pindah`, `no_kk`, `nama`, `nik`, `tempat_lhr`, `tgl_lhr`, `jk`, `status`, `alamat`, `rt_rw`, `agama`, `pendidikan`, `pekerjaan`, `status_keluarga`, `id_kelurahan`, `id_kecamatan`) VALUES
(1, '12348', 'Bambang', '123481', 'Gambut', '1969-04-17', 'Laki-laki', 'Menikah', 'Jl. Mantul', '006/007', 'Islam', 'S1-Manajemen SDM', 'PEGAWAI NEGERI SIPIL (PNS)', 'Suami', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_pengguna`
--

DROP TABLE IF EXISTS `t_pengguna`;
CREATE TABLE IF NOT EXISTS `t_pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(100) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(255) NOT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pengguna`
--

INSERT INTO `t_pengguna` (`id`, `nip`, `nama`, `username`, `password`, `level`, `id_penduduk`) VALUES
(1, '123456789', 'admin', 'admin1', 'admin1', 'admin', NULL),
(14, NULL, 'Kasianto', '123451', '12345', 'rakyat', 29),
(15, NULL, 'Farida', '123452', '12345', 'rakyat', 30),
(18, NULL, 'Suwarti Utami', '123461', '12345', 'rakyat', 33),
(19, NULL, 'Wira Dana', '123471', '12345', 'rakyat', 34),
(20, NULL, 'Bambang', '123481', '12345', 'rakyat', 35),
(21, NULL, 'Yaya', '123462', '12345', 'rakyat', 36),
(22, NULL, 'Aditiya Ramadhuni', '11223344551', '12345', 'rakyat', 37),
(23, NULL, 'Aditiya Ramadhuni', '11223344551', '12345', 'rakyat', 38),
(25, NULL, 'Agus', '3674042908820005', '12345', 'rakyat', 40);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_keluarga`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_keluarga`;
CREATE TABLE IF NOT EXISTS `v_keluarga` (
`id` int(11)
,`nokk` varchar(16)
,`nik_kepala_keluarga` varchar(16)
,`Suami` varchar(255)
,`nik_suami` varchar(255)
,`tempat_lhr_suami` varchar(255)
,`tgl_lhr_suami` date
,`Isteri` varchar(255)
,`nik_isteri` varchar(255)
,`tempat_lhr_isteri` varchar(255)
,`tgl_lhr_isteri` date
,`anak_pertama` varchar(255)
,`nik_anak1` varchar(255)
,`tempat_lhr_anak1` varchar(255)
,`tgl_lhr_anak1` date
,`anak_kedua` varchar(255)
,`nik_anak2` varchar(255)
,`tempat_lhr_anak2` varchar(255)
,`tgl_lhr_anak2` date
,`anak_ketiga` varchar(255)
,`nik_anak3` varchar(255)
,`tempat_lhr_anak3` varchar(255)
,`tgl_lhr_anak3` date
,`famili` varchar(255)
,`nik_famili` varchar(255)
,`tempat_lhr_famili` varchar(255)
,`tgl_lhr_famili` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_kk`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_kk`;
CREATE TABLE IF NOT EXISTS `v_kk` (
`id` int(11)
,`nokk` varchar(16)
,`nik_kepala_keluarga` varchar(16)
,`nama` varchar(255)
,`tempat_lhr` varchar(255)
,`tgl_lhr` date
,`alamat` varchar(255)
,`rt_rw` varchar(50)
,`Suami` varchar(255)
,`nik_suami` varchar(255)
,`tempat_lhr_suami` varchar(255)
,`tgl_lhr_suami` date
,`Isteri` varchar(255)
,`nik_isteri` varchar(255)
,`tempat_lhr_isteri` varchar(255)
,`tgl_lhr_isteri` date
,`anak_pertama` varchar(255)
,`nik_anak1` varchar(255)
,`tempat_lhr_anak1` varchar(255)
,`tgl_lhr_anak1` date
,`anak_kedua` varchar(255)
,`nik_anak2` varchar(255)
,`tempat_lhr_anak2` varchar(255)
,`tgl_lhr_anak2` date
,`anak_ketiga` varchar(255)
,`nik_anak3` varchar(255)
,`tempat_lhr_anak3` varchar(255)
,`tgl_lhr_anak3` date
,`famili` varchar(255)
,`nik_famili` varchar(255)
,`tempat_lhr_famili` varchar(255)
,`tgl_lhr_famili` date
);

-- --------------------------------------------------------

--
-- Structure for view `v_keluarga`
--
DROP TABLE IF EXISTS `v_keluarga`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_keluarga`  AS  select `u`.`id` AS `id`,`u`.`nokk` AS `nokk`,`u`.`id_kepala_keluarga` AS `nik_kepala_keluarga`,`uf_f`.`nama` AS `Suami`,`uf_nik1`.`nik` AS `nik_suami`,`tl_1`.`tempat_lhr` AS `tempat_lhr_suami`,`tgl_1`.`tgl_lhr` AS `tgl_lhr_suami`,`uf_l`.`nama` AS `Isteri`,`uf_nik2`.`nik` AS `nik_isteri`,`tl_2`.`tempat_lhr` AS `tempat_lhr_isteri`,`tgl_2`.`tgl_lhr` AS `tgl_lhr_isteri`,`uf_1`.`nama` AS `anak_pertama`,`uf_nik3`.`nik` AS `nik_anak1`,`tl_3`.`tempat_lhr` AS `tempat_lhr_anak1`,`tgl_3`.`tgl_lhr` AS `tgl_lhr_anak1`,`uf_2`.`nama` AS `anak_kedua`,`uf_nik4`.`nik` AS `nik_anak2`,`tl_4`.`tempat_lhr` AS `tempat_lhr_anak2`,`tgl_4`.`tgl_lhr` AS `tgl_lhr_anak2`,`uf_3`.`nama` AS `anak_ketiga`,`uf_nik5`.`nik` AS `nik_anak3`,`tl_5`.`tempat_lhr` AS `tempat_lhr_anak3`,`tgl_5`.`tgl_lhr` AS `tgl_lhr_anak3`,`uf_4`.`nama` AS `famili`,`uf_nik6`.`nik` AS `nik_famili`,`tl_6`.`tempat_lhr` AS `tempat_lhr_famili`,`tgl_6`.`tgl_lhr` AS `tgl_lhr_famili` from ((((((((((((((((((((((((`t_kk` `u` left join `t_penduduk` `uf_f` on(((`uf_f`.`no_kk` = `u`.`nokk`) and (`uf_f`.`status_keluarga` = 'Suami')))) left join `t_penduduk` `uf_nik1` on(((`uf_nik1`.`no_kk` = `u`.`nokk`) and (`uf_nik1`.`status_keluarga` = 'Suami')))) left join `t_penduduk` `tl_1` on(((`tl_1`.`no_kk` = `u`.`nokk`) and (`tl_1`.`status_keluarga` = 'Suami')))) left join `t_penduduk` `tgl_1` on(((`tgl_1`.`no_kk` = `u`.`nokk`) and (`tgl_1`.`status_keluarga` = 'Suami')))) left join `t_penduduk` `uf_l` on(((`uf_l`.`no_kk` = `u`.`nokk`) and (`uf_l`.`status_keluarga` = 'Isteri')))) left join `t_penduduk` `uf_nik2` on(((`uf_nik2`.`no_kk` = `u`.`nokk`) and (`uf_nik2`.`status_keluarga` = 'Isteri')))) left join `t_penduduk` `tl_2` on(((`tl_2`.`no_kk` = `u`.`nokk`) and (`tl_2`.`status_keluarga` = 'Isteri')))) left join `t_penduduk` `tgl_2` on(((`tgl_2`.`no_kk` = `u`.`nokk`) and (`tgl_2`.`status_keluarga` = 'Isteri')))) left join `t_penduduk` `uf_1` on(((`uf_1`.`no_kk` = `u`.`nokk`) and (`uf_1`.`status_keluarga` = 'Anak Pertama')))) left join `t_penduduk` `uf_nik3` on(((`uf_nik3`.`no_kk` = `u`.`nokk`) and (`uf_nik3`.`status_keluarga` = 'Anak Pertama')))) left join `t_penduduk` `tl_3` on(((`tl_3`.`no_kk` = `u`.`nokk`) and (`tl_3`.`status_keluarga` = 'Anak Pertama')))) left join `t_penduduk` `tgl_3` on(((`tgl_3`.`no_kk` = `u`.`nokk`) and (`tgl_3`.`status_keluarga` = 'Anak Pertama')))) left join `t_penduduk` `uf_2` on(((`uf_2`.`no_kk` = `u`.`nokk`) and (`uf_2`.`status_keluarga` = 'Anak Kedua')))) left join `t_penduduk` `uf_nik4` on(((`uf_nik4`.`no_kk` = `u`.`nokk`) and (`uf_nik4`.`status_keluarga` = 'Anak Kedua')))) left join `t_penduduk` `tl_4` on(((`tl_4`.`no_kk` = `u`.`nokk`) and (`tl_4`.`status_keluarga` = 'Anak Kedua')))) left join `t_penduduk` `tgl_4` on(((`tgl_4`.`no_kk` = `u`.`nokk`) and (`tgl_4`.`status_keluarga` = 'Anak Kedua')))) left join `t_penduduk` `uf_3` on(((`uf_3`.`no_kk` = `u`.`nokk`) and (`uf_3`.`status_keluarga` = 'Anak Ketiga')))) left join `t_penduduk` `uf_nik5` on(((`uf_nik5`.`no_kk` = `u`.`nokk`) and (`uf_nik5`.`status_keluarga` = 'Anak Ketiga')))) left join `t_penduduk` `tl_5` on(((`tl_5`.`no_kk` = `u`.`nokk`) and (`tl_5`.`status_keluarga` = 'Anak Ketiga')))) left join `t_penduduk` `tgl_5` on(((`tgl_5`.`no_kk` = `u`.`nokk`) and (`tgl_5`.`status_keluarga` = 'Anak Ketiga')))) left join `t_penduduk` `uf_4` on(((`uf_4`.`no_kk` = `u`.`nokk`) and (`uf_4`.`status_keluarga` = 'famili')))) left join `t_penduduk` `uf_nik6` on(((`uf_nik6`.`no_kk` = `u`.`nokk`) and (`uf_nik6`.`status_keluarga` = 'famili')))) left join `t_penduduk` `tl_6` on(((`tl_6`.`no_kk` = `u`.`nokk`) and (`tl_6`.`status_keluarga` = 'famili')))) left join `t_penduduk` `tgl_6` on(((`tgl_6`.`no_kk` = `u`.`nokk`) and (`tgl_6`.`status_keluarga` = 'famili')))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_kk`
--
DROP TABLE IF EXISTS `v_kk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kk`  AS  select `v_keluarga`.`id` AS `id`,`v_keluarga`.`nokk` AS `nokk`,`v_keluarga`.`nik_kepala_keluarga` AS `nik_kepala_keluarga`,`t_penduduk`.`nama` AS `nama`,`t_penduduk`.`tempat_lhr` AS `tempat_lhr`,`t_penduduk`.`tgl_lhr` AS `tgl_lhr`,`t_penduduk`.`alamat` AS `alamat`,`t_penduduk`.`rt_rw` AS `rt_rw`,`v_keluarga`.`Suami` AS `Suami`,`v_keluarga`.`nik_suami` AS `nik_suami`,`v_keluarga`.`tempat_lhr_suami` AS `tempat_lhr_suami`,`v_keluarga`.`tgl_lhr_suami` AS `tgl_lhr_suami`,`v_keluarga`.`Isteri` AS `Isteri`,`v_keluarga`.`nik_isteri` AS `nik_isteri`,`v_keluarga`.`tempat_lhr_isteri` AS `tempat_lhr_isteri`,`v_keluarga`.`tgl_lhr_isteri` AS `tgl_lhr_isteri`,`v_keluarga`.`anak_pertama` AS `anak_pertama`,`v_keluarga`.`nik_anak1` AS `nik_anak1`,`v_keluarga`.`tempat_lhr_anak1` AS `tempat_lhr_anak1`,`v_keluarga`.`tgl_lhr_anak1` AS `tgl_lhr_anak1`,`v_keluarga`.`anak_kedua` AS `anak_kedua`,`v_keluarga`.`nik_anak2` AS `nik_anak2`,`v_keluarga`.`tempat_lhr_anak2` AS `tempat_lhr_anak2`,`v_keluarga`.`tgl_lhr_anak2` AS `tgl_lhr_anak2`,`v_keluarga`.`anak_ketiga` AS `anak_ketiga`,`v_keluarga`.`nik_anak3` AS `nik_anak3`,`v_keluarga`.`tempat_lhr_anak3` AS `tempat_lhr_anak3`,`v_keluarga`.`tgl_lhr_anak3` AS `tgl_lhr_anak3`,`v_keluarga`.`famili` AS `famili`,`v_keluarga`.`nik_famili` AS `nik_famili`,`v_keluarga`.`tempat_lhr_famili` AS `tempat_lhr_famili`,`v_keluarga`.`tgl_lhr_famili` AS `tgl_lhr_famili` from (`v_keluarga` join `t_penduduk` on((`v_keluarga`.`nik_kepala_keluarga` = `t_penduduk`.`nik`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat_belum_memiliki_rumah`
--
ALTER TABLE `surat_belum_memiliki_rumah`
  ADD CONSTRAINT `surat_belum_memiliki_rumah_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `t_penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_domisili`
--
ALTER TABLE `surat_domisili`
  ADD CONSTRAINT `surat_domisili_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `t_penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_domisili_usaha`
--
ALTER TABLE `surat_domisili_usaha`
  ADD CONSTRAINT `surat_domisili_usaha_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `t_penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_duda_janda`
--
ALTER TABLE `surat_duda_janda`
  ADD CONSTRAINT `surat_duda_janda_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `t_penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_ektp`
--
ALTER TABLE `surat_ektp`
  ADD CONSTRAINT `surat_ektp_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `t_penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_ijin_keramaian`
--
ALTER TABLE `surat_ijin_keramaian`
  ADD CONSTRAINT `surat_ijin_keramaian_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `t_penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_kehilangan`
--
ALTER TABLE `surat_kehilangan`
  ADD CONSTRAINT `surat_kehilangan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `t_penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_kelahiran`
--
ALTER TABLE `surat_kelahiran`
  ADD CONSTRAINT `surat_kelahiran_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `t_penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_kematian`
--
ALTER TABLE `surat_kematian`
  ADD CONSTRAINT `surat_kematian_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `t_penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_tidakmampu`
--
ALTER TABLE `surat_tidakmampu`
  ADD CONSTRAINT `surat_tidakmampu_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `t_penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_kelurahan`
--
ALTER TABLE `t_kelurahan`
  ADD CONSTRAINT `t_kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `t_kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_penduduk`
--
ALTER TABLE `t_penduduk`
  ADD CONSTRAINT `t_penduduk_ibfk_1` FOREIGN KEY (`id_kelurahan`) REFERENCES `t_kelurahan` (`id_kelurahan`),
  ADD CONSTRAINT `t_penduduk_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `t_kecamatan` (`id_kecamatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
