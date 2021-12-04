-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 04 déc. 2021 à 23:48
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

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
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `proj__user`
--

INSERT INTO `proj__user` (`user_id`, `username`, `profile_photo_id`, `password`, `last_name`, `first_name`, `mail`, `phone`) VALUES
(1, 'Yova', NULL, 'moi', 'Dano', 'Matthieu', 'matthieu.dano@etu.umontpellier.fr', '0763406425'),
(2, 'Rotashin', NULL, 'lui', 'Fernandez', 'Mateo', 'mateo.fernandez@etu.umontpellier.fr', '0782092071'),
(3, 'Nenesdu84', NULL, 'oui', 'Garcia', 'Inès', 'inesgarcia861@gmail.com', NULL),
(5, 'NéophyteDuFlex_34', NULL, 'non', 'Donot', 'Axelle', 'axelle.donot@umontpellier.fr', NULL);

--
-- Index pour les tables déchargées
--

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
-- AUTO_INCREMENT pour la table `proj__user`
--
ALTER TABLE `proj__user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `proj__user`
--
ALTER TABLE `proj__user`
  ADD CONSTRAINT `fk_profile_photo_id_user` FOREIGN KEY (`profile_photo_id`) REFERENCES `proj__images` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
