<?php

class SomeClass
{
    public function __invoke()
    {
        var_dump('invoked');
    }
}

$class = new SomeClass();
$class();

var_dump(is_callable($class));