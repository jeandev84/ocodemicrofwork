<?php

class SomeClass
{
    protected $property;

    public function __destruct()
    {
        var_dump($this->property);
    }

    public function setProperty($value)
    {
        $this->property = $value;
    }
}

$class = new SomeClass();
$class->setProperty('Alex');
