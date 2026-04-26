<?php
class Db
{
    public static function connect()
    {
        $config = require __DIR__ . '/config.php';

        try {
            $pdo = new PDO(
                "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4",
                $config['username'],
                $config['password']
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        } catch (PDOException $e) {
            die("Databasfel: " . $e->getMessage());
        }
    }
}