DROP TABLE IF EXISTS categories
DROP TABLE IF EXISTS `events` 
DROP TABLE IF EXISTS `places` 
DROP TABLE IF EXISTS `tickets`
DROP TABLE IF EXISTS `ticket_types`
DROP TABLE IF EXISTS `users` 



CREATE TABLE IF NOT EXISTS `categories`
 (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;



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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;



CREATE TABLE IF NOT EXISTS `periods` 
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `placeId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `placeId` (`placeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;






CREATE TABLE IF NOT EXISTS `places` 
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `capacity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;




CREATE TABLE IF NOT EXISTS `tickets`
 (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8_bin NOT NULL,
  `typeId` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `typeId` (`typeId`,`eventId`),
  KEY `eventId` (`eventId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;





CREATE TABLE IF NOT EXISTS `ticket_types`
 (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ticket_types`
--

INSERT INTO `ticket_types` (`id`, `name`, `state`, `price`) VALUES
(1, 'Партер', 'Слободен', 300),
(2, 'ВИП', 'Слободен', 500),
(3, 'Трибина', 'Резервиран', 400);



CREATE TABLE IF NOT EXISTS `users` 
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`


ALTER TABLE `events`
  ADD CONSTRAINT `periodsId` FOREIGN KEY (`periodsId`) REFERENCES `periods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categoryId` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `placeId` FOREIGN KEY (`placeId`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `tickets`
  ADD CONSTRAINT `eventId` FOREIGN KEY (`eventId`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `typeId` FOREIGN KEY (`typeId`) REFERENCES `ticket_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Спорт', 'Спортски натпревари'),
(2, 'Музика', 'Музички концерти'),
(3, 'Кино', 'Билети за кино'),
(4, 'Театар', 'Билети за театарски претстави');



INSERT INTO `events` (`id`, `name`, `placeId`, `categoryId`, `periodsId`, `description`) VALUES
(1, 'Сомнително лице', 5, 4, 1, 'Театарска претстава там тарам'),
(2, 'Концерт Каролина Гочева', 4, 2, 2, 'Промоција на албумот Македонско девојче II');


INSERT INTO `periods` (`id`, `date`, `time`, `placeId`) VALUES
(1, '2014-11-25', '17:00:00', 2),
(2, '2014-11-29', '20:00:00', 2);




INSERT INTO `places` (`id`, `address`, `name`, `image`, `capacity`) VALUES
(2, 'Љубљанска бр.4', 'Cineplexx', 'images/cineplexx.jpg', 400),
(3, 'Градски стадион б.б.', 'Национална арена Филип II', 'images/filipII.jpg', 10000),
(4, '8 Септември бр.13', 'Спортска сала Борис Трајковски', 'images/boris_trajkovski.jpg', 5000),
(5, 'Kej бр.23', 'Македонски народен театар', 'images/mnt', 800);

