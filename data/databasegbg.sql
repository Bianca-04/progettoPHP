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
  `quantita` int(10) unsigned NOT NULL,
  `prezzo` float unsigned DEFAULT NULL,
  PRIMARY KEY (`username`,`nomep`),
  KEY `FK__prodotto` (`nomep`),
  CONSTRAINT `FK__prodotto` FOREIGN KEY (`nomep`) REFERENCES `prodotto` (`nomep`) ON UPDATE CASCADE,
  CONSTRAINT `FK__utente` FOREIGN KEY (`username`) REFERENCES `utente` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_gbg.carrello: ~11 rows (circa)
/*!40000 ALTER TABLE `carrello` DISABLE KEYS */;
INSERT INTO `carrello` (`username`, `nomep`, `quantita`, `prezzo`) VALUES
	('5Grey0', 'lucidalabbra', 1, 7),
	('5Grey0', 'mascara', 5, 40),
	('5Grey0', 'rossetto', 1, 9),
	('aSTrPbMf', 'mascara', 5, 40),
	('aSTrPbMf', 'tintalabbra', 1, 9),
	('Giulia13', 'correttore', 3, 60),
	('Graham2', 'fondotinta', 1, 18),
	('Graham2', 'mascara', 1, 8),
	('josh70', 'conturing', 2, 30),
	('josh70', 'eyeliner', 3, 12),
	('obanchi3', 'correttore', 3, 60),
	('obanchi3', 'lucidalabbra', 1, 7);
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

-- Dump dei dati della tabella negozio_gbg.compra: ~33 rows (circa)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` (`username`, `nomep`, `quantita`, `data`, `prezzo`) VALUES
	('!pGuerra', 'burrocacao', 1, '2022-02-22 15:53:52', 5),
	('!pGuerra', 'conturing', 1, '2022-04-22 15:54:14', 15),
	('!pGuerra', 'correttore', 1, '2022-04-22 15:53:52', 20),
	('!pGuerra', 'fondotinta', 2, '2022-04-21 11:47:45', 36),
	('!pGuerra', 'tintalabbra', 2, '2022-04-12 15:53:52', 18),
	('aSTrPbMf', 'cipria', 1, '2022-04-22 15:54:55', 4),
	('aSTrPbMf', 'matita', 1, '2022-04-21 11:47:45', 4),
	('aSTrPbMf', 'ombretto', 1, '2022-04-22 15:54:55', 10),
	('Giorgina', 'conturing', 4, '2022-04-19 14:48:41', 61.2),
	('Giulia13', 'cipria', 6, '2022-04-19 00:36:28', 29.4),
	('Giulia13', 'conturing', 1, '2022-04-19 00:36:28', 15.3),
	('Giulia13', 'fondotinta', 7, '2021-04-19 00:36:28', 129.5),
	('Graham2', 'cipria', 1, '2021-04-22 15:56:43', 4),
	('Graham2', 'conturing', 1, '2021-02-22 15:56:43', 15),
	('Graham2', 'mascara', 1, '2021-04-22 15:56:10', 8),
	('Graham2', 'matita', 1, '2021-04-22 17:56:43', 4),
	('Graham2', 'ombretto', 4, '2021-04-24 05:56:10', 40),
	('obanchi3', 'eyeliner', 4, '2022-04-22 16:03:14', 50),
	('obanchi3', 'rossetto', 4, '2022-04-22 16:02:46', 36),
	('ti.romeo', 'correttore', 1, '2022-04-22 16:04:24', 20),
	('ti.romeo', 'matita', 1, '2022-04-22 15:56:10', 4),
	('ti.romeo', 'matita', 5, '2022-04-22 16:04:14', 20),
	('user1', 'conturing', 1, '2022-04-21 11:47:13', 15),
	('user1', 'conturing', 3, '2022-04-26 17:55:36', 45),
	('user1', 'correttore', 4, '2022-04-21 11:47:13', 80),
	('user1', 'correttore', 1, '2022-04-23 15:48:44', 20),
	('user1', 'fondotinta', 1, '2020-04-22 23:06:12', 18),
	('user1', 'fondotinta', 1, '2022-04-21 11:47:13', 18),
	('user1', 'lucidalabbra', 1, '2020-04-21 11:47:13', 7),
	('user1', 'mascara', 3, '2020-04-21 11:47:45', 24),
	('user1', 'mascara', 1, '2020-04-23 15:48:44', 8),
	('user1', 'ombretto', 3, '2022-04-21 11:47:45', 30),
	('user1', 'rossetto', 4, '2022-04-23 15:48:44', 36);
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

-- Dump della struttura di tabella negozio_gbg.recensione
DROP TABLE IF EXISTS `recensione`;
CREATE TABLE IF NOT EXISTS `recensione` (
  `titolo` char(100) NOT NULL DEFAULT '',
  `testo` longtext NOT NULL,
  `username` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`username`,`titolo`),
  CONSTRAINT `FK_recensione_utente` FOREIGN KEY (`username`) REFERENCES `utente` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_gbg.recensione: ~11 rows (circa)
/*!40000 ALTER TABLE `recensione` DISABLE KEYS */;
INSERT INTO `recensione` (`titolo`, `testo`, `username`) VALUES
	('acquisti fatti', 'i prodotti sono tutti bellissimi', '!pGuerra'),
	('prodotto labbra approvato', 'Non amo truccare molto le labbra ma questo rossetto è perfetto per me: esalta il colore naturale, idrata e tiene tantissimo. Mi piace molto anche l\'effetto fresco. \n', '5Grey0'),
	('fondotinta ottimo', 'Questo prodotto ha talmente tanti pregi che lo ricomprerò sicuramente.', 'aSTrPbMf'),
	('buonissimo servizio', 'Negli anni ho notato un miglioramento sia nella qualità dei prodotti che per la cura del packaging.', 'Biahorse'),
	('Bel sito!', 'Ottima la possibilità di vedere le recensioni.', 'Giulia13'),
	('Cosmetici di qualità a prezzi mini', 'Imballaggio perfetto. Tempi di consegna nella norma. Finora non ho mai avuto bisogno del servizio clienti nè di fare un reso.', 'Graham2'),
	('Ottima matita', 'Facile da applicare, previene bene le sbavature di rossetto!', 'Graham2'),
	('Prezzi', 'i prezzi sono molto accessibili', 'obanchi3'),
	('Ottima matita', 'Facile da applicare, previene bene le sbavature di rossetto!', 'ti.romeo'),
	('ottimo', 'bellissimi prodotti, i miei preferiti', 'ti.romeo'),
	('Palette ombretti consigliata', 'Colori da utilizzare tutti i giorni per ogni occasione!', 'user1');
/*!40000 ALTER TABLE `recensione` ENABLE KEYS */;

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
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella negozio_gbg.utente: ~11 rows (circa)
/*!40000 ALTER TABLE `utente` DISABLE KEYS */;
INSERT INTO `utente` (`username`, `password`, `nome`, `cognome`, `email`, `telefono`, `comune`, `via`, `civico`) VALUES
	('!pGuerra', 'Op5LUBQ3/', 'Celeste', 'D\'amico', 'emessina@example.net', NULL, 'Battaglia lido', 'Strada Grassi', 6),
	('5Grey0', 'z58R=aG', 'Tristano', 'Montanari', 'vitale.pierfrancesco@example.net', 4294967295, 'Biassono', 'Incrocio Neri', 9),
	('aSTrPbMf', '3hn5AFKXl#Pu', 'Ima', 'Giovanardi', 'leone04@libero.it', 3927651092, 'Roma', 'Rotonda Bellini', 1),
	('Biahorse', 'pippi', 'Bianca', 'Pirovano', 'bianca.pirovano@liceobanfi.eu', 0, 'Lomagna', '', 0),
	('Giorgina', 'passonig', 'giorgia', 'passoni', 'giorgia.passoni@liceobanfi.eu', 4294967295, 'concorezzo', 'ggggg', 29),
	('Giulia13', 'giuliag', 'Giulia', 'Gubellini', 'giulia.gubellini@liceobanfi.eu', 56789, 'Milano', '25 Aprile', 4),
	('Graham2', '3h370nsloll', 'Jimmie', 'Gottlieb', 'graham.vida@example.net', 1597658168, 'Benevento', 'Sesto Dante', 29),
	('josh70', '@uu$[9N9wg[', 'Maristella', 'Rinaldi', 'danuta.pellegrino@libero.it', 3255473098, 'Vercelli', 'Borgo Bianchi', 6),
	('obanchi3', 's8XJt`$', 'Ruth', 'Cattaneo', NULL, NULL, 'Benedetti laziale', 'Contrada Quirino', 35),
	('ti.romeo', 'passw45', 'Irene', 'Sorrentino', 'torlando@example.org', 2357466316, 'Monza', 'Rotonda Rossi', 7),
	('user1', '77777', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 1);
/*!40000 ALTER TABLE `utente` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
