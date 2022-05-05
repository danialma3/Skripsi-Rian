-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 01:16 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_banding`
--

CREATE TABLE `tb_banding` (
  `id_banding` int(3) NOT NULL,
  `no_perkara` varchar(30) NOT NULL,
  `id_penggugat` int(3) NOT NULL,
  `nama_terbanding` varchar(30) NOT NULL,
  `alamat_terbanding` varchar(30) NOT NULL,
  `pekerjaan_terbanding` varchar(30) NOT NULL,
  `id_hakim` int(3) NOT NULL,
  `id_panitera` int(3) NOT NULL,
  `tgl_banding` date NOT NULL,
  `tgl_putusan` date NOT NULL,
  `no_putusan` varchar(40) NOT NULL,
  `hasil_banding` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_banding`
--

INSERT INTO `tb_banding` (`id_banding`, `no_perkara`, `id_penggugat`, `nama_terbanding`, `alamat_terbanding`, `pekerjaan_terbanding`, `id_hakim`, `id_panitera`, `tgl_banding`, `tgl_putusan`, `no_putusan`, `hasil_banding`) VALUES
(2, '7', 2, '7', '7', '7', 3, 2, '0007-07-07', '0006-06-06', '66', '6'),
(3, '66', 2, '6', '6', '6', 3, 2, '0006-06-06', '0006-06-06', '66', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_eksekusi`
--

CREATE TABLE `tb_eksekusi` (
  `id_eksekusi` int(3) NOT NULL,
  `no_perkara` varchar(30) NOT NULL,
  `id_penggugat` int(3) NOT NULL,
  `nama_tergugat` varchar(30) NOT NULL,
  `alamat_tergugat` varchar(30) NOT NULL,
  `pekerjaan_tergugat` varchar(30) NOT NULL,
  `id_hakim` int(3) NOT NULL,
  `id_panitera` int(3) NOT NULL,
  `tgl_putusan` date NOT NULL,
  `tgl_eksekusi` date NOT NULL,
  `no_putusan` varchar(40) NOT NULL,
  `hasil_eksekusi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_eksekusi`
--

INSERT INTO `tb_eksekusi` (`id_eksekusi`, `no_perkara`, `id_penggugat`, `nama_tergugat`, `alamat_tergugat`, `pekerjaan_tergugat`, `id_hakim`, `id_panitera`, `tgl_putusan`, `tgl_eksekusi`, `no_putusan`, `hasil_eksekusi`) VALUES
(1, '88786', 2, '6', '6', '6', 3, 2, '0008-08-08', '0006-06-06', '88', '8'),
(2, '777', 2, '77', '7', '7', 3, 2, '0000-00-00', '0007-07-07', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gugatan`
--

CREATE TABLE `tb_gugatan` (
  `id_gugatan` int(3) NOT NULL,
  `no_perkara` varchar(30) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `id_penggugat` int(3) NOT NULL,
  `id_hakim` int(3) NOT NULL,
  `id_panitera` int(3) NOT NULL,
  `tgl_sidang` date NOT NULL,
  `tgl_putusan` date NOT NULL,
  `hasil` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gugatan`
--

INSERT INTO `tb_gugatan` (`id_gugatan`, `no_perkara`, `kategori`, `id_penggugat`, `id_hakim`, `id_panitera`, `tgl_sidang`, `tgl_putusan`, `hasil`) VALUES
(1, '676', '6', 2, 3, 2, '0006-06-06', '0006-06-06', '6                  '),
(2, '666', '66', 2, 3, 2, '0006-06-06', '0006-06-06', '6                  ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hakim`
--

CREATE TABLE `tb_hakim` (
  `id_hakim` int(3) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_hakim` varchar(30) NOT NULL,
  `jabatan_hakim` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hakim`
--

INSERT INTO `tb_hakim` (`id_hakim`, `nip`, `nama_hakim`, `jabatan_hakim`) VALUES
(3, 111111, 'Ibrahim Muhammad', 'Hakim 1'),
(4, 222222, 'Hidayatullah Ahmad Khairullah', 'Hakim 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasasi`
--

CREATE TABLE `tb_kasasi` (
  `id_kasasi` int(3) NOT NULL,
  `no_perkara` varchar(30) NOT NULL,
  `id_penggugat` int(3) NOT NULL,
  `nama_tergugat` varchar(30) NOT NULL,
  `alamat_tergugat` varchar(30) NOT NULL,
  `pekerjaan_tergugat` varchar(30) NOT NULL,
  `id_hakim` int(3) NOT NULL,
  `id_panitera` int(3) NOT NULL,
  `tgl_kasasi` date NOT NULL,
  `tgl_putusan` date NOT NULL,
  `no_putusan` varchar(40) NOT NULL,
  `hasil_kasasi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kasasi`
--

INSERT INTO `tb_kasasi` (`id_kasasi`, `no_perkara`, `id_penggugat`, `nama_tergugat`, `alamat_tergugat`, `pekerjaan_tergugat`, `id_hakim`, `id_panitera`, `tgl_kasasi`, `tgl_putusan`, `no_putusan`, `hasil_kasasi`) VALUES
(7, '777/KL/2020', 2, 'Romlah', 'Jl. sulawesi', 'Mesin', 4, 2, '2019-11-30', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_panitera`
--

CREATE TABLE `tb_panitera` (
  `id_panitera` int(4) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_panitera` varchar(30) NOT NULL,
  `jabatan_panitera` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_panitera`
--

INSERT INTO `tb_panitera` (`id_panitera`, `nip`, `nama_panitera`, `jabatan_panitera`) VALUES
(2, 75677, 'Panitera', 'Jujur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penggugat`
--

CREATE TABLE `tb_penggugat` (
  `id_penggugat` int(3) NOT NULL,
  `nama_penggugat` varchar(30) NOT NULL,
  `tmp_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelamin` varchar(11) NOT NULL,
  `tmp_tinggal` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `warganegara` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `pengacara` varchar(40) NOT NULL,
  `id_sidang` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penggugat`
--

INSERT INTO `tb_penggugat` (`id_penggugat`, `nama_penggugat`, `tmp_lahir`, `tgl_lahir`, `kelamin`, `tmp_tinggal`, `agama`, `pendidikan`, `warganegara`, `tgl`, `pengacara`, `id_sidang`) VALUES
(2, 'Nurul Hayah', 'Banjarmasin', '1993-11-30', 'Perempuan', 'Banjarbaru No 44', 'Kristen', 'S1', 'Indonesia', '0000-00-00', 'Sumarni', 1),
(7, '7', '7', '0007-07-07', 'Laki - Laki', '7', 'Islam', '7', 'WNI', '2022-02-01', '7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `nip` int(11) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `jabatan` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`nip`, `nama_pengguna`, `jabatan`, `username`, `password`) VALUES
(1, 'Nurul Hayah', 'penggugat', 'aya', 'aya'),
(2, 'Nurul Hayah', 'administrator', 'admin', 'admin'),
(23, 'Nurul Hayah', 'pimpinan', 'pimpinan', 'pimpinan'),
(44, 'Nurul Hayah', 'hakim', 'hakim', 'hakim');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peninjauan`
--

CREATE TABLE `tb_peninjauan` (
  `id_tinjau` int(3) NOT NULL,
  `no_perkara` varchar(30) NOT NULL,
  `id_penggugat` int(3) NOT NULL,
  `nama_tergugat` varchar(30) NOT NULL,
  `alamat_tergugat` varchar(30) NOT NULL,
  `pekerjaan_tergugat` varchar(30) NOT NULL,
  `id_hakim` int(3) NOT NULL,
  `id_panitera` int(3) NOT NULL,
  `id_banding` int(4) NOT NULL,
  `id_kasasi` int(4) NOT NULL,
  `tgl_putusan` date NOT NULL,
  `no_putusan` varchar(40) NOT NULL,
  `hasil_tinjauan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peninjauan`
--

INSERT INTO `tb_peninjauan` (`id_tinjau`, `no_perkara`, `id_penggugat`, `nama_tergugat`, `alamat_tergugat`, `pekerjaan_tergugat`, `id_hakim`, `id_panitera`, `id_banding`, `id_kasasi`, `tgl_putusan`, `no_putusan`, `hasil_tinjauan`) VALUES
(5, '666', 2, '6', '6', '6', 3, 2, 2, 7, '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permohonan`
--

CREATE TABLE `tb_permohonan` (
  `id_permohonan` int(3) NOT NULL,
  `no_pemohon` varchar(30) NOT NULL,
  `jenis_permohonan` varchar(30) NOT NULL,
  `nama_pemohon` varchar(30) NOT NULL,
  `tempat_pemohon` varchar(50) NOT NULL,
  `nama_termohon` varchar(20) NOT NULL,
  `nama_baru` varchar(20) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nama_majelis` varchar(20) NOT NULL,
  `id_panitera` int(3) NOT NULL,
  `tgl_sidang` date NOT NULL,
  `tgl_putusan` date NOT NULL,
  `akta` varchar(40) NOT NULL,
  `biaya` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_permohonan`
--

INSERT INTO `tb_permohonan` (`id_permohonan`, `no_pemohon`, `jenis_permohonan`, `nama_pemohon`, `tempat_pemohon`, `nama_termohon`, `nama_baru`, `tgl_daftar`, `nama_majelis`, `id_panitera`, `tgl_sidang`, `tgl_putusan`, `akta`, `biaya`) VALUES
(4, '77', 'Hak Asuh Anak', '7', '7', '77', '7', '0007-07-07', '7', 2, '0007-07-07', '0007-07-07', '7', '7'),
(6, '88', 'Hak Asuh Anak', '888', '8', '88', '', '0008-08-08', '88', 2, '0008-08-08', '0008-08-08', '8', '8'),
(7, '666', 'Pergantian Nama', '6', '6', '66', '6', '0006-06-06', '66', 2, '0006-06-06', '0006-06-06', '6', '6'),
(8, '88', 'Hak Asuh Anak', '8', '8', '8', '', '0008-08-08', '8', 2, '0008-08-08', '0008-08-08', '8', '8');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sidang`
--

CREATE TABLE `tb_sidang` (
  `id_sidang` int(3) NOT NULL,
  `ket_sidang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sidang`
--

INSERT INTO `tb_sidang` (`id_sidang`, `ket_sidang`) VALUES
(1, 'Gugatan'),
(2, 'Eksekusi'),
(3, 'Kasasi'),
(4, 'Banding'),
(5, 'Peninjauan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_banding`
--
ALTER TABLE `tb_banding`
  ADD PRIMARY KEY (`id_banding`),
  ADD KEY `id_penggugat` (`id_penggugat`),
  ADD KEY `id_hakim` (`id_hakim`),
  ADD KEY `id_panitera` (`id_panitera`);

--
-- Indexes for table `tb_eksekusi`
--
ALTER TABLE `tb_eksekusi`
  ADD PRIMARY KEY (`id_eksekusi`),
  ADD KEY `id_penggugat` (`id_penggugat`),
  ADD KEY `id_hakim` (`id_hakim`),
  ADD KEY `id_panitera` (`id_panitera`);

--
-- Indexes for table `tb_gugatan`
--
ALTER TABLE `tb_gugatan`
  ADD PRIMARY KEY (`id_gugatan`),
  ADD KEY `id_hakim` (`id_hakim`),
  ADD KEY `id_panitera` (`id_panitera`),
  ADD KEY `id_penggugat` (`id_penggugat`);

--
-- Indexes for table `tb_hakim`
--
ALTER TABLE `tb_hakim`
  ADD PRIMARY KEY (`id_hakim`);

--
-- Indexes for table `tb_kasasi`
--
ALTER TABLE `tb_kasasi`
  ADD PRIMARY KEY (`id_kasasi`),
  ADD KEY `id_penggugat` (`id_penggugat`),
  ADD KEY `id_hakim` (`id_hakim`),
  ADD KEY `id_panitera` (`id_panitera`);

--
-- Indexes for table `tb_panitera`
--
ALTER TABLE `tb_panitera`
  ADD PRIMARY KEY (`id_panitera`);

--
-- Indexes for table `tb_penggugat`
--
ALTER TABLE `tb_penggugat`
  ADD PRIMARY KEY (`id_penggugat`),
  ADD KEY `id_sidang` (`id_sidang`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_peninjauan`
--
ALTER TABLE `tb_peninjauan`
  ADD PRIMARY KEY (`id_tinjau`),
  ADD KEY `id_penggugat` (`id_penggugat`),
  ADD KEY `id_hakim` (`id_hakim`),
  ADD KEY `id_panitera` (`id_panitera`),
  ADD KEY `id_banding` (`id_banding`),
  ADD KEY `id_kasasi` (`id_kasasi`);

--
-- Indexes for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD PRIMARY KEY (`id_permohonan`),
  ADD KEY `id_panitera` (`id_panitera`);

--
-- Indexes for table `tb_sidang`
--
ALTER TABLE `tb_sidang`
  ADD PRIMARY KEY (`id_sidang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_banding`
--
ALTER TABLE `tb_banding`
  MODIFY `id_banding` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_eksekusi`
--
ALTER TABLE `tb_eksekusi`
  MODIFY `id_eksekusi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_gugatan`
--
ALTER TABLE `tb_gugatan`
  MODIFY `id_gugatan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_hakim`
--
ALTER TABLE `tb_hakim`
  MODIFY `id_hakim` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kasasi`
--
ALTER TABLE `tb_kasasi`
  MODIFY `id_kasasi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_panitera`
--
ALTER TABLE `tb_panitera`
  MODIFY `id_panitera` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_penggugat`
--
ALTER TABLE `tb_penggugat`
  MODIFY `id_penggugat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_peninjauan`
--
ALTER TABLE `tb_peninjauan`
  MODIFY `id_tinjau` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  MODIFY `id_permohonan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_sidang`
--
ALTER TABLE `tb_sidang`
  MODIFY `id_sidang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_banding`
--
ALTER TABLE `tb_banding`
  ADD CONSTRAINT `tb_banding_ibfk_2` FOREIGN KEY (`id_hakim`) REFERENCES `tb_hakim` (`id_hakim`),
  ADD CONSTRAINT `tb_banding_ibfk_3` FOREIGN KEY (`id_panitera`) REFERENCES `tb_panitera` (`id_panitera`);

--
-- Constraints for table `tb_eksekusi`
--
ALTER TABLE `tb_eksekusi`
  ADD CONSTRAINT `tb_eksekusi_ibfk_2` FOREIGN KEY (`id_penggugat`) REFERENCES `tb_penggugat` (`id_penggugat`),
  ADD CONSTRAINT `tb_eksekusi_ibfk_3` FOREIGN KEY (`id_hakim`) REFERENCES `tb_hakim` (`id_hakim`),
  ADD CONSTRAINT `tb_eksekusi_ibfk_4` FOREIGN KEY (`id_panitera`) REFERENCES `tb_panitera` (`id_panitera`);

--
-- Constraints for table `tb_gugatan`
--
ALTER TABLE `tb_gugatan`
  ADD CONSTRAINT `tb_gugatan_ibfk_2` FOREIGN KEY (`id_penggugat`) REFERENCES `tb_penggugat` (`id_penggugat`),
  ADD CONSTRAINT `tb_gugatan_ibfk_3` FOREIGN KEY (`id_hakim`) REFERENCES `tb_hakim` (`id_hakim`),
  ADD CONSTRAINT `tb_gugatan_ibfk_4` FOREIGN KEY (`id_panitera`) REFERENCES `tb_panitera` (`id_panitera`);

--
-- Constraints for table `tb_kasasi`
--
ALTER TABLE `tb_kasasi`
  ADD CONSTRAINT `tb_kasasi_ibfk_2` FOREIGN KEY (`id_penggugat`) REFERENCES `tb_penggugat` (`id_penggugat`),
  ADD CONSTRAINT `tb_kasasi_ibfk_3` FOREIGN KEY (`id_hakim`) REFERENCES `tb_hakim` (`id_hakim`),
  ADD CONSTRAINT `tb_kasasi_ibfk_4` FOREIGN KEY (`id_panitera`) REFERENCES `tb_panitera` (`id_panitera`);

--
-- Constraints for table `tb_penggugat`
--
ALTER TABLE `tb_penggugat`
  ADD CONSTRAINT `tb_penggugat_ibfk_1` FOREIGN KEY (`id_sidang`) REFERENCES `tb_sidang` (`id_sidang`);

--
-- Constraints for table `tb_peninjauan`
--
ALTER TABLE `tb_peninjauan`
  ADD CONSTRAINT `tb_peninjauan_ibfk_2` FOREIGN KEY (`id_penggugat`) REFERENCES `tb_penggugat` (`id_penggugat`),
  ADD CONSTRAINT `tb_peninjauan_ibfk_3` FOREIGN KEY (`id_hakim`) REFERENCES `tb_hakim` (`id_hakim`),
  ADD CONSTRAINT `tb_peninjauan_ibfk_4` FOREIGN KEY (`id_panitera`) REFERENCES `tb_panitera` (`id_panitera`),
  ADD CONSTRAINT `tb_peninjauan_ibfk_5` FOREIGN KEY (`id_banding`) REFERENCES `tb_banding` (`id_banding`),
  ADD CONSTRAINT `tb_peninjauan_ibfk_6` FOREIGN KEY (`id_kasasi`) REFERENCES `tb_kasasi` (`id_kasasi`);

--
-- Constraints for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD CONSTRAINT `tb_permohonan_ibfk_1` FOREIGN KEY (`id_panitera`) REFERENCES `tb_panitera` (`id_panitera`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
