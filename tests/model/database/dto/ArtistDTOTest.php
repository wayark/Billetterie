<?php
use PHPUnit\Framework\TestCase;

require_once './model/database/Connection.php';
require_once './model/database/dto/ArtistDTO.php';
require_once './model/database/dao/ArtistDAO.php';

class ArtistDTOTest extends TestCase
{
    private static Connection $con;
    private static PDO $bdd;
    private ArtistDTO $artistDTO;
    private ArtistDAO $artistDAO;

    /**
     * @throws NoDatabaseException
     */
    public static function setUpBeforeClass(): void
    {
        ArtistDTOTest::$con = Connection::getInstance();
        self::$bdd = self::$con->getBdd();
    }

    public function setUp(): void
    {
        $this->artistDTO = new ArtistDTO();
        $this->artistDAO = new ArtistDAO();
        self::$bdd->exec("INSERT INTO artist VALUES (-1, 'testLastName', 'testFirstName', 'testStageName', 'testBio')");
        self::$bdd->exec("INSERT INTO artist VALUES (-2, 'testLastName2', 'testFirstName2', 'testStageName2', 'testBio2')");
    }

    public function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM artist WHERE ID_ARTIST < 0");
    }

    /**
     * @throws ArtistAlreadyInBaseException
     */
    public function test_addArtist_shouldAddArtistToDB_whenArtistNotInBase()
    {
        // ARRANGE
        $artistToAdd = new Artist(-1, "testFirstName", "testLastName", "testStageName", "testBio");

        // TEST
        $this->artistDTO->add($artistToAdd);

        // EXPECT
        $addedArtist = $this->artistDAO->getById(-1);

        $this->assertNotNull($addedArtist);
        $this->assertEquals($artistToAdd, $addedArtist);
    }


    public function test_getAll_shouldReturnAllArtists_whenArtistsInBase()
    {
        // ARRANGE
        $expectedArtists = array();
        $expectedArtists[] = new Artist(-1, "testFirstName", "testLastName", "testStageName", "testBio");
        $expectedArtists[] = new Artist(-2, "testFirstName2", "testLastName2", "testStageName2", "testBio2");

        // TEST
        $artists = $this->artistDAO->getAll();

        // EXPECT
        $this->assertEqualsCanonicalizing($expectedArtists, $artists);
    }
}
