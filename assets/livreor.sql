-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 25, 2025 at 11:33 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livreor`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `commentaire` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_utilisateur` int UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'Premier commentaire', 1, '2025-08-08 10:36:53'),
(2, 'Une page simple mais fonctionelle', 1, '2025-08-08 11:39:32'),
(3, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:28:32'),
(4, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:28:41'),
(5, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:28:41'),
(6, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:28:41'),
(7, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:16'),
(8, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:16'),
(9, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:16'),
(10, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:16'),
(11, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:16'),
(12, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(13, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(38, 'Il pleut dehors, j&#039;ai pas envie de sortir.', 4, '2025-09-25 09:56:19'),
(15, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(16, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(17, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(18, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(19, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(20, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(21, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(22, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(23, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(24, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(25, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(26, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(27, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(28, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(29, 'Un commentaire qui veut rien dire', 1, '2025-08-08 15:29:17'),
(30, 'J&#039;ai passé des belles vacances!!', 1, '2025-08-25 09:32:59'),
(31, 'Tes&amp;214é&#039;&amp;é', 1, '2025-08-25 11:05:42'),
(32, 'Tes&amp;214é&#039;&amp;é', 1, '2025-08-25 11:05:56'),
(33, 'eeeeeeeeeeeeeeeeeeeee', 1, '2025-08-25 11:10:29'),
(34, '&#039;&#039;&#039;&#039; J&#039;ai un croissanté', 1, '2025-08-25 15:11:59'),
(35, 'un petit ane sur une colline', 1, '2025-08-25 15:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'Cosmin5', '$2y$10$Eay/9mIFUDDDNDInXVdTX.CaQc7Zr45zGtvKrIcZGvOF.TVYjCQzW'),
(2, 'Tester', '$2y$10$o1byl8KRIKLAGd.8QkWHQOsEsQsNZfJq/A08.3AX0V6lb80C4yFp6'),
(3, 'LoginTest', '$2y$10$W96KtoQuYQwFUs7Kefl0V..IfCSVtubNdeD7H2pKpS2JPEH.wwVoi'),
(4, 'tester3', '$2y$10$nSa64VPTIIdD4fetfFTeqOVhipJXXdDbHdH0am5LfgDszciNrW9KG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
