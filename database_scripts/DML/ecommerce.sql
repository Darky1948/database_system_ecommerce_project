-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 15 Octobre 2017 à 16:53
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

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
