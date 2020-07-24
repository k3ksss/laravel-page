-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 21, 2020 at 11:48 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventarizacija`
--

-- --------------------------------------------------------

--
-- Table structure for table `darbinieki`
--

DROP TABLE IF EXISTS `darbinieki`;
CREATE TABLE IF NOT EXISTS `darbinieki` (
  `id` int(11) NOT NULL,
  `vards` varchar(255) DEFAULT NULL,
  `uzvards` varchar(255) DEFAULT NULL,
  `amats` varchar(100) NOT NULL,
  `epasts` varchar(255) DEFAULT NULL,
  `telefona_numurs` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `darbinieki`
--

INSERT INTO `darbinieki` (`id`, `vards`, `uzvards`, `amats`, `epasts`, `telefona_numurs`, `created_at`, `updated_at`) VALUES
(1, 'Janis', 'Berzins', '', 'Berzins@gmail.com', '11111112', '2020-06-30 21:23:34', '2020-06-30 18:23:34'),
(2, 'Peteris', 'Ozols', '', 'ozols@gmail.com', '22222222', '2020-06-28 21:00:00', '2020-06-29 21:00:00'),
(3, 'Ilze', 'luse', '', 'luse@gmail.com', '33333333', '2020-06-28 21:00:00', '2020-06-29 21:00:00'),
(4, 'asd', 'asdasd', '', 'asdasd', '456456', NULL, NULL),
(5, 'asda', 'asdasa', '', 'ssssasda', '456', NULL, NULL),
(6, 'adwada', 'dawdasrs', '', '3wfefwef', '324234', NULL, NULL),
(7, 'rtytg', 'astrat', '', '2wadsa', '12412', NULL, NULL),
(8, 'astta', 'astaf', '', '3tsfsdfa', '12512', NULL, NULL),
(9, 'sada', 'Afsf', '', 'SAfASF', '124112', NULL, NULL),
(10, 'asas', 'afaf', '', 'asr', '214', NULL, NULL),
(11, 'asfa', 'afas', '', 'awfaw', '132435', NULL, NULL),
(12, 'asd', 'ads', '', 'aaada', '124', NULL, NULL),
(13, 'asdawa', 'fsfasd', '', 'gfds', '1234', NULL, NULL),
(14, 'afasf', 'aasd', '', 'adafa', '124', NULL, NULL),
(15, 'asdfg', 'asdfg', '', 'asdfg', '1234', NULL, NULL),
(16, 'asdfg', 'asdfgh', '', 'asdfg', '12345', NULL, NULL),
(17, 'asdfggh', 'asddfg', '', 'afesgds', '234546', NULL, NULL),
(18, 'aetsryet', 'awesry', '', 'waestrd', '215367', NULL, NULL),
(19, 'kiyjuhy', 'jtgr', '', 'tjygr', '4656', '2020-07-07 07:58:01', '2020-07-07 07:58:01'),
(21, 'hrtgefw', 'gaefw', '', 'aseht', '25323', NULL, NULL),
(22, 'afasf', 'asfas', 'dfgh', 'fasfas', '345', '2020-07-21 09:37:02', '2020-07-21 06:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `filiales`
--

DROP TABLE IF EXISTS `filiales`;
CREATE TABLE IF NOT EXISTS `filiales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filiales_nosaukums` varchar(255) DEFAULT NULL,
  `adrese` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `filiales_nosaukums` (`filiales_nosaukums`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filiales`
--

INSERT INTO `filiales` (`id`, `filiales_nosaukums`, `adrese`, `created_at`, `updated_at`) VALUES
(1, 'Liepas', '', '2020-06-30 22:06:30', '2020-06-30 19:06:30'),
(2, 'Zara', '', '2020-06-28 21:00:00', '2020-06-29 21:00:00'),
(3, 'Neste', '', '2020-06-28 21:00:00', '2020-06-29 21:00:00'),
(4, NULL, '', NULL, NULL),
(5, NULL, '', NULL, NULL),
(6, NULL, '', NULL, NULL),
(7, NULL, '', NULL, NULL),
(8, NULL, '', NULL, NULL),
(9, NULL, '', NULL, NULL),
(10, 'dfg', 'sdf', '2020-07-21 09:28:16', '2020-07-21 06:28:16'),
(11, NULL, '', NULL, NULL),
(12, 'asdf', '', NULL, NULL),
(13, 'dfefg', 'erftg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kabineti`
--

DROP TABLE IF EXISTS `kabineti`;
CREATE TABLE IF NOT EXISTS `kabineti` (
  `id` int(11) NOT NULL,
  `kabineta_nr` varchar(255) DEFAULT NULL,
  `filiales_nosaukums` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `filiales_kabienti` (`filiales_nosaukums`),
  KEY `kabineta_nr` (`kabineta_nr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kabineti`
--

INSERT INTO `kabineti` (`id`, `kabineta_nr`, `filiales_nosaukums`) VALUES
(1, '10', 'sadfgfh'),
(2, '11', '2'),
(3, '12', '2'),
(4, '13', NULL),
(5, '456', NULL),
(6, '3124', 'Neste'),
(7, '12324', '6'),
(8, '1324', '2'),
(9, '234', '3'),
(10, '124', '11'),
(11, '3453', 'Neste'),
(12, '234', '0'),
(13, '234', 'Neste');

-- --------------------------------------------------------

--
-- Table structure for table `mazvertigie_lidzekli`
--

DROP TABLE IF EXISTS `mazvertigie_lidzekli`;
CREATE TABLE IF NOT EXISTS `mazvertigie_lidzekli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipa_nr` varchar(255) DEFAULT NULL,
  `nosaukums` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mazvertigie_lidzekli`
--

INSERT INTO `mazvertigie_lidzekli` (`id`, `tipa_nr`, `nosaukums`, `created_at`, `updated_at`) VALUES
(1, '100', 'asdfgghn', '2020-07-21 09:41:35', '2020-07-21 06:41:35'),
(2, '101', '22222222', '2020-06-28 21:00:00', '2020-06-29 21:00:00'),
(3, '103', '33333334', '2020-06-30 23:28:39', '2020-06-30 20:28:39'),
(4, '231', '1345', NULL, NULL),
(5, '234', '432', NULL, NULL),
(6, '132345', '134253', NULL, NULL),
(7, '132435', '12243', NULL, NULL),
(8, '1234567', '234567', NULL, NULL),
(9, '654322', '5432', NULL, NULL),
(10, '5432', '5432345', NULL, NULL),
(11, '124354', '13425', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pamatlidzekli`
--

DROP TABLE IF EXISTS `pamatlidzekli`;
CREATE TABLE IF NOT EXISTS `pamatlidzekli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr` int(11) DEFAULT NULL,
  `nosaukums` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1234 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pamatlidzekli`
--

INSERT INTO `pamatlidzekli` (`id`, `nr`, `nosaukums`, `created_at`, `updated_at`) VALUES
(1, 111, 'Pc', '2020-06-28 21:00:00', '2020-06-29 21:00:00'),
(2, 222, 'Dators', '2020-06-28 21:00:00', '2020-06-29 21:00:00'),
(3, 333, 'tastaturas', '2020-06-30 23:23:13', '2020-06-30 20:23:13'),
(4, 1234, 'asgdfgn', NULL, NULL),
(5, 234, 'dfgsd', NULL, NULL),
(6, 135, 'waefsdg', NULL, NULL),
(7, 345, 'asdf', NULL, NULL),
(8, 51243, 'asd', NULL, NULL),
(9, 76543, 'srthjy', NULL, NULL),
(10, 6543, 'hjhr', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pavadzime`
--

DROP TABLE IF EXISTS `pavadzime`;
CREATE TABLE IF NOT EXISTS `pavadzime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mazvertigie_lidzekli_id` int(11) DEFAULT NULL,
  `pamatlidzekli_id` int(11) DEFAULT NULL,
  `daudzums` int(11) DEFAULT NULL,
  `adrese_no` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `KabinetsNO` varchar(255) NOT NULL,
  `adrese_uz` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `KabinetsUZ` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `summa` decimal(10,2) DEFAULT NULL,
  `persona_izsniedza_id` int(255) DEFAULT NULL,
  `persona_sanema_id` int(255) DEFAULT NULL,
  `datums` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pamtlidzekli` (`pamatlidzekli_id`),
  KEY `persona_izsniedza` (`persona_izsniedza_id`),
  KEY `mazvertigie_lidzekli_id` (`mazvertigie_lidzekli_id`),
  KEY `persona_sanema_id` (`persona_sanema_id`),
  KEY `KabinetsNO` (`KabinetsNO`),
  KEY `adrese_no` (`adrese_no`),
  KEY `adrese_uz` (`adrese_uz`,`KabinetsUZ`),
  KEY `KabinetsUZ` (`KabinetsUZ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
