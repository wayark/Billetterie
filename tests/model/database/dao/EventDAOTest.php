<?php

use event\EventType;
use PHPUnit\Framework\TestCase;

require_once './model/database/dao/EventDAO.php';
require_once './model/components/EventPricing.php';

class EventDAOTest extends TestCase
{
    private EventDAO $eventDAO;
    private static Connection $con;
    private static $bdd;

    /**
     * @throws NoDatabaseException
     */
    public static function setUpBeforeClass(): void
    {
        EventDAOTest::$con = Connection::getInstance();
        self::$bdd = self::$con->getBdd();
    }

    protected function setUp(): void
    {
        $this->eventDAO = new EventDAO();
        self::$bdd->exec("INSERT INTO location VALUE (-1, 'testCountry', 'testCity', 'testAddress', 'testPlace', 0, 2)");
        self::$bdd->exec("INSERT INTO event_type VALUE (-1, 'testType')");
        self::$bdd->exec("INSERT INTO payment_method VALUE (-1, 'testMethod')");
        self::$bdd->exec("INSERT INTO role_type VALUE (-1, 'testRole')");
        self::$bdd->exec("INSERT INTO user VALUE (-1, -1, -1, 'testName', 'testFirstName', '0000-00-00', 'testAddress',
                        'testMail', 'testPass')");
        self::$bdd->exec("INSERT INTO artist VALUE (-1, 'testLastName', 'testFirstName', 'testStageName', 'testBiography')");
        self::$bdd->exec("INSERT INTO event VALUE (-1, -1, -1, -1, -1, 'testName', '0000-00-00 00:00:00', 
                         'testDescription', 'testPath', 'testPictureDescription')");
        self::$bdd->exec("INSERT INTO pricing VALUE (-1, -1, 12.30, 'testName')");
    }

    protected function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM pricing WHERE ID_PRICING < 0");
        self::$bdd->exec("DELETE FROM event WHERE ID_EVENT < 0");
        self::$bdd->exec("DELETE FROM artist WHERE ID_ARTIST < 0");
        self::$bdd->exec("DELETE FROM user WHERE ID_USER < 0");
        self::$bdd->exec("DELETE FROM role_type WHERE ID_ROLE_TYPE < 0");
        self::$bdd->exec("DELETE FROM payment_method WHERE ID_PAYMENT_METHOD < 0");
        self::$bdd->exec("DELETE FROM event_type WHERE ID_EVENT_TYPE < 0");
        self::$bdd->exec("DELETE FROM location WHERE ID_LOCATION < 0");
    }

    /**
     * @throws Exception
     */
    public function test_GetAllEvents_shouldReturnAllTheEventsInBase()
    {
        $tmp = EventBuilder::createEvent()
            ->withId(-1)
            ->withIdLocation(-1)
            ->withStreet('testAddress')
            ->withCity('testCity')
            ->withCountry('testCountry')
            ->withPlaceName("testPlace")
            ->withNbPlaces(0,2)
            ->withTypeEvent(new EventType(-1, 'testType'))
            ->withOrganizer(new User(-1, 'testName', 'testFirstName', 'testMail', 'testPass',
                '0000-00-00', 'testAddress',
                new Role(-1, 'testRole'),
                new PaymentMethod(-1, 'testMethod')))
            ->withArtist(new Artist(-1, 'testFirstName', 'testLastName', 'testStageName', 'testBiography'))
            ->withName('testName')
            ->withDate('0000-00-00 00:00:00')
            ->withDescription('testDescription')
            ->withPhoto(new Picture('testPath', 'testPictureDescription'))
            ->addPricing(new EventPricing(-1, 'testName', 12.30))
            ->build();

        $expected = array($tmp);

        $whatWeGot = $this->eventDAO->getAll();

        $this->assertEquals($expected, $whatWeGot);
    }

    public function test_getEventById_shouldReturnTheEventWithTheId()
    {
        $tmp = EventBuilder::createEvent()
            ->withId(-1)
            ->withIdLocation(-1)
            ->withStreet('testAddress')
            ->withCity('testCity')
            ->withCountry('testCountry')
            ->withPlaceName("testPlace")
            ->withNbPlaces(0,2)
            ->withTypeEvent(new EventType(-1, 'testType'))
            ->withOrganizer(new User(-1, 'testName', 'testFirstName', 'testMail', 'testPass',
                '0000-00-00', 'testAddress',
                new Role(-1, 'testRole'),
                new PaymentMethod(-1, 'testMethod')))
            ->withArtist(new Artist(-1, 'testFirstName', 'testLastName', 'testStageName', 'testBiography'))
            ->withName('testName')
            ->withDate('0000-00-00 00:00:00')
            ->withDescription('testDescription')
            ->withPhoto(new Picture('testPath', 'testPictureDescription'))
            ->addPricing(new EventPricing(-1, 'testName', 12.30))
            ->build();

        $expected = $tmp;

        $whatWeGot = $this->eventDAO->getById(-1);

        $this->assertEquals($expected, $whatWeGot);
    }

    public function test_getEventById_shouldReturnNullIfTheEventDoesntExist()
    {
        $whatWeGot = $this->eventDAO->getById(-2);

        $this->assertNull($whatWeGot);
    }

}