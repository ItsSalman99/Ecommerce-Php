
#
# TABLE STRUCTURE FOR: users
#

CREATE TABLE `users` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: cart
#

CREATE TABLE `cart` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(20) unsigned DEFAULT NULL,
  `quantity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: item
#

CREATE TABLE `item` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `order` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `order_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ordered_item` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(20) unsigned DEFAULT NULL,
  `order_id` int(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `credit` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `card_number` varchar(255) DEFAULT NULL,
  `card_holder_name` varchar(255) DEFAULT NULL,
  `cvv` varchar(255) DEFAULT NULL,
  `balance`  varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `paypal` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'Product 1',5.80,'23','https://tailwindui.com/img/ecommerce-images/product-page-02-featured-product-shot.jpg'),(2,'Product 2',324.00,'10','https://tailwindui.com/img/ecommerce-images/product-page-02-featured-product-shot.jpg'),(3,'Product 3',999,'4','https://tailwindui.com/img/ecommerce-images/product-page-02-featured-product-shot.jpg'),(4,'Product 4',12500,'10','https://tailwindui.com/img/ecommerce-images/product-page-02-featured-product-shot.jpg'),(5,'Product 5',1418,'23','https://tailwindui.com/img/ecommerce-images/product-page-02-featured-product-shot.jpg');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;
