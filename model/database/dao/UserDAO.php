<?php

require_once ('./model/User.php');
require_once('DAO.php');

class UserDAO extends DAO
{
    /**
     * @param $email string The email of the user to retrieve.
     * @param $raw_pass string The hashed password of the user to retrieve.
     * @return ?User Returns the user, null otherwise.
     */
    public function getUserByEmail(string $email, string $raw_pass) : ?User
    {
        $sql = 'SELECT * FROM user WHERE mail = ?';
        $user = $this->queryRow($sql, [$email]);

        if ($user) {
            $tmp = new User($user[0], $user[1], $user[2], $user[6], $user['h_Password'], $user[3], $user[5]);
            if (password_verify($raw_pass, $tmp->getPassword())) {
                $tmp->setFavoriteMethod($user[4]);

                $roleArray = $this->queryRow("SELECT * FROM roletype WHERE idRole = ?", [$user['Role']]);

                $tmp->setRole(new Role($roleArray[0], $roleArray[1]));
                return $tmp;
            }

            else{
                return null;
            }

        } else {
            return null;
        }
    }

    /**
     * @param $id int The id of the user to retrieve.
     * @return ?User Returns the user, null otherwise.
     */
    public function getUserById(int $id) : ?User
    {
        $sql = 'SELECT * FROM user WHERE idUser = ?';
        $user = $this->queryRow($sql, [$id]);

        if ($user) {
            $tmp = new User($user[0], $user[1], $user[2], $user[6], $user[8], $user[3], $user[5]);
            $tmp->setFavoriteMethod($user[4]);

            $roleArray = $this->queryRow("SELECT * FROM roletype WHERE idRole = ?", [$user[7]]);

            $tmp->setRole(new Role($roleArray[0], $roleArray[1]));
            return $tmp;
        } else {
            return null;
        }
    }

    /**
     * @return int the last id of the users
     */
    public function getLastId() : int
    {
        $sql = 'SELECT MAX(IdUser) FROM user';
        $id = $this->queryRow($sql, []);
        if ($id[0] == null) {
            return 0;
        } else {
            return $id[0];
        }
    }

}