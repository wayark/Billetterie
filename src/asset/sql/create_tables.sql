--
-- Base de données : `sae_billeterie`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
CREATE TABLE IF NOT EXISTS `artiste` (
    `Nom` varchar(50) NOT NULL,
    `Prenom` varchar(50) NOT NULL,
    `NomDeScene` varchar(50) NOT NULL,
    `idArtisrte` int(11) NOT NULL,
    `Biographie` varchar(500) NOT NULL,
    PRIMARY KEY (`idArtisrte`)
    );

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
    `idEvenement` int(11) NOT NULL,
    `nom` varchar(50) NOT NULL,
    `pays` varchar(50) NOT NULL,
    `ville` varchar(50) NOT NULL,
    `salle` varchar(50) NOT NULL,
    `date` date NOT NULL,
    `idtypeEvenement` int(11) NOT NULL,
    `idPhoto` int(11) NOT NULL,
    `IdOrganisateur` int(11) NOT NULL,
    `nbPlacesFosse` int(11) NOT NULL,
    `nbPlacesGradin` int(11) NOT NULL,
    `idArtiste` int(11) NOT NULL,
    PRIMARY KEY (`idEvenement`),
    KEY `idArtiste` (`idArtiste`),
    KEY `idPhoto` (`idPhoto`),
    KEY `idPhoto_2` (`idPhoto`),
    KEY `idtypeEvenement` (`idtypeEvenement`)
    );

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
    `idLieu` int(11) NOT NULL,
    `adresse` varchar(50) NOT NULL,
    `nomSalle` varchar(50) NOT NULL,
    PRIMARY KEY (`idLieu`)
    );

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
    `idPhoto` int(11) NOT NULL,
    `nomPhoto` varchar(50) NOT NULL,
    `descriptionPhoto` varchar(100) NOT NULL,
    PRIMARY KEY (`idPhoto`)
    );

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
    `idTicket` int(11) NOT NULL,
    `typePlace` varchar(50) NOT NULL,
    PRIMARY KEY (`idTicket`)
    );

-- --------------------------------------------------------

--
-- Structure de la table `typeevennement`
--

DROP TABLE IF EXISTS `typeevennement`;
CREATE TABLE IF NOT EXISTS `typeevennement` (
    `idType` int(11) NOT NULL,
    `nomtype` varchar(50) NOT NULL,
    PRIMARY KEY (`idType`)
    );

-- --------------------------------------------------------

--
-- Structure de la table `typerole`
--

DROP TABLE IF EXISTS `typerole`;
CREATE TABLE IF NOT EXISTS `typerole` (
    `idRole` int(11) NOT NULL,
    `nomRole` varchar(30) NOT NULL,
    PRIMARY KEY (`idRole`)
    );

-- --------------------------------------------------------

--
-- Structure de la table `typeticket`
--

DROP TABLE IF EXISTS `typeticket`;
CREATE TABLE IF NOT EXISTS `typeticket` (
    `IdTypeTicket` int(11) NOT NULL,
    `NomTypeTicket` varchar(50) NOT NULL,
    PRIMARY KEY (`IdTypeTicket`)
    );

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
    `id` int(11) NOT NULL,
    `nom` int(11) NOT NULL,
    `prenom` varchar(50) NOT NULL,
    `dateNaissance` date NOT NULL,
    `modeDePayementFavori` varchar(50) NOT NULL,
    `adresse` varchar(50) NOT NULL,
    `mail` varchar(50) NOT NULL,
    `role` int(11) NOT NULL,
    PRIMARY KEY (`id`)
    );
COMMIT;