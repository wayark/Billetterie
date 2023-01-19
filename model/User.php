<?php

class User
{
    /**
     * @var int $id The id of the user
     */
    private int $_id;

    /**
     * @var PersonInfo $personInfo The person info containing the name, mail, birth date and address of the user
     */
    private PersonInfo $_personInfo;

    /**
     * @var string $_password Hashed password of the user
     */
    private string $_password;
    /**
     * @var ?PaymentMethod $_favoriteMethod Favorite payment method of the user
     */
    private ?PaymentMethod $_favoriteMethod;
    /**
     * @var ?Role $_role Role of the user
     */
    private ?Role $_role;

    /**
     * @param $lastname string The last name of the user.
     * @param $firstname string The first name of the user.
     * @param $hashed_password string The hashed password of the user.
     * @param $mail string The mail of the user.
     * @param $date string The birthdate of the user with format YYYY-MM-DD.
     * @param $adr string The address of the user.
     * @param Role|null $role The role of the user.
     * @param PaymentMethod|null $favoriteMethod The favorite payment method of the user.
     * @param string|null $photoPath The path to the profile picture of the user
     */
    public function __construct(int $id, string $lastname, string $firstname, string $mail, string $hashed_password,
                                string $date = "", string $adr = "", Role $role = null,
                                PaymentMethod $favoriteMethod = null, string $photoPath = null)
    {
        $roleDAO = new RoleDAO();

        if (is_null($role)) $role = $roleDAO->getRoleByName("User");
        if (is_null($favoriteMethod)) $favoriteMethod = new PaymentMethod(1, "Aucun");
        if (is_null($photoPath)) $photoPath = 'users/unnamed.jpg';
        $this->_id = $id;
        $this->_password = $hashed_password;
        $this->_personInfo = new PersonInfo($lastname, $firstname, $mail, $date, $adr,
            new Picture($photoPath, $firstname . " " . $lastname));
        $this->_role = $role;
        $this->_favoriteMethod = $favoriteMethod;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    /**
     * @return Role The role of the user.
     */
    public function getRole() : Role
    {
        return $this->_role;
    }

    /**
     * @param Role $role The role of the user.
     */
    public function setRole(Role $role): void
    {
        $this->_role = $role;
    }

    /**
     * @return string The last name of the user.
     */
    public function getLastName() : string
    {
        return $this->_personInfo->getLastName();
    }

    /**
     * @return string The first name of the user.
     */
    public function getFirstName() : string
    {
        return $this->_personInfo->getFirstName();
    }

    /**
     * @return string The mail of the user.
     */
    public function getMail() : string
    {
        return $this->_personInfo->getMail();
    }

    /**
     * @return string The birthdate of the user with format YYYY-MM-DD.
     */
    public function getBirthDate() : string
    {
        return $this->_personInfo->getBirthDate();
    }

    /**
     * @return string The address of the user.
     */
    public function getAddress() : string
    {
        return $this->_personInfo->getAddress();
    }

    /**
     * @return string The hashed password of the user.
     */
    public function getPassword() : string
    {
        return $this->_password;
    }

    /**
     * @param string $password The hashed password of the user.
     * @return void Change the password of the user.
     */
    public function setPassword(string $password): void
    {
        $this->_password = $password;
    }

    /**
     * @param string $nom The last name of the user.
     * @return void Change the last name of the user.
     */
    public function setLastName(string $nom) : void
    {
        $this->_personInfo->setLastName($nom);
    }

    /**
     * @param string $prenom The first name of the user.
     * @return void Change the first name of the user.
     */
    public function setFirstName(string $prenom) : void
    {
        $this->_personInfo->setFirstName($prenom);
    }

    /**
     * @param string $mail The mail of the user.
     * @return void Change the mail of the user.
     */
    public function setMail(string $mail) : void
    {
        $this->_personInfo->setMail($mail);
    }

    /**
     * @param string $date The birthdate of the user with format YYYY-MM-DD.
     * @return void Change the birthdate of the user.
     */
    public function setBirthDate(string $date) : void
    {
        $this->_personInfo->setBirthDate($date);
    }

    /**
     * @param string $adr The address of the user.
     * @return void Change the address of the user.
     */
    public function setAddress(string $adr) : void
    {
        $this->_personInfo->setAddress($adr);
    }

    /**
     * @param PaymentMethod $method The favorite payment method of the user.
     * @return void Change the favorite payment method of the user.
     */
    public function setFavoriteMethod(PaymentMethod $method) : void
    {
        $this->_favoriteMethod = $method;
    }

    /**
     * @return PaymentMethod The favorite payment method of the user.
     */
    public function getFavoriteMethod() : ?PaymentMethod
    {
        return $this->_favoriteMethod;
    }

    public function getProfilePicture() : Picture
    {
        return $this->_personInfo->getPicture();
    }

    public function getProfilePicturePath() : string
    {
        return $this->_personInfo->getPicture()->getPicturePath();
    }

    public function setProfilePicture(string $target_file)
    {
        $this->_personInfo->getPicture()->setPicturePath($target_file);
    }

    /**
     * @return string The string representation of the user.
     */
    public function __toString() {
        $repr = "User : \n";
        $repr .= "\tName : " . $this->_personInfo->getFirstName() . ' ' . $this->_personInfo->getLastName() . "\n";
        $repr .= "\tBirthdate : " . $this->_personInfo->getBirthDate() . "\n";
        $repr .= "\tPayment method : " . $this->_favoriteMethod . "\n";
        $repr .= "\tAddress : " . $this->_personInfo->getAddress() . "\n";
        $repr .= "\tMail : " . $this->_personInfo->getMail() . "\n";
        $repr .= "\tRole n°" . $this->_role->getId() . " : " . $this->getRole()->getName() . "\n";

        return $repr;
    }

}
