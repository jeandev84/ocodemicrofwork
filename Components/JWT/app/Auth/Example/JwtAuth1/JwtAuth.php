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
         // check if has user by given email
         if(! $user = User::where('email', $username)->first())
         {
              return null;
         }

         // Check if user password match hashed password from database
         if(! password_verify($password, $user->password))
         {
             return null;
         }

         // build jwt claims

         // subject user id

         // encode user id

         // return this encoded

         return 'works';
     }
}