<?php

class AuthService
{
    public function attempt($username, $password)
    {
        var_dump('attempt', $username, $password);
    }
}

abstract class Facade
{
    public static function __callStatic($method, $arguments)
    {
        return static::service()->{$method}(...$arguments);
    }
}

class Auth extends Facade
{
    public static function service()
    {
        return new AuthService();
    }
}

// Auth::attempt('alex@codecourse.com', 'password');

// $auth = new AuthService();
// $auth->attempt('alex@codecourse.com', 'password');

Auth::attempt('alex@codecourse.com', 'password');