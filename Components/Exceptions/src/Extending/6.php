<?php


require_once __DIR__.'/../vendor/autoload.php';


class ConnectionFailedException extends Exception
{
    public function __construct($message = 'The database connection failed', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

throw new ConnectionFailedException();


