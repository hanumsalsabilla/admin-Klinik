-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 09:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goklinik2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`username`, `password`, `active`, `name`) VALUES
('itsjohanes', '$2y$10$dbcHz6UrDS1.AKkTpKc6H.ULmWoFzGCzZ2iaDkNbyTbaGYVF47G/6', 0, 'Johannes Alexander Putra'),
('itsjohn', '$2y$10$rzIwpY2d0JvQLUl28X7/D.mcm0Q8xKSAVNznoHtOn3NA.pf/iNUqe', 1, 'Johannes Alexander Putra Ganteng'),
('itsjohn2', '$2y$10$6ErZQT2qc4MxjyMOcCC.E.nZep1/v86P4g3o5JaeKRhXAUfurnOvu', 1, 'Johannes Alexander Putra'),
('nurmiiaaww', '$2y$10$0i7u5WW9R2CCCK2dQJdfIO/vS0d7dMH/eQGWjbLK2Efp4sovrhcfy', 0, 'Nurmiyati Annisa Wolio'),
('salman', '$2y$10$a5l2hzqGQCKoN.y88o/MCuK.xnfbs9nLkZ6Aw76JmokTXCxFEmCr.', 1, 'Salman');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `foto_dokter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `keterangan`, `foto_dokter`) VALUES
(2, 'dr.Asep', 'Dokter Umum', 'Dokter umum dengan pengalaman di bidang medis selama 30 tahun', 'dokter_asep.png'),
(3, 'dr.Sunarya', 'Dokter Umum', 'Dokter umum dengan pengalaman di bidang medis selama 30 tahun', 'dokter_sunarya.png'),
(4, 'dr.Sukarya', 'Dokter Gigi', 'Dokter gigi dengan pengalaman di bidang medis selama 20 tahun', 'dokter_sukarya.png'),
(7, 'dr. Johannes', 'Dokter Umum', 'Dokter umum dengan pengalaman di bidang medis selama 10 tahun', 'dokter_johanes.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `jadwal` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`jadwal`, `jam`, `id_jadwal`, `id_dokter`) VALUES
('Senin, 22 Agustus 2022', '12:00-11:00', 2, 2),
('Rabu, 24 Agustus 2022', '10:00-11:00', 4, 2),
('Senin, 22 Agustus 2022', '10:00-12:00', 7, 3),
('Sabtu, 20 Agustus 2022', '10:00-12:00', 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsultasi`
--

CREATE TABLE `tb_konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `antrian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_konsultasi`
--

INSERT INTO `tb_konsultasi` (`id_konsultasi`, `id_jadwal`, `status`, `id_pasien`, `antrian`) VALUES
(17, 2, 0, 2, 5),
(18, 4, 0, 2, 1),
(20, 4, 0, 2, 2),
(21, 7, 0, 2, 1),
(22, 2, 0, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsultasiselesai`
--

CREATE TABLE `tb_konsultasiselesai` (
  `id_selesai` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `jadwal` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_konsultasiselesai`
--

INSERT INTO `tb_konsultasiselesai` (`id_selesai`, `id_pasien`, `nama_pasien`, `jadwal`, `jam`, `nama_dokter`, `no_hp`) VALUES
(1, 1, 'Jenifer Lopez', 'Senin, 22 Agustus 2022', '12:00-11:00', 'dr.Asep,PHD', '0811212121'),
(2, 3, 'Lesti Kejora', 'Senin, 22 Agustus 2022', '12:00-11:00', 'dr.Asep,PHD', '0872323232'),
(3, 2, 'Johannes Alexander Putra', 'Senin, 22 Agustus 2022', '12:00-11:00', 'dr.Asep,PHD', '081934172542'),
(4, 2, 'Johannes Alexander Putra', 'Senin, 22 Agustus 2022', '12:00-11:00', 'dr.Asep,PHD', '081934172542'),
(5, 2, 'Johannes Alexander Putra', 'Senin, 22 Agustus 2022', '12:00-11:00', 'dr.Asep,PHD', '081934172542'),
(6, 2, 'Johannes Alexander Putra', 'Senin, 22 Agustus 2022', '12:00-11:00', 'dr.Asep,PHD', '081934172542');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(5) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `stok_obat` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(255) NOT NULL,
  `gambar_obat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `stok_obat`, `keterangan`, `harga`, `gambar_obat`) VALUES
(6, 'Panadol Cold &amp; Flu 10 Kaplet ', 15, 'PANADOL COLD &amp; FLU merupakan obat batuk dan pereda flu dengan kandungan Paracetamol, Pseudoephedrine HCI, dan Dextromethorphan HBr. Obat ini dapat digunakan untuk meredakan gejala flu seperti: demam, sakit kepala, hidung tersumbat dan batuk tidak berdahak. ', 16700, 'PanadolCold.png'),
(7, 'OBH Combi Plus Batuk Flu Menthol 100 ml ', 20, 'OBH COMBI PLUS BATUK FLU merupakan obat batuk dengan kandungan OBH, Paracetamol, Ephedrine HCl, dan Chlorphenamine maleat yang digunakan untuk meredakan batuk disertai gejala-gejala flu seperti demam, sakit kepala, hidung tersumbat, dan bersin-bersin. OBH bekerja sebagai ekspektoran atau peluruh dahak, Paracetamol digunakan sebagai pereda demam dan sakit kepala, Chlorpheniramine maleate bekerja sebagai antihistamin atau anti alergi untuk meredakan gejala alergi, dan Ephedrine HCl sebagai dekongestan hidung atau melonggarkan saluran pernafasan. ', 21800, 'OBHCombi.png'),
(8, 'Mixagrip Flu 4 Kaplet ', 20, 'MIXAGRIP FLU adalah obat yang digunakan untuk meringankan gejala-gejala flu seperti demam, sakit kepala, hidung tersumbat dan bersin-bersin. Mixagrip flu mengandung Paracetamol, Phenylephrine HCl dan Chlorphenamine Maleate yang bekerja sebagai analgetik-antipiretik, antihistamin dan dekongestan hidung. ', 2900, 'Mixagrip.png'),
(9, 'Decolgen 4 Tablet ', 13, 'DECOLGEN merupakan obat flu dengan kandungan Paracetamol, Phenylpropanolamine HCl, dan Chlorpheniramine maleate. Paracetamol digunakan sebagai pereda demam dan sakit kepala. Phenylpropanolamine digunakan untuk mengobati gejala hidung tersumbat. Chlorpheniramine maleate bekerja sebagai antihistamin atau anti alergi sehingga obat ini digunakan untuk meredakan gejala flu seperti sakit kepala, demam, bersin-bersin dan hidung tersumbat. ', 2300, 'Decolgen.png'),
(10, 'Konidin 4 Tablet ', 20, 'KONIDIN TABLET adalah obat yang digunakan untuk meredakan batuk yang terkait influenza, masuk angin, bronkitis, radang saluran pernapasan, alergi dan asma. ', 2800, 'Konidin.png'),
(11, 'CDR Effervescent 10 Tablet ', 10, 'CDR EFFERVESCENT merupakan suplemen dalam bentuk tabet effervescent yang mengandung Calcium, Kalsium karbonat, Vitamin C, Vitamin D, dan Vitamin B6 15 yang digunakan sebagai Suplementasi Kalsium, Vitamin C, D, dan B6 untuk membantu menjaga kesehatan tulang pada orang dewasa serta membantu memenuhi kebutuhan kalsium pada ibu hamil dan menyusui. Juga diperlukan untuk membantu masa pertumbuhan, masa penyembuhan dan gangguan penyerapan makanan. ', 63400, 'CDR.png'),
(12, 'Enervon-C 4 Tablet ', 30, 'ENERVON C merupakan suplemen makanan dengan kandungan multivitamin seperti Vitamin C, Vitamin B1, Vitamin B2, Vitamin B6, Vitamin B12, Vitamin D, Niacinamide, Kalsium pantotenat dalam bentuk tablet salut. Suplemen vitamin ini berguna untuk membantu menjaga daya tahan tubuh. ', 8100, 'Enervon.png'),
(13, 'Vitacimin 500 mg Rasa Lemon 5 Strip (2 Tablet/Strip) ', 10, 'VITACIMIN merupakan suplemen kesehatan dengan kandungan Ascorbic acid atau Vitamin C dalam bentuk tablet hisap. Suplemen ini digunakan untuk membantu memenuhi kebutuhan vitamin c harian, serta membantu menjaga daya tahan tubuh. ', 11500, 'Vitacimin.png'),
(14, 'Sanmol 500 mg 4 Tablet ', 30, 'SANMOL merupakan obat dengan kandungan Paracetamol 500 mg. Obat ini digunakan untuk meringankan rasa sakit pada keadaan sakit kepala, sakit gigi dan menurunkan demam. Sanmol bekerja pada pusat pengatur suhu di hipotalamus untuk menurunkan suhu tubuh (antipiretik) serta menghambat sintesis prostaglandin sehingga dapat mengurangi nyeri ringan sampai sedang (analgesik). ', 2400, 'Sanmol.png'),
(15, 'Paracetamol 500 mg 10 kaplet ', 10, 'PARACETAMOL TABLET merupakan obat yang dapat digunakan untuk meringankan rasa sakit pada sakit kepala, sakit gigi, dan menurunkan demam. Paracetamol bekerja pada pusat pengatur suhu di hipotalamus untuk menurunkan suhu tubuh (antipiretik) serta menghambat sintesis prostaglandin sehingga dapat mengurangi nyeri ringan sampai sedang (analgesik). ', 5200, 'Paracetamol.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` varchar(25) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `username`, `password`, `nama`, `tgl_lahir`, `jenkel`, `no_hp`, `alamat`) VALUES
(1, 'jeniferlopez', 'jenifer123', 'Jenifer Lopez', '2000-11-03', 'Wanita', '0811212121', 'Jl. Asih No.22'),
(2, 'Johannes', 'lesti99', 'Johannes Alexander Putra', '2002-08-06', 'laki-laki', '081934172542', 'Taman Holis '),
(3, 'lestikejora', 'lesti99', 'Lesti Kejora', '1999-10-11', 'Wanita', '0872323232', 'Jl. Bahagia No.91'),
(4, 'dwinap', 'dwi99', 'Dwi Putri', '2001-10-11', 'Wanita', '08723219992', 'Jl. Anggur No.91'),
(5, 'nadiaah', 'nanad', 'Nadira Arevia ', '2002-10-27', 'Wanita', '082246464', 'Jl Pakusarakan No2'),
(6, 'hanumisme', 'hanum00', 'Hanum Salsabila ', '2002-06-14', 'Wanita', '086164934', 'Jl.Cempaka No.818'),
(7, 'nurmiiaaww', '04agustus', 'Nurmiyati Annisa Wolio', '2002-08-04', 'Wanita', '081289156879', 'Bulan'),
(9, 'ratnasari', 'ratna88', 'Ratna Sari', '1998-05-09', 'Wanita', '0864648343', 'Jalan Raya ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `id_pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengiriman`
--

INSERT INTO `tb_pengiriman` (`id_pengiriman`, `total`, `detail`, `status`, `id_pasien`) VALUES
(2, '12000', 'Panadol(1)', 1, 2),
(3, '2500', ' Paramex(1),', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id` (`id_dokter`);

--
-- Indexes for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `id_dokter` (`id_jadwal`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `tb_konsultasiselesai`
--
ALTER TABLE `tb_konsultasiselesai`
  ADD PRIMARY KEY (`id_selesai`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_konsultasiselesai`
--
ALTER TABLE `tb_konsultasiselesai`
  MODIFY `id_selesai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`);

--
-- Constraints for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  ADD CONSTRAINT `tb_konsultasi_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal` (`id_jadwal`),
  ADD CONSTRAINT `tb_konsultasi_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`);

--
-- Constraints for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD CONSTRAINT `tb_pengiriman_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
