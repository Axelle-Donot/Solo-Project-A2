-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 12 déc. 2021 à 22:00
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `solo`
--

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
-- Structure de la table `proj__images`
--

CREATE TABLE `proj__images` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(50) NOT NULL,
  `img_size` varchar(25) NOT NULL,
  `img_type` varchar(25) NOT NULL,
  `img_desc` varchar(100) NOT NULL,
  `img_blob` mediumblob NOT NULL
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
  `name` varchar(32) NOT NULL,
  `description` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `proj__user`
--

CREATE TABLE `proj__user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `profile_photo_id` int(11) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `nonce` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

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
-- Index pour la table `proj__images`
--
ALTER TABLE `proj__images`
  ADD PRIMARY KEY (`img_id`);

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
  ADD UNIQUE KEY `unique_username_user` (`username`),
  ADD UNIQUE KEY `unique_mail_user` (`mail`),
  ADD KEY `fk_profile_photo_id_user` (`profile_photo_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `proj__address`
--
ALTER TABLE `proj__address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `proj__discount`
--
ALTER TABLE `proj__discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `proj__images`
--
ALTER TABLE `proj__images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `proj__ordered_product`
--
ALTER TABLE `proj__ordered_product`
  MODIFY `ordered_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `proj__product`
--
ALTER TABLE `proj__product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `proj__shopping_cart`
--
ALTER TABLE `proj__shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `proj__tag`
--
ALTER TABLE `proj__tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `proj__user`
--
ALTER TABLE `proj__user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `proj__address`
--
ALTER TABLE `proj__address`
  ADD CONSTRAINT `fk_user_id_address` FOREIGN KEY (`user_id`) REFERENCES `proj__user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj__cart_item`
--
ALTER TABLE `proj__cart_item`
  ADD CONSTRAINT `fk_cart_id_item` FOREIGN KEY (`cart_id`) REFERENCES `proj__shopping_cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_id_item` FOREIGN KEY (`product_id`) REFERENCES `proj__product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_product_picture_id_product` FOREIGN KEY (`product_picture_id`) REFERENCES `proj__images` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tag_id_product` FOREIGN KEY (`tag_id`) REFERENCES `proj__tag` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

-- --------------------------------------------------------

--
-- Trigger de création d'adresse et de panier
--
CREATE TRIGGER `after_insert_user2` AFTER INSERT ON `proj__user`
 FOR EACH ROW INSERT INTO proj__address (proj__address.address_id, proj__address.user_id) VALUES (NULL, NEW.user_id);
CREATE TRIGGER `after_insert_user` AFTER INSERT ON `proj__user`
 FOR EACH ROW INSERT INTO proj__shopping_cart (proj__shopping_cart.cart_id, proj__shopping_cart.customer_id) VALUES (NULL, NEW.user_id);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
