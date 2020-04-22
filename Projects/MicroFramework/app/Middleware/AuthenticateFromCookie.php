<?php
namespace App\Middleware;


use App\Auth\Auth;
use Exception;


/**
 * Class AuthenticateFromCookie
 * @package App\Middleware
 *
 * Permet d'authentifier l'utilisateur a partir du cookie
*/
class AuthenticateFromCookie
{

    /** @var Auth  */
    protected $auth;


    /**
     * Authenticate constructor.
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
     * @return
    */
    public function __invoke($request, $response, callable $next)
    {
        if($this->auth->check())
        {
            return $next($request, $response);
        }

        // check have cookie remember setted
        if($this->auth->hasRecaller())
        {
            try {

                $this->auth->setUserFromCookie();

            } catch (Exception $e) {

                $this->auth->logout();
            }
        }

        return $next($request, $response);
    }
}