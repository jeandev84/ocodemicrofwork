<?php


require_once __DIR__.'/../vendor/autoload.php';


class EmptyException extends Exception
{

    protected $field;

    protected $error;


    public function __construct($field, $error)
    {
        $this-> field = $field;
        $this->error = $error;
    }


    public function getError()
    {
        return $this->field . ' ' . $this->error;
    }
}

try {

    throw new EmptyException('username', 'is empty');

} catch (EmptyException $e){
    exit($e->getError());
}