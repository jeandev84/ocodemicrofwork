<?php

class SomeClass
{
    protected $name = 'Alex';

    public function __isset($key)
    {
        return property_exists($this, $key);
    }
}

$class = new SomeClass();

var_dump(isset($class->name));