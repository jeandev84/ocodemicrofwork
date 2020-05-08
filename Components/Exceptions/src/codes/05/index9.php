<?php

class ConnectionFailedException extends Exception
{
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        $message = 'The database connection failed';

        parent::__construct($message, $code, $previous);
    }
}

throw new ConnectionFailedException();
