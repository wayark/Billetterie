<?php

use PHPUnit\Framework\TestCase;

require_once('./src/model/database/Connection.php');
require_once('./src/model/database/UserDTO.php');

class UserDTOTest extends TestCase
{
    private static $con;
    private static $bdd;
    private $userDTO;

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

        // TEST
        $this->userDTO->addUser($userToAdd);

        // EXPECT
        $statement = self::$bdd->query("SELECT * FROM utilisateur WHERE id = -1");

        assertEquals(1, $statement->rowCount());
    }

    public function test_addUser_shouldThrowError_whenEmailOfUserInBase()
    {
        // TODO : Unit test UserDTO
    }

    public function test_deleteUser_shouldRemoveUserFromDB_whenUserInBase()
    {
        // TODO : Unit test
    }

    public function test_deleteUser_shouldThrowError_whenUserNotInBase()
    {
        // TODO : Unit test
    }
}