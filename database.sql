-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: pmks1
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chart_by_jenis`
--

DROP TABLE IF EXISTS `chart_by_jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chart_by_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` int(11) NOT NULL,
  `bulan` int(2) DEFAULT NULL,
  `odgj` int(11) NOT NULL,
  `ot` int(11) NOT NULL,
  `pengemis` int(11) NOT NULL,
  `pengamen` int(11) NOT NULL,
  `gelandangan` int(2) NOT NULL DEFAULT '0',
  `psikiotik` int(2) NOT NULL DEFAULT '0',
  `psk` int(2) NOT NULL DEFAULT '0',
  `pedagang_asongan` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chart_by_jenis`
--

LOCK TABLES `chart_by_jenis` WRITE;
/*!40000 ALTER TABLE `chart_by_jenis` DISABLE KEYS */;
INSERT INTO `chart_by_jenis` VALUES (1,1,6,0,0,0,0,0,0,0,0),(2,2,6,0,0,0,0,0,0,0,0),(3,3,6,0,0,0,0,0,0,0,0),(4,4,6,0,0,0,0,0,0,0,0),(5,5,6,0,0,0,0,0,0,0,0),(6,6,6,0,0,0,0,0,0,0,0),(8,7,6,0,0,0,0,0,0,0,0),(9,8,6,0,0,0,0,0,0,0,0),(10,9,6,0,0,0,0,0,0,0,0),(11,10,6,0,0,0,0,0,0,0,0),(12,11,6,0,0,0,0,0,0,0,0),(13,12,6,2,1,0,0,1,0,0,0),(14,13,6,0,0,0,0,0,0,0,0),(15,14,6,0,0,0,0,0,0,0,0),(16,15,6,0,0,0,0,0,0,0,0),(17,16,6,0,0,0,0,0,0,0,0),(18,17,6,0,0,0,0,0,0,0,0),(19,18,6,0,0,0,0,0,0,0,0),(20,19,6,0,0,0,0,0,0,0,0),(21,20,6,0,0,0,0,0,0,0,0),(22,21,6,0,0,0,0,0,0,0,0),(23,22,6,0,0,0,0,0,0,0,0),(24,23,6,0,0,0,0,0,0,0,0),(25,24,6,0,0,0,0,0,0,0,0),(26,25,6,0,0,0,0,0,0,0,0),(27,26,6,0,0,0,0,0,0,0,0),(28,27,6,0,0,0,0,0,0,0,0),(29,28,6,0,0,0,0,0,0,0,0),(30,29,6,0,0,0,0,0,0,0,0),(31,30,6,0,0,0,0,0,0,0,0),(32,31,6,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `chart_by_jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chart_by_month`
--

DROP TABLE IF EXISTS `chart_by_month`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chart_by_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(15) NOT NULL,
  `bulan` int(2) DEFAULT NULL,
  `verifikasi` varchar(15) NOT NULL DEFAULT '0',
  `proses` varchar(15) NOT NULL DEFAULT '0',
  `follow_up` varchar(15) NOT NULL DEFAULT '0',
  `selesai` varchar(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chart_by_month`
--

LOCK TABLES `chart_by_month` WRITE;
/*!40000 ALTER TABLE `chart_by_month` DISABLE KEYS */;
INSERT INTO `chart_by_month` VALUES (1,'Januari',1,'0','0','0','0'),(2,'Februari',2,'0','0','0','0'),(3,'Maret',3,'0','0','0','0'),(4,'April',4,'0','0','0','0'),(5,'Mei',5,'0','1.60426398e137','0','0'),(6,'Juni',6,'0','0','0','0'),(7,'Juli',7,'0','0','0','0'),(8,'Agustus',8,'0','0','0','0'),(9,'September',9,'0','0','0','0'),(10,'Oktober',10,'0','0','0','0'),(11,'November',11,'0','0','0','0'),(12,'Desember',12,'0','0','0','0');
/*!40000 ALTER TABLE `chart_by_month` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('0nor6ih0g2tls0fh1seq8nakvqfocuqo','::1',1591981497,'__ci_last_regenerate|i:1591981497;has_loggedin|b:1;id|s:2:\"36\";user_id|s:32:\"f6c58763a01757cf845f6a22f2c39048\";email|s:15:\"ricky@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('0tn5bfb9s2hj8olt4cofn4ntie26et1o','::1',1591980480,'__ci_last_regenerate|i:1591980480;has_loggedin|b:1;id|s:2:\"36\";user_id|s:32:\"f6c58763a01757cf845f6a22f2c39048\";email|s:15:\"ricky@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('0v63nm4oun06qbra49okbvoj37knp76j','::1',1591958866,'__ci_last_regenerate|i:1591958866;has_loggedin|b:1;id|s:2:\"23\";user_id|s:32:\"11e8103cf092ccb96e3782a03f18cd09\";email|s:15:\"jamil@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('11fu7usrc99fh5vma1icaue7gsij6d5r','::1',1591751016,'__ci_last_regenerate|i:1591751016;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:18:\"jamil123@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('1nci4f8b6vvv80fk539vuv36hld34o73','::1',1591833051,''),('2r92bhepva48qbn3b96265v5qupfrhbu','::1',1591921973,'__ci_last_regenerate|i:1591921973;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('331vspe6mka4uohvc8psju91qtpf3oqt','::1',1592130732,'__ci_last_regenerate|i:1592129821;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('3klfm3a163bujutkpaf0reh7hkr00n9t','::1',1592016616,'__ci_last_regenerate|i:1592016616;user_id|s:32:\"e6db1baa29d3df1eb307ff6a12c778da\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";email|s:14:\"rafi@gmail.com\";has_loggedin|b:1;'),('4693mn0gm3h38fdhk1kh279al9mvhssd','::1',1591942582,'__ci_last_regenerate|i:1591942582;'),('4973klrdefhovuu4bp5jugnet57b0tmc','::1',1592016345,'__ci_last_regenerate|i:1592016345;has_loggedin|b:1;id|s:2:\"35\";user_id|s:32:\"a520898706826555d5e5ee050f7a750e\";email|s:16:\"buswan@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('4m6alkk9r6n39ncqmtiiqov3j3unb4g3','::1',1591919997,'__ci_last_regenerate|i:1591919997;has_loggedin|b:1;id|s:2:\"26\";user_id|s:32:\"793e4babf45ad372788604fbeaaf86d9\";email|s:17:\"mulyana@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('5fh11q69geudiib1sfr5q5urkr3aurju','::1',1591920502,'__ci_last_regenerate|i:1591920502;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('5vfgjgbe3hsl985gptljpuu3iet1m1pj','::1',1591802415,'__ci_last_regenerate|i:1591802415;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:18:\"jamil123@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('65il2s56kmf46d3bkge1drl811div93q','::1',1591921623,'__ci_last_regenerate|i:1591921623;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('97vpu8jre34vn3k2o312vmagccuthsnt','::1',1591964560,'__ci_last_regenerate|i:1591964560;has_loggedin|b:1;id|s:2:\"23\";user_id|s:32:\"11e8103cf092ccb96e3782a03f18cd09\";email|s:15:\"jamil@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('9ajtenm4ss5pe5pac86bqgic8ctsgk9q','::1',1591751028,''),('9b3cp84hfrcomhmvae2313u6kahhr55d','::1',1591707624,'__ci_last_regenerate|i:1591707624;user_id|s:32:\"7e71bb83aca7009b3ac90f6c75c9cea6\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";email|s:17:\"chandra@gmail.com\";has_loggedin|b:1;'),('9didc37r49aojsf3q9d78q88povph24c','::1',1591958559,'__ci_last_regenerate|i:1591958559;has_loggedin|b:1;id|s:2:\"23\";user_id|s:32:\"11e8103cf092ccb96e3782a03f18cd09\";email|s:15:\"jamil@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('aja90n73fes0jb8chu29i57ckok04vlp','::1',1591709039,'__ci_last_regenerate|i:1591709039;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:18:\"jamil123@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('bi74iudr9d5940ihjig8m082mdn3fn0o','::1',1592020020,'__ci_last_regenerate|i:1592016352;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('cl0d9a1h3novam8prj11vsqe2aln3blg','::1',1591919173,'__ci_last_regenerate|i:1591919173;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('d2epjblgoot6v48qcamralquinfs3aq0','::1',1591963193,'__ci_last_regenerate|i:1591963193;has_loggedin|b:1;id|s:2:\"23\";user_id|s:32:\"11e8103cf092ccb96e3782a03f18cd09\";email|s:15:\"jamil@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('d8gmk8sks9enr5dvcd5u9ok5qnkktcha','::1',1591919650,'__ci_last_regenerate|i:1591919650;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('dis9pv0uit7quc00ei5k4q33d9amvua1','::1',1591917588,'__ci_last_regenerate|i:1591917588;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:18:\"jamil123@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('drcvv1c8i7dpnnbk7u57vn9b1qt16v7q','::1',1591982279,'__ci_last_regenerate|i:1591982279;has_loggedin|b:1;id|s:2:\"36\";user_id|s:32:\"f6c58763a01757cf845f6a22f2c39048\";email|s:15:\"ricky@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('e24g5t8v6jt2glomsb7kige84bfrf3qm','::1',1591920989,'__ci_last_regenerate|i:1591920989;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('es9pm98meehhd16tmaen4vc88p2j18v9','::1',1591922607,''),('fc72177kp5clnkifoo6o6segkkp9hlaf','::1',1592018167,'__ci_last_regenerate|i:1592018167;has_loggedin|b:1;id|s:2:\"36\";user_id|s:32:\"f6c58763a01757cf845f6a22f2c39048\";email|s:15:\"ricky@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('g9viroq0oe3fdjeo6t0eje5d4r2iotsi','::1',1591975969,'__ci_last_regenerate|i:1591975969;has_loggedin|b:1;id|s:2:\"36\";user_id|s:32:\"f6c58763a01757cf845f6a22f2c39048\";email|s:15:\"ricky@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('gpookg4h5vseg3gjoij5f6oii32u86ea','::1',1591975146,'__ci_last_regenerate|i:1591975146;has_loggedin|b:1;id|s:2:\"23\";user_id|s:32:\"11e8103cf092ccb96e3782a03f18cd09\";email|s:15:\"jamil@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('h12avko13iq3j2p311cqhsk0m06s5apq','::1',1591974716,'__ci_last_regenerate|i:1591974716;has_loggedin|b:1;id|s:2:\"23\";user_id|s:32:\"11e8103cf092ccb96e3782a03f18cd09\";email|s:15:\"jamil@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('hhfj6so153m3hsj86kihv9f92j4canb1','::1',1591965330,'__ci_last_regenerate|i:1591965330;has_loggedin|b:1;id|s:2:\"23\";user_id|s:32:\"11e8103cf092ccb96e3782a03f18cd09\";email|s:15:\"jamil@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('icc4l1ker6tnp1habtkqq1q4ana52vob','::1',1591923712,'__ci_last_regenerate|i:1591923712;has_loggedin|b:1;id|s:2:\"27\";user_id|s:32:\"7dbc4f979788ef1bf83bc1f234bf0f10\";email|s:16:\"rusman@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('igph4cr7t94h4hmvv9mhea42o37t8rce','::1',1591944100,'__ci_last_regenerate|i:1591944100;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('ipluir61m0qf1kk5s957u078hno9a07n','::1',1591922258,''),('iuo3nt9gmp9gtmosvoh68suoqki6j71q','::1',1591944459,'__ci_last_regenerate|i:1591944459;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('j9uetdiv4nm0qua7gr1qebac957f3s6o','::1',1591833028,'__ci_last_regenerate|i:1591833028;'),('ji0l4ojjj19mbcfdianif9oaa26ruijn','::1',1591760147,'__ci_last_regenerate|i:1591760147;has_loggedin|b:1;id|s:2:\"20\";user_id|s:32:\"81dc9bdb52d04dc20036dbd8313ed055\";email|s:20:\"jamil12345@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('jirirsqmdcsjpaph1jr2lhildv8ubk52','::1',1591924407,'__ci_last_regenerate|i:1591924407;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('jn26r1ck6aaotr1n3al6vikv9d8cppjj','::1',1591612704,'__ci_last_regenerate|i:1591612704;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:18:\"jamil123@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('jo42sqppu62padbuj8d0mhh4gejbq059','::1',1591964221,'__ci_last_regenerate|i:1591964219;has_loggedin|b:1;id|s:2:\"23\";user_id|s:32:\"11e8103cf092ccb96e3782a03f18cd09\";email|s:15:\"jamil@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('k6otf3g7vlcncegqlaufvk2pbu758c5r','::1',1591982695,'__ci_last_regenerate|i:1591982695;has_loggedin|b:1;id|s:2:\"36\";user_id|s:32:\"f6c58763a01757cf845f6a22f2c39048\";email|s:15:\"ricky@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('kcrlmob1g6lbbg01apmq1i9idp99psnu','::1',1591802101,'__ci_last_regenerate|i:1591802101;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:18:\"jamil123@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('ke8bvcd605ic1tuj2v72038tut1n1ifc','::1',1591957802,'__ci_last_regenerate|i:1591957802;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('ki1h8sgfnkaj80m8ke7fsks6neniquni','::1',1591964963,'__ci_last_regenerate|i:1591964963;has_loggedin|b:1;id|s:2:\"23\";user_id|s:32:\"11e8103cf092ccb96e3782a03f18cd09\";email|s:15:\"jamil@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('km7rqvsh4uioca079ukt708nlp79l4e3','::1',1591704113,'__ci_last_regenerate|i:1591704113;has_loggedin|b:1;id|s:2:\"20\";user_id|s:32:\"81dc9bdb52d04dc20036dbd8313ed055\";email|s:20:\"jamil12345@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('l8k457vjm31nljs4ro3vjhtqng4qm2as','::1',1592016259,'__ci_last_regenerate|i:1592016259;has_loggedin|b:1;id|s:2:\"36\";user_id|s:32:\"f6c58763a01757cf845f6a22f2c39048\";email|s:15:\"ricky@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('la4qlok2ke4sbqo6gqfn09cdkdgbp59j','::1',1591708466,'__ci_last_regenerate|i:1591708466;'),('ls1lbmu2dmsck0puciu16r6sihjqs791','::1',1591960473,'__ci_last_regenerate|i:1591960472;has_loggedin|b:1;id|s:2:\"23\";user_id|s:32:\"11e8103cf092ccb96e3782a03f18cd09\";email|s:15:\"jamil@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('m4ejvahr9n20jk3rf2446oh92e09qucl','::1',1591922570,'__ci_last_regenerate|i:1591922570;has_loggedin|b:1;id|s:2:\"29\";user_id|s:32:\"2635f5f22e7e0bb24fe6c2d0281f1a9e\";email|s:15:\"jamal@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('mteq1fj0mluo7afthmplej70r7m17vuv','::1',1591916478,'__ci_last_regenerate|i:1591916478;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:18:\"jamil123@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('nfm9oh5ojce2g99l4uq2bqb7f88ufqnm','::1',1591921120,'__ci_last_regenerate|i:1591921120;has_loggedin|b:1;id|s:2:\"30\";user_id|s:32:\"a88d397c0394d3c1ed113aeb387e5f2c\";email|s:18:\"herwanto@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('nobjekmnr02uir8npbsjc7uh0g4t8io0','::1',1591918733,'__ci_last_regenerate|i:1591918733;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('nr913831vj6n27behn5n6ppkemobq3uf','::1',1591919989,'__ci_last_regenerate|i:1591919989;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('nrok8o52jdfq8d2j3aji09lsle70mrhm','::1',1592129814,'__ci_last_regenerate|i:1592129814;has_loggedin|b:1;id|s:2:\"23\";user_id|s:32:\"11e8103cf092ccb96e3782a03f18cd09\";email|s:15:\"jamil@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('oefe9n44pmghv5ld7k5k9s6qqorj2a87','::1',1591924682,''),('qbknfpi86g3ib4ptolmc61a0q64i9iol','::1',1591921291,'__ci_last_regenerate|i:1591921291;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('r2metpik8s5i5omoca6ouh6i9e21ftcl','::1',1592017736,'__ci_last_regenerate|i:1592017736;has_loggedin|b:1;id|s:2:\"36\";user_id|s:32:\"f6c58763a01757cf845f6a22f2c39048\";email|s:15:\"ricky@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('r6cs09ka6te3a8mutt2h2mmo9ht96hki','::1',1592019051,'__ci_last_regenerate|i:1592019051;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('rgc541gkb013rn0v49s99ngir6f69r50','::1',1592017376,'__ci_last_regenerate|i:1592017376;user_id|s:32:\"e6db1baa29d3df1eb307ff6a12c778da\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";email|s:14:\"rafi@gmail.com\";has_loggedin|b:1;'),('rlop3dn7idat4ia24q0s1ifadpnvsfjk','::1',1591703281,'__ci_last_regenerate|i:1591703281;has_loggedin|b:1;id|s:2:\"20\";user_id|s:32:\"81dc9bdb52d04dc20036dbd8313ed055\";email|s:20:\"jamil12345@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('s8vodvujtd4bmbod3b2d7vib5hmlggkg','::1',1593258417,'__ci_last_regenerate|i:1593258415;'),('s947ofu3tapf8jr7nj566tms4u0ultd5','::1',1591919202,'__ci_last_regenerate|i:1591919202;user_id|s:32:\"d1ac5a4aeefd4a6faf83c78a4c5ac26d\";password|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:14:\"popy@gmail.com\";has_loggedin|b:1;'),('s9l5t35nhq2elb331k3fprj3dag3dg2q','::1',1591709866,'__ci_last_regenerate|i:1591709866;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:18:\"jamil123@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('sh31jjjehctb6pam4o62s8ifk893lkq7','::1',1591915910,'__ci_last_regenerate|i:1591915910;'),('t72d7ic8om6aai7im1g36ecoqumadvb8','::1',1591615019,'__ci_last_regenerate|i:1591615019;has_loggedin|b:1;id|s:2:\"20\";user_id|s:32:\"81dc9bdb52d04dc20036dbd8313ed055\";email|s:20:\"jamil12345@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('u3v02j9388neeo57uv3dt0h19r4lbl75','::1',1591617885,'__ci_last_regenerate|i:1591617885;has_loggedin|b:1;id|s:2:\"20\";user_id|s:32:\"81dc9bdb52d04dc20036dbd8313ed055\";email|s:20:\"jamil12345@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('ug4m3sbhm088lsvmlmcm93m5v4biua6k','::1',1592019701,'__ci_last_regenerate|i:1592019701;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:15:\"dwiju@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),('unkki6papscjn222jrg2v8j9eoqpodog','::1',1591770917,'__ci_last_regenerate|i:1591770917;'),('upntfr5fucdqidfdcdpss8hrd228a1hg','::1',1591975573,'__ci_last_regenerate|i:1591975573;has_loggedin|b:1;id|s:2:\"36\";user_id|s:32:\"f6c58763a01757cf845f6a22f2c39048\";email|s:15:\"ricky@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),('vko3nmgsu45firj18oaq3lct8804lgpt','::1',1591703652,'__ci_last_regenerate|i:1591703652;'),('vs86bvtqlv49aht8nqta4r8n18fsirbm','::1',1591920393,'__ci_last_regenerate|i:1591920393;has_loggedin|b:1;id|s:2:\"27\";user_id|s:32:\"7dbc4f979788ef1bf83bc1f234bf0f10\";email|s:16:\"rusman@gmail.com\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_value` varchar(30) DEFAULT NULL,
  `kategori` varchar(30) DEFAULT NULL,
  `kategori_color` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'odgj','ODGJ','#e74a3b'),(2,'ot','OT','#6f42c1'),(3,'pengemis','Pengemis','#ad8b4c'),(4,'pengamen','Pengamen','#afbf43'),(5,'gelandangan','Gelandangan','#0080ff'),(6,'psikiotik','Psikiotik','#5eff00'),(7,'psk','PSK','#4fc2d6'),(8,'pedagang_asongan','Pedagang Asongan','db5ed3');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laporan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_laporan` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `lokasi` varchar(250) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `status_laporan` varchar(15) NOT NULL,
  `report_by` varchar(32) NOT NULL,
  `tanggal_lapor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verifikasi_by` varchar(32) NOT NULL,
  `tanggal_verifikasi` datetime NOT NULL,
  `proses_by` varchar(32) NOT NULL,
  `tanggal_proses` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `tindakan` varchar(150) NOT NULL,
  `foto_tindakan` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan`
--

LOCK TABLES `laporan` WRITE;
/*!40000 ALTER TABLE `laporan` DISABLE KEYS */;
INSERT INTO `laporan` VALUES (33,'orang terlantar','ot','ada orang terlantar','jl marunda baru','http://localhost/adefathudin/falaq/assets/img/laporan/81dc9bdb52d04dc20036dbd8313ed0555ec8c66692c8a.jpg','Proses','81dc9bdb52d04dc20036dbd8313ed055','2020-06-12 12:03:35','202cb962ac59075b964b07152d234b70','2020-05-23 01:53:51','dc5c7986daef50c1e02ab09b442ee34f','2020-05-23 01:54:36','2020-05-23 01:55:26','orang terlantar mempunyai keluarga, sehingga','http://localhost/adefathudin/falaq/assets/img/laporan/tindakan/dc5c7986daef50c1e02ab09b442ee34f5ec8c8de86089.jpg'),(34,'Orang gila mengganggu masyarakat','odgj','Orang gila tidur di depan rumah warga dan mengganggu anak kecil.','jalan sungai tiram rt 2/rw 2, depan empang','http://localhost/falaq/falaq/assets/img/laporan/2635f5f22e7e0bb24fe6c2d0281f1a9e5ee2cf8628294.jpeg','Selesai','2635f5f22e7e0bb24fe6c2d0281f1a9e','2020-06-12 17:24:41','202cb962ac59075b964b07152d234b70','2020-06-12 07:46:57','11e8103cf092ccb96e3782a03f18cd09','2020-06-12 07:47:22','2020-06-12 07:51:20','karena omdk tidak memiliki keluarga disekitar, omdk tersebut telah dibawa ke panti sosial jakarta timur.','http://localhost/falaq/falaq/assets/img/laporan/tindakan/11e8103cf092ccb96e3782a03f18cd095ee2d18892139.jpg'),(35,'orang kesasar','ot','ibu ini tidak memiliki tanda pengenal dan pikun, terlantar di rumah warga','rusunawa marunda blok a8','http://localhost/falaq/falaq/assets/img/laporan/793e4babf45ad372788604fbeaaf86d95ee2d04116d79.jpg','Selesai','793e4babf45ad372788604fbeaaf86d9','2020-06-12 00:54:18','202cb962ac59075b964b07152d234b70','2020-06-12 07:47:56','11e8103cf092ccb96e3782a03f18cd09','2020-06-12 07:52:47','2020-06-12 07:54:18','ibu tersebut untuk saat ini di bawa terlebih dahulu ke panti sosial, dan sudah diinfokan ke warga apabila ada yang kenal dengan ibu ini harap menelpon','http://localhost/falaq/falaq/assets/img/laporan/tindakan/11e8103cf092ccb96e3782a03f18cd095ee2d23a60037.jpg'),(36,'gelandangan','gelandangan','gelandangan mengganggu ketertiban umum','jalan marunda baru rt 4 rw 1 dekat bkt','http://localhost/falaq/falaq/assets/img/laporan/7dbc4f979788ef1bf83bc1f234bf0f105ee2d3eaaec8a.jpg','Follow_Up','7dbc4f979788ef1bf83bc1f234bf0f10','2020-06-13 03:43:00','202cb962ac59075b964b07152d234b70','2020-06-12 01:41:58','11e8103cf092ccb96e3782a03f18cd09','2020-06-13 10:43:00','0000-00-00 00:00:00','','http://localhost/falaq/falaq/assets/img/laporan/tindakan/'),(37,'Orang dalam masalah kejiwaan','odgj','orang ini sudah stress dan menggangu warga sekitar.','rusun marunda blok c1 rw 11','http://localhost/falaq/falaq/assets/img/laporan/a88d397c0394d3c1ed113aeb387e5f2c5ee2d4eab2dac.jpg','Selesai','a88d397c0394d3c1ed113aeb387e5f2c','2020-06-12 17:24:52','202cb962ac59075b964b07152d234b70','2020-06-12 01:40:34','11e8103cf092ccb96e3782a03f18cd09','2020-06-12 05:33:51','2020-06-12 05:40:37','Orang tersebut tidak mempunyai keluarga dan dibawa ke rumah sakit jiwa untuk diperiksa terlebih dahulu.','http://localhost/falaq/falaq/assets/img/laporan/tindakan/11e8103cf092ccb96e3782a03f18cd095ee35ba4ea2f6.jpg');
/*!40000 ALTER TABLE `laporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifikasi`
--

DROP TABLE IF EXISTS `notifikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifikasi` (
  `notifikasi_id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(32) NOT NULL,
  `level` varchar(15) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `judul` varchar(50) NOT NULL,
  `isi` varchar(250) NOT NULL,
  `baca` tinyint(1) NOT NULL,
  PRIMARY KEY (`notifikasi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifikasi`
--

LOCK TABLES `notifikasi` WRITE;
/*!40000 ALTER TABLE `notifikasi` DISABLE KEYS */;
INSERT INTO `notifikasi` VALUES (82,'202cb962ac59075b964b07152d234b70','','2020-05-23 06:34:41','Selamat Datang di PMKS Sistem','',0),(83,'dc5c7986daef50c1e02ab09b442ee34f','','2020-05-23 06:36:24','Selamat Datang di PMKS Sistem','',0),(84,'81dc9bdb52d04dc20036dbd8313ed055','','2020-05-23 06:38:41','Selamat Datang di PMKS Sistem','',0),(85,'','kasatpel','2020-06-13 02:44:49','Laporan \"orang terlantar\"','Laporan baru \"orang terlantar\" membutuhkan verifikasi kasatpel',1),(86,'81dc9bdb52d04dc20036dbd8313ed055','','2020-05-23 06:44:54','Laporan \"orang terlantar\"','Laporan baru \"orang terlantar\" telah dibuat dan sedang  dilakukan verifikasi oleh kasatpel',0),(87,'','petugas','2020-06-12 12:26:54','Laporan \"orang terlantar\"','Laporan baru \"orang terlantar\" telah diVerifikasi',1),(88,'','petugas','2020-06-12 12:24:22','Laporan \"orang terlantar\"','Laporan baru \"orang terlantar\" telah diProses',1),(89,'','petugas','2020-06-12 12:24:26','Laporan \"orang terlantar\"','Laporan baru \"orang terlantar\" telah diFollow_Up',1),(90,'7e71bb83aca7009b3ac90f6c75c9cea6','','2020-06-09 12:06:17','Selamat Datang di PMKS Sistem','',0),(91,'5b85ae1a81baf0ad0b9723e7f2d2e0ce','','2020-06-11 23:27:46','Selamat Datang di PMKS Sistem','',0),(92,'11e8103cf092ccb96e3782a03f18cd09','','2020-06-11 23:37:15','Selamat Datang di PMKS Sistem','',0),(93,'d1ac5a4aeefd4a6faf83c78a4c5ac26d','','2020-06-11 23:43:15','Selamat Datang di PMKS Sistem','',0),(94,'388435404c7575af00169b33cc5eef2e','','2020-06-11 23:48:05','Selamat Datang di PMKS Sistem','',0),(95,'793e4babf45ad372788604fbeaaf86d9','','2020-06-11 23:55:03','Selamat Datang di PMKS Sistem','',0),(96,'7dbc4f979788ef1bf83bc1f234bf0f10','','2020-06-12 00:01:39','Selamat Datang di PMKS Sistem','',0),(97,'e7d9ea7d0bf2a2accf62521e3241e543','','2020-06-12 00:06:28','Selamat Datang di PMKS Sistem','',0),(98,'2635f5f22e7e0bb24fe6c2d0281f1a9e','','2020-06-12 00:11:03','Selamat Datang di PMKS Sistem','',0),(99,'a88d397c0394d3c1ed113aeb387e5f2c','','2020-06-12 00:14:09','Selamat Datang di PMKS Sistem','',0),(100,'acccb6297aa3455cdc5f735ba010eeea','','2020-06-12 00:19:52','Selamat Datang di PMKS Sistem','',0),(101,'2fa67497ed1d13341a4dc988b04f077b','','2020-06-12 00:23:12','Selamat Datang di PMKS Sistem','',0),(102,'b9f94e929dc4e033651d087ebc0a2489','','2020-06-12 00:25:44','Selamat Datang di PMKS Sistem','',0),(103,'a8a9a886fad75fe4af3c866cda730bc1','','2020-06-12 00:28:14','Selamat Datang di PMKS Sistem','',0),(104,'a520898706826555d5e5ee050f7a750e','','2020-06-12 00:31:03','Selamat Datang di PMKS Sistem','',0),(105,'','kasatpel','2020-06-13 02:44:52','Laporan \"Orang gila mengganggu masyarakat\"','Laporan baru \"Orang gila mengganggu masyarakat\" membutuhkan verifikasi kasatpel',1),(106,'2635f5f22e7e0bb24fe6c2d0281f1a9e','','2020-06-12 00:42:46','Laporan \"Orang gila mengganggu masyarakat\"','Laporan baru \"Orang gila mengganggu masyarakat\" telah dibuat dan sedang  dilakukan verifikasi oleh kasatpel',0),(107,'','kasatpel','2020-06-13 02:44:55','Laporan \"orang kesasar\"','Laporan baru \"orang kesasar\" membutuhkan verifikasi kasatpel',1),(108,'793e4babf45ad372788604fbeaaf86d9','','2020-06-12 00:45:53','Laporan \"orang kesasar\"','Laporan baru \"orang kesasar\" telah dibuat dan sedang  dilakukan verifikasi oleh kasatpel',0),(109,'','petugas','2020-06-12 12:26:08','Laporan \"Orang gila mengganggu masyarakat\"','Laporan baru \"Orang gila mengganggu masyarakat\" telah diVerifikasi',1),(110,'','petugas','2020-06-12 12:31:06','Laporan \"Orang gila mengganggu masyarakat\"','Laporan baru \"Orang gila mengganggu masyarakat\" telah diProses',1),(111,'','petugas','2020-06-12 12:32:24','Laporan \"orang kesasar\"','Laporan baru \"orang kesasar\" telah diVerifikasi',1),(112,'','petugas','2020-06-12 12:25:56','Laporan \"Orang gila mengganggu masyarakat\"','Laporan baru \"Orang gila mengganggu masyarakat\" telah diFollow_Up',1),(113,'','petugas','2020-06-12 12:35:20','Laporan \"orang kesasar\"','Laporan baru \"orang kesasar\" telah diProses',1),(114,'','petugas','2020-06-12 12:22:48','Laporan \"orang kesasar\"','Laporan baru \"orang kesasar\" telah diFollow_Up',1),(115,'','kasatpel','2020-06-13 02:44:59','Laporan \"gelandangan\"','Laporan baru \"gelandangan\" membutuhkan verifikasi kasatpel',1),(116,'7dbc4f979788ef1bf83bc1f234bf0f10','','2020-06-12 01:01:31','Laporan \"gelandangan\"','Laporan baru \"gelandangan\" telah dibuat dan sedang  dilakukan verifikasi oleh kasatpel',0),(117,'','kasatpel','2020-06-13 02:45:01','Laporan \"Orang dalam masalah kejiwaan\"','Laporan baru \"Orang dalam masalah kejiwaan\" membutuhkan verifikasi kasatpel',1),(118,'a88d397c0394d3c1ed113aeb387e5f2c','','2020-06-12 01:05:46','Laporan \"Orang dalam masalah kejiwaan\"','Laporan baru \"Orang dalam masalah kejiwaan\" telah dibuat dan sedang  dilakukan verifikasi oleh kasatpel',0),(119,'f6c58763a01757cf845f6a22f2c39048','','2020-06-12 15:36:36','Selamat Datang di PMKS Sistem','',1),(120,'','petugas','2020-06-12 12:35:25','Laporan \"Orang dalam masalah kejiwaan\"','Laporan baru \"Orang dalam masalah kejiwaan\" telah diVerifikasi',1),(121,'','petugas','2020-06-12 12:32:43','Laporan \"gelandangan\"','Laporan baru \"gelandangan\" telah diVerifikasi',1),(122,'','petugas','2020-06-12 12:31:52','Laporan \"Orang dalam masalah kejiwaan\"','Laporan baru \"Orang dalam masalah kejiwaan\" telah diProses',1),(123,'','petugas','2020-06-12 12:21:52','Laporan \"Orang dalam masalah kejiwaan\"','Laporan baru \"Orang dalam masalah kejiwaan\" telah diFollow_Up',1),(124,'','petugas','2020-06-12 12:22:57','Laporan \"gelandangan\"','Laporan baru \"gelandangan\" telah diProses',1),(125,'','petugas','2020-06-12 12:20:55','Laporan \"gelandangan\"','Laporan baru \"gelandangan\" telah diProses',1),(126,'','petugas','2020-06-12 12:37:58','Laporan \"gelandangan\"','Laporan baru \"gelandangan\" telah diProses',1),(127,'e6db1baa29d3df1eb307ff6a12c778da','','2020-06-13 02:46:28','Selamat Datang di PMKS Sistem','',1),(128,'','petugas','2020-06-13 03:43:00','Laporan \"gelandangan\"','Laporan baru \"gelandangan\" telah diProses',0);
/*!40000 ALTER TABLE `notifikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_detail`
--

DROP TABLE IF EXISTS `users_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_detail` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(32) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` tinytext NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` varchar(30) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `profil` varchar(50) NOT NULL DEFAULT 'default.png',
  `ktp` varchar(150) DEFAULT NULL,
  `level` varchar(15) NOT NULL,
  `verifikasi` int(2) DEFAULT '0',
  `aktif` int(2) DEFAULT '1',
  `joined` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_detail`
--

LOCK TABLES `users_detail` WRITE;
/*!40000 ALTER TABLE `users_detail` DISABLE KEYS */;
INSERT INTO `users_detail` VALUES (19,'202cb962ac59075b964b07152d234b70','3172052811234232','Dwi Djunarso','Jakarta','1979-02-15','L','dwiju@gmail.com','081345169611','Jl. Malaka 1, Rorotan, Jakarta Utara','','','default.png','IMG-20200611-WA0014.jpg','kasatpel',1,1,'2020-05-23 01:34:41'),(23,'5b85ae1a81baf0ad0b9723e7f2d2e0ce','3216012811980002','Yusuf Prianto','Jakarta','1998-11-28','L','Yusuf@gmail.com','081934180812','Jl Marunda Gg.4, Rt006/Rw006, Marunda, Cilincing','','','default.png','assets/img/user/ktp/KTP-5b85ae1a81baf0ad0b9723e7f2d2e0ce.jpg','petugas',1,1,'2020-06-12 06:27:46'),(24,'11e8103cf092ccb96e3782a03f18cd09','3175091209950002','Muhammad Falaq Al-Jamil','Sumedang','0000-00-00','L','jamil@gmail.com','081358907012','Perum. Cikeas Country, Blok D1 No 8','','','default.png','assets/img/user/ktp/KTP-11e8103cf092ccb96e3782a03f18cd09.jpg','petugas',1,1,'2020-06-12 06:37:15'),(25,'d1ac5a4aeefd4a6faf83c78a4c5ac26d','3172042510890002','Popy Irawan','Jakarta','1989-10-25','L','popy@gmail.com','087872734422','Asr Dinas Pemadam Kebakaran/177, Semper Barat, Cilincing','','','default.png','assets/img/user/ktp/KTP-d1ac5a4aeefd4a6faf83c78a4c5ac26d.jpg','petugas',1,1,'2020-06-12 06:43:15'),(26,'388435404c7575af00169b33cc5eef2e','3172040704790016','Arwin Buma Setyawan','Papua','1979-04-07','L','arwin@gmail.com','081328303611','Kalibaru Barat VI No 27, Kalibaru, Cilincing','','','default.png','assets/img/user/ktp/KTP-388435404c7575af00169b33cc5eef2e.jpg','petugas',1,1,'2020-06-12 06:48:05'),(27,'793e4babf45ad372788604fbeaaf86d9','3172051712830008','Mulyana Yusuf','Jakarta','1983-12-17','L','mulyana@gmail.com','0812915832112','rusun marunda blok A8, rt 008/ rw 010','8','10','default.png','assets/img/user/ktp/KTP-793e4babf45ad372788604fbeaaf86d9.jpg','pelapor',1,1,'2020-06-12 06:55:02'),(28,'7dbc4f979788ef1bf83bc1f234bf0f10','3172041712650002','Rusman','Jakarta','1965-12-17','L','rusman@gmail.com','081291012512','jl marunda makmur, kp bidara, rt 4/ rw 1','4','1','default.png','assets/img/user/ktp/KTP-7dbc4f979788ef1bf83bc1f234bf0f10.jpg','pelapor',1,1,'2020-06-12 07:01:38'),(29,'e7d9ea7d0bf2a2accf62521e3241e543','3172041706720004','Sugiyanto','Jakarta','1972-06-17','L','sugi@gmail.com','0813875490312','Marunda Pulo, Rt 2/Rw 7','2','7','default.png','assets/img/user/ktp/KTP-e7d9ea7d0bf2a2accf62521e3241e543.jpg','pelapor',1,1,'2020-06-12 07:06:28'),(30,'2635f5f22e7e0bb24fe6c2d0281f1a9e','3172040703670001','H. Jamaludin','Indramayu','1967-03-07','L','jamal@gmail.com','089512307511','Kp. Bambu kuning, Rt 2/ rw 2','2','2','default.png','assets/img/user/ktp/KTP-2635f5f22e7e0bb24fe6c2d0281f1a9e.jpg','pelapor',1,1,'2020-06-12 07:11:02'),(31,'a88d397c0394d3c1ed113aeb387e5f2c','3203161409761701','Herwanto','Salatiga','1976-09-14','L','herwanto@gmail.com','081380769021','rusunawa marunda blok b9/306, rt 09/rw11','9','11','default.png','assets/img/user/ktp/KTP-a88d397c0394d3c1ed113aeb387e5f2c.jpg','pelapor',1,1,'2020-06-12 07:14:09'),(32,'acccb6297aa3455cdc5f735ba010eeea','3172041811620002','Subari','Jakarta','1962-11-18','L','subari@gmail.com','0882112026923','jl. sungai tiram, kampung nelayan','2','9','default.png','assets/img/user/ktp/KTP-acccb6297aa3455cdc5f735ba010eeea.jpg','pelapor',1,1,'2020-06-12 07:19:52'),(33,'2fa67497ed1d13341a4dc988b04f077b','3172040803520001','M. Tohir','Jakarta','1952-03-08','L','tohir@gmail.com','08521710812332','jalan marunda baru rt 5 rw 3','5','3','default.png','assets/img/user/ktp/KTP-2fa67497ed1d13341a4dc988b04f077b.jpg','pelapor',1,1,'2020-06-12 07:23:12'),(34,'b9f94e929dc4e033651d087ebc0a2489','3275032206680023','Rully Saputra','Bekasi','1988-06-22','L','rully@gmail.com','089665695233','jl. sungai tiram, gg hj Abdul rohim','3','4','default.png','assets/img/user/ktp/KTP-b9f94e929dc4e033651d087ebc0a2489.jpg','pelapor',1,1,'2020-06-12 07:25:44'),(35,'a8a9a886fad75fe4af3c866cda730bc1','3172042001670001','Tarwin B Namin','Jakarta','1971-01-20','L','tarwin@gmail.com','0813899375242','jalan sungai tiram','2','6','default.png','assets/img/user/ktp/KTP-a8a9a886fad75fe4af3c866cda730bc1.jpg','pelapor',1,1,'2020-06-12 07:28:14'),(36,'a520898706826555d5e5ee050f7a750e','3172040302680013','Buswan','Pekan Baru','1968-02-03','L','buswan@gmail.com','082111039699','Komplek STIP blok Blok S/15','1','8','default.png','assets/img/user/ktp/KTP-a520898706826555d5e5ee050f7a750e.jpg','pelapor',1,1,'2020-06-12 07:31:03'),(37,'f6c58763a01757cf845f6a22f2c39048','3175040516990010','Ricky Fendy Tariola','Ambon','1988-06-15','L','ricky@gmail.com','09862528191','rusunawa marunda blok b7 no 555','7','11','default.png','assets/img/user/ktp/KTP-f6c58763a01757cf845f6a22f2c39048.jpg','pelapor',1,1,'2020-06-12 08:14:53'),(38,'e6db1baa29d3df1eb307ff6a12c778da','12312312312','rafii','Jakarta','2003-01-01','L','rafi@gmail.com','098272781','dasdasdsadsa','16','1','default.png','assets/img/user/ktp/KTP-e6db1baa29d3df1eb307ff6a12c778da.jpg','pelapor',1,1,'2020-06-13 09:45:34');
/*!40000 ALTER TABLE `users_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_login`
--

DROP TABLE IF EXISTS `users_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(360) NOT NULL,
  `blokir` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_login`
--

LOCK TABLES `users_login` WRITE;
/*!40000 ALTER TABLE `users_login` DISABLE KEYS */;
INSERT INTO `users_login` VALUES (18,'202cb962ac59075b964b07152d234b70','dwiju@gmail.com','c4ca4238a0b923820dcc509a6f75849b',0),(22,'5b85ae1a81baf0ad0b9723e7f2d2e0ce','Yusuf@gmail.com','202cb962ac59075b964b07152d234b70',0),(23,'11e8103cf092ccb96e3782a03f18cd09','jamil@gmail.com','202cb962ac59075b964b07152d234b70',0),(24,'d1ac5a4aeefd4a6faf83c78a4c5ac26d','popy@gmail.com','202cb962ac59075b964b07152d234b70',0),(25,'388435404c7575af00169b33cc5eef2e','arwin@gmail.com','202cb962ac59075b964b07152d234b70',0),(26,'793e4babf45ad372788604fbeaaf86d9','mulyana@gmail.com','202cb962ac59075b964b07152d234b70',0),(27,'7dbc4f979788ef1bf83bc1f234bf0f10','rusman@gmail.com','202cb962ac59075b964b07152d234b70',0),(28,'e7d9ea7d0bf2a2accf62521e3241e543','sugi@gmail.com','202cb962ac59075b964b07152d234b70',0),(29,'2635f5f22e7e0bb24fe6c2d0281f1a9e','jamal@gmail.com','202cb962ac59075b964b07152d234b70',0),(30,'a88d397c0394d3c1ed113aeb387e5f2c','herwanto@gmail.com','202cb962ac59075b964b07152d234b70',0),(31,'acccb6297aa3455cdc5f735ba010eeea','subari@gmail.com','202cb962ac59075b964b07152d234b70',0),(32,'2fa67497ed1d13341a4dc988b04f077b','tohir@gmail.com','202cb962ac59075b964b07152d234b70',0),(33,'b9f94e929dc4e033651d087ebc0a2489','rully@gmail.com','202cb962ac59075b964b07152d234b70',0),(34,'a8a9a886fad75fe4af3c866cda730bc1','tarwin@gmail.com','202cb962ac59075b964b07152d234b70',0),(35,'a520898706826555d5e5ee050f7a750e','buswan@gmail.com','202cb962ac59075b964b07152d234b70',0),(36,'f6c58763a01757cf845f6a22f2c39048','ricky@gmail.com','202cb962ac59075b964b07152d234b70',0),(37,'e6db1baa29d3df1eb307ff6a12c778da','rafi@gmail.com','c4ca4238a0b923820dcc509a6f75849b',0);
/*!40000 ALTER TABLE `users_login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-27 18:48:09
