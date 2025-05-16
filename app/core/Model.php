<?php

require_once __DIR__ . '/Database.php';

class Model
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
