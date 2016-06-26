-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: tcc
-- ------------------------------------------------------
-- Server version	5.6.26-log

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
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (11,'Editor'),(2,'Fotógrafo'),(9,'Assistente Administrativo'),(4,'Auxiliar Administrativo'),(12,'Estágio'),(7,'Faxineiroo'),(13,'Programador');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CNPJCPF` varchar(50) DEFAULT NULL,
  `NOME` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `TELEFONE1` varchar(15) DEFAULT NULL,
  `TELEFONE2` varchar(15) DEFAULT NULL,
  `LOGRADOURO` varchar(50) DEFAULT NULL,
  `NUMERO` int(11) DEFAULT NULL,
  `NOMELOGR` varchar(50) DEFAULT NULL,
  `COMPLEMENTO` varchar(30) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  `CIDADE` varchar(50) DEFAULT NULL,
  `UF` varchar(50) DEFAULT NULL,
  `INSTITUICAO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'940.403.940-39','Vagner','dçc,lcoek','930230293','93820280','RUA',9,'mcroewmcoremvenrvo','kwoncrnfo','womw0mrf','okmencowin','TO','nao sie'),(2,'422.782.086-58','Andre','andre@gmail.com','(19)3621-2518','(19)99682-7056','RUA',182,'Rua 12 de Novembro',NULL,'Centro','Americana','SP','Instituto Educacional de Americana');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CLIENTE` int(11) DEFAULT NULL,
  `DESCRICAO` varchar(50) DEFAULT NULL,
  `DATAEVENTO` date DEFAULT NULL,
  `LOGRADOURO` varchar(50) DEFAULT NULL,
  `NUMERO` int(11) DEFAULT NULL,
  `NOMELOGR` varchar(50) DEFAULT NULL,
  `COMPLEMENTO` varchar(30) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  `CIDADE` varchar(50) DEFAULT NULL,
  `UF` varchar(50) DEFAULT NULL,
  `FOTOGRAFO` int(11) DEFAULT NULL,
  `QTDFOTOS` int(11) DEFAULT NULL,
  `ENTFOTOS` char(1) DEFAULT NULL,
  `INICIO` datetime DEFAULT NULL,
  `TERMINO` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_EVENTO_CLIENTE` (`CLIENTE`),
  KEY `FK_EVENTO_FOTOGRAFO` (`FOTOGRAFO`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,1,'Formatura - Escola do Teste','2016-06-16','ALAMEDA ',942,'Balalaka','Balalaka','Jardim das Alamedas','Valhala','SP',7,NULL,NULL,'2016-12-18 19:00:00','2016-12-19 04:00:00'),(2,1,'Formatura Bla Bla Bla','2016-06-16','RUA',825,'ASsdsda','B','Jd Alvorada','Itu','SP',7,NULL,NULL,'2016-06-25 22:00:00','2016-06-26 05:00:00'),(3,2,'Formatura Nono Ano','2016-12-18','AVENIDA',100,'Av. Paulista',NULL,'Jd Colina','Americana','SP',7,12,'1','2016-07-12 13:30:00','2016-07-14 03:00:00');
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CNPJCPF` varchar(50) DEFAULT NULL,
  `NOME` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `TELEFONE1` varchar(15) DEFAULT NULL,
  `TELEFONE2` varchar(15) DEFAULT NULL,
  `CARGO` int(11) DEFAULT NULL,
  `LOGRADOURO` varchar(50) DEFAULT NULL,
  `NUMERO` int(11) DEFAULT NULL,
  `NOMELOGR` varchar(50) DEFAULT NULL,
  `COMPLEMENTO` varchar(30) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  `CIDADE` varchar(50) DEFAULT NULL,
  `UF` varchar(50) DEFAULT NULL,
  `NIVEL` int(11) DEFAULT NULL,
  `SENHA` varchar(100) DEFAULT 'PHOTUS',
  `FOTO` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_CARGO_FUNCIONARIO` (`CARGO`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (1,'','feliepe','felipe@gmail.com','3406050','94039039',2,'RUA',1,'Vênus','','Jardim alvorada','americana','SP',1,'PHOTUS',NULL),(4,'','Vagner','','','',9,'',0,'','','','','',1,NULL,NULL),(5,'','admin','admin@admin.com','','',13,'',0,'','','','','',2,'PHOTUS',NULL),(6,'','Funcionário Comum','estagiario@gmail.com','(19)3426-7056','',12,'',0,'','','','','',1,'PHOTUS',NULL),(7,'','Teste Fotografo','fotografo@photus.com','(19) 3645-7206','',2,'RUA',90,'Dos Atrazos','','Jd. Ipiranga','Americana','SP',2,'PHOTUS','foto_funcionario/2016.06.26-21.02.24.jpg');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarefa`
--

DROP TABLE IF EXISTS `tarefa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarefa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(50) DEFAULT NULL,
  `FUNCIONARIO` int(11) DEFAULT NULL,
  `PRAZO` date DEFAULT NULL,
  `EVENTO` int(11) DEFAULT NULL,
  `DATACRI` date DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_TAREFA_FUNCIONARIO` (`FUNCIONARIO`),
  KEY `FK_TAREFA_EVENTO` (`EVENTO`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarefa`
--

LOCK TABLES `tarefa` WRITE;
/*!40000 ALTER TABLE `tarefa` DISABLE KEYS */;
INSERT INTO `tarefa` VALUES (1,'Formatura Col. Dom Pedro',7,'2016-12-19',1,'2016-06-16',1),(2,'Formatura Teste 2',7,'2016-12-19',2,'2016-06-16',1),(3,'Formatura Teste 3',6,'2016-12-17',2,'2016-06-16',1),(4,'Formatura Teste 4',7,'2016-12-17',1,'2016-06-16',0),(5,'Formatura Teste 5',7,'2016-12-20',3,'2016-10-17',0);
/*!40000 ALTER TABLE `tarefa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-26 19:28:35
