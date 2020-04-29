<?php
namespace App\Middleware;


use App\Auth\JwtAuth;
use Exception;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class Authenticate
 * @package App\Middleware
*/
class Authenticate
{

    /** @var JwtAuth  */
    protected $auth;


    /**
     * Authenticate constructor.
     * @param JwtAuth $auth
    */
    public function __construct(JwtAuth $auth)
    {
        $this->auth = $auth;
    }


    /**
      * @param Request $request
      * @param Response $response
      * @param callable $next
      * @return
     */
     public function __invoke(Request $request, Response $response, callable $next)
     {
          if(! $header = $this->getAuthorizationHeader($request))
          {
               return $response->withStatus(401);
          }

          // Bearer xxxx (Bearer + token)
          try {

               // Trying to authenticate
               $auth = $this->auth->authenticate($header);

          }catch (Exception $e) {

              // give specific message
              return $response->withJson([
                  'message' => $e->getMessage()
              ],401);
          }


          return $next($request, $response);
     }


     /**
      * @param Request $request
      * @return bool|string
     */
     protected function getAuthorizationHeader(Request $request)
     {
          if(! list($header) = $request->getHeader('Authorization', false))
          {
              return false;
          }

          return $header;
     }
}

/*
Decoded message
where iss is URI
{#80
  +"sub": 1
  +"iss": "http://localhost:8000/auth/login?email=jeanyao@ymail.com&password=secret123"
  +"iat": 1588192336
  +"nbf": 1588192336
  +"jti": "334979355570536d3867416b376d526a6273716d345932437842535379427945"
  +"exp": 1588192396
}

Decoded token where isss is PATH from URI
{#80
  +"sub": 1
  +"iss": "/auth/login"
  +"iat": 1588192731
  +"nbf": 1588192731
  +"jti": "727a64666f65326c5649316c3655356c424a4a335631385a65476e646b794d57"
  +"exp": 1588192791
}


If Token expired will be show next message from Authenticate Middleware
{
    "message": "Expired token"
}
*/