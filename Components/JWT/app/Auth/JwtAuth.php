<?php
namespace App\Auth;


/**
 * Class JwtAuth
 * @package App\Auth
 *
 * JWT authentification manager
 */
class JwtAuth
{

     /**
      * @param $username
      * @param $password
     */
     public function attempt($username, $password)
     {
         return 'abcdef';
     }
}