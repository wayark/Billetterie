<?php

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
VALUES (-1, 'TestLastName', 'TestFirstName', '2003-03-18', 'Card', '1 rue de la Tech', 'test@bot.com', 1,'aa00ce8b38d75c80bcaae1b8c33a89ab')");
        self::$bdd->exec("INSERT INTO utilisateur(id, nom, prenom, dateNaissance, modeDePayementFavori, adresse, mail, role, hash_password)
VALUES (-2, 'TestLastName2', 'TestFirstName2', '2003-02-20', null, '1 rue de la Tech', 'tes2t@bot.com', 1,'1b761a9f2db00bdccfaccdec050cc732')");
    }

    public function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM utilisateur WHERE id IN (-1, -2)");
    }

    public function testGetUserByEmail_shouldReturnTheUser_whenUserExistInBase() {
        $user = $this->userDAO->getUserByEmail("test@bot.com", "aa00ce8b38d75c80bcaae1b8c33a89ab");

        self::assertNotFalse($user);

        $this->assertEquals(-1, $user->getId());
    }
}