<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Database\Connection;

/*
 * INSERT
 */
//$insert = "
//    INSERT INTO users (first_name, last_name, email,  document)
//    VALUES ('Allan','Rodrigues','allanrodDev@email.com.br','123.456.789-00')
//    ";
//
//try {
////    $exec = Connection::getInstance()->exec($insert);
////    $query = Connection::getInstance()->query($insert);
//    var_dump(Connection::getInstance()->lastInsertId());
//} catch (PDOException $exception) {
//    return $exception->getMessage();
//}

/*
 * SELECT
 */

//$select = "SELECT * FROM users";
//
//try {
//    $query = Connection::getInstance()->query($select);
//    var_dump([
//        $query,
//        $query->rowCount(),
//        $query->fetch(),
//        $query->fetchAll()
//    ]);
//} catch (PDOException $exception) {
//    return $exception->getMessage();
//}

/*
 * UPDATE
 */

//$update = "UPDATE users SET first_name = 'Machado' WHERE id = 1";
//
//try {
//   Connection::getInstance()->exec($update);
//} catch (PDOException $exception) {
//    return $exception->getMessage();
//}

/*
 * DELETE
 */

$delete = "DELETE FROM users WHERE id = 1";

try {
    Connection::getInstance()->exec($delete);
} catch (PDOException $exception) {
    return $exception->getMessage();
}