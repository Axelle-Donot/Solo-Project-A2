-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 27 nov. 2021 à 14:09
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

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

--
-- Déchargement des données de la table `proj__product`
--

INSERT INTO `proj__product` (`product_id`, `tag_id`, `discount_id`, `name`, `description`, `product_picture_id`, `price`, `rating`) VALUES
(2, 1, NULL, 'sabre 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam purus, eleifend vel leo in, pharetra placerat sem. Nam dictum magna semper, semper diam in, tempus ligula. Proin id porta enim. Sed tincidunt tellus ac massa malesuada sagittis. Phasellus r', 1, 68.99, NULL),
(3, 1, 2, 'sabre 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam purus, eleifend vel leo in, pharetra placerat sem. Nam dictum magna semper, semper diam in, tempus ligula. Proin id porta enim. Sed tincidunt tellus ac massa malesuada sagittis. Phasellus r', 2, 19.99, NULL),
(6, 1, 2, 'Sabre 3', NULL, 3, 29.99, NULL),
(7, 1, 2, 'sabre 4', NULL, 4, 109.99, NULL);

--
-- Index pour les tables déchargées
--

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `proj__product`
--
ALTER TABLE `proj__product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `proj__product`
--
ALTER TABLE `proj__product`
  ADD CONSTRAINT `fk_discount_id_product` FOREIGN KEY (`discount_id`) REFERENCES `proj__discount` (`discount_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_picture_id_product` FOREIGN KEY (`product_picture_id`) REFERENCES `proj__images` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tag_id_product` FOREIGN KEY (`tag_id`) REFERENCES `proj__tag` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
