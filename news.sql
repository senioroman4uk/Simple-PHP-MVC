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
  AUTO_INCREMENT = 116
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
  (5, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-13 15:11:59'),
  (6, 'wqwqwqw', 'qwqwqwqwqwqwqwqwqqwqwqwqwqwqw', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:42:38'),
  (7, 'wqwqwqw', 'qwqwqwqwqwqwqwqwqqwqwqwqwqwqw', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:42:48'),
  (8, 'wqwqwqw', 'qwqwqwqwqwqwqwqwqqwqwqwqwqwqw', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:42:52'),
  (9, 'wqwqwqw', 'qwqwqwqwqwqwqwqwqqwqwqwqwqwqw', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:42:54'),
  (10, 'wqwqwqw', 'qwqwqwqwqwqwqwqwqqwqwqwqwqwqw', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:42:57'),
  (11, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:38'),
  (12, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:39'),
  (13, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:39'),
  (14, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:39'),
  (15, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:40'),
  (16, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:40'),
  (17, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:40'),
  (18, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:41'),
  (19, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:41'),
  (20, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:42'),
  (21, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:42'),
  (22, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:43'),
  (23, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:43'),
  (24, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:43'),
  (25, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:43'),
  (26, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:44'),
  (27, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:44'),
  (28, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:44'),
  (29, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:44'),
  (30, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:45'),
  (31, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:45'),
  (32, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:45'),
  (33, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:45'),
  (34, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:45'),
  (35, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:46'),
  (36, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:46'),
  (37, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:46'),
  (38, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:47'),
  (39, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:47'),
  (40, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:47'),
  (41, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:47'),
  (42, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:47'),
  (43, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:48'),
  (44, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:48'),
  (45, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:48'),
  (46, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:48'),
  (47, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:49'),
  (48, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:49'),
  (49, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:49'),
  (50, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:49'),
  (51, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:49'),
  (52, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:50'),
  (53, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:51'),
  (54, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:51'),
  (55, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:51'),
  (56, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:51'),
  (57, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:51'),
  (58, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:52'),
  (59, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:52'),
  (60, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:52'),
  (61, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:52'),
  (62, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:52'),
  (63, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:53'),
  (64, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:53'),
  (65, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:53'),
  (66, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:53'),
  (67, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:53'),
  (68, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:54'),
  (69, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:54'),
  (70, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:54'),
  (71, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:54'),
  (72, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:54'),
  (73, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:55'),
  (74, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:55'),
  (75, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:55'),
  (76, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:55'),
  (77, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:56'),
  (78, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:56'),
  (79, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:56'),
  (80, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:57'),
  (81, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:57'),
  (82, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:57'),
  (83, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:57'),
  (84, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:57'),
  (85, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:58'),
  (86, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:58'),
  (87, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:58'),
  (88, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:58'),
  (89, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:59'),
  (90, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:49:59'),
  (91, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:00'),
  (92, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:00'),
  (93, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:01'),
  (94, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:01'),
  (95, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:01'),
  (96, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:01'),
  (97, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:01'),
  (98, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:02'),
  (99, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:02'),
  (100, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:02'),
  (101, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:02'),
  (102, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:02'),
  (103, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:02'),
  (104, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:03'),
  (105, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:03'),
  (106, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:03'),
  (107, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:04'),
  (108, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:04'),
  (109, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:04'),
  (110, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:04'),
  (111, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:05'),
  (112, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:05'),
  (113, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:05'),
  (114, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:05'),
  (115, 'wqwqwqw', 'qwqwqwqwqwq', 'senioroman4uk@gmail.com', '127.0.0.1', '2015-10-14 20:50:05');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id`          INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type`        INT(10) UNSIGNED NOT NULL,
  `name`        VARCHAR(255)     NOT NULL,
  `content`     TEXT             NOT NULL,
  `date`        TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` VARCHAR(255)     NOT NULL,
  `cover`       VARCHAR(255)     NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_news_type_id_idx` (`type`),
  CONSTRAINT `FK_news_type_id` FOREIGN KEY (`type`) REFERENCES `news_types` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 5
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1, 2, 'Книжковий ярмарок №1: чи поїде Україна до Франкфурта',
                           'За два тижні до початку найбільшої у світі книжкової події Україна, яка зазіхнула на рекордний для себе національний\n    стенд, досі не вирішила базових бюрократичних питань і не заплатила організаторам за свою участь.\n    Франкфуртський книжковий ярмарок має відбутися 14-18 жовтня.\n    Як і в попередні роки, участь України на офіційному рівні організовує Держкомтелерадіо (ДКТР). Ця урядова структура\n    заявила, що домовилася з адміністрацією ярмарку про стенд площею 100 квадратних метрів, ще й отримала на нього\n    знижку. Для порівняння, у 2012 році український куточок на виставці був у вісім разів менший, а минулого року через\n    війну на Донбасі національного стенду не було взагалі.\n    Однак дехто з видавців сумнівається, що державний орган зможе адекватно представити Україну, не опустившись до\n    шароварщини і формалізму.\n    Ці побоювання посилюються ще й тим, що ДКТР досі не заплатив організаторам міжнародного ярмарку за свій стенд, на\n    якому має бути представлено понад 15 українських видавництв. І тому участь офіційних представників України у цій\n    глобальній щорічній зустрічі видавців досі не підтверджена на сайті ярмарку.\n    Однак у самому комітеті кажуть, що \"все буде гаразд\" і Україна встигне організувати експозицію до початку форуму.',
                           '2015-10-14 19:50:44',
                           'За два тижні до початку найбільшої у світі книжкової події Україна, яка зазіхнула на рекордний для себе національний стенд, досі не вирішила базових бюрократичних питань і не заплатила організаторам за свою участь.',
                           '/assets/img/news/country1.jpg'), (2, 1, 'У афганському Кундузі тривають бої з талібами',
                                                              'Очевидці повідомили BBC, що на деяких вулицях досі ведуться бої.\n\nРаніше командувач урядових військ під час відеоконференції з президентом Афганістану Ашраф Гані заявив, що у місті триває \"зачистка\", але всі державні установи скоро запрацюють.\n\nТаліби заперечують ці заяви уряду і твердять, що, як і раніше, контролюють більшу частину Кундуза, а також прилеглі райони.\n\nКундуз стало першим великим містом, яке захопили таліби відтоді, як їх усунули від влади після вторгнення США 14 років тому.',
                                                              '2015-10-14 19:50:44',
                                                              'У афганському місті Кундуз тривають бої між урядовими силами Афганістану й талібами, хоча уряд заявив, що вже\n    контролює місто.',
                                                              '/assets/img/news/politics1.jpg'),
  (3, 3, 'Екс-віце-президента ФІФА довічно відсторонили від футболу',
   '72-річний пан Ворнер - екс-президент Конфедерації футболу Північної і Центральної Америки і країн Карибського басейну (КОНКАКАФ) - покинув ФІФА 2011 року.\n\nЗараз він намагається уникнути екстрадиції до США за звинуваченням у корупції і заперечує отримання мільйонів доларів хабарів.\n\nДжек Ворнер \"постійно і неодноразово чинив численні та різноманітні неправомірні дії\", йдеться у звіті комітету ФІФА з етики.\n\nЦьому висновку передувало власне розслідування ФІФА щодо процесу обрання країн-господарів чемпіонатів світу 2022 і 2018 років.\n\nУ вівторок ФІФА заявила, що Ворнер був визнаний винним у неодноразовому порушенні етичного коду організації.\n\n\"Він був ключовим учасником схем, пов\'язаних з отриманням, пропозицією незаконних платежів, та інших схем заробляння грошей\", - зазначено в заяві організації.',
   '2015-10-14 19:50:44',
   'Колишньому віце-президенту ФІФА Джеку Ворнеру довічно заборонили будь-яку діяльність, пов\'язану з футболом.',
   '/assets/img/news/sport1.jpg'), (4, 1, 'США і Росія планують переговори щодо польотів у Сирії',
                                    'Літаки були у візуальному контакті на відстані від 10 до 20 миль (15-30 км) один від одного. Про це розповів у Вашингтоні прес-секретар міністра оборони США.\n\nЦе буде третій раунд переговорів США та РФ. Обидві країни прагнуть знайти спосіб уникнути випадкового конфлікту авіації у регіоні.\n\nСША вже назвали дії Росії у Сирії \"неправильними\".\n\nМіністр оборони США Ештон Картер заявив, що очікує на угоду найближчим часом. Росія заявила, що \"оновлені пропозиції\" щодо цього питання обговорять під час відео-конференції. Як очікується, конференція між представниками США і РФ пройде в середу.\n\n\"Наші переговори ... дуже професійні, дуже конструктивні, і я очікую, що вони приведуть до угоди в дуже короткі терміни\", - заявив міністр оборони США.\n\nМіністерство оборони Росії підтвердило, що оновило пропозиції щодо Сирії для США і чекає на третю відеоконференцію.\n\nПереговори пройдуть після того, як представник Пентагону розповів журналістам, що два американських і два російських літаки у суботу були в одному повітряному просторі над Сирією. Вони були у візуальному контакті один з одним.\n\nВійськові США сказали, що російські літаки неодноразово наближались до американських безпілотних апаратів. Росія публічно не коментувала ці звинувачення.\n\nРосія і США з їхніми союзниками по коаліції паралельно проводять бомбардувальні кампанії у Сирії, цілі яких не збігаються.\n\nРосія почала завдавати авіаударів в Сирії наприкінці минулого місяця. Кремль заявляє, що ці удари націлені на позиції угруповання \"Ісламська держава\" та інших джихадистів.\n\nКоаліція на чолі з США виступає на підтримку опозиційних сил, які ведуть боротьбу проти режиму у Дамаску, а також протистоїть екстремістам з \"Ісламської держави\" (ІД).\n\nСША кажуть, що Росія бомбардує повстанців, які виступають проти президента Башара Асада.',
                                    '2015-10-14 23:00:46',
                                    'США і Росія планують переговори щодо безпеки польотів у Сирії після того, як бойові літаки країн пролетіли в милях один від одного.',
                                    '/assets/img/news/politics2.jpg');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_types`
--

DROP TABLE IF EXISTS `news_types`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_types` (
  `id`   INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(70)      NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_types`
--

LOCK TABLES `news_types` WRITE;
/*!40000 ALTER TABLE `news_types` DISABLE KEYS */;
INSERT INTO `news_types` VALUES (3, 'Country'), (1, 'Politics'), (2, 'Sport');
/*!40000 ALTER TABLE `news_types` ENABLE KEYS */;
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
INSERT INTO `pages` VALUES (1, 'Home', '/', 'get ~^/$~ => NewsController/index', 1, 1),
  (2, 'Contact', '/contact', 'get ~^/contact$~ => StaticController/contact', 2, 1),
  (3, 'Politics', '/news?type=1', 'get ~^/news$~ => NewsController/find', 3, 1),
  (4, 'Sport', '/news?type=2', 'get ~^/news$~ => NewsController/find', 4, 1),
  (5, 'Country', '/news?type=3', 'get ~^/news$~ => NewsController/find', 5, 1);
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

-- Dump completed on 2015-10-15  3:20:50
