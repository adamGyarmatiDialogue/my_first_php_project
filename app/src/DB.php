<?php

namespace App\Src;

class DB
{
    private static $pdo;

    private function __construct()
    {
    }

    /**
     * Connect to the database
     * @return mixed The pdo object
     */
    public static function connect(): mixed
    {
        if (self::$pdo === null) {
            self::$pdo = new \PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        }

        return self::$pdo;
    }
}
