-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: sistema_ticket
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `beca`
--

DROP TABLE IF EXISTS `beca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `beca` (
  `id_beca` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf32_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_beca`),
  UNIQUE KEY `nombre_beca` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beca`
--

LOCK TABLES `beca` WRITE;
/*!40000 ALTER TABLE `beca` DISABLE KEYS */;
INSERT INTO `beca` VALUES (1,'PROGRESAR'),(2,'UNRN PRORITARIO');
/*!40000 ALTER TABLE `beca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beca_promocion`
--

DROP TABLE IF EXISTS `beca_promocion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `beca_promocion` (
  `id_beca_promocion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_beca` int(11) unsigned NOT NULL,
  `id_promocion` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_beca_promocion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beca_promocion`
--

LOCK TABLES `beca_promocion` WRITE;
/*!40000 ALTER TABLE `beca_promocion` DISABLE KEYS */;
INSERT INTO `beca_promocion` VALUES (1,1,14);
/*!40000 ALTER TABLE `beca_promocion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comedor`
--

DROP TABLE IF EXISTS `comedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `comedor` (
  `id_comedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) COLLATE utf32_spanish2_ci NOT NULL,
  `id_cuidad` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_comedor`),
  UNIQUE KEY `unicidad_comedor` (`nombre`) USING BTREE,
  KEY `fk_idx` (`id_cuidad`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comedor`
--

LOCK TABLES `comedor` WRITE;
/*!40000 ALTER TABLE `comedor` DISABLE KEYS */;
INSERT INTO `comedor` VALUES (1,'COMEDOR UNO',0),(2,'COMEDOR DOS',0),(3,'COMEDOR TRES',0),(4,'COMEDOR CUATRO',0),(5,'COMEDOR CINCO',0),(6,'COMEDOR SEIS',0),(7,'COMEDOR SIETE',0),(8,'COMEDOR OCHO',0);
/*!40000 ALTER TABLE `comedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuidad`
--

DROP TABLE IF EXISTS `cuidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cuidad` (
  `id_cuidad` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `id_sede` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_cuidad`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  KEY `fk_idx` (`id_sede`),
  CONSTRAINT `fk_cuidad_sede` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuidad`
--

LOCK TABLES `cuidad` WRITE;
/*!40000 ALTER TABLE `cuidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dia`
--

DROP TABLE IF EXISTS `dia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `dia` (
  `id_dia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) COLLATE utf32_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_dia`),
  UNIQUE KEY `unicidad_dia` (`nombre`,`fecha`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dia`
--

LOCK TABLES `dia` WRITE;
/*!40000 ALTER TABLE `dia` DISABLE KEYS */;
INSERT INTO `dia` VALUES (1,'Lunes','2019-06-24'),(2,'Viernes','2019-05-14');
/*!40000 ALTER TABLE `dia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dia_programacion`
--

DROP TABLE IF EXISTS `dia_programacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `dia_programacion` (
  `id_dia_programacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf32_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_dia_programacion`),
  UNIQUE KEY `unicidad_dia_programacion` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dia_programacion`
--

LOCK TABLES `dia_programacion` WRITE;
/*!40000 ALTER TABLE `dia_programacion` DISABLE KEYS */;
INSERT INTO `dia_programacion` VALUES (7,'DOMINGO'),(4,'JUEVES'),(1,'LUNES'),(2,'MARTES'),(3,'MIERCOLES'),(6,'SABADO'),(5,'VIERNES');
/*!40000 ALTER TABLE `dia_programacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `estado` (
  `id_estado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf32_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_estado`),
  UNIQUE KEY `unicidad_estado` (`nombre`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (6,'CANCELADO'),(1,'EN_PROCESO'),(5,'ENTREGADO'),(2,'RESERVADO');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_pago`
--

DROP TABLE IF EXISTS `estado_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `estado_pago` (
  `id_estado_pago` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) COLLATE utf32_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_estado_pago`),
  UNIQUE KEY `unicidad_estado_pago` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_pago`
--

LOCK TABLES `estado_pago` WRITE;
/*!40000 ALTER TABLE `estado_pago` DISABLE KEYS */;
INSERT INTO `estado_pago` VALUES (2,'PAGADO'),(1,'PENDIENTE');
/*!40000 ALTER TABLE `estado_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_ticket`
--

DROP TABLE IF EXISTS `estado_ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `estado_ticket` (
  `id_estado_ticket` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_ticket` int(10) unsigned NOT NULL,
  `id_estado` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_estado_ticket`),
  UNIQUE KEY `unicidad_estado_ticket` (`id_ticket`,`id_estado`) USING BTREE,
  KEY `estado_ticket_ibfk_1_idx` (`id_estado`),
  CONSTRAINT `estado_ticket_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `estado_ticket_ibfk_2` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id_ticket`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_ticket`
--

LOCK TABLES `estado_ticket` WRITE;
/*!40000 ALTER TABLE `estado_ticket` DISABLE KEYS */;
INSERT INTO `estado_ticket` VALUES (49,'2019-06-22',NULL,1,1),(50,'2019-06-22',NULL,2,2),(51,'2019-06-22',NULL,3,2),(52,'2019-06-22',NULL,4,5),(53,'2019-06-22',NULL,5,6),(54,'2019-06-22',NULL,6,5),(55,'2019-06-22',NULL,7,2),(56,'2019-06-22',NULL,8,1);
/*!40000 ALTER TABLE `estado_ticket` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `sistema_ticket`.`tg_sancionar_cliente` BEFORE INSERT ON `estado_ticket` FOR EACH ROW BEGIN

declare horaInicioTurno,horaReservaTicket time;
declare idPersona int;
declare fechaReserva date;
declare horaCancelacion TIME default CURTIME();
declare fechaCancelacion DATE default CURDATE(); 


-- consulta el id_persona, hora y fecha en la que se reservo el  ticket
select p.id_persona, (select t.hora_inicio from turno t where t.id_turno=r.id_turno), r.hora, r.fecha into idPersona, horaInicioTurno,horaReservaTicket, fechaReserva
from ticket t, reserva r, persona p
where t.id_ticket=new.id_ticket and r.id_ticket=t.id_ticket and r.id_persona = p.id_persona; 

-- verifica si debe aplicar una sancion
 if new.id_estado=6 and fechaReserva=fechaCancelacion and  (subtime( horaInicioTurno, horaCancelacion ) <= '02:00:00') and (subtime( horaCancelacion,horaReservaTicket ) >= '00:30:00')  then
 
	insert into sancion(id_sancion, fecha, hora, descripcion, id_persona) values ( null, fechaCancelacion, horaCancelacion, 'ohpoih', idPersona);     
 
 end if;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `sistema_ticket`.`tg_stock_mas` after INSERT ON `estado_ticket` FOR EACH ROW
BEGIN
declare estadoCancelado int;


select e.id_estado into estadoCancelado from estado e where e.nombre='CANCELADO';

-- verifica si la se cancela el ticket
if estadoCancelado=new.id_estado then
update stock 
-- tabla ticket
join ticket on( new.id_ticket = ticket.id_ticket )
-- tabla menu
join menu on( ticket.id_menu = menu.id_menu)

SET cantidad = cantidad+1

where menu.id_menu = stock.id_menu and stock.fecha=new.fecha_inicio;

end if;


END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `menu` (
  `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf32_spanish2_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `id_tipo_menu` int(10) unsigned NOT NULL,
  `id_comedor` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  UNIQUE KEY `unicidad_menu` (`nombre`,`id_tipo_menu`) USING BTREE,
  KEY `INDICE_tipo_menu` (`id_tipo_menu`) USING BTREE,
  KEY `kasndakjsnd_idx` (`id_comedor`),
  CONSTRAINT `kasndakjsnd` FOREIGN KEY (`id_comedor`) REFERENCES `comedor` (`id_comedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_tipo_menu`) REFERENCES `tipo_menu` (`id_tipo_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Desayuno americano','Desayuno nutritivo a base de frutas',1,2),(2,'Hamburguesa con papas fritas','Ricas papas fritas acompañadas de una hamburguesa ',3,4),(3,'Pollo con pure','Pollo asado con pure de papas ',2,5),(4,'Sandwich de milanesa','Sin descripcion',2,3),(5,'Verduras hervidas y carne','Carne cocida al horno con verduras seleccionadas',3,1),(6,'Sandwich de jamon y queso','Sin descripcion',3,4),(7,'Sopa de verduras','Sin descripcion',2,2),(8,'Pastel de papas','Pastel de papas con huevo y aceitunas',1,7),(9,'Asado con ensalada a eleccion','Sin descripcion',2,5),(10,'Lasagna ','Sin descripcion',1,3),(11,'Papas con crema de verdeo','Papas bañadas con crema',2,4);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `persona` (
  `id_persona` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `numero_legajo` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf32_spanish2_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf32_spanish2_ci NOT NULL,
  `id_tipo` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_persona`),
  UNIQUE KEY `nro_legajo` (`numero_legajo`),
  KEY `fk_tipo_idx` (`id_tipo`),
  CONSTRAINT `fk_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_persona` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,0,'jose luis','cruz',1),(2,1,'juan','perez',2),(3,2,'franco','montero',2),(4,3,'braian','montero',2),(5,4,'esteban','magin',5),(6,5,'gaston ','arzamendia',5),(7,6,'javier','arzamendia',1),(8,7,'diego','maradona',1),(9,8,'maria','gonzales',1),(10,9,'alejandra','rauson',1),(11,10,'belen','calvo',1),(12,11,'daniela','valencia',1),(13,12,'nicolas','valencia',1),(14,13,'marcela','estebanacio',2),(15,14,'mauro','macri',2);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona_beca`
--

DROP TABLE IF EXISTS `persona_beca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `persona_beca` (
  `id_persona_beca` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) unsigned NOT NULL,
  `id_beca` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_persona_beca`),
  UNIQUE KEY `unicidad_persona_beca` (`id_persona`,`id_beca`) USING BTREE,
  KEY `INDICE_beca` (`id_beca`) USING BTREE,
  CONSTRAINT `beca_FK` FOREIGN KEY (`id_beca`) REFERENCES `beca` (`id_beca`),
  CONSTRAINT `persona_FK` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona_beca`
--

LOCK TABLES `persona_beca` WRITE;
/*!40000 ALTER TABLE `persona_beca` DISABLE KEYS */;
INSERT INTO `persona_beca` VALUES (4,1,1),(3,5,2),(2,8,2),(5,10,2),(1,12,1);
/*!40000 ALTER TABLE `persona_beca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `precio`
--

DROP TABLE IF EXISTS `precio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `precio` (
  `id_precio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `precio` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_tipo_menu` int(10) unsigned NOT NULL,
  `id_menu` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_precio`),
  UNIQUE KEY `id_tipo_menu` (`id_tipo_menu`,`id_menu`),
  KEY `unicidad_precio` (`id_menu`) USING BTREE,
  CONSTRAINT `precio_ibfk_1` FOREIGN KEY (`id_tipo_menu`) REFERENCES `tipo_menu` (`id_tipo_menu`),
  CONSTRAINT `precio_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `precio`
--

LOCK TABLES `precio` WRITE;
/*!40000 ALTER TABLE `precio` DISABLE KEYS */;
INSERT INTO `precio` VALUES (1,24,'2019-06-03',NULL,1,1),(2,20,'2019-06-03',NULL,2,2),(3,15,'2019-06-03',NULL,2,3),(4,30,'2019-06-03',NULL,3,4),(5,13,'2019-06-03',NULL,1,5),(6,25,'2019-06-03',NULL,2,6),(7,10,'2019-06-03',NULL,2,7),(8,40,'2019-06-03',NULL,1,8),(9,35,'2019-06-03',NULL,1,9),(10,22,'2019-06-03',NULL,3,10),(11,30,'2019-06-03',NULL,3,11);
/*!40000 ALTER TABLE `precio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programacion`
--

DROP TABLE IF EXISTS `programacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `programacion` (
  `id_programacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_dia_programacion` int(10) unsigned NOT NULL,
  `id_turno` int(10) unsigned NOT NULL,
  `id_comedor` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_programacion`),
  UNIQUE KEY `unicidad_programacion` (`id_dia_programacion`,`id_turno`,`id_comedor`) USING BTREE,
  KEY `id_turno` (`id_turno`),
  KEY `id_comedor` (`id_comedor`),
  CONSTRAINT `programacion_ibfk_2` FOREIGN KEY (`id_turno`) REFERENCES `turno` (`id_turno`),
  CONSTRAINT `programacion_ibfk_3` FOREIGN KEY (`id_comedor`) REFERENCES `comedor` (`id_comedor`),
  CONSTRAINT `programacion_ibfk_4` FOREIGN KEY (`id_dia_programacion`) REFERENCES `dia_programacion` (`id_dia_programacion`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programacion`
--

LOCK TABLES `programacion` WRITE;
/*!40000 ALTER TABLE `programacion` DISABLE KEYS */;
INSERT INTO `programacion` VALUES (17,1,1,1),(18,1,1,2),(19,1,1,3),(20,1,1,4),(21,1,1,5),(22,1,1,6),(23,1,1,7),(24,1,2,1),(25,1,2,2),(26,1,2,3),(27,1,2,4),(28,1,2,5),(29,1,2,6),(30,1,2,7),(31,1,3,1),(32,1,3,2),(33,1,3,3),(34,1,3,4),(35,1,3,5),(36,1,3,6),(37,1,3,7),(38,2,1,1),(39,2,1,2),(40,2,1,3),(41,2,1,4),(42,2,1,5),(43,2,1,6),(44,2,1,7),(45,2,2,1),(46,2,2,2),(47,2,2,3),(48,2,2,4),(49,2,2,5),(50,2,2,6),(51,2,2,7),(52,2,3,1),(53,2,3,2),(54,2,3,3),(55,2,3,4),(56,2,3,5),(57,2,3,6),(58,2,3,7),(59,3,1,1),(60,3,1,2),(61,3,1,3),(62,3,1,4),(63,3,1,5),(64,3,1,6),(65,3,1,7),(66,3,2,1),(67,3,2,2),(68,3,2,3),(69,3,2,4),(70,3,2,5),(71,3,2,6),(72,3,2,7),(73,3,3,1),(74,3,3,2),(75,3,3,3),(76,3,3,4),(77,3,3,5),(78,3,3,6),(79,3,3,7),(80,4,1,1),(81,4,1,2),(82,4,1,3),(83,4,1,4),(84,4,1,5),(85,4,1,6),(86,4,1,7),(87,4,2,1),(88,4,2,2),(89,4,2,3),(90,4,2,4),(91,4,2,5),(92,4,2,6),(93,4,2,7),(94,4,3,1),(95,4,3,2),(96,4,3,3),(97,4,3,4),(98,4,3,5),(99,4,3,6),(100,4,3,7),(101,5,1,1),(102,5,1,2),(103,5,1,3),(104,5,1,4),(105,5,1,5),(106,5,1,6),(107,5,1,7),(108,5,2,1),(109,5,2,2),(110,5,2,3),(111,5,2,4),(112,5,2,5),(113,5,2,6),(114,5,2,7),(115,5,3,1),(116,5,3,2),(117,5,3,3),(118,5,3,4),(119,5,3,5),(120,5,3,6),(121,5,3,7);
/*!40000 ALTER TABLE `programacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programacion_menu`
--

DROP TABLE IF EXISTS `programacion_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `programacion_menu` (
  `id_programacion_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_programacion` int(10) unsigned NOT NULL,
  `id_menu` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_programacion_menu`),
  UNIQUE KEY `unicidad_programacion_menu` (`id_programacion`,`id_menu`) USING BTREE,
  CONSTRAINT `programacion_menu_ibfk_1` FOREIGN KEY (`id_programacion`) REFERENCES `programacion` (`id_programacion`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programacion_menu`
--

LOCK TABLES `programacion_menu` WRITE;
/*!40000 ALTER TABLE `programacion_menu` DISABLE KEYS */;
INSERT INTO `programacion_menu` VALUES (1,17,1),(2,18,1),(3,19,1),(4,20,1),(5,24,2),(6,25,3),(7,26,4),(8,27,5),(9,28,6),(10,52,7),(11,53,8),(12,54,9),(13,55,10);
/*!40000 ALTER TABLE `programacion_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promocion`
--

DROP TABLE IF EXISTS `promocion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `promocion` (
  `id_promocion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) COLLATE utf32_spanish2_ci NOT NULL,
  `descuento` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `id_comedor` int(10) unsigned NOT NULL,
  `id_tipo_menu` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_promocion`),
  UNIQUE KEY `unicidad_promocion` (`nombre`,`id_comedor`,`id_tipo_menu`) USING BTREE,
  KEY `id_tipo_menu` (`id_tipo_menu`),
  CONSTRAINT `promocion_ibfk_1` FOREIGN KEY (`id_tipo_menu`) REFERENCES `tipo_menu` (`id_tipo_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promocion`
--

LOCK TABLES `promocion` WRITE;
/*!40000 ALTER TABLE `promocion` DISABLE KEYS */;
INSERT INTO `promocion` VALUES (13,'promo milanesas',10,'milanesas completa ',1,1),(14,'promo postre',15,'flan con dulce de leche',2,2),(15,'promo pastas',20,'talarines con tuco',3,3),(16,'promo panchos',5,'pancho conpleto con papas fritas',4,1),(17,'promo lomo',25,'sanwiches de lomo completo',5,2);
/*!40000 ALTER TABLE `promocion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promocion_dia`
--

DROP TABLE IF EXISTS `promocion_dia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `promocion_dia` (
  `id_promocion_dia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_promocion` int(10) unsigned NOT NULL,
  `id_dia` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_promocion_dia`),
  KEY `id_promocion` (`id_promocion`),
  KEY `id_dia` (`id_dia`),
  CONSTRAINT `promocion_dia_ibfk_1` FOREIGN KEY (`id_promocion`) REFERENCES `promocion` (`id_promocion`),
  CONSTRAINT `promocion_dia_ibfk_2` FOREIGN KEY (`id_dia`) REFERENCES `dia` (`id_dia`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promocion_dia`
--

LOCK TABLES `promocion_dia` WRITE;
/*!40000 ALTER TABLE `promocion_dia` DISABLE KEYS */;
INSERT INTO `promocion_dia` VALUES (10,13,1),(11,14,1),(12,15,1),(13,16,2),(14,17,2);
/*!40000 ALTER TABLE `promocion_dia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `reserva` (
  `id_reserva` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` int(10) unsigned NOT NULL,
  `id_ticket` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_turno` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  UNIQUE KEY `unicidad_persona` (`id_persona`,`id_ticket`) USING BTREE,
  KEY `INDICE_ticket` (`id_ticket`) USING BTREE,
  KEY `kjn_idx` (`id_turno`),
  CONSTRAINT `kjn` FOREIGN KEY (`id_turno`) REFERENCES `turno` (`id_turno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id_ticket`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (1,6,1,'2019-06-22','00:00:14',2),(2,4,2,'2019-06-22','00:00:08',1),(3,7,3,'2019-06-22','00:00:09',1),(4,5,4,'2019-06-22','00:00:09',1),(5,1,5,'2019-06-22','00:00:19',3),(6,2,6,'2019-06-22','00:00:18',3),(7,3,7,'2019-06-22','00:00:12',2),(8,1,9,'2019-06-24','00:00:12',1);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `sistema_ticket`.`tg_stock_menos` BEFORE INSERT ON `reserva` FOR EACH ROW
BEGIN
update stock 
-- tabla ticket
join ticket on( new.id_ticket = ticket.id_ticket )
-- tabla menu
join menu on( ticket.id_menu = menu.id_menu)

SET cantidad = cantidad-1

where menu.id_menu = stock.id_menu and stock.fecha=new.fecha;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `sancion`
--

DROP TABLE IF EXISTS `sancion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sancion` (
  `id_sancion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `descripcion` varchar(35) COLLATE utf32_spanish2_ci NOT NULL,
  `id_persona` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_sancion`),
  UNIQUE KEY `unicidad_sancion` (`fecha`,`id_persona`) USING BTREE,
  KEY `INDICE_persona` (`id_persona`) USING BTREE,
  CONSTRAINT `sancion_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sancion`
--

LOCK TABLES `sancion` WRITE;
/*!40000 ALTER TABLE `sancion` DISABLE KEYS */;
/*!40000 ALTER TABLE `sancion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sede`
--

DROP TABLE IF EXISTS `sede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sede` (
  `id_sede` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) COLLATE utf32_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_sede`),
  UNIQUE KEY `unicidad_sede` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sede`
--

LOCK TABLES `sede` WRITE;
/*!40000 ALTER TABLE `sede` DISABLE KEYS */;
INSERT INTO `sede` VALUES (1,'ANDINA'),(3,'ATLANTICA'),(2,'VALLE MEDIO');
/*!40000 ALTER TABLE `sede` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `stock` (
  `id_stock` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_menu` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_stock`),
  UNIQUE KEY `unidad` (`id_menu`,`fecha`),
  KEY `fk_menu_idx` (`id_menu`),
  CONSTRAINT `fk_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (55,'2019-06-24',4,1),(56,'2019-06-24',5,8),(57,'2019-06-24',5,10),(58,'2019-06-24',5,3),(59,'2019-06-24',5,4),(60,'2019-06-24',5,7),(61,'2019-06-24',5,9),(62,'2019-06-24',5,11),(63,'2019-06-24',5,2),(64,'2019-06-24',5,5),(65,'2019-06-24',5,6),(90,'2019-06-25',5,1),(91,'2019-06-25',5,8),(92,'2019-06-25',5,10),(93,'2019-06-25',5,3),(94,'2019-06-25',5,4),(95,'2019-06-25',5,7),(96,'2019-06-25',5,9),(97,'2019-06-25',5,11),(98,'2019-06-25',5,2),(99,'2019-06-25',5,5),(100,'2019-06-25',5,6);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ticket` (
  `id_ticket` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `id_estado_pago` int(10) unsigned NOT NULL,
  `id_menu` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_ticket`),
  UNIQUE KEY `unicidad_ticket` (`codigo`) USING BTREE,
  KEY `INDICE_estado_pago` (`id_estado_pago`) USING BTREE,
  KEY `INDICE_menu` (`id_menu`) USING BTREE,
  CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_estado_pago`) REFERENCES `estado_pago` (`id_estado_pago`),
  CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (1,2345,1,1),(2,2346,2,2),(3,2347,2,3),(4,2348,1,4),(5,2349,2,5),(6,2350,1,6),(7,2351,2,7),(8,2352,1,8),(9,2353,1,1);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_menu`
--

DROP TABLE IF EXISTS `tipo_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tipo_menu` (
  `id_tipo_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf32_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_tipo_menu`),
  UNIQUE KEY `unicidad_tipo_menu` (`nombre`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_menu`
--

LOCK TABLES `tipo_menu` WRITE;
/*!40000 ALTER TABLE `tipo_menu` DISABLE KEYS */;
INSERT INTO `tipo_menu` VALUES (3,'GRANDE'),(2,'MEDIANO'),(1,'PEQUEÑO');
/*!40000 ALTER TABLE `tipo_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_persona`
--

DROP TABLE IF EXISTS `tipo_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tipo_persona` (
  `id_tipo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf32_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_tipo`),
  UNIQUE KEY `nombre_tipo` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_persona`
--

LOCK TABLES `tipo_persona` WRITE;
/*!40000 ALTER TABLE `tipo_persona` DISABLE KEYS */;
INSERT INTO `tipo_persona` VALUES (1,'ALUMNO'),(5,'DOCENTE'),(2,'NO_DOCENTE');
/*!40000 ALTER TABLE `tipo_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(10) unsigned NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_usuario`),
  UNIQUE KEY `tipo_UNIQUE` (`tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'USUARIO_CLIENTE'),(2,'USUARIO_NO_REGISTRADO'),(3,'ADMINISTRADOR_COMEDOR'),(4,'ADMINISTRACION');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turno`
--

DROP TABLE IF EXISTS `turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `turno` (
  `id_turno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) COLLATE utf32_spanish2_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  PRIMARY KEY (`id_turno`),
  UNIQUE KEY `unicidad_turno` (`nombre`,`hora_inicio`,`hora_fin`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turno`
--

LOCK TABLES `turno` WRITE;
/*!40000 ALTER TABLE `turno` DISABLE KEYS */;
INSERT INTO `turno` VALUES (2,'ALMUERZO','11:30:00','15:00:00'),(1,'DESAYUNO','08:00:00','11:30:00'),(3,'MERIENDA','15:00:00','19:00:00');
/*!40000 ALTER TABLE `turno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` varchar(45) NOT NULL,
  `id_tipo_usuario` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `usuariocol` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `unicidad_usuario` (`nombre`,`contraseña`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='tabla para almacenar todos los usuarios de sistema de tickets';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vi_devolver_cantidad_menu_x_estado`
--

DROP TABLE IF EXISTS `vi_devolver_cantidad_menu_x_estado`;
/*!50001 DROP VIEW IF EXISTS `vi_devolver_cantidad_menu_x_estado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `vi_devolver_cantidad_menu_x_estado` AS SELECT 
 1 AS `Estado`,
 1 AS `Menu`,
 1 AS `Tamaño`,
 1 AS `Cantidad`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vi_reporte_turnos`
--

DROP TABLE IF EXISTS `vi_reporte_turnos`;
/*!50001 DROP VIEW IF EXISTS `vi_reporte_turnos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `vi_reporte_turnos` AS SELECT 
 1 AS `ticket`,
 1 AS `menu`,
 1 AS `comedor`,
 1 AS `descuento`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'sistema_ticket'
--

--
-- Dumping routines for database 'sistema_ticket'
--
/*!50003 DROP FUNCTION IF EXISTS `fn_cantidad_tickets` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_cantidad_tickets`(tipoMenu INT,fecha DATE,turno INT ) RETURNS int(11)
BEGIN
DECLARE total  int default 0;

select count(*) into total
from ticket t, menu m, tipo_menu tp, reserva r
where t.id_menu=m.id_menu and m.id_tipo_menu = tp.id_tipo_menu and tp.id_tipo_menu=tipoMenu and
r.fecha=fecha and r.id_turno=turno;

RETURN total;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `fn_costo_final` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_costo_final`(idTicket INT) RETURNS double
BEGIN
DECLARE idMenu, idTipoMenu, comedor, comedorPromocion INT;
declare idBecaAsociada, tienePromocionBeca, idComedor int default -1;
-- variables temporales 
DECLARE descuento, done INT default 0 ;
DECLARE precioMenu INT default 0 ;
DECLARE total DOUBLE default 0.0;
declare fechaReserva DATE;

-- consulta las becas de la persona
declare cursorBecasPersona cursor for select b.id_beca from reserva r, persona p, persona_beca pb, beca b
 where idTicket=r.id_ticket and p.id_persona=r.id_persona and p.id_persona=pb.id_persona 
	and pb.id_beca=b.id_beca;
declare continue handler for sqlstate '02000' set done =1;

-- obtiene el idmenu y idtipomenu relacionado con el ticket
select m.id_menu, m.id_tipo_menu, m.id_comedor, r.fecha 
into idMenu, idTipoMenu, comedor, fechaReserva
from ticket as t, menu as m, tipo_menu as tp, reserva r
where t.id_ticket = idTicket and t.id_menu=m.id_menu and m.id_tipo_menu = tp.id_tipo_menu
AND r.id_ticket=idTicket; 


-- obtengo el precio del menu
select p.precio into precioMenu
from precio as p
where p.id_menu = idMenu and p.id_tipo_menu = idTipoMenu;

-- consulta si ese menu tiene asociado una promocion
select p.descuento, p.id_comedor into descuento, comedorPromocion
from promocion as p, promocion_dia pm, dia d
where p.id_tipo_menu= idTipoMenu
-- verifica si se encuentra en la fecha de la promocion
and pm.id_promocion=d.id_dia and d.fecha=fechaReserva;
-- and (p.fecha_inicio < curdate() and p.fecha_fin > curdate()); 

-- si la persona que reservo el ticket posee varias becas y el menu prosee una promocion por beca
-- busca si las becas de la persona coninside con alguna de las becas relacionada a la promocion
open cursorBecasPersona;

repeat
fetch cursorBecasPersona into idBecaAsociada;
	if not done then
    -- falta terminar
		select bp.beca into tienePromocionBeca from beca_promocion bp; 
        
        -- si ya encontro la coinsidencia, termina
        if tienePromocionBeca != -1 then
			set done = 1;
        end if;
        
	 end if;
until done end repeat;
close cursorBecasPersona;


-- veridica si el comedor para el menu coinside con el comedor de la promocion


-- verifica si el menu tiene desc
IF descuento = 0 and comedor=comedorPromocion THEN
	set total = precioMenu;
ELSE
	-- si la persona tiene una beca y la promocion aplica un descuento por beca
    if tienePromocionBeca != -1 then
		set descuento = descuento +5;
	end if;
    
	-- verifica descuento por beca
	set total = precioMenu / (1+(descuento/100) );
	
END IF;
return total;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `descuento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `descuento`(idMenu int, fechaReserva DATE)
BEGIN
declare descuento char(1);
declare idPromocion int default -1;

		select p.id_promocion into idPromocion
        from menu m, tipo_menu tm, promocion p, promocion_dia pd, dia d
        where 
			m.id_tipo_menu=tm.id_tipo_menu and
            p.id_tipo_menu=tm.id_tipo_menu and
            p.id_comedor=m.id_comedor and 
            p.id_promocion=pd.id_promocion and 
            pd.id_dia=d.id_dia 
            and d.fecha=fechaReserva;
         
		if  idPromocion = -1 then
			select `N`;
		else 
			select `D`;
		END if;
        



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pr_cancelar_tickets` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_cancelar_tickets`(idTurno int)
BEGIN 
-- se determina la hora actual 
DECLARE horaActual TIME DEFAULT CURTIME(); -- curtime()__hora actual

-- se determina la fecha actual, para buscar todos los tickets de determinado dia
DECLARE fechaActual DATE DEFAULT CURDATE(); -- curdate()__fecha actual

-- horario del turno
DECLARE done int default 0;
DECLARE idR, idT INT;

DECLARE cursoTickets CURSOR FOR	select t.id_ticket 
		from reserva as r, ticket as t, estado_ticket et, estado e 
		where r.id_turno=idTurno and r.fecha=fechaActual and r.id_ticket=t.id_ticket
		and et.id_ticket=t.id_ticket and et.id_estado=e.id_estado and e.nombre='RESERVADO' ;
        
DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1;

	
-- abre el curso
OPEN  cursoTickets;
    
	REPEAT
		-- se obtiene los datos del id de reserva y del ticket
		FETCH cursoTickets INTO idT;

		if not done then

			-- actualiza el ultimo estado del ticket
			update estado_ticket as et
				set et.fecha_fin = CURDATE()
				where et.id_ticket = idT and et.fecha_fin = null;

			-- crea un nuevo estado del ticket
			insert into estado_ticket (id_estado_ticket, fecha_inicio, fecha_fin, id_ticket, id_estado)  
				values ( null, CURDATE(), null, idT, (select e.id_estado from estado as e where e.nombre = 'CANCELADO'));
				
			

		end if;
	UNTIL done END REPEAT;

	-- cierra los cursores
	close cursoTickets;




END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pr_generar_stock_semanal` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_generar_stock_semanal`(cantidad_parametro INT, fecha DATE)
BEGIN

DECLARE done INT DEFAULT 0;

DECLARE identificador_menu INT;

DECLARE cursor1 CURSOR FOR select m.id_menu from menu m;

DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1;

OPEN cursor1;

while not done do
	FETCH cursor1 INTO identificador_menu;
    
    if not done then
	
		INSERT INTO stock(id_stock,fecha,cantidad,id_menu)
		VALUES(null,fecha,cantidad_parametro,identificador_menu);
	end if;
    
end while;

CLOSE cursor1;	

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `vi_devolver_cantidad_menu_x_estado`
--

/*!50001 DROP VIEW IF EXISTS `vi_devolver_cantidad_menu_x_estado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vi_devolver_cantidad_menu_x_estado` AS select `e`.`nombre` AS `Estado`,`m`.`nombre` AS `Menu`,`tm`.`nombre` AS `Tamaño`,count(`e`.`nombre`) AS `Cantidad` from ((((`estado` `e` join `estado_ticket` `et` on((`e`.`id_estado` = `et`.`id_estado`))) join `ticket` `t` on((`et`.`id_ticket` = `t`.`id_ticket`))) join `menu` `m` on((`t`.`id_menu` = `m`.`id_menu`))) join `tipo_menu` `tm` on((`m`.`id_tipo_menu` = `tm`.`id_tipo_menu`))) group by `e`.`nombre` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vi_reporte_turnos`
--

/*!50001 DROP VIEW IF EXISTS `vi_reporte_turnos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vi_reporte_turnos` AS select `t`.`codigo` AS `ticket`,`m`.`nombre` AS `menu`,`c`.`nombre` AS `comedor`,(select (case when isnull(`p`.`id_promocion`) then 'N' else 'D' end) from (`dia` `d` join `promocion_dia` `pd`) where ((`d`.`fecha` = `r`.`fecha`) and (`pd`.`id_promocion` = `p`.`id_promocion`) and (`pd`.`id_dia` = `d`.`id_dia`))) AS `descuento` from (((((`ticket` `t` join `menu` `m`) join `comedor` `c`) join `reserva` `r`) join `tipo_menu` `tm`) left join `promocion` `p` on(((`tm`.`id_tipo_menu` = `p`.`id_tipo_menu`) and (`p`.`id_comedor` = `m`.`id_comedor`)))) where ((`t`.`id_menu` = `m`.`id_menu`) and (`m`.`id_comedor` = `c`.`id_comedor`) and (`m`.`id_tipo_menu` = `tm`.`id_tipo_menu`) and (`r`.`id_ticket` = `t`.`id_ticket`)) */;
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

-- Dump completed on 2019-09-24 16:20:37
