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
(109,	'KSANDR',	'',	'+7-000-111-22-44',	'',	'',	'Toyota',	'',	'100'),
(112,	'KSANDR',	'',	'+7-000-111-22-44',	'',	'',	'Toyota',	'',	'100'),
(110,	'KSANDR',	'',	'+7-000-111-22-44',	'',	'',	'Toyota',	'',	'100'),
(111,	'AL',	'AL@mail.com',	'+7-926-458-98-69',	'78',	'ho',	'LUX APPART',	'AMMMAZZZING HOUSSSES OF SP',	'550 000 000 000'),
(107,	'KSANDR',	'',	'+7-000-111-22-44',	'',	'',	'Toyota',	'',	'100'),
(108,	'KSANDR',	'',	'+7-000-111-22-44',	'',	'',	'Toyota',	'',	'100');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `section_category` varchar(20) NOT NULL,
  `id_category` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`section_category`, `id_category`, `category`) VALUES
('Computers',	'sm',	'Smartphones'),
('Computers',	'ph',	'Photo'),
('Computers',	'av',	'Audio/Video'),
('Computers',	'ws',	'Workstation'),
('Houses',	'ap',	'Appartments'),
('Houses',	'ro',	'Rooms'),
('Houses',	'hos',	'Hostels'),
('Houses',	'ho',	'Houses'),
('Transport',	'fo',	'Fourback'),
('Transport',	'fb',	'Fullback'),
('Transport',	'by',	'Bykes'),
('Transport',	'ot',	'Other'),
('Other things',	'fw',	'For work'),
('Other things',	'fa',	'For transport'),
('Other things',	'fh',	'For health'),
('Other things',	'fd',	'For dislocation');

DROP TABLE IF EXISTS `russland`;
CREATE TABLE `russland` (
  `region` varchar(20) NOT NULL,
  `id_city` smallint(3) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `russland` (`region`, `id_city`, `city`) VALUES
('Moscowia',	77,	'Moscow'),
('Moscowia',	78,	'S-Peterburg'),
('Moscowia',	93,	'Krasnodar'),
('Moscowia',	96,	'Ekaterinburg'),
('West_Siberia',	55,	'Omsk'),
('West_Siberia',	154,	'Novosibirsk'),
('West_Siberia',	72,	'Tumen'),
('West_Siberia',	86,	'Han. Mans'),
('East_Siberia',	88,	'Krasnoyarsk'),
('East_Siberia',	85,	'Irkutsk'),
('East_Siberia',	103,	'Ulan'),
('East_Siberia',	84,	'Norilsk'),
('Far_East',	125,	'Vladivostok'),
('Far_East',	24,	'Habarovsk'),
('Far_East',	25,	'Nahodka'),
('Far_East',	28,	'Blagovechensk');

-- 2016-04-29 12:00:47
