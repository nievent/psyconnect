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
  PRIMARY KEY (`id_registro`,`id_linea`),
  CONSTRAINT `fk_registro_estado_animo` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `id_registro` int(11) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `que_he_logrado` mediumtext DEFAULT NULL,
  `acciones_realizadas` mediumtext DEFAULT NULL,
  `como_me_siento` int(11) DEFAULT NULL,
  `premio_obtenido` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id_registro`,`id_linea`),
  CONSTRAINT `fk_registro_logros` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `id` int(11) NOT NULL,
  `id_psicologo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pwd` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_psicologo_idx` (`id_psicologo`),
  CONSTRAINT `id_psicologo` FOREIGN KEY (`id_psicologo`) REFERENCES `psicologo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,1,'Yoel','Orts','yoel@gmail.com','221199'),(2,1,'Dani','Martinez','dani@gmail.com','1234'),(3,2,'Raul','Garcia','raul@gmail.com','1234'),(4,1,'Alex','Lopez','alex@gmail.com','1234');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente_registro`
--

DROP TABLE IF EXISTS `paciente_registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente_registro` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_paciente_idx` (`id_paciente`),
  KEY `id_registro_idx` (`id_registro`),
  CONSTRAINT `fk_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_registro` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente_registro`
--

LOCK TABLES `paciente_registro` WRITE;
/*!40000 ALTER TABLE `paciente_registro` DISABLE KEYS */;
INSERT INTO `paciente_registro` VALUES (1,1,1,'2023-10-10'),(2,1,2,'2024-10-10'),(3,2,3,'2024-10-10'),(4,3,4,'2024-10-10'),(5,2,5,'2024-10-10');
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
  PRIMARY KEY (`id_registro`,`id_linea`),
  CONSTRAINT `fk_registro_pensamientos` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pensamientos`
--

LOCK TABLES `pensamientos` WRITE;
/*!40000 ALTER TABLE `pensamientos` DISABLE KEYS */;
INSERT INTO `pensamientos` VALUES (2,1,NULL,'una cosa','mal','mal','nada'),(2,2,NULL,'otra cosa','bien','bien','celebrar'),(2,3,NULL,'sdsa','aasas','aaa','aaa');
/*!40000 ALTER TABLE `pensamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `psicologo`
--

DROP TABLE IF EXISTS `psicologo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `psicologo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `cop_num` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `psicologo`
--

LOCK TABLES `psicologo` WRITE;
/*!40000 ALTER TABLE `psicologo` DISABLE KEYS */;
INSERT INTO `psicologo` VALUES (1,'Nieves','Ventura',123456,'nieves@gmail.com','300498',1),(2,'Gabriela','Menendez',654321,'gaby@gmail.com','1234',2);
/*!40000 ALTER TABLE `psicologo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `id_tipo_reg` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_reg` (`id_tipo_reg`),
  CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`id_tipo_reg`) REFERENCES `tipo_registro` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (1,1),(2,2),(3,3),(4,4),(5,5);
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
  PRIMARY KEY (`id_registro`,`id_linea`),
  CONSTRAINT `fk_registro_relajacion` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `id_registro` int(11) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `ejercicio_provocador` varchar(100) DEFAULT NULL,
  `numero_repeticion` int(11) DEFAULT NULL,
  `miedo_maximo` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_registro`,`id_linea`),
  CONSTRAINT `fk_registro_sensaciones_corporales` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensaciones_corporales`
--

LOCK TABLES `sensaciones_corporales` WRITE;
/*!40000 ALTER TABLE `sensaciones_corporales` DISABLE KEYS */;
INSERT INTO `sensaciones_corporales` VALUES (5,1,'arañas',10,10,NULL),(5,2,'arañas',8,8,NULL);
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
  `titulo` varchar(45) NOT NULL,
  `descripcion` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_registro`
--

LOCK TABLES `tipo_registro` WRITE;
/*!40000 ALTER TABLE `tipo_registro` DISABLE KEYS */;
INSERT INTO `tipo_registro` VALUES (1,'Registro para la práctica de la relajación mu','Practica cada día la relajación muscular (dos veces al dia, si es posible) y puntúa después de 0 a 10 el grado de relajación y de concentración que has conseguido al realizar el ejercicio'),(2,'Registro de pensamientos',NULL),(3,'Registro de estado de ánimo','Apunta cada día las emociones que sientas, calora de 0 a 10 el grado de intensidad de estas emociones y el grado de preocupacion por tener una crisis de ansiedad o por las repercusiones de las mismas'),(4,'Registro de logros',NULL),(5,'Registro del afrontamiento de sensaciones cor','Haz una lista con los ejercicios provocadores de sensaciones corporale que hayas realizado y anota el numero de veces que has repetido cada ejercicio. Despues de cada ejercicio, anota el miedo máximo que has sentido durante el ejercicio o inmediatamente después de acabarlo. Recuerda que antes de pasar a un nuevo ejercicio, tienes que repetir el mismo ejercicio de forma seguida hasta que tu miedo máximo baje a 1.');
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

-- Dump completed on 2024-03-15 14:50:05
