<?php

class DB
{
    private static $pdo = null;

    public static function connect()
    {
        if (self::$pdo === null) {
            $host = '172.17.192.1';
            $db = 'store_dev';
            $user = 'store_app';
            $pass = 'password';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$pdo = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        return self::$pdo;
    }

    public static function query($sqlQuery)
    {
        $pdo = self::connect();
        return $pdo->query($sqlQuery);
    }
}