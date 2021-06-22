-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: atividade_php_pdo
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `cidades`
--

DROP TABLE IF EXISTS `cidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cidades_FK` (`estado_id`),
  CONSTRAINT `cidades_FK` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidades`
--

LOCK TABLES `cidades` WRITE;
/*!40000 ALTER TABLE `cidades` DISABLE KEYS */;
INSERT INTO `cidades` VALUES (1,1,'Belo Horizonte'),(2,2,'São Paulo'),(3,3,'Rio de Janeiro'),(4,1,'Três Corações');
/*!40000 ALTER TABLE `cidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contatos`
--

DROP TABLE IF EXISTS `contatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensagem` varchar(200) NOT NULL,
  `cidade_id` int(11) NOT NULL,
  `data_hora` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `contatos_FK` (`cidade_id`),
  CONSTRAINT `contatos_FK` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatos`
--

LOCK TABLES `contatos` WRITE;
/*!40000 ALTER TABLE `contatos` DISABLE KEYS */;
INSERT INTO `contatos` VALUES (1,'Abner da Silva Luiz','35999439591','abnerluis123@outlook.com','sadasd',2,'2021-06-20 16:16:08'),(2,'Abner da Silva Luiz','35999439591','abnerluis123@outlook.com','hfgdhfghfg',1,'2021-06-20 16:16:19'),(3,'Abner da Silva Luiz','35999439591','abnerluis123@outlook.com','hfgdhfghfg',1,'2021-06-20 16:27:47'),(4,'Abner da Silva Luiz','35999439591','abnerluis123@outlook.com','tgjytujkyuk',1,'2021-06-20 17:38:31'),(5,'Abner da Silva Luiz','35999439591','abnerluis123@outlook.com','ergerg',1,'2021-06-20 21:30:10'),(6,'Abner da Silva Luiz','35999439591','abnerluis123@outlook.com','gfhfgh',1,'2021-06-20 21:49:43'),(7,'Abner da Silva Luiz','35999439591','abnerluis123@outlook.com','fdgdfgdf',1,'2021-06-20 21:52:20');
/*!40000 ALTER TABLE `contatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Minas Gerais','MG'),(2,'São Paulo','SP'),(3,'Rio de Janeiro','RJ'),(4,'Bahia','BA'),(5,'Rondônia','RO');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `acao` varchar(100) NOT NULL,
  `data_hora_log` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'admin','alter','0000-00-00 00:00:00'),(2,'Abner','Alteração do usuário referente ao ID: 9','2021-06-21 21:24:12'),(3,'Abner','O ID: 11 foi excluído','2021-06-21 21:40:18'),(4,'Abner','O ID: 13 foi excluído','2021-06-21 21:40:22'),(5,'Abner','O User: Abner Cadastrou o ID: ','2021-06-21 21:59:29'),(6,'Abner','O User: Abner Cadastrou o ID: ','2021-06-21 22:01:04'),(7,'Abner','O User: Abner cadastrou o ID: ','2021-06-21 22:02:28'),(8,'Abner','O User: Abner cadastrou um novo usuário','2021-06-21 22:07:03'),(9,'Abner','O User: Abner cadastrou um novo usuário','2021-06-21 22:07:13'),(10,'Abner','O User: Abner cadastrou um novo usuário','2021-06-21 22:11:07'),(11,'Abner','O ID: 15 foi excluído','2021-06-21 22:11:58'),(12,'Abner','O ID: 17 foi excluído','2021-06-21 22:12:00'),(13,'Abner','Alteração do usuário referente ao ID: 14','2021-06-21 22:12:12'),(14,'Abner','O User: Abner cadastrou um novo usuário','2021-06-21 22:14:17');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `data_hora_criacao` datetime NOT NULL,
  `data_hora_atualizacao` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (7,'Abner da Silva Luiz','admin','fbfhgf','2021-06-20 19:01:20','0000-00-00 00:00:00'),(12,'xadrex','dgbdf','8d509c28896865f8640f328f30f15721','2021-06-20 21:46:33','0000-00-00 00:00:00'),(14,'Abner ','gerger','666ca9a2be31fd949cb9b55686caef9a','2021-06-20 22:02:54','2021-06-21 22:12:12'),(16,'teste log','werwe','979d472a84804b9f647bc185a877a8b5','2021-06-21 21:59:29','0000-00-00 00:00:00'),(18,'dsfsd','sdfsdf','d58e3582afa99040e27b92b13c8f2280','2021-06-21 22:02:28','0000-00-00 00:00:00'),(19,'dsfsd','sdfsdf','d58e3582afa99040e27b92b13c8f2280','2021-06-21 22:07:03','0000-00-00 00:00:00'),(20,'sdfsdf','sdfsdf','d58e3582afa99040e27b92b13c8f2280','2021-06-21 22:07:13','0000-00-00 00:00:00'),(21,'Abner da Silva Luiz','erter','852fbd08c187f4c237c4243bf3de494b','2021-06-21 22:11:07','0000-00-00 00:00:00'),(22,'ertert','retert','852fbd08c187f4c237c4243bf3de494b','2021-06-21 22:14:17','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-21 22:26:02
