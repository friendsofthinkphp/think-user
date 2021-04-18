<?php
include __DIR__ . '/../vendor/autoload.php';

use think\User\AuthorizationUserInterface;

class User implements AuthorizationUserInterface
{
    public function hasUserByUserName($username): bool
    {
        return false;
    }

    public function getUserByUserName($username): AuthorizationUserInterface
    {
        return $this;
    }

    public function verifyPassword($password): bool
    {
        return false;
    }

    public function setUserName($username): AuthorizationUserInterface
    {
        $this->username = $username;
        return $this;
    }

    public function setPassword($password): AuthorizationUserInterface
    {
        return $this;
    }

    public function token(): string
    {
        return '';
    }

    public function find()
    {
        return $this;
    }
}
