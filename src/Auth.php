<?php

namespace think\User;

use think\User\Drive\DriveManager;
use think\User\Config;

class Auth
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var DriveManager
     */
    protected $manager;

    public function __construct(Config $config)
    {
        $this->config = $config;

        $this->init();
    }

    protected function init()
    {
        $this->manager = $this->getManager();
    }

    protected function getConfig()
    {
        return $this->config;
    }

    protected function getManager()
    {
        return new DriveManager($this->config);
    }

    public function __call($name, $argv)
    {
        return $this->manager->$name(...$argv);
    }
}
