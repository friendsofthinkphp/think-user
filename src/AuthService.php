<?php

namespace think\User;

use think\Service;

class AuthService extends Service
{
    public function register()
    {
        $this->app->bind('auth', function ($store = null) {
            $auth = new Auth(config('auth'));

            return $auth;
        });
    }
}
