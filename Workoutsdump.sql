-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Workouts
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `userID` varchar(10) NOT NULL DEFAULT '',
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `phNum` int(10) DEFAULT NULL,
  `accType` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES ('bb1','Bruce','Banner',0,'user'),('hjs','Homer','Simpson',2147483647,'user'),('og39','Omar','Gomez',1234567890,'trainer');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passwds`
--

DROP TABLE IF EXISTS `passwds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passwds` (
  `userID` varchar(10) NOT NULL DEFAULT '',
  `Hashes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  CONSTRAINT `passwds_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passwds`
--

LOCK TABLES `passwds` WRITE;
/*!40000 ALTER TABLE `passwds` DISABLE KEYS */;
INSERT INTO `passwds` VALUES ('bb1','132507c41f3a8357a2c7'),('hjs','627fbb4b57f4cc83a634'),('og39','64d213021c2923a5c07d');
/*!40000 ALTER TABLE `passwds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `routine1`
--

DROP TABLE IF EXISTS `routine1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `routine1` (
  `CurDate` date NOT NULL DEFAULT '0000-00-00',
  `Exercise` varchar(20) NOT NULL DEFAULT '',
  `SetNum` int(2) NOT NULL DEFAULT '0',
  `Weight` int(3) DEFAULT NULL,
  `Reps` int(2) DEFAULT NULL,
  `BodyPart` varchar(10) DEFAULT NULL,
  `userID` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`CurDate`,`Exercise`,`SetNum`,`userID`),
  KEY `userID` (`userID`),
  CONSTRAINT `routine1_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `routine1`
--

LOCK TABLES `routine1` WRITE;
/*!40000 ALTER TABLE `routine1` DISABLE KEYS */;
INSERT INTO `routine1` VALUES ('2016-03-04','barbell_rows',1,155,8,'back','og39'),('2016-03-04','barbell_rows',2,155,8,'back','og39'),('2016-03-04','barbell_rows',3,155,8,'back','og39'),('2016-03-04','barbell_rows',4,155,8,'back','og39'),('2016-03-04','dbbench',1,50,5,'chest','hjs'),('2016-03-04','dbbench',1,100,5,'chest','og39'),('2016-03-04','dbbench',2,100,5,'chest','og39'),('2016-03-04','dbbench',3,100,5,'chest','og39'),('2016-03-04','dbbench',4,100,5,'chest','og39'),('2016-03-04','dbbench',5,100,5,'chest','og39'),('2016-03-04','leg_curls',1,120,8,'legs','og39'),('2016-03-04','leg_curls',2,120,8,'legs','og39'),('2016-03-04','leg_curls',3,120,8,'legs','og39'),('2016-03-04','leg_curls',4,120,8,'legs','og39'),('2016-03-10','barbell_rows',1,115,8,'back','bb1'),('2016-03-10','barbell_rows',2,115,8,'back','bb1'),('2016-03-10','barbell_rows',3,115,8,'back','bb1'),('2016-03-10','barbell_rows',4,115,8,'back','bb1'),('2016-03-10','dbbench',1,75,5,'chest','bb1'),('2016-03-10','dbbench',2,75,5,'chest','bb1'),('2016-03-10','dbbench',3,75,5,'chest','bb1'),('2016-03-10','dbbench',4,75,5,'chest','bb1'),('2016-03-10','dbbench',5,75,5,'chest','bb1'),('2016-03-10','leg_curls',1,80,8,'legs','bb1'),('2016-03-10','leg_curls',2,80,8,'legs','bb1'),('2016-03-10','leg_curls',3,80,8,'legs','bb1'),('2016-03-10','leg_curls',4,80,8,'legs','bb1');
/*!40000 ALTER TABLE `routine1` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-20 22:48:44
