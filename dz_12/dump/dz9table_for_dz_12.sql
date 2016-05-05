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
(116,	'',	'',	'',	'Name',	'',	'',	'',	'',	'',	'Title',	'',	'100',	'Individual');

DROP TABLE IF EXISTS `ads_old`;
CREATE TABLE `ads_old` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(20) NOT NULL,
  `vk_account` varchar(20) NOT NULL,
  `e_mail` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `city_id` varchar(20) NOT NULL,
  `category_id` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ads_old` (`id`, `seller_name`, `vk_account`, `e_mail`, `phone_number`, `city_id`, `category_id`, `title`, `description`, `price`) VALUES
(161,	'',	'',	'',	'+7-000-111-22-44',	'77',	'ho',	'Novaya Riga House',	'',	'100'),
(152,	'Darya',	'',	'dasha@spb.ola',	'+7-000-111-22-44',	'78',	'av',	'BestSound',	'',	'50 000'),
(163,	'',	'',	'',	'+7-000-111-22-44',	'',	'',	'Mazda RX-8',	'',	'100 000'),
(135,	'KSANDR',	'',	'',	'+7-000-111-22-44',	'',	'',	'AMG E63 2',	'',	'100'),
(119,	'AL',	'',	'',	'+7-000-111-22-44',	'103',	'fb',	'Olds Mobile Toronado',	'',	'100 000'),
(125,	'ALL',	'',	'',	'+7-000-111-22-44',	'78',	'ot',	'IHT 1971s',	'',	'100 000 000'),
(110,	'KSANDR',	'',	'',	'+7-000-111-22-44',	'',	'',	'Toyota Tundra',	'',	'100'),
(111,	'AL',	'',	'AL@mail.com',	'+7-926-458-98-69',	'78',	'ho',	'LUX APPART',	'AMMMAZZZING HOUSSSES OF SP',	'550 000 000 000'),
(123,	'KSANDR',	'',	'',	'+7-000-111-22-44',	'',	'',	'Toyota Mark X',	'',	'100'),
(124,	'AL',	'',	'',	'+7-000-111-22-44',	'78',	'ot',	'Mazda RX-7',	'',	'100'),
(164,	'Name',	'somewhere in SP',	'',	'+7-000-111-22-44',	'',	'',	'GTX 1090',	'',	'100'),
(165,	'ALLION',	'somewhere in SP',	'',	'+7-444-88-99',	'77',	'ws',	'GTX 1090',	'',	'100');

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

-- 2016-05-05 07:02:22
