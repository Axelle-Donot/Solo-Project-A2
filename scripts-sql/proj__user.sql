-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 14 déc. 2021 à 12:56
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
-- Base de données :  `garciai`
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
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `proj__user`
--

INSERT INTO `proj__user` (`user_id`, `username`, `profile_photo_id`, `password`, `last_name`, `first_name`, `mail`, `phone`) VALUES
(1, 'Yova', 17, 'moi', 'Dano', 'Matthieu', 'matthieu.dano@etu.umontpellier.fr', '0763406425'),
(2, 'Rotashin', NULL, 'lui', 'Fernandez', 'Mateo', 'mateo.fernandez@etu.umontpellier.fr', '0782092071'),
(3, 'Nenesdu84', 14, 'oui', 'Garcia', 'Inès', 'inesgarcia861@gmail.com', ''),
(5, 'NéophyteDuFlex_34', 15, 'non', 'Donot', 'Axelle', 'axelle.donot@umontpellier.fr', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `proj__user`
--
ALTER TABLE `proj__user`
  ADD PRIMARY KEY (`user_id`),
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
