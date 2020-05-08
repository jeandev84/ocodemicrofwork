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

class MaxLengthException extends ValidationException
{
    protected $max;

    public function __construct($field, $value, $max)
    {
        parent::__construct($field, $value);

        $this->max = $max;
    }

    public function getError()
    {
        return $this->field . ' must be less than ' . $this->max . ' characters';
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
    throw new MaxLengthException('first_name', 'Alex Garrett-Smith', 5);
} catch (MaxLengthException $e) {
    var_dump($e->getError());
}
