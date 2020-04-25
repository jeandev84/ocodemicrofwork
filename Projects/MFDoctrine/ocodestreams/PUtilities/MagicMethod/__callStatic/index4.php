<?php
/*
 Facade System implementation
*/

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
 * Facade Implementation
 * Class Auth
 */
class Auth
{
     /**
      * @return AuthService
     */
     public static function service()
     {
          return new AuthService();
     }

     /**
      * @param $method
      * @param $arguments
      * @return
     */
     public static function __callStatic($method, $arguments)
     {
           return self::service()->{$method}(...$arguments);
     }
}


//Auth::attempt('alex@codecourse.com', 'secret');

// $auth = new AuthService();
// $auth->attempt('alex@codecourse.com', 'secret');

Auth::attempt('alex@codecourse.com', 'secret');