<?php

class SomeClass
{
    public function __set_state()
    {
        //
    }
}

$class = new SomeClass();

var_export($class);