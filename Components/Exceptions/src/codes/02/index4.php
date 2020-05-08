<?php

class AuthService
{
    public function attempt($username, $password)
    {
        return 'attempt';
    }
}

class Facade
{
    public static function __callStatic($method, $args)
    {
        return static::service()->{$method}(...$args);
    }
}

class Auth extends Facade
{
    public static function service()
    {
        return new AuthService();
    }
}

var_dump(Auth::attempt('alex', 'password'));