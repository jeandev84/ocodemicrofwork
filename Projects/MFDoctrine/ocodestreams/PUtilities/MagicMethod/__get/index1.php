<?php

class SomeClass
{

    protected $name = 'Alex';

    /**
     * @param $key
    */
    public function __get($key)
    {
    }
}

$class = new SomeClass();
var_dump($class->name);