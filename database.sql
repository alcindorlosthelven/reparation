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

-- Dumping structure for table reparation.categorie
DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table reparation.categorie: ~4 rows (approximately)
DELETE FROM `categorie`;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Dumping structure for table reparation.configuration
DROP TABLE IF EXISTS `configuration`;
CREATE TABLE IF NOT EXISTS `configuration` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `valeur` text DEFAULT NULL,
  `categorie` enum('image','text','video','non_modifiable') DEFAULT 'image',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `nom` (`nom`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table reparation.configuration: 6 rows
DELETE FROM `configuration`;
/*!40000 ALTER TABLE `configuration` DISABLE KEYS */;
INSERT INTO `configuration` (`id`, `nom`, `valeur`, `categorie`) VALUES
	(1, 'licence_email', 'los-framework@gmail.com', 'non_modifiable'),
	(2, 'licence_code', '53-240-936-26', 'non_modifiable'),
	(3, 'licence_url', 'http://licence-serveur-sge.bioshaiti.com/licence-serveur-sge', 'text'),
	(4, 'logo', 'app/DefaultApp/public/image/logo.png', 'image'),
	(5, 'background', 'app/DefaultApp/public/image/bc.jpg', 'image'),
	(6, 'transparence', '80', 'text');
/*!40000 ALTER TABLE `configuration` ENABLE KEYS */;

-- Dumping structure for table reparation.demmande_reparation
DROP TABLE IF EXISTS `demmande_reparation`;
CREATE TABLE IF NOT EXISTS `demmande_reparation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_succursal` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_agent` int(11) DEFAULT NULL,
  `id_reparateur` varchar(50) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `fichier` varchar(2000) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `statut` varchar(50) DEFAULT 'en attent',
  `note1` varchar(100) DEFAULT 'n/a',
  `note2` varchar(100) DEFAULT 'n/a',
  `preuve` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_demmande_reparation_succursal` (`id_succursal`),
  KEY `FK_demmande_reparation_categorie` (`id_categorie`),
  KEY `FK_demmande_reparation_utilisateur` (`id_agent`),
  CONSTRAINT `FK_demmande_reparation_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_demmande_reparation_succursal` FOREIGN KEY (`id_succursal`) REFERENCES `succursal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_demmande_reparation_utilisateur` FOREIGN KEY (`id_agent`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table reparation.demmande_reparation: ~3 rows (approximately)
DELETE FROM `demmande_reparation`;
/*!40000 ALTER TABLE `demmande_reparation` DISABLE KEYS */;
/*!40000 ALTER TABLE `demmande_reparation` ENABLE KEYS */;

-- Dumping structure for table reparation.departement
DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departement` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table reparation.departement: ~10 rows (approximately)
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

-- Dumping structure for table reparation.succursal
DROP TABLE IF EXISTS `succursal`;
CREATE TABLE IF NOT EXISTS `succursal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_agent` int(11) DEFAULT NULL,
  `id_departement` int(11) DEFAULT NULL,
  `id_ville` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `addresse` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_succursal_utilisateur` (`id_agent`),
  KEY `FK_succursal_departement` (`id_departement`),
  CONSTRAINT `FK_succursal_departement` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id`),
  CONSTRAINT `FK_succursal_utilisateur` FOREIGN KEY (`id_agent`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table reparation.succursal: ~2 rows (approximately)
DELETE FROM `succursal`;
/*!40000 ALTER TABLE `succursal` DISABLE KEYS */;
/*!40000 ALTER TABLE `succursal` ENABLE KEYS */;

-- Dumping structure for table reparation.utilisateur
DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) DEFAULT NULL,
  `id_succursal` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `motdepasse` text DEFAULT NULL,
  `active` enum('oui','non') DEFAULT NULL,
  `statut` enum('1','0') DEFAULT '0',
  `telephone` varchar(50) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  `id_session` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `pseudo` (`pseudo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table reparation.utilisateur: ~5 rows (approximately)
DELETE FROM `utilisateur`;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`id`, `pseudo`, `id_succursal`, `email`, `role`, `nom`, `prenom`, `motdepasse`, `active`, `statut`, `telephone`, `photo`, `id_session`) VALUES
	(1, 'admin', '', NULL, 'administrateur', 'alcindor', 'losthelven', 'b800f865eaa00709b1e37fbbcb0c985d4a775438', 'oui', '1', NULL, NULL, 'e6a3c61b9a9e95da14458e925299ca1f');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

-- Dumping structure for table reparation.ville
DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table reparation.ville: ~2 rows (approximately)
DELETE FROM `ville`;
/*!40000 ALTER TABLE `ville` DISABLE KEYS */;
INSERT INTO `ville` (`id`, `ville`) VALUES
	(10, 'petit-goave'),
	(11, 'port-au-prince');
/*!40000 ALTER TABLE `ville` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
