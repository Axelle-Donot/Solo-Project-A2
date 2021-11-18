-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 18 nov. 2021 à 11:17
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

--
-- Base de données :  `danom`
--

--
-- Déchargement des données de la table `proj__address`
--

INSERT INTO `proj__address` (`address_id`, `user_id`, `street`, `city`, `state`, `zip_code`, `country`, `supplement`) VALUES
(1, 1, '393 Rue Pierre Cardenal', 'Montpellier', 'Occitanie - Hérault', '34080', 'France', 'Résidence du Lac Escalier 6'),
(2, 2, '547 Rue du Goupil', 'BrunetVille', 'Occitanie - Hérault', '34130', 'France', 'Résidence Clary Pallier 666');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
