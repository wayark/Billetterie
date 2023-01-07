<?php



error_reporting(E_ALL);
ini_set("display_errors", 1);

class Connection
{
    private static ?PDO $_bdd = null;
    private static ?Connection $instance = null;

    private function __construct()
    {
        self::$_bdd = new PDO("mysql:host=" . BD_HOST . ";port=$" . BD_PORT . ";dbname=" . BD_DBNAME  .";charset=utf8", BD_USER, BD_PWD);
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return Connection|null The instance of the connection
     * @throws NoDatabaseException
     */
    public static function getInstance(): Connection
    {
        try {
            self::$instance = new Connection();
            if (self::$instance == null) {
                throw new NoDatabaseException();
            }
        } catch (PDOException $e) {
            if ($e->getCode() == 2002) {
                throw new NoDatabaseException();
            }
        }
        return self::$instance;
    }

    /**
     * @return PDO The PDO object
     */
    public function getBdd(): PDO
    {
        return self::$_bdd;
    }

}