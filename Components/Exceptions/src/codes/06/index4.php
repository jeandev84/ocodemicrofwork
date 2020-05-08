<?php

class EmptyException extends Exception
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

class EmailException extends Exception
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

try {
    throw new EmailException('email', 'is not a valid email address');
} catch (EmailException $e) {
    var_dump($e->getError());
}
