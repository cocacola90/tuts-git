-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: cake_dx
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keyword` text COLLATE utf8_unicode_ci,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `menu` int(11) NOT NULL,
  `search` int(11) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attributes`
--

LOCK TABLES `attributes` WRITE;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
INSERT INTO `attributes` VALUES (1,'Hệ điều hành','he-dieu-hanh',NULL,NULL,0,1,1,1,'http://localhost/img/files/images/anh/Btryvy9GZEejdad0wfnWFimechim.jpg'),(2,'2 sim','2-sim',NULL,NULL,0,1,0,1,'http://localhost/img/files/images/anh/10489870_441651832653153_4160596944349121790_n.jpg'),(3,'Pin123','pin123',NULL,NULL,0,1,0,0,'http://localhost/img/files/images/anh/Btryvy9GZEejdad0wfnWFimechim.jpg'),(4,'Camera','camera',NULL,NULL,0,1,1,1,'http://localhost/img/files/images/anh/azLpYPx_700b.jpg'),(5,'Xuất xứ','xuat-xu',NULL,NULL,0,1,0,1,'http://localhost/img/files/images/anh/10489870_441651832653153_4160596944349121790_n.jpg'),(6,'Hãng sản xuất','hang-san-xuat',NULL,NULL,0,1,1,1,'http://localhost/img/files/images/anh/Btryvy9GZEejdad0wfnWFimechim.jpg'),(7,'2 sim','2-sim',NULL,NULL,0,1,0,1,'http://localhost/img/files/images/anh/10489870_441651832653153_4160596944349121790_n.jpg'),(9,'Màn hình','man-hinh',NULL,NULL,0,1,0,1,'http://localhost/img/files/images/anh/Btryvy9GZEejdad0wfnWFimechim.jpg'),(10,'Màu sắc','mau-sac',NULL,NULL,0,1,0,1,''),(12,'Dung lượng','dung-luong',NULL,NULL,0,1,0,1,''),(13,'Giá','gia',NULL,NULL,0,1,0,1,''),(14,'Memory / RAM','memory-ram',NULL,NULL,0,1,0,1,'');
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` longtext COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `type` int(11) DEFAULT '0',
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Điện tử - Âm Thanh','dien-tu-am-thanh','','',NULL,1,2,0,0,1421394581,1428411339),(2,'Điện Lạnh','dien-lanh','','',NULL,3,6,0,0,1421418959,1428411355),(3,'Đồ Gia Dụng','do-gia-dung','','',NULL,7,8,0,0,1421431756,1428411526),(4,'Điện Thoại','dien-thoai','','',NULL,9,10,0,0,1428411391,1428411391),(5,'Kỹ Thuật Số','ky-thuat-so','','',NULL,11,12,0,0,1428411419,1428411419),(6,'Laptop','laptop','','',NULL,13,14,0,0,1428411434,1428411434),(7,'Tablet- Máy Tính Bảng','tablet-may-tinh-bang','','',NULL,15,16,0,0,1428411456,1428411456),(8,'Máy tính - Linh Kiện','may-tinh-linh-kien','','',NULL,17,18,0,0,1428411474,1428411474),(9,'Thiết Bị Văn Phòng','thiet-bi-van-phong','','',NULL,19,20,0,0,1428411489,1428411489),(10,'Tủ lạnh','tu-lanh','','',2,4,5,0,0,1428773049,1428773049);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_attributes`
--

DROP TABLE IF EXISTS `categories_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_attributes` (
  `category_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_attributes`
--

LOCK TABLES `categories_attributes` WRITE;
/*!40000 ALTER TABLE `categories_attributes` DISABLE KEYS */;
INSERT INTO `categories_attributes` VALUES (1,6),(3,6),(1,7),(3,7),(1,9),(3,9),(1,1),(1,2),(1,3),(1,4),(1,5),(1,10),(4,11),(6,11),(7,11),(1,12),(3,12),(4,12),(6,12),(7,12),(8,12),(3,10),(4,10),(1,13),(2,13),(3,13),(4,13),(5,13),(6,13),(7,13),(8,13),(9,13),(10,13),(1,14),(4,14),(6,14),(7,14),(8,14);
/*!40000 ALTER TABLE `categories_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,21,1,'Nguyen','nguyenpq490@gmail.com','good , gia tot',0,1430963243),(2,17,1,'Quangnguyen','nguyenpq490@gmail.com','3G support not on all frequencies, screen is not visible outside in the sun\nNotes: battery hold like 2 days with low-normal phone usage. Nice to show of to people spending 300 to phones that are not at good as this one.\nDoogee is a upcoming brand!',1,1430984637),(3,18,1,'NguyenPham','nguyenpq490@gmail.com','Coong nhan la dep tuyet voi, rat hai long ve san pham nay',0,1431660701);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rate` double NOT NULL,
  `continent` int(11) NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prefix` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'AFGHANISTAN','/uploads/images/flag/Flag_of_Afghanistan_svg.png','AF','AFN',58.700001,1,'USD/AFN','؋',1,0,1429175142),(2,'ALBANIA','/uploads/images/flag/Flag_of_Albania_svg.png','AL','ALL',123.834503,2,'USD/ALL','L',1,0,1429175713),(3,'ALGERIA','/uploads/images/flag/135px-Flag_of_Algeria_svg.png','DZ','DZD',96.775002,3,'USD/DZD','د.ج',1,0,1429175849),(4,'ARGENTINA','/uploads/images/flag/144px-Flag_of_Argentina_svg.png','AR','ARS',8.9398,4,'USD/ARS','AR$',1,1,1429175920),(5,'VIETNAMESE','/uploads/images/flag/Flag_of_Vietnam_svg.png','VN','VND',21680,1,'USD/VND','VND',1,1,1429584412),(6,'United States of America ','/uploads/images/flag/Flag_of_the_United_States_svg.png','USA','USD',1,4,'USD/USD','US$',1,1,1429687778),(7,'England','/uploads/images/flag/Flag_of_the_United_Kingdom_svg.png','UK','GBP',0.657436,2,'USD/GBP','£',1,1,1429687779),(8,'MACAO',NULL,'MO','MOP',7.9854,1,'USD/MOP','P',1,0,1429846277);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finances`
--

DROP TABLE IF EXISTS `finances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rate` double NOT NULL,
  `prefix` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finances`
--

LOCK TABLES `finances` WRITE;
/*!40000 ALTER TABLE `finances` DISABLE KEYS */;
INSERT INTO `finances` VALUES (1,'KRW','USD/KRW',1081.64502,''),(2,'XAG','SILVER 1 OZ 999 NY',0.062492,''),(3,'VND','USD/VND',21592.5,''),(4,'BOB','USD/BOB',6.9,''),(5,'MOP','USD/MOP',7.9826,''),(6,'BDT','USD/BDT',77.395447,''),(7,'MDL','USD/MDL',18.5,''),(8,'VEF','USD/VEF',6.35,''),(9,'GEL','USD/GEL',2.25195,''),(10,'ISK','USD/ISK',136.654999,''),(11,'BYR','USD/BYR',14250,''),(12,'THB','USD/THB',32.377998,''),(13,'MXV','USD/MXV ',2.81,''),(14,'TND','USD/TND',1.96175,''),(15,'JMD','USD/JMD',114.900002,''),(16,'DKK','USD/DKK',6.95615,''),(17,'SRD','USD/SRD',3.3,''),(18,'BWP','USD/BWP',9.90775,''),(19,'NOK','USD/NOK',7.88055,''),(20,'MUR','USD/MUR',36.049999,''),(21,'AZN','USD/AZN',1.0521,''),(22,'INR','USD/INR',62.879951,''),(23,'MGA','USD/MGA',3086.199951,''),(24,'CAD','USD/CAD',1.22674,''),(25,'XAF','USD/XAF',611.443909,''),(26,'LBP','USD/LBP',1507.5,''),(27,'XDR','USD/XDR',0.7243,''),(28,'IDR','USD/IDR',12932.5,''),(29,'IEP','USD/IEP',0.734134,''),(30,'AUD','USD/AUD',1.287971,''),(31,'MMK','USD/MMK',1062.400024,''),(32,'LYD','USD/LYD',1.36205,''),(33,'ZAR','USD/ZAR',12.09605,''),(34,'IQD','USD/IQD',1157.849976,''),(35,'XPF','USD/XPF',111.233849,''),(36,'TJS','USD/TJS',6.1346,''),(37,'CUP','USD/CUP',1,''),(38,'UGX','USD/UGX',3005,''),(39,'NGN','USD/NGN',199.050003,''),(40,'PGK','USD/PGK',2.6929,''),(41,'TOP','USD/TOP',1.985652,''),(42,'KES','USD/KES',93.694,''),(43,'TMT','USD/TMT',3.5,''),(44,'CRC','USD/CRC',530.25,''),(45,'MZN','USD/MZN',35.5,''),(46,'SYP','USD/SYP',188.929001,''),(47,'ANG','USD/ANG',1.79,''),(48,'ZMW','USD/ZMW',7.365,''),(49,'BRL','USD/BRL',3.0342,''),(50,'BSD','USD/BSD',1,''),(51,'NIO','USD/NIO',26.999599,''),(52,'GNF','USD/GNF',7262.5,''),(53,'BMD','USD/BMD',1,''),(54,'SLL','USD/SLL',4375,''),(55,'MKD','USD/MKD',57.400002,''),(56,'BIF','USD/BIF',1561,''),(57,'LAK','USD/LAK',8071.299805,''),(58,'BHD','USD/BHD',0.3768,''),(59,'SHP','USD/SHP',0.6699,''),(60,'BGN','USD/BGN',1.8233,''),(61,'SGD','USD/SGD',1.35075,''),(62,'CNY','USD/CNY',6.19915,''),(63,'EUR','USD/EUR',0.932297,''),(64,'TTD','USD/TTD',6.324,''),(65,'SCR','USD/SCR',13.68395,''),(66,'BBD','USD/BBD',2,''),(67,'SBD','USD/SBD',7.77652,''),(68,'MAD','USD/MAD',9.97405,''),(69,'GTQ','USD/GTQ',7.7075,''),(70,'MWK','USD/MWK',437.809998,''),(71,'PKR','USD/PKR',101.584999,''),(72,'ITL','USD/ITL',1804.875122,''),(73,'PEN','USD/PEN',3.132,''),(74,'AED','USD/AED',3.67315,''),(75,'LVL','USD/LVL',0.65515,''),(76,'XPD','PALLADIUM 1 OZ',0.001292,''),(77,'UAH','USD/UAH',22.75,''),(78,'LRD','USD/LRD',84.660004,''),(79,'FRF','USD/FRF',6.11445,''),(80,'LSL','USD/LSL',12.0965,''),(81,'SEK','USD/SEK',8.66555,''),(82,'RON','USD/RON',4.13785,''),(83,'XOF','USD/XOF',611.443909,''),(84,'COP','USD/COP',2473.25,''),(85,'CDF','USD/CDF',931,''),(86,'USD','USD/USD',1,''),(87,'TZS','USD/TZS',1895,''),(88,'NPR','USD/NPR',100.592003,''),(89,'GHS','USD/GHS',3.845,''),(90,'ZWL','USD/ZWL',322.355011,''),(91,'SOS','USD/SOS',704.700012,''),(92,'DZD','USD/DZD',98.510002,''),(93,'LKR','USD/LKR',132.395004,''),(94,'FKP','USD/FKP',0.6677,''),(95,'JPY','USD/JPY',119.663002,''),(96,'CHF','USD/CHF',0.95519,''),(97,'KYD','USD/KYD',0.82,''),(98,'CLP','USD/CLP',616.494995,''),(99,'IRR','USD/IRR',28305,''),(100,'AFN','USD/AFN',57.880001,''),(101,'DJF','USD/DJF',177.520004,''),(102,'SVC','USD/SVC',8.745,''),(103,'PLN','USD/PLN',3.7193,''),(104,'PYG','USD/PYG',5009.75,''),(105,'ERN','USD/ERN',15.275,''),(106,'ETB','USD/ETB',20.483999,''),(107,'ILS','USD/ILS',3.9443,''),(108,'TWD','USD/TWD',31.101,''),(109,'KPW','USD/KPW',900,''),(110,'GIP','USD/GIP',0.6699,''),(111,'SIT','USD/SIT',223.378098,''),(112,'BND','USD/BND',1.35075,''),(113,'HNL','USD/HNL',21.219999,''),(114,'CZK','USD/CZK',25.578501,''),(115,'HUF','USD/HUF',278.445007,''),(116,'BZD','USD/BZD',1.995,''),(117,'DEM','USD/DEM',1.8231,''),(118,'JOD','USD/JOD',0.7082,''),(119,'RWF','USD/RWF',689,''),(120,'LTL','USD/LTL',2.934,''),(121,'RUB','USD/RUB',53.4995,''),(122,'RSD','USD/RSD',111.82,''),(123,'WST','USD/WST',2.473901,''),(124,'XPT','PLATINUM 1 UZ 999',0.000868,''),(125,'PAB','USD/PAB',1,''),(126,'NAD','USD/NAD',12.0965,''),(127,'DOP','USD/DOP',44.75,''),(128,'ALL','USD/ALL',130.399506,''),(129,'HTG','USD/HTG',47.105301,''),(130,'KMF','USD/KMF',458.582947,''),(131,'AMD','USD/AMD',473.429993,''),(132,'MRO','USD/MRO',314,''),(133,'HRK','USD/HRK',7.0662,''),(134,'ECS','USD/ECS',25000,''),(135,'KHR','USD/KHR',3998.850098,''),(136,'PHP','USD/PHP',44.195499,''),(137,'CYP','USD/CYP',0.54555,''),(138,'KWD','USD/KWD',0.30203,''),(139,'XCD','USD/XCD',2.7,''),(140,'XCP','COPPER HIGHGRADE',0.370439,''),(141,'CNH','USD/CNH',6.1949,''),(142,'SDG','USD/SDG',5.975,''),(143,'CLF','USD/CLF',0.0246,''),(144,'KZT','USD/KZT',185.800003,''),(145,'TRY','USD/TRY',2.68535,''),(146,'NZD','USD/NZD',1.304121,''),(147,'FJD','USD/FJD',2.04175,''),(148,'BAM','USD/BAM',1.8231,''),(149,'BTN','USD/BTN',62.869999,''),(150,'STD','USD/STD',22815.5,''),(151,'VUV','USD/VUV',107.264999,''),(152,'MVR','USD/MVR',15.41,''),(153,'AOA','USD/AOA',109.099998,''),(154,'EGP','USD/EGP',7.63385,''),(155,'QAR','USD/QAR',3.6402,''),(156,'OMR','USD/OMR',0.3848,''),(157,'CVE','USD/CVE',102.739998,''),(158,'KGS','USD/KGS',61.329601,''),(159,'MXN','USD/MXN',15.42065,''),(160,'MYR','USD/MYR',3.62755,''),(161,'GYD','USD/GYD',207.210007,''),(162,'SZL','USD/SZL',12.0965,''),(163,'YER','USD/YER',214.889999,''),(164,'SAR','USD/SAR',3.75055,''),(165,'UYU','USD/UYU',26.674999,''),(166,'GBP','USD/GBP',0.669662,''),(167,'UZS','USD/UZS',2507.399902,''),(168,'GMD','USD/GMD',42.900002,''),(169,'AWG','USD/AWG',1.79,''),(170,'MNT','USD/MNT',1964.5,''),(171,'XAU','GOLD 1 OZ',0.000833,''),(172,'HKD','USD/HKD',7.7502,''),(173,'ARS','USD/ARS',8.87235,'');
/*!40000 ALTER TABLE `finances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Nhóm quản lý','nhom-quan-ly',1421418852,1426937355),(2,'Khách hàng','khach-hang',1425366878,1425366878);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `markets`
--

DROP TABLE IF EXISTS `markets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `order` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `markets`
--

LOCK TABLES `markets` WRITE;
/*!40000 ALTER TABLE `markets` DISABLE KEYS */;
INSERT INTO `markets` VALUES (1,'Trần Anh','tran-anh',0,1425975875,'Siêu thị Trần Anh','Siêu thị Trần Anh',0,NULL),(2,'FPT shop','fpt-shop',0,1425975889,'FPT shop','FPT shop',0,NULL),(3,'Hoàng Hà Mobile','hoang-ha-mobile',0,1425975910,'Hoàng Hà Mobile','Hoàng Hà Mobile',0,NULL);
/*!40000 ALTER TABLE `markets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` float NOT NULL,
  `weight` float NOT NULL,
  `shipping_cost` float NOT NULL,
  `status` int(11) NOT NULL,
  `code_vnpost` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_type` int(11) DEFAULT NULL,
  `transaction_id` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_status` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `date_of_birth` int(11) NOT NULL,
  `sex` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `order_number` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'VN',16.621,890,15.821,0,NULL,1,'1BS199260E796223Y','Completed','NguyenPham','nguyenpq490@gmail.com',12123123,'Ha Noi',650131200,1,'qerqwerwer',1431591725,1431591725,''),(2,1,'AR',12.1081,146,8.11808,0,NULL,1,'3LW40163808759720','Completed','wqwer','nguyenpq490@gmail.com',12341243,'Ha Noi',650131200,1,'werwer',1431595371,1431595371,''),(3,1,'USA',7.54879,46,3.96679,0,NULL,1,NULL,NULL,'Heo ngoc','nguyenpq@gmail.com',912398299,'Thanh Hoa',1431619200,1,'qwerqwerqwer',1431696962,1431696962,'OD59651431696962'),(4,1,'USA',24.6007,890,23.8007,0,NULL,1,NULL,NULL,'bahoioierwe','nguyenpq@gmail.com',239872934,'',1431532800,1,'',1431699961,1431699961,'OD43451431699961'),(5,1,'USA',24.6007,890,23.8007,0,NULL,1,'8F10173322182223X','Completed','bahoioierwe','nguyenpq@gmail.com',239872934,'',1431532800,1,'1243',1431699982,1431699982,'OD66611431699982'),(6,13,'AL',38.3079,730,18.3579,0,NULL,1,'7TG45863L0853620J','Completed','Nguyen Pham Quang','nguyenpham490@gmail.com',923842230,'Ha Noi',705081600,1,'Khong co van de gi trong viec mua bn',1431771518,1431771518,'OD65811431771518'),(7,13,'VN',17.0206,292,9.04059,0,NULL,1,NULL,NULL,'khanh','duykhanh94vp@gmail.com',9999999,'vinh phuc',1437235200,1,'abc',1431936137,1431936137,'OD16651431936137');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_products`
--

DROP TABLE IF EXISTS `orders_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `storage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_products`
--

LOCK TABLES `orders_products` WRITE;
/*!40000 ALTER TABLE `orders_products` DISABLE KEYS */;
INSERT INTO `orders_products` VALUES (1,1,'','','{\"color\":\"\\u0110\\u1ecf\",\"storage\":\"\"}',15,1),(2,2,'','','{\"color\":\"\\u0110\\u1ecf\",\"storage\":\"\"}',18,1),(3,3,'','','{\"color\":\"\\u0110\\u1ecf\",\"storage\":\"\"}',16,2),(4,4,'','','{\"color\":\"\\u0110\\u1ecf\",\"storage\":\"\"}',15,1),(5,5,'','','{\"color\":\"\\u0110\\u1ecf\",\"storage\":\"\"}',15,1),(6,6,'','','{\"color\":\"\\u0110\\u1ecf\",\"storage\":\"\"}',18,5),(7,7,'','','{\"color\":\"\\u0110\\u1ecf\",\"storage\":\"\"}',18,2);
/*!40000 ALTER TABLE `orders_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcels`
--

DROP TABLE IF EXISTS `parcels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_weight` float NOT NULL,
  `next_weight` float NOT NULL,
  `status` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcels`
--

LOCK TABLES `parcels` WRITE;
/*!40000 ALTER TABLE `parcels` DISABLE KEYS */;
INSERT INTO `parcels` VALUES (1,'AF','AFN','AFGHANISTAN',454212,118800,1,1429072553),(2,'AL','ALL','ALBANIA',440880,134508,1,1429072762),(3,'DZ','DZD','ALGERIA',423456,155364,1,1429072783),(4,'AR','ARS','ARGENTINA',635712,252384,1,1429072806),(5,'BN','BND','BRUNEI DARUSSALAM',270072,46992,1,1429092776),(6,'MO','MOP','MACAO',0,0,1,1429846116);
/*!40000 ALTER TABLE `parcels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,2,0,'CSGT vắt kiệt sức giải tỏa vụ kẹt xe kéo dài 15 tiếng thôi','csgt-vat-kiet-suc-giai-toa-vu-ket-xe-keo-dai-15-tieng-thoi','Đội cảnh sát giao thông Rạch Chiếc đã huy động lực lượng tham gia điều tiết, giải tỏa vụ kẹt xe nghiêm trọng kéo dài từ đêm qua đến tận chiều nay, 16/1, trên xa lộ Hà Nội.','quận thủ đức, giao thông, xe buýt, thanh niên xung phong, nghiêm trọng, tình trạng, ngã tư, Công an TPHCM, phương tiện, xa lộ hà nội','<p>Đến 16h ng&agrave;y 16/1, t&igrave;nh trạng &ugrave;n tắc giao th&ocirc;ng nghi&ecirc;m trọng theo cả 2 hướng ra v&agrave;o TPHCM tr&ecirc;n xa lộ H&agrave; Nội (XLHN) v&agrave; đường v&agrave;o c&aacute;c cảng ở khu Trường Thọ, quận Thủ Đức (TPHCM) mới cơ bản được khắc phục. Tuy nhi&ecirc;n CSGT Rạch Chiếc (ph&ograve;ng CSGT đường bộ- đường sắt c&ocirc;ng an TPHCM) v&agrave; lực lượng thanh ni&ecirc;n xung phong vẫn tiếp tục c&oacute; mặt tại hiện trường c&aacute;c giao lộ tr&ecirc;n XLHN như ng&atilde; tư RMK, ng&atilde; tư Thủ Đức, B&igrave;nh Th&aacute;i&hellip; để điều tiết, ph&acirc;n luồng nhằm tr&aacute;nh t&aacute;i diễn kẹt xe v&agrave;o giờ cao điểm chiều.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div><img alt=\"CSGT vắt kiệt sức giải tỏa vụ kẹt xe kéo dài 15 tiếng\" src=\"http://dantri4.vcmedia.vn/Dy27W1vlxg2ccccccccccccVL0MKJK/Image/2015/01/2-35414.jpg\" style=\"width:448px\" /></div>\r\n\r\n<div>T&igrave;nh trạng kẹt xe hết sức nghi&ecirc;m trọng theo cả 2 hướng ra v&agrave;o TPHCM tr&ecirc;n XLHN k&eacute;o d&agrave;i suốt từ đ&ecirc;m qua đến tận chiều 16/1.<img alt=\"CSGT vắt kiệt sức giải tỏa vụ kẹt xe kéo dài 15 tiếng\" src=\"http://dantri4.vcmedia.vn/Dy27W1vlxg2ccccccccccccVL0MKJK/Image/2015/01/1-35414.jpg\" style=\"width:448px\" /></div>\r\n\r\n<p>Trước đ&oacute; từ khoảng 1 giờ s&aacute;ng 16/1, h&agrave;ng trăm xe tải, xe container từ c&aacute;c hướng tr&ecirc;n XLHN đến giao lộ RMK rẽ v&agrave;o c&aacute;c cảng ở Trường Thọ để giao nhận h&agrave;ng đ&atilde; khiến tuyến đường số 1, phường Trường Thọ, quận Thủ Đức (đường ra v&agrave;o cảng) bị kẹt cứng, dồn ứ nghi&ecirc;m trọng.</p>\r\n\r\n<div><img alt=\"CSGT vắt kiệt sức giải tỏa vụ kẹt xe kéo dài 15 tiếng\" src=\"http://dantri4.vcmedia.vn/Dy27W1vlxg2ccccccccccccVL0MKJK/Image/2015/01/5-35414.jpg\" style=\"width:448px\" /></div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nguy&ecirc;n nh&acirc;n do lượng xe tải, container ra v&agrave;o c&aacute;c cảng ở Trường Thọ, quận Thủ Đức tăng đột biến g&acirc;y ra t&igrave;nh trạng qu&aacute; tải; phương tiện xếp h&agrave;ng d&agrave;i...</p>\r\n\r\n<p>Đến giờ cao điểm s&aacute;ng c&ugrave;ng ng&agrave;y, h&agrave;ng ng&agrave;n xe&nbsp;bị kẹt lại theo cả 2 hướng về ng&atilde; tư Thủ Đức v&agrave; hướng về cầu Rạch Chiếc c&ugrave;ng với lượng xe m&aacute;y, xe bu&yacute;t&hellip; đổ v&agrave;o th&agrave;nh phố đ&atilde; khiến giao th&ocirc;ng tr&ecirc;n XLHN t&ecirc; liệt. Tại c&aacute;c trạm xe bu&yacute;t tr&ecirc;n tuyến đường n&agrave;y, h&agrave;ng trăm sinh vi&ecirc;n, người lao động mỏi m&ograve;n chờ xe bu&yacute;t đ&atilde; khiến nhiều người trễ giờ l&agrave;m, giờ học.</p>\r\n\r\n<div><img alt=\"Hàng trăm người dân mỏi mòn chờ xe buýt tại các trạm dọc XLHN...\" src=\"http://dantri4.vcmedia.vn/Dy27W1vlxg2ccccccccccccVL0MKJK/Image/2015/01/6-35414.jpg\" style=\"width:448px\" /></div>\r\n\r\n<div>H&agrave;ng trăm người d&acirc;n mỏi m&ograve;n chờ xe bu&yacute;t tại c&aacute;c trạm dọc XLHN...</div>\r\n\r\n<div><img alt=\"...và tình trạng ùn tắc kéo dài nhiều km trên XLHN từ ngã tư Thủ Đức...\" src=\"http://dantri4.vcmedia.vn/Dy27W1vlxg2ccccccccccccVL0MKJK/Image/2015/01/3-35414.jpg\" style=\"width:448px\" /></div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div>...v&agrave; t&igrave;nh trạng &ugrave;n tắc k&eacute;o d&agrave;i nhiều km tr&ecirc;n XLHN từ ng&atilde; tư Thủ Đức...</div>\r\n\r\n<div><img alt=\"...Đến nút giao thông Cát Lái, quận 2.\" src=\"http://dantri4.vcmedia.vn/Dy27W1vlxg2ccccccccccccVL0MKJK/Image/2015/01/4-35414.jpg\" style=\"width:448px\" /></div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>...Đến n&uacute;t giao th&ocirc;ng C&aacute;t L&aacute;i, quận 2.</p>\r\n\r\n<p>Ngay khi xảy ra t&igrave;nh trạng kẹt xe, chỉ huy đội CSGT Rạch Chiếc đ&atilde; điều động h&agrave;ng chục c&aacute;n bộ, chiến sĩ phối hợp c&ugrave;ng lực lượng thanh ni&ecirc;n xung phong ra hiện trường để điều tiết, giải tỏa. Tuy nhi&ecirc;n do lượng phương tiện đổ về c&aacute;c cảng qu&aacute; nhiều g&acirc;y qu&aacute; tải khiến giao th&ocirc;ng kẹt cứng, k&eacute;o d&agrave;i nhiều km đến tận ng&atilde; tư Thủ Đức (theo hướng TPHCM ra) v&agrave; n&uacute;t giao th&ocirc;ng C&aacute;t L&aacute;i, quận 2 (theo hướng ngược lại). Một chỉ huy đội CSGT Rạch Chiếc cho biết, CSGT v&agrave; lực lượng thanh ni&ecirc;n xung phong thực hiện thay ca ngay tại hiện trường v&agrave; c&oacute; mặt suốt gần 15 giờ tại điểm n&oacute;ng kẹt xe để l&agrave;m điều tiết, giải tỏa giao th&ocirc;ng.</p>\r\n\r\n<div><img alt=\"...Đến nút giao thông Cát Lái, quận 2.\" src=\"http://dantri4.vcmedia.vn/Dy27W1vlxg2ccccccccccccVL0MKJK/Image/2015/01/7-35414.jpg\" style=\"width:448px\" /></div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chỉ huy đội CSGT Rạch Chiếc cho biết, những ng&agrave;y tới t&igrave;nh h&igrave;nh giao th&ocirc;ng tr&ecirc;n XLHN (đoạn giao lộ ra v&agrave;o cảng Trường Thọ) sẽ c&ograve;n căng thẳng do lượng phương tiện ra v&agrave;o cảng tăng trước Tết nguy&ecirc;n đ&aacute;n.</p>\r\n\r\n<p>Đến gần 16h h&ocirc;m nay, lực lượng CSGT đ&atilde; t&igrave;m mọi c&aacute;ch để giải tỏa v&agrave; t&igrave;nh trạng kẹt xe cơ bản đ&atilde; được khắc phục. Tuy nhi&ecirc;n trước t&igrave;nh trạng h&agrave;ng h&oacute;a những ng&agrave;y cận Tết dồn về c&aacute;c cảng nhiều v&agrave; lượng phương tiện ra v&agrave;o nhận h&agrave;ng tăng cao sẽ khiến giao th&ocirc;ng cửa ng&otilde; th&agrave;nh phố tr&ecirc;n XLHN sẽ c&ograve;n diễn biến phức tạp trong thời gian tới.</p>\r\n','http://localhost/img/files/images/anh/azLpYPx_700b.jpg',1421420127,1421420393);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts_tags`
--

DROP TABLE IF EXISTS `posts_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts_tags` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts_tags`
--

LOCK TABLES `posts_tags` WRITE;
/*!40000 ALTER TABLE `posts_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `discount_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_more` text COLLATE utf8_unicode_ci NOT NULL,
  `sale_artifacts` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tang kem',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `weight` float NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `number_buy` int(11) NOT NULL DEFAULT '0',
  `publish` int(11) NOT NULL,
  `prominent` int(11) NOT NULL COMMENT 'San pham noi bat',
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `total_mark` float DEFAULT NULL,
  `number_mark` int(11) NOT NULL,
  `avg_mark` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (13,4,'Asus Padfone S - Ram 3 GB','asus-padfone-s-ram-3-gb',0.77,20,1,0,'/uploads/images/1.png','[\"\\/uploads\\/images\\/1.png\",\"\\/uploads\\/images\\/2.png\",\"\\/uploads\\/images\\/3.png\",\"\\/uploads\\/images\\/4.png\"]','<p>Qu&agrave; tặng: B&uacute;t cảm ứng<br />\r\nGiảm gi&aacute; 30% phụ kiện<br />\r\nHỗ trợ mua sạc dự ph&ograve;ng Pisen 10.000mAh ch&iacute;nh h&atilde;ng với gi&aacute; 360.000 vnđ</p>\r\n','<p>khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>\r\n','<p>Lorem Ipsum chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500</p>\r\n',2345,'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào v','Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào v',21,0,0,1,1427645465,1430723394,NULL,0,0),(14,1,'Samsung Galaxy A5','samsung-galaxy-a5',0.99,15,0,1,'/uploads/images/samsung/11.JPG','[\"\\/uploads\\/images\\/samsung\\/11.JPG\",\"\\/uploads\\/images\\/samsung\\/22.JPG\",\"\\/uploads\\/images\\/samsung\\/33.JPG\",\"\\/uploads\\/images\\/samsung\\/44.JPG\"]','<p>Samsung Galaxy A5</p>\r\n','<p>Samsung Galaxy A5</p>\r\n\r\n<p>Samsung Galaxy A5</p>\r\n\r\n<p>Samsung Galaxy A5</p>\r\n','<p>Samsung Galaxy A5&nbsp;Samsung Galaxy A5</p>\r\n',234,'Samsung Galaxy A5','Samsung Galaxy A5',50,0,0,1,1427645784,1430119645,3.3,1,3.3),(15,1,'Lenovo A850+ MTK6592 Octa-Core Android 4.2.2 WCDMA Bar Phone w/ 5.5\" qHD, Wi-Fi, FM, GPS - Black','lenovo-a850-mtk6592-octa-core-android-4-2-2-wcdma-bar-phone-w-5-5-qhd-wi-fi-fm-gps-black',1,20,1,1,'/uploads/images/4.png','[\"\\/uploads\\/images\\/2.png\",\"\\/uploads\\/images\\/3.png\"]','<p>Thiết bị 1Thiết bị 1&nbsp;Thiết bị 1&nbsp;Thiết bị 1&nbsp;Thiết bị 1&nbsp;Thiết bị 1</p>\r\n','<p>M&ocirc; tả d&agrave;i cho sản phẩm</p>\r\n','<p>Đ&acirc;y l&agrave; m&ocirc; tả ngắn cho sản phẩm</p>\r\n\r\n<p>V&agrave; c&aacute;i g&igrave; nwuax đ&acirc;y?</p>\r\n',890,'Mô tả',' Từ khóa',108,0,1,1,1428414950,1430706098,12.2,3,4.07),(16,1,'Lenovo A916 Android 4.4 Octa-Core FDD LTE 4G Smartphone w/ 5.5\" IPS HD, 8GB,13MP, GPS, Wi-Fi - Black','lenovo-a916-android-4-4-octa-core-fdd-lte-4g-smartphone-w-5-5-ips-hd-8gb-13mp-gps-wi-fi-black',1.99,10,0,1,'/uploads/images/120_13_samsung_galaxy_i9000.jpg','[\"\\/uploads\\/images\\/120_14_samsung_galaxy_s2_i9100.jpg\",\"\\/uploads\\/images\\/120_16_samsung_galaxy_note_i.jpg\",\"\\/uploads\\/images\\/3.png\"]','<p>Bảo h&agrave;nh: 12 th&aacute;ng (1 đổi 1 trong v&ograve;ng 24h),theo IMEI M&agrave;n h&igrave;nh 5.5&quot; IPS Full HD CPU A8 2 nh&acirc;n 1.4 GHz Camera iSight 8.0MP; quay phim FullHD 1080p@60fps Camera phụ 1.2MP Bộ nhớ 64GB Bảo mật v&acirc;n tay Sản phẩm kh&ocirc;ng &aacute;p dụng ch&iacute;nh s&aacute;ch đổi trả. Được bảo h&agrave;nh 1 năm tại đơn vị b&aacute;n kể từ ng&agrave;y nhận h&agrave;ng</p>\r\n','<p>Bảo h&agrave;nh: 12 th&aacute;ng (1 đổi 1 trong v&ograve;ng 24h),theo IMEI M&agrave;n h&igrave;nh 5.5&quot; IPS Full HD CPU A8 2 nh&acirc;n 1.4 GHz Camera iSight 8.0MP; quay phim FullHD 1080p@60fps Camera phụ 1.2MP Bộ nhớ 64GB Bảo mật v&acirc;n tay Sản phẩm kh&ocirc;ng &aacute;p dụng ch&iacute;nh s&aacute;ch đổi trả. Được bảo h&agrave;nh 1 năm tại đơn vị b&aacute;n kể từ ng&agrave;y nhận h&agrave;ng</p>\r\n','<p>Bảo h&agrave;nh: 12 th&aacute;ng (1 đổi 1 trong v&ograve;ng 24h),theo IMEI M&agrave;n h&igrave;nh 5.5&quot; IPS Full HD CPU A8 2 nh&acirc;n 1.4 GHz Camera iSight 8.0MP; quay phim FullHD 1080p@60fps Camera phụ 1.2MP Bộ nhớ 64GB Bảo mật v&acirc;n tay Sản phẩm kh&ocirc;ng &aacute;p dụng ch&iacute;nh s&aacute;ch đổi trả. Được bảo h&agrave;nh 1 năm tại đơn vị b&aacute;n kể từ ng&agrave;y nhận h&agrave;ng</p>\r\n',23,'Bảo mật vân tay','Bảo mật vân tay',70,0,1,1,1428919849,1430119663,11.7,3,3.9),(17,4,'Mini smile Ultra-thin Protective TPU Back Case Cover for Sony Xperia Z4 - Transparent','mini-smile-ultra-thin-protective-tpu-back-case-cover-for-sony-xperia-z4-transparent',3,10,1,1,'/uploads/images/big_121917_sony-xperia-e4-e2115-black-13.jpg','[\"\\/uploads\\/images\\/big_121916_sony-xperia-e4-e2115-black-10.jpg\",\"\\/uploads\\/images\\/big_121918_sony-xperia-e4-e2115-black-14.jpg\",\"\\/uploads\\/images\\/4.png\",\"\"]','<p><span style=\"color:rgb(89, 96, 103); font-family:arial,sans-serif; font-size:14px\">hiết kế để t&aacute;i hiện những khoảnh khắc vui vẻ nhất với bạn b&egrave;. Nhờ c&oacute; c&ocirc;ng nghệ hiển thị th&ocirc;ng minh v&agrave; c&ocirc;ng nghệ &acirc;m thanh của Sony, m&agrave;n h&igrave;nh tuyệt đẹp từ mọi g&oacute;c nh&igrave;n với &acirc;m thanh trong như pha l&ecirc;.&nbsp;</span></p>\r\n','<table style=\"border-collapse:collapse; border-spacing:0px; box-sizing:border-box; color:rgb(89, 96, 103); font-family:arial,sans-serif; font-size:14px; line-height:21px; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"background-color:rgb(247, 247, 247)\">TH&Ocirc;NG TIN CHUNG</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">H&atilde;ng sản xuất</td>\r\n			<td style=\"vertical-align:top\">Sony</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Xuất xứ</td>\r\n			<td style=\"vertical-align:top\">Ch&iacute;nh h&atilde;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Hệ điều h&agrave;nh</td>\r\n			<td style=\"vertical-align:top\">Android OS, v4.4.4 (KitKat)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Ng&ocirc;n ngữ</td>\r\n			<td style=\"vertical-align:top\">Tiếng Việt, Tiếng Anh</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"background-color:rgb(247, 247, 247)\">M&Agrave;N H&Igrave;NH</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Loại m&agrave;n h&igrave;nh</td>\r\n			<td style=\"vertical-align:top\">IPS LCD</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">M&agrave;u m&agrave;n h&igrave;nh</td>\r\n			<td style=\"vertical-align:top\">16 triệu m&agrave;u</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Chuẩn m&agrave;n h&igrave;nh</td>\r\n			<td style=\"vertical-align:top\">TFT LCD</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Độ ph&acirc;n giải</td>\r\n			<td style=\"vertical-align:top\">540 x 960 pixels</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">M&agrave;n h&igrave;nh rộng</td>\r\n			<td style=\"vertical-align:top\">5.0 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">C&ocirc;ng nghệ cảm ứng</td>\r\n			<td style=\"vertical-align:top\">Cảm ứng điện dung đa điểm</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"background-color:rgb(247, 247, 247)\">CHỤP H&Igrave;NH &amp; QUAY PHIM</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Camera sau</td>\r\n			<td style=\"vertical-align:top\">5.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Camera trước</td>\r\n			<td style=\"vertical-align:top\">2.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Đ&egrave;n Flash</td>\r\n			<td style=\"vertical-align:top\">C&oacute;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">T&iacute;nh năng camera</td>\r\n			<td style=\"vertical-align:top\">Tự động lấy n&eacute;t</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Quay phim</td>\r\n			<td style=\"vertical-align:top\">Quay phim FullHD 1080p@30fps</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Videocall</td>\r\n			<td style=\"vertical-align:top\">C&oacute;</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"background-color:rgb(247, 247, 247)\">CPU &amp; RAM</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Tốc độ CPU</td>\r\n			<td style=\"vertical-align:top\">Quad-core 1.3 GHz Cortex-A7</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Số nh&acirc;n</td>\r\n			<td style=\"vertical-align:top\">4 nh&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Chipset</td>\r\n			<td style=\"vertical-align:top\">Mediatek MT6582</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">RAM</td>\r\n			<td style=\"vertical-align:top\">1 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Chip đồ họa (GPU)</td>\r\n			<td style=\"vertical-align:top\">Adreno 305</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"background-color:rgb(247, 247, 247)\">BỘ NHỚ &amp; LƯU TRỮ</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Danh bạ</td>\r\n			<td style=\"vertical-align:top\">Kh&ocirc;ng giới hạn</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Bộ nhớ trong (ROM)</td>\r\n			<td style=\"vertical-align:top\">8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Thẻ nhớ ngo&agrave;i</td>\r\n			<td style=\"vertical-align:top\">Mini SD</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Hỗ trợ thẻ tối đa</td>\r\n			<td style=\"vertical-align:top\">32 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"background-color:rgb(247, 247, 247)\">THIẾT KẾ &amp; TRỌNG LƯỢNG</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Kiểu d&aacute;ng</td>\r\n			<td style=\"vertical-align:top\">Thanh + Cảm ứng</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">K&iacute;ch thước</td>\r\n			<td style=\"vertical-align:top\">137 x 74.6 x 10.5 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Trọng lượng (g)</td>\r\n			<td style=\"vertical-align:top\">144 g</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"background-color:rgb(247, 247, 247)\">TH&Ocirc;NG TIN PIN</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Loại pin</td>\r\n			<td style=\"vertical-align:top\">Pin chuẩn Li-Ion</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Dung lượng pin</td>\r\n			<td style=\"vertical-align:top\">2.300 mAh</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Pin c&oacute; thể th&aacute;o rời</td>\r\n			<td style=\"vertical-align:top\">Kh&ocirc;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"background-color:rgb(247, 247, 247)\">KẾT NỐI &amp; CỔNG GIAO TIẾP</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">3G</td>\r\n			<td style=\"vertical-align:top\">C&oacute;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Loại Sim</td>\r\n			<td style=\"vertical-align:top\">Micro SIM</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Khe gắn Sim</td>\r\n			<td style=\"vertical-align:top\">2 sim</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Wifi</td>\r\n			<td style=\"vertical-align:top\">Wi-Fi 802.11 b/g/n, Wi-Fi Direct, Wi-Fi hotspot</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">GPS</td>\r\n			<td style=\"vertical-align:top\">A-GPS</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Bluetooth</td>\r\n			<td style=\"vertical-align:top\">v4.1<br />\r\n			A2DP, apt-X</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Jack tai nghe</td>\r\n			<td style=\"vertical-align:top\">3.5mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Kết nối USB</td>\r\n			<td style=\"vertical-align:top\">USB 2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Cổng sạc</td>\r\n			<td style=\"vertical-align:top\">Micro USB</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"background-color:rgb(247, 247, 247)\">GIẢI TR&Iacute; &amp; ỨNG DỤNG</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Xem phim</td>\r\n			<td style=\"vertical-align:top\">MP4, AVI, WMV</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Nghe nhạc</td>\r\n			<td style=\"vertical-align:top\">MP3, WAV, WMA</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Ghi &acirc;m</td>\r\n			<td style=\"vertical-align:top\">C&oacute;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">FM radio</td>\r\n			<td style=\"vertical-align:top\">C&oacute;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Chức năng kh&aacute;c</td>\r\n			<td style=\"vertical-align:top\">Mạng x&atilde; hội ảo<br />\r\n			Google Search, Maps, Gmail, YouTube, Google Talk, Picasa</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n','<table style=\"background:rgb(245, 245, 245); border-spacing:0px; box-shadow:rgb(255, 255, 255) 0px 1px 0px inset; box-sizing:border-box; color:rgb(89, 96, 103); font-family:arial,sans-serif; font-size:14px; line-height:16px; width:353px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">H&atilde;ng sản xuất</td>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Sony</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Xuất xứ</td>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Ch&iacute;nh h&atilde;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Hệ điều h&agrave;nh</td>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Android OS, v4.4.4 (KitKat)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Loại m&agrave;n h&igrave;nh</td>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">IPS LCD</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">M&agrave;n h&igrave;nh rộng</td>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">5.0 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Camera sau</td>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">5.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Tốc độ CPU</td>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Quad-core 1.3 GHz Cortex-A7</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Chip đồ họa (GPU)</td>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Adreno 305</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Trọng lượng (g)</td>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">144 g</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Loại pin</td>\r\n			<td style=\"border-color:rgb(255, 255, 255) rgb(232, 232, 232) rgb(232, 232, 232)\">Pin chuẩn Li-Ion</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n',313,'sony','sony',29,0,1,1,1429580224,1430119672,3.3,1,3.3),(18,4,'Lenovo K3 Note Android 5.0 MTK6752 Octa Core 4G Phone w/ 5.5\"FHD, 2GB RAM,16GB ROM,13.0+5.0MP-Yellow','lenovo-k3-note-android-5-0-mtk6752-octa-core-4g-phone-w-5-5-fhd-2gb-ram-16gb-rom-13-0-5-0mp-yellow',3.99,0,0,1,'/uploads/images/sku_381335_1_small.jpg','[\"\\/uploads\\/images\\/sku_381335_3.jpg\",\"\\/uploads\\/images\\/sku_381335_5_small.jpg\",\"\\/uploads\\/images\\/sku_381335_7_small.jpg\",\"\\/uploads\\/images\\/sku_381335_1_small.jpg\"]','<p><span style=\"font-family:verdana,tahoma,arial; font-size:11px\">Lenovo K3 Note Android 5.0,4G phones, eight-core, 5.5 inches, 2GB RAM, 16GB ROM,13.0MP+5.0MP- yellow</span></p>\r\n','<table class=\"t_info\" style=\"border-collapse:collapse; border-spacing:0px; font-family:verdana,tahoma,arial; font-size:11px; line-height:normal; width:897px\">\r\n	<tbody>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">General</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Brand</td>\r\n			<td style=\"height:30px\">Lenovo</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Model</td>\r\n			<td style=\"height:30px\">K50-t5</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Quantity</td>\r\n			<td style=\"height:30px\">1Piece</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Material</td>\r\n			<td style=\"height:30px\">Plastic</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Color</td>\r\n			<td style=\"height:30px\">Yellow</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Type</td>\r\n			<td style=\"height:30px\">Brand New</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Power Adapter</td>\r\n			<td style=\"height:30px\">US Plug</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Housing Case Material</td>\r\n			<td style=\"height:30px\">Plastic</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Released Time</td>\r\n			<td style=\"height:30px\">2015</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Network</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Cellular</td>\r\n			<td style=\"height:30px\">TD-SCDMA&nbsp;,&nbsp;GSM&nbsp;,&nbsp;TD-LTE</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Network Type</td>\r\n			<td style=\"height:30px\">2G&nbsp;,&nbsp;3G&nbsp;,&nbsp;4G</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Band Details</td>\r\n			<td style=\"height:30px\">2570-2620/1880-1920/2300-2400MHzTD-LTE 2010-2025/1880-1920MHzTD-SCDMA 900/1800/1900MHzGSM</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Data Transfer</td>\r\n			<td style=\"height:30px\">GPRS&nbsp;,&nbsp;HSPA&nbsp;,&nbsp;EDGE&nbsp;,&nbsp;LTE</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Network Conversation</td>\r\n			<td style=\"height:30px\">One-Party Conversation Only</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">WLAN</td>\r\n			<td style=\"height:30px\">Wi-Fi 802.11 b,g,n</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">SIM Card Type</td>\r\n			<td style=\"height:30px\">Micro SIM</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">SIM Card Quantity</td>\r\n			<td style=\"height:30px\">2</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Network Standby</td>\r\n			<td style=\"height:30px\">Dual Network Standby</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">GPS</td>\r\n			<td style=\"height:30px\">Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">NFC</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Infrared Port</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Bluetooth Version</td>\r\n			<td style=\"height:30px\">V4.0</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">System</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">OS</td>\r\n			<td style=\"height:30px\">Android</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Firmware Version</td>\r\n			<td style=\"height:30px\">Android 5.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">CPU Processor</td>\r\n			<td style=\"height:30px\">MT6752 64-bit processor</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">CPU Core Quantity</td>\r\n			<td style=\"height:30px\">Octa-Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Language</td>\r\n			<td style=\"height:30px\">English, Afrikaans, Bahasa Indonesia, Malay, Bosnian, Catalonia, Romania</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">GPU</td>\r\n			<td style=\"height:30px\">Mali-T760 graphics processor, clocked at 700MHz</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Storage</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">RAM</td>\r\n			<td style=\"height:30px\">2GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Internal Storage</td>\r\n			<td style=\"height:30px\">16GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Available Memory</td>\r\n			<td style=\"height:30px\">16GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Memory Card</td>\r\n			<td style=\"height:30px\">MicroSD(TF)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Max. Expansion Supported</td>\r\n			<td style=\"height:30px\">32GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Display</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Size Range</td>\r\n			<td style=\"height:30px\">5.5 Inches &amp; Over</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Touch Screen</td>\r\n			<td style=\"height:30px\">IPS</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Screen Resolution</td>\r\n			<td style=\"height:30px\">1920 x 1080(FHD,1080P)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Multitouch</td>\r\n			<td style=\"height:30px\">10</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Screen Size ( inches)</td>\r\n			<td style=\"height:30px\">5.5</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Camera</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Camera Pixel</td>\r\n			<td style=\"height:30px\">13.0MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Front Camera Pixels</td>\r\n			<td style=\"height:30px\">5.0MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Flash</td>\r\n			<td style=\"height:30px\">Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Auto Focus</td>\r\n			<td style=\"height:30px\">Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Touch Focus</td>\r\n			<td style=\"height:30px\">Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Power</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Talk Time</td>\r\n			<td style=\"height:30px\">36Hour</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Standby Time</td>\r\n			<td style=\"height:30px\">750Hour</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Battery Capacity</td>\r\n			<td style=\"height:30px\">3000mAh</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Battery Type</td>\r\n			<td style=\"height:30px\">Replacement</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Other Features</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Sensor</td>\r\n			<td style=\"height:30px\">Gyroscope, Light sensor&nbsp;,&nbsp;G-sensor&nbsp;,&nbsp;Proximity&nbsp;,&nbsp;Compass</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Waterproof Level</td>\r\n			<td style=\"height:30px\">IPX0 (Not Protected)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Shock-proof</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">I/O Interface</td>\r\n			<td style=\"height:30px\">Micro USB&nbsp;,&nbsp;3.5mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">JAVA</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">TV Tuner</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Radio Tuner</td>\r\n			<td style=\"height:30px\">FM</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Wireless Charging</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table class=\"mar_t10 t_info\" style=\"border-collapse:collapse; border-spacing:0px; font-family:verdana,tahoma,arial; font-size:11px; line-height:normal; margin-top:10px; width:897px\">\r\n	<tbody>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Dimensions &amp; Weight</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Dimensions</td>\r\n			<td style=\"height:30px\">6.01 in x 3.02 in x 0.31 in (15.26 cm x 7.67 cm x 0.79 cm)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Weight</td>\r\n			<td style=\"height:30px\">5.15 oz (146 g)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n','<p><span style=\"font-family:verdana,tahoma,arial; font-size:11px\">Lenovo K3 Note Android 5.0,4G phones, eight-core, 5.5 inches, 2GB RAM, 16GB ROM,13.0MP+5.0MP- yellow</span></p>\r\n',146,'lenovo','lenovo',42,0,1,1,1429865445,1430119689,4.3,1,4.3),(19,4,'InFocus M810 Android 4.4.2 Quad-Core WCDMA Smart Phone w/ 5.5\" Screen, 16GB ROM, Wi-Fi, GPS - Golden','infocus-m810-android-4-4-2-quad-core-wcdma-smart-phone-w-5-5-screen-16gb-rom-wi-fi-gps-golden',3.89,10,1,0,'/uploads/images/sku_367137_1.jpg','[\"\\/uploads\\/images\\/sku_367137_1.jpg\",\"\\/uploads\\/images\\/sku_367137_1_small.jpg\",\"\\/uploads\\/images\\/sku_367137_2_small.jpg\",\"\\/uploads\\/images\\/sku_367137_3_small.jpg\"]','<p><span style=\"background-color:rgb(248, 248, 248); color:rgb(102, 102, 102); font-family:verdana,tahoma,arial; font-size:11px\">All packages from DX.com are sent without DX logo or any information indicating DX.com. Due to package variations from suppliers, the product packaging customers receive may be different from the images displayed.</span></p>\r\n','<table class=\"t_info\" style=\"border-collapse:collapse; border-spacing:0px; font-family:verdana,tahoma,arial; font-size:11px; line-height:normal; width:897px\">\r\n	<tbody>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">General</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Brand</td>\r\n			<td style=\"height:30px\">InFocus</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Model</td>\r\n			<td style=\"height:30px\">M810</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Quantity</td>\r\n			<td style=\"height:30px\">1Piece</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Material</td>\r\n			<td style=\"height:30px\">Plastic</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Color</td>\r\n			<td style=\"height:30px\">Golden</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Type</td>\r\n			<td style=\"height:30px\">Brand New</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Plug Specifications</td>\r\n			<td style=\"height:30px\">US Plug (2-Flat-Pin Plug)</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Network</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Cellular</td>\r\n			<td style=\"height:30px\">WCDMA&nbsp;,&nbsp;GSM&nbsp;,&nbsp;FDD-LTE&nbsp;,&nbsp;TD-LTE&nbsp;,&nbsp;TDD-LTE</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Network Type</td>\r\n			<td style=\"height:30px\">2G&nbsp;,&nbsp;3G&nbsp;,&nbsp;4G</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Band Details</td>\r\n			<td style=\"height:30px\">2GCDMA 800 2GGSM 850/900/1900 3GCDMA EVDO 800 4GTD-LTE B41 4GFDD-LTE B1/3MHz</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Data Transfer</td>\r\n			<td style=\"height:30px\">GPRS&nbsp;,&nbsp;HSPA&nbsp;,&nbsp;EDGE</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Network Conversation</td>\r\n			<td style=\"height:30px\">One-Party Conversation Only</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">WLAN</td>\r\n			<td style=\"height:30px\">Wi-Fi 802.11 b,g,n</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">SIM Card Quantity</td>\r\n			<td style=\"height:30px\">1</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Network Standby</td>\r\n			<td style=\"height:30px\">Single Standby</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">GPS</td>\r\n			<td style=\"height:30px\">Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Bluetooth Version</td>\r\n			<td style=\"height:30px\">V4.0</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">System</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">OS</td>\r\n			<td style=\"height:30px\">Android</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">CPU Processor</td>\r\n			<td style=\"height:30px\">S801 MSM8974AC 2.5GHz</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">CPU Core Quantity</td>\r\n			<td style=\"height:30px\">Quad-Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Language</td>\r\n			<td style=\"height:30px\">Simplified Chinese and English</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Storage</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">RAM</td>\r\n			<td style=\"height:30px\">2GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Internal Storage</td>\r\n			<td style=\"height:30px\">16GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Memory Card</td>\r\n			<td style=\"height:30px\">Supports microSD card up to 64GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Max. Expansion Supported</td>\r\n			<td style=\"height:30px\">64GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Display</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Size Range</td>\r\n			<td style=\"height:30px\">5.5 Inches &amp; Over</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Touch Screen</td>\r\n			<td style=\"height:30px\">Capacitive Screen</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Screen Resolution</td>\r\n			<td style=\"height:30px\">1920 x 1080</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Screen Size ( inches)</td>\r\n			<td style=\"height:30px\">5.5</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Camera</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Camera Pixel</td>\r\n			<td style=\"height:30px\">13.0MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Front Camera Pixels</td>\r\n			<td style=\"height:30px\">5.0MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Flash</td>\r\n			<td style=\"height:30px\">Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Power</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Talk Time</td>\r\n			<td style=\"height:30px\">600Hour</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Standby Time</td>\r\n			<td style=\"height:30px\">430Hour</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Battery Capacity</td>\r\n			<td style=\"height:30px\">2600mAh</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Battery Type</td>\r\n			<td style=\"height:30px\">Non-removable</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Other Features</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Sensor</td>\r\n			<td style=\"height:30px\">G-sensor</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Waterproof Level</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">I/O Interface</td>\r\n			<td style=\"height:30px\">Micro USB&nbsp;,&nbsp;3.5mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Software</td>\r\n			<td style=\"height:30px\">Alarm clock, calculator, calendar, etc.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table class=\"mar_t10 t_info\" style=\"border-collapse:collapse; border-spacing:0px; font-family:verdana,tahoma,arial; font-size:11px; line-height:normal; margin-top:10px; width:897px\">\r\n	<tbody>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Dimensions &amp; Weight</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Dimensions</td>\r\n			<td style=\"height:30px\">6.02 in x 2.99 in x 0.28 in (15.3 cm x 7.6 cm x 0.7 cm)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Weight</td>\r\n			<td style=\"height:30px\">5.5 oz (156 g)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n','<p><span style=\"background-color:rgb(248, 248, 248); color:rgb(102, 102, 102); font-family:verdana,tahoma,arial; font-size:11px\">All packages from DX.com are sent without DX logo or any information indicating DX.com. Due to package variations from suppliers, the product packaging customers receive may be different from the images displayed.</span></p>\r\n',156,'ifocus','ifocus',1,0,0,1,1429865862,1430119702,NULL,0,0),(20,3,'NILLKIN Stone Style Super Bass Bluetooth V4.1 + EDR MP3 Speaker w/ Microphone - Orange + Black','nillkin-stone-style-super-bass-bluetooth-v4-1-edr-mp3-speaker-w-microphone-orange-black',4,0,0,1,'/uploads/images/sku_383476_1.jpg','[\"\\/uploads\\/images\\/sku_383476_2_small.jpg\",\"\\/uploads\\/images\\/sku_383476_3_small.jpg\",\"\\/uploads\\/images\\/sku_383476_49.jpg\",\"\\/uploads\\/images\\/sku_383476_4_small.jpg\"]','<p><span style=\"background-color:rgb(248, 248, 248); color:rgb(102, 102, 102); font-family:verdana,tahoma,arial; font-size:11px\">All packages from DX.com are sent without DX logo or any information indicating DX.com. Due to package variations from suppliers, the product packaging customers receive may be different from the images displayed.</span></p>\r\n','<table class=\"t_info\" style=\"border-collapse:collapse; border-spacing:0px; font-family:verdana,tahoma,arial; font-size:11px; line-height:normal; width:897px\">\r\n	<tbody>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">General</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Brand</td>\r\n			<td style=\"height:30px\">NILLKIN</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Model</td>\r\n			<td style=\"height:30px\">S-BT S1</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Material</td>\r\n			<td style=\"height:30px\">ABS + PC + metal</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Color</td>\r\n			<td style=\"height:30px\">Orange + Black</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Quantity</td>\r\n			<td style=\"height:30px\">1Set</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Specification</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Bluetooth Handsfree</td>\r\n			<td style=\"height:30px\">Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Bluetooth Version</td>\r\n			<td style=\"height:30px\">Bluetooth 4.1 + EDR</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Operating Range</td>\r\n			<td style=\"height:30px\">&lt;=10m</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Total Power</td>\r\n			<td style=\"height:30px\">3W</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Microphone</td>\r\n			<td style=\"height:30px\">Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">SNR</td>\r\n			<td style=\"height:30px\">-85dB</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Frequency Response</td>\r\n			<td style=\"height:30px\">2.402MHz~2.480GHz</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Applicable Products</td>\r\n			<td style=\"height:30px\">MP3&nbsp;,&nbsp;MP4&nbsp;,&nbsp;Tablet PC&nbsp;,&nbsp;IPHONE 5S&nbsp;,&nbsp;IPHONE 5C&nbsp;,&nbsp;IPHONE 5&nbsp;,&nbsp;IPHONE 4&nbsp;,&nbsp;IPHONE 4S&nbsp;,&nbsp;IPAD</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Radio Tuner</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Power</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Built-in Battery Capacity</td>\r\n			<td style=\"height:30px\">600mAh</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Battery Type</td>\r\n			<td style=\"height:30px\">Li-polymer battery</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Music Play Time</td>\r\n			<td style=\"height:30px\">5 hours</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Power Supply</td>\r\n			<td style=\"height:30px\">5V</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Other Features</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Other Features</td>\r\n			<td style=\"height:30px\">THD: &lt;1%; Stereo size: 40mm, 4ohm, dual magnets; Charging time: 2~3 hours</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table class=\"mar_t10 t_info\" style=\"border-collapse:collapse; border-spacing:0px; font-family:verdana,tahoma,arial; font-size:11px; line-height:normal; margin-top:10px; width:897px\">\r\n	<tbody>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Dimensions &amp; Weight</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Dimensions</td>\r\n			<td style=\"height:30px\">3.27 in x 3.27 in x 1.73 in (8.3 cm x 8.3 cm x 4.4 cm)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Weight</td>\r\n			<td style=\"height:30px\">6 oz (170 g)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table class=\"mar_t10 t_info\" style=\"border-collapse:collapse; border-spacing:0px; font-family:verdana,tahoma,arial; font-size:11px; line-height:normal; margin-top:10px; width:897px\">\r\n	<tbody>\r\n		<tr>\r\n			<th style=\"height:30px\">Packing List</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px\">1 x Bluetooth speaker<br />\r\n			1 x Audio cable (62cm)<br />\r\n			1 x USB charging cable (35cm)<br />\r\n			1 X Portable sling&nbsp;<br />\r\n			1 x Chinese / English user manual</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n','<p><span style=\"background-color:rgb(248, 248, 248); color:rgb(102, 102, 102); font-family:verdana,tahoma,arial; font-size:11px\">All packages from DX.com are sent without DX logo or any information indicating DX.com. Due to package variations from suppliers, the product packaging customers receive may be different from the images displayed.</span></p>\r\n',170,'sdf','asdf',15,0,0,1,1429866588,1430995187,8.5,2,4.25),(21,4,'Z6 MTK6572 Dual-Core Android 4.4.2 WCDMA Bar Phone w/ 5.5\" Screen, 512MB RAM, 4GB ROM, Wi-Fi, GPS','z6-mtk6572-dual-core-android-4-4-2-wcdma-bar-phone-w-5-5-screen-512mb-ram-4gb-rom-wi-fi-gps',82.93,NULL,0,1,'/uploads/images/sku_383642_1.jpg','[\"\\/uploads\\/images\\/sku_383642_1_small.jpg\",\"\\/uploads\\/images\\/sku_383642_3_small.jpg\",\"\\/uploads\\/images\\/sku_383642_5_small.jpg\",\"\\/uploads\\/images\\/sku_383642_4_small.jpg\"]','<p><span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x Phone</span><br />\r\n<span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x 3200mAh battery</span><br />\r\n<span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x 100~240V EU plug power adapter</span><br />\r\n<span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x Screen protector</span><br />\r\n<span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x USB cable (100cm)</span><br />\r\n<span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x Earphone (100cm-cable / 3.5mm plug)&nbsp;</span><br />\r\n<span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x English User Manual</span></p>\r\n','<table class=\"t_info\" style=\"border-collapse:collapse; border-spacing:0px; font-family:verdana,tahoma,arial; font-size:11px; line-height:normal; width:897px\">\r\n	<tbody>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">General</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Model</td>\r\n			<td style=\"height:30px\">Z6</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Quantity</td>\r\n			<td style=\"height:30px\">1Set</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Material</td>\r\n			<td style=\"height:30px\">ABS + IPS</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Color</td>\r\n			<td style=\"height:30px\">Champagne + Black</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Type</td>\r\n			<td style=\"height:30px\">Brand New</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Power Adapter</td>\r\n			<td style=\"height:30px\">EU Plug</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Housing Case Material</td>\r\n			<td style=\"height:30px\">Z6</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Released Time</td>\r\n			<td style=\"height:30px\">2015</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Network</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Cellular</td>\r\n			<td style=\"height:30px\">WCDMA&nbsp;,&nbsp;GSM</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Network Type</td>\r\n			<td style=\"height:30px\">2G&nbsp;,&nbsp;3G</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Band Details</td>\r\n			<td style=\"height:30px\">GSM 850/900/1800/1900MHz;WCDMA 850/2100MHz</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Data Transfer</td>\r\n			<td style=\"height:30px\">GPRS&nbsp;,&nbsp;HSPA&nbsp;,&nbsp;EDGE</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Network Conversation</td>\r\n			<td style=\"height:30px\">One-Party Conversation Only</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">WLAN</td>\r\n			<td style=\"height:30px\">Wi-Fi 802.11 b,g,n</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">SIM Card Type</td>\r\n			<td style=\"height:30px\">Standard&nbsp;,&nbsp;Micro SIM</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">SIM Card Quantity</td>\r\n			<td style=\"height:30px\">2</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Network Standby</td>\r\n			<td style=\"height:30px\">Dual Network Standby</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">GPS</td>\r\n			<td style=\"height:30px\">Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">NFC</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Infrared Port</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Bluetooth Version</td>\r\n			<td style=\"height:30px\">V3.0</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">System</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">OS</td>\r\n			<td style=\"height:30px\">Android</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Firmware Version</td>\r\n			<td style=\"height:30px\">Android 4.4.2</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">CPU Processor</td>\r\n			<td style=\"height:30px\">MTK6572</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">CPU Core Quantity</td>\r\n			<td style=\"height:30px\">Dual-Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Language</td>\r\n			<td style=\"height:30px\">Indonesian, Malay, Czech, German, English, Spanish, French, Italian, Hungarian, Nederlands, Portuguese, Romansch, Vietnamese, Turkish, Greek, Russian, Korean, Simplified Chinese, Traditional Chinese</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">GPU</td>\r\n			<td style=\"height:30px\">Mali-400MP</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Storage</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">RAM</td>\r\n			<td style=\"height:30px\">512MB</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Internal Storage</td>\r\n			<td style=\"height:30px\">4GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Memory Card</td>\r\n			<td style=\"height:30px\">Support Micro SD / TF card</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Max. Expansion Supported</td>\r\n			<td style=\"height:30px\">32GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Display</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Size Range</td>\r\n			<td style=\"height:30px\">5.5 Inches &amp; Over</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Touch Screen</td>\r\n			<td style=\"height:30px\">Capacitive Screen</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Screen Resolution</td>\r\n			<td style=\"height:30px\">540 x 960</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Multitouch</td>\r\n			<td style=\"height:30px\">5</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Screen Size ( inches)</td>\r\n			<td style=\"height:30px\">5.5</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Camera</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Camera Pixel</td>\r\n			<td style=\"height:30px\">3.0 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Front Camera Pixels</td>\r\n			<td style=\"height:30px\">1.3MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Flash</td>\r\n			<td style=\"height:30px\">Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Auto Focus</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Touch Focus</td>\r\n			<td style=\"height:30px\">Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Power</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Talk Time</td>\r\n			<td style=\"height:30px\">4~5Hour</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Standby Time</td>\r\n			<td style=\"height:30px\">100Hour</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Battery Capacity</td>\r\n			<td style=\"height:30px\">3200mAh</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Battery Type</td>\r\n			<td style=\"height:30px\">Replacement</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Other Features</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Sensor</td>\r\n			<td style=\"height:30px\">G-sensor</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Waterproof Level</td>\r\n			<td style=\"height:30px\">IPX0 (Not Protected)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Shock-proof</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">I/O Interface</td>\r\n			<td style=\"height:30px\">TF slot&nbsp;,&nbsp;Micro USB&nbsp;,&nbsp;3.5mm&nbsp;,&nbsp;SIM Slot</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">USB</td>\r\n			<td style=\"height:30px\">microUSB v2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Software</td>\r\n			<td style=\"height:30px\">Play Store, E-mail, Calculator, File manager, Clock, Calendar, Gallery, ToDo, Video Player, Music, Sound Recorder, FM Radio, etc.</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Format Supported</td>\r\n			<td style=\"height:30px\">MP4, 3GP, MOV, MKV, FLV, FLAC, APE, MP3, OGG, AMR, AAC, JPG, PNG, BMP</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">JAVA</td>\r\n			<td style=\"height:30px\">Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">TV Tuner</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Radio Tuner</td>\r\n			<td style=\"height:30px\">FM</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Wireless Charging</td>\r\n			<td style=\"height:30px\">No</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table class=\"mar_t10 t_info\" style=\"border-collapse:collapse; border-spacing:0px; font-family:verdana,tahoma,arial; font-size:11px; line-height:normal; margin-top:10px; width:897px\">\r\n	<tbody>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"height:30px\">Dimensions &amp; Weight</th>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Dimensions</td>\r\n			<td style=\"height:30px\">6.22 in x 3.11 in x 0.35 in (15.8 cm x 7.9 cm x 0.9 cm)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:30px; text-align:right; width:100px\">Weight</td>\r\n			<td style=\"height:30px\">4.97 oz (141 g)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n','<p><span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x Phone</span><br />\r\n<span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x 3200mAh battery</span><br />\r\n<span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x 100~240V EU plug power adapter</span><br />\r\n<span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x Screen protector</span><br />\r\n<span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x USB cable (100cm)</span><br />\r\n<span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x Earphone (100cm-cable / 3.5mm plug)&nbsp;</span><br />\r\n<span style=\"font-family:verdana,tahoma,arial; font-size:11px\">1 x English User Manual</span></p>\r\n',141,'sky','sky',20,0,0,1,1430100660,1430973972,3.7,1,3.7);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_markets`
--

DROP TABLE IF EXISTS `products_markets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_markets` (
  `product_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_markets`
--

LOCK TABLES `products_markets` WRITE;
/*!40000 ALTER TABLE `products_markets` DISABLE KEYS */;
INSERT INTO `products_markets` VALUES (16,1),(15,2),(15,1),(14,1),(13,3),(15,3),(17,1),(18,1),(19,1),(20,3);
/*!40000 ALTER TABLE `products_markets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_tags`
--

DROP TABLE IF EXISTS `products_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_tags` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_tags`
--

LOCK TABLES `products_tags` WRITE;
/*!40000 ALTER TABLE `products_tags` DISABLE KEYS */;
INSERT INTO `products_tags` VALUES (13,2),(13,3),(21,1),(20,1);
/*!40000 ALTER TABLE `products_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_users`
--

DROP TABLE IF EXISTS `products_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_users` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point` float DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` int(11) NOT NULL,
  `type` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_users`
--

LOCK TABLES `products_users` WRITE;
/*!40000 ALTER TABLE `products_users` DISABLE KEYS */;
INSERT INTO `products_users` VALUES (15,1,4.5,'116.101.0.228',1430922431,2),(15,1,NULL,NULL,1430924086,1),(20,1,4.2,'116.101.0.228',1430924122,2),(20,1,NULL,NULL,1430924130,1),(16,1,2.6,'116.101.0.228',1430928939,2),(16,1,NULL,NULL,1430928980,1),(21,1,3.7,'116.101.0.228',1430962179,2),(17,1,3.3,'116.101.0.228',1430984602,2),(18,13,NULL,NULL,1431044288,1),(21,13,NULL,NULL,1431044309,1),(21,1,NULL,NULL,1431156912,1),(17,13,NULL,NULL,1431404807,1),(14,1,NULL,NULL,1431513740,1),(18,1,4.3,'117.7.190.216',1431660679,2),(14,13,NULL,NULL,1431759907,1);
/*!40000 ALTER TABLE `products_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_values`
--

DROP TABLE IF EXISTS `products_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_values` (
  `product_id` int(11) NOT NULL,
  `value_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_values`
--

LOCK TABLES `products_values` WRITE;
/*!40000 ALTER TABLE `products_values` DISABLE KEYS */;
INSERT INTO `products_values` VALUES (18,17),(19,11),(19,13),(19,19),(19,17),(18,11),(18,12),(15,16),(15,11),(15,12),(15,9),(15,5),(15,4),(15,2),(17,17),(17,11),(17,12),(21,16),(21,17),(21,12),(21,13),(14,23),(14,16),(14,17),(14,13),(14,10),(14,5),(14,4),(14,2),(14,7),(16,23),(16,17),(16,11),(16,12),(16,10),(16,5),(16,6),(16,2),(17,24),(18,24),(19,24),(20,24),(20,19),(15,26),(15,27),(15,23),(13,26),(13,23),(13,17),(13,11),(21,11),(21,26),(21,23);
/*!40000 ALTER TABLE `products_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (1,'/uploads/images/slider/img-slideshow-1.jpg','#',0,0,1,1421585561),(2,'/uploads/images/slider/img-slideshow-2.jpg','#',0,0,1,1421585576),(3,'/uploads/images/slider/img-slideshow-3.jpg','#',0,0,1,1421585586),(4,'/uploads/images/slider/img-slideshow-4.jpg','#',0,0,1,1421585597),(5,'/uploads/images/slider/img-slideshow-5.jpg','#',0,0,1,1421585607),(6,'/uploads/images/slider/qc1.jpg','#',1,0,1,1430359196),(7,'/uploads/images/slider/left-banner-210X146-spot-watches-en.jpg','#',1,0,1,1430359229);
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `smallpackets`
--

DROP TABLE IF EXISTS `smallpackets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `smallpackets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_weight` int(11) NOT NULL,
  `from_weight` int(11) NOT NULL,
  `asia` float NOT NULL,
  `europe` float NOT NULL,
  `africa` float NOT NULL,
  `america` float NOT NULL,
  `appu` float NOT NULL,
  `created` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smallpackets`
--

LOCK TABLES `smallpackets` WRITE;
/*!40000 ALTER TABLE `smallpackets` DISABLE KEYS */;
INSERT INTO `smallpackets` VALUES (1,0,20,42500,44000,46000,48000,41500,1429070129,1),(2,21,100,68000,72000,83000,86000,64000,1429070713,1),(3,1751,2000,619000,859000,921000,948000,575000,1429091549,1),(4,101,250,120000,150000,163000,176000,106000,1429091629,1),(5,251,500,196000,256000,276000,291000,182000,1429091657,1),(6,501,750,308000,398000,425000,442000,293000,1429091688,1),(7,751,1000,343000,463000,497000,516000,328000,1429091726,1),(8,1001,1250,514000,664000,705000,726000,470000,1429149694,1),(9,1251,1500,549000,729000,777000,800000,505000,1429149772,0),(13,1501,1750,1.21231e+07,1.21213e+07,1.23121e+06,12312,123123,1429153035,1);
/*!40000 ALTER TABLE `smallpackets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers`
--

LOCK TABLES `subscribers` WRITE;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
INSERT INTO `subscribers` VALUES (5,'duykhanh94vp@gmail.com',1429936873,1429936873,0),(6,'khanhherovp@gmail.com',1429937253,1429937253,0),(7,'nguyenpham490@gmail.com',1431526615,1431526615,0);
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'','',1,'2015-05-04 14:53:56'),(2,'Asus','asus',1,'2015-05-04 15:09:54'),(3,'Zenfone','zenfone',1,'2015-05-04 15:09:54');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(11) NOT NULL,
  `birthdate` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `verification_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','71d86208a400d27c06dc1768e2c72e9ec0692ffd','loind@gmail.com',1421555617,1431616162,'Nguyen','Pham',0,599673600,'13412341234','','ha noi',1),(2,1,'nguyenpq','71d86208a400d27c06dc1768e2c72e9ec0692ffd','nguyenpham490@gmail.com',1425231800,1425231800,'','',0,0,'','','',1),(3,2,'nguyenpham','71d86208a400d27c06dc1768e2c72e9ec0692ffd','121231@gmail.com',1425367571,1425367571,'','',0,0,'','','',1),(4,2,'test1','71d86208a400d27c06dc1768e2c72e9ec0692ffd','nguyenpq@gmail.com',1425375892,1425375892,'','',0,0,'','','',1),(5,2,'Nguyen Nam','dbd7cc6b84f1d82e4f7f74e514a5f1939596417c','ntnam0104@gmail.com',1426495268,1426495268,'','',0,0,'','','',1),(6,2,'nguyenoq','71d86208a400d27c06dc1768e2c72e9ec0692ffd','nguyenpq490@gmail.com',1429017562,1429017562,'','',0,0,'','','',1),(7,2,'nguyenwqieroi','71d86208a400d27c06dc1768e2c72e9ec0692ffd','nguyenoq@gmail.com',1429633546,1429633546,'','',0,0,'','','',1),(12,2,'khanhhero','371a4c6f380c9557d5f1657e8035f04745aae37c','khanhherovp@gmail.com',1429936209,1429936521,'duy','khanh',0,0,'','BuW34ph0FIJaENED33MqxPICTuxIskK3OG6T6nTM6DWLrBovEbVc1EOU8mCAGnDv3Koa7iWeWTZnunS9zOlAs9uBv7bcuPIyA7IH','',1),(13,2,'duykhanh','44552fd647a6a6c8432601a14fef44f34333d764','duykhanh94vp@gmail.com',1429937098,1431677545,'duy','khanh',0,2035,'0988999888','oYxkczK2peQ5I3RQzNUpNMBVoAOQabJyagSmQDpfSglAkcrT0ljN7VIvvxlFI5eSm6fcKErCVNdf0E90ZsN6nwCS3XyL2MEpTTBD','ha noi',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `values`
--

DROP TABLE IF EXISTS `values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `values`
--

LOCK TABLES `values` WRITE;
/*!40000 ALTER TABLE `values` DISABLE KEYS */;
INSERT INTO `values` VALUES (2,1,'Apple','apple',1,1421410582,1421418503),(4,2,'Có','co',1,1421433181,1421433181),(5,4,'13px','13px',1,1421433196,1421433196),(6,2,'Không','khong',1,1421433211,1421433211),(7,1,'LG','lg',1,1421433231,1421433231),(8,1,'Asus','asus',1,1421528569,1421528607),(9,6,'HTC','htc',1,1422066539,1422066539),(10,6,'Nokia','nokia',1,1422066670,1422066670),(11,10,'Đỏ','do',1,1425045033,1425045033),(12,10,'Đen','den',1,1425045052,1425045052),(13,10,'Trắng','trang',1,1425045067,1425045067),(16,12,'8GB','8gb',1,1428630515,1428630515),(17,12,'16GB','16gb',1,1428630530,1428630530),(18,10,'đen','den',1,1429867474,1429867474),(19,10,'vàng','vang',1,1429867522,1429867522),(23,13,'0|2','0-2',1,1430101336,1430101336),(24,13,'2|5','2-5',1,1430101356,1430101356),(25,13,'5|10','5-10',1,1430101377,1430101377),(26,14,'1 GB','1-gb',1,1430705926,1430705926),(27,14,'2 GB','2-gb',1,1430705948,1430705948);
/*!40000 ALTER TABLE `values` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-28  0:08:39
