<?php

class ChangeTypeAccountManagementStrategy implements AccountManagementStrategy
{

    public function handle(User $user, array $post, array $files): ?array
    {
        $roleDAO = new RoleDAO();
        $role = $roleDAO->getById(1);
        $user->setRole($role);

        $userDTO = new UserDTO();
        $userDTO->update($user);

        return array(
            'type' => 'success',
            'message' => 'Votre type de compte a bien été modifié.'
        );
    }
}