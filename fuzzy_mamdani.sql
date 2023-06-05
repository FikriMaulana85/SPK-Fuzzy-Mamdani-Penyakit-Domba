-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2023 at 08:27 PM
-- Server version: 5.7.38-log
-- PHP Version: 7.4.33

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
(1, 'G13', 'Kulit menjadi keropeng'),
(2, 'G12', 'Muncul luka pada kulit dan terasa gatal'),
(3, 'G11', 'Berbau busuk'),
(4, 'G10', 'Selaput lendir mengalami erosi'),
(5, 'G09', 'Frekuensi keluar air liur meningkat'),
(6, 'G07', 'Domba berjalan kaku dan pincang'),
(7, 'G08', 'Menurunnya produksi susu'),
(8, 'G06', 'Domba gelisah'),
(9, 'G05', 'Domba lemas dan lesu'),
(10, 'G04', 'Frekuensi pernapasan meningkat dan sulit bernapas'),
(11, 'G03', 'Menurunnya berat badan (kekurusan)'),
(12, 'G02', 'Terdapat gangguan pada nafsu makan'),
(13, 'G01', 'Demam'),
(14, 'G14', 'Bulu terasa kasar, tebal, bersisik, dan menjadi kusam'),
(15, 'G15', 'Domba mengalami keguguran pada masa bunting'),
(16, 'G16', 'Ambing domba pecah'),
(17, 'G17', 'Ambing domba membengkak dan berwarna kemerahan'),
(18, 'G18', 'Air susu menggumpal dan berwarna abnormal'),
(19, 'G19', 'Mata menjadi lembab'),
(20, 'G20', 'Mata domba sering menutup'),
(21, 'G21', 'Pupil mata mengalami penyempitan'),
(22, 'G22', 'Kornea mata domba mengalami kekeruhan'),
(23, 'G23', 'Domba mengalami kebutaan'),
(24, 'G24', 'Domba mengalami dehidrasi'),
(25, 'G25', 'Bulu menjadi rontok'),
(26, 'G26', 'Domba sering menggaruk'),
(27, 'G27', 'Domba mengalami kejang'),
(28, 'G28', 'Tubuh domba mengalami kekakuan'),
(29, 'G29', 'Domba mengalami kemajiran'),
(30, 'G30', 'Keluar cairan pada kelamin dan berwarna keruh'),
(31, 'G31', 'Domba mengalami anemia'),
(32, 'G32', 'Domba berjalan sempoyongan'),
(33, 'G33', 'Perut mengalami kembung'),
(34, 'G34', 'Pembesaran terjadi pada perut dan terasa sakit apabila disentuh'),
(35, 'G35', 'Terdapat lepuhan di sekitar mulut yang berisi cairan berwarna putih kekuningan'),
(36, 'G36', 'Domba lebih banyak berbaring'),
(37, 'G37', 'Perubahan pada bentuk ambing'),
(38, 'G38', 'Frekuensi pengeluaran fases meningkat'),
(39, 'G39', 'Frekuensi keluar air mata meningkat'),
(40, 'G40', 'Adanya larva lalat di luka yang terbuka');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil`
--

CREATE TABLE `tbl_hasil` (
  `id_hasil` int(11) NOT NULL,
  `kode_peternakan` varchar(25) NOT NULL,
  `kode_penyakit` varchar(25) NOT NULL,
  `nilai_fuzzy` varchar(25) NOT NULL,
  `tanggal_hasil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hasil`
--

INSERT INTO `tbl_hasil` (`id_hasil`, `kode_peternakan`, `kode_penyakit`, `nilai_fuzzy`, `tanggal_hasil`) VALUES
(1, 'PTRN-001', 'P06', '45.45', '2023-06-05');

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
(1, 'P01', 'Scabies', 'Scabies atau kudis adalah penyakit kulit menular yang disebabkan oleh infestasi tungau parasit Sarcoptes scabiei dan bersifat zoonosis (dapat menular dari hewan ke manusia).', 'Berikan anthistamina, oleskan krim steroid pada permukaan kulit yang terkena scabies, dan silahkan menemui dokter dan berikan pil steroid untuk mengurangi rasa gatal.'),
(2, 'P02', 'Bloat (Kembung)', 'Bloat merupakan gangguan pencernaan akibat akumulasi gas berlebih di dalam rumen, sehingga menyebabkan bagian rumen membesar pada bagian perut sebelah kiri. Penyakit ini sering terjadi secara mendadak. ', 'Berikan Antibiotik, pemberian pakan sesuai umur dan nutrisi, anti bloat yang dicairkan, silahkan menemui dokter untuk lebih detail.'),
(3, 'P03', 'Orf ', 'Orf adalah suatu penyakit hewan menular pada kambing dan domba yang ditandai dengan terbentuknya popula, vesikula dan keropeng pada kulit di daerah bibir atau di sekitar bibir. Orf disebabkan oleh virus Parapoks. ', 'Berikan Antistamina, berikan salep pelunak untuk membantu agar ternak tetap dapat makan dan minum, oleskan salep penisilin yang dicampur minyak kelapa, berikan antibiotika dengan disuntikan, silahkan menemui dokter untuk lebih detail.'),
(4, 'P04', 'Pink Eye', 'Pink eye adalah penyakit mata menular pada ternak, terutama sapi, kerbau, domba, dan kambing yang disebabkan oleh Rickettsia (Colesiata) conjungtivae, Mycoplasma conjungtivae, Brahanella catarrhalis dan Chlamydia', 'Berikan Antibiotik, pisahkan ternak yang terkena penyakit ke kandang lain, bersihkan kandang, mengurangi jumlah ternak di dalam kandang, memberikan pakan yang sesuai dan nutrisi, silahkan menemui dokter untuk lebih detail'),
(5, 'P05', 'Diare', 'Diare adalah penyakit yang mengganggu sistem pencernaan pada ternak. Diare adalah gejala abnormalitas sistem pencernaan dan sering terjadi pada anak ternak. Gejala ini tidak hanya menyebabkan kekurangan penyerapan sari- sari makanan, tetapi ternak juga akan mengalami kehilangan cairan dalam jumlah banyak. ', 'Memberi pakan yang lunak, memberi pakan sesuai usia dan higienitas, membersihkan kandang, pisahkan ternak yang terkena penyakit ke kandang lain, silahkan menemui dokter untuk lebih detail.'),
(6, 'P06', 'Tetanus', 'Tetanus adalah keracunan neurotoksin (toksin yang menyerang saraf) yang dibentuk clostridium tetani dengan tanda-tanda khas spasmus (kejang) otot-otot dan dapat mengakibatkan kematian pada ternak.', 'Berikan Antibiotik, berikan antitetanus serum dan kalsium, silahkan menemui dokter untuk mengetahui lebih detail.'),
(7, 'P07', 'Mastitis', 'Mastitis  adalah  salah  satu  penyakit  radang  ambing  yang menyebabkan  ambing  menjadi  abnormal  diakibatkan  infeksi,  biasanya penyakit ini akan bersifat akut, sub akut, bahkan akan mengakibatkan kronis.', 'Jaringan yang membengkak dikompres dengan air hangat, membantu mengosongkan ambing dengan cara diperah (buang perlahan), berikan antibiotik (ambing, anti radang, vitamin), luka dibuat segar dengan membuang jaringan yang rusak, bersihkan kandang, berikan pakan setinggi hidung supaya mudah digapai, silahkan menemui dokter untuk mengetahui lebih detail.'),
(8, 'P08', 'Brucellosis', 'Brucellosis adalah penyakit hewan menular yang secara primer menyerang ternak dan sekunder menyerang berbagai jenis hewan. Penyakit ini bersifat zoonosis (dapat menular dari hewan ke manusia),  dan  biasanya  sulit  diobati  sehingga  sampai  saat  ini brucellosis merupakan zoonosis penting dan strategis. Penyakit ini disebabkan oleh bakteri Brucella melitensis.', 'Berikan antibiotik, ternak yang terkena penyakit dipisahkan dari ternak lainnya, bersihkan kandang, berikan makanan setinggi hidung supaya mudah digapai, perlu dilakukan vaksinasi brucella, silahkan menemui dokter untuk mengetahui lebih detail.'),
(9, 'P09', 'Myasis', 'Myasis atau belatungan adalah infestasi larva lalat ke dalam suatu jaringan hidup hewan berdarah panas termasuk manusia. Myasis adalah invasi belatung atau lalat pada jaringan tubuh sehingga menyebatkan kerusakan pada jaringan tersebut. Myasis berawal dari luka karena trauma yang dibiarkan terbuka yang didukung oleh lingkungan kandang yang kurang bersih sehingga memudahkan lalat kontak dengan luka.', 'Bersihkan dan obati luka yang terbuka dari lalat, pastikan larva lalat (belatung) sudah tidak ada di luka ternak, memasang perangkap lalat untuk mengurangi populasi, membersihkan kandang dari lalat, desinfeksi, taburkan antibiotik serbuk, silahkan menemui dokter untuk mengetahui lebih detail.'),
(10, 'P10', 'Foot Rot (Busuk Kaki)', 'Kuku busuk adalah infeksi kuku yang akut atau menahun yang disebabkan oleh berbagai macam jasad renik pada daerah subcutis maupun pada jaringan interdigital, yang mengakibatkan peradangan hebat. Penyebabnya adalah kuku yang tidak terawat, kandang yang basah dan kotor, sehingga domba menginjak kotoran dan kuku menjadi lunak pada akhirnya terjadi pembusukkan.', 'Bersihkan dan potog kuku ternak, berikan antibiotik serbuk, semprot anti lalat, silahkan menemui dokter untuk mengetahui lebih detail.');

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
(1, 'PTRN-001', 'Cucu', 'Farm', 'Cikampek', 'farm@gmail.com', '0000-00-00');

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
(1, 'G02', 'P01', '7'),
(2, 'G03', 'P01', '5'),
(3, 'G06', 'P01', '5'),
(4, 'G11', 'P01', '5'),
(5, 'G14', 'P01', '20'),
(6, 'G25', 'P01', '10'),
(7, 'G26', 'P01', '8'),
(8, 'G12', 'P01', '20'),
(9, 'G13', 'P01', '20'),
(10, 'G01', 'P02', '5'),
(11, 'G02', 'P02', '15'),
(12, 'G04', 'P02', '15'),
(13, 'G05', 'P02', '10'),
(14, 'G32', 'P02', '10'),
(15, 'G33', 'P02', '15'),
(16, 'G34', 'P02', '30'),
(17, 'G02', 'P03', '10'),
(18, 'G06', 'P03', '10'),
(19, 'G12', 'P03', '25'),
(20, 'G13', 'P03', '25'),
(21, 'G35', 'P03', '30'),
(22, 'G01', 'P04', '7'),
(23, 'G19', 'P04', '10'),
(24, 'G20', 'P04', '10'),
(25, 'G39', 'P04', '13'),
(26, 'G21', 'P04', '15'),
(27, 'G22', 'P04', '20'),
(28, 'G23', 'P04', '25'),
(29, 'G01', 'P05', '5'),
(30, 'G02', 'P05', '7'),
(34, 'G03', 'P05', '10'),
(35, 'G05', 'P05', '5'),
(36, 'G07', 'P05', '6'),
(37, 'G24', 'P05', '7'),
(38, 'G08', 'P05', '4'),
(39, 'G09', 'P05', '3'),
(40, 'G10', 'P05', '5'),
(41, 'G15', 'P05', '10'),
(42, 'G38', 'P05', '20'),
(43, 'G11', 'P05', '3'),
(44, 'G14', 'P05', '15'),
(45, 'G06', 'P06', '10'),
(46, 'G27', 'P06', '14'),
(47, 'G28', 'P06', '26'),
(48, 'G07', 'P06', '20'),
(49, 'G40', 'P06', '30'),
(50, 'G08', 'P07', '15'),
(51, 'G16', 'P07', '30'),
(52, 'G17', 'P07', '20'),
(53, 'G37', 'P07', '15'),
(54, 'G18', 'P07', '20'),
(55, 'G08', 'P08', '15'),
(56, 'G15', 'P08', '25'),
(57, 'G29', 'P08', '30'),
(58, 'G30', 'P08', '30'),
(59, 'G01', 'P09', '7'),
(60, 'G02', 'P09', '10'),
(61, 'G03', 'P09', '15'),
(62, 'G31', 'P09', '23'),
(63, 'G08', 'P09', '15'),
(64, 'G12', 'P09', '30'),
(65, 'G01', 'P10', '9'),
(66, 'G02', 'P10', '8'),
(67, 'G03', 'P10', '10'),
(68, 'G05', 'P10', '10'),
(69, 'G07', 'P10', '8'),
(70, 'G36', 'P10', '20'),
(71, 'G08', 'P10', '15'),
(72, 'G09', 'P10', '10'),
(73, 'G10', 'P10', '10');

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
  `bobot_gejala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`id_tmp_gejala`, `kode_peternakan`, `kode_gejala`, `bobot_gejala`) VALUES
(1, 'PTRN-001', 'G40', 45),
(2, 'PTRN-001', 'G39', 50),
(3, 'PTRN-001', 'G38', 10);

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

--
-- Dumping data for table `tmp_penyakit`
--

INSERT INTO `tmp_penyakit` (`id_tmp_penyakit`, `kode_peternakan`, `kode_penyakit`, `bobot_penyakit`) VALUES
(1, 'PTRN-001', 'P01', '0'),
(2, 'PTRN-001', 'P02', '0'),
(3, 'PTRN-001', 'P03', '0'),
(4, 'PTRN-001', 'P04', '0.07'),
(5, 'PTRN-001', 'P05', '0.05'),
(6, 'PTRN-001', 'P06', '0.1'),
(7, 'PTRN-001', 'P07', '0'),
(8, 'PTRN-001', 'P08', '0'),
(9, 'PTRN-001', 'P09', '0'),
(10, 'PTRN-001', 'P10', '0');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_peternakan`
--
ALTER TABLE `tbl_peternakan`
  MODIFY `id_peternakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_relasi`
--
ALTER TABLE `tbl_relasi`
  MODIFY `id_relasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  MODIFY `id_tmp_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tmp_penyakit`
--
ALTER TABLE `tmp_penyakit`
  MODIFY `id_tmp_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
