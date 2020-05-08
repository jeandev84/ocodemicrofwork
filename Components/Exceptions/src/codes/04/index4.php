<?php

class ValidationException extends Exception
{
    //
}

class Validator
{
    public function validate()
    {
        throw new ValidationException('Data was invalid');
    }
}

$validator = new Validator();

try {
    $validator->validate();
} catch (ValidationException $e) {
    var_dump($e->getMessage());
}
