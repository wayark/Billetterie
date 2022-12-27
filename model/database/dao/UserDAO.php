<?php

require_once ('./model/User.php');
require_once('./model/database/DAO.php');

class UserDAO extends DAO
{

    private string $baseQuery = "SELECT * FROM user NATURAL JOIN role_type NATURAL JOIN payment_method";

    /**
     * @param $email string The email of the user to retrieve.
     * @param $raw_pass string The hashed password of the user to retrieve.
     * @return ?User Returns the user, null otherwise.
     */
    public function getUserByEmail(string $email, string $raw_pass) : ?User
    {
        $sql = $this->baseQuery . " WHERE EMAIL = ?";
        $userArray = $this->queryRow($sql, [$email]);
        if (!$userArray) return null;
        return $this->processRow($userArray, $raw_pass);
    }

    /**
     * @param $id int The id of the user to retrieve.
     * @return ?User Returns the user, null otherwise.
     */
    public function getUserById(int $id) : ?User
    {
        $sql = $this->baseQuery . " WHERE ID_USER = ?";
        $user = $this->queryRow($sql, [$id]);
        if (!$user) return null;
        return $this->processRow($user);
    }

    /**
     * @return int the last id of the users
     */
    public function getLastId() : int
    {
        $sql = 'SELECT MAX(IdUser) FROM User';
        $id = $this->queryRow($sql, []);
        if ($id[0] == null) {
            return 0;
        } else {
            return $id[0];
        }
    }

    private function processRow(array $user, string $raw_pass = null) : ?User {
        if (!$user) return null;

        $tmp = new User($user['ID_USER'], $user['USER_LAST_NAME'],
            $user['USER_FIRST_NAME'], $user['EMAIL'],
            $user['HASHED_PASSWORD'], $user['DATE_OF_BIRTH'], $user['USER_ADDRESS']);

        if (!is_null($raw_pass)) {
            if (!password_verify($raw_pass, $tmp->getPassword())) return null;
        }

        $tmp->setFavoriteMethod(new PaymentMethod($user['ID_PAYMENT_METHOD'], $user['PAYMENT_METHOD_NAME']));
        $tmp->setRole(new Role($user['ID_ROLE_TYPE'], $user['ROLE_NAME']));

        return $tmp;
    }

}