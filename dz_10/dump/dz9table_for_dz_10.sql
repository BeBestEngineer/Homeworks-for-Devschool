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
(65,	'Alexander',	'Name@mail.com',	'+7-926-458-98-69',	'77',	'ho',	'Title',	'LUXURY HOUSE',	'1000 0000 0000'),
(53,	'AL',	'Name@mail.com',	'+7-926-458-98-69',	'77',	'fo',	'Automobile',	'LUXURY',	'100 000 000 000');

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

DROP TABLE IF EXISTS `cat_simple`;
CREATE TABLE `cat_simple` (
  `section_category` varchar(20) NOT NULL,
  `category` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `cat_simple` (`section_category`, `category`) VALUES
('Computers',	NULL),
('Smartphones',	'Computers'),
('Photo',	'Computers'),
('Audio/Video',	'Computers'),
('Workstation',	'Computers'),
('Houses',	NULL),
('Appartments',	'Houses'),
('Rooms',	'Houses'),
('Hostels',	'Houses'),
('Luxury',	'Houses'),
('Transport',	NULL),
('Fourback',	'Transport'),
('Fullback',	'Transport'),
('Bykes',	'Transport'),
('Other',	'Transport'),
('Other things',	NULL),
('For work',	'Other things'),
('For transport',	'Other things'),
('For health',	'Other things'),
('For dislocation',	'Other things');

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `message_topic_id` varchar(20) NOT NULL,
  `message_id` varchar(20) NOT NULL,
  `message_subject` varchar(20) NOT NULL,
  `message_text` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `messages` (`message_topic_id`, `message_id`, `message_subject`, `message_text`) VALUES
('100',	'Smartphones 1',	'Windows 10 Mobile 1',	'1'),
('200',	'Smartphones 2',	'Windows 10 Mobile 2',	'2'),
('300',	'Smartphones 3',	'Windows 10 Mobile 3',	'3');

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

DROP TABLE IF EXISTS `rus_simple`;
CREATE TABLE `rus_simple` (
  `id` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `parent_id` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `rus_simple` (`id`, `category`, `parent_id`) VALUES
('777',	'Moscowia',	NULL),
('77',	'Moscow',	'777'),
('78',	'S-Peterburg',	'777'),
('93',	'Krasnodar',	'777'),
('96',	'Ekaterinburg',	'777'),
('154',	'West_Siberia',	NULL),
('55',	'Omsk',	'154'),
('54',	'Novosibirsk',	'154'),
('72',	'Tumen',	'154'),
('86',	'Han. Mans',	'154'),
('88',	'East_Siberia',	NULL),
('8',	'Krasnoyarsk',	'88'),
('85',	'Irkutsk',	'88'),
('103',	'Ulan',	'88'),
('84',	'Norilsk',	'88'),
('125',	'Far_East',	NULL),
('25',	'Vladivostok',	'125'),
('24',	'Habarovsk',	'125'),
('251',	'Nahodka',	'125'),
('28',	'Blagovechensk',	'125');

-- 2016-04-26 07:10:06
