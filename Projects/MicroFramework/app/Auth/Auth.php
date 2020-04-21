<?php
namespace App\Auth;


use App\Auth\Hashing\Contracts\Hasher;
use App\Models\User;
use App\Session\Contracts\SessionStore;
use Doctrine\ORM\EntityManager;


/**
 * Class Auth
 * @package App\Auth
 */
class Auth
{

     /** @var EntityManager  */
     protected $db;


     /** @var Hasher  */
     protected $hash;


     /** @var SessionStore  */
     protected $session;


    /**
     * Auth constructor.
     * @param EntityManager $db
     * @param Hasher $hash
     * @param SessionStore $session
     *
     * On peut creer un UserInterface
     * et obtenir toute les informations de lui
     *  methode getUsername(), getPassword() ...
     */
     public function __construct(EntityManager $db, Hasher $hash, SessionStore $session)
     {
         $this->db = $db;
         $this->hash = $hash;
         $this->session = $session;
     }


     /**
      * Login user by credentials
      * @param $username
      * @param $password
      * @param bool $remember
     */
     public function attempt($username, $password, $remember = false)
     {
          /** @var User $user */
          $user = $this->getByUsername($username);

          /* if not user and has not valid credentials */
          if(! $user || ! $this->hasValidCredentials($user, $password))
          {
              return false;
          }

          $this->setUserSession($user);


          return true;
     }


     /**
      * @param $user
     */
     protected function setUserSession($user)
     {
         $this->session->set('id', $user->id);
     }


     /**
      * @param User $user
      * @param $password
     */
     protected function hasValidCredentials(User $user, $password)
     {
         /*  $this->hash->check($password, $user->getPassword()); */

         return $this->hash->check($password, $user->password);
     }


     /**
      * @param $username
     */
     protected function getByUsername($username)
     {
         return $this->db->getRepository(User::class)
                         ->findOneBy(['email' => $username]);
     }
}