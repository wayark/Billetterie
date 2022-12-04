<?php

require_once('../DTO.php');

class UserDTO extends DTO
{
    /**
     * @param User $userToAdd The user to add to the database.
     * @throws UserAlreadyInBaseException If the user is already in the database.
     */
    public function addUser(User $userToAdd)
    {
        $fields = ['idUser', 'UserLastName', 'UserFirstName', 'DateOfBirth', 'FavoritePaymentMode', 'UserAdress', 'Mail', 'Role', 'h_password'];
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
            if (is_null($values[$i])) {
                $values[$i] = "NULL";
            }
        }

        try {
            $this->insertQuery('user', $fields, $values);
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                throw new UserAlreadyInBaseException($e->getMessage());
            };
        }
    }

    /**
     * @param User $userToDelete The user to delete from the database.
     * @return void Deletes the user from the database.
     */
    public function deleteUser(User $userToDelete)
    {
        $this->deleteQuery('user', 'mail', $userToDelete->getMail());
    }

    /**
     * @param User $userToUpdate The user to update in the database.
     * @return void Updates the user in the database.
     */
    public function updateUser(User $userToUpdate)
    {
        $fields = ['UserLastName', 'UserFirstName', 'DateOfBirth', 'FavoritePaymentMode', 'UserAdress', 'Mail', 'Role', 'h_password'];
        $values = [
            $userToUpdate->getLastName(),
            $userToUpdate->getFirstName(),
            $userToUpdate->getBirthDate(),
            $userToUpdate->getFavoriteMethod(),
            $userToUpdate->getAddress(),
            $userToUpdate->getMail(),
            $userToUpdate->getRole()->getId(),
            $userToUpdate->getPassword()
        ];

        for ($i = 0; $i < count($fields); $i++) {
            if (is_null($values[$i])) {
                $values[$i] = "NULL";
            }

            $this->_sendQuery("UPDATE user SET $fields[$i] = ? WHERE IdUser = ?",
                [$values[$i], $userToUpdate->getId()]);
        }
    }
}