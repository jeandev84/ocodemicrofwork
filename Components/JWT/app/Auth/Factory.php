<?php
namespace App\Auth;


use Carbon\Carbon;

/**
 * Class Factory
 * @package App\Auth
*/
class Factory
{

     /** @var array */
     protected $claims;


     /**
      * @param array $claims
      * @return $this
     */
     public function withClaims(array $claims)
     {
         $this->claims = $claims;

         return $this;
     }

     /**
      * @return array
      * - iss (is sure) it's URL where you from exmaple:
      *     http://localhost:8000/auth/login
      *
      * - iat (is ajustly marging time)
      * - nbf (number before)
      * - jti (unique id for our web json token very important)
      * - exp (expiry)
     */
     public function make()
     {
         return array_merge($this->claims, [
             'iss' => 'http://localhost:8000/auth/login', // is sure
             'iat' => Carbon::now()->getTimestamp(),
             'nbf' => Carbon::now()->getTimestamp(), // 1 day
             'jti' => bin2hex(str_random(32)),
             'exp' => Carbon::now()->addMinutes(10)->getTimestamp()
         ]);
     }


     public function encode()
     {

     }
}