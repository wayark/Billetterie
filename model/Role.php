<?php

class Role
{
    /**
     * @var int $id The id of the role
     */
    private int $_id;
    /**
     * @var string $name The name of the role
     */
    private string $_name;

    /**
     * Role constructor.
     * @param int $id The id of the role
     * @param string $name The name of the role
     */
    public function __construct(int $id, string $name)
    {
        $this->_id = $id;
        $this->_name = $name;
    }

    /**
     * @return int The id of the role
     */
    public function getId() : int
    {
        return $this->_id;
    }

    /**
     * @return string The name of the role
     */
    public function getName() : string
    {
        return $this->_name;
    }

    /**
     * @return string The name of the role
     */
    public function __toString() : string
    {
        return "Role n°".$this->_id." : ".$this->_name;
    }
}