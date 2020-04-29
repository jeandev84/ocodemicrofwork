<?php
namespace App\Auth;


use App\Auth\Contracts\JwtSubjectInterface;
use App\Auth\Providers\Auth\AuthProviderInterface;


/**
 * Class JwtAuth
 * @package App\Auth
 *
 * JWT authentification manager
 */
class JwtAuth
{
    /**
     * @var AuthProviderInterface
    */
    protected $auth;

    /**
     * JwtAuth constructor.
     * @param AuthProviderInterface $auth
     *
     * [ Eloquent Auth provider, authentification by database ]
     */
    public function __construct(AuthProviderInterface $auth)
    {
        $this->auth = $auth;
    }

    /**
      * @param $username
      * @param $password
      * @return |null
     *
     * Algorithm:
     *  check User
     *  build jwt claims
     *  subject user id
     *  encode user id
     *  return this encoded
     */
     public function attempt($username, $password)
     {
         // check user
         if(! $user = $this->auth->byCredentials($username, $password))
         {
             return false;
         }

         /* dump($user->getJwtIdentifier()); */

         return $this->fromSubject($user);


         // build jwt claims

         // subject user id

         // encode user id

         // return this encoded

     }


    /**
      * Start the builder of payload
      *
      *  @param JwtSubjectInterface $subject
      *  @return array
      *
      *  Here may be Model like :
      *  User Model
      *  Auth Model
      *  Admin Model
      *  Moderator Model
      *  ...
      *
     */
     protected function fromSubject(JwtSubjectInterface $subject)
     {
          // make payload
          return $this->makePayload($subject);
     }


     /**
      * Make a payload
      *
      * @param JwtSubjectInterface $subject
      * @return array
     */
     protected function makePayload(JwtSubjectInterface $subject)
     {
         // factory
         return $this->getClaimsForSubject($subject);
     }


     /**
      * Get the specific claims for object
      *
      * @param JwtSubjectInterface $subject
      * @return array
     */
     protected function getClaimsForSubject(JwtSubjectInterface $subject)
     {
           return [
               'sub' => $subject->getJwtIdentifier()
           ];
     }
}