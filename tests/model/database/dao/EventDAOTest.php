<?php
use PHPUnit\Framework\TestCase;

require_once './model/database/dao/EventDAO.php';
require_once './model/components/builder/EventBuilder.php';

class EventDAOTest extends TestCase
{
    private EventDAO $eventDAO;
    private static Connection $connection;
    private static PDO $pdo;

    /**
     * @throws NoDatabaseException
     */
    public static function setUpBeforeClass(): void
    {
        self::$connection = Connection::getInstance();
        self::$pdo = self::$connection->getBdd();
    }

    public function setUp(): void
    {
        $this->eventDAO = new EventDAO();
        self::$pdo->exec("INSERT INTO TypeEvent (IdType, typeName) VALUES (-1, 'Soirée')");
        self::$pdo->exec("INSERT INTO Picture(IdPicture, NamePicture, descriptionPicture) VALUES (-1, 'test', 'test')");
        self::$pdo->exec("INSERT INTO RoleType (IdRole, roleName) VALUES (-1, 'Organisateur')");
        self::$pdo->exec("INSERT INTO User (iduser, userlastname, userfirstname, dateofbirth, favoritepaymentmode, useradress, mail, role, h_password) 
                                        VALUES (-1, 'test', 'test', '0000-00-00', 'test', 'test', 'test@mail.com', -1, 'PASS')");
        self::$pdo->exec("INSERT INTO Artist (IdArtist, ArtistFirstName, ArtistLastName, StageName, Biography) 
                                        VALUES (-1, 'testFirst', 'testSecond', 'The best test', 'Let me write your bio')");

        self::$pdo->exec("INSERT INTO event(idevent, eventname, country, city, hall, date, idtypeevent, idpicture, organizerid, nbplacespit, nbseatsstaircase, idartist) 
                            VALUES (-1, 'Soirée mousse', 'France', 'Lyon', 'Le transbordeur', '2021-01-01', -1, -1, -1, 100, 100, -1)");
    }

    public function tearDown(): void
    {
        self::$pdo->exec("DELETE FROM event WHERE idevent = -1");
        self::$pdo->exec("DELETE FROM Artist WHERE IdArtist = -1");
        self::$pdo->exec("DELETE FROM User WHERE iduser = -1");
        self::$pdo->exec("DELETE FROM RoleType WHERE IdRole = -1");
        self::$pdo->exec("DELETE FROM Picture WHERE idpicture = -1");
        self::$pdo->exec("DELETE FROM TypeEvent WHERE IdType = -1");
    }

    /**
     * @throws Exception
     */
    public function test_GetAllEvents_shouldReturnArrayOfAllEvents()
    {
        $organizer = new User(-1, 'test', 'test', 'test@mail.com', 'PASS', '0000-00-00', 'test');
        $organizer->setRole(new Role(-1, 'Organisateur'));
        $organizer->setFavoriteMethod('test');

        $expectedEvent = EventBuilder::createEvent()
            ->withId(-1)
            ->withName('Soirée mousse')
            ->withCountry('France')
            ->withCity('Lyon')
            ->withHall('Le transbordeur')
            ->withDate('2021-01-01')
            ->withNbPlaces(100, 100)
            ->withTypeEvent(new EventType(-1, 'Soirée'))
            ->withPhoto(new Picture(-1, 'test', 'test'))
            ->withOrganizer($organizer)
            ->withArtist(new Artist(-1, 'testFirst', 'testSecond', 'The best test', 'Let me write your bio'))
            ->build();

        $expected = array(-1 => $expectedEvent);

        $events = $this->eventDAO->getAllEvents();

        $this->assertEquals($expected, $events);
    }

    public function testGetEventById()
    {
        $organizer = new User(-1, 'test', 'test', 'test@mail.com', 'PASS', '0000-00-00', 'test');
        $organizer->setRole(new Role(-1, 'Organisateur'));
        $organizer->setFavoriteMethod("test");

        $expectedEvent = EventBuilder::createEvent()
            ->withId(-1)
            ->withName('Soirée mousse')
            ->withCountry('France')
            ->withCity('Lyon')
            ->withHall('Le transbordeur')
            ->withDate('2021-01-01')
            ->withNbPlaces(100, 100)
            ->withTypeEvent(new EventType(-1, 'Soirée'))
            ->withPhoto(new Picture(-1, 'test', 'test'))
            ->withOrganizer($organizer)
            ->withArtist(new Artist(-1, 'testFirst', 'testSecond', 'The best test', 'Let me write your bio'))
            ->build();

        $event = $this->eventDAO->getEventById(-1);

        $this->assertEquals($expectedEvent, $event);
    }
}
