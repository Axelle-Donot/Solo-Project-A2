-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 21 nov. 2021 à 15:10
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

--
-- Déchargement des données de la table `proj__product`
--

INSERT INTO `proj__product` (`product_id`, `tag_id`, `discount_id`, `name`, `description`, `product_picture_id`, `price`, `rating`) VALUES
(2, 1, NULL, 'sabre1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam purus, eleifend vel leo in, pharetra placerat sem. Nam dictum magna semper, semper diam in, tempus ligula. Proin id porta enim. Sed tincidunt tellus ac massa malesuada sagittis. Phasellus r', NULL, 68.99, NULL),
(3, 1, 2, 'sabre2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam purus, eleifend vel leo in, pharetra placerat sem. Nam dictum magna semper, semper diam in, tempus ligula. Proin id porta enim. Sed tincidunt tellus ac massa malesuada sagittis. Phasellus r', NULL, 19.99, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
