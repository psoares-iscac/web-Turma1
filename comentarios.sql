
-- Dumping structure for table turma1.comentarios
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventoId` int(10) unsigned NOT NULL DEFAULT 0,
  `email` varchar(250) DEFAULT '0',
  `mensagem` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table turma1.comentarios: ~2 rows (approximately)
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` (`id`, `eventoId`, `email`, `mensagem`, `date`) VALUES
	(1, 3, 'psoares@iscac.pt', 'Palestras e seminários muitio interessantes, com uma excelente organização. Recomendo vivamente a todos os que se preocupam com o seu bem estrar.', '2024-07-23'),
	(2, 3, '', 'Não gostei nada, foi uma autêntica vergonha. A organização falhou em muitos aspectos. Enormes filas para participar em qualquer uma das atividades.', '2024-08-10');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
