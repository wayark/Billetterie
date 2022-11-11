<?php

require_once('DTO.php');

class UserDTO extends DTO
{
    /**
     * @param User $userToAdd The user to add to the database.
     * @throws UserAlreadyInBaseException If the user is already in the database.
     */
    public function addUser(User $userToAdd)
    {
        $fields = ['nom', 'prenom', 'dateNaissance', 'modeDePayementFavori', 'adresse', 'mail', 'role', 'hash_password'];
        $values = [
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
            if (is_null($values[$i])) {
                $values[$i] = "NULL";
            }
        }

        try {
            $this->insertQuery('utilisateur', $fields, $values);
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                throw new UserAlreadyInBaseException();
            }
        }
    }

    /**
     * @param User $userToDelete The user to delete from the database.
     * @return void Deletes the user from the database.
     */
    public function deleteUser(User $userToDelete)
    {
        $this->deleteQuery('utilisateur', 'mail', $userToDelete->getMail());
    }

    /**
     * @param User $userToUpdate The user to update in the database.
     * @return void Updates the user in the database.
     */
    public function updateUser(User $userToUpdate)
    {
        $fields = ['nom', 'prenom', 'dateNaissance', 'modeDePayementFavori', 'adresse', 'role'];
        $values = [
            $userToUpdate->getLastName(),
            $userToUpdate->getFirstName(),
            $userToUpdate->getBirthDate(),
            $userToUpdate->getFavoriteMethod(),
            $userToUpdate->getAddress(),
            $userToUpdate->getRole()->getId()
        ];

        for ($i = 0; $i < count($fields); $i++) {
            if (is_null($values[$i])) {
                $values[$i] = "NULL";
            }

            $this->_sendQuery("UPDATE utilisateur SET $fields[$i] = ? WHERE mail = ?",
                [$values[$i], $userToUpdate->getMail()]);
        }
    }
}