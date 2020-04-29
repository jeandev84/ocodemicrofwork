<?php
namespace App\Auth;


use Psr\Http\Message\RequestInterface;
use Carbon\Carbon;
use Slim\Settings;

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

     /** @var RequestInterface  */
     protected $request;


     /** @var Settings  */
     protected $settings;


    /**
      * ClaimsFactory constructor.
      * @param RequestInterface $request
      * @param Settings $settings
     */
     public function __construct(RequestInterface $request, Settings $settings)
     {
         $this->request = $request;
         $this->settings = $settings;
     }

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
         // 'http://localhost:8000/auth/login';
         // return $this->request->getUri()->getPath();
         return (string) $this->request->getUri();
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
         // Carbon::now()->addMinutes(10)->getTimestamp();
         return Carbon::now()->addMinutes(
             $this->settings->get('jwt.expiry')
         )->getTimestamp();
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