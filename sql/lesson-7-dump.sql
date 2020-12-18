-- MySQL dump 10.13  Distrib 5.7.32, for osx10.14 (x86_64)
--
-- Host: localhost    Database: blog_php
-- ------------------------------------------------------
-- Server version	5.7.32

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
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `post_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url_key` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `content` text,
  `description` varchar(255) DEFAULT NULL,
  `published_date` datetime NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `url_key` (`url_key`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'Hello World','hello-world','public/images/christmas.png','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.','My first blog post','2020-12-05 12:00:00'),(2,'Second post','second-post','public/images/christmas.png','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English.','It is a long established fact that a reader will be distracted','2020-12-09 12:00:00'),(3,'My third post','my-third-post','public/images/christmas.png','There are many variations of passages of Lorem Ipsum available','There are many variations of passages of Lorem Ipsum available','2020-12-10 12:00:00'),(4,'4th post','post-4','public/images/christmas.png','Post content','post description','2020-12-12 12:00:00'),(5,'5th post','post-5','public/images/christmas.png','Post content','post description','2020-12-13 12:00:00'),(6,'Royal Mail at Christmas','post-6','public/images/christmas.png','<p>As Christmas approaches, there are plenty of things to look forward to, but there\'s also lots of planning that needs to take place.</p>\n<p>Whether you are one of the millions of people who do their shopping online for gifts, or send Christmas cards to brighten up someone’s festive season, we’re ready to help with your Christmas preparations.</p>\n<p>From Christmas posting dates to cards and gift ideas, you\'ll find everything you need here to help you deliver the perfect Christmas; because we know Santa isn’t the only busy person this time of year.</p>','Last posting dates, Christmas gift ideas and more','2020-12-14 12:00:00');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-18  9:00:04
