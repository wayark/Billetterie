<?php

class UpdateAccountManagementStrategy implements AccountManagementStrategy
{
    private User $currentUser;
    private array $post;
    private array $files;

    public function handle(User $user, array $post, array $files): array
    {
        $this->currentUser = $user;
        $this->post = $post;
        $this->files = $files;
        return $this->updateAccountData();
    }

    private function updateAccountData(): array
    {
        $result = array();
        $result['type'] = 'success';
        $result['message'] = 'Les modifications ont bien été prises en compte.';

        $paymentMethodDAO = new PaymentMethodDAO();
        $userDTO = new UserDTO();

        if (isset($this->post['submit'])) {

            if (!empty($this->post['prenomA'])) {
                $this->currentUser->setFirstName($this->post['prenomA']);
            }
            if (!empty($this->post['nomA'])) {
                $this->currentUser->setLastName($this->post['nomA']);
            }
            if (!empty($this->post['mailA'])) {
                $this->currentUser->setMail($this->post['mailA']);
            }
            if (!empty($this->post['birthdate1']) && $this->post['birthdate1'] != $this->currentUser->getBirthDate()) {
                $this->currentUser->setBirthDate($this->post['birthdate1']);
            }
            if (!empty($this->post['address1'])) {
                $this->currentUser->setAddress($this->post['address1']);
            }
            if (!empty($this->post['paymentMethod1'])) {
                $this->currentUser->setFavoriteMethod($paymentMethodDAO->getById($this->post['paymentMethod1']));
            }

            if ($this->files['photoE']['size'] > 0 && !empty($this->files['photoE'])) {
                $resultIm = $this->processFileInput($this->currentUser, PATH_IMAGES . 'users', $this->generatePictureName($this->currentUser, $this->files['photoE']['name']), 10);
                if ($resultIm['type'] == 'error') {
                    $result['type'] = 'error';
                    $result['message'] = $resultIm['message'];
                }
            }


            try {
                $userDTO->update($this->currentUser);
            } catch (Exception $e) {
                $result['type'] = 'error';
                $result['message'] = "Une erreur est survenue lors de la mise à jour de vos informations.";
            }
        }

        return $result;
    }

    private function generatePictureName(User $user, string $pictureName): string
    {
        $pictureInfo = pathinfo($pictureName);
        $pictureInfo['filename'] = str_replace(' ', '_', $pictureInfo['filename']);
        return $user->getId() . "_" . $pictureInfo['filename'] . "_" . time() . "." . $pictureInfo['extension'];
    }

    private function processFileInput(User $user, string $path, string $file_name, int $max_size_megaoctet = 5): array
    {
        $result = array();
        $result['type'] = 'success';
        $result['message'] = '';

        // Récupération des données du fichier
        $file = $this->files['photoE'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];

        // Vérification de l'extension du fichier
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($file_ext, $allowed_extensions)) {
            $result['type'] = 'error';
            $result['message'] = "L'extension du fichier n'est pas valide.";
            return $result;
        }

        // Vérification de la taille du fichier
        if ($file_size > $max_size_megaoctet * 1048576) {
            $result['type'] = 'error';
            $result['message'] = "Le fichier est trop volumineux.";
            return $result;
        }

        // Vérification des erreurs de chargement du fichier
        if ($file_error !== 0) {
            $result['type'] = 'error';
            $result['message'] = "Une erreur est survenue lors du chargement du fichier.";
            return $result;
        }

        // Déplacement du fichier du répertoire temporaire vers le répertoire de destination
        $file_destination = $path . '/' . $file_name;
        if (move_uploaded_file($file_tmp, $file_destination)) {
            if (!StringService::endsWith($user->getProfilePicture()->getPicturePath(), "unnamed.jpg") &&
                !unlink($user->getProfilePicture()->getPicturePath())) {
                $result['type'] = 'error';
                $result['message'] = "Une erreur est survenue lors de la suppression de l'ancienne photo.";
            }

            $user->setProfilePicture(substr($file_destination, strlen(PATH_IMAGES)));

        } else {
            $result['type'] = 'error';
            $result['message'] = "Une erreur est survenue lors du déplacement du fichier.";
        }

        return $result;
    }

}