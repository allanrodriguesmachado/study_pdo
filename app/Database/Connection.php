<?php

namespace App\Database;

use PDO;
use PDOException;

class  Connection
{
    private const  HOST = "localhost";
    private const  USER = "postgres";
    private const  DBNAME = "client";
    private const  PASSWD = "830314";

    private const  OPTIONS = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];
    private static PDO $instance;

    public static function getInstance(): PDO|string
    {
        if (empty(self::$instance)) {
            try {
                return self::$instance = new PDO(
                    "pgsql:host=" . self::HOST . ";dbname=" . self::DBNAME,
                    self::USER,
                    self::PASSWD,
                    self::OPTIONS
                );
            } catch (PDOException $pdo_exception) {
                return $pdo_exception->getMessage();
            }
        }

        return self::$instance;
    }

    final private function __construct()
    {
    }

    private function __clone()
    {
    }
}