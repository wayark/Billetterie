--
-- Database : `sae_billeterie`
--

-- --------------------------------------------------------

--
-- Table structure `Artist`
--

DROP TABLE IF EXISTS `Artist`;
CREATE TABLE IF NOT EXISTS `Artist` (
    `ArtistLastName` varchar(50) NOT NULL,
    `ArtistFirstName` varchar(50) NOT NULL,
    `StageName` varchar(50) NOT NULL,
    `IdArtist` int(11) NOT NULL,
    `Biography` varchar(500) NOT NULL,
    PRIMARY KEY (`IdArtist`)
    );

-- --------------------------------------------------------

--
-- Table structure `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
    `IdEvent` int(11) NOT NULL,
    `EventName` varchar(50) NOT NULL,
    `Country` varchar(50) NOT NULL,
    `City` varchar(50) NOT NULL,
    `Hall` varchar(50) NOT NULL,
    `Date` date NOT NULL,
    `idtypeEvent` int(11) NOT NULL,
    `idPicture` int(11) NOT NULL,
    `OrganizerId` int(11) NOT NULL,
    `NbPlacesPit` int(11) NOT NULL,
    `NbSeatsStaircase` int(11) NOT NULL,
    `IdArtist` int(11) NOT NULL,
    PRIMARY KEY (`IdEvent`),
    KEY `IdArtist` (`IdArtist`),
    KEY `IdPicture` (`IdPicture`),
    KEY `IdPicture2` (`idPhoto`),
    KEY `IdTypeEvent` (`IdTypeEvent`)
    );

-- --------------------------------------------------------

--
-- Table structure `Place`
--

DROP TABLE IF EXISTS `Place`;
CREATE TABLE IF NOT EXISTS `Place` (
    `IdPlace` int(11) NOT NULL,
    `Address` varchar(50) NOT NULL,
    `RoomName` varchar(50) NOT NULL,
    PRIMARY KEY (`IdPlace`)
    );

-- --------------------------------------------------------

--
-- Table structure `Picture`
--

DROP TABLE IF EXISTS `Picture`;
CREATE TABLE IF NOT EXISTS `Picture` (
    `IdPicture` int(11) NOT NULL,
    `NamePicture` varchar(50) NOT NULL,
    `descriptionPicture` varchar(100) NOT NULL,
    PRIMARY KEY (`Idpicture`)
    );

-- --------------------------------------------------------

--
-- Table structure `Ticket`
--

DROP TABLE IF EXISTS `Ticket`;
CREATE TABLE IF NOT EXISTS `Ticket` (
    `IdTicket` int(11) NOT NULL,
    `TypePlace` varchar(50) NOT NULL,
    PRIMARY KEY (`IdTicket`)
    );

-- --------------------------------------------------------

--
-- Table structure `TypeEvent`
--

DROP TABLE IF EXISTS `TypeEvent`;
CREATE TABLE IF NOT EXISTS `TypeEvent` (
    `IdType` int(11) NOT NULL,
    `TypeName` varchar(50) NOT NULL,
    PRIMARY KEY (`IdType`)
    );

-- --------------------------------------------------------

--
-- Table structure `RoleType`
--

DROP TABLE IF EXISTS `RoleType`;
CREATE TABLE IF NOT EXISTS `RoleType` (
    `IdRole` int(11) NOT NULL,
    `RoleName` varchar(30) NOT NULL,
    PRIMARY KEY (`IdRole`)
    );

-- --------------------------------------------------------

--
-- Table structure `TypeTicket`
--

DROP TABLE IF EXISTS `TypeTicket`;
CREATE TABLE IF NOT EXISTS `TypeTicket` (
    `IdTypeTicket` int(11) NOT NULL,
    `NomTypeTicket` varchar(50) NOT NULL,
    PRIMARY KEY (`IdTypeTicket`)
    );

-- --------------------------------------------------------

--
-- Table structure `User`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE IF NOT EXISTS `User` (
    `IdUser` int(11) NOT NULL,
    `UserLastName` int(11) NOT NULL,
    `UserFirstName` varchar(50) NOT NULL,
    `DateOfBirth` date NOT NULL,
    `FavoritePaymentMode` varchar(50) NOT NULL,
    `UserAdress` varchar(50) NOT NULL,
    `Mail` varchar(50) NOT NULL,
    `Role` int(11) NOT NULL,
    PRIMARY KEY (`id`)
    );
COMMIT;