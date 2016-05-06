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
(158,	'',	'',	'',	'Alexa',	'vk.com/3852',	'300600@gmail.coma',	'+7-400-200-10-101',	'78',	'ho',	'MEGAHOUSE2',	'LUXURY2',	'100 000 0001',	'Individual'),
(121,	'',	'',	'',	'Name',	'378',	'al@post.ya',	'+4-100-200-88-88',	'78',	'fo',	'Mazda Rx-550',	'Electric Zombie',	'225 000',	'Individual'),
(150,	'',	'',	'',	'Alex',	'vk.com/385',	'300600@gmail.com',	'+4-100-200-88-88',	'78',	'sm',	'Lumia 1720',	'6.4 inch QHD\r\n30 MP ',	'30 000',	'Individual'),
(159,	'Boiler',	'CAO',	'boiler.omsk',	'',	'',	'900900@omsk.omsk',	'+7-381-250-50-50',	'55',	'fd',	'FALLOUT PACKAGE',	'FOR YOU',	'18',	'Company'),
(125,	'Microsoft',	'',	'',	'',	'',	'',	'',	'78',	'sm',	'Lumia 1520',	'',	'12 000',	'Company'),
(161,	'DreamWorks',	'Los-Angeles CA',	'',	'',	'',	'',	'',	'',	'',	'Title',	'',	'100',	'Company'),
(163,	'DreamWorks',	'Los-Angeles CA',	'',	'',	'',	'',	'',	'',	'',	'Title',	'',	'100',	'Company');

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

-- 2016-05-06 15:22:16
