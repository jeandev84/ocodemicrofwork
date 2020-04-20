<?php
namespace App\Middleware;


use App\Core\Http\Request;
use App\Core\Middleware\MiddlewareInterface;


/**
 * Class SecondMiddleware
 * @package App\Middleware
*/
class SecondMiddleware implements MiddlewareInterface
{
    /**
     * @param Request $request
     * @param callable $next
     * @return
    */
    public function __invoke(Request $request, callable $next)
    {
        dump('second middleware');

        // set status code to 401
        $request->code = 401;

        return $next($request);
    }


    /*
    public function __invoke()
    {
        dump('second middleware');
    }
    */
}