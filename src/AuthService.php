<?php

namespace think\User;

use think\Service;

class AuthService extends Service
{
    public function register()
    {
        $this->app->bind('auth', function () {
            $config = new Config(config('auth'));
            $auth = new Auth($config);

            return $auth;
        });
    }
}
