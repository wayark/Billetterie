<?php

namespace src\model\database;

use PDO;
use const src\config\BD_DBNAME;
use const src\config\BD_HOST;
use const src\config\BD_PWD;
use const src\config\BD_USER;

require ('./src/config/configuration.php');

class Connection
{
    private static $_bdd = null;
    private static $instance = null;

    private function __construct() {
        self::$_bdd = new PDO('mysql:host='.BD_HOST.'; dbname='.BD_DBNAME.'; charset=utf8', BD_USER, BD_PWD);
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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