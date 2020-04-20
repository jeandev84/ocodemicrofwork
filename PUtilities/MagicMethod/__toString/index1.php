<?php

# Echo out a class as a string

class SomeClass
{
    /**
     * @return string
    */
    public function __toString()
    {
        return "String \n";
    }
}

$class = new SomeClass();
echo $class;