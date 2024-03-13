-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 mars 2024 à 17:57
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rmsbd`
--

-- --------------------------------------------------------

--
-- Structure de la table `bcommande`
--

CREATE TABLE `bcommande` (
  `numbc` varchar(15) NOT NULL,
  `nomfic` varchar(255) NOT NULL,
  `cheminfic` varchar(255) NOT NULL,
  `compt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bcommande`
--

INSERT INTO `bcommande` (`numbc`, `nomfic`, `cheminfic`, `compt`) VALUES
('', '', '', 1),
('41118190', '', 'file/bc/', 11),
('4523601', '', 'file/bc/', 12),
('5500061107', '', 'file/bc/', 8),
('5500061109', '', 'file/bc/', 6),
('5500061112', '', 'file/bc/', 7),
('85111', '', 'file/bc/', 9),
('CAC2401SIG00116', '', 'file/bc/', 5),
('SKCI/1951/21', '', 'file/bc/', 10),
('SKCI/1999/24', '', 'file/bc/', 13),
('SKCI/2027/24', 'Capture d\'écran 2024-01-11 210551.png', 'file/bc/Capture d\'écran 2024-01-11 210551.png', 14);

-- --------------------------------------------------------

--
-- Structure de la table `blivraison`
--

CREATE TABLE `blivraison` (
  `numbl` varchar(20) NOT NULL,
  `dateliv` date DEFAULT NULL,
  `nonfic` varchar(255) NOT NULL,
  `cheminfic` varchar(255) NOT NULL,
  `compt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `blivraison`
--

INSERT INTO `blivraison` (`numbl`, `dateliv`, `nonfic`, `cheminfic`, `compt`) VALUES
('', NULL, '', '', 1),
('0000205', '2024-01-29', '', 'file/bl/', 20),
('0000206', '2024-02-01', '', 'file/bl/', 17),
('0000210', '2024-02-16', 'Capture d\'écran 2024-02-23 155356.png', 'file/bl/Capture d\'écran 2024-02-23 155356.png', 29),
('0000211', '2024-02-20', 'Capture d\'écran 2024-01-09 190945.png', 'file/bl/Capture d\'écran 2024-01-09 190945.png', 28),
('0000214', '2024-02-22', 'Capture d\'écran 2024-01-11 181705.png', 'file/bl/Capture d\'écran 2024-01-11 181705.png', 27),
('0000221', '2024-03-04', '', 'file/bl/', 42),
('0000222', '2024-03-04', '', 'file/bl/', 43),
('0000296', '2024-01-22', '', 'file/bl/', 10),
('0000298', '2024-01-26', '', 'file/bl/', 18),
('0000753', '2024-03-01', '', 'file/bl/', 40),
('0000754', '2024-03-04', '', 'file/bl/', 41),
('0004494', '2024-02-06', '', 'file/bl/', 3),
('0004498', '2024-01-23', '', 'file/bl/', 13),
('0004499', '2024-01-23', '', 'file/bl/', 15),
('0004501', '2024-02-05', '', 'file/bl/', 24),
('0004539', '2024-01-29', '', 'file/bl/', 4),
('0004540', '2024-01-29', '', 'file/bl/', 22),
('0004541', '2024-02-07', '', 'file/bl/', 16),
('0004545', '2024-02-27', '', 'file/bl/', 37),
('0004546', '2024-02-27', '', 'file/bl/', 36),
('0004547', '2024-02-27', '', 'file/bl/', 38),
('0004548', '2024-02-27', '', 'file/bl/', 34),
('0004564', '2024-02-15', '', 'file/bl/', 14),
('0004569', '2024-02-27', '', 'file/bl/', 32),
('0004653', '2024-01-31', '', 'file/bl/', 11),
('0004654', '2024-01-31', '', 'file/bl/', 12),
('0004656', '2024-01-31', '', 'file/bl/', 8),
('0004657', '2024-02-06', '', 'file/bl/', 23),
('0004658', '2024-02-09', '', 'file/bl/', 21),
('0004659', '2024-02-09', '', 'file/bl/', 9),
('0004664', '2024-02-13', '', 'file/bl/', 19),
('0004665', '2024-02-16', '', 'file/bl/', 5),
('0004666', '2024-02-16', '', 'file/bl/', 6),
('0004667', '2024-02-16', '', 'file/bl/', 7),
('0004672', '2024-02-21', 'Capture d\'écran 2024-01-11 210551.png', 'file/bl/Capture d\'écran 2024-01-11 210551.png', 26),
('0004673', '2024-02-21', '', 'file/bl/', 25),
('0004674', '2024-02-27', '', 'file/bl/', 35),
('0004675', '2024-02-27', '', 'file/bl/', 39),
('0004676', '2024-02-29', '', 'file/bl/', 33),
('0004677', '2024-03-01', '', 'file/bl/', 30),
('0004678', '2024-03-01', '', 'file/bl/', 31);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `numcat` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`numcat`, `nom`) VALUES
(0, ''),
(2, 'MAS'),
(3, 'COMPRESSEUR'),
(4, 'PALAN'),
(5, 'COLLECTEUR'),
(6, 'ASPIRATEUR'),
(7, 'MCC'),
(8, 'ALTERNATEUR'),
(9, 'TRANSFORMATEUR'),
(10, 'POMPE'),
(11, 'REDUCTEUR'),
(12, 'FREIN'),
(13, 'MOTEUR VIBREUR'),
(14, 'MOTEUR VENTILO'),
(15, 'VERIN'),
(16, 'MOTEUR FREIN/VENTILO');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `numcli` varchar(10) NOT NULL,
  `nomcli` varchar(50) NOT NULL,
  `telephone` int(10) NOT NULL,
  `compt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`numcli`, `nomcli`, `telephone`, `compt`) VALUES
('', '', 0, 1),
('000', 'JM', 502, 32),
('001', 'A GOLD BONIKRO', 102, 2),
('002', 'SMIE', 0, 3),
('0020', 'ROX GOLD SANGO', 103, 33),
('003', 'SICABLE', 203, 4),
('0045', 'AGGREKO', 145, 37),
('007', 'OLAM COCOA 007', 504, 7),
('008', 'SUCAF FERKE', 704, 8),
('009', 'UNIWAX', 201, 9),
('0096', 'SG AGRO', 2564, 34),
('010', 'SKCI', 604, 10),
('011', 'SMI', 706, 11),
('0124', 'AIR LIQUIDE', 3256, 38),
('014', 'SIEM', 804, 14),
('016', 'CIMAF', 405, 15),
('0214', 'SMLA LOBO', 2568, 35),
('022', 'SEIT', 586, 16),
('025', 'CARENA', 509, 17),
('026', 'SOFACOPE', 451, 18),
('028', 'PETROCI', 478, 19),
('029', 'PERSEUS MINING', 584, 20),
('034', 'COCA COLA', 854, 21),
('035', 'M. KASSOUM', 325, 22),
('041', 'RMS', 789, 23),
('045', 'SOTACI', 487, 25),
('046', 'DIAKITE COCOA', 754, 26),
('050', 'CIE KOSSOU', 452, 28),
('052', 'SCCI', 457, 29),
('053', 'PLASTICABLE', 1265, 30),
('064', 'SMIE', 5458, 31),
('548', 'GRC', 102345, 36);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `numjob` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `numbl` varchar(20) NOT NULL,
  `numcli` varchar(10) NOT NULL,
  `nums` varchar(15) NOT NULL,
  `numdev` varchar(15) NOT NULL,
  `numbc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`numjob`, `date`, `numbl`, `numcli`, `nums`, `numdev`, `numbc`) VALUES
('24010001', '2024-01-04', '', '001', '2400402', '2401001YK', ''),
('24010002', '2024-01-04', '', '001', '2400402', '2401002YK', ''),
('24010003', '2024-01-04', '0004494', '002', '150-17455', '2401003YK', ''),
('24010004', '2024-01-08', '0004539', '003', '180429419', '2401004YK', 'CAC2401SIG00116'),
('24010005', '2024-01-09', '0004665', '007', '20020176', '2401005YK', '5500061109'),
('24010006', '2024-01-09', '0004666', '007', '14090067', '2401006YK', '5500061112'),
('24010007', '2024-01-09', '0004667', '007', '21034442', '2401007YK', '5500061107'),
('24010008', '2024-01-10', '0004656', '008', 'UC1205/104359', '2401008YK', '85111'),
('24010009', '2024-01-10', '', '009', 'SPS42', '2401009YK', ''),
('24010010', '2024-01-11', '0004659', '010', '1901/80001897', '2401010YK', 'SKCI/1951/21'),
('24010011', '2024-01-11', '0004546', '011', '802157G18105', '2401011YK', '41118190'),
('24010012', '2024-01-11', '0004545', '011', '8021157G18082', '2401012YK', '41118190'),
('24010013', '2024-01-11', '0004547', '011', '3G1P212607595', '2401013YK', '41118190'),
('24010014', '2024-01-11', '0000221', '014', '535892', '2401014YK', ''),
('24010015', '2024-01-11', '0000222', '014', 'SPS41', '2401015YK', ''),
('24010016', '2024-01-12', '0000296', '016', '1452884', '2401016YK', ''),
('24010017', '2024-01-12', '0000296', '016', 'SPS43', '2401017YK', ''),
('24010018', '2024-01-15', '0004653', '011', '1060491553', '2401018YK', '41118190'),
('24010019', '2024-01-15', '0004654', '011', '1044848', '2401019YK', '41118190'),
('24010020', '2024-01-15', '0004674', '011', '1059362362', '2401020YK', '41118190'),
('24010021', '2024-01-15', '0004548', '011', '1073813765', '2401021YK', '41118190'),
('24010022', '2024-01-16', '', '022', '0001655777', '2401022YK', ''),
('24010023', '2024-01-16', '', '001', 'SPS46', '2401023YK', ''),
('24010024', '2024-01-16', '', '001', 'SPS47', '2401024YK', ''),
('24010025', '2024-01-16', '0004498', '025', 'SPS48', '2401025YK', ''),
('24010026', '2024-01-17', '', '026', '48691980', '2401026YK', ''),
('24010027', '2024-01-18', '', '026', '1045669816', '2401027YK', ''),
('24010028', '2024-01-18', '0004564', '026', '0716131001', '2401028YK', ''),
('24010029', '2024-01-19', '0004499', '025', '2080459', '2401029YK', ''),
('24010030', '2024-01-19', '0004541', '029', '10411076', '2401030YK', '4523601'),
('24010031', '2024-01-19', '0000206', '016', '2002169', '2401031YK', ''),
('24010032', '2024-01-19', '0000298', '016', 'SPS55', '2401032YK', ''),
('24010033', '2024-01-19', '0000206', '016', '101140556', '2401033YK', ''),
('24010034', '2024-01-19', '0004664', '034', 'SIEC60034', '2401034YK', ''),
('24010035', '2024-01-22', '0000205', '035', '321997', '2401036YK', ''),
('24010036', '2024-01-22', '', '011', 'P6179177008', '2401036YK', ''),
('24010037', '2024-01-22', '', '011', 'P6178062003', '2401037YK', ''),
('24010038', '2024-01-22', '', '011', 'P6186079003', '2401038YK', ''),
('24010039', '2024-01-22', '0000298', '016', 'SPS62', '2401039YK', ''),
('24010040', '2024-01-22', '0004658', '010', '2019', '2401040YK', 'SKCI/1999/24'),
('24010041', '2024-01-26', '', '041', 'SPS64', '2401041YK', ''),
('24010042', '2024-01-26', '0004540', '003', 'NL81', '2401042YK', ''),
('24010043', '2024-01-26', '', '003', '8361750/1997', '2401043YK', ''),
('24010044', '2024-01-26', '0004657', '025', 'eo75093HN', '2401044YK', ''),
('24010045', '2024-01-30', '', '045', '714308/01', '2401045YK', ''),
('24010046', '2024-01-31', '0004501', '046', '3V001025', '2401046YK', ''),
('24020047', '2024-02-01', '', '009', 'SDM90SB', '2402047YK', ''),
('24020048', '2024-02-01', '', '016', '1452884', '2402048YK', ''),
('24020049', '2024-02-01', '0004673', '010', 'SHN1447818', '2402049YK', ''),
('24020050', '2024-02-01', '', '050', '1679/1', '2402050YK', ''),
('24020051', '2024-02-05', '', '022', 'B-110367', '2402051YK', ''),
('24020052', '2024-02-05', '0004675', '052', 'SPS75', '2402052YK', ''),
('24020053', '2024-02-06', '', '001', 'NL80', '2402053YK', ''),
('24020054', '2024-02-06', '', '001', '1029451752', '2402054YK', ''),
('24020055', '2024-02-09', '0004672', '010', '1452884-804-822', '2402055YK', 'SKCI/2027/24'),
('24020056', '2024-02-12', '0000214', '016', 'NL79', '2402056YK', ''),
('24020057', '2024-02-13', '', '003', '2-2-110-75-106', '2402057YK', ''),
('24020058', '2024-02-13', '0000211', '014', 'NS', '2402058YK', ''),
('24020059', '2024-02-14', '0000210', '014', 'F236066', '2402059YK', ''),
('24020060', '2024-02-15', '0000754', '022', '845371', '2402060YK', ''),
('24020061', '2024-02-16', '', '053', 'COS243558', '2402061YK', ''),
('24020062', '2024-02-19', '', '001', '1040949240', '2402062YK', ''),
('24020063', '2024-02-19', '', '001', '71/774537260100', '2402063YK', ''),
('24020064', '2024-02-20', '0004569', '064', '15017455', '2402064YK', ''),
('24020065', '2024-02-20', '0004676', '064', '121801/02', '2402065YK', ''),
('24020066', '2024-02-21', '', '008', '6C169501TH01', '2402066YK', ''),
('24020067', '2024-02-21', '', '008', '551857W06003', '2402067YK', ''),
('24020068', '2024-02-21', '', '010', '106682-3', '2402068YK', ''),
('24020069', '2024-02-22', '', '001', 'SPS94', '2402069YK', ''),
('24020070', '2024-02-22', '0000753', '016', '1452884', '2402070YK', ''),
('24020071', '2024-02-22', '', '001', 'SPS95', '2402071YK', ''),
('24020072', '2024-02-26', '0004677', '025', '20201081003', '2402072YK', ''),
('24020073', '2024-02-26', '0004678', '025', 'CDJ60560', '2402073YK', ''),
('24020074', '2024-02-26', '', '000', '211163001', '2402074YK', ''),
('24020075', '2024-02-27', '', '0020', 'P921A579001', '2402075YK', ''),
('24020076', '2024-02-27', '', '016', '152172', '2402076YK', ''),
('24020077', '2024-02-27', '', '014', '325879', '2402077YK', ''),
('24020078', '2024-02-28', '', '003', '718100/01', '2402078YK', ''),
('24020079', '2024-02-28', '', '064', 'BU6-165', '2402079YK', ''),
('24020080', '2024-02-29', '', '010', '201907020', '2402080YK', ''),
('24030081', '2024-03-01', '', '011', '10000007', '', ''),
('24030082', '2024-03-02', '', '011', '1078378579', '', ''),
('24030083', '2024-03-01', '', '011', '1037226617', '', ''),
('24030084', '2024-03-01', '', '011', '10737435', '', ''),
('24030085', '2024-03-01', '', '011', '10000004', '', ''),
('24030086', '2024-03-01', '', '0214', '1060985625', '', ''),
('24030087', '2024-03-06', '', '548', '368326', '', ''),
('24030088', '2024-03-06', '', '548', '1901/8000188356', '', ''),
('24030089', '2024-03-06', '', '548', '1801-8000166', '', ''),
('24030090', '2024-03-06', '', '548', '1901/8000189946', '', ''),
('24030091', '2024-03-06', '', '0045', 'X16L384713', '', ''),
('24030092', '2024-03-07', '', '0124', '1328601004', '', ''),
('24030093', '2024-03-07', '', '046', '120700', '', ''),
('24030094', '2024-03-07', '', '046', 'SPS122', '', ''),
('24030095', '2024-03-07', '', '046', '1265', '', ''),
('24030096', '2024-03-07', '', '034', '78', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `numdev` varchar(10) NOT NULL,
  `objet` text DEFAULT NULL,
  `physique` varchar(255) NOT NULL,
  `compt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`numdev`, `objet`, `physique`, `compt`) VALUES
('', NULL, '', 1),
('2002054YK', '', 'file/devis/', 56),
('2401001YK', NULL, '', 3),
('2401002YK', NULL, '', 4),
('2401003YK', NULL, '', 5),
('2401004YK', NULL, '', 6),
('2401005YK', NULL, '', 7),
('2401006YK', NULL, '', 9),
('2401007YK', NULL, '', 10),
('2401008YK', NULL, '', 11),
('2401009YK', NULL, '', 12),
('2401010YK', NULL, '', 13),
('2401011YK', NULL, '', 14),
('2401012YK', NULL, '', 15),
('2401013YK', NULL, '', 16),
('2401014YK', NULL, '', 17),
('2401015YK', NULL, '', 18),
('2401016YK', NULL, '', 19),
('2401017YK', NULL, '', 20),
('2401018YK', NULL, '', 21),
('2401019YK', NULL, '', 22),
('2401020YK', NULL, '', 23),
('2401021YK', NULL, '', 24),
('2401022YK', NULL, '', 25),
('2401023YK', NULL, '', 26),
('2401024YK', NULL, '', 27),
('2401025YK', NULL, '', 28),
('2401026YK', NULL, '', 29),
('2401027YK', NULL, '', 30),
('2401028YK', NULL, '', 31),
('2401029YK', NULL, '', 32),
('2401030YK', NULL, '', 33),
('2401031YK', NULL, '', 34),
('2401032YK', NULL, '', 35),
('2401033YK', NULL, '', 36),
('2401034YK', NULL, '', 37),
('2401035YK', '', 'file/devis/', 38),
('2401036YK', NULL, '', 39),
('2401037YK', NULL, '', 40),
('2401038YK', NULL, '', 41),
('2401039YK', NULL, '', 42),
('2401040YK', NULL, '', 43),
('2401041YK', NULL, '', 44),
('2401042YK', NULL, '', 45),
('2401043YK', NULL, '', 46),
('2401044YK', NULL, '', 47),
('2401045YK', NULL, '', 48),
('2401046YK', NULL, '', 49),
('2402047YK', NULL, '', 50),
('2402048YK', NULL, '', 51),
('2402049YK', NULL, '', 52),
('2402050YK', NULL, '', 53),
('2402051YK', NULL, '', 54),
('2402052YK', 'Capture d\'écran 2024-01-11 185133.png', 'file/devis/Capture d\'écran 2024-01-11 185133.png', 78),
('2402053YK', NULL, '', 55),
('2402054YK', 'Capture d\'écran 2024-02-23 155356.png', 'file/devis/Capture d\'écran 2024-02-23 155356.png', 77),
('2402055YK', NULL, '', 57),
('2402056YK', NULL, '', 58),
('2402057YK', NULL, '', 59),
('2402058YK', NULL, '', 60),
('2402059YK', NULL, '', 61),
('2402060YK', NULL, '', 62),
('2402061YK', NULL, '', 63),
('2402062YK', NULL, '', 64),
('2402063YK', NULL, '', 65),
('2402064YK', NULL, '', 66),
('2402065YK', NULL, '', 67),
('2402066YK', NULL, '', 68),
('2402067YK', NULL, '', 69),
('2402068YK', NULL, '', 70),
('2402069YK', NULL, '', 71),
('2402070YK', NULL, '', 72),
('2402071YK', NULL, '', 73),
('2402072YK', NULL, '', 74),
('2402073YK', NULL, '', 75),
('2402074YK', NULL, '', 76),
('2402075YK', NULL, '', 79),
('2402076YK', NULL, '', 80),
('2402077YK', NULL, '', 81),
('2402078YK', NULL, '', 82),
('2402079YK', NULL, '', 83),
('2402080YK', NULL, '', 84);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `nums` varchar(15) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `puissance` varchar(15) NOT NULL,
  `vitesse` varchar(15) NOT NULL,
  `numcat` int(11) NOT NULL,
  `compt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`nums`, `marque`, `type`, `puissance`, `vitesse`, `numcat`, `compt`) VALUES
('', '', '', '', '', 0, 1),
('0001655777', 'SDMO', 'ECO3263S/4', '', '', 8, 20),
('0716131001', 'WEG', 'BFG6400L2', '450KW', '2985RPM', 2, 51),
('10000004', 'GRUNDFOS', 'SA11020016501', '167KW', '1475RPM', 10, 109),
('10000007', 'GRUNDFOS', 'SA11020016004', '160/155KW', '1475RPM', 10, 105),
('101140556', 'WEG', '100L-02', '3KW', '2865RPM', 2, 56),
('1029451752', 'WEG W22', '355M/L-04', '315KW', '1490RPM', 2, 76),
('1037226617', 'WEG', 'L100L', '3KW', '1440RPM', 2, 107),
('1040949240', 'WEG', '225SM-04', '45KW', '1475RPM', 2, 87),
('10411076', 'WEG', '225S/M', '22KW', '735RPM', 2, 53),
('1044848', 'WEG', '280S/M', '37KW', '740RPM', 2, 17),
('1045669816', 'WEG', 'AL80604', '0.75KW', '1410RPM', 2, 50),
('1059362362', 'WEG', '355M/M', '315KW', '1490RPM', 2, 18),
('1060491553', 'WEG', '280S/M', '37KW', '740RPM', 2, 16),
('1060985625', 'WEG W22', '132M', '7.5KW', '1460RPM', 2, 114),
('106682-3', 'NL', 'HFB082-P300038', 'NL', 'NL', 11, 93),
('10737435', 'WEG', '132S', '5.5KW', '1460RPM', 2, 108),
('1073813765', 'WEG', '71', '0.37KW', '2840RPM', 2, 19),
('1078378579', '', '200L-04', '30KW', '1479RPM', 2, 106),
('120700', 'SRM', 'Y90-4', '1.5KW', '1400RPM', 2, 121),
('121801/02', 'NS', 'LS200L-T', '37KW', '2965RPM', 2, 90),
('1265', '', 'YE2-112M-M', '4KW', '1440RPM', 2, 123),
('1328601004', 'WEG', 'MGP450E', '932KW', '2980RPM', 2, 120),
('14090067', 'SWECO', 'SW423146311FG', '1.85KW', '1410RPM', 13, 6),
('1452884', 'SIEMENS', '1LA713368AB12', '3KW', '700RPM', 2, 15),
('1452884-804-822', 'SIEMENS', '1LE01', '7.5KW', '1400RPM', 2, 77),
('150-17455', 'SEW', '103WD112M64', '4KW', '1400RPM', 2, 3),
('15017455', 'NS', '103WD112M-4', '4KW', '1400RPM', 2, 89),
('152172', 'NICOTRA', 'FD29/9', '300W', '1340RPM', 6, 100),
('1679/1', '', 'LS200L', '45KW', '2940RPM', 2, 72),
('1801-8000166', 'SIEMENS', '1TL0001-OEB4', '1.5KW', '1440RPM', 2, 117),
('180429419', '', 'LAK41806AA', '140KW', '2030RPM', 7, 4),
('1901/8000188356', 'SIEMENS', '1TL0001-2AB4', '30KW', '1470RPM', 2, 116),
('1901/80001897', 'SIEMENS', '1LE01026ACBO', '5.5KW', '1450RPM', 2, 9),
('1901/8000189946', 'SIEMENS', '1TL0001-1DB4', '15KW', '1465RPM', 2, 118),
('2-2-110-75-106', 'VERLINDE', 'L-21104', '0.45/0.11KW', '2690/645RPM', 4, 82),
('20020176', 'SWECO', 'SW423146311FG', '1.85KW', '1410RPM', 13, 5),
('2002169', 'TECHTOP', 'T3A112M1-4', '4KW', '1445RPM', 2, 54),
('2019', 'SERMES', 'QS71M4B40-AP', '0.37KW', '1390RPM', 2, 63),
('201907020', 'SHANGAI', 'HSJ3540', '500KVA', '1500RPM', 8, 104),
('20201081003', 'GLO', '180L4', '22KW', '1465RPM', 2, 96),
('2080459', '', '400L2567', '9/26KW', '1175/1173RPM', 2, 52),
('21034442', 'SWECO', 'BHL10/1700UX', '1.1KW', '1000RPM', 13, 7),
('211163001', '', '6RN315L04', '160KW', '1490RPM', 2, 98),
('2400402', '', '2180090', '90kw', '29550rpm', 10, 2),
('321997', 'ELECTROME', 'A11/2', '0.8KW', '2800RPM', 2, 58),
('325879', 'GLER', '108T56-4', '368W', '1320RPM', 11, 101),
('368326', 'POMPES SALMSON', 'VLS132SM', '5.5KW', '1450RPM', 2, 115),
('3G1P212607595', 'ABB', 'M3AA160MLA2', '11KW', '2943RPM', 2, 13),
('3V001025', 'FRASCOLD', 'V30-84Y', '10CV', '1450RPM', 3, 69),
('48691980', 'SEVER', 'KZK100Ld4', '3KW', '1410RPM', 12, 49),
('535892', '', 'LS90L2', '1.5KW', '1420RPM', 2, 14),
('551857W06003', 'LEROY SOMER', 'F315S-B3', '110KW', '1478RPM', 2, 92),
('6C169501TH01', 'LEROY SOMER', 'FLS315M4-B3', '132KW', '1485RPM', 2, 91),
('71/774537260100', 'SEW', 'KA77/TDRN132S4', '5.5KW', '1461/118RPM', 2, 88),
('714308/01', 'LEROY SOMER', 'LSK1324508', '25.4KW', '2260RPM', 7, 68),
('718100/01', 'LEROY SOMER', '1122M04', '8.6KW', '3090RPM', 16, 102),
('78', '', 'YZS-3-4', '0.18KW', '1500RPM', 13, 124),
('8021157G18082', 'LEROY SOMER', 'CM29/T', '2KW', '930RPM', 2, 12),
('802157G18105', 'LEROY SOMER', 'CM29/T', '2KW', '930RPM', 2, 10),
('8361750/1997', 'ABB', 'DMG250S', '312KW', '2221RPM', 7, 66),
('845371', 'KOLHER', 'NS', '16KVA', '3000RPM', 8, 85),
('B-110367', 'TSRUMI PUMP', '100BZ475', '9.16KW', '1455RPM', 10, 73),
('BU6-165', 'TRANSICOLD', 'CXM', '0.62/0.08KW', '2850/1425RPM', 14, 103),
('CDJ60560', 'HIGEN', '120HN1FCA5', '15KW', '1760RPM', 2, 97),
('COS243558', 'INGO', 'NS', '2400W', '3900RPM', 2, 86),
('eo75093HN', 'TMCIC', '250M', '132KW', '1770RPM', 2, 67),
('F236066', '', '180L/8', '11KW', '720RPM', 2, 84),
('NL79', 'SIEMENS', '1LA7133-8AB', '3KW', '715RPM', 2, 79),
('NL80', 'TOSHIBA', 'D355LL', '315KW', '1485RPM', 2, 80),
('NL81', 'AEG', 'G238/37', '160KW', '1800RPM', 7, 81),
('NS', 'GRUPO INDUSTRIALE', 'A90L4/B-3', '1.5KW', '1400RPM', 2, 83),
('P6178062003', 'TECO', 'D160M', '11KW', '1465RPM', 2, 60),
('P6179177008', 'TECO', 'D160M', '11KW', '1465RPM', 2, 59),
('P6186079003', 'TECO', 'D160M', '11KW', '1465RPM', 2, 61),
('P921A579001', 'TECO', '315S-M-L', '160KW', '1482RPM', 2, 99),
('SDM90SB', 'KEB', 'FI32BSG', '1.1KW', '700RPM', 2, 70),
('SHN1447818', 'CYCLO DRIVE', 'V100L/4', '', '', 2, 71),
('SIEC60034', 'KOLHER', 'KH04830T', '1300KVA', '1500/1800RPM', 8, 57),
('SPS122', '', 'YS7112', '370W', '2500RPM', 2, 122),
('SPS41', '', '', '', '', 2, 41),
('SPS42', '', '', '', '', 2, 42),
('SPS43', '', '', '', '', 12, 43),
('SPS46', '', '', '', '', 14, 46),
('SPS47', '', '', '', '', 14, 47),
('SPS48', '', '', '', '', 10, 48),
('SPS55', '', '', '', '', 2, 55),
('SPS62', '', '132MB14', '3KW', '750RPM', 2, 62),
('SPS64', '', '', '', '', 2, 64),
('SPS75', '', '', '', '', 7, 75),
('SPS94', '', '', '', '', 5, 94),
('SPS95', '', '', '', '', 5, 95),
('UC1205/104359', 'SIEMENS', '1LG6331764MA6862', '200KW', '1490RPM', 2, 8),
('X16L384713', 'STAMFORD', 'PE734H2', '1556.8KW', '1500RPM', 8, 119);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `mat` varchar(8) NOT NULL,
  `non` varchar(30) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `psword` varchar(4) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `nonfic` varchar(255) NOT NULL,
  `cheminfic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`mat`, `non`, `prenom`, `email`, `psword`, `admin`, `nonfic`, `cheminfic`) VALUES
('1234ab', 'yao', 'grace astrid', 'astrid1@gmail.com', '1234', 'sadmin', 'Capture d\'écran 2024-01-11 185133.png', 'file/profil/Capture d\'écran 2024-01-11 185133.png'),
('4567bc', 'irigale', 'sephora', 'sephora12@gmail.com', '4567', 'user', '', ''),
('boss1', 'm.', 'kouassi', 'kouassi@gmail.com', '123', 'Administrateur', '', ''),
('nstep01', 'ngoh', 'stephanie', 'stephanie@gmail.com', '1516', 'user', 'Capture d\'écran 2024-01-11 184835.png', 'file/profil/Capture d\'écran 2024-01-11 184835.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bcommande`
--
ALTER TABLE `bcommande`
  ADD PRIMARY KEY (`numbc`),
  ADD UNIQUE KEY `compt` (`compt`);

--
-- Index pour la table `blivraison`
--
ALTER TABLE `blivraison`
  ADD PRIMARY KEY (`numbl`),
  ADD UNIQUE KEY `compt` (`compt`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`numcat`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`numcli`),
  ADD UNIQUE KEY `compt` (`compt`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`numjob`),
  ADD KEY `numcli` (`numcli`),
  ADD KEY `materiel` (`nums`),
  ADD KEY `BL` (`numbl`),
  ADD KEY `DEVIS` (`numdev`),
  ADD KEY `BC` (`numbc`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`numdev`),
  ADD UNIQUE KEY `compt` (`compt`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`nums`),
  ADD UNIQUE KEY `compt` (`compt`),
  ADD KEY `numcat` (`numcat`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`mat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bcommande`
--
ALTER TABLE `bcommande`
  MODIFY `compt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `blivraison`
--
ALTER TABLE `blivraison`
  MODIFY `compt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `numcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `compt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `compt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `compt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `BC` FOREIGN KEY (`numbc`) REFERENCES `bcommande` (`numbc`),
  ADD CONSTRAINT `BL` FOREIGN KEY (`numbl`) REFERENCES `blivraison` (`numbl`) ON UPDATE CASCADE,
  ADD CONSTRAINT `DEVIS` FOREIGN KEY (`numdev`) REFERENCES `devis` (`numdev`) ON UPDATE CASCADE,
  ADD CONSTRAINT `client` FOREIGN KEY (`numcli`) REFERENCES `client` (`numcli`) ON UPDATE CASCADE,
  ADD CONSTRAINT `materiel` FOREIGN KEY (`nums`) REFERENCES `materiel` (`nums`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `materiel_ibfk_1` FOREIGN KEY (`numcat`) REFERENCES `categorie` (`numcat`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
