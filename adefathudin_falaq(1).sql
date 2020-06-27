-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2020 at 08:04 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adefathudin_falaq`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart_by_jenis`
--

CREATE TABLE `chart_by_jenis` (
  `id` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` int(2) DEFAULT NULL,
  `omdk` int(11) NOT NULL,
  `ot` int(11) NOT NULL,
  `pengemis` int(11) NOT NULL,
  `pengamen` int(11) NOT NULL,
  `gelandangan` int(2) NOT NULL DEFAULT '0',
  `psikiotik` int(2) NOT NULL DEFAULT '0',
  `psk` int(2) NOT NULL DEFAULT '0',
  `pedagang_asongan` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart_by_jenis`
--

INSERT INTO `chart_by_jenis` (`id`, `tanggal`, `bulan`, `omdk`, `ot`, `pengemis`, `pengamen`, `gelandangan`, `psikiotik`, `psk`, `pedagang_asongan`) VALUES
(1, 1, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 2, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 4, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 6, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 7, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 8, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 9, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 10, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 11, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 12, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 13, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 14, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 15, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 16, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 17, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 18, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 19, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 20, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 21, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 22, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 23, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 24, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 25, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 26, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 27, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 28, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 29, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 30, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 31, 5, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chart_by_month`
--

CREATE TABLE `chart_by_month` (
  `id` int(11) NOT NULL,
  `month` varchar(15) NOT NULL,
  `bulan` int(2) DEFAULT NULL,
  `verifikasi` varchar(15) NOT NULL DEFAULT '0',
  `proses` varchar(15) NOT NULL DEFAULT '0',
  `follow_up` varchar(15) NOT NULL DEFAULT '0',
  `selesai` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart_by_month`
--

INSERT INTO `chart_by_month` (`id`, `month`, `bulan`, `verifikasi`, `proses`, `follow_up`, `selesai`) VALUES
(1, 'Januari', 1, '0', '0', '0', '0'),
(2, 'Februari', 2, '0', '0', '0', '0'),
(3, 'Maret', 3, '0', '0', '0', '0'),
(4, 'April', 4, '0', '0', '0', '0'),
(5, 'Mei', 5, '0', '1.60426398e137', '0', '0'),
(6, 'Juni', 6, '0', '0', '0', '0'),
(7, 'Juli', 7, '0', '0', '0', '0'),
(8, 'Agustus', 8, '0', '0', '0', '0'),
(9, 'September', 9, '0', '0', '0', '0'),
(10, 'Oktober', 10, '0', '0', '0', '0'),
(11, 'November', 11, '0', '0', '0', '0'),
(12, 'Desember', 12, '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('09q287dub9bjlv9vnu3813klcteomkb6', '::1', 1589898847, '__ci_last_regenerate|i:1589898847;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('0ctqebai5c6pgjqahikg99q07f571iua', '::1', 1589182640, '__ci_last_regenerate|i:1589182640;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('1geh51h8p1s602a7peagnkgcmhj99e03', '::1', 1589898444, '__ci_last_regenerate|i:1589898444;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('1jnvqire7i2e6g8nc383ee1u9hih93it', '::1', 1589938315, '__ci_last_regenerate|i:1589938315;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('20rh12qtnaspu349u6qq809skde5ikb0', '::1', 1590216845, '__ci_last_regenerate|i:1590216845;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:18:\"jamil123@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),
('24jcjdle01jepcv8ckcbfsjnl5aiao4q', '::1', 1589397014, ''),
('28asbub9434lvqmpqive6qldq8bm8sam', '::1', 1589869229, '__ci_last_regenerate|i:1589869229;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('2eh1umecn92eupv014dvrr9u17agn7sg', '::1', 1589255797, '__ci_last_regenerate|i:1589255797;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('2qsik0c0aemi6j0510c4e8nb01h7aj5u', '::1', 1590206736, '__ci_last_regenerate|i:1590206736;has_loggedin|b:1;id|s:2:\"16\";user_id|s:32:\"335b27374fdc6e0eac71b3ae4112907c\";email|s:33:\"sigit.istriyanto@bsminsbroker.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";'),
('37mmfqdonli93f6adnmnge1jg3p6ara5', '::1', 1589139257, '__ci_last_regenerate|i:1589139257;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('3qt4kc652jer0b7f80sm27dvlttcvjda', '::1', 1589275668, '__ci_last_regenerate|i:1589275668;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('4ld7a7u2mpj3aq2q8cir6g1dm4ve5ulb', '::1', 1589385924, '__ci_last_regenerate|i:1589385924;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('4rhuvt2t20dhfb1q1u2nch48vcptpo1s', '::1', 1589397323, ''),
('50s4mukq0fhkvfnm5b1iklt6804u4s99', '::1', 1589870201, ''),
('51m0dgq6nsqsn76533rui71ci54mt9hb', '::1', 1589939330, '__ci_last_regenerate|i:1589939330;'),
('59clhuqf20ujup8semkfo3tkb8grdpq5', '::1', 1589297342, '__ci_last_regenerate|i:1589297342;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('5k8af02prg8tffkkohr5er4nq2pseqo0', '::1', 1589900050, '__ci_last_regenerate|i:1589900050;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('5p23cnpd3to1570ha27rbfc6t59du43o', '::1', 1589265813, '__ci_last_regenerate|i:1589265813;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('64i5b46caet20uom1rcg56h7246mtrr9', '::1', 1589398731, ''),
('66ecvrpbb74bmtpl66601d8b3tl1nq8s', '::1', 1589186408, '__ci_last_regenerate|i:1589186408;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('66n99fgj3d20e8jfp89kmnabksfofn4v', '::1', 1589399718, ''),
('67r72vd7h3gget7bfhe2u2knfir19p6u', '::1', 1590234020, '__ci_last_regenerate|i:1590234020;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:18:\"jamil123@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),
('6dbujq26gkr2b6fq9goc94j6de4evqnn', '::1', 1589860153, '__ci_last_regenerate|i:1589860153;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('6f7v1jhd9f10h87bvlt1fhn9lje5ussi', '::1', 1589392459, '__ci_last_regenerate|i:1589392236;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('6qbo30pv4ffug7m99vt32i2a253c11a8', '::1', 1590214675, ''),
('6vu21q19uv43t4cktd4hu3fq0a6u5cp6', '::1', 1589265512, '__ci_last_regenerate|i:1589265512;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('70jltkr4srk35p8us9si5422b5o592dr', '::1', 1589901174, '__ci_last_regenerate|i:1589901174;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('738gvge1tam87ca6k6mf2jcgal4ts6n5', '::1', 1589258204, '__ci_last_regenerate|i:1589258203;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('79oc021p678jos2hkucoj9jo4ald8519', '::1', 1589183768, '__ci_last_regenerate|i:1589183768;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('7gmcpovjlgkikfj1um02t3jkd3nocv0q', '::1', 1589988235, '__ci_last_regenerate|i:1589988235;user_id|s:32:\"11d7141866f86083c643b476b86e5ae3\";password|s:32:\"d41d8cd98f00b204e9800998ecf8427e\";email|s:33:\"sigit.istriyanto@bsminsbroker.com\";has_loggedin|b:1;'),
('7hjb6sjn0nknvoavn0cjndc16cr2uau6', '::1', 1589920021, '__ci_last_regenerate|i:1589920021;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('7kathdvifoe5j5c0re9dpjb89d4n691u', '::1', 1589395599, ''),
('7okpscnroomu63t8bu01flb013u9abt1', '::1', 1589165971, '__ci_last_regenerate|i:1589165971;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('864folu20od638hdqu5r22seffrjcb88', '::1', 1589261578, '__ci_last_regenerate|i:1589261578;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('8ku2vo7muhjr4k933tbja3u2u4c003v5', '::1', 1589382403, '__ci_last_regenerate|i:1589382403;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('8mu292log2he48q6a1kdva2ah9n3mslj', '::1', 1590221611, '__ci_last_regenerate|i:1590221611;'),
('937dhco7bgpq1rsmm0chrvo2m085rc10', '::1', 1589259040, '__ci_last_regenerate|i:1589259040;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('9e8jbgv03lbo64m8ee1eugoea3a3qmmm', '::1', 1589392603, ''),
('9end5olgoektp8of57uo7oth2fmdct81', '::1', 1589184971, '__ci_last_regenerate|i:1589184971;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('9joebmm6n7hr8mjcv73cfldefe6di6dk', '::1', 1589263288, '__ci_last_regenerate|i:1589263288;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('a3ctvnlht6jqdtsijuig6fa12kdmjid7', '::1', 1589276239, '__ci_last_regenerate|i:1589276239;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('a3ii18g3q60iid5fv6tv0eivlb6a09tk', '::1', 1590211623, '__ci_last_regenerate|i:1590211623;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),
('ab99u79710m64bcb2fsfkg3bgt01kqud', '::1', 1589938970, '__ci_last_regenerate|i:1589938970;'),
('agj1s86dbntp0j0t7fp40u15jq12b03i', '::1', 1590205758, '__ci_last_regenerate|i:1590205758;message|s:24:\"user atau password salah\";__ci_vars|a:1:{s:7:\"message\";s:3:\"old\";}'),
('b54v3a19doftpdhgg8tcor3igvv880gr', '::1', 1589387653, '__ci_last_regenerate|i:1589387474;'),
('b85k8uev4ooi2upiu9not3r3v56u2fes', '::1', 1589399098, ''),
('bksa6s6fdf7vg5mt5t8v6h4ms576c6of', '::1', 1589264825, '__ci_last_regenerate|i:1589264825;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('bsu6erd0qnr8v93dgvg20gnnde5ivgfu', '::1', 1589182944, '__ci_last_regenerate|i:1589182944;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('c1ki40nkjjurt92v6u6t1c4io7q4jrpo', '::1', 1589265203, '__ci_last_regenerate|i:1589265203;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('c1o2sqef8rpp65llmabdo6jafk1j4f72', '::1', 1589386413, '__ci_last_regenerate|i:1589386413;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('c6mpt79ru69adpjb5j6t4ogc4qkh5dil', '::1', 1589900823, '__ci_last_regenerate|i:1589900823;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('cggdo86epq7c58oma0fsc5ttk0h7pgv2', '::1', 1589254712, '__ci_last_regenerate|i:1589254712;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('clpbj8ebq3u46dhqb64ar2m67fjseqq9', '::1', 1589919110, '__ci_last_regenerate|i:1589919110;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('cnk0eotn1rs3l3voicua6a35lg9mk4so', '::1', 1589164418, '__ci_last_regenerate|i:1589164418;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('cnl7g0eljqbhcmmor68pj7a7pp1tcr1i', '::1', 1589920620, '__ci_last_regenerate|i:1589920620;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('cqlahhcgpgti5jccnbp923b6d3bn8p6e', '::1', 1589866935, '__ci_last_regenerate|i:1589866935;has_loggedin|b:1;id|s:1:\"2\";user_id|s:32:\"afb91ef692fd08c445e8cb1bab2ccf9c\";email|s:7:\"petugas\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('cu3spl6d4nqdel5vh8fcvbsi5i89b3ei', '::1', 1590209341, '__ci_last_regenerate|i:1590209341;has_loggedin|b:1;id|s:2:\"16\";user_id|s:32:\"335b27374fdc6e0eac71b3ae4112907c\";email|s:33:\"sigit.istriyanto@bsminsbroker.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";'),
('d0m9572hr16005g5mnpiudcst9a59io4', '::1', 1589875413, '__ci_last_regenerate|i:1589875413;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('dp9i1rc052pbfna36d3q4j35c8spneck', '::1', 1589261912, '__ci_last_regenerate|i:1589261912;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('ed3tu2lqpa187dp3dkg8ec770nt4vngk', '::1', 1589861343, '__ci_last_regenerate|i:1589861343;has_loggedin|b:1;id|s:1:\"2\";user_id|s:32:\"afb91ef692fd08c445e8cb1bab2ccf9c\";email|s:7:\"petugas\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('et53e9tsvhv9f1aqp5mbnnce6r96e8k9', '::1', 1589899422, '__ci_last_regenerate|i:1589899422;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('fd3ni028c29e416gtpr6ugqfakdu4f8m', '::1', 1589396244, ''),
('fh56orub94f84ol7h9i794h694muk60g', '::1', 1589897251, '__ci_last_regenerate|i:1589897251;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('fiekits86s48l84djrnpf5u7tenm0sct', '::1', 1589299553, '__ci_last_regenerate|i:1589299553;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('fonhmgd4qei189po27ahrdjm1s4523f3', '::1', 1589895336, '__ci_last_regenerate|i:1589895336;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('fqck495dtq8kme08bnpl7a1k3bv969uf', '::1', 1589166596, '__ci_last_regenerate|i:1589166596;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('fqp3stgr2b7bc0v2j3rp414knpfmihra', '::1', 1589894456, '__ci_last_regenerate|i:1589894350;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('fs95oe60e8kpt5r7d7gpouun84hlhfga', '::1', 1589259344, '__ci_last_regenerate|i:1589259344;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('g8e4k85emo5838q1b5h2rj143ka5jffh', '::1', 1589140163, '__ci_last_regenerate|i:1589140163;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('g8f2ct867hac8guie8ruub3qe84a31b1', '::1', 1589899739, '__ci_last_regenerate|i:1589899739;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('ghmnvnasrggja8n1acqllmsli4alih3k', '::1', 1589163727, '__ci_last_regenerate|i:1589163727;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('gjqp48825s4mf3m4lrg58bl7bdbuiaqu', '::1', 1589399417, ''),
('gq0u7usla6p9ut1u0sid9sc0drrcnafl', '::1', 1589917848, '__ci_last_regenerate|i:1589917848;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('gqeigdhr87h8bgo8g8mmcfbhgco1ddug', '::1', 1589900365, '__ci_last_regenerate|i:1589900365;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('gu30b04lb5h9n4raoej3j397ni0lng95', '::1', 1589261112, '__ci_last_regenerate|i:1589261112;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('gu7m47t23qfgsgu1f0vboqpo0u683g09', '::1', 1589398379, ''),
('hce2tvbepc0k9s8qg5m6a5stc1emvdlf', '::1', 1589942502, '__ci_last_regenerate|i:1589942502;user_id|s:32:\"11d7141866f86083c643b476b86e5ae3\";password|s:32:\"d41d8cd98f00b204e9800998ecf8427e\";email|s:33:\"sigit.istriyanto@bsminsbroker.com\";has_loggedin|b:1;'),
('hcsfqo8cq9j3c6vtl7vcvk8v8ccklc4c', '::1', 1590233674, '__ci_last_regenerate|i:1590233674;'),
('hl942erlp4443ggihue34u2g4lj2olg4', '::1', 1589258739, '__ci_last_regenerate|i:1589258739;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('hm2hojo3gefk7nbm50tobrio3uu230g1', '::1', 1589386641, '__ci_last_regenerate|i:1589386413;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('hms5moeln1d18k4pr16dathfcv4gedpr', '::1', 1590213437, '__ci_last_regenerate|i:1590213244;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),
('hnsnad90c06bedbti1kfna5q1gdnjuoj', '::1', 1590194836, '__ci_last_regenerate|i:1590194836;user_id|s:32:\"335b27374fdc6e0eac71b3ae4112907c\";password|s:32:\"d41d8cd98f00b204e9800998ecf8427e\";email|s:25:\"root@warungkoperasi.my.id\";has_loggedin|b:1;'),
('hrigcg1to62mfmhqlpevqv90r4umsitf', '::1', 1589868393, '__ci_last_regenerate|i:1589868393;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('i8m7nthp8d1etap4597v2j5d0urs536g', '::1', 1589918277, '__ci_last_regenerate|i:1589918277;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('iblcaclk304pbrujjj1n0a4rj8lpn228', '::1', 1589161754, '__ci_last_regenerate|i:1589161754;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('ifoen0ok9a817quhgdmm01491qlpo5a9', '::1', 1589402227, ''),
('ii2rvmei9bt6davso1irrmkug3bm6q13', '::1', 1590034383, '__ci_last_regenerate|i:1589988235;user_id|s:32:\"11d7141866f86083c643b476b86e5ae3\";password|s:32:\"d41d8cd98f00b204e9800998ecf8427e\";email|s:33:\"sigit.istriyanto@bsminsbroker.com\";has_loggedin|b:1;'),
('indse4mg8e242a7e6ifmu94mbf7r8opq', '::1', 1590215245, '__ci_last_regenerate|i:1590215245;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),
('iqvvebhe11p040u84rrshhg72qaahknv', '::1', 1590211199, '__ci_last_regenerate|i:1590211199;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),
('j1lt85ajhlqh4ea201g8esgc4vmvbrfb', '::1', 1589395902, ''),
('j6k0sl4fqkg2m1ful6kqrbr2m42omd54', '::1', 1589394115, ''),
('jedkgjuqb0oulpa5d2p837l81eourc4a', '::1', 1590210601, ''),
('jkfvv0a23abihuic1npo97vt25jkve8i', '::1', 1590212448, '__ci_last_regenerate|i:1590212448;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),
('jpb4dcld14iv4f895irup32v9tgdsq5h', '::1', 1589858046, '__ci_last_regenerate|i:1589858046;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('jpgnds1olqk9rqthova4m6v87t41o61m', '::1', 1589901495, '__ci_last_regenerate|i:1589901495;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('jrk1jceb17q19cbj4jnd4kp9ak7a42nh', '::1', 1589356574, '__ci_last_regenerate|i:1589356574;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('js6l9r8292p2o5t2hd4ohfjuh76ok31f', '::1', 1589164106, '__ci_last_regenerate|i:1589164106;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('k7n53145ph20gubaibc75rkab4p4q1co', '::1', 1589396638, ''),
('k8gu3cioce1ttt77op72sot1atl6s8vj', '::1', 1590208584, '__ci_last_regenerate|i:1590208584;has_loggedin|b:1;id|s:2:\"16\";user_id|s:32:\"335b27374fdc6e0eac71b3ae4112907c\";email|s:33:\"sigit.istriyanto@bsminsbroker.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";'),
('k9oklq6vldkgcjsndv9p5g758om3mchu', '::1', 1589162969, '__ci_last_regenerate|i:1589162969;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('kfjabqen297m5am61qblqttd7u9em8u4', '::1', 1589896009, '__ci_last_regenerate|i:1589896009;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('kl0resm9vbhsip5ci5tuo29c9hags8t4', '::1', 1589939650, '__ci_last_regenerate|i:1589939650;'),
('ku5bf18r9hk7a6b24fdmrhjjrqnh771e', '::1', 1589860680, '__ci_last_regenerate|i:1589860680;has_loggedin|b:1;id|s:1:\"2\";user_id|s:32:\"afb91ef692fd08c445e8cb1bab2ccf9c\";email|s:7:\"petugas\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('kvdqe4jv891a9b44uvvm02ekh49in1su', '::1', 1589896592, '__ci_last_regenerate|i:1589896592;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('l1aanumpqjkakupprvuer730qgdrdc7d', '::1', 1590208239, '__ci_last_regenerate|i:1590208239;has_loggedin|b:1;id|s:2:\"16\";user_id|s:32:\"335b27374fdc6e0eac71b3ae4112907c\";email|s:33:\"sigit.istriyanto@bsminsbroker.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";'),
('l5n8gffhgedf32lrqi61ic6uahtqbct6', '::1', 1589182288, '__ci_last_regenerate|i:1589182288;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('l8knckohjo7nn8pr3a45361egnn183j3', '::1', 1589208553, '__ci_last_regenerate|i:1589208553;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('llet9qksv5ibtkvad54d3pgbdt4vqu8f', '::1', 1589940021, '__ci_last_regenerate|i:1589940021;'),
('mcrb7ckojpkv1phahedsc9vtjap2vrop', '::1', 1590210314, '__ci_last_regenerate|i:1590210314;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('mls9ci8919cbhpbiij4542dghte4m360', '::1', 1589898102, '__ci_last_regenerate|i:1589898102;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('mtan0ob1ju54out51gj3nmejvtkke1o1', '::1', 1589919428, '__ci_last_regenerate|i:1589919428;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('n2ulhpip0megfgpa5iis5cp5b2enec5t', '::1', 1589938665, '__ci_last_regenerate|i:1589938665;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('n8gklb4bps35sscs8h638v32vg9ku39u', '::1', 1589263613, '__ci_last_regenerate|i:1589263613;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('nbfhtpfvnkq7kvo7tqmgcbiakpr54aq5', '::1', 1589255486, '__ci_last_regenerate|i:1589255486;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('ncutdvgf110sltrtr2rmgvdkr53ptc2k', '::1', 1590195171, '__ci_last_regenerate|i:1590195171;user_id|s:32:\"335b27374fdc6e0eac71b3ae4112907c\";password|s:32:\"d41d8cd98f00b204e9800998ecf8427e\";email|s:25:\"root@warungkoperasi.my.id\";has_loggedin|b:1;'),
('nes72rf1hli9j1jqijsdkhjijoohfnja', '::1', 1589160962, '__ci_last_regenerate|i:1589160962;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('niiff4sh6bbev99b21n9u3esiqa9udmn', '::1', 1590234406, '__ci_last_regenerate|i:1590234406;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:18:\"jamil123@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),
('njb889h8fg2a40mvam50dii503n8ojv9', '::1', 1589181804, '__ci_last_regenerate|i:1589181804;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('nm9vju88lvqovasupdi4hupr3aas9skg', '::1', 1590207214, '__ci_last_regenerate|i:1590207214;has_loggedin|b:1;id|s:2:\"16\";user_id|s:32:\"335b27374fdc6e0eac71b3ae4112907c\";email|s:33:\"sigit.istriyanto@bsminsbroker.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";'),
('od3gg4ti1e8b3vpitivjdr7o8gnl4v1h', '::1', 1589894231, '__ci_last_regenerate|i:1589894231;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('oht1g0gc9cq0otoc4bdsvmm84q0qepvf', '::1', 1589139733, '__ci_last_regenerate|i:1589139733;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('ol7q9rq73aq0gplse9jj1459j8q1m832', '::1', 1590209736, '__ci_last_regenerate|i:1590209736;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('omesjbbbjedq512luelh7pp8b7kmmr36', '::1', 1590214241, '__ci_last_regenerate|i:1590214241;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),
('p2jh8ocha2pp3lfrjj04e0lucpc5ova0', '::1', 1589165443, '__ci_last_regenerate|i:1589165443;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('pav01u4c1aum80p13hadpqatj60jti0h', '::1', 1589392955, ''),
('pbmqp1asm2n7b5vlhbo4jbiigkh22k9o', '::1', 1589920933, '__ci_last_regenerate|i:1589920933;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('pcrni6rol4oo61uo7sndhtm4sg37hdma', '::1', 1589852237, '__ci_last_regenerate|i:1589852237;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('ppe4lmqb1lp4nirjqgmju4fknv1dkcke', '::1', 1589185641, '__ci_last_regenerate|i:1589185641;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('pplca5no41d9pas4uego11mon1t433o8', '::1', 1589897553, '__ci_last_regenerate|i:1589897553;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('qhccqfe8ddnvv2jp04olqcr98hqjf5jt', '::1', 1589869865, '__ci_last_regenerate|i:1589869847;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('qsduqu14kpco7ijk0el9it56m645qvul', '::1', 1589263915, '__ci_last_regenerate|i:1589263915;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('qube5eiun788qtrjnp6kk78juh1don2u', '::1', 1590213831, '__ci_last_regenerate|i:1590213831;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),
('r1lv6n5a44e7fhqk2k4uoc8ln9j29scl', '::1', 1590213489, ''),
('ra35jmfr7j9jui1974kkk447h4recr2j', '::1', 1589262967, '__ci_last_regenerate|i:1589262967;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('rm2l5ntona9lupitpp0dcv5424i9goeo', '::1', 1589940359, '__ci_last_regenerate|i:1589940359;'),
('rqq0ot402p8kd59krumt6nr05j3d2pa9', '::1', 1589162646, '__ci_last_regenerate|i:1589162646;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('s52ve3q1as44lo3tpukbiml4gmqbeadd', '::1', 1589382007, '__ci_last_regenerate|i:1589382007;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('sjqdt8j22to3vmio6lu4bm663t36afan', '::1', 1589161434, '__ci_last_regenerate|i:1589161434;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('t3mcj7hn6lmabe2jm50sc49dv91ufpuc', '::1', 1590213244, '__ci_last_regenerate|i:1590213244;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),
('tfg3kab064s3855k71a0qnomhc25f3rl', '::1', 1589167400, '__ci_last_regenerate|i:1589167400;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('thj6nfsgd96rjn7j2tkgie5l7r6hgc5k', '::1', 1589184625, '__ci_last_regenerate|i:1589184625;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('u2h27npree5acd3rh3v16afrepsu4e56', '::1', 1589868904, '__ci_last_regenerate|i:1589868904;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('u3l2v9kakife2oa2suhnrquelmh06e8e', '::1', 1589184320, '__ci_last_regenerate|i:1589184320;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('ubi89osvrstqd89m3osq8t70n3ek4obd', '::1', 1590215587, '__ci_last_regenerate|i:1590215587;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),
('udga81j6j82ibdkgo1psjb8dmpdkr7q7', '::1', 1589894855, '__ci_last_regenerate|i:1589894855;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('udleb41v9emabrnb2a0td238fv6k0tuo', '::1', 1589918628, '__ci_last_regenerate|i:1589918628;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('ukt1hu7bn1pvc18rnhc15aaor29n43qi', '::1', 1590214551, '__ci_last_regenerate|i:1590214551;has_loggedin|b:1;id|s:1:\"1\";user_id|s:32:\"3543841144e24ed4dc5ef31c9c452d5f\";email|s:8:\"kasatpel\";password|s:32:\"202cb962ac59075b964b07152d234b70\";blokir|s:1:\"0\";'),
('vk79t6j2jpjpp7lp483h4j1r30rsmbsd', '::1', 1589896906, '__ci_last_regenerate|i:1589896906;has_loggedin|b:1;id|s:1:\"3\";user_id|s:32:\"2f87909b09f48de15ad99693f4d7f0b8\";email|s:7:\"pelapor\";password|s:32:\"202cb962ac59075b964b07152d234b70\";'),
('vne0rdhs375ql2lu217i0frfjosuhjhq', '::1', 1590239089, '__ci_last_regenerate|i:1590234406;has_loggedin|b:1;id|s:2:\"18\";user_id|s:32:\"202cb962ac59075b964b07152d234b70\";email|s:18:\"jamil123@gmail.com\";password|s:32:\"c4ca4238a0b923820dcc509a6f75849b\";blokir|s:1:\"0\";'),
('vrj93j3voknj5qb93r73hdpjr2q30hhh', '::1', 1589387474, '__ci_last_regenerate|i:1589387474;');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori_value` varchar(30) DEFAULT NULL,
  `kategori` varchar(30) DEFAULT NULL,
  `kategori_color` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori_value`, `kategori`, `kategori_color`) VALUES
(1, 'omdk', 'OMDK', '#e74a3b'),
(2, 'ot', 'OT', '#6f42c1'),
(3, 'pengemis', 'Pengemis', '#ad8b4c'),
(4, 'pengamen', 'Pengamen', '#afbf43'),
(5, 'gelandangan', 'Gelandangan', '#0080ff'),
(6, 'psikiotik', 'Psikiotik', '#5eff00'),
(7, 'psk', 'PSK', '#4fc2d6'),
(8, 'pedagang_asongan', 'Pedagang Asongan', 'db5ed3');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
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
  `foto_tindakan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `nama_laporan`, `kategori`, `deskripsi`, `lokasi`, `foto`, `status_laporan`, `report_by`, `tanggal_lapor`, `verifikasi_by`, `tanggal_verifikasi`, `proses_by`, `tanggal_proses`, `tanggal_selesai`, `tindakan`, `foto_tindakan`) VALUES
(33, 'orang terlantar', 'ot', 'ada orang terlantar', 'jl marunda baru', 'http://localhost/adefathudin/falaq/assets/img/laporan/81dc9bdb52d04dc20036dbd8313ed0555ec8c66692c8a.jpg', 'Selesai', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-23 06:55:26', '202cb962ac59075b964b07152d234b70', '2020-05-23 01:53:51', 'dc5c7986daef50c1e02ab09b442ee34f', '2020-05-23 01:54:36', '2020-05-23 01:55:26', 'orang terlantar mempunyai keluarga, sehingga', 'http://localhost/adefathudin/falaq/assets/img/laporan/tindakan/dc5c7986daef50c1e02ab09b442ee34f5ec8c8de86089.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(5);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `notifikasi_id` int(15) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `level` varchar(15) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `judul` varchar(50) NOT NULL,
  `isi` varchar(250) NOT NULL,
  `baca` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`notifikasi_id`, `user_id`, `level`, `tanggal`, `judul`, `isi`, `baca`) VALUES
(82, '202cb962ac59075b964b07152d234b70', '', '2020-05-23 06:34:41', 'Selamat Datang di PMKS Sistem', '', 0),
(83, 'dc5c7986daef50c1e02ab09b442ee34f', '', '2020-05-23 06:36:24', 'Selamat Datang di PMKS Sistem', '', 0),
(84, '81dc9bdb52d04dc20036dbd8313ed055', '', '2020-05-23 06:38:41', 'Selamat Datang di PMKS Sistem', '', 0),
(85, '', 'kasatpel', '2020-05-23 06:44:54', 'Laporan \"orang terlantar\"', 'Laporan baru \"orang terlantar\" membutuhkan verifikasi kasatpel', 0),
(86, '81dc9bdb52d04dc20036dbd8313ed055', '', '2020-05-23 06:44:54', 'Laporan \"orang terlantar\"', 'Laporan baru \"orang terlantar\" telah dibuat dan sedang  dilakukan verifikasi oleh kasatpel', 0),
(87, '', 'petugas', '2020-05-23 06:53:51', 'Laporan \"orang terlantar\"', 'Laporan baru \"orang terlantar\" telah diVerifikasi', 0),
(88, '', 'petugas', '2020-05-23 06:54:36', 'Laporan \"orang terlantar\"', 'Laporan baru \"orang terlantar\" telah diProses', 0),
(89, '', 'petugas', '2020-05-23 06:55:26', 'Laporan \"orang terlantar\"', 'Laporan baru \"orang terlantar\" telah diFollow_Up', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_detail`
--

CREATE TABLE `users_detail` (
  `id` int(15) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `nik` varchar(15) NOT NULL,
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
  `joined` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_detail`
--

INSERT INTO `users_detail` (`id`, `user_id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `email`, `nomor_hp`, `alamat`, `rt`, `rw`, `profil`, `ktp`, `level`, `verifikasi`, `aktif`, `joined`) VALUES
(19, '202cb962ac59075b964b07152d234b70', '123', 'jamil', '', '0000-00-00', '', 'jamil123@gmail.com', '', '', '', '', 'default.png', NULL, 'kasatpel', 1, 1, '2020-05-23 01:34:41'),
(20, 'dc5c7986daef50c1e02ab09b442ee34f', '001', 'jamil l', 'sumedang', '2003-01-01', 'L', 'jamil1234@gmail.com', '081358907092', 'jl bungur', '', '', 'default.png', 'assets/img/user/ktp/KTP-dc5c7986daef50c1e02ab09b442ee34f2.jpg', 'petugas', 1, 1, '2020-05-23 01:36:24'),
(21, '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'jamil m', 'jawa', '2002-08-20', 'L', 'jamil12345@gmail.com', '081312641315', 'wdwadwad', '2', '3', 'default.png', 'assets/img/user/ktp/KTP-81dc9bdb52d04dc20036dbd8313ed055.jpg', 'pelapor', 1, 1, '2020-05-23 01:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `users_login`
--

CREATE TABLE `users_login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(360) NOT NULL,
  `blokir` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`id`, `user_id`, `email`, `password`, `blokir`) VALUES
(18, '202cb962ac59075b964b07152d234b70', 'jamil123@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(19, 'dc5c7986daef50c1e02ab09b442ee34f', 'jamil1234@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(20, '81dc9bdb52d04dc20036dbd8313ed055', 'jamil12345@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart_by_jenis`
--
ALTER TABLE `chart_by_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_by_month`
--
ALTER TABLE `chart_by_month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`notifikasi_id`);

--
-- Indexes for table `users_detail`
--
ALTER TABLE `users_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chart_by_jenis`
--
ALTER TABLE `chart_by_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `chart_by_month`
--
ALTER TABLE `chart_by_month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `notifikasi_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `users_detail`
--
ALTER TABLE `users_detail`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
