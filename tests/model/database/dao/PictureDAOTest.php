<?php
use PHPUnit\Framework\TestCase;

require_once './model/database/dao/PictureDAO.php';
require_once './model/components/Picture.php';

class PictureDAOTest extends TestCase
{
    private PictureDAO $pictureDAO;
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
        $this->pictureDAO = new PictureDAO();
        self::$pdo->exec("INSERT INTO Picture (idpicture, namepicture, descriptionpicture ) 
                                        VALUES (-1, 'test', 'First test')");
        self::$pdo->exec("INSERT INTO Picture (idpicture, namepicture, descriptionpicture ) 
                                        VALUES (-2, 'test', 'Second test')");
    }

    public function tearDown(): void
    {
        self::$pdo->exec("DELETE FROM Picture WHERE idpicture = -1");
        self::$pdo->exec("DELETE FROM Picture WHERE idpicture = -2");
    }

    public function test_GetPictureById_whenPictureExistInBase()
    {
        $expected = new Picture(-1, 'test', 'First test');

        $actual = $this->pictureDAO->getPictureById(-1);

        $this->assertEquals($expected, $actual);
    }

    public function test_GetPictureById_whenPictureNotExistInBase()
    {
        $actual = $this->pictureDAO->getPictureById(-3);

        $this->assertNull($actual);
    }

    public function testGetAllPictures()
    {
        $expected = [
            new Picture(-1, 'test', 'First test'),
            new Picture(-2, 'test', 'Second test')
        ];

        $actual = $this->pictureDAO->getAllPictures();

        $this->assertEqualsCanonicalizing($expected, $actual);
    }
}
