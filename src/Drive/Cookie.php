<?php

namespace think\User\Drive;

use think\User\Drive\DriveInterface;

class Cookie implements DriveInterface
{
    public function has($key)
    {
        return \think\facade\Cookie::has($key);
    }

    public function get($key)
    {
        return \think\facade\Cookie::get($key);
    }

    public function delete($key)
    {
    }
}
