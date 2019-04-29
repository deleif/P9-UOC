-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 192.168.1.41    Database: valoraciones_cerveza
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.26-MariaDB

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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_categoria` varchar(250) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=100001 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Pale Lager'),(2,'Pilsner'),(3,'Pale Ale');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel`
--

DROP TABLE IF EXISTS `nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_nivel` varchar(250) NOT NULL,
  `ponderacion` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel`
--

LOCK TABLES `nivel` WRITE;
/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
INSERT INTO `nivel` VALUES (1,'Novato',1.00),(2,'Intermedio',1.20),(3,'Experto',1.40),(4,'Administrador',1.00);
/*!40000 ALTER TABLE `nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre_producto` varchar(250) NOT NULL,
  `descripcion_producto` varchar(250) NOT NULL,
  `foto_producto` blob NOT NULL,
  `num_votos` int(11) NOT NULL,
  `puntos_total` int(11) NOT NULL,
  `puntos_media` decimal(10,2) NOT NULL,
  `ruta_foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,1,'Heineken','Cerveza de tipo Lager y estilo Pilsen de color amarillo claro y brillante, con una espuma blanca intensa y cremosa.','',3,16,3.90,'assets/images/heineken.png'),(2,1,'Carlsberg','Bien proporcionada, con sabor a lúpulo, grano de trigo, pino, acedera y manzanas de verano danesas.','',1,3,2.14,'assets/images/calsberg.png'),(3,1,'Foster','Cerveza extremadamente ligera, sin cuerpo, con demasiado carbónico y con un sabor dulce.','',0,0,0.00,'assets/images/foster.png'),(4,2,'Warsteiner','Ligera y de suave carbonatación, donde detectar gran presencia de la malta y acabado con cierto amargor.','',0,0,0.00,'assets/images/warsteiner.png'),(5,2,'Bitburger ',' Se aprecia en la copa que el carbónico es grueso y abundante, dando cierto punto de refresco al conjunto','',0,0,0.00,'assets/images/bitburger.png'),(6,2,'Beck\'s','Cerveza con poca espuma, muy blanca, y que dura muy poco en la copa, de color amarillo pálido.','',0,0,0.00,'assets/images/becks.png'),(7,3,'Citra Cascade','Tiene un nivel de amargor moderado, y resulta ideal para hacer prácticas como el dry-hopping o el hopback','',1,5,3.57,'assets/images/citra.png'),(8,3,'Ambar IPA','Destaca por la complejidad de sabores y aromas donde predominan las notas florales, cítricas y a frutas tropicales','',0,0,0.00,'assets/images/ambar.png'),(9,3,'Moritz BaPA','Aromática, sedosa y muy fácil de beber. Elaborada con levadura de alta fermentación con un perfil muy afrutado, una mezcla de malta de cebada, malta de trigo y copos de avena','',0,0,0.00,'assets/images/moritz.png');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del usuario',
  `id_nivel` int(11) NOT NULL DEFAULT '1' COMMENT 'Identificador de nivel de experiencia del usuario',
  `nombre_usuario` varchar(250) NOT NULL,
  `password_usuario` varchar(250) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_nivel` (`id_nivel`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id_nivel`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,3,'javier','jc.1'),(2,3,'araceli','ar.2'),(3,2,'daniel','a'),(4,1,'vicent','vi.4'),(5,1,'dleiva','a'),(7,4,'Admin','a');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votaciones_producto`
--

DROP TABLE IF EXISTS `votaciones_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votaciones_producto` (
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `puntos_producto_usuario` decimal(10,2) NOT NULL,
  `puntos_ponderados` decimal(10,2) DEFAULT NULL,
  `puntos_normaliza` decimal(10,2) DEFAULT NULL,
  `valoracion_producto` varchar(250) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_producto`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `votaciones_producto_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `votaciones_producto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votaciones_producto`
--

LOCK TABLES `votaciones_producto` WRITE;
/*!40000 ALTER TABLE `votaciones_producto` DISABLE KEYS */;
INSERT INTO `votaciones_producto` VALUES (1,1,5.00,7.00,5.00,''),(2,1,5.00,7.00,5.00,''),(3,1,2.00,2.40,1.71,''),(5,2,3.00,3.00,2.14,''),(5,7,5.00,5.00,3.57,'');
/*!40000 ALTER TABLE `votaciones_producto` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`::1`*/ /*!50003 TRIGGER actualiza_puntos_ponderados 
before INSERT ON votaciones_producto 
FOR EACH ROW
BEGIN
    
    SET new.puntos_ponderados = NEW.puntos_producto_usuario * 
        ((select distinct a.ponderacion from nivel a 
        inner join usuario b  
        where a.id_nivel = b.id_nivel 
        and b.id_usuario = new.id_usuario limit 1));
      
    SET new.puntos_normaliza = 5 * (NEW.puntos_ponderados / 7);  
  
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
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`::1`*/ /*!50003 TRIGGER actualiza_puntos 
after insert ON votaciones_producto 
FOR EACH ROW

BEGIN

    DECLARE var_t float;
    DECLARE var_num_votos int;
    DECLARE var_puntos_total int;
    DECLARE var_media float;
        
    SET var_num_votos = (select num_votos from productos a 
        inner join votaciones_producto b  
        where a.id_producto = new.id_producto limit 1) + 1;
    
    SET var_puntos_total = (select puntos_total from productos a 
        inner join votaciones_producto b  
        where a.id_producto = new.id_producto limit 1) + NEW.puntos_producto_usuario * 
        ((select distinct a.ponderacion from nivel a 
        inner join usuario b  
        where a.id_nivel = b.id_nivel 
        and b.id_usuario = new.id_usuario limit 1));
	  
    SET var_media = (SELECT SUM(puntos_normaliza) from votaciones_producto WHERE id_producto = NEW.id_producto) /var_num_votos;    
        
    UPDATE productos SET
		num_votos = var_num_votos,        
		puntos_total = var_puntos_total,                
        puntos_media = var_media  
		
	WHERE id_producto = NEW.id_producto;
    
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-28 20:42:59
