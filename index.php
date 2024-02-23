<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\User;


$model = new User();

$user = $model->load(2);
$user->destroy();

var_dump($user);