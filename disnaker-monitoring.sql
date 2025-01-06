/*
SQLyog Community v13.3.0 (64 bit)
MySQL - 8.0.30 : Database - disnaker-monitoring
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`disnaker-monitoring` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `disnaker-monitoring`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nip` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `admin` */

insert  into `admin`(`id`,`id_user`,`nama`,`nip`,`telp`,`alamat`) values 
(2,1,'admin','785468','545','Jl Majapahit No.56');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`nama_kategori`) values 
(1,'Lowongan'),
(2,'Pelatihan'),
(3,'Bisnis'),
(4,'UMKM'),
(5,'Pabrik'),
(6,'Buruh'),
(7,'PHK'),
(9,'Mediasi');

/*Table structure for table `kompetitor` */

DROP TABLE IF EXISTS `kompetitor`;

CREATE TABLE `kompetitor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kompetitor` */

insert  into `kompetitor`(`id`,`id_user`,`nama`,`telp`,`alamat`) values 
(5,5,'hayu','081327782336','jl. majapahit'),
(6,3,'ale','081327782336','jl. majapahit');

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kategori` int DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_general_ci,
  `status` enum('disetujui','belum disetujui','tolak') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `gambar` text COLLATE utf8mb4_general_ci,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `view` double DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `media` */

insert  into `media`(`id`,`id_kategori`,`nama`,`judul`,`url`,`status`,`tanggal`,`gambar`,`deskripsi`,`view`) values 
(22,2,'ale','xdcgfhbjnk','https://www.suaramerdeka.com/semarang-raya/0414142242/loker-untuk-lulusan-atau-ahli-bidang-kuliner-dan-perhotelan-penempatan-semarang-cek-cara-melamarnya','belum disetujui','2024-12-25 16:14:04','2023-12-05_(1).png','kuuhdff',1),
(23,1,'ale','Perbaikan di Controller','https://www.suaramerdeka.com/semarang-raya/0414142242/loker-untuk-lulusan-atau-ahli-bidang-kuliner-dan-perhotelan-penempatan-semarang-cek-cara-melamarnya','disetujui','2024-12-25 16:14:07','2023-12-12_(3)1.png','hdsuaf',1),
(24,4,'mita','xdcgfhbjnk','https://www.suaramerdeka.com/semarang-raya/0414142242/loker-untuk-lulusan-atau-ahli-bidang-kuliner-dan-perhotelan-penempatan-semarang-cek-cara-melamarnya','disetujui','2024-12-25 16:14:09','2023-12-12_(4).png','kllll',1),
(25,1,'ale','Perbaikan di Controller','https://www.suaramerdeka.com/semarang-raya/0414142242/loker-untuk-lulusan-atau-ahli-bidang-kuliner-dan-perhotelan-penempatan-semarang-cek-cara-melamarnya','disetujui','2024-12-25 13:20:10','2023-12-12_(1).png','yrteutyu',1);

/*Table structure for table `pemimpin` */

DROP TABLE IF EXISTS `pemimpin`;

CREATE TABLE `pemimpin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pemimpin` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`email`,`password`) values 
(1,'admin@gmail.com','$2y$10$1AOWRq.Rz6Uae9L3ojTbQunSn2daec0viCPi6vb08KFWz02Vqpq/m'),
(3,'ale1@gmail.com','$2y$10$1AOWRq.Rz6Uae9L3ojTbQunSn2daec0viCPi6vb08KFWz02Vqpq/m');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
