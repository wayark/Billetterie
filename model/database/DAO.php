<?php

require_once('Connection.php');

/**
 * This class represents an abstract Data Acess Object allows to query the database
 */
abstract class DAO
{
    /**
     * @var $_error Used to store a PDO error
     */
    private ?string $_error = null;

    /**
     * Sends the error type, null otherwise.
     * @return string | null
     */
    public function getError() : string
    {
        return $this->_error;
    }

    /**
     * @param string $sql  Sends the query to the database.
     * @param array $args  Has at least one argument if the query is prepared statement.
     * @return PDOStatement Returns the PDO statement
     */
    private function _sendQuery(string $sql, array $args) : PDOStatement
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
     * @param string $sql  The query to send to the database, must query a single row.
     * @param array $args  Has at least one argument if the query is prepared statement.
     * @return false|mixed Returns the row as an associative array, false otherwise.
     */
    public function queryRow(string $sql, array $args)
    {
        try {
            $pdo = $this->_sendQuery($sql, $args);
            $res = $pdo->fetch();
            $pdo->closeCursor();
        } catch (PDOException $e) {
            $this->_error = 'query';
            $res = false;
        }
        return $res;
    }

/**
     * @param string $sql  The query to send to the database, can query multiple rows.
     * @param ?array $args  Has at least one argument if the query is prepared statement.
     * @return false|array Returns the rows as an associative 2D-array, false otherwise.
     */
    public function queryAll(string $sql, ?array $args = null)
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