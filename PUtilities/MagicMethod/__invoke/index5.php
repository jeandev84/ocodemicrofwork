<?php

class SomeClass
{
    /**
     * @param $value
    */
    public function __invoke($value)
    {
        var_dump($value);
    }
}

$class = new SomeClass();
$class('Alexander');