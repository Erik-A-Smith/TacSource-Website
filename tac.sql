-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: tac
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `attendee` int(10) unsigned DEFAULT NULL,
  `role` int(10) unsigned DEFAULT NULL,
  `event_id` int(10) unsigned DEFAULT NULL,
  `status` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attendances_attendee_foreign` (`attendee`),
  KEY `attendances_role_foreign` (`role`),
  KEY `attendances_event_id_foreign` (`event_id`),
  KEY `attendances_status_foreign` (`status`),
  CONSTRAINT `attendances_attendee_foreign` FOREIGN KEY (`attendee`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `attendances_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `attendances_role_foreign` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `attendances_status_foreign` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendances`
--

LOCK TABLES `attendances` WRITE;
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;
INSERT INTO `attendances` VALUES (1,'2018-03-06 18:53:41','2018-03-06 18:54:00','2018-03-06 18:54:00',8,1,1,3),(2,'2018-03-06 22:16:12','2018-03-06 22:17:00','2018-03-06 22:17:00',6,5,2,2),(3,'2018-03-06 23:37:04','2018-03-07 01:12:55','2018-03-07 01:12:55',9,6,3,3),(4,'2018-03-06 23:39:32','2018-03-06 23:40:32','2018-03-06 23:40:32',7,5,3,2),(5,'2018-03-06 23:39:51','2018-03-07 01:12:55','2018-03-07 01:12:55',3,6,3,3),(6,'2018-03-06 23:40:01','2018-03-07 01:12:55','2018-03-07 01:12:55',17,5,3,3),(7,'2018-03-06 23:40:33','2018-03-06 23:40:35','2018-03-06 23:40:35',7,5,3,1),(8,'2018-03-06 23:40:36','2018-03-06 23:40:40','2018-03-06 23:40:40',7,5,3,1),(9,'2018-03-07 00:10:11','2018-03-07 01:12:55','2018-03-07 01:12:55',15,5,3,3),(10,'2018-03-07 00:10:13','2018-03-07 01:12:55','2018-03-07 01:12:55',14,5,3,3),(12,'2018-03-07 00:10:17','2018-03-07 01:12:55','2018-03-07 01:12:55',12,5,3,3),(13,'2018-03-07 00:10:19','2018-03-07 01:12:55','2018-03-07 01:12:55',11,5,3,3),(14,'2018-03-07 00:10:22','2018-03-07 01:12:55','2018-03-07 01:12:55',10,5,3,3),(15,'2018-03-07 00:10:27','2018-03-07 01:12:55','2018-03-07 01:12:55',8,5,3,3),(16,'2018-03-07 00:10:29','2018-03-07 01:12:55','2018-03-07 01:12:55',7,5,3,3),(17,'2018-03-07 00:10:32','2018-03-07 01:12:55','2018-03-07 01:12:55',6,5,3,3),(18,'2018-03-07 00:10:34','2018-03-07 01:12:55','2018-03-07 01:12:55',4,5,3,3),(24,'2018-03-07 18:32:36','2018-03-07 23:00:29',NULL,2,5,7,2),(25,'2018-03-07 21:41:13','2018-03-07 21:41:23',NULL,9,5,7,2),(26,'2018-03-07 22:50:34','2018-03-07 22:50:37',NULL,17,5,7,2),(27,'2018-03-07 23:00:24','2018-03-07 23:00:24',NULL,6,5,7,2),(28,'2018-03-08 01:23:44','2018-03-08 01:24:02',NULL,18,5,7,2),(29,'2018-03-08 01:39:09','2018-03-08 01:39:09',NULL,10,5,7,2),(30,'2018-03-08 03:09:15','2018-03-08 03:09:15',NULL,12,5,7,2),(32,'2018-03-09 16:38:52','2018-03-10 02:13:04',NULL,2,3,8,2),(33,'2018-03-09 17:45:11','2018-03-10 02:13:07',NULL,11,5,8,2),(34,'2018-03-09 17:47:58','2018-03-10 02:12:57',NULL,9,4,8,2),(35,'2018-03-09 19:23:10','2018-03-16 22:48:53',NULL,17,2,8,2),(36,'2018-03-09 19:53:50','2018-03-10 02:13:31',NULL,10,3,8,2),(37,'2018-03-09 20:19:17','2018-03-09 20:19:47','2018-03-09 20:19:47',20,1,8,1),(38,'2018-03-09 20:19:48','2018-03-10 02:13:43',NULL,20,5,8,2),(39,'2018-03-09 21:34:43','2018-03-10 02:13:45',NULL,22,5,8,2),(40,'2018-03-09 22:30:16','2018-03-10 02:13:54',NULL,12,5,8,2),(41,'2018-03-09 22:40:23','2018-03-10 02:14:00',NULL,23,7,8,2),(42,'2018-03-10 00:08:10','2018-03-10 00:40:59','2018-03-10 00:40:59',24,5,8,1),(43,'2018-03-10 00:10:20','2018-03-10 02:14:06',NULL,25,6,8,2),(44,'2018-03-10 23:43:12','2018-03-11 03:24:23',NULL,9,5,9,2),(45,'2018-03-10 23:52:42','2018-03-11 00:30:08',NULL,20,5,9,2),(46,'2018-03-11 00:12:53','2018-03-11 03:19:35','2018-03-11 03:19:35',18,2,9,2),(47,'2018-03-11 00:24:10','2018-03-11 00:30:17',NULL,23,7,9,2),(48,'2018-03-11 00:41:19','2018-03-11 03:25:06',NULL,24,5,9,2),(49,'2018-03-11 00:43:53','2018-03-11 03:24:57',NULL,10,3,9,2),(50,'2018-03-11 03:19:37','2018-03-11 03:19:39','2018-03-11 03:19:39',18,5,9,1),(51,'2018-03-11 03:24:39','2018-03-11 03:24:45',NULL,6,4,9,2),(52,'2018-03-11 03:25:36','2018-03-11 03:25:42',NULL,3,3,9,2),(53,'2018-03-11 03:25:57','2018-03-11 03:25:57',NULL,25,5,9,2),(54,'2018-03-11 03:26:29','2018-03-11 03:26:29',NULL,22,5,9,2),(55,'2018-03-11 03:27:43','2018-03-11 03:27:52',NULL,18,2,9,2),(57,'2018-03-12 01:28:19','2018-03-13 02:33:04',NULL,8,4,10,2),(58,'2018-03-12 19:41:49','2018-03-12 21:05:40',NULL,9,5,10,2),(59,'2018-03-12 22:33:49','2018-03-12 22:34:21',NULL,20,6,10,2),(60,'2018-03-12 22:52:07','2018-03-13 02:33:14',NULL,12,2,10,2),(61,'2018-03-12 22:59:01','2018-03-13 00:47:46','2018-03-13 00:47:46',22,7,10,2),(62,'2018-03-12 23:12:34','2018-03-12 23:14:08',NULL,26,5,10,2),(63,'2018-03-12 23:31:49','2018-03-12 23:31:57','2018-03-12 23:31:57',3,5,11,3),(64,'2018-03-12 23:31:49','2018-03-12 23:31:57','2018-03-12 23:31:57',7,4,11,2),(65,'2018-03-12 23:39:16','2018-03-13 02:33:22',NULL,10,5,10,2),(66,'2018-03-12 23:40:17','2018-03-12 23:40:20','2018-03-12 23:40:20',2,5,10,1),(67,'2018-03-12 23:58:02','2018-03-13 02:33:21',NULL,18,2,10,2),(68,'2018-03-13 00:03:56','2018-03-13 02:33:29',NULL,23,7,10,2),(69,'2018-03-13 00:18:31','2018-03-13 00:18:37','2018-03-13 00:18:37',3,5,12,2),(70,'2018-03-13 00:18:31','2018-03-13 00:18:37','2018-03-13 00:18:37',4,5,12,2),(71,'2018-03-13 00:18:31','2018-03-13 00:18:37','2018-03-13 00:18:37',6,5,12,2),(72,'2018-03-13 02:34:01','2018-03-13 02:34:01',NULL,19,5,10,2),(73,'2018-03-13 02:34:33','2018-03-13 02:34:33',NULL,7,5,10,2),(74,'2018-03-13 02:35:08','2018-03-13 02:35:12',NULL,14,3,10,2),(75,'2018-03-13 18:34:03','2018-03-13 18:34:15','2018-03-13 18:34:15',3,4,13,2),(76,'2018-03-13 18:34:03','2018-03-13 18:34:15','2018-03-13 18:34:15',4,5,13,2),(77,'2018-03-13 18:34:03','2018-03-13 18:34:15','2018-03-13 18:34:15',6,5,13,2),(78,'2018-03-13 18:34:03','2018-03-13 18:34:15','2018-03-13 18:34:15',7,5,13,2),(79,'2018-03-13 18:34:03','2018-03-13 18:34:15','2018-03-13 18:34:15',8,5,13,2),(80,'2018-03-13 18:34:03','2018-03-13 18:34:15','2018-03-13 18:34:15',9,5,13,2),(81,'2018-03-13 18:34:03','2018-03-13 18:34:15','2018-03-13 18:34:15',10,5,13,2),(82,'2018-03-13 20:29:12','2018-03-14 23:30:24',NULL,2,5,14,2),(83,'2018-03-13 21:41:59','2018-03-14 23:30:25',NULL,22,5,14,2),(84,'2018-03-14 03:04:51','2018-03-15 17:45:06',NULL,23,5,14,2),(85,'2018-03-14 03:07:26','2018-03-14 22:24:03','2018-03-14 22:24:03',2,5,16,2),(86,'2018-03-14 19:32:42','2018-03-14 23:30:26',NULL,7,4,14,2),(87,'2018-03-14 21:26:25','2018-03-17 02:07:49',NULL,26,5,16,2),(88,'2018-03-14 21:26:40','2018-03-14 23:30:27',NULL,26,5,14,2),(89,'2018-03-14 22:08:05','2018-03-14 22:19:13',NULL,9,5,14,2),(90,'2018-03-14 22:09:09','2018-03-14 23:30:31',NULL,24,5,14,2),(91,'2018-03-14 22:23:33','2018-03-14 22:25:52',NULL,9,5,16,2),(92,'2018-03-14 22:24:10','2018-03-14 22:26:04','2018-03-14 22:26:04',2,5,16,3),(93,'2018-03-14 22:26:05','2018-03-16 23:54:53',NULL,2,5,16,2),(94,'2018-03-14 23:00:00','2018-03-17 02:07:51',NULL,22,5,16,2),(95,'2018-03-14 23:30:19','2018-03-15 17:45:18',NULL,4,4,14,2),(96,'2018-03-14 23:30:54','2018-03-14 23:30:54',NULL,14,5,14,2),(97,'2018-03-14 23:56:29','2018-03-17 02:07:58',NULL,23,5,16,3),(98,'2018-03-14 23:57:02','2018-03-15 17:45:12',NULL,6,4,14,2),(99,'2018-03-14 23:57:06','2018-03-15 02:00:47',NULL,19,5,14,2),(100,'2018-03-14 23:57:22','2018-03-16 18:08:32','2018-03-16 18:08:32',18,5,16,1),(101,'2018-03-16 18:20:03','2018-03-17 02:08:02',NULL,25,5,16,3),(102,'2018-03-16 19:21:00','2018-03-17 02:08:04',NULL,7,5,16,2),(103,'2018-03-16 23:27:56','2018-03-16 23:28:03',NULL,6,4,16,2),(104,'2018-03-16 23:27:56','2018-03-17 02:08:11',NULL,14,5,16,2),(105,'2018-03-16 23:40:18','2018-03-26 23:33:48','2018-03-26 23:33:48',18,5,16,3),(106,'2018-03-16 23:55:12','2018-03-17 02:08:15',NULL,17,5,16,2),(107,'2018-03-17 02:07:44','2018-03-17 02:08:16',NULL,4,5,16,2),(108,'2018-03-19 22:33:11','2018-03-19 22:58:55',NULL,24,5,17,2),(109,'2018-03-19 23:01:22','2018-03-20 08:17:25',NULL,15,6,17,2),(110,'2018-03-19 23:03:47','2018-03-19 23:16:19',NULL,17,2,17,2),(111,'2018-03-19 23:09:00','2018-03-20 02:10:54',NULL,10,2,17,2),(112,'2018-03-19 23:21:57','2018-03-19 23:52:41',NULL,25,5,17,2),(113,'2018-03-19 23:38:47','2018-03-19 23:52:41',NULL,22,5,17,2),(114,'2018-03-19 23:44:23','2018-03-20 02:16:39',NULL,9,3,17,2),(115,'2018-03-19 23:47:49','2018-03-20 02:11:18',NULL,26,7,17,2),(116,'2018-03-19 23:52:13','2018-03-19 23:53:15','2018-03-19 23:53:15',7,5,17,2),(117,'2018-03-19 23:52:37','2018-03-20 01:23:10',NULL,2,3,17,2),(118,'2018-03-19 23:53:16','2018-03-20 02:10:00',NULL,7,4,17,2),(119,'2018-03-19 23:59:41','2018-03-20 02:16:43',NULL,23,7,17,2),(120,'2018-03-20 02:10:04','2018-03-20 02:10:09',NULL,8,4,17,2),(121,'2018-03-20 02:23:38','2018-03-20 02:25:37',NULL,12,5,17,2),(122,'2018-03-20 02:28:47','2018-03-20 02:28:47',NULL,12,5,16,1),(123,'2018-03-22 00:00:56','2018-03-22 00:01:52',NULL,2,5,18,2),(124,'2018-03-22 00:01:49','2018-03-22 00:01:49',NULL,9,5,18,2),(125,'2018-03-22 00:01:49','2018-03-22 00:01:49',NULL,10,5,18,2),(126,'2018-03-22 00:01:49','2018-03-22 00:01:49',NULL,17,5,18,2),(127,'2018-03-22 00:01:49','2018-03-22 00:01:49',NULL,19,5,18,2),(128,'2018-03-22 00:01:49','2018-03-22 00:01:49',NULL,22,5,18,2),(129,'2018-03-22 00:01:49','2018-03-22 00:01:49',NULL,23,5,18,2),(130,'2018-03-22 00:01:49','2018-03-22 00:02:11','2018-03-22 00:02:11',24,5,18,2),(131,'2018-03-22 00:01:49','2018-03-22 00:01:49',NULL,26,5,18,2),(132,'2018-03-22 00:02:12','2018-03-22 00:28:11',NULL,24,5,18,2),(133,'2018-03-23 20:56:50','2018-03-24 02:08:38',NULL,20,6,19,2),(134,'2018-03-23 22:37:33','2018-03-24 02:08:37',NULL,26,5,19,2),(135,'2018-03-23 23:30:52','2018-03-25 00:09:12',NULL,6,5,19,2),(136,'2018-03-23 23:34:56','2018-03-24 02:08:34',NULL,15,7,19,2),(137,'2018-03-23 23:36:16','2018-03-24 02:08:33',NULL,17,7,19,2),(138,'2018-03-23 23:47:33','2018-03-24 02:12:34',NULL,10,3,19,2),(139,'2018-03-23 23:56:22','2018-03-24 02:08:30',NULL,23,7,19,2),(140,'2018-03-24 02:12:39','2018-03-24 02:13:20',NULL,24,3,19,2),(141,'2018-03-24 02:13:16','2018-03-25 00:08:43',NULL,3,2,19,2),(142,'2018-03-24 02:13:16','2018-03-25 00:09:33',NULL,4,4,19,2),(143,'2018-03-24 02:13:16','2018-03-25 00:08:57',NULL,8,2,19,2),(144,'2018-03-24 02:13:16','2018-03-24 02:13:16',NULL,19,5,19,2),(145,'2018-03-24 02:13:16','2018-03-24 02:13:16',NULL,22,5,19,2),(146,'2018-03-25 01:05:57','2018-03-25 04:52:36',NULL,3,2,20,2),(147,'2018-03-25 01:06:52','2018-03-25 01:06:52',NULL,8,5,20,2),(148,'2018-03-25 01:06:52','2018-03-25 01:06:52',NULL,9,5,20,2),(149,'2018-03-25 01:06:52','2018-03-25 01:06:52',NULL,23,5,20,2),(150,'2018-03-25 04:53:15','2018-03-25 04:53:15',NULL,15,5,20,2),(151,'2018-03-25 04:53:15','2018-03-25 04:53:22',NULL,20,3,20,2),(152,'2018-03-25 04:53:15','2018-03-25 04:53:15',NULL,22,5,20,2),(153,'2018-03-25 04:53:15','2018-03-25 04:53:15',NULL,26,5,20,2),(154,'2018-03-25 06:17:11','2018-03-26 02:28:29',NULL,26,5,21,2),(155,'2018-03-25 07:05:32','2018-03-25 07:05:32',NULL,4,5,22,2),(156,'2018-03-25 07:05:32','2018-03-25 07:05:32',NULL,8,5,22,2),(157,'2018-03-25 07:07:47','2018-03-25 07:07:47',NULL,31,5,22,2),(158,'2018-03-25 07:12:34','2018-03-25 07:12:34',NULL,31,5,19,2),(159,'2018-03-25 07:12:46','2018-03-25 07:12:46',NULL,31,5,18,2),(160,'2018-03-25 07:12:57','2018-03-25 07:12:57',NULL,31,5,17,2),(161,'2018-03-25 14:57:25','2018-03-26 02:28:32',NULL,20,5,21,2),(162,'2018-03-25 15:38:28','2018-03-25 15:38:36','2018-03-25 15:38:36',15,5,21,1),(163,'2018-03-25 16:49:47','2018-03-26 02:28:23',NULL,23,5,21,2),(164,'2018-03-25 17:23:18','2018-03-26 02:28:22',NULL,9,5,21,2),(165,'2018-03-25 19:50:11','2018-03-25 19:50:11',NULL,8,5,21,2),(166,'2018-03-25 19:59:19','2018-03-26 02:28:20',NULL,4,5,21,2),(167,'2018-03-25 21:32:19','2018-03-26 02:28:19',NULL,22,5,21,2),(168,'2018-03-25 22:10:54','2018-03-25 22:39:12','2018-03-25 22:39:12',32,5,21,1),(169,'2018-03-25 22:46:09','2018-03-26 02:28:19',NULL,10,5,21,2),(170,'2018-03-26 02:28:14','2018-03-26 02:28:14',NULL,6,5,21,2),(171,'2018-03-26 02:28:14','2018-03-26 02:28:14',NULL,7,5,21,2),(172,'2018-03-26 21:10:39','2018-03-27 01:43:16',NULL,9,4,23,2),(173,'2018-03-26 21:10:54','2018-03-27 01:43:14',NULL,2,3,23,2),(174,'2018-03-26 21:26:28','2018-03-27 01:43:08',NULL,25,5,23,2),(175,'2018-03-26 21:32:53','2018-03-27 01:43:10',NULL,22,5,23,2),(176,'2018-03-26 22:18:33','2018-03-27 01:43:56',NULL,23,5,23,3),(177,'2018-03-26 22:31:41','2018-03-27 01:43:22',NULL,24,5,23,2),(178,'2018-03-26 22:48:01','2018-03-27 01:43:23',NULL,17,5,23,2),(179,'2018-03-26 23:16:59','2018-03-26 23:17:39','2018-03-26 23:17:39',6,5,24,3),(180,'2018-03-26 23:17:23','2018-03-26 23:17:39','2018-03-26 23:17:39',8,1,24,3),(181,'2018-03-26 23:19:11','2018-03-27 01:43:24',NULL,20,5,23,2),(182,'2018-03-26 23:46:56','2018-03-27 01:43:26',NULL,10,5,23,2),(183,'2018-03-26 23:54:01','2018-03-27 01:43:27',NULL,26,5,23,2),(184,'2018-03-26 23:58:28','2018-03-27 01:43:34',NULL,31,5,23,2),(185,'2018-03-27 01:44:09','2018-03-27 01:44:15',NULL,6,4,23,2),(186,'2018-03-28 23:57:44','2018-03-29 00:55:02',NULL,22,5,25,2),(187,'2018-03-28 23:58:27','2018-03-29 00:55:01',NULL,24,5,25,2),(188,'2018-03-28 23:59:14','2018-03-29 00:55:01',NULL,14,5,25,2),(189,'2018-03-29 00:26:39','2018-03-29 00:54:59',NULL,2,5,25,2),(190,'2018-03-29 00:54:01','2018-03-29 00:54:55',NULL,6,5,25,2),(191,'2018-03-29 00:54:45','2018-03-29 00:54:45',NULL,9,5,25,2),(192,'2018-03-29 00:54:45','2018-03-29 00:54:45',NULL,15,5,25,2),(193,'2018-03-29 00:54:45','2018-03-29 00:54:45',NULL,26,5,25,2),(194,'2018-03-29 01:31:14','2018-03-30 05:00:29',NULL,23,7,25,3),(195,'2018-03-30 14:39:26','2018-03-31 00:38:51',NULL,20,5,26,2),(196,'2018-03-30 23:31:29','2018-03-31 00:15:00',NULL,24,2,26,2),(197,'2018-03-31 00:13:16','2018-03-31 00:20:22',NULL,6,6,26,2),(198,'2018-03-31 01:34:15','2018-03-31 01:34:15',NULL,25,5,26,1),(199,'2018-04-01 19:41:06','2018-04-01 21:36:32','2018-04-01 21:36:32',11,4,26,1),(200,'2018-04-01 21:36:20','2018-04-01 21:36:23','2018-04-01 21:36:23',11,5,27,1),(201,'2018-04-02 19:13:32','2018-04-03 01:15:41',NULL,9,5,28,2),(202,'2018-04-02 19:20:45','2018-04-03 01:15:40',NULL,11,5,28,2),(203,'2018-04-02 19:22:03','2018-04-02 21:46:39',NULL,24,5,28,2),(204,'2018-04-02 19:52:13','2018-04-03 01:15:38',NULL,7,4,28,2),(205,'2018-04-02 21:46:30','2018-04-03 01:15:35',NULL,6,3,28,2),(206,'2018-04-02 23:39:06','2018-04-03 01:21:54',NULL,10,2,28,2),(207,'2018-04-02 23:40:10','2018-04-03 01:15:32',NULL,23,5,28,2),(208,'2018-04-02 23:44:07','2018-04-03 01:15:28',NULL,22,5,28,2),(209,'2018-04-03 01:16:35','2018-04-03 01:16:57',NULL,19,5,28,2),(210,'2018-04-03 01:19:15','2018-04-03 21:57:44','2018-04-03 21:57:44',26,5,28,3),(211,'2018-04-03 01:20:47','2018-04-03 01:20:47',NULL,12,5,28,2),(212,'2018-04-03 01:21:04','2018-04-03 01:21:04',NULL,14,5,28,2),(213,'2018-04-09 02:15:03','2018-04-09 15:00:00',NULL,19,5,29,2),(214,'2018-04-09 19:32:13','2018-04-09 19:32:18',NULL,6,4,29,2),(215,'2018-04-09 19:32:13','2018-04-09 19:32:13',NULL,9,5,29,2),(216,'2018-04-09 19:32:13','2018-04-09 19:32:13',NULL,12,5,29,2),(217,'2018-04-09 19:32:13','2018-04-09 19:32:13',NULL,15,5,29,2),(218,'2018-04-09 19:32:13','2018-04-09 19:32:13',NULL,22,5,29,2),(219,'2018-04-09 19:32:13','2018-04-09 19:32:13',NULL,26,5,29,2),(220,'2018-04-09 21:04:31','2018-04-09 21:04:31',NULL,12,5,31,2),(221,'2018-04-09 21:04:31','2018-04-09 21:04:31',NULL,17,5,31,2),(222,'2018-04-09 21:07:43','2018-04-11 01:46:04',NULL,15,5,30,2),(223,'2018-04-09 21:51:36','2018-04-11 01:46:06',NULL,26,5,30,2),(224,'2018-04-09 21:58:38','2018-04-11 01:45:35',NULL,22,5,30,2),(225,'2018-04-09 23:25:41','2018-04-11 01:45:36',NULL,24,2,30,2),(226,'2018-04-09 23:43:53','2018-04-15 17:37:28',NULL,22,5,31,2),(227,'2018-04-10 23:56:17','2018-04-11 01:45:37',NULL,10,5,30,2),(228,'2018-04-13 14:08:56','2018-04-13 14:08:56',NULL,22,5,32,1),(229,'2018-04-13 19:59:55','2018-04-14 01:49:04',NULL,22,5,33,2),(230,'2018-04-13 20:00:39','2018-04-14 01:49:06',NULL,15,5,33,2),(231,'2018-04-13 20:27:48','2018-04-14 01:49:06',NULL,3,5,33,2),(232,'2018-04-13 21:53:02','2018-04-14 01:49:07',NULL,26,6,33,2),(233,'2018-04-13 23:11:03','2018-04-14 01:49:08',NULL,24,2,33,2),(234,'2018-04-13 23:51:12','2018-04-14 01:49:11',NULL,10,3,33,2),(235,'2018-04-14 18:22:15','2018-04-14 18:22:15',NULL,9,5,33,2),(236,'2018-04-14 18:22:47','2018-04-14 18:22:55',NULL,6,4,33,2),(237,'2018-04-17 18:47:51','2018-04-19 01:18:49',NULL,15,5,34,2),(238,'2018-04-17 23:25:06','2018-04-19 01:18:49',NULL,22,5,34,2),(239,'2018-04-18 23:11:19','2018-04-19 01:18:50',NULL,26,6,34,2),(240,'2018-04-19 01:19:15','2018-04-19 01:19:15',NULL,19,5,34,2),(241,'2018-04-19 01:56:51','2018-04-21 01:51:36',NULL,22,5,35,2),(242,'2018-04-19 02:11:35','2018-04-21 01:51:36',NULL,2,5,35,2),(243,'2018-04-19 17:37:16','2018-04-20 20:13:18','2018-04-20 20:13:18',17,1,35,1),(244,'2018-04-20 22:43:43','2018-04-21 01:51:37',NULL,17,5,35,2),(245,'2018-04-20 23:49:01','2018-04-21 01:51:38',NULL,24,5,35,2),(246,'2018-04-20 23:52:45','2018-04-20 23:52:45',NULL,3,5,35,2),(247,'2018-04-20 23:55:26','2018-04-21 01:51:41',NULL,15,5,35,2),(248,'2018-04-21 01:51:17','2018-04-21 01:52:13',NULL,19,5,35,2),(249,'2018-04-21 01:52:05','2018-04-21 01:52:05',NULL,9,5,35,2),(250,'2018-04-21 01:52:05','2018-04-21 01:52:05',NULL,26,5,35,2),(251,'2018-04-21 01:52:05','2018-04-21 01:52:05',NULL,31,5,35,2),(252,'2018-04-21 02:08:10','2018-04-26 19:34:10','2018-04-26 19:34:10',2,5,36,3),(253,'2018-04-21 12:49:16','2018-04-26 01:17:15',NULL,19,3,36,2),(254,'2018-04-21 14:21:52','2018-04-21 14:21:56','2018-04-21 14:21:56',26,5,36,1),(255,'2018-04-21 14:21:58','2018-04-25 21:35:22','2018-04-25 21:35:22',26,5,36,1),(256,'2018-04-22 15:04:56','2018-04-26 01:17:13',NULL,15,3,36,2),(257,'2018-04-22 15:12:23','2018-04-24 00:41:49',NULL,15,5,37,2),(258,'2018-04-23 23:11:00','2018-04-24 00:41:49',NULL,24,2,37,2),(259,'2018-04-23 23:43:52','2018-04-24 00:41:48',NULL,26,6,37,2),(260,'2018-04-23 23:44:48','2018-04-24 00:41:47',NULL,19,5,37,2),(261,'2018-04-24 00:41:44','2018-04-24 00:41:44',NULL,9,5,37,2),(262,'2018-04-24 00:41:44','2018-04-24 00:41:44',NULL,10,5,37,2),(263,'2018-04-24 00:41:44','2018-04-24 00:41:44',NULL,22,5,37,2),(264,'2018-04-25 17:11:42','2018-04-26 02:38:09',NULL,17,5,36,2),(265,'2018-04-25 21:51:11','2018-04-26 00:04:18','2018-04-26 00:04:18',26,5,36,1),(266,'2018-04-25 23:20:55','2018-04-26 01:17:18',NULL,24,3,36,2),(267,'2018-04-26 01:21:53','2018-04-26 01:21:53',NULL,12,5,36,2),(268,'2018-04-27 20:31:15','2018-04-28 04:05:06',NULL,24,2,38,2),(269,'2018-04-27 21:22:29','2018-04-28 04:05:17',NULL,17,2,38,2),(270,'2018-04-27 21:44:59','2018-04-28 00:15:36',NULL,26,6,38,2),(271,'2018-04-27 21:50:04','2018-04-28 04:13:40',NULL,19,6,38,2),(272,'2018-04-27 23:49:52','2018-04-28 00:15:37',NULL,22,7,38,2),(273,'2018-04-28 00:15:32','2018-04-28 00:15:32',NULL,2,5,38,2),(274,'2018-04-28 00:15:32','2018-04-28 00:15:32',NULL,3,5,38,2),(275,'2018-04-28 00:15:32','2018-04-28 04:04:59',NULL,4,4,38,2),(276,'2018-04-28 00:15:32','2018-04-28 04:04:51',NULL,10,3,38,2),(277,'2018-04-28 00:15:32','2018-04-28 00:36:43','2018-04-28 00:36:43',11,5,38,2),(278,'2018-04-28 00:15:32','2018-04-28 00:15:32',NULL,31,5,38,2),(279,'2018-04-28 00:36:45','2018-04-28 02:17:10',NULL,11,5,38,2),(280,'2018-04-28 04:05:35','2018-04-28 04:05:38',NULL,10,3,39,2),(281,'2018-04-28 04:06:03','2018-04-28 04:06:03',NULL,2,5,39,2),(282,'2018-04-28 04:06:03','2018-04-28 04:06:03',NULL,3,5,39,2),(283,'2018-04-28 04:06:03','2018-04-28 04:06:15',NULL,4,4,39,2),(284,'2018-04-28 04:06:03','2018-04-28 04:06:03',NULL,11,5,39,2),(285,'2018-04-28 04:06:03','2018-04-28 04:06:18',NULL,17,2,39,2),(286,'2018-04-28 04:06:03','2018-04-28 04:13:25',NULL,19,6,39,2),(287,'2018-04-28 04:06:03','2018-04-28 04:06:03',NULL,22,5,39,2),(288,'2018-04-28 04:06:03','2018-04-28 04:13:04',NULL,24,2,39,2),(289,'2018-04-28 04:06:03','2018-04-28 04:06:03',NULL,26,5,39,2),(290,'2018-04-28 04:06:20','2018-04-28 04:06:20',NULL,9,5,39,2);
/*!40000 ALTER TABLE `attendances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_types`
--

DROP TABLE IF EXISTS `event_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_types`
--

LOCK TABLES `event_types` WRITE;
/*!40000 ALTER TABLE `event_types` DISABLE KEYS */;
INSERT INTO `event_types` VALUES (1,'Training',5,'2018-03-06 18:03:07','2018-03-06 18:03:07',NULL),(2,'Op',3,'2018-03-06 18:03:07','2018-03-06 18:03:07',NULL),(3,'Recruiting',10,'2018-03-06 18:03:07','2018-03-07 15:12:36',NULL),(4,'Misc',0,'2018-03-06 18:03:07','2018-03-06 18:51:55',NULL);
/*!40000 ALTER TABLE `event_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner` int(10) unsigned DEFAULT NULL,
  `type` int(10) unsigned DEFAULT NULL,
  `status` int(10) unsigned DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mods` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_owner_foreign` (`owner`),
  KEY `events_status_foreign` (`status`),
  KEY `events_type_foreign` (`type`),
  CONSTRAINT `events_owner_foreign` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `events_status_foreign` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `events_type_foreign` FOREIGN KEY (`type`) REFERENCES `event_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,2,4,2,'Welcome','8:00pm','Trying out the new website tracker!','2018-03-06','Pacific (PST)',NULL,'2018-03-06 18:39:39','2018-03-06 18:54:00','2018-03-06 18:54:00'),(2,2,1,1,'Testing apples','12:00pm','Testing apple pens','2018-03-28','HST (HST)',NULL,'2018-03-06 22:16:07','2018-03-06 22:17:00','2018-03-06 22:17:00'),(3,2,4,2,'Brutus\' Giant Dildo Bananza','8:00px','Bring them all!','2018-03-06','Pacific (PST)',NULL,'2018-03-06 23:36:33','2018-03-07 01:12:55','2018-03-07 01:12:55'),(4,7,4,3,'TEST','0000','TEST','2018-03-14','Central Time Zone (CST)',NULL,'2018-03-06 23:43:36','2018-03-06 23:43:58','2018-03-06 23:43:58'),(6,2,1,1,'kRIEGERS RANDOM EVENT',NULL,NULL,NULL,'HST (HST)',NULL,'2018-03-07 01:59:42','2018-03-07 02:03:35','2018-03-07 02:03:35'),(7,8,1,2,'Training: Explosives & demolition','20:00','Covers demolitions, hand grenades/ 40MM grenades, and hopefully bomb usage and disarmament.','2018-03-07','HST (HST)','2018-03-07_182835-nw4Skg4t3Y2OD6njQUGv7vdahxVhrVuwiqlETQTrfHR1myRPjv23CZLCrjaoTacSource_RHS_Standard_Dec_8.html','2018-03-07 18:25:43','2018-03-07 18:28:52',NULL),(8,8,2,2,'Lythium Marines: Logistics and counter-assault','2000','Playing as US Marines, some players will start out in a small FOB under siege by militants, and require other players to coordinate a logistics convoy and counter assault to repel the enemy.','2018-03-09','HST (HST)','2018-03-10_001738-K1GQP4SnJ0kapL52CJVjpwi4YYJB9EAr60DixoY36Did8F3BucaU4SQ3Tpo6RHS_Standard_Lythium.html','2018-03-09 16:25:27','2018-03-10 00:17:38',NULL),(9,8,2,2,'Roberts Mission','2000','Hosted by Robert Schroder on 03/10/18 at 1700PST/2000 EST.','2018-03-10','Eastern Time Zone (EST)','2018-03-10_232041-6AJhq1GaISzuMRwDRITpnKpGcBLZIO157vhOVSedeN7usDSMVOxi3ypWgcN5TacSource_RHS_Standard_Dec_8.html','2018-03-10 23:20:41','2018-03-10 23:43:08',NULL),(10,4,2,2,'The Battle of Zaros','5:00','The Free Altis Army is moving to capture the town of Zaros from Akhanteros\' Rebels.','2018-03-12','Pacific (PST)','2018-03-12_000734-ERnPeYhgQbOyey3FaGdQa6xi69nmAvJ2xkCrOCRLSNWi7NXG13cLXr0Fmk4ITacSource_RHS_Standard_Dec_8.html','2018-03-12 00:07:34','2018-03-12 00:07:51',NULL),(11,2,1,1,'Testing Delete Meh',NULL,NULL,NULL,'HST (HST)',NULL,'2018-03-12 23:31:43','2018-03-12 23:31:57','2018-03-12 23:31:57'),(12,2,1,1,'Tst',NULL,NULL,NULL,'HST (HST)',NULL,'2018-03-13 00:18:24','2018-03-13 00:18:37','2018-03-13 00:18:37'),(13,2,1,1,'awedwq',NULL,NULL,NULL,'HST (HST)',NULL,'2018-03-13 18:33:48','2018-03-13 18:34:15','2018-03-13 18:34:15'),(14,8,1,2,'Weekly Training','2000','We will cover:\r\nAdvanced medical, LR usage, logistics, engineering, and convoy tactics. \r\nRotary wing flight will also be taught to a select few individuals.','2018-03-14','HST (HST)',NULL,'2018-03-13 20:16:57','2018-03-13 20:17:16',NULL),(15,2,1,1,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',NULL,'HST (HST)',NULL,'2018-03-14 00:24:19','2018-03-14 00:24:28','2018-03-14 00:24:28'),(16,8,2,2,'Lythium: Life Line','2000','A platoon of Army drivers (88M) freshly deployed in Lythium face the reality of conflict as they keep the wheels of war moving forward. \r\nStationed out of JBAD Forward Air Base, these young soldiers work together in small teams to ensure their supplies reach those who need them most. Their only support will be a thinly spread team of CAS Pilots running fire missions in the A.O.','2018-03-16','Eastern Time Zone (EST)','2018-03-14_025458-EjfNEsMVuhV7affHrVf8RshDNaH660JvC9450Ylt1RPjBrrvEbKwzObuQWL0TacSource_RHS_Standard_Dec_8.html','2018-03-14 02:54:58','2018-03-14 02:55:31',NULL),(17,4,2,2,'The Battle of Berezino','5:00','Separatists of the Donetsk People\'s Republic are getting ready to assault the coastal city of Berezino. Hopefully the members of the Azov Volunteer Regiment can hold the line until Ukrainian Army can arrive.','2018-03-19','HST (HST)','2018-03-19_230448-7B77rIJGUzmqEMP4kCXq7cs3OQsYkI7bFs6IiefOdGqsBPDOD5DRdevVQQOBStandard.html','2018-03-18 06:55:56','2018-03-19 23:04:48',NULL),(18,8,1,2,'Training','2000','Training for 03/21/18\r\nPVP event!','2018-03-21','Eastern Time Zone (EST)',NULL,'2018-03-21 23:57:15','2018-03-21 23:57:20',NULL),(19,7,2,2,'March 23, 2018 Mission','2000','I\'m terrible at coming up with names...','2018-03-23','HST (HST)',NULL,'2018-03-23 20:47:09','2018-03-23 21:18:38',NULL),(20,4,2,2,'Bran\'s Impromptu Mission','6:00','I got bored, so I\'m running a small mission.','2018-03-24','Pacific (PST)',NULL,'2018-03-25 00:57:54','2018-03-25 00:58:02',NULL),(21,12,2,2,'Prison Escape','7','Can you escape this heavily guarded concentration camp and make it out of the area alive? Probably not, and you will likely die trying!','2018-03-25','Eastern Time Zone (EST)',NULL,'2018-03-25 03:03:13','2018-03-25 05:09:21',NULL),(22,14,3,2,'Spagghettip Recruiting','22:30','Recruiting','2018-03-24','Pacific (PST)',NULL,'2018-03-25 05:15:12','2018-03-25 07:05:02',NULL),(23,8,2,2,'Bystrica SBCT: Advance The Line','2000','Acting as an SBCT (Stryker Brigade Combat Team), call sign \"SPARTAN\" Stryker teams advance west through Russian occupied territory while call sign \"BANDAID\" medic team follows.','2018-03-26','Eastern Time Zone (EST)','2018-03-26_210833-1hIjXGuB1Vp8vLvhD1D3dDxdNs6PtW3C4rL854EZhKoqesLtVL5tQOUndAtfTacSource_RHS_Standard_Dec_8.html','2018-03-26 21:08:33','2018-03-26 21:10:26',NULL),(24,2,1,2,'Testing',NULL,NULL,NULL,'HST (HST)',NULL,'2018-03-26 23:15:54','2018-03-26 23:17:39','2018-03-26 23:17:39'),(25,4,1,2,'Training','5:00','We are going over navigation and basic FAC concepts. A short PVP event will follow.','2018-03-28','Pacific (PST)',NULL,'2018-03-28 23:57:27','2018-03-28 23:57:32',NULL),(26,22,2,2,'Robert\'s Desert Mission','1700 PST / 2000 EST','A mission hosted by Robert Scrotum on a map called Desert... Yup, hope you brought your gasmasks and anti-infection pills. As well as some extra magazines for your rifles as you\'ll be taking on the Desert with a gang of friends and go toe-to-toe with some of your previously known friends as you both fight to survive waves of zombies and attempt to get out alive.','2018-03-30','Central Time Zone (CST)','2018-03-30_042336-6BI0QnJ3sn7vvfmmXcO5Mg0SQkzAp3MN2ShCmcjeqsUrgApsDjf85Ao4ZomcArma_3_Mod_Preset_Zombie_Mission_Build_v2.html','2018-03-30 04:23:36','2018-03-30 04:43:22',NULL),(27,22,2,3,'Robert\'s Desert Mission (Re-hosted)','1700 PST / 2000 EST','Same as before, unfortunately, no one came the first time so someone hooked me up with a re-host *wink wink*','2018-03-31','Central Time Zone (CST)','2018-03-31_005651-u4Uc6Tm1g1Z0L05jRk2yOaiChUj7tZydRxPSFy7X03K2TCKvyFKlkAgGX4l6Arma_3_Mod_Preset_Zombie_Mission_Build_v2.html','2018-03-31 00:56:51','2018-04-07 19:32:25',NULL),(28,8,2,2,'Operation Knife Dive','2000','Callsign \"KNIFE\" is a NATO Assault Diver squad tasked with infiltrating Kavala\'s coastline and creating a diversion allowing other SOF teams to pass through unnoticed. The objective is to assault the compound of a high ranking officer and draw forces to us, eventually pulling out for extraction.','2018-04-02','Eastern Time Zone (EST)','2018-04-02_191135-NxD4nTeW3WutNsGfM3aykHyL42MZxkqJUKycELSAFmWPLGiEQ03I3QCK235PTacSource_RHS_Standard_Dec_8.html','2018-04-02 19:11:35','2018-04-02 19:13:28',NULL),(29,4,2,2,'Impromptu Mission','5:00','Scouts of the 10th Mountain Division push behind enemy lines to take out key Iranian positions.','2018-04-08','Pacific (PST)',NULL,'2018-04-08 23:45:08','2018-04-08 23:45:14',NULL),(30,17,2,2,'USAF Recon','8:00 PM','Helicopter crews going on squadron flights of Malden amidst tension with locals','2018-04-10','Eastern Time Zone (EST)','2018-04-09_205435-jBFkZ29FF0z2o6CiyfKi0VBZhJogOxH2bNcX3ZjCHG3m0PBjB0c2gaXs5P98TacSource_RHS_Standard_Dec_8.html','2018-04-09 20:54:35','2018-04-10 21:54:16',NULL),(31,6,3,2,'Memolos recruiting','8:00','Memolo is super cute and wanted to recruit some members','2018-04-09','Eastern Time Zone (EST)',NULL,'2018-04-09 21:04:19','2018-04-15 18:09:11',NULL),(32,3,2,3,'\"Reports of a Nuke\" Operation','7:00 PM','Intelligence indicates a presence of a nuclear device in IS controlled territory. If the weapon exists, we must prevent its use at all costs.','2018-04-20','Central Time Zone (CST)','2018-04-13_165206-apbYPqxSHVOaRrEdOCz0Fq1PWxzXB3p1sJTK8k73U6Wa049kDAdgaV7uuBeZTacSource_RHS_Standard_Dec_8.html','2018-04-13 13:53:17','2018-04-13 19:59:59',NULL),(33,2,2,2,'Black Summer','20:00','You\'ve been contracted by a billionaire to destroy documents they are holding hostage at a radio station at outpost \"Green Hill\". Your job; Destroy the documents and get out. Simple right? Just make sure no one sees you and remember, we were never there.','2018-04-13','Eastern Time Zone (EST)',NULL,'2018-04-13 19:58:56','2018-04-13 20:00:01',NULL),(34,6,1,2,'New armour mechanics training','5:00 Pm','I aim to go over the improvements to armour in arma covering the use of ERA and cage armour. how to use the new missile flight paths and how to work as a effective group in a tank.','2018-04-18','Pacific (PST)',NULL,'2018-04-17 18:43:38','2018-04-18 21:11:56',NULL),(35,6,2,2,'One Life Tanks','5:00 Pm','AAF forces repel the invaders with help of there new tankettes and CSAT prototype.','2018-04-20','Pacific (PST)','2018-04-19_012321-I3TjwtTbRnAYyiCx529O4GdXbaxXgp719xIfRNOzDnglQRmEvcAni3Ff3OJQArma_3_Mod_Preset_One_Life_inport.html','2018-04-19 01:23:21','2018-04-20 13:54:36',NULL),(36,6,1,2,'Zeus Training!','5:00 Pm','I will go over mission building','2018-04-25','Pacific (PST)',NULL,'2018-04-21 02:04:11','2018-04-21 03:02:09',NULL),(37,4,2,2,'Czechmate','5:00','The Czech 601st Special Operations Group punches through enemy lines to extract a stranded US MARSOC team.\r\nSpecial Roles Required: APC Crewmen','2018-04-23','HST (HST)',NULL,'2018-04-21 07:22:13','2018-04-22 00:29:38',NULL),(38,6,2,2,'One life modpack','5:00 Pm','A sweet little mission to go over many features of the modpack, shame I forgot to @ it huh.','2018-04-27','HST (HST)','2018-04-27_202154-G3CJNFr8eqEdDabQQF34zHaysYqvHaGpEIAXrjW9cymPjtDzuFNNMin99jSuPreset_One_Life_inport.html','2018-04-27 20:21:54','2018-04-27 20:22:10',NULL),(39,6,4,2,'Kinda second op in the op','7:00','The op ran extra long and they stayed good guys bigger boys','2018-04-27','Pacific (PST)',NULL,'2018-04-28 04:04:22','2018-04-28 04:04:40',NULL);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_000001_create_events_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2018_03_26_204037_add_color_to_ranks_table',2),(5,'2018_03_26_210136_create_reset_tokens_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privileges`
--

DROP TABLE IF EXISTS `privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `privileges_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privileges`
--

LOCK TABLES `privileges` WRITE;
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;
INSERT INTO `privileges` VALUES (1,'User','2018-03-06 18:03:07','2018-03-06 18:03:07',NULL),(2,'Admin','2018-03-06 18:03:07','2018-03-06 18:03:07',NULL),(3,'Moderator','2018-03-26 23:08:06','2018-03-26 23:08:06',NULL);
/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ranks`
--

DROP TABLE IF EXISTS `ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ranks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ranks_name_unique` (`name`),
  UNIQUE KEY `ranks_rank_unique` (`rank`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ranks`
--

LOCK TABLES `ranks` WRITE;
/*!40000 ALTER TABLE `ranks` DISABLE KEYS */;
INSERT INTO `ranks` VALUES (1,'RECRUIT',1,0,'2018-03-06 18:03:07','2018-03-26 23:26:06',NULL,'#a25406'),(2,'PVT',2,50,'2018-03-06 18:03:07','2018-03-26 23:24:13',NULL,'#9fa404'),(3,'PV2',3,100,'2018-03-06 18:03:07','2018-03-26 23:24:13',NULL,'#c1c609'),(4,'PFC',4,200,'2018-03-06 18:03:07','2018-03-26 23:24:13',NULL,'#ccdc0e'),(5,'SPC',5,400,'2018-03-06 18:03:07','2018-03-26 23:24:13',NULL,'#e7f031'),(6,'CPL',6,450,'2018-03-06 18:03:07','2018-03-26 23:24:13',NULL,'#179605'),(7,'SGT',7,600,'2018-03-06 18:03:07','2018-03-26 23:24:13',NULL,'#149b0d'),(8,'SSG',8,750,'2018-03-06 18:03:07','2018-03-26 23:24:13',NULL,'#26e311'),(9,'1SG',9,1000,'2018-03-06 18:03:07','2018-03-26 23:24:13',NULL,'#18c91d'),(10,'2LT',10,600,'2018-03-06 18:03:07','2018-03-26 23:24:13',NULL,'#0c5cb6'),(11,'1LT',11,800,'2018-03-06 18:03:07','2018-03-26 23:24:13',NULL,'#3857e9'),(12,'CPT',12,1200,'2018-03-06 18:03:07','2018-03-26 23:24:13',NULL,'#2272ea'),(13,'MAJ',13,1600,'2018-03-06 18:03:07','2018-03-26 23:24:13',NULL,'#4688ec'),(14,'COL',14,1200,'2018-03-06 18:03:07','2018-03-26 23:24:53',NULL,'#003f42');
/*!40000 ALTER TABLE `ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset_tokens`
--

DROP TABLE IF EXISTS `reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reset_tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` int(10) unsigned DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reset_tokens_user_foreign` (`user`),
  CONSTRAINT `reset_tokens_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset_tokens`
--

LOCK TABLES `reset_tokens` WRITE;
/*!40000 ALTER TABLE `reset_tokens` DISABLE KEYS */;
INSERT INTO `reset_tokens` VALUES (1,4,'0303-2626-2018_Qe1sPUerNGwZYi2AWum1Q2g630uoVluxeMtcN8IQTHyq1SRsRB8qAzq5vCwx','2018-03-27','2018-03-26 23:11:47','2018-03-26 23:11:47',NULL),(3,7,'0303-2626-2018_Nchn8kD9i7z9HNxpSxyaPnurfsJb4Jjo9QHO2Viq0qVCRvtyC6MaYlPvZZWI','2018-03-27','2018-03-26 23:24:01','2018-03-26 23:24:01',NULL),(4,2,'0404-1616-2018_PhVa9NG61XwTmR4v6MqdmUrzbUZDF20vQEIHYwAfY6zjDDQ97tTAFS84pmmC','2018-04-17','2018-04-16 02:17:27','2018-04-16 02:17:27',NULL),(5,2,'0404-1616-2018_qvRgOBhgQ6XMh6iNi697AOgq4ar5Jlk6LcZclVlNF1D5U1RX1qb20j0comam','2018-04-17','2018-04-16 02:20:45','2018-04-16 02:20:45',NULL),(6,27,'0404-2828-2018_vuckagoQsxmqjPrWCMpGf56tcgD3pVQXM6UKt9nK4LKFUtk1uuPfffdjQ88F','2018-04-29','2018-04-28 14:39:26','2018-04-28 14:39:26',NULL);
/*!40000 ALTER TABLE `reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'RTO',2,'2018-03-06 18:03:07','2018-03-06 18:17:50',NULL),(2,'Medic',2,'2018-03-06 18:03:07','2018-03-06 18:03:07',NULL),(3,'Team Leader',2,'2018-03-06 18:03:07','2018-03-06 18:03:07',NULL),(4,'Squad Leader',3,'2018-03-06 18:03:07','2018-03-06 18:03:07',NULL),(5,'Rifleman',0,'2018-03-06 18:03:07','2018-03-06 18:03:07',NULL),(6,'SAW Gunner',0,'2018-03-06 18:03:07','2018-03-06 18:03:07',NULL),(7,'AT',0,'2018-03-06 18:03:07','2018-03-06 18:03:07',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'Pending','2018-03-06 18:03:07','2018-03-06 18:03:07',NULL),(2,'Approved','2018-03-06 18:03:07','2018-03-06 18:03:07',NULL),(3,'Revoked','2018-03-06 18:03:07','2018-03-06 18:03:07',NULL);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rank` int(10) unsigned DEFAULT NULL,
  `base_rank` int(10) unsigned DEFAULT NULL,
  `privilege` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_base_rank_foreign` (`base_rank`),
  KEY `users_rank_foreign` (`rank`),
  KEY `users_privilege_foreign` (`privilege`),
  CONSTRAINT `users_base_rank_foreign` FOREIGN KEY (`base_rank`) REFERENCES `ranks` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `users_privilege_foreign` FOREIGN KEY (`privilege`) REFERENCES `privileges` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `users_rank_foreign` FOREIGN KEY (`rank`) REFERENCES `ranks` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Krieger','$2y$10$etewhteKRsfvvV0LWU2u4.khp7U3lrs.trx3aY0dwiVPNFiKgSkfy','mzX6tLPaAHmwypbEHKXi3S8EyNSlbuI2sZldUmH5ETVvAQJGw1zUvvwMFWHk','2018-03-03 20:43:12','2018-04-16 02:21:08',8,8,2),(3,'nano','$2y$10$8vfDJJ6j.XhVXRLkUDv/xe003U.V2OD4MgNfrglLDyzjykoYT8Ns.',NULL,'2018-03-03 22:02:07','2018-03-26 23:42:30',7,7,3),(4,'Bran Flakes','$2y$10$xMJ6/KzHPABlUPMb2c/uP.I8oAtNzdj2K0ACmDIU3.CES8VPn84eq',NULL,'2018-03-03 22:24:42','2018-03-26 23:42:12',10,10,3),(6,'Maszo Pok','$2y$10$xwG0XkE86QgtrdrncPIEdug53jAJpE/LyZC6SdS.tvL1ZJ98qYazC','UEmbp26mmF28k7Gy5iWip7CY4GI8k5PN5YVXm8WMGn4Yi2TYM0YYpEe8bLsI','2018-03-04 00:29:16','2018-03-26 23:31:02',12,12,2),(7,'Owner','$2y$10$hD2zkffg0Ovl.iCp3ihbNuHHJmGKbcJZ0DJGJfaJTiNgd6uovEZQu','EoJDJkdPIZep89Z13mZx3KGRBuzRGXaQQsJfjcOPElTdAijeU5MVgYz9Sm9O','2018-03-04 01:10:17','2018-03-06 18:19:10',14,14,2),(8,'CplKerry','$2y$10$nfn6op/PbcnA/i5OKKMdme3Sc2f8rRaO8jDUiZeuDs9eo4iPpah3W',NULL,'2018-03-04 01:39:34','2018-03-06 18:19:04',14,14,2),(9,'Brutus','$2y$10$T7zHrT9np3xnhrhmRhrgI.UewF09WsnYgfYs.A8xi2y9/HocHylzS','9h4kZJPInYDdskZI5GyIXYcWnyQyjwkHGX0PeqZfZpdUsccJ76U0qE6E27gn','2018-03-05 00:55:23','2018-03-26 23:42:21',9,9,3),(10,'SithDeceiver','$2y$10$UYQ5jFi7BUgt8TqsY8lPC.z.rnztwLw/7KnmtgYPMyjn1MTdDD6K2',NULL,'2018-03-05 00:56:18','2018-03-29 03:08:29',6,3,3),(11,'MrSkyGh0st','$2y$10$YL2znW0lxEyHx5sOeYLd6eYTQKsF/BdVoct6HLKo5IgLB9HezPDhu',NULL,'2018-03-05 00:56:37','2018-03-06 18:27:31',5,5,1),(12,'Mr. Memolo','$2y$10$KlYGb56jzuh2rXBi36RcoOWfwLrvCCZIIg47/sxQNc7K1D49c0xnq',NULL,'2018-03-05 00:57:25','2018-03-06 18:27:40',3,3,1),(14,'Spagghettip','$2y$10$fQXpe2F1ON23g9fp4hX3aO6yKJX8zuaHAdC13DrUveq1NZlescJeu',NULL,'2018-03-05 01:32:08','2018-03-06 18:28:42',4,4,1),(15,'samstg09','$2y$10$hYzOOjiM7KpTcvonkhVGu.Vv8Nl9ZSz24dT73mp1oi.iWtA1Z907e','vAOXpgFUwM1AhOuyvbYJ4bRaviysaOXEVaKUv8xFb5pxaOEDL1ZJmTNKxFU2','2018-03-05 01:43:59','2018-03-05 01:43:59',1,1,1),(17,'Rios878','$2y$10$vnL2zB0tmeGSUaZTupIJc.6TByQ4EoEaN//RInNaDHLYEGwS843Eu','WimNzq7rrB3Q3fB5xjBi7ItCqziYcb7UHRkogifFWguRZfHzFHhK0ItdlPeC','2018-03-06 15:35:56','2018-03-07 22:57:04',4,4,1),(18,'cvance5','$2y$10$nwTfTv7WJg/lnfmJ6oKLeOVDaQEHIReFM8BArrBczTwRuAD6QgSS.',NULL,'2018-03-08 01:23:35','2018-03-25 07:14:04',2,1,1),(19,'Drunkenturtles','$2y$10$fnruR9uGOWCLdc3L3D8D.O4OZpxMS/gQXtLyJC72ET/oxieyJjvoK','lhtE9IRg1UoEgtv6jGzfmtIwtn2tm1xyZxN1Qu6A0uFPPV0B6T8QKVQHnMCC','2018-03-08 16:10:32','2018-03-08 18:04:50',2,2,1),(20,'Frost','$2y$10$ONYEoKsDketY7Nfchn5acOTEkjRCzwrvS7PV5sfoTXI4tRXGTaC1u',NULL,'2018-03-09 02:18:34','2018-03-09 02:19:14',2,2,1),(22,'Robert Scrotum','$2y$10$Boc9Gw7E8NTJsWPMFYnHwOH8ptrKUly/Go0LDPJqdE.gcuZuiTaZa','xpwjZqRpHD6kK7gwEHfR4QgIUlEBdEE3SdPdLm4AwIjxi8v0DH8KB0qQXod1','2018-03-09 21:34:25','2018-04-15 17:37:53',3,2,1),(23,'Mr.Cobra','$2y$10$7UsVQoK5yik1CGVqC44ZpOzJjkh05KBOp8iLloXu/k4EeQ32Fejj.',NULL,'2018-03-09 22:39:24','2018-03-09 22:39:24',1,1,1),(24,'Pvt Hootz','$2y$10$DDb9rt7GMzt/GQbUsxEn2.wkdHrNuVlPWEoC2oZPfOGh4ZwtAX0Ny','iajJ2eH4TNg5m3vHZa4sob2T6ux57f714vMdZ9mVJsxM94EjY46xTnuhIrv6','2018-03-10 00:07:23','2018-04-26 01:18:23',3,2,1),(25,'PVTPYLE','$2y$10$QKED8WsLRTB30StaduA.kOGy0mYuzGjkpRfy3wVno2qBug7Kl461K',NULL,'2018-03-10 00:09:42','2018-03-10 17:58:40',3,3,1),(26,'Leo','$2y$10$yYDa5H8C7xtwyImclm3/oOqkxTdxlwuD//E3GxAiEg0BUjnonGP3y','vJrWcmjGoeOiW3c6FMAYiatvJhnd7cUSJpqSStjomumObJa1AnIT5hRdEuWW','2018-03-12 23:12:12','2018-04-26 01:18:35',3,2,1),(27,'Cubs','$2y$10$fnfYgjdtEJXTgCSZR2hDROn2DtKVDost4109gyiZ2HfRi934XmRT.',NULL,'2018-03-13 20:01:10','2018-03-14 18:35:32',3,3,1),(28,'Danny','$2y$10$jZhBVIcYcdw4orktJiXQhufRHqYG/i11J2f55xM0ewjoyy2ZqHBau','EIdZOmtXZfqXggFUXyEGBIFpkr9cysJtXWBccd6LSbl0rdaH0Z4Lk6jqfUlQ','2018-03-15 18:15:39','2018-03-15 18:21:21',1,1,1),(29,'wowmod','$2y$10$LjkqS1l4ac1WvvYpCqPrveWnZkZ3340a38uPjNlH9yrS1KJdP2eh6',NULL,'2018-03-19 23:48:21','2018-03-19 23:48:21',1,1,1),(30,'Dane Havit','$2y$10$U2MINtYSXFghRYtCebEM6.58vchHsoju552unRkJndMDBNXl3qQaG',NULL,'2018-03-19 23:59:05','2018-03-19 23:59:05',1,1,1),(31,'Quinnibis','$2y$10$8MVfzjDJTnNK/op.yLsluum.g7vKL8bI.TY4fgD27rejBsIbCwx6m','c60v6Gi8zlpmnctSgZMcsJRTfnG7oyjBMtxpOciFm26fjpYR9pRnTILth7Uh','2018-03-25 07:06:32','2018-03-25 07:08:37',2,2,1),(32,'Greyco','$2y$10$kD06vB0r5D4JkN2FAETNS.KGUbsGpFtj5otfj2p3cIWK5ssc7YkRu',NULL,'2018-03-25 22:04:27','2018-03-25 22:04:27',1,1,1),(33,'ObiWinton','$2y$10$beS99ghEn60Iwr0umTBe6.XQAFf/K3vJpKPUlAx8LVEM0LGYZyMU6',NULL,'2018-03-26 21:12:20','2018-03-26 21:12:20',1,1,1),(35,'Scruffy','$2y$10$kgacUQEDLiJ7hWNO40.8t.EnJjqjSaojXuUnLKNcZl3vDTzXsV3.W',NULL,'2018-03-28 08:44:56','2018-03-28 08:44:56',1,1,1),(36,'Thatguy2310','$2y$10$HZcyoUl3iBhXCxMFUL1/N.e6wFvmtbc7tMz2Ab.75AVo8xK.EwEDm',NULL,'2018-03-28 23:29:43','2018-03-28 23:29:43',1,1,1),(37,'FluffyHuman','$2y$10$Ws.1EWjALcCcoWHB6KBBoumF/X3jQ6wpGU3Tj0/mQ5CZQeGh7c3xe',NULL,'2018-04-10 15:00:44','2018-04-10 15:00:44',1,1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-29 21:47:46
