<?php

class ExceptionHandler
{
    public function __invoke(Throwable $e)
    {
        require('exception.twig');
    }
}

set_exception_handler(new ExceptionHandler());

class AnotherClass
{
    public function run()
    {
        throw new Exception('Something went wrong');
    }
}

class SomeClass
{
    public function run(AnotherClass $anotherClass)
    {
        $anotherClass->run();
    }
}

$class = new SomeClass();
$class->run(new AnotherClass());
