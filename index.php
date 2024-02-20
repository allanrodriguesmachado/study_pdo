<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Database\Connection;

$pdo1 = Connection::getInstance();
$client = $pdo1->query('SELECT * FROM users LIMIT 1');

var_dump($client->fetch());