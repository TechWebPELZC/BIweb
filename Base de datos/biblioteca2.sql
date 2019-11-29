-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: biblioteca2
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `b_autor`
--

DROP TABLE IF EXISTS `b_autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_autor` (
  `ID_Autor` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Autor` varchar(25) COLLATE latin1_spanish_ci DEFAULT NULL,
  `AP_Autor` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `AM_Autor` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Nacionalidad` varchar(25) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Autor`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_autor`
--

LOCK TABLES `b_autor` WRITE;
/*!40000 ALTER TABLE `b_autor` DISABLE KEYS */;
INSERT INTO `b_autor` VALUES (1,'Regina','O.','Obe',NULL),(2,'Kip','R.','Irvine','Estadounidense'),(3,'Paul','E. ','Tippens',NULL),(4,'Dennis','G.','Zill',NULL),(5,'Ronald ','E.','Walpole',NULL),(6,'Kenneth','E.','Kendall','Estadounidense'),(7,'Jose Enrique','Amaro','Soriano','EspaÃ±ol');
/*!40000 ALTER TABLE `b_autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_book`
--

DROP TABLE IF EXISTS `b_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_book` (
  `ID_Libro` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Categoria` int(11) NOT NULL,
  `ID_Pais` int(11) NOT NULL,
  `Titulo_Libro` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ISBN` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Fecha_Edicion` int(4) DEFAULT NULL,
  `Lugar_Edicion` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Edicion` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `NumPag_libro` int(5) DEFAULT NULL,
  `Portada` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Link_book` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_Libro`),
  KEY `ID_Pais` (`ID_Pais`),
  KEY `ID_Categoria` (`ID_Categoria`),
  KEY `ID_Libro` (`ID_Libro`),
  CONSTRAINT `b_book_ibfk_1` FOREIGN KEY (`ID_Pais`) REFERENCES `pais_book` (`ID_Pais`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `b_book_ibfk_2` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria_book` (`ID_Categoria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_book`
--

LOCK TABLES `b_book` WRITE;
/*!40000 ALTER TABLE `b_book` DISABLE KEYS */;
INSERT INTO `b_book` VALUES (1,4,1,'PostGIS In Action','9781617291395',2015,'NY','Segunda',602,'Imagenes/PostGis.png','https://drive.google.com/file/d/1jVWwxZwB8kc9iIJbIA85IAv6fk9DKcLu/view?usp=sharing','2019-10-12 12:00:00'),(2,3,2,'Lenguaje ensamblador para computadoras basadas en Intel','9789702610816',2008,'CDMX','Quinta',752,'Imagenes/Ensamblador.jpg','https://drive.google.com/file/d/1RiwhFVH3GYIt6ndXW8RRrkL6StG4Q0UC/view?usp=sharing','2019-10-13 12:00:00'),(3,8,6,'Fisica conceptos y aplicaciones','9786071504715',2011,'Peru','Septima',828,'Imagenes/fisica-conceptos.jpg','https://drive.google.com/file/d/1CzqiLx9XUZVRLXd1MS1cyik2JNA3HYVN/view?usp=sharing','2019-10-14 13:00:00'),(4,9,2,'Matematicas III Calculo de varias variables','9786071505361',2011,'CDMX','Primera',333,'Imagenes/matematicas_3.jpg','https://drive.google.com/file/d/1QoDcUIppA-vv8ZFMN3BwPjjgkHC4ffu8/view?usp=sharing','2019-10-15 14:00:00'),(5,4,1,'PostgreSQL Up and Running','9781449373191',2014,'Sebastopol','Segunda',231,'Imagenes/postgresql.jpg','https://drive.google.com/file/d/1k3Cw2v--tVgILqs2SIxcE23bXtisGBST/view?usp=sharing','2019-10-20 14:00:00'),(6,9,2,'Ecuaciones diferenciales con aplicaciones de modelado','9786074813135',2009,'CDMX','Novena',431,'Imagenes/ecuaciones-diferenciales.jpg','https://drive.google.com/file/d/1pJLRwmAjHXBazW07JNAI1XoHgFF9l9aE/view?usp=sharing','2019-10-25 14:00:00'),(7,2,2,'Probabilidad y estadistica para ingenieria y ciencias ','9786073214179',2012,'CDMX','Novena',815,'Imagenes/probabilidad-y-estadistica.jpg','https://drive.google.com/file/d/10Z-NBpC9OCcsBdfifAbZMVeqefy_nx-k/view?usp=sharing','2019-10-26 14:00:00'),(9,3,2,'Analisis y dise&ntildeo de sistemas','9786073205771',2011,'CDMX','Octava',600,'Imagenes/analisis.jpg','https://drive.google.com/file/d/1mxPbOvRFggJmBsvRSLUSb4U8s83WBeI8/view?usp=sharing','2019-11-05 14:00:00'),(10,3,2,'El gran libro de programacion avanzada con Android','9786077075516',2012,'Mexico, D.','Primera',400,'Imagenes/programacion-avanzada.png','https://drive.google.com/open?id=1msasccR7n0jF0SYVCnJntnZWTgYOG-EY','2019-11-15 14:00:00');
/*!40000 ALTER TABLE `b_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_empresa`
--

DROP TABLE IF EXISTS `b_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_empresa` (
  `ID_Empresa` int(11) NOT NULL AUTO_INCREMENT,
  `Logo` longblob,
  `Nom_Empresa` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_empresa`
--

LOCK TABLES `b_empresa` WRITE;
/*!40000 ALTER TABLE `b_empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `b_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_perfil`
--

DROP TABLE IF EXISTS `b_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_perfil` (
  `ID_Perfil` int(11) NOT NULL AUTO_INCREMENT,
  `ID_User` int(11) NOT NULL,
  `Us_preferencia` char(1) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Tipo_User` char(1) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Perfil`),
  KEY `ID_User` (`ID_User`),
  CONSTRAINT `b_perfil_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `b_users` (`ID_User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_perfil`
--

LOCK TABLES `b_perfil` WRITE;
/*!40000 ALTER TABLE `b_perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `b_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_topvistas`
--

DROP TABLE IF EXISTS `b_topvistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_topvistas` (
  `ID_Top` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Libro` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `No_vistas` int(11) NOT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_Top`),
  KEY `ID_Libro` (`ID_Libro`),
  KEY `ID_User` (`ID_User`),
  CONSTRAINT `fk_Libro` FOREIGN KEY (`ID_Libro`) REFERENCES `b_book` (`ID_Libro`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_User` FOREIGN KEY (`ID_User`) REFERENCES `b_users` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_topvistas`
--

LOCK TABLES `b_topvistas` WRITE;
/*!40000 ALTER TABLE `b_topvistas` DISABLE KEYS */;
INSERT INTO `b_topvistas` VALUES (6,1,13,14,'2019-10-23 03:38:36'),(7,1,11,1,'2019-10-22 14:35:20'),(8,2,3,1,'2019-10-22 14:40:28'),(9,3,13,3,'2019-11-06 03:08:19'),(10,9,13,3,'2019-10-24 02:49:38'),(11,7,13,1,'2019-10-23 05:22:31'),(12,2,13,8,'2019-11-14 11:29:22'),(13,4,13,1,'2019-10-23 02:32:51'),(21,6,13,1,'2019-10-24 02:25:51'),(22,10,13,1,'2019-11-04 04:57:59');
/*!40000 ALTER TABLE `b_topvistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_users`
--

DROP TABLE IF EXISTS `b_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_users` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `AP_User` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `AM_User` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Nom_User` varchar(25) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Us_User` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Email` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `F_nacimiento` date DEFAULT NULL,
  `Sexo` char(1) COLLATE latin1_spanish_ci DEFAULT NULL,
  `contrab_users` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Actividad` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `TipoUsuario` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_User`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_users`
--

LOCK TABLES `b_users` WRITE;
/*!40000 ALTER TABLE `b_users` DISABLE KEYS */;
INSERT INTO `b_users` VALUES (1,'Preciado','Naranjo','Edgar','admin','edgar@hotmail.com','1997-10-25','M','1234','Alumno','Admin','2019-11-26 09:13:13'),(2,'Escamilla','Tellez','Jovany','admin2','jova@hotmail.com','1997-06-07','M','Pro7913+','Alumno','Admin',NULL),(3,'Meza','Ortiz ','Sergio','moSergi','meza@hotmail.com','1997-12-31','M','LoLx753','Alumno','Admin','2019-10-22 02:39:49'),(4,'Salinas','Rosales','Nestor','next78','ness@gmail.com','1997-03-12','M','ReAd$852','Alumno','Usuario',NULL),(5,'Roman','Ocampo','Daniel Benito','Beni98','beni@hotmail.com','1889-03-15','M','BoXAm756','Profesor','Usuario',NULL),(11,'Juarez','Lopez','Maria','Maria12','mari@gmail.com','1996-07-10','F','password','Alumno','Usuario','2019-10-22 02:34:25'),(12,'Gonzalez','Quarta','Maria Conchita Alonso','Lamari','lamarinice@gmail.com','1985-02-10','F','Hola12345','Profesor','Baneado','2019-11-07 12:13:24'),(13,'Perez','Martinez','Daniel','Dany12','dany@gmail.com','1996-11-07','M','gatito123','Alumno','Usuario','2019-11-26 09:13:00'),(14,'Almiron','Gallardo','Luis','luisilloelpillo12','luisillo@gmail.com','1998-12-01','M','luis123','Alumno','Usuario',NULL),(15,'Garcia','Morales','Susana','2345','irrabmalairam@gmail.com','2019-10-28','F','12345678','Profesor','Usuario',NULL),(16,'Hernandez','Martinez','Paolo','pao12','pao12@gmail.com','1996-09-06','M','Cosabonita_12','Alumno','Usuario','2019-11-05 05:08:04'),(17,'Perez','Lambarri','Rogelia','roge14','irrabmalairam@gmail.com','1997-12-07','F','Algunacosa_12','Alumno','Usuario',NULL),(18,'Martinez','Lambarri','Leonel','mar','irrabmalairam@gmail.com','1997-12-07','M','Maria1L','Alumno','Usuario','2019-11-14 03:52:36'),(19,'Martinez','Lopez','Rodrigo','leo12','beni@hotmail.com','1994-05-04','M','Holasoyjuan12','Alumno','Usuario',NULL);
/*!40000 ALTER TABLE `b_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_autorbook`
--

DROP TABLE IF EXISTS `bk_autorbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_autorbook` (
  `ID_Autor` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Libro` int(11) NOT NULL,
  KEY `ID_Autor` (`ID_Autor`),
  KEY `ID_Libro` (`ID_Libro`),
  CONSTRAINT `bk_autorbook_ibfk_1` FOREIGN KEY (`ID_Autor`) REFERENCES `b_autor` (`ID_Autor`) ON DELETE CASCADE,
  CONSTRAINT `bk_autorbook_ibfk_2` FOREIGN KEY (`ID_Libro`) REFERENCES `b_book` (`ID_Libro`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_autorbook`
--

LOCK TABLES `bk_autorbook` WRITE;
/*!40000 ALTER TABLE `bk_autorbook` DISABLE KEYS */;
INSERT INTO `bk_autorbook` VALUES (1,1),(2,2),(3,3),(4,4),(1,5),(4,6),(5,7),(6,9),(7,10);
/*!40000 ALTER TABLE `bk_autorbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_caractbook`
--

DROP TABLE IF EXISTS `bk_caractbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_caractbook` (
  `ID_Caract` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Libro` int(11) NOT NULL,
  KEY `ID_Caract` (`ID_Caract`),
  KEY `ID_Libro` (`ID_Libro`),
  CONSTRAINT `bk_caractbook_ibfk_1` FOREIGN KEY (`ID_Caract`) REFERENCES `caract_book` (`ID_Caract`) ON DELETE CASCADE,
  CONSTRAINT `bk_caractbook_ibfk_2` FOREIGN KEY (`ID_Libro`) REFERENCES `b_book` (`ID_Libro`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_caractbook`
--

LOCK TABLES `bk_caractbook` WRITE;
/*!40000 ALTER TABLE `bk_caractbook` DISABLE KEYS */;
INSERT INTO `bk_caractbook` VALUES (1,1),(3,3),(4,4),(5,5),(6,6),(7,7),(8,9),(9,10),(2,2);
/*!40000 ALTER TABLE `bk_caractbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_edibook`
--

DROP TABLE IF EXISTS `bk_edibook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_edibook` (
  `ID_Editorial` int(11) NOT NULL,
  `ID_Libro` int(11) NOT NULL AUTO_INCREMENT,
  KEY `ID_Editorial` (`ID_Editorial`),
  KEY `ID_Libro` (`ID_Libro`),
  CONSTRAINT `bk_edibook_ibfk_1` FOREIGN KEY (`ID_Editorial`) REFERENCES `editorial_book` (`ID_Editorial`) ON DELETE CASCADE,
  CONSTRAINT `bk_edibook_ibfk_2` FOREIGN KEY (`ID_Libro`) REFERENCES `b_book` (`ID_Libro`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_edibook`
--

LOCK TABLES `bk_edibook` WRITE;
/*!40000 ALTER TABLE `bk_edibook` DISABLE KEYS */;
INSERT INTO `bk_edibook` VALUES (1,1),(2,2),(3,3),(3,4),(4,5),(5,6),(2,7),(2,9),(6,10);
/*!40000 ALTER TABLE `bk_edibook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_idiobook`
--

DROP TABLE IF EXISTS `bk_idiobook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_idiobook` (
  `ID_Idioma` int(11) NOT NULL,
  `ID_Libro` int(11) NOT NULL AUTO_INCREMENT,
  KEY `ID_Idioma` (`ID_Idioma`),
  KEY `ID_Libro` (`ID_Libro`),
  CONSTRAINT `bk_idiobook_ibfk_1` FOREIGN KEY (`ID_Idioma`) REFERENCES `idioma_book` (`ID_Idioma`) ON DELETE CASCADE,
  CONSTRAINT `bk_idiobook_ibfk_2` FOREIGN KEY (`ID_Libro`) REFERENCES `b_book` (`ID_Libro`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_idiobook`
--

LOCK TABLES `bk_idiobook` WRITE;
/*!40000 ALTER TABLE `bk_idiobook` DISABLE KEYS */;
INSERT INTO `bk_idiobook` VALUES (2,1),(1,2),(1,3),(1,4),(2,5),(1,6),(1,7),(1,9),(1,10);
/*!40000 ALTER TABLE `bk_idiobook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_matebook`
--

DROP TABLE IF EXISTS `bk_matebook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_matebook` (
  `ID_Materia` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Libro` int(11) NOT NULL,
  KEY `ID_Materia` (`ID_Materia`),
  KEY `ID_Libro` (`ID_Libro`),
  CONSTRAINT `bk_matebook_ibfk_1` FOREIGN KEY (`ID_Materia`) REFERENCES `materia_book` (`ID_Materia`) ON DELETE CASCADE,
  CONSTRAINT `bk_matebook_ibfk_2` FOREIGN KEY (`ID_Libro`) REFERENCES `b_book` (`ID_Libro`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_matebook`
--

LOCK TABLES `bk_matebook` WRITE;
/*!40000 ALTER TABLE `bk_matebook` DISABLE KEYS */;
/*!40000 ALTER TABLE `bk_matebook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_puntbook`
--

DROP TABLE IF EXISTS `bk_puntbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_puntbook` (
  `ID_Puntuacion` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Libro` int(11) NOT NULL,
  KEY `ID_Puntuacion` (`ID_Puntuacion`),
  KEY `ID_Libro` (`ID_Libro`),
  CONSTRAINT `bk_puntbook_ibfk_1` FOREIGN KEY (`ID_Puntuacion`) REFERENCES `puntuacion_book` (`ID_Puntuacion`) ON DELETE CASCADE,
  CONSTRAINT `bk_puntbook_ibfk_2` FOREIGN KEY (`ID_Libro`) REFERENCES `b_book` (`ID_Libro`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_puntbook`
--

LOCK TABLES `bk_puntbook` WRITE;
/*!40000 ALTER TABLE `bk_puntbook` DISABLE KEYS */;
/*!40000 ALTER TABLE `bk_puntbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bk_userbook`
--

DROP TABLE IF EXISTS `bk_userbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bk_userbook` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Libro` int(11) NOT NULL,
  KEY `ID_User` (`ID_User`),
  KEY `ID_Libro` (`ID_Libro`),
  CONSTRAINT `bk_userbook_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `b_users` (`ID_User`) ON DELETE CASCADE,
  CONSTRAINT `bk_userbook_ibfk_2` FOREIGN KEY (`ID_Libro`) REFERENCES `b_book` (`ID_Libro`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bk_userbook`
--

LOCK TABLES `bk_userbook` WRITE;
/*!40000 ALTER TABLE `bk_userbook` DISABLE KEYS */;
/*!40000 ALTER TABLE `bk_userbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caract_book`
--

DROP TABLE IF EXISTS `caract_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caract_book` (
  `ID_Caract` int(11) NOT NULL AUTO_INCREMENT,
  `Sinopsis` varchar(500) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `Tabla_Conte` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Caract`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caract_book`
--

LOCK TABLES `caract_book` WRITE;
/*!40000 ALTER TABLE `caract_book` DISABLE KEYS */;
INSERT INTO `caract_book` VALUES (1,'PostGIS in Action es el primer libro dedicado integramente a PostGIS. Ayudara a los usuarios nuevos y experimentados a escribir consultas espaciales para resolver problemas del mundo real. Para aquellos con experiencia en bases de datos relacionales mas tradicionales, este libro proporciona una base en SIG basado en vectores para que pueda pasar rapidamente al analisis, visualizacion y asignacion de datos.',NULL),(2,'Este libro contiene lo esencial para conocer los fundamentos base del lenguaje ensamblador, se tocan interesantes temas sobre este interesante y cautivante lenguaje. Cabe aclarar que no es fundamental saber programar en lenguaje ensamblador, para poder saber ingenieria inversa (en cuanto a ejecutables), aun asi es una excelente herramienta que nos facilitara el aprendizaje y el logro de metas mas dificiles que nos propongamos.',NULL),(3,'Su contenido abarca todo el espectro de la fisica: mecanica, fisica termica, movimiento ondulatorio, sonido, electricidad, luz y optica, y fisica atomica y nuclear. El enfasis en las aplicaciones y esta sucesion normal de temas se adecua a las necesidades de la educacion media superior e introductoria a niveles superiores.',NULL),(4,'Matemáticas 3. Calculo de varias variable forma parte de una coleccion elaborada especialmente para atender la currícula de un curso del calculo multivariable de las instituciones de nivel superior. Sin duda, este libro constituye una gran aportación a la enseñanza- aprendizaje del calculo multivariable por su estilo claro y sencillo, sin perder la formalidad aun en los temas más abstractos.',NULL),(5,'Si esta pensando en migrar al sistema de base de datos de codigo abierto PostgreSQL, esta guia brinda una descripcion general concisa que lo ayudara a comprender y usar rapidamente las caracteristicas unicas de PostgreSQL. No solo aprendera sobre las caracteristicas de la clase empresarial en la version 9.2, tambien descubrira que PostgreSQL es mas que solo un sistema de base de datos, tambien es una plataforma de aplicaciones impresionante.',NULL),(6,'Este texto probado y accesible apoya a los estudiantes de ingenieria y de matematicas que comienzan al proporcionar una abundancia de ayudas pedagogicas, incluyendo una variedad de ejemplos, explicaciones, recuadros de \"observaciones\", definiciones y proyectos de grupo. Usando un estilo directo, legible y provechoso, este libro proporciona un tratamiento exhaustivo de los problemas con aplicaciones de modelado.',NULL),(7,'Con la finalidad de motivar al estudiante muchos ejercicios se refieren a aplicaciones cientificas y de ingenieria en la vida real. Para lograr que los estudiantes adquieran experiencia en la lectura e interpretacion de listas de resultados y graficas por computadora los estudios de caso muestran impresiones de listas de resultados por computadora y material grafico generado con los programas SAS y MINITAB.',NULL),(8,'Este libro contiene informacion diversa para el analisis de sistemas, la creacion de requisitos  y los fundamentos del diseÃ±o de uno.',NULL),(9,'El material contenido en esta obra se plantea como una colecciÃ³n de ejemplos escritos expresamente para ilustrar alguna tÃ©cnica particular de Android. Los ejemplos son programas completos, pero breves, que permitirÃ¡n al lector minimizar las dificultades que puedan surgir para comprender la materia.',NULL);
/*!40000 ALTER TABLE `caract_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_book`
--

DROP TABLE IF EXISTS `categoria_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_book` (
  `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Categoria` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_book`
--

LOCK TABLES `categoria_book` WRITE;
/*!40000 ALTER TABLE `categoria_book` DISABLE KEYS */;
INSERT INTO `categoria_book` VALUES (1,'Estadistica'),(2,'Probabilidad'),(3,'Programacion'),(4,'Base de datos'),(5,'Quimica'),(6,'Contabilidad'),(7,'Electronica'),(8,'Fisica'),(9,'Matematicas');
/*!40000 ALTER TABLE `categoria_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta_book`
--

DROP TABLE IF EXISTS `consulta_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta_book` (
  `ID_Consulta` int(11) NOT NULL AUTO_INCREMENT,
  `ID_User` int(11) NOT NULL,
  `ID_Libro` int(11) NOT NULL,
  `ID_Empresa` int(11) NOT NULL,
  `Fecha_Consulta` date DEFAULT NULL,
  `Hora_Inicio` int(11) DEFAULT NULL,
  `Hora_Fin` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Consulta`),
  KEY `ID_User` (`ID_User`),
  KEY `ID_Libro` (`ID_Libro`),
  KEY `ID_Empresa` (`ID_Empresa`),
  CONSTRAINT `consulta_book_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `b_users` (`ID_User`),
  CONSTRAINT `consulta_book_ibfk_2` FOREIGN KEY (`ID_Libro`) REFERENCES `b_book` (`ID_Libro`),
  CONSTRAINT `consulta_book_ibfk_3` FOREIGN KEY (`ID_Empresa`) REFERENCES `b_empresa` (`ID_Empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta_book`
--

LOCK TABLES `consulta_book` WRITE;
/*!40000 ALTER TABLE `consulta_book` DISABLE KEYS */;
/*!40000 ALTER TABLE `consulta_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccion_user`
--

DROP TABLE IF EXISTS `direccion_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direccion_user` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `Colonia` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Calle` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `NumInterior` int(5) DEFAULT NULL,
  `NumExterior` int(5) DEFAULT NULL,
  `Ciudad` varchar(25) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Estado` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `CodigoPostal` int(5) DEFAULT NULL,
  KEY `ID_User` (`ID_User`),
  CONSTRAINT `direccion_user_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `b_users` (`ID_User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion_user`
--

LOCK TABLES `direccion_user` WRITE;
/*!40000 ALTER TABLE `direccion_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccion_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editorial_book`
--

DROP TABLE IF EXISTS `editorial_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editorial_book` (
  `ID_Editorial` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Editorial` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Editorial`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editorial_book`
--

LOCK TABLES `editorial_book` WRITE;
/*!40000 ALTER TABLE `editorial_book` DISABLE KEYS */;
INSERT INTO `editorial_book` VALUES (1,'Manning Publications co.'),(2,'Pearson Education'),(3,'Mcgraw Hill'),(4,'O\'Reilly'),(5,'Cengage Learning'),(6,'Alfaomega');
/*!40000 ALTER TABLE `editorial_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idioma_book`
--

DROP TABLE IF EXISTS `idioma_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idioma_book` (
  `ID_Idioma` int(11) NOT NULL AUTO_INCREMENT,
  `Idioma` varchar(25) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Idioma`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idioma_book`
--

LOCK TABLES `idioma_book` WRITE;
/*!40000 ALTER TABLE `idioma_book` DISABLE KEYS */;
INSERT INTO `idioma_book` VALUES (1,'Espa&ntildeol'),(2,'Ingles');
/*!40000 ALTER TABLE `idioma_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia_book`
--

DROP TABLE IF EXISTS `materia_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia_book` (
  `ID_Materia` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Mate` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_book`
--

LOCK TABLES `materia_book` WRITE;
/*!40000 ALTER TABLE `materia_book` DISABLE KEYS */;
/*!40000 ALTER TABLE `materia_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais_book`
--

DROP TABLE IF EXISTS `pais_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais_book` (
  `ID_Pais` int(11) NOT NULL AUTO_INCREMENT,
  `Pais` varchar(25) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Pais`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais_book`
--

LOCK TABLES `pais_book` WRITE;
/*!40000 ALTER TABLE `pais_book` DISABLE KEYS */;
INSERT INTO `pais_book` VALUES (1,'Estados unidos'),(2,'Mexico'),(3,'Colombia'),(4,'Chile'),(5,'Argentina'),(6,'Peru'),(7,'Espa&ntildea');
/*!40000 ALTER TABLE `pais_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puntuacion_book`
--

DROP TABLE IF EXISTS `puntuacion_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puntuacion_book` (
  `ID_Puntuacion` int(11) NOT NULL AUTO_INCREMENT,
  `Puntuacion` int(11) DEFAULT NULL,
  `Comentarios` varchar(40) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Puntuacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puntuacion_book`
--

LOCK TABLES `puntuacion_book` WRITE;
/*!40000 ALTER TABLE `puntuacion_book` DISABLE KEYS */;
/*!40000 ALTER TABLE `puntuacion_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefono_user`
--

DROP TABLE IF EXISTS `telefono_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefono_user` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `Lada` int(3) DEFAULT NULL,
  `Numero` int(5) DEFAULT NULL,
  KEY `ID_User` (`ID_User`),
  CONSTRAINT `telefono_user_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `b_users` (`ID_User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefono_user`
--

LOCK TABLES `telefono_user` WRITE;
/*!40000 ALTER TABLE `telefono_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefono_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-26 21:43:55
