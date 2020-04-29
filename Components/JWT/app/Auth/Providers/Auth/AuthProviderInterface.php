<?php
namespace App\Auth\Providers\Auth;


/**
 * Interface AuthProviderInterface
 * @package App\Auth\Providers\Auth
*/
interface AuthProviderInterface
{
     /**
       * @param $username
       * @param $password
       * @return mixed
     */
      public function byCredentials($username, $password);
}