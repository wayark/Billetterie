-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 02 jan. 2023 à 16:07
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-ticket`
--

-- --------------------------------------------------------

--
-- Structure de la table `artist`
--

CREATE TABLE `artist` (
  `ID_ARTIST` int(11) NOT NULL,
  `ARTIST_LAST_NAME` text NOT NULL,
  `ARTIST_FIRST_NAME` text NOT NULL,
  `STAGE_NAME` text NOT NULL,
  `BIOGRAPHY` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `ID_EVENT` int(11) DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `IS_PIT` tinyint(1) DEFAULT NULL,
  `IS_ROW` tinyint(1) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `ID_EVENT` int(11) NOT NULL,
  `ID_LOCATION` int(11) NOT NULL,
  `ID_EVENT_TYPE` int(11) NOT NULL,
  `ID_ORGANIZER` int(11) NOT NULL,
  `ID_ARTIST` int(11) NOT NULL,
  `EVENT_NAME` text NOT NULL,
  `EVENT_DATE` datetime NOT NULL,
  `EVENT_DESCRIPTION` text,
  `PICTURE_PATH` text,
  `PICTURE_DESCRIPTION` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `event_type`
--

CREATE TABLE `event_type` (
  `ID_EVENT_TYPE` int(11) NOT NULL,
  `EVENT_TYPE_NAME` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `ID_LOCATION` int(11) NOT NULL,
  `COUNTRY` text NOT NULL,
  `CITY` text NOT NULL,
  `ADDRESS` text NOT NULL,
  `PLACE_NAME` text NOT NULL,
  `NB_PLACE_PIT` int(11) NOT NULL,
  `NB_PLACE_STAIRCASE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `payment_method`
--

CREATE TABLE `payment_method` (
  `ID_PAYMENT_METHOD` int(11) NOT NULL,
  `PAYMENT_METHOD_NAME` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pricing`
--

CREATE TABLE `pricing` (
  `ID_PRICING` int(11) NOT NULL,
  `ID_EVENT` int(11) NOT NULL,
  `PRICE_AMOUNT` float NOT NULL,
  `PRICING_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role_type`
--

CREATE TABLE `role_type` (
  `ID_ROLE_TYPE` int(11) NOT NULL,
  `ROLE_NAME` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `ID_TICKET` int(11) NOT NULL,
  `ID_EVENT` int(11) NOT NULL,
  `ID_TICKET_TYPE` int(11) NOT NULL,
  `ID_OWNER` int(11) NOT NULL,
  `TICKET_PRICE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ticket_type`
--

CREATE TABLE `ticket_type` (
  `ID_TICKET_TYPE` int(11) NOT NULL,
  `TICKET_TYPE_NAME` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `ID_FAVORITE_PAYMENT_METHOD` int(11) NOT NULL,
  `ID_ROLE_TYPE` int(11) NOT NULL,
  `USER_LAST_NAME` text,
  `USER_FIRST_NAME` text,
  `DATE_OF_BIRTH` date DEFAULT NULL,
  `USER_ADDRESS` text,
  `EMAIL` varchar(200) DEFAULT NULL,
  `HASHED_PASSWORD` text,
  `PICTURE_PATH` varchar(200) DEFAULT 'users/unnamed.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`ID_ARTIST`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD KEY `FK_FK_ID_EVENT_CART` (`ID_EVENT`),
  ADD KEY `FK_ID_USER_CART` (`ID_USER`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ID_EVENT`),
  ADD KEY `FK_ARTIST_PERFORMING` (`ID_ARTIST`),
  ADD KEY `FK_EVENT_CATEGORY` (`ID_EVENT_TYPE`),
  ADD KEY `FK_EVENT_LOCATION` (`ID_LOCATION`),
  ADD KEY `FK_ORGANIZER` (`ID_ORGANIZER`);

--
-- Index pour la table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`ID_EVENT_TYPE`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`ID_LOCATION`);

--
-- Index pour la table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`ID_PAYMENT_METHOD`);

--
-- Index pour la table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`ID_PRICING`),
  ADD KEY `FK_TICKET_PRICES` (`ID_EVENT`);

--
-- Index pour la table `role_type`
--
ALTER TABLE `role_type`
  ADD PRIMARY KEY (`ID_ROLE_TYPE`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ID_TICKET`),
  ADD KEY `FK_TICKER_OWNER` (`ID_OWNER`),
  ADD KEY `FK_TICKET_OF_EVENT` (`ID_EVENT`),
  ADD KEY `FK_TYPE_OF_TICKET` (`ID_TICKET_TYPE`);

--
-- Index pour la table `ticket_type`
--
ALTER TABLE `ticket_type`
  ADD PRIMARY KEY (`ID_TICKET_TYPE`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `UK_USER_EMAIL` (`EMAIL`),
  ADD KEY `FK_FAVORITE_PAYMENT_METHOD` (`ID_FAVORITE_PAYMENT_METHOD`),
  ADD KEY `FK_USER_ROLE` (`ID_ROLE_TYPE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `ID_PRICING` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_FK_ID_EVENT_CART` FOREIGN KEY (`ID_EVENT`) REFERENCES `event` (`ID_EVENT`),
  ADD CONSTRAINT `FK_FK_ID_USER_CART` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `FK_ID_USER_CART` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_ARTIST_PERFORMING` FOREIGN KEY (`ID_ARTIST`) REFERENCES `artist` (`ID_ARTIST`),
  ADD CONSTRAINT `FK_EVENT_CATEGORY` FOREIGN KEY (`ID_EVENT_TYPE`) REFERENCES `event_type` (`ID_EVENT_TYPE`),
  ADD CONSTRAINT `FK_EVENT_LOCATION` FOREIGN KEY (`ID_LOCATION`) REFERENCES `location` (`ID_LOCATION`),
  ADD CONSTRAINT `FK_ORGANIZER` FOREIGN KEY (`ID_ORGANIZER`) REFERENCES `user` (`ID_USER`);

--
-- Contraintes pour la table `pricing`
--
ALTER TABLE `pricing`
  ADD CONSTRAINT `FK_TICKET_PRICES` FOREIGN KEY (`ID_EVENT`) REFERENCES `event` (`ID_EVENT`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `FK_TICKER_OWNER` FOREIGN KEY (`ID_OWNER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `FK_TICKET_OF_EVENT` FOREIGN KEY (`ID_EVENT`) REFERENCES `event` (`ID_EVENT`),
  ADD CONSTRAINT `FK_TYPE_OF_TICKET` FOREIGN KEY (`ID_TICKET_TYPE`) REFERENCES `ticket_type` (`ID_TICKET_TYPE`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_FAVORITE_PAYMENT_METHOD` FOREIGN KEY (`ID_FAVORITE_PAYMENT_METHOD`) REFERENCES `payment_method` (`ID_PAYMENT_METHOD`),
  ADD CONSTRAINT `FK_USER_ROLE` FOREIGN KEY (`ID_ROLE_TYPE`) REFERENCES `role_type` (`ID_ROLE_TYPE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
