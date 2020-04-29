<?php
namespace App\Auth;


use App\Auth\Providers\Auth\AuthServiceProvider;
use App\Models\User;


/**
 * Class JwtAuth
 * @package App\Auth
 *
 * JWT authentification manager
 */
class JwtAuth
{
    /**
     * @var AuthServiceProvider
    */
    protected $auth;

    /**
     * JwtAuth constructor.
     * @param AuthServiceProvider $auth [ Eloquent Auth provider, authentification by database ]
     */
    public function __construct(AuthServiceProvider $auth)
    {
        $this->auth = $auth;
    }

    /**
      * @param $username
      * @param $password
      * @return |null
     */
     public function attempt($username, $password)
     {
         // check user
         if(! $user = $this->auth->byCredentials($username, $password))
         {
             return false;
         }

         return 'newToken';

         // build jwt claims

         // subject user id

         // encode user id

         // return this encoded

         return 'works';
     }
}