<?php
use PHPUnit\Framework\TestCase;

require_once './model/database/Connection.php';
require_once './model/database/dto/EventDTO.php';
require_once './model/database/dao/EventDAO.php';
require_once './model/database/dao/UserDAO.php';

class EventDTOTest extends TestCase
{
    private static Connection $con;
    private static PDO $bdd;
    private EventDTO $eventDTO;
    private EventDAO $eventDAO;
    private UserDAO $userDAO;

    /**
     * @throws NoDatabaseException
     */
    public static function setUpBeforeClass(): void
    {
        EventDTOTest::$con = Connection::getInstance();
        self::$bdd = self::$con->getBdd();
    }

    private function insertMockUser() {
        self::$bdd->exec("INSERT INTO role_type VALUES (-1, 'Organizer')");
        self::$bdd->exec("INSERT INTO payment_method VALUES (-1, 'Card')");;

        self::$bdd->exec("INSERT INTO User(ID_USER, USER_LAST_NAME, USER_FIRST_NAME, DATE_OF_BIRTH, ID_FAVORITE_PAYMENT_METHOD, USER_ADDRESS, EMAIL, ID_ROLE_TYPE, HASHED_PASSWORD)
VALUES (-1, 'TestLastName', 'TestFirstName', '2003-03-18', -1, '1 rue de la Tech', 'tests@bot.com', -1,'$2y$10\$k9aPtCBb3gLwQ8Ka5gEfQupYqgWs7rJIOj5tAF9Tb6.d8.kCUOwyS')");
    }

    public function setUp(): void
    {
        $this->eventDTO = new EventDTO();
        $this->eventDAO = new EventDAO();
        $this->userDAO = new UserDAO();

        self::$bdd->exec("INSERT INTO location VALUE (-1, 'testCountry', 'testCity', 'testAddress', 'testPlaceName', 0, 0)");
        self::$bdd->exec("INSERT INTO event_type VALUE (-1, 'testType')");
        $this->insertMockUser();
        self::$bdd->exec("INSERT INTO artist VALUES (-1, 'testLastName', 'testFirstName', 'testStageName', 'testBio')");
    }

    public function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM event WHERE ID_EVENT < 0");
        self::$bdd->exec("DELETE FROM location WHERE ID_LOCATION < 0");
        self::$bdd->exec("DELETE FROM event_type WHERE ID_EVENT_TYPE < 0");
        self::$bdd->exec("DELETE FROM artist WHERE ID_ARTIST < 0");
        self::$bdd->exec("DELETE FROM User WHERE ID_USER < 0");
        self::$bdd->exec("DELETE FROM role_type WHERE ID_ROLE_TYPE < 0");
        self::$bdd->exec("DELETE FROM payment_method WHERE ID_PAYMENT_METHOD < 0");
    }

    /**
     * @throws EventAlreadyInBaseException
     */
    public function test_add_shouldAddEventToDatabase_whenEventIsNotInDatabase() {
        $eventToAdd = EventBuilder::createEvent()
            ->withId(-1)
            ->withIdLocation(-1)
            ->withCity("testCity")
            ->withCountry("testCountry")
            ->withStreet("testAddress")
            ->withPlaceName("testPlaceName")
            ->withNbPlaces(0, 0)
            ->withTypeEvent(new EventType(-1, "testType"))
            ->withOrganizer($this->userDAO->getUserById(-1))
            ->withArtist(new Artist(-1, "testFirstName", "testLastName", "testStageName", "testBio"))
            ->withName("testName")
            ->withDate("2021-03-18 00:00:00")
            ->withDescription("testDescription")
            ->withPhoto(new Picture("testPhoto", "testDescription"))
            ->build();

        $this->eventDTO->add($eventToAdd);

        $this->assertEquals($eventToAdd, $this->eventDAO->getById(-1));
    }

    /**
     * @throws EventAlreadyInBaseException
     */
    public function test_update_shouldUpdateEventInDatabase_whenEventIsInDatabase() {
        $eventToAdd = EventBuilder::createEvent()
            ->withId(-1)
            ->withIdLocation(-1)
            ->withCity("testCity")
            ->withCountry("testCountry")
            ->withStreet("testAddress")
            ->withPlaceName("testPlaceName")
            ->withNbPlaces(0, 0)
            ->withTypeEvent(new EventType(-1, "testType"))
            ->withOrganizer($this->userDAO->getUserById(-1))
            ->withArtist(new Artist(-1, "testFirstName", "testLastName", "testStageName", "testBio"))
            ->withName("testName")
            ->withDate("2021-03-18 00:00:00")
            ->withDescription("testDescription")
            ->withPhoto(new Picture("testPhoto", "testDescription"))
            ->build();

        $this->eventDTO->add($eventToAdd);

        $eventToAdd->getEventInfo()->setEventName("testNameUpdated");

        $this->eventDTO->update($eventToAdd);

        $updatedEvent = $this->eventDAO->getById(-1);

        $this->assertEquals($eventToAdd, $updatedEvent);
    }

    /**
     * @throws EventAlreadyInBaseException
     */
    public function test_delete_shouldDeleteEventFromDatabase_whenEventIsInDatabase() {
        $eventToAdd = EventBuilder::createEvent()
            ->withId(-1)
            ->withIdLocation(-1)
            ->withCity("testCity")
            ->withCountry("testCountry")
            ->withStreet("testAddress")
            ->withPlaceName("testPlaceName")
            ->withNbPlaces(0, 0)
            ->withTypeEvent(new EventType(-1, "testType"))
            ->withOrganizer($this->userDAO->getUserById(-1))
            ->withArtist(new Artist(-1, "testFirstName", "testLastName", "testStageName", "testBio"))
            ->withName("testName")
            ->withDate("2021-03-18: 00:00:00")
            ->withDescription("testDescription")
            ->withPhoto(new Picture("testPhoto", "testDescription"))
            ->build();

        $this->eventDTO->add($eventToAdd);

        $this->eventDTO->delete($eventToAdd);

        $this->assertNull($this->eventDAO->getById(-1));
    }

}
