-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 19 jan. 2023 à 19:08
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `billeterie`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `ID_ANSWER` int NOT NULL,
  `ID_COMMENT` int NOT NULL,
  `ID_USER` int NOT NULL,
  `CONTENT` text NOT NULL,
  `DATE` date NOT NULL,
  `LIKES` int NOT NULL,
  `DISLIKES` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `ID_ARTIST` int NOT NULL AUTO_INCREMENT,
  `ARTIST_LAST_NAME` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ARTIST_FIRST_NAME` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `STAGE_NAME` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `BIOGRAPHY` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`ID_ARTIST`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artist`
--

INSERT INTO `artist` (`ID_ARTIST`, `ARTIST_LAST_NAME`, `ARTIST_FIRST_NAME`, `STAGE_NAME`, `BIOGRAPHY`) VALUES
(1, 'DJ', 'Thierry', 'Frére rodrigue n°1', 'DJ Thierry est un passionné de musique et un grand entrepreneur qui a su se faire un nom dans le monde de la musique électronique. Depuis son plus jeune âge, il a été fasciné par les sonorités électroniques et a rapidement commencé à expérimenter avec la musique et les platines.\n\nAvec une soif insatiable d\'apprendre et de se perfectionner, DJ Thierry a travaillé dur pour devenir l\'un des DJ les plus respectés de sa génération. Sa technique de mixage impeccable et sa sélection de morceaux toujours innovante lui ont valu une grande reconnaissance dans le milieu de la musique électronique.\n\nEn plus de sa passion pour la musique, DJ Thierry est également un entrepreneur avisé. Il a lancé sa propre entreprise de production de musique et organise régulièrement des événements de musique électronique à travers le pays. Sa détermination et son talent lui ont permis de construire un empire de la musique qui continue de croître chaque jour.\n\nSur scène, DJ Thierry est connu pour son énergie contagieuse et sa capacité à enflammer le dancefloor. Ses sets sont toujours remplis de surprises et de nouveaux morceaux, ce qui en fait un DJ incontournable pour tous ceux qui cherchent à passer une soirée inoubliable.'),
(2, 'LAFFINE', 'Melvyn', 'Miel-vigne', 'Miel-vigne est un DJ passionné de musique et originaire d\'un petit village de Haute-Savoie. Depuis son plus jeune âge, il a été fasciné par les sonorités électroniques et a rapidement commencé à expérimenter avec la musique et les platines.\n\nIl a travaillé dur pour devenir l\'un des DJ les plus respectés de sa région, grâce à sa technique de mixage impeccable et sa sélection de morceaux toujours innovante. Sa passion pour la musique et son talent lui ont permis de se faire un nom dans le monde de la musique électronique et de se produire dans les clubs et les festivals les plus renommés de Haute-Savoie.\n\nSur scène, Miel-vigne est connu pour son énergie contagieuse et sa capacité à mettre l\'ambiance. Ses sets sont toujours remplis de surprises et de nouveaux morceaux, ce qui en fait un DJ incontournable pour tous ceux qui cherchent à passer une soirée inoubliable. En plus de sa carrière de DJ, Miel-vigne est également un entrepreneur avisé et a lancé sa propre entreprise de production de musique. Sa détermination et son talent lui ont permis de construire un empire de la musique qui continue de croître chaque jour.'),
(3, 'LUCAS', 'Liam', 'Wayark', 'Liam LUCAS, connu sous le nom de scène \"Wayark\", est un guitariste passionné et talentueux originaire de la région lyonnaise. Depuis son plus jeune âge, il a été fasciné par la musique et a commencé à apprendre la guitare dès l\'âge de 8 ans.\n\nAvec une soif insatiable d\'apprendre et de se perfectionner, Liam a travaillé dur pour devenir l\'un des guitaristes les plus respectés de sa génération. Sa technique de jeu impeccable et son style unique lui ont valu une grande reconnaissance dans le monde de la musique.\n\nEn plus de sa carrière de musicien, Liam est également un entrepreneur avisé. Il a lancé sa propre entreprise de production de musique et organise régulièrement des concerts et des festivals de musique à travers le pays. Sa détermination et son talent lui ont permis de construire un empire de la musique qui continue de croître chaque jour.\n\nSur scène, Liam est connu pour sa présence captivante et son talent exceptionnel à la guitare. Ses performances sont toujours remplies d\'énergie et de passion, ce qui en fait un musicien incontournable pour tous ceux qui cherchent à passer une soirée inoubliable.');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `ID_USER` int NOT NULL,
  `ID_TICKET_PRICING` int NOT NULL,
  `QUANTITY` int NOT NULL,
  PRIMARY KEY (`ID_USER`,`ID_TICKET_PRICING`),
  KEY `FK_HAS_TICKETS_IN_CART` (`ID_TICKET_PRICING`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `ID_COMMENT` int NOT NULL,
  `ID_USER` int NOT NULL,
  `CONTENT` text NOT NULL,
  `DATE` date NOT NULL,
  `NUMBER_LIKES` int NOT NULL,
  `NUMBER_DISLIKES` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `ID_EVENT` int NOT NULL AUTO_INCREMENT,
  `ID_LOCATION` int NOT NULL,
  `ID_EVENT_TYPE` int NOT NULL,
  `ID_ORGANIZER` int NOT NULL,
  `ID_ARTIST` int NOT NULL,
  `EVENT_NAME` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `EVENT_DATE` datetime NOT NULL,
  `EVENT_DESCRIPTION` text COLLATE utf8mb4_unicode_ci,
  `PICTURE_PATH` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'users/unnamed.png',
  `PICTURE_DESCRIPTION` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`ID_EVENT`),
  KEY `FK_ARTIST_PERFORMING` (`ID_ARTIST`),
  KEY `FK_EVENT_CATEGORY` (`ID_EVENT_TYPE`),
  KEY `FK_EVENT_LOCATION` (`ID_LOCATION`),
  KEY `FK_ORGANIZER` (`ID_ORGANIZER`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`ID_EVENT`, `ID_LOCATION`, `ID_EVENT_TYPE`, `ID_ORGANIZER`, `ID_ARTIST`, `EVENT_NAME`, `EVENT_DATE`, `EVENT_DESCRIPTION`, `PICTURE_PATH`, `PICTURE_DESCRIPTION`) VALUES
(1, 3, 1, 2, 3, 'Le grand retour de Wayark', '2023-01-20 18:00:00', '\"Le grand retour de Wayark\" est un événement incontournable pour tous les fans de musique et de guitar hero. Organisé par le célèbre guitariste Liam LUCAS, connu sous le nom de scène \"Wayark\", cet événement promet d\'être une soirée inoubliable pleine de surprises et de talent.<br>\n\nAu programme de la soirée, vous pourrez découvrir les derniers hits de Wayark interprétés par le guitariste lui-même, ainsi que ses invités de renom. La scène sera animée par un show de lumières et de lasers, et vous pourrez profiter de la puissance et de la maîtrise de Wayark à la guitare.<br>\n\nEn plus de la musique, \"Le grand retour de Wayark\" propose également un large choix de boissons et de snacks pour vous sustenter tout au long de la nuit. Alors n\'hésitez pas à vous laisser emporter par la magie de la musique et de la fête. \"Le grand retour de Wayark\" vous attend !', 'events/wayark.jpg', 'Wayark en concert'),
(2, 1, 2, 1, 1, 'La bête de soirée mousse', '2023-03-17 22:00:00', 'La bête de soirée mousse organisée par DJ Thierry est un événement incontournable pour tous les amateurs de musique électronique. Cette soirée unique en son genre est remplie d\'énergie et de surprises, et promet de faire bouger les foules jusqu\'au petit matin.<br>\n\nAu programme de la soirée, vous pourrez découvrir les derniers hits de la musique électronique interprétés par DJ Thierry et ses invités de renom. La piste de danse sera animée par un show de lumières et de lasers, et vous pourrez profiter de jets de mousse fraîche pour vous rafraîchir toute la nuit.<br>\n\nEn plus de la musique, la soirée mousse de DJ Thierry propose également un large choix de boissons et de snacks pour vous sustenter tout au long de la nuit. Alors n\'hésitez pas à vous habiller en blanc et à vous laisser emporter par la magie de la musique et de la fête. La bête de soirée mousse de DJ Thierry vous attend !', 'events/bdsmousse.jpg', 'La bête de soirée mousse !'),
(3, 2, 4, 1, 2, 'Miel-vigne et cie', '2023-04-01 20:00:00', 'Miel-vigne et cie est un événement unique en son genre. Il s\'agit d\'une soirée de dégustation de vins et de miels, animée par un DJ et des animations. Vous pourrez ainsi découvrir les saveurs de la région et vous laisser emporter par la musique et la fête.', 'events/mielvigne.jpg', 'Miel-vigne et cie');

-- --------------------------------------------------------

--
-- Structure de la table `event_type`
--

DROP TABLE IF EXISTS `event_type`;
CREATE TABLE IF NOT EXISTS `event_type` (
  `ID_EVENT_TYPE` int NOT NULL AUTO_INCREMENT,
  `EVENT_TYPE_NAME` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`ID_EVENT_TYPE`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `event_type`
--

INSERT INTO `event_type` (`ID_EVENT_TYPE`, `EVENT_TYPE_NAME`) VALUES
(1, 'Concert'),
(2, 'Soirée'),
(3, 'Festival'),
(4, 'Exposition'),
(5, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `friend_request`
--

DROP TABLE IF EXISTS `friend_request`;
CREATE TABLE IF NOT EXISTS `friend_request` (
  `ID_USER_SENDER` int NOT NULL,
  `ID_USER_RECEIVER` int NOT NULL,
  `REQUEST_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `ID_LOCATION` int NOT NULL AUTO_INCREMENT,
  `COUNTRY` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `CITY` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ADDRESS` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `PLACE_NAME` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_LOCATION`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`ID_LOCATION`, `COUNTRY`, `CITY`, `ADDRESS`, `PLACE_NAME`) VALUES
(1, 'France', 'Paris', '1 Place de la Concorde', 'Place de la Concorde'),
(2, 'France', 'Villeurbanne', '3 Bd de Stalingrad', 'Le transbordeur'),
(3, 'France', 'Lyon', '7 place des Terreaux', 'Crazy dogs');

-- --------------------------------------------------------

--
-- Structure de la table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE IF NOT EXISTS `payment_method` (
  `ID_PAYMENT_METHOD` int NOT NULL AUTO_INCREMENT,
  `PAYMENT_METHOD_NAME` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`ID_PAYMENT_METHOD`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `payment_method`
--

INSERT INTO `payment_method` (`ID_PAYMENT_METHOD`, `PAYMENT_METHOD_NAME`) VALUES
(1, 'Aucun'),
(2, 'Carte'),
(3, 'Paypal');

-- --------------------------------------------------------

--
-- Structure de la table `pricing`
--

DROP TABLE IF EXISTS `pricing`;
CREATE TABLE IF NOT EXISTS `pricing` (
  `ID_PRICING` int NOT NULL AUTO_INCREMENT,
  `ID_EVENT` int NOT NULL,
  `PRICE_AMOUNT` float NOT NULL,
  `PRICING_NAME` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_PRICING`),
  KEY `FK_TICKET_PRICES` (`ID_EVENT`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pricing`
--

INSERT INTO `pricing` (`ID_PRICING`, `ID_EVENT`, `PRICE_AMOUNT`, `PRICING_NAME`) VALUES
(1, 1, 20.5, 'Tarif normal'),
(2, 1, 10, 'Tarif jeune'),
(3, 2, 15, 'Tarif normal'),
(4, 2, 5, 'Tarif étudiant'),
(5, 0, 10, 'Tarif normal'),
(6, 0, 5, 'Tarif étudiant'),
(7, 0, 15, 'Tarif groupe'),
(8, 0, 10, 'Tarif jeune');

-- --------------------------------------------------------

--
-- Structure de la table `role_type`
--

DROP TABLE IF EXISTS `role_type`;
CREATE TABLE IF NOT EXISTS `role_type` (
  `ID_ROLE_TYPE` int NOT NULL AUTO_INCREMENT,
  `ROLE_NAME` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`ID_ROLE_TYPE`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_type`
--

INSERT INTO `role_type` (`ID_ROLE_TYPE`, `ROLE_NAME`) VALUES
(1, 'User'),
(2, 'Organizer');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `ID_TICKET` int NOT NULL AUTO_INCREMENT,
  `ID_EVENT` int NOT NULL,
  `ID_PAYMENT_METHOD` int NOT NULL,
  `ID_TICKET_PRICING` int NOT NULL,
  `ID_USER` int NOT NULL,
  `TICKET_NUMBER` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`ID_TICKET`),
  KEY `FK_PAYMENT_METHOD_USED` (`ID_PAYMENT_METHOD`),
  KEY `FK_TICKER_OWNER` (`ID_USER`),
  KEY `FK_TICKET_IS_FOR` (`ID_TICKET_PRICING`),
  KEY `FK_TICKET_OF_EVENT` (`ID_EVENT`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`ID_TICKET`, `ID_EVENT`, `ID_PAYMENT_METHOD`, `ID_TICKET_PRICING`, `ID_USER`, `TICKET_NUMBER`) VALUES
(1, 1, 1, 2, 1, '2637192');

-- --------------------------------------------------------

--
-- Structure de la table `ticket_pricing`
--

DROP TABLE IF EXISTS `ticket_pricing`;
CREATE TABLE IF NOT EXISTS `ticket_pricing` (
  `ID_TICKET_PRICING` int NOT NULL AUTO_INCREMENT,
  `ID_EVENT` int NOT NULL,
  `NAME_TICKET_PRICING` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `PRICE` float NOT NULL,
  `MAX_TICKET_NUMBER` int NOT NULL,
  PRIMARY KEY (`ID_TICKET_PRICING`),
  KEY `FK_IS_PRICING_OF` (`ID_EVENT`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ticket_pricing`
--

INSERT INTO `ticket_pricing` (`ID_TICKET_PRICING`, `ID_EVENT`, `NAME_TICKET_PRICING`, `PRICE`, `MAX_TICKET_NUMBER`) VALUES
(1, 1, 'Fosse', 13.43, 50),
(2, 1, 'Gradin', 20, 30),
(3, 2, 'Accès à la piste de danse', 10, 100),
(4, 2, 'Accès à la piste de danse + jet de mousse', 15, 50),
(5, 3, 'Accès à la soirée', 10, 100),
(6, 3, 'Accès à la soirée + 1 verre de vin', 15, 50),
(7, 3, 'Accès à la soirée + 1 verre de vin + 1 pot de miel', 20, 30);

-- --------------------------------------------------------

--
-- Structure de la table `ticket_type`
--

DROP TABLE IF EXISTS `ticket_type`;
CREATE TABLE IF NOT EXISTS `ticket_type` (
  `ID_TICKET_TYPE` int NOT NULL,
  `TICKET_TYPE_NAME` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`ID_TICKET_TYPE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` int NOT NULL AUTO_INCREMENT,
  `ID_FAVORITE_PAYMENT_METHOD` int NOT NULL,
  `ID_ROLE_TYPE` int NOT NULL,
  `USER_LAST_NAME` text COLLATE utf8mb4_unicode_ci,
  `USER_FIRST_NAME` text COLLATE utf8mb4_unicode_ci,
  `DATE_OF_BIRTH` date DEFAULT NULL,
  `USER_ADDRESS` text COLLATE utf8mb4_unicode_ci,
  `EMAIL` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HASHED_PASSWORD` text COLLATE utf8mb4_unicode_ci,
  `PICTURE_PATH` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_USER`),
  UNIQUE KEY `UNIQUE_EMAIL_USER` (`EMAIL`),
  KEY `FK_FAVORITE_PAYMENT_METHOD` (`ID_FAVORITE_PAYMENT_METHOD`),
  KEY `FK_USER_ROLE` (`ID_ROLE_TYPE`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_USER`, `ID_FAVORITE_PAYMENT_METHOD`, `ID_ROLE_TYPE`, `USER_LAST_NAME`, `USER_FIRST_NAME`, `DATE_OF_BIRTH`, `USER_ADDRESS`, `EMAIL`, `HASHED_PASSWORD`, `PICTURE_PATH`) VALUES
(1, 1, 1, 'Mn', 'Jonathan', '2003-07-05', '3 rue de la paix', 'jmn@omg.com', '$2y$10$bFajhuKOnKBPMjiPZlNcB.NYmyqzAKGiExSVySMHxB3lLuoAehmai', 'users/unnamed.jpg'),
(2, 2, 2, 'Liam', 'LUCAS', '2003-03-25', 'Rue de la rue la vraie', 'cc@liam.org', '$2y$10$bFajhuKOnKBPMjiPZlNcB.NYmyqzAKGiExSVySMHxB3lLuoAehmai', 'users/unnamed.jpg'),
(3, 0, 1, 'Julien', 'Linget', '0000-00-00', '', 'julien.linget@proton.me', '$2y$10$doapGzh522y81nE6ES7jUudoD7WGG9SToW6CImlVKXI8g6G/j9Av6', 'users/unnamed.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
