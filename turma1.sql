-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           11.5.2-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for web1
CREATE DATABASE IF NOT EXISTS `web1` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `web1`;

-- Dumping structure for table web1.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `data` date DEFAULT NULL,
  `info` varchar(512) DEFAULT NULL,
  `imagem` varchar(128) DEFAULT NULL,
  `visivel` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table web1.eventos: ~4 rows (approximately)
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` (`id`, `nome`, `data`, `info`, `imagem`, `visivel`) VALUES
	(1, 'Evento 1', '2024-11-04', 'A informação do evento 1 e mais qualquer coisa.', 'https://placehold.co/200x200?text=Evento&nbsp;1', b'1'),
	(2, 'Evento 2', '2024-11-04', 'A informação do evento 2 e mais qualquer coisa.', 'https://placehold.co/200x200?text=Evento&nbsp;2', b'1'),
	(3, 'Evento 3', '2024-11-04', 'A informação do evento 3 e mais qualquer coisa.', 'https://placehold.co/200x200?text=Evento&nbsp;3', b'1'),
	(4, 'Evento 4', NULL, 'A informação do evento 4 e mais qualquer coisa.', 'https://placehold.co/200x200?text=Evento&nbsp;4', b'0');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
