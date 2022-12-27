<?php

require_once('./model/database/DTO.php');
require_once './model/database/IObjectDTO.php';

class UserDTO extends DTO implements IObjectDTO
{
    /**
     * @param User $object The user to add to the database.
     * @throws UserAlreadyInBaseException If the user is already in the database.
     */
    public function add($object) : void
    {
        $fields = ['ID_USER', 'USER_LAST_NAME', 'USER_FIRST_NAME',
            'DATE_OF_BIRTH', 'ID_FAVORITE_PAYMENT_METHOD',
            'USER_ADDRESS', 'EMAIL', 'ID_ROLE_TYPE', 'HASHED_PASSWORD'];
        $values = [
            $object->getId(),
            $object->getLastName(),
            $object->getFirstName(),
            $object->getBirthDate(),
            $object->getFavoriteMethod()->getIdPaymentMethod(),
            $object->getAddress(),
            $object->getMail(),
            $object->getRole()->getId(),
            $object->getPassword()
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
            }
        }
    }

    /**
     * @param User $object The user to delete from the database.
     * @return void Deletes the user from the database.
     */
    public function delete($object) : void
    {
        $this->deleteQuery('User', 'ID_USER', $object->getId());
    }

    /**
     * @param User $object The user to update in the database.
     * @return void Updates the user in the database.
     */
    public function update($object) : void
    {
        $fields = ['USER_LAST_NAME', 'USER_FIRST_NAME',
            'DATE_OF_BIRTH', 'ID_FAVORITE_PAYMENT_METHOD',
            'USER_ADDRESS', 'EMAIL', 'ID_ROLE_TYPE', 'HASHED_PASSWORD'];
        $values = [
            $object->getLastName(),
            $object->getFirstName(),
            $object->getBirthDate(),
            $object->getFavoriteMethod()->getIdPaymentMethod(),
            $object->getAddress(),
            $object->getMail(),
            $object->getRole()->getId(),
            $object->getPassword()
        ];

        $this->updateQuery('user', $fields, $values, 'ID_USER', $object->getId());
    }
}