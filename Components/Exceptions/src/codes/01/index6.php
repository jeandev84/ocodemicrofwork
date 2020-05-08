<?php

class InternalException
{
    protected $message;

    public function __construct($message = '')
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }
}

$exception = new InternalException('Login failed');
var_dump($exception->getMessage());