<?php

class SomeClass
{
    public function __call($name, $arguments)
    {
        var_dump($name, $arguments);
    }
}

$class = new SomeClass();

$class->getSomething('something', 1);