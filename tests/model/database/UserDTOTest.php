<?php

use PHPUnit\Framework\TestCase;

require_once('./model/database/Connection.php');
require_once('./model/database/UserDTO.php');
require_once('./model/database/UserDAO.php');
require_once('./model/exception/UserAlreadyInBaseException.php');
require_once('./model/User.php');
require_once('./model/Role.php');

class UserDTOTest extends TestCase
{
    private static Connection $con;
    private static PDO $bdd;
    private UserDTO $userDTO;
    private UserDAO $userDAO;

    public static function setUpBeforeClass(): void
    {
        UserDTOTest::$con = Connection::getInstance();
        self::$bdd = self::$con->getBdd();
    }

    public function setUp(): void
    {
        $this->userDTO = new UserDTO();
        $this->userDAO = new UserDAO();
        self::$bdd->exec("INSERT INTO roletype VALUES (-1, 'Client')");
    }

    public function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM user WHERE IdUser IN (-1, -2)");
        self::$bdd->exec("DELETE FROM roletype WHERE idRole = -1");
    }

    public function test_addUser_shouldAddUserToDB_whenEmailOfUserNotInBase()
    {
        // ARRANGE
        $userToAdd = new User(-1, "TestName", "Test", "test@mail.org", "hashed_password", "2002-03-01", "16 la street");
        $userToAdd->setRole(new Role(-1, "Client"));
        $userToAdd->setFavoriteMethod("Card");

        // TEST
        $this->userDTO->addUser($userToAdd);

        // EXPECT
        $addedUser = $this->userDAO->getUserByEmail("test@mail.org", "hashed_password");

        $this->assertEquals($userToAdd, $addedUser);
    }

    /**
     * @throws UserAlreadyInBaseException
     */
    public function test_addUser_shouldThrowError_whenEmailOfUserIsInBase()
    {
        // ARRANGE
        $userToAdd = new User(-1, "TestName", "Test", "test@mail.org", "hashed_password", "2002-03-01", "16 la street");
        $userToAdd->setRole(new Role(-1, "Client"));
        $userToAdd->setFavoriteMethod("Card");

        $userToAdd2 = new User(-2, "TestName", "Test", "test@mail.org", "hashed_password", "2002-03-01", "16 la street");
        $userToAdd2->setRole(new Role(-1, "Client"));
        $userToAdd2->setFavoriteMethod("Card");

        // TEST
        $this->userDTO->addUser($userToAdd);

        // EXPECT
        $this->expectException(UserAlreadyInBaseException::class);
        $this->expectExceptionMessage("L'utilisateur est déjà dans la base de données.");
        $this->userDTO->addUser($userToAdd2);
    }

    /**
     * @throws UserAlreadyInBaseException
     */
    public function test_deleteUser_shouldRemoveUserFromDB_whenUserInBase()
    {
        // ARRANGE
        $userToAdd = new User(-1, "TestName", "Test", "test@mail.org", "hashed_password", "2002-03-01", "16 la street");
        $userToAdd->setRole(new Role(-1, "Client"));
        $userToAdd->setFavoriteMethod("Card");

        $this->userDTO->addUser($userToAdd);

        // TEST
        $this->userDTO->deleteUser($userToAdd);

        // EXPECT
        $statement = self::$bdd->query("SELECT * FROM user WHERE IdUser = -1");

        $this->assertEquals(0, $statement->rowCount());
    }

    /**
     * @throws UserAlreadyInBaseException
     */
    public function test_updateUser_shouldUpdateUserInDB_whenUserInBase()
    {
        // ARRANGE
        $userToAdd = new User(-1, "TestName", "Test", "test@mail.org", "hashed_password", "2002-03-01", "16 la street");
        $userToAdd->setRole(new Role(-1, "Client"));
        $userToAdd->setFavoriteMethod("Card");

        $this->userDTO->addUser($userToAdd);

        $userToAdd->setFirstName("NewName");

        // TEST
        $this->userDTO->updateUser($userToAdd);

        // EXPECT
        $updatedUser = $this->userDAO->getUserByEmail("test@mail.org", "hashed_password");

        $this->assertNotNull($updatedUser);

        $this->assertEquals($userToAdd, $updatedUser);
    }
}