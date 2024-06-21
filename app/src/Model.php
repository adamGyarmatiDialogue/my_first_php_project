<?php

abstract class Model
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    /**
    * Get the first result of a select query
    *
    * @param string $sql The sql query
    * @param array $params The parameters to be binded
    * @return mixed The row if found or false
    */
    protected function first(string $sql, array $params = []): mixed
    {
        if (strpos($sql, 'LIMIT 1') === false) {
            $sql .= ' ' . 'LIMIT 1';
        }

        $stmt = $this->pdo->prepare($sql);

        if (sizeof($params) !== 0) {
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get multiple results of a select query
     *
     * @param string $sql The sql query
     * @param array $params The parameters to be binded
     * @return mixed The row if found or false
     */
    protected function find(string $sql, array $params = []): mixed
    {
        $stmt = $this->pdo->prepare($sql);

        if (sizeof($params) !== 0) {
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Insert the data to the database
     *
     * @param string $sql The sql query
     * @param array $params The parameters to be binded
     */
    protected function insert(string $sql, array $params = [])
    {
        $stmt = $this->pdo->prepare($sql);

        if (sizeof($params) !== 0) {
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }
    }
}
