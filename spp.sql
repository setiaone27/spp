/*
SQLyog Enterprise v12.5.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - spp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`spp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `spp`;

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(10) NOT NULL,
  `id_kk` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `id_kk` (`id_kk`),
  CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `kompetensi_keahlian` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`id_kelas`,`nama_kelas`,`id_kk`) values 
(15,'X RPL',5),
(17,'X OTKP',6),
(18,'X TBSM',7),
(20,'X TKRO',8);

/*Table structure for table `kompetensi_keahlian` */

DROP TABLE IF EXISTS `kompetensi_keahlian`;

CREATE TABLE `kompetensi_keahlian` (
  `id_kk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kk` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kk`),
  KEY `id_kk` (`id_kk`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `kompetensi_keahlian` */

insert  into `kompetensi_keahlian`(`id_kk`,`nama_kk`) values 
(5,'Rekayasa Perangkat Lunak'),
(6,'Otomatisasi Tata Kelola Perkantoran'),
(7,'Teknik Bisnis Sepeda Motor'),
(8,'Teknik Kendaraan Ringan Otomotif');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_petugas` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `bulan_dibayar` varchar(50) NOT NULL,
  `tahun_dibayar` varchar(25) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_petugas` (`id_petugas`,`id_spp`),
  KEY `nis` (`nis`),
  KEY `id_spp` (`id_spp`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id_pembayaran`,`id_petugas`,`nis`,`tgl`,`bulan_dibayar`,`tahun_dibayar`,`id_spp`,`jumlah_bayar`) values 
(1,1,'14190054','2020-01-10','Januari','2019',4,350000),
(2,2,'14190054','2020-02-10','Februari','2020',4,300000),
(4,1,'14190054','2020-03-20','Maret','2020',4,350000),
(5,2,'14190053','2020-03-19','Maret','2019',4,350000);

/*Table structure for table `petugas` */

DROP TABLE IF EXISTS `petugas`;

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `level` enum('admin','petugas','','') NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `petugas` */

insert  into `petugas`(`id_petugas`,`username`,`password`,`nama_petugas`,`level`) values 
(1,'admin','21232f297a57a5a743894a0e4a801fc3','Ahmad Saputra','admin'),
(2,'petugas','afb91ef692fd08c445e8cb1bab2ccf9c','Fajar Bow','petugas');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` char(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `id_kelas` int(1) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `level` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`nis`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_spp` (`id_spp`),
  KEY `id_siswa` (`id_siswa`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `siswa` */

insert  into `siswa`(`id_siswa`,`nis`,`nama`,`password`,`id_kelas`,`alamat`,`no_tlp`,`id_spp`,`level`) values 
(1,'14190053','Evan','5cc20fa78220a0d87f9cb04b345b2939',18,'Bogor','089594007362',4,'siswa'),
(2,'14190054','Iwan Setiawan','4f9a6169b654d0484039d0d023cf9f8a',18,'Cagar Alam','089509400841',4,'siswa'),
(3,'14190055','Dimas Bayu','bb2ee9d158a0aadbe0df43918dc840c8',15,'Ratu Jaya','089509400865',4,'siswa');

/*Table structure for table `spp` */

DROP TABLE IF EXISTS `spp`;

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  PRIMARY KEY (`id_spp`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `spp` */

insert  into `spp`(`id_spp`,`tahun`,`nominal`) values 
(4,'2019/2020',350000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
