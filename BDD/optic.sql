-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 13 juin 2022 à 03:26
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `optic`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `libelCategorie` varchar(255) NOT NULL,
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libelCategorie`) VALUES
(2, 'Lunette pharmaceutique'),
(3, 'Lunette de soleil'),
(4, 'lentille de contact');

-- --------------------------------------------------------

--
-- Structure de la table `com`
--

DROP TABLE IF EXISTS `com`;
CREATE TABLE IF NOT EXISTS `com` (
  `numcom` int(11) NOT NULL,
  `datecom` date NOT NULL,
  `datepay` date DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  PRIMARY KEY (`numcom`),
  KEY `iduser` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `com`
--

INSERT INTO `com` (`numcom`, `datecom`, `datepay`, `iduser`, `statut`) VALUES
(13592, '2022-04-28', '2022-04-28', 3, 1),
(15669, '2022-02-12', NULL, NULL, NULL),
(19748, '2022-05-28', NULL, NULL, 0),
(21121, '2022-02-12', NULL, NULL, NULL),
(29871, '2022-07-13', '2022-06-13', 3, 1),
(30696, '2022-05-28', NULL, NULL, 0),
(33788, '2022-05-28', NULL, NULL, 0),
(33940, '2022-02-12', NULL, NULL, NULL),
(45978, '2022-05-28', NULL, NULL, 0),
(47112, '2022-02-12', NULL, NULL, NULL),
(51541, '2022-02-14', '2022-02-14', 3, 1),
(63437, '2022-06-13', NULL, NULL, 0),
(68160, '2022-02-12', NULL, NULL, NULL),
(68225, '2022-02-12', NULL, NULL, NULL),
(70090, '2022-02-12', '2022-02-13', 3, 1),
(70339, '2022-02-20', '2022-02-20', 3, 1),
(71084, '2022-05-28', NULL, NULL, 0),
(72050, '2022-05-28', NULL, NULL, 0),
(76455, '2022-02-13', '2022-02-13', 3, 1),
(80661, '2022-02-12', NULL, NULL, NULL),
(83404, '2022-02-13', '2022-02-13', 3, 1),
(88213, '2022-02-12', NULL, NULL, NULL),
(88954, '2022-02-12', NULL, NULL, NULL),
(93234, '2022-02-12', NULL, NULL, NULL),
(96154, '2022-02-12', NULL, NULL, NULL),
(97222, '2022-05-28', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `detailcom`
--

DROP TABLE IF EXISTS `detailcom`;
CREATE TABLE IF NOT EXISTS `detailcom` (
  `numcom` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `qtecom` int(11) NOT NULL,
  KEY `numcom` (`numcom`),
  KEY `idProd` (`idProd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detailcom`
--

INSERT INTO `detailcom` (`numcom`, `idProd`, `qtecom`) VALUES
(47112, 52, 2),
(47112, 56, 2),
(80661, 52, 2),
(80661, 56, 2),
(33940, 52, 2),
(33940, 56, 2),
(88213, 52, 2),
(88213, 56, 2),
(68225, 52, 2),
(68225, 56, 2),
(21121, 52, 2),
(21121, 56, 2),
(68160, 52, 2),
(68160, 56, 2),
(96154, 52, 2),
(96154, 56, 2),
(15669, 52, 2),
(15669, 56, 2),
(88954, 52, 2),
(88954, 56, 2),
(93234, 52, 2),
(93234, 56, 2),
(70090, 41, 3),
(70090, 6, 1),
(83404, 6, 1),
(76455, 6, 1),
(51541, 4, 1),
(51541, 58, 1),
(70339, 47, 1),
(13592, 48, 1),
(97222, 49, 1),
(97222, 48, 1),
(33788, 49, 1),
(33788, 48, 2),
(30696, 49, 1),
(30696, 48, 2),
(71084, 49, 1),
(71084, 48, 2),
(45978, 49, 1),
(45978, 48, 2),
(72050, 49, 1),
(72050, 48, 2),
(19748, 48, 2),
(19748, 60, 1),
(29871, 49, 1),
(63437, 47, 1),
(63437, 53, 1);

-- --------------------------------------------------------

--
-- Structure de la table `heurerdv`
--

DROP TABLE IF EXISTS `heurerdv`;
CREATE TABLE IF NOT EXISTS `heurerdv` (
  `idheure` int(11) NOT NULL AUTO_INCREMENT,
  `libelheure` varchar(255) NOT NULL,
  PRIMARY KEY (`idheure`),
  KEY `idheure` (`idheure`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `heurerdv`
--

INSERT INTO `heurerdv` (`idheure`, `libelheure`) VALUES
(1, '9H'),
(2, '9H30'),
(3, '10H'),
(4, '10H30'),
(5, '11H'),
(6, '11H30'),
(7, '14H'),
(8, '14H30'),
(9, '15H'),
(10, '15H30'),
(11, '16H');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `idMarque` int(11) NOT NULL AUTO_INCREMENT,
  `libelmarque` varchar(255) NOT NULL,
  KEY `idMarque` (`idMarque`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`idMarque`, `libelmarque`) VALUES
(3, 'GUCCI'),
(4, 'BOSS'),
(5, 'CARRERA'),
(6, 'CHANEL'),
(7, 'DEMETZ'),
(8, 'DOLCE & GABBANA   '),
(9, 'FACONNABLE'),
(10, 'FILIUM'),
(11, 'LEVEL'),
(12, 'GIORGIO ARMANI'),
(13, 'GUESS'),
(14, 'JULBO'),
(15, 'LACOSTE'),
(16, 'LUKKAS'),
(17, 'OAKLEY'),
(18, 'OSCAR VERSION'),
(19, 'PAUL & JOE'),
(20, 'PERSOL'),
(21, 'PRADA'),
(22, 'RAY-BAN'),
(23, 'TOM FORD'),
(24, 'BURBERRY'),
(25, 'BA&SH'),
(26, 'CHOPARD'),
(27, 'CALVIN KLEIN'),
(28, 'CARVEN'),
(29, 'WOOW'),
(30, 'VOGUE'),
(31, 'S+ARCK'),
(32, 'RAPHL LAUREN'),
(33, 'NIKE'),
(34, 'GIVENCHY');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProd` int(11) NOT NULL AUTO_INCREMENT,
  `idCategorie` int(11) NOT NULL,
  `idMarque` int(11) NOT NULL,
  `ModelProd` varchar(255) NOT NULL,
  `priceProd` int(11) NOT NULL,
  `qteProd` int(11) NOT NULL,
  `imgProd` varchar(255) NOT NULL,
  `descriptionProd` text,
  PRIMARY KEY (`idProd`),
  KEY `idCategorie` (`idCategorie`),
  KEY `idMarque` (`idMarque`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProd`, `idCategorie`, `idMarque`, `ModelProd`, `priceProd`, `qteProd`, `imgProd`, `descriptionProd`) VALUES
(4, 4, 14, 'Acuvue Moist  ', 230000, 209, 'cef32c86399174f55f810bacbe5bc616.jpg', 'LENTILLE DE MARQUE \r\nCONSEILLER PAR NOS OPTICIENS'),
(5, 4, 20, 'Acuvue Oasys  ', 167000, 44, '793573861d925ed7124af7d712147897.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(6, 4, 16, 'Air Optix Aqua', 96000, 7, '9d2d603a2c6235c3c42280853425c296.jpg', '\r\nLENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(7, 4, 13, 'ACUVUE-OASYS-ASTIGMATIS', 123000, 0, 'ff83ec05ef78c50d36ac33e9a88116ef.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(8, 4, 9, 'ACUVUE-OASYS-HYDRACLEAR-PLUS', 89000, 45, 'e39c32537c8e84e00ad31067dbdd7093.jpg', '\r\nLENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(9, 4, 17, 'Air Optix Aquahydraglyde', 99900, 6, 'c3d6084ddfc47ccaefe7ce125fb79b6e.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS'),
(10, 4, 29, 'Air Optix Plus HydraGlydeOC', 300000, 2, '5ca6ea1a2af0f486285815d05cfca85e.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS'),
(11, 4, 11, 'Biofinity-MF', 45000, 67, '1160d38663c60a5d335834f39e0955ee.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS'),
(12, 4, 14, 'Biofinity-Sphere', 235000, 19, '8a6e85910a6b7ec67941d4a6178c03fb.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS'),
(13, 4, 10, 'Biofinity-Toric', 78000, 34, '28b0da7794e7b7b2175bab2eef697b3d.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS'),
(14, 4, 10, 'DailiesAllDayComfort-90', 345600, 8, '69c546d804695738c4ddff3cc77dfcc8.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS'),
(15, 4, 31, 'DailiesAquaComfortPlus90', 88000, 9, 'ea2f5e91f15040b33be691027560036c.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS'),
(16, 4, 17, 'DailiesAquaComfortPlusMultifocal30', 334000, 54, 'f38984784b2f9d18e2eb5cce824bd550.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS'),
(17, 4, 14, 'Hydrofeel55', 87500, 7, 'b407f6892dd5fafb4a246212f0b74fe5.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS'),
(18, 4, 16, 'Max2-Plus', 67000, 23, '36369ce5fffd5bb8128a9ca9efef1df6.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS'),
(19, 4, 28, 'OasysAcuvueWithHydraclearPlus12', 89500, 15, '3e7a72040f9c7f4cbe620cd2769d990c.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS'),
(20, 4, 26, 'OneDayAcuvueMoist90', 75000, 28, 'b4d427635ac89609d1095f16a46a0c83.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS'),
(22, 4, 7, 'OneDayAcuvue-MoistForAstigmatism90', 56000, 45, '3ab14aa02d5ef614aba858f9a015428d.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(23, 4, 22, 'Ophtallmic-SWEETPROGRESSIVE', 54300, 58, 'a2f89b9a6183f91a6f83aa2f6fdf547e.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(24, 4, 24, 'Ophtalmic-HR1DayProgressive30', 34000, 44, 'a046bfb423027d26a058f29cfc29a40c.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(25, 4, 28, 'Ophtalmic-HR-1DayProgressive90', 45600, 89, '43ddffad9e9b4994c60e348c3f2cdd12.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(26, 4, 23, 'OphtalmicHRProgressive', 94000, 38, 'dbaec88b2fb947408fbbbb6c34f5b5f8.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(27, 4, 20, 'Ophtalmic-HRSpheric', 58000, 54, 'fb3af747c8b2300b359f1bcdb9f1efb6.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(28, 4, 14, 'Ophtalmic-HRToric', 48300, 9, '1bf1bb383546816ae8b4fcabd0d220a3.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(29, 4, 30, 'SoflensDaily90', 67500, 55, '31ad234142ea0124736dc30cd6337cea.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(30, 4, 14, 'T1-90l', 84400, 53, '9ff5a92b2ee79902c49e6c1473c78bfd.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(31, 3, 4, 'BOSS-0921-S-807IR', 240000, 13, 'add9f7b876e5aeb6e6478bfcffb77408.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(32, 3, 8, 'DOLCE-GABBANA-DG-2242', 165000, 10, '6a3dd042ce1951a29192582338a7ce48.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(33, 3, 8, 'DOLCE-GABBANA-DG-4268', 147000, 18, 'b374921b0f443ef2538ee1266aaa1299.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(34, 3, 3, 'GUCCI-GG-0091S', 187000, 13, '9a1eeb384b0d12524954dd1589bde420.jpg', 'LENTILLE CONSEILLER\r\nPAR NOS OPTICIENS '),
(35, 3, 15, 'LACOSTE-L-102SND', 239000, 20, '995b339251fe5a9f374b002287bedd8f.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(36, 3, 17, 'OAKLEY-OO-9013D0-FROGSKINS', 185000, 18, '59b55cbdc244e650fae3ea6d7889b9dc.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(37, 3, 17, 'OAKLEY-OO-9102E9-HOLBROOK', 199000, 16, '061c5dd53327114cd70ad80592e4c8dc.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(38, 3, 20, 'PERSOL-PO-3019S', 267000, 5, 'f2ae2b78f958c1425d4e7c3965bd4e81.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(39, 3, 20, 'PERSOL-PO-3092SM-Suprema', 234000, 3, '1815be5d0a41cc37a169d50b65b8e585.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(40, 3, 21, 'PRADA-PR-01OS-1AB3M1', 340000, 2, '886f728586b4e2f46bf42a85f682e6d3.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(41, 3, 22, 'RAY-BAN-RB--New-Wayfarer', 197000, 13, '35a2d0d0e0f26ff1bac0ed487673e164.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(42, 3, 22, 'RAY-BAN-RB-Clubmaster-Classic', 183000, 42, '02fb0d322800e92802df437bc7c6ef26.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(43, 3, 22, 'RAY-BAN-RB-Aviator', 164000, 8, '7ed8d102fe63e868008fe533b8924de5.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(44, 3, 22, 'RAY-BAN-RB-3183w400', 380000, 16, '5f705e6b9dac236214b051d37f13d828.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(45, 3, 22, 'RAY-BAN-RB-Round-Metal', 178000, 9, 'f02b2cf949c7713fdb1ef4a9414fa7c8.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(46, 3, 23, 'TOM-FORD-FT-NICOLETTE', 245000, 5, '02360dd150721d3f37a3b5705ec8c8c3.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(47, 2, 8, 'DOLCE-GABBANA-DG', 233000, 206, '067c8136f39e8d10d845cf5efdc19629.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(48, 2, 10, 'FILIUM-FI-NORO', 349000, 1, 'f5a5c5d0cbaa0022f32d44a55580334e.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(49, 2, 10, 'FILIUM-FI-1802-BLEU', 389000, 3, '0f18cf3b9f6cbc4417f1f808a0a98da3.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(50, 2, 11, 'FORFAIT-LE-1725-DORE', 278000, 8, '072195e43a84b5bb13064ef40fc90811.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(51, 2, 12, 'GIORGIO-ARMANI-AR-112MJ', 203000, 5, '8f04c7f79e81911dc6659c6e9c30ea43.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(52, 2, 12, 'GIORGIO-ARMANI-AR-5089', 307000, 4, 'f45d9fddcd200061a3f4f8f1e0ea95f5.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(53, 2, 12, 'GIORGIO-ARMANI-AR-5089', 208000, 7, 'cee6b66e0e411ac0a7b1fbf3a36dd59e.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(54, 2, 3, 'GUCCI-GG-0004O', 309000, 8, '54340f95038be40e09c7622e51a8fad3.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(55, 2, 11, 'LEVEL-LE-1602-ROUG', 109000, 6, '770c0d5fa0ccd11dc03c3325fda9796f.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(56, 2, 16, 'LUKKAS-LU-1606-NOIR', 205500, 7, '55f99e2ec2075edc6be0553434e0e291.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(57, 2, 16, 'LUKKAS-LU-1905-DONU', 305600, 9, '150376bcfe0d527850dcafe32807401e.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(58, 2, 16, 'LUKKAS-LU-P-1705-ECFO', 269000, 11, '64e837f76adc098c4cc568881112fab9.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(59, 2, 18, 'OSCAR-OV-1709-RONO', 342000, 17, 'fe6651fe270481c32f3a2d42e0445129.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(60, 2, 22, 'RAY-BAN-RX-1970V-OVAL', 406000, 25, 'd9d4eb6fe84d0392cafb4d61eefff528.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(61, 2, 22, 'RAY-BAN-RX-3447V-Round-Metal', 399000, 34, '0a4de1d1861358b8a1fde4651348a35f.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(62, 2, 22, 'RAY-BAN-RX-7066', 567000, 23, '65208b8deaf3ab0f88d4b9a6f3050cb5.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS '),
(63, 2, 22, 'RAY-BAN-RX-7047', 189000, 29, 'd9ce20e38896c7bf616da17494ef5d1c.jpg', 'LUNETTE CONSEILLER\r\nPAR NOS OPTICIENS ');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `idrdv` int(11) NOT NULL AUTO_INCREMENT,
  `nomrdv` varchar(255) NOT NULL,
  `prenomrdv` varchar(255) NOT NULL,
  `mailrdv` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `idTyperdv` int(11) NOT NULL,
  `daterdv` varchar(255) NOT NULL,
  `idheure` int(11) NOT NULL,
  `sexerdv` varchar(255) NOT NULL,
  `naissrdv` varchar(255) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `statut` int(11) NOT NULL,
  `dateday` varchar(255) NOT NULL,
  PRIMARY KEY (`idrdv`),
  KEY `iduser` (`iduser`),
  KEY `idheure` (`idheure`),
  KEY `idTyperdv` (`idTyperdv`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`idrdv`, `nomrdv`, `prenomrdv`, `mailrdv`, `phone`, `idTyperdv`, `daterdv`, `idheure`, `sexerdv`, `naissrdv`, `iduser`, `statut`, `dateday`) VALUES
(15, 'Valor', 'Irug', 'asteroblack1@gmail.com', '0506682880', 1, '2022-03-11', 7, 'Masculin', '2022-02-22', 3, 1, '22-02-20'),
(16, 'tigoli', 'fred', 'asteroblack1@gmail.com', '0788396145', 1, '2022-02-24', 4, 'Masculin', '2022-02-03', 3, 1, '22-02-20'),
(17, 'Tigoli', 'zaraki', 'fred@gmail.com', '0788396145', 1, '2022-02-15', 7, 'Masculin', '2022-03-03', NULL, 0, '22-02-20'),
(18, ' tigoli', 'olivier', 'tigolifrederic285@gmail.com', '0767630436', 1, '2022-06-18', 4, 'Masculin', '2022-06-10', 3, 1, '22-06-09'),
(19, 'tigoli', 'frederic', 'Tigolifrederic283@gmail.com', '0142994419', 3, '2022-06-14', 4, 'Masculin', '2022-06-14', 3, 1, '22-06-13'),
(20, 'assemien', 'frederic', 'tigolifrederic285@gmail.com', '014552232', 1, '2022-06-24', 7, 'Masculin', '2022-06-15', 3, 1, '22-06-13'),
(21, 'assemien', 'frederic', 'tigolifrederic285@gmail.com', '014552232', 1, '2022-06-24', 7, 'Masculin', '2022-06-15', 3, 1, '22-06-13');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `libelRole` varchar(255) NOT NULL,
  KEY `idRole` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRole`, `libelRole`) VALUES
(1, 'SuperSu'),
(2, 'Caissière/Caissier'),
(3, 'Ophtamologe'),
(4, 'Gestionnaire de stock');

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

DROP TABLE IF EXISTS `sexe`;
CREATE TABLE IF NOT EXISTS `sexe` (
  `idSexe` int(11) NOT NULL AUTO_INCREMENT,
  `libelSexe` varchar(255) NOT NULL,
  KEY `idSexe` (`idSexe`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sexe`
--

INSERT INTO `sexe` (`idSexe`, `libelSexe`) VALUES
(1, 'Homme'),
(2, 'Femme');

-- --------------------------------------------------------

--
-- Structure de la table `typerdv`
--

DROP TABLE IF EXISTS `typerdv`;
CREATE TABLE IF NOT EXISTS `typerdv` (
  `idTyperdv` int(11) NOT NULL AUTO_INCREMENT,
  `libelTyperdv` varchar(255) NOT NULL,
  KEY `idTyperdv` (`idTyperdv`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typerdv`
--

INSERT INTO `typerdv` (`idTyperdv`, `libelTyperdv`) VALUES
(1, 'VERIFICATION DE VUE'),
(2, 'CHOIX DE LUNETTE'),
(3, 'RETRAIT DE LUNETTE'),
(4, 'ENTRETIEN DE LUNETTE'),
(5, 'CONTROLE DE LUNETTE');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nomuser` varchar(255) NOT NULL,
  `prenomuser` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `idSexe` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  `mdpuser` varchar(255) NOT NULL,
  `photouser` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  KEY `idSexe` (`idSexe`),
  KEY `idRole` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `nomuser`, `prenomuser`, `login`, `idSexe`, `idRole`, `mdpuser`, `photouser`) VALUES
(3, 'tigoli', 'fred', 'admin', 1, 1, '$2y$12$QsQ/TJTg.9Ss.I8AjI.gDOACToJ9coVFPSHUHY6UCvX9Q9mKlwRKa', '6c5399877a8663b4d55690f87cf3c59d.jpg'),
(4, 'kenpachi', 'zaraki', '39kenpacZ', 1, 3, '$2y$12$EQxARG6OWV7aJ6oaOyWRzOOc7YcIhxxfAYBElIdVzBcSgR3B/FW/W', 'candidat@email.com_2021110295587.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `com`
--
ALTER TABLE `com`
  ADD CONSTRAINT `com_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Contraintes pour la table `detailcom`
--
ALTER TABLE `detailcom`
  ADD CONSTRAINT `detailcom_ibfk_1` FOREIGN KEY (`idProd`) REFERENCES `produit` (`idProd`),
  ADD CONSTRAINT `detailcom_ibfk_2` FOREIGN KEY (`numcom`) REFERENCES `com` (`numcom`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`idMarque`) REFERENCES `marque` (`idMarque`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `rdv_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`),
  ADD CONSTRAINT `rdv_ibfk_3` FOREIGN KEY (`idheure`) REFERENCES `heurerdv` (`idheure`),
  ADD CONSTRAINT `rdv_ibfk_4` FOREIGN KEY (`idTyperdv`) REFERENCES `typerdv` (`idTyperdv`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`idSexe`) REFERENCES `sexe` (`idSexe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
