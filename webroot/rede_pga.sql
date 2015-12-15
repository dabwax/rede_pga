-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: rede_pga
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'luizhrqas','relogio123');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chart_inputs`
--

DROP TABLE IF EXISTS `chart_inputs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chart_inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chart_id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chart_inputs`
--

LOCK TABLES `chart_inputs` WRITE;
/*!40000 ALTER TABLE `chart_inputs` DISABLE KEYS */;
/*!40000 ALTER TABLE `chart_inputs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chart_themes`
--

DROP TABLE IF EXISTS `chart_themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chart_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chart_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chart_themes`
--

LOCK TABLES `chart_themes` WRITE;
/*!40000 ALTER TABLE `chart_themes` DISABLE KEYS */;
/*!40000 ALTER TABLE `chart_themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `charts`
--

DROP TABLE IF EXISTS `charts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `charts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` enum('bar','column','line','pie','donut','numero_absoluto') NOT NULL,
  `user_id` int(11) NOT NULL,
  `format` enum('dia_a_dia','mes_a_mes') NOT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `use_markers` tinyint(1) NOT NULL,
  `use_media` int(11) DEFAULT NULL,
  `to_user` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charts`
--

LOCK TABLES `charts` WRITE;
/*!40000 ALTER TABLE `charts` DISABLE KEYS */;
/*!40000 ALTER TABLE `charts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercises`
--

DROP TABLE IF EXISTS `exercises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `due_to` varchar(255) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `observation` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `user_answer_attachment` text,
  `user_answer_content` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercises`
--

LOCK TABLES `exercises` WRITE;
/*!40000 ALTER TABLE `exercises` DISABLE KEYS */;
/*!40000 ALTER TABLE `exercises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hashtags`
--

DROP TABLE IF EXISTS `hashtags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hashtags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hashtags`
--

LOCK TABLES `hashtags` WRITE;
/*!40000 ALTER TABLE `hashtags` DISABLE KEYS */;
/*!40000 ALTER TABLE `hashtags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inputs`
--

DROP TABLE IF EXISTS `inputs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('calendario','intervalo_tempo','registro_textual','escala_numerica','escala_texto','numero','texto_privativo') NOT NULL,
  `user_id` int(11) NOT NULL,
  `model` enum('All','Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `name` varchar(255) NOT NULL,
  `config` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inputs`
--

LOCK TABLES `inputs` WRITE;
/*!40000 ALTER TABLE `inputs` DISABLE KEYS */;
/*!40000 ALTER TABLE `inputs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instituitions`
--

DROP TABLE IF EXISTS `instituitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instituitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituitions`
--

LOCK TABLES `instituitions` WRITE;
/*!40000 ALTER TABLE `instituitions` DISABLE KEYS */;
INSERT INTO `instituitions` VALUES (5,'');
/*!40000 ALTER TABLE `instituitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson_entries`
--

DROP TABLE IF EXISTS `lesson_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  `model` enum('Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `model_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson_entries`
--

LOCK TABLES `lesson_entries` WRITE;
/*!40000 ALTER TABLE `lesson_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `lesson_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson_hashtags`
--

DROP TABLE IF EXISTS `lesson_hashtags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson_hashtags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `hashtag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson_hashtags`
--

LOCK TABLES `lesson_hashtags` WRITE;
/*!40000 ALTER TABLE `lesson_hashtags` DISABLE KEYS */;
/*!40000 ALTER TABLE `lesson_hashtags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson_themes`
--

DROP TABLE IF EXISTS `lesson_themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `observation` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson_themes`
--

LOCK TABLES `lesson_themes` WRITE;
/*!40000 ALTER TABLE `lesson_themes` DISABLE KEYS */;
/*!40000 ALTER TABLE `lesson_themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `observation` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons`
--

LOCK TABLES `lessons` WRITE;
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_recipients`
--

DROP TABLE IF EXISTS `message_recipients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_recipients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` enum('Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `model_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_recipients`
--

LOCK TABLES `message_recipients` WRITE;
/*!40000 ALTER TABLE `message_recipients` DISABLE KEYS */;
/*!40000 ALTER TABLE `message_recipients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_replies`
--

DROP TABLE IF EXISTS `message_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `model` enum('Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `model_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_replies`
--

LOCK TABLES `message_replies` WRITE;
/*!40000 ALTER TABLE `message_replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `message_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `model` enum('Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `model_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `views` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` enum('Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `feed` int(11) DEFAULT NULL,
  `evolucao` int(11) DEFAULT NULL,
  `bate_papo` int(11) DEFAULT NULL,
  `input` int(11) DEFAULT NULL,
  `exercicios` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Protectors',1,1,1,1,1),(2,'Schools',1,1,1,1,1),(3,'Tutors',1,1,1,1,1),(4,'Therapists',1,1,1,1,1),(5,'Users',NULL,1,1,1,1);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `protectors`
--

DROP TABLE IF EXISTS `protectors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `protectors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` enum('mom','dad') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `protectors`
--

LOCK TABLES `protectors` WRITE;
/*!40000 ALTER TABLE `protectors` DISABLE KEYS */;
/*!40000 ALTER TABLE `protectors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` enum('mediator','coordinator') NOT NULL,
  `instituition_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools`
--

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `therapists`
--

DROP TABLE IF EXISTS `therapists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `therapists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` enum('Therapist') NOT NULL DEFAULT 'Therapist',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `therapists`
--

LOCK TABLES `therapists` WRITE;
/*!40000 ALTER TABLE `therapists` DISABLE KEYS */;
/*!40000 ALTER TABLE `therapists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutors`
--

DROP TABLE IF EXISTS `tutors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` enum('tutor') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutors`
--

LOCK TABLES `tutors` WRITE;
/*!40000 ALTER TABLE `tutors` DISABLE KEYS */;
/*!40000 ALTER TABLE `tutors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `profile_attachment` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `instituition_id` int(11) NOT NULL,
  `clinical_condition` varchar(255) NOT NULL,
  `school_grade` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (8,'','','','','',5,'','','','2015-12-15 14:25:24','2015-12-15 14:25:24');
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

-- Dump completed on 2015-12-15 14:25:42
