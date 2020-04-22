<?php
namespace App\Middleware;


use App\Session\Contracts\SessionStore;
use App\Views\View;


/**
 * Class ClearValidationErrors
 * @package App\Middleware
 *
 * Clear the errors validation after refleshing page
*/
class ClearValidationErrors
{

    /** @var SessionStore  */
    private $session;


    /**
     * DependencyInjection
     *
     * @param SessionStore $session
     */
    public function __construct(SessionStore $session)
    {
        $this->session = $session;
    }


    /**
     * @param $request
     * @param $response
     * @param callable $next
    */
    public function __invoke($request, $response, callable $next)
    {
          $next = $next($request, $response);
          $this->session->clear('errors', 'old');

          return $next;
    }
}