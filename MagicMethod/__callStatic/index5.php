<?php

/**
 * Class AuthService
 */
class AuthService
{
    /**
     * @param $username
     * @param $password
     */
    public function attempt($username, $password)
    {
        var_dump('attempt', $username, $password);
    }
}


/**
 * Class Facade
*/
abstract class Facade
{

    /** @return mixed */
    abstract public static function service();


    /**
     * @param $method
     * @param $arguments
     * @return
     */
    public static function __callStatic($method, $arguments)
    {
        return static::service()->{$method}(...$arguments);
    }
}


/**
 * Facade Implementation
 * Class Auth
*/
class Auth extends Facade
{

     /**
      * @return AuthService
     */
     public static function service()
     {
          return new AuthService();
     }
}


//Auth::attempt('alex@codecourse.com', 'secret');

// $auth = new AuthService();
// $auth->attempt('alex@codecourse.com', 'secret');


# Facade
Auth::attempt('alex@codecourse.com', 'secret');