-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: psyconnect
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `comentario`
--

CREATE DATABASE psyconnect;
USE psyconnect;

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_psicologo` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `comentario` mediumtext DEFAULT NULL,
  `visto` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` VALUES (18,9,32,'Comentario 1',0),(19,9,32,'Comentario 2',0),(20,9,32,'Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 Comentario 3 ',0),(21,0,30,'Comentario 4',0),(22,0,30,'Comentario 5',0),(23,9,31,'Comentario 4',0),(24,9,31,'Comentario 5',0),(25,9,31,'Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 Comentario 6 ',0),(26,9,30,'Comentario 7',0),(27,9,30,'Comentario 8',0),(28,9,30,'Comentario 9 Comentario 9 Comentario 9 Comentario 9 Comentario 9 Comentario 9 Comentario 9 Comentario 9 Comentario 9 Comentario 9 Comentario 9 Comentario 9 Comentario 9 Comentario 9 Comentario 9 Comentario 9 Comentario 9 ',0),(29,9,31,'COMENTARIO PARA EL HISTORIAL 1',1),(30,9,31,'COMENTARIO PARA EL HISTORIAL 2',1),(31,9,30,'COMENTARIO PARA EL HISTORIAL 3',1),(32,9,32,'COMENTARIO PARA EL HISTORIAL 4\r\n',1),(33,9,32,'COMENTARIO PARA EL HISTORIAL 5',1);
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_animo`
--

DROP TABLE IF EXISTS `estado_animo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_animo` (
  `id_registro` int(11) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `emociones` varchar(100) DEFAULT NULL,
  `grado_intensidad` int(11) DEFAULT NULL,
  `sensaciones_corporales` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id_registro`,`id_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_animo`
--

LOCK TABLES `estado_animo` WRITE;
/*!40000 ALTER TABLE `estado_animo` DISABLE KEYS */;
INSERT INTO `estado_animo` VALUES (63,1,'2024-05-21','Emoción 1',1,'Sensación 1'),(63,2,'2024-05-21','Emoción 2',2,'Sensación 2'),(63,3,'2024-05-21','Emoción 3',3,'Sensación 3');
/*!40000 ALTER TABLE `estado_animo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logros`
--

DROP TABLE IF EXISTS `logros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logros` (
  `id_registro` int(11) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `que_he_logrado` mediumtext DEFAULT NULL,
  `acciones_realizadas` mediumtext DEFAULT NULL,
  `como_me_siento` int(11) DEFAULT NULL,
  `premio_obtenido` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id_registro`,`id_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logros`
--

LOCK TABLES `logros` WRITE;
/*!40000 ALTER TABLE `logros` DISABLE KEYS */;
INSERT INTO `logros` VALUES (64,1,'2024-05-21','Logro 1','Acciones 1',5,'Premio 1'),(64,2,'2024-05-21','Logro 2','Acciones 2',10,'Premio 2'),(64,3,'2024-05-21','Logro 3','Acciones 3',8,'Premio 3');
/*!40000 ALTER TABLE `logros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_psicologo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(245) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`id_psicologo`),
  CONSTRAINT `id` FOREIGN KEY (`id_psicologo`) REFERENCES `psicologo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (30,9,'Paciente','1','44857785B','mail1@mail.com','$2y$10$7xQtGfuU9J2b16GRstpI.OuxTeJAPIHGBgzWxROYPbk4/ettzntz.'),(31,9,'Paciente','2','111222555B','mail2@mail.com','$2y$10$4XZjNYVMwVwC1YXPQAcxgOI9ubtCdKToY2vuBrGIKWMz41aSV0eQG'),(32,9,'Paciente','3','877788855B','mail3@mail.com','$2y$10$DoHoUQTrvmSIRFn7aAO8oO23nTNf90xcB2okVeAOSGXKhnzdwUjmi');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente_registro`
--

DROP TABLE IF EXISTS `paciente_registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente_registro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente_registro`
--

LOCK TABLES `paciente_registro` WRITE;
/*!40000 ALTER TABLE `paciente_registro` DISABLE KEYS */;
INSERT INTO `paciente_registro` VALUES (58,30,61,'2024-05-21'),(59,30,62,'2024-05-21'),(60,31,63,'2024-05-21'),(61,32,64,'2024-05-21'),(62,32,65,'2024-05-21');
/*!40000 ALTER TABLE `paciente_registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pensamientos`
--

DROP TABLE IF EXISTS `pensamientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pensamientos` (
  `id_registro` int(11) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `que_ha_sucedido` mediumtext NOT NULL,
  `que_he_pensado` mediumtext NOT NULL,
  `como_me_he_sentido` mediumtext NOT NULL,
  `que_he_hecho` mediumtext NOT NULL,
  PRIMARY KEY (`id_registro`,`id_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pensamientos`
--

LOCK TABLES `pensamientos` WRITE;
/*!40000 ALTER TABLE `pensamientos` DISABLE KEYS */;
INSERT INTO `pensamientos` VALUES (62,1,'2024-05-21','Suceso 1','Pensamiento 1','Sensación 1','Acción 1'),(62,2,'2024-05-21','Suceso 2','Pensamiento 2','Sensación 2','Acción 2'),(62,3,'2024-05-21','Suceso 3','Pensamiento 3','Sensación 3','Acción 3');
/*!40000 ALTER TABLE `pensamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `psicologo`
--

DROP TABLE IF EXISTS `psicologo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `psicologo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `cop_num` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `psicologo`
--

LOCK TABLES `psicologo` WRITE;
/*!40000 ALTER TABLE `psicologo` DISABLE KEYS */;
INSERT INTO `psicologo` VALUES (9,'Psicologo','1','44899622','psicologo1@gmail.com','$2y$10$I.TBjKwAxY2Hb2ft2guezOQim4BBC6wVu8CDa1fFIsHSYN4Qafw0e',0);
/*!40000 ALTER TABLE `psicologo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_reg` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_reg` (`id_tipo_reg`),
  CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`id_tipo_reg`) REFERENCES `tipo_registro` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (61,1),(62,2),(63,3),(64,4),(65,5);
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relajacion_muscular`
--

DROP TABLE IF EXISTS `relajacion_muscular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relajacion_muscular` (
  `id_registro` int(11) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `momento_dia` varchar(20) NOT NULL,
  `relajacion_conseguida` int(11) NOT NULL,
  `concentracion_conseguida` int(11) NOT NULL,
  PRIMARY KEY (`id_registro`,`id_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relajacion_muscular`
--

LOCK TABLES `relajacion_muscular` WRITE;
/*!40000 ALTER TABLE `relajacion_muscular` DISABLE KEYS */;
INSERT INTO `relajacion_muscular` VALUES (61,1,'2024-05-21','Momento 1',1,1),(61,2,'2024-05-21','Momento 2',2,2),(61,3,'2024-05-21','Momento 3',3,3);
/*!40000 ALTER TABLE `relajacion_muscular` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensaciones_corporales`
--

DROP TABLE IF EXISTS `sensaciones_corporales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sensaciones_corporales` (
  `id_registro` int(11) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `ejercicio_provocador` varchar(100) DEFAULT NULL,
  `numero_repeticion` int(11) DEFAULT NULL,
  `miedo_maximo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_registro`,`id_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensaciones_corporales`
--

LOCK TABLES `sensaciones_corporales` WRITE;
/*!40000 ALTER TABLE `sensaciones_corporales` DISABLE KEYS */;
INSERT INTO `sensaciones_corporales` VALUES (65,1,'2024-05-21','Ejercicio 1',5,5),(65,2,'2024-05-21','Ejercicio 2',6,4),(65,3,'2024-05-21','Ejercicio 3',7,3);
/*!40000 ALTER TABLE `sensaciones_corporales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_registro`
--

DROP TABLE IF EXISTS `tipo_registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_registro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_registro`
--

LOCK TABLES `tipo_registro` WRITE;
/*!40000 ALTER TABLE `tipo_registro` DISABLE KEYS */;
INSERT INTO `tipo_registro` VALUES (1,'Registro para la práctica de la relajación muscular','Practica cada día la relajación muscular (dos veces al día, si es posible) y puntúa después de 0 a 10 el grado de relajación y de concentración que has conseguido al realizar el ejercicio.'),(2,'Registro de pensamientos','Registra tus pensamientos y emociones más recientes. Para cada entrada, anota la fecha en que ocurrió, describe qué sucedió para desencadenar tus pensamientos, detalla qué pensamientos pasaron por tu mente en ese momento, explica cómo te sentiste en respuesta a esos pensamientos y describe cualquier acción que hayas tomado como resultado de esos pensamientos.'),(3,'Registro de estado de ánimo','Apunta cada día las emociones que sientas, valora de 0 a 10 el grado de intensidad de estas emociones y el grado de preocupacion por tener una crisis de ansiedad o por las repercusiones de las mismas.'),(4,'Registro de logros','Haz una lista de tus logros más recientes. Para cada logro, incluye la fecha en que ocurrió, una descripción detallada del logro alcanzado, las acciones específicas que realizaste para alcanzarlo, cómo te sientes después de lograrlo y cualquier premio o reconocimiento que hayas recibido como resultado.'),(5,'Registro del afrontamiento de sensaciones corporales','Haz una lista con los ejercicios provocadores de sensaciones corporale que hayas realizado y anota el número de veces que has repetido cada ejercicio. Después de cada ejercicio, anota el miedo máximo que has sentido durante el ejercicio o inmediatamente después de acabarlo. Recuerda que antes de pasar a un nuevo ejercicio, tienes que repetir el mismo ejercicio de forma seguida hasta que tu miedo máximo baje a 1.');
/*!40000 ALTER TABLE `tipo_registro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-21 11:51:02
