-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: pos
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (10,'Antibioticos',NULL),(11,'Antigripales',NULL),(12,'Proteina',NULL),(13,'aceites','2024-03-14 20:32:35');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `documento` int DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `direccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `compras` int DEFAULT NULL,
  `ultima_compra` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (6,'Alberto Escobar',1,'Alberto@luid.com','(557) 788-5554','calle falsa #123 col.progreso','2000-08-05',75,'2024-03-16 04:08:53','2024-02-29 22:07:18'),(8,'rosario Ramirez',3,'romualdo@gmail.com','(639) 787-8654','calle perseverancia #1105 col.revolucion','1978-02-28',60,'2024-03-14 15:33:56','2024-03-04 20:25:35');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colores`
--

DROP TABLE IF EXISTS `colores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colores` (
  `id` int NOT NULL,
  `navegador` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `late` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `activa` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colores`
--

LOCK TABLES `colores` WRITE;
/*!40000 ALTER TABLE `colores` DISABLE KEYS */;
INSERT INTO `colores` VALUES (1,'#23520a','#3c2020','#000000','#000000');
/*!40000 ALTER TABLE `colores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logos`
--

DROP TABLE IF EXISTS `logos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `logo_mini` varchar(255) DEFAULT NULL,
  `logo_grande` varchar(255) DEFAULT NULL,
  `logo_login` varchar(255) DEFAULT NULL,
  `fondo_login` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logos`
--

LOCK TABLES `logos` WRITE;
/*!40000 ALTER TABLE `logos` DISABLE KEYS */;
INSERT INTO `logos` VALUES (40,'vistas/img/plantillas/66048a91e1d30_login2.png','vistas/img/plantillas/660467a259b7e_65ea28c23c1e6_logo-negro-lineal.png','vistas/img/plantillas/660467b307ab7_65f5617ecbebe_65ea28c23c486_logo-negro-bloque.png','vistas/img/plantillas/65fc5507a3412_4884273.jpg');
/*!40000 ALTER TABLE `logos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_categoria` int DEFAULT NULL,
  `codigo` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `precio_compra` float(10,2) DEFAULT NULL,
  `precio_venta` float(10,2) DEFAULT NULL,
  `ventas` int DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,10,'78963282','Cefalver','vistas/img/productos/default/anonymous.png',38,30.00,42.00,14,NULL),(2,11,'65685421','TERAFLU','vistas/img/productos/65685421/154.png',27,200.00,280.00,47,NULL),(3,12,'897413','whyprotein','vistas/img/productos/default/anonymous.png',48,1000.00,1400.00,3,NULL),(4,10,'878941321','Ceftriaxona','vistas/img/productos/default/anonymous.png',49,500.00,700.00,1,NULL),(5,10,'9633979','Nitrofurantoína ','vistas/img/productos/default/anonymous.png',190,300.00,420.00,10,NULL),(6,11,'96363278','Tesalon Adulto','vistas/img/productos/default/anonymous.png',11,200.00,280.00,9,NULL),(7,12,'9335898','ELITE','vistas/img/productos/default/anonymous.png',45,1000.00,1400.00,5,NULL),(8,12,'9378643412','Evolution','vistas/img/productos/default/anonymous.png',19,5000.00,7000.00,1,NULL),(9,12,'87984132','Falcom','vistas/img/productos/default/anonymous.png',67,3500.00,3500.00,14,NULL),(10,12,'798465132','bpi','vistas/img/productos/default/anonymous.png',43,1200.00,1680.00,8,NULL),(11,12,'9871321','Mutant','vistas/img/productos/default/anonymous.png',19,6661.00,9325.40,2,NULL),(12,10,'7987432','Fosfomicina','vistas/img/productos/default/anonymous.png',19,200.00,280.00,2,NULL),(16,12,'789413','Aceite en polvo','vistas/img/productos/default/anonymous.png',15,12.20,17.08,NULL,'2024-03-11 18:23:14'),(17,12,'89751321','Acido Folico','vistas/img/productos/default/anonymous.png',10,15.20,21.28,NULL,'2024-03-11 18:25:53'),(27,10,'8784132','porfavor funciona','vistas/img/productos/default/anonymous.png',15,15.20,21.00,NULL,'2024-03-13 17:39:25'),(28,12,'8797+','tienes que jalar','vistas/img/productos/default/anonymous.png',15,17.20,24.00,NULL,'2024-03-13 17:42:34'),(29,10,'87942312','algo','vistas/img/productos/default/anonymous.png',12,12.90,18.00,NULL,'2024-03-13 17:54:21'),(30,10,'788715312','eqtdffd','vistas/img/productos/default/anonymous.png',10,12.40,17.50,NULL,'2024-03-13 17:58:21'),(31,11,'79879','asdasd','vistas/img/productos/default/anonymous.png',113,12.60,17.50,2,'2024-03-13 18:03:23'),(32,10,'878972','asdasdasd','vistas/img/productos/default/anonymous.png',8,1.80,2.50,2,'2024-03-13 18:05:37'),(33,10,'875623','asdasd','vistas/img/productos/default/anonymous.png',14,12.60,17.50,1,'2024-03-13 18:14:02'),(34,10,'78879456312','hubbib','vistas/img/productos/default/anonymous.png',10,1.61,2.50,NULL,'2024-03-13 18:43:10'),(36,11,'mitrosote','78978','vistas/img/productos/default/anonymous.png',9,1.50,2.00,1,'2024-03-13 19:48:30'),(37,10,'789798','mdjbdfs','vistas/img/productos/default/anonymous.png',14,10.20,14.50,1,'2024-03-13 21:05:17'),(38,13,'87984112135','123','vistas/img/productos/default/anonymous.png',0,20.00,28.00,15,'2024-03-14 20:33:05'),(39,10,'8798798546','hola','vistas/img/productos/default/anonymous.png',15,10.55,15.00,NULL,'2024-03-16 21:27:48');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `usuario` varchar(80) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `perfil` varchar(80) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (13,'jesus','jesus1','$2y$10$jRcoe5uDHQeEzY8ImlVgsOZuGbl0qmonHIwNlup40GaV.8ycFksRK','Administrador','vistas/img/usuarios/default/anonymous.png',1,'2024-03-11 12:47:45',NULL),(14,'Administrador','Admin','$2y$10$W96OLtD5Lp2gMf0hcZjNwOHDdBpTlspR453iZa0RZZ9cQwgQTC8/m','Administrador','vistas/img/usuarios/default/anonymous.png',1,'2024-03-27 16:06:58',NULL),(18,'maria','mar','$2y$10$O1FC7xioXaxH29.yUOugSumozi.l6glS3gaq13/gp3Eq2MSBKCtZ2','Administrador','vistas/img/usuarios/default/anonymous.png',1,'2024-03-14 15:32:11','2024-03-14 14:31:59'),(19,'Yamir','yam','$2y$10$ya0T6HwHLk./nBunCSu1wOCzo/GTJjL6cFXOGs/2oEJCQLZb7Xfgu','Vendedor','vistas/img/usuarios/yam/479.png',1,'2024-03-16 16:22:44','2024-03-16 15:18:44'),(20,'Jose','jose','$2y$10$v2bt3HxKk2XCUn8Oa8a8uOH9mdIS2yM/N4VchNEBEvcEaw2gRgOfC','Administrador','vistas/img/usuarios/default/anonymous.png',1,'2024-03-27 16:06:21','2024-03-27 15:05:55');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` int DEFAULT NULL,
  `id_cliente` int DEFAULT NULL,
  `id_vendedor` int DEFAULT NULL,
  `productos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `impuesto` float DEFAULT NULL,
  `neto` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `metodo_pago` varchar(100) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (19,10001,8,14,'[{\"id\":\"31\",\"descripcion\":\"asdasd\",\"cantidad\":\"1\",\"stock\":\"114\",\"precio\":\"17.5\",\"total\":\"17.5\"},{\"id\":\"32\",\"descripcion\":\"asdasdasd\",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"2.5\",\"total\":\"2.5\"},{\"id\":\"33\",\"descripcion\":\"asdasd\",\"cantidad\":\"1\",\"stock\":\"14\",\"precio\":\"17.5\",\"total\":\"17.5\"}]',3.75,37.5,41.25,'Efectivo','2023-03-13 19:44:33'),(20,10002,8,14,'[{\"id\":\"31\",\"descripcion\":\"asdasd\",\"cantidad\":\"1\",\"stock\":\"113\",\"precio\":\"17.5\",\"total\":\"17.5\"},{\"id\":\"32\",\"descripcion\":\"asdasdasd\",\"cantidad\":\"1\",\"stock\":\"8\",\"precio\":\"2.5\",\"total\":\"2.5\"}]',3.4,20,23.4,'Efectivo','2024-03-13 20:16:05'),(21,10003,8,14,'[{\"id\":\"36\",\"descripcion\":\"78978\",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"2\",\"total\":\"2\"}]',0.02,2,2.02,'Efectivo','2024-03-13 21:02:54'),(22,10004,8,18,'[{\"id\":\"38\",\"descripcion\":\"123\",\"cantidad\":\"15\",\"stock\":\"0\",\"precio\":\"28\",\"total\":\"420\"}]',42,420,462,'Efectivo','2024-03-14 20:33:56'),(23,10005,6,14,'[{\"id\":\"37\",\"descripcion\":\"mdjbdfs\",\"cantidad\":\"1\",\"stock\":\"14\",\"precio\":\"14.5\",\"total\":\"14.5\"}]',1.5,14.5,16,'Efectivo','2024-03-16 09:08:53');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-27 15:10:27
