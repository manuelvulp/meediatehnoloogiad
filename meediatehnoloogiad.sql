-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Loomise aeg: Mai 07, 2013 kell 11:38 AM
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
(1, 'Get in touch!', 'heading_left'),
(2, 'Get in touch!', 'heading_center'),
(3, 'Get in touch!', 'heading_right'),
(4, 'somemail@somemail.com', 'content_left'),
(5, 'somemail@somemail.com', 'content_center'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Andmete tõmmistamine tabelile `events`
--

INSERT INTO `events` (`event_id`, `background_image`, `title`, `image`, `description`, `date`, `video_url`, `facebook_url`, `user_id`, `customizable_left_title`, `customizable_right_title`, `customizable_left_content`, `customizable_right_content`, `created_at`, `updated_at`) VALUES
(1, 'ck.jpg', 'Camo & Krooked World Tour 2013', 'cklogo.png', 'Camo & Krooked return to the fore with “Between The Lines”; an immense fourteen-track remix album which takes their award-winning debut on Hospital “Cross The Line” to a whole new level fresh for 2012.Featuring remixes from such artists as: High Maintenance, BCee, InsideInfo, Submorphics, Metrik, Mind Vortex, Smooth, Sub Zero, Fred V & Grafix, Funtcase and Dead Battery, as well as some exclusive tracks from the boys themselves, the album draws on talent new and old and touches on a range of different sounds and styles for the ultimate remix package.Amongst the selection we have the liquid, lilting atmospheric remix of “Afterlife” from BCee, the dark, tech-y twisted take on “Anubis” by InsideInfo and the deeper sounds of Submorphics’ “Change Me”. Alongside this is the gritty, jump up flavour of Sub Zero’s re-work of “Run Riot”, the magnificent distortions of Mind Vortex’s remix of “Cryptkeeper” and the exuberant, synth-screeching cacophony of Funtcase’s remix of “Hot Pursuit”. Fellow Hospital signings Fred V & Grafix take the torch and step up with a lush, twinkling take on “All Fall Down (feat. Shaz Sparks)”.Original material from Camo & Krooked themselves includes “Dusk To Dawn”, “Further Away” and a savvy slower tempo re-work of “In The Future (feat. Jenna G and Futurebound)” which becomes “Lost In The Future”.', '2013-05-05', 'http://www.youtube.com/embed/7bOd0hW9edY', '', 16, 'Some title left', 'Title Right', 'xxagea', 'harhra', '0000-00-00', '0000-00-00'),
(3, 'umusicbg.jpg', 'Ultra Music 2013', 'umusic.jpg', 'Join us in the celebration of our 15 Year Anniversary, and take part in an experience unparalleled by any music festival on the planet! Featuring Swedish House Mafia''s Final Performances on both weekends, the return of Carl Cox & Friends and ASOT 600 to the Megastructure, and many more brand new surprises yet to be revealed. The 15th Edition will by far be our most elaborate production and lineup to date!', '2013-05-18', '', '', 16, 'Left', 'Right', 'harhah', 'arjjarj', '0000-00-00', '0000-00-00'),
(38, 'crowd.jpg', 'My Test Event', '', 'lorem ipsum...', '2012-12-03', 'http://www.youtube.com/embed/JChvEsOI8I8', 'http://facebook.com', 16, 'Left content title', 'Right content title', 'Hello there', 'Be sure to visit our event!', '2013-05-07', '2013-05-07');

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
-- Tabeli struktuur tabelile `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `content` text,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Andmete tõmmistamine tabelile `news`
--

INSERT INTO `news` (`news_id`, `title`, `content`, `created_at`, `updated_at`, `user_id`, `created`) VALUES
(10, 'My First Entry', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut lectus lacus. In elit quam, mollis id blandit eu, ultricies sed odio. Vestibulum ut odio felis, vel viverra dui. Nunc iaculis, magna in adipiscing pulvinar, dolor lorem sodales leo, eu dapibus orci elit ut turpis. Maecenas at porta quam. Quisque sed ante eu ante pharetra venenatis nec eu lorem. Integer venenatis sollicitudin eros, eget tempus ipsum porttitor a.', '2013-05-07', '2013-05-07', 16, '2013-05-07 11:32:33'),
(11, 'My Second Entry', 'Nulla non urna eu odio sodales sodales. Integer erat nisi, aliquet id convallis ac, vestibulum vel sapien. In est tortor, ultricies id accumsan id, pretium at est. Nullam viverra leo nec eros blandit quis porta dolor euismod. Aenean non leo quis nisl sodales ullamcorper non id risus. Pellentesque nec mi tellus, vitae dapibus lectus. Maecenas id mauris urna. Curabitur in diam nunc, non euismod libero. Praesent at luctus est. Phasellus molestie convallis urna at vulputate. Phasellus nunc massa, vestibulum non blandit ac, lobortis et magna.\r\n\r\nPhasellus luctus posuere ipsum. Nam quis orci lacus. Sed rhoncus magna nec nisi volutpat vestibulum. Curabitur ultrices leo ut ipsum fermentum blandit. Praesent in odio a tortor placerat fermentum. Integer tincidunt dapibus leo pretium ultrices. Nulla porttitor interdum eleifend. Aenean convallis commodo lacus a feugiat. Nam non elit eros, sit amet lobortis mi. Etiam id sem sed metus faucibus rutrum ac vel tortor. Sed semper cursus ornare. Duis sed magna sem, a lacinia urna. Fusce eget ante enim.\r\n\r\nEtiam ut lobortis nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam erat volutpat. Nunc a ipsum metus, aliquam placerat leo. Pellentesque cursus leo vitae leo congue quis tincidunt enim iaculis. Donec libero libero, iaculis ac sagittis eu, suscipit at orci. Duis aliquet enim nec urna malesuada id fermentum tortor vulputate. Vivamus nec ante libero.\r\n\r\nInteger eget nunc nunc. Mauris placerat quam nec tellus pretium suscipit. Curabitur faucibus mi vitae eros vehicula vehicula. Ut et lacus est. Donec eget urna sed dolor aliquet malesuada. Nunc id leo urna. Pellentesque in nisi in ligula malesuada rutrum. Duis hendrerit risus est, at varius elit. Phasellus tempor massa non dui fermentum vitae accumsan eros bibendum. Morbi cursus lorem sit amet ligula cursus varius. Maecenas laoreet placerat magna, et consectetur neque adipiscing eu. Duis ac purus tortor, rhoncus egestas nulla. Nulla sit amet felis eros, vel auctor erat. Ut sollicitudin neque id diam adipiscing pharetra. Donec vitae fringilla arcu.', '2013-05-07', '2013-05-07', 16, '2013-05-07 11:32:42');

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
('IPF9hNO3xmBXHqDzCOSw9RSe6MBYnk8yGPCdaiZs', 1367926417, 'a:3:{s:5:":new:";a:0:{}s:5:":old:";a:0:{}s:10:"csrf_token";s:40:"W5gBqCAUQ2nXJecadQYVWmc9ynhHCOubjPLuIROS";}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Andmete tõmmistamine tabelile `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`, `last_login`, `group_id`) VALUES
(16, 'admin', 'admin', '$2a$08$cXRGODc1YVRXSGVPc3lCNObI.bmiXvxZqovvxyqWDdfBqwjmu1c2m', '0000-00-00 00:00:00', NULL, NULL, '2013-05-07 11:28:40', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
