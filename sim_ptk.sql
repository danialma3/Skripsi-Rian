/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.8-MariaDB : Database - sim_ptk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sim_ptk` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `sim_ptk`;

/*Table structure for table `kabkot` */

DROP TABLE IF EXISTS `kabkot`;

CREATE TABLE `kabkot` (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `asal_kabkot` varchar(200) NOT NULL,
  `dana_awal_trans` varchar(7) NOT NULL,
  PRIMARY KEY (`id_trans`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kabkot` */

insert  into `kabkot`(`id_trans`,`asal_kabkot`,`dana_awal_trans`) values 
(1,'Banjarmasin','0'),
(2,'Banjarbaru','75000'),
(3,'Banjar','75000'),
(4,'Tapin','120000'),
(5,'Batola','10000'),
(6,'Hulu Sungai Selatan','150000'),
(7,'Hulu Sungai Tengah','180000'),
(8,'Hulu Sungai Utara','210000'),
(9,'Balangan','210000'),
(10,'Tabalong','240000'),
(11,'Tanah Laut','150000'),
(12,'Tanah Bumbu','360000'),
(13,'Kotabaru','480000');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL,
  `peminatan` varchar(100) DEFAULT NULL,
  `jenis_kelas` int(1) DEFAULT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kelas` */

/*Table structure for table `mapel` */

DROP TABLE IF EXISTS `mapel`;

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(300) DEFAULT NULL,
  `jenis_mapel` varchar(100) DEFAULT NULL,
  `kurikulum_mapel` varchar(100) DEFAULT NULL,
  `jam` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `mapel` */

/*Table structure for table `pangkat` */

DROP TABLE IF EXISTS `pangkat`;

CREATE TABLE `pangkat` (
  `id_pangkat` int(11) NOT NULL AUTO_INCREMENT,
  `pangkat` varchar(255) NOT NULL,
  `pajak` int(3) NOT NULL,
  `dana_awal_saku` varchar(7) NOT NULL,
  PRIMARY KEY (`id_pangkat`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pangkat` */

insert  into `pangkat`(`id_pangkat`,`pangkat`,`pajak`,`dana_awal_saku`) values 
(1,'I-A Juru Muda',0,'400000'),
(2,'I-B Juru Muda Tingkat 1',0,'400000'),
(3,'I-C Juru',0,'400000'),
(4,'I-D Juru Tingkat 1',0,'400000'),
(5,'II-A Pengatur Muda',0,'400000'),
(6,'II-B Pengatur Muda Tingkat 1',0,'400000'),
(7,'II-C Pengatur',0,'400000'),
(8,'II-D Pengatur Tingkat 1',0,'400000'),
(9,'III-A Penata Muda',5,'400000'),
(10,'III-B Penata Muda Tingkat 1',5,'400000'),
(11,'III-C Penata',5,'400000'),
(12,'III-D Penata Tingkat 1',5,'400000'),
(13,'IV-A Pembina',15,'400000'),
(14,'IV-B Pembina Tingkat 1',15,'400000'),
(15,'IV-C Pembina Utama Muda',15,'400000'),
(16,'IV-D Pembina Utama Madya',15,'400000'),
(17,'IV-E Pembina Utama',15,'400000'),
(19,'Guru Tidak Tetap/ Pegawai Tidak Tetap',0,'400000');

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id_pengguna`,`username`,`password`,`level`) values 
(3,'admin','$2y$10$sK5mpJYdAMZ0DmDAnMQvcu5rQ/4kPoITn8LmVvkTKf.8E2pTqSqSG','admin'),
(5,'admin1','$2y$10$N8NCKNQvctDmpRyxgZ2s9.KaQ6sjFslKeAsdp2fXin87Ed71Z4YRy','admin'),
(6,'sman 2 martapura','$2y$10$sK5mpJYdAMZ0DmDAnMQvcu5rQ/4kPoITn8LmVvkTKf.8E2pTqSqSG','satuan-pendidikan'),
(13,'sman 1 gambut','$2y$10$ScBbZa.J/Li8r1TWE4SiqeBIPhowV4.8CF9N3eRWZ81cFKy/kyoOa','satuan-pendidikan'),
(14,'sman 1 amuntai','$2y$10$5JsDF7mwTX1OFvt4fRgLduOAyntJ7eh.rZt8WUN/5Pcb7fB5posD6','satuan-pendidikan');

/*Table structure for table `ptk` */

DROP TABLE IF EXISTS `ptk`;

CREATE TABLE `ptk` (
  `id_ptk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ptk` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nuptk` varchar(15) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pangkat_gol` varchar(255) NOT NULL,
  `jabatan` varchar(225) NOT NULL,
  `tmt_pengangkatan` date NOT NULL,
  `alamat_ptk` varchar(255) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `jenis_ptk` varchar(255) NOT NULL,
  `pendidikan_ptk` varchar(255) NOT NULL,
  `bidang_studi_pendidikan` varchar(255) NOT NULL,
  `bidang_studi_sertifikasi` varchar(255) NOT NULL,
  `mata_pelajaran_yg_diajarkan` varchar(255) NOT NULL,
  `status_kepegawaian` varchar(255) NOT NULL,
  `jam_mengajar` int(255) NOT NULL,
  `jenis_sekolah` varchar(225) NOT NULL,
  PRIMARY KEY (`id_ptk`),
  KEY `id_sekolah` (`id_sekolah`),
  CONSTRAINT `ptk_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ptk` */

insert  into `ptk`(`id_ptk`,`nama_ptk`,`nik`,`nuptk`,`nip`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`pangkat_gol`,`jabatan`,`tmt_pengangkatan`,`alamat_ptk`,`id_sekolah`,`tlp`,`jenis_ptk`,`pendidikan_ptk`,`bidang_studi_pendidikan`,`bidang_studi_sertifikasi`,`mata_pelajaran_yg_diajarkan`,`status_kepegawaian`,`jam_mengajar`,`jenis_sekolah`) values 
(3,'Mairil Lailani','‌6303036606860004','‌995876466','‌198606262010012021','Perempuan','KARAMAT','1986-06-26','III/c','Guru Penata','2011-06-01','Jl. Astoria',2,'081125048998','Guru','S1','','Bahasa Inggris','Bahasa Inggris','PNS',24,'SMA');

/*Table structure for table `sekolah` */

DROP TABLE IF EXISTS `sekolah`;

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `asal_kecamatan` varchar(255) NOT NULL,
  `asal_kab_kot` varchar(255) NOT NULL,
  `tipe_sekolah` varchar(255) NOT NULL,
  `jumlah_siswa_X` int(255) NOT NULL,
  `jumlah_siswa_XI` int(255) NOT NULL,
  `jumlah_siswa_XII` int(255) NOT NULL,
  `jumlah_rombel_X` int(11) NOT NULL,
  `jumlah_rombel_XI` int(11) NOT NULL,
  `jumlah_rombel_XII` int(11) NOT NULL,
  PRIMARY KEY (`id_sekolah`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `sekolah_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `sekolah` */

insert  into `sekolah`(`id_sekolah`,`id_pengguna`,`nama_sekolah`,`alamat_sekolah`,`asal_kecamatan`,`asal_kab_kot`,`tipe_sekolah`,`jumlah_siswa_X`,`jumlah_siswa_XI`,`jumlah_siswa_XII`,`jumlah_rombel_X`,`jumlah_rombel_XI`,`jumlah_rombel_XII`) values 
(1,6,'SMAN 2 Martapura','Jl. Bincau','Bincau','Banjar','SMA',200,220,240,6,7,8),
(2,13,'SMAN 1 Gambut','Jl. A. yani','Gambut','Banjar','SMA',120,180,160,6,8,7),
(3,14,'','','','','',0,0,0,0,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
