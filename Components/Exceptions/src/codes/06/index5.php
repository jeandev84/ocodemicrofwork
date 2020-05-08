<?php

class ValidationException extends Exception
{
    protected $field;

    protected $error;

    public function __construct($field, $error)
    {
        $this->field = $field;
        $this->error = $error;
    }

    public function getError()
    {
        return $this->field . ' ' . $this->error;
    }
}

class EmptyException extends ValidationException
{
    //
}

class EmailException extends ValidationException
{
    //
}

try {
    throw new EmailException('email', 'is not a valid email address');
} catch (EmailException $e) {
    var_dump($e->getError());
}
