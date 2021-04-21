<?php

include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/User.php';

use think\User\Auth;
use think\User\Drive\Session;
use think\User\Drive\Cookie;

$options = [
    'default' => 'api',
    'stores' => [
        'api' => [
            'drive' => Session::class,
            'key' => 'uid',
            'model' => User::class
        ]
    ]
];

$auth = new Auth($config);

var_dump($auth->isLogin());
$auth->user();
