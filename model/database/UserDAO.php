<?php
require_once (PATH_MODELS . 'database/DAO.php');
require_once (PATH_MODELS . 'User.php');

class UserDAO extends DAO
{
    /**
     * @param $email string : The email of the user to retrieve.
     * @param $password string : The hashed password of the user to retrieve.
     * @return false|User : Returns the user, false otherwise.
     */
    public function getUserByEmail($email, $hash_pass)
    {
        $sql = 'SELECT * FROM User WHERE mail = ? AND password = ?';
        $user = $this->queryRow($sql, [$email, $hash_pass]);
        if ($user) {
            return new User($user['id'], $user['firstname'], $user['lastname'], $user['birthDate'], $user['favoriteMethod'], $user['adress'], $user['mail']);
        } else {
            return false;
        }
    }

}