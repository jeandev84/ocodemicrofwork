<?php
namespace App\Middleware;


use App\Auth\Auth;

/**
 * Class Guest
 * @package App\Middleware
 *
 * Check Guest
 * If user sigin we will redirect to access page
 */
class Guest
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
        # redirect always user to home if is logged
        if($this->auth->check())
        {
            $response = redirect('/');
        }

        return $next($request, $response);
    }
}