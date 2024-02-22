<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\User;

$model = new User();
$user = $model->all(1);

var_dump($user);
