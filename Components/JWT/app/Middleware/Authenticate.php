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

               $auth = $this->auth->authenticate($header);

          }catch (Exception $e) {

              // todo give specific message
              return $response->withStatus(401);
          }


          dump($auth);
          die;

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