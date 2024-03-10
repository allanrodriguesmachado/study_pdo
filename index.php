<?php

require_once __DIR__ . '/vendor/autoload.php';

var_dump(
    get_defined_constants(true)['user']
);

$connection = \App\Core\Connection::getInstance();

var_dump($connection);