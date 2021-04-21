<?php

namespace think\User\Drive;

use think\User\AuthorizationUserInterface;
use think\User\Config\Config;
use think\User\Drive\DriveInterface;
use think\User\Exception\Unauthorized;

class DriveManager
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var DriveInterface
     */
    protected $drive;

    public function __construct(Config $config)
    {
        $this->config = $config;

        $this->init();
    }

    protected function init()
    {
        $class =  $this->config->getDrive();
        $this->drive = new $class();
    }

    public function getDrive()
    {
        return $this->drive;
    }

    public function isLogin()
    {
        $key = $this->config->getKey();

        return $this->drive->has($key);
    }

    protected function makeUser()
    {
        $class = $this->config->getModel();
        $key = $this->config->getKey();
        $id = $this->drive->get($key);

        $model = new $class();
        if ($model instanceof AuthorizationUserInterface) {
            return $model->getUserById($id);
        } else {
            throw new Unauthorized('implements ' . AuthorizationUserInterface::class);
        }
    }

    public function user()
    {
        if ($this->isLogin() !== false) {
            return $this->makeUser();
        } else {
            throw new Unauthorized('未登录');
        }
    }
}
