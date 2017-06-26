<?php

namespace App\Core\Database;

class QueryBuilder {
    protected $pdo;

    /**
     * QueryBuilder constructor.
     * @param $pdo \PDO
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getResults($table)
    {
        $sql = "SELECT * FROM {$table}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    public function insert($table, $data)
    {
        $keys = implode(', ', array_keys($data));
        $params = ':' . implode(", :", array_keys($data));

        $sql = "INSERT INTO {$table} ({$keys}) VALUES ({$params})";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function set($table, $condParams, $data)
    {
        $setString = implode(", ", array_map(function($k) {
            return "{$k}=:{$k}";
        }, array_keys($data)));

        $condString = implode(" AND ", array_map(function($k) {
            return "{$k}=:{$k}";
        }, array_keys($condParams)));

        $sql = "UPDATE {$table} SET {$setString} WHERE {$condString}";
//        die(var_dump($sql));
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array_merge($condParams, $data));
    }
}