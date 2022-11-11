<?php

use PHPUnit\Framework\TestCase;

require_once('./src/model/database/Connection.php');
require_once('./src/model/database/UserDTO.php');
require_once ('./src/model/User.php');
require_once ('./src/model/Role.php');

class UserDTOTest extends TestCase
{
    private static Connection $con;
    private static PDO $bdd;
    private UserDTO $userDTO;

    public static function setUpBeforeClass(): void
    {
        UserDTOTest::$con = Connection::getInstance();
        self::$bdd = self::$con->getBdd();
    }

    public function setUp(): void
    {
        $this->userDTO = new UserDTO();
    }

    public function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM utilisateur WHERE id IN (-1, -2)");
    }

    public function test_addUser_shouldAddUserToDB_whenEmailOfUserNotInBase()
    {
        // ARRANGE
        $userToAdd = new User(-1, "TestName", "Test", "hashed_password", "test@mail.org", "2002-03-01", "16 la street");
        $userToAdd->setRole(new Role(-1, "Client"));
        $userToAdd->setFavoriteMethod("Card");

        // TEST
        $this->userDTO->addUser($userToAdd);

        // EXPECT
        $statement = self::$bdd->query("SELECT * FROM utilisateur WHERE id = -1");

        $this->assertEquals(1, $statement->rowCount());
    }

    public function test_addUser_shouldThrowError_whenEmailOfUserInBase()
    {
        // ARRANGE
        $userToAdd = new User(-1, "TestName", "Test", "hashed_password", "test@mail.org", "2002-03-01", "16 la street");
        $userToAdd->setRole(new Role(-1, "Client"));
        $userToAdd->setFavoriteMethod("Card");

        // TEST
        $this->userDTO->addUser($userToAdd);

        // EXPECT
        $this->expectException(PDOException::class);
        $this->userDTO->addUser($userToAdd);
    }

    public function test_deleteUser_shouldRemoveUserFromDB_whenUserInBase()
    {
        // ARRANGE
        $userToAdd = new User(-1, "TestName", "Test", "hashed_password", "test@mail.org", "2002-03-01", "16 la street");
        $userToAdd->setRole(new Role(-1, "Client"));
        $userToAdd->setFavoriteMethod("Card");
        $userToAdd2 = new User(-2, "TestName2", "Test2", "hashed_password2", "test2@mail.org", "2004-01-01", "10 rue de la rue");
        $userToAdd2->setRole(new Role(-2, "Organizer"));
        $userToAdd2->setFavoriteMethod("Paypal");

        $this->userDTO->addUser($userToAdd);
        $this->userDTO->addUser($userToAdd2);

        // TEST
        $this->userDTO->deleteUser($userToAdd);

        // EXPECT
        $statement = self::$bdd->query("SELECT * FROM utilisateur WHERE id IN (-1, -2)");

        $this->assertEquals(1, $statement->rowCount());
    }

    public function test_deleteUser_shouldThrowError_whenUserNotInBase()
    {
        // ARRANGE
        $userToAdd = new User(-1, "TestName", "Test", "hashed_password", "test@mail.org", "2002-03-01", "16 la street");
        $userToAdd->setRole(new Role(-1, "Client"));
        $userToAdd->setFavoriteMethod("Card");

        $nbRowBeforeDelete = self::$bdd->query("SELECT * FROM utilisateur")->rowCount();

        // TEST
        $this->userDTO->deleteUser($userToAdd);

        // EXPECT
        $nbRowAfterDelete = self::$bdd->query("SELECT * FROM utilisateur")->rowCount();
        $this->assertEquals($nbRowBeforeDelete, $nbRowAfterDelete);
    }
}