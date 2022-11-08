<?php

namespace src\model\database;

abstract class DTO
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
     * @param $table string : The table to insert the data into.
     * @param $fields array : The fields to insert the data into.
     * @param $values array : The values to insert into the fields.
     * @return PDOStatement : Returns the PDO statement
     */
    public function insertQuery($table, $fields, $values)
    {
        $sql = "INSERT INTO ";
        $sql .= $table;
        $sql .= " (";
        $sql .= implode(", ", $fields);
        $sql .= ") VALUES (";
        $sql .= implode(", ", $values);
        $sql .= ")";

        $pdos = $this->_sendQuery($sql);
        return $pdos;
    }

    /**
     * @param $table string : The table to update the data into.
     * @param $id_field string : The field to identify the row to update.
     * @param $id_value string : The value to identify the row to update.
     * @return PDOStatement : Returns the PDO statement
     */
    public function deleteQuery($table, $id_field, $id_value) {
        $sql = "DELETE FROM ";
        $sql .= $table;
        $sql .= " WHERE ";
        $sql .= $id_field;
        $sql .= " = ";
        $sql .= $id_value;

        $pdos = $this->_sendQuery($sql);
        return $pdos;
    }
}