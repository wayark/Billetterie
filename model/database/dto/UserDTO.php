<?php

require_once('./model/database/DTO.php');

class UserDTO extends DTO
{
    /**
     * @param User $userToAdd The user to add to the database.
     * @throws UserAlreadyInBaseException If the user is already in the database.
     */
    public function addUser(User $userToAdd)
    {
        $fields = ['ID_USER', 'USER_LAST_NAME', 'USER_FIRST_NAME',
            'DATE_OF_BIRTH', 'ID_PAYMENT_METHOD',
            'USER_ADDRESS', 'EMAIL', 'ID_ROLE_TYPE', 'HASHED_PASSWORD'];
        $values = [
            $userToAdd->getId(),
            $userToAdd->getLastName(),
            $userToAdd->getFirstName(),
            $userToAdd->getBirthDate(),
            $userToAdd->getFavoriteMethod()->getIdPaymentMethod(),
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
            $this->insertQuery('User', $fields, $values);
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
        $this->deleteQuery('User', 'EMAIL', $userToDelete->getMail());
    }

    /**
     * @param User $userToUpdate The user to update in the database.
     * @return void Updates the user in the database.
     * @throws NoDatabaseException
     */
    public function updateUser(User $userToUpdate)
    {
        $fields = ['ID_USER', 'USER_LAST_NAME', 'USER_FIRST_NAME',
            'DATE_OF_BIRTH', 'ID_PAYMENT_METHOD',
            'USER_ADDRESS', 'EMAIL', 'ID_ROLE_TYPE', 'HASHED_PASSWORD'];
        $values = [
            $userToUpdate->getId(),
            $userToUpdate->getLastName(),
            $userToUpdate->getFirstName(),
            $userToUpdate->getBirthDate(),
            $userToUpdate->getFavoriteMethod()->getIdPaymentMethod(),
            $userToUpdate->getAddress(),
            $userToUpdate->getMail(),
            $userToUpdate->getRole()->getId(),
            $userToUpdate->getPassword()
        ];

        for ($i = 0; $i < count($fields); $i++) {
            $this->_sendQuery("UPDATE User SET $fields[$i] = ? WHERE ID_USER = ?",
                [$values[$i], $userToUpdate->getId()]);
        }
    }
}