<?php
namespace App\Security;


use App\Session\Contracts\SessionStore;

/**
 * Class Csrf
 * @package App\Security
 *
 * Cross Request
*/
class Csrf
{

     /** @var bool  */
     protected $persistToken = true;


     /** @var SessionStore  */
     protected $session;


     /**
      * Csrf constructor.
      * @param SessionStore $session
     */
     public function __construct(SessionStore $session)
     {
         $this->session = $session;
     }


     /**
      * @return string
     */
     public function key()
     {
        return '_token';
     }

     /**
      * @param $token
      * @return bool
     */
     public function tokenIsValid($token)
     {
         return $token === $this->session->get($this->key());
     }


     /**
      * Generate token string
      * @return string
      * @throws \Exception
     */
     public function token()
     {
         // si le token a ete genere
         // alors on retourne le token provenant de la session
         if(! $this->tokenNeedsToBeGenerated())
         {
               return $this->getTokenFromSession();
         }

         // on sauvegarde le token dans la session
         $this->session->set(
             $this->key(),
             $token = bin2hex(random_bytes(32))
         );

         return $token;
     }


     /**
      * Get Token from session
     */
     protected function getTokenFromSession()
     {
         return $this->session->get($this->key());
     }

     /**
      * Determine if token needs to be generated
      * @return bool
     */
     protected function tokenNeedsToBeGenerated()
     {
         # Si pas de cle de token en session alors on va en generer
         if(! $this->session->exists($this->key()))
         {
              return true;
         }

         if($this->shouldPersistToken())
         {
              return false;
         }

         return  $this->session->exists($this->key());
     }


     /**
      * Return status of persisting token
      * @return bool
     */
     protected function shouldPersistToken()
     {
         return $this->persistToken;
     }
}