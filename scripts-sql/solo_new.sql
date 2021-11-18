-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 18 nov. 2021 à 10:43
-- Version du serveur :  5.5.47-0+deb8u1
-- Version de PHP :  7.2.22-1+0~20190902.26+debian8~1.gbpd64eb7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Structure de la table `proj__address`
--

CREATE TABLE `proj__address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `state` varchar(128) NOT NULL,
  `zip_code` varchar(11) NOT NULL,
  `country` varchar(128) NOT NULL,
  `supplement` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `proj__cart_item`
--

CREATE TABLE `proj__cart_item` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `proj__discount`
--

CREATE TABLE `proj__discount` (
  `discount_id` int(11) NOT NULL,
  `reduction` int(11) NOT NULL,
  `is_percentage` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `proj__ordered_product`
--

CREATE TABLE `proj__ordered_product` (
  `ordered_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `proj__product`
--

CREATE TABLE `proj__product` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `product_picture_id` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `proj__shopping_cart`
--

CREATE TABLE `proj__shopping_cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `proj__tag`
--

CREATE TABLE `proj__tag` (
  `tag_id` int(11) NOT NULL,
  `name` varchar(32) CHARACTER SET latin1 NOT NULL,
  `description` varchar(256) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `proj__user`
--

CREATE TABLE `proj__user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `profile_photo_id` INT(11) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `proj__images`
--

CREATE TABLE `proj__images` (
    `img_id` INT(11) NOT NULL AUTO_INCREMENT ,
    `img_name` VARCHAR( 50 ) NOT NULL ,
    `img_size` VARCHAR( 25 ) NOT NULL ,
    `img_type` VARCHAR( 25 ) NOT NULL ,
    `img_desc` VARCHAR( 100 ) NOT NULL ,
    `img_blob` BLOB NOT NULL ,
    PRIMARY KEY ( `img_id` )
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `proj__address`
--
ALTER TABLE `proj__address`
  ADD PRIMARY KEY (`address_id`,`user_id`),
  ADD KEY `fk_user_id_address` (`user_id`);

--
-- Index pour la table `proj__cart_item`
--
ALTER TABLE `proj__cart_item`
  ADD PRIMARY KEY (`cart_id`,`product_id`),
  ADD KEY `fk_product_id_item` (`product_id`);

--
-- Index pour la table `proj__discount`
--
ALTER TABLE `proj__discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Index pour la table `proj__ordered_product`
--
ALTER TABLE `proj__ordered_product`
  ADD PRIMARY KEY (`ordered_id`),
  ADD KEY `fk_customer_id_ordered_product` (`customer_id`);

--
-- Index pour la table `proj__product`
--
ALTER TABLE `proj__product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `unique_name_product` (`name`),
  ADD KEY `fk_tag_id_product` (`tag_id`),
  ADD KEY `fk_discount_id_product` (`discount_id`),
  ADD KEY `fk_product_picture_id_product` (`product_picture_id`);

--
-- Index pour la table `proj__shopping_cart`
--
ALTER TABLE `proj__shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_customer_id_order` (`customer_id`);

--
-- Index pour la table `proj__tag`
--
ALTER TABLE `proj__tag`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `unique_tag_name` (`name`);

--
-- Index pour la table `proj__user`
--
ALTER TABLE `proj__user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_profile_photo_id_user` (`profile_photo_id`);

-- --------------------------------------------------------

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `proj__address`
--
ALTER TABLE `proj__address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proj__discount`
--
ALTER TABLE `proj__discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proj__ordered_product`
--
ALTER TABLE `proj__ordered_product`
  MODIFY `ordered_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proj__product`
--
ALTER TABLE `proj__product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proj__shopping_cart`
--
ALTER TABLE `proj__shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proj__tag`
--
ALTER TABLE `proj__tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proj__user`
--
ALTER TABLE `proj__user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Contraintes pour la table `proj__address`
--
ALTER TABLE `proj__address`
  ADD CONSTRAINT `fk_user_id_address` FOREIGN KEY (`user_id`) REFERENCES `proj__user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj__cart_item`
--
ALTER TABLE `proj__cart_item`
  ADD CONSTRAINT `fk_product_id_item` FOREIGN KEY (`product_id`) REFERENCES `proj__product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cart_id_item` FOREIGN KEY (`cart_id`) REFERENCES `proj__shopping_cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj__ordered_product`
--
ALTER TABLE `proj__ordered_product`
  ADD CONSTRAINT `fk_customer_id_ordered_product` FOREIGN KEY (`customer_id`) REFERENCES `proj__user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj__product`
--
ALTER TABLE `proj__product`
  ADD CONSTRAINT `fk_discount_id_product` FOREIGN KEY (`discount_id`) REFERENCES `proj__discount` (`discount_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tag_id_product` FOREIGN KEY (`tag_id`) REFERENCES `proj__tag` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_picture_id_product` FOREIGN KEY (`product_picture_id`) REFERENCES `proj__images` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj__shopping_cart`
--
ALTER TABLE `proj__shopping_cart`
  ADD CONSTRAINT `fk_customer_id_order` FOREIGN KEY (`customer_id`) REFERENCES `proj__user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj__user`
--
ALTER TABLE `proj__user`
  ADD CONSTRAINT `fk_profile_photo_id_user` FOREIGN KEY (`profile_photo_id`) REFERENCES `proj__images` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
