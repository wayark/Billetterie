<?php
require_once (PATH_ENTITES . 'User.php');

class UserDTO extends DTO
{
    /**
     * @param $userToAdd User : The user to add to the database.
     * @return void : Adds the user to the database.
     */
    public function addUser($userToAdd) {
        $fields = ['firstname', 'lastname', 'birthDate', 'favoriteMethod', 'adress', 'mail', 'password'];
        $values = [$userToAdd->getFirstname(),
            $userToAdd->getLastname(),
            $userToAdd->getBirthDate(),
            $userToAdd->getFavoriteMethod(),
            $userToAdd->getAddress(),
            $userToAdd->getMail(),
            $userToAdd->getPassword()];
        $this->insertQuery('User', $fields, $values);
    }

    /**
     * @param $userToDelete User : The user to delete from the database.
     * @return void : Deletes the user from the database.
     */
    public function deleteUser($userToDelete) {
        $this->deleteQuery('User', 'mail', $userToDelete->getMail());
    }
}