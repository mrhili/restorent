-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 11 mai 2019 à 03:47
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `resto`
--

-- --------------------------------------------------------

--
-- Structure de la table `arounds`
--

DROP TABLE IF EXISTS `arounds`;
CREATE TABLE IF NOT EXISTS `arounds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `arounds`
--

INSERT INTO `arounds` (`id`, `name`, `price`) VALUES
(1, 'SALADE TOMATE', 100),
(2, 'SALAD FRUITS', 150);

-- --------------------------------------------------------

--
-- Structure de la table `around_ordering`
--

DROP TABLE IF EXISTS `around_ordering`;
CREATE TABLE IF NOT EXISTS `around_ordering` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `around_id` int(11) NOT NULL,
  `ordering_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `around_id` (`around_id`),
  KEY `ordering_id` (`ordering_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `costumers`
--

DROP TABLE IF EXISTS `costumers`;
CREATE TABLE IF NOT EXISTS `costumers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `costumers`
--

INSERT INTO `costumers` (`id`, `name`, `last_name`, `tel`) VALUES
(1, 'mohamed', 'kamali', '06060606');

-- --------------------------------------------------------

--
-- Structure de la table `orderings`
--

DROP TABLE IF EXISTS `orderings`;
CREATE TABLE IF NOT EXISTS `orderings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` text NOT NULL,
  `costumer_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `costumer_id` (`costumer_id`),
  KEY `size_id` (`size_id`),
  KEY `type_id` (`type_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `taux` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `taux`) VALUES
(1, 'one personne', 100),
(2, 'two perssone', 150);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `name`, `price`) VALUES
(1, 'CHIKEN', 500),
(2, 'FISH', 800);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` text NOT NULL,
  `role` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `role`) VALUES
(1, 'admin', 'admin@app.com', '21232f297a57a5a743894a0e4a801fc3', 2),
(2, 'chef', 'chef@app.com', 'cbb4581ba3ada1ddef9b431eef2660ce', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `around_ordering`
--
ALTER TABLE `around_ordering`
  ADD CONSTRAINT `around_ordering_ibfk_1` FOREIGN KEY (`around_id`) REFERENCES `arounds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `around_ordering_ibfk_2` FOREIGN KEY (`ordering_id`) REFERENCES `orderings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orderings`
--
ALTER TABLE `orderings`
  ADD CONSTRAINT `orderings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderings_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderings_ibfk_3` FOREIGN KEY (`costumer_id`) REFERENCES `costumers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderings_ibfk_4` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
