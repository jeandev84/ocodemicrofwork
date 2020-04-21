<?php
namespace App\Exceptions;

use App\Session\Contracts\SessionStore;
use Exception;
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
     protected $execption;


     /**
      * @var SessionStore
     */
     protected $session;


     /**
      * ErrorHandler constructor.
      * @param \Exception $exception
      * @param SessionStore $session (Session Interface)
     */
     public function __construct(
         Exception $exception,
         SessionStore $session
     )
     {
         $this->execption = $exception;
         $this->session = $session;
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
         $class = (new ReflectionClass($this->execption))->getShortName();

         if(method_exists($this, $method = "handle{$class}"))
         {
             return $this->{$method}($this->execption);
         }

         return $this->unhandledException($this->execption);
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
     */
     protected function unhandledException(Exception $e)
     {
          throw $e;
     }
}