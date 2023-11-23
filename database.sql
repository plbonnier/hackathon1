CREATE DATABASE  IF NOT EXISTS `kitouchki` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `kitouchki`;
-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: kitouchki
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anatomy`
--

DROP TABLE IF EXISTS `anatomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anatomy` (
  `id` int NOT NULL AUTO_INCREMENT,
  `member_name` varchar(80) NOT NULL,
  `is_touched_id` int DEFAULT NULL,
  `gift_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_anatomy_is_touched` (`is_touched_id`),
  KEY `fk_anatomy_gift` (`gift_id`),
  CONSTRAINT `fk_anatomy_gift` FOREIGN KEY (`gift_id`) REFERENCES `gift` (`id`),
  CONSTRAINT `fk_anatomy_is_touched` FOREIGN KEY (`is_touched_id`) REFERENCES `is_touched` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anatomy`
--

LOCK TABLES `anatomy` WRITE;
/*!40000 ALTER TABLE `anatomy` DISABLE KEYS */;
INSERT INTO `anatomy` VALUES (1,'Tête',NULL,NULL),(2,'Pied',NULL,NULL),(3,'Partis',NULL,NULL),(4,'Buste',NULL,NULL),(5,'Bras',NULL,NULL);
/*!40000 ALTER TABLE `anatomy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gift`
--

DROP TABLE IF EXISTS `gift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gift` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gift_name` varchar(100) NOT NULL,
  `gift_picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gift`
--

LOCK TABLES `gift` WRITE;
/*!40000 ALTER TABLE `gift` DISABLE KEYS */;
INSERT INTO `gift` VALUES (1,'Chausscon','https://mycrazystuff.com/13901-width_2000/pantoufles-zizi.jpg'),(2,'Casquéquête','https://www.totalcadeau.com/6919-thickbox_default/casquette-humoristique-paire-de-seins-je-ne-pense-qu-a-ca.webp'),(3,'Gros bonnet','https://www.events-tour.com/medias/images/chapeau-zizi-cadeau-de-fete-adulte.jpg?fx=c_400_400'),(4,'Slip éléphant','https://m.media-amazon.com/images/I/51NNVqTp6TL._AC_UY780_.jpg'),(5,'Carte de mon cul','https://octo-puces.com/2332-large_default/montcuq-vue-generale.jpg'),(6,'Décapsuleur','https://www.la-beauferie.fr/cdn/shop/products/Scd7c8dba44ef4c2e8a8c321decbac744O_1024x1024.jpg?v=1671648847'),(7,'Chasselle','https://www.totalcadeau.com/8008-thickbox_default/une-paire-de-chaussette-tranche-de-lard-viande-drole.webp');
/*!40000 ALTER TABLE `gift` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is_touched`
--

DROP TABLE IF EXISTS `is_touched`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `is_touched` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_touched` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_touched`
--

LOCK TABLES `is_touched` WRITE;
/*!40000 ALTER TABLE `is_touched` DISABLE KEYS */;
/*!40000 ALTER TABLE `is_touched` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `touch`
--

DROP TABLE IF EXISTS `touch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `touch` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `user_target_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_target_id` (`user_target_id`),
  CONSTRAINT `touch_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `touch_ibfk_2` FOREIGN KEY (`user_target_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `touch`
--

LOCK TABLES `touch` WRITE;
/*!40000 ALTER TABLE `touch` DISABLE KEYS */;
/*!40000 ALTER TABLE `touch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `zip_code` int NOT NULL,
  `city` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Aude','AudeGourmandise','aude.gourmandise@example.com','$2y$10$o3ggNKkgMpmwXQMNaG5i6uI2ocRp0zmpqGzqbfPhZ63NrZ1.Or8LS','456 Rue des Délices',33000,'Bordeaux'),(2,'Nicky','NickyFriandise','nicky.friandise@example.com','$2y$10$o3ggNKkgMpmwXQMNaG5i6uI2ocRp0zmpqGzqbfPhZ63NrZ1.Or8LS','789 Boulevard du Croquant',69001,'Lyon'),(3,'Pierre-Louis','PierreLouisGourmet','pierrelouis.gourmet@example.com','$2y$10$o3ggNKkgMpmwXQMNaG5i6uI2ocRp0zmpqGzqbfPhZ63NrZ1.Or8LS','123 Avenue de la Pâtisserie',75002,'Paris'),(4,'Merwan','MerwanLeGourmand','merwan.legourmand@example.com','$2y$10$o3ggNKkgMpmwXQMNaG5i6uI2ocRp0zmpqGzqbfPhZ63NrZ1.Or8LS','567 Chemin du Sucré',31000,'Toulouse'),(5,'Thomas','ThomasGâteau','thomas.gateau@example.com','$2y$10$o3ggNKkgMpmwXQMNaG5i6uI2ocRp0zmpqGzqbfPhZ63NrZ1.Or8LS','890 Place du Chocolat',44000,'Nantes'),(6,'Romain','RomainLeGourmand','romain.legourmand@example.com','$2y$10$o3ggNKkgMpmwXQMNaG5i6uI2ocRp0zmpqGzqbfPhZ63NrZ1.Or8LS','123 Rue du Pain',75003,'Paris'),(7,'Victor','VictorCroquant','victor.croquant@example.com','$2y$10$o3ggNKkgMpmwXQMNaG5i6uI2ocRp0zmpqGzqbfPhZ63NrZ1.Or8LS','456 Avenue de la Boulangerie',69004,'Lyon'),(8,'Ryad','RyadPâtissier','ryad.patissier@example.com','$2y$10$o3ggNKkgMpmwXQMNaG5i6uI2ocRp0zmpqGzqbfPhZ63NrZ1.Or8LS','789 Chemin des Délices',31000,'Toulouse'),(9,'Paul','PaulLeChef','paul.lechef@example.com','$2y$10$o3ggNKkgMpmwXQMNaG5i6uI2ocRp0zmpqGzqbfPhZ63NrZ1.Or8LS','1010 Rue des Gourmandises',44000,'Nantes'),(10,'Marco-Antoine','MarcoCuisine','marco.cuisine@example.com','$2y$10$o3ggNKkgMpmwXQMNaG5i6uI2ocRp0zmpqGzqbfPhZ63NrZ1.Or8LS','456 Rue des Délices',33000,'Bordeaux');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_anatomy`
--

DROP TABLE IF EXISTS `user_anatomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_anatomy` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `anatomy_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `anatomy_id` (`anatomy_id`),
  CONSTRAINT `user_anatomy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_anatomy_ibfk_2` FOREIGN KEY (`anatomy_id`) REFERENCES `anatomy` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_anatomy`
--

LOCK TABLES `user_anatomy` WRITE;
/*!40000 ALTER TABLE `user_anatomy` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_anatomy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'kitouchki'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-23 14:27:07
