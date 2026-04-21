CREATE DATABASE  IF NOT EXISTS `store_dev`
USE `store_dev`;

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `points` int DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `customers` WRITE;
INSERT INTO `customers` VALUES (1,'Jānis','Bērziņš','janis.berzins@example.com','1985-03-15',150),(2,'Līga','Kalniņa','liga.kalnina@example.com','1990-07-22',280),(3,'Pēteris','Ozoliņš','peteris.ozolins@example.com','1978-11-08',75),(4,'Anna','Eglīte','anna.eglite@example.com','1995-01-30',420);

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `delivery_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `orders` WRITE;
INSERT INTO `orders` VALUES (1,1,'2024-01-10','completed','First order','2024-01-15'),(2,1,'2024-02-20','completed','Urgent delivery','2024-02-22'),(3,1,'2024-03-05','pending',NULL,NULL),(4,2,'2024-01-25','completed','Gift wrapping requested','2024-01-28'),(5,2,'2024-03-12','shipped',NULL,'2024-03-18'),(6,3,'2024-02-14','completed','Valentines special','2024-02-16'),(7,3,'2024-03-01','pending',NULL,NULL);
