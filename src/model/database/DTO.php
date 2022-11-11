<?php

abstract class DTO
{
    /**
     * @var $_error Used to store a PDO error
     */
    private $_error = null;

    /**
     * Sends the error type, null otherwise.
     * @return string | null
     */
    public function getError() : string
    {
        return $this->_error;
    }

    /**
     * @param string $sql Sends the query to the database.
     * @param array ...$args  Has at least one argument if the query is prepared statement.
     * @return PDOStatement Returns the PDO statement
     */
    private function _sendQuery(string $sql, array ...$args) : PDOStatement
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
     * @param string $table  The table to insert the data into.
     * @param array $fields The fields to insert the data into.
     * @param $values array The values to insert into the fields.
     * @return PDOStatement Returns the PDO statement
     */
    public function insertQuery(string $table, array $fields, $values)
    {
        $sql = "INSERT INTO $table";
        $sql .= " (";
        $sql .= implode(", ", $fields);
        $sql .= ") VALUES (";
        $sql .= implode(", ", $values);
        $sql .= ")";

        return $this->_sendQuery($sql);
    }

    /**
     * @param string $table The table to update the data into.
     * @param string $field  The field to identify the row to update.
     * @param string $value The value to identify the row to update.
     * @return PDOStatement Returns the PDO statement
     */
    public function deleteQuery(string $table, string $field, string $value) {
        $sql = "DELETE FROM ";
        $sql .= $table;
        $sql .= " WHERE ";
        $sql .= $field;
        $sql .= " = ";
        $sql .= "'".$value."'";

        $pdos = $this->_sendQuery($sql);
        return $pdos;
    }
}