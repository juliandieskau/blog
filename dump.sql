-- MySQL dump 10.13  Distrib 9.3.0, for Linux (x86_64)
--
-- Host: localhost    Database: blogdb
-- ------------------------------------------------------
-- Server version	9.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments_cafemenu`
--

DROP TABLE IF EXISTS `comments_cafemenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments_cafemenu` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int DEFAULT '0',
  `reports` int unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_cafemenu`
--

LOCK TABLES `comments_cafemenu` WRITE;
/*!40000 ALTER TABLE `comments_cafemenu` DISABLE KEYS */;
INSERT INTO `comments_cafemenu` VALUES (1,'julian','test comment','2025-05-29 09:46:08',0,0),(2,'julian','test comment','2025-05-29 09:49:44',0,0),(3,'test','test','2025-05-29 09:50:08',0,0),(4,'test2','test2','2025-05-29 09:58:02',0,0),(5,'test3','test3','2025-05-29 09:58:13',0,0),(6,'test','reload scroll test','2025-05-29 10:20:00',0,0),(7,'a','b','2025-05-29 10:23:07',0,0),(8,'commenter','comment','2025-05-29 10:23:23',0,0),(9,'a','c','2025-05-29 10:37:19',0,0),(10,'asdasd','asdasdasd','2025-05-29 10:38:20',0,0),(11,'julian','comment','2025-05-29 10:45:43',0,0),(12,'julian','scroll test','2025-05-29 11:20:03',0,0),(13,'julian','id check','2025-05-29 11:23:26',0,0),(14,'julian','username submit test','2025-05-29 14:34:41',0,0),(15,'julian','try submit after username was entered','2025-05-29 14:35:49',0,0),(16,'yes it did','test if cookie deletion worked','2025-05-29 14:40:27',0,0),(17,'yes it did','submit something','2025-05-29 14:45:48',0,0),(18,'username test','test comment for username id submission test','2025-05-29 14:46:35',0,0),(19,'username test','test','2025-05-29 15:25:35',0,0),(20,'username test','test if link works now','2025-05-29 15:25:58',0,0),(21,'i hope it doesnt get updated','test if link works now','2025-05-29 15:26:24',0,1),(22,'julian','test','2025-05-29 15:27:23',0,0),(24,'io works','comment new','2025-05-29 15:43:05',0,0),(25,'no username','new comment without username','2025-05-29 15:44:38',2,0),(26,'no username','first comment in good styling','2025-05-29 16:42:46',0,0),(27,'no username','new comment at the top','2025-05-29 17:38:00',12,1),(28,'no username','iaolösnda','2025-05-29 18:51:17',0,1),(29,'Julian','test test','2025-05-29 19:47:30',-1,0),(30,'Julian','kommentar test für Bericht','2025-06-22 14:21:58',0,0),(31,'Julian','asdasd\r\nasd\r\nas\r\nda\r\nsd\r\na\r\nsda','2025-06-22 14:23:02',0,0);
/*!40000 ALTER TABLE `comments_cafemenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_catphotoapp`
--

DROP TABLE IF EXISTS `comments_catphotoapp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments_catphotoapp` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int DEFAULT '0',
  `reports` int unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_catphotoapp`
--

LOCK TABLES `comments_catphotoapp` WRITE;
/*!40000 ALTER TABLE `comments_catphotoapp` DISABLE KEYS */;
INSERT INTO `comments_catphotoapp` VALUES (1,'Julian','comment thats only at the cat photo app','2025-05-29 21:32:42',1,0),(2,'Julian','neu','2025-05-30 07:31:39',1,0),(3,'Julian','dfsdfgs','2025-06-10 12:58:53',0,0);
/*!40000 ALTER TABLE `comments_catphotoapp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_coloredmarkers`
--

DROP TABLE IF EXISTS `comments_coloredmarkers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments_coloredmarkers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int DEFAULT '0',
  `reports` int unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_coloredmarkers`
--

LOCK TABLES `comments_coloredmarkers` WRITE;
/*!40000 ALTER TABLE `comments_coloredmarkers` DISABLE KEYS */;
INSERT INTO `comments_coloredmarkers` VALUES (1,'Julian','Textmarker sind super!','2025-05-29 21:45:56',1,0);
/*!40000 ALTER TABLE `comments_coloredmarkers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_day0arrival`
--

DROP TABLE IF EXISTS `comments_day0arrival`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments_day0arrival` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int DEFAULT '0',
  `reports` int unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_day0arrival`
--

LOCK TABLES `comments_day0arrival` WRITE;
/*!40000 ALTER TABLE `comments_day0arrival` DISABLE KEYS */;
INSERT INTO `comments_day0arrival` VALUES (1,'Julian','Wunderschön, weiter so!','2025-05-30 18:05:05',1,0),(2,'Julian','dasasd','2025-06-10 13:04:34',0,0);
/*!40000 ALTER TABLE `comments_day0arrival` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_day1shibuya`
--

DROP TABLE IF EXISTS `comments_day1shibuya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments_day1shibuya` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int DEFAULT '0',
  `reports` int unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_day1shibuya`
--

LOCK TABLES `comments_day1shibuya` WRITE;
/*!40000 ALTER TABLE `comments_day1shibuya` DISABLE KEYS */;
INSERT INTO `comments_day1shibuya` VALUES (1,'Julian','Da will ich auch unbedingt hin!','2025-05-30 19:02:36',1,0);
/*!40000 ALTER TABLE `comments_day1shibuya` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_food`
--

DROP TABLE IF EXISTS `comments_food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments_food` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int DEFAULT '0',
  `reports` int unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_food`
--

LOCK TABLES `comments_food` WRITE;
/*!40000 ALTER TABLE `comments_food` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments_food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_matchaTutorial`
--

DROP TABLE IF EXISTS `comments_matchaTutorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments_matchaTutorial` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int DEFAULT '0',
  `reports` int unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_matchaTutorial`
--

LOCK TABLES `comments_matchaTutorial` WRITE;
/*!40000 ALTER TABLE `comments_matchaTutorial` DISABLE KEYS */;
INSERT INTO `comments_matchaTutorial` VALUES (1,'Julian','Das sieht unglaublich aus, danke für die Anleitung!','2025-05-31 10:02:46',1,0);
/*!40000 ALTER TABLE `comments_matchaTutorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_registrationform`
--

DROP TABLE IF EXISTS `comments_registrationform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments_registrationform` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int DEFAULT '0',
  `reports` int unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_registrationform`
--

LOCK TABLES `comments_registrationform` WRITE;
/*!40000 ALTER TABLE `comments_registrationform` DISABLE KEYS */;
INSERT INTO `comments_registrationform` VALUES (1,'Julian','Ich hasse Formulare...','2025-05-29 21:55:17',0,0);
/*!40000 ALTER TABLE `comments_registrationform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_rothkopainting`
--

DROP TABLE IF EXISTS `comments_rothkopainting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments_rothkopainting` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int DEFAULT '0',
  `reports` int unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_rothkopainting`
--

LOCK TABLES `comments_rothkopainting` WRITE;
/*!40000 ALTER TABLE `comments_rothkopainting` DISABLE KEYS */;
INSERT INTO `comments_rothkopainting` VALUES (1,'Julian','scheint noch nicht fertig zu sein...','2025-05-29 22:01:48',0,0);
/*!40000 ALTER TABLE `comments_rothkopainting` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-22 16:52:08
