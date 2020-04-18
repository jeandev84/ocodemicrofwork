<?php
namespace App\Middleware;


use App\Core\Middleware\MiddlewareInterface;


/**
 * Class FirstMiddleware
 * @package App\Middleware
*/
class FirstMiddleware implements MiddlewareInterface
{
    /**
     * @param callable $next
     * @return
     */
    public function __invoke(callable $next)
    {
        dump('first middleware');

        return $next();
    }

    /*
    public function __invoke()
    {
        dump('first middleware');
    }
    */
}