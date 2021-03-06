<?php

namespace think\User\Traits;

use think\User\AuthorizationUserInterface;

trait User
{
    public function hasUserByUserName($username): bool
    {
        return $this->where('username', $username)->find() ? true : false;
    }

    public function getUserByUserName($username): AuthorizationUserInterface
    {
        return $this->where('username', $username)->find();
    }

    public function verifyPassword($password): bool
    {
        return password_verify($password, $this->password);
    }

    public function setUserName($username): AuthorizationUserInterface
    {
        $this->username = $username;

        return $this;
    }

    public function setPassword($password): AuthorizationUserInterface
    {
        $this->password = $password;

        return $this;
    }
}
