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
        $service = static::service();

        if (!method_exists($service, $method)) {
            throw new BadMethodCallException("Method [{$method}] does not exist on [" . get_class($service) . "]");
        }

        return $service->{$method}(...$args);
    }
}

class Auth extends Facade
{
    public static function service()
    {
        return new AuthService();
    }
}

var_dump(Auth::login('alex', 'password'));