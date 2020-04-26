-- MySQL dump 10.17  Distrib 10.3.22-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ocode_restapi
-- ------------------------------------------------------
-- Server version	10.3.22-MariaDB-1:10.3.22+maria~bionic

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Article 1','1 - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur commodi consectetur deserunt iusto labore libero quaerat repellat sunt veritatis!'),(2,'Article 2','2 - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur commodi consectetur deserunt iusto labore libero quaerat repellat sunt veritatis!'),(3,'Article 3','3 - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur commodi consectetur deserunt iusto labore libero quaerat repellat sunt veritatis!'),(4,'Article 4','4 - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur commodi consectetur deserunt iusto labore libero quaerat repellat sunt veritatis!'),(5,'Article 5','5 - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur commodi consectetur deserunt iusto labore libero quaerat repellat sunt veritatis!'),(6,'Article 6','6 - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur commodi consectetur deserunt iusto labore libero quaerat repellat sunt veritatis!'),(7,'Article 7','7 - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur commodi consectetur deserunt iusto labore libero quaerat repellat sunt veritatis!'),(8,'Article 8','8 - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur commodi consectetur deserunt iusto labore libero quaerat repellat sunt veritatis!'),(9,'Article 9','9 - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur commodi consectetur deserunt iusto labore libero quaerat repellat sunt veritatis!'),(10,'Article 10','10 - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur commodi consectetur deserunt iusto labore libero quaerat repellat sunt veritatis!');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-26 17:26:26
