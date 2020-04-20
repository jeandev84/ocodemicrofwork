<?php

# __sleep() Serialize the class
# __wakeup() Deserialise the class

/**
 * Class SomeClass
*/
class SomeClass
{
    public $property = 'value';

    /**
     * All properties inside method magic __sleep() will be serialized
     *
     * @return string[]
     */
    public function __sleep()
    {
        return ['property'];
    }


    /**
     * All properties inside method magic __wakeup() will be deserialized
     *
     * @return string[]
     */
    public function __wakeup()
    {
       return ['woken'];
    }

}

$class = new SomeClass();

$string = serialize($class);

$class = unserialize($string);

var_dump($string);