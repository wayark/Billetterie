<?php



class RoleDAO extends DAO implements IObjectDAO
{
    /**
     * @param int $id The id of the role to retrieve.
     * @return Role Returns the role, null otherwise.
     */
    public function getById(int $id) : ?Role
    {
        $sql = 'SELECT * FROM role_type WHERE ID_ROLE_TYPE = ?';
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
        $sql = 'SELECT * FROM role_type WHERE ROLE_NAME = ?';
        $role = $this->queryRow($sql, [$name]);
        if ($role) {
            return new Role($role[0], $role[1]);
        } else {
            return null;
        }
    }

    function getAll(): array
    {
        $sql = 'SELECT * FROM role_type';
        $roles = $this->queryAll($sql);
        $roleList = [];
        foreach ($roles as $role) {
            $roleList[] = new Role($role["ID_ROLE_TYPE"], $role["ROLE_NAME"]);
        }
        return $roleList;
    }

    public function getLastId(): int
    {
        return $this->getTableLastId("role_type", "ID_ROLE_TYPE");
    }
}