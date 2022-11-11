<?php

require_once ('./src/model/User.php');
require_once ('DAO.php');

class UserDAO extends DAO
{
    /**
     * @param $email string The email of the user to retrieve.
     * @param $hash_pass string The hashed password of the user to retrieve.
     * @return ?User Returns the user, null otherwise.
     */
    public function getUserByEmail(string $email, string $hash_pass) : ?User
    {
        $sql = 'SELECT * FROM utilisateur WHERE mail = ? AND hash_password = ?';
        $user = $this->queryRow($sql, [$email, $hash_pass]);
        if ($user) {
            $tmp = new User($user[0], $user[1], $user[2], $hash_pass, $user[6], $user[3], $user[5]);
            $tmp->setFavoriteMethod($user[4]);

            $roleArray = $this->queryRow("SELECT * FROM typerole WHERE idRole = ?", [$user[7]]);

            $tmp->setRole(new Role($roleArray[0], $roleArray[1]));

            return $tmp;
        } else {
            return null;
        }
    }

}