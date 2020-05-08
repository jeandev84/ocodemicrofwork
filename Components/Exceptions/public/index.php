<?php
require_once __DIR__.'/../vendor/autoload.php';



class ValidationException extends Exception
{

}






class EmptyException extends ValidationException
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


class EmailException extends ValidationException
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

    throw new EmailException('email', 'is not a valid email address');

} catch (EmailException $e){
    exit($e->getError());
}