<?php
namespace App\Auth;


use App\Auth\Hashing\Contracts\Hasher;
use App\Auth\Providers\UserProvider;
use App\Cookie\CookieJar;
use App\Models\Eloquent\User;
use App\Session\Contracts\SessionStore;
use Exception;


/**
 * Class Auth
 * @package App\Auth
 */
class Auth
{

     /** @var Hasher  */
     protected $hash;


     /** @var SessionStore  */
     protected $session;


     /** @var User */
     protected $user;

     /**
      * @var Recaller
     */
     protected $recaller;


     /** @var CookieJar  */
     protected $cookie;


     /** @var UserProvider  */
     protected $provider;


    /**
     * Auth constructor.
     * @param Hasher $hash
     * @param SessionStore $session
     * @param Recaller $recaller
     * @param CookieJar $cookie
     * @param UserProvider $provider
     *
     * On peut creer un UserInterface
     * et obtenir toute les informations de lui
     *  methode getUsername(), getPassword() ...
     */
     public function __construct(
         Hasher $hash,
         SessionStore $session,
         Recaller $recaller,
         CookieJar $cookie,
         UserProvider $provider
     )
     {
         $this->hash = $hash;
         $this->session = $session;
         $this->recaller = $recaller;
         $this->cookie = $cookie;
         $this->provider = $provider;
     }


     /**
      * Logout authenticated user
     */
     public function logout()
     {
        if($this->user)
        {
            $this->provider->clearUserRememberToken($this->user->id);
            $this->cookie->clear('remember');
            $this->session->clear($this->key());
        }
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
          $user = $this->provider->getByUsername($username);

          // if not user and has not valid credentials
          if(! $user || ! $this->hasValidCredentials($user, $password))
          {
              return false;
          }

          // need to rehash when password does not matched
          if($this->needsRehash($user))
          {
              $this->provider->updateUserPasswordHash(
                  $user->id,
                  $this->hash->create($password)
              );
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

         // clear current cookie if user does not exist
         if(! $user = $this->provider->getUserByRememberIdentifier($identifier))
         {
              $this->cookie->clear('remember');
              return;
         }

         // if token matches
         if(! $this->recaller->validateToken($token, $user->remember_token))
         {
              $this->provider->clearUserRememberToken($user->id);
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

         $this->provider->setUserRememberToken(
             $user->id,
             $identifier,
             $this->recaller->getTokenHashForDatabase($token)
         );
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
         $user = $this->provider->getById($this->session->get($this->key()));

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

}