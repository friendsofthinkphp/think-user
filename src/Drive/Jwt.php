<?php

namespace think\User\Drive;

use think\Request;
use xiaodi\JWTAuth\Service\Token;
use xiaodi\JWTAuth\Handle\RequestToken;
use xiaodi\JWTAuth\Exception\JWTException;

class Jwt implements DriveInterface
{
    /**
     * @var Request
     */
    protected $request;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function get($key)
    {
        $requestToken = new RequestToken($this->app);
        $string = $requestToken->get('Header|Url');

        $token = new Token($this->app);
        $token->parse($string);
        $uid = $token->claims()->get('jti');
        
        return $uid;
    }

    public function has($key)
    {
        $requestToken = new RequestToken($this->app);

        try {
            return $requestToken->get('Header|Url');
        } catch (JwtException $e) {
            return false;
        }
    }

    public function delete($key)
    {
    }
}
