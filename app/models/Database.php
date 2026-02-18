<?php
class Database {
    private static $pdo;

    public static function getConnection() {
        if (!self::$pdo) {
            $host = "localhost";
            $db   = "copa";
            $user = "root";
            $pass = "";
            try {
                self::$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die("Erro ao conectar: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}

?>

