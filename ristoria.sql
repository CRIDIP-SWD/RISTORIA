-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 10 Mars 2015 à 18:52
-- Version du serveur: 5.5.41-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ristoria`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `idarticle` int(13) NOT NULL AUTO_INCREMENT,
  `idmenu` int(13) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `prix_unitaire` varchar(255) NOT NULL,
  PRIMARY KEY (`idarticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`idarticle`, `idmenu`, `designation`, `description`, `prix_unitaire`) VALUES
(40, 14, 'Entr&eacute;e - Pat&eacute; en croute', '', '1.00'),
(41, 14, 'Entr&eacute;e - Hareng saure', '', '2.35'),
(42, 14, 'PLAT - Poulet Frite', '', '5.80'),
(43, 14, 'PLAT - CASSOULET', '', '6.30'),
(44, 14, 'FROMAGE - BLEU D''AUVERGNE', '', '2.30'),
(45, 14, 'FROMAGE - SAINT NECTAIRE', '', '2.30'),
(46, 14, 'DESSERT - ILE FLOTTANTE', '', '4.25'),
(47, 14, 'DESSERT - MOUSSE AU CHOCOLAT', '', '2.30');

-- --------------------------------------------------------

--
-- Structure de la table `article_commande`
--

CREATE TABLE IF NOT EXISTS `article_commande` (
  `idarticlecommande` int(13) NOT NULL AUTO_INCREMENT,
  `idcommande` int(13) NOT NULL,
  `idarticle` int(13) NOT NULL,
  `qte` varchar(255) NOT NULL,
  `total_ligne` varchar(255) NOT NULL,
  PRIMARY KEY (`idarticlecommande`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `article_commande`
--

INSERT INTO `article_commande` (`idarticlecommande`, `idcommande`, `idarticle`, `qte`, `total_ligne`) VALUES
(22, 11, 40, '1', '1.00'),
(23, 11, 43, '1', '6.30'),
(24, 11, 47, '1', '2.30');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idcommande` int(13) NOT NULL AUTO_INCREMENT,
  `idmenu` int(13) NOT NULL,
  `num_commande` varchar(255) NOT NULL,
  `date_commande` varchar(255) NOT NULL,
  `iduser` int(13) NOT NULL,
  `montant_total` varchar(255) NOT NULL,
  PRIMARY KEY (`idcommande`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idcommande`, `idmenu`, `num_commande`, `date_commande`, `iduser`, `montant_total`) VALUES
(11, 14, 'ORD.UTS.67054', '1426460400', 12, '9.6'),
(12, 14, 'ORD.UTS.32122', '', 13, '0');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idmenu` int(13) NOT NULL AUTO_INCREMENT,
  `semaine` varchar(255) NOT NULL,
  `etat_menu` int(1) NOT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`idmenu`, `semaine`, `etat_menu`) VALUES
(14, '12', 0);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `idmodule` int(13) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  PRIMARY KEY (`idmodule`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`idmodule`, `designation`, `version`) VALUES
(1, 'METRONIC CORE V5', '5.0.0'),
(2, 'RISTORIA', '1.0.0');

-- --------------------------------------------------------

--
-- Structure de la table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `idsetting` int(13) NOT NULL AUTO_INCREMENT,
  `raison_social` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `date_fin_serial` varchar(255) NOT NULL,
  `key_api` varchar(255) NOT NULL,
  `etat_programme` int(1) NOT NULL,
  `nb_liv_theorique` varchar(255) NOT NULL,
  PRIMARY KEY (`idsetting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `setting`
--

INSERT INTO `setting` (`idsetting`, `raison_social`, `adresse`, `code_postal`, `ville`, `telephone`, `email`, `serial`, `date_fin_serial`, `key_api`, `etat_programme`, `nb_liv_theorique`) VALUES
(1, 'CRIDIP', '8 Rue Octave Voyer', '85100', 'LES SABLES D''OLONNE', '02 51 23 24 24', 'contact@cridip.com', 'RST02-DF58G-89ER9-ET84T-WWSD1', '20-02-2016', '', 1, '5');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `iduser` int(13) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `pass_md5` varchar(255) NOT NULL,
  `pass_clear` varchar(255) NOT NULL,
  `groupe` int(1) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL,
  `tel_user` varchar(255) NOT NULL,
  `port_user` varchar(255) NOT NULL,
  `last_connect` varchar(255) NOT NULL,
  `connect` int(1) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `login`, `pass_md5`, `pass_clear`, `groupe`, `nom_user`, `prenom_user`, `tel_user`, `port_user`, `last_connect`, `connect`) VALUES
(3, 'mmockelyn@cridip.com', '201c238c414b3f9d7bec9bb76567f65a', '1992maxime', 1, 'MOCKELYN', 'Maxime', '02.51.23.24.24', '', '10/03/15 - 09:25', 0),
(6, 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 0, 'Utilisateur', 'Demo', '00.00.00.00.00', '00.00.00.00.00', '06/03/15 - 16:20', 0),
(12, 'cdtgestion@free.fr', '25f9e794323b453885f5181f1b624d0b', '123456789', 0, 'Thomas', 'Dominique', '', '', '09/03/15 - 16:51', 0),
(13, 'admin@admin', '25f9e794323b453885f5181f1b624d0b', '123456789', 0, 'Admin', 'CDT', '', '', '10/03/15 - 09:25', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
