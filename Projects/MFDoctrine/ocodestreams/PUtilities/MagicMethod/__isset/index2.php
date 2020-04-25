<?php

/**
 * Class SomeClass
*/
class SomeClass
{
    /*
       public $name = 'Alex';
       public function __isset() { return false; }
    */

    protected $name = 'Alex';



    /**
     * @param $key
     * @return bool
    */
    public function __isset($key)
    {
        return property_exists($this, $key);
    }


    /**
     * @return string
    */
    public function getName()
    {
        return $this->name;
    }
}

$class = new SomeClass();
var_dump(isset($class->name));

