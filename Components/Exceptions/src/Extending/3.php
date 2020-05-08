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
            ]
        ]);
    }
}

$validator = new Validator();

try {
    $validator->validate();
} catch (ValidationException $e){
//    echo '<pre>';
//    print_r($e);
//    echo '</pre>';
//    exit();

    print_r($e->getErrors());
    die;
}