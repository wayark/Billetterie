<?php

require_once('Role.php');
require_once('database/RoleDAO.php');

class User
{
    /**
     * @var string $_lastName Last name of the user
     */
    private string $_lastName;
    /**
     * @var string $_firstName First name of the user
     */
    private string $_firstName;
    /**
     * @var string $_mail The mail of the user
     */
    private string $_mail;
    /**
     * @var string $_birthDate Date with format YYYY-MM-DD
     */
    private string $_birthDate;
    /**
     * @var string $_address :
     */
    private string $_address;
    /**
     * @var string $_password Hashed password of the user
     */
    private string $_password;
    /**
     * @var string $_favoriteMethod Favorite payment method of the user
     */
    private string $_favoriteMethod;
    /**
     * @var ?Role $_role Role of the user
     */
    private ?Role $_role;

    /**
     * @param $lastname string The last name of the user.
     * @param $firstname string The first name of the user.
     * @param $password string The hashed password of the user.
     * @param $mail string The mail of the user.
     * @param $date string The birthdate of the user with format YYYY-MM-DD.
     * @param $adr string The address of the user.
     */
    public function __construct(string $lastname, string $firstname,string $mail, string $password, string $date = "", string $adr = "")
    {
        $this->_lastName = $lastname;
        $this->_firstName = $firstname;
        $this->_password = $password;
        $this->_mail = $mail;
        $this->_birthDate = $date;
        $this->_address = $adr;
        $this->_favoriteMethod = "";

        $roleDAO = new RoleDAO();

        $this->_role = $roleDAO->getRoleByName('Client');
        if ($this->_role == null) {
            $this->_role = new Role(0, 'Client');
        }
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
        return $this->_lastName;
    }

    /**
     * @return string The first name of the user.
     */
    public function getFirstName() : string
    {
        return $this->_firstName;
    }

    /**
     * @return string The mail of the user.
     */
    public function getMail() : string
    {
        return $this->_mail;
    }

    /**
     * @return string The birthdate of the user with format YYYY-MM-DD.
     */
    public function getBirthDate() : string
    {
        return $this->_birthDate;
    }

    /**
     * @return string The address of the user.
     */
    public function getAddress() : string
    {
        return $this->_address;
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
        $this->_lastName = $nom;
    }

    /**
     * @param string $prenom The first name of the user.
     * @return void Change the first name of the user.
     */
    public function setFirstName(string $prenom) : void
    {
        $this->_firstName = $prenom;
    }

    /**
     * @param string $mail The mail of the user.
     * @return void Change the mail of the user.
     */
    public function setMail(string $mail) : void
    {
        $this->_mail = $mail;
    }

    /**
     * @param string $date The birthdate of the user with format YYYY-MM-DD.
     * @return void Change the birthdate of the user.
     */
    public function setBirthDate(string $date) : void
    {
        $this->_birthDate = $date;
    }

    /**
     * @param string $adr The address of the user.
     * @return void Change the address of the user.
     */
    public function setAddress(string $adr) : void
    {
        $this->_address = $adr;
    }

    /**
     * @param string $method The favorite payment method of the user.
     * @return void Change the favorite payment method of the user.
     */
    public function setFavoriteMethod(string $method) : void
    {
        $this->_favoriteMethod = $method;
    }

    /**
     * @return string The favorite payment method of the user.
     */
    public function getFavoriteMethod() : string
    {
        return $this->_favoriteMethod;
    }

    /**
     * @return string The string representation of the user.
     */
    public function __toString() {
        $repr = "User : \n";
        $repr .= "\tName : " . $this->_firstName . ' ' . $this->_lastName . "\n";
        $repr .= "\tBirthdate : " . $this->_birthDate . "\n";
        $repr .= "\tPayment method : " . $this->_favoriteMethod . "\n";
        $repr .= "\tAddress : " . $this->_address . "\n";
        $repr .= "\tMail : " . $this->_mail . "\n";
        $repr .= "\tRole n°" . $this->_role->getId() . " : " . $this->getRole()->getName() . "\n";

        return $repr;
    }

}
