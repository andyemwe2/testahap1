-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.20 - MySQL Community Server (GPL)
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table kk.biodata
CREATE TABLE IF NOT EXISTS `biodata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table kk.biodata: ~14 rows (approximately)
/*!40000 ALTER TABLE `biodata` DISABLE KEYS */;
INSERT INTO `biodata` (`id`, `nama`, `gender`) VALUES
	(1, 'Ayu', 'P'),
	(2, 'Doni', 'L'),
	(3, 'Yasina', 'P'),
	(4, 'Irul', 'L'),
	(5, 'Abdis', 'L'),
	(6, 'Adi', 'L'),
	(7, 'Aji', 'L'),
	(8, 'Reni', 'P'),
	(9, 'Sri', 'P'),
	(10, 'Wilujeng', 'P'),
	(11, 'Andri', 'L'),
	(12, 'Galih', 'L'),
	(13, 'Apri', 'L'),
	(14, 'Eko', 'L'),
	(15, 'Mamlu', 'P'),
	(16, 'Adit', 'L');
/*!40000 ALTER TABLE `biodata` ENABLE KEYS */;


-- Dumping structure for table kk.keturunan
CREATE TABLE IF NOT EXISTS `keturunan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pernikahan` int(11) NOT NULL DEFAULT '0',
  `id_anak` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table kk.keturunan: ~8 rows (approximately)
/*!40000 ALTER TABLE `keturunan` DISABLE KEYS */;
INSERT INTO `keturunan` (`id`, `id_pernikahan`, `id_anak`) VALUES
	(1, 1, 3),
	(2, 1, 4),
	(3, 1, 5),
	(4, 1, 6),
	(5, 2, 11),
	(6, 3, 12),
	(7, 3, 13),
	(8, 5, 14),
	(9, 5, 15),
	(10, 5, 16);
/*!40000 ALTER TABLE `keturunan` ENABLE KEYS */;


-- Dumping structure for table kk.pernikahan
CREATE TABLE IF NOT EXISTS `pernikahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_suami` int(11) NOT NULL DEFAULT '0',
  `id_istri` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table kk.pernikahan: ~4 rows (approximately)
/*!40000 ALTER TABLE `pernikahan` DISABLE KEYS */;
INSERT INTO `pernikahan` (`id`, `id_suami`, `id_istri`) VALUES
	(1, 2, 1),
	(2, 7, 3),
	(3, 4, 8),
	(4, 5, 9),
	(5, 6, 10);
/*!40000 ALTER TABLE `pernikahan` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
