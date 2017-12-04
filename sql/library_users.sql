-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: 35.205.38.87    Database: library
-- ------------------------------------------------------
-- Server version	5.7.14-google-log

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED='3cf3d1b8-cdf3-11e7-baba-42010a8401d9:1-1205730';

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Vasile','Pop','vasile.pop@gmail.com'),(2,'Mihaela','Zama','mishi@gmail.com'),(5,'John','Doe','jd@gmail.com'),(7,'Test','User','tu@tu.ro'),(9,'Gabriel','Bota','gb@gmail.com'),(10,'Dana','Jurji','dj@yahoo.com'),(12,'New','User','new@gmail.com'),(13,'Never','Enough','never@enough.ro'),(14,'Isit','Working','isit@working.ro'),(15,'Should','Work','now@should.ro'),(16,'Jquery','Sucks','jq@query.ro'),(17,'Go','For','It@go.for'),(19,'Have','Faith','no@more.ro'),(20,'Sick','Tired','sick@tired.ro'),(21,'Use','Composer','maybe@ro.ro'),(26,'Aha','Aha','aha@aha.aha'),(27,'A','A','A@a.ro'),(28,'Aa','Aa','aa@aa.ro'),(29,'As','As','as@as.ro'),(30,'Abu','Abi','abu@abi.ro'),(31,'Aq','Aq','aq@aq.ro'),(32,'Aqa','Aqa','aqa@aqa.ro'),(33,'Aqq','Aqq','aqq@aqq.ro'),(34,'B','B','b@bb.ro'),(35,'Aw','Aw','aw@aw.ro'),(36,'Baduu','Baduu','badu@badu.ro'),(37,'Shit','shit','shit@shit.ro'),(38,'Ana','Muneanu','asa@ero.ro');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-04 16:12:35
