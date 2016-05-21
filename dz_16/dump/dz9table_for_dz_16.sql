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
(1242,	'A1',	'A',	'A',	'',	'',	'A',	'A',	'empty',	'empty',	'A1',	'A',	'A1',	'Company'),
(1243,	'B',	'B',	'B',	'',	'',	'B',	'B',	'empty',	'empty',	'B',	'B',	'B',	'Company'),
(1244,	'',	'',	'',	'',	'',	'',	'',	'empty',	'empty',	'Hoverboard',	'',	'50 0000',	'Company'),
(1245,	'',	'',	'',	'AL1',	'vk.com/3851',	'300600@gmail.com1',	'+0 000-000-00-001',	'78',	'ws',	'HoverBoard1',	'Ammmazzzing Board1',	'300 0001',	'Individual'),
(1246,	'Nissan',	'Japan',	'nissan.jp',	'',	'',	'info@nissan.jp',	'+3-100-200-30-40',	'78',	'fb',	'370Z',	'6.6 L',	'50 000',	'Company'),
(1247,	'',	'',	'',	'In1',	'In1',	'In1',	'In1',	'77',	'ot',	'In1',	'In1',	'In1',	'Individual'),
(1248,	'In1',	'In1',	'In1',	'',	'',	'In1',	'In1',	'78',	'fb',	'In1',	'In1',	'In1',	'Company');

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

-- 2016-05-21 16:52:58
