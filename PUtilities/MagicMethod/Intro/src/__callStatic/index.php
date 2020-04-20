<?php

class SomeClass
{
    public static function __callStatic($method, $arguments)
    {
        var_dump($method, $arguments);
    }
}

SomeClass::method('argument');
