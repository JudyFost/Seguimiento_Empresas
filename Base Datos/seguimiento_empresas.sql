CREATE DATABASE  IF NOT EXISTS `seguimiento_empresas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `seguimiento_empresas`;
-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: 192.168.1.25    Database: seguimiento_empresas
-- ------------------------------------------------------
-- Server version	5.5.59-0ubuntu0.14.04.1

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
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno` (
  `idcontrol` varchar(13) NOT NULL,
  `usuario_idusuario` varchar(45) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `seguro_facultativo` varchar(2) DEFAULT NULL,
  `creditos_actuales` char(5) DEFAULT NULL,
  `situacion_alumno_clave` varchar(10) DEFAULT NULL,
  `tipo_alumno_clave` varchar(10) DEFAULT NULL,
  `carrera_idcarrera` int(11) NOT NULL,
  `servicio_social` varchar(2) DEFAULT NULL,
  `residencia_profesional` varchar(2) DEFAULT NULL,
  `proyecto_dual` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`idcontrol`,`carrera_idcarrera`),
  KEY `fk_alumnos_situacion_alumno1_idx` (`situacion_alumno_clave`),
  KEY `fk_alumnos_tipo_alumno1_idx` (`tipo_alumno_clave`),
  KEY `fk_alumno_usuario1_idx` (`usuario_idusuario`),
  KEY `fk_alumno_carrera1_idx` (`carrera_idcarrera`),
  CONSTRAINT `fk_alumnos_carrera1` FOREIGN KEY (`carrera_idcarrera`) REFERENCES `carrera` (`idcarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_situacion_alumno1` FOREIGN KEY (`situacion_alumno_clave`) REFERENCES `situacion_alumno` (`clave`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_tipo_alumno1` FOREIGN KEY (`tipo_alumno_clave`) REFERENCES `tipo_alumno` (`clave`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_usuario1` FOREIGN KEY (`idcontrol`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno_especialidad`
--

DROP TABLE IF EXISTS `alumno_especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno_especialidad` (
  `alumno_idcontrol` varchar(13) NOT NULL,
  `especialidad_idespecialidad` varchar(10) NOT NULL,
  `promedio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`alumno_idcontrol`,`especialidad_idespecialidad`),
  KEY `fk_alumno_has_especialidad_alumno1_idx` (`alumno_idcontrol`),
  KEY `fk_alumno_especialidad_especialidad1_idx` (`especialidad_idespecialidad`),
  CONSTRAINT `fk_alumno_especialidad_especialidad1` FOREIGN KEY (`especialidad_idespecialidad`) REFERENCES `especialidad` (`idespecialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_has_especialidad_alumno1` FOREIGN KEY (`alumno_idcontrol`) REFERENCES `alumno` (`idcontrol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_especialidad`
--

LOCK TABLES `alumno_especialidad` WRITE;
/*!40000 ALTER TABLE `alumno_especialidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno_especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrera`
--

DROP TABLE IF EXISTS `carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrera` (
  `idcarrera` int(11) NOT NULL AUTO_INCREMENT,
  `clave_carrera` varchar(45) DEFAULT NULL,
  `especialidad_idespecialidad` varchar(20) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idcarrera`),
  UNIQUE KEY `idcarrera_UNIQUE` (`idcarrera`),
  KEY `fk1_division_especialidad1_idx` (`especialidad_idespecialidad`),
  CONSTRAINT `fk1_division_especialidad1` FOREIGN KEY (`especialidad_idespecialidad`) REFERENCES `especialidad` (`idespecialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrera`
--

LOCK TABLES `carrera` WRITE;
/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
INSERT INTO `carrera` VALUES (1,'ISIC-2010','1','INGENIERIA EN SISTEMAS');
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamento` (
  `iddepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_idempresa` int(11) NOT NULL,
  `usuario_idusuario` varchar(45) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`iddepartamento`,`empresa_idempresa`,`usuario_idusuario`),
  UNIQUE KEY `iddepartamento_UNIQUE` (`iddepartamento`),
  KEY `fk_departamento_empresa1_idx` (`empresa_idempresa`),
  KEY `fk_departamento_usuario1_idx` (`usuario_idusuario`),
  CONSTRAINT `fk_departamento_empresa1` FOREIGN KEY (`empresa_idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_departamento_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (2,1,'nadia','Recursos Humanos'),(3,1,'nadia','');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `division_especialidad`
--

DROP TABLE IF EXISTS `division_especialidad`;
/*!50001 DROP VIEW IF EXISTS `division_especialidad`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `division_especialidad` AS SELECT 
 1 AS `iddivision`,
 1 AS `clave_carrera`,
 1 AS `nombre_carrera`,
 1 AS `idespecialidad`,
 1 AS `nombre`,
 1 AS `descripcion`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(15) NOT NULL,
  `razon_social` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo_sector` int(11) NOT NULL,
  `giro_comercial` int(11) NOT NULL,
  `tamanio` varchar(45) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(65) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pagina_web` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idempresa`,`rfc`,`tipo_sector`,`giro_comercial`),
  KEY `fk_empresa_giro_comercial1_idx` (`giro_comercial`,`tipo_sector`),
  CONSTRAINT `fk_empresa_giro_comercial1` FOREIGN KEY (`giro_comercial`, `tipo_sector`) REFERENCES `giro_comercial` (`idgiro`, `tipo_sector_idsector`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'X1','NO TIENE','GAMESA',3,11,'MEDIANA: 51-250','5521214524','TOLUCA','judith.hernandez@tesjo.ed','');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especialidad` (
  `idespecialidad` varchar(20) NOT NULL DEFAULT '',
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idespecialidad`,`nombre`,`descripcion`),
  UNIQUE KEY `idespecialidad_UNIQUE` (`idespecialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad`
--

LOCK TABLES `especialidad` WRITE;
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
INSERT INTO `especialidad` VALUES ('1','REDES','INTRODUCCION A LAS REDES');
/*!40000 ALTER TABLE `especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidad_materia`
--

DROP TABLE IF EXISTS `especialidad_materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especialidad_materia` (
  `idespecialidad_mat` int(11) NOT NULL AUTO_INCREMENT,
  `especialidad_idespecialidad` varchar(20) NOT NULL,
  `materia_clave` varchar(10) NOT NULL,
  PRIMARY KEY (`idespecialidad_mat`),
  UNIQUE KEY `idespecialidad_UNIQUE` (`idespecialidad_mat`),
  KEY `fk_especialidad_materia_especialidad1_idx` (`especialidad_idespecialidad`),
  KEY `fk_especialidad_materia_materia1_idx` (`materia_clave`),
  CONSTRAINT `fk_especialidad_materia_especialidad1` FOREIGN KEY (`especialidad_idespecialidad`) REFERENCES `especialidad` (`idespecialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_especialidad_materia_materia1` FOREIGN KEY (`materia_clave`) REFERENCES `materia` (`clave`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad_materia`
--

LOCK TABLES `especialidad_materia` WRITE;
/*!40000 ALTER TABLE `especialidad_materia` DISABLE KEYS */;
INSERT INTO `especialidad_materia` VALUES (1,'1','aca-0907');
/*!40000 ALTER TABLE `especialidad_materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giro_comercial`
--

DROP TABLE IF EXISTS `giro_comercial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giro_comercial` (
  `idgiro` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo_sector_idsector` int(11) NOT NULL,
  `nombre_sector` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgiro`,`tipo_sector_idsector`),
  KEY `fk_giro_comercial_tipo_sector1_idx` (`tipo_sector_idsector`),
  CONSTRAINT `fk_giro_comercial_tipo_sector1` FOREIGN KEY (`tipo_sector_idsector`) REFERENCES `tipo_sector` (`idsector`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giro_comercial`
--

LOCK TABLES `giro_comercial` WRITE;
/*!40000 ALTER TABLE `giro_comercial` DISABLE KEYS */;
INSERT INTO `giro_comercial` VALUES (1,'GANADERO',1,'PRIMARIO'),(2,'PESQUERO',1,'PRIMARIO'),(3,'MINERO',1,'PRIMARIO'),(4,'FORESTAL',1,'PRIMARIO'),(5,'INDUSTRIAL',2,'SECUNDARIO'),(6,'ENERGETICO',2,'SECUNDARIO'),(7,'MINERO',2,'SECUNDARIO'),(8,'CONSTRUCCION',2,'SECUNDARIO'),(9,'TRANSPORTE',2,'SECUNDARIO'),(10,'COMUNICACION',3,'TERCIARIO'),(11,'COMERCIAL',3,'TERCIARIO'),(12,'TURISTICO',3,'TERCIARIO'),(13,'SANITARIO',3,'TERCIARIO'),(14,'EDUCATIVO',3,'TERCIARIO'),(15,'FINANCIERO',3,'TERCIARIO'),(16,'ADMINISTRACION',3,'TERCIARIO');
/*!40000 ALTER TABLE `giro_comercial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `historial_alumno`
--

DROP TABLE IF EXISTS `historial_alumno`;
/*!50001 DROP VIEW IF EXISTS `historial_alumno`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `historial_alumno` AS SELECT 
 1 AS `idcontrol`,
 1 AS `usuario_idusuario`,
 1 AS `semestre`,
 1 AS `seguro_facultativo`,
 1 AS `creditos_actuales`,
 1 AS `clave_situacion`,
 1 AS `situacion_alumno_clave`,
 1 AS `tipo_alumno_clave`,
 1 AS `clave_tipoalu`,
 1 AS `carrera_idcarrera`,
 1 AS `clave_carrera`,
 1 AS `nombre`,
 1 AS `servicio_social`,
 1 AS `residencia_profesional`,
 1 AS `proyecto_dual`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materia` (
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `creditos` char(3) NOT NULL,
  PRIMARY KEY (`clave`,`nombre`,`creditos`),
  UNIQUE KEY `clave_UNIQUE` (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES ('ACA-0907','TALLER DE ETICA','4');
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia_alumno`
--

DROP TABLE IF EXISTS `materia_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materia_alumno` (
  `materia_clave` varchar(10) NOT NULL,
  `alumno_idcontrol` varchar(13) NOT NULL,
  `calificacion` int(3) DEFAULT NULL,
  PRIMARY KEY (`materia_clave`,`alumno_idcontrol`),
  KEY `fk_materia_has_alumno_alumno1_idx` (`alumno_idcontrol`),
  KEY `fk_materia_alumno_materia1_idx` (`materia_clave`),
  CONSTRAINT `fk_materia_alumno_materia1` FOREIGN KEY (`materia_clave`) REFERENCES `materia` (`clave`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_materia_has_alumno_alumno1` FOREIGN KEY (`alumno_idcontrol`) REFERENCES `alumno` (`idcontrol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_alumno`
--

LOCK TABLES `materia_alumno` WRITE;
/*!40000 ALTER TABLE `materia_alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `materia_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `responsable_empresa`
--

DROP TABLE IF EXISTS `responsable_empresa`;
/*!50001 DROP VIEW IF EXISTS `responsable_empresa`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `responsable_empresa` AS SELECT 
 1 AS `iddepartamento`,
 1 AS `nombre_departamento`,
 1 AS `idusuario`,
 1 AS `nombre`,
 1 AS `ap`,
 1 AS `am`,
 1 AS `idtipo`,
 1 AS `descripcion`,
 1 AS `password`,
 1 AS `cargo`,
 1 AS `sexo`,
 1 AS `email`,
 1 AS `telefono`,
 1 AS `direccion`,
 1 AS `idempresa`,
 1 AS `nombre_empresa`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `situacion_alumno`
--

DROP TABLE IF EXISTS `situacion_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `situacion_alumno` (
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`clave`),
  UNIQUE KEY `clave_UNIQUE` (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `situacion_alumno`
--

LOCK TABLES `situacion_alumno` WRITE;
/*!40000 ALTER TABLE `situacion_alumno` DISABLE KEYS */;
INSERT INTO `situacion_alumno` VALUES ('A','ACTIVO'),('B','BAJA'),('BT','BAJA TEMPORAL'),('E','EGRESADO');
/*!40000 ALTER TABLE `situacion_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitar_solicitud`
--

DROP TABLE IF EXISTS `solicitar_solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitar_solicitud` (
  `idcontrol` varchar(13) NOT NULL,
  `interesado` varchar(2) DEFAULT NULL,
  `Folio` int(11) DEFAULT NULL,
  `red1` int(11) DEFAULT NULL,
  `nombre_red1` varchar(45) DEFAULT NULL,
  `red2` int(11) DEFAULT NULL,
  `nombre_red2` varchar(45) DEFAULT NULL,
  `WhatsApp` int(13) DEFAULT NULL,
  KEY `fk_control_alumno_idx` (`idcontrol`),
  KEY `fk_folio_solicitud_idx` (`Folio`),
  KEY `fk_tipo_red1_idx` (`red1`),
  CONSTRAINT `fk_control_alumno` FOREIGN KEY (`idcontrol`) REFERENCES `alumno` (`idcontrol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitar_solicitud`
--

LOCK TABLES `solicitar_solicitud` WRITE;
/*!40000 ALTER TABLE `solicitar_solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitar_solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud` (
  `idsolicitud` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_solicitud_idtipo_solicitud` int(11) NOT NULL,
  `status_solicitud_idstatus_solicitud` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_max` date DEFAULT NULL,
  `horario_inicio` time DEFAULT NULL,
  `horario_fin` time DEFAULT NULL,
  `dias` varchar(7) DEFAULT NULL,
  `nivel_ingles` varchar(10) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `promedio` varchar(3) DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  `beca` varchar(2) DEFAULT NULL,
  `no_alumnos` int(2) DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `departamento_iddepartamento` int(11) NOT NULL,
  `departamento_empresa_idempresa` int(11) NOT NULL,
  `departamento_usuario_idusuario` varchar(45) NOT NULL,
  `carrera_idcarrera` int(11) NOT NULL,
  `carrera_especialidad_idespecialidad` varchar(20) NOT NULL,
  `idusuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idsolicitud`,`tipo_solicitud_idtipo_solicitud`,`status_solicitud_idstatus_solicitud`,`departamento_iddepartamento`,`departamento_empresa_idempresa`,`departamento_usuario_idusuario`,`carrera_idcarrera`,`carrera_especialidad_idespecialidad`),
  KEY `fk_solicitud_tipo_solicitud_idx` (`tipo_solicitud_idtipo_solicitud`),
  KEY `fk_solicitud_status_solicitud1_idx` (`status_solicitud_idstatus_solicitud`),
  KEY `fk_solicitud_departamento1_idx` (`departamento_iddepartamento`,`departamento_empresa_idempresa`,`departamento_usuario_idusuario`),
  KEY `fk_solicitud_carrera1_idx` (`carrera_idcarrera`,`carrera_especialidad_idespecialidad`),
  KEY `fk_solicitud_responsable_idx` (`idusuario`),
  CONSTRAINT `fk_solicitud_departamento1` FOREIGN KEY (`departamento_iddepartamento`, `departamento_empresa_idempresa`, `departamento_usuario_idusuario`) REFERENCES `departamento` (`iddepartamento`, `empresa_idempresa`, `usuario_idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_responsable` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_status_solicitud1` FOREIGN KEY (`status_solicitud_idstatus_solicitud`) REFERENCES `status_solicitud` (`idstatus_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_tipo_solicitud` FOREIGN KEY (`tipo_solicitud_idtipo_solicitud`) REFERENCES `tipo_solicitud` (`idtipo_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud`
--

LOCK TABLES `solicitud` WRITE;
/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_solicitud`
--

DROP TABLE IF EXISTS `status_solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_solicitud` (
  `idstatus_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idstatus_solicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_solicitud`
--

LOCK TABLES `status_solicitud` WRITE;
/*!40000 ALTER TABLE `status_solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_alumno`
--

DROP TABLE IF EXISTS `tipo_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_alumno` (
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`clave`),
  UNIQUE KEY `idtipo_alumno_UNIQUE` (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_alumno`
--

LOCK TABLES `tipo_alumno` WRITE;
/*!40000 ALTER TABLE `tipo_alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_sector`
--

DROP TABLE IF EXISTS `tipo_sector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_sector` (
  `idsector` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idsector`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_sector`
--

LOCK TABLES `tipo_sector` WRITE;
/*!40000 ALTER TABLE `tipo_sector` DISABLE KEYS */;
INSERT INTO `tipo_sector` VALUES (1,'PRIMARIO'),(2,'SECUNDARIO'),(3,'TERCIARIO');
/*!40000 ALTER TABLE `tipo_sector` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_solicitud`
--

DROP TABLE IF EXISTS `tipo_solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_solicitud` (
  `idtipo_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `reg_creditos` varchar(3) DEFAULT NULL,
  `reg_semestre` varchar(2) DEFAULT NULL,
  `reg_facultativo` varchar(2) DEFAULT NULL,
  `reg_actv_comple` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`idtipo_solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_solicitud`
--

LOCK TABLES `tipo_solicitud` WRITE;
/*!40000 ALTER TABLE `tipo_solicitud` DISABLE KEYS */;
INSERT INTO `tipo_solicitud` VALUES (1,'SS','SERVICIO SOCIAL',NULL,NULL,NULL,NULL),(2,'RP','RESIDENCIA PROFESIONAL',NULL,NULL,NULL,NULL),(3,'PD','PROYECTO DUAL',NULL,NULL,NULL,NULL),(4,'SEM','SOLICITUD DE EMPLEO',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tipo_solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_usuario` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'ADMINISTRADOR'),(2,'RESPONSABLE EMPRESA'),(3,'GERENTE EMPRESA'),(4,'JEFE DE DIVISION'),(5,'JEFE DE DEPARTAMENTO'),(6,'SECRETARIA');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` varchar(45) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `ap_paterno` varchar(50) DEFAULT NULL,
  `ap_materno` varchar(50) DEFAULT NULL,
  `tipo_usuario_idtipo` int(11) NOT NULL,
  `password` varchar(400) DEFAULT NULL,
  `puesto` varchar(70) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idusuario`,`tipo_usuario_idtipo`),
  UNIQUE KEY `idusuario_UNIQUE` (`idusuario`),
  KEY `fk_usuario_tipo_usuario1_idx` (`tipo_usuario_idtipo`),
  CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`tipo_usuario_idtipo`) REFERENCES `tipo_usuario` (`idtipo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('1','LETICIA','REYES','MONTEALVO',2,'c4ca4238a0b923820dcc509a6f75849b','ESTUDIANTE','M','lety@gmail.co','7121212109','ATLACOMULCO'),('jdiaz','JOSE','DIAZ','YANEZ',1,'5fa72358f0b4fb4f2c5d7de8c9a41846','ENCARGADO RESPONSABLE','M','jdiaz@tesjo.edu.mx','7121235642',''),('judith','JUDITH','HERNANDEZ','GONZALEZ',1,'c4ca4238a0b923820dcc509a6f75849b','ADMINISTRADOR SISTEMA ','M','judith.hernandez@tesjo.edu.mx','5529043779','IXTLAHUACA'),('marcogil','MARCO','GIL','LOZANO',3,'7815696ecbf1c96e6894b779456d330e','ENCARGADO RESPONSABLE','H','armando@gmail.com','7121210109',''),('mpol','ADD','SS','SSS',3,'5fa72358f0b4fb4f2c5d7de8c9a41846','ENCARGADO RESPONSABLE','H','mpol@gmail.com','7121235642',''),('nadia','NADIA','REYES','MARDIN',3,'c4ca4238a0b923820dcc509a6f75849b','GERENTE DE VENTAS','M','prueba@tesjo.mx','5529043779','TOLUCA');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vista_alumno`
--

DROP TABLE IF EXISTS `vista_alumno`;
/*!50001 DROP VIEW IF EXISTS `vista_alumno`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_alumno` AS SELECT 
 1 AS `idusuario`,
 1 AS `nombre`,
 1 AS `ap_paterno`,
 1 AS `ap_materno`,
 1 AS `puesto`,
 1 AS `sexo`,
 1 AS `correo`,
 1 AS `telefono`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_empresa`
--

DROP TABLE IF EXISTS `vista_empresa`;
/*!50001 DROP VIEW IF EXISTS `vista_empresa`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_empresa` AS SELECT 
 1 AS `idempresa`,
 1 AS `rfc`,
 1 AS `razon_social`,
 1 AS `nombre`,
 1 AS `idgiro`,
 1 AS `nombre_giro`,
 1 AS `tipo_sector_idsector`,
 1 AS `nombre_sector`,
 1 AS `tamanio`,
 1 AS `telefono`,
 1 AS `direccion`,
 1 AS `email`,
 1 AS `pagina_web`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_especialidad_materia`
--

DROP TABLE IF EXISTS `vista_especialidad_materia`;
/*!50001 DROP VIEW IF EXISTS `vista_especialidad_materia`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_especialidad_materia` AS SELECT 
 1 AS `idespecialidad_materia`,
 1 AS `idespecialidad`,
 1 AS `clave_materia`,
 1 AS `nombre_especialidad`,
 1 AS `descripcion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_responsable`
--

DROP TABLE IF EXISTS `vista_responsable`;
/*!50001 DROP VIEW IF EXISTS `vista_responsable`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_responsable` AS SELECT 
 1 AS `idusuario`,
 1 AS `nombre`,
 1 AS `ap_paterno`,
 1 AS `ap_materno`,
 1 AS `puesto`,
 1 AS `sexo`,
 1 AS `correo`,
 1 AS `telefono`,
 1 AS `nombre_empresa`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_user_depemp`
--

DROP TABLE IF EXISTS `vista_user_depemp`;
/*!50001 DROP VIEW IF EXISTS `vista_user_depemp`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_user_depemp` AS SELECT 
 1 AS `idusuario`,
 1 AS `nombre_user`,
 1 AS `ap`,
 1 AS `am`,
 1 AS `nombre_empresa`,
 1 AS `tipo_user_idtipo_user`,
 1 AS `desc`,
 1 AS `nombre_departamento`,
 1 AS `pass`,
 1 AS `cargo`,
 1 AS `sexo_user`,
 1 AS `correo_user`,
 1 AS `tel_user`,
 1 AS `empresa_idempresa`,
 1 AS `iddepartamento`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'seguimiento_empresas'
--

--
-- Dumping routines for database 'seguimiento_empresas'
--

--
-- Final view structure for view `division_especialidad`
--

/*!50001 DROP VIEW IF EXISTS `division_especialidad`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dcc`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `division_especialidad` AS select `carrera_0`.`idcarrera` AS `iddivision`,`carrera_0`.`clave_carrera` AS `clave_carrera`,`carrera_0`.`nombre` AS `nombre_carrera`,`especialidad_0`.`idespecialidad` AS `idespecialidad`,`especialidad_0`.`nombre` AS `nombre`,`especialidad_0`.`descripcion` AS `descripcion` from (`carrera` `carrera_0` join `especialidad` `especialidad_0`) where (`carrera_0`.`especialidad_idespecialidad` = `especialidad_0`.`idespecialidad`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `historial_alumno`
--

/*!50001 DROP VIEW IF EXISTS `historial_alumno`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dcc`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `historial_alumno` AS select `alumno_0`.`idcontrol` AS `idcontrol`,`alumno_0`.`usuario_idusuario` AS `usuario_idusuario`,`alumno_0`.`semestre` AS `semestre`,`alumno_0`.`seguro_facultativo` AS `seguro_facultativo`,`alumno_0`.`creditos_actuales` AS `creditos_actuales`,`situacion_alumno_0`.`clave` AS `clave_situacion`,`situacion_alumno_0`.`nombre` AS `situacion_alumno_clave`,`tipo_alumno_0`.`clave` AS `tipo_alumno_clave`,`tipo_alumno_0`.`nombre` AS `clave_tipoalu`,`alumno_0`.`carrera_idcarrera` AS `carrera_idcarrera`,`carrera_0`.`clave_carrera` AS `clave_carrera`,`carrera_0`.`nombre` AS `nombre`,`alumno_0`.`servicio_social` AS `servicio_social`,`alumno_0`.`residencia_profesional` AS `residencia_profesional`,`alumno_0`.`proyecto_dual` AS `proyecto_dual` from (((`alumno` `alumno_0` join `carrera` `carrera_0`) join `situacion_alumno` `situacion_alumno_0`) join `tipo_alumno` `tipo_alumno_0`) where ((`alumno_0`.`tipo_alumno_clave` = `tipo_alumno_0`.`clave`) and (`alumno_0`.`situacion_alumno_clave` = `situacion_alumno_0`.`clave`) and (`alumno_0`.`carrera_idcarrera` = `carrera_0`.`idcarrera`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `responsable_empresa`
--

/*!50001 DROP VIEW IF EXISTS `responsable_empresa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dcc`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `responsable_empresa` AS select `departamento_0`.`iddepartamento` AS `iddepartamento`,`departamento_0`.`nombre` AS `nombre_departamento`,`usuario_0`.`idusuario` AS `idusuario`,`usuario_0`.`nombre` AS `nombre`,`usuario_0`.`ap_paterno` AS `ap`,`usuario_0`.`ap_materno` AS `am`,`tipo_usuario_0`.`idtipo` AS `idtipo`,`tipo_usuario_0`.`descripcion` AS `descripcion`,`usuario_0`.`password` AS `password`,`usuario_0`.`puesto` AS `cargo`,`usuario_0`.`sexo` AS `sexo`,`usuario_0`.`correo` AS `email`,`usuario_0`.`telefono` AS `telefono`,`usuario_0`.`direccion` AS `direccion`,`empresa_0`.`idempresa` AS `idempresa`,`empresa_0`.`nombre` AS `nombre_empresa` from (((`departamento` `departamento_0` join `empresa` `empresa_0`) join `tipo_usuario` `tipo_usuario_0`) join `usuario` `usuario_0`) where ((`departamento_0`.`usuario_idusuario` = `usuario_0`.`idusuario`) and (`empresa_0`.`idempresa` = `departamento_0`.`empresa_idempresa`) and (`usuario_0`.`tipo_usuario_idtipo` = `tipo_usuario_0`.`idtipo`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_alumno`
--

/*!50001 DROP VIEW IF EXISTS `vista_alumno`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dcc`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_alumno` AS select `usuario_0`.`idusuario` AS `idusuario`,`usuario_0`.`nombre` AS `nombre`,`usuario_0`.`ap_paterno` AS `ap_paterno`,`usuario_0`.`ap_materno` AS `ap_materno`,`usuario_0`.`puesto` AS `puesto`,`usuario_0`.`sexo` AS `sexo`,`usuario_0`.`correo` AS `correo`,`usuario_0`.`telefono` AS `telefono` from (`tipo_usuario` `tipo_usuario_0` join `usuario` `usuario_0`) where (`tipo_usuario_0`.`idtipo` = `usuario_0`.`tipo_usuario_idtipo`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_empresa`
--

/*!50001 DROP VIEW IF EXISTS `vista_empresa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dcc`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_empresa` AS select `empresa_0`.`idempresa` AS `idempresa`,`empresa_0`.`rfc` AS `rfc`,`empresa_0`.`razon_social` AS `razon_social`,`empresa_0`.`nombre` AS `nombre`,`empresa_0`.`giro_comercial` AS `idgiro`,`giro_comercial_0`.`nombre` AS `nombre_giro`,`giro_comercial_0`.`tipo_sector_idsector` AS `tipo_sector_idsector`,`tipo_sector_0`.`nombre` AS `nombre_sector`,`empresa_0`.`tamanio` AS `tamanio`,`empresa_0`.`telefono` AS `telefono`,`empresa_0`.`direccion` AS `direccion`,`empresa_0`.`email` AS `email`,`empresa_0`.`pagina_web` AS `pagina_web` from ((`empresa` `empresa_0` join `giro_comercial` `giro_comercial_0`) join `tipo_sector` `tipo_sector_0`) where ((`tipo_sector_0`.`idsector` = `giro_comercial_0`.`tipo_sector_idsector`) and (`giro_comercial_0`.`idgiro` = `empresa_0`.`giro_comercial`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_especialidad_materia`
--

/*!50001 DROP VIEW IF EXISTS `vista_especialidad_materia`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dcc`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_especialidad_materia` AS select `especialidad_materia_0`.`idespecialidad_mat` AS `idespecialidad_materia`,`especialidad_0`.`idespecialidad` AS `idespecialidad`,`materia_0`.`clave` AS `clave_materia`,`especialidad_0`.`nombre` AS `nombre_especialidad`,`especialidad_0`.`descripcion` AS `descripcion` from ((`especialidad` `especialidad_0` join `especialidad_materia` `especialidad_materia_0`) join `materia` `materia_0`) where ((`especialidad_materia_0`.`materia_clave` = `materia_0`.`clave`) and (`especialidad_materia_0`.`especialidad_idespecialidad` = `especialidad_0`.`idespecialidad`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_responsable`
--

/*!50001 DROP VIEW IF EXISTS `vista_responsable`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dcc`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_responsable` AS select `usuario_0`.`idusuario` AS `idusuario`,`usuario_0`.`nombre` AS `nombre`,`usuario_0`.`ap_paterno` AS `ap_paterno`,`usuario_0`.`ap_materno` AS `ap_materno`,`usuario_0`.`puesto` AS `puesto`,`usuario_0`.`sexo` AS `sexo`,`usuario_0`.`correo` AS `correo`,`usuario_0`.`telefono` AS `telefono`,`empresa_0`.`nombre` AS `nombre_empresa` from (((`departamento` `departamento_0` join `empresa` `empresa_0`) join `tipo_usuario` `tipo_usuario_0`) join `usuario` `usuario_0`) where ((`departamento_0`.`usuario_idusuario` = `usuario_0`.`idusuario`) and (`empresa_0`.`idempresa` = `departamento_0`.`empresa_idempresa`) and (`usuario_0`.`tipo_usuario_idtipo` = `tipo_usuario_0`.`idtipo`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_user_depemp`
--

/*!50001 DROP VIEW IF EXISTS `vista_user_depemp`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dcc`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_user_depemp` AS select `usuario_0`.`idusuario` AS `idusuario`,`usuario_0`.`nombre` AS `nombre_user`,`usuario_0`.`ap_paterno` AS `ap`,`usuario_0`.`ap_materno` AS `am`,`empresa_0`.`nombre` AS `nombre_empresa`,`usuario_0`.`tipo_usuario_idtipo` AS `tipo_user_idtipo_user`,`tipo_usuario_0`.`descripcion` AS `desc`,`departamento_0`.`nombre` AS `nombre_departamento`,`usuario_0`.`password` AS `pass`,`usuario_0`.`puesto` AS `cargo`,`usuario_0`.`sexo` AS `sexo_user`,`usuario_0`.`correo` AS `correo_user`,`usuario_0`.`telefono` AS `tel_user`,`departamento_0`.`empresa_idempresa` AS `empresa_idempresa`,`departamento_0`.`iddepartamento` AS `iddepartamento` from (((`departamento` `departamento_0` join `empresa` `empresa_0`) join `tipo_usuario` `tipo_usuario_0`) join `usuario` `usuario_0`) where ((`tipo_usuario_0`.`idtipo` = `usuario_0`.`tipo_usuario_idtipo`) and (`usuario_0`.`idusuario` = `departamento_0`.`usuario_idusuario`) and (`departamento_0`.`empresa_idempresa` = `empresa_0`.`idempresa`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-30 16:46:34
