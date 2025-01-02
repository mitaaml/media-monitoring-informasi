/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.32-MariaDB-log : Database - disnaker
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`disnaker` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `disnaker`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `admin` */

insert  into `admin`(`id`,`id_user`,`nama`,`nip`,`telp`,`alamat`) values 
(2,1,'admin','785468','081327782336','Jl. Poncowolo'),
(3,1,'mita','123456','081327782336',NULL);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) DEFAULT NULL,
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

/*Table structure for table `kontributor` */

DROP TABLE IF EXISTS `kontributor`;

CREATE TABLE `kontributor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kontributor` */

insert  into `kontributor`(`id`,`id_user`,`nama`,`telp`,`alamat`) values 
(1,1,'ale','081327782336','jl. majapahit'),
(2,1,'ale','081327782336','jl. majapahit'),
(3,1,'mita','081327782336','jl. majapahit'),
(4,1,'ale','081327782336','jl. majapahit'),
(5,7,'hayu','081327782336','jl. majapahit'),
(6,8,'ale','081327782336','jl. majapahit');

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(10) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `status` enum('disetujui','belum disetujui','tolak') DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `view` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `media` */

insert  into `media`(`id`,`id_kategori`,`nama`,`judul`,`url`,`status`,`tanggal`,`gambar`,`deskripsi`,`view`) values 
(24,4,'mita','xdcgfhbjnk','https://www.suaramerdeka.com/semarang-raya/0414142242/loker-untuk-lulusan-atau-ahli-bidang-kuliner-dan-perhotelan-penempatan-semarang-cek-cara-melamarnya','tolak','2024-12-25 16:14:09','2023-12-12_(4).png','kllll',NULL),
(26,1,'suaramerdeka.com','Info Lowongan','https://www.suaramerdeka.com/semarang-raya/0414074026/info-loker-untuk-lulusan-sma-sederajat-dan-penempatan-semarang-cek-kualifikasinya','disetujui','2025-01-02 06:44:47','about-header1.jpg','fgyuhj',NULL),
(27,1,'merdeka.id','Lowongan Pekerjaan','https://www.suaramerdeka.com/semarang-raya/0414074026/info-loker-untuk-lulusan-sma-sederajat-dan-penempatan-semarang-cek-kualifikasinya','disetujui','2025-01-02 06:45:54','training.jpg','gbhnj',NULL);

/*Table structure for table `pemimpin` */

DROP TABLE IF EXISTS `pemimpin`;

CREATE TABLE `pemimpin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pemimpin` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`email`,`password`) values 
(1,'admin@gmail.com','$2y$10$1AOWRq.Rz6Uae9L3ojTbQunSn2daec0viCPi6vb08KFWz02Vqpq/m'),
(2,'mita@gmail.com','$2y$10$1AOWRq.Rz6Uae9L3ojTbQunSn2daec0viCPi6vb08KFWz02Vqpq/m'),
(3,'ale1@gmail.com','$2y$10$1AOWRq.Rz6Uae9L3ojTbQunSn2daec0viCPi6vb08KFWz02Vqpq/m');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
