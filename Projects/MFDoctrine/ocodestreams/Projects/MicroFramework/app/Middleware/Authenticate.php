<?php
namespace App\Middleware;


use App\Auth\Auth;
use Exception;


/**
 * Class Authenticate
 * @package App\Middleware
 *
 * Permet d'authentifier l'utilisateur
*/
class Authenticate
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
     */
    public function __invoke($request, $response, callable $next)
    {
        if($this->auth->hasUserInSession())
        {
            try {

                $this->auth->setUserFromSession();

            } catch (Exception $e) {

                $this->auth->logout();
            }
        }

        return $next($request, $response);
    }
}