<?php

include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/User.php';

use think\User\Config;
use think\User\Auth;
use think\User\Drive\Jwt;
use think\User\Drive\Session;
use think\User\Drive\Cookie;

$options = [
    'drive' => Session::class,
    'key' => 'uid',
    'model' => User::class
];

$config = new Config($options);

$auth = new Auth($config);

var_dump($auth->isLogin());
$auth->user();