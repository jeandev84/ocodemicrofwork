<?php
namespace App\Exceptions;

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
      * ErrorHandler constructor.
      * @param \Exception $exception
     */
     public function __construct(Exception $exception)
     {
         $this->execption = $exception;
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

          // session set

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