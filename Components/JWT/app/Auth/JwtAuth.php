<?php
namespace App\Auth;


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
      * @param $username
      * @param $password
      * @return |null
     */
     public function attempt($username, $password)
     {
         /* dump(User::where('email', $username)->first()); */

         if(! $user = User::where('email', $username)->first())
         {
              return null;
         }

         if(! password_verify($password, $user->password))
         {
             return null;
         }

         return 'works';
     }
}