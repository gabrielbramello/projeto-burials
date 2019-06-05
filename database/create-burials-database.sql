SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE IF NOT EXISTS `chain` (
  `dataset` int(11) NOT NULL,
  `pdb` char(5) NOT NULL,
  `sequence` text NOT NULL,
  `burials` text NOT NULL,
  PRIMARY KEY (`dataset`,`pdb`),
  UNIQUE KEY `unique_dataset_pdb` (`dataset`,`pdb`),
  KEY `pdb` (`pdb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dataset` int(11) NOT NULL,
  `windowsize` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dataset` (`dataset`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `dataset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nlayers` tinyint(4) UNSIGNED NOT NULL,
  `size` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `prediction` (
  `configuration` int(11) NOT NULL,
  `pdb` char(5) NOT NULL,
  `burials` text NOT NULL,
  `accuracy` double NOT NULL,
  KEY `pdb` (`pdb`),
  KEY `configuration` (`configuration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `chain`
  ADD CONSTRAINT `chain_ibfk_1` FOREIGN KEY (`dataset`) REFERENCES `dataset` (`id`);

ALTER TABLE `configuration`
  ADD CONSTRAINT `configuration_ibfk_1` FOREIGN KEY (`dataset`) REFERENCES `dataset` (`id`);

ALTER TABLE `prediction`
  ADD CONSTRAINT `prediction_ibfk_1` FOREIGN KEY (`pdb`) REFERENCES `chain` (`pdb`),
  ADD CONSTRAINT `prediction_ibfk_2` FOREIGN KEY (`configuration`) REFERENCES `configuration` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
