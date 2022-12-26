<?php
use PHPUnit\Framework\TestCase;

require_once './model/database/Connection.php';
require_once './model/database/dao/ArtistDAO.php';
require_once './model/Artist.php';

class ArtistDAOTest extends TestCase
{
    private ArtistDAO $artistDAO;
    private static Connection $con;
    private static $bdd;

    /**
     * @throws NoDatabaseException
     */
    public static function setUpBeforeClass(): void
    {
        ArtistDAOTest::$con = Connection::getInstance();
        self::$bdd = self::$con->getBdd();
    }

    protected function setUp(): void
    {
        $this->artistDAO = new ArtistDAO();
        self::$bdd->exec("INSERT INTO Artist(idArtist, ArtistFirstName, ArtistLastName, StageName, Biography) 
                                    VALUES (-1, 'John', 'Doe', 'Johnny', 'Biography')");
        self::$bdd->exec("INSERT INTO Artist(idArtist, ArtistFirstName, ArtistLastName, StageName, Biography)  
                                    VALUES (-2, 'Jane', 'Doe', 'Janie', 'Biography')");
    }

    protected function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM Artist WHERE idArtist = -1");
        self::$bdd->exec("DELETE FROM Artist WHERE idArtist = -2");
    }

    public function test_GetAllArtists_shouldReturnAllTheArtistInBase()
    {
        $expected = [
            new Artist(-1, 'John', 'Doe', 'Johnny', 'Biography'),
            new Artist(-2, 'Jane', 'Doe', 'Janie', 'Biography')
        ];

        $artists = $this->artistDAO->getAllArtists();
        $artists = array_filter($artists, function ($artist) {
            return $artist->getIdArtist() < 0;
        });
        $this->assertEqualsCanonicalizing($expected, $artists);
    }

    public function test_GetArtistById_shouldReturnTheArtist_whenTheArtistExistInBase()
    {
        $expected = new Artist(-1, 'John', 'Doe', 'Johnny', 'Biography');

        $artist = $this->artistDAO->getArtistById(-1);
        $this->assertEquals($expected, $artist);
    }

    public function test_GetArtistById_shouldReturnNull_whenTheArtistNotInBase()
    {
        $artist = $this->artistDAO->getArtistById(-3);
        $this->assertNull($artist);
    }

    public function test_GetArtistByStageName_shouldReturnTheArtist_whenTheArtistExistInBase()
    {
        $expected = new Artist(-1, 'John', 'Doe', 'Johnny', 'Biography');

        $artist = $this->artistDAO->getArtistByStageName('Johnny');
        $this->assertEquals($expected, $artist);
    }

    public function test_GetArtistByStageName_shouldReturnNull_whenTheArtistNotInBase()
    {
        $artist = $this->artistDAO->getArtistByStageName('Jenny');
        $this->assertNull($artist);
    }
}
