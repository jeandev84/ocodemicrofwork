<?php


require_once __DIR__.'/../vendor/autoload.php';


class ValidationException extends Exception
{
    protected $errors;

//    public function __construct($message = "", $code = 0, Throwable $previous = null)
//    {
//        parent::__construct($message, $code, $previous);
//    }


    /**
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}


class Validator
{
    public function validate()
    {
        $exception = new ValidationException('Validation failed');

        $exception->setErrors([
            'first_name' => [
                'First name is required'
            ],
            'last_name' => [
                'Last name is required'
            ],
        ]);

        throw $exception;
    }
}

$validator = new Validator();

try {
    $validator->validate();
} catch (ValidationException $e){

    foreach ($e->getErrors() as $error)
    {
        var_dump($error);
    }
}