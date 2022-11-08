<?php

namespace src\model\database;

use src\model\User;

require ('./src/model/User.php');
require ('DAO.php');

class UserDAO extends DAO
{
    /**
     * @param $email string : The email of the user to retrieve.
     * @param $hash_pass string : The hashed password of the user to retrieve.
     * @return false|User : Returns the user, false otherwise.
     */
    public function getUserByEmail($email, $hash_pass)
    {
        $sql = 'SELECT * FROM utilisateur WHERE mail = ? AND hash_password = ?';
        $user = $this->queryRow($sql, [$email, $hash_pass]);
        if ($user) {
            $tmp = new User($user[0], $user[1], $user[2], $hash_pass, $user[6], $user[3], $user[5]);
            $tmp->setFavoriteMethod($user[4]);

            $roleArray = $this->queryRow("SELECT * FROM typerole WHERE idRole = ?", [-1]);

            $tmp->setRole($roleArray[1]);

            return $tmp;
        } else {
            return false;
        }
    }

}