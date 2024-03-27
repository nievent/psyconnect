-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: psyconnect
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `estado_animo`
--

DROP TABLE IF EXISTS `estado_animo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_animo` (
  `id_registro` int NOT NULL,
  `id_linea` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `emociones` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `grado_intensidad` int DEFAULT NULL,
  `sensaciones_corporales` mediumtext COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_registro`,`id_linea`),
  CONSTRAINT `id_registro` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_animo`
--

LOCK TABLES `estado_animo` WRITE;
/*!40000 ALTER TABLE `estado_animo` DISABLE KEYS */;
INSERT INTO `estado_animo` VALUES (3,1,NULL,'feliz',10,'bien'),(3,2,NULL,'triste',8,'mal'),(3,3,NULL,'enfado',8,'mal');
/*!40000 ALTER TABLE `estado_animo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logros`
--

DROP TABLE IF EXISTS `logros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logros` (
  `id_registro` int NOT NULL,
  `id_linea` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `que_he_logrado` mediumtext COLLATE utf8mb4_general_ci,
  `acciones_realizadas` mediumtext COLLATE utf8mb4_general_ci,
  `como_me_siento` int DEFAULT NULL,
  `premio_obtenido` mediumtext COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_registro`,`id_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logros`
--

LOCK TABLES `logros` WRITE;
/*!40000 ALTER TABLE `logros` DISABLE KEYS */;
INSERT INTO `logros` VALUES (4,1,NULL,'todo','todo',0,'todo'),(4,2,NULL,'nada','nada',0,'nada');
/*!40000 ALTER TABLE `logros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_psicologo` int NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dni` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `pwd` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`id_psicologo`),
  CONSTRAINT `id` FOREIGN KEY (`id_psicologo`) REFERENCES `psicologo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,1,'Yoel','Orts','1234','yoel@gmail.com','221199'),(3,2,'Raul','Garcia','2468','raul@gmail.com','1234'),(5,1,'Dani','Martinez','14785845','hola@gmail.com','dsadsa');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente_registro`
--

DROP TABLE IF EXISTS `paciente_registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente_registro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_paciente` int NOT NULL,
  `id_registro` int NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente_registro`
--

LOCK TABLES `paciente_registro` WRITE;
/*!40000 ALTER TABLE `paciente_registro` DISABLE KEYS */;
INSERT INTO `paciente_registro` VALUES (2,1,2,'2024-10-10'),(15,1,18,'2024-03-21'),(18,1,21,'2024-03-23');
/*!40000 ALTER TABLE `paciente_registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pensamientos`
--

DROP TABLE IF EXISTS `pensamientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pensamientos` (
  `id_registro` int NOT NULL,
  `id_linea` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `que_ha_sucedido` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `que_he_pensado` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `como_me_he_sentido` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `que_he_hecho` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_registro`,`id_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pensamientos`
--

LOCK TABLES `pensamientos` WRITE;
/*!40000 ALTER TABLE `pensamientos` DISABLE KEYS */;
INSERT INTO `pensamientos` VALUES (2,1,'2024-03-03','una cosa','otra cosa','bien','celebrar'),(2,2,'2024-04-04','ejemplo2','ejemplo2','ejemplo2','ejemplo2');
/*!40000 ALTER TABLE `pensamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `psicologo`
--

DROP TABLE IF EXISTS `psicologo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `psicologo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cop_num` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `pwd` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `rol` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `psicologo`
--

LOCK TABLES `psicologo` WRITE;
/*!40000 ALTER TABLE `psicologo` DISABLE KEYS */;
INSERT INTO `psicologo` VALUES (1,'Nieves','Ventura','123456','nieves@gmail.com','300498',1),(2,'Gabriela','Menendez','654321','gaby@gmail.com','1234',2),(7,'Marta','Alvaro','1478525','marta@gmail.com','300498',0);
/*!40000 ALTER TABLE `psicologo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tipo_reg` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_reg` (`id_tipo_reg`),
  CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`id_tipo_reg`) REFERENCES `tipo_registro` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (2,2),(7,2),(8,2),(9,2),(3,3),(12,3),(18,3),(21,3);
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relajacion_muscular`
--

DROP TABLE IF EXISTS `relajacion_muscular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relajacion_muscular` (
  `id_registro` int NOT NULL,
  `id_linea` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `momento_dia` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `relajacion_conseguida` int NOT NULL,
  `concentracion_conseguida` int NOT NULL,
  PRIMARY KEY (`id_registro`,`id_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relajacion_muscular`
--

LOCK TABLES `relajacion_muscular` WRITE;
/*!40000 ALTER TABLE `relajacion_muscular` DISABLE KEYS */;
INSERT INTO `relajacion_muscular` VALUES (1,1,NULL,'mañana',10,10),(1,2,NULL,'tarde',10,10),(1,3,NULL,'mañana',5,5);
/*!40000 ALTER TABLE `relajacion_muscular` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensaciones_corporales`
--

DROP TABLE IF EXISTS `sensaciones_corporales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sensaciones_corporales` (
  `id_registro` int NOT NULL,
  `id_linea` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `ejercicio_provocador` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numero_repeticion` int DEFAULT NULL,
  `miedo_maximo` int DEFAULT NULL,
  PRIMARY KEY (`id_registro`,`id_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensaciones_corporales`
--

LOCK TABLES `sensaciones_corporales` WRITE;
/*!40000 ALTER TABLE `sensaciones_corporales` DISABLE KEYS */;
INSERT INTO `sensaciones_corporales` VALUES (5,1,NULL,'arañas',10,10),(5,2,NULL,'arañas',8,8);
/*!40000 ALTER TABLE `sensaciones_corporales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_registro`
--

DROP TABLE IF EXISTS `tipo_registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_registro` (
  `id` int NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_registro`
--

LOCK TABLES `tipo_registro` WRITE;
/*!40000 ALTER TABLE `tipo_registro` DISABLE KEYS */;
INSERT INTO `tipo_registro` VALUES (1,'Registro para la práctica de la relajación muscular','Practica cada día la relajación muscular (dos veces al dia, si es posible) y puntúa después de 0 a 10 el grado de relajación y de concentración que has conseguido al realizar el ejercicio'),(2,'Registro de pensamientos',NULL),(3,'Registro de estado de ánimo','Apunta cada día las emociones que sientas, calora de 0 a 10 el grado de intensidad de estas emociones y el grado de preocupacion por tener una crisis de ansiedad o por las repercusiones de las mismas'),(4,'Registro de logros',NULL),(5,'Registro del afrontamiento de sensaciones corporales','Haz una lista con los ejercicios provocadores de sensaciones corporale que hayas realizado y anota el numero de veces que has repetido cada ejercicio. Despues de cada ejercicio, anota el miedo máximo que has sentido durante el ejercicio o inmediatamente después de acabarlo. Recuerda que antes de pasar a un nuevo ejercicio, tienes que repetir el mismo ejercicio de forma seguida hasta que tu miedo máximo baje a 1.');
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

-- Dump completed on 2024-03-26 21:30:26
