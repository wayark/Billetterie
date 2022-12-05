<?php

require_once('./model/database/DAO.php');
require_once ('./model/Role.php');

class RoleDAO extends DAO
{
    /**
     * @param int $id The id of the role to retrieve.
     * @return Role Returns the role, null otherwise.
     */
    public function getRoleById(int $id) : ?Role
    {
        $sql = 'SELECT * FROM RoleType WHERE idRole = ?';
        $role = $this->queryRow($sql, [$id]);
        if ($role) {
            return new Role($role[0], $role[1]);
        } else {
            return null;
        }
    }

    /**
     * @param string $name The name of the role to retrieve.
     * @return Role Returns the role, null otherwise.
     */
    public function getRoleByName(string $name) : ?Role
    {
        $sql = 'SELECT * FROM RoleType WHERE RoleName = ?';
        $role = $this->queryRow($sql, [$name]);
        if ($role) {
            return new Role($role[0], $role[1]);
        } else {
            return null;
        }
    }
}