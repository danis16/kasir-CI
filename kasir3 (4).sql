-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Apr 2018 pada 07.59
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `idCabang` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `idJabatan` enum('pemilik','karyawati') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `idCabang`, `tanggal`, `idJabatan`) VALUES
(4, 'admin', '$2a$12$aOHuqGDLgbomxaw1U9w6Q.58TaWMjmPOI97iHUH4Ol3uEZhkqFIGO', 1, '2018-01-10', 'pemilik'),
(8, 'rose', '$2a$12$.o2HvjrMEXGxeQ4iYzbPeOxVKS1oMF0m2UUEAldLfh4lHGGwNt0Ey', 1, '2018-04-17', 'karyawati'),
(9, 'danis', '$2a$12$0KNzswJyOVHlqUlLQZ9O.eAPXvF1EaUa7B8oow/fI.HYiADqr/seK', 2, '2018-03-15', 'karyawati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(225) NOT NULL,
  `barang` varchar(50) DEFAULT NULL,
  `idMerek` int(100) DEFAULT NULL,
  `status` enum('DIJUAL','TIDAK DIJUAL') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `barang`, `idMerek`, `status`, `keterangan`) VALUES
(1, '1', 1, 'DIJUAL', ''),
(2, '1', 2, 'DIJUAL', ''),
(3, '2', 3, 'DIJUAL', ''),
(4, '4', 4, 'DIJUAL', ''),
(5, '4', 5, 'DIJUAL', ''),
(6, '4', 6, 'DIJUAL', ''),
(7, '3', 4, 'DIJUAL', ''),
(8, '3', 5, 'DIJUAL', ''),
(9, '3', 7, 'DIJUAL', ''),
(10, '5', 4, 'DIJUAL', ''),
(11, '6', 8, 'DIJUAL', ''),
(12, '6', 9, 'DIJUAL', ''),
(13, '6', 10, 'DIJUAL', ''),
(14, '6', 11, 'DIJUAL', ''),
(15, '7', 12, 'DIJUAL', ''),
(16, '8', 13, 'DIJUAL', ''),
(17, '9', 14, 'DIJUAL', ''),
(18, '10', 15, 'DIJUAL', ''),
(19, '10', 16, 'DIJUAL', ''),
(20, '11', 17, 'DIJUAL', ''),
(21, '12', 18, 'DIJUAL', ''),
(22, '13', 12, 'DIJUAL', ''),
(23, '13', 6, 'DIJUAL', ''),
(24, '14', 12, 'DIJUAL', ''),
(25, '15', 5, 'DIJUAL', ''),
(26, '16', 20, 'DIJUAL', ''),
(27, '16', 6, 'DIJUAL', ''),
(28, '6', 6, 'DIJUAL', ''),
(29, '17', 22, 'DIJUAL', ''),
(30, '18', 24, 'DIJUAL', ''),
(31, '18', 23, 'DIJUAL', ''),
(32, '18', 26, 'DIJUAL', ''),
(33, '19', 26, 'DIJUAL', ''),
(34, '19', 27, 'DIJUAL', 'SANDAL JINJIT'),
(35, '19', 28, 'DIJUAL', 'SANDAL JAPIT'),
(36, '22', 30, 'DIJUAL', ''),
(37, '23', 31, 'DIJUAL', ''),
(38, '23', 32, 'DIJUAL', ''),
(39, '23', 33, 'DIJUAL', ''),
(40, '23', 35, 'DIJUAL', ''),
(41, '24', 34, 'DIJUAL', ''),
(42, '25', 29, 'DIJUAL', ''),
(43, '16', 21, 'DIJUAL', ''),
(44, '26', 12, 'DIJUAL', ''),
(45, '27', 36, 'DIJUAL', ''),
(46, '32', 36, 'DIJUAL', ''),
(47, '27', 37, 'DIJUAL', ''),
(48, '32', 37, 'DIJUAL', ''),
(49, '28', 38, 'DIJUAL', ''),
(50, '34', 47, 'DIJUAL', ''),
(51, '34', 48, 'DIJUAL', ''),
(52, '35', 49, 'DIJUAL', ''),
(53, '36', 50, 'DIJUAL', ''),
(54, '36', 51, 'DIJUAL', ''),
(55, '36', 52, 'DIJUAL', ''),
(56, '36', 53, 'DIJUAL', ''),
(57, '37', 54, 'DIJUAL', ''),
(58, '37', 55, 'DIJUAL', ''),
(59, '38', 54, 'DIJUAL', ''),
(60, '38', 55, 'DIJUAL', ''),
(61, '8', 39, 'DIJUAL', ''),
(62, '8', 40, 'DIJUAL', ''),
(63, '29', 41, 'DIJUAL', ''),
(64, '33', 42, 'DIJUAL', ''),
(65, '29', 43, 'DIJUAL', ''),
(66, '30', 5, 'DIJUAL', ''),
(67, '31', 44, 'DIJUAL', ''),
(68, '31', 45, 'DIJUAL', ''),
(69, '31', 46, 'DIJUAL', ''),
(70, '37', 5, 'DIJUAL', ''),
(71, '39', 52, 'DIJUAL', ''),
(72, '39', 52, 'DIJUAL', ''),
(73, '36', 56, 'DIJUAL', ''),
(74, '36', 57, 'DIJUAL', ''),
(75, '38', 58, 'DIJUAL', ''),
(76, '40', 12, 'DIJUAL', ''),
(77, '41', 6, 'DIJUAL', ''),
(78, '42', 12, 'DIJUAL', ''),
(79, '43', 59, 'DIJUAL', ''),
(80, '43', 60, 'DIJUAL', ''),
(81, '43', 61, 'DIJUAL', ''),
(82, '44', 67, 'DIJUAL', ''),
(83, '6', 62, 'DIJUAL', ''),
(84, '45', 63, 'DIJUAL', ''),
(85, '46', 16, 'DIJUAL', ''),
(86, '46', 64, 'DIJUAL', ''),
(87, '47', 54, 'DIJUAL', ''),
(88, '47', 65, 'DIJUAL', ''),
(89, '48', 12, 'DIJUAL', ''),
(90, '49', 66, 'DIJUAL', ''),
(91, '50', 6, 'DIJUAL', ''),
(92, '51', 6, 'DIJUAL', ''),
(93, '52', 12, 'DIJUAL', ''),
(94, '53', 5, 'DIJUAL', ''),
(95, '54', 6, 'DIJUAL', ''),
(96, '55', 6, 'DIJUAL', ''),
(97, '36', 50, 'DIJUAL', ''),
(98, '36', 51, 'DIJUAL', ''),
(99, '36', 68, 'DIJUAL', ''),
(100, '36', 69, 'DIJUAL', ''),
(101, '50', 6, 'DIJUAL', ''),
(102, '51', 5, 'DIJUAL', ''),
(103, '12', 66, 'DIJUAL', ''),
(104, '12', 4, 'DIJUAL', ''),
(105, '12', 70, 'DIJUAL', ''),
(106, '66', 12, 'DIJUAL', ''),
(107, '67', 12, 'DIJUAL', 'BENTUKNYA KOTAK'),
(108, '68', 12, 'DIJUAL', 'BENTUKNYA BULAT'),
(109, '56', 12, 'DIJUAL', 'BENTUKNYA KOTAK, ADA GAMBAR BATOK KELAPA'),
(110, '69', 12, 'DIJUAL', 'BENTUNYA BULAT, ADA GAMBAR TUNAS KELAPANYA'),
(111, '57', 12, 'DIJUAL', ''),
(112, '58', 12, 'DIJUAL', ''),
(113, '59', 12, 'DIJUAL', ''),
(114, '60', 12, 'DIJUAL', ''),
(115, '61', 12, 'DIJUAL', ''),
(116, '62', 12, 'DIJUAL', ''),
(117, '64', 12, 'DIJUAL', ''),
(118, '65', 12, 'DIJUAL', ''),
(119, '70', 12, 'DIJUAL', ''),
(120, '71', 12, 'DIJUAL', ''),
(121, '72', 12, 'DIJUAL', ''),
(122, '73', 71, 'DIJUAL', ''),
(123, '74', 72, 'DIJUAL', ''),
(124, '74', 73, 'DIJUAL', ''),
(125, '74', 74, 'DIJUAL', ''),
(126, '74', 75, 'DIJUAL', ''),
(127, '75', 76, 'DIJUAL', ''),
(128, '8', 78, 'DIJUAL', ''),
(129, '75', 77, 'DIJUAL', ''),
(130, '76', 15, 'DIJUAL', ''),
(131, '77', 79, 'DIJUAL', ''),
(132, '77', 76, 'DIJUAL', ''),
(133, '79', 80, 'DIJUAL', ''),
(134, '80', 80, 'DIJUAL', ''),
(135, '79', 5, 'DIJUAL', ''),
(136, '80', 5, 'DIJUAL', ''),
(137, '79', 81, 'DIJUAL', ''),
(138, '80', 81, 'DIJUAL', ''),
(139, '79', 82, 'DIJUAL', ''),
(140, '80', 82, 'DIJUAL', ''),
(141, '1', 2, 'DIJUAL', ''),
(142, '81', 74, 'DIJUAL', ''),
(143, '81', 60, 'DIJUAL', ''),
(144, '83', 83, 'DIJUAL', ''),
(145, '84', 84, 'DIJUAL', ''),
(146, '88', 4, 'DIJUAL', ''),
(147, '85', 84, 'DIJUAL', ''),
(148, '86', 65, 'DIJUAL', ''),
(149, '87', 84, 'DIJUAL', ''),
(150, '3', 74, 'DIJUAL', ''),
(152, '2', 2, 'DIJUAL', ''),
(153, '47', 54, 'DIJUAL', ''),
(154, '13', 6, 'DIJUAL', ''),
(155, '100', 1, 'DIJUAL', ''),
(156, '100', 91, 'DIJUAL', ''),
(157, '100', 2, 'DIJUAL', ''),
(158, '100', 92, 'DIJUAL', ''),
(159, '106', 66, 'DIJUAL', 'bisa buat di undangan pernikahan'),
(160, '14', 12, 'DIJUAL', ''),
(161, '127', 12, 'DIJUAL', ''),
(162, '128', 12, 'DIJUAL', ''),
(163, '30', 66, 'DIJUAL', ''),
(164, '30', 4, 'DIJUAL', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangrusak`
--

CREATE TABLE `barangrusak` (
  `id` int(255) NOT NULL,
  `tanggal` date NOT NULL,
  `idDetailBarang` int(255) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  `penyebab` enum('supplier','debu','jatuh','lama','lain-lain') NOT NULL,
  `idDetailPembelian` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barangrusak`
--

INSERT INTO `barangrusak` (`id`, `tanggal`, `idDetailBarang`, `jumlah`, `keterangan`, `penyebab`, `idDetailPembelian`) VALUES
(1, '2018-03-23', 13, 1, '', 'debu', 11),
(3, '2018-03-24', 20, 1, '', 'debu', 17);

--
-- Trigger `barangrusak`
--
DELIMITER $$
CREATE TRIGGER `after_barangrusak_insert` AFTER INSERT ON `barangrusak` FOR EACH ROW BEGIN
UPDATE detailbarang SET stokAwal=stokAwal-NEW.jumlah WHERE id=NEW.idDetailBarang;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_barangrusak_delete` BEFORE DELETE ON `barangrusak` FOR EACH ROW BEGIN
UPDATE detailbarang set stokAwal=stokAwal+OLD.jumlah WHERE id=OLD.idDetailBarang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `beban`
--

CREATE TABLE `beban` (
  `id` int(10) NOT NULL,
  `beban` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beban`
--

INSERT INTO `beban` (`id`, `beban`) VALUES
(1, 'Listrik'),
(2, 'Gaji Karyawati'),
(3, 'Gedung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailbarang`
--

CREATE TABLE `detailbarang` (
  `id` int(255) NOT NULL,
  `idBarang` int(255) DEFAULT NULL,
  `idUkuran` int(5) NOT NULL,
  `idWarna` int(20) NOT NULL,
  `hargaEcer` int(12) NOT NULL,
  `stokAwal` int(10) UNSIGNED DEFAULT NULL,
  `idCabang` int(3) NOT NULL,
  `kodeBarang` varchar(50) NOT NULL,
  `status` enum('non aktif','aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailbarang`
--

INSERT INTO `detailbarang` (`id`, `idBarang`, `idUkuran`, `idWarna`, `hargaEcer`, `stokAwal`, `idCabang`, `kodeBarang`, `status`) VALUES
(1, 1, 7, 21, 35000, 0, 1, 'JDQ1ESD1', 'aktif'),
(4, 2, 7, 22, 40000, 0, 1, 'JDQ2SSD1', 'aktif'),
(5, 3, 7, 17, 1500, 3, 1, 'BABCBSD1', 'aktif'),
(6, 3, 8, 17, 3500, 3, 1, 'BABCBB1', 'aktif'),
(7, 4, 7, 6, 15000, 1, 1, 'BBJWWSD1', 'aktif'),
(8, 5, 7, 6, 17000, 5, 1, 'BBKWWSD1', 'aktif'),
(9, 6, 7, 6, 15000, 7, 1, 'BBCWWSD1', 'aktif'),
(10, 7, 7, 6, 3000, 25, 1, 'IBJWWSD1', 'aktif'),
(11, 8, 7, 6, 3500, 4, 1, 'IBKWWSD1', 'aktif'),
(12, 9, 7, 6, 7000, 1, 1, 'IBHWWSD1', 'aktif'),
(13, 10, 14, 20, 200, 372, 1, 'KFJPUA41', 'aktif'),
(14, 11, 7, 23, 8000, 2, 1, 'KH1OSD1', 'aktif'),
(15, 12, 7, 23, 12000, 9, 1, 'KH2OSD1', 'aktif'),
(16, 13, 7, 23, 12000, 8, 1, 'KROSD1', 'aktif'),
(17, 14, 7, 23, 6000, 2, 1, 'KCOSD1', 'aktif'),
(18, 15, 14, 24, 6000, 5, 1, 'CTMHPA41', 'aktif'),
(19, 16, 17, 25, 6000, 5, 1, 'PEP1401', 'aktif'),
(20, 16, 17, 17, 6000, 5, 1, 'PEB401', 'aktif'),
(21, 16, 17, 23, 6000, 6, 1, 'PEO401', 'aktif'),
(22, 16, 17, 3, 6000, 6, 1, 'PEH401', 'aktif'),
(23, 16, 17, 16, 6000, 6, 1, 'PEU401', 'aktif'),
(24, 17, 7, 2, 12000, 1, 1, 'MMKSD1', 'aktif'),
(25, 18, 20, 26, 12000, 1, 1, 'PLSPH100M1', 'aktif'),
(26, 19, 18, 25, 12000, 6, 1, 'PLPP1501', 'aktif'),
(27, 19, 18, 3, 12000, 6, 1, 'PLPH501', 'aktif'),
(28, 19, 18, 17, 12000, 4, 1, 'PLPB501', 'aktif'),
(29, 20, 14, 13, 1500, 29, 1, 'KKDHIA41', 'aktif'),
(30, 21, 7, 25, 8000, 1, 1, 'TPBP1SD1', 'aktif'),
(31, 21, 7, 17, 8000, 4, 1, 'TPBBSD1', 'aktif'),
(32, 21, 7, 3, 8000, 4, 1, 'TPBHSD1', 'aktif'),
(33, 21, 7, 23, 8000, 3, 1, 'TPBOSD1', 'aktif'),
(34, 21, 7, 16, 8000, 4, 1, 'TPBUSD1', 'aktif'),
(35, 21, 7, 1, 8000, 4, 1, 'TPBMSD1', 'aktif'),
(36, 22, 7, 6, 1000, 17, 1, 'JPTMWWSD1', 'aktif'),
(37, 23, 6, 6, 2500, 30, 1, 'JPCWWK1', 'aktif'),
(38, 23, 7, 6, 3000, 40, 1, 'JPCWWSD1', 'aktif'),
(39, 24, 7, 3, 3000, 15, 1, 'TBTMHSD1', 'aktif'),
(40, 25, 15, 6, 1000, 85, 1, 'KK1KWWA31', 'aktif'),
(42, 26, 6, 27, 1500, 1, 1, 'P1NB1K1', 'aktif'),
(43, 26, 7, 27, 7000, 6, 1, 'P1NB1SD1', 'aktif'),
(44, 26, 8, 27, 10000, 3, 1, 'P1NB1B1', 'aktif'),
(45, 27, 6, 27, 500, 11, 1, 'P1CB1K1', 'aktif'),
(46, 28, 21, 1, 3500, 5, 1, 'KCM151', 'aktif'),
(47, 28, 21, 7, 3500, 2, 1, 'KCJ151', 'aktif'),
(48, 28, 21, 2, 3500, 5, 1, 'KCK151', 'aktif'),
(49, 28, 21, 3, 3500, 5, 1, 'KCH151', 'aktif'),
(50, 28, 21, 17, 3500, 0, 1, 'KCB151', 'aktif'),
(51, 28, 21, 15, 3500, 1, 1, 'KCN151', 'aktif'),
(52, 28, 21, 16, 3500, 4, 1, 'KCU151', 'aktif'),
(53, 28, 21, 20, 3500, 5, 1, 'KCPU151', 'aktif'),
(54, 28, 21, 25, 3500, 5, 1, 'KCP1151', 'aktif'),
(55, 28, 21, 23, 3500, 5, 1, 'KCO151', 'aktif'),
(56, 29, 7, 25, 20000, 10, 1, 'HAP1SD1', 'aktif'),
(57, 29, 7, 11, 20000, 7, 1, 'HABMSD1', 'aktif'),
(58, 29, 6, 1, 16000, 4, 1, 'HAMK1', 'aktif'),
(59, 29, 6, 23, 16000, 0, 1, 'HAOK1', 'aktif'),
(60, 29, 8, 11, 30000, 10, 1, 'HABMB1', 'aktif'),
(61, 29, 8, 23, 30000, 8, 1, 'HAOB1', 'aktif'),
(62, 30, 22, 28, 35000, 0, 1, 'SSXC351', 'aktif'),
(63, 30, 23, 28, 35000, 2, 1, 'SSXC361', 'aktif'),
(64, 30, 24, 28, 35000, 2, 1, 'SSXC371', 'aktif'),
(65, 30, 3, 28, 35000, 2, 1, 'SSXC381', 'aktif'),
(66, 30, 26, 28, 35000, 2, 1, 'SSXC391', 'aktif'),
(67, 30, 27, 28, 35000, 2, 1, 'SSXC4011', 'aktif'),
(68, 31, 22, 13, 25000, 2, 1, 'SSOHI351', 'aktif'),
(69, 31, 23, 13, 25000, 2, 1, 'SSOHI361', 'aktif'),
(70, 31, 24, 13, 25000, 2, 1, 'SSOHI371', 'aktif'),
(71, 31, 3, 13, 25000, 1, 1, 'SSOHI381', 'aktif'),
(72, 31, 26, 13, 25000, 2, 1, 'SSOHI391', 'aktif'),
(73, 31, 27, 13, 25000, 2, 1, 'SSOHI4011', 'aktif'),
(74, 32, 22, 17, 25000, 2, 1, 'SSNE1B351', 'aktif'),
(75, 32, 23, 17, 25000, 2, 1, 'SSNE1B361', 'aktif'),
(76, 32, 24, 17, 25000, 2, 1, 'SSNE1B371', 'aktif'),
(77, 32, 3, 17, 25000, 0, 1, 'SSNE1B381', 'aktif'),
(78, 32, 26, 17, 25000, 2, 1, 'SSNE1B391', 'aktif'),
(79, 32, 27, 17, 25000, 2, 1, 'SSNE1B4011', 'aktif'),
(80, 33, 22, 3, 20000, 2, 1, 'SNE1H351', 'aktif'),
(81, 33, 23, 3, 20000, 0, 1, 'SNE1H361', 'aktif'),
(82, 33, 24, 3, 20000, 2, 1, 'SNE1H371', 'aktif'),
(83, 33, 3, 3, 20000, 2, 1, 'SNE1H381', 'aktif'),
(84, 33, 26, 3, 20000, 2, 1, 'SNE1H391', 'aktif'),
(85, 33, 27, 3, 20000, 2, 1, 'SNE1H4011', 'aktif'),
(86, 34, 22, 25, 3000, 2, 1, 'SNE2P1351', 'aktif'),
(87, 34, 23, 25, 3000, 2, 1, 'SNE2P1361', 'aktif'),
(88, 34, 24, 25, 3000, 0, 1, 'SNE2P1371', 'aktif'),
(89, 34, 3, 25, 3000, 2, 1, 'SNE2P1381', 'aktif'),
(90, 34, 26, 25, 3000, 0, 1, 'SNE2P1391', 'aktif'),
(91, 34, 27, 25, 3000, 0, 1, 'SNE2P14011', 'aktif'),
(92, 35, 22, 12, 1500, 1, 1, 'SARBT351', 'aktif'),
(93, 35, 23, 12, 1500, 2, 1, 'SARBT361', 'aktif'),
(94, 35, 24, 12, 1500, 2, 1, 'SARBT371', 'aktif'),
(95, 35, 3, 12, 1500, 2, 1, 'SARBT381', 'aktif'),
(96, 35, 26, 12, 1500, 1, 1, 'SARBT391', 'aktif'),
(97, 35, 27, 12, 1500, 0, 1, 'SARBT4011', 'aktif'),
(98, 36, 17, 23, 4500, 9, 1, 'K1M1O401', 'aktif'),
(100, 37, 29, 20, 75000, 6, 1, 'M1SOPUD1', 'aktif'),
(101, 38, 6, 20, 60000, 6, 1, 'M1AIPUK1', 'aktif'),
(102, 38, 29, 20, 100000, 4, 1, 'M1AIPUD1', 'aktif'),
(103, 39, 29, 20, 125000, 6, 1, 'M1HLPUD1', 'aktif'),
(104, 40, 29, 20, 160000, 6, 1, 'M1LPUD1', 'aktif'),
(105, 41, 6, 1, 9000, 4, 1, 'GKPRMK1', 'aktif'),
(106, 41, 6, 2, 9000, 4, 1, 'GKPRKK1', 'aktif'),
(107, 41, 6, 3, 9000, 4, 1, 'GKPRHK1', 'aktif'),
(108, 42, 7, 1, 12000, 10, 1, 'JSP1MSD1', 'aktif'),
(109, 42, 7, 2, 12000, 10, 1, 'JSP1KSD1', 'aktif'),
(110, 42, 7, 3, 12000, 10, 1, 'JSP1HSD1', 'aktif'),
(111, 42, 7, 17, 12000, 10, 1, 'JSP1BSD1', 'aktif'),
(112, 42, 7, 16, 12000, 8, 1, 'JSP1USD1', 'aktif'),
(113, 42, 7, 7, 12000, 7, 1, 'JSP1JSD1', 'aktif'),
(114, 42, 7, 15, 12000, 4, 1, 'JSP1NSD1', 'aktif'),
(115, 42, 7, 28, 12000, 10, 1, 'JSP1CSD1', 'aktif'),
(116, 43, 6, 13, 1000, 12, 1, 'P1GHIK1', 'aktif'),
(117, 43, 7, 13, 7500, 12, 1, 'P1GHISD1', 'aktif'),
(118, 43, 8, 13, 15000, 11, 1, 'P1GHIB1', 'aktif'),
(119, 44, 6, 1, 2000, 0, 1, 'KF1TMMK1', 'aktif'),
(120, 44, 6, 7, 2000, 1, 1, 'KF1TMJK1', 'aktif'),
(121, 44, 6, 2, 2000, 6, 1, 'KF1TMKK1', 'aktif'),
(122, 44, 6, 8, 2000, 6, 1, 'KF1TMHMK1', 'aktif'),
(123, 44, 6, 11, 2000, 3, 1, 'KF1TMBMK1', 'aktif'),
(124, 44, 6, 15, 2000, 1, 1, 'KF1TMNK1', 'aktif'),
(125, 44, 6, 16, 2000, 2, 1, 'KF1TMUK1', 'aktif'),
(126, 44, 6, 13, 2000, 6, 1, 'KF1TMHIK1', 'aktif'),
(127, 44, 6, 20, 2000, 6, 1, 'KF1TMPUK1', 'aktif'),
(128, 44, 6, 25, 2000, 4, 1, 'KF1TMP1K1', 'aktif'),
(129, 44, 6, 23, 2000, 6, 1, 'KF1TMOK1', 'aktif'),
(130, 44, 6, 9, 2000, 0, 1, 'KF1TMHTK1', 'aktif'),
(131, 44, 6, 12, 2000, 6, 1, 'KF1TMBTK1', 'aktif'),
(132, 44, 6, 3, 2000, 6, 1, 'KF1TMHK1', 'aktif'),
(133, 44, 6, 17, 2000, 6, 1, 'KF1TMBK1', 'aktif'),
(134, 45, 6, 20, 200, 50, 1, 'AMEMRPUK1', 'aktif'),
(135, 46, 6, 20, 9000, 4, 1, 'AMDMRPUK1', 'aktif'),
(136, 45, 7, 20, 250, 30, 1, 'AMEMRPUSD1', 'aktif'),
(137, 45, 8, 20, 500, 40, 1, 'AMEMRPUB1', 'aktif'),
(138, 46, 7, 20, 12500, 4, 1, 'AMDMRPUSD1', 'aktif'),
(139, 46, 8, 20, 25000, 4, 1, 'AMDMRPUB1', 'aktif'),
(140, 47, 6, 20, 250, 20, 1, 'AMEPLPUK1', 'aktif'),
(141, 47, 7, 20, 500, 40, 1, 'AMEPLPUSD1', 'aktif'),
(142, 47, 8, 20, 750, 50, 1, 'AMEPLPUB1', 'aktif'),
(143, 48, 6, 20, 12500, 2, 1, 'AMDPLPUK1', 'aktif'),
(144, 48, 7, 20, 25000, 2, 1, 'AMDPLPUSD1', 'aktif'),
(145, 48, 8, 20, 37500, 2, 1, 'AMDPLPUB1', 'aktif'),
(146, 49, 6, 6, 1500, 1, 1, 'BMECWWK1', 'aktif'),
(147, 49, 7, 6, 2500, 5, 1, 'BMECWWSD1', 'aktif'),
(148, 49, 8, 6, 3000, 7, 1, 'BMECWWB1', 'aktif'),
(149, 50, 30, 6, 15000, 10, 1, 'CRTWW121', 'aktif'),
(150, 50, 31, 6, 24000, 6, 1, 'CRTWW241', 'aktif'),
(151, 50, 33, 6, 36000, 5, 1, 'CRTWW481', 'aktif'),
(152, 50, 34, 6, 50000, 6, 1, 'CRTWW561', 'aktif'),
(153, 50, 35, 6, 62000, 6, 1, 'CRTWW721', 'aktif'),
(154, 50, 36, 6, 72000, 6, 1, 'CRTWW1281', 'aktif'),
(155, 51, 30, 6, 12000, 24, 1, 'CRDBWW121', 'aktif'),
(156, 51, 32, 6, 15000, 6, 1, 'CRDBWW181', 'aktif'),
(157, 51, 31, 6, 20000, 6, 1, 'CRDBWW241', 'aktif'),
(158, 52, 37, 27, 3500, 7, 1, 'PGBTB130C1', 'aktif'),
(159, 53, 7, 13, 1200, 82, 1, 'BPSTHISD1', 'aktif'),
(160, 54, 7, 14, 1500, 23, 1, 'BPSCAASD1', 'aktif'),
(161, 55, 7, 27, 2500, 6, 1, 'BPSNB1SD1', 'aktif'),
(162, 56, 7, 13, 1000, 64, 1, 'BPZPHISD1', 'aktif'),
(163, 57, 7, 9, 3500, 8, 1, 'P2BFCHTSD1', 'aktif'),
(164, 58, 7, 17, 3500, 46, 1, 'P2BSTDBSD1', 'aktif'),
(165, 59, 7, 20, 2000, 8, 1, 'PHFCPUSD1', 'aktif'),
(166, 60, 7, 20, 2000, 20, 1, 'PHSTDPUSD1', 'aktif'),
(167, 61, 18, 23, 18000, 6, 1, 'PGTO501', 'aktif'),
(168, 62, 20, 13, 16000, 6, 1, 'PCSHI100M1', 'aktif'),
(169, 62, 20, 20, 16000, 6, 1, 'PCSPU100M1', 'aktif'),
(170, 63, 7, 12, 27500, 8, 1, 'AQMDBTSD1', 'aktif'),
(171, 63, 6, 12, 20000, 8, 1, 'AQMDBTK1', 'aktif'),
(172, 64, 7, 14, 3000, 12, 1, 'JKC1AASD1', 'aktif'),
(173, 64, 8, 14, 4500, 12, 1, 'JKC1AAB1', 'aktif'),
(174, 65, 7, 21, 25000, 0, 1, 'AQMBESD1', 'aktif'),
(175, 65, 6, 21, 15000, 3, 1, 'AQMBEK1', 'aktif'),
(176, 65, 8, 21, 35000, 2, 1, 'AQMBEB1', 'aktif'),
(177, 66, 6, 6, 6500, 60, 1, 'PMKWWK1', 'aktif'),
(178, 67, 11, 20, 60000, 6, 1, 'BKAAPUXL1', 'aktif'),
(179, 68, 13, 13, 75000, 2, 1, 'BKMZHIM1', 'aktif'),
(180, 69, 12, 12, 65000, 12, 1, 'BKMMBTXXL1', 'aktif'),
(181, 70, 7, 11, 1000, 22, 1, 'P2BKBMSD1', 'aktif'),
(182, 70, 7, 25, 1000, 24, 1, 'P2BKP1SD1', 'aktif'),
(183, 70, 7, 23, 1000, 4, 1, 'P2BKOSD1', 'aktif'),
(184, 71, 7, 6, 1000, 3, 1, 'MGSNWWSD1', 'aktif'),
(185, 73, 7, 6, 2000, 42, 1, 'BPDRWWSD1', 'aktif'),
(186, 74, 7, 30, 2000, 48, 1, 'BPPR1KASD1', 'aktif'),
(187, 75, 7, 6, 1500, 20, 1, 'PHMKWWSD1', 'aktif'),
(188, 76, 6, 27, 1000, 69, 1, 'LBTMB1K1', 'aktif'),
(189, 76, 7, 27, 1500, 72, 1, 'LBTMB1SD1', 'aktif'),
(190, 77, 6, 21, 5500, 11, 1, 'BRCEK1', 'aktif'),
(191, 77, 7, 21, 8000, 7, 1, 'BRCESD1', 'aktif'),
(192, 77, 8, 21, 12000, 11, 1, 'BRCEB1', 'aktif'),
(193, 78, 7, 13, 5000, 12, 1, 'RTTMHISD1', 'aktif'),
(194, 78, 7, 20, 5000, 12, 1, 'RTTMPUSD1', 'aktif'),
(195, 79, 38, 1, 20000, 2, 1, 'LPRFM30M1', 'aktif'),
(196, 80, 38, 1, 10000, 12, 1, 'LPMWM30M1', 'aktif'),
(197, 81, 38, 1, 15000, 12, 1, 'LPLCM30M1', 'aktif'),
(202, 82, 6, 1, 3000, 6, 1, 'TTCLMK1', 'aktif'),
(203, 82, 6, 7, 3000, 6, 1, 'TTCLJK1', 'aktif'),
(204, 82, 6, 2, 3000, 6, 1, 'TTCLKK1', 'aktif'),
(205, 82, 6, 3, 3000, 6, 1, 'TTCLHK1', 'aktif'),
(206, 82, 6, 17, 3000, 6, 1, 'TTCLBK1', 'aktif'),
(207, 82, 6, 15, 3000, 0, 1, 'TTCLNK1', 'aktif'),
(208, 82, 6, 16, 3000, 6, 1, 'TTCLUK1', 'aktif'),
(209, 82, 6, 12, 3000, 6, 1, 'TTCLBTK1', 'aktif'),
(210, 82, 6, 11, 3000, 6, 1, 'TTCLBMK1', 'aktif'),
(211, 82, 6, 9, 3000, 6, 1, 'TTCLHTK1', 'aktif'),
(212, 82, 6, 8, 3000, 6, 1, 'TTCLHMK1', 'aktif'),
(213, 82, 6, 25, 3000, 6, 1, 'TTCLP1K1', 'aktif'),
(214, 82, 6, 19, 3000, 6, 1, 'TTCLUTK1', 'aktif'),
(215, 82, 6, 18, 3000, 6, 1, 'TTCLUMK1', 'aktif'),
(216, 82, 6, 20, 3000, 6, 1, 'TTCLPUK1', 'aktif'),
(217, 82, 6, 13, 3000, 6, 1, 'TTCLHIK1', 'aktif'),
(218, 83, 6, 1, 4000, 6, 1, 'KCS1MK1', 'aktif'),
(219, 83, 6, 2, 4000, 6, 1, 'KCS1KK1', 'aktif'),
(220, 83, 6, 3, 4000, 6, 1, 'KCS1HK1', 'aktif'),
(221, 83, 6, 16, 4000, 18, 1, 'KCS1UK1', 'aktif'),
(222, 83, 6, 23, 4000, 6, 1, 'KCS1OK1', 'aktif'),
(223, 83, 6, 17, 4000, 6, 1, 'KCS1BK1', 'aktif'),
(224, 83, 6, 13, 4000, 6, 1, 'KCS1HIK1', 'aktif'),
(225, 83, 6, 20, 4000, 6, 1, 'KCS1PUK1', 'aktif'),
(226, 84, 6, 25, 1000, 48, 1, 'TPAP1K1', 'aktif'),
(227, 84, 6, 16, 1000, 48, 1, 'TPAUK1', 'aktif'),
(228, 85, 7, 6, 36500, 12, 1, 'EHPWWSD1', 'aktif'),
(229, 86, 6, 6, 25000, 0, 1, 'EHVWWK1', 'aktif'),
(230, 87, 7, 6, 22500, 4, 1, 'PWFCWWSD1', 'aktif'),
(231, 88, 7, 6, 18000, 24, 1, 'PWKIWWSD1', 'aktif'),
(232, 89, 6, 20, 1000, 60, 1, 'TGTMPUK1', 'aktif'),
(233, 90, 6, 1, 4500, 24, 1, 'TXKKMK1', 'aktif'),
(234, 90, 7, 1, 5500, 10, 1, 'TXKKMSD1', 'aktif'),
(235, 91, 6, 17, 1200, 12, 1, 'JRCBK1', 'aktif'),
(236, 91, 6, 23, 1200, 8, 1, 'JRCOK1', 'aktif'),
(237, 91, 6, 1, 1200, 12, 1, 'JRCMK1', 'aktif'),
(238, 91, 7, 1, 1500, 12, 1, 'JRCMSD1', 'aktif'),
(239, 91, 7, 25, 1500, 12, 1, 'JRCP1SD1', 'aktif'),
(240, 91, 7, 16, 1500, 12, 1, 'JRCUSD1', 'aktif'),
(241, 91, 8, 16, 1800, 12, 1, 'JRCUB1', 'aktif'),
(242, 91, 8, 3, 1800, 12, 1, 'JRCHB1', 'aktif'),
(243, 91, 8, 17, 1800, 12, 1, 'JRCBB1', 'aktif'),
(244, 91, 39, 25, 2000, 12, 1, 'JRCP1J1', 'aktif'),
(245, 91, 39, 13, 2000, 12, 1, 'JRCHIJ1', 'aktif'),
(246, 91, 39, 1, 2000, 12, 1, 'JRCMJ1', 'aktif'),
(247, 92, 6, 13, 1000, 2, 1, 'TRCHIK1', 'aktif'),
(248, 92, 6, 1, 1000, 12, 1, 'TRCMK1', 'aktif'),
(249, 92, 6, 23, 1000, 2, 1, 'TRCOK1', 'aktif'),
(250, 92, 6, 16, 1000, 12, 1, 'TRCUK1', 'aktif'),
(251, 92, 6, 17, 1000, 2, 1, 'TRCBK1', 'aktif'),
(252, 92, 6, 28, 1000, 12, 1, 'TRCCK1', 'aktif'),
(253, 93, 7, 1, 10000, 12, 1, 'CLTMMSD1', 'aktif'),
(254, 94, 6, 6, 1000, 20, 1, 'UUKWWK1', 'aktif'),
(255, 95, 6, 3, 1500, 4, 1, 'BK1CHK1', 'aktif'),
(256, 95, 6, 17, 1500, 4, 1, 'BK1CBK1', 'aktif'),
(257, 95, 6, 1, 1500, 4, 1, 'BK1CMK1', 'aktif'),
(258, 95, 6, 23, 1500, 4, 1, 'BK1COK1', 'aktif'),
(259, 95, 8, 3, 2500, 2, 1, 'BK1CHB1', 'aktif'),
(260, 95, 8, 17, 2500, 2, 1, 'BK1CBB1', 'aktif'),
(261, 95, 8, 1, 2500, 2, 1, 'BK1CMB1', 'aktif'),
(262, 95, 8, 23, 2500, 2, 1, 'BK1COB1', 'aktif'),
(263, 95, 39, 3, 3500, 4, 1, 'BK1CHJ1', 'aktif'),
(264, 95, 39, 1, 3500, 4, 1, 'BK1CMJ1', 'aktif'),
(265, 96, 6, 22, 500, 100, 1, 'RCCSK1', 'aktif'),
(266, 53, 7, 13, 1200, 48, 1, 'BPSTHISD1', 'aktif'),
(267, 54, 7, 14, 1500, 48, 1, 'BPSCAASD1', 'aktif'),
(268, 99, 7, 13, 2500, 32, 1, 'BPFGHISD1', 'aktif'),
(269, 100, 7, 14, 3000, 38, 1, 'BPGRAASD1', 'aktif'),
(270, 91, 7, 17, 1700, 14, 1, 'JRCBSD1', 'aktif'),
(271, 91, 8, 13, 3500, 2, 1, 'JRCHIB1', 'aktif'),
(272, 91, 6, 1, 1500, 6, 1, 'JRCMK1', 'aktif'),
(273, 91, 6, 23, 1500, 6, 1, 'JRCOK1', 'aktif'),
(274, 91, 6, 17, 1500, 6, 1, 'JRCBK1', 'aktif'),
(275, 102, 6, 1, 1000, 0, 1, 'TRKMK1', 'aktif'),
(276, 102, 6, 2, 1000, 12, 1, 'TRKKK1', 'aktif'),
(277, 102, 6, 23, 1000, 8, 1, 'TRKOK1', 'aktif'),
(278, 102, 6, 3, 1000, 2, 1, 'TRKHK1', 'aktif'),
(279, 102, 6, 16, 1000, 12, 1, 'TRKUK1', 'aktif'),
(280, 102, 6, 25, 1000, 12, 1, 'TRKP1K1', 'aktif'),
(281, 102, 6, 28, 1000, 12, 1, 'TRKCK1', 'aktif'),
(282, 102, 6, 13, 1000, 12, 1, 'TRKHIK1', 'aktif'),
(283, 102, 7, 1, 1500, 12, 1, 'TRKMSD1', 'aktif'),
(284, 102, 7, 13, 1500, 12, 1, 'TRKHISD1', 'aktif'),
(285, 102, 7, 2, 1500, 12, 1, 'TRKKSD1', 'aktif'),
(286, 102, 7, 11, 1500, 12, 1, 'TRKBMSD1', 'aktif'),
(287, 102, 7, 17, 1500, 12, 1, 'TRKBSD1', 'aktif'),
(288, 102, 7, 16, 1500, 12, 1, 'TRKUSD1', 'aktif'),
(289, 102, 7, 18, 1500, 12, 1, 'TRKUMSD1', 'aktif'),
(290, 102, 7, 22, 1500, 12, 1, 'TRKSSD1', 'aktif'),
(291, 102, 7, 3, 1500, 12, 1, 'TRKHSD1', 'aktif'),
(292, 102, 8, 2, 2000, 12, 1, 'TRKKB1', 'aktif'),
(293, 102, 8, 17, 2000, 12, 1, 'TRKBB1', 'aktif'),
(294, 102, 8, 1, 2000, 12, 1, 'TRKMB1', 'aktif'),
(295, 102, 8, 28, 2000, 12, 1, 'TRKCB1', 'aktif'),
(296, 102, 8, 23, 2000, 2, 1, 'TRKOB1', 'aktif'),
(297, 102, 8, 13, 2000, 12, 1, 'TRKHIB1', 'aktif'),
(298, 103, 7, 17, 22000, 12, 1, 'TPKKBSD1', 'aktif'),
(299, 103, 7, 1, 22000, 12, 1, 'TPKKMSD1', 'aktif'),
(300, 103, 7, 23, 22000, 0, 1, 'TPKKOSD1', 'aktif'),
(301, 103, 7, 3, 22000, 2, 1, 'TPKKHSD1', 'aktif'),
(302, 103, 7, 16, 22000, 12, 1, 'TPKKUSD1', 'aktif'),
(303, 103, 7, 13, 22000, 0, 1, 'TPKKHISD1', 'aktif'),
(304, 104, 7, 13, 18000, 2, 1, 'TPJHISD1', 'aktif'),
(305, 104, 7, 1, 18000, 12, 1, 'TPJMSD1', 'aktif'),
(306, 104, 7, 16, 18000, 12, 1, 'TPJUSD1', 'aktif'),
(307, 104, 7, 17, 18000, 9, 1, 'TPJBSD1', 'aktif'),
(308, 105, 7, 1, 35000, 12, 1, 'TPCSIMSD1', 'aktif'),
(309, 105, 7, 2, 35000, 12, 1, 'TPCSIKSD1', 'aktif'),
(310, 105, 7, 17, 35000, 12, 1, 'TPCSIBSD1', 'aktif'),
(311, 106, 43, 1, 1000, 100, 1, 'MGRTMM11', 'aktif'),
(312, 106, 44, 1, 2000, 93, 1, 'MGRTMM21', 'aktif'),
(313, 106, 45, 1, 3000, 90, 1, 'MGRTMM31', 'aktif'),
(314, 107, 6, 16, 1000, 100, 1, 'PDLTMUK1', 'aktif'),
(315, 108, 6, 16, 1000, 100, 1, 'PDPTMUK1', 'aktif'),
(316, 109, 6, 28, 1000, 90, 1, 'TKLTMCK1', 'aktif'),
(317, 110, 6, 16, 1000, 100, 1, 'TKPTMUK1', 'aktif'),
(318, 111, 6, 32, 1000, 100, 1, 'RGTMMWK1', 'aktif'),
(319, 111, 6, 33, 1000, 100, 1, 'RGTMMTK1', 'aktif'),
(320, 111, 6, 34, 1000, 100, 1, 'RGTMAGK1', 'aktif'),
(321, 111, 6, 35, 1000, 90, 1, 'RGTMDHK1', 'aktif'),
(322, 111, 6, 36, 1000, 77, 1, 'RGTMBGK1', 'aktif'),
(323, 111, 6, 37, 1000, 100, 1, 'RGTMFBK1', 'aktif'),
(324, 111, 6, 38, 1000, 4, 1, 'RGTMLYK1', 'aktif'),
(325, 111, 6, 39, 1000, 100, 1, 'RGTMTRK1', 'aktif'),
(326, 111, 6, 40, 1000, 70, 1, 'RGTMNIK1', 'aktif'),
(327, 111, 6, 41, 1000, 100, 1, 'RGTMASK1', 'aktif'),
(328, 111, 6, 42, 1000, 100, 1, 'RGTMWKK1', 'aktif'),
(329, 111, 6, 43, 1000, 100, 1, 'RGTMSKK1', 'aktif'),
(330, 111, 6, 44, 1000, 100, 1, 'RGTMTPK1', 'aktif'),
(331, 111, 6, 45, 1000, 70, 1, 'RGTMSPK1', 'aktif'),
(332, 111, 6, 46, 1000, 100, 1, 'RGTMMT1K1', 'aktif'),
(333, 111, 6, 47, 1000, 90, 1, 'RGTMBT2K1', 'aktif'),
(334, 111, 6, 48, 1000, 88, 1, 'RGTMGJK1', 'aktif'),
(335, 111, 6, 49, 1000, 68, 1, 'RGTMJRK1', 'aktif'),
(336, 111, 6, 50, 1000, 90, 1, 'RGTMLBK1', 'aktif'),
(337, 111, 6, 51, 1000, 60, 1, 'RGTMHRK1', 'aktif'),
(338, 111, 6, 52, 1000, 90, 1, 'RGTMSGK1', 'aktif'),
(339, 111, 6, 53, 1000, 74, 1, 'RGTMSMK1', 'aktif'),
(340, 111, 6, 54, 1000, 90, 1, 'RGTMBDK1', 'aktif'),
(341, 111, 6, 55, 1000, 80, 1, 'RGTMGDK1', 'aktif'),
(342, 111, 6, 56, 1000, 70, 1, 'RGTMELK1', 'aktif'),
(343, 111, 6, 57, 1000, 90, 1, 'RGTMKBK1', 'aktif'),
(344, 111, 6, 58, 1000, 80, 1, 'RGTMSCK1', 'aktif'),
(345, 111, 6, 59, 1000, 70, 1, 'RGTMKTK1', 'aktif'),
(346, 111, 6, 60, 1000, 100, 1, 'RGTMSRK1', 'aktif'),
(347, 111, 6, 61, 1000, 96, 1, 'RGTMRWK1', 'aktif'),
(348, 112, 6, 62, 1000, 100, 1, 'TLTMKBMK1', 'aktif'),
(349, 112, 6, 63, 2000, 90, 1, 'TLTMJTK1', 'aktif'),
(350, 113, 6, 65, 2000, 100, 1, 'PRTMSDK1', 'aktif'),
(351, 114, 6, 64, 1000, 96, 1, 'WPTMSSK1', 'aktif'),
(352, 115, 6, 20, 2000, 96, 1, 'TLPTMPUK1', 'aktif'),
(353, 115, 7, 20, 3000, 80, 1, 'TLPTMPUSD1', 'aktif'),
(354, 115, 8, 20, 4500, 100, 1, 'TLPTMPUB1', 'aktif'),
(355, 115, 39, 20, 6000, 19, 1, 'TLPTMPUJ1', 'aktif'),
(356, 116, 6, 66, 8000, 77, 1, 'HSDTMMPK1', 'aktif'),
(357, 116, 7, 66, 12000, 50, 1, 'HSDTMMPSD1', 'aktif'),
(358, 116, 8, 66, 15000, 65, 1, 'HSDTMMPB1', 'aktif'),
(359, 116, 39, 66, 17000, 80, 1, 'HSDTMMPJ1', 'aktif'),
(360, 117, 7, 67, 5000, 86, 1, 'BDSTMMKSD1', 'aktif'),
(361, 118, 7, 16, 5000, 90, 1, 'BPDTMUSD1', 'aktif'),
(362, 119, 6, 69, 1500, 43, 1, 'SGTMPRK1', 'aktif'),
(363, 119, 6, 68, 1500, 84, 1, 'SGTMPCK1', 'aktif'),
(364, 119, 6, 70, 1500, 7, 1, 'SGTMPDK1', 'aktif'),
(365, 119, 6, 71, 1500, 30, 1, 'SGTMPNK1', 'aktif'),
(366, 119, 6, 72, 1500, 40, 1, 'SGTMPKK1', 'aktif'),
(367, 120, 6, 3, 1500, 470, 1, 'RITMHK1', 'aktif'),
(368, 120, 6, 1, 1500, 470, 1, 'RITMMK1', 'aktif'),
(369, 120, 6, 2, 1500, 480, 1, 'RITMKK1', 'aktif'),
(370, 120, 6, 73, 1500, 370, 1, 'RITMPBK1', 'aktif'),
(371, 121, 6, 3, 10000, 4, 1, 'TKTMHK1', 'aktif'),
(372, 121, 6, 1, 10000, 17, 1, 'TKTMMK1', 'aktif'),
(373, 121, 6, 2, 10000, 14, 1, 'TKTMKK1', 'aktif'),
(374, 122, 6, 1, 2500, 6, 1, 'PLTPPMK1', 'aktif'),
(375, 122, 6, 2, 2500, 8, 1, 'PLTPPKK1', 'aktif'),
(376, 122, 6, 3, 2500, 4, 1, 'PLTPPHK1', 'aktif'),
(377, 122, 6, 20, 2500, 0, 1, 'PLTPPPUK1', 'aktif'),
(378, 123, 40, 13, 6000, 4, 1, 'KKISTRHISD11', 'aktif'),
(379, 123, 40, 20, 6000, 5, 1, 'KKISTRPUSD11', 'aktif'),
(380, 123, 41, 13, 9000, 4, 1, 'KKISTRHISMP1', 'aktif'),
(381, 123, 41, 20, 9000, 6, 1, 'KKISTRPUSMP1', 'aktif'),
(382, 123, 42, 13, 12000, 6, 1, 'KKISTRHISMA1', 'aktif'),
(383, 123, 42, 20, 12000, 9, 1, 'KKISTRPUSMA1', 'aktif'),
(384, 124, 40, 13, 4500, 2, 1, 'KKISCHHISD11', 'aktif'),
(385, 124, 40, 20, 4500, 1, 1, 'KKISCHPUSD11', 'aktif'),
(386, 124, 41, 13, 6500, 4, 1, 'KKISCHHISMP1', 'aktif'),
(387, 124, 41, 20, 6500, 9, 1, 'KKISCHPUSMP1', 'aktif'),
(388, 124, 42, 13, 7500, 4, 1, 'KKISCHHISMA1', 'aktif'),
(389, 124, 42, 20, 7500, 5, 1, 'KKISCHPUSMA1', 'aktif'),
(390, 125, 7, 1, 12000, 6, 1, 'KKITLMSD1', 'aktif'),
(391, 125, 7, 17, 12000, 2, 1, 'KKITLBSD1', 'aktif'),
(392, 125, 7, 16, 12000, 2, 1, 'KKITLUSD1', 'aktif'),
(393, 125, 7, 23, 12000, 0, 1, 'KKITLOSD1', 'aktif'),
(394, 125, 7, 25, 12000, 3, 1, 'KKITLP1SD1', 'aktif'),
(395, 125, 7, 28, 12000, 2, 1, 'KKITLCSD1', 'aktif'),
(396, 126, 7, 13, 12000, 2, 1, 'KKISKHISD1', 'aktif'),
(397, 126, 7, 1, 12000, 2, 1, 'KKISKMSD1', 'aktif'),
(398, 126, 7, 17, 12000, 2, 1, 'KKISKBSD1', 'aktif'),
(399, 126, 7, 2, 12000, 3, 1, 'KKISKKSD1', 'aktif'),
(400, 126, 7, 23, 12000, 4, 1, 'KKISKOSD1', 'aktif'),
(401, 126, 7, 16, 12000, 0, 1, 'KKISKUSD1', 'aktif'),
(402, 126, 7, 25, 12000, 0, 1, 'KKISKP1SD1', 'aktif'),
(403, 127, 18, 25, 5000, 3, 1, 'HBMRIP1501', 'aktif'),
(404, 127, 18, 16, 5000, 1, 1, 'HBMRIU501', 'aktif'),
(405, 128, 18, 25, 8000, 2, 1, 'PFRP1501', 'aktif'),
(406, 128, 18, 17, 8000, 1, 1, 'PFRB501', 'aktif'),
(407, 128, 18, 16, 8000, 1, 1, 'PFRU501', 'aktif'),
(408, 129, 20, 2, 9000, 0, 1, 'HBCTK100M1', 'aktif'),
(409, 129, 20, 25, 9000, 1, 1, 'HBCTP1100M1', 'aktif'),
(410, 129, 20, 3, 9000, 2, 1, 'HBCTH100M1', 'aktif'),
(411, 130, 20, 16, 6500, 0, 1, 'LRSU100M1', 'aktif'),
(412, 130, 20, 3, 6500, 0, 1, 'LRSH100M1', 'aktif'),
(413, 130, 20, 17, 6500, 0, 1, 'LRSB100M1', 'aktif'),
(414, 131, 43, 2, 60000, 3, 1, 'BDKWK11', 'aktif'),
(415, 131, 44, 2, 60000, 0, 1, 'BDKWK21', 'aktif'),
(416, 131, 45, 2, 60000, 4, 1, 'BDKWK31', 'aktif'),
(417, 131, 46, 2, 60000, 2, 1, 'BDKWK41', 'aktif'),
(418, 132, 6, 25, 8000, 1, 1, 'BDKMRIP1K1', 'aktif'),
(419, 133, 3, 30, 19000, 64, 1, 'BTDSDKA381', 'aktif'),
(420, 133, 4, 30, 28000, 67, 1, 'BTDSDKA581', 'aktif'),
(421, 134, 3, 30, 2000, 54, 1, 'BTESDKA381', 'aktif'),
(422, 134, 4, 30, 3000, 2, 1, 'BTESDKA581', 'aktif'),
(423, 135, 3, 30, 25000, 19, 1, 'BTDKKA381', 'aktif'),
(424, 136, 3, 30, 2500, 2, 1, 'BTEKKA381', 'aktif'),
(425, 137, 3, 30, 17000, 9, 1, 'BTDSKLKA381', 'aktif'),
(426, 137, 4, 30, 25000, 1, 1, 'BTDSKLKA581', 'aktif'),
(427, 138, 3, 30, 2000, 9, 1, 'BTESKLKA381', 'aktif'),
(428, 138, 4, 30, 2500, 1, 1, 'BTESKLKA581', 'aktif'),
(429, 139, 2, 30, 18000, 4, 1, 'BTDBBKA421', 'aktif'),
(430, 140, 2, 30, 3500, 46, 1, 'BTEBBKA421', 'aktif'),
(431, 1, 7, 21, 35000, 0, 2, 'JDQ2ESD2', 'aktif'),
(432, 2, 7, 22, 40000, 1, 2, 'JDQ2SSD2', 'aktif'),
(433, 3, 7, 17, 1500, 10, 2, 'BABCBSD2', 'aktif'),
(434, 3, 8, 17, 3500, 2, 2, 'BABCBB2', 'aktif'),
(435, 4, 7, 6, 15000, 9, 2, 'BBJWWSD2', 'aktif'),
(436, 5, 7, 6, 17000, 4, 2, 'BBKWWSD2', 'aktif'),
(437, 6, 7, 6, 15000, 4, 2, 'BBCWWSD2', 'aktif'),
(438, 7, 7, 6, 3000, 0, 2, 'IBJWWSD2', 'aktif'),
(439, 8, 7, 6, 3500, 4, 2, 'IBKWWSD2', 'aktif'),
(440, 9, 7, 6, 7000, 6, 2, 'IBHWWSD2', 'aktif'),
(441, 10, 14, 20, 200, 4, 2, 'KFJPUA42', 'aktif'),
(442, 11, 7, 23, 8000, 8, 2, 'KH2OSD2', 'aktif'),
(443, 12, 7, 23, 12000, 2, 2, 'KH2OSD2', 'aktif'),
(444, 13, 7, 23, 12000, 0, 2, 'KROSD2', 'aktif'),
(445, 14, 7, 23, 6000, 2, 2, 'KCOSD2', 'aktif'),
(446, 15, 14, 24, 6000, 3, 2, 'CTMHPA42', 'aktif'),
(447, 16, 17, 25, 6000, 4, 2, 'PEP2402', 'aktif'),
(448, 16, 17, 17, 6000, 4, 2, 'PEB402', 'aktif'),
(449, 16, 17, 23, 6000, 22, 2, 'PEO402', 'aktif'),
(450, 16, 17, 3, 6000, 24, 2, 'PEH402', 'aktif'),
(451, 16, 17, 16, 6000, 24, 2, 'PEU402', 'aktif'),
(452, 17, 7, 2, 12000, 24, 2, 'MMKSD2', 'aktif'),
(453, 18, 20, 26, 12000, 2, 2, 'PLSPH200M2', 'aktif'),
(454, 19, 18, 25, 12000, 12, 2, 'PLPP2502', 'aktif'),
(455, 19, 18, 3, 12000, 12, 2, 'PLPH502', 'aktif'),
(456, 19, 18, 17, 12000, 12, 2, 'PLPB502', 'aktif'),
(457, 20, 14, 13, 1500, 25, 2, 'KKDHIA42', 'aktif'),
(458, 21, 7, 25, 8000, 0, 2, 'TPBP2SD2', 'aktif'),
(459, 21, 7, 17, 8000, 2, 2, 'TPBBSD2', 'aktif'),
(460, 21, 7, 3, 8000, 2, 2, 'TPBHSD2', 'aktif'),
(461, 21, 7, 23, 8000, 2, 2, 'TPBOSD2', 'aktif'),
(462, 21, 7, 16, 8000, 2, 2, 'TPBUSD2', 'aktif'),
(463, 21, 7, 1, 8000, 2, 2, 'TPBMSD2', 'aktif'),
(464, 22, 7, 6, 1000, 2, 2, 'JPTMWWSD2', 'aktif'),
(465, 23, 6, 6, 2500, 15, 2, 'JPCWWK2', 'aktif'),
(466, 23, 7, 6, 3000, 70, 2, 'JPCWWSD2', 'aktif'),
(467, 24, 7, 3, 3000, 10, 2, 'TBTMHSD2', 'aktif'),
(468, 25, 15, 6, 1000, 100, 2, 'KK2KWWA32', 'aktif'),
(469, 26, 6, 27, 1500, 5, 2, 'P2NB2K2', 'aktif'),
(470, 26, 7, 27, 7000, 1, 2, 'P2NB2SD2', 'aktif'),
(471, 26, 8, 27, 10000, 5, 2, 'P2NB2B2', 'aktif'),
(472, 27, 6, 27, 500, 20, 2, 'P2CB2K2', 'aktif'),
(473, 28, 21, 1, 3500, 10, 2, 'KCM252', 'aktif'),
(474, 28, 21, 7, 3500, 10, 2, 'KCJ252', 'aktif'),
(475, 28, 21, 2, 3500, 5, 2, 'KCK252', 'aktif'),
(476, 28, 21, 3, 3500, 10, 2, 'KCH252', 'aktif'),
(477, 28, 21, 17, 3500, 5, 2, 'KCB252', 'aktif'),
(478, 28, 21, 15, 3500, 6, 2, 'KCN252', 'aktif'),
(479, 28, 21, 16, 3500, 10, 2, 'KCU252', 'aktif'),
(480, 28, 21, 20, 3500, 10, 2, 'KCPU252', 'aktif'),
(481, 28, 21, 25, 3500, 10, 2, 'KCP2252', 'aktif'),
(482, 28, 21, 23, 3500, 5, 2, 'KCO252', 'aktif'),
(483, 29, 7, 25, 20000, 40, 2, 'HAP2SD2', 'aktif'),
(484, 29, 7, 11, 20000, 40, 2, 'HABMSD2', 'aktif'),
(485, 29, 6, 1, 16000, 0, 2, 'HAMK2', 'aktif'),
(486, 29, 6, 23, 16000, 30, 2, 'HAOK2', 'aktif'),
(487, 29, 8, 11, 30000, 10, 2, 'HABMB2', 'aktif'),
(488, 29, 8, 23, 30000, 10, 2, 'HAOB2', 'aktif'),
(489, 30, 22, 28, 35000, 1, 2, 'SSXC352', 'aktif'),
(490, 30, 23, 28, 35000, 1, 2, 'SSXC362', 'aktif'),
(491, 30, 24, 28, 35000, 1, 2, 'SSXC372', 'aktif'),
(492, 30, 3, 28, 35000, 1, 2, 'SSXC382', 'aktif'),
(493, 30, 26, 28, 35000, 1, 2, 'SSXC392', 'aktif'),
(494, 30, 27, 28, 35000, 1, 2, 'SSXC4022', 'aktif'),
(495, 31, 22, 13, 25000, 1, 2, 'SSOHI352', 'aktif'),
(496, 31, 23, 13, 25000, 0, 2, 'SSOHI362', 'aktif'),
(497, 31, 24, 13, 25000, 1, 2, 'SSOHI372', 'aktif'),
(498, 31, 3, 13, 25000, 1, 2, 'SSOHI382', 'aktif'),
(499, 31, 26, 13, 25000, 0, 2, 'SSOHI392', 'aktif'),
(500, 31, 27, 13, 25000, 1, 2, 'SSOHI4022', 'aktif'),
(501, 32, 22, 17, 25000, 2, 2, 'SSNE2B352', 'aktif'),
(502, 32, 23, 17, 25000, 2, 2, 'SSNE2B362', 'aktif'),
(503, 32, 24, 17, 25000, 2, 2, 'SSNE2B372', 'aktif'),
(504, 32, 3, 17, 25000, 2, 2, 'SSNE2B382', 'aktif'),
(505, 32, 26, 17, 25000, 2, 2, 'SSNE2B392', 'aktif'),
(506, 32, 27, 17, 25000, 2, 2, 'SSNE2B4022', 'aktif'),
(507, 33, 22, 3, 20000, 2, 2, 'SNE2H352', 'aktif'),
(508, 33, 23, 3, 20000, 2, 2, 'SNE2H362', 'aktif'),
(509, 33, 24, 3, 20000, 2, 2, 'SNE2H372', 'aktif'),
(510, 33, 3, 3, 20000, 2, 2, 'SNE2H382', 'aktif'),
(511, 33, 26, 3, 20000, 2, 2, 'SNE2H392', 'aktif'),
(512, 33, 27, 3, 20000, 2, 2, 'SNE2H4022', 'aktif'),
(513, 34, 22, 25, 3000, 2, 2, 'SNE2P2352', 'aktif'),
(514, 34, 23, 25, 3000, 0, 2, 'SNE2P2362', 'aktif'),
(515, 34, 24, 25, 3000, 2, 2, 'SNE2P2372', 'aktif'),
(516, 34, 3, 25, 3000, 2, 2, 'SNE2P2382', 'aktif'),
(517, 34, 26, 25, 3000, 2, 2, 'SNE2P2392', 'aktif'),
(518, 34, 27, 25, 3000, 2, 2, 'SNE2P24022', 'aktif'),
(519, 35, 22, 12, 1500, 2, 2, 'SARBT352', 'aktif'),
(520, 35, 23, 12, 1500, 2, 2, 'SARBT362', 'aktif'),
(521, 35, 24, 12, 1500, 2, 2, 'SARBT372', 'aktif'),
(522, 35, 3, 12, 1500, 2, 2, 'SARBT382', 'aktif'),
(523, 35, 26, 12, 1500, 2, 2, 'SARBT392', 'aktif'),
(524, 35, 27, 12, 1500, 2, 2, 'SARBT4022', 'aktif'),
(525, 36, 17, 23, 4500, 12, 2, 'K2M2O402', 'aktif'),
(526, 37, 29, 20, 75000, 12, 2, 'M2SOPUD2', 'aktif'),
(527, 38, 6, 20, 60000, 12, 2, 'M2AIPUK2', 'aktif'),
(528, 38, 29, 20, 100000, 11, 2, 'M2AIPUD2', 'aktif'),
(529, 39, 29, 20, 125000, 12, 2, 'M2HLPUD2', 'aktif'),
(530, 40, 29, 20, 160000, 10, 2, 'M2LPUD2', 'aktif'),
(531, 41, 6, 1, 9000, 22, 2, 'GKPRMK2', 'aktif'),
(532, 41, 6, 2, 9000, 10, 2, 'GKPRKK2', 'aktif'),
(533, 41, 6, 3, 9000, 12, 2, 'GKPRHK2', 'aktif'),
(534, 42, 7, 1, 12000, 6, 2, 'JSP2MSD2', 'aktif'),
(535, 42, 7, 2, 12000, 4, 2, 'JSP2KSD2', 'aktif'),
(536, 42, 7, 3, 12000, 6, 2, 'JSP2HSD2', 'aktif'),
(537, 42, 7, 17, 12000, 6, 2, 'JSP2BSD2', 'aktif'),
(538, 42, 7, 16, 12000, 3, 2, 'JSP2USD2', 'aktif'),
(539, 42, 7, 7, 12000, 6, 2, 'JSP2JSD2', 'aktif'),
(540, 42, 7, 15, 12000, 0, 2, 'JSP2NSD2', 'aktif'),
(541, 42, 7, 28, 12000, 2, 2, 'JSP2CSD2', 'aktif'),
(542, 43, 6, 13, 1000, 5, 2, 'P2GHIK2', 'aktif'),
(543, 43, 7, 13, 7500, 2, 2, 'P2GHISD2', 'aktif'),
(544, 43, 8, 13, 15000, 12, 2, 'P2GHIB2', 'aktif'),
(545, 44, 6, 1, 2000, 9, 2, 'KF2TMMK2', 'aktif'),
(546, 44, 6, 7, 2000, 9, 2, 'KF2TMJK2', 'aktif'),
(547, 44, 6, 2, 2000, 12, 2, 'KF2TMKK2', 'aktif'),
(548, 44, 6, 8, 2000, 9, 2, 'KF2TMHMK2', 'aktif'),
(549, 44, 6, 11, 2000, 2, 2, 'KF2TMBMK2', 'aktif'),
(550, 44, 6, 15, 2000, 2, 2, 'KF2TMNK2', 'aktif'),
(551, 44, 6, 16, 2000, 12, 2, 'KF2TMUK2', 'aktif'),
(552, 44, 6, 13, 2000, 12, 2, 'KF2TMHIK2', 'aktif'),
(553, 44, 6, 20, 2000, 12, 2, 'KF2TMPUK2', 'aktif'),
(554, 44, 6, 25, 2000, 12, 2, 'KF2TMP2K2', 'aktif'),
(555, 44, 6, 23, 2000, 12, 2, 'KF2TMOK2', 'aktif'),
(556, 44, 6, 9, 2000, 12, 2, 'KF2TMHTK2', 'aktif'),
(557, 44, 6, 12, 2000, 18, 2, 'KF2TMBTK2', 'aktif'),
(558, 44, 6, 3, 2000, 2, 2, 'KF2TMHK2', 'aktif'),
(559, 44, 6, 17, 2000, 36, 2, 'KF2TMBK2', 'aktif'),
(560, 45, 6, 20, 200, 70, 2, 'AMEMRPUK2', 'aktif'),
(561, 46, 6, 20, 9000, 2, 2, 'AMDMRPUK2', 'aktif'),
(562, 45, 7, 20, 250, 100, 2, 'AMEMRPUSD2', 'aktif'),
(563, 45, 8, 20, 500, 100, 2, 'AMEMRPUB2', 'aktif'),
(564, 46, 7, 20, 12500, 2, 2, 'AMDMRPUSD2', 'aktif'),
(565, 46, 8, 20, 25000, 2, 2, 'AMDMRPUB2', 'aktif'),
(566, 47, 6, 20, 250, 93, 2, 'AMEPLPUK2', 'aktif'),
(567, 47, 7, 20, 500, 100, 2, 'AMEPLPUSD2', 'aktif'),
(568, 47, 8, 20, 750, 90, 2, 'AMEPLPUB2', 'aktif'),
(569, 48, 6, 20, 12500, 2, 2, 'AMDPLPUK2', 'aktif'),
(570, 48, 7, 20, 25000, 2, 2, 'AMDPLPUSD2', 'aktif'),
(571, 48, 8, 20, 37500, 2, 2, 'AMDPLPUB2', 'aktif'),
(572, 49, 6, 6, 1500, 10, 2, 'BMECWWK2', 'aktif'),
(573, 49, 7, 6, 2500, 6, 2, 'BMECWWSD2', 'aktif'),
(574, 49, 8, 6, 3000, 0, 2, 'BMECWWB2', 'aktif'),
(575, 50, 30, 6, 15000, 10, 2, 'CRTWW222', 'aktif'),
(576, 50, 31, 6, 24000, 3, 2, 'CRTWW242', 'aktif'),
(577, 50, 33, 6, 36000, 2, 2, 'CRTWW482', 'aktif'),
(578, 50, 34, 6, 50000, 0, 2, 'CRTWW562', 'aktif'),
(579, 50, 35, 6, 62000, 1, 2, 'CRTWW722', 'aktif'),
(580, 50, 36, 6, 72000, 1, 2, 'CRTWW2282', 'aktif'),
(581, 51, 30, 6, 12000, 5, 2, 'CRDBWW222', 'aktif'),
(582, 51, 32, 6, 15000, 1, 2, 'CRDBWW282', 'aktif'),
(583, 51, 31, 6, 20000, 1, 2, 'CRDBWW242', 'aktif'),
(584, 52, 37, 27, 3500, 0, 2, 'PGBTB230C2', 'aktif'),
(585, 53, 7, 13, 1200, 14, 2, 'BPSTHISD2', 'aktif'),
(586, 54, 7, 14, 1500, 24, 2, 'BPSCAASD2', 'aktif'),
(587, 55, 7, 27, 2500, 8, 2, 'BPSNB2SD2', 'aktif'),
(588, 56, 7, 13, 1000, 4, 2, 'BPZPHISD2', 'aktif'),
(589, 57, 7, 9, 3500, 4, 2, 'P2BFCHTSD2', 'aktif'),
(590, 58, 7, 17, 3500, 19, 2, 'P2BSTDBSD2', 'aktif'),
(591, 59, 7, 20, 2000, 4, 2, 'PHFCPUSD2', 'aktif'),
(592, 60, 7, 20, 2000, 4, 2, 'PHSTDPUSD2', 'aktif'),
(593, 61, 18, 23, 18000, 7, 2, 'PGTO502', 'aktif'),
(594, 62, 20, 13, 16000, 8, 2, 'PCSHI200M2', 'aktif'),
(595, 62, 20, 20, 16000, 12, 2, 'PCSPU200M2', 'aktif'),
(596, 63, 7, 12, 27500, 0, 2, 'AQMDBTSD2', 'aktif'),
(597, 63, 6, 12, 20000, 2, 2, 'AQMDBTK2', 'aktif'),
(598, 64, 7, 14, 3000, 12, 2, 'JKC2AASD2', 'aktif'),
(599, 64, 8, 14, 4500, 6, 2, 'JKC2AAB2', 'aktif'),
(600, 65, 7, 21, 25000, 0, 2, 'AQMBESD2', 'aktif'),
(601, 65, 6, 21, 15000, 0, 2, 'AQMBEK2', 'aktif'),
(602, 65, 8, 21, 35000, 2, 2, 'AQMBEB2', 'aktif'),
(603, 66, 6, 6, 6500, 19, 2, 'PMKWWK2', 'aktif'),
(604, 67, 11, 20, 60000, 6, 2, 'BKAAPUXL2', 'aktif'),
(605, 68, 13, 13, 75000, 1, 2, 'BKMZHIM2', 'aktif'),
(606, 69, 12, 12, 65000, 11, 2, 'BKMMBTXXL2', 'aktif'),
(607, 70, 7, 11, 1000, 12, 2, 'P2BKBMSD2', 'aktif'),
(608, 70, 7, 25, 1000, 12, 2, 'P2BKP2SD2', 'aktif'),
(609, 70, 7, 23, 1000, 2, 2, 'P2BKOSD2', 'aktif'),
(610, 71, 7, 6, 1000, 8, 2, 'MGSNWWSD2', 'aktif'),
(611, 73, 7, 6, 2000, 14, 2, 'BPDRWWSD2', 'aktif'),
(612, 74, 7, 30, 2000, 20, 2, 'BPPR2KASD2', 'aktif'),
(613, 75, 7, 6, 1500, 2, 2, 'PHMKWWSD2', 'aktif'),
(614, 76, 6, 27, 1000, 72, 2, 'LBTMB2K2', 'aktif'),
(615, 76, 7, 27, 1500, 58, 2, 'LBTMB2SD2', 'aktif'),
(616, 77, 6, 21, 5500, 14, 2, 'BRCEK2', 'aktif'),
(617, 77, 7, 21, 8000, 21, 2, 'BRCESD2', 'aktif'),
(618, 77, 8, 21, 12000, 24, 2, 'BRCEB2', 'aktif'),
(619, 78, 7, 13, 5000, 0, 2, 'RTTMHISD2', 'aktif'),
(620, 78, 7, 20, 5000, 12, 2, 'RTTMPUSD2', 'aktif'),
(621, 79, 38, 1, 20000, 2, 2, 'LPRFM30M2', 'aktif'),
(622, 80, 38, 1, 10000, 2, 2, 'LPMWM30M2', 'aktif'),
(623, 81, 38, 1, 15000, 0, 2, 'LPLCM30M2', 'aktif'),
(624, 82, 6, 1, 3000, 9, 2, 'TTCLMK2', 'aktif'),
(625, 82, 6, 7, 3000, 10, 2, 'TTCLJK2', 'aktif'),
(626, 82, 6, 2, 3000, 8, 2, 'TTCLKK2', 'aktif'),
(627, 82, 6, 3, 3000, 2, 2, 'TTCLHK2', 'aktif'),
(628, 82, 6, 17, 3000, 12, 2, 'TTCLBK2', 'aktif'),
(629, 82, 6, 15, 3000, 3, 2, 'TTCLNK2', 'aktif'),
(630, 82, 6, 16, 3000, 2, 2, 'TTCLUK2', 'aktif'),
(631, 82, 6, 12, 3000, 10, 2, 'TTCLBTK2', 'aktif'),
(632, 82, 6, 11, 3000, 12, 2, 'TTCLBMK2', 'aktif'),
(633, 82, 6, 9, 3000, 12, 2, 'TTCLHTK2', 'aktif'),
(634, 82, 6, 8, 3000, 2, 2, 'TTCLHMK2', 'aktif'),
(635, 82, 6, 25, 3000, 12, 2, 'TTCLP2K2', 'aktif'),
(636, 82, 6, 19, 3000, 12, 2, 'TTCLUTK2', 'aktif'),
(637, 82, 6, 18, 3000, 12, 2, 'TTCLUMK2', 'aktif'),
(638, 82, 6, 20, 3000, 6, 2, 'TTCLPUK2', 'aktif'),
(639, 82, 6, 13, 3000, 2, 2, 'TTCLHIK2', 'aktif'),
(640, 83, 6, 1, 4000, 4, 2, 'KCS2MK2', 'aktif'),
(641, 83, 6, 2, 4000, 0, 2, 'KCS2KK2', 'aktif'),
(642, 83, 6, 3, 4000, 6, 2, 'KCS2HK2', 'aktif'),
(643, 83, 6, 16, 4000, 6, 2, 'KCS2UK2', 'aktif'),
(644, 83, 6, 23, 4000, 6, 2, 'KCS2OK2', 'aktif'),
(645, 83, 6, 17, 4000, 6, 2, 'KCS2BK2', 'aktif'),
(646, 83, 6, 13, 4000, 3, 2, 'KCS2HIK2', 'aktif'),
(647, 83, 6, 20, 4000, 4, 2, 'KCS2PUK2', 'aktif'),
(648, 84, 6, 25, 1000, 48, 2, 'TPAP2K2', 'aktif'),
(649, 84, 6, 16, 1000, 38, 2, 'TPAUK2', 'aktif'),
(650, 85, 7, 6, 36500, 16, 2, 'EHPWWSD2', 'aktif'),
(651, 86, 6, 6, 25000, 2, 2, 'EHVWWK2', 'aktif'),
(652, 87, 7, 6, 22500, 6, 2, 'PWFCWWSD2', 'aktif'),
(653, 88, 7, 6, 18000, 6, 2, 'PWKIWWSD2', 'aktif'),
(654, 89, 6, 20, 1000, 24, 2, 'TGTMPUK2', 'aktif'),
(655, 90, 6, 1, 4500, 12, 2, 'TXKKMK2', 'aktif'),
(656, 90, 7, 1, 5500, 12, 2, 'TXKKMSD2', 'aktif'),
(657, 91, 6, 17, 1200, 20, 2, 'JRCBK2', 'aktif'),
(658, 91, 6, 23, 1200, 5, 2, 'JRCOK2', 'aktif'),
(659, 91, 6, 1, 1200, 30, 2, 'JRCMK2', 'aktif'),
(660, 91, 7, 1, 1500, 30, 2, 'JRCMSD2', 'aktif'),
(661, 91, 7, 25, 1500, 30, 2, 'JRCP2SD2', 'aktif'),
(662, 91, 7, 16, 1500, 30, 2, 'JRCUSD2', 'aktif'),
(663, 91, 8, 16, 1800, 30, 2, 'JRCUB2', 'aktif'),
(664, 91, 8, 3, 1800, 30, 2, 'JRCHB2', 'aktif'),
(665, 91, 8, 17, 1800, 30, 2, 'JRCBB2', 'aktif'),
(666, 91, 39, 25, 2000, 12, 2, 'JRCP2J2', 'aktif'),
(667, 91, 39, 13, 2000, 2, 2, 'JRCHIJ2', 'aktif'),
(668, 91, 39, 1, 2000, 11, 2, 'JRCMJ2', 'aktif'),
(669, 92, 6, 13, 1000, 2, 2, 'TRCHIK2', 'aktif'),
(670, 92, 6, 1, 1000, 12, 2, 'TRCMK2', 'aktif'),
(671, 92, 6, 23, 1000, 2, 2, 'TRCOK2', 'aktif'),
(672, 92, 6, 16, 1000, 12, 2, 'TRCUK2', 'aktif'),
(673, 92, 6, 17, 1000, 12, 2, 'TRCBK2', 'aktif'),
(674, 92, 6, 28, 1000, 12, 2, 'TRCCK2', 'aktif'),
(675, 93, 7, 1, 10000, 2, 2, 'CLTMMSD2', 'aktif'),
(676, 94, 6, 6, 1000, 48, 2, 'UUKWWK2', 'aktif'),
(677, 95, 6, 3, 1500, 8, 2, 'BK2CHK2', 'aktif'),
(678, 95, 6, 17, 1500, 8, 2, 'BK2CBK2', 'aktif'),
(679, 95, 6, 1, 1500, 8, 2, 'BK2CMK2', 'aktif'),
(680, 95, 6, 23, 1500, 8, 2, 'BK2COK2', 'aktif'),
(681, 95, 8, 3, 2500, 4, 2, 'BK2CHB2', 'aktif'),
(682, 95, 8, 17, 2500, 4, 2, 'BK2CBB2', 'aktif'),
(683, 95, 8, 1, 2500, 4, 2, 'BK2CMB2', 'aktif'),
(684, 95, 8, 23, 2500, 4, 2, 'BK2COB2', 'aktif'),
(685, 95, 39, 3, 3500, 4, 2, 'BK2CHJ2', 'aktif'),
(686, 95, 39, 1, 3500, 4, 2, 'BK2CMJ2', 'aktif'),
(687, 96, 6, 22, 500, 96, 2, 'RCCSK2', 'aktif'),
(688, 53, 7, 13, 1200, 48, 2, 'BPSTHISD2', 'aktif'),
(689, 54, 7, 14, 1500, 48, 2, 'BPSCAASD2', 'aktif'),
(690, 99, 7, 13, 2500, 8, 2, 'BPFGHISD2', 'aktif'),
(691, 100, 7, 14, 3000, 18, 2, 'BPGRAASD2', 'aktif'),
(692, 91, 7, 17, 1700, 24, 2, 'JRCBSD2', 'aktif'),
(693, 91, 8, 13, 3500, 14, 2, 'JRCHIB2', 'aktif'),
(694, 91, 6, 1, 1500, 24, 2, 'JRCMK2', 'aktif'),
(695, 91, 6, 23, 1500, 24, 2, 'JRCOK2', 'aktif'),
(696, 91, 6, 17, 1500, 24, 2, 'JRCBK2', 'aktif'),
(697, 102, 6, 1, 1000, 4, 2, 'TRKMK2', 'aktif'),
(698, 102, 6, 2, 1000, 24, 2, 'TRKKK2', 'aktif'),
(699, 102, 6, 23, 1000, 24, 2, 'TRKOK2', 'aktif'),
(700, 102, 6, 3, 1000, 24, 2, 'TRKHK2', 'aktif'),
(701, 102, 6, 16, 1000, 14, 2, 'TRKUK2', 'aktif'),
(702, 102, 6, 25, 1000, 24, 2, 'TRKP2K2', 'aktif'),
(703, 102, 6, 28, 1000, 24, 2, 'TRKCK2', 'aktif'),
(704, 102, 6, 13, 1000, 4, 2, 'TRKHIK2', 'aktif'),
(705, 102, 7, 1, 1500, 24, 2, 'TRKMSD2', 'aktif'),
(706, 102, 7, 13, 1500, 24, 2, 'TRKHISD2', 'aktif'),
(707, 102, 7, 2, 1500, 24, 2, 'TRKKSD2', 'aktif'),
(708, 102, 7, 11, 1500, 4, 2, 'TRKBMSD2', 'aktif'),
(709, 102, 7, 17, 1500, 24, 2, 'TRKBSD2', 'aktif'),
(710, 102, 7, 16, 1500, 24, 2, 'TRKUSD2', 'aktif'),
(711, 102, 7, 18, 1500, 24, 2, 'TRKUMSD2', 'aktif'),
(712, 102, 7, 22, 1500, 24, 2, 'TRKSSD2', 'aktif'),
(713, 102, 7, 3, 1500, 4, 2, 'TRKHSD2', 'aktif'),
(714, 102, 8, 2, 2000, 24, 2, 'TRKKB2', 'aktif'),
(715, 102, 8, 17, 2000, 22, 2, 'TRKBB2', 'aktif'),
(716, 102, 8, 1, 2000, 24, 2, 'TRKMB2', 'aktif'),
(717, 102, 8, 28, 2000, 4, 2, 'TRKCB2', 'aktif'),
(718, 102, 8, 23, 2000, 6, 2, 'TRKOB2', 'aktif'),
(719, 102, 8, 13, 2000, 4, 2, 'TRKHIB2', 'aktif'),
(720, 103, 7, 17, 22000, 3, 2, 'TPKKBSD2', 'aktif'),
(721, 103, 7, 1, 22000, 3, 2, 'TPKKMSD2', 'aktif'),
(722, 103, 7, 23, 22000, 3, 2, 'TPKKOSD2', 'aktif'),
(723, 103, 7, 3, 22000, 1, 2, 'TPKKHSD2', 'aktif'),
(724, 103, 7, 16, 22000, 3, 2, 'TPKKUSD2', 'aktif'),
(725, 103, 7, 13, 22000, 3, 2, 'TPKKHISD2', 'aktif'),
(726, 104, 7, 13, 18000, 3, 2, 'TPJHISD2', 'aktif'),
(727, 104, 7, 1, 18000, 3, 2, 'TPJMSD2', 'aktif'),
(728, 104, 7, 16, 18000, 3, 2, 'TPJUSD2', 'aktif'),
(729, 104, 7, 17, 18000, 3, 2, 'TPJBSD2', 'aktif'),
(730, 105, 7, 1, 35000, 1, 2, 'TPCSIMSD2', 'aktif'),
(731, 105, 7, 2, 35000, 3, 2, 'TPCSIKSD2', 'aktif'),
(732, 105, 7, 17, 35000, 2, 2, 'TPCSIBSD2', 'aktif'),
(733, 106, 43, 1, 1000, 0, 2, 'MGRTMM22', 'aktif'),
(734, 106, 44, 1, 2000, 50, 2, 'MGRTMM22', 'aktif'),
(735, 106, 45, 1, 3000, 0, 2, 'MGRTMM32', 'aktif'),
(736, 107, 6, 16, 1000, 0, 2, 'PDLTMUK2', 'aktif'),
(737, 108, 6, 16, 1000, 40, 2, 'PDPTMUK2', 'aktif'),
(738, 109, 6, 28, 1000, 0, 2, 'TKLTMCK2', 'aktif'),
(739, 110, 6, 16, 1000, 0, 2, 'TKPTMUK2', 'aktif'),
(740, 111, 6, 32, 1000, 5, 2, 'RGTMMWK2', 'aktif'),
(741, 111, 6, 33, 1000, 0, 2, 'RGTMMTK2', 'aktif'),
(742, 111, 6, 34, 1000, 0, 2, 'RGTMAGK2', 'aktif'),
(743, 111, 6, 35, 1000, 0, 2, 'RGTMDHK2', 'aktif'),
(744, 111, 6, 36, 1000, 10, 2, 'RGTMBGK2', 'aktif'),
(745, 111, 6, 37, 1000, 6, 2, 'RGTMFBK2', 'aktif'),
(746, 111, 6, 38, 1000, 4, 2, 'RGTMLYK2', 'aktif'),
(747, 111, 6, 39, 1000, 0, 2, 'RGTMTRK2', 'aktif'),
(748, 111, 6, 40, 1000, 6, 2, 'RGTMNIK2', 'aktif'),
(749, 111, 6, 41, 1000, 0, 2, 'RGTMASK2', 'aktif'),
(750, 111, 6, 42, 1000, 40, 2, 'RGTMWKK2', 'aktif'),
(751, 111, 6, 43, 1000, 0, 2, 'RGTMSKK2', 'aktif'),
(752, 111, 6, 44, 1000, 0, 2, 'RGTMTPK2', 'aktif'),
(753, 111, 6, 45, 1000, 0, 2, 'RGTMSPK2', 'aktif'),
(754, 111, 6, 46, 1000, 0, 2, 'RGTMMT2K2', 'aktif'),
(755, 111, 6, 47, 1000, 0, 2, 'RGTMBT2K2', 'aktif'),
(756, 111, 6, 48, 1000, 0, 2, 'RGTMGJK2', 'aktif'),
(757, 111, 6, 49, 1000, 5, 2, 'RGTMJRK2', 'aktif'),
(758, 111, 6, 50, 1000, 6, 2, 'RGTMLBK2', 'aktif'),
(759, 111, 6, 51, 1000, 0, 2, 'RGTMHRK2', 'aktif'),
(760, 111, 6, 52, 1000, 6, 2, 'RGTMSGK2', 'aktif'),
(761, 111, 6, 53, 1000, 0, 2, 'RGTMSMK2', 'aktif'),
(762, 111, 6, 54, 1000, 0, 2, 'RGTMBDK2', 'aktif'),
(763, 111, 6, 55, 1000, 0, 2, 'RGTMGDK2', 'aktif'),
(764, 111, 6, 56, 1000, 0, 2, 'RGTMELK2', 'aktif'),
(765, 111, 6, 57, 1000, 6, 2, 'RGTMKBK2', 'aktif'),
(766, 111, 6, 58, 1000, 0, 2, 'RGTMSCK2', 'aktif'),
(767, 111, 6, 59, 1000, 0, 2, 'RGTMKTK2', 'aktif'),
(768, 111, 6, 60, 1000, 0, 2, 'RGTMSRK2', 'aktif'),
(769, 111, 6, 61, 1000, 6, 2, 'RGTMRWK2', 'aktif'),
(770, 112, 6, 62, 1000, 0, 2, 'TLTMKBMK2', 'aktif'),
(771, 112, 6, 63, 2000, 4, 2, 'TLTMJTK2', 'aktif'),
(772, 113, 6, 65, 2000, 0, 2, 'PRTMSDK2', 'aktif'),
(773, 114, 6, 64, 1000, 6, 2, 'WPTMSSK2', 'aktif'),
(774, 115, 6, 20, 2000, 0, 2, 'TLPTMPUK2', 'aktif'),
(775, 115, 7, 20, 3000, 0, 2, 'TLPTMPUSD2', 'aktif'),
(776, 115, 8, 20, 4500, 0, 2, 'TLPTMPUB2', 'aktif'),
(777, 115, 39, 20, 6000, 0, 2, 'TLPTMPUJ2', 'aktif'),
(778, 116, 6, 66, 8000, 0, 2, 'HSDTMMPK2', 'aktif'),
(779, 116, 7, 66, 12000, 0, 2, 'HSDTMMPSD2', 'aktif'),
(780, 116, 8, 66, 15000, 0, 2, 'HSDTMMPB2', 'aktif'),
(781, 116, 39, 66, 17000, 0, 2, 'HSDTMMPJ2', 'aktif'),
(782, 117, 7, 67, 5000, 7, 2, 'BDSTMMKSD2', 'aktif'),
(783, 118, 7, 16, 5000, 5, 2, 'BPDTMUSD2', 'aktif'),
(784, 119, 6, 69, 1500, 6, 2, 'SGTMPRK2', 'aktif'),
(785, 119, 6, 68, 1500, 0, 2, 'SGTMPCK2', 'aktif'),
(786, 119, 6, 70, 1500, 9, 2, 'SGTMPDK2', 'aktif'),
(787, 119, 6, 71, 1500, 0, 2, 'SGTMPNK2', 'aktif'),
(788, 119, 6, 72, 1500, 6, 2, 'SGTMPKK2', 'aktif'),
(789, 120, 6, 3, 1500, 0, 2, 'RITMHK2', 'aktif'),
(790, 120, 6, 1, 1500, 0, 2, 'RITMMK2', 'aktif'),
(791, 120, 6, 2, 1500, 0, 2, 'RITMKK2', 'aktif'),
(792, 120, 6, 73, 1500, 0, 2, 'RITMPBK2', 'aktif'),
(793, 121, 6, 3, 10000, 0, 2, 'TKTMHK2', 'aktif'),
(794, 121, 6, 1, 10000, 0, 2, 'TKTMMK2', 'aktif'),
(795, 121, 6, 2, 10000, 3, 2, 'TKTMKK2', 'aktif'),
(796, 122, 6, 1, 2500, 8, 2, 'PLTPPMK2', 'aktif'),
(797, 122, 6, 2, 2500, 6, 2, 'PLTPPKK2', 'aktif'),
(798, 122, 6, 3, 2500, 0, 2, 'PLTPPHK2', 'aktif'),
(799, 122, 6, 20, 2500, 0, 2, 'PLTPPPUK2', 'aktif'),
(800, 123, 40, 13, 6000, 2, 2, 'KKISTRHISD22', 'aktif'),
(801, 123, 40, 20, 6000, 6, 2, 'KKISTRPUSD22', 'aktif'),
(802, 123, 41, 13, 9000, 0, 2, 'KKISTRHISMP2', 'aktif'),
(803, 123, 41, 20, 9000, 6, 2, 'KKISTRPUSMP2', 'aktif'),
(804, 123, 42, 13, 12000, 2, 2, 'KKISTRHISMA2', 'aktif'),
(805, 123, 42, 20, 12000, 2, 2, 'KKISTRPUSMA2', 'aktif'),
(806, 124, 40, 13, 4500, 8, 2, 'KKISCHHISD22', 'aktif'),
(807, 124, 40, 20, 4500, 2, 2, 'KKISCHPUSD22', 'aktif'),
(808, 124, 41, 13, 6500, 2, 2, 'KKISCHHISMP2', 'aktif'),
(809, 124, 41, 20, 6500, 4, 2, 'KKISCHPUSMP2', 'aktif'),
(810, 124, 42, 13, 7500, 8, 2, 'KKISCHHISMA2', 'aktif'),
(811, 124, 42, 20, 7500, 9, 2, 'KKISCHPUSMA2', 'aktif'),
(812, 125, 7, 1, 12000, 2, 2, 'KKITLMSD2', 'aktif'),
(813, 125, 7, 17, 12000, 2, 2, 'KKITLBSD2', 'aktif'),
(814, 125, 7, 16, 12000, 2, 2, 'KKITLUSD2', 'aktif'),
(815, 125, 7, 23, 12000, 8, 2, 'KKITLOSD2', 'aktif'),
(816, 125, 7, 25, 12000, 2, 2, 'KKITLP2SD2', 'aktif'),
(817, 125, 7, 28, 12000, 8, 2, 'KKITLCSD2', 'aktif'),
(818, 126, 7, 13, 12000, 2, 2, 'KKISKHISD2', 'aktif'),
(819, 126, 7, 1, 12000, 2, 2, 'KKISKMSD2', 'aktif'),
(820, 126, 7, 17, 12000, 7, 2, 'KKISKBSD2', 'aktif'),
(821, 126, 7, 2, 12000, 9, 2, 'KKISKKSD2', 'aktif'),
(822, 126, 7, 23, 12000, 4, 2, 'KKISKOSD2', 'aktif'),
(823, 126, 7, 16, 12000, 0, 2, 'KKISKUSD2', 'aktif'),
(824, 126, 7, 25, 12000, 8, 2, 'KKISKP2SD2', 'aktif'),
(825, 127, 18, 25, 5000, 4, 2, 'HBMRIP2502', 'aktif'),
(826, 127, 18, 16, 5000, 1, 2, 'HBMRIU502', 'aktif'),
(827, 128, 18, 25, 8000, 7, 2, 'PFRP2502', 'aktif'),
(828, 128, 18, 17, 8000, 4, 2, 'PFRB502', 'aktif'),
(829, 128, 18, 16, 8000, 9, 2, 'PFRU502', 'aktif'),
(830, 129, 20, 2, 9000, 0, 2, 'HBCTK200M2', 'aktif'),
(831, 129, 20, 25, 9000, 3, 2, 'HBCTP2200M2', 'aktif'),
(832, 129, 20, 3, 9000, 6, 2, 'HBCTH200M2', 'aktif'),
(833, 130, 20, 16, 6500, 4, 2, 'LRSU200M2', 'aktif'),
(834, 130, 20, 3, 6500, 2, 2, 'LRSH200M2', 'aktif'),
(835, 130, 20, 17, 6500, 4, 2, 'LRSB200M2', 'aktif'),
(836, 131, 43, 2, 60000, 1, 2, 'BDKWK22', 'aktif'),
(837, 131, 44, 2, 60000, 14, 2, 'BDKWK22', 'aktif'),
(838, 131, 45, 2, 60000, 0, 2, 'BDKWK32', 'aktif'),
(839, 131, 46, 2, 60000, 9, 2, 'BDKWK42', 'aktif'),
(840, 132, 6, 25, 8000, 1, 2, 'BDKMRIP2K2', 'aktif'),
(841, 133, 3, 30, 19000, 4, 2, 'BTDSDKA382', 'aktif'),
(842, 133, 4, 30, 28000, 6, 2, 'BTDSDKA582', 'aktif'),
(843, 134, 3, 30, 2000, 4, 2, 'BTESDKA382', 'aktif'),
(844, 134, 4, 30, 3000, 7, 2, 'BTESDKA582', 'aktif'),
(845, 135, 3, 30, 25000, 8, 2, 'BTDKKA382', 'aktif'),
(846, 136, 3, 30, 2500, 9, 2, 'BTEKKA382', 'aktif'),
(847, 137, 3, 30, 17000, 7, 2, 'BTDSKLKA382', 'aktif'),
(848, 137, 4, 30, 25000, 8, 2, 'BTDSKLKA582', 'aktif'),
(849, 138, 3, 30, 2000, 0, 2, 'BTESKLKA382', 'aktif'),
(850, 138, 4, 30, 2500, 1, 2, 'BTESKLKA582', 'aktif'),
(851, 139, 2, 30, 18000, 1, 2, 'BTDBBKA422', 'aktif'),
(852, 140, 2, 30, 3500, 6, 2, 'BTEBBKA422', 'aktif'),
(853, 2, 7, 1, 35000, 2, 1, 'JDQ1MSD1', 'aktif'),
(854, 2, 8, 1, 45000, 2, 1, 'JDQ2MB1', 'aktif'),
(855, 142, 7, 27, 35000, 2, 1, 'GLTLB1SD1', 'aktif'),
(856, 143, 29, 6, 20000, 2, 1, 'GLMWWWD1', 'aktif'),
(857, 144, 7, 1, 10000, 25, 1, 'PTENMSD1', 'aktif'),
(858, 145, 30, 6, 8000, 38, 1, 'CAGUWW121', 'aktif'),
(859, 146, 7, 25, 25000, 6, 1, 'BBKJP1SD1', 'aktif'),
(860, 147, 44, 13, 1500, 114, 1, 'KUGUHI21', 'aktif'),
(861, 148, 8, 1, 20000, 2, 1, 'ASKIMB1', 'aktif'),
(862, 149, 6, 6, 20000, 8, 1, 'CPGUWWK1', 'aktif'),
(863, 56, 7, 13, 1000, 144, 1, 'BPZPHISD1', 'aktif'),
(864, 66, 6, 30, 6500, 40, 1, 'PMKKAK1', 'aktif'),
(865, 150, 6, 30, 5000, 0, 1, 'IBTLKAK1', 'aktif'),
(866, 6, 6, 59, 7500, 0, 2, 'BBCKTK2', 'aktif'),
(867, 6, 8, 59, 13000, 2, 2, 'BBCKTB2', 'aktif'),
(868, 152, 3, 2, 9000, 0, 2, 'BQ2K382', 'non aktif'),
(869, 152, 3, 67, 9000, 0, 2, 'BQ2MK382', 'non aktif'),
(870, 87, 47, 6, 25000, 50, 1, 'PWFCWWP1', 'aktif'),
(871, 87, 7, 6, 12500, 100, 1, 'PWFCWWSD1', 'aktif'),
(872, 23, 8, 6, 4000, 150, 1, 'JPCWWB1', 'aktif'),
(873, 23, 6, 6, 2500, 200, 1, 'JPCWWK1', 'aktif'),
(874, 23, 7, 6, 3000, 200, 1, 'JPCWWSD1', 'aktif'),
(875, 155, 7, 1, 25000, 70, 1, 'JTQ1MSD1', 'aktif'),
(876, 155, 7, 2, 25000, 90, 1, 'JTQ1KSD1', 'aktif'),
(877, 155, 7, 25, 25000, 90, 1, 'JTQ1P1SD1', 'aktif'),
(878, 156, 7, 13, 40000, 90, 1, 'JTSK1HISD1', 'aktif'),
(879, 156, 7, 14, 40000, 50, 1, 'JTSK1AASD1', 'aktif'),
(880, 157, 7, 4, 35000, 70, 1, 'JTQ2PSD1', 'aktif'),
(881, 158, 7, 13, 40000, 70, 1, 'JTSWHISD1', 'aktif'),
(882, 158, 7, 14, 40000, 80, 1, 'JTSWAASD1', 'aktif'),
(883, 158, 7, 23, 40000, 80, 1, 'JTSWOSD1', 'aktif'),
(884, 159, 8, 20, 2500, 1000, 1, 'LKKPUB1', 'aktif'),
(885, 159, 7, 20, 2500, 860, 1, 'LKKPUSD1', 'aktif'),
(886, 159, 6, 20, 2500, 720, 1, 'LKKPUK1', 'aktif'),
(887, 159, 47, 20, 2500, 990, 1, 'LKKPUP1', 'aktif'),
(888, 24, 7, 10, 5000, 960, 1, 'TBTMHLSD1', 'aktif'),
(889, 161, 7, 1, 20000, 990, 1, 'BM1TMMSD1', 'aktif'),
(890, 161, 7, 2, 20000, 980, 1, 'BM1TMKSD1', 'aktif'),
(891, 161, 7, 17, 20000, 980, 1, 'BM1TMBSD1', 'aktif'),
(892, 161, 7, 11, 20000, 870, 1, 'BM1TMBMSD1', 'aktif'),
(893, 161, 7, 15, 20000, 820, 1, 'BM1TMNSD1', 'aktif'),
(894, 161, 7, 16, 20000, 765, 1, 'BM1TMUSD1', 'aktif'),
(895, 161, 7, 25, 20000, 920, 1, 'BM1TMP1SD1', 'aktif'),
(896, 162, 7, 1, 20000, 0, 1, 'BK2TMMSD1', 'non aktif'),
(897, 162, 7, 2, 20000, 0, 1, 'BK2TMKSD1', 'non aktif'),
(898, 162, 7, 3, 20000, 0, 1, 'BK2TMHSD1', 'non aktif'),
(899, 162, 7, 16, 20000, 0, 1, 'BK2TMUSD1', 'non aktif'),
(900, 162, 7, 18, 20000, 0, 1, 'BK2TMUMSD1', 'non aktif'),
(901, 162, 7, 20, 20000, 0, 1, 'BK2TMPUSD1', 'non aktif'),
(902, 162, 7, 14, 20000, 0, 1, 'BK2TMAASD1', 'non aktif'),
(903, 162, 7, 23, 20000, 0, 1, 'BK2TMOSD1', 'non aktif'),
(904, 163, 7, 30, 7000, 0, 2, 'PMKKKASD2', 'non aktif'),
(905, 163, 7, 1, 7000, 0, 2, 'PMKKMSD2', 'non aktif'),
(906, 163, 7, 2, 7000, 0, 2, 'PMKKKSD2', 'non aktif'),
(907, 163, 7, 3, 7000, 0, 2, 'PMKKHSD2', 'non aktif'),
(908, 163, 7, 11, 7000, 0, 2, 'PMKKBMSD2', 'non aktif'),
(909, 164, 7, 4, 7000, 0, 2, 'PMJPSD2', 'non aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailhutang`
--

CREATE TABLE `detailhutang` (
  `id` int(255) NOT NULL,
  `idHutang` int(10) NOT NULL,
  `idAdmin` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `bayar` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailhutang`
--

INSERT INTO `detailhutang` (`id`, `idHutang`, `idAdmin`, `tanggal`, `bayar`) VALUES
(1, 1, 8, '2018-04-04', 0),
(4, 7, 8, '2018-04-04', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpembelian`
--

CREATE TABLE `detailpembelian` (
  `id` int(255) NOT NULL,
  `idBarang` int(225) DEFAULT NULL,
  `idPembelian` int(225) DEFAULT NULL,
  `hargaBeliSatuan` int(12) DEFAULT NULL,
  `jumlahBeli` int(10) DEFAULT NULL,
  `idAdmin` int(5) NOT NULL,
  `potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailpembelian`
--

INSERT INTO `detailpembelian` (`id`, `idBarang`, `idPembelian`, `hargaBeliSatuan`, `jumlahBeli`, `idAdmin`, `potongan`) VALUES
(1, 1, 1, 30000, 6, 8, 0),
(2, 4, 1, 35000, 6, 8, 0),
(3, 6, 1, 3000, 12, 8, 0),
(4, 5, 1, 1250, 20, 8, 0),
(5, 7, 1, 12250, 12, 8, 0),
(6, 8, 1, 14000, 12, 8, 0),
(7, 9, 1, 12000, 12, 8, 0),
(8, 10, 1, 2250, 50, 8, 0),
(9, 11, 1, 2750, 20, 8, 0),
(10, 12, 1, 6500, 6, 8, 0),
(11, 13, 1, 175, 500, 8, 0),
(12, 14, 1, 6500, 12, 8, 0),
(13, 15, 1, 8000, 12, 8, 0),
(14, 16, 1, 9000, 12, 8, 0),
(15, 17, 1, 4500, 12, 8, 0),
(16, 18, 1, 3000, 20, 8, 0),
(17, 20, 2, 5500, 6, 8, 0),
(18, 22, 2, 5500, 6, 8, 0),
(19, 21, 2, 5500, 6, 8, 0),
(20, 19, 2, 5500, 6, 8, 0),
(21, 23, 2, 5500, 6, 8, 0),
(22, 24, 2, 5500, 12, 8, 0),
(23, 25, 2, 5500, 6, 8, 0),
(24, 28, 2, 5500, 6, 8, 0),
(25, 27, 2, 5500, 6, 8, 0),
(26, 26, 2, 5500, 6, 8, 0),
(27, 29, 2, 5500, 50, 8, 0),
(28, 31, 2, 5500, 4, 8, 0),
(29, 32, 2, 5500, 4, 8, 0),
(30, 35, 2, 5500, 4, 8, 0),
(31, 33, 2, 5500, 4, 8, 0),
(32, 30, 2, 5500, 4, 8, 0),
(33, 34, 2, 5500, 4, 8, 0),
(36, 37, 3, 1850, 60, 8, 0),
(37, 38, 3, 2000, 60, 8, 0),
(38, 36, 3, 750, 20, 8, 0),
(39, 39, 3, 1750, 20, 8, 0),
(40, 40, 3, 800, 100, 8, 0),
(41, 45, 3, 350, 12, 8, 0),
(42, 42, 3, 750, 12, 8, 0),
(43, 43, 3, 5000, 12, 8, 0),
(44, 44, 3, 8000, 12, 8, 0),
(57, 50, 3, 2000, 5, 8, 0),
(58, 49, 3, 2000, 5, 8, 0),
(59, 47, 3, 2000, 5, 8, 0),
(60, 48, 3, 2000, 5, 8, 0),
(61, 46, 3, 2000, 5, 8, 0),
(62, 51, 3, 2000, 5, 8, 0),
(63, 55, 3, 2000, 5, 8, 0),
(64, 54, 3, 2000, 5, 8, 0),
(65, 53, 3, 2000, 5, 8, 0),
(66, 52, 3, 2000, 5, 8, 0),
(67, 60, 3, 25000, 10, 8, 0),
(68, 61, 3, 25000, 10, 8, 0),
(69, 58, 3, 14000, 10, 8, 0),
(70, 59, 3, 14000, 10, 8, 0),
(71, 57, 3, 16000, 10, 8, 0),
(72, 56, 3, 16000, 10, 8, 0),
(73, 62, 3, 27500, 2, 8, 0),
(74, 63, 3, 27500, 2, 8, 0),
(75, 64, 3, 27500, 2, 8, 0),
(76, 65, 3, 27500, 2, 8, 0),
(77, 66, 3, 27500, 2, 8, 0),
(78, 67, 3, 27500, 2, 8, 0),
(79, 68, 3, 21500, 2, 8, 0),
(80, 69, 3, 21500, 2, 8, 0),
(81, 70, 3, 21500, 2, 8, 0),
(82, 71, 3, 21500, 2, 8, 0),
(83, 72, 3, 21500, 2, 8, 0),
(84, 73, 3, 21500, 2, 8, 0),
(85, 74, 3, 20000, 2, 8, 0),
(86, 75, 3, 20000, 2, 8, 0),
(87, 76, 3, 20000, 2, 8, 0),
(88, 77, 3, 20000, 2, 8, 0),
(89, 78, 3, 20000, 2, 8, 0),
(90, 79, 3, 20000, 2, 8, 0),
(91, 80, 3, 17000, 2, 8, 0),
(92, 81, 3, 17000, 2, 8, 0),
(93, 82, 3, 17000, 2, 8, 0),
(94, 83, 3, 17000, 2, 8, 0),
(95, 84, 3, 17000, 2, 8, 0),
(96, 85, 3, 17000, 2, 8, 0),
(97, 86, 3, 25000, 2, 8, 0),
(98, 87, 3, 25000, 2, 8, 0),
(99, 88, 3, 25000, 2, 8, 0),
(100, 89, 3, 25000, 2, 8, 0),
(101, 90, 3, 25000, 2, 8, 0),
(102, 91, 3, 25000, 2, 8, 0),
(103, 92, 3, 13000, 2, 8, 0),
(104, 93, 3, 13000, 2, 8, 0),
(105, 94, 3, 13000, 2, 8, 0),
(106, 95, 3, 13000, 2, 8, 0),
(107, 96, 3, 13000, 2, 8, 0),
(108, 97, 3, 13000, 2, 8, 0),
(109, 98, 4, 3800, 12, 8, 0),
(110, 100, 4, 60000, 6, 8, 0),
(111, 101, 4, 40000, 6, 8, 0),
(112, 102, 4, 85000, 6, 8, 0),
(113, 103, 4, 100000, 6, 8, 0),
(114, 104, 4, 130000, 6, 8, 0),
(115, 107, 4, 7500, 4, 8, 0),
(116, 106, 4, 7500, 4, 8, 0),
(117, 105, 4, 7500, 4, 8, 0),
(118, 111, 4, 10000, 10, 8, 0),
(119, 115, 4, 10000, 10, 8, 0),
(120, 110, 4, 10000, 10, 8, 0),
(121, 113, 4, 10000, 10, 8, 0),
(122, 109, 4, 10000, 10, 8, 0),
(123, 108, 4, 10000, 10, 8, 0),
(124, 114, 4, 10000, 10, 8, 0),
(125, 112, 4, 10000, 10, 8, 0),
(127, 118, 4, 12250, 12, 8, 0),
(128, 116, 4, 750, 12, 8, 0),
(129, 117, 4, 6000, 12, 8, 0),
(130, 133, 4, 2000, 6, 8, 0),
(131, 123, 4, 2000, 6, 8, 0),
(132, 131, 4, 2000, 6, 8, 0),
(133, 132, 4, 2000, 6, 8, 0),
(134, 122, 4, 2000, 6, 8, 0),
(135, 130, 4, 2000, 6, 8, 0),
(136, 126, 4, 2000, 6, 8, 0),
(137, 120, 4, 2000, 6, 8, 0),
(138, 121, 4, 2000, 6, 8, 0),
(139, 119, 4, 2000, 6, 8, 0),
(140, 124, 4, 2000, 6, 8, 0),
(141, 129, 4, 2000, 6, 8, 0),
(142, 128, 4, 2000, 6, 8, 0),
(143, 127, 4, 2000, 6, 8, 0),
(144, 125, 4, 2000, 6, 8, 0),
(145, 125, 4, 2000, 6, 8, 0),
(146, 149, 5, 12000, 12, 8, 0),
(147, 154, 5, 68000, 6, 8, 0),
(148, 150, 5, 20000, 6, 8, 0),
(149, 151, 5, 30000, 6, 8, 0),
(150, 152, 5, 42000, 6, 8, 0),
(151, 153, 5, 58000, 6, 8, 0),
(152, 155, 5, 10000, 24, 8, 0),
(153, 156, 5, 12000, 6, 8, 0),
(154, 157, 5, 16000, 6, 8, 0),
(155, 158, 5, 2800, 20, 8, 0),
(156, 159, 5, 900, 96, 8, 0),
(157, 160, 5, 1250, 48, 8, 0),
(158, 161, 5, 2000, 24, 8, 0),
(159, 162, 5, 800, 128, 8, 0),
(160, 163, 5, 2800, 48, 8, 0),
(161, 164, 5, 3000, 48, 8, 0),
(162, 165, 5, 1750, 20, 8, 0),
(163, 166, 5, 1750, 20, 8, 0),
(164, 135, 5, 7500, 4, 8, 0),
(165, 134, 5, 100, 50, 8, 0),
(166, 138, 5, 10000, 4, 8, 0),
(167, 139, 5, 20000, 4, 8, 0),
(168, 143, 5, 10000, 2, 8, 0),
(169, 144, 5, 22500, 2, 8, 0),
(170, 145, 5, 35000, 2, 8, 0),
(171, 136, 5, 200, 50, 8, 0),
(172, 137, 5, 400, 50, 8, 0),
(173, 140, 5, 200, 50, 8, 0),
(174, 141, 5, 450, 50, 8, 0),
(175, 142, 5, 700, 50, 8, 0),
(176, 146, 5, 1250, 20, 8, 0),
(177, 147, 5, 2000, 20, 8, 0),
(178, 148, 5, 2250, 20, 8, 0),
(179, 167, 6, 15000, 6, 8, 0),
(180, 169, 6, 13000, 6, 8, 0),
(181, 168, 6, 13000, 6, 8, 0),
(182, 170, 6, 22000, 12, 8, 0),
(183, 171, 6, 17500, 12, 8, 0),
(184, 172, 6, 2200, 12, 8, 0),
(185, 173, 6, 3500, 12, 8, 0),
(186, 174, 6, 21000, 6, 8, 0),
(187, 175, 6, 13000, 6, 8, 0),
(188, 176, 6, 30000, 6, 8, 0),
(189, 177, 6, 4500, 60, 8, 0),
(190, 179, 6, 66000, 6, 8, 0),
(191, 178, 6, 50000, 6, 8, 0),
(192, 180, 6, 52000, 12, 8, 0),
(193, 181, 7, 800, 24, 8, 0),
(194, 183, 7, 800, 24, 8, 0),
(195, 182, 7, 800, 24, 8, 0),
(196, 184, 7, 850, 48, 8, 0),
(197, 185, 7, 1750, 48, 8, 0),
(198, 186, 7, 1750, 48, 8, 0),
(199, 187, 7, 1200, 20, 8, 0),
(200, 188, 7, 800, 72, 8, 0),
(201, 189, 7, 1500, 72, 8, 0),
(202, 192, 7, 10000, 12, 8, 0),
(203, 190, 7, 4200, 12, 8, 0),
(204, 191, 7, 6500, 12, 8, 0),
(205, 193, 7, 4500, 12, 8, 0),
(206, 194, 7, 4500, 12, 8, 0),
(207, 195, 7, 18000, 12, 8, 0),
(208, 196, 7, 8500, 12, 8, 0),
(209, 197, 7, 12000, 12, 8, 0),
(210, 206, 8, 2500, 6, 8, 0),
(211, 210, 8, 2500, 6, 8, 0),
(212, 209, 8, 2500, 6, 8, 0),
(213, 205, 8, 2500, 6, 8, 0),
(214, 212, 8, 2500, 6, 8, 0),
(215, 211, 8, 2500, 6, 8, 0),
(216, 217, 8, 2500, 6, 8, 0),
(217, 203, 8, 2500, 6, 8, 0),
(218, 204, 8, 2500, 6, 8, 0),
(219, 202, 8, 2500, 6, 8, 0),
(220, 207, 8, 2500, 6, 8, 0),
(221, 213, 8, 2500, 6, 8, 0),
(222, 216, 8, 2500, 6, 8, 0),
(223, 208, 8, 2500, 6, 8, 0),
(224, 215, 8, 2500, 6, 8, 0),
(225, 214, 8, 2500, 6, 8, 0),
(226, 223, 8, 3500, 6, 8, 0),
(227, 220, 8, 3500, 6, 8, 0),
(228, 224, 8, 3500, 6, 8, 0),
(229, 219, 8, 3500, 6, 8, 0),
(230, 218, 8, 3500, 6, 8, 0),
(231, 222, 8, 3500, 6, 8, 0),
(232, 225, 8, 3500, 6, 8, 0),
(233, 221, 8, 3500, 6, 8, 0),
(234, 221, 8, 3500, 6, 8, 0),
(235, 221, 8, 3500, 6, 8, 0),
(236, 226, 8, 800, 48, 8, 0),
(237, 227, 8, 800, 48, 8, 0),
(238, 229, 8, 22000, 12, 8, 0),
(239, 228, 8, 30000, 12, 8, 0),
(240, 230, 8, 19000, 24, 8, 0),
(241, 231, 8, 16000, 24, 8, 0),
(242, 232, 8, 600, 60, 8, 0),
(243, 233, 8, 3250, 24, 8, 0),
(244, 234, 8, 4500, 24, 8, 0),
(245, 235, 8, 1000, 12, 8, 0),
(246, 237, 8, 1000, 12, 8, 0),
(247, 236, 8, 1000, 12, 8, 0),
(248, 238, 8, 1250, 12, 8, 0),
(249, 239, 8, 1250, 12, 8, 0),
(250, 240, 8, 1250, 12, 8, 0),
(251, 243, 8, 1800, 12, 8, 0),
(252, 242, 8, 1800, 12, 8, 0),
(253, 241, 8, 1800, 12, 8, 0),
(254, 245, 8, 2000, 12, 8, 0),
(255, 246, 8, 2000, 12, 8, 0),
(256, 244, 8, 2000, 12, 8, 0),
(257, 251, 8, 750, 12, 8, 0),
(258, 252, 8, 750, 12, 8, 0),
(259, 247, 8, 750, 12, 8, 0),
(260, 248, 8, 750, 12, 8, 0),
(261, 249, 8, 750, 12, 8, 0),
(262, 250, 8, 750, 12, 8, 0),
(263, 253, 9, 9000, 12, 8, 0),
(264, 254, 9, 850, 48, 8, 0),
(272, 256, 9, 1250, 4, 8, 0),
(273, 255, 9, 1250, 4, 8, 0),
(274, 257, 9, 1250, 4, 8, 0),
(275, 258, 9, 1250, 4, 8, 0),
(276, 265, 9, 1250, 4, 8, 0),
(277, 260, 9, 1750, 2, 8, 0),
(278, 259, 9, 1750, 2, 8, 0),
(279, 261, 9, 1750, 2, 8, 0),
(280, 262, 9, 1750, 2, 8, 0),
(281, 263, 9, 2250, 4, 8, 0),
(282, 264, 9, 2250, 4, 8, 0),
(283, 265, 9, 2250, 96, 8, 0),
(284, 266, 9, 900, 48, 8, 0),
(285, 267, 9, 1250, 48, 8, 0),
(286, 268, 9, 2000, 48, 8, 0),
(287, 269, 9, 2250, 48, 8, 0),
(288, 270, 9, 1200, 24, 8, 0),
(289, 271, 9, 3000, 12, 8, 0),
(290, 274, 9, 1000, 6, 8, 0),
(291, 272, 9, 1000, 6, 8, 0),
(292, 273, 9, 1000, 6, 8, 0),
(293, 293, 10, 1750, 12, 8, 0),
(294, 295, 10, 1750, 12, 8, 0),
(295, 297, 10, 1750, 12, 8, 0),
(296, 292, 10, 1750, 12, 8, 0),
(297, 294, 10, 1750, 12, 8, 0),
(298, 296, 10, 1750, 12, 8, 0),
(299, 281, 10, 850, 12, 8, 0),
(300, 278, 10, 850, 12, 8, 0),
(301, 282, 10, 850, 12, 8, 0),
(302, 276, 10, 850, 12, 8, 0),
(303, 275, 10, 850, 12, 8, 0),
(304, 277, 10, 850, 12, 8, 0),
(305, 280, 10, 850, 12, 8, 0),
(306, 279, 10, 850, 12, 8, 0),
(307, 287, 10, 1250, 12, 8, 0),
(308, 286, 10, 1250, 12, 8, 0),
(309, 291, 10, 1250, 12, 8, 0),
(310, 284, 10, 1250, 12, 8, 0),
(311, 285, 10, 1250, 12, 8, 0),
(312, 283, 10, 1250, 12, 8, 0),
(313, 290, 10, 1250, 12, 8, 0),
(314, 288, 10, 1250, 12, 8, 0),
(315, 289, 10, 1250, 12, 8, 0),
(316, 310, 11, 28000, 12, 8, 0),
(317, 309, 11, 28000, 12, 8, 0),
(318, 308, 11, 28000, 12, 8, 0),
(319, 307, 11, 15000, 12, 8, 0),
(320, 304, 11, 15000, 12, 8, 0),
(321, 305, 11, 15000, 12, 8, 0),
(322, 306, 11, 15000, 12, 8, 0),
(323, 298, 11, 15000, 12, 8, 0),
(324, 301, 11, 15000, 12, 8, 0),
(325, 303, 11, 15000, 12, 8, 0),
(326, 299, 11, 15000, 12, 8, 0),
(327, 300, 11, 15000, 12, 8, 0),
(328, 302, 11, 15000, 12, 8, 0),
(329, 316, 11, 750, 100, 8, 0),
(330, 320, 11, 850, 100, 8, 0),
(331, 327, 11, 850, 100, 8, 0),
(332, 340, 11, 850, 100, 8, 0),
(333, 333, 11, 850, 100, 8, 0),
(334, 322, 11, 850, 100, 8, 0),
(335, 321, 11, 850, 100, 8, 0),
(336, 342, 11, 850, 100, 8, 0),
(337, 323, 11, 850, 100, 8, 0),
(338, 334, 11, 850, 100, 8, 0),
(339, 341, 11, 850, 100, 8, 0),
(340, 337, 11, 850, 100, 8, 0),
(341, 335, 11, 850, 100, 8, 0),
(342, 343, 11, 850, 100, 8, 0),
(343, 345, 11, 850, 100, 8, 0),
(344, 324, 11, 850, 100, 8, 0),
(345, 336, 11, 850, 100, 8, 0),
(346, 332, 11, 850, 100, 8, 0),
(347, 318, 11, 850, 100, 8, 0),
(348, 319, 11, 850, 100, 8, 0),
(349, 326, 11, 850, 100, 8, 0),
(350, 347, 11, 850, 100, 8, 0),
(351, 329, 11, 850, 100, 8, 0),
(352, 344, 11, 850, 100, 8, 0),
(353, 339, 11, 850, 100, 8, 0),
(354, 331, 11, 850, 100, 8, 0),
(355, 338, 11, 850, 100, 8, 0),
(356, 346, 11, 850, 100, 8, 0),
(357, 325, 11, 850, 100, 8, 0),
(358, 330, 11, 850, 100, 8, 0),
(359, 328, 11, 850, 100, 8, 0),
(360, 349, 11, 850, 100, 8, 0),
(361, 348, 11, 850, 100, 8, 0),
(362, 350, 11, 1500, 100, 8, 0),
(363, 351, 11, 850, 100, 8, 0),
(364, 354, 11, 4200, 100, 8, 0),
(365, 355, 11, 5500, 100, 8, 0),
(366, 352, 11, 1800, 100, 8, 0),
(367, 353, 11, 2800, 100, 8, 0),
(368, 358, 11, 14000, 100, 8, 0),
(369, 359, 11, 16000, 100, 8, 0),
(370, 356, 11, 7000, 100, 8, 0),
(371, 357, 11, 11500, 100, 8, 0),
(372, 360, 11, 4500, 100, 8, 0),
(373, 361, 11, 4500, 100, 8, 0),
(374, 311, 11, 850, 100, 8, 0),
(375, 312, 11, 1750, 100, 8, 0),
(376, 313, 11, 2800, 100, 8, 0),
(377, 314, 11, 750, 100, 8, 0),
(378, 315, 11, 750, 100, 8, 0),
(379, 317, 11, 750, 100, 8, 0),
(380, 366, 12, 1000, 100, 8, 0),
(381, 363, 12, 1000, 100, 8, 0),
(382, 364, 12, 1000, 100, 8, 0),
(383, 365, 12, 1000, 100, 8, 0),
(384, 362, 12, 1000, 100, 8, 0),
(385, 367, 12, 1250, 500, 8, 0),
(386, 369, 12, 1250, 500, 8, 0),
(387, 368, 12, 1250, 500, 8, 0),
(388, 370, 12, 1250, 500, 8, 0),
(389, 371, 12, 8500, 24, 8, 0),
(390, 373, 12, 8500, 24, 8, 0),
(391, 372, 12, 8500, 24, 8, 0),
(392, 376, 12, 2000, 24, 8, 0),
(393, 375, 12, 2000, 24, 8, 0),
(394, 374, 12, 2000, 24, 8, 0),
(395, 377, 12, 2000, 24, 8, 0),
(396, 384, 12, 4000, 24, 8, 0),
(397, 385, 12, 4000, 24, 8, 0),
(398, 378, 12, 5100, 24, 8, 0),
(399, 379, 12, 5100, 24, 8, 0),
(400, 391, 12, 11500, 6, 8, 0),
(401, 395, 12, 11500, 6, 8, 0),
(402, 390, 12, 11500, 6, 8, 0),
(403, 393, 12, 11500, 6, 8, 0),
(404, 394, 12, 11500, 6, 8, 0),
(405, 392, 12, 11500, 6, 8, 0),
(408, 388, 12, 7000, 24, 8, 0),
(409, 389, 12, 7000, 24, 8, 0),
(410, 382, 12, 11250, 24, 8, 0),
(411, 383, 12, 11250, 24, 8, 0),
(412, 386, 12, 6000, 24, 8, 0),
(413, 387, 12, 6000, 24, 8, 0),
(414, 380, 12, 8250, 24, 8, 0),
(415, 381, 12, 8250, 24, 8, 0),
(416, 398, 13, 11000, 6, 8, 0),
(417, 396, 13, 11000, 6, 8, 0),
(418, 399, 13, 11000, 6, 8, 0),
(419, 397, 13, 11000, 6, 8, 0),
(420, 400, 13, 11000, 6, 8, 0),
(421, 402, 13, 11000, 6, 8, 0),
(423, 401, 13, 11000, 6, 8, 0),
(424, 410, 14, 8000, 24, 8, 0),
(425, 408, 14, 8000, 24, 8, 0),
(426, 409, 14, 8000, 24, 8, 0),
(431, 413, 14, 5000, 6, 8, 0),
(432, 412, 14, 5000, 6, 8, 0),
(433, 411, 14, 5000, 6, 8, 0),
(434, 414, 14, 55000, 6, 8, 0),
(435, 415, 14, 55000, 6, 8, 0),
(436, 416, 14, 55000, 6, 8, 0),
(437, 417, 14, 55000, 6, 8, 0),
(438, 418, 14, 6500, 24, 8, 0),
(439, 403, 14, 4500, 24, 8, 0),
(440, 404, 14, 4500, 24, 8, 0),
(441, 423, 14, 22500, 96, 8, 0),
(442, 425, 14, 15000, 50, 8, 0),
(443, 419, 14, 17000, 100, 8, 0),
(444, 429, 14, 15000, 100, 8, 0),
(445, 426, 14, 22000, 50, 8, 0),
(446, 420, 14, 25000, 100, 8, 0),
(447, 406, 14, 7000, 12, 8, 0),
(448, 405, 14, 7000, 12, 8, 0),
(449, 407, 14, 7000, 12, 8, 0),
(450, 424, 14, 2250, 96, 8, 0),
(451, 427, 14, 1500, 48, 8, 0),
(452, 421, 14, 1700, 128, 8, 0),
(453, 430, 14, 2500, 96, 8, 0),
(454, 428, 14, 2200, 48, 8, 0),
(455, 422, 14, 2500, 128, 8, 0),
(456, 431, 15, 30000, 6, 9, 0),
(457, 432, 15, 35000, 3, 9, 0),
(458, 433, 15, 1250, 20, 9, 0),
(459, 434, 15, 3000, 24, 9, 0),
(460, 435, 15, 12250, 20, 9, 0),
(461, 436, 15, 14000, 24, 9, 0),
(462, 437, 15, 12000, 4, 9, 0),
(463, 438, 15, 2250, 30, 9, 0),
(464, 439, 15, 2750, 10, 9, 0),
(465, 440, 15, 6500, 6, 9, 0),
(466, 441, 15, 175, 100, 9, 0),
(467, 442, 15, 6500, 12, 9, 0),
(468, 443, 15, 6500, 12, 9, 0),
(469, 444, 15, 6500, 12, 9, 0),
(470, 445, 15, 4500, 12, 9, 0),
(471, 446, 15, 3000, 40, 9, 0),
(472, 447, 15, 5500, 24, 9, 0),
(473, 448, 15, 5500, 24, 9, 0),
(474, 449, 15, 5500, 24, 9, 0),
(475, 450, 15, 5500, 24, 9, 0),
(476, 451, 15, 5500, 24, 9, 0),
(477, 452, 15, 10000, 24, 9, 0),
(478, 453, 15, 8500, 12, 9, 0),
(479, 454, 15, 8500, 12, 9, 0),
(480, 455, 15, 8500, 12, 9, 0),
(481, 456, 15, 8500, 12, 9, 0),
(482, 457, 15, 1020, 25, 9, 0),
(483, 458, 15, 6500, 2, 9, 0),
(484, 459, 15, 6500, 2, 9, 0),
(485, 460, 15, 6500, 2, 9, 0),
(486, 461, 15, 6500, 2, 9, 0),
(487, 462, 15, 6500, 2, 9, 0),
(488, 463, 15, 6500, 2, 9, 0),
(489, 464, 15, 750, 12, 9, 0),
(490, 465, 15, 750, 80, 9, 0),
(492, 466, 15, 1850, 80, 9, 0),
(493, 467, 15, 1750, 50, 9, 0),
(494, 468, 15, 800, 100, 9, 0),
(495, 469, 15, 350, 5, 9, 0),
(496, 470, 15, 5000, 5, 9, 0),
(497, 471, 15, 8000, 5, 9, 0),
(498, 472, 15, 350, 20, 9, 0),
(499, 473, 15, 2000, 10, 9, 0),
(500, 474, 15, 2000, 10, 9, 0),
(501, 475, 15, 2000, 10, 9, 0),
(502, 476, 15, 2000, 10, 9, 0),
(503, 477, 15, 2000, 10, 9, 0),
(504, 478, 15, 2000, 10, 9, 0),
(505, 479, 15, 2000, 10, 9, 0),
(506, 480, 15, 2000, 10, 9, 0),
(507, 481, 15, 2000, 10, 9, 0),
(508, 482, 15, 2000, 10, 9, 0),
(509, 483, 15, 16000, 40, 9, 0),
(510, 484, 15, 16000, 40, 9, 0),
(511, 485, 15, 14000, 30, 9, 0),
(512, 486, 15, 14000, 30, 9, 0),
(513, 487, 15, 25000, 10, 9, 0),
(514, 488, 15, 25000, 10, 9, 0),
(515, 489, 15, 27000, 1, 9, 0),
(516, 490, 15, 27000, 1, 9, 0),
(517, 491, 15, 27000, 1, 9, 0),
(518, 492, 15, 27000, 1, 9, 0),
(519, 493, 15, 27000, 1, 9, 0),
(520, 494, 15, 27000, 1, 9, 0),
(521, 495, 15, 21500, 1, 9, 0),
(522, 496, 15, 21500, 1, 9, 0),
(523, 497, 15, 21500, 1, 9, 0),
(524, 498, 15, 21500, 1, 9, 0),
(525, 499, 15, 21500, 1, 9, 0),
(526, 500, 15, 21500, 1, 9, 0),
(527, 501, 15, 20000, 2, 9, 0),
(528, 502, 15, 20000, 2, 9, 0),
(529, 503, 15, 20000, 2, 9, 0),
(530, 504, 15, 20000, 2, 9, 0),
(531, 505, 15, 20000, 2, 9, 0),
(532, 506, 15, 20000, 2, 9, 0),
(533, 507, 15, 17000, 2, 9, 0),
(534, 508, 15, 17000, 2, 9, 0),
(535, 509, 15, 17000, 2, 9, 0),
(536, 510, 15, 17000, 2, 9, 0),
(537, 511, 15, 17000, 2, 9, 0),
(538, 512, 15, 17000, 2, 9, 0),
(539, 513, 15, 25000, 2, 9, 0),
(540, 514, 15, 25000, 2, 9, 0),
(541, 515, 15, 25000, 2, 9, 0),
(542, 516, 15, 25000, 2, 9, 0),
(543, 517, 15, 25000, 2, 9, 0),
(544, 518, 15, 25000, 2, 9, 0),
(545, 519, 15, 13000, 2, 9, 0),
(546, 520, 15, 13000, 2, 9, 0),
(547, 521, 15, 13000, 2, 9, 0),
(548, 522, 15, 13000, 2, 9, 0),
(549, 523, 15, 13000, 2, 9, 0),
(550, 524, 15, 13000, 2, 9, 0),
(551, 525, 15, 3800, 12, 9, 0),
(552, 526, 15, 60000, 12, 9, 0),
(553, 527, 15, 40000, 12, 9, 0),
(554, 528, 15, 85000, 12, 9, 0),
(555, 529, 15, 100000, 12, 9, 0),
(556, 530, 15, 130000, 12, 9, 0),
(557, 531, 15, 7500, 12, 9, 0),
(558, 531, 15, 7500, 12, 9, 0),
(559, 532, 15, 7500, 12, 9, 0),
(560, 533, 15, 7500, 12, 9, 0),
(561, 534, 15, 10000, 6, 9, 0),
(562, 535, 15, 10000, 6, 9, 0),
(563, 536, 15, 10000, 6, 9, 0),
(564, 537, 15, 10000, 6, 9, 0),
(565, 538, 15, 10000, 6, 9, 0),
(566, 539, 15, 10000, 6, 9, 0),
(567, 540, 15, 10000, 6, 9, 0),
(568, 541, 15, 10000, 6, 9, 0),
(569, 542, 15, 750, 12, 9, 0),
(570, 543, 15, 6000, 12, 9, 0),
(571, 544, 15, 12000, 12, 9, 0),
(572, 545, 15, 2000, 12, 9, 0),
(573, 546, 15, 2000, 12, 9, 0),
(574, 547, 15, 2000, 12, 9, 0),
(575, 548, 15, 2000, 12, 9, 0),
(576, 549, 15, 2000, 12, 9, 0),
(577, 550, 15, 2000, 12, 9, 0),
(578, 551, 15, 2000, 12, 9, 0),
(579, 552, 15, 2000, 12, 9, 0),
(580, 553, 15, 2000, 12, 9, 0),
(581, 554, 15, 2000, 12, 9, 0),
(582, 555, 15, 2000, 12, 9, 0),
(583, 556, 15, 2000, 12, 9, 0),
(584, 557, 15, 2000, 12, 9, 0),
(585, 557, 15, 1667, 12, 9, 0),
(586, 558, 15, 1667, 12, 9, 0),
(587, 559, 15, 1667, 12, 9, 0),
(588, 559, 15, 1667, 12, 9, 0),
(589, 559, 15, 1667, 12, 9, 0),
(590, 560, 15, 90, 100, 9, 0),
(591, 561, 15, 7500, 2, 9, 0),
(593, 562, 15, 976, 100, 9, 0),
(594, 563, 15, 388, 100, 9, 0),
(595, 564, 15, 9999, 2, 9, 0),
(596, 565, 15, 19978, 2, 9, 0),
(597, 566, 15, 195, 100, 9, 0),
(598, 567, 15, 450, 100, 9, 0),
(599, 568, 15, 700, 100, 9, 0),
(600, 569, 15, 10000, 2, 9, 0),
(601, 570, 15, 22500, 2, 9, 0),
(602, 571, 15, 22500, 2, 9, 0),
(603, 572, 15, 1250, 10, 9, 0),
(604, 573, 15, 2250, 10, 9, 0),
(605, 574, 15, 2000, 10, 9, 0),
(606, 575, 15, 12000, 10, 9, 0),
(607, 576, 15, 20000, 3, 9, 0),
(608, 577, 15, 30000, 3, 9, 0),
(609, 578, 15, 42000, 1, 9, 0),
(610, 579, 15, 58000, 1, 9, 0),
(611, 580, 15, 68000, 1, 9, 0),
(612, 581, 15, 12000, 5, 9, 0),
(613, 582, 15, 15000, 1, 9, 0),
(614, 583, 15, 20000, 1, 9, 0),
(615, 584, 15, 2800, 10, 9, 0),
(616, 585, 15, 900, 24, 9, 0),
(617, 586, 15, 1250, 24, 9, 0),
(618, 587, 15, 2000, 24, 9, 0),
(619, 588, 15, 850, 24, 9, 0),
(620, 589, 15, 2860, 24, 9, 0),
(621, 590, 15, 3000, 24, 9, 0),
(622, 591, 15, 1750, 24, 9, 0),
(623, 592, 15, 1750, 24, 9, 0),
(624, 593, 15, 15000, 12, 9, 0),
(625, 594, 15, 13000, 12, 9, 0),
(626, 595, 15, 13000, 12, 9, 0),
(628, 597, 15, 22800, 3, 9, 0),
(629, 597, 15, 17500, 3, 9, 0),
(630, 598, 15, 2200, 12, 9, 0),
(631, 599, 15, 3500, 12, 9, 0),
(632, 600, 15, 21000, 3, 9, 0),
(633, 601, 15, 13000, 3, 9, 0),
(634, 602, 15, 30000, 3, 9, 0),
(635, 603, 15, 4760, 24, 9, 0),
(636, 604, 15, 50000, 6, 9, 0),
(637, 605, 15, 66000, 12, 9, 0),
(638, 606, 15, 52000, 12, 9, 0),
(639, 607, 15, 800, 12, 9, 0),
(640, 608, 15, 800, 12, 9, 0),
(641, 609, 15, 800, 12, 9, 0),
(642, 610, 15, 850, 48, 9, 0),
(643, 611, 15, 1750, 24, 9, 0),
(644, 612, 15, 1750, 24, 9, 0),
(645, 613, 15, 1200, 12, 9, 0),
(646, 614, 15, 800, 72, 9, 0),
(647, 615, 15, 1500, 72, 9, 0),
(648, 616, 15, 4200, 24, 9, 0),
(649, 617, 15, 6500, 24, 9, 0),
(650, 618, 15, 10000, 24, 9, 0),
(651, 619, 15, 4670, 12, 9, 0),
(652, 620, 15, 4670, 12, 9, 0),
(653, 621, 15, 18000, 12, 9, 0),
(654, 622, 15, 8650, 12, 9, 0),
(655, 623, 15, 12900, 24, 9, 0),
(656, 624, 16, 2500, 12, 9, 0),
(657, 625, 16, 2500, 12, 9, 0),
(658, 626, 16, 2500, 12, 9, 0),
(659, 627, 16, 2500, 12, 9, 0),
(660, 628, 16, 2500, 12, 9, 0),
(661, 629, 16, 2500, 12, 9, 0),
(662, 630, 16, 2500, 12, 9, 0),
(663, 631, 16, 2500, 12, 9, 0),
(664, 632, 16, 2500, 12, 9, 0),
(665, 633, 16, 2500, 12, 9, 0),
(666, 634, 16, 2500, 12, 9, 0),
(667, 635, 16, 2500, 12, 9, 0),
(668, 636, 16, 2500, 12, 9, 0),
(669, 637, 16, 2500, 12, 9, 0),
(670, 638, 16, 2500, 12, 9, 0),
(671, 639, 16, 2500, 12, 9, 0),
(672, 640, 16, 3529, 6, 9, 1),
(673, 641, 16, 3529, 6, 9, 1),
(674, 642, 16, 3529, 6, 9, 1),
(675, 643, 16, 3529, 6, 9, 1),
(676, 644, 16, 3529, 6, 9, 1),
(677, 645, 16, 3529, 6, 9, 1),
(678, 646, 16, 3529, 6, 9, 1),
(679, 647, 16, 3529, 6, 9, 1),
(681, 648, 16, 800, 48, 9, 0),
(682, 649, 16, 800, 48, 9, 0),
(683, 650, 16, 30000, 16, 9, 0),
(684, 651, 16, 30000, 16, 9, 0),
(685, 652, 16, 19000, 6, 9, 0),
(686, 653, 16, 16000, 6, 9, 0),
(687, 654, 16, 756, 24, 9, 1),
(690, 655, 16, 3250, 12, 9, 0),
(691, 656, 16, 4500, 12, 9, 0),
(692, 657, 16, 1000, 30, 9, 0),
(693, 658, 16, 1000, 30, 9, 0),
(694, 659, 16, 1000, 30, 9, 0),
(703, 661, 16, 1250, 30, 9, 0),
(704, 660, 16, 1250, 30, 9, 0),
(705, 662, 16, 1250, 30, 9, 0),
(706, 663, 16, 1800, 30, 9, 0),
(707, 664, 16, 1800, 30, 9, 0),
(708, 665, 16, 1800, 30, 9, 0),
(709, 666, 16, 2000, 12, 9, 0),
(710, 667, 16, 2000, 12, 9, 0),
(711, 668, 16, 2000, 12, 9, 0),
(712, 669, 16, 750, 12, 9, 0),
(713, 670, 16, 750, 12, 9, 0),
(714, 671, 16, 750, 12, 9, 0),
(715, 672, 16, 750, 12, 9, 0),
(716, 673, 16, 750, 12, 9, 0),
(717, 674, 16, 750, 12, 9, 0),
(718, 675, 16, 9000, 12, 9, 0),
(719, 676, 16, 850, 48, 9, 1),
(720, 677, 16, 1250, 8, 9, 0),
(721, 678, 16, 1250, 8, 9, 0),
(722, 679, 16, 1250, 8, 9, 0),
(723, 680, 16, 1250, 8, 9, 0),
(724, 681, 16, 1750, 4, 9, 0),
(725, 682, 16, 1750, 4, 9, 0),
(726, 683, 16, 1750, 4, 9, 0),
(727, 684, 16, 1750, 4, 9, 0),
(728, 685, 16, 2250, 4, 9, 0),
(729, 686, 16, 2250, 4, 9, 0),
(730, 687, 16, 350, 96, 9, 0),
(731, 688, 16, 900, 48, 9, 0),
(732, 689, 16, 1250, 48, 9, 0),
(733, 690, 16, 2000, 48, 9, 0),
(734, 691, 16, 2250, 48, 9, 0),
(735, 692, 16, 1200, 24, 9, 0),
(736, 693, 16, 3000, 24, 9, 0),
(738, 694, 16, 1000, 24, 9, 0),
(740, 695, 16, 1000, 24, 9, 0),
(741, 696, 16, 1000, 24, 9, 0),
(742, 697, 16, 850, 24, 9, 0),
(743, 698, 16, 850, 24, 9, 0),
(744, 699, 16, 850, 24, 9, 0),
(745, 700, 16, 850, 24, 9, 0),
(746, 701, 16, 850, 24, 9, 0),
(747, 702, 16, 850, 24, 9, 0),
(748, 703, 16, 850, 24, 9, 0),
(749, 704, 16, 850, 24, 9, 0),
(750, 705, 16, 1250, 24, 9, 0),
(751, 706, 16, 1250, 24, 9, 0),
(752, 707, 16, 1250, 24, 9, 0),
(753, 708, 16, 1250, 24, 9, 0),
(754, 709, 16, 1250, 24, 9, 0),
(755, 710, 16, 1250, 24, 9, 0),
(756, 711, 16, 1250, 24, 9, 0),
(757, 712, 16, 1250, 24, 9, 0),
(758, 713, 16, 1250, 24, 9, 0),
(759, 714, 16, 1750, 24, 9, 0),
(760, 715, 16, 1750, 24, 9, 0),
(761, 716, 16, 1750, 24, 9, 0),
(762, 717, 16, 1750, 24, 9, 0),
(763, 718, 16, 1750, 24, 9, 0),
(764, 719, 16, 1750, 24, 9, 0),
(765, 720, 16, 1850, 3, 9, 0),
(766, 721, 16, 1850, 3, 9, 0),
(767, 722, 16, 1850, 3, 9, 0),
(768, 723, 16, 1850, 3, 9, 0),
(769, 724, 16, 1850, 3, 9, 0),
(770, 725, 16, 1850, 3, 9, 0),
(771, 726, 16, 15000, 3, 9, 0),
(772, 727, 16, 15000, 3, 9, 0),
(773, 728, 16, 15000, 3, 9, 0),
(774, 729, 16, 15000, 3, 9, 0),
(775, 730, 16, 28000, 3, 9, 0),
(776, 731, 16, 28000, 3, 9, 0),
(777, 732, 16, 28000, 3, 9, 0),
(778, 733, 16, 850, 50, 9, 0),
(779, 734, 16, 1750, 50, 9, 0),
(780, 735, 16, 2800, 50, 9, 0),
(781, 736, 16, 750, 50, 9, 0),
(782, 737, 16, 750, 50, 9, 0),
(783, 738, 16, 750, 50, 9, 0),
(784, 739, 16, 750, 50, 9, 0),
(785, 740, 16, 850, 25, 9, 0),
(786, 741, 16, 850, 50, 9, 0),
(787, 742, 16, 850, 50, 9, 0),
(788, 743, 16, 850, 50, 9, 0),
(789, 744, 16, 850, 50, 9, 0),
(790, 745, 16, 850, 50, 9, 0),
(791, 746, 16, 850, 50, 9, 0),
(792, 747, 16, 850, 50, 9, 0),
(793, 748, 16, 850, 50, 9, 0),
(794, 749, 16, 850, 50, 9, 0),
(795, 750, 16, 850, 50, 9, 0),
(796, 751, 16, 850, 50, 9, 0),
(797, 752, 16, 850, 50, 9, 0),
(798, 753, 16, 850, 50, 9, 0),
(799, 754, 16, 850, 50, 9, 0),
(800, 755, 16, 850, 50, 9, 0),
(801, 756, 16, 850, 50, 9, 0),
(802, 757, 16, 850, 50, 9, 0),
(803, 758, 16, 850, 50, 9, 0),
(804, 759, 16, 850, 50, 9, 0),
(805, 760, 16, 850, 50, 9, 0),
(806, 761, 16, 850, 50, 9, 0),
(807, 762, 16, 850, 50, 9, 0),
(808, 763, 16, 850, 50, 9, 0),
(809, 764, 16, 850, 50, 9, 0),
(810, 765, 16, 850, 50, 9, 0),
(811, 766, 16, 850, 50, 9, 0),
(812, 767, 16, 850, 50, 9, 0),
(813, 768, 16, 850, 50, 9, 0),
(814, 769, 16, 850, 50, 9, 0),
(815, 770, 16, 850, 50, 9, 0),
(816, 771, 16, 850, 50, 9, 0),
(817, 772, 16, 1500, 50, 9, 0),
(818, 773, 16, 850, 50, 9, 0),
(819, 774, 16, 1800, 50, 9, 0),
(820, 775, 16, 2800, 50, 9, 0),
(821, 776, 16, 4200, 50, 9, 0),
(822, 777, 16, 5500, 50, 9, 0),
(823, 778, 16, 7500, 50, 9, 0),
(824, 779, 16, 11500, 50, 9, 0),
(825, 780, 16, 14000, 50, 9, 0),
(826, 781, 16, 16000, 50, 9, 0),
(827, 782, 16, 4500, 50, 9, 0),
(828, 783, 16, 4500, 50, 9, 0),
(829, 784, 16, 1000, 50, 9, 0),
(830, 785, 16, 1000, 50, 9, 0),
(831, 786, 16, 1000, 50, 9, 0),
(832, 787, 16, 1000, 50, 9, 0),
(833, 788, 16, 1000, 50, 9, 0),
(834, 789, 16, 1250, 50, 9, 0),
(835, 790, 16, 1250, 50, 9, 0),
(836, 791, 16, 1250, 50, 9, 0),
(837, 792, 16, 1250, 50, 9, 0),
(838, 793, 16, 8500, 50, 9, 0),
(839, 794, 16, 8500, 50, 9, 0),
(840, 795, 16, 8500, 50, 9, 0),
(841, 796, 16, 2000, 10, 9, 0),
(842, 797, 16, 2000, 10, 9, 0),
(843, 798, 16, 2000, 10, 9, 0),
(844, 799, 16, 2000, 10, 9, 0),
(845, 800, 16, 5100, 12, 9, 0),
(846, 801, 16, 5100, 12, 9, 0),
(847, 802, 16, 8250, 12, 9, 0),
(848, 803, 16, 8250, 12, 9, 0),
(849, 804, 16, 11250, 12, 9, 0),
(850, 805, 16, 11250, 12, 9, 0),
(851, 806, 16, 4000, 12, 9, 0),
(852, 807, 16, 4000, 12, 9, 0),
(853, 808, 16, 6000, 12, 9, 0),
(854, 809, 16, 6000, 12, 9, 0),
(855, 810, 16, 7000, 12, 9, 0),
(856, 811, 16, 7000, 12, 9, 0),
(857, 812, 16, 11500, 12, 9, 0),
(858, 813, 16, 11500, 12, 9, 0),
(859, 814, 16, 11500, 12, 9, 0),
(860, 815, 16, 11500, 12, 9, 0),
(861, 816, 16, 11500, 12, 9, 0),
(862, 817, 16, 11500, 12, 9, 0),
(863, 818, 16, 11000, 12, 9, 0),
(864, 819, 16, 11000, 12, 9, 0),
(865, 820, 16, 11000, 12, 9, 0),
(866, 821, 16, 11000, 12, 9, 0),
(867, 822, 16, 11000, 12, 9, 0),
(868, 823, 16, 11000, 12, 9, 0),
(869, 824, 16, 11000, 12, 9, 0),
(870, 825, 16, 4500, 12, 9, 0),
(871, 826, 16, 4500, 12, 9, 0),
(872, 827, 16, 7000, 12, 9, 0),
(873, 828, 16, 7000, 24, 9, 0),
(874, 829, 16, 7000, 24, 9, 0),
(875, 830, 16, 8000, 24, 9, 0),
(876, 831, 16, 8000, 24, 9, 0),
(877, 832, 16, 8000, 24, 9, 0),
(878, 833, 16, 5000, 24, 9, 0),
(879, 834, 16, 5000, 24, 9, 0),
(880, 835, 16, 5000, 24, 9, 0),
(881, 836, 16, 55000, 24, 9, 0),
(882, 837, 16, 55000, 24, 9, 0),
(883, 838, 16, 55000, 24, 9, 0),
(884, 839, 16, 55000, 24, 9, 0),
(885, 840, 16, 6500, 24, 9, 0),
(886, 841, 16, 17000, 24, 9, 0),
(887, 842, 16, 25000, 24, 9, 0),
(888, 843, 16, 1700, 24, 9, 0),
(889, 844, 16, 1700, 24, 9, 0),
(890, 845, 16, 22500, 24, 9, 0),
(891, 846, 16, 2250, 24, 9, 0),
(892, 847, 16, 15000, 24, 9, 0),
(893, 848, 16, 22000, 24, 9, 0),
(894, 849, 16, 1500, 24, 9, 0),
(896, 850, 16, 2500, 24, 9, 0),
(897, 851, 16, 15000, 24, 9, 0),
(898, 852, 16, 2500, 24, 9, 0),
(899, 853, 17, 30000, 12, 8, 0),
(900, 854, 17, 37500, 12, 8, 0),
(901, 855, 18, 15000, 12, 8, 1),
(902, 856, 18, 10000, 12, 8, 1),
(903, 857, 18, 8500, 60, 8, 0),
(904, 858, 18, 6875, 48, 8, 0),
(905, 859, 18, 22000, 6, 8, 0),
(906, 860, 18, 917, 144, 8, 4),
(907, 861, 18, 18500, 12, 8, 0),
(908, 862, 18, 15000, 8, 8, 0),
(909, 863, 18, 800, 144, 8, 0),
(910, 864, 18, 5000, 60, 8, 0),
(911, 866, 19, 6000, 12, 9, 0),
(912, 867, 19, 10000, 12, 9, 0),
(913, 865, 20, 10000, 20, 8, 0),
(914, 870, 21, 20000, 100, 8, 0),
(915, 871, 21, 8000, 100, 8, 0),
(916, 872, 21, 3000, 150, 8, 0),
(917, 873, 21, 1750, 200, 8, 0),
(918, 874, 21, 2000, 200, 8, 0),
(919, 875, 22, 15000, 100, 8, 0),
(920, 876, 22, 15000, 100, 8, 0),
(921, 877, 22, 15000, 100, 8, 0),
(922, 878, 22, 30000, 100, 8, 0),
(923, 879, 22, 30000, 100, 8, 0),
(924, 880, 23, 26000, 100, 8, 0),
(925, 881, 23, 30000, 100, 8, 0),
(926, 882, 23, 30000, 100, 8, 0),
(927, 883, 23, 30000, 100, 8, 0),
(928, 884, 24, 1800, 1000, 8, 0),
(929, 885, 24, 1800, 1000, 8, 0),
(930, 886, 24, 1800, 1000, 8, 0),
(931, 887, 24, 1800, 1000, 8, 0),
(932, 888, 25, 3000, 1000, 8, 0),
(933, 889, 25, 15000, 1000, 8, 0),
(934, 890, 25, 15000, 1000, 8, 0),
(935, 891, 25, 15000, 1000, 8, 0),
(936, 892, 25, 15000, 1000, 8, 0),
(937, 893, 25, 15000, 1000, 8, 0),
(938, 894, 25, 15000, 1000, 8, 0),
(939, 895, 25, 15000, 1000, 8, 0);

--
-- Trigger `detailpembelian`
--
DELIMITER $$
CREATE TRIGGER `After_tambah_detail_pembelian` AFTER INSERT ON `detailpembelian` FOR EACH ROW BEGIN

UPDATE detailbarang SET stokAwal=stokAwal+NEW.jumlahBeli WHERE id=NEW.idBarang;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BEFORE_detailpembelian_DELETE` BEFORE DELETE ON `detailpembelian` FOR EACH ROW BEGIN

UPDATE detailbarang SET stokAwal=stokAwal-OLD.jumlahBeli WHERE id=OLD.idBarang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `id` int(255) NOT NULL,
  `idPenjualan` int(225) DEFAULT NULL,
  `idBarang` int(225) DEFAULT NULL,
  `jumlahJual` int(10) NOT NULL,
  `potongan` int(12) NOT NULL,
  `idAdmin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`id`, `idPenjualan`, `idBarang`, `jumlahJual`, `potongan`, `idAdmin`) VALUES
(15, 2, 1, 1, 0, 8),
(16, 2, 5, 1, 0, 8),
(17, 2, 7, 1, 0, 8),
(18, 2, 13, 4, 0, 8),
(19, 2, 15, 1, 0, 8),
(20, 2, 18, 1, 0, 8),
(21, 2, 1, 1, 0, 8),
(22, 2, 19, 1, 0, 8),
(23, 2, 24, 1, 0, 8),
(24, 2, 25, 1, 0, 8),
(25, 2, 29, 1, 0, 8),
(26, 2, 13, 4, 0, 8),
(27, 2, 30, 2, 0, 8),
(28, 2, 40, 3, 0, 8),
(29, 2, 118, 1, 0, 8),
(30, 2, 42, 1, 0, 8),
(31, 2, 190, 1, 0, 8),
(32, 2, 119, 3, 0, 8),
(33, 2, 36, 3, 0, 8),
(34, 2, 39, 5, 0, 8),
(35, 2, 40, 1, 0, 8),
(36, 2, 43, 1, 0, 8),
(37, 2, 15, 2, 0, 8),
(38, 2, 18, 2, 0, 8),
(39, 2, 98, 2, 0, 8),
(40, 2, 530, 2, 0, 8),
(41, 3, 531, 2, 0, 9),
(42, 3, 647, 2, 0, 9),
(43, 3, 535, 2, 0, 9),
(44, 3, 601, 2, 1000, 9),
(45, 3, 566, 2, 0, 9),
(46, 3, 573, 1, 0, 9),
(47, 3, 593, 1, 0, 9),
(48, 3, 602, 1, 0, 9),
(49, 3, 668, 1, 0, 9),
(50, 3, 603, 5, 0, 9),
(51, 3, 606, 1, 0, 9),
(52, 3, 499, 1, 0, 9),
(54, 3, 566, 5, 0, 9),
(55, 3, 528, 1, 0, 9),
(56, 4, 7, 1, 0, 8),
(57, 4, 11, 1, 0, 8),
(58, 4, 151, 1, 0, 8),
(59, 4, 149, 2, 0, 8),
(60, 4, 376, 2, 0, 8),
(61, 4, 30, 1, 0, 8),
(62, 4, 164, 2, 0, 8),
(63, 4, 45, 1, 0, 8),
(64, 4, 40, 1, 0, 8),
(65, 4, 119, 3, 0, 8),
(66, 4, 188, 1, 0, 8),
(67, 4, 379, 1, 0, 8),
(68, 4, 387, 1, 0, 8),
(69, 4, 312, 1, 0, 8),
(70, 4, 33, 1, 0, 8),
(71, 4, 192, 1, 0, 8),
(72, 4, 184, 5, 0, 8),
(73, 4, 160, 5, 0, 8),
(74, 4, 381, 5, 0, 8),
(75, 4, 11, 2, 0, 8),
(76, 4, 50, 2, 0, 8),
(77, 4, 61, 2, 0, 8),
(78, 4, 44, 1, 0, 8),
(79, 4, 96, 1, 0, 8),
(80, 4, 113, 3, 0, 8),
(81, 5, 831, 5, 0, 9),
(82, 5, 835, 3, 0, 9),
(83, 5, 836, 5, 0, 9),
(84, 5, 829, 2, 0, 9),
(85, 6, 356, 3, 0, 8),
(86, 6, 381, 3, 0, 8),
(87, 6, 9, 5, 0, 8),
(88, 6, 12, 5, 0, 8),
(89, 6, 10, 5, 0, 8),
(90, 6, 11, 2, 0, 8),
(91, 6, 146, 4, 0, 8),
(92, 6, 159, 4, 0, 8),
(93, 6, 268, 4, 0, 8),
(94, 6, 162, 10, 0, 8),
(95, 6, 165, 2, 0, 8),
(96, 6, 181, 2, 0, 8),
(97, 6, 158, 3, 0, 8),
(98, 6, 322, 10, 0, 8),
(99, 6, 326, 10, 0, 8),
(100, 6, 420, 2, 0, 8),
(101, 6, 844, 3, 0, 8),
(102, 6, 184, 4, 0, 8),
(103, 6, 120, 2, 0, 8),
(104, 6, 124, 2, 0, 8),
(105, 6, 128, 2, 0, 8),
(106, 6, 28, 2, 0, 8),
(107, 6, 188, 2, 0, 8),
(108, 6, 191, 2, 0, 8),
(109, 7, 617, 3, 0, 9),
(110, 7, 851, 3, 0, 9),
(111, 7, 827, 3, 0, 9),
(112, 7, 821, 3, 0, 9),
(113, 7, 811, 3, 0, 9),
(114, 7, 795, 3, 0, 9),
(115, 7, 782, 3, 0, 9),
(116, 7, 765, 3, 0, 9),
(117, 7, 765, 7, 0, 9),
(118, 7, 732, 1, 0, 9),
(119, 7, 723, 2, 0, 9),
(120, 8, 8, 3, 0, 8),
(121, 8, 147, 3, 0, 8),
(122, 8, 422, 3, 0, 8),
(123, 8, 148, 3, 0, 8),
(126, 8, 435, 5, 0, 8),
(127, 8, 420, 5, 0, 8),
(128, 8, 146, 5, 0, 8),
(129, 8, 383, 5, 0, 8),
(130, 8, 385, 5, 0, 8),
(131, 9, 548, 3, 0, 9),
(132, 9, 545, 3, 0, 9),
(133, 9, 557, 3, 0, 9),
(134, 9, 594, 2, 0, 9),
(135, 9, 615, 2, 0, 9),
(136, 9, 612, 4, 0, 9),
(137, 9, 850, 4, 0, 9),
(138, 9, 809, 4, 0, 9),
(139, 9, 803, 4, 0, 9),
(140, 9, 806, 4, 0, 9),
(141, 9, 541, 4, 0, 9),
(142, 9, 549, 4, 0, 9),
(143, 9, 542, 4, 0, 9),
(144, 9, 641, 4, 0, 9),
(145, 9, 623, 4, 0, 9),
(146, 9, 626, 4, 0, 9),
(147, 9, 638, 4, 0, 9),
(150, 10, 50, 3, 0, 8),
(151, 10, 47, 3, 0, 8),
(152, 10, 44, 3, 0, 8),
(153, 10, 58, 3, 0, 8),
(155, 10, 62, 2, 0, 8),
(156, 10, 71, 1, 0, 8),
(157, 10, 102, 2, 1000, 8),
(159, 10, 97, 2, 0, 8),
(160, 10, 112, 2, 0, 8),
(161, 10, 7, 2, 0, 8),
(162, 10, 147, 2, 0, 8),
(163, 10, 421, 2, 0, 8),
(164, 10, 428, 2, 0, 8),
(165, 10, 430, 2, 0, 8),
(166, 10, 425, 2, 0, 8),
(167, 10, 430, 5, 0, 8),
(168, 11, 540, 3, 0, 9),
(169, 11, 538, 3, 0, 9),
(170, 11, 549, 3, 0, 9),
(171, 11, 542, 3, 0, 9),
(172, 11, 624, 3, 0, 9),
(173, 11, 641, 2, 0, 9),
(174, 11, 619, 2, 0, 9),
(175, 11, 638, 2, 0, 9),
(176, 11, 631, 2, 0, 9),
(177, 11, 615, 2, 0, 9),
(178, 11, 594, 2, 0, 9),
(179, 11, 599, 2, 0, 9),
(182, 11, 601, 1, 0, 9),
(183, 11, 599, 4, 0, 9),
(184, 11, 593, 4, 0, 9),
(185, 11, 609, 10, 0, 9),
(186, 11, 466, 10, 0, 9),
(187, 11, 590, 5, 0, 9),
(188, 11, 465, 5, 0, 9),
(193, 11, 458, 2, 0, 9),
(194, 12, 573, 3, 0, 8),
(195, 12, 851, 3, 0, 8),
(196, 12, 849, 3, 0, 8),
(197, 12, 436, 3, 0, 8),
(201, 12, 159, 10, 0, 8),
(202, 12, 269, 10, 0, 8),
(203, 12, 162, 10, 0, 8),
(204, 12, 158, 10, 0, 8),
(205, 12, 394, 3, 0, 8),
(206, 12, 399, 3, 0, 8),
(207, 12, 401, 3, 0, 8),
(208, 12, 801, 6, 0, 8),
(211, 12, 312, 6, 0, 8),
(212, 12, 313, 10, 0, 8),
(213, 12, 356, 10, 0, 8),
(214, 12, 359, 10, 0, 8),
(215, 12, 357, 10, 0, 8),
(216, 13, 588, 10, 0, 9),
(217, 13, 568, 10, 0, 9),
(218, 13, 585, 10, 0, 9),
(219, 13, 584, 10, 0, 9),
(220, 13, 587, 10, 0, 9),
(221, 13, 540, 3, 0, 9),
(223, 13, 546, 3, 0, 9),
(224, 13, 549, 3, 0, 9),
(225, 13, 557, 3, 0, 9),
(226, 13, 467, 10, 0, 9),
(227, 13, 615, 10, 0, 9),
(228, 13, 482, 5, 0, 9),
(229, 13, 477, 5, 0, 9),
(230, 13, 475, 5, 0, 9),
(231, 13, 446, 10, 0, 9),
(232, 13, 646, 3, 0, 9),
(233, 13, 442, 4, 0, 9),
(234, 14, 426, 3, 0, 8),
(235, 14, 1, 3, 0, 8),
(236, 14, 7, 3, 0, 8),
(241, 14, 18, 1, 0, 8),
(242, 14, 25, 1, 0, 8),
(243, 14, 25, 3, 0, 8),
(244, 14, 5, 3, 0, 8),
(245, 14, 13, 3, 0, 8),
(246, 14, 174, 3, 0, 8),
(247, 14, 58, 3, 0, 8),
(248, 14, 13, 3, 0, 8),
(249, 14, 322, 3, 0, 8),
(250, 14, 5, 3, 0, 8),
(251, 14, 44, 3, 0, 8),
(252, 14, 13, 3, 0, 8),
(253, 14, 57, 3, 0, 8),
(254, 14, 425, 3, 0, 8),
(255, 14, 44, 3, 0, 8),
(256, 14, 339, 3, 0, 8),
(257, 14, 123, 3, 0, 8),
(258, 14, 160, 3, 0, 8),
(259, 14, 179, 3, 0, 8),
(260, 14, 4, 3, 0, 8),
(261, 15, 441, 2, 0, 9),
(262, 15, 432, 2, 0, 9),
(263, 15, 435, 2, 0, 9),
(264, 15, 431, 2, 0, 9),
(265, 15, 449, 2, 0, 9),
(266, 15, 431, 2, 0, 9),
(267, 15, 444, 2, 0, 9),
(268, 15, 446, 1, 0, 9),
(269, 15, 746, 1, 0, 9),
(270, 15, 532, 2, 0, 9),
(271, 15, 441, 2, 0, 9),
(272, 15, 431, 2, 0, 9),
(273, 15, 441, 2, 0, 9),
(281, 15, 605, 1, 0, 9),
(285, 15, 446, 1, 0, 9),
(286, 15, 446, 5, 0, 9),
(288, 16, 5, 2, 0, 8),
(289, 16, 160, 2, 0, 8),
(290, 16, 5, 2, 0, 8),
(291, 16, 229, 2, 0, 8),
(293, 16, 1, 1, 0, 8),
(295, 16, 160, 1, 0, 8),
(296, 16, 4, 1, 0, 8),
(297, 16, 92, 1, 0, 8),
(298, 16, 43, 1, 0, 8),
(299, 16, 4, 1, 0, 8),
(300, 16, 5, 1, 0, 8),
(301, 16, 5, 1, 0, 8),
(302, 16, 6, 1, 0, 8),
(303, 16, 426, 3, 0, 8),
(304, 16, 184, 3, 0, 8),
(305, 16, 372, 3, 0, 8),
(308, 16, 77, 2, 0, 8),
(309, 16, 419, 2, 0, 8),
(310, 16, 410, 2, 0, 8),
(311, 16, 268, 2, 0, 8),
(312, 16, 185, 2, 0, 8),
(313, 16, 160, 2, 0, 8),
(314, 16, 160, 2, 0, 8),
(315, 16, 425, 2, 0, 8),
(316, 16, 423, 2, 0, 8),
(317, 16, 425, 2, 0, 8),
(318, 16, 412, 2, 0, 8),
(319, 16, 275, 2, 0, 8),
(320, 16, 384, 2, 0, 8),
(321, 16, 234, 4, 0, 8),
(322, 16, 419, 4, 0, 8),
(323, 16, 425, 4, 0, 8),
(324, 16, 429, 4, 0, 8),
(325, 16, 404, 4, 0, 8),
(326, 16, 347, 4, 0, 8),
(329, 16, 90, 2, 0, 8),
(330, 17, 847, 5, 0, 9),
(331, 17, 851, 5, 0, 9),
(332, 17, 826, 5, 0, 9),
(333, 17, 820, 5, 0, 9),
(334, 17, 658, 5, 0, 9),
(335, 17, 834, 5, 0, 9),
(336, 17, 746, 5, 0, 9),
(341, 17, 514, 2, 0, 9),
(342, 17, 851, 2, 0, 9),
(343, 17, 822, 2, 0, 9),
(344, 17, 834, 2, 0, 9),
(345, 17, 718, 2, 0, 9),
(346, 17, 834, 2, 0, 9),
(347, 17, 823, 2, 0, 9),
(348, 17, 757, 2, 0, 9),
(349, 18, 5, 1, 0, 8),
(350, 18, 4, 1, 0, 8),
(351, 18, 6, 1, 0, 8),
(365, 18, 18, 1, 0, 8),
(368, 18, 18, 10, 0, 8),
(369, 18, 426, 10, 0, 8),
(370, 18, 429, 10, 0, 8),
(371, 18, 275, 10, 0, 8),
(372, 18, 410, 10, 0, 8),
(374, 18, 412, 3, 0, 8),
(376, 18, 412, 1, 0, 8),
(377, 18, 124, 1, 0, 8),
(378, 18, 130, 4, 0, 8),
(379, 18, 360, 4, 0, 8),
(380, 18, 363, 4, 0, 8),
(381, 18, 185, 4, 0, 8),
(386, 18, 91, 2, 0, 8),
(387, 18, 426, 4, 0, 8),
(388, 18, 408, 4, 0, 8),
(389, 19, 848, 4, 0, 9),
(390, 19, 817, 4, 0, 9),
(391, 19, 830, 4, 0, 9),
(392, 19, 745, 4, 0, 9),
(393, 19, 831, 4, 0, 9),
(394, 19, 833, 4, 0, 9),
(395, 19, 847, 4, 0, 9),
(396, 19, 773, 4, 0, 9),
(397, 19, 833, 4, 0, 9),
(398, 19, 847, 4, 0, 9),
(399, 19, 784, 4, 0, 9),
(400, 20, 6, 3, 0, 8),
(401, 20, 120, 3, 0, 8),
(402, 20, 428, 3, 0, 8),
(403, 20, 427, 3, 0, 8),
(404, 20, 425, 3, 0, 8),
(405, 20, 406, 3, 0, 8),
(406, 20, 365, 3, 0, 8),
(407, 20, 428, 3, 0, 8),
(408, 20, 427, 3, 0, 8),
(409, 20, 191, 3, 0, 8),
(410, 20, 411, 3, 0, 8),
(411, 20, 409, 3, 0, 8),
(412, 20, 428, 3, 0, 8),
(413, 20, 428, 3, 0, 8),
(414, 20, 174, 3, 0, 8),
(415, 20, 413, 3, 0, 8),
(416, 20, 418, 3, 0, 8),
(417, 20, 411, 3, 0, 8),
(418, 20, 307, 3, 0, 8),
(419, 20, 355, 3, 0, 8),
(420, 20, 324, 3, 0, 8),
(422, 20, 130, 2, 0, 8),
(423, 20, 430, 2, 0, 8),
(424, 20, 335, 2, 0, 8),
(425, 20, 324, 5, 0, 8),
(426, 20, 428, 5, 0, 8),
(427, 20, 415, 5, 0, 8),
(428, 20, 254, 5, 0, 8),
(429, 20, 254, 13, 0, 8),
(430, 20, 184, 13, 0, 8),
(432, 20, 407, 1, 0, 8),
(433, 20, 414, 1, 0, 8),
(434, 21, 439, 6, 0, 9),
(435, 21, 746, 6, 0, 9),
(436, 21, 845, 6, 0, 9),
(439, 21, 600, 3, 0, 9),
(440, 21, 629, 3, 0, 9),
(441, 21, 781, 3, 0, 9),
(442, 21, 746, 3, 0, 9),
(443, 21, 835, 3, 0, 9),
(444, 21, 746, 3, 0, 9),
(445, 22, 175, 3, 0, 8),
(446, 22, 365, 3, 0, 8),
(447, 22, 365, 3, 0, 8),
(448, 22, 362, 3, 0, 8),
(449, 22, 339, 3, 0, 8),
(450, 22, 427, 3, 0, 8),
(451, 22, 409, 3, 0, 8),
(452, 22, 324, 3, 0, 8),
(453, 22, 429, 3, 0, 8),
(454, 22, 408, 3, 0, 8),
(455, 22, 403, 3, 0, 8),
(456, 22, 408, 3, 0, 8),
(457, 22, 402, 3, 0, 8),
(458, 22, 427, 3, 0, 8),
(459, 22, 422, 3, 0, 8),
(461, 22, 88, 2, 0, 8),
(462, 22, 409, 2, 0, 8),
(463, 22, 400, 2, 0, 8),
(464, 22, 410, 2, 0, 8),
(465, 23, 832, 2, 0, 9),
(466, 23, 850, 2, 0, 9),
(467, 23, 831, 2, 0, 9),
(468, 23, 823, 2, 0, 9),
(469, 23, 597, 2, 0, 9),
(470, 23, 651, 2, 0, 9),
(471, 23, 850, 2, 0, 9),
(472, 23, 848, 4, 0, 9),
(473, 24, 436, 3, 0, 9),
(474, 24, 834, 3, 0, 9),
(475, 24, 848, 3, 0, 9),
(476, 24, 757, 3, 0, 9),
(477, 25, 11, 1, 0, 8),
(478, 25, 427, 1, 0, 8),
(479, 25, 365, 4, 0, 8),
(480, 25, 404, 4, 0, 8),
(481, 25, 207, 4, 0, 8),
(482, 25, 404, 4, 0, 8),
(483, 25, 393, 4, 0, 8),
(484, 25, 426, 4, 0, 8),
(485, 25, 429, 4, 0, 8),
(486, 26, 6, 4, 0, 8),
(487, 26, 16, 4, 0, 8),
(488, 26, 404, 4, 0, 8),
(489, 26, 426, 4, 0, 8),
(490, 26, 427, 4, 0, 8),
(491, 26, 427, 4, 0, 8),
(492, 26, 362, 4, 0, 8),
(493, 26, 428, 4, 0, 8),
(494, 26, 426, 4, 0, 8),
(495, 26, 430, 4, 0, 8),
(496, 26, 428, 4, 0, 8),
(497, 26, 426, 4, 0, 8),
(498, 26, 428, 4, 0, 8),
(499, 26, 161, 4, 0, 8),
(501, 26, 430, 4, 0, 8),
(502, 26, 428, 4, 0, 8),
(503, 26, 422, 4, 0, 8),
(506, 26, 402, 3, 0, 8),
(507, 26, 425, 3, 0, 8),
(508, 26, 423, 6, 0, 8),
(509, 26, 422, 6, 0, 8),
(510, 26, 420, 6, 0, 8),
(511, 26, 355, 6, 0, 8),
(512, 26, 324, 6, 0, 8),
(513, 26, 425, 6, 0, 8),
(514, 26, 425, 6, 0, 8),
(522, 27, 496, 1, 0, 9),
(523, 27, 848, 1, 0, 9),
(524, 27, 844, 1, 0, 9),
(525, 27, 849, 1, 0, 9),
(526, 27, 846, 1, 0, 9),
(527, 27, 842, 1, 0, 9),
(528, 27, 839, 1, 0, 9),
(529, 27, 810, 2, 0, 9),
(530, 27, 730, 2, 0, 9),
(531, 27, 847, 2, 0, 9),
(532, 27, 809, 2, 0, 9),
(533, 27, 651, 2, 0, 9),
(536, 27, 578, 1, 0, 9),
(537, 27, 577, 1, 0, 9),
(538, 27, 786, 1, 0, 9),
(539, 27, 748, 4, 0, 9),
(540, 28, 5, 3, 0, 8),
(541, 28, 427, 3, 0, 8),
(542, 28, 365, 3, 0, 8),
(543, 28, 408, 3, 0, 8),
(544, 28, 324, 3, 0, 8),
(545, 28, 430, 3, 0, 8),
(546, 28, 426, 3, 0, 8),
(547, 28, 408, 3, 0, 8),
(548, 28, 364, 3, 0, 8),
(549, 28, 363, 2, 0, 8),
(550, 28, 409, 2, 0, 8),
(551, 28, 425, 2, 0, 8),
(552, 28, 416, 2, 0, 8),
(553, 28, 423, 2, 0, 8),
(554, 28, 124, 2, 0, 8),
(555, 28, 424, 2, 0, 8),
(556, 28, 114, 2, 0, 8),
(557, 28, 403, 2, 0, 8),
(558, 28, 334, 2, 0, 8),
(559, 28, 401, 2, 0, 8),
(560, 28, 428, 2, 0, 8),
(561, 28, 409, 2, 0, 8),
(562, 28, 207, 2, 0, 8),
(563, 28, 429, 2, 0, 8),
(564, 28, 417, 2, 0, 8),
(571, 28, 409, 1, 0, 8),
(572, 28, 429, 1, 0, 8),
(573, 28, 179, 1, 0, 8),
(574, 29, 629, 2, 0, 9),
(575, 29, 629, 2, 0, 9),
(576, 29, 629, 2, 0, 9),
(577, 29, 834, 2, 0, 9),
(578, 29, 852, 2, 0, 9),
(579, 29, 827, 2, 0, 9),
(580, 29, 834, 2, 0, 9),
(581, 29, 851, 2, 0, 9),
(582, 29, 847, 2, 0, 9),
(583, 29, 597, 2, 0, 9),
(584, 29, 831, 2, 0, 9),
(585, 29, 850, 2, 0, 9),
(586, 29, 718, 2, 0, 9),
(587, 29, 851, 2, 0, 9),
(588, 29, 825, 2, 0, 9),
(589, 29, 829, 2, 0, 9),
(590, 29, 746, 2, 0, 9),
(591, 29, 850, 2, 0, 9),
(592, 29, 826, 2, 0, 9),
(593, 29, 851, 2, 0, 9),
(594, 29, 771, 2, 0, 9),
(595, 29, 832, 2, 0, 9),
(596, 29, 826, 2, 0, 9),
(597, 29, 746, 2, 0, 9),
(598, 29, 851, 2, 0, 9),
(599, 29, 777, 2, 0, 9),
(600, 29, 625, 2, 0, 9),
(601, 29, 851, 2, 0, 9),
(602, 30, 427, 4, 0, 8),
(603, 30, 428, 4, 0, 8),
(604, 30, 365, 4, 0, 8),
(605, 30, 409, 4, 0, 8),
(606, 30, 386, 4, 0, 8),
(607, 30, 382, 4, 0, 8),
(608, 30, 428, 4, 0, 8),
(609, 30, 324, 4, 0, 8),
(610, 30, 403, 4, 0, 8),
(611, 30, 382, 4, 0, 8),
(612, 30, 372, 4, 0, 8),
(613, 30, 374, 4, 0, 8),
(614, 30, 408, 4, 0, 8),
(615, 30, 427, 4, 0, 8),
(616, 30, 425, 4, 0, 8),
(620, 30, 413, 3, 0, 8),
(628, 30, 393, 1, 0, 8),
(629, 30, 296, 1, 0, 8),
(630, 30, 401, 1, 0, 8),
(631, 30, 392, 1, 0, 8),
(632, 30, 324, 1, 0, 8),
(633, 30, 296, 1, 0, 8),
(634, 30, 393, 1, 0, 8),
(635, 30, 98, 1, 0, 8),
(636, 30, 407, 6, 0, 8),
(637, 30, 409, 6, 0, 8),
(638, 30, 377, 6, 0, 8),
(639, 30, 375, 6, 0, 8),
(640, 30, 405, 6, 0, 8),
(641, 30, 386, 6, 0, 8),
(656, 30, 389, 1, 0, 8),
(657, 30, 410, 4, 0, 8),
(665, 30, 392, 3, 0, 8),
(668, 30, 404, 3, 0, 8),
(669, 30, 324, 3, 0, 8),
(675, 30, 81, 2, 0, 8),
(677, 30, 414, 2, 0, 8),
(678, 31, 832, 2, 0, 9),
(679, 31, 840, 2, 0, 9),
(680, 31, 834, 2, 0, 9),
(681, 31, 832, 2, 0, 9),
(682, 31, 826, 2, 0, 9),
(683, 31, 810, 2, 0, 9),
(684, 31, 802, 2, 0, 9),
(685, 31, 795, 2, 0, 9),
(686, 31, 825, 2, 0, 9),
(687, 31, 803, 2, 0, 9),
(688, 31, 795, 2, 0, 9),
(689, 31, 809, 2, 0, 9),
(690, 31, 796, 2, 0, 9),
(691, 31, 852, 4, 0, 9),
(692, 31, 788, 4, 0, 9),
(693, 31, 769, 4, 0, 9),
(694, 31, 765, 4, 0, 9),
(695, 31, 758, 4, 0, 9),
(696, 31, 760, 4, 0, 9),
(697, 31, 833, 4, 0, 9),
(698, 31, 849, 4, 0, 9),
(699, 31, 850, 4, 0, 9),
(700, 31, 848, 4, 0, 9),
(701, 31, 833, 4, 0, 9),
(702, 31, 797, 4, 0, 9),
(703, 31, 833, 4, 0, 9),
(704, 31, 777, 8, 0, 9),
(705, 32, 423, 2, 0, 8),
(706, 32, 428, 2, 0, 8),
(707, 32, 430, 2, 0, 8),
(708, 32, 427, 2, 0, 8),
(709, 32, 424, 2, 0, 8),
(710, 32, 421, 2, 0, 8),
(711, 32, 417, 2, 0, 8),
(714, 32, 415, 1, 0, 8),
(716, 32, 407, 4, 0, 8),
(717, 32, 404, 4, 0, 8),
(722, 32, 385, 4, 0, 8),
(723, 32, 377, 4, 0, 8),
(724, 32, 379, 4, 0, 8),
(725, 32, 352, 4, 0, 8),
(726, 32, 389, 4, 0, 8),
(727, 32, 376, 4, 0, 8),
(728, 32, 300, 4, 0, 8),
(729, 32, 296, 4, 0, 8),
(736, 32, 403, 4, 0, 8),
(741, 32, 171, 4, 0, 8),
(744, 32, 405, 4, 0, 8),
(745, 32, 379, 4, 0, 8),
(746, 32, 376, 4, 0, 8),
(748, 32, 427, 4, 0, 8),
(753, 32, 377, 4, 0, 8),
(754, 32, 162, 4, 0, 8),
(755, 32, 429, 4, 0, 8),
(756, 32, 425, 4, 0, 8),
(757, 32, 429, 4, 0, 8),
(758, 33, 849, 4, 0, 9),
(759, 33, 852, 4, 0, 9),
(760, 33, 839, 4, 0, 9),
(761, 33, 852, 4, 0, 9),
(762, 33, 836, 4, 0, 9),
(763, 34, 7, 4, 0, 8),
(764, 34, 430, 4, 0, 8),
(765, 34, 427, 4, 0, 8),
(766, 34, 351, 4, 0, 8),
(767, 34, 170, 4, 0, 8),
(768, 34, 408, 4, 0, 8),
(769, 34, 355, 4, 0, 8),
(770, 34, 403, 4, 0, 8),
(771, 34, 51, 4, 0, 8),
(772, 34, 410, 4, 0, 8),
(773, 34, 43, 4, 0, 8),
(774, 34, 161, 4, 0, 8),
(776, 34, 430, 4, 0, 8),
(778, 34, 397, 4, 0, 8),
(779, 34, 429, 4, 0, 8),
(780, 34, 395, 4, 0, 8),
(781, 34, 300, 4, 0, 8),
(782, 34, 403, 4, 0, 8),
(783, 34, 300, 4, 0, 8),
(784, 35, 829, 4, 0, 9),
(785, 35, 829, 4, 0, 9),
(786, 35, 823, 4, 0, 9),
(787, 35, 850, 4, 0, 9),
(788, 35, 849, 4, 0, 9),
(789, 35, 840, 4, 0, 9),
(790, 35, 815, 4, 0, 9),
(791, 35, 831, 4, 0, 9),
(792, 35, 825, 4, 0, 9),
(793, 35, 718, 4, 0, 9),
(794, 35, 834, 4, 0, 9),
(795, 35, 470, 4, 0, 9),
(796, 35, 771, 4, 0, 9),
(797, 35, 849, 4, 0, 9),
(798, 35, 824, 4, 0, 9),
(799, 35, 823, 4, 0, 9),
(800, 36, 844, 3, 0, 9),
(801, 36, 840, 3, 0, 9),
(802, 36, 850, 3, 0, 9),
(803, 36, 781, 3, 0, 9),
(804, 36, 822, 3, 0, 9),
(805, 36, 829, 3, 0, 9),
(806, 36, 822, 3, 0, 9),
(807, 37, 355, 4, 0, 8),
(808, 37, 391, 4, 0, 8),
(810, 37, 374, 4, 0, 8),
(811, 37, 277, 4, 0, 8),
(812, 37, 406, 4, 0, 8),
(813, 37, 398, 4, 0, 8),
(814, 37, 296, 4, 0, 8),
(815, 37, 406, 4, 0, 8),
(816, 37, 236, 4, 0, 8),
(817, 38, 8, 4, 0, 8),
(818, 38, 387, 4, 0, 8),
(819, 38, 324, 4, 0, 8),
(820, 38, 355, 4, 0, 8),
(821, 38, 114, 4, 0, 8),
(822, 39, 831, 4, 0, 9),
(823, 39, 746, 4, 0, 9),
(824, 39, 846, 4, 0, 9),
(825, 39, 781, 4, 0, 9),
(826, 40, 436, 4, 0, 9),
(827, 40, 849, 4, 0, 9),
(828, 40, 840, 4, 0, 9),
(829, 40, 838, 4, 0, 9),
(832, 40, 852, 4, 0, 9),
(833, 40, 835, 4, 0, 9),
(834, 40, 478, 4, 0, 9),
(835, 41, 389, 4, 0, 8),
(836, 41, 396, 4, 0, 8),
(837, 41, 385, 4, 0, 8),
(838, 41, 324, 4, 0, 8),
(839, 41, 387, 10, 0, 8),
(840, 41, 429, 10, 0, 8),
(841, 41, 424, 10, 0, 8),
(842, 41, 384, 10, 0, 8),
(843, 41, 384, 10, 0, 8),
(844, 41, 383, 10, 0, 8),
(845, 41, 386, 10, 0, 8),
(846, 41, 388, 10, 0, 8),
(847, 41, 426, 10, 0, 8),
(848, 41, 376, 10, 0, 8),
(849, 41, 59, 10, 0, 8),
(850, 42, 388, 10, 0, 8),
(851, 42, 349, 10, 0, 8),
(852, 42, 355, 10, 0, 8),
(853, 42, 355, 10, 0, 8),
(854, 42, 389, 10, 0, 8),
(855, 42, 324, 10, 0, 8),
(856, 42, 429, 10, 0, 8),
(857, 42, 184, 10, 0, 8),
(860, 42, 365, 10, 0, 8),
(861, 42, 422, 10, 0, 8),
(862, 42, 343, 10, 0, 8),
(863, 42, 336, 10, 0, 8),
(864, 42, 322, 10, 0, 8),
(865, 42, 422, 10, 0, 8),
(866, 42, 424, 10, 0, 8),
(867, 42, 422, 10, 0, 8),
(873, 42, 334, 10, 0, 8),
(874, 42, 429, 10, 0, 8),
(875, 42, 333, 10, 0, 8),
(876, 42, 340, 10, 0, 8),
(877, 42, 419, 10, 0, 8),
(878, 42, 184, 10, 0, 8),
(879, 43, 771, 10, 0, 9),
(880, 43, 781, 10, 0, 9),
(881, 43, 814, 10, 0, 9),
(883, 43, 841, 10, 0, 9),
(885, 44, 433, 10, 0, 9),
(886, 44, 842, 10, 0, 9),
(887, 44, 787, 10, 0, 9),
(888, 44, 844, 10, 0, 9),
(891, 44, 690, 10, 0, 9),
(892, 44, 840, 10, 0, 9),
(893, 45, 429, 10, 0, 8),
(894, 45, 364, 10, 0, 8),
(895, 45, 380, 10, 0, 8),
(896, 45, 422, 10, 0, 8),
(897, 45, 380, 10, 0, 8),
(898, 45, 229, 10, 0, 8),
(899, 45, 377, 10, 0, 8),
(900, 45, 385, 10, 0, 8),
(901, 45, 381, 10, 0, 8),
(902, 45, 324, 10, 0, 8),
(903, 45, 183, 10, 0, 8),
(904, 45, 382, 10, 0, 8),
(905, 46, 422, 10, 0, 8),
(906, 46, 424, 10, 0, 8),
(907, 46, 422, 10, 0, 8),
(908, 46, 342, 10, 0, 8),
(909, 46, 148, 10, 0, 8),
(910, 46, 146, 10, 0, 8),
(913, 46, 141, 10, 0, 8),
(914, 46, 140, 10, 0, 8),
(915, 46, 137, 10, 0, 8),
(916, 46, 136, 10, 0, 8),
(917, 46, 418, 10, 0, 8),
(918, 46, 379, 10, 0, 8),
(919, 46, 374, 10, 0, 8),
(920, 46, 366, 10, 0, 8),
(921, 46, 364, 10, 0, 8),
(922, 46, 364, 10, 0, 8),
(923, 46, 358, 10, 0, 8),
(924, 46, 356, 10, 0, 8),
(925, 46, 357, 10, 0, 8),
(926, 46, 353, 10, 0, 8),
(927, 46, 331, 10, 0, 8),
(928, 46, 14, 10, 0, 8),
(929, 46, 17, 10, 0, 8),
(930, 46, 183, 10, 0, 8),
(931, 46, 249, 10, 0, 8),
(932, 47, 845, 10, 0, 9),
(935, 47, 846, 10, 0, 9),
(936, 47, 843, 10, 0, 9),
(941, 47, 836, 2, 0, 9),
(942, 48, 436, 10, 0, 9),
(945, 48, 842, 2, 0, 9),
(946, 49, 363, 10, 0, 8),
(947, 49, 429, 10, 0, 8),
(948, 49, 423, 10, 0, 8),
(949, 50, 423, 10, 0, 8),
(950, 51, 422, 10, 0, 8),
(951, 51, 378, 10, 0, 8),
(952, 51, 371, 10, 0, 8),
(953, 51, 359, 10, 0, 8),
(954, 51, 357, 10, 0, 8),
(955, 51, 337, 10, 0, 8),
(956, 51, 337, 10, 0, 8),
(957, 51, 301, 10, 0, 8),
(959, 52, 842, 5, 0, 9),
(961, 53, 843, 10, 0, 9),
(964, 53, 813, 10, 0, 9),
(965, 53, 649, 10, 0, 9),
(966, 53, 808, 10, 0, 9),
(967, 53, 802, 10, 0, 9),
(968, 53, 830, 10, 0, 9),
(969, 53, 622, 10, 0, 9),
(970, 54, 423, 10, 0, 8),
(971, 54, 429, 10, 0, 8),
(972, 54, 422, 10, 0, 8),
(973, 54, 419, 10, 0, 8),
(974, 54, 373, 10, 0, 8),
(975, 54, 371, 10, 0, 8),
(976, 55, 357, 10, 0, 8),
(977, 55, 366, 10, 0, 8),
(978, 55, 362, 10, 0, 8),
(979, 55, 344, 10, 0, 8),
(980, 55, 342, 10, 0, 8),
(981, 55, 422, 10, 0, 8),
(982, 55, 339, 20, 0, 8),
(983, 55, 335, 20, 0, 8),
(984, 55, 331, 20, 0, 8),
(986, 55, 345, 20, 0, 8),
(987, 55, 341, 20, 0, 8),
(988, 55, 355, 10, 0, 8),
(989, 55, 421, 10, 0, 8),
(990, 55, 353, 10, 0, 8),
(991, 55, 418, 10, 0, 8),
(992, 55, 355, 10, 0, 8),
(993, 55, 355, 10, 0, 8),
(994, 55, 378, 10, 0, 8),
(996, 55, 423, 5, 0, 8),
(997, 56, 828, 10, 0, 9),
(998, 56, 788, 10, 0, 9),
(999, 56, 816, 10, 0, 9),
(1000, 56, 651, 10, 0, 9),
(1001, 57, 818, 10, 0, 9),
(1002, 57, 828, 10, 0, 9),
(1003, 57, 841, 10, 0, 9),
(1004, 58, 423, 10, 0, 8),
(1005, 58, 165, 10, 0, 8),
(1006, 58, 424, 10, 0, 8),
(1007, 58, 421, 10, 0, 8),
(1008, 58, 163, 10, 0, 8),
(1009, 58, 422, 10, 0, 8),
(1010, 58, 424, 10, 0, 8),
(1011, 58, 364, 10, 0, 8),
(1012, 58, 422, 10, 0, 8),
(1013, 58, 161, 10, 0, 8),
(1014, 58, 324, 10, 0, 8),
(1017, 58, 424, 10, 0, 8),
(1018, 58, 355, 10, 0, 8),
(1019, 58, 361, 10, 0, 8),
(1020, 58, 368, 10, 0, 8),
(1021, 58, 419, 10, 0, 8),
(1022, 59, 366, 20, 0, 8),
(1023, 59, 195, 10, 0, 8),
(1024, 59, 367, 10, 0, 8),
(1025, 59, 358, 10, 0, 8),
(1026, 59, 337, 10, 0, 8),
(1027, 59, 337, 10, 0, 8),
(1028, 59, 304, 10, 0, 8),
(1029, 59, 271, 10, 0, 8),
(1030, 59, 247, 10, 0, 8),
(1031, 59, 321, 10, 0, 8),
(1032, 59, 278, 10, 0, 8),
(1033, 59, 335, 10, 0, 8),
(1036, 59, 370, 10, 0, 8),
(1037, 59, 42, 10, 0, 8),
(1038, 59, 326, 10, 0, 8),
(1039, 59, 424, 10, 0, 8),
(1041, 59, 375, 10, 0, 8),
(1042, 60, 836, 10, 0, 9),
(1044, 60, 690, 10, 0, 9),
(1047, 60, 830, 10, 0, 9),
(1048, 60, 798, 10, 0, 9),
(1049, 60, 771, 10, 0, 9),
(1050, 60, 657, 10, 0, 9),
(1051, 61, 800, 10, 0, 9),
(1052, 61, 819, 10, 0, 9),
(1054, 61, 805, 10, 0, 9),
(1055, 62, 421, 10, 0, 8),
(1056, 62, 366, 10, 0, 8),
(1057, 62, 424, 10, 0, 8),
(1058, 62, 230, 10, 0, 8),
(1060, 62, 358, 5, 0, 8),
(1061, 63, 360, 10, 0, 8),
(1062, 63, 421, 10, 0, 8),
(1063, 63, 423, 10, 0, 8),
(1064, 63, 366, 10, 0, 8),
(1065, 63, 125, 10, 0, 8),
(1066, 63, 370, 10, 0, 8),
(1068, 64, 807, 10, 0, 9),
(1071, 64, 836, 2, 0, 9),
(1074, 64, 783, 5, 0, 9),
(1075, 64, 785, 10, 0, 9),
(1076, 65, 835, 10, 0, 9),
(1077, 65, 839, 10, 0, 9),
(1078, 65, 749, 10, 0, 9),
(1079, 66, 234, 10, 0, 8),
(1080, 66, 369, 10, 0, 8),
(1081, 66, 358, 10, 0, 8),
(1082, 66, 421, 10, 0, 8),
(1083, 66, 357, 10, 0, 8),
(1084, 66, 362, 10, 0, 8),
(1085, 66, 420, 10, 0, 8),
(1086, 67, 640, 2, 0, 8),
(1088, 68, 303, 12, 1000, 8),
(1089, 68, 857, 5, 1000, 8),
(1090, 69, 434, 2, 0, 9),
(1091, 70, 435, 4, 0, 9),
(1092, 71, 866, 2, 0, 9),
(1093, 72, 892, 10, 0, 8),
(1094, 72, 10, 10, 0, 8),
(1095, 72, 24, 10, 0, 8),
(1096, 72, 853, 10, 0, 8),
(1097, 72, 854, 10, 0, 8),
(1098, 72, 875, 10, 0, 8),
(1099, 72, 13, 10, 0, 8),
(1100, 72, 40, 10, 0, 8),
(1101, 72, 162, 10, 0, 8),
(1102, 72, 879, 10, 0, 8),
(1104, 73, 11, 10, 0, 8),
(1105, 73, 894, 10, 0, 8),
(1106, 73, 893, 10, 0, 8),
(1107, 73, 879, 10, 0, 8),
(1108, 73, 870, 10, 0, 8),
(1109, 73, 870, 10, 0, 8),
(1110, 74, 29, 10, 0, 8),
(1111, 74, 895, 10, 0, 8),
(1112, 74, 892, 10, 0, 8),
(1113, 74, 883, 10, 0, 8),
(1114, 74, 880, 10, 0, 8),
(1115, 75, 10, 10, 0, 8),
(1116, 75, 889, 10, 0, 8),
(1117, 75, 37, 10, 0, 8),
(1118, 75, 38, 10, 0, 8),
(1119, 75, 892, 10, 0, 8),
(1120, 75, 893, 10, 0, 8),
(1121, 75, 880, 10, 0, 8),
(1122, 76, 894, 115, 0, 8),
(1125, 76, 883, 10, 0, 8),
(1126, 76, 885, 10, 0, 8),
(1127, 76, 892, 10, 0, 8),
(1128, 76, 365, 10, 0, 8),
(1129, 76, 365, 10, 0, 8),
(1130, 76, 857, 10, 0, 8),
(1131, 76, 326, 10, 0, 8),
(1132, 76, 894, 10, 0, 8),
(1133, 77, 894, 10, 0, 8),
(1134, 77, 882, 10, 0, 8),
(1135, 77, 894, 10, 0, 8),
(1136, 77, 893, 10, 0, 8),
(1137, 77, 855, 10, 0, 8),
(1138, 78, 13, 10, 0, 8),
(1139, 78, 892, 10, 0, 8),
(1140, 78, 879, 10, 0, 8),
(1141, 78, 37, 10, 0, 8),
(1142, 78, 895, 10, 0, 8),
(1143, 78, 857, 10, 0, 8),
(1144, 79, 895, 10, 0, 8),
(1145, 79, 894, 10, 0, 8),
(1146, 79, 368, 10, 0, 8),
(1147, 79, 881, 10, 0, 8),
(1148, 79, 365, 10, 0, 8),
(1149, 79, 430, 10, 0, 8),
(1150, 79, 893, 10, 0, 8),
(1151, 80, 894, 10, 0, 8),
(1152, 80, 857, 10, 0, 8),
(1153, 80, 893, 10, 0, 8),
(1154, 80, 324, 10, 0, 8),
(1155, 80, 877, 10, 0, 8),
(1156, 80, 324, 10, 0, 8),
(1157, 80, 887, 10, 0, 8),
(1158, 80, 878, 10, 0, 8),
(1159, 81, 893, 10, 0, 8),
(1160, 81, 860, 10, 0, 8),
(1161, 81, 894, 10, 0, 8),
(1162, 81, 864, 10, 0, 8),
(1163, 81, 369, 10, 0, 8),
(1164, 81, 338, 10, 0, 8),
(1165, 81, 421, 10, 0, 8),
(1166, 81, 892, 10, 0, 8),
(1167, 81, 324, 10, 0, 8),
(1168, 81, 881, 10, 0, 8),
(1169, 82, 891, 10, 0, 8),
(1170, 82, 894, 10, 0, 8),
(1171, 82, 875, 10, 0, 8),
(1172, 82, 856, 10, 0, 8),
(1173, 82, 370, 10, 0, 8),
(1174, 82, 367, 10, 0, 8),
(1175, 82, 365, 10, 0, 8),
(1176, 82, 894, 10, 0, 8),
(1177, 83, 888, 10, 0, 8),
(1178, 83, 893, 10, 0, 8),
(1179, 83, 891, 10, 0, 8),
(1180, 83, 865, 10, 0, 8),
(1181, 83, 162, 10, 0, 8),
(1182, 83, 861, 10, 0, 8),
(1183, 83, 423, 10, 0, 8),
(1184, 84, 890, 10, 0, 8),
(1185, 84, 367, 10, 0, 8),
(1186, 84, 875, 10, 0, 8),
(1187, 84, 886, 10, 0, 8),
(1188, 84, 865, 10, 0, 8),
(1189, 84, 254, 10, 0, 8),
(1190, 84, 893, 10, 0, 8),
(1191, 84, 368, 10, 0, 8),
(1192, 84, 345, 10, 0, 8),
(1193, 84, 421, 10, 0, 8),
(1194, 84, 342, 10, 0, 8),
(1195, 84, 147, 10, 0, 8),
(1196, 84, 140, 10, 0, 8),
(1197, 84, 136, 10, 0, 8),
(1203, 84, 268, 10, 0, 8),
(1204, 85, 892, 10, 0, 8),
(1205, 85, 876, 10, 0, 8),
(1206, 85, 864, 10, 0, 8),
(1207, 85, 162, 10, 0, 8),
(1208, 85, 893, 10, 0, 8),
(1209, 85, 881, 10, 0, 8),
(1210, 86, 894, 10, 0, 8),
(1211, 86, 37, 10, 0, 8),
(1212, 86, 38, 10, 0, 8),
(1213, 86, 870, 10, 0, 8),
(1214, 86, 870, 10, 0, 8),
(1215, 86, 316, 10, 0, 8),
(1216, 86, 344, 10, 0, 8),
(1217, 86, 270, 10, 0, 8),
(1218, 86, 160, 10, 0, 8),
(1219, 86, 251, 10, 0, 8),
(1220, 86, 858, 10, 0, 8),
(1221, 86, 870, 10, 0, 8),
(1222, 87, 894, 10, 0, 8),
(1223, 87, 895, 10, 0, 8),
(1224, 87, 890, 10, 0, 8),
(1225, 87, 880, 10, 0, 8),
(1226, 87, 230, 10, 0, 8),
(1227, 88, 895, 10, 0, 8),
(1228, 88, 893, 10, 0, 8),
(1229, 88, 893, 10, 0, 8),
(1230, 88, 892, 10, 0, 8),
(1231, 88, 430, 10, 0, 8),
(1232, 88, 424, 10, 0, 8),
(1233, 88, 420, 10, 0, 8),
(1234, 89, 13, 10, 0, 8),
(1235, 89, 885, 10, 0, 8),
(1236, 89, 886, 10, 0, 8),
(1237, 89, 886, 10, 0, 8),
(1238, 89, 860, 10, 0, 8),
(1239, 89, 879, 10, 0, 8),
(1240, 90, 894, 10, 0, 8),
(1241, 90, 886, 100, 0, 8),
(1243, 90, 140, 10, 0, 8),
(1244, 91, 29, 10, 0, 8),
(1245, 91, 888, 10, 0, 8),
(1246, 91, 885, 10, 0, 8),
(1247, 91, 162, 10, 0, 8),
(1248, 91, 860, 10, 0, 8),
(1249, 91, 885, 10, 0, 8),
(1250, 91, 885, 100, 0, 8),
(1251, 91, 370, 100, 0, 8),
(1252, 92, 886, 100, 0, 8),
(1253, 92, 13, 10, 0, 8),
(1254, 92, 893, 10, 0, 8),
(1255, 93, 838, 10, 0, 9),
(1256, 93, 804, 10, 0, 9),
(1257, 93, 746, 10, 0, 9),
(1258, 93, 610, 10, 0, 9),
(1259, 94, 438, 10, 0, 9),
(1260, 94, 787, 10, 0, 9),
(1261, 94, 691, 10, 0, 9),
(1262, 94, 788, 10, 0, 9),
(1263, 94, 812, 10, 0, 9),
(1264, 94, 787, 10, 0, 9),
(1265, 94, 784, 10, 0, 9),
(1266, 94, 611, 10, 0, 9),
(1267, 94, 621, 10, 0, 9),
(1268, 94, 616, 10, 0, 9),
(1269, 95, 794, 10, 0, 9),
(1270, 95, 757, 10, 0, 9),
(1271, 95, 746, 10, 0, 9),
(1272, 95, 775, 10, 0, 9),
(1273, 95, 792, 10, 0, 9),
(1274, 95, 799, 10, 0, 9),
(1275, 95, 704, 10, 0, 9),
(1276, 95, 788, 10, 0, 9),
(1277, 95, 777, 10, 0, 9),
(1278, 95, 772, 10, 0, 9),
(1279, 95, 777, 10, 0, 9),
(1280, 95, 777, 10, 0, 9),
(1281, 95, 777, 10, 0, 9),
(1282, 95, 792, 10, 0, 9),
(1283, 95, 792, 10, 0, 9),
(1284, 95, 792, 10, 0, 9),
(1285, 95, 658, 10, 0, 9),
(1286, 95, 658, 10, 0, 9),
(1290, 96, 792, 10, 0, 9),
(1291, 96, 832, 10, 0, 9),
(1292, 96, 794, 10, 0, 9),
(1293, 96, 790, 10, 0, 9),
(1294, 96, 787, 10, 0, 9),
(1295, 96, 784, 10, 0, 9),
(1296, 96, 783, 10, 0, 9),
(1297, 96, 783, 10, 0, 9),
(1298, 96, 783, 10, 0, 9),
(1299, 96, 780, 10, 0, 9),
(1300, 97, 788, 10, 0, 9),
(1304, 97, 748, 10, 0, 9),
(1305, 97, 693, 10, 0, 9),
(1306, 97, 789, 10, 0, 9),
(1307, 97, 690, 10, 0, 9),
(1308, 97, 639, 10, 0, 9),
(1309, 97, 543, 10, 0, 9),
(1310, 97, 669, 10, 0, 9),
(1311, 97, 719, 10, 0, 9),
(1312, 97, 667, 10, 0, 9),
(1314, 97, 671, 10, 0, 9),
(1316, 97, 718, 10, 0, 9),
(1317, 97, 445, 10, 0, 9),
(1319, 97, 771, 10, 0, 9),
(1320, 97, 774, 10, 0, 9),
(1321, 97, 776, 10, 0, 9),
(1322, 97, 781, 10, 0, 9),
(1323, 98, 794, 10, 0, 9),
(1324, 98, 790, 10, 0, 9),
(1325, 98, 790, 10, 0, 9),
(1326, 98, 790, 10, 0, 9),
(1327, 98, 768, 10, 0, 9),
(1328, 98, 768, 10, 0, 9),
(1329, 98, 768, 10, 0, 9),
(1330, 98, 764, 10, 0, 9),
(1331, 98, 764, 10, 0, 9),
(1332, 98, 764, 10, 0, 9),
(1333, 98, 574, 10, 0, 9),
(1336, 98, 560, 10, 0, 9),
(1337, 98, 560, 10, 0, 9),
(1338, 98, 560, 10, 0, 9),
(1339, 98, 447, 10, 0, 9),
(1340, 98, 447, 10, 0, 9),
(1342, 98, 589, 10, 0, 9),
(1343, 98, 589, 10, 0, 9),
(1346, 98, 587, 2, 0, 9),
(1347, 98, 587, 2, 0, 9),
(1348, 98, 587, 2, 0, 9),
(1352, 99, 793, 10, 0, 9),
(1353, 99, 778, 10, 0, 9),
(1354, 99, 778, 10, 0, 9),
(1355, 99, 778, 10, 0, 9),
(1356, 99, 781, 10, 0, 9),
(1357, 99, 781, 10, 0, 9),
(1359, 99, 794, 10, 0, 9),
(1360, 99, 794, 10, 0, 9),
(1361, 100, 838, 10, 0, 9),
(1363, 100, 610, 10, 0, 9),
(1364, 100, 610, 10, 0, 9),
(1365, 100, 610, 10, 0, 9),
(1370, 100, 550, 10, 0, 9),
(1372, 101, 867, 10, 0, 9),
(1374, 101, 795, 10, 0, 9),
(1375, 101, 795, 10, 0, 9),
(1376, 101, 795, 10, 0, 9),
(1377, 101, 793, 10, 0, 9),
(1378, 101, 793, 10, 0, 9),
(1379, 101, 793, 10, 0, 9),
(1380, 102, 13, 10, 0, 8),
(1381, 102, 13, 10, 0, 8),
(1382, 102, 13, 10, 0, 8),
(1383, 102, 13, 10, 0, 8),
(1384, 102, 13, 10, 0, 8),
(1385, 102, 13, 10, 0, 8),
(1386, 102, 13, 10, 0, 8),
(1387, 102, 886, 10, 0, 8),
(1388, 102, 886, 10, 0, 8),
(1389, 102, 886, 10, 0, 8),
(1390, 102, 886, 10, 0, 8),
(1391, 102, 886, 10, 0, 8),
(1392, 102, 364, 10, 0, 8),
(1393, 102, 364, 10, 0, 8),
(1394, 102, 364, 10, 0, 8),
(1395, 102, 364, 10, 0, 8),
(1396, 102, 364, 10, 0, 8),
(1397, 102, 362, 10, 0, 8),
(1398, 102, 362, 10, 0, 8),
(1399, 102, 362, 10, 0, 8),
(1400, 102, 882, 10, 0, 8),
(1402, 103, 895, 10, 0, 8),
(1403, 103, 895, 10, 0, 8),
(1404, 103, 895, 10, 0, 8),
(1405, 103, 163, 10, 0, 8),
(1406, 103, 163, 10, 0, 8),
(1407, 103, 163, 10, 0, 8),
(1408, 104, 892, 10, 0, 8),
(1409, 104, 892, 10, 0, 8),
(1410, 104, 892, 10, 0, 8),
(1411, 104, 892, 10, 0, 8),
(1412, 104, 892, 10, 0, 8),
(1413, 104, 893, 10, 0, 8),
(1414, 104, 893, 10, 0, 8),
(1415, 104, 893, 10, 0, 8),
(1416, 104, 879, 10, 0, 8),
(1418, 106, 893, 10, 0, 8),
(1419, 106, 893, 10, 0, 8),
(1420, 106, 893, 10, 0, 8),
(1421, 106, 888, 10, 0, 8),
(1422, 106, 888, 10, 0, 8),
(1423, 107, 434, 10, 0, 9),
(1424, 107, 434, 10, 0, 9),
(1425, 107, 790, 10, 0, 9),
(1427, 107, 748, 10, 0, 9),
(1428, 107, 748, 10, 0, 9),
(1429, 107, 748, 10, 0, 9),
(1431, 107, 795, 10, 0, 9),
(1433, 107, 783, 10, 0, 9),
(1436, 107, 866, 10, 0, 9),
(1438, 107, 776, 10, 0, 9),
(1439, 107, 776, 10, 0, 9),
(1440, 107, 776, 10, 0, 9),
(1441, 107, 776, 10, 0, 9),
(1443, 107, 774, 10, 0, 9),
(1444, 107, 774, 10, 0, 9),
(1445, 107, 774, 10, 0, 9),
(1446, 107, 774, 10, 0, 9),
(1447, 108, 793, 10, 0, 9),
(1450, 108, 791, 10, 0, 9),
(1451, 108, 791, 10, 0, 9),
(1452, 108, 791, 10, 0, 9),
(1453, 108, 791, 10, 0, 9),
(1454, 108, 791, 10, 0, 9),
(1456, 108, 719, 10, 0, 9),
(1458, 108, 690, 10, 0, 9),
(1461, 108, 605, 10, 0, 9),
(1463, 109, 780, 10, 0, 9),
(1464, 109, 780, 10, 0, 9),
(1465, 109, 780, 10, 0, 9),
(1466, 109, 780, 10, 0, 9),
(1468, 109, 444, 10, 0, 9),
(1470, 110, 784, 10, 0, 9),
(1471, 110, 784, 10, 0, 9),
(1474, 110, 771, 10, 0, 9),
(1477, 110, 775, 10, 0, 9),
(1478, 110, 775, 10, 0, 9),
(1479, 110, 775, 10, 0, 9),
(1480, 110, 775, 10, 0, 9),
(1482, 110, 764, 10, 0, 9),
(1483, 110, 764, 10, 0, 9),
(1485, 110, 736, 10, 0, 9),
(1486, 110, 736, 10, 0, 9),
(1487, 110, 736, 10, 0, 9),
(1488, 110, 736, 10, 0, 9),
(1489, 110, 736, 10, 0, 9),
(1491, 110, 675, 10, 0, 9),
(1493, 110, 772, 10, 0, 9),
(1494, 110, 772, 10, 0, 9),
(1495, 110, 772, 10, 0, 9),
(1496, 110, 752, 10, 0, 9),
(1497, 110, 752, 10, 0, 9),
(1498, 110, 752, 10, 0, 9),
(1500, 110, 691, 10, 0, 9),
(1501, 110, 691, 10, 0, 9),
(1502, 111, 438, 10, 0, 9),
(1503, 111, 438, 10, 0, 9),
(1505, 111, 787, 10, 0, 9),
(1508, 111, 769, 10, 0, 9),
(1509, 111, 769, 10, 0, 9),
(1510, 111, 769, 10, 0, 9),
(1511, 111, 769, 10, 0, 9),
(1512, 111, 763, 10, 0, 9),
(1513, 111, 763, 10, 0, 9),
(1514, 111, 763, 10, 0, 9),
(1515, 111, 763, 10, 0, 9),
(1516, 111, 763, 10, 0, 9),
(1517, 111, 759, 10, 0, 9),
(1518, 111, 759, 10, 0, 9),
(1519, 111, 759, 10, 0, 9),
(1520, 111, 759, 10, 0, 9),
(1521, 111, 759, 10, 0, 9),
(1522, 111, 754, 10, 0, 9),
(1523, 111, 754, 10, 0, 9),
(1524, 111, 754, 10, 0, 9),
(1525, 111, 754, 10, 0, 9),
(1526, 111, 754, 10, 0, 9),
(1530, 111, 755, 10, 0, 9),
(1531, 111, 755, 10, 0, 9),
(1532, 111, 755, 10, 0, 9),
(1533, 111, 755, 10, 0, 9),
(1534, 111, 755, 10, 0, 9),
(1535, 111, 789, 10, 0, 9),
(1536, 111, 789, 10, 0, 9),
(1537, 111, 789, 10, 0, 9),
(1538, 111, 789, 10, 0, 9),
(1543, 111, 779, 10, 0, 9),
(1544, 111, 779, 10, 0, 9),
(1547, 112, 782, 10, 0, 9),
(1548, 112, 782, 10, 0, 9),
(1549, 112, 782, 10, 0, 9),
(1550, 112, 782, 10, 0, 9),
(1552, 112, 770, 10, 0, 9),
(1553, 112, 770, 10, 0, 9),
(1554, 112, 770, 10, 0, 9),
(1555, 112, 770, 10, 0, 9),
(1556, 112, 770, 10, 0, 9),
(1557, 112, 765, 10, 0, 9),
(1558, 112, 765, 10, 0, 9),
(1559, 112, 765, 10, 0, 9),
(1561, 112, 758, 10, 0, 9),
(1562, 112, 758, 10, 0, 9),
(1563, 112, 758, 10, 0, 9),
(1564, 112, 758, 10, 0, 9),
(1566, 112, 745, 10, 0, 9),
(1567, 112, 745, 10, 0, 9),
(1568, 112, 745, 10, 0, 9),
(1569, 112, 745, 10, 0, 9),
(1571, 112, 717, 10, 0, 9),
(1572, 112, 717, 10, 0, 9),
(1575, 112, 778, 10, 0, 9),
(1576, 112, 778, 10, 0, 9),
(1579, 112, 630, 10, 0, 9),
(1584, 112, 623, 10, 0, 9),
(1585, 112, 623, 10, 0, 9),
(1586, 113, 786, 10, 0, 9),
(1587, 113, 786, 10, 0, 9),
(1588, 113, 786, 10, 0, 9),
(1589, 113, 786, 10, 0, 9),
(1591, 113, 713, 10, 0, 9),
(1592, 113, 713, 10, 0, 9),
(1594, 113, 704, 10, 0, 9),
(1596, 113, 634, 10, 0, 9),
(1598, 113, 627, 10, 0, 9),
(1600, 113, 619, 10, 0, 9),
(1602, 113, 613, 10, 0, 9),
(1604, 113, 592, 10, 0, 9),
(1605, 113, 592, 10, 0, 9),
(1607, 113, 591, 10, 0, 9),
(1608, 113, 591, 10, 0, 9),
(1610, 113, 588, 10, 0, 9),
(1613, 113, 768, 10, 0, 9),
(1614, 113, 768, 10, 0, 9),
(1616, 113, 767, 10, 0, 9),
(1617, 113, 767, 10, 0, 9),
(1618, 113, 767, 10, 0, 9),
(1619, 113, 760, 10, 0, 9),
(1620, 113, 760, 10, 0, 9),
(1621, 113, 760, 10, 0, 9),
(1622, 113, 760, 10, 0, 9),
(1624, 113, 753, 10, 0, 9),
(1625, 113, 753, 10, 0, 9),
(1626, 113, 753, 10, 0, 9),
(1627, 113, 753, 10, 0, 9),
(1628, 113, 753, 10, 0, 9),
(1636, 114, 762, 10, 0, 9),
(1637, 114, 762, 10, 0, 9),
(1638, 114, 785, 10, 0, 9),
(1639, 114, 785, 10, 0, 9),
(1640, 114, 785, 10, 0, 9),
(1641, 114, 785, 10, 0, 9),
(1642, 114, 761, 10, 0, 9),
(1643, 114, 761, 10, 0, 9),
(1644, 114, 761, 10, 0, 9),
(1645, 114, 761, 10, 0, 9),
(1646, 114, 761, 10, 0, 9),
(1647, 114, 743, 10, 0, 9),
(1648, 114, 743, 10, 0, 9),
(1649, 114, 743, 10, 0, 9),
(1650, 114, 743, 10, 0, 9),
(1651, 114, 743, 10, 0, 9),
(1652, 114, 740, 10, 0, 9),
(1653, 114, 740, 10, 0, 9),
(1656, 114, 744, 10, 0, 9),
(1657, 114, 744, 10, 0, 9),
(1658, 114, 744, 10, 0, 9),
(1659, 114, 744, 10, 0, 9),
(1662, 114, 749, 10, 0, 9),
(1663, 114, 749, 10, 0, 9),
(1664, 114, 749, 10, 0, 9),
(1665, 114, 749, 10, 0, 9),
(1667, 114, 756, 10, 0, 9),
(1668, 114, 756, 10, 0, 9),
(1669, 114, 756, 10, 0, 9),
(1670, 114, 756, 10, 0, 9),
(1671, 114, 756, 10, 0, 9),
(1678, 114, 767, 10, 0, 9),
(1679, 114, 767, 10, 0, 9),
(1687, 115, 773, 10, 0, 9),
(1688, 115, 772, 10, 0, 9),
(1691, 115, 733, 10, 0, 9),
(1692, 115, 733, 10, 0, 9),
(1693, 115, 733, 10, 0, 9),
(1694, 115, 485, 10, 0, 9),
(1695, 115, 485, 10, 0, 9),
(1696, 115, 485, 10, 0, 9),
(1703, 115, 701, 10, 0, 9),
(1704, 116, 752, 10, 0, 9),
(1705, 116, 752, 10, 0, 9),
(1708, 116, 779, 10, 0, 9),
(1709, 116, 779, 10, 0, 9),
(1710, 116, 779, 10, 0, 9),
(1713, 116, 738, 10, 0, 9),
(1714, 116, 738, 10, 0, 9),
(1715, 116, 738, 10, 0, 9),
(1717, 117, 762, 10, 0, 9),
(1718, 117, 762, 10, 0, 9),
(1719, 117, 762, 10, 0, 9),
(1720, 117, 766, 10, 0, 9),
(1721, 117, 766, 10, 0, 9),
(1722, 117, 766, 10, 0, 9),
(1723, 117, 766, 10, 0, 9),
(1724, 117, 766, 10, 0, 9),
(1727, 117, 742, 10, 0, 9),
(1728, 117, 742, 10, 0, 9),
(1729, 117, 742, 10, 0, 9),
(1730, 117, 742, 10, 0, 9),
(1731, 117, 742, 10, 0, 9),
(1732, 117, 773, 10, 0, 9),
(1733, 117, 773, 10, 0, 9),
(1734, 117, 773, 10, 0, 9),
(1737, 117, 757, 10, 0, 9),
(1738, 117, 757, 10, 0, 9),
(1739, 117, 757, 10, 0, 9),
(1741, 117, 751, 10, 0, 9),
(1742, 117, 751, 10, 0, 9),
(1743, 117, 751, 10, 0, 9),
(1744, 117, 751, 10, 0, 9),
(1745, 117, 751, 10, 0, 9),
(1753, 117, 741, 10, 0, 9),
(1754, 117, 741, 10, 0, 9),
(1755, 117, 741, 10, 0, 9),
(1756, 117, 741, 10, 0, 9),
(1757, 117, 741, 10, 0, 9),
(1758, 117, 735, 10, 0, 9),
(1759, 117, 708, 10, 0, 9),
(1760, 117, 735, 10, 0, 9),
(1761, 117, 708, 10, 0, 9),
(1764, 117, 735, 10, 0, 9),
(1765, 117, 735, 10, 0, 9),
(1766, 117, 735, 10, 0, 9),
(1769, 118, 750, 10, 0, 9),
(1770, 119, 441, 10, 0, 9),
(1771, 119, 739, 10, 0, 9),
(1772, 119, 739, 10, 0, 9),
(1773, 119, 739, 10, 0, 9),
(1774, 119, 739, 10, 0, 9),
(1775, 119, 739, 10, 0, 9),
(1776, 119, 738, 10, 0, 9),
(1777, 119, 738, 10, 0, 9),
(1779, 119, 446, 10, 0, 9),
(1780, 119, 446, 10, 0, 9),
(1782, 119, 441, 10, 0, 9),
(1783, 119, 441, 10, 0, 9),
(1784, 119, 441, 10, 0, 9),
(1785, 119, 441, 10, 0, 9),
(1786, 119, 441, 10, 0, 9),
(1787, 119, 441, 10, 0, 9),
(1788, 119, 441, 10, 0, 9),
(1789, 119, 441, 10, 0, 9),
(1791, 119, 453, 10, 0, 9),
(1794, 119, 448, 10, 0, 9),
(1795, 119, 448, 10, 0, 9),
(1798, 120, 747, 10, 0, 9),
(1799, 120, 464, 10, 0, 9),
(1801, 120, 467, 10, 0, 9),
(1802, 120, 467, 10, 0, 9),
(1803, 120, 467, 10, 0, 9),
(1804, 120, 697, 10, 0, 9),
(1805, 120, 697, 10, 0, 9),
(1807, 120, 747, 10, 0, 9),
(1808, 120, 747, 10, 0, 9),
(1809, 120, 747, 10, 0, 9),
(1810, 120, 747, 10, 0, 9),
(1812, 120, 465, 10, 0, 9),
(1813, 120, 465, 10, 0, 9),
(1814, 120, 465, 10, 0, 9),
(1815, 120, 465, 10, 0, 9),
(1816, 120, 465, 10, 0, 9),
(1817, 120, 465, 10, 0, 9),
(1818, 121, 837, 10, 0, 9),
(1819, 121, 733, 10, 0, 9),
(1820, 121, NULL, 1000, 0, 9),
(1821, 121, NULL, 1000, 0, 9),
(1822, 121, NULL, 10000000, 0, 9),
(1823, 121, NULL, 100000, 0, 9),
(1824, 121, NULL, 100000, 0, 9),
(1825, 121, NULL, 100000, 0, 9),
(1826, 121, NULL, 100000, 0, 9),
(1827, 122, 443, 10, 0, 9),
(1828, 122, 737, 10, 0, 9),
(1829, 122, 733, 10, 0, 9),
(1830, 122, 558, 10, 0, 9),
(1831, NULL, 715, 2, 0, 9);

--
-- Trigger `detailpenjualan`
--
DELIMITER $$
CREATE TRIGGER `after_tambah_detil_penjualan` AFTER INSERT ON `detailpenjualan` FOR EACH ROW BEGIN
UPDATE detailbarang SET stokAwal=stokAwal-NEW.jumlahJual WHERE id=NEW.idBarang;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_delete_detail_penjualan` BEFORE DELETE ON `detailpenjualan` FOR EACH ROW BEGIN

UPDATE detailbarang SET stokAwal=stokAwal+OLD.jumlahJual WHERE id=OLD.idBarang;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpesanan`
--

CREATE TABLE `detailpesanan` (
  `id` int(255) NOT NULL,
  `idPemesan` int(11) DEFAULT NULL,
  `idBarang` int(255) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` text,
  `idCabang` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailpesanan`
--

INSERT INTO `detailpesanan` (`id`, `idPemesan`, `idBarang`, `jumlah`, `keterangan`, `idCabang`) VALUES
(1, 1, 1, 10, 'Yang paling murah', 1),
(2, 2, 10, 3, 'ukuran A3', 1),
(3, 2, 10, 9, 'ukuran A2', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpindahstok`
--

CREATE TABLE `detailpindahstok` (
  `id` int(255) NOT NULL,
  `idPindahStok` int(50) NOT NULL,
  `idDetailBarang` int(255) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `idAdmin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailpindahstok`
--

INSERT INTO `detailpindahstok` (`id`, `idPindahStok`, `idDetailBarang`, `jumlah`, `idAdmin`) VALUES
(3, 1, 1, 1, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpiutang`
--

CREATE TABLE `detailpiutang` (
  `id` int(155) NOT NULL,
  `idPiutang` int(100) NOT NULL,
  `idAdmin` int(10) NOT NULL,
  `date` date NOT NULL,
  `jumlah` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailpiutang`
--

INSERT INTO `detailpiutang` (`id`, `idPiutang`, `idAdmin`, `date`, `jumlah`) VALUES
(2, 1, 8, '2018-03-23', 3000),
(4, 1, 9, '2018-04-04', 0),
(5, 3, 9, '2018-04-04', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailreturpembelian`
--

CREATE TABLE `detailreturpembelian` (
  `id` int(255) NOT NULL,
  `idReturpembelian` int(100) NOT NULL,
  `idDetailBarang` int(255) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `kondisi` enum('BAIK','RUSAK') NOT NULL,
  `alasan` text NOT NULL,
  `idAdmin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailreturpembelian`
--

INSERT INTO `detailreturpembelian` (`id`, `idReturpembelian`, `idDetailBarang`, `jumlah`, `kondisi`, `alasan`, `idAdmin`) VALUES
(3, 1, 176, 4, 'BAIK', 'tidak laku', 8);

--
-- Trigger `detailreturpembelian`
--
DELIMITER $$
CREATE TRIGGER `after_detailreturpembelian_add` AFTER INSERT ON `detailreturpembelian` FOR EACH ROW BEGIN

UPDATE detailbarang SET stokAwal=stokAwal-NEW.jumlah WHERE id=NEW.idDetailBarang;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_detailreturpembelian_delete` BEFORE DELETE ON `detailreturpembelian` FOR EACH ROW BEGIN

UPDATE detailbarang SET stokAwal=stokAwal+OLD.jumlah WHERE id=OLD.idDetailBarang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailreturpenjualan`
--

CREATE TABLE `detailreturpenjualan` (
  `id` int(255) NOT NULL,
  `idRetur` int(100) NOT NULL,
  `idDetailBarang` int(255) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `kondisi` enum('BAIK','RUSAK') NOT NULL,
  `alasan` text NOT NULL,
  `idAdmin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailreturpenjualan`
--

INSERT INTO `detailreturpenjualan` (`id`, `idRetur`, `idDetailBarang`, `jumlah`, `kondisi`, `alasan`, `idAdmin`) VALUES
(5, 1, 44, 1, 'BAIK', 'kurang cocok', 8),
(6, 3, 531, 1, 'RUSAK', '', 9);

--
-- Trigger `detailreturpenjualan`
--
DELIMITER $$
CREATE TRIGGER `after_detailreturpenjualan_insert` AFTER INSERT ON `detailreturpenjualan` FOR EACH ROW BEGIN 

IF NEW.kondisi='RUSAK' THEN 

INSERT INTO `barangrusak`(`id`, `tanggal`, `idDetailBarang`, `jumlah`, `keterangan`, `penyebab`) VALUES ('',NOW(),NEW.idDetailBarang,NEW.jumlah,'dari retur penjualan','supplier');

ELSEIF NEW.kondisi='BAIK' THEN
UPDATE detailbarang SET stokAwal=stokAwal+NEW.jumlah WHERE id=NEW.idDetailBarang;

END IF; 

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `id` int(255) NOT NULL,
  `idPembelian` int(255) NOT NULL,
  `idSupplier` int(5) NOT NULL,
  `tanggalWajibBayar` date NOT NULL,
  `kekuranganPembayaran` int(12) NOT NULL,
  `status` enum('LUNAS','BELUM LUNAS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`id`, `idPembelian`, `idSupplier`, `tanggalWajibBayar`, `kekuranganPembayaran`, `status`) VALUES
(1, 19, 3, '2018-03-31', 190000, 'BELUM LUNAS'),
(7, 20, 3, '2018-04-27', 100000, 'BELUM LUNAS');

--
-- Trigger `hutang`
--
DELIMITER $$
CREATE TRIGGER `AFTER_HUTANG_UPDATE` AFTER UPDATE ON `hutang` FOR EACH ROW BEGIN 

IF NEW.status='BELUM LUNAS' THEN 

UPDATE pembelian SET status='BELUM LUNAS' WHERE id=NEW.idPembelian;

ELSEIF NEW.status='LUNAS' THEN
UPDATE pembelian SET status='LUNAS' WHERE id=NEW.idPembelian;

END IF; 

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `isisms`
--

CREATE TABLE `isisms` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tentang` varchar(25) NOT NULL,
  `isi` text NOT NULL,
  `idAdmin` int(5) NOT NULL,
  `status` enum('terkirim','tidak terkirim') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `isisms`
--

INSERT INTO `isisms` (`id`, `tanggal`, `nama`, `tentang`, `isi`, `idAdmin`, `status`) VALUES
(1, '2018-03-26 05:46:35', '1', 'Memesan ke supplier', 'Kalo kesini bawakan 1 lusin kaos kaki warna warni yha', 8, 'terkirim'),
(2, '2018-03-27 05:08:26', '3', 'saksake', 'dsdsdsdsdfdf', 4, 'terkirim'),
(3, '2018-03-31 00:00:00', '1', 'pemesanan barang', 'Pesanan+anda+sudah+sampai', 8, 'tidak terkirim'),
(4, '2018-03-31 00:00:00', '1', 'pemesanan barang', 'Pesanan+anda+sudah+sampai', 8, 'tidak terkirim'),
(5, '2018-03-31 12:03:43', '1', 'pemesanan barang', 'pesanan anda sudah sampai -- TOKO PRASASTY', 8, 'tidak terkirim'),
(6, '2018-03-31 12:11:58', '1', 'pemesanan barang', 'pesanan anda sudah sampai -- TOKO PRASASTY', 8, 'terkirim'),
(7, '2018-03-31 12:13:52', '1', 'pemesanan barang', 'pesanan anda sudah sampai -- TOKO PRASASTY', 8, 'terkirim'),
(8, '2018-03-31 12:14:34', '1', 'pemesanan barang', 'pesanan anda sudah sampai -- TOKO PRASASTY', 8, 'tidak terkirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisbarang`
--

CREATE TABLE `jenisbarang` (
  `id` int(11) NOT NULL,
  `Barang` varchar(20) NOT NULL,
  `Kode` varchar(4) NOT NULL,
  `idKategori` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenisbarang`
--

INSERT INTO `jenisbarang` (`id`, `Barang`, `Kode`, `idKategori`) VALUES
(1, 'JAM DINDING', 'JD', 2),
(2, 'BATTERY', 'B', 2),
(3, 'ISI BINDER', 'IB', 1),
(4, 'BUKU BINDER', 'BB', 1),
(5, 'KERTAS FOLIO', 'KF', 1),
(6, 'KUTEK', 'K', 3),
(7, 'CETAKAN KUTEK', 'C', 3),
(8, 'PARFUM', 'P', 3),
(9, 'MASKARA', 'M', 3),
(10, 'PELEMBAB', 'PL', 3),
(11, 'KERTAS KARBON', 'KK', 1),
(12, 'TEMPAT PENSIL', 'TP', 1),
(13, 'JARUM PENTUL', 'JP', 3),
(14, 'TANGKAI BUNGA', 'TB', 4),
(15, 'KERTAS KADO', 'KK1', 5),
(16, 'PLASTER', 'P1', 1),
(17, 'HANDUK', 'H', 6),
(18, 'SEPATU SANDAL', 'SS', 7),
(19, 'SANDAL', 'S', 7),
(20, 'KRIM MALAM', 'KM', 3),
(21, 'KRIM SIANG', 'KS', 3),
(22, 'KRIM', 'K1', 3),
(23, 'MUKENA', 'M1', 7),
(24, 'GANTUNGAN KUNCI', 'GK', 8),
(25, 'JILBAB SEGI EMPAT', 'JS', 7),
(26, 'KAIN FLANNEL', 'KF1', 4),
(27, 'AMPLOP ECER', 'AME', 1),
(28, 'BUKU MEWARNAI', 'BM', 1),
(29, 'AL-QUR''AN', 'AQ', 1),
(30, 'PEMBATAS', 'PM', 1),
(31, 'BAJU KOKO', 'BK', 7),
(32, 'AMPLOP DUS', 'AMD', 1),
(33, 'JEPIT KUKU', 'JK', 6),
(34, 'CRAYON', 'CR', 1),
(35, 'PENGGARIS', 'PG', 1),
(36, 'BOLPOINT', 'BP', 1),
(37, 'PENSIL 2B', 'P2B', 1),
(38, 'PENGHAPUS', 'PH', 1),
(39, 'MANGSI', 'MG', 1),
(40, 'LEM BAKAR', 'LB', 4),
(41, 'BROSS', 'BR', 8),
(42, 'ROMAL TOPI', 'RT', 7),
(43, 'LIPSTIK', 'LP', 3),
(44, 'TINTA TIMBUL', 'TT', 4),
(45, 'TISSUE', 'T', 6),
(46, 'EYESHADOW', 'EH', 3),
(47, 'PENSIL WARNA', 'PW', 1),
(48, 'TUDING NGAJI', 'TG', 1),
(49, 'TIPE-X', 'TX', 1),
(50, 'JEPIT RAMBUT', 'JR', 8),
(51, 'TALI RAMBUT', 'TR', 8),
(52, 'CELENGAN', 'CL', 6),
(53, 'UNDANGAN ULTAH', 'UU', 5),
(54, 'BEKEL', 'BK1', 9),
(55, 'RACIKAN', 'RC', 9),
(56, 'TUNAS KELAPA LAKI-LA', 'TKL', 1),
(57, 'REGU', 'RG', 1),
(58, 'TANDA LOKASI', 'TL', 1),
(59, 'PEMIMPIN REGU', 'PR', 1),
(60, 'WAPINRU', 'WP', 1),
(61, 'TALI PRAMUKA', 'TLP', 1),
(62, 'HASDUK', 'HSD', 1),
(63, 'BENDERA', 'BD', 1),
(64, 'BENDERA SEMAPUR', 'BDS', 1),
(65, 'BENDERA PANDU DUNIA', 'BPD', 1),
(66, 'MANGGAR', 'MGR', 1),
(67, 'PANDU DUNIA LAKI-LAK', 'PDL', 1),
(68, 'PANDU DUNIA PEREMPUA', 'PDP', 1),
(69, 'TUNAS KELAPA PEREMPU', 'TKP', 1),
(70, 'SANGGA', 'SG', 1),
(71, 'RING', 'RI', 1),
(72, 'TALI KUR', 'TK', 1),
(73, 'PELUIT', 'PLT', 1),
(74, 'KAOS KAKI', 'KKI', 1),
(75, 'HANDBODY', 'HB', 3),
(76, 'LULUR', 'LR', 3),
(77, 'BEDAK', 'BDK', 3),
(79, 'BUKU TULIS DUS', 'BTD', 1),
(80, 'BUKU TULIS ECER', 'BTE', 1),
(81, 'GELAS', 'GL', 6),
(82, 'PIRING', 'PRI', 6),
(83, 'PALET', 'PT', 4),
(84, 'CAT AIR', 'CA', 4),
(85, 'KUAS', 'KU', 4),
(86, 'ASAHAN', 'AS', 4),
(87, 'CAT POSTER', 'CP', 4),
(88, 'BUKU BINDER KUNCI', 'BBK', 1),
(89, 'UUD', 'UUD', 1),
(90, 'DEODORAN', 'DR', 3),
(91, 'PAPER CLIP', 'PC', 1),
(92, 'SAMPUL BUKU', 'SB', 1),
(93, 'JILBAB', 'JL', 7),
(94, 'KEMOCENG', 'KC', 6),
(95, 'BUKU DIARY', 'BDY', 1),
(96, 'PLASTIK', 'PLK', 6),
(97, 'BOLA WOLL', 'BW', 4),
(98, 'DEKER', 'DK', 7),
(99, 'SERUTAN', 'SR', 1),
(100, 'JAM TANGAN', 'JT', 8),
(101, 'TOPI', 'TPI', 1),
(102, 'BUKU ATLAS', 'BA', 1),
(103, 'BARET', 'BRT', 1),
(104, 'KAOS TANGAN', 'KT', 8),
(105, 'KACA MATA RENANG', 'KMR', 7),
(106, 'LABEL', 'L', 1),
(107, 'DOBLE TAPE', 'DT', 1),
(108, 'KERTAS PAYUNG', 'KP', 1),
(109, 'KERTAS MANILA', 'KMA', 1),
(110, 'KERTAS ASTURO', 'KA', 1),
(111, 'KERTAS PELANGI', 'KPI', 1),
(112, 'UANG PALSU', 'KPU', 9),
(113, 'CUTTER', 'CT', 1),
(114, 'GUNTING', 'GT', 1),
(115, 'BUKU IQRO', 'BI', 1),
(116, 'BUKU CERITA RAKYAT', 'BCR', 1),
(117, 'PITA', 'PTA', 8),
(118, 'BUKU TURUTAN', 'BT', 1),
(119, 'BUKU SAFINAH', 'BS', 1),
(120, 'TAS', 'A', 1),
(121, 'BUKU GAMBAR', 'BG', 1),
(122, 'JEPITAN', 'JPT', 8),
(123, 'BANDO', 'BDO', 8),
(124, 'MOBIL-MOBILAN', 'MM', 9),
(125, 'MOTOR-MOTORAN', 'MMT', 9),
(126, 'DAKRON', 'DKR', 9),
(127, 'BUNGA MAWAR', 'BM1', 8),
(128, 'BUNGA KAMBOJA', 'BK2', 8),
(129, 'BUNGAN ANGGREK 1', 'BA1', 8),
(130, 'BUNGA ANGGREK 2', 'BA2', 8),
(131, 'BUNGA ANGGREK 3', 'BA3', 8),
(132, 'BUNGA BEGONIA', 'BGA', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(3) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'ALAT TULIS'),
(2, 'ELEKTRONIK'),
(3, 'KOSMETIK'),
(4, 'PRAKARYA'),
(5, 'KADO'),
(6, 'ALAT RUMAH TANGGA'),
(7, 'SANDANGAN'),
(8, 'ASSESORIES'),
(9, 'MAINAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek`
--

CREATE TABLE `merek` (
  `id` int(100) NOT NULL,
  `merek` varchar(30) DEFAULT NULL,
  `kode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merek`
--

INSERT INTO `merek` (`id`, `merek`, `kode`) VALUES
(1, 'QUARTZ 1', 'Q1'),
(2, 'QUARTZ 2', 'Q2'),
(3, 'ABC', 'ABC'),
(4, 'JOYKO', 'J'),
(5, 'KIKY', 'K'),
(6, 'CHINA', 'C'),
(7, 'HARVEST', 'H'),
(8, 'HENA 1', 'H1'),
(9, 'HENA 2', 'H2'),
(10, 'RANI', 'R'),
(11, 'CENDANI', 'C'),
(12, 'TIDAK BERMEREK', 'TM'),
(13, 'ESKULIN', 'E'),
(14, 'MAYBELINE', 'M'),
(15, 'SARIAYU', 'S'),
(16, 'PONDS', 'P'),
(17, 'DALTO', 'D'),
(18, 'BEAR', 'B'),
(19, 'HAKETDA', 'H3'),
(20, 'NACHITAPE', 'N'),
(21, 'GOLDTAPE', 'G'),
(22, 'AMSTERDAM', 'A'),
(23, 'OSIN', 'O'),
(24, 'XENON', 'X'),
(25, 'NEW ERA', 'NE'),
(26, 'NEW ERA 1', 'NE1'),
(27, 'NEW ERA 2', 'NE2'),
(28, 'ARDILES', 'AR'),
(29, 'PARIS', 'P1'),
(30, 'METRO', 'M1'),
(31, 'SOLIHAH', 'SO'),
(32, 'AISAH', 'AI'),
(33, 'HALIMAH', 'HL'),
(34, 'PERMATA', 'PR'),
(35, 'LARASATI', 'L'),
(36, 'MERPATI', 'MR'),
(37, 'PAPERLINE', 'PL'),
(38, 'ECLIPSE', 'EC'),
(39, 'GATSBY', 'GT'),
(40, 'CASABLANKA', 'CS'),
(41, 'MADINA', 'MD'),
(42, 'CASINO', 'C1'),
(43, 'MUROBA', 'MB'),
(44, 'AL-AMIN', 'AA'),
(45, 'MUZDALIFAH', 'MZ'),
(46, 'MUMTAZAH', 'MM'),
(47, 'TITI', 'T'),
(48, 'DEBOZZ', 'DB'),
(49, 'BUTTERFLY', 'BT'),
(50, 'STANDARD', 'ST'),
(51, 'STANDART TECHNO', 'SC'),
(52, 'SNOWMAN', 'SN'),
(53, 'ZAI PICOLLO', 'ZP'),
(54, 'FABER CASTER', 'FC'),
(55, 'STADLER', 'STD'),
(56, 'DORAEMON', 'DR'),
(57, 'PRINCESS', 'PR1'),
(58, 'MICKEY', 'MK'),
(59, 'REFLON', 'RF'),
(60, 'MAWAR', 'MW'),
(61, 'LICO', 'LC'),
(62, 'CASSANOVA', 'CS1'),
(63, 'PASEO', 'PA'),
(64, 'VIVA', 'V'),
(65, 'KING', 'KI'),
(66, 'KENKO', 'KK'),
(67, 'CLONE', 'CL'),
(68, 'FM GELL', 'FG'),
(69, 'GELLY ROW', 'GR'),
(70, 'CLASSIC', 'CSI'),
(71, 'PAPYRUS', 'PP'),
(72, 'STAR', 'STR'),
(73, 'SCHOOL', 'SCH'),
(74, 'TULIP', 'TL'),
(75, 'SOKA', 'SK'),
(76, 'MARINA', 'MRI'),
(77, 'CITRA', 'CT'),
(78, 'FRESH', 'FR'),
(79, 'WARDAH', 'W'),
(80, 'SINAR DUNIA', 'SD'),
(81, 'SEKOLAH', 'SKL'),
(82, 'BIGBOSS', 'BB'),
(83, 'ENTER', 'EN'),
(84, 'GUITAR', 'GU'),
(85, 'PTR', 'PTR'),
(86, 'POSTER', 'PS'),
(87, 'ADIDAS', 'AD'),
(88, 'MIRAGE', 'MRG'),
(89, 'Q&Q', 'QQ'),
(90, 'ALBA', 'AB'),
(91, 'SEIKO', 'SK1'),
(92, 'SWISS', 'SW');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggaldaftar` date NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  `noHP` varchar(15) NOT NULL,
  `status` enum('pelanggan','supplier') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `tanggaldaftar`, `alamat`, `keterangan`, `noHP`, `status`) VALUES
(1, 'Veri', '2018-03-20', 'Ambalresmi', '', '085729838179', 'pelanggan'),
(2, 'Rizkia', '2018-03-20', 'Ambalresmi', '', '085729838179', 'pelanggan'),
(3, 'Dewi', '2018-03-20', 'Bumi Allah', '', '085729838179', 'supplier'),
(4, 'Yanti', '2018-03-20', 'Langit', '', '085729838179', 'supplier'),
(5, 'Koko', '0000-00-00', 'Jakal KM 5', '', '085600023164', 'pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(100) NOT NULL,
  `idAdmin` int(4) NOT NULL,
  `noNota` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `idsupplier` int(10) DEFAULT NULL,
  `WajibMembayar` int(12) NOT NULL,
  `status` enum('LUNAS','BELUM LUNAS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `idAdmin`, `noNota`, `tanggal`, `idsupplier`, `WajibMembayar`, `status`) VALUES
(1, 8, '1', '2018-02-21', 3, 1600000, 'BELUM LUNAS'),
(2, 8, '2', '2018-02-21', 3, 770000, 'LUNAS'),
(3, 8, '3', '2018-03-24', 4, 3218200, 'LUNAS'),
(4, 8, '4', '2018-03-09', 4, 3845600, 'LUNAS'),
(5, 8, '5', '2018-03-04', 3, 3058700, 'LUNAS'),
(6, 8, '6', '2018-03-04', 3, 2762400, 'LUNAS'),
(7, 8, '6.1', '2018-03-03', 3, 1274400, 'LUNAS'),
(8, 8, '7', '2018-03-17', 3, 2484600, 'LUNAS'),
(9, 8, '8', '2018-02-21', 4, 811800, 'LUNAS'),
(10, 8, '8.1', '2018-03-16', 4, 342600, 'LUNAS'),
(11, 8, '9', '2018-02-21', 3, 13783000, 'LUNAS'),
(12, 8, '10', '2018-03-17', 3, 6214800, 'LUNAS'),
(13, 8, '10.1', '2018-02-21', 4, 462000, 'LUNAS'),
(14, 8, '11', '2018-03-03', 3, 13491200, 'LUNAS'),
(15, 9, '1B', '2018-02-21', 3, 19654784, 'LUNAS'),
(16, 9, '7B', '2018-02-21', 3, 24480976, 'LUNAS'),
(17, 8, '7C', '2018-03-23', 3, 810000, 'LUNAS'),
(18, 8, '7D', '2018-03-11', 3, 2161242, 'LUNAS'),
(19, 9, '7E', '2018-03-27', 3, 192000, 'BELUM LUNAS'),
(20, 8, '123', '2018-04-04', 3, 200000, 'BELUM LUNAS'),
(21, 8, '121', '2018-04-19', 4, 4000000, 'LUNAS'),
(22, 8, '120', '2018-04-06', 4, 10500000, 'LUNAS'),
(23, 8, '124', '2018-04-01', 3, 11600000, 'LUNAS'),
(24, 8, '1.1', '2018-04-19', 4, 7200000, 'LUNAS'),
(25, 8, '1.2', '2018-02-06', 4, 108000000, 'LUNAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesan`
--

CREATE TABLE `pemesan` (
  `id` int(255) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_diambil` date NOT NULL,
  `idPelanggan` int(10) NOT NULL,
  `idAdmin` int(20) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('sudah','belum') NOT NULL,
  `status_ambil` enum('sudah','belum') NOT NULL,
  `tempat` int(3) NOT NULL,
  `waktu_pembaharuan` datetime NOT NULL,
  `idCabang` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesan`
--

INSERT INTO `pemesan` (`id`, `tanggal_pesan`, `tanggal_diambil`, `idPelanggan`, `idAdmin`, `keterangan`, `status`, `status_ambil`, `tempat`, `waktu_pembaharuan`, `idCabang`) VALUES
(1, '2018-03-22', '2018-03-31', 1, 8, '', 'belum', 'belum', 2, '2018-03-31 12:14:36', 1),
(2, '2018-03-22', '2018-03-31', 2, 8, '', 'belum', 'belum', 1, '2018-03-22 05:15:58', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(100) NOT NULL,
  `idAdmin` int(4) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `totalBayar` int(11) NOT NULL,
  `status` enum('LUNAS','BELUM LUNAS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `idAdmin`, `tanggal`, `totalBayar`, `status`) VALUES
(1, 8, '2018-03-01', 120000, 'LUNAS'),
(2, 8, '2018-03-01', 569618, 'LUNAS'),
(3, 9, '2018-03-01', 360750, 'LUNAS'),
(4, 8, '2018-03-02', 320518, 'LUNAS'),
(5, 9, '2018-03-02', 380500, 'LUNAS'),
(6, 8, '2018-03-03', 361336, 'LUNAS'),
(7, 9, '2018-03-03', 294500, 'LUNAS'),
(8, 8, '2018-03-04', 381500, 'LUNAS'),
(9, 9, '2018-03-04', 285078, 'LUNAS'),
(10, 8, '2018-03-02', 522500, 'LUNAS'),
(11, 9, '2018-03-02', 349018, 'LUNAS'),
(12, 8, '2018-03-05', 761500, 'LUNAS'),
(13, 9, '2018-03-05', 345000, 'LUNAS'),
(14, 8, '2018-03-06', 945300, 'LUNAS'),
(15, 9, '2018-03-06', 493200, 'LUNAS'),
(16, 8, '2018-03-07', 829500, 'LUNAS'),
(17, 9, '2018-03-07', 425500, 'LUNAS'),
(18, 8, '2018-03-08', 853000, 'LUNAS'),
(19, 9, '2018-03-08', 422000, 'LUNAS'),
(20, 8, '2018-03-09', 851000, 'LUNAS'),
(21, 9, '2018-03-09', 337500, 'LUNAS'),
(22, 8, '2018-03-10', 337500, 'LUNAS'),
(23, 9, '2018-03-10', 260000, 'LUNAS'),
(24, 9, '2018-03-11', 148500, 'LUNAS'),
(25, 8, '2018-03-11', 283500, 'LUNAS'),
(26, 8, '2018-03-12', 1163000, 'LUNAS'),
(27, 9, '2018-03-12', 419000, 'LUNAS'),
(28, 8, '2018-03-13', 743000, 'LUNAS'),
(29, 9, '2018-03-13', 443000, 'LUNAS'),
(30, 8, '2018-03-14', 931500, 'LUNAS'),
(31, 9, '2018-03-14', 484000, 'LUNAS'),
(32, 8, '2018-03-15', 903000, 'LUNAS'),
(33, 9, '2018-03-15', 516000, 'LUNAS'),
(34, 8, '2018-03-16', 742000, 'LUNAS'),
(35, 9, '2018-03-16', 440000, 'LUNAS'),
(36, 9, '2018-03-17', 187500, 'LUNAS'),
(37, 8, '2018-03-17', 210800, 'LUNAS'),
(38, 8, '2018-03-18', 170000, 'LUNAS'),
(39, 9, '2018-03-18', 118000, 'LUNAS'),
(40, 9, '2018-03-19', 402000, 'LUNAS'),
(41, 8, '2018-03-19', 1155000, 'LUNAS'),
(42, 8, '2018-03-20', 1060000, 'LUNAS'),
(43, 9, '2018-03-20', 500000, 'LUNAS'),
(44, 9, '2018-03-21', 445000, 'LUNAS'),
(45, 8, '2018-03-21', 955000, 'LUNAS'),
(46, 8, '2018-03-22', 915000, 'LUNAS'),
(47, 9, '2018-03-22', 415000, 'LUNAS'),
(48, 9, '2018-03-31', 226000, 'LUNAS'),
(49, 8, '2018-03-31', 445000, 'LUNAS'),
(50, 8, '2018-03-01', 250000, 'LUNAS'),
(51, 8, '2018-03-30', 720000, 'LUNAS'),
(52, 9, '2018-03-30', 140000, 'LUNAS'),
(53, 9, '2018-03-29', 495000, 'LUNAS'),
(54, 8, '2018-03-29', 850000, 'LUNAS'),
(55, 8, '2018-03-28', 795000, 'LUNAS'),
(56, 9, '2018-03-28', 465000, 'LUNAS'),
(57, 9, '2018-03-27', 390000, 'LUNAS'),
(58, 8, '2018-03-27', 825000, 'LUNAS'),
(59, 8, '2018-03-26', 760000, 'LUNAS'),
(60, 9, '2018-03-26', 772000, 'LUNAS'),
(61, 9, '2018-03-25', 300000, 'LUNAS'),
(62, 8, '2018-03-25', 360000, 'LUNAS'),
(63, 8, '2018-03-24', 370000, 'LUNAS'),
(64, 9, '2018-03-24', 205000, 'LUNAS'),
(65, 9, '2018-03-23', 675000, 'LUNAS'),
(66, 8, '2018-03-23', 655000, 'LUNAS'),
(67, 8, '2018-03-23', 8000, 'LUNAS'),
(68, 8, '2018-03-23', 312000, 'BELUM LUNAS'),
(69, 9, '2018-04-01', 7000, 'LUNAS'),
(70, 9, '2018-04-01', 60000, 'BELUM LUNAS'),
(71, 9, '2018-04-01', 15000, 'BELUM LUNAS'),
(72, 8, '2018-04-01', 1822000, 'LUNAS'),
(73, 8, '2018-04-02', 1335000, 'LUNAS'),
(74, 8, '2018-04-03', 1165000, 'LUNAS'),
(75, 8, '2018-04-04', 1035000, 'LUNAS'),
(76, 8, '2018-04-05', 3265000, 'LUNAS'),
(77, 8, '2018-04-06', 1350000, 'LUNAS'),
(78, 8, '2018-04-09', 927000, 'LUNAS'),
(79, 8, '2018-04-10', 1065000, 'LUNAS'),
(80, 8, '2018-04-11', 1195000, 'LUNAS'),
(81, 8, '2018-04-12', 1135000, 'LUNAS'),
(82, 8, '2018-04-13', 1095000, 'LUNAS'),
(83, 8, '2018-04-15', 960000, 'LUNAS'),
(84, 8, '2018-04-16', 860000, 'LUNAS'),
(85, 8, '2018-04-17', 1125000, 'LUNAS'),
(86, 8, '2018-04-18', 1147000, 'LUNAS'),
(87, 8, '2018-04-19', 1175000, 'LUNAS'),
(88, 8, '2018-04-20', 1140000, 'LUNAS'),
(89, 8, '2018-04-07', 492000, 'LUNAS'),
(90, 8, '2018-04-08', 452500, 'LUNAS'),
(91, 8, '2018-04-13', 540000, 'LUNAS'),
(92, 8, '2018-04-14', 452000, 'LUNAS'),
(93, 9, '2018-04-01', 740000, 'LUNAS'),
(94, 9, '2018-04-02', 515000, 'LUNAS'),
(95, 9, '2018-04-03', 544000, 'LUNAS'),
(96, 9, '2018-04-04', 550000, 'LUNAS'),
(97, 9, '2018-04-05', 600000, 'LUNAS'),
(98, 9, '2018-04-06', 446000, 'LUNAS'),
(99, 9, '2018-04-09', 880000, 'LUNAS'),
(100, 9, '2018-04-10', 650000, 'LUNAS'),
(101, 9, '2018-04-11', 730000, 'LUNAS'),
(102, 8, '2018-04-21', 659000, 'LUNAS'),
(103, 8, '2018-04-23', 705000, 'LUNAS'),
(104, 8, '2018-04-22', 1000000, 'LUNAS'),
(105, 8, '2018-04-23', 1000000, 'LUNAS'),
(106, 8, '2018-04-23', 700000, 'LUNAS'),
(107, 9, '2018-04-12', 600000, 'LUNAS'),
(108, 9, '2018-04-13', 970000, 'LUNAS'),
(109, 9, '2018-04-14', 720000, 'LUNAS'),
(110, 9, '2018-04-15', 490000, 'LUNAS'),
(111, 9, '2018-04-16', 615000, 'LUNAS'),
(112, 9, '2018-04-17', 890000, 'LUNAS'),
(113, 9, '2018-04-18', 455000, 'LUNAS'),
(114, 9, '2018-04-19', 350000, 'LUNAS'),
(115, 9, '2018-04-20', 550000, 'LUNAS'),
(116, 9, '2018-04-06', 410000, 'LUNAS'),
(117, 9, '2018-04-07', 470000, 'LUNAS'),
(118, 9, '2018-04-21', 10000, 'LUNAS'),
(119, 9, '2018-04-08', 448000, 'LUNAS'),
(120, 9, '2018-04-22', 320000, 'LUNAS'),
(121, 9, '2018-04-23', 610000, 'LUNAS'),
(122, 9, '2018-04-21', 160000, 'LUNAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindahstok`
--

CREATE TABLE `pindahstok` (
  `id` int(50) NOT NULL,
  `idAdmin` int(4) NOT NULL,
  `YangMenerima` varchar(50) NOT NULL,
  `idCabang` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pindahstok`
--

INSERT INTO `pindahstok` (`id`, `idAdmin`, `YangMenerima`, `idCabang`, `tanggal`, `keterangan`) VALUES
(1, 8, 'danis', 2, '2018-03-21', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang`
--

CREATE TABLE `piutang` (
  `id` int(100) NOT NULL,
  `idPenjualan` int(100) NOT NULL,
  `idPelanggan` int(5) NOT NULL,
  `tanggalWajibBayar` date NOT NULL,
  `kekuraganPembayaran` int(12) NOT NULL,
  `status` enum('LUNAS','BELUM LUNAS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `piutang`
--

INSERT INTO `piutang` (`id`, `idPenjualan`, `idPelanggan`, `tanggalWajibBayar`, `kekuraganPembayaran`, `status`) VALUES
(1, 68, 5, '2018-04-21', 5000, 'BELUM LUNAS'),
(2, 70, 2, '2018-04-20', 100000, 'BELUM LUNAS'),
(3, 71, 5, '2018-04-21', 1000, 'BELUM LUNAS');

--
-- Trigger `piutang`
--
DELIMITER $$
CREATE TRIGGER `AFTER_PIUTANG_UPDATE` AFTER UPDATE ON `piutang` FOR EACH ROW BEGIN 

IF NEW.status='BELUM LUNAS' THEN 

UPDATE penjualan SET status='BELUM LUNAS' WHERE id=NEW.idPenjualan;

ELSEIF NEW.status='LUNAS' THEN
UPDATE penjualan SET status='LUNAS' WHERE id=NEW.idPenjualan;

END IF; 

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `returpembelian`
--

CREATE TABLE `returpembelian` (
  `idRetur` int(100) NOT NULL,
  `idPembelian` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `idAdmin` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `returpembelian`
--

INSERT INTO `returpembelian` (`idRetur`, `idPembelian`, `tanggal`, `idAdmin`) VALUES
(1, 6, '2018-03-24', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `returpenjualan`
--

CREATE TABLE `returpenjualan` (
  `idRetur` int(11) NOT NULL,
  `idPenjualan` int(255) NOT NULL,
  `tangal` date NOT NULL,
  `idAdmin` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `returpenjualan`
--

INSERT INTO `returpenjualan` (`idRetur`, `idPenjualan`, `tangal`, `idAdmin`) VALUES
(1, 10, '2018-03-24', 8),
(2, 3, '2018-03-25', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `size`
--

CREATE TABLE `size` (
  `id` int(50) NOT NULL,
  `size` varchar(20) NOT NULL,
  `kode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `size`
--

INSERT INTO `size` (`id`, `size`, `kode`) VALUES
(1, '32', '32'),
(2, '42', '42'),
(3, '38', '38'),
(4, '58', '58'),
(5, '100', '100'),
(6, 'KECIL', 'K'),
(7, 'SEDANG', 'SD'),
(8, 'BESAR', 'B'),
(9, 'S', 'S'),
(10, 'XS', 'XS'),
(11, 'XL', 'XL'),
(12, 'XXL', 'XXL'),
(13, 'M', 'M'),
(14, 'A4', 'A4'),
(15, 'A3', 'A3'),
(16, 'A5', 'A5'),
(17, '40ML', '40'),
(18, '50ML', '50'),
(19, '175ML', '175'),
(20, '100ML', '100M'),
(21, '15ML', '15'),
(22, '35', '35'),
(23, '36', '36'),
(24, '37', '37'),
(26, '39', '39'),
(27, '40', '401'),
(28, '41', '41'),
(29, 'DEWASA', 'D'),
(30, '12', '12'),
(31, '24', '24'),
(32, '18', '18'),
(33, '48', '48'),
(34, '56', '56'),
(35, '72', '72'),
(36, '128', '128'),
(37, '30 CM', '30C'),
(38, '30 ML', '30M'),
(39, 'JUMBO', 'J'),
(40, 'SD', 'SD1'),
(41, 'SMP', 'SMP'),
(42, 'SMA', 'SMA'),
(43, '1', '1'),
(44, '2', '2'),
(45, '3', '3'),
(46, '4', '4'),
(47, 'Panjang', 'P');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokmasuk`
--

CREATE TABLE `stokmasuk` (
  `id` int(255) NOT NULL,
  `tanggal` date NOT NULL,
  `idDetalBarang` int(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `status` enum('MASUK','KELUAR') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stokmasuk`
--

INSERT INTO `stokmasuk` (`id`, `tanggal`, `idDetalBarang`, `jumlah`, `keterangan`, `idAdmin`, `status`) VALUES
(1, '2018-03-26', 52, 1, 'hilang', 8, 'KELUAR');

--
-- Trigger `stokmasuk`
--
DELIMITER $$
CREATE TRIGGER `AFTER_STOK_INSERT` BEFORE INSERT ON `stokmasuk` FOR EACH ROW BEGIN 

IF NEW.status='MASUK' THEN UPDATE detailbarang SET stokAwal=stokAwal+NEW.jumlah WHERE id=NEW.idDetalBarang;

ELSEIF NEW.status='KELUAR' THEN UPDATE detailbarang SET 
stokAwal=stokAwal-NEW.jumlah WHERE id=NEW.idDetalBarang; 

END IF; 

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `totalbeban`
--

CREATE TABLE `totalbeban` (
  `id` int(50) NOT NULL,
  `idBeban` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `noNota` varchar(20) NOT NULL,
  `idAdmin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `totalbeban`
--

INSERT INTO `totalbeban` (`id`, `idBeban`, `tanggal`, `jumlah`, `noNota`, `idAdmin`) VALUES
(1, 1, '2018-03-23', 150000, '11', 4),
(2, 2, '2018-03-23', 1500000, '1', 4),
(3, 3, '2018-03-23', 200000, '12', 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barang`
--
CREATE TABLE `view_barang` (
`id` int(225)
,`status` enum('DIJUAL','TIDAK DIJUAL')
,`keterangan` text
,`barang` varchar(20)
,`merek` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barangrusak`
--
CREATE TABLE `view_barangrusak` (
`id` int(255)
,`tanggal` date
,`kodeBarang` varchar(50)
,`jumlah` int(10)
,`keterangan` text
,`penyebab` enum('supplier','debu','jatuh','lama','lain-lain')
,`noNota` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detailbarang`
--
CREATE TABLE `view_detailbarang` (
`id` int(255)
,`barang` varchar(20)
,`merek` varchar(30)
,`size` varchar(20)
,`warna` varchar(20)
,`hargaEcer` int(12)
,`stokAwal` int(10) unsigned
,`idCabang` int(3)
,`kodeBarang` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detailpembelian`
--
CREATE TABLE `view_detailpembelian` (
`nonota` varchar(20)
,`barang` varchar(20)
,`kodebarang` varchar(50)
,`hargaBeliSatuan` int(12)
,`jumlahBeli` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detailpenjualan`
--
CREATE TABLE `view_detailpenjualan` (
`id` int(255)
,`idpenjualan` int(100)
,`kodebarang` varchar(50)
,`jumlahjual` int(10)
,`potongan` int(12)
,`username` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_hutang`
--
CREATE TABLE `view_hutang` (
`id` int(255)
,`idPembelian` int(255)
,`nama` varchar(50)
,`tanggalWajibBayar` date
,`kekuranganPembayaran` int(12)
,`status` enum('LUNAS','BELUM LUNAS')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jenisbarang`
--
CREATE TABLE `view_jenisbarang` (
`id` int(11)
,`Barang` varchar(20)
,`Kode` varchar(4)
,`idKategori` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pelanggan`
--
CREATE TABLE `view_pelanggan` (
`id` int(10)
,`nama` varchar(50)
,`tanggaldaftar` date
,`alamat` text
,`keterangan` text
,`noHP` varchar(15)
,`status` enum('pelanggan','supplier')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pembelian`
--
CREATE TABLE `view_pembelian` (
`id` int(100)
,`username` varchar(20)
,`noNota` varchar(20)
,`tanggal` date
,`nama` varchar(50)
,`WajibMembayar` int(12)
,`status` enum('LUNAS','BELUM LUNAS')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pemesan`
--
CREATE TABLE `view_pemesan` (
`id` int(255)
,`tanggal_pesan` date
,`tanggal_diambil` date
,`nama` varchar(50)
,`username` varchar(20)
,`keterangan` text
,`status` enum('sudah','belum')
,`status_ambil` enum('sudah','belum')
,`tempat` int(3)
,`waktu_pembaharuan` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_penjualan`
--
CREATE TABLE `view_penjualan` (
`id` int(100)
,`username` varchar(20)
,`tanggal` date
,`totalbayar` int(11)
,`status` enum('LUNAS','BELUM LUNAS')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pindahstok`
--
CREATE TABLE `view_pindahstok` (
`id` int(50)
,`username` varchar(20)
,`yangmenerima` varchar(50)
,`idCabang` int(3)
,`tanggal` date
,`keterangan` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_returpembelian`
--
CREATE TABLE `view_returpembelian` (
`idRetur` int(100)
,`nonota` varchar(20)
,`nama` varchar(50)
,`tanggal` date
,`username` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_returpenjualan`
--
CREATE TABLE `view_returpenjualan` (
`idRetur` int(11)
,`idPenjualan` int(255)
,`tangal` date
,`username` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sms`
--
CREATE TABLE `view_sms` (
`id` int(11)
,`tanggal` datetime
,`nama` varchar(50)
,`tentang` varchar(25)
,`isi` text
,`username` varchar(20)
,`status` enum('terkirim','tidak terkirim')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_supplier`
--
CREATE TABLE `view_supplier` (
`id` int(10)
,`nama` varchar(50)
,`tanggaldaftar` date
,`alamat` text
,`keterangan` text
,`noHP` varchar(15)
,`status` enum('pelanggan','supplier')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_totalbeban`
--
CREATE TABLE `view_totalbeban` (
`id` int(50)
,`beban` varchar(20)
,`tanggal` date
,`jumlah` int(10)
,`nonota` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_updatestok`
--
CREATE TABLE `view_updatestok` (
`id` int(255)
,`tanggal` date
,`jumlah` int(11)
,`kodeBarang` varchar(50)
,`keterangan` text
,`username` varchar(20)
,`status` enum('MASUK','KELUAR')
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `warna`
--

CREATE TABLE `warna` (
  `id` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `kode` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `warna`
--

INSERT INTO `warna` (`id`, `warna`, `kode`) VALUES
(1, 'Merah', 'M'),
(2, 'Kuning', 'K'),
(3, 'Hijau', 'H'),
(4, 'Polkadot', 'P'),
(5, 'Kembang-kembang', 'KK'),
(6, 'WARNA WARNI', 'WW'),
(7, 'JINGGA', 'J'),
(8, 'HIJAU MUDA', 'HM'),
(9, 'HIJAU TUA', 'HT'),
(10, 'HIJAU LUMUT', 'HL'),
(11, 'BIRU MUDA', 'BM'),
(12, 'BIRU TUA', 'BT'),
(13, 'HITAM', 'HI'),
(14, 'ABU ABU', 'AA'),
(15, 'NILA', 'N'),
(16, 'UNGU', 'U'),
(17, 'BIRU', 'B'),
(18, 'UNGU MUDA', 'UM'),
(19, 'UNGU TUA', 'UT'),
(20, 'PUTIH', 'PU'),
(21, 'EMAS', 'E'),
(22, 'SILVER', 'S'),
(23, 'OREN', 'O'),
(24, 'HITAM PUTIH', 'HP'),
(25, 'PINK', 'P1'),
(26, 'PUTIH HIJAU', 'PH'),
(27, 'BENING', 'B1'),
(28, 'COKLAT', 'C'),
(29, 'BUNGA BUNGA', 'BB'),
(30, 'KARTUN', 'KA'),
(31, 'BATIK', 'BT1'),
(32, 'MAWAR', 'MW'),
(33, 'MELATI', 'MT'),
(34, 'ANGGREK', 'AG'),
(35, 'DAHLIA', 'DH'),
(36, 'BOGENVILE', 'BG'),
(37, 'FLAMBOYAN', 'FB'),
(38, 'LILY', 'LY'),
(39, 'TERATAI', 'TR'),
(40, 'NUSA INDAH', 'NI'),
(41, 'ASTER', 'AS'),
(42, 'WIJAYA KUSUMA', 'WK'),
(43, 'SAKURA', 'SK'),
(44, 'TULIP', 'TP'),
(45, 'SEPATU', 'SP'),
(46, 'MATAHARI', 'MT1'),
(47, 'BANTENG', 'BT2'),
(48, 'GAJAH', 'GJ'),
(49, 'JERAPAH', 'JR'),
(50, 'LUMBA-LUMBA', 'LB'),
(51, 'HARIMAU', 'HR'),
(52, 'SINGA', 'SG'),
(53, 'SEMUT', 'SM'),
(54, 'BADAK', 'BD'),
(55, 'GARUDA', 'GD'),
(56, 'ELANG', 'EL'),
(57, 'KOBRA', 'KB'),
(58, 'SCORPIO', 'SC'),
(59, 'HIJAU SEDANG', 'HL1'),
(60, 'SRIGALA', 'SR'),
(61, 'RAJAWALI', 'RW'),
(62, 'KEBUMEN', 'KBM'),
(63, 'JAWA TENGAH', 'JT'),
(64, 'SETRIP SATU', 'SS'),
(65, 'SETRIP DUA', 'SD'),
(66, 'MERAH PUTIH', 'MP'),
(67, 'MERAH KUNING', 'MK'),
(68, 'PENCOBA', 'PC'),
(69, 'PERINTIS', 'PR'),
(70, 'PENDOBRAK', 'PD'),
(71, 'PENEGAS', 'PN'),
(72, 'PELAKSANA', 'PK'),
(73, 'PEMBINA', 'PB');

-- --------------------------------------------------------

--
-- Struktur untuk view `view_barang`
--
DROP TABLE IF EXISTS `view_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang`  AS  select `b`.`id` AS `id`,`b`.`status` AS `status`,`b`.`keterangan` AS `keterangan`,`jb`.`Barang` AS `barang`,`m`.`merek` AS `merek` from ((`barang` `b` join `jenisbarang` `jb`) join `merek` `m`) where ((`b`.`barang` = `jb`.`id`) and (`m`.`id` = `b`.`idMerek`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_barangrusak`
--
DROP TABLE IF EXISTS `view_barangrusak`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barangrusak`  AS  select `br`.`id` AS `id`,`br`.`tanggal` AS `tanggal`,`b`.`kodeBarang` AS `kodeBarang`,`br`.`jumlah` AS `jumlah`,`br`.`keterangan` AS `keterangan`,`br`.`penyebab` AS `penyebab`,`p`.`noNota` AS `noNota` from (((`barangrusak` `br` join `detailbarang` `b`) join `pembelian` `p`) join `detailpembelian` `dp`) where ((`br`.`idDetailBarang` = `b`.`id`) and (`p`.`id` = `dp`.`idPembelian`) and (`br`.`idDetailPembelian` = `dp`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_detailbarang`
--
DROP TABLE IF EXISTS `view_detailbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detailbarang`  AS  select `db`.`id` AS `id`,`jb`.`Barang` AS `barang`,`m`.`merek` AS `merek`,`s`.`size` AS `size`,`w`.`warna` AS `warna`,`db`.`hargaEcer` AS `hargaEcer`,`db`.`stokAwal` AS `stokAwal`,`db`.`idCabang` AS `idCabang`,`db`.`kodeBarang` AS `kodeBarang` from (((((`detailbarang` `db` join `size` `s`) join `warna` `w`) join `barang` `b`) join `jenisbarang` `jb`) join `merek` `m`) where ((`db`.`idUkuran` = `s`.`id`) and (`db`.`idWarna` = `w`.`id`) and (`b`.`id` = `db`.`idBarang`) and (`b`.`barang` = `jb`.`id`) and (`b`.`idMerek` = `m`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_detailpembelian`
--
DROP TABLE IF EXISTS `view_detailpembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detailpembelian`  AS  select `p`.`noNota` AS `nonota`,`jb`.`Barang` AS `barang`,`db`.`kodeBarang` AS `kodebarang`,`dp`.`hargaBeliSatuan` AS `hargaBeliSatuan`,`dp`.`jumlahBeli` AS `jumlahBeli` from ((((`pembelian` `p` join `detailpembelian` `dp`) join `detailbarang` `db`) join `barang` `b`) join `jenisbarang` `jb`) where ((`p`.`id` = `dp`.`idPembelian`) and (`dp`.`idBarang` = `db`.`id`) and (`db`.`idBarang` = `b`.`id`) and (`b`.`barang` = `jb`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_detailpenjualan`
--
DROP TABLE IF EXISTS `view_detailpenjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detailpenjualan`  AS  select `dp`.`id` AS `id`,`p`.`id` AS `idpenjualan`,`db`.`kodeBarang` AS `kodebarang`,`dp`.`jumlahJual` AS `jumlahjual`,`dp`.`potongan` AS `potongan`,`a`.`username` AS `username` from (((`detailpenjualan` `dp` join `penjualan` `p`) join `detailbarang` `db`) join `admin` `a`) where ((`dp`.`idPenjualan` = `p`.`id`) and (`dp`.`idAdmin` = `a`.`id`) and (`dp`.`idBarang` = `db`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_hutang`
--
DROP TABLE IF EXISTS `view_hutang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hutang`  AS  select `h`.`id` AS `id`,`h`.`idPembelian` AS `idPembelian`,`p`.`nama` AS `nama`,`h`.`tanggalWajibBayar` AS `tanggalWajibBayar`,`h`.`kekuranganPembayaran` AS `kekuranganPembayaran`,`h`.`status` AS `status` from (`hutang` `h` join `pelanggan` `p`) where (`h`.`idSupplier` = `p`.`id`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_jenisbarang`
--
DROP TABLE IF EXISTS `view_jenisbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jenisbarang`  AS  select `jb`.`id` AS `id`,`jb`.`Barang` AS `Barang`,`jb`.`Kode` AS `Kode`,`k`.`kategori` AS `idKategori` from (`jenisbarang` `jb` join `kategori` `k`) where (`k`.`id` = `jb`.`idKategori`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pelanggan`
--
DROP TABLE IF EXISTS `view_pelanggan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pelanggan`  AS  select `pelanggan`.`id` AS `id`,`pelanggan`.`nama` AS `nama`,`pelanggan`.`tanggaldaftar` AS `tanggaldaftar`,`pelanggan`.`alamat` AS `alamat`,`pelanggan`.`keterangan` AS `keterangan`,`pelanggan`.`noHP` AS `noHP`,`pelanggan`.`status` AS `status` from `pelanggan` where (`pelanggan`.`status` = 'pelanggan') ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pembelian`
--
DROP TABLE IF EXISTS `view_pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pembelian`  AS  select `p`.`id` AS `id`,`a`.`username` AS `username`,`p`.`noNota` AS `noNota`,`p`.`tanggal` AS `tanggal`,`s`.`nama` AS `nama`,`p`.`WajibMembayar` AS `WajibMembayar`,`p`.`status` AS `status` from ((`pembelian` `p` join `admin` `a`) join `pelanggan` `s`) where ((`p`.`idAdmin` = `a`.`id`) and (`s`.`id` = `p`.`idsupplier`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pemesan`
--
DROP TABLE IF EXISTS `view_pemesan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pemesan`  AS  select `p`.`id` AS `id`,`p`.`tanggal_pesan` AS `tanggal_pesan`,`p`.`tanggal_diambil` AS `tanggal_diambil`,`pe`.`nama` AS `nama`,`a`.`username` AS `username`,`p`.`keterangan` AS `keterangan`,`p`.`status` AS `status`,`p`.`status_ambil` AS `status_ambil`,`p`.`tempat` AS `tempat`,`p`.`waktu_pembaharuan` AS `waktu_pembaharuan` from ((`pemesan` `p` join `pelanggan` `pe`) join `admin` `a`) where ((`p`.`idPelanggan` = `pe`.`id`) and (`a`.`id` = `p`.`idAdmin`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_penjualan`
--
DROP TABLE IF EXISTS `view_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_penjualan`  AS  select `p`.`id` AS `id`,`a`.`username` AS `username`,`p`.`tanggal` AS `tanggal`,`p`.`totalBayar` AS `totalbayar`,`p`.`status` AS `status` from (`penjualan` `p` join `admin` `a`) where (`p`.`idAdmin` = `a`.`id`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pindahstok`
--
DROP TABLE IF EXISTS `view_pindahstok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pindahstok`  AS  select `ps`.`id` AS `id`,`a`.`username` AS `username`,`ps`.`YangMenerima` AS `yangmenerima`,`ps`.`idCabang` AS `idCabang`,`ps`.`tanggal` AS `tanggal`,`ps`.`keterangan` AS `keterangan` from (`pindahstok` `ps` join `admin` `a`) where (`ps`.`idAdmin` = `a`.`id`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_returpembelian`
--
DROP TABLE IF EXISTS `view_returpembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_returpembelian`  AS  select `rp`.`idRetur` AS `idRetur`,`p`.`noNota` AS `nonota`,`pe`.`nama` AS `nama`,`rp`.`tanggal` AS `tanggal`,`a`.`username` AS `username` from (((`returpembelian` `rp` join `pembelian` `p`) join `pelanggan` `pe`) join `admin` `a`) where ((`rp`.`idPembelian` = `p`.`id`) and (`pe`.`id` = `p`.`idsupplier`) and (`a`.`id` = `rp`.`idAdmin`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_returpenjualan`
--
DROP TABLE IF EXISTS `view_returpenjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_returpenjualan`  AS  select `dp`.`idRetur` AS `idRetur`,`dp`.`idPenjualan` AS `idPenjualan`,`dp`.`tangal` AS `tangal`,`a`.`username` AS `username` from (`returpenjualan` `dp` join `admin` `a`) where (`a`.`id` = `dp`.`idAdmin`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_sms`
--
DROP TABLE IF EXISTS `view_sms`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sms`  AS  select `i`.`id` AS `id`,`i`.`tanggal` AS `tanggal`,`p`.`nama` AS `nama`,`i`.`tentang` AS `tentang`,`i`.`isi` AS `isi`,`a`.`username` AS `username`,`i`.`status` AS `status` from ((`isisms` `i` join `pelanggan` `p`) join `admin` `a`) where ((`p`.`id` = `i`.`nama`) and (`a`.`id` = `i`.`idAdmin`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_supplier`
--
DROP TABLE IF EXISTS `view_supplier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_supplier`  AS  select `pelanggan`.`id` AS `id`,`pelanggan`.`nama` AS `nama`,`pelanggan`.`tanggaldaftar` AS `tanggaldaftar`,`pelanggan`.`alamat` AS `alamat`,`pelanggan`.`keterangan` AS `keterangan`,`pelanggan`.`noHP` AS `noHP`,`pelanggan`.`status` AS `status` from `pelanggan` where (`pelanggan`.`status` = 'supplier') ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_totalbeban`
--
DROP TABLE IF EXISTS `view_totalbeban`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_totalbeban`  AS  select `tb`.`id` AS `id`,`b`.`beban` AS `beban`,`tb`.`tanggal` AS `tanggal`,`tb`.`jumlah` AS `jumlah`,`tb`.`noNota` AS `nonota` from ((`totalbeban` `tb` join `beban` `b`) join `admin` `a`) where ((`b`.`id` = `tb`.`idBeban`) and (`a`.`id` = `tb`.`idAdmin`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_updatestok`
--
DROP TABLE IF EXISTS `view_updatestok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_updatestok`  AS  select `sm`.`id` AS `id`,`sm`.`tanggal` AS `tanggal`,`sm`.`jumlah` AS `jumlah`,`db`.`kodeBarang` AS `kodeBarang`,`sm`.`keterangan` AS `keterangan`,`a`.`username` AS `username`,`sm`.`status` AS `status` from ((`stokmasuk` `sm` join `detailbarang` `db`) join `admin` `a`) where ((`sm`.`idDetalBarang` = `db`.`id`) and (`a`.`id` = `sm`.`idAdmin`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMerek` (`idMerek`);

--
-- Indexes for table `barangrusak`
--
ALTER TABLE `barangrusak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `beban`
--
ALTER TABLE `beban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailbarang`
--
ALTER TABLE `detailbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailhutang`
--
ALTER TABLE `detailhutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailpembelian`
--
ALTER TABLE `detailpembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPembelian` (`idPembelian`),
  ADD KEY `idBarang` (`idBarang`);

--
-- Indexes for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPenjualan` (`idPenjualan`),
  ADD KEY `idBarang` (`idBarang`);

--
-- Indexes for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailpindahstok`
--
ALTER TABLE `detailpindahstok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailpiutang`
--
ALTER TABLE `detailpiutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailreturpembelian`
--
ALTER TABLE `detailreturpembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailreturpenjualan`
--
ALTER TABLE `detailreturpenjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isisms`
--
ALTER TABLE `isisms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsupplier` (`idsupplier`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pindahstok`
--
ALTER TABLE `pindahstok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returpembelian`
--
ALTER TABLE `returpembelian`
  ADD PRIMARY KEY (`idRetur`);

--
-- Indexes for table `returpenjualan`
--
ALTER TABLE `returpenjualan`
  ADD PRIMARY KEY (`idRetur`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stokmasuk`
--
ALTER TABLE `stokmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `totalbeban`
--
ALTER TABLE `totalbeban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `barangrusak`
--
ALTER TABLE `barangrusak`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `beban`
--
ALTER TABLE `beban`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detailbarang`
--
ALTER TABLE `detailbarang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=910;
--
-- AUTO_INCREMENT for table `detailhutang`
--
ALTER TABLE `detailhutang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detailpembelian`
--
ALTER TABLE `detailpembelian`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=940;
--
-- AUTO_INCREMENT for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1832;
--
-- AUTO_INCREMENT for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detailpindahstok`
--
ALTER TABLE `detailpindahstok`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detailpiutang`
--
ALTER TABLE `detailpiutang`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detailreturpembelian`
--
ALTER TABLE `detailreturpembelian`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detailreturpenjualan`
--
ALTER TABLE `detailreturpenjualan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `isisms`
--
ALTER TABLE `isisms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `pindahstok`
--
ALTER TABLE `pindahstok`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `returpembelian`
--
ALTER TABLE `returpembelian`
  MODIFY `idRetur` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `returpenjualan`
--
ALTER TABLE `returpenjualan`
  MODIFY `idRetur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `stokmasuk`
--
ALTER TABLE `stokmasuk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `totalbeban`
--
ALTER TABLE `totalbeban`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
