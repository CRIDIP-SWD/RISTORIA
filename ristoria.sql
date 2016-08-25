-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Mer 24 Août 2016 à 17:34
-- Version du serveur :  10.0.23-MariaDB-0+deb8u1
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `idarticle` int(13) NOT NULL,
  `idmenu` int(13) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `prix_unitaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `article_commande`
--

CREATE TABLE `article_commande` (
  `idarticlecommande` int(13) NOT NULL,
  `idcommande` int(13) NOT NULL,
  `idarticle` int(13) NOT NULL,
  `qte` varchar(255) NOT NULL,
  `total_ligne` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idcommande` int(13) NOT NULL,
  `idmenu` int(13) NOT NULL,
  `num_commande` varchar(255) NOT NULL,
  `date_commande` varchar(255) NOT NULL,
  `iduser` int(13) NOT NULL,
  `montant_total` varchar(255) NOT NULL,
  `etat_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(13) NOT NULL,
  `semaine` varchar(255) NOT NULL,
  `date_menu` varchar(255) NOT NULL,
  `etat_menu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `idmodule` int(13) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`idmodule`, `designation`, `version`) VALUES
(1, 'METRONIC CORE V5', '5.4.0'),
(2, 'RISTORIA', '1.1.0');

-- --------------------------------------------------------

--
-- Structure de la table `setting`
--

CREATE TABLE `setting` (
  `idsetting` int(13) NOT NULL,
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
  `nb_liv_theorique` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `setting`
--

INSERT INTO `setting` (`idsetting`, `raison_social`, `adresse`, `code_postal`, `ville`, `telephone`, `email`, `serial`, `date_fin_serial`, `key_api`, `etat_programme`, `nb_liv_theorique`) VALUES
(1, 'SLTS', 'Route de Saint Jean de Linières', '49070', 'Saint Lambert la Potherie', '', '', 'RST02-DF58G-89ER9-ET84T-WWSD1', '20-02-2017', '', 1, '5');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `iduser` int(13) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass_md5` varchar(255) NOT NULL,
  `pass_clear` varchar(255) NOT NULL,
  `groupe` int(1) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL,
  `tel_user` varchar(255) NOT NULL,
  `port_user` varchar(255) NOT NULL,
  `last_connect` varchar(255) NOT NULL,
  `connect` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `login`, `pass_md5`, `pass_clear`, `groupe`, `nom_user`, `prenom_user`, `tel_user`, `port_user`, `last_connect`, `connect`) VALUES
(6, 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 0, 'Utilisateur', 'Demo', '00.00.00.00.00', '00.00.00.00.00', '24/08/16 - 14:45', 0),
(13, 'admin@admin', '25f9e794323b453885f5181f1b624d0b', '123456789', 1, 'Admin', 'SLTS', '', '', '24/08/16 - 15:30', 1),
(14, 'L.AILLET', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'AILLET LUDOVIC', '', '', '', '', 0),
(15, 'C.ALARY', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'ALARY CLAUDE', '', '', '', '', 0),
(16, 'Y.ALBERT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'ALBERT YANN', '', '', '', '', 0),
(17, 'J.AUBRY', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'AUBRY FEUFEU JEROME', '', '', '', '', 0),
(18, 'R.AULER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'AULER Richard', '', '', '', '', 0),
(19, 'F.AVRILLON', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'AVRILLON FABRICE', '', '', '', '', 0),
(20, 'M.BADIR', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BADIR MOHAMED', '', '', '', '', 0),
(21, 'F.BARAUD', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BARAUD FRANCK', '', '', '', '', 0),
(22, 'B.BARTH', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BARTH BERTRAND', '', '', '', '', 0),
(23, 'S.BAZIN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BAZIN SEBASTIEN', '', '', '', '', 0),
(24, 'T.BEGASSAT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BEGASSAT THIERRY', '', '', '', '', 0),
(25, 'C.BENHAMOUCHE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BENHAMOUCHE CHRISTOPHE', '', '', '', '', 0),
(26, 'D.BENOIT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BENOIT DAVID', '', '', '', '', 0),
(27, 'A.BERGER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BERGER ALAIN', '', '', '', '', 0),
(28, 'JP.BERNARD', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BERNARD JEAN PIERRE', '', '', '', '', 0),
(29, 'M.BERNARD', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BERNARD MAURICE', '', '', '', '', 0),
(30, 'JC.BERNIER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BERNIER JEAN CLAUDE', '', '', '', '', 0),
(31, 'F.BESSON', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BESSON FRANCK', '', '', '', '', 0),
(32, 'R.BILLEROT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BILLEROT RICHARD', '', '', '', '', 0),
(33, 'B.BIRONNEAU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BIRONNEAU BERNARD', '', '', '', '', 0),
(34, 'A.BLANCHET', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BLANCHET ANTHONY', '', '', '', '', 0),
(35, 'C.BLANVILLAIN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BLANVILLAIN CONSTANT', '', '', '', '', 0),
(36, 'T.BLERIOT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BLERIOT Thomas', '', '', '', '', 0),
(37, 'T.BLIN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BLIN THIERRY', '', '', '', '', 0),
(38, 'L.BOUETE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BOUETE LAURENT', '', '', '', '', 0),
(39, 'F.BOURREAU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BOURREAU FABRICE', '', '', '', '', 0),
(40, 'C.BRANCHEREAU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BRANCHEREAU CHRISTOPHE', '', '', '', '', 0),
(41, 'B.BRIAND', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BRIAND BERTRAND', '', '', '', '', 0),
(42, 'J.BRIS', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BRIS JOHANN', '', '', '', '', 0),
(43, 'M.BROSSAS', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BROSSAS MICHEL', '', '', '', '', 0),
(44, 'A.BRUN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BRUN ARNAUD', '', '', '', '', 0),
(45, 'E.BUTEL', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BUTEL ERIKA', '', '', '', '', 0),
(46, 'N.BUTTLER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'BUTTLER NICOLAS', '', '', '', '', 0),
(47, 'G.CAILLAUD', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CAILLAUD GAETAN', '', '', '', '', 0),
(48, 'D.CESBRON', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CESBRON DOMINIQUE', '', '', '', '', 0),
(49, 'M.CHARTIER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CHARTIER MICHEL', '', '', '', '', 0),
(50, 'G.CHATOKHINE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CHATOKHINE Grard', '', '', '', '', 0),
(51, 'M.CHAUSSEE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CHAUSSEE MICKAELLE', '', '', '', '', 0),
(52, 'A.CHAUSSON', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CHAUSSON ARNAUD', '', '', '', '', 0),
(53, 'L.CHESNEAU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CHESNEAU LAURENT', '', '', '', '', 0),
(54, 'A.CHOLET', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CHOLET AURELIEN', '', '', '', '', 0),
(55, 'G.CLAVEREAU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CLAVEREAU GAELLE', '', '', '', '', 0),
(56, 'R.CLEMENCEAU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CLEMENCEAU RODOLPHE', '', '', '', '', 0),
(57, 'A.CLEMENT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CLEMENT ALAIN', '', '', '', '', 0),
(58, 'B.CLEMENT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CLEMENT BRUNO', '', '', '', '', 0),
(59, 'G.CLEMENT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CLEMENT GILLES', '', '', '', '', 0),
(60, 'JF.CLOUET', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CLOUET JEAN-FRANCOIS', '', '', '', '', 0),
(61, 'Y.COCHELIN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'COCHELIN YANN', '', '', '', '', 0),
(62, 'J.COHERGNE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'COHERGNE JEROME', '', '', '', '', 0),
(63, 'T.COMMUNAL', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'COMMUNAL THIERRY', '', '', '', '', 0),
(64, 'B.CORDIER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CORDIER BASTIEN', '', '', '', '', 0),
(65, 'PA.CORDIER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CORDIER PASCAL', '', '', '', '', 0),
(66, 'PH.CORDIER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CORDIER PHILIPPE', '', '', '', '', 0),
(67, 'K.COURBET', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'COURBET KEVIN', '', '', '', '', 0),
(68, 'P.CRUAUD', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'CRUAUD PATRICK', '', '', '', '', 0),
(69, 'B.DABE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'DABE Bernard', '', '', '', '', 0),
(70, 'M.DEMESLAY', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'DEMESLAY MAGALI', '', '', '', '', 0),
(71, 'E.DESGRANGES', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'DESGRANGES EMMANUEL', '', '', '', '', 0),
(72, 'M.DIATTA', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'DIATTA MAMADOU', '', '', '', '', 0),
(73, 'P.DOUET', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'DOUET PASCAL', '', '', '', '', 0),
(74, 'D.DROYER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'DROYER DAVID', '', '', '', '', 0),
(75, 'S.DUFAURET', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'DUFAURET SOPHIE', '', '', '', '', 0),
(76, 'J.DUMANGE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'DUMANGE JULIEN', '', '', '', '', 0),
(77, 'N.DURAND', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'DURAND NICOLAS', '', '', '', '', 0),
(78, 'A.FRAUX', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'FRAUX ALEXANDRE', '', '', '', '', 0),
(79, 'A.FREMY', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'FREMY ADRIEN', '', '', '', '', 0),
(80, 'E.FRESNEAU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'FRESNEAU ERIC', '', '', '', '', 0),
(81, 'C.GAIGEARD', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GAIGEARD CHRISTOPHE', '', '', '', '', 0),
(82, 'P.GAUTEUL', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GAUTEUL PHILIPPE', '', '', '', '', 0),
(83, 'A.GEDOUIN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GEDOUIN ARNAUD', '', '', '', '', 0),
(84, 'F.GELINEAU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GELINEAU FABIENNE', '', '', '', '', 0),
(85, 'D.GEMIN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GEMIN DIDIER', '', '', '', '', 0),
(86, 'D.GOITTE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GOITTE DIDIER', '', '', '', '', 0),
(87, 'F.GOITTE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GOITTE FREDDY', '', '', '', '', 0),
(88, 'J.GREFFIER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GREFFIER JEROME', '', '', '', '', 0),
(89, 'S.GRIMAL', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GRIMAL SEBASTIEN', '', '', '', '', 0),
(90, 'T.GUCCIARDO', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GUCCIARDO THIERRY', '', '', '', '', 0),
(91, 'S.GUERIN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GUERIN STEPHANE', '', '', '', '', 0),
(92, 'K.GUIGANOU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GUIGANOU KATIA', '', '', '', '', 0),
(93, 'N.GUIGNARD', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GUIGNARD NICOLAS', '', '', '', '', 0),
(94, 'E.GUILLET', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'GUILLET EMMANUEL', '', '', '', '', 0),
(95, 'V.HAVIN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'HAVIN VIVIEN', '', '', '', '', 0),
(96, 'A.HEINRY', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'HEINRY ANTHONY', '', '', '', '', 0),
(97, 'B.HETAULT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'HETAULT BRUNO', '', '', '', '', 0),
(98, 'P.HUCHET', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'HUCHET PASCAL', '', '', '', '', 0),
(99, 'M.JAUMOTTE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'JAUMOTTE MICHAEL', '', '', '', '', 0),
(100, 'JC.JEFFRARD', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'JEFFRARD JEAN CLAUDE', '', '', '', '', 0),
(101, 'A.JELAIEL', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'JELAIEL ABDELLATIF', '', '', '', '', 0),
(102, 'T.JONCHERAY', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'JONCHERAY TONY', '', '', '', '', 0),
(103, 'A.JUDEAUX', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'JUDEAUX ANDY', '', '', '', '', 0),
(104, 'R.KABEZA', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'KABEZA ROGER', '', '', '', '', 0),
(105, 'M.KHOUMSI', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'KHOUMSI MOHAMED', '', '', '', '', 0),
(106, 'D.LANDEAU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'LANDEAU DOMINIQUE', '', '', '', '', 0),
(107, 'E.LANDEAU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'LANDEAU ERIC', '', '', '', '', 0),
(108, 'A.LANGLAIS', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'LANGLAIS ALAIN', '', '', '', '', 0),
(109, 'S.LANGLAIS', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'LANGLAIS STEPHANE', '', '', '', '', 0),
(110, 'M.LASTRE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'LASTRE MICKAEL', '', '', '', '', 0),
(111, 'F.LEBOT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'LEBOT FRANCK', '', '', '', '', 0),
(112, 'P.LEBREC', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'LEBREC PHILIPPE', '', '', '', '', 0),
(113, 'K.LECLERC', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'LECLERC KEVIN', '', '', '', '', 0),
(114, 'D.LEJOLY', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'LEJOLY DIDIER', '', '', '', '', 0),
(115, 'J.LEJOLY', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'LEJOLY JULIEN', '', '', '', '', 0),
(116, 'J.LELIEVRE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'LELIEVRE JIMMY', '', '', '', '', 0),
(117, 'J.LENOIR', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'LENOIR JACKY', '', '', '', '', 0),
(118, 'V.MADIOT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'MADIOT VIANNEY', '', '', '', '', 0),
(119, 'B.MAINFRAIS', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'MAINFRAIS BRUNO', '', '', '', '', 0),
(120, 'P.MARTIN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'MARTIN PIERRE', '', '', '', '', 0),
(121, 'G.MASSON', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'MASSON Georgio', '', '', '', '', 0),
(122, 'A.MENARD', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'MENARD AMAURY', '', '', '', '', 0),
(123, 'H.MENDES', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'MENDES CARREIRA HERVE', '', '', '', '', 0),
(124, 'O.MERLE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'MERLE OLIVIER', '', '', '', '', 0),
(125, 'P.MERRET', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'MERRET PIERRICK', '', '', '', '', 0),
(126, 'P.METIVIER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'METIVIER PASCAL', '', '', '', '', 0),
(127, 'F.MIQUEL', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'MIQUEL FABIEN', '', '', '', '', 0),
(128, 'D.MONTEMBAULT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'MONTEMBAULT DIDIER', '', '', '', '', 0),
(129, 'E.MORON', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'MORON ERWAN', '', '', '', '', 0),
(130, 'E.MOUANDA', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'MOUANDA EDGARD', '', '', '', '', 0),
(131, 'JJ.MOULIN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'MOULIN JEAN JACQUES', '', '', '', '', 0),
(132, 'C.OLIVE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'OLIVE CHRISTIAN', '', '', '', '', 0),
(133, 'D.ONILLON', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'ONILLON DIDIER', '', '', '', '', 0),
(134, 'A.OZTURK', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'OZTURK AYHAN', '', '', '', '', 0),
(135, 'J.PAPIN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'PAPIN Julien', '', '', '', '', 0),
(136, 'T.PAPIN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'PAPIN THIERRY', '', '', '', '', 0),
(137, 'A.PAYRAUDEAU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'PAYRAUDEAU ARNAUD', '', '', '', '', 0),
(138, 'B.PAYRAUDEAU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'PAYRAUDEAU BRUNO', '', '', '', '', 0),
(139, 'P.PELE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'PELE PATRICK', '', '', '', '', 0),
(140, 'S.PERCHER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'PERCHER STEPHANE', '', '', '', '', 0),
(141, 'X.PERRAULT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'PERRAULT XAVIER', '', '', '', '', 0),
(142, 'F.PERRUSSEL', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'PERRUSSEL FREDERIC', '', '', '', '', 0),
(143, 'V.PETEUL', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'PETEUL VERONIQUE', '', '', '', '', 0),
(144, 'L.PIEDNOIR', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'PIEDNOIR LUDOVIC', '', '', '', '', 0),
(145, 'G.PINEAU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'PINEAU GUY', '', '', '', '', 0),
(146, 'M.POLLET', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'POLLET MAXIME', '', '', '', '', 0),
(147, 'D.QUINTON', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'QUINTON DENIS', '', '', '', '', 0),
(148, 'MP.RENOU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'RENOU BRIAND MARIE PASCALE', '', '', '', '', 0),
(149, 'S.RETIER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'RETIER STEPHANIE', '', '', '', '', 0),
(150, 'M.REZE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'REZE MAURICE', '', '', '', '', 0),
(151, 'D.RIANT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'RIANT DIMITRI', '', '', '', '', 0),
(152, 'F.RICOUL', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'RICOUL FREDERIC', '', '', '', '', 0),
(153, 'MB.RIVERON', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'RIVERON GESLOT MARIE BEATRICE', '', '', '', '', 0),
(154, 'N.ROBERT', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'ROBERT NICOLAS', '', '', '', '', 0),
(155, 'P.ROY', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'ROY PASCAL', '', '', '', '', 0),
(156, 'N.SANTINI', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'SANTINI NICOLAS', '', '', '', '', 0),
(157, 'M.SAVIDAN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'SAVIDAN MICKAEL', '', '', '', '', 0),
(158, 'Y.SNGAN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'SNGAN YANN', '', '', '', '', 0),
(159, 'F.TANCRAY', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'TANCRAY FRANCK', '', '', '', '', 0),
(160, 'I.TESSIER', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'TESSIER IGOR', '', '', '', '', 0),
(161, 'Y.THIFINE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'THIFINE YANN', '', '', '', '', 0),
(162, 'JC.TIDAHY', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'TIDAHY JACQUES CORNELIO', '', '', '', '', 0),
(163, 'O.TOURET', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'TOURET OLIVIER', '', '', '', '', 0),
(164, 'Y.TREDAN', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'TREDAN YOHANN', '', '', '', '', 0),
(165, 'F.TROUBOUL', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'TROUBOUL FLORENT', '', '', '', '', 0),
(166, 'X.TUDOUX', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'TUDOUX XAVIER', '', '', '', '', 0),
(167, 'F.VERDON', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'VERDON FREDERIC', '', '', '', '', 0),
(168, 'B.VERGNE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'VERGNE BRUNO', '', '', '', '', 0),
(169, 'JF.VITRY', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'VITRY JEAN FRANCOIS', '', '', '', '', 0),
(170, 'B.VOYE', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'VOYE BORIS', '', '', '', '', 0),
(171, 'E.YOU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'YOU EMMANUEL', '', '', '', '', 0),
(172, 'M.YOU', '198a275e8ab2df73441a19c64381882c', 'slts49', 0, 'YOU MICHEL', '', '', '', '', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idarticle`);

--
-- Index pour la table `article_commande`
--
ALTER TABLE `article_commande`
  ADD PRIMARY KEY (`idarticlecommande`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idcommande`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`idmodule`);

--
-- Index pour la table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`idsetting`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idarticle` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `article_commande`
--
ALTER TABLE `article_commande`
  MODIFY `idarticlecommande` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idcommande` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `idmodule` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `setting`
--
ALTER TABLE `setting`
  MODIFY `idsetting` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `iduser` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
