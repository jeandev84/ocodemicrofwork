<?php

class SomeClass
{
    public function __toString()
    {
        return 'String';
    }
}

$class = new SomeClass();

echo $class;