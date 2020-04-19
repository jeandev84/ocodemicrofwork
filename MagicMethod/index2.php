<?php

/**
 * Class Auth
*/
class Auth
{
     /**
      * @param $username
      * @param $password
     */
     public static function attempt($username, $password)
     {
           var_dump($username, $password);
     }
}

Auth::attempt('alex@codecourse.com', 'secret');