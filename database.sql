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
INSERT INTO `categorie` (`id`, `categorie`) VALUES
	(1, 'vitre'),
	(2, 'chaise'),
	(3, 'catsss'),
	(4, 'kdhsld');
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
  `description` varchar(2000) DEFAULT NULL,
  `fichier` varchar(2000) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_demmande_reparation_succursal` (`id_succursal`),
  KEY `FK_demmande_reparation_categorie` (`id_categorie`),
  CONSTRAINT `FK_demmande_reparation_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_demmande_reparation_succursal` FOREIGN KEY (`id_succursal`) REFERENCES `succursal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table reparation.demmande_reparation: ~1 rows (approximately)
DELETE FROM `demmande_reparation`;
/*!40000 ALTER TABLE `demmande_reparation` DISABLE KEYS */;
INSERT INTO `demmande_reparation` (`id`, `id_succursal`, `id_categorie`, `description`, `fichier`, `date`) VALUES
	(5, 4, 2, 'ljlkjklkljkljkljkljkljlkj', 'app/DefaultApp/public/fichier/2020-08-212108201641.jpeg,app/DefaultApp/public/fichier/2020-08-212108201641.jpg,app/DefaultApp/public/fichier/2020-08-212108201641.png,app/DefaultApp/public/fichier/2020-08-212108201641.png', '2020-08-21');
/*!40000 ALTER TABLE `demmande_reparation` ENABLE KEYS */;

-- Dumping structure for table reparation.succursal
DROP TABLE IF EXISTS `succursal`;
CREATE TABLE IF NOT EXISTS `succursal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `addresse` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table reparation.succursal: ~1 rows (approximately)
DELETE FROM `succursal`;
/*!40000 ALTER TABLE `succursal` DISABLE KEYS */;
INSERT INTO `succursal` (`id`, `nom`, `addresse`, `telephone`) VALUES
	(4, 'petion ville', 'rue bourgelot # 50', '5566-4345');
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table reparation.utilisateur: 2 rows
DELETE FROM `utilisateur`;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`id`, `pseudo`, `id_succursal`, `email`, `role`, `nom`, `prenom`, `motdepasse`, `active`, `statut`, `telephone`, `photo`, `id_session`) VALUES
	(1, 'admin', '4', NULL, 'administrateur', 'alcindor', 'losthelven', 'b800f865eaa00709b1e37fbbcb0c985d4a775438', 'oui', '1', NULL, NULL, '6ef9f533488dea1c9498e29cfdc11011'),
	(4, 'agent', '4', NULL, 'agent', 'agent', 'agent', '0608c4054662dd902e1314f7e450e3eaa81c1143', 'oui', '1', NULL, NULL, '0fa03f5d17b0ccb336a2f269a33d0cb7');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
