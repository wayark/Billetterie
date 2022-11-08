<?php
namespace src\model\database;

/**
 * This class represents an abstract Data Acess Object allows to query the database
 */
abstract class DAO
{
    /**
     * @var $_error : Used to store a PDO error
     */
    private $_error = null;

    /**
     * Sends the error type, null otherwise.
     * @return string | null
     */
    public function getError()
    {
        return $this->_error;
    }

    /**
     * @param $sql string : Sends the query to the database.
     * @param ...$args array : Has at least one argument if the query is prepared statement.
     * @return PDOStatement : Returns the PDO statement
     */
    private function _sendQuery($sql, ...$args)
    {
        if (count($args) == 0) {
            $pdos = Connection::getInstance()->getBdd()->query($sql);
        } else {
            $pdos = Connection::getInstance()->getBdd()->prepare($sql);
            $pdos->execute($args);
        }
        return $pdos;
    }

    /**
     * @param $sql string : The query to send to the database, must query a single row.
     * @param ...$args array : Has at least one argument if the query is prepared statement.
     * @return false|mixed : Returns the row as an associative array, false otherwise.
     */
    public function queryRow($sql, ...$args)
    {
        try {
            $pdos = $this->_sendQuery($sql, $args);
            $res = $pdos->fetch();
            $pdos->closeCursor();
        } catch (PDOException $e) {
            $this->_error = 'query';
            $res = false;
        }
        return $res;
    }

/**
     * @param $sql string : The query to send to the database, can query multiple rows.
     * @param ...$args array : Has at least one argument if the query is prepared statement.
     * @return false|array : Returns the rows as an associative 2D-array, false otherwise.
     */
    public function queryAll($sql, $args = null)
    {
        try {
            $pdos = $this->_sendQuery($sql, $args);
            $res = $pdos->fetchAll();
            $pdos->closeCursor();
        } catch (PDOException $e) {
            $this->_error = 'query';
            $res = false;
        }
        return $res;
    }

}