<?php

class SomeClass
{ 
    public function __get($key)
    {
        //
    }
}

$class = new SomeClass();
var_dump($class->name);