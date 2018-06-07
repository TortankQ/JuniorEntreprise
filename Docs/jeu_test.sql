-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 06 juin 2018 à 09:10
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `junior`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

DROP TABLE IF EXISTS `affectation`;
CREATE TABLE IF NOT EXISTS `affectation` (
  `NumAffectation` int(11) NOT NULL AUTO_INCREMENT,
  `IdEtudiant` int(11) NOT NULL,
  `NumConvention` int(11) NOT NULL,
  PRIMARY KEY (`NumAffectation`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `affectation`
--

INSERT INTO `affectation` (`NumAffectation`, `IdEtudiant`, `NumConvention`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 3, 1),
(5, 3, 2),
(6, 3, 3),
(7, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `IdClient` int(11) NOT NULL AUTO_INCREMENT,
  `NomClient` varchar(255) NOT NULL,
  `NumRue` int(11) NOT NULL,
  `NomRue` varchar(255) NOT NULL,
  `CP` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Tel` varchar(255) NOT NULL,
  `Siret` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdClient`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`IdClient`, `NomClient`, `NumRue`, `NomRue`, `CP`, `Mail`, `Tel`, `Siret`) VALUES
(1, 'TechInfo SA', 62, 'Ru de Vizay, DARDILLY', '69230', 'test1@gamil.com', '0400252525', '19691774400019'),
(2, 'IUT Lyon 1', 90, 'Rue de la Technologie', '69100, VILLEURBANNE', 'test2@gmail.com', '0478000000', '19691774400019');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `idCompte` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`idCompte`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`idCompte`, `UserName`, `Password`, `Admin`) VALUES
(1, 'test1234', '$2y$10$2g7VteGzZ3/0H5muyFzStuvv0DUW5BGYg/oILNrH8l3lg.DkKgVSC', 1),
(2, 'tayfun', '$2y$10$S5y3gkme.UfiwI2G.4keyuDItIyBSt.NflF8pfolOCBhQmqbRLFBK', 0);

-- --------------------------------------------------------

--
-- Structure de la table `convention`
--

DROP TABLE IF EXISTS `convention`;
CREATE TABLE IF NOT EXISTS `convention` (
  `NumConvention` int(11) NOT NULL AUTO_INCREMENT,
  `NomProjet` varchar(255) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `MontantHT` double NOT NULL,
  `MontantTTC` double NOT NULL,
  `Acompte` double NOT NULL,
  `TVA` float NOT NULL,
  `Signature` tinyint(1) NOT NULL,
  `Commentaire` text NOT NULL,
  PRIMARY KEY (`NumConvention`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `convention`
--

INSERT INTO `convention` (`NumConvention`, `NomProjet`, `IdClient`, `DateDebut`, `DateFin`, `MontantHT`, `MontantTTC`, `Acompte`, `TVA`, `Signature`, `Commentaire`) VALUES
(1, 'Projet1', 1, '2018-06-04', '2018-06-12', 4500, 5400, 2200, 20, 0, 'Ceci est un test'),
(2, 'Projet2', 2, '2018-06-12', '2018-06-27', 2000, 2400, 1000, 20, 1, 'Ceci est un nouveau test '),
(3, 'Projet3', 1, '2016-05-01', '2018-06-01', 1300, 1560, 600, 20, 1, 'ceci est encore un test');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `IdEtudiant` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `NumSecu` varchar(255) NOT NULL,
  `DateNaiss` date NOT NULL,
  PRIMARY KEY (`IdEtudiant`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`IdEtudiant`, `Nom`, `Prenom`, `Adresse`, `NumSecu`, `DateNaiss`) VALUES
(1, 'OZTURK', 'Tayfun', '1 Rue du test, 69000 LYON', '123456789101112', '1998-06-07'),
(2, 'EKINCI', 'Bilge', '1 Rue du Test, 69000 LYON', '1234567891011', '1999-06-06'),
(3, 'FRILLICI', 'Julien', '1 Rue du Test, 69000 LYON', '1234567891011', '1982-06-06');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `NumFacture` int(11) NOT NULL AUTO_INCREMENT,
  `DateFacture` date NOT NULL,
  `MontantHT` double NOT NULL,
  `MontantTTC` double NOT NULL,
  `Payee` tinyint(1) NOT NULL,
  PRIMARY KEY (`NumFacture`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`NumFacture`, `DateFacture`, `MontantHT`, `MontantTTC`, `Payee`) VALUES
(1, '2018-06-06', 2000, 2200, 0),
(2, '2018-04-09', 4500, 5400, 1),
(3, '2018-06-02', 1300, 1560, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `NumTache` int(11) NOT NULL AUTO_INCREMENT,
  `NumConvention` int(11) NOT NULL,
  `Intitule` varchar(255) NOT NULL,
  `Quantite` int(11) NOT NULL,
  `PrixHT` int(11) NOT NULL,
  PRIMARY KEY (`NumTache`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`NumTache`, `NumConvention`, `Intitule`, `Quantite`, `PrixHT`) VALUES
(1, 1, 'Livraison d\'un site web marchand', 1, 2000),
(2, 2, 'Livraison d\'un site web Marchand', 1, 2000),
(3, 2, 'Refonte de la base de données existante', 1, 2500);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
