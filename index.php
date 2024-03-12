<?php

require_once __DIR__ . '/vendor/autoload.php';

$session = new \App\Core\Session();
$session->set("user", 1);
$session->regenerate();
$session->regenerate();

var_dump(
    $_SESSION,
    $session->all(),
    session_id()
);