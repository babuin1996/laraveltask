-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: laratask
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `perm_create` int(1) DEFAULT '0',
  `perm_read` int(1) DEFAULT '0',
  `perm_update` int(1) DEFAULT '0',
  `perm_delete` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'test','test@yandex.ru',NULL,'$2y$10$HIjwMRnbdj44wKqQrYwHMOCRdTTqborKrRsswuYk.QRtda7AlyUSq','OdH8BFjoEFL269aNlWy68Bsw0S89gQ4Lvsx1SV6qVOWhB3QOMpGIfhxldTM3','2019-01-24 03:17:19','2019-01-24 03:17:19',0,1,0,0),(3,'Vladimir','fulgentworldinternartional@gmail.com',NULL,'$2y$10$SsiF3mYpmQLl4y3TnZzDQuKJ9LFkKu9SQsOZkcMm6View0Dz.Khne',NULL,'2019-01-24 13:06:40','2019-01-24 13:06:40',0,0,0,0),(4,'Robber2','ghostriderheavymetal@gmail.com',NULL,'$2y$10$IphSDKDANkR0A7g0AN23h.UynVkFTi1NqeudAHFRv12LxcUtzXpdO',NULL,'2019-01-25 02:52:50','2019-01-25 16:26:13',1,NULL,NULL,NULL),(5,'Robert','te@s.t',NULL,'$2y$10$jghlzZldBkGWHdQrrSNrmuKf0ytSJoiTq4g753ypkQuTF9V7GbP8i',NULL,NULL,NULL,NULL,1,NULL,NULL),(6,'babuin','ba@bu.in',NULL,'$2y$10$XE4jBNsgHKet/uU7Mw0Aje6PfgJsf5.duMs4VyB7p8FVNsRRESM5O','uhEY1q05GzsnqNf9CYXEgBTNjnn75iVuCBcy6Uk49zbsOuOIa0MBpIRE6mSU','2019-01-26 02:44:39','2019-01-26 04:30:11',1,1,NULL,1);
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

-- Dump completed on 2019-01-26 15:44:20
