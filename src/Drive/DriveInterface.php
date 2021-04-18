<?php

namespace think\User\Drive;

interface DriveInterface
{
    public function get($key);

    public function has($key);
    
    public function delete($key);
}
