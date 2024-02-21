<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Database\Connection;

$connect = Connection::getInstance();


/**
 * Prepared Statement
 */

$queryPrepared = "SELECT * FROM users LIMIT 1";

$stmt = Connection::getInstance()->prepare($queryPrepared);
//$stmt->execute();

//var_dump(
//    $stmt,
//    $stmt->rowCount(),
//    $stmt->columnCount(),
//    $stmt->fetch()
//);

/**
 * STMT bind values
 */

$insertBindValues = ("
    INSERT INTO users (first_name, last_name, email, document)
    VALUES (?, ?, ?, ?)
");
$stmt = Connection::getInstance()->prepare($insertBindValues);
$stmt->bindValue(1, "Allan");
$stmt->bindValue(2, "MAchado");
$stmt->bindValue(3, "Allan@devfullstack.php");
$stmt->bindValue(4, "321312321321");
//$stmt->execute();


$insertBindValues = ("
    INSERT INTO users (first_name, last_name, email, document)
    VALUES (:first_name, :last_name, :email, :document)
");

$stmt = Connection::getInstance()->prepare($insertBindValues);
$stmt->bindValue(":first_name", "Allan");
$stmt->bindValue(":last_name", "Machado");
$stmt->bindValue(":email", "Allan@devfullstack.php");
$stmt->bindValue(":document", "123.323.323-23");
//$stmt->execute();

/**
 * STMT Bind Params
 */

$insertBindValues = ("
    INSERT INTO users (first_name, last_name, email, document)
    VALUES (:first_name, :last_name, :email, :document)
");

$first_name = "Test";
$last_name = "Teste @";
$email = "teste@teste.com";
$document = "123.323.434-44";

$stmt = Connection::getInstance()->prepare($insertBindValues);
$stmt->bindParam(":first_name", $first_name);
$stmt->bindParam(":last_name", $last_name);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":document", $document);
//$stmt->execute();

/**
 * STMT execute array
 */

$insertBindValues = ("
    INSERT INTO users (first_name, last_name, email, document)
    VALUES (:first_name, :last_name, :email, :document)
");

$stmt = Connection::getInstance()->prepare($insertBindValues);

$user = [
    "first_name" => "Allan",
    "last_name" => "Rodrigues",
    "email" => "allan@php.com",
    "document" => "123.323.434-33"
];

//$stmt->execute($user);

/**
 * Bind Column
 */

$queryPrepared = "SELECT * FROM users LIMIT 1";

$stmt = Connection::getInstance()->prepare($queryPrepared);
$stmt->execute();

$stmt->bindColumn("first_name", $name);
$stmt->bindColumn("email", $email);

foreach ($stmt->fetchAll() as $user) {
    echo sprintf("O e-mail de %s é %s", $name, $email);
}