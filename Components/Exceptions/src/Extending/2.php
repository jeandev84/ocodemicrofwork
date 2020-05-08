<?php


require_once __DIR__.'/../vendor/autoload.php';


class ValidationException extends Exception
{
     protected $errors;

     public function __construct(array $errors)
     {
         $this->errors = $errors;
     }
}


class Validator
{
    public function validate()
    {
        throw new ValidationException([
            'first_name' => [
                'First name is required'
            ]
        ]);
    }
}

$validator = new Validator();
$validator->validate();