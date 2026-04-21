<?php
class Db
{
    public static function connect()
    {
        $host = "127.0.0.1";
        $dbname = "bokhandel";
        $username = "root";
        $password = "root123";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Databasfel: " . $e->getMessage());
        }
    }
}