<?php
/*
 Introduce Facade System implementation
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
         var_dump('attempt');
    }
}


/**
 * Class Auth
*/
//class Auth
//{
//     /**
//      * @param $username
//      * @param $password
//     */
//     public static function attempt($username, $password)
//     {
//           var_dump($username, $password);
//     }
//}
//
//Auth::attempt('alex@codecourse.com', 'secret');

// $auth = new AuthService();
// $auth->attempt('alex@codecourse.com', 'secret');
