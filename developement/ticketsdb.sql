-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2014 at 05:17 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ticketsdb`
--
drop table if exists `has_ticket`;
drop table if exists `tickets`;
drop table if exists `users`;
drop table if exists `event_details`;
drop table if exists `events`;
drop table if exists `places`;
drop table if exists `periods`;
drop table if exists `categories`;
-- --------------------------------------------------------
--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`categoryId` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
delete from categories;
-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`eventId` int(11) NOT NULL,
  `event_name` varchar(50)  NOT NULL,
  `event_description` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `event_largeImg` varchar(200) NOT NULL,
  `event_smallImg` varchar(200) NOT NULL,
  `activated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
delete from events;
-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE IF NOT EXISTS `event_details` (
`event_detailsId` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
delete from event_details;
-- --------------------------------------------------------

--
-- Table structure for table `has_ticket`
--

CREATE TABLE IF NOT EXISTS `has_ticket` (
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
delete from has_ticket;
-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE IF NOT EXISTS `periods` (
`periodId` int(11) NOT NULL,
  `period_date` date NOT NULL,
  `period_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
delete from periods;
-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
`placeId` int(11) NOT NULL,
`place_name` varchar(30) NOT NULL,
  `place_address` varchar(30)  NOT NULL,
  `place_image` varchar(30) NOT NULL,
  `place_capacity` varchar(30)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
delete from places;
-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
`ticket_id` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8_bin NOT NULL,
  `type` varchar(30) COLLATE utf8_bin NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `details_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
delete from tickets;
-- --------------------------------------------------------

--


--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `usertype` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
delete from users;
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`eventId`), ADD KEY `category_id` (`category_id`),  ADD KEY `org_id` (`org_id`);

--
-- Indexes for table `event_details`
--
ALTER TABLE `event_details`
 ADD PRIMARY KEY (`event_detailsId`), ADD KEY `period_id` (`period_id`,`place_id`,`event_id`), ADD KEY `event_id` (`event_id`), ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `has_ticket`
--
ALTER TABLE `has_ticket`
 ADD PRIMARY KEY (`user_id`,`ticket_id`), ADD KEY `user_id` (`user_id`), ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
 ADD PRIMARY KEY (`periodId`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
 ADD PRIMARY KEY (`placeId`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
 ADD PRIMARY KEY (`ticket_id`), ADD KEY `details_id` (`details_id`);

--


--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_details`
--
ALTER TABLE `event_details`
MODIFY `event_detailsId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
MODIFY `periodId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
MODIFY `placeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;
--
--
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;
ADD CONSTRAINT `org_id` FOREIGN KEY (`org_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_details`
--
ALTER TABLE `event_details`
ADD CONSTRAINT `event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`eventId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `period_Id` FOREIGN KEY (`period_id`) REFERENCES `periods` (`periodId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `place_id` FOREIGN KEY (`place_id`) REFERENCES `places` (`placeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `has_ticket`
--
ALTER TABLE `has_ticket`
ADD CONSTRAINT `ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
ADD CONSTRAINT `event_detailsId` FOREIGN KEY (`details_id`) REFERENCES `event_details` (`event_detailsId`) ON DELETE CASCADE ON UPDATE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



















