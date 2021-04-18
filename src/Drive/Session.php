<?php

namespace think\User\Drive;

class Session implements DriveInterface
{
    public function has($key)
    {
        return \think\facade\Session::has($key);
    }

    public function get($key)
    {
        return \think\facade\Session::get($key);
    }

    public function delete($key)
    {
    }
}
