<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\User;


$model = new User();

$user = $model->boostrap(
    'Allan',
    'Rodrigues',
    'allan@teste.com',
    '123.434.323-23'
);
$user->email = null;



var_dump($user->save());