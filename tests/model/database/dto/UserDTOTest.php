<?php
use PHPUnit\Framework\TestCase;

require_once('./model/database/Connection.php');
require_once('./model/database/dto/UserDTO.php');
require_once('./model/database/dao/UserDAO.php');
require_once('./model/exception/UserAlreadyInBaseException.php');
require_once('./model/User.php');
require_once('./model/Role.php');

class UserDTOTest extends TestCase
{
    private static Connection $con;
    private static PDO $bdd;
    private UserDTO $userDTO;
    private UserDAO $userDAO;

    /**
     * @throws NoDatabaseException
     */
    public static function setUpBeforeClass(): void
    {
        UserDTOTest::$con = Connection::getInstance();
        self::$bdd = self::$con->getBdd();
    }

    public function setUp(): void
    {
        $this->userDTO = new UserDTO();
        $this->userDAO = new UserDAO();
        self::$bdd->exec("INSERT INTO payment_method VALUES (-1, 'Card')");
        self::$bdd->exec("INSERT INTO role_type VALUES (-1, 'Client')");
    }

    public function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM User WHERE ID_USER < 0");
        self::$bdd->exec("DELETE FROM role_type WHERE ID_ROLE_TYPE < 0");
        self::$bdd->exec("DELETE FROM payment_method WHERE ID_PAYMENT_METHOD < 0");
    }

    /**
     * @throws UserAlreadyInBaseException
     */
    public function test_addUser_shouldAddUserToDB_whenEmailOfUserNotInBase()
    {
        // ARRANGE
        $userToAdd = new User(-1, "TestName", "Test", "test@mail.org", "$2y$10\$k9aPtCBb3gLwQ8Ka5gEfQupYqgWs7rJIOj5tAF9Tb6.d8.kCUOwyS", "2002-03-01", "16 la street");
        $userToAdd->setRole(new Role(-1, "Client"));
        $userToAdd->setFavoriteMethod(new PaymentMethod(-1, "Card"));

        // TEST
        $this->userDTO->add($userToAdd);

        // EXPECT
        $addedUser = $this->userDAO->getUserByEmail("test@mail.org", "test");

        $this->assertNotNull($addedUser);
        $this->assertEquals($userToAdd, $addedUser);
    }

    /**
     * @throws UserAlreadyInBaseException
     */
    public function test_deleteUser_shouldRemoveUserFromDB_whenUserInBase()
    {
        // ARRANGE
        $userToAdd = new User(-1, "TestName", "Test", "test@mail.org", "hashed_password", "2002-03-01", "16 la street");
        $userToAdd->setRole(new Role(-1, "Client"));
        $userToAdd->setFavoriteMethod(new PaymentMethod(-1, "Card"));

        $this->userDTO->add($userToAdd);

        // TEST
        $this->userDTO->delete($userToAdd);

        // EXPECT
        $statement = self::$bdd->query("SELECT * FROM User WHERE ID_USER = -1");

        $this->assertEquals(0, $statement->rowCount());
    }

    /**
     * @throws UserAlreadyInBaseException|NoDatabaseException
     */
    public function test_updateUser_shouldUpdateUserInDB_whenUserInBase()
    {
        // ARRANGE
        $userToAdd = new User(-1, "TestName", "Test", "test@mail.org", "$2y$10\$k9aPtCBb3gLwQ8Ka5gEfQupYqgWs7rJIOj5tAF9Tb6.d8.kCUOwyS", "2002-03-01", "16 la street");
        $userToAdd->setRole(new Role(-1, "Client"));
        $userToAdd->setFavoriteMethod(new PaymentMethod(-1, "Card"));

        $this->userDTO->add($userToAdd);

        $userToAdd->setFirstName("NewName");

        // TEST
        $this->userDTO->update($userToAdd);

        // EXPECT
        $updatedUser = $this->userDAO->getUserByEmail("test@mail.org", "test");

        $this->assertNotNull($updatedUser);

        $this->assertEquals($userToAdd, $updatedUser);
    }
}