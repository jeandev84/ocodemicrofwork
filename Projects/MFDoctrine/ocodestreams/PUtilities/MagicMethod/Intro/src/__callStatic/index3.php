<?php

class AuthService
{
    public function attempt($username, $password)
    {
        var_dump('attempt', $username, $password);
    }
}

class Auth
{
    public static function service()
    {
        return new AuthService();
    }

    public static function __callStatic($method, $arguments)
    {
        return self::service()->{$method}(...$arguments);
    }
}

// Auth::attempt('alex@codecourse.com', 'password');

// $auth = new AuthService();
// $auth->attempt('alex@codecourse.com', 'password');

Auth::attempt('alex@codecourse.com', 'password');