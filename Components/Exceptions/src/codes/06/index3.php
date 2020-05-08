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

try {
    throw new EmptyException('username', 'is empty');
} catch (EmptyException $e) {
    var_dump($e->getError());
}
