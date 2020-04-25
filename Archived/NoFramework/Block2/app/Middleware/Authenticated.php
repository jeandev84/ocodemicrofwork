<?php
namespace App\Middleware;


use App\Auth\Auth;

/**
 * Class Authenticated
 * @package App\Middleware
 *
 * Protection access to important information
 * Limit acccess
 */
class Authenticated
{

    /** @var Auth  */
    protected $auth;

    /**
     * Authenticated constructor.
     * @param Auth $auth
    */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param $request
     * @param $response
     * @param callable $next
     */
    public function __invoke($request, $response, callable $next)
    {
        # User dashboard with protection
        # Can not access if not authenticated user
        if(! $this->auth->check())
        {
            $response = redirect('/');
        }

        return $next($request, $response);
    }
}