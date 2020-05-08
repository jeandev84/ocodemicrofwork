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

    public function getField()
    {
        return $this->field;
    }

    public function getError()
    {
        return $this->error;
    }
}

try {
    throw new EmptyException('username', 'is empty');
} catch (EmptyException $e) {
    echo $e->getField() . ' ' . $e->getError();
}
