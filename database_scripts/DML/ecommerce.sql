-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 13 Octobre 2017 à 13:59
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

--
-- RELATIONS POUR LA TABLE `admin`:
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
-- RELATIONS POUR LA TABLE `article`:
--

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`idArticle`, `libelle`, `price`, `quantity`, `article_size`, `color`, `reg_date`, `idType`, `idBrand`, `idMedia`) VALUES
(1, 'WROGN Men\'s Purple Printed Polo T-Shirt', '979', 5, 'L', 'Purple', '2017-10-13 13:56:00', 1, 2, 1),
(2, 'DUKE Multi Color Striped Polo T-shirt', '795', 5, 'L', 'Multicolor', '2017-10-13 13:56:01', 1, 1, 2),
(3, 'DNMX Gray & Black Striped Polo T-shirt', '699', 5, 'L', 'Multicolor', '2017-10-13 13:56:01', 1, 4, 3),
(4, 'Celio Navy & Green Slim Fit Polo T-shirt', '950', 5, 'L', 'Navy blue', '2017-10-13 13:56:01', 1, 3, 4);

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
-- RELATIONS POUR LA TABLE `articletype`:
--   `idCategory`
--       `category` -> `idCategory`
--

--
-- Contenu de la table `articletype`
--

INSERT INTO `articletype` (`idType`, `libelle`, `valid`, `reg_date`, `idCategory`) VALUES
(1, 'POLO', 1, '2017-10-13 11:37:43', 7),
(2, 'HENLEY', 1, '2017-10-13 11:37:43', 7),
(3, 'V-NECk', 1, '2017-10-13 11:37:43', 7),
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
-- RELATIONS POUR LA TABLE `brand`:
--

--
-- Contenu de la table `brand`
--

INSERT INTO `brand` (`idBrand`, `brand_name`, `reg_date`) VALUES
(1, 'DUKE', '2017-10-13 13:49:56'),
(2, 'WROGN', '2017-10-13 13:49:56'),
(3, 'CELIO', '2017-10-13 13:49:56'),
(4, 'DNMX', '2017-10-13 13:50:19');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `idCustomer` int(6) UNSIGNED NOT NULL,
  `idArticle` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `cart`:
--   `idArticle`
--       `article` -> `idArticle`
--   `idCustomer`
--       `customer` -> `idCustomer`
--

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
-- RELATIONS POUR LA TABLE `category`:
--

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
-- RELATIONS POUR LA TABLE `comment`:
--   `idArticle`
--       `article` -> `idArticle`
--   `idCustomer`
--       `customer` -> `idCustomer`
--

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
  `password` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `customer`:
--

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
-- RELATIONS POUR LA TABLE `media`:
--

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

--
-- RELATIONS POUR LA TABLE `orders`:
--   `idCustomer`
--       `customer` -> `idCustomer`
--

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
-- RELATIONS POUR LA TABLE `recommandedarticle`:
--   `idArticle1`
--       `article` -> `idArticle`
--   `idArticle2`
--       `article` -> `idArticle`
--

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
  MODIFY `idArticle` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `articletype`
--
ALTER TABLE `articletype`
  MODIFY `idType` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `idBrand` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
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
