<?php
namespace App\Auth;


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
     */
     public function make()
     {
         return $this->claims;
     }


     public function encode()
     {

     }
}