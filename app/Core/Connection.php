<?php

namespace App\Core;

use PDO;
use PDOException;

class  Connection
{
    private const OPTIONS = [
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
                    "pgsql:host=" . CONF_DB_HOST . ";dbname=" . CONF_DB_NAME,
                    CONF_DB_USER,
                    CONF_DB_PASS,
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