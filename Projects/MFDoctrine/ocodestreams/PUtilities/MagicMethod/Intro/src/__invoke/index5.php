<?php

class SomeClass
{
    public function __invoke($value)
    {
        var_dump($value);
    }
}

$class = new SomeClass();
$class('Alex');
