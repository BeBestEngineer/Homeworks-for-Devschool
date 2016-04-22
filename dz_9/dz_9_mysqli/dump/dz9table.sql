-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `e_mail` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `city_id` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ads` (`id`, `name`, `e_mail`, `phone_number`, `city_id`, `category`, `title`, `description`, `price`) VALUES
(41,	'AL',	'Name@mail.com',	'+7-926-458-98-69',	'77',	'ph',	'CanonMIV',	'Nice looking',	'100 000 000'),
(40,	'AL',	'Name@mail.com',	'+7-926-458-98-69',	'77',	'ph',	'CanonMIV',	'Nice looking',	'100 000 000'),
(39,	'AL',	'Name@mail.com',	'+7-926-458-98-69',	'77',	'ph',	'CanonMIV',	'Nice looking',	'100 000 000');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id_category` varchar(10) NOT NULL,
  `section_category` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`id_category`, `section_category`, `category`) VALUES
('sm',	'Computers',	'Smartphones'),
('ph',	'Computers',	'Photo'),
('av',	'Computers',	'Audio/Video'),
('ws',	'Computers',	'Workstation'),
('ap',	'Houses',	'Appartments'),
('ro',	'Houses',	'Rooms'),
('hos',	'Houses',	'Hostels'),
('ho',	'Houses',	'Houses'),
('fo',	'Transport',	'Fourback'),
('fb',	'Transport',	'Fullback'),
('by',	'Transport',	'Bykes'),
('ot',	'Transport',	'Other'),
('fw',	'Other things',	'For work'),
('fa',	'Other things',	'For transport'),
('fh',	'Other things',	'For health'),
('fd',	'Other things',	'For dislocation');

DROP TABLE IF EXISTS `russland`;
CREATE TABLE `russland` (
  `id_city` smallint(3) NOT NULL,
  `region` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `russland` (`id_city`, `region`, `city`) VALUES
(77,	'Moscowia',	'Moscow'),
(78,	'Moscowia',	'S-Peterburg'),
(93,	'Moscowia',	'Krasnodar'),
(96,	'Moscowia',	'Ekaterinburg'),
(55,	'West_Siberia',	'Omsk'),
(154,	'West_Siberia',	'Novosibirsk'),
(72,	'West_Siberia',	'Tumen'),
(86,	'West_Siberia',	'Han. Mans'),
(88,	'East_Siberia',	'Krasnoyarsk'),
(85,	'East_Siberia',	'Irkutsk'),
(103,	'East_Siberia',	'Ulan'),
(84,	'East_Siberia',	'Norilsk'),
(125,	'Far_East',	'Vladivostok'),
(24,	'Far_East',	'Habarovsk'),
(25,	'Far_East',	'Nahodka'),
(28,	'Far_East',	'Blagovechensk');

-- 2016-04-21 06:19:41
