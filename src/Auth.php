<?php

namespace think\User;

use think\User\Config\Config;
use think\User\Drive\DriveManager;

class Auth
{
    /**
     * @var array
     */
    protected $options;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var string
     */
    protected $store;

    /**
     * @var DriveManager
     */
    protected $manager;

    public function __construct(array $options)
    {
        $this->options = $options;

        $this->init();
    }

    private function init()
    {
        $this->makeConfig();
        $this->makeManager();
    }

    public function store($store)
    {
        $this->store = $store;
        return $this;
    }

    protected function getDefaultApp()
    {
        return $this->options['default'];
    }

    protected function makeConfig()
    {
        $app = $this->store ?? $this->getDefaultApp();
        $this->config = new Config($this->options['stores'][$app]);
    }

    protected function getConfig()
    {
        return $this->config;
    }

    protected function makeManager()
    {
        $this->manager = new DriveManager($this->config);
    }

    public function __call($name, $argv)
    {
        return $this->manager->$name(...$argv);
    }
}
