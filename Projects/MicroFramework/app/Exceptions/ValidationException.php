<?php
namespace App\Exceptions;


use Exception;

/**
 * Class ValidationException
 * @package App\Exceptions
*/
class ValidationException extends \Exception
{
     /** @var  */
     protected $request;

     /** @var array  */
     protected $errors;

    /**
     * ValidationException constructor.
     * @param $request
     * @param array $errors
     */
     public function __construct($request, array  $errors)
     {
         $this->request = $request;
         $this->errors = $errors;
     }


     /**
      * @return mixed
     */
     public function getPath()
     {
         return $this->request->getUri()->getPath();
     }


     /**
      * @return mixed
     */
     public function getOldInput()
     {
         return $this->request->getParsedBody();
     }


    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }
}