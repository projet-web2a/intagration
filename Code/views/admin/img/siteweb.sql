-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 22 avr. 2019 à 16:59
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `siteweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `refp` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `num` varchar(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `fidelite` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`prenom`, `nom`, `username`, `pwd`, `email`, `num`, `city`, `sexe`, `fidelite`, `points`) VALUES
('test', 'bhar', 'hane', 'ghh', 'HHHhhh', 'hhhh', 'S', 'R', NULL, NULL),
('test', '55', 'hanehene', 'HH', 'HH', 'HH', 'HH', 'HH', 12, 51);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL,
  `nom_evenement` varchar(255) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `nbrparticipant` int(11) NOT NULL,
  `nbrvue` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `nom_evenement`, `datedebut`, `datefin`, `nbrparticipant`, `nbrvue`, `image`, `description`) VALUES
(36, 'jour de l\'an', '2019-04-03', '2019-03-14', 1, 4, 'saintvalentin.jpg', 'hhhh'),
(37, 'poisson', '2019-04-04', '2019-04-17', 0, 4, 'banner4.jpg', 'soyez la bienvenue'),
(38, 'Saint Valentin', '2019-04-06', '2019-04-25', 0, 0, 'banner1.jpg', 'venez');

-- --------------------------------------------------------

--
-- Structure de la table `notificationpromo`
--

CREATE TABLE `notificationpromo` (
  `idNot` int(11) NOT NULL,
  `refe` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `prixfinal` float NOT NULL,
  `prix` float NOT NULL,
  `lu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE `participation` (
  `id_participation` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participation`
--

INSERT INTO `participation` (`id_participation`, `id_evenement`, `username`) VALUES
(1, 36, 'hanehene');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `refe` int(11) NOT NULL,
  `mar` text NOT NULL,
  `dest` text NOT NULL,
  `prix` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `url` text NOT NULL,
  `descr` text NOT NULL,
  `promo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`refe`, `mar`, `dest`, `prix`, `qte`, `url`, `descr`, `promo`) VALUES
(4, 'jimmy choo', 'tunis', 500, 2, 'saintvalentin.jpg', '', 15),
(15, 'jimmy choo', 'bardo', 700, 4, 'saintvalentin.jpg', 'produit unique', 1),
(111, 'rayban', 'tunis', 15, 2, '122', '12', 127);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id_promotion` int(11) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `idProduit` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `taux` float NOT NULL,
  `prixfinal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id_promotion`, `datedebut`, `datefin`, `idProduit`, `categorie`, `taux`, `prixfinal`) VALUES
(33, '2019-04-10', '2019-04-04', 111, 'enfant', 10, 1.5),
(34, '2019-04-25', '2019-04-05', 111, '44', 11, 1.65),
(35, '2019-04-25', '2019-04-05', 111, '44', 5, 0.75),
(50, '2019-04-11', '2019-04-02', 111, 'homme', 10, 1.5),
(51, '2019-04-18', '2019-04-01', 111, '114', 11, 1.65),
(56, '2019-04-01', '2019-04-11', 111, '1', 1, 0.15),
(57, '2019-04-18', '2019-04-23', 15, 'femme', 10, 70),
(58, '2019-04-12', '2019-04-25', 15, 'homme', 12, 84),
(59, '2019-04-18', '2019-04-26', 4, 'femme', 41, 205);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `joining_date`, `role`) VALUES
(14, 'hanebhar', 'hane.bhar@esprit.tn', '1234', '2019-04-21 19:10:25', 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `nom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `mdp`) VALUES
('hane', '123'),
('hella', '157');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`nom`, `password`, `mail`) VALUES
('nnnnnnn', 'jjjjjjkalma', 'jjz@esss'),
('utilisateur', '1234', 'utilisateur@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`refp`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`);

--
-- Index pour la table `notificationpromo`
--
ALTER TABLE `notificationpromo`
  ADD PRIMARY KEY (`idNot`);

--
-- Index pour la table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`id_participation`),
  ADD UNIQUE KEY `id_evenement` (`id_evenement`),
  ADD KEY `FK_client` (`username`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`refe`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promotion`),
  ADD KEY `FK_produit` (`idProduit`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD UNIQUE KEY `mdp` (`mdp`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`nom`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `notificationpromo`
--
ALTER TABLE `notificationpromo`
  MODIFY `idNot` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `participation`
--
ALTER TABLE `participation`
  MODIFY `id_participation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `refe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id_promotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `FK_client` FOREIGN KEY (`username`) REFERENCES `client` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_evenement` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `FK_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`refe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
