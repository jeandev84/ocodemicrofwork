<?php
namespace App\Middleware;


use App\Session\Contracts\SessionStore;
use App\Views\View;

/**
 * Class ShareValidationErrors
 * @package App\Middleware
 *
 * Share validation errors for showing to the view
*/
class ShareValidationErrors
{

    /** @var View  */
    protected $view;


    /** @var SessionStore  */
    private $session;



    /**
     * DependencyInjection
     * ShareValidationErrors constructor.
     * @param View $view
     * @param SessionStore $session
     */
    public function __construct(View $view, SessionStore $session)
    {
        $this->view = $view;
        $this->session = $session;
    }

    /**
     * @param $request
     * @param $response
     * @param callable $next
    */
    public function __invoke($request, $response, callable $next)
    {
          /* dump($this->view); */

          $this->view->share([
             'errors' => $this->session->get('errors', []),
             'old' => $this->session->get('old', [])
          ]);

          return $next($request, $response);
    }
}