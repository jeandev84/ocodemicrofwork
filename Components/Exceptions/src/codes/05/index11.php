<?php

class ConnectionFailedException extends Exception
{
    protected $code = 1001;
    protected $message = 'The database connection failed';
}

var_dump(new ConnectionFailedException());
