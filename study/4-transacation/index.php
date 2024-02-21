<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Database\Connection;

$connect = Connection::getInstance();

try {
    $connect->beginTransaction();
    $connect->query("
            INSERT INTO users (first_name, last_name, email, document)
            VALUES ('Dev', 'php', 'php@php.com.br', '12332132')
        ");

    $user_id = $connect->lastInsertId();

    $connect->query("
            INSERT INTO users_address (user_id, street, number, complement)
            VALUES ('{$user_id}', 'Rua DevPHP', '23 A', 'Sem complemento')
        ");
    $connect->commit();
} catch (\PDOException $exception) {
    $connect->rollBack();
    var_dump($exception);
    return $exception->getMessage();
}