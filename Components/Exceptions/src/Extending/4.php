<?php


require_once __DIR__.'/../vendor/autoload.php';


class ValidationException extends Exception
{
    protected $errors;

    public function __construct(array $errors)
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
        throw new ValidationException([
            'first_name' => [
                'First name is required'
            ],
            'last_name' => [
                'Last name is required'
            ],
        ]);
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