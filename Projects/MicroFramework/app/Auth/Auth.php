<?php
namespace App\Auth;


use App\Auth\Hashing\Contracts\Hasher;
use App\Cookie\CookieJar;
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
      * @var Recaller
     */
     protected $recaller;


     /** @var CookieJar  */
     protected $cookie;


    /**
     * Auth constructor.
     * @param EntityManager $db
     * @param Hasher $hash
     * @param SessionStore $session
     * @param Recaller $recaller
     *
     *
     * On peut creer un UserInterface
     * et obtenir toute les informations de lui
     *  methode getUsername(), getPassword() ...
     * @param CookieJar $cookie
     */
     public function __construct(
         EntityManager $db,
         Hasher $hash,
         SessionStore $session,
         Recaller $recaller,
         CookieJar $cookie
     )
     {
         $this->db = $db;
         $this->hash = $hash;
         $this->session = $session;
         $this->recaller = $recaller;
         $this->cookie = $cookie;
     }


     /**
      * Logout authenticated user
     */
     public function logout()
     {
          $this->session->clear($this->key());
     }

    /**
     * Login user by credentials
     * @param $username
     * @param $password
     * @param bool $remember (Remember the user)
     * @return bool
     */
     public function attempt($username, $password, $remember = false)
     {
          /** @var User $user */
          $user = $this->getByUsername($username);

          // if not user and has not valid credentials
          if(! $user || ! $this->hasValidCredentials($user, $password))
          {
              return false;
          }

          // need to rehash when password does not matched
          if($this->needsRehash($user))
          {
              $this->rehashPassword($user, $password);
          }


          // set user in session
          $this->setUserSession($user);

          // check if has remember user setted
          if($remember)
          {
               $this->setRememberToken($user);
          }

          return true;
     }


     /**
      * Set user from cookie
     */
     public function setUserFromCookie()
     {
         list($identifier, $token) = $this->recaller->splitCookieValue(
             $this->cookie->get('remember')
         );

         // clear cookie if user does not exists
         $user = $this->db->getRepository(User::class)
                          ->findOneBy([
                              'remember_identifier' => $identifier
                          ]);


         // Cookie recaller security logic :
         // This logic called if user modify manually ,
         // remember cookie value in the brown
         // clear current cookie if user does not exist
         if(! $user)
         {
              $this->cookie->clear('remember');
              return;
         }

         // if token matches
         if(! $this->recaller->validateToken($token, $user->remember_token))
         {
              // clear remember token and identifier in the database
             $user = $this->db->getRepository(User::class)
                              ->find($user->id)
                              ->update([
                                  'remember_identifier' => null,
                                  'remember_token' => null
                              ]);

              $this->db->flush();
              $this->cookie->clear('remember');

              throw new Exception();
         }

         // sign in user using session information
         $this->setUserSession($user);
     }

     /**
      * @return bool
     */
     public function hasRecaller()
     {
         return $this->cookie->exists('remember');
     }


     /**
      * Set Remember Token
      * @param $user
     */
     protected function setRememberToken($user)
     {
         // List generated values
         list($identifier, $token) = $this->recaller->generate();

         // Set remember cookie
         $this->cookie->set('remember', $this->recaller->generateValueForCookie($identifier, $token));

         // Persit hashing to the database
         // Check User by id and update fields
         $this->db->getRepository(User::class)
                  ->find($user->id)
                  ->update([
                     'remember_identifier' => $identifier,
                     'remember_token' => $this->recaller->getTokenHashForDatabase($token)
                 ]);

         $this->db->flush();
     }


     /**
     * Determine if need to rehash user password
     * we need to rehash password if the cost changed for example
     * need to rehash password when hasheds passwords does not matches
     * for example whe cost changed manually
     * $hash = '$2y$12$kxuI.z4zqwNDBzPLTSjit.YN5qnfiB2tbrGY/vGSF4LqwpvBOImfq'
     * costHash = 12
     * if to change options cost = 15 for example that is not match,
     * it used for resolving probleme of old and new password
     *
     * @param $user
     * @return mixed
     */
     protected function needsRehash($user)
     {
          return $this->hash->needsRehash($user->password);
     }


     /**
      * Rehash User password and to Update password in  the database
      * @param $user
      * @param $password
     */
     protected function rehashPassword($user, $password)
     {
         $this->db->getRepository(User::class)
                  ->find($user->id)
                  ->update([
                      'password' => $this->hash->create($password)
                  ]);

         $this->db->flush();
     }


     /**
      * @return User
     */
     public function user()
     {
        return $this->user;
     }


     /**
      * Determine if has user in session
      * @return bool
     */
     public function check()
     {
         return $this->hasUserInSession();
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