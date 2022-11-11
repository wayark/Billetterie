<?php

require_once ('DTO.php');

class UserDTO extends DTO
{
    /**
     * @param User $userToAdd The user to add to the database.
     */
    public function addUser($userToAdd) {
        $fields = ['id', 'nom', 'prenom', 'dateNaissance', 'modeDePayementFavori', 'adresse', 'mail', 'role', 'hash_password'];
        $values = [
            $userToAdd->getId(),
            $userToAdd->getLastName(),
            $userToAdd->getFirstName(),
            $userToAdd->getBirthDate(),
            $userToAdd->getFavoriteMethod(),
            $userToAdd->getAddress(),
            $userToAdd->getMail(),
            $userToAdd->getRole()->getId(),
            $userToAdd->getPassword()
        ];

        for ($i = 0; $i < count($values); $i++) {
            if (is_string($values[$i])) {
                $values[$i] = "'" . $values[$i] . "'";
            } else if (is_null($values[$i])) {
                $values[$i] = "NULL";
            }
        }

        $this->insertQuery('utilisateur', $fields, $values);
    }

    /**
     * @param User $userToDelete The user to delete from the database.
     * @return void Deletes the user from the database.
     */
    public function deleteUser(User $userToDelete) {
        $this->deleteQuery('utilisateur', 'mail', $userToDelete->getMail());
    }
}