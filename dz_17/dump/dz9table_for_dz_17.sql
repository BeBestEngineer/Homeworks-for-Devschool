-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(20) NOT NULL,
  `company_address` varchar(20) NOT NULL,
  `website` varchar(20) NOT NULL,
  `seller_name` varchar(20) NOT NULL,
  `vk_account` varchar(20) NOT NULL,
  `e_mail` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `city_id` varchar(20) NOT NULL,
  `category_id` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `seller_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ads` (`id`, `company_name`, `company_address`, `website`, `seller_name`, `vk_account`, `e_mail`, `phone_number`, `city_id`, `category_id`, `title`, `description`, `price`, `seller_type`) VALUES
(1412,	'',	'',	'',	'f',	'358',	'500500@gmail.com',	'+1-400-200-77-99',	'empty',	'empty',	'HoverBoards BTF',	'cdcd2',	'1 000 000',	'Individual'),
(1419,	'General Electric',	'g',	'http://as.net',	'',	'',	'info@ml.net',	'+1-400-200-77-99',	'empty',	'empty',	'M100',	'p',	'1 000 000 000',	'Company'),
(1427,	'g',	'g',	'http://as.net',	'',	'',	'500500@gmail.com',	'+1-400-200-77-99',	'78',	'fb',	'g',	'Test 1 Company',	'1',	'Company'),
(1429,	'',	'',	'',	'I',	'I',	'info@ml.net',	'+1-400-200-77-99',	'93',	'fb',	'I',	'I tEST iNDIVIDUAL 2',	'2',	'Individual'),
(1430,	'',	'',	'',	'G',	'G',	'info@ml.net',	'+1-400-200-77-99',	'93',	'fb',	'G',	'G TEST INDIVIDUAL',	'3',	'Individual'),
(1431,	'C',	'C',	'http://as.net',	'',	'',	'500500@gmail.com',	'+1-400-200-77-99',	'78',	'fw',	'C',	'C',	'4',	'Company'),
(1426,	'',	'',	'',	'AllVOO',	'300600',	'info@ml.net',	'+1-400-200-77-99',	'154',	'ho',	'Thing 1000',	'88',	'10',	'Individual');

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

DROP TABLE IF EXISTS `copy_ads`;
CREATE TABLE `copy_ads` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(20) NOT NULL,
  `company_address` varchar(20) NOT NULL,
  `website` varchar(20) NOT NULL,
  `seller_name` varchar(20) NOT NULL,
  `vk_account` varchar(20) NOT NULL,
  `e_mail` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `city_id` varchar(20) NOT NULL,
  `category_id` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `seller_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `copy_ads` (`id`, `company_name`, `company_address`, `website`, `seller_name`, `vk_account`, `e_mail`, `phone_number`, `city_id`, `category_id`, `title`, `description`, `price`, `seller_type`) VALUES
(1254,	'',	'',	'',	'U',	'U',	'U',	'U',	'103',	'empty',	'U',	'U',	'U',	'Individual'),
(1253,	'',	'',	'',	'V1',	'V1',	'V1',	'V1',	'78',	'ph',	'V1',	'V1',	'V1',	'Individual'),
(1260,	'',	'',	'',	'2',	'2',	'2',	'2',	'empty',	'empty',	'2',	'2',	'2',	'Individual'),
(1255,	'7',	'7',	'7',	'',	'',	'7',	'7',	'77',	'ph',	'7',	'u7',	'7',	'Company'),
(1256,	'a',	'',	'',	'',	'',	'',	'',	'empty',	'empty',	'a',	'',	'1',	'Company'),
(1257,	'a',	'',	'',	'',	'',	'',	'',	'empty',	'empty',	'a',	'',	'1',	'Company'),
(1259,	'D',	'D',	'D',	'',	'',	'D',	'D',	'78',	'fw',	'D',	'D',	'D',	'Company'),
(1261,	'',	'',	'',	'5',	'5',	'5',	'5',	'empty',	'empty',	'5',	'5',	'5',	'Individual'),
(1288,	'f',	'',	'',	'',	'',	'',	'',	'empty',	'empty',	'f',	'',	'f',	'Company'),
(1289,	'f',	'',	'',	'',	'',	'',	'',	'empty',	'empty',	'f',	'',	'f',	'Company'),
(1290,	'4',	'',	'',	'',	'',	'',	'',	'empty',	'empty',	'4',	'',	'4',	'Company'),
(1291,	'8',	'',	'',	'',	'',	'',	'',	'empty',	'empty',	'8',	'',	'8',	'Company'),
(1292,	'o',	'',	'',	'',	'',	'',	'',	'empty',	'empty',	'o',	'',	'o',	'Company'),
(1297,	'B',	'',	'',	'',	'',	'',	'',	'empty',	'empty',	'B',	'',	'B',	'Company'),
(1299,	'D',	'',	'',	'',	'',	'',	'',	'empty',	'empty',	'D',	'',	'D',	'Company'),
(1295,	'2',	'',	'',	'',	'',	'',	'',	'empty',	'empty',	'2',	'',	'2',	'Company');

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

-- 2016-05-26 13:50:35
