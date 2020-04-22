<?php
namespace App\Exceptions;

use App\Session\Contracts\SessionStore;
use App\Views\View;
use Exception;
use Psr\Http\Message\ResponseInterface;
use ReflectionClass;
use Zend\Diactoros\Response\RedirectResponse;


/**
 * Class ErrorHandler
 * @package App\Exceptions
 *
 * ErrorHandler
*/
class ErrorHandler
{

     /** @var Exception */
     protected $exception;


     /**
      * @var SessionStore
     */
     protected $session;


     /** @var ResponseInterface  */
     protected $response;


     /** @var View  */
     protected $view;


    /**
     * ErrorHandler constructor.
     * @param \Exception $exception
     * @param SessionStore $session (Session Interface)
     * @param ResponseInterface $response
     * @param View $view
     */
     public function __construct(
         Exception $exception,
         SessionStore $session,
         ResponseInterface $response,
         View $view
     )
     {
         $this->exception = $exception;
         $this->session = $session;
         $this->response = $response;
         $this->view = $view;
     }


     /**
      * @param SessionStore $session
      * @return $this
     */
     public function setSession(SessionStore $session)
     {
         $this->session = $session;

         return $this;
     }


     /**
      * Responder exception
     */
     public function respond()
     {
         $class = (new ReflectionClass($this->exception))->getShortName();

         if(method_exists($this, $method = "handle{$class}"))
         {
             return $this->{$method}($this->exception);
         }

         return $this->unhandledException($this->exception);
     }


    /**
     * @param Exception $e
     * @return string|RedirectResponse
     *
     * retourne new RedirectResponse('/auth/signin');
     */
     protected function handleValidationException(Exception $e)
     {
          # Set session
          $this->session->set([
             'errors' => $e->getErrors(),
             'old'    => $e->getOldInput()
          ]);

          # Redirect to path
          return redirect($e->getPath());
     }


    /**
     * @param Exception $e
     * @return string|RedirectResponse
     *
    */
    protected function handleCsrfTokenException(Exception $e)
    {
        return $this->view->render($this->response, 'errors/csrf.twig');
    }


    /**
      * @param Exception $e
     */
     protected function unhandledException(Exception $e)
     {
          throw $e;
     }
}