<?php
use PHPUnit\Framework\TestCase;

require_once('./model/database/Connection.php');
require_once('./model/database/RoleDAO.php');

class RoleDAOTest extends TestCase
{
    private static Connection $con;
    private static  PDO $bdd;
    private RoleDAO $roleDAO;

    public static function setUpBeforeClass(): void
    {
        RoleDAOTest::$con = Connection::getInstance();
        self::$bdd = self::$con->getBdd();
    }

    public function setUp(): void
    {
        $this->roleDAO = new RoleDAO();
        self::$bdd->exec("INSERT INTO roletype VALUES (-1, 'Client')");
    }

    public function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM roletype WHERE idRole = -1");
    }

    public function test_getRoleById_shouldReturnTheRole_whenRoleExistInBase()
    {
        $expected = new Role(-1, 'Client');

        $role = $this->roleDAO->getRoleById(-1);
        $this->assertEquals($expected, $role);
    }

    public function test_getRoleById_shouldReturnNull_whenRoleNotInBase()
    {
        $role = $this->roleDAO->getRoleById(-3);
        $this->assertNull($role);
    }

}
