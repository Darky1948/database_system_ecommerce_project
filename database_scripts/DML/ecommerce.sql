-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 14 Octobre 2017 à 20:31
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(6) UNSIGNED NOT NULL,
  `account` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `idArticle` int(6) UNSIGNED NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL,
  `article_size` varchar(30) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idType` int(6) UNSIGNED DEFAULT NULL,
  `idBrand` int(6) UNSIGNED DEFAULT NULL,
  `idMedia` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`idArticle`, `libelle`, `price`, `quantity`, `article_size`, `color`, `reg_date`, `idType`, `idBrand`, `idMedia`) VALUES
(1, 'WROGN Men\'s Purple Printed Polo T-Shirt', '979', 5, 'L', 'Purple', '2017-10-13 13:56:00', 1, 2, 1),
(2, 'DUKE Multi Color Striped Polo T-shirt', '795', 5, 'L', 'Multicolor', '2017-10-13 13:56:01', 1, 1, 2),
(3, 'DNMX Gray & Black Striped Polo T-shirt', '699', 5, 'L', 'Multicolor', '2017-10-13 13:56:01', 1, 4, 3),
(4, 'Celio Navy & Green Slim Fit Polo T-shirt', '950', 5, 'L', 'Navy blue', '2017-10-13 13:56:01', 1, 3, 4),
(5, 'Fighting Fame Printed Denim Henley T-Shirt', '999', 5, 'L', 'Navy blue', '2017-10-14 13:17:09', 2, 1, 5),
(6, 'Yukth Solid Mens Henley Green T-Shirt', '950', 5, 'L', 'Navy blue', '2017-10-14 13:17:09', 2, 6, 6),
(7, 'Bi fashion Henley maroon Half sleeve T-shirt', '399', 5, 'L', 'Maroon', '2017-10-14 13:17:09', 2, 7, 8),
(8, 'Metronaut Striped Men\'s Henley White T-Shirt', '404', 5, 'L', 'Half Sleeve', '2017-10-14 13:17:09', 2, 8, 9),
(9, 'Symbol Yellow Cotton V-Neck Men\'s T-Shirt', '999', 5, 'L', 'Yellow', '2017-10-14 13:20:50', 3, 7, 10),
(10, 'Seven Rocks Men\'s Black V-Neck Cotton Tshirt', '999', 5, 'L', 'Black', '2017-10-14 13:20:50', 3, 7, 11),
(11, 'Jockey Men\'s Black Cotton V-Neck T-Shirt', '999', 5, 'L', 'Black', '2017-10-14 13:20:50', 3, 7, 12),
(12, 'ZCELL Black Cotton Solid Slim Fit Casual T-Shirts', '999', 5, 'L', 'Black Gray', '2017-10-14 13:20:50', 3, 7, 13),
(13, 'Spykar Navy Blue Striped Regular Fit Round Neck T-Shirt', '990', 5, 'L', 'Navy blue', '2017-10-14 13:23:29', 4, 7, 13),
(14, 'Gritstones Brown Striped Round Neck T-Shirt', '990', 5, 'L', 'Multicolor', '2017-10-14 13:23:29', 4, 7, 14),
(15, 'Rigo Rust Striped Regular Fit Round Neck T-Shirt', '450', 5, 'L', 'Rust', '2017-10-14 13:23:30', 4, 7, 15),
(16, 'Cult Fiction Green Striped Regular Fit Round Neck T-Shirt', '518', 5, 'L', 'Grey green', '2017-10-14 13:23:30', 4, 7, 16),
(17, 'AJIO Graphic Print T-shirt', '200', 5, 'L', 'Grey green', '2017-10-14 13:26:13', 5, 7, 17),
(18, 'Mexx Black Printed Regular Fit Round Neck T-Shirt', '242', 5, 'L', 'Black', '2017-10-14 13:26:13', 5, 7, 18),
(19, 'AJIO Graphic Print T-shirt', '195', 5, 'L', 'Black', '2017-10-14 13:26:13', 5, 7, 19),
(20, 'AJIO Printed Crew-Neck T-shirt', '230', 5, 'L', 'Multicolor', '2017-10-14 13:26:13', 5, 7, 20),
(21, 'Spring Break Men\'s Black & White Color Block T-Shirt With Patch Pocket', '499', 5, 'L', 'Black White', '2017-10-14 13:28:49', 6, 5, 21),
(22, 'Mast & Harbour White Striped V-Neck Pocket Tee', '499', 5, 'L', 'White', '2017-10-14 13:28:49', 6, 2, 22),
(23, 'Indigo Nation Maroon Printed Round Neck Pocket Tee', '499', 5, 'L', 'Maroon', '2017-10-14 13:28:49', 6, 1, 23),
(24, 'HIGHLANDER colour block cotton t-shirt', '274', 5, 'L', 'Multicolor', '2017-10-14 13:28:49', 6, 3, 24),
(25, 'Kindred Extended Hem T-Shirt With Suspender', '499', 5, 'L', 'Black', '2017-10-14 13:31:11', 7, 8, 25),
(26, 'Garcon Peach & Blue Solid Crew Neck T-Shirt', '899', 5, 'L', 'Black', '2017-10-14 13:31:11', 7, 7, 26),
(27, 'Funky Guys Solid Men\'s Round Neck Yellow T-Shirt', '177', 5, 'L', 'Yellow', '2017-10-14 13:31:11', 7, 7, 27),
(28, 'Blotch Red Cotton Striped Sleeve With Zip T-shirt', '177', 5, 'L', 'Red', '2017-10-14 13:31:11', 7, 6, 28),
(29, 'KOOVS Back Print Hooded T-Shirt', '799', 5, 'L', 'Grey', '2017-10-14 13:33:11', 8, 1, 29),
(30, 'KOOVS Olive Back Printed Hooded T-Shirt', '799', 5, 'L', 'Olive', '2017-10-14 13:33:11', 8, 2, 30),
(31, 'KOOVS Slogan Print Double Sleeve Hooded Twofer', '999', 5, 'L', 'Black', '2017-10-14 13:33:11', 8, 3, 31),
(32, 'FOREVER 21 Men Pink Solid Hooded T-shirt', '949', 5, 'L', 'Pink', '2017-10-14 13:33:11', 8, 4, 32),
(33, 'AJIO Flock Print Crew-Neck T-shirt', '200', 5, 'L', 'MultiColor', '2017-10-14 13:35:33', 9, 4, 33),
(34, 'AJIO Printed Crew-Neck T-shirt', '160', 5, 'L', 'Yellow', '2017-10-14 13:35:34', 9, 5, 34),
(35, 'AJIO Typographic Print Crew-Neck T-shirt', '200', 5, 'L', 'Blue', '2017-10-14 13:35:34', 9, 6, 35),
(36, 'AJIO Printed Crew-Neck T-shirt', '200', 5, 'L', 'Grey', '2017-10-14 13:35:34', 9, 7, 36),
(37, 'KOOVS Extreme Scoop Neck T-Shirt', '399', 5, 'L', 'Green', '2017-10-14 13:37:25', 10, 8, 37),
(38, 'KOOVS Scoop Neck T-Shirt', '395', 5, 'L', 'Black', '2017-10-14 13:37:25', 10, 1, 38),
(39, 'Blue Saint Exclusive Scoop Neck T-Shirt', '399', 5, 'L', 'Blue Saint', '2017-10-14 13:37:25', 10, 2, 39),
(40, 'KOOVS Extreme Scoop Neck T-Shirt', '399', 5, 'L', 'Kind of white', '2017-10-14 13:37:26', 10, 3, 40);

-- --------------------------------------------------------

--
-- Structure de la table `articletype`
--

CREATE TABLE `articletype` (
  `idType` int(6) UNSIGNED NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idCategory` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articletype`
--

INSERT INTO `articletype` (`idType`, `libelle`, `valid`, `reg_date`, `idCategory`) VALUES
(1, 'POLO', 1, '2017-10-13 11:37:43', 7),
(2, 'HENLEY', 1, '2017-10-13 11:37:43', 7),
(3, 'V-NECK', 1, '2017-10-14 13:38:43', 7),
(4, 'STRIPED', 1, '2017-10-13 11:37:43', 7),
(5, 'GRAPHIC', 1, '2017-10-13 11:37:43', 7),
(6, 'POCKET', 1, '2017-10-13 11:37:43', 7),
(7, 'SOLID/PLAIN', 1, '2017-10-13 11:37:43', 7),
(8, 'HOODED', 1, '2017-10-13 11:37:44', 7),
(9, 'CREW NECK', 1, '2017-10-13 11:37:44', 7),
(10, 'U NECK/SCOOP NECK', 1, '2017-10-13 11:37:44', 7);

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `idBrand` int(6) UNSIGNED NOT NULL,
  `brand_name` varchar(30) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `brand`
--

INSERT INTO `brand` (`idBrand`, `brand_name`, `reg_date`) VALUES
(1, 'DUKE', '2017-10-13 13:49:56'),
(2, 'WROGN', '2017-10-13 13:49:56'),
(3, 'CELIO', '2017-10-13 13:49:56'),
(4, 'DNMX', '2017-10-13 13:50:19'),
(5, 'DENIM', '2017-10-14 13:08:10'),
(6, 'Yukth', '2017-10-14 13:08:10'),
(7, 'Unknown', '2017-10-14 13:08:10'),
(8, 'Metronaut', '2017-10-14 13:08:10');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `idCustomer` int(6) UNSIGNED NOT NULL,
  `idArticle` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idCategory` int(6) UNSIGNED NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`idCategory`, `libelle`, `reg_date`) VALUES
(7, 'T-SHIRT', '2017-10-13 11:34:15'),
(8, 'PANTS', '2017-10-13 11:34:15'),
(9, 'SHOES', '2017-10-13 11:34:15');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `idComment` int(6) UNSIGNED NOT NULL,
  `text` varchar(500) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idArticle` int(6) UNSIGNED DEFAULT NULL,
  `idCustomer` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`idComment`, `text`, `reg_date`, `idArticle`, `idCustomer`) VALUES
(221, 'tincidunt', '2017-03-11 11:20:58', 31, 3),
(233, 'nec ante. Maecenas mi felis, adipiscing', '2017-10-14 14:36:44', 1, 2),
(234, 'et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae', '2017-10-14 14:37:09', 1, 2),
(235, 'tincidunt', '2017-03-11 11:20:58', 31, 3),
(236, 'nisl. Quisque fringilla euismod enim. Etiam', '2018-05-07 13:08:12', 2, 4),
(237, 'Aenean sed pede nec', '2017-04-21 09:19:09', 24, 1),
(240, 'a, malesuada id, erat. Etiam vestibulum massa rutrum magna.', '2017-08-25 10:48:47', 6, 1),
(241, 'litora torquent per conubia nostra, per inceptos', '2018-06-14 04:51:24', 21, 3),
(242, 'Proin', '2018-09-28 12:29:25', 8, 4),
(243, 'ut, pharetra sed, hendrerit a, arcu.', '2017-06-10 18:03:19', 29, 3),
(244, 'in sodales', '2017-04-10 17:28:44', 39, 2),
(245, 'porttitor tellus non magna.', '2018-03-25 09:50:44', 10, 2),
(246, 'velit egestas lacinia. Sed congue, elit', '2018-05-31 00:14:50', 26, 4),
(247, 'et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae', '2017-06-29 03:23:30', 3, 1),
(250, 'a, malesuada id, erat. Etiam vestibulum massa rutrum magna.', '2017-08-25 10:48:47', 6, 1),
(251, 'litora torquent per conubia nostra, per inceptos', '2018-06-14 04:51:24', 21, 3),
(252, 'Proin', '2018-09-28 12:29:25', 8, 4),
(253, 'ut, pharetra sed, hendrerit a, arcu.', '2017-06-10 18:03:19', 29, 3),
(254, 'in sodales', '2017-04-10 17:28:44', 39, 2),
(255, 'porttitor tellus non magna.', '2018-03-25 09:50:44', 10, 2),
(256, 'velit egestas lacinia. Sed congue, elit', '2018-05-31 00:14:50', 26, 4),
(257, 'et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae', '2017-06-29 03:23:30', 3, 1),
(258, 'fermentum arcu. Vestibulum ante ipsum primis in faucibus orci', '2017-03-22 10:09:00', 13, 4),
(259, 'metus eu', '2017-09-26 10:49:53', 26, 1),
(260, 'vitae, orci. Phasellus dapibus quam quis', '2018-03-10 06:28:30', 11, 3),
(261, 'non dui', '2017-07-26 11:34:31', 39, 4),
(262, 'enim. Sed nulla ante, iaculis nec, eleifend non, dapibus', '2017-04-03 21:47:20', 6, 1),
(263, 'sapien, gravida non,', '2017-12-24 16:19:14', 33, 4),
(264, 'sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum', '2018-09-07 11:11:01', 28, 2),
(265, 'cursus in, hendrerit consectetuer, cursus et, magna. Praesent', '2017-04-04 19:14:21', 20, 4),
(266, 'egestas a, dui. Cras pellentesque.', '2018-02-08 22:06:13', 1, 3),
(267, 'tristique senectus', '2017-07-31 10:39:01', 20, 4),
(268, 'non, sollicitudin a, malesuada id,', '2017-08-20 10:42:44', 18, 1),
(269, 'vel pede blandit congue. In scelerisque', '2017-02-14 03:06:22', 3, 2),
(270, 'gravida.', '2018-02-10 02:39:09', 14, 4),
(271, 'sem semper erat,', '2017-03-17 16:49:43', 34, 3),
(272, 'augue eu tellus. Phasellus elit pede, malesuada vel,', '2018-09-19 14:42:23', 22, 2),
(273, 'tortor. Integer aliquam adipiscing', '2018-08-14 04:03:18', 21, 3),
(274, 'penatibus et magnis dis parturient montes, nascetur ridiculus', '2017-04-12 12:01:44', 8, 1),
(275, 'non, hendrerit id, ante. Nunc mauris sapien, cursus in,', '2017-01-13 17:00:44', 8, 4),
(276, 'vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque', '2017-01-16 20:46:46', 29, 3),
(277, 'et ultrices posuere cubilia Curae; Donec tincidunt.', '2017-01-07 22:11:39', 4, 4),
(278, 'vitae, orci. Phasellus dapibus quam quis', '2018-03-10 06:28:30', 11, 3),
(279, 'non dui', '2017-07-26 11:34:31', 39, 4),
(280, 'enim. Sed nulla ante, iaculis nec, eleifend non, dapibus', '2017-04-03 21:47:20', 6, 1),
(281, 'sapien, gravida non,', '2017-12-24 16:19:14', 33, 4),
(282, 'sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum', '2018-09-07 11:11:01', 28, 2),
(283, 'cursus in, hendrerit consectetuer, cursus et, magna. Praesent', '2017-04-04 19:14:21', 20, 4),
(284, 'egestas a, dui. Cras pellentesque.', '2018-02-08 22:06:13', 1, 3),
(285, 'tristique senectus', '2017-07-31 10:39:01', 20, 4),
(286, 'non, sollicitudin a, malesuada id,', '2017-08-20 10:42:44', 18, 1),
(287, 'vel pede blandit congue. In scelerisque', '2017-02-14 03:06:22', 3, 2),
(288, 'gravida.', '2018-02-10 02:39:09', 14, 4),
(289, 'sem semper erat,', '2017-03-17 16:49:43', 34, 3),
(290, 'augue eu tellus. Phasellus elit pede, malesuada vel,', '2018-09-19 14:42:23', 22, 2),
(291, 'tortor. Integer aliquam adipiscing', '2018-08-14 04:03:18', 21, 3),
(292, 'penatibus et magnis dis parturient montes, nascetur ridiculus', '2017-04-12 12:01:44', 8, 1),
(293, 'non, hendrerit id, ante. Nunc mauris sapien, cursus in,', '2017-01-13 17:00:44', 8, 4),
(294, 'vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque', '2017-01-16 20:46:46', 29, 3),
(295, 'et ultrices posuere cubilia Curae; Donec tincidunt.', '2017-01-07 22:11:39', 4, 4),
(296, 'Maecenas mi', '2018-01-22 12:18:11', 23, 1),
(297, 'adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero', '2018-04-18 21:36:03', 22, 4),
(298, 'convallis convallis dolor.', '2018-07-10 08:34:30', 26, 2),
(299, 'Maecenas mi felis, adipiscing fringilla, porttitor', '2018-09-23 11:40:09', 38, 4),
(300, 'Curabitur ut odio vel est tempor bibendum.', '2018-09-20 09:19:44', 14, 4),
(301, 'ipsum sodales purus, in molestie', '2017-03-07 05:44:26', 24, 4),
(302, 'gravida nunc sed pede. Cum sociis natoque', '2017-08-31 08:29:47', 3, 3),
(303, 'sit amet risus. Donec egestas. Aliquam nec enim.', '2017-10-29 03:39:40', 14, 4),
(304, 'laoreet lectus', '2018-07-27 22:26:39', 6, 4),
(305, 'tempus risus. Donec egestas. Duis ac arcu. Nunc mauris.', '2018-08-23 01:44:17', 24, 4),
(306, 'rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet,', '2017-02-21 16:30:43', 24, 4),
(307, 'sapien imperdiet ornare. In faucibus. Morbi', '2017-04-29 11:37:38', 13, 3),
(308, 'velit. Pellentesque', '2017-10-11 06:33:38', 2, 3),
(309, 'orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero', '2018-03-28 20:24:18', 12, 4),
(310, 'tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam.', '2018-04-12 15:06:08', 4, 2),
(311, 'interdum. Nunc', '2017-04-11 15:40:47', 9, 3),
(312, 'Sed neque. Sed', '2016-12-10 06:00:48', 40, 4),
(313, 'ornare tortor at risus.', '2017-01-14 05:14:46', 38, 3),
(314, 'id, ante. Nunc mauris sapien, cursus', '2018-09-13 23:17:30', 8, 4),
(315, 'consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque,', '2018-03-21 08:23:12', 30, 4),
(316, 'mus. Proin', '2016-12-09 09:02:24', 14, 4),
(317, 'vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu.', '2016-10-31 11:07:17', 20, 1),
(318, 'Mauris blandit enim consequat', '2017-03-20 03:43:36', 3, 3),
(319, 'orci', '2017-09-24 14:21:02', 40, 4),
(320, 'a odio semper cursus. Integer mollis.', '2017-06-22 06:16:04', 13, 4),
(321, 'neque. Nullam ut nisi a', '2018-07-06 00:11:36', 1, 3),
(322, 'porttitor tellus non magna. Nam ligula', '2016-12-04 22:43:30', 3, 4),
(323, 'magna a tortor. Nunc', '2017-11-22 16:48:34', 9, 4),
(324, 'tempor erat neque non', '2016-10-21 01:42:44', 23, 1),
(325, 'enim, gravida sit amet, dapibus id, blandit at,', '2017-03-03 19:37:30', 19, 3),
(326, 'nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet.', '2018-04-24 02:19:28', 24, 4),
(327, 'lorem fringilla ornare placerat, orci', '2017-02-10 00:06:24', 11, 4),
(328, 'fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat', '2018-09-27 20:46:41', 17, 4),
(329, 'mollis lectus pede et', '2017-04-07 05:46:24', 30, 3),
(330, 'laoreet posuere, enim nisl elementum purus,', '2017-08-30 18:47:41', 34, 4),
(331, 'In ornare sagittis felis. Donec tempor, est ac mattis semper,', '2016-12-31 23:07:24', 7, 2),
(332, 'feugiat placerat velit. Quisque varius. Nam porttitor scelerisque', '2017-12-08 03:00:44', 37, 4),
(333, 'tempus', '2016-10-30 07:21:49', 33, 1),
(334, 'et pede. Nunc sed orci lobortis', '2017-12-18 10:20:04', 17, 2),
(335, 'amet ante. Vivamus non lorem vitae odio sagittis semper.', '2017-01-18 18:36:12', 14, 4),
(336, 'Aliquam ornare, libero', '2017-09-26 16:43:34', 32, 3),
(337, 'euismod est arcu ac orci. Ut semper pretium neque.', '2017-04-07 19:14:38', 38, 2),
(338, 'eu lacus. Quisque imperdiet, erat nonummy ultricies ornare,', '2018-04-26 08:18:43', 34, 4),
(339, 'tincidunt, nunc ac mattis ornare, lectus', '2017-09-14 02:44:46', 33, 4),
(340, 'erat neque non quam.', '2018-09-01 15:46:49', 21, 4),
(341, 'lacinia orci, consectetuer euismod', '2016-12-16 22:43:03', 32, 4),
(342, 'inceptos hymenaeos. Mauris ut quam vel sapien', '2017-02-06 05:43:26', 17, 4),
(343, 'ut nisi a odio semper cursus. Integer mollis. Integer tincidunt', '2018-04-13 23:48:44', 32, 2),
(344, 'Praesent luctus. Curabitur egestas nunc sed libero.', '2017-03-06 17:47:14', 21, 4),
(345, 'mauris.', '2017-04-17 22:40:23', 36, 1),
(346, 'quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus', '2017-04-23 04:33:13', 21, 4),
(347, 'non, lobortis quis,', '2017-02-19 09:01:34', 33, 2),
(348, 'tristique neque venenatis', '2018-04-30 19:23:23', 23, 4),
(349, 'tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris.', '2017-03-18 13:24:47', 40, 3),
(350, 'id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim', '2017-11-04 13:13:40', 29, 4),
(351, 'quam. Pellentesque habitant morbi tristique senectus et netus et malesuada', '2018-10-02 09:44:20', 22, 1),
(352, 'eleifend, nunc risus varius orci,', '2017-11-01 13:31:40', 14, 3),
(353, 'Suspendisse', '2017-09-03 16:01:44', 32, 1),
(354, 'Cras sed leo. Cras vehicula aliquet libero. Integer in magna.', '2018-01-01 09:42:37', 40, 4),
(355, 'Donec est. Nunc ullamcorper, velit', '2017-09-24 00:43:38', 38, 1);

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(6) UNSIGNED NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `postalcode` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `customer`
--

INSERT INTO `customer` (`idCustomer`, `lastname`, `firstname`, `adresse`, `postalcode`, `city`, `country`, `email`, `phone`, `password`, `reg_date`) VALUES
(1, 'Kato', 'Chase', '3424 Neque Avenue', 'C6V 8T8', 'Pak Pattan', 'Honduras', 'augue.ut.lacus@eget.ca', '09 92 15 55 19', 'a184ebbf0fb95211de38b9bc2be7e6c8dc55f69527af327c28ce6c15615d4757', '2017-07-15 18:08:42'),
(2, 'Quinn', 'Harrison', 'P.O. Box 378, 1032 Mus. Road', '9042', 'San Polo d\'Enza', 'Rwanda', 'Nunc.ac.sem@Cras.edu', '05 05 06 56 85', 'a184ebbf0fb95211de38b9bc2be7e6c8dc55f69527af327c28ce6c15615d4757', '2016-12-30 02:32:01'),
(3, 'Xanthus', 'Leo', '7796 Donec Av.', '23802-164', 'Newark', 'Falkland Islands', 'sodales.nisi.magna@quisdiam.co.uk', '03 59 74 05 86', 'a184ebbf0fb95211de38b9bc2be7e6c8dc55f69527af327c28ce6c15615d4757', '2018-05-06 22:41:29'),
(4, 'Yuli', 'Tyler', 'P.O. Box 473, 2400 Eu Street', '5736', 'Hantes-WihŽries', 'Slovenia', 'nostra@accumsan.co.uk', '01 80 28 58 15', 'a184ebbf0fb95211de38b9bc2be7e6c8dc55f69527af327c28ce6c15615d4757', '2018-10-11 15:51:21');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `idMedia` int(6) UNSIGNED NOT NULL,
  `file_path` varchar(200) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`idMedia`, `file_path`, `file_name`, `reg_date`) VALUES
(1, 'https://img.looksgud.com/upload/item-image/694/evnf/evnf-wrogn-men-s-purple-printed-polo-t-shirt_300x300_0.jpg', 'evnf-wrogn-men-s-purple-printed-polo-t-shirt_300x300_0.jpg', '2017-10-13 13:06:00'),
(2, 'https://img.looksgud.com/upload/item-image/693/euzq/euzq-duke-multi-color-striped-polo-t-shirt_300x300_0.jpg', 'euzq-duke-multi-color-striped-polo-t-shirt_300x300_0.jpg', '2017-10-13 13:06:00'),
(3, 'https://img.looksgud.com/upload/item-image/693/evbr/evbr-dnmx-gray-black-striped-polo-t-shirt_300x300_0.jpg', 'evbr-dnmx-gray-black-striped-polo-t-shirt_300x300_0.jpg', '2017-10-13 13:06:00'),
(4, 'https://img.looksgud.com/upload/item-image/693/evdk/evdk-celio-navy-green-slim-fit-polo-t-shirt_300x300_0.jpg', 'evdk-celio-navy-green-slim-fit-polo-t-shirt_300x300_0.jpg', '2017-10-13 13:06:00'),
(5, 'https://img.looksgud.com/upload/item-image/715/fbpa/fbpa-fighting-fame-printed-denim-henley-t-shirt_300x300_0.jpg', 'fbpa-fighting-fame-printed-denim-henley-t-shirt_300x300_0.jpg', '2017-10-13 13:07:51'),
(6, 'https://img.looksgud.com/upload/item-image/719/ffak/ffak-yukth-solid-mens-henley-green-t-shirt_300x300_0.jpg', 'ffak-yukth-solid-mens-henley-green-t-shirt_300x300_0.jpg', '2017-10-13 13:07:51'),
(7, 'https://img.looksgud.com/upload/item-image/719/ffb9/ffb9-bi-fashion-henley-maroon-half-sleeve-t-shirt_300x300_0.jpg', 'ffb9-bi-fashion-henley-maroon-half-sleeve-t-shirt_300x300_0.jpg', '2017-10-13 13:07:51'),
(8, 'https://img.looksgud.com/upload/item-image/692/eucn/eucn-yukth-solid-mens-henley-maroon-t-shirt_300x300_0.jpg', 'eucn-yukth-solid-mens-henley-maroon-t-shirt_300x300_0.jpg', '2017-10-13 13:07:51'),
(9, 'https://img.looksgud.com/upload/item-image/723/fihy/fihy-symbol-yellow-cotton-v-neck-men-s-t-shirt_300x300_0.jpg', 'fihy-symbol-yellow-cotton-v-neck-men-s-t-shirt_300x300_0.jpg', '2017-10-13 13:09:37'),
(10, 'https://img.looksgud.com/upload/item-image/665/e983/e983-seven-rocks-men-s-black-v-neck-cotton-tshirt_300x300_0.jpg', 'e983-seven-rocks-men-s-black-v-neck-cotton-tshirt_300x300_0.jpg', '2017-10-13 13:09:37'),
(11, 'https://img.looksgud.com/upload/item-image/686/epso/epso-zcell-black-cotton-solid-slim-fit-casual-t-shirts_300x300_0.jpg', '/epso-zcell-black-cotton-solid-slim-fit-casual-t-shirts_300x300_0.jpg', '2017-10-13 13:09:37'),
(12, 'https://img.looksgud.com/upload/item-image/95/21f5/21f5-jockey-mens-cotton-t-shirt_300x300_0.jpg', '21f5-jockey-mens-cotton-t-shirt_300x300_0.jpg', '2017-10-13 13:09:37'),
(13, 'https://img.looksgud.com/upload/item-image/724/fiuw/fiuw-gritstones-brown-striped-round-neck-t-shirt_300x300_0.jpg', 'fiuw-gritstones-brown-striped-round-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(14, 'https://img.looksgud.com/upload/item-image/724/fiyd/fiyd-spykar-navy-blue-striped-regular-fit-round-neck-t-shirt_300x300_0.jpg', 'fiyd-spykar-navy-blue-striped-regular-fit-round-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(15, 'https://img.looksgud.com/upload/item-image/724/fite/fite-rigo-rust-striped-regular-fit-round-neck-t-shirt_300x300_0.jpg', 'fite-rigo-rust-striped-regular-fit-round-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(16, 'https://img.looksgud.com/upload/item-image/724/fiz3/fiz3-cult-fiction-green-striped-regular-fit-round-neck-t-shirt_300x300_0.jpg', 'fiz3-cult-fiction-green-striped-regular-fit-round-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(17, 'https://img.looksgud.com/upload/item-image/724/fizm/fizm-mexx-black-printed-regular-fit-round-neck-t-shirt_300x300_0.jpg', 'fizm-mexx-black-printed-regular-fit-round-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(18, 'https://img.looksgud.com/upload/item-image/723/fiil/fiil-ajio-graphic-print-t-shirt_300x300_0.jpg', 'fiil-ajio-graphic-print-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(19, 'https://img.looksgud.com/upload/item-image/724/fiqw/fiqw-ajio-graphic-print-crew-neck-t-shirt_300x300_0.jpg', 'fiqw-ajio-graphic-print-crew-neck-t-shirt_300x300_0.jp', '2017-10-13 13:44:30'),
(20, 'https://img.looksgud.com/upload/item-image/724/fiso/fiso-ajio-printed-crew-neck-t-shirt_300x300_0.jpg', 'fiso-ajio-printed-crew-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(21, 'https://img.looksgud.com/upload/item-image/326/703x/703x-spring-break-mens-black-white-color-block-t-shirt-with-patch_300x300_0.jpg', '703x-spring-break-mens-black-white-color-block-t-shirt-with-patch_300x300_0.jpg', '2017-10-13 13:44:30'),
(22, 'https://img.looksgud.com/upload/item-image/389/8crk/8crk-mast-harbour-white-striped-v-neck-pocket-tee_300x300_0.jpg', '8crk-mast-harbour-white-striped-v-neck-pocket-tee_300x300_0.jpg', '2017-10-13 13:44:30'),
(23, 'https://img.looksgud.com/upload/item-image/389/8cmg/8cmg-indigo-nation-maroon-printed-round-neck-pocket-tee_300x300_0.jpg', '8cmg-indigo-nation-maroon-printed-round-neck-pocket-tee_300x300_0.jpg', '2017-10-13 13:44:30'),
(24, 'https://img.looksgud.com/upload/item-image/585/cjhu/cjhu-highlander-colour-block-cotton-t-shirt_300x300_0.jpg', 'cjhu-highlander-colour-block-cotton-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(25, 'https://img.looksgud.com/upload/item-image/715/fc76/fc76-kindred-extended-hem-t-shirt-with-suspender_300x300_0.jpg', 'fc76-kindred-extended-hem-t-shirt-with-suspender_300x300_0.jpg', '2017-10-13 13:44:30'),
(26, 'https://img.looksgud.com/upload/item-image/713/fas8/fas8-garcon-peach-blue-solid-crew-neck-t-shirt_300x300_0.jpg', 'fas8-garcon-peach-blue-solid-crew-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(27, 'https://img.looksgud.com/upload/item-image/723/fihg/fihg-funky-guys-solid-men-s-round-neck-yellow-t-shirt_300x300_0.jpg', 'fihg-funky-guys-solid-men-s-round-neck-yellow-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(28, 'https://img.looksgud.com/upload/item-image/725/fjne/fjne-blotch-black-cotton-striped-sleeve-with-zip-t-shirt_300x300_0.jpg', 'fjne-blotch-black-cotton-striped-sleeve-with-zip-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(29, 'https://img.looksgud.com/upload/item-image/687/eqj6/eqj6-sayitloud-striped-men-s-hooded-black-white-t-shirt_300x300_0.jpg', 'eqj6-sayitloud-striped-men-s-hooded-black-white-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(30, 'https://img.looksgud.com/upload/item-image/704/f3c8/f3c8-koovs-olive-back-printed-hooded-t-shirt_300x300_0.jpg', 'f3c8-koovs-olive-back-printed-hooded-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(31, 'https://img.looksgud.com/upload/item-image/713/fadk/fadk-koovs-slogan-print-double-sleeve-hooded-twofer_300x300_0.jpg', 'fadk-koovs-slogan-print-double-sleeve-hooded-twofer_300x300_0.jpg', '2017-10-13 13:44:30'),
(32, 'https://img.looksgud.com/upload/item-image/713/faw1/faw1-koovs-back-print-hooded-t-shirt_300x300_0.jpg', 'faw1-koovs-back-print-hooded-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(33, 'https://img.looksgud.com/upload/item-image/724/fips/fips-ajio-flock-print-crew-neck-t-shirt_300x300_0.jpg', 'fips-ajio-flock-print-crew-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(34, 'https://img.looksgud.com/upload/item-image/723/fiik/fiik-ajio-printed-crew-neck-t-shirt_300x300_0.jpg', 'fiik-ajio-printed-crew-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(35, 'https://img.looksgud.com/upload/item-image/724/fise/fise-ajio-typographic-print-crew-neck-t-shirt_300x300_0.jpg', 'fise-ajio-typographic-print-crew-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(36, 'https://img.looksgud.com/upload/item-image/724/fipl/fipl-ajio-printed-crew-neck-t-shirt_300x300_0.jpg', 'fipl-ajio-printed-crew-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(37, 'https://img.looksgud.com/upload/item-image/704/f3lt/f3lt-blue-saint-exclusive-scoop-neck-t-shirt_300x300_0.jpg', 'f3lt-blue-saint-exclusive-scoop-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(38, 'https://img.looksgud.com/upload/item-image/713/fatv/fatv-koovs-extreme-scoop-neck-t-shirt_300x300_0.jpg', 'fatv-koovs-extreme-scoop-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(39, 'https://img.looksgud.com/upload/item-image/715/fbq1/fbq1-koovs-scoop-neck-t-shirt_300x300_0.jpg', 'fbq1-koovs-scoop-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:30'),
(40, 'https://img.looksgud.com/upload/item-image/713/faer/faer-koovs-extreme-scoop-neck-t-shirt_300x300_0.jpg', 'faer-koovs-extreme-scoop-neck-t-shirt_300x300_0.jpg', '2017-10-13 13:44:31');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `idOrder` int(6) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL,
  `Ordering_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idCustomer` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recommandedarticle`
--

CREATE TABLE `recommandedarticle` (
  `idRecommendedArticle` int(6) UNSIGNED NOT NULL,
  `idArticle1` int(6) UNSIGNED NOT NULL,
  `idArticle2` int(6) UNSIGNED NOT NULL,
  `percentage` decimal(10,0) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`);

--
-- Index pour la table `articletype`
--
ALTER TABLE `articletype`
  ADD PRIMARY KEY (`idType`),
  ADD KEY `FK_TypeCatergory` (`idCategory`);

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`idBrand`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idCustomer`,`idArticle`),
  ADD KEY `FK_CartArticle` (`idArticle`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `FK_CustomerComment` (`idCustomer`),
  ADD KEY `FK_ArticleComment` (`idArticle`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`idMedia`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `FK_CustomerOrder` (`idCustomer`);

--
-- Index pour la table `recommandedarticle`
--
ALTER TABLE `recommandedarticle`
  ADD PRIMARY KEY (`idRecommendedArticle`),
  ADD UNIQUE KEY `UC_RECOMMANDEDARTICLE` (`idArticle1`,`idArticle2`),
  ADD KEY `FK_Article2RecommendedArticle` (`idArticle2`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `articletype`
--
ALTER TABLE `articletype`
  MODIFY `idType` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `idBrand` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;
--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `idMedia` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `recommandedarticle`
--
ALTER TABLE `recommandedarticle`
  MODIFY `idRecommendedArticle` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articletype`
--
ALTER TABLE `articletype`
  ADD CONSTRAINT `FK_TypeCatergory` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_CartArticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `FK_CartCustomer` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_ArticleComment` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `FK_CustomerComment` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_CustomerOrder` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`);

--
-- Contraintes pour la table `recommandedarticle`
--
ALTER TABLE `recommandedarticle`
  ADD CONSTRAINT `FK_Article1RecommendedArticle` FOREIGN KEY (`idArticle1`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `FK_Article2RecommendedArticle` FOREIGN KEY (`idArticle2`) REFERENCES `article` (`idArticle`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
