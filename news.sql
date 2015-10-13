CREATE DATABASE IF NOT EXISTS `news` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `news`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: news
-- ------------------------------------------------------
-- Server version	5.7.8-rc-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id`      INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`    VARCHAR(255)     NOT NULL,
  `message` VARCHAR(255)     NOT NULL,
  `email`   VARCHAR(255)     NOT NULL,
  `ip`      VARCHAR(255)     NOT NULL,
  `date`    TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages`
VALUES (1, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-13 15:11:59'),
  (2, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-13 15:11:59'),
  (3, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-13 15:11:59'),
  (4, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-13 15:11:59'),
  (5, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-13 15:11:59');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id`    INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`  VARCHAR(255)     NOT NULL,
  `link`  VARCHAR(255)     NOT NULL,
  `route` VARCHAR(255)     NOT NULL,
  `order` INT(10) UNSIGNED NOT NULL,
  `show`  INT(1) UNSIGNED  NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_UNIQUE` (`order`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1, 'Home', '/', 'get ~^/$~ => StaticController/index', 1, 1),
  (2, 'Contact', '/contact', 'get ~^/contact$~ => StaticController/contact', 2, 1),
  (3, 'Politics', '/politics', 'get ~^/politics$~ => StaticController/politics', 3, 1),
  (4, 'Sport', '/sport', 'get ~^/sport$~ => StaticController/sport', 4, 1),
  (5, 'Country', '/country', 'get ~^/country$~ => StaticController/country', 5, 1);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

-- Dump completed on 2015-10-13 18:18:32
