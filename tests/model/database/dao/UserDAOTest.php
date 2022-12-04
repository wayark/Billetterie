<?php
use PHPUnit\Framework\TestCase;


require_once('./model/database/Connection.php');
require_once('./model/database/dao/UserDAO.php');

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
VALUES (-1, 'TestLastName', 'TestFirstName', '2003-03-18', 'Card', '1 rue de la Tech', 'tests@bot.com', -1,'$2y$10\$k9aPtCBb3gLwQ8Ka5gEfQupYqgWs7rJIOj5tAF9Tb6.d8.kCUOwyS')");
        self::$bdd->exec("INSERT INTO user(iduser, userlastname, userfirstname, dateofbirth, favoritepaymentmode, useradress, mail, role, h_password)
VALUES (-2, 'TestLastName2', 'TestFirstName2', '2003-02-20', 'Paypal', '1 rue de la Tech', 'tes2t@bot.com', -1,'$2y$10\$k9aPtCBb3gLwQ8Ka5gEfQupYqgWs7rJIOj5tAF9Tb6.d8.kCUOwyS')");
    }

    public function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM user WHERE IdUser IN (-1, -2)");
        self::$bdd->exec("DELETE FROM roletype WHERE idRole IN (-1)");
    }

    public function test_GetUserByEmail_shouldReturnTheUser_whenUserExistInBase()
    {
        $user = $this->userDAO->getUserByEmail("tests@bot.com", "test");

        $expectedUser = new User(-1, 'TestLastName', 'TestFirstName', 'tests@bot.com', '$2y$10$k9aPtCBb3gLwQ8Ka5gEfQupYqgWs7rJIOj5tAF9Tb6.d8.kCUOwyS',
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

        $expectedUser = new User(-1, 'TestLastName', 'TestFirstName', 'tests@bot.com', '$2y$10$k9aPtCBb3gLwQ8Ka5gEfQupYqgWs7rJIOj5tAF9Tb6.d8.kCUOwyS',
            '2003-03-18', '1 rue de la Tech');
        $expectedUser->setRole(new Role(-1, 'Client'));
        $expectedUser->setFavoriteMethod("Card");

        self::assertNotNull($user);
        self::assertEquals($expectedUser, $user);
    }
}