CREATE DATABASE  IF NOT EXISTS `foodrate` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `foodrate`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: foodrate
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
-- Table structure for table `administradores`
--

DROP TABLE IF EXISTS `administradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administradores` (
  `id_administradores` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`id_administradores`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administradores`
--

LOCK TABLES `administradores` WRITE;
/*!40000 ALTER TABLE `administradores` DISABLE KEYS */;
/*!40000 ALTER TABLE `administradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banco_comentario`
--

DROP TABLE IF EXISTS `banco_comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banco_comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(2000) NOT NULL,
  `nota` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `id_restaurantes` int(11) NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_usuarios` (`id_usuarios`),
  KEY `id_restaurantes` (`id_restaurantes`),
  CONSTRAINT `banco_comentario_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`),
  CONSTRAINT `banco_comentario_ibfk_2` FOREIGN KEY (`id_restaurantes`) REFERENCES `restaurantes` (`id_restaurantes`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`nota` >= 0 and `nota` <= 5)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banco_comentario`
--

LOCK TABLES `banco_comentario` WRITE;
/*!40000 ALTER TABLE `banco_comentario` DISABLE KEYS */;
INSERT INTO `banco_comentario` VALUES (1,'A comida estava excelente, especialmente os sushis. Recomendo muito!',5,1,1),(2,'O café estava ótimo, mas o serviço foi um pouco lento.',3,1,2),(3,'Os hambúrgueres são bons, mas poderiam ser mais suculentos.',4,1,3),(4,'Sorvetes com sabores variados e deliciosos. Adorei!',5,2,4),(5,'A pizza estava boa, mas demorou muito para chegar.',3,2,5),(6,'Cookies deliciosos, mas o ambiente poderia ser mais aconchegante.',4,2,6),(7,'Ótimo sushi e atendimento rápido. Voltarei com certeza!',5,3,7),(8,'Café bom, mas os preços são um pouco altos.',3,3,8),(9,'Hambúrguer delicioso e bem servido. Ambiente agradável.',5,3,9),(10,'Sorvetes de alta qualidade e sabores únicos.',5,4,10),(11,'Pizza bem feita, mas o atendimento foi mediano.',3,4,11),(12,'Cookies crocantes e saborosos. Perfeitos para acompanhar o café.',5,4,12),(13,'Adorei a variedade de pratos orientais. Tudo muito bem feito.',5,5,13),(14,'O café estava bom, mas o ambiente era muito barulhento.',2,5,14),(15,'Hambúrgueres deliciosos, mas o atendimento deixou a desejar.',4,5,15),(16,'Sorvetes muito bons, mas poderiam ser mais cremosos.',4,6,16),(17,'Pizza excelente com ingredientes frescos.',5,6,17),(18,'Cookies deliciosos, mas o atendimento foi um pouco lento.',3,6,18),(19,'Sushi muito bom e ambiente agradável.',5,7,1),(20,'Café de boa qualidade, mas o serviço foi lento.',3,7,2),(21,'Os hambúrgueres estavam deliciosos. Recomendo a todos.',5,7,3),(22,'Sorvetes refrescantes e sabores únicos. Muito bom!',4,8,4),(23,'Pizza saborosa, mas o serviço poderia ser mais rápido.',3,8,5),(24,'Cookies gostosos, mas o local estava cheio.',4,8,6),(25,'Sushi delicioso e atendimento excelente.',5,9,7),(26,'Bom café, mas os preços são um pouco altos.',3,9,8),(27,'Hambúrguer de excelente qualidade e bem servido.',5,9,9),(28,'Sorvetes artesanais com sabores incríveis. Adorei!',5,10,10),(29,'A pizza estava ótima, mas demorou um pouco para chegar.',4,10,11),(30,'Cookies crocantes e saborosos. Vou voltar!',5,10,12),(31,'Ótimo lugar para comida oriental. Pratos deliciosos.',5,11,13),(32,'Café bom, mas atendimento lento.',3,11,14),(33,'Hambúrguer delicioso, mas o ambiente poderia ser melhor.',4,11,15),(34,'Sorvetes muito bons, mas preços um pouco altos.',4,12,16),(35,'Pizza maravilhosa com ingredientes frescos.',5,12,17),(36,'Cookies saborosos, mas o serviço foi um pouco lento.',3,12,18),(37,'Sushi muito bom e atendimento rápido. Recomendo!',5,13,1),(38,'Café de boa qualidade, mas ambiente barulhento.',2,13,2),(39,'Hambúrguer excelente e bem servido. Voltarei com certeza.',5,13,3),(40,'Sorvetes deliciosos e variados. Muito bom!',4,14,4),(41,'A pizza estava boa, mas o atendimento poderia ser melhor.',3,14,5),(42,'Cookies deliciosos, mas o local estava cheio.',4,14,6),(43,'Sushi de excelente qualidade e ambiente agradável.',5,15,7),(44,'Café bom, mas os preços são um pouco altos.',3,15,8),(45,'Hambúrgueres deliciosos, mas o serviço foi mediano.',4,15,9),(46,'Sorvetes artesanais e sabores únicos. Adorei!',5,16,10),(47,'Pizza deliciosa com ingredientes frescos.',4,16,11),(48,'Cookies muito bons, mas o atendimento foi lento.',3,16,12),(49,'Ótimos pratos orientais e bom atendimento.',5,17,13),(50,'Café bom, mas o ambiente poderia ser mais agradável.',3,17,14),(51,'Hambúrguer excelente e bem servido. Recomendo!',5,17,15),(52,'Sorvetes deliciosos e refrescantes. Muito bom!',4,18,16),(53,'Pizza maravilhosa, mas atendimento lento.',3,18,17),(54,'Cookies crocantes e saborosos. Vou voltar!',5,18,18);
/*!40000 ALTER TABLE `banco_comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_rate`
--

DROP TABLE IF EXISTS `food_rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `food_rate` (
  `nome` varchar(80) NOT NULL,
  `cnpj` varchar(25) NOT NULL,
  `id_administradores` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_restaurantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`cnpj`),
  KEY `id_administradores` (`id_administradores`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_restaurantes` (`id_restaurantes`),
  CONSTRAINT `food_rate_ibfk_1` FOREIGN KEY (`id_administradores`) REFERENCES `administradores` (`id_administradores`),
  CONSTRAINT `food_rate_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuarios`),
  CONSTRAINT `food_rate_ibfk_3` FOREIGN KEY (`id_restaurantes`) REFERENCES `restaurantes` (`id_restaurantes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_rate`
--

LOCK TABLES `food_rate` WRITE;
/*!40000 ALTER TABLE `food_rate` DISABLE KEYS */;
/*!40000 ALTER TABLE `food_rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurantes`
--

DROP TABLE IF EXISTS `restaurantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurantes` (
  `id_restaurantes` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `rede_social` varchar(80) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `categorias` varchar(30) NOT NULL,
  PRIMARY KEY (`id_restaurantes`),
  UNIQUE KEY `rede_social` (`rede_social`),
  UNIQUE KEY `endereco` (`endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurantes`
--

LOCK TABLES `restaurantes` WRITE;
/*!40000 ALTER TABLE `restaurantes` DISABLE KEYS */;
INSERT INTO `restaurantes` VALUES (1,'Sushi Recife','08112345678','@sushirecife','Rua dos Navegantes, 123, Recife','oriental'),(2,'Café Recife','08187654321','@caferecife','Av. Boa Viagem, 456, Recife','café'),(3,'Burger Recife','08123456789','@burgerrecife','Rua da Aurora, 789, Recife','hamburguer'),(4,'Sorveteria Recife','08198765432','@sorveteriarecife','Rua do Sol, 101, Recife','sorvetes'),(5,'Pizzaria Recife','08134567890','@pizzariarecife','Av. Agamenon Magalhães, 202, Recife','pizza'),(6,'Cookies Recife','08145678901','@cookiesrecife','Rua da Imperatriz, 303, Recife','cookies'),(7,'Temaki House','08156789012','@temakihouse','Rua da Moeda, 404, Recife','oriental'),(8,'Coffee Time','08167890123','@coffeetime','Rua do Bom Jesus, 505, Recife','café'),(9,'Recife Burgers','08178901234','@recifeburgers','Av. Conde da Boa Vista, 606, Recife','hamburguer'),(10,'Gelato Recife','08189012345','@gelatorecife','Rua Mamede Simões, 707, Recife','sorvetes'),(11,'Pizza Prime','08190123456','@pizzaprime','Rua Real da Torre, 808, Recife','pizza'),(12,'Cookie Delight','08101234567','@cookiedelight','Rua das Creoulas, 909, Recife','cookies'),(13,'Japão Recife','08122334455','@japaorecife','Av. Norte, 111, Recife','oriental'),(14,'Café Central','08133445566','@cafecentral','Rua do Futuro, 222, Recife','café'),(15,'Hamburgueria Recife','08144556677','@hamburgueriarecife','Rua da Hora, 333, Recife','hamburguer'),(16,'Ice Cream Recife','08155667788','@icecreamrecife','Rua Desembargador Martins Pereira, 444, Recife','sorvetes'),(17,'Pizza Top','08166778899','@pizzatop','Rua Barão de Souza Leão, 555, Recife','pizza'),(18,'Cookie House','08177889900','@cookiehouse','Rua Dr. José Mariano, 666, Recife','cookies'),(19,'China Restaurante','08133775566','@chinarest','Rua dos Navegantes, 2040, Recife','oriental'),(20,'Chapa Burgueria','08134541213','@chapaburguer','Avenida Caxangá, 575, Recife','hamburguer'),(21,'Forno Mágico Pizzaria','08134475964','@pizzafornomagico','Avenida Caxangá, 211, Recife','Pizza');
/*!40000 ALTER TABLE `restaurantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `nick_name` varchar(35) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usuarios`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Bruno Cavalcanti','brunocavalcanti','bruno@gmail.com','1234567'),(2,'Bruno Pereira','bruno_p','bruno.pereira@example.com','senha123'),(3,'Carla Souza','carla_s','carla.souza@example.com','senha123'),(4,'Daniel Oliveira','daniel_o','daniel.oliveira@example.com','senha123'),(5,'Eduardo Lima','edu_l','eduardo.lima@example.com','senha123'),(6,'Fernanda Costa','fernanda_c','fernanda.costa@example.com','senha123'),(7,'Gustavo Santos','gustavo_s','gustavo.santos@example.com','senha123'),(8,'Helena Almeida','helena_a','helena.almeida@example.com','senha123'),(9,'Igor Ferreira','igor_f','igor.ferreira@example.com','senha123'),(10,'Juliana Rocha','juliana_r','juliana.rocha@example.com','senha123'),(11,'Kleber Martins','kleber_m','kleber.martins@example.com','senha123'),(12,'Larissa Mendes','larissa_m','larissa.mendes@example.com','senha123'),(13,'Marcos Ribeiro','marcos_r','marcos.ribeiro@example.com','senha123'),(14,'Natalia Nunes','natalia_n','natalia.nunes@example.com','senha123'),(15,'Otávio Carvalho','otavio_c','otavio.carvalho@example.com','senha123'),(16,'Patrícia Duarte','patricia_d','patricia.duarte@example.com','senha123'),(17,'Roberto Azevedo','roberto_a','roberto.azevedo@example.com','senha123'),(18,'Simone Barbosa','simone_b','simone.barbosa@example.com','senha123'),(19,'Jean Lima','jean','jean@gmail.com','1234567'),(21,'João da Silva','joaozinho','joao@gmail.com','$2y$10$55jqG79OY8SlOBeordpo9OtbQh2l7046DDHvkaOPA1rn54KOktLk6'),(22,'teste teste','teste01','teste@gmail.com','$2y$10$kvNDKihX7RAEY1YAXPpAeeEMzhen2SO4vwjrSij9Kx71wgb6R/p5S'),(23,'Novo Teste','NewTest','newtest@gmail.com','$2y$10$Ncg3GM3sKOFBQFCLOBI3Bes4Q4w3daEGAUqmyBlTSaOX1dzMH.l0G'),(24,'Bruno Roberto','bruno_rob','bruno@hotmail.com','$2y$10$gGFP0eeji2lOsqxdqMSrDOZa.GD1LHxcm3Y/ovjUqEuUZdvvcwtEi'),(25,'Teste da Silva','teste001','teste@teste.com','$2y$10$pxvDpwsNDCwwdThJWR.vu.tnN5J061ZVzGZhREYXhrgN5NzuZ5WtW');
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

-- Dump completed on 2024-06-06 18:19:43
