-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: hackthon
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES ('123.375.459-30','Kleber'),('123.375.479-30','gazin');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico_de_calculo`
--

DROP TABLE IF EXISTS `historico_de_calculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historico_de_calculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resultado` float NOT NULL,
  `pontuacao` int(11) NOT NULL,
  `preco_gasolina` float NOT NULL,
  `preco_etanol` float NOT NULL,
  `data` date NOT NULL DEFAULT '1970-01-01',
  `idcliente` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idcliente` (`idcliente`),
  CONSTRAINT `historico_de_calculo_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_de_calculo`
--

LOCK TABLES `historico_de_calculo` WRITE;
/*!40000 ALTER TABLE `historico_de_calculo` DISABLE KEYS */;
INSERT INTO `historico_de_calculo` VALUES (1,8.6,1,0,0,'1970-01-01','123.375.479-30'),(3,8.6,1,0,0,'1970-01-01','123.375.459-30');
/*!40000 ALTER TABLE `historico_de_calculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `premiacao`
--

DROP TABLE IF EXISTS `premiacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `premiacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idhistorico_de_calculo` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idhistorico_de_calculo` (`idhistorico_de_calculo`),
  KEY `idproduto` (`idproduto`),
  CONSTRAINT `premiacao_ibfk_1` FOREIGN KEY (`idhistorico_de_calculo`) REFERENCES `historico_de_calculo` (`id`),
  CONSTRAINT `premiacao_ibfk_2` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `premiacao`
--

LOCK TABLES `premiacao` WRITE;
/*!40000 ALTER TABLE `premiacao` DISABLE KEYS */;
INSERT INTO `premiacao` VALUES (1,3,2),(2,1,2),(3,3,2),(4,1,2);
/*!40000 ALTER TABLE `premiacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `qtde` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,'Mesa',0),(2,'Cadeira',0),(3,'Rack',0);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-20 21:08:57
