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


     /** @var ClaimsFactory */
     protected $claimsFactory;


     /**
      * Factory constructor.
      * @param ClaimsFactory $claimsFactory
     */
     public function __construct(ClaimsFactory $claimsFactory)
     {
           $this->claimsFactory = $claimsFactory;
     }


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
          $claims = [];

          foreach ($this->getDefaultClaims() as $claim)
          {
               $claims[$claim] = $this->claimsFactory->get($claim);
          }

          return array_merge($this->claims, $claims);
     }


     /**
      * @return array|string[]
     */
     protected function getDefaultClaims()
     {
         return $this->claimsFactory->getDefaultClaims();
     }


     public function encode()
     {

     }
}

/*
return array_merge($this->claims, [
 'iss' => 'http://localhost:8000/auth/login', // is sure
 'iat' => Carbon::now()->getTimestamp(),
 'nbf' => Carbon::now()->getTimestamp(), // 1 day
 'jti' => bin2hex(str_random(32)),
 'exp' => Carbon::now()->addMinutes(10)->getTimestamp()
]);

make()

return array_merge($this->claims, [
 'iss' => $this->claimsFactory->iss(), // is sure
 'iat' => $this->claimsFactory->iat(),
 'nbf' => $this->claimsFactory->nbf(), // 1 day
 'jti' => $this->claimsFactory->jti(),
 'exp' => $this->claimsFactory->exp()
]);
*/