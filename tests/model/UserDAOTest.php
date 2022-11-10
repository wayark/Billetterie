<?php

use PHPUnit\Framework\TestCase;

require_once('./src/model/database/Connection.php');
require_once('./src/model/database/UserDAO.php');

class UserDAOTest extends TestCase
{
    private static $con;
    private static $bdd;
    private $userDAO;

    public static function setUpBeforeClass(): void
    {
        UserDAOTest::$con = Connection::getInstance();
        self::$bdd = self::$con->getBdd();
    }

    public function setUp(): void
    {
        $this->userDAO = new UserDAO();
        self::$bdd->exec("INSERT INTO utilisateur(id, nom, prenom, dateNaissance, modeDePayementFavori, adresse, mail, role, hash_password)
VALUES (-1, 'TestLastName', 'TestFirstName', '2003-03-18', 'Card', '1 rue de la Tech', 'tests@bot.com', -1,'aa00ce8b38d75c80bcaae1b8c33a89ab')");
        self::$bdd->exec("INSERT INTO utilisateur(id, nom, prenom, dateNaissance, modeDePayementFavori, adresse, mail, role, hash_password)
VALUES (-2, 'TestLastName2', 'TestFirstName2', '2003-02-20', null, '1 rue de la Tech', 'tes2t@bot.com', -1,'1b761a9f2db00bdccfaccdec050cc732')");
        self::$bdd->exec("INSERT INTO typerole VALUES (-1, 'Client')");
    }

    public function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM utilisateur WHERE id IN (-1, -2)");
        self::$bdd->exec("DELETE FROM typerole WHERE idRole IN (-1)");
    }
    public function test_GetUserByEmail_shouldReturnTheUser_whenUserExistInBase()
    {
        $user = $this->userDAO->getUserByEmail("tests@bot.com", "aa00ce8b38d75c80bcaae1b8c33a89ab");

        $expectedUser = new User(-1, 'TestLastName', 'TestFirstName', 'aa00ce8b38d75c80bcaae1b8c33a89ab',
            'tests@bot.com', '2003-03-18', '1 rue de la Tech');
        $expectedUser->setRole("Client");
        $expectedUser->setFavoriteMethod("Card");

        self::assertNotFalse($user);

        $this->assertEquals(-1, $user->getId());
        $this->assertEquals($expectedUser, $user);
    }

    public function test_GetUserByEmail_shouldReturnFalse_whenUserNotInBase() {
        $user = $this->userDAO->getUserByEmail("", "1234");
        $this->assertFalse($user);
    }
}