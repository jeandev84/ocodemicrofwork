<?php

class ConnectionFailedException extends Exception
{
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->message = 'The database connection failed';
    }
}

throw new ConnectionFailedException();
