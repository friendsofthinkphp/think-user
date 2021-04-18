<?php

namespace think\User;

interface AuthorizationUserInterface
{
    public function getUserById($id): AuthorizationUserInterface;

    public function hasUserByUserName($username): bool;

    public function getUserByUserName($username): AuthorizationUserInterface;

    public function verifyPassword($password): bool;

    public function setUserName($username): AuthorizationUserInterface;

    public function setPassword($password): AuthorizationUserInterface;

    public function token(): string;
}
