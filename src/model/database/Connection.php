<?php

namespace src\model\database;

class Connection
{
    private static $_bdd = null;
    private static $instance = null;

    private function __construct() {
        $this->_bdd = new PDO('mysql:host='.BD_HOST.'; dbname='.BD_DBNAME.'; charset=utf8', BD_USER, BD_PWD);
        $this->_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    public function getBdd() {
        return self::$_bdd;
    }

}