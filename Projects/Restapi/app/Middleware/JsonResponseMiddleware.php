<?php
namespace App\Middleware;


use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class JsonResponseMiddleware
 * @package App\Middleware
*/
class JsonResponseMiddleware
{

     /**
      * @param Request $request
      * @param Response $response
      * @param callable $next
      * @return
     */
     public function __invoke(Request $request, Response $response, callable $next)
     {
          return $next($request, $response->withHeader('Content-Type', 'app'));
     }

     /*  public function __invoke(Request $request, Response $response, callable $next) */
}