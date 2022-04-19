-- --------------------------------------------------------
-- Host:                         localhost
-- Versione server:              10.4.21-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database negozio_gbg
DROP DATABASE IF EXISTS `negozio_gbg`;
CREATE DATABASE IF NOT EXISTS `negozio_gbg` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `negozio_gbg`;

-- Dump della struttura di tabella negozio_gbg.carrello
DROP TABLE IF EXISTS `carrello`;
CREATE TABLE IF NOT EXISTS `carrello` (
  `username` char(50) NOT NULL DEFAULT '',
  `nomep` char(50) NOT NULL DEFAULT '',
  `quantita` int(10) unsigned NOT NULL,
  `prezzo` float unsigned DEFAULT NULL,
  PRIMARY KEY (`username`,`nomep`),
  KEY `FK__prodotto` (`nomep`),
  CONSTRAINT `FK__prodotto` FOREIGN KEY (`nomep`) REFERENCES `prodotto` (`nomep`) ON UPDATE CASCADE,
  CONSTRAINT `FK__utente` FOREIGN KEY (`username`) REFERENCES `utente` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_gbg.carrello: ~0 rows (circa)
/*!40000 ALTER TABLE `carrello` DISABLE KEYS */;
INSERT INTO `carrello` (`username`, `nomep`, `quantita`, `prezzo`) VALUES
	('Giulia13', 'correttore', 3, 60);
/*!40000 ALTER TABLE `carrello` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_gbg.compra
DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `username` char(50) NOT NULL,
  `nomep` char(50) NOT NULL,
  `quantita` int(11) unsigned NOT NULL DEFAULT 0,
  `data` datetime NOT NULL,
  `prezzo` float unsigned NOT NULL,
  PRIMARY KEY (`username`,`nomep`,`data`) USING BTREE,
  KEY `FK_compra_prodotto` (`nomep`),
  CONSTRAINT `FK_compra_prodotto` FOREIGN KEY (`nomep`) REFERENCES `prodotto` (`nomep`) ON UPDATE CASCADE,
  CONSTRAINT `FK_compra_utente` FOREIGN KEY (`username`) REFERENCES `utente` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_gbg.compra: ~2 rows (circa)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` (`username`, `nomep`, `quantita`, `data`, `prezzo`) VALUES
	('Giulia13', 'cipria', 6, '2022-04-19 00:36:28', 29.4),
	('Giulia13', 'conturing', 1, '2022-04-19 00:36:28', 15.3),
	('Giulia13', 'fondotinta', 7, '2022-04-19 00:36:28', 129.5);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_gbg.prodotto
DROP TABLE IF EXISTS `prodotto`;
CREATE TABLE IF NOT EXISTS `prodotto` (
  `nomep` char(50) NOT NULL,
  `prezzo` float unsigned NOT NULL DEFAULT 0,
  `categoria` char(50) DEFAULT NULL,
  PRIMARY KEY (`nomep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_gbg.prodotto: ~12 rows (circa)
/*!40000 ALTER TABLE `prodotto` DISABLE KEYS */;
INSERT INTO `prodotto` (`nomep`, `prezzo`, `categoria`) VALUES
	('burrocacao', 5.8, 'labbra'),
	('cipria', 4.9, 'viso'),
	('conturing', 15.3, 'viso'),
	('correttore', 20.1, 'viso'),
	('eyeliner', 12.5, 'occhi'),
	('fondotinta', 18.5, 'viso'),
	('lucidalabbra', 7.6, 'labbra'),
	('mascara', 8, 'occhi'),
	('matita', 4.5, 'occhi'),
	('ombretto', 10, 'occhi'),
	('rossetto', 9.9, 'labbra'),
	('tintalabbra', 9.9, 'labbra');
/*!40000 ALTER TABLE `prodotto` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_gbg.tessera
DROP TABLE IF EXISTS `tessera`;
CREATE TABLE IF NOT EXISTS `tessera` (
  `n_tessera` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `punti` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`n_tessera`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_gbg.tessera: ~0 rows (circa)
/*!40000 ALTER TABLE `tessera` DISABLE KEYS */;
INSERT INTO `tessera` (`n_tessera`, `punti`) VALUES
	(1, NULL);
/*!40000 ALTER TABLE `tessera` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_gbg.utente
DROP TABLE IF EXISTS `utente`;
CREATE TABLE IF NOT EXISTS `utente` (
  `username` char(50) NOT NULL,
  `password` char(100) NOT NULL,
  `nome` char(50) NOT NULL,
  `cognome` char(50) NOT NULL,
  `email` char(50) DEFAULT NULL,
  `telefono` int(10) unsigned DEFAULT NULL,
  `comune` char(50) NOT NULL DEFAULT '',
  `via` char(50) NOT NULL DEFAULT '',
  `civico` int(10) unsigned DEFAULT NULL,
  `n_tessera` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_gbg.utente: ~3 rows (circa)
/*!40000 ALTER TABLE `utente` DISABLE KEYS */;
INSERT INTO `utente` (`username`, `password`, `nome`, `cognome`, `email`, `telefono`, `comune`, `via`, `civico`, `n_tessera`) VALUES
	('Biahorse', 'pippi', 'Bianca', 'Pirovano', 'bianca.pirovano@liceobanfi.eu', 0, 'Lomagna', '', 0, NULL),
	('Giulia13', 'giuliag', 'Giulia', 'Gubellini', 'giulia.gubellini@liceobanfi.eu', 56789, 'Milano', '25 Aprile', 4, NULL);
/*!40000 ALTER TABLE `utente` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
