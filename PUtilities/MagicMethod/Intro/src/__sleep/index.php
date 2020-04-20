<?php

class SomeClass
{
    public $property = 'value';
}

$class = new SomeClass();

var_dump(serialize($class));