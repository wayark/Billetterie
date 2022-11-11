<?php

use PHPUnit\Framework\TestCase;

require_once('./model/database/Connection.php');
require_once('./model/database/UserDAO.php');

class UserDAOTest extends TestCase
{
    private static Connection $con;
    private static PDO $bdd;
    private UserDAO $userDAO;

    public static function setUpBeforeClass(): void
    {
        UserDAOTest::$con = Connection::getInstance();
        self::$bdd = self::$con->getBdd();
    }

    public function setUp(): void
    {
        $this->userDAO = new UserDAO();

        self::$bdd->exec("INSERT INTO typerole VALUES (-1, 'Client')");

        self::$bdd->exec("INSERT INTO utilisateur(nom, prenom, dateNaissance, modeDePayementFavori, adresse, mail, role, hash_password)
VALUES ('TestLastName', 'TestFirstName', '2003-03-18', 'Card', '1 rue de la Tech', 'tests@bot.com', -1,'aa00ce8b38d75c80bcaae1b8c33a89ab')");
        self::$bdd->exec("INSERT INTO utilisateur(nom, prenom, dateNaissance, modeDePayementFavori, adresse, mail, role, hash_password)
VALUES ('TestLastName2', 'TestFirstName2', '2003-02-20', 'Paypal', '1 rue de la Tech', 'tes2t@bot.com', -1,'1b761a9f2db00bdccfaccdec050cc732')");
    }

    public function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM utilisateur WHERE mail IN ('tests@bot.com', 'tes2t@bot.com')");
        self::$bdd->exec("DELETE FROM typerole WHERE idRole IN (-1)");
    }

    public function test_GetUserByEmail_shouldReturnTheUser_whenUserExistInBase()
    {
        $user = $this->userDAO->getUserByEmail("tests@bot.com", "aa00ce8b38d75c80bcaae1b8c33a89ab");

        $expectedUser = new User('TestLastName', 'TestFirstName', 'tests@bot.com', 'aa00ce8b38d75c80bcaae1b8c33a89ab',
            '2003-03-18', '1 rue de la Tech');
        $expectedUser->setRole(new Role(-1, 'Client'));
        $expectedUser->setFavoriteMethod("Card");

        self::assertNotNull($user);

        $this->assertEquals($expectedUser, $user);
    }

    public function test_GetUserByEmail_shouldReturnNull_whenUserNotInBase()
    {
        $user = $this->userDAO->getUserByEmail("", "1234");
        $this->assertNull($user);
    }
}