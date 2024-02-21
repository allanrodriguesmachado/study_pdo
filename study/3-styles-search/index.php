<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Database\Connection;

$connect = Connection::getInstance();


/**
 * FETCH
 */
//$read = $connect->query("SELECT * FROM users");

//if (!$read->rowCount()) {
//    echo "Sem resultados";
//}
////var_dump($read->fetch());
//
//while ($user = $read->fetch()) {
//    var_dump($user);
//}
//
//var_dump($read->fetch());

/**
 * FETCH ALL
 */

//$read = $connect->query("SELECT * FROM users");
//foreach ($read->fetchAll() AS $item) {
//    var_dump($item);
//}

/**
 * FETCH SAVE
 */

//$read = $connect->query("SELECT * FROM users");
//$result = $read->fetchAll();
//
//var_dump($result);

/**
 * FETCH STYLES
 */
$read = $connect->query("SELECT * FROM users LIMIT 1");
//
//foreach ($read->fetchAll(\PDO::FETCH_ASSOC) AS $user) {
//    var_dump($user);
//}

foreach ($read->fetchAll(PDO::FETCH_CLASS, \App\Database\Entity\UserEntity::class) as $user) {
    var_dump($user->get_first_name());
}