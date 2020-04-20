<?php
namespace App\Middleware;


use App\Core\Http\Request;
use App\Core\Middleware\MiddlewareInterface;


/**
 * Class FirstMiddleware
 * @package App\Middleware
*/
class FirstMiddleware implements MiddlewareInterface
{
    /**
     * @param Request $request
     * @param callable $next
     * @return
     */
    public function __invoke(Request $request, callable $next)
    {
        dump('first middleware');

        return $next($request);
    }

    /*
    public function __invoke()
    {
        dump('first middleware');
    }
    */
}