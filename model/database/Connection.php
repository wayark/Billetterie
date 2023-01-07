<?php



error_reporting(E_ALL);
ini_set("display_errors", 1);

class Connection
{
    private static ?PDO $_bdd = null;
    private static ?Connection $instance = null;

    private function __construct()
    {
        $port = 3306;
        $host = 'localhost';
        $dbName = 'billeterie';
        $user = 'julien';
        $password = '#!&4wMW%oMBkR2w5';

        self::$_bdd = new PDO("mysql:host=$host;port=$port;dbname=$dbName;charset=utf8", $user, $password);
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return Connection|null The instance of the connection
     * @throws NoDatabaseException
     */
    public static function getInstance(): Connection
    {
        try {
            if (self::$instance == null) {
                self::$instance = new Connection();
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