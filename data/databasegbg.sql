-- --------------------------------------------------------
-- Host:                         127.0.0.1
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
  `quantità` int(10) unsigned NOT NULL,
  PRIMARY KEY (`username`,`nomep`),
  KEY `FK__prodotto` (`nomep`),
  CONSTRAINT `FK__prodotto` FOREIGN KEY (`nomep`) REFERENCES `prodotto` (`nomep`) ON UPDATE CASCADE,
  CONSTRAINT `FK__utente` FOREIGN KEY (`username`) REFERENCES `utente` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_gbg.carrello: ~0 rows (circa)
/*!40000 ALTER TABLE `carrello` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrello` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_gbg.compra
DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `username` char(50) NOT NULL,
  `nomep` char(50) NOT NULL,
  `quantità` int(11) unsigned NOT NULL,
  `data` date NOT NULL,
  `prezzo` float unsigned NOT NULL,
  PRIMARY KEY (`username`,`nomep`),
  KEY `FK_compra_prodotto` (`nomep`),
  CONSTRAINT `FK_compra_prodotto` FOREIGN KEY (`nomep`) REFERENCES `prodotto` (`nomep`) ON UPDATE CASCADE,
  CONSTRAINT `FK_compra_utente` FOREIGN KEY (`username`) REFERENCES `utente` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_gbg.compra: ~0 rows (circa)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_gbg.prodotto
DROP TABLE IF EXISTS `prodotto`;
CREATE TABLE IF NOT EXISTS `prodotto` (
  `nomep` char(50) NOT NULL,
  `prezzo` float unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`nomep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_gbg.prodotto: ~0 rows (circa)
/*!40000 ALTER TABLE `prodotto` DISABLE KEYS */;
/*!40000 ALTER TABLE `prodotto` ENABLE KEYS */;

-- Dump della struttura di tabella negozio_gbg.tessera
DROP TABLE IF EXISTS `tessera`;
CREATE TABLE IF NOT EXISTS `tessera` (
  `n_tessera` int(11) unsigned NOT NULL,
  `punti` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`n_tessera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_gbg.tessera: ~0 rows (circa)
/*!40000 ALTER TABLE `tessera` DISABLE KEYS */;
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
  `civico` int(10) unsigned NOT NULL,
  `n_tessera` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_gbg.utente: ~0 rows (circa)
/*!40000 ALTER TABLE `utente` DISABLE KEYS */;
/*!40000 ALTER TABLE `utente` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
