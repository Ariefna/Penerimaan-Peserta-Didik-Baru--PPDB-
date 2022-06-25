-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: nas
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `jenis`
--

DROP TABLE IF EXISTS `jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis` (
  `id_jenis` varchar(50) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis`
--

LOCK TABLES `jenis` WRITE;
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
INSERT INTO `jenis` VALUES ('PD','Pindahan',1),('SB','Siswa Baru',1);
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontak`
--

DROP TABLE IF EXISTS `kontak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kontak` varchar(50) DEFAULT NULL,
  `no_kontak` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontak`
--

LOCK TABLES `kontak` WRITE;
/*!40000 ALTER TABLE `kontak` DISABLE KEYS */;
INSERT INTO `kontak` VALUES (1,'Nasrulloh','081210654096',1),(2,'Tugiman','081282656407',1);
/*!40000 ALTER TABLE `kontak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(100) NOT NULL,
  `jenjang` int(11) NOT NULL,
  `nsm` varchar(30) NOT NULL,
  `npsn` varchar(30) DEFAULT NULL,
  `status` text NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `klikchat` text DEFAULT NULL,
  `livechat` text DEFAULT NULL,
  `nolivechat` varchar(50) DEFAULT NULL,
  `infobayar` text DEFAULT NULL,
  `syarat` text DEFAULT NULL,
  `kab` text NOT NULL,
  `kec` text NOT NULL,
  `web` text NOT NULL,
  `kepala` text NOT NULL,
  `nip` text NOT NULL,
  `sidadik` text DEFAULT NULL,
  `kop` varchar(50) NOT NULL,
  `logo_sidadik` varchar(100) NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `status_pendaftaran` int(1) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'MTSN 1 WONOGIRI',2,'121133120001','20363812','Negeri','Jl. Tandon ','Bulungan','Jawa Tengah','assets/img/logo635.jpg',NULL,'mtsn1wonogiri@gmail.com','081228603030','assalamualikum wr wb','assalamualikum wr wb 2','081228603030','<p>Untuk Info Pembayaran Bisa di Tulis disini melalui Fitur Setting PPDB</p>','<p><br></p><ol><li>Surat Keterangan Lulus</li><li>Akta Kelahiran</li><li>Kartu Keluarga</li></ol>','Wonogiri','Wonogiri','mtsn1wonogiri.sch.id','Drs. H. Marimo, M. Pd','-','1','assets/img/kop/kop.png','assets/img/logo/logo_ppdb505.png','2021-05-21','2021-05-20',0);
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(50) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(50) DEFAULT NULL,
  `warga_siswa` varchar(50) DEFAULT NULL,
  `nama_sekolah` varchar(100) NULL,
  `kota_sekolah` varchar(100) NULL,
  `nik` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `saudara` int(11) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `cita` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hobi` varchar(50) DEFAULT NULL,
  `status_tinggal_siswa` varchar(50) DEFAULT NULL,
  `prov` text DEFAULT NULL,
  `kab` varchar(50) DEFAULT NULL,
  `kec` varchar(50) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `alamat_siswa` varchar(50) DEFAULT NULL,
  `kordinat` varchar(50) DEFAULT NULL,
  `kodepos_siswa` varchar(6) DEFAULT NULL,
  `transportasi` varchar(50) DEFAULT NULL,
  `jarak` varchar(50) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `biaya_sekolah` varchar(50) DEFAULT NULL,
  `keb_khusus` varchar(50) DEFAULT NULL,
  `keb_disabilitas` varchar(50) DEFAULT NULL,
  `tk` varchar(1) DEFAULT NULL,
  `paud` varchar(1) DEFAULT NULL,
  `hepatitis` varchar(1) DEFAULT NULL,
  `polio` varchar(1) DEFAULT NULL,
  `bcg` varchar(1) DEFAULT NULL,
  `campak` varchar(1) DEFAULT NULL,
  `dpt` varchar(1) DEFAULT NULL,
  `covid` varchar(1) DEFAULT NULL,
  `no_kip` varchar(50) DEFAULT NULL,
  `no_kks` varchar(50) DEFAULT NULL,
  `no_pkh` varchar(50) DEFAULT NULL,
  `no_kk` varchar(16) DEFAULT NULL,
  `kepala_keluarga` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `status_ayah` varchar(50) DEFAULT NULL,
  `warga_ayah` varchar(50) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(50) DEFAULT NULL,
  `tgl_lahir_ayah` date DEFAULT NULL,
  `pendidikan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `penghasilan_ayah` varchar(50) DEFAULT NULL,
  `no_hp_ayah` varchar(50) DEFAULT NULL,
  `domisili_ayah` varchar(50) DEFAULT NULL,
  `status_tmp_tinggal_ayah` varchar(50) DEFAULT NULL,
  `prov_ayah` text DEFAULT NULL,
  `kab_ayah` varchar(50) DEFAULT NULL,
  `kec_ayah` varchar(50) DEFAULT NULL,
  `desa_ayah` varchar(50) DEFAULT NULL,
  `alamat_ayah` varchar(50) DEFAULT NULL,
  `kodepos_ayah` varchar(6) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `status_ibu` varchar(50) DEFAULT NULL,
  `warga_ibu` varchar(50) DEFAULT NULL,
  `nik_ibu` varchar(50) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(50) DEFAULT NULL,
  `tgl_lahir_ibu` date DEFAULT NULL,
  `pendidikan_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ibu` varchar(50) DEFAULT NULL,
  `no_hp_ibu` varchar(50) DEFAULT NULL,
  `status_tinggal_ibu` varchar(50) DEFAULT NULL,
  `domisili_ibu` varchar(128) DEFAULT NULL,
  `status_tmp_tinggal_ibu` varchar(50) DEFAULT NULL,
  `prov_ibu` text DEFAULT NULL,
  `kab_ibu` varchar(50) DEFAULT NULL,
  `kec_ibu` varchar(50) DEFAULT NULL,
  `desa_ibu` varchar(50) DEFAULT NULL,
  `alamat_ibu` varchar(50) DEFAULT NULL,
  `kodepos_ibu` varchar(6) DEFAULT NULL,
  `status_wali` varchar(50) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `warga_wali` varchar(50) DEFAULT NULL,
  `nik_wali` varchar(16) DEFAULT NULL,
  `tempat_lahir_wali` varchar(50) DEFAULT NULL,
  `tgl_lahir_wali` date DEFAULT NULL,
  `pendidikan_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL,
  `penghasilan_wali` varchar(50) DEFAULT NULL,
  `no_hp_wali` varchar(16) DEFAULT NULL,
  `domisili_wali` varchar(50) DEFAULT NULL,
  `prov_wali` text DEFAULT NULL,
  `kab_wali` varchar(50) DEFAULT NULL,
  `kec_wali` varchar(50) DEFAULT NULL,
  `desa_wali` varchar(50) DEFAULT NULL,
  `alamat_wali` varchar(50) DEFAULT NULL,
  `kodepos_wali` varchar(50) DEFAULT NULL,
  `foto` varchar(128) NOT NULL,
  `file_kip` varchar(50) DEFAULT NULL,
  `file_kk` varchar(50) DEFAULT NULL,
  `file_pembayaran` varchar(50) DEFAULT NULL,
  `status_pay` int(1) DEFAULT 0,
  `file_ijazah` varchar(50) DEFAULT NULL,
  `file_akte` varchar(50) DEFAULT NULL,
  `file_shun` varchar(50) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `alasan_keluar` varchar(100) DEFAULT NULL,
  `surat_keluar` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `aktif` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 0,
  `tgl_siswa` date DEFAULT NULL,
  `online` int(1) DEFAULT 0,
  `password` text DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES (1,'55555','55555','1234567891234567','WNI','','','1234567891234567','Surabaya','2022-06-21','L',4,5,'Islam','Dokter','088808002145','gayus733@gmail.com','Kesenian','Tinggal di asrama pesantren','jawa timur','surabaya','surabaya','surabaya','jl. jdnjnd','jdnjndjv','123456','Sepeda motor','Kurang dari 5 km','1-10 menit','Wali/orangtua asuh','Gangguan komunikasi','Tuna Rungu','Y','Y','Y','','','','','','1234567891234567','1234567891234567','1234567891234567','1234567891234567','ajrf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'default.png','kip72.jpeg','kk811.jpg',NULL,0,'ijazah505.png','akta505.png',NULL,NULL,NULL,NULL,NULL,0,2,NULL,0,'55555'),(2,'Aroef','5555515555',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'default.png',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,NULL,0,'5555515555');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(128) NOT NULL,
  `level` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (6,'Ujang Admin','kepala','ujang','$2y$10$4NXRGP7oqVPSHRKQj1mkgerznnXK1.jGP6ULQES3qadtmcQXNUdWy',1),(19,'Arief','admin','Arief','$2y$10$TqpecKkfRMakSeIaFzaNg.iddMwskGWFHGzAk.QlJdAn7rRbp7t2u',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-25 12:11:12
