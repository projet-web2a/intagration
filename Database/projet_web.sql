-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 07 mai 2019 à 17:41
-- Version du serveur :  5.7.24
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` text NOT NULL,
  `mdp` text NOT NULL,
  `cin` int(11) NOT NULL,
  `tel` int(8) NOT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`cin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `mdp`, `cin`, `tel`, `role`) VALUES
('wafa', 'root', 11660124, 93000038, NULL),
('monta', '2022', 12069856, 5263987, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id_avis` int(11) NOT NULL AUTO_INCREMENT,
  `marque` text NOT NULL,
  `note` int(11) NOT NULL,
  `commentaire` text,
  `refe` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`id_avis`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id_avis`, `marque`, `note`, `commentaire`, `refe`, `username`) VALUES
(1, 'FENDI', 4, 'ama ghaleya', 14, 'eyarabeh1'),
(2, 'TOMMY HILFIGER', 4, 'eyy', 1, 'eyarabeh1');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `refp` varchar(15) NOT NULL,
  `nom` text NOT NULL,
  PRIMARY KEY (`refp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`refp`, `nom`) VALUES
('20', 'nooww');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `num` varchar(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `date_inscri` date NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`prenom`, `nom`, `username`, `pwd`, `email`, `num`, `city`, `sexe`, `date_inscri`) VALUES
('eya', 'rabeeh', 'eyarabeh1', '13016988', 'eya.rabeh@esprit.tn', '52546465', 'Tunis', 'Female', '2019-04-29'),
('wafa', 'rabeh', 'fifi', '13016988', 'eya.rabeh@esprit.tn', '52546465', 'Tunis', 'Female', '2019-04-30'),
('monta', 'rebai', 'monta25', '13016988', 'montassar.rebai@esprit.tn', '52546465', 'Ariana', 'Male', '2019-04-30'),
('syrine', 'boussada', 'sarouna', 'ujhyj', 'eya.rabeh@esprit.tn', '52546465', 'Ben Arous', 'Female', '2019-04-30'),
('ali', 'salah', 'hey', 'jik', 'eya.rabeh@esprit.tn', '52546465', 'Tunis', 'Male', '2019-05-06'),
('ali', 'salah', 'ali93', 'ffff', 'eya.rabeh@esprit.tn', '52546465', 'Tunis', 'Male', '2019-04-30'),
('youssef', 'dar', 'you', 'jhfj', 'eya.rabeh@esprit.tn', '52546465', 'Ariana', 'Male', '2019-04-30'),
('hane', 'gharbi', 'hane1', 'hhjj', 'eya.rabeh@esprit.tn', '52546465', 'Tunis', 'Female', '2019-04-30');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` date DEFAULT NULL,
  `etat` varchar(25) DEFAULT NULL,
  `prixTotal` double DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  PRIMARY KEY (`idCommande`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateCommande`, `etat`, `prixTotal`, `username`) VALUES
(15, '2019-02-12', 'valide', 5305, 'eyarabeh1'),
(17, '2018-03-31', 'valide', 23980, 'eyarabeh1'),
(18, '2017-03-31', 'en cours', 2425, 'eyarabeh1'),
(19, '2017-03-31', 'en cours', 6590, 'eyarabeh1'),
(20, '2017-03-31', 'en cours', 525, 'yassinecss'),
(21, '2016-03-31', 'valide', 1170, 'yassinecss'),
(22, '2019-03-31', 'en cours', 575, 'yassinecss'),
(23, '2019-03-31', 'en cours', 3290, 'yassinecss'),
(24, '2019-01-01', 'valide', 2940, 'yassinecss'),
(25, '2019-01-01', 'en cours', 1925, 'yassinecss'),
(27, '2019-04-01', 'en cours', 2215, 'yassinecss'),
(29, '2018-01-01', 'en cours', 1890, 'yassinecss'),
(32, '2019-05-01', 'en cours', 725, 'yassinecss'),
(35, '2018-05-01', 'valide', 575, 'hassen1'),
(37, '2019-12-01', 'en cours', 1450, 'hassen1'),
(41, '2019-06-01', 'en cours', 806, 'hassen1'),
(43, '2016-04-01', 'en cours', 575, 'hassen1'),
(46, '2019-11-01', 'en cours', 475, 'hassen1'),
(49, '2019-07-01', 'valide', 575, 'hane1'),
(58, '2019-08-02', 'en cours', 6425, 'hane1'),
(59, '2019-08-02', 'en cours', 725, 'hassen1'),
(60, '2019-09-02', 'en cours', 4000, 'hassen1'),
(61, '2019-09-02', 'en cours', 1890, 'hassen1'),
(71, '2019-10-02', 'en cours', 3070, 'hassen1'),
(72, '2019-05-02', 'valide', 2425, 'hane1'),
(73, '2019-07-02', 'en cours', 325, 'hane1'),
(74, '2019-11-22', 'en cours', 2675, 'yassinecss'),
(75, '2019-05-24', 'en cours', 4150, 'yassinecss'),
(76, '2018-04-24', 'en cours', 2540, 'yassinecss'),
(77, '2018-05-25', 'en cours', 1425, 'yassinecss'),
(78, '2018-06-27', 'en cours', 575, 'hane1'),
(106, '2018-07-27', 'en cours', 3725, 'hane1'),
(107, '2018-08-29', 'en cours', 7075, 'hane1'),
(108, '2018-09-29', 'en cours', 325, 'hassen1'),
(109, '2018-10-29', 'en cours', 725, 'hassen1'),
(110, '2018-11-29', 'en cours', 1890, 'hassen1'),
(111, '2018-12-29', 'valide', 900, 'yassinecss'),
(112, '2018-03-29', 'en cours', 1225, 'yassinecss'),
(113, '2018-05-10', 'en cours', 325, 'yassinecss'),
(117, '2018-01-30', 'valide', 1125, 'yassinecss'),
(118, '2019-05-05', 'en cours', 325, 'yassinecss'),
(120, '2019-05-06', 'en cours', 900, 'yassinecss'),
(121, '2019-05-06', 'en cours', 1300, 'yassinecss'),
(122, '2019-05-06', 'en cours', 2215, 'yassinecss'),
(125, '2019-05-06', 'en cours', 2775, 'yassinecss'),
(126, '2019-05-06', 'en cours', 1300, 'yassinecss'),
(127, '2019-05-06', 'en cours', 1100, 'yassinecss'),
(128, '2019-05-07', 'en cours', 3740, 'eyarabeh1'),
(129, '2019-05-07', 'en cours', 700, 'eyarabeh1'),
(131, '2019-05-07', 'en cours', 325, 'eyarabeh1'),
(132, '2019-05-07', 'en cours', 3425, 'eyarabeh1'),
(133, '2019-05-07', 'en cours', 725, 'eyarabeh1'),
(134, '2019-05-07', 'en cours', 650, 'eyarabeh1'),
(135, '2019-05-07', 'en cours', 1175, 'eyarabeh1'),
(136, '2019-05-07', 'en cours', 575, 'eyarabeh1'),
(137, '2019-05-07', 'en cours', 1890, 'eyarabeh1');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `nom_evenement` varchar(255) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `nbrparticipant` int(11) NOT NULL,
  `nbrvue` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_evenement`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `nom_evenement`, `datedebut`, `datefin`, `nbrparticipant`, `nbrvue`, `image`, `description`) VALUES
(2, 'poisson d\'avril', '2019-05-09', '2019-05-23', -5, 57, 'article4.jpg', 'venez');

-- --------------------------------------------------------

--
-- Structure de la table `lignecommande`
--

DROP TABLE IF EXISTS `lignecommande`;
CREATE TABLE IF NOT EXISTS `lignecommande` (
  `idLigneCommande` int(11) NOT NULL AUTO_INCREMENT,
  `quantiteCommandee` int(11) DEFAULT NULL,
  `prixUnitaire` float DEFAULT NULL,
  `idCommande` int(11) NOT NULL,
  `refe` int(11) NOT NULL,
  PRIMARY KEY (`idLigneCommande`),
  KEY `fk_idCommande_LigneCommande` (`idCommande`),
  KEY `fk_refe_LigneCommande` (`refe`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lignecommande`
--

INSERT INTO `lignecommande` (`idLigneCommande`, `quantiteCommandee`, `prixUnitaire`, `idCommande`, `refe`) VALUES
(1, 2, 1890, 15, 14),
(2, 1, 725, 15, 5),
(3, 1, 475, 15, 6),
(4, 1, 325, 15, 8),
(8, 2, 325, 17, 3),
(9, 12, 1890, 17, 14),
(10, 2, 325, 17, 8),
(11, 2, 725, 18, 5),
(12, 3, 325, 18, 8),
(13, 1, 1890, 19, 14),
(14, 3, 700, 19, 1),
(15, 2, 725, 19, 5),
(16, 2, 575, 19, 4),
(17, 1, 525, 20, 7),
(18, 1, 445, 21, 10),
(19, 1, 725, 21, 5),
(20, 1, 575, 22, 4),
(21, 2, 700, 23, 1),
(22, 1, 1890, 23, 14),
(23, 1, 1890, 24, 14),
(24, 1, 325, 24, 3),
(25, 1, 725, 24, 5),
(26, 1, 475, 25, 6),
(27, 2, 725, 25, 5),
(28, 1, 325, 27, 3),
(29, 1, 1890, 27, 14),
(30, 1, 1890, 29, 14),
(31, 1, 725, 32, 5),
(32, 1, 575, 35, 4),
(33, 2, 725, 37, 5),
(34, 1, 281, 41, 11),
(35, 1, 525, 41, 12),
(36, 1, 575, 43, 4),
(37, 1, 475, 46, 6),
(38, 1, 575, 49, 4),
(39, 2, 725, 58, 5),
(40, 3, 475, 58, 6),
(41, 2, 700, 58, 1),
(42, 1, 575, 58, 4),
(43, 3, 525, 58, 7),
(44, 1, 725, 59, 5),
(45, 2, 700, 60, 1),
(46, 2, 725, 60, 5),
(47, 2, 575, 60, 4),
(48, 1, 1890, 61, 14),
(49, 2, 325, 71, 3),
(50, 1, 445, 71, 10),
(51, 2, 700, 71, 1),
(52, 1, 575, 71, 4),
(53, 1, 325, 72, 3),
(54, 3, 700, 72, 1),
(55, 1, 325, 73, 3),
(56, 2, 725, 74, 5),
(57, 2, 325, 74, 3),
(58, 1, 575, 74, 4),
(59, 3, 575, 75, 4),
(60, 3, 325, 75, 3),
(61, 2, 725, 75, 5),
(62, 1, 1890, 76, 14),
(63, 2, 325, 76, 3),
(64, 1, 725, 77, 5),
(65, 1, 700, 77, 1),
(66, 1, 575, 78, 4),
(67, 3, 700, 106, 1),
(68, 1, 575, 106, 4),
(69, 2, 525, 106, 7),
(70, 2, 325, 107, 3),
(71, 2, 2200, 107, 2),
(72, 2, 725, 107, 5),
(73, 1, 575, 107, 4),
(74, 1, 325, 108, 3),
(75, 1, 725, 109, 5),
(76, 1, 1890, 110, 14),
(77, 1, 325, 111, 3),
(78, 1, 575, 111, 4),
(79, 2, 325, 112, 3),
(80, 1, 575, 112, 4),
(81, 1, 325, 113, 3),
(87, 2, 325, 117, 3),
(88, 1, 475, 117, 6),
(89, 1, 325, 118, 3),
(90, 1, 325, 120, 3),
(91, 1, 575, 120, 4),
(92, 1, 575, 121, 4),
(93, 1, 725, 121, 5),
(94, 1, 325, 122, 3),
(95, 1, 1890, 122, 14),
(96, 1, 575, 125, 4),
(97, 1, 2200, 125, 2),
(98, 1, 575, 126, 4),
(99, 1, 725, 126, 5),
(100, 1, 575, 127, 4),
(101, 1, 525, 127, 7),
(102, 1, 1790, 128, 3),
(103, 1, 725, 128, 5),
(104, 1, 700, 128, 1),
(105, 1, 525, 128, 7),
(106, 1, 700, 129, 1),
(107, 1, 325, 131, 8),
(108, 2, 700, 132, 1),
(109, 2, 725, 132, 5),
(110, 1, 575, 132, 4),
(111, 1, 725, 133, 5),
(112, 2, 325, 134, 8),
(113, 1, 475, 135, 6),
(114, 1, 700, 135, 1),
(115, 1, 575, 136, 4),
(116, 1, 1890, 137, 14);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `idLivraison` int(11) NOT NULL AUTO_INCREMENT,
  `adresseLivraison` varchar(25) DEFAULT NULL,
  `nom_ville` varchar(15) DEFAULT NULL,
  `dateLivraison` date DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `idCommande` int(11) DEFAULT NULL,
  `idLivreur` int(11) DEFAULT NULL,
  `num_tel` int(11) NOT NULL,
  PRIMARY KEY (`idLivraison`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`idLivraison`, `adresseLivraison`, `nom_ville`, `dateLivraison`, `username`, `idCommande`, `idLivreur`, `num_tel`) VALUES
(4, '19 rue el karmous', 'Kasserine', '2021-05-07', 'eyarabeh1', 136, 2, 12013452),
(5, '19 rue el hbib jee wahdou', 'Ariana', '2019-05-07', 'eyarabeh1', 137, NULL, 29025104);

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

DROP TABLE IF EXISTS `livreur`;
CREATE TABLE IF NOT EXISTS `livreur` (
  `idLivreur` int(11) NOT NULL AUTO_INCREMENT,
  `nblivraison` int(11) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `num_tel` int(11) DEFAULT NULL,
  `cin` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLivreur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livreur`
--

INSERT INTO `livreur` (`idLivreur`, `nblivraison`, `nom`, `prenom`, `mail`, `num_tel`, `cin`) VALUES
(2, 2, 'amin', 'guessmi', 'amine.guessmi@esprit.tn', 29025106, 12345678);

-- --------------------------------------------------------

--
-- Structure de la table `livreur_ville`
--

DROP TABLE IF EXISTS `livreur_ville`;
CREATE TABLE IF NOT EXISTS `livreur_ville` (
  `idLivreur` int(11) DEFAULT NULL,
  `nom_ville` varchar(15) DEFAULT NULL,
  KEY `fk_Livreur_Ville_idLivreur` (`idLivreur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livreur_ville`
--

INSERT INTO `livreur_ville` (`idLivreur`, `nom_ville`) VALUES
(2, 'Ariana'),
(2, 'Tozeur'),
(2, 'Kairouan'),
(2, 'Kasserine');

-- --------------------------------------------------------

--
-- Structure de la table `months`
--

DROP TABLE IF EXISTS `months`;
CREATE TABLE IF NOT EXISTS `months` (
  `month_num` int(11) DEFAULT NULL,
  `month_name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `months`
--

INSERT INTO `months` (`month_num`, `month_name`) VALUES
(1, 'janvier'),
(2, 'fevrier'),
(3, 'mars'),
(4, 'avril'),
(5, 'mai'),
(6, 'juin'),
(7, 'juillet'),
(8, 'aout'),
(9, 'septembre'),
(10, 'octobre'),
(11, 'novembre'),
(12, 'decembre');

-- --------------------------------------------------------

--
-- Structure de la table `notificationpromo`
--

DROP TABLE IF EXISTS `notificationpromo`;
CREATE TABLE IF NOT EXISTS `notificationpromo` (
  `idNot` int(11) NOT NULL,
  `refe` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `prixfinal` float NOT NULL,
  `prix` float NOT NULL,
  `lu` int(11) NOT NULL,
  PRIMARY KEY (`idNot`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

DROP TABLE IF EXISTS `participation`;
CREATE TABLE IF NOT EXISTS `participation` (
  `id_participation` int(11) NOT NULL AUTO_INCREMENT,
  `id_evenement` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id_participation`),
  UNIQUE KEY `id_evenement` (`id_evenement`),
  KEY `FK_client` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `refe` varchar(30) NOT NULL,
  `mar` text NOT NULL,
  `dest` text NOT NULL,
  `prix` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `url` text NOT NULL,
  `nomCat` varchar(50) DEFAULT NULL,
  `descr` text NOT NULL,
  `dateajout` date DEFAULT NULL,
  PRIMARY KEY (`refe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`refe`, `mar`, `dest`, `prix`, `qte`, `url`, `nomCat`, `descr`, `dateajout`) VALUES
('1', 'TOMMY HILFIGER', '', 700, 0, 'm1.jpg', NULL, '', NULL),
('2', 'GUCCI', '', 2200, 0, 's4.jpg', NULL, '', NULL),
('3', 'DIOR (Rose)', '', 1790, 0, 's2.jpg', NULL, '', NULL),
('4', 'GIGI BARCELONA', '', 575, 0, 's3.jpg', NULL, '', NULL),
('5', 'TED BAKER', '', 725, 0, 'm2.jpg', NULL, '', NULL),
('6', 'PERSOL', '', 475, 0, 'm3.jpg', NULL, '', NULL),
('7', 'RAY BAN', '', 525, 0, 'm4.jpg', NULL, '', NULL),
('8', 'RAY BAN JUNIOR', '', 325, 0, 's5.jpg', NULL, '', NULL),
('9', 'RAY BAN JUNIOR', '', 340, 0, 's6.jpg', NULL, '', NULL),
('10', 'RAY BAN JUNIOR', '', 445, 0, 's7.jpg', NULL, '', NULL),
('11', 'LACOSTE JUNIOR', '', 281, 0, 's8.jpg', NULL, '', NULL),
('12', 'Jerry Rectangular', '', 525, 0, 's9.jpg', NULL, '', NULL),
('13', 'Herdy Wayfarer', '', 325, 0, 's10.jpg', NULL, '', NULL),
('14', 'FENDI', '', 1890, 0, 's1.jpg', NULL, '', NULL),
('105', 'fendi', 'Femme', 950, 2, 's1.jpg', 'monta', 'fendi ', '2019-04-23'),
('20', 'opppo', 'Homme', 520, 1, 'close.png', 'nooww', 'sderftg', '2019-05-05'),
('4444', 'jimmy choo', 'femme', 470, 4, 'article1.jpg', 'ggg', 'ffff', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `id_promotion` int(11) NOT NULL AUTO_INCREMENT,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `idProduit` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `taux` float NOT NULL,
  `prixfinal` float NOT NULL,
  `lu` int(11) NOT NULL,
  PRIMARY KEY (`id_promotion`),
  KEY `FK_produit` (`idProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id_promotion`, `datedebut`, `datefin`, `idProduit`, `categorie`, `taux`, `prixfinal`, `lu`) VALUES
(2, '2019-05-09', '2019-05-22', 4, '', 7, 40.25, 1),
(3, '2019-05-01', '2019-05-08', 5, '', 5, 688.75, 1),
(4, '2019-05-07', '2019-06-14', 1, '', 17, 581, 1),
(5, '2019-05-07', '2019-06-14', 1, '', 17, 581, 1),
(6, '2019-05-02', '2019-05-24', 2, '', 47, 1166, 1),
(7, '2019-05-02', '2019-05-24', 2, '', 47, 1166, 1),
(8, '2019-05-17', '2019-05-25', 3, '', 5, 1700.5, 1),
(9, '2019-05-10', '2019-05-18', 11, '', 5, 266.95, 1),
(10, '2019-05-10', '2019-06-01', 7, '', 17, 435.75, 1),
(11, '2019-05-10', '2019-06-01', 7, '', 17, 435.75, 1),
(12, '2019-05-18', '2019-05-18', 10, '', 5, 422.75, 1),
(13, '2019-05-09', '2019-05-29', 9, '', 5, 323, 1),
(14, '2019-05-10', '2019-05-31', 20, 'sderftg', 77, 119.6, 1),
(16, '2019-05-17', '2019-05-31', 105, 'fendi ', 8, 874, 1),
(19, '2019-05-25', '2019-05-26', 4444, 'ffff', 77, 108.1, 1),
(20, '2019-04-18', '2019-05-05', 14, '', 5, 1795.5, 1),
(21, '2019-04-18', '2019-05-05', 14, '', 5, 1795.5, 1),
(22, '2019-05-17', '2019-05-24', 6, '', 7, 441.75, 1);

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id_rdv` int(20) NOT NULL AUTO_INCREMENT,
  `date_rdv` varchar(20) NOT NULL,
  `time_rdv` varchar(20) NOT NULL,
  `refProduit_rdv` varchar(50) NOT NULL,
  `etat` int(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_rdv`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id_rdv`, `date_rdv`, `time_rdv`, `refProduit_rdv`, `etat`, `username`) VALUES
(110, '2019-05-08', '12:30', '1', NULL, 'eyarabeh1'),
(108, '2019-05-08', '11:30', '10', NULL, 'eyarabeh1'),
(109, '2019-05-08', '15:25', '10', NULL, 'eyarabeh1'),
(95, '2019-05-07', '10:15', '6', 1, 'sarouna'),
(94, '2019-05-07', '11:30', '13', NULL, 'monta25'),
(96, '2019-05-07', '15:25', '7', NULL, 'fifi'),
(93, '2019-05-08', '15:30', '1', NULL, 'eyarabeh1'),
(92, '2019-05-07', '12:45', '6', 1, 'eyarabeh1');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

DROP TABLE IF EXISTS `reclamation`;
CREATE TABLE IF NOT EXISTS `reclamation` (
  `id_reclamation` int(11) NOT NULL AUTO_INCREMENT,
  `refe` int(11) NOT NULL,
  `date_reclamation` date NOT NULL,
  `Etat` varchar(20) NOT NULL DEFAULT 'en cours',
  `username` varchar(20) NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id_reclamation`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `nom_ville` varchar(30) NOT NULL,
  PRIMARY KEY (`nom_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`nom_ville`) VALUES
('Ariana'),
('beja'),
('Ben Arous'),
('Bizerte'),
('Gabes'),
('Gafsa'),
('Jendouba'),
('Kairouan'),
('Kasserine'),
('Kebili'),
('Kef'),
('Mahdia'),
('Manouba'),
('Medenine'),
('Monastir'),
('Nabeul'),
('Sfax'),
('Sidi Bouzid'),
('Siliana'),
('Sousse'),
('Tataouine'),
('Tozeur'),
('tunis'),
('Zaghouan');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `lignecommande`
--
ALTER TABLE `lignecommande`
  ADD CONSTRAINT `fk_idCommande_LigneCommande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`);

--
-- Contraintes pour la table `livreur_ville`
--
ALTER TABLE `livreur_ville`
  ADD CONSTRAINT `fk_Livreur_Ville_idLivreur` FOREIGN KEY (`idLivreur`) REFERENCES `livreur` (`idLivreur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
