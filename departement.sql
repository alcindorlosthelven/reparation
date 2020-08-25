-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table sge.departement
DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departement` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table sge.departement: 10 rows
DELETE FROM `departement`;
/*!40000 ALTER TABLE `departement` DISABLE KEYS */;
INSERT INTO `departement` (`id`, `departement`) VALUES
	(1, 'Artibonite'),
	(2, 'Centre'),
	(3, 'Grand\\\'Anse'),
	(4, 'Nippes'),
	(5, 'Nord'),
	(6, 'Nord-Est'),
	(7, 'Nord-Ouest'),
	(8, 'Ouest'),
	(9, 'Sud'),
	(10, 'Sud-Est');
/*!40000 ALTER TABLE `departement` ENABLE KEYS */;

-- Dumping structure for table sge.ville
DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table sge.ville: 2 rows
DELETE FROM `ville`;
/*!40000 ALTER TABLE `ville` DISABLE KEYS */;
INSERT INTO `ville` (`id`, `ville`) VALUES
	(11, 'port-au-prince'),
	(10, 'petit-goave');
/*!40000 ALTER TABLE `ville` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
