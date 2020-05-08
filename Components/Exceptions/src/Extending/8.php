<?php


require_once __DIR__.'/../vendor/autoload.php';


class ConnectionFailedException extends Exception
{
    protected $code = 1001;
    protected $message = 'The database connection failed';
}
// throw new ConnectionFailedException()
var_dump(new ConnectionFailedException());


