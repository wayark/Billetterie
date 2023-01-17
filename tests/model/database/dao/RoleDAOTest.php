<?php
use PHPUnit\Framework\TestCase;

require_once('./model/database/Connection.php');
require_once('./model/database/dao/RoleDAO.php');

class RoleDAOTest extends TestCase
{
    private static Connection $con;
    private static PDO $bdd;
    private RoleDAO $roleDAO;

    /**
     * @throws NoDatabaseException
     */
    public static function setUpBeforeClass(): void
    {
        RoleDAOTest::$con = Connection::getInstance();
        self::$bdd = self::$con->getBdd();
    }

    public function setUp(): void
    {
        $this->roleDAO = new RoleDAO();
        self::$bdd->exec("INSERT INTO role_type VALUES (-1, 'Client')");
    }

    public function tearDown(): void
    {
        self::$bdd->exec("DELETE FROM role_type WHERE ID_ROLE_TYPE < 0");
    }

    public function test_getRoleById_shouldReturnTheRole_whenRoleExistInBase()
    {
        $expected = new Role(-1, 'Client');

        $role = $this->roleDAO->getById(-1);
        $this->assertEquals($expected, $role);
    }

    public function test_getRoleById_shouldReturnNull_whenRoleNotInBase()
    {
        $role = $this->roleDAO->getById(-3);
        $this->assertNull($role);
    }

}