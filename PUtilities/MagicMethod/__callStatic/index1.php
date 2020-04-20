<?php

/**
 * Class SomeClass
*/
class SomeClass
{
    /**
     * @param $name
     * @param $arguments
    */
    public static function __callStatic($name, $arguments)
    {
         var_dump($name, $arguments);
    }
}

SomeClass::instance('argument');