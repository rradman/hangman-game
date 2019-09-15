-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: projekt
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

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
-- Table structure for table `active_user`
--

DROP TABLE IF EXISTS `active_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `active_user` (
  `username` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `active_user`
--

LOCK TABLES `active_user` WRITE;
/*!40000 ALTER TABLE `active_user` DISABLE KEYS */;
INSERT INTO `active_user` VALUES ('robi');
/*!40000 ALTER TABLE `active_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(3) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (0,'admin','admin'),(1,'robi','robi'),(2,'abc','abc'),(3,'pro','pro'),(4,'milka','rukomet12'),(5,'igracina','igracina'),(6,'player1','player1'),(7,'grillgamer','grillgamer'),(8,'xxxRAZORxxx','xxxRAZORxxx'),(9,'gamer','gamer'),(10,'neznam','neznam');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `highscores`
--

DROP TABLE IF EXISTS `highscores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `highscores` (
  `username` varchar(30) DEFAULT NULL,
  `highscore` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `highscores`
--

LOCK TABLES `highscores` WRITE;
/*!40000 ALTER TABLE `highscores` DISABLE KEYS */;
INSERT INTO `highscores` VALUES ('admin',188),('robi',208),('abc',0),('pro',0),('milka',90),('igracina',23),('player1',2),('grillgamer',0),('xxxRAZORxxx',0),('gamer',0),('neznam',32);
/*!40000 ALTER TABLE `highscores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rijecnik`
--

DROP TABLE IF EXISTS `rijecnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rijecnik` (
  `topic` varchar(100) DEFAULT NULL,
  `rijec` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rijecnik`
--

LOCK TABLES `rijecnik` WRITE;
/*!40000 ALTER TABLE `rijecnik` DISABLE KEYS */;
INSERT INTO `rijecnik` VALUES ('Countries and cities','RIJEKA'),('Countries and cities','ZAGREB'),('Countries and cities','NEW YORK'),('Countries and cities','LONDON'),('Countries and cities','GERMANY'),('Countries and cities','BUDAPEST'),('Countries and cities','PARIS'),('Countries and cities','EGYPT'),('Countries and cities','SYDNEY'),('Countries and cities','MEXICO'),('Countries and cities','SOUTH AFRICA'),('Countries and cities','RUSSIA'),('Countries and cities','JAPAN'),('Countries and cities','CHINA'),('Countries and cities','WASHINGTON'),('Countries and cities','BARCELONA'),('Countries and cities','PRAGUE'),('Countries and cities','AMSTERDAM'),('Countries and cities','VIENNA'),('Countries and cities','ISTANBUL'),('Countries and cities','TOKYO'),('Countries and cities','VENICE'),('Animals','KANGAROO'),('Animals','HORSE'),('Animals','ZEBRA'),('Animals','HEDGEHOG'),('Animals','RABBIT'),('Animals','SPIDER'),('Animals','GIRAFFE'),('Animals','LEOPARD'),('Animals','ELEPHANT'),('Animals','TORTOISE'),('Animals','MONKEY'),('Animals','PENGUIN'),('Animals','POLAR BEAR'),('Animals','PARROT'),('Actors and singers','MICHAEL JACKSON'),('Actors and singers','JOHNNY DEPP'),('Actors and singers','ELVIS PRESLEY'),('Actors and singers','JULIA ROBERTS'),('Actors and singers','ANGELINA JOLIE'),('Actors and singers','MATTHEW MCCONAUGHEY'),('Actors and singers','BENEDICT CUMBERBATCH'),('Actors and singers','BRAD PITT'),('Actors and singers','JACK NICHOLSON'),('Actors and singers','NICOLE KIDMAN'),('Actors and singers','ROBERT DE NIRO'),('Actors and singers','ANTHONY HOPKINS'),('Actors and singers','DENZEL WASHINGTON'),('Actors and singers','CLINT EASTWOOD'),('Actors and singers','LEONARDO DICAPRIO'),('Actors and singers','MORGAN FREEMAN'),('Actors and singers','ARIANA GRANDE'),('Actors and singers','TAYLOR SWIFT'),('Actors and singers','SHAKIRA'),('Actors and singers','FRANK SINATRA'),('Actors and singers','WHITNEY HOUSTON'),('Actors and singers','EMINEM'),('Actors and singers','ED SHEERAN'),('Actors and singers','ADAM LEVINE'),('Animals','TIGER');
/*!40000 ALTER TABLE `rijecnik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `topic` varchar(100) DEFAULT NULL,
  `rijec` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES ('tema123','asdasd'),('abc','123'),('444','444');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-14 15:36:41
