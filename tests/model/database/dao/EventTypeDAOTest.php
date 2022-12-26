<?php
use PHPUnit\Framework\TestCase;

require_once('./model/database/Connection.php');
require_once('./model/database/dao/EventTypeDAO.php');
require_once('./model/components/EventType.php');

class EventTypeDAOTest extends TestCase
{
    private EventTypeDAO $eventTypeDAO;
    private static Connection $con;
    private static PDO $bdd;

    /**
     * @throws NoDatabaseException
     */
    public static function setUpBeforeClass(): void
    {
        EventTypeDAOTest::$con = Connection::getInstance();
        self::$bdd = self::$con->getBdd();
    }

    public function setUp(): void
    {
        $this->eventTypeDAO = new EventTypeDAO();
        self::$bdd->exec("INSERT INTO TypeEvent VALUES (-1, 'Concert')");
        self::$bdd->exec("INSERT INTO TypeEvent VALUES (-2, 'Festival')");
        self::$bdd->exec("INSERT INTO TypeEvent VALUES (-3, 'Exposition')");
    }

    public function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM TypeEvent WHERE IdType = -1");
        self::$bdd->exec("DELETE FROM TypeEvent WHERE IdType = -2");
        self::$bdd->exec("DELETE FROM TypeEvent WHERE IdType = -3");
    }

    public function test_GetEventTypeById_shouldReturnTheEventType_whenTheEventTypeExist()
    {
        $expected = new EventType(-1, 'Concert');

        $eventType = $this->eventTypeDAO->getEventTypeById(-1);
        $this->assertEquals($expected, $eventType);
    }

    public function test_GetEventTypeById_shouldReturnNull_whenTheEventTypeDoesNotExist()
    {
        $eventType = $this->eventTypeDAO->getEventTypeById(-4);
        $this->assertNull($eventType);
    }

    public function test_GetAllEventType_shouldReturnAllEventType_whenThereAreEventTypeInBase()
    {
        $expected = array(
            new EventType(-1, 'Concert'),
            new EventType(-2, 'Festival'),
            new EventType(-3, 'Exposition')
        );

        $eventTypes = $this->eventTypeDAO->getAllEventType();
        $eventTypes = array_filter($eventTypes, function ($eventType) {
            return $eventType->getId() < 0;
        });
        $this->assertEqualsCanonicalizing($expected, $eventTypes);
    }
}
