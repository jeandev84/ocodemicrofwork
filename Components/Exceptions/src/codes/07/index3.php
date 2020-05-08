<?php

set_exception_handler(function (Throwable $e) {
    require('exception.twig');
});

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
