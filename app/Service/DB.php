<?php

namespace App\Service;

use PDO;

class DB
{
    private static $pdo = null;

    public static function get()
    {
        if (self::$pdo === null) {
            $host = 'mysql';
            $db   = 'tasks';
            $user = 'root';
            $pass = 'root';
            $charset = 'utf8';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            self::$pdo = new PDO($dsn, $user, $pass, $opt);
        }

        return self::$pdo;
    }
}