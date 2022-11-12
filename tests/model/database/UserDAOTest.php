<?php

use PHPUnit\Framework\TestCase;

require_once('./model/database/Connection.php');
require_once('./model/database/UserDAO.php');

class UserDAOTest extends TestCase
{
    private static Connection $con;
    private static PDO $bdd;
    private UserDAO $userDAO;

    /**
     * @throws NoDatabaseException
     */
    public static function setUpBeforeClass(): void
    {
        UserDAOTest::$con = Connection::getInstance();
        self::$bdd = self::$con->getBdd();
    }

    public function setUp(): void
    {
        $this->userDAO = new UserDAO();

        self::$bdd->exec("INSERT INTO roletype VALUES (-1, 'Client')");

        self::$bdd->exec("INSERT INTO user(iduser, userlastname, userfirstname, dateofbirth, favoritepaymentmode, useradress, mail, role, h_password)
VALUES (-1, 'TestLastName', 'TestFirstName', '2003-03-18', 'Card', '1 rue de la Tech', 'tests@bot.com', -1,'aa00ce8b38d75c80bcaae1b8c33a89ab')");
        self::$bdd->exec("INSERT INTO user(iduser, userlastname, userfirstname, dateofbirth, favoritepaymentmode, useradress, mail, role, h_password)
VALUES (-2, 'TestLastName2', 'TestFirstName2', '2003-02-20', 'Paypal', '1 rue de la Tech', 'tes2t@bot.com', -1,'1b761a9f2db00bdccfaccdec050cc732')");
    }

    public function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM user WHERE IdUser IN (-1, -2)");
        self::$bdd->exec("DELETE FROM roletype WHERE idRole IN (-1)");
    }

    public function test_GetUserByEmail_shouldReturnTheUser_whenUserExistInBase()
    {
        $user = $this->userDAO->getUserByEmail("tests@bot.com", "aa00ce8b38d75c80bcaae1b8c33a89ab");

        $expectedUser = new User(-1, 'TestLastName', 'TestFirstName', 'tests@bot.com', 'aa00ce8b38d75c80bcaae1b8c33a89ab',
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

    public function test_GetUserById_shouldReturnTheUser_whenUserExistInBase()
    {
        $user = $this->userDAO->getUserById(-1);

        $expectedUser = new User(-1, 'TestLastName', 'TestFirstName', 'tests@bot.com', 'aa00ce8b38d75c80bcaae1b8c33a89ab',
            '2003-03-18', '1 rue de la Tech');
        $expectedUser->setRole(new Role(-1, 'Client'));
        $expectedUser->setFavoriteMethod("Card");

        self::assertNotNull($user);
        self::assertEquals($expectedUser, $user);
    }
    
    public function test_getLastId_shouldReturnTheLastId_whenUserExistInBase()
    {
        $expected = -1;
        $lastId = $this->userDAO->getLastId();
        $this->assertEquals($expected, $lastId);
    }
}