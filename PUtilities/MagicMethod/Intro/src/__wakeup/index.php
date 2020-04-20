<?php

class SomeClass
{
    public $property = 'value';

    public function __sleep()
    {
        return ['property'];
    }

    public function __wakeup()
    {
        var_dump('woken');
    }
}

$class = new SomeClass();

$string = serialize($class);

$class = unserialize($string);
