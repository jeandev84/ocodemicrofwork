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


    /** @var Factory1  */
    protected $factory;


    /** @var Parser  */
    protected $parser;


    /** @var  */
    protected $user = null;


    /**
     * JwtAuth constructor.
     * @param AuthProviderInterface $auth [ Eloquent Auth provider, authentification by database ]
     * @param Factory $factory
     * @param Parser $parser
     */
    public function __construct(
        AuthProviderInterface $auth,
        Factory $factory,
        Parser $parser
    )
    {
        $this->auth = $auth;
        $this->factory = $factory;
        $this->parser = $parser;
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

         // build jwt claims
         // subject user id
         // encode user id
         // return this encoded
         return $this->fromSubject($user);

     }


    /**
     * @param string $token
     *
     * Token:
     *  Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9
     *  .eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zd
     *  Do4MDAwXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU4ODE4NzY2
     *  MCwibmJmIjoxNTg4MTg3NjYwLCJqdGkiOiI2YTRkMzQ1Nz
     *  RiNjI3MzYzNmY1MjU2NDgzMzQ0Nzk3NDU4NzU0MjU5NTg0O
     *  DRlNjc2YzdhNTI2NTRkNmI1YTM2IiwiZXhwIjoxNTg4MTg3NzIwf
     *  Q.-dPMe0OH68yOsXz3x66qXqKbvnS_DONRFIQ1yAzA7H8
     *
     */
     public function authenticate($token)
     {
         /* dump($token); dump($this->parser->decode($token)); */

         // decode the token
         // get the subject (example id = 1)
         // get user by id
         // assign user

         $this->user = $this->auth->byId(
             // extract sub (because it contains id)
             $this->parser->decode($token)->sub
         );

         /* dump($this->user); */

         return $this;
     }


     /**
      * @return null
     */
     public function getUser()
     {
         return $this->user;
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
          // make payload and encode
          return $this->factory->encode(
              $this->makePayload($subject)
          );
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
         $claims = $this->getClaimsForSubject($subject);

         return  $this->factory->withClaims($claims)->make();
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