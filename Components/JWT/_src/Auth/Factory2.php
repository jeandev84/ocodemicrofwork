<?php
namespace App\Auth;


use Carbon\Carbon;
use Firebase\JWT\JWT;
use Slim\Settings;

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


     /** @var Settings  */
     protected $settings;



    /**
     * Factory constructor.
     * @param ClaimsFactory $claimsFactory
     * @param Settings $settings
     */
     public function __construct(ClaimsFactory $claimsFactory, Settings $settings)
     {
           $this->claimsFactory = $claimsFactory;
           $this->settings = $settings;
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


     /**
      * Encoding
      * @param array $claims
      * @return string
      *
      * JWT:
      * https://github.com/firebase/php-jwt
      * JWT::encode($claims, 'secret', 'algo-you-want-to-user')
      *
      * Give us something like this :
      * {
      *   "token": "
      *     eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.
      *     eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4M
      *     DAwXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU4ODE4MzcxNiwibm
      *     JmIjoxNTg4MTgzNzE2LCJqdGkiOiI0ODQ0Njc1MjY1NGQ2MjU2NDc
      *     0NDc0NDUzNjRhNjE0ODU1N2E2MzQyMzE0NDQ4NzM0Nz
      *     U5NDczMzM4NTU3Mjc4IiwiZXhwIjoxNTg4MTgzNzc2fQ.
      *     r5L02X_GrbV1mQ5-xwKM9om3oEznzYQiSbs9sM1-qhE"
      * }
      *
      * Test this token to the :
      *
      * https://jwt.io Verify Toke JWT
      *
      * More secure password
      *  https://www.grc.com/passwords.htm
      *   ex: vF[JxOzys&`;W.vAXG=wrK%-C)s}.a7HqVBzU0{k@oExs#rVT7LoUWGK'ncU{+v
      */
     public function encode(array $claims)
     {
         return JWT::encode($claims, $this->settings->get('jwt.secret'), 'HS256');
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