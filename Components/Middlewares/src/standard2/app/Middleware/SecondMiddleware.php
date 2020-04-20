<?php
namespace App\Middleware;


use App\Core\Middleware\MiddlewareInterface;


/**
 * Class SecondMiddleware
 * @package App\Middleware
*/
class SecondMiddleware implements MiddlewareInterface
{
    /**
     * @param callable $next
     * @return
    */
    public function __invoke(callable $next)
    {
        dump('second middleware');

        return $next();
    }


    /*
    public function __invoke()
    {
        dump('second middleware');
    }
    */
}