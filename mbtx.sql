-- MySQL dump 10.13  Distrib 5.5.32, for Linux (x86_64)
--
-- Host: localhost    Database: mbtx
-- ------------------------------------------------------
-- Server version	5.5.32-log

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `id` char(128) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `value` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('8f65b56e2a34f88603354584aa5295df',0,'a:2:{i:0;a:2:{i:0;a:3:{i:0;O:8:\"CUrlRule\":16:{s:9:\"urlSuffix\";N;s:13:\"caseSensitive\";N;s:13:\"defaultParams\";a:0:{}s:10:\"matchValue\";N;s:4:\"verb\";N;s:11:\"parsingOnly\";b:0;s:5:\"route\";s:17:\"<controller>/view\";s:10:\"references\";a:1:{s:10:\"controller\";s:12:\"<controller>\";}s:12:\"routePattern\";s:30:\"/^(?P<controller>\\w+)\\/view$/u\";s:7:\"pattern\";s:39:\"/^(?P<controller>\\w+)\\/(?P<id>\\d+)\\/$/u\";s:8:\"template\";s:17:\"<controller>/<id>\";s:6:\"params\";a:1:{s:2:\"id\";s:3:\"\\d+\";}s:6:\"append\";b:0;s:11:\"hasHostInfo\";b:0;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:1;O:8:\"CUrlRule\":16:{s:9:\"urlSuffix\";N;s:13:\"caseSensitive\";N;s:13:\"defaultParams\";a:0:{}s:10:\"matchValue\";N;s:4:\"verb\";N;s:11:\"parsingOnly\";b:0;s:5:\"route\";s:21:\"<controller>/<action>\";s:10:\"references\";a:2:{s:10:\"controller\";s:12:\"<controller>\";s:6:\"action\";s:8:\"<action>\";}s:12:\"routePattern\";s:41:\"/^(?P<controller>\\w+)\\/(?P<action>\\w+)$/u\";s:7:\"pattern\";s:56:\"/^(?P<controller>\\w+)\\/(?P<action>\\w+)\\/(?P<id>\\d+)\\/$/u\";s:8:\"template\";s:26:\"<controller>/<action>/<id>\";s:6:\"params\";a:1:{s:2:\"id\";s:3:\"\\d+\";}s:6:\"append\";b:0;s:11:\"hasHostInfo\";b:0;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:2;O:8:\"CUrlRule\":16:{s:9:\"urlSuffix\";N;s:13:\"caseSensitive\";N;s:13:\"defaultParams\";a:0:{}s:10:\"matchValue\";N;s:4:\"verb\";N;s:11:\"parsingOnly\";b:0;s:5:\"route\";s:21:\"<controller>/<action>\";s:10:\"references\";a:2:{s:10:\"controller\";s:12:\"<controller>\";s:6:\"action\";s:8:\"<action>\";}s:12:\"routePattern\";s:41:\"/^(?P<controller>\\w+)\\/(?P<action>\\w+)$/u\";s:7:\"pattern\";s:43:\"/^(?P<controller>\\w+)\\/(?P<action>\\w+)\\/$/u\";s:8:\"template\";s:21:\"<controller>/<action>\";s:6:\"params\";a:0:{}s:6:\"append\";b:0;s:11:\"hasHostInfo\";b:0;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}}i:1;s:32:\"44982a243d3c3195d51aac3d33a2f636\";}i:1;N;}'),('cbc0db6129515dd6ecaa0d9974300afc',0,'a:2:{i:0;a:2:{i:0;a:3:{i:0;O:8:\"CUrlRule\":16:{s:9:\"urlSuffix\";N;s:13:\"caseSensitive\";N;s:13:\"defaultParams\";a:0:{}s:10:\"matchValue\";N;s:4:\"verb\";N;s:11:\"parsingOnly\";b:0;s:5:\"route\";s:17:\"<controller>/view\";s:10:\"references\";a:1:{s:10:\"controller\";s:12:\"<controller>\";}s:12:\"routePattern\";s:30:\"/^(?P<controller>\\w+)\\/view$/u\";s:7:\"pattern\";s:39:\"/^(?P<controller>\\w+)\\/(?P<id>\\d+)\\/$/u\";s:8:\"template\";s:17:\"<controller>/<id>\";s:6:\"params\";a:1:{s:2:\"id\";s:3:\"\\d+\";}s:6:\"append\";b:0;s:11:\"hasHostInfo\";b:0;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:1;O:8:\"CUrlRule\":16:{s:9:\"urlSuffix\";N;s:13:\"caseSensitive\";N;s:13:\"defaultParams\";a:0:{}s:10:\"matchValue\";N;s:4:\"verb\";N;s:11:\"parsingOnly\";b:0;s:5:\"route\";s:21:\"<controller>/<action>\";s:10:\"references\";a:2:{s:10:\"controller\";s:12:\"<controller>\";s:6:\"action\";s:8:\"<action>\";}s:12:\"routePattern\";s:41:\"/^(?P<controller>\\w+)\\/(?P<action>\\w+)$/u\";s:7:\"pattern\";s:56:\"/^(?P<controller>\\w+)\\/(?P<action>\\w+)\\/(?P<id>\\d+)\\/$/u\";s:8:\"template\";s:26:\"<controller>/<action>/<id>\";s:6:\"params\";a:1:{s:2:\"id\";s:3:\"\\d+\";}s:6:\"append\";b:0;s:11:\"hasHostInfo\";b:0;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:2;O:8:\"CUrlRule\":16:{s:9:\"urlSuffix\";N;s:13:\"caseSensitive\";N;s:13:\"defaultParams\";a:0:{}s:10:\"matchValue\";N;s:4:\"verb\";N;s:11:\"parsingOnly\";b:0;s:5:\"route\";s:21:\"<controller>/<action>\";s:10:\"references\";a:2:{s:10:\"controller\";s:12:\"<controller>\";s:6:\"action\";s:8:\"<action>\";}s:12:\"routePattern\";s:41:\"/^(?P<controller>\\w+)\\/(?P<action>\\w+)$/u\";s:7:\"pattern\";s:43:\"/^(?P<controller>\\w+)\\/(?P<action>\\w+)\\/$/u\";s:8:\"template\";s:21:\"<controller>/<action>\";s:6:\"params\";a:0:{}s:6:\"append\";b:0;s:11:\"hasHostInfo\";b:0;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}}i:1;s:32:\"44982a243d3c3195d51aac3d33a2f636\";}i:1;N;}'),('dd5f70b56ee61ae25b5013178b141fae',0,'a:2:{i:0;a:2:{i:0;a:3:{i:0;O:8:\"CUrlRule\":16:{s:9:\"urlSuffix\";N;s:13:\"caseSensitive\";N;s:13:\"defaultParams\";a:0:{}s:10:\"matchValue\";N;s:4:\"verb\";N;s:11:\"parsingOnly\";b:0;s:5:\"route\";s:17:\"<controller>/view\";s:10:\"references\";a:1:{s:10:\"controller\";s:12:\"<controller>\";}s:12:\"routePattern\";s:30:\"/^(?P<controller>\\w+)\\/view$/u\";s:7:\"pattern\";s:39:\"/^(?P<controller>\\w+)\\/(?P<id>\\d+)\\/$/u\";s:8:\"template\";s:17:\"<controller>/<id>\";s:6:\"params\";a:1:{s:2:\"id\";s:3:\"\\d+\";}s:6:\"append\";b:0;s:11:\"hasHostInfo\";b:0;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:1;O:8:\"CUrlRule\":16:{s:9:\"urlSuffix\";N;s:13:\"caseSensitive\";N;s:13:\"defaultParams\";a:0:{}s:10:\"matchValue\";N;s:4:\"verb\";N;s:11:\"parsingOnly\";b:0;s:5:\"route\";s:21:\"<controller>/<action>\";s:10:\"references\";a:2:{s:10:\"controller\";s:12:\"<controller>\";s:6:\"action\";s:8:\"<action>\";}s:12:\"routePattern\";s:41:\"/^(?P<controller>\\w+)\\/(?P<action>\\w+)$/u\";s:7:\"pattern\";s:56:\"/^(?P<controller>\\w+)\\/(?P<action>\\w+)\\/(?P<id>\\d+)\\/$/u\";s:8:\"template\";s:26:\"<controller>/<action>/<id>\";s:6:\"params\";a:1:{s:2:\"id\";s:3:\"\\d+\";}s:6:\"append\";b:0;s:11:\"hasHostInfo\";b:0;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:2;O:8:\"CUrlRule\":16:{s:9:\"urlSuffix\";N;s:13:\"caseSensitive\";N;s:13:\"defaultParams\";a:0:{}s:10:\"matchValue\";N;s:4:\"verb\";N;s:11:\"parsingOnly\";b:0;s:5:\"route\";s:21:\"<controller>/<action>\";s:10:\"references\";a:2:{s:10:\"controller\";s:12:\"<controller>\";s:6:\"action\";s:8:\"<action>\";}s:12:\"routePattern\";s:41:\"/^(?P<controller>\\w+)\\/(?P<action>\\w+)$/u\";s:7:\"pattern\";s:43:\"/^(?P<controller>\\w+)\\/(?P<action>\\w+)\\/$/u\";s:8:\"template\";s:21:\"<controller>/<action>\";s:6:\"params\";a:0:{}s:6:\"append\";b:0;s:11:\"hasHostInfo\";b:0;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}}i:1;s:32:\"44982a243d3c3195d51aac3d33a2f636\";}i:1;N;}');
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_fiat`
--

DROP TABLE IF EXISTS `tbl_fiat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fiat` (
  `id_fiat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) DEFAULT '0',
  `type` tinyint(1) DEFAULT '0',
  `name` varchar(30) DEFAULT '0',
  `short_name` varchar(10) DEFAULT '0',
  `price` float DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_fiat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fiat`
--

LOCK TABLES `tbl_fiat` WRITE;
/*!40000 ALTER TABLE `tbl_fiat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fiat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_migration`
--

DROP TABLE IF EXISTS `tbl_migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_migration`
--

LOCK TABLES `tbl_migration` WRITE;
/*!40000 ALTER TABLE `tbl_migration` DISABLE KEYS */;
INSERT INTO `tbl_migration` VALUES ('m000000_000000_base',1390717835),('m120805_131754_user_table_migration',1390717836),('m130721_220705_add_demo_users',1390717837);
/*!40000 ALTER TABLE `tbl_migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_transaction`
--

DROP TABLE IF EXISTS `tbl_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_transaction` (
  `id_transaction` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `type` tinyint(1) DEFAULT '0',
  `btc_amount` float DEFAULT '0',
  `btc_price` float DEFAULT '0',
  `usd_amount` float DEFAULT '0',
  `fiat_amount` float DEFAULT '0',
  `fee_amount` float DEFAULT '0',
  `type_fiat` tinyint(1) DEFAULT '0',
  `cancelled` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaction`),
  KEY `FK_confirms_1` (`id_user`),
  CONSTRAINT `FK_confirms_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_transaction`
--

LOCK TABLES `tbl_transaction` WRITE;
/*!40000 ALTER TABLE `tbl_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `password_strategy` varchar(50) DEFAULT NULL,
  `requires_new_password` tinyint(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login_attempts` int(11) DEFAULT NULL,
  `login_time` int(11) DEFAULT NULL,
  `login_ip` varchar(32) DEFAULT NULL,
  `validation_key` varchar(255) DEFAULT NULL,
  `create_id` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_id` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `status` enum('disable','active','spam') DEFAULT 'disable',
  `verify` tinyint(1) DEFAULT '0',
  `balance_USD` float DEFAULT '0',
  `balance_BTC` float DEFAULT '0',
  `balance_FIAT` float DEFAULT '0',
  `type_fiat` tinyint(1) DEFAULT '0',
  `type_user` tinyint(1) DEFAULT '0',
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address` text,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `zip_code` varchar(5) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `tax_id` varchar(255) DEFAULT NULL,
  `photoid_proof` varchar(255) DEFAULT NULL,
  `residence_proof` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_wallet`
--

DROP TABLE IF EXISTS `tbl_wallet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_wallet` (
  `id_wallet` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `type` tinyint(1) DEFAULT '0',
  `btc_amount` float DEFAULT '0',
  `btc_price` float DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `wallet_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_wallet`),
  KEY `FK_confirms_5` (`id_user`),
  CONSTRAINT `FK_confirms_5` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_wallet`
--

LOCK TABLES `tbl_wallet` WRITE;
/*!40000 ALTER TABLE `tbl_wallet` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_wallet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `password_strategy` varchar(50) DEFAULT NULL,
  `requires_new_password` tinyint(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login_attempts` int(11) DEFAULT NULL,
  `login_time` int(11) DEFAULT NULL,
  `login_ip` varchar(32) DEFAULT NULL,
  `validation_key` varchar(255) DEFAULT NULL,
  `create_id` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_id` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','$2a$12$apv/2SwNVn8/gszdOhe.YeDGNRXVDPxqks5bfEWCF2zF.djyzqugi','$2a$12$apv/2SwNVn8/gszdOhe.Yg','bcrypt',NULL,'admin@example.com',2,NULL,NULL,'aec3a78f945b46fb6e70a41d5afe6174',NULL,NULL,NULL,NULL),(2,'demo','$2a$12$apv/2SwNVn8/gszdOhe.YeYy7iXM0t4FLHw8yt7XnH3u1OrdJjgK2','$2a$12$apv/2SwNVn8/gszdOhe.Yg','bcrypt',NULL,'demo@example.com',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-27 10:58:45
