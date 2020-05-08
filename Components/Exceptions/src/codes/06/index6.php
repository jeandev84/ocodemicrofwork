<?php

class ValidationException extends Exception
{
    protected $field;

    protected $value;

    public function __construct($field, $value)
    {
        $this->field = $field;
        $this->value = $value;
    }
}

class EmptyException extends ValidationException
{
    public function getError()
    {
        return $this->field . ' is empty';
    }
}

class EmailException extends ValidationException
{
    public function getError()
    {
        return $this->field . ' must be a valid email address';
    }
}

try {
    throw new EmailException('email', 'alex@codecourse.com');
} catch (EmailException $e) {
    var_dump($e->getError());
}
