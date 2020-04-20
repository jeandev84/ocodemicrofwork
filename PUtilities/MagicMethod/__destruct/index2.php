<?php

/**
 * Class SomeClass
*/
class SomeClass
{
    /** @var  */
    protected $property;

    /**
     * SomeClass constructor.
    */
    public function __construct()
    {
        var_dump($this->property);
    }


    /**
     * Called Last
    */
    public function __destruct()
    {
       var_dump($this->property);
    }

    /**
     * @param $value
    */
    public function setProperty($value)
    {
        $this->property = $value;
    }
}

$class = new SomeClass();
$class->setProperty('Alex');