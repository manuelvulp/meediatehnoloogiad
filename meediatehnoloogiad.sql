-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Loomise aeg: Mai 06, 2013 kell 11:07 PM
-- Serveri versioon: 5.5.24-log
-- PHP versioon: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Andmebaas: `meediatehnoloogiad`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text,
  `position` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`about_id`),
  UNIQUE KEY `about_id_UNIQUE` (`about_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Andmete tõmmistamine tabelile `about`
--

INSERT INTO `about` (`about_id`, `text`, `position`) VALUES
(1, 'Who we are?', 'heading_left'),
(2, 'What we do?', 'heading_center'),
(3, 'Get in touch!', 'heading_right'),
(4, '', 'content_left'),
(5, '', 'content_center'),
(6, 'somemail@somemail.com', 'content_right');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `background_image` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `video_url` text NOT NULL,
  `facebook_url` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `customizable_left_title` varchar(30) NOT NULL,
  `customizable_right_title` varchar(30) NOT NULL,
  `customizable_left_content` text NOT NULL,
  `customizable_right_content` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `venue_id_UNIQUE` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Andmete tõmmistamine tabelile `events`
--

INSERT INTO `events` (`event_id`, `background_image`, `title`, `image`, `description`, `date`, `video_url`, `facebook_url`, `user_id`, `customizable_left_title`, `customizable_right_title`, `customizable_left_content`, `customizable_right_content`, `created_at`, `updated_at`) VALUES
(1, 'ck.jpg', 'Camo & Krooked World Tour 2013', 'cklogo.png', 'Camo & Krooked return to the fore with “Between The Lines”; an immense fourteen-track remix album which takes their award-winning debut on Hospital “Cross The Line” to a whole new level fresh for 2012.Featuring remixes from such artists as: High Maintenance, BCee, InsideInfo, Submorphics, Metrik, Mind Vortex, Smooth, Sub Zero, Fred V & Grafix, Funtcase and Dead Battery, as well as some exclusive tracks from the boys themselves, the album draws on talent new and old and touches on a range of different sounds and styles for the ultimate remix package.Amongst the selection we have the liquid, lilting atmospheric remix of “Afterlife” from BCee, the dark, tech-y twisted take on “Anubis” by InsideInfo and the deeper sounds of Submorphics’ “Change Me”. Alongside this is the gritty, jump up flavour of Sub Zero’s re-work of “Run Riot”, the magnificent distortions of Mind Vortex’s remix of “Cryptkeeper” and the exuberant, synth-screeching cacophony of Funtcase’s remix of “Hot Pursuit”. Fellow Hospital signings Fred V & Grafix take the torch and step up with a lush, twinkling take on “All Fall Down (feat. Shaz Sparks)”.Original material from Camo & Krooked themselves includes “Dusk To Dawn”, “Further Away” and a savvy slower tempo re-work of “In The Future (feat. Jenna G and Futurebound)” which becomes “Lost In The Future”.', '2013-05-05', 'http://www.youtube.com/embed/7bOd0hW9edY', '', 1, 'Some title left', 'Title Right', 'xxagea', 'harhra', '0000-00-00', '0000-00-00'),
(2, '', 'Some Random Event', '', 'Some information?', '2013-05-05', '', '', 1, 'LL', 'RR', 'harhar', 'harhar', '0000-00-00', '0000-00-00'),
(3, 'umusicbg.jpg', 'Ultra Music 2013', 'umusic.jpg', 'Join us in the celebration of our 15 Year Anniversary, and take part in an experience unparalleled by any music festival on the planet! Featuring Swedish House Mafia''s Final Performances on both weekends, the return of Carl Cox & Friends and ASOT 600 to the Megastructure, and many more brand new surprises yet to be revealed. The 15th Edition will by far be our most elaborate production and lineup to date!', '2013-05-18', '', '', 1, 'Left', 'Right', 'harhah', 'arjjarj', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `event_venues`
--

CREATE TABLE IF NOT EXISTS `event_venues` (
  `event_venue_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `venue` varchar(80) DEFAULT NULL,
  `ticket_url` text,
  `facebook_url` text,
  `event_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_venue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Andmete tõmmistamine tabelile `event_venues`
--

INSERT INTO `event_venues` (`event_venue_id`, `date`, `location`, `venue`, `ticket_url`, `facebook_url`, `event_id`) VALUES
(1, '2013-05-02', 'USA, Chicago', 'Lollapalooza', '#', '#', 1),
(2, '2013-05-11', 'UK, London', 'Wireless Festival', '#', '#', 1),
(3, '2013-05-07', 'Italy, Milan', 'Bercy', '#', '#', 1),
(4, '2013-05-09', 'Italy, Milan', 'Heineken Jammin’ Festival', '#', '#', 1);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(40) NOT NULL,
  `last_activity` int(10) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Andmete tõmmistamine tabelile `sessions`
--

INSERT INTO `sessions` (`id`, `last_activity`, `data`) VALUES
('NYsZBBJWJTTgRVYb2JYGwO6afM65EF7etZiKxtrK', 1367881533, 'a:3:{s:5:":new:";a:0:{}s:5:":old:";a:0:{}s:10:"csrf_token";s:40:"61qH5IYnTjNd2OnQHcwIpWFOLoeEhEc0PFi2hpGH";}');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Andmete tõmmistamine tabelile `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`, `last_login`, `group_id`) VALUES
(1, 'mv', 'mv', '$2a$08$MGU0SFBhUWZqSFdBNkxKbu9rgizx4sdboxIXRQEr4lDdzHLoyCkCC', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(2, 'mv', '', '$2a$08$ODc3WmNlYkJEZlpMdmdZNeqkPmBuqAJS66m7jIM.O6/tJpea6FjHq', '2013-04-15 18:43:41', '2013-04-15 18:43:41', NULL, '2013-04-15 21:43:41', NULL),
(3, 'mv', '', '$2a$08$ZnBxbEFneGRtMUd1R01KYOQHOLjHd0S2tU4BiXFRKws.W8E4S7vwG', '2013-04-15 18:43:45', '2013-04-15 18:43:45', NULL, '2013-04-15 21:43:45', NULL),
(4, 'mv', '', '$2a$08$S1IxY2RCM2c4ZDJkQ3RJcuyPwawg4fD5cZIYd6qDMFdG2XfLFxlRe', '2013-04-15 18:44:04', '2013-04-15 18:44:04', NULL, '2013-04-15 21:44:04', NULL),
(5, 'mv', '', '$2a$08$dFM5OGs5V3ZmWE5uMlV2ZOv7/Zxr/Uxe1LljjGxwCRIqR4uvZ1k3e', '2013-04-15 18:44:11', '2013-04-15 18:44:11', NULL, '2013-04-15 21:44:11', NULL),
(6, 'mv', '', '$2a$08$WjNxSm16Qjl4clhpUWs1eeo7U8eO9CWYblrAhN403q4BbSnPJru/2', '2013-04-15 18:44:14', '2013-04-15 18:44:14', NULL, '2013-04-15 21:44:14', NULL),
(7, 'mv', '', '$2a$08$OEtQRjUxVk9tVTZvRjcyeO0J4LfPlJxjupAgDFtyOeZf5wlHZx5Km', '2013-04-15 18:44:19', '2013-04-15 18:44:19', NULL, '2013-04-15 21:44:19', NULL),
(8, 'mv', '', '$2a$08$b0hqdVlIN2VTTlRJVnRuceEt61mHF0MZr.EN7d.XypHKL0XvBRkJe', '2013-04-15 18:44:22', '2013-04-15 18:44:22', NULL, '2013-04-15 21:44:22', NULL),
(9, 'mv', '', '$2a$08$c2hpd1hmVzRVWTVaMWdWdOWWR/awN6toerJeW3jVQXnHnrghcbJ7K', '2013-04-15 18:44:26', '2013-04-15 18:44:26', NULL, '2013-04-15 21:44:26', NULL),
(10, 'mv', '', '$2a$08$cGV2cXh4ZGxzWVhDYUpNSOI99XHL2WmxEu.aT6bsTeCVPbqKU4SUq', '2013-04-15 18:44:40', '2013-04-15 18:44:40', NULL, '2013-04-15 21:44:40', NULL),
(11, 'mv', '', '$2a$08$dVQwMXpJNDJxT3JLVkNIRuzwUxaEZd3DBcpBTybK0sOSYBTDLn9TG', '2013-04-15 18:46:34', '2013-04-15 18:46:34', NULL, '2013-04-15 21:46:34', NULL),
(12, 'mv', '', '$2a$08$V0ZIMjRvbWgxTzF2S0xzauNsnNeKqT1dDpQRYtmU9npT2kKWzb0Gy', '2013-04-15 18:46:52', '2013-04-15 18:46:52', NULL, '2013-04-15 21:46:52', NULL),
(13, 'mv', '', '$2a$08$dUNNMUtKQXlPVGVweFJrNOch.T2srtdXkjh8V7l6f1k/bcYfNf58O', '2013-04-15 18:47:02', '2013-04-15 18:47:02', NULL, '2013-04-15 21:47:02', NULL),
(14, 'mv', '', '$2a$08$NXhFcTFPTGRMZ3c0a3BzdeszaCGQGXA7JXHAN.ulHdcui0wvsZ8Uy', '2013-04-15 18:47:07', '2013-04-15 18:47:07', NULL, '2013-04-15 21:47:07', NULL),
(15, 'mv', '', '$2a$08$WmFUSjY3SWZjYW5OR2tYNOpK7A9Tme8nwNNo6JhHOlLuIgRtlXR1m', '2013-04-15 18:47:16', '2013-04-15 18:47:16', NULL, '2013-04-15 21:47:16', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
