DROP TABLE IF EXISTS users ;
DROP TABLE IF EXISTS tickets;
DROP TABLE IF EXISTS ticket_types;

DROP TABLE IF EXISTS events ;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS periods ;
DROP TABLE IF EXISTS places ;



CREATE TABLE IF NOT EXISTS `categories`
 (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
)  ;


CREATE TABLE IF NOT EXISTS `periods` 
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `placeId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `placeId` (`placeId`)
)  ;






CREATE TABLE IF NOT EXISTS `places` 
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `capacity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ;




CREATE TABLE IF NOT EXISTS `tickets`
 (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8_bin NOT NULL,
  `typeId` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `typeId` (`typeId`,`eventId`),
  KEY `eventId` (`eventId`)
)  ;





CREATE TABLE IF NOT EXISTS `ticket_types`
 (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
)  ;




CREATE TABLE IF NOT EXISTS `users` 
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
)  ;


CREATE TABLE IF NOT EXISTS `events` 
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `placeId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `periodsId` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `placeId` (`placeId`),
  KEY `categoryId` (`categoryId`),
  KEY `periodsId` (`periodsId`)
)  ;



ALTER TABLE `events`
  ADD CONSTRAINT `periodsId` FOREIGN KEY (`periodsId`) REFERENCES `periods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categoryId` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `placeId` FOREIGN KEY (`placeId`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `tickets`
  ADD CONSTRAINT `eventId` FOREIGN KEY (`eventId`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `typeId` FOREIGN KEY (`typeId`) REFERENCES `ticket_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;