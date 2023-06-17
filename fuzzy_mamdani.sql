-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 04:04 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuzzy_mamdani`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(25) NOT NULL,
  `desc_gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`id_gejala`, `kode_gejala`, `desc_gejala`) VALUES
(8, 'G01', 'Lesi pada kulit terbuka dan terasa gatal'),
(9, 'G02', 'Kulit menjadi keropeng'),
(10, 'G03', 'Penurunan pada nafsu makan'),
(11, 'G04', 'Tempat area gejala ditemukan'),
(12, 'G05', 'Gejala lain yang ditemukan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil`
--

CREATE TABLE `tbl_hasil` (
  `id_hasil` int(11) NOT NULL,
  `kode_peternakan` varchar(25) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `nilai_fuzzy` varchar(25) NOT NULL,
  `tanggal_hasil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hasil`
--

INSERT INTO `tbl_hasil` (`id_hasil`, `kode_peternakan`, `nama_penyakit`, `nilai_fuzzy`, `tanggal_hasil`) VALUES
(1, 'PTRN-001', 'Myiasis Oral', '55.5', '2023-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyakit`
--

CREATE TABLE `tbl_penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` varchar(25) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `definisi_penyakit` text NOT NULL,
  `solusi_penyakit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penyakit`
--

INSERT INTO `tbl_penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `definisi_penyakit`, `solusi_penyakit`) VALUES
(1, 'P01', 'Scabies', 'Scabies atau kudis adalah penyakit kulit menular yang disebabkan oleh infestasi tungau parasit Sarcoptes scabiei dan bersifat zoonosis (dapat menular dari hewan ke manusia). ', 'Berikan anthistamina, oleskan krim steroid pada permukaan kulit yang terkena scabies, dan silahkan menemui dokter dan berikan pil steroid untuk mengurangi rasa gatal. '),
(2, 'P02', 'ORF', 'Orf adalah suatu penyakit hewan menular pada kambing dan domba yang ditandai dengan terbentuknya popula, vesikula dan keropeng pada kulit di daerah bibir atau di sekitar bibir. Orf disebabkan oleh virus Parapoks. ', 'Berikan Antistamina, berikan salep pelunak untuk membantu agar ternak tetap dapat makan dan minum, oleskan salep penisilin yang dicampur minyak kelapa, berikan antibiotika dengan disuntikan, silahkan menemui dokter untuk lebih detail. '),
(4, 'P03', 'Myasis', 'Myasis atau belatungan adalah infestasi larva lalat ke dalam suatu jaringan hidup hewan berdarah panas termasuk manusia. Myasis adalah invasi belatung atau lalat pada jaringan tubuh sehingga menyebatkan kerusakan pada jaringan tersebut. Myasis berawal dari luka karena trauma yang dibiarkan terbuka yang didukung oleh lingkungan kandang yang kurang bersih sehingga memudahkan lalat kontak dengan luka. ', 'Bersihkan dan obati luka yang terbuka dari lalat, pastikan larva lalat (belatung) sudah tidak ada di luka ternak, memasang perangkap lalat untuk mengurangi populasi, membersihkan kandang dari lalat, desinfeksi, taburkan antibiotik serbuk, silahkan menemui dokter untuk mengetahui lebih detail. '),
(5, 'P04', 'Myiasis Oral ', 'Definisinya', 'Solusinya'),
(6, 'P05', 'Infeksi Orf', 'Definisi', 'Solusi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peternakan`
--

CREATE TABLE `tbl_peternakan` (
  `id_peternakan` int(11) NOT NULL,
  `kode_peternakan` varchar(25) NOT NULL,
  `nama_peternak` varchar(50) NOT NULL,
  `nama_peternakan` varchar(50) NOT NULL,
  `alamat_peternakan` text NOT NULL,
  `email_peternak` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_peternakan`
--

INSERT INTO `tbl_peternakan` (`id_peternakan`, `kode_peternakan`, `nama_peternak`, `nama_peternakan`, `alamat_peternakan`, `email_peternak`, `tanggal`) VALUES
(1, 'PTRN-001', 'Orang 1', 'Farm House 1', 'Adawdawdawd', 'farm1@house.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi`
--

CREATE TABLE `tbl_relasi` (
  `id_relasi` int(11) NOT NULL,
  `kode_gejala` varchar(25) NOT NULL,
  `kode_penyakit` varchar(25) NOT NULL,
  `bobot` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_relasi`
--

INSERT INTO `tbl_relasi` (`id_relasi`, `kode_gejala`, `kode_penyakit`, `bobot`) VALUES
(76, 'G01', 'P01', '0'),
(77, 'G05', 'P01', '0'),
(78, 'G07', 'P01', '0'),
(79, 'G01', 'P02', '0'),
(80, 'G02', 'P02', '0'),
(81, 'G07', 'P02', '0'),
(82, 'G04', 'P03', '0'),
(83, 'G04', 'P03', '0'),
(84, 'G06', 'P03', '0'),
(85, 'G01', 'P04', '0'),
(86, 'G03', 'P04', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rules`
--

CREATE TABLE `tbl_rules` (
  `id_rules` int(11) NOT NULL,
  `kode_rules` varchar(25) NOT NULL,
  `kode_gejala1` varchar(25) NOT NULL,
  `level_gejala1` varchar(25) NOT NULL,
  `kode_gejala2` varchar(25) NOT NULL,
  `level_gejala2` varchar(25) NOT NULL,
  `kode_gejala3` varchar(25) NOT NULL,
  `level_gejala3` varchar(25) NOT NULL,
  `kode_gejala4` varchar(5) NOT NULL,
  `level_gejala4` varchar(100) NOT NULL,
  `kode_gejala5` varchar(5) NOT NULL,
  `level_gejala5` varchar(100) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rules`
--

INSERT INTO `tbl_rules` (`id_rules`, `kode_rules`, `kode_gejala1`, `level_gejala1`, `kode_gejala2`, `level_gejala2`, `kode_gejala3`, `level_gejala3`, `kode_gejala4`, `level_gejala4`, `kode_gejala5`, `level_gejala5`, `nama_penyakit`) VALUES
(1, 'R1', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(2, 'R2', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(3, 'R3', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(4, 'R4', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(5, 'R5', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(6, 'R6', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(7, 'R7', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(8, 'R8', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(9, 'R9', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(10, 'R10', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(11, 'R11', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(12, 'R12', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(13, 'R13', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(14, 'R14', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(15, 'R15', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(16, 'R16', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(17, 'R17', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(18, 'R18', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(19, 'R19', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(20, 'R20', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(21, 'R21', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(22, 'R22', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(23, 'R23', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(24, 'R24', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(25, 'R25', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(26, 'R26', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(27, 'R27', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(28, 'R28', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(29, 'R29', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(30, 'R30', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(31, 'R31', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(32, 'R32', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(33, 'R33', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(34, 'R34', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(35, 'R35', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(36, 'R36', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(37, 'R37', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(38, 'R38', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(39, 'R39', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(40, 'R40', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(41, 'R41', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(42, 'R42', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(43, 'R43', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(44, 'R44', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(45, 'R45', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(46, 'R46', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(47, 'R47', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(48, 'R48', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(49, 'R49', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(50, 'R50', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(51, 'R51', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(52, 'R52', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(53, 'R53', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(54, 'R54', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Bulu Kasar, Tebal, Menjadi Rontok Dan Sering Menggaruk', 'Scabies'),
(55, 'R55', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(56, 'R56', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(57, 'R57', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(58, 'R58', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(59, 'R59', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(60, 'R60', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(61, 'R61', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(62, 'R62', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(63, 'R63', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(64, 'R64', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(65, 'R65', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(66, 'R66', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(67, 'R67', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(68, 'R68', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(69, 'R69', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(70, 'R70', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(71, 'R71', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(72, 'R72', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(73, 'R73', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(74, 'R74', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(75, 'R75', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(76, 'R76', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(77, 'R77', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(78, 'R78', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(79, 'R79', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(80, 'R80', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(81, 'R81', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Infeksi Orf'),
(82, 'R82', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(83, 'R83', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(84, 'R84', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(85, 'R85', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(86, 'R86', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(87, 'R87', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(88, 'R88', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(89, 'R89', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(90, 'R90', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(91, 'R91', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(92, 'R92', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(93, 'R93', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(94, 'R94', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(95, 'R95', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(96, 'R96', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(97, 'R97', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(98, 'R98', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(99, 'R99', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(100, 'R100', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(101, 'R101', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(102, 'R102', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(103, 'R103', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(104, 'R104', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(105, 'R105', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(106, 'R106', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(107, 'R107', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(108, 'R108', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Selaput Lendir Mengalami Erosi Dan Pembengkakan Di Area Lesi', 'Orf'),
(109, 'R109', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(110, 'R110', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(111, 'R111', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(112, 'R112', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(113, 'R113', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(114, 'R114', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(115, 'R115', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(116, 'R116', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(117, 'R117', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(118, 'R118', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(119, 'R119', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(120, 'R120', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(121, 'R121', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(122, 'R122', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(123, 'R123', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(124, 'R124', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(125, 'R125', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(126, 'R126', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(127, 'R127', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(128, 'R128', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(129, 'R129', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(130, 'R130', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(131, 'R131', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(132, 'R132', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(133, 'R133', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(134, 'R134', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(135, 'R135', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis Oral'),
(136, 'R136', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(137, 'R137', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(138, 'R138', 'G01', 'Ringan', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(139, 'R139', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(140, 'R140', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(141, 'R141', 'G01', 'Ringan', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(142, 'R142', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(143, 'R143', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(144, 'R144', 'G01', 'Ringan', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(145, 'R145', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(146, 'R146', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(147, 'R147', 'G01', 'Agak Parah', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(148, 'R148', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(149, 'R149', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(150, 'R150', 'G01', 'Agak Parah', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(151, 'R151', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(152, 'R152', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(153, 'R153', 'G01', 'Agak Parah', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(154, 'R154', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(155, 'R155', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(156, 'R156', 'G01', 'Parah', 'G02', 'Ringan', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(157, 'R157', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(158, 'R158', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(159, 'R159', 'G01', 'Parah', 'G02', 'Agak Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(160, 'R160', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Ringan', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(161, 'R161', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Agak Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis'),
(162, 'R162', 'G01', 'Parah', 'G02', 'Parah', 'G03', 'Parah', 'G04', 'Area Tubuh Selain Mulut', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 'Myiasis');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '$2y$10$hhbrrFkibIU6zia2JAGZ9u592A.oGNToCDJtbM66yyXw0O3j/BG8.');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `id_tmp_gejala` int(11) NOT NULL,
  `kode_peternakan` varchar(25) NOT NULL,
  `kode_gejala` varchar(25) NOT NULL,
  `bobot_gejala` varchar(100) DEFAULT NULL,
  `ringan` float NOT NULL,
  `agak_parah` float NOT NULL,
  `parah` float NOT NULL,
  `area` varchar(100) NOT NULL,
  `gejala_lain` varchar(100) NOT NULL,
  `level_1` varchar(25) NOT NULL,
  `level_2` varchar(25) NOT NULL,
  `level_3` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`id_tmp_gejala`, `kode_peternakan`, `kode_gejala`, `bobot_gejala`, `ringan`, `agak_parah`, `parah`, `area`, `gejala_lain`, `level_1`, `level_2`, `level_3`) VALUES
(1, 'PTRN-001', 'G05', 'Adanya Larva Lalat Di Lesi Yang Terbuka', 1, 0, 0, '', '', 'Ringan', 'Parah', 'Sangat Parah'),
(2, 'PTRN-001', 'G04', 'Area Mulut', 1, 0, 0, '', '', 'Ringan', 'Parah', 'Sangat Parah'),
(3, 'PTRN-001', 'G03', '6.5', 0, 0.67, 0.33, '', '', 'Ringan', 'Parah', 'Sangat Parah'),
(4, 'PTRN-001', 'G02', '5', 0, 1, 0, '', '', 'Ringan', 'Parah', 'Sangat Parah'),
(5, 'PTRN-001', 'G01', '4', 0.33, 0.67, 0, '', '', 'Ringan', 'Parah', 'Sangat Parah');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_penyakit`
--

CREATE TABLE `tmp_penyakit` (
  `id_tmp_penyakit` int(11) NOT NULL,
  `kode_peternakan` varchar(25) NOT NULL,
  `kode_penyakit` varchar(25) NOT NULL,
  `bobot_penyakit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_rules`
--

CREATE TABLE `tmp_rules` (
  `id_tmp_rules` int(11) NOT NULL,
  `kode_peternakan` varchar(25) NOT NULL,
  `kode_rules` varchar(25) NOT NULL,
  `bobot_rules` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tmp_rules`
--

INSERT INTO `tmp_rules` (`id_tmp_rules`, `kode_peternakan`, `kode_rules`, `bobot_rules`) VALUES
(1, 'PTRN-001', 'R109', 0),
(2, 'PTRN-001', 'R110', 0),
(3, 'PTRN-001', 'R111', 0),
(4, 'PTRN-001', 'R112', 0),
(5, 'PTRN-001', 'R113', 0),
(6, 'PTRN-001', 'R114', 0),
(7, 'PTRN-001', 'R115', 0),
(8, 'PTRN-001', 'R116', 0.33),
(9, 'PTRN-001', 'R117', 0.33),
(10, 'PTRN-001', 'R118', 0),
(11, 'PTRN-001', 'R119', 0),
(12, 'PTRN-001', 'R120', 0),
(13, 'PTRN-001', 'R121', 0),
(14, 'PTRN-001', 'R122', 0),
(15, 'PTRN-001', 'R123', 0),
(16, 'PTRN-001', 'R124', 0),
(17, 'PTRN-001', 'R125', 0),
(18, 'PTRN-001', 'R126', 0),
(19, 'PTRN-001', 'R127', 0),
(20, 'PTRN-001', 'R128', 0),
(21, 'PTRN-001', 'R129', 0),
(22, 'PTRN-001', 'R130', 0),
(23, 'PTRN-001', 'R131', 0),
(24, 'PTRN-001', 'R132', 0),
(25, 'PTRN-001', 'R133', 0),
(26, 'PTRN-001', 'R134', 0.33),
(27, 'PTRN-001', 'R135', 0.67),
(28, 'PTRN-001', 'R109', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `tbl_peternakan`
--
ALTER TABLE `tbl_peternakan`
  ADD PRIMARY KEY (`id_peternakan`);

--
-- Indexes for table `tbl_relasi`
--
ALTER TABLE `tbl_relasi`
  ADD PRIMARY KEY (`id_relasi`);

--
-- Indexes for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  ADD PRIMARY KEY (`id_rules`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  ADD PRIMARY KEY (`id_tmp_gejala`);

--
-- Indexes for table `tmp_penyakit`
--
ALTER TABLE `tmp_penyakit`
  ADD PRIMARY KEY (`id_tmp_penyakit`);

--
-- Indexes for table `tmp_rules`
--
ALTER TABLE `tmp_rules`
  ADD PRIMARY KEY (`id_tmp_rules`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_peternakan`
--
ALTER TABLE `tbl_peternakan`
  MODIFY `id_peternakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_relasi`
--
ALTER TABLE `tbl_relasi`
  MODIFY `id_relasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  MODIFY `id_rules` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  MODIFY `id_tmp_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tmp_penyakit`
--
ALTER TABLE `tmp_penyakit`
  MODIFY `id_tmp_penyakit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_rules`
--
ALTER TABLE `tmp_rules`
  MODIFY `id_tmp_rules` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
