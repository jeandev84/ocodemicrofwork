<?php
namespace App\Auth;


use Carbon\Carbon;

/**
 * Class ClaimsFactory
 * @package App\Auth
*/
class ClaimsFactory
{

     /** @var array  */
     protected $defaultClaims = [
         'iss',
         'iat',
         'nbf',
         'jti',
         'exp'
     ];


     /**
      * @return array|string[]
     */
     public function getDefaultClaims()
     {
         return $this->defaultClaims;
     }


     /**
      *  iss (is sure) it's URL where you from example:
      *  http://localhost:8000/auth/login
      *
      * @return string
     */
     public function iss()
     {
         return 'http://localhost:8000/auth/login';
     }

     /**
      * @return int
      *
      * iat (is ajustly marging time)
     */
     public function iat()
     {
         return Carbon::now()->getTimestamp();
     }


     /**
      * @return int
      *
      * nbf (number before)
     */
     public function nbf()
     {
         return Carbon::now()->getTimestamp();
     }


     /**
      * @return string
      *
      * jti (unique id for our web json token very important)
      * json token identifier
     */
     public function jti()
     {
         return bin2hex(str_random(32));
     }


     /**
      * exp (expiry)
      * @return int
     */
     public function exp()
     {
         return Carbon::now()->addMinutes(10)->getTimestamp();
     }


     /**
      * @param $claim
      * @return |null
     */
     public function get($claim)
     {
         if(! method_exists($this, $claim))
         {
              return null;
         }

         return $this->{$claim}();
     }
}