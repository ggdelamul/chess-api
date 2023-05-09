-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 mai 2023 à 17:58
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chess_api`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`id`, `user`, `password`) VALUES
(1, 'Ggadmin', 'Gege26266969.');

-- --------------------------------------------------------

--
-- Structure de la table `couleur_joue`
--

DROP TABLE IF EXISTS `couleur_joue`;
CREATE TABLE IF NOT EXISTS `couleur_joue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_couleur` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `couleur_joue`
--

INSERT INTO `couleur_joue` (`id`, `nom_couleur`) VALUES
(1, 'blanc'),
(2, 'noir');

-- --------------------------------------------------------

--
-- Structure de la table `grand_maitre`
--

DROP TABLE IF EXISTS `grand_maitre`;
CREATE TABLE IF NOT EXISTS `grand_maitre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `lien_wiki` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `grand_maitre`
--

INSERT INTO `grand_maitre` (`id`, `nom`, `prenom`, `lien_wiki`) VALUES
(1, 'Kasparov', 'Garry', 'https://fr.wikipedia.org/wiki/Garry_Kasparov'),
(2, 'Karpov', 'Anatoli', 'https://fr.wikipedia.org/wiki/Anatoli_Karpov'),
(3, 'Carlsen', 'Magnus', 'https://fr.wikipedia.org/wiki/Magnus_Carlsen');

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

DROP TABLE IF EXISTS `partie`;
CREATE TABLE IF NOT EXISTS `partie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lieu` varchar(30) DEFAULT NULL,
  `annee` varchar(5) DEFAULT NULL,
  `nom_adversaire` varchar(30) DEFAULT NULL,
  `prenom_adversaire` varchar(30) DEFAULT NULL,
  `lien_download` varchar(150) DEFAULT NULL,
  `id_nom_maitre` int(11) DEFAULT NULL,
  `id_nom_couleur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_partie_grand_maitre` (`id_nom_maitre`),
  KEY `fk_partie_couleur_joue` (`id_nom_couleur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `partie`
--

INSERT INTO `partie` (`id`, `lieu`, `annee`, `nom_adversaire`, `prenom_adversaire`, `lien_download`, `id_nom_maitre`, `id_nom_couleur`) VALUES
(1, '', '2021', 'van Foreest', 'Jorden', 'Garry Kasparov_vs_Jorden van Foreest_2021.07.11.pgn', 1, 1),
(2, '', '2022', 'Morozevich', 'Alexander', 'Anatoly Karpov_vs_Alexander Morozevich_2022.07.17.pgn', 2, 1),
(3, 'Saint Louis USA', '2017', 'Nakamura', 'Hikaru', 'Garry Kasparov_vs_Hikaru Nakamura_2017.08.17.pgn', 1, 1),
(4, '', '2023', 'Jacobson', 'Brandon', 'Magnus Carlsen_vs_Brandon Jacobson_2023.01.03.pgn', 3, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `fk_partie_couleur_joue` FOREIGN KEY (`id_nom_couleur`) REFERENCES `couleur_joue` (`id`),
  ADD CONSTRAINT `fk_partie_grand_maitre` FOREIGN KEY (`id_nom_maitre`) REFERENCES `grand_maitre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
