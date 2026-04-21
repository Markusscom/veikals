<?php

class DB
{
    private static $pdo = null;

    public static function connect()
    {
        if (self::$pdo === null) {
            $host = $_ENV['DB_HOST'];
            $db = $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $pass = $_ENV['DB_PASS'];
            $charset = $_ENV['DB_CHARSET'];

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

    public static function query($sqlQuery, $params = [])
    {
        $pdo = self::connect();
        $stmt = $pdo->prepare($sqlQuery);
        $stmt->execute($params);
        return $stmt;
    }
}