<?php
namespace App\Auth;


use App\Auth\Hashing\Contracts\Hasher;
use App\Models\User;
use App\Session\Contracts\SessionStore;
use Doctrine\ORM\EntityManager;
use Exception;


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


     /** @var User change later by UserInterface */
     protected $user;


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
      * @return User
     */
     public function user()
     {
        return $this->user;
     }


     /**
      * @return bool
     */
     public function hasUserInSession()
     {
         return $this->session->exists($this->key());
     }


    /**
     * Set user from the session
     * @throws Exception
     */
     public function setUserFromSession()
     {
         # Try to check user using user stored in session
         $user = $this->getById($this->session->get($this->key()));

         if(! $user)
         {
             throw new Exception();
         }

         $this->user = $user;
     }


     /**
      * @param $user
     */
     protected function setUserSession($user)
     {
         $this->session->set($this->key(), $user->id);
     }


     /**
      * On retourne la cle d'authentification
      * Afin de ne pas repeter la meme cle quand on en aura besoin
      *
      * @return string
     */
     protected function key()
     {
         return 'id';
     }


    /**
     * @param User $user
     * @param $password
     * @return bool
     */
     protected function hasValidCredentials(User $user, $password)
     {
         /*  $this->hash->check($password, $user->getPassword()); */

         return $this->hash->check($password, $user->password);
     }


    /**
     * Get User by Id
     * @param $id
    */
    protected function getById($id)
    {
        return $this->db->getRepository(User::class)
                        ->find($id);
    }

     /**
      * Get User by username
      * @param $username
      * @return object|null
     */
     protected function getByUsername($username)
     {
         return $this->db->getRepository(User::class)
                         ->findOneBy(['email' => $username]);
     }

}