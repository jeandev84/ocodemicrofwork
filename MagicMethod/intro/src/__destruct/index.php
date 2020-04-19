<?php

class SomeClass
{
    public function __destruct()
    {
        var_dump('destruct');
    }
}

$class = new SomeClass();