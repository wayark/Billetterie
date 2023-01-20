<?php

abstract class DTO
{
    /**
     * @var string $_error Used to store a PDO error
     */
    private $_error = null;

    /**
     * Sends the error type, null otherwise.
     * @return string | null
     */
    public function getError(): string
    {
        return $this->_error;
    }

    /**
     * @param string $sql Sends the query to the database.
     * @param array $args Has at least one argument if the query is prepared statement.
     * @return PDOStatement Returns the PDO statement
     * @throws NoDatabaseException
     */
    protected function _sendQuery(string $sql, array $args): PDOStatement
    {
        if (count($args) == 0) {
            $pdo = Connection::getInstance()->getBdd()->query($sql);
        } else {
            $pdo = Connection::getInstance()->getBdd()->prepare($sql);
            $pdo->execute($args);
        }
        return $pdo;
    }

    public function sendTextQuery(string $sql): PDOStatement
    {
        return $this->_sendQuery($sql, []);
    }

    /**
     * @param string $table The table to insert the data into.
     * @param array $fields The fields to insert the data into.
     * @param $values array The values to insert into the fields.
     * @return PDOStatement Returns the PDO statement
     */
    public function insertQuery(string $table, array $fields, array $values): PDOStatement
    {
        $sql = "INSERT INTO $table";
        $sql .= " (";
        $sql .= implode(", ", $fields);
        $sql .= ") VALUES ( ? ";

        for ($i = 1; $i < count($values); $i++) {
            $sql .= ", ? ";
        }

        $sql .= ")";

        return $this->_sendQuery($sql, $values);
    }

    /**
     * @param string $table The table to update the data into.
     * @param string $field The field to identify the row to update.
     * @param string $value The value to identify the row to update.
     * @return PDOStatement Returns the PDO statement
     */
    public function deleteQuery(string $table, string $field, string $value): PDOStatement
    {
        $sql = "DELETE FROM ";
        $sql .= $table;
        $sql .= " WHERE ";
        $sql .= $field;
        $sql .= " = ";
        $sql .= "'" . $value . "'";

        return $this->_sendQuery($sql, []);
    }

    protected function updateQuery(string $table, array $fields, array $values, string $where_field, string $where_value): PDOStatement
    {
        $sql = "UPDATE $table SET ";
        $sql .= $fields[0] . " = ? ";

        for ($i = 1; $i < count($fields); $i++) {
            $sql .= ", " . $fields[$i] . " = ? ";
        }

        $sql .= " WHERE " . $where_field . " = ?";

        $values[] = $where_value;

        return $this->_sendQuery($sql, $values);
    }

}