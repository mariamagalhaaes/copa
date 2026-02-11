<?php

class Database
{
    public static function conectar()
    {
        return new PDO(
            "mysql:host=localhost;dbname=copa;charset=utf8",
            "root",
            "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
}
