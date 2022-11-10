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
        self::$bdd->exec("DELETE FROM typerole WHERE idRole IN (-1)");
    }

    public function test_addUser_shouldAddUserToDB_whenEmailOfUserNotInBase() {
        // TODO : Unit test UserDTO
    }

    public function test_addUser_shouldThrowError_whenEmailOfUserInBase() {
        // TODO : Unit test UserDTO
    }

    public function test_deleteUser_shouldRemoveUserFromDB_whenUserInBase() {
        // TODO : Unit test
    }

    public function test_deleteUser_shouldThrowError_whenUserNotInBase() {
        // TODO : Unit test
    }
}